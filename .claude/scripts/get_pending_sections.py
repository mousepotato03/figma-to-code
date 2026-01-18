#!/usr/bin/env python3
"""
pending 상태인 섹션만 추출하여 간단한 형식으로 출력
메인 세션이 체크리스트 JSON 전체를 읽지 않도록 함

사용법:
  python get_pending_sections.py              # 모든 페이지의 pending 섹션
  python get_pending_sections.py home         # 특정 페이지만
  python get_pending_sections.py --common     # 공통 컴포넌트만
  python get_pending_sections.py home --count-only           # 개수만 출력
  python get_pending_sections.py home --batch-size 5         # 5개씩 첫 배치
  python get_pending_sections.py home --batch-size 5 --batch-index 1  # 두 번째 배치

출력 형식:
  pageName|position|sectionSlug|nodeId|fileKey
  home|flow-1|header-hero-section|2413:13489|YOUR_FILE_KEY
"""

import sys
import re
import argparse
from pathlib import Path
import math

# 프로젝트 루트 기준 경로
SCRIPT_DIR = Path(__file__).parent
PROJECT_ROOT = SCRIPT_DIR.parent.parent
CHECKLIST_DIR = PROJECT_ROOT / ".claude" / "checklists"
MARKERS_DIR = PROJECT_ROOT / ".claude" / "markers"

# utils.py import
sys.path.insert(0, str(SCRIPT_DIR))
from utils import load_json_safe, normalize_page_name, setup_windows_utf8


def slugify(name: str) -> str:
    """섹션명을 slug로 변환

    Examples:
        Header (Hero Section) → header-hero-section
        About Section → about-section
    """
    # 괄호 내용 유지하면서 괄호 제거
    slug = re.sub(r'[()]', '', name)
    # 특수문자 → 하이픈
    slug = re.sub(r'[^a-zA-Z0-9가-힣]+', '-', slug)
    # 소문자
    slug = slug.lower()
    # 연속 하이픈 제거
    while '--' in slug:
        slug = slug.replace('--', '-')
    return slug.strip('-')


def get_position_order(position: str) -> int:
    """position에서 순서 번호 추출 (flow-N → N, 그 외 → 0)"""
    if position.startswith('flow-'):
        try:
            return int(position.replace('flow-', ''))
        except ValueError:
            return 0
    return 0


def get_marker_filename(position: str, section_slug: str) -> str:
    """position에 따라 마커 파일명 생성

    flow-N → {N:02d}-{slug}.done
    fixed-* → fixed-{anchor}-{slug}.done
    """
    if position.startswith('flow-'):
        order = get_position_order(position)
        return f"{order:02d}-{section_slug}.done"
    elif position.startswith('fixed-'):
        anchor = position.replace('fixed-', '')
        return f"fixed-{anchor}-{section_slug}.done"
    else:
        # v5 fallback (order로 간주)
        try:
            order = int(position)
            return f"{order:02d}-{section_slug}.done"
        except ValueError:
            return f"{section_slug}.done"


def has_marker(page_name: str, position: str, section_slug: str) -> bool:
    """마커 파일 존재 여부 확인"""
    marker_filename = get_marker_filename(position, section_slug)
    marker_path = MARKERS_DIR / page_name / marker_filename
    return marker_path.exists()


def has_page_completed_marker(page_name: str) -> bool:
    """페이지 완료 마커 존재 여부"""
    marker_path = MARKERS_DIR / page_name / "page.completed"
    return marker_path.exists()


def has_components_completed_marker() -> bool:
    """공통 컴포넌트 완료 마커 존재 여부"""
    marker_path = MARKERS_DIR / "common" / "components.completed"
    return marker_path.exists()


def has_common_marker(name: str) -> bool:
    """공통 컴포넌트 마커 존재 여부"""
    # 이름 정규화: Navbar → navbar
    slug = name.lower().replace(' ', '-')
    marker_path = MARKERS_DIR / "common" / f"{slug}.done"
    return marker_path.exists()


def normalize_position(node: dict) -> str:
    """v5/v6 호환: order 또는 position 필드에서 position 값 추출

    v6: position 필드 사용 (flow-1, fixed-top 등)
    v5: order 필드 사용 → flow-{order}로 변환
    """
    if 'position' in node:
        return node['position']
    elif 'order' in node:
        # v5 fallback
        return f"flow-{node['order']}"
    else:
        return 'flow-0'


def get_pending_sections(target_page: str = None):
    """pending 상태인 섹션 목록 반환"""
    results = []

    for checklist_file in sorted(CHECKLIST_DIR.glob("*.json")):
        # 공통 컴포넌트 파일 제외
        if checklist_file.name == "_common_component.json":
            continue

        # 페이지명 정규화
        page_name = normalize_page_name(checklist_file.stem)

        # 특정 페이지 필터
        if target_page and page_name != target_page:
            continue

        # 페이지 완료 마커 확인 → 건너뛰기
        if has_page_completed_marker(page_name):
            continue

        # 체크리스트 로드
        data = load_json_safe(checklist_file)
        if not data:
            continue

        metadata = data.get("metadata", {})
        file_key = metadata.get("fileKey", "")
        # nodes 또는 sections 키 지원
        sections = data.get("nodes", data.get("sections", []))

        for section in sections:
            # common 타입은 건너뜀 (section 타입만 처리)
            if section.get("type") == "common":
                continue
            name = section.get("name", "")
            node_id = section.get("nodeId", "")
            position = normalize_position(section)
            section_slug = slugify(name)

            # 마커 파일로 이미 완료됐는지 확인
            if has_marker(page_name, position, section_slug):
                continue

            results.append({
                "pageName": page_name,
                "position": position,
                "sectionSlug": section_slug,
                "nodeId": node_id,
                "fileKey": file_key
            })

    # flow-N 기준으로 정렬
    results.sort(key=lambda x: (x['pageName'], get_position_order(x['position'])))

    return results


def get_common_component_position(comp: dict) -> str:
    """공통 컴포넌트의 position 추출

    우선순위:
    1. 컴포넌트 레벨 position 필드
    2. 첫 번째 occurrence의 position 필드
    3. fallback: "fixed-top"
    """
    # 컴포넌트 레벨 position
    if 'position' in comp:
        return comp['position']

    # occurrence 레벨 position
    occurrences = comp.get('occurrences', [])
    if occurrences and 'position' in occurrences[0]:
        return occurrences[0]['position']

    # fallback
    return 'fixed-top'


def get_pending_common_components():
    """pending 상태인 공통 컴포넌트 목록 반환"""
    # 완료 마커 확인
    if has_components_completed_marker():
        return []

    common_file = CHECKLIST_DIR / "_common_component.json"
    if not common_file.exists():
        return []

    data = load_json_safe(common_file)
    if not data:
        return []

    results = []
    components = data.get("components", [])

    for comp in components:
        name = comp.get("name", "")

        # 마커 파일로 이미 완료됐는지 확인
        if has_common_marker(name):
            continue

        # position 추출 (동적)
        position = get_common_component_position(comp)

        # occurrences에서 첫 번째 nodeId 추출
        occurrences = comp.get("occurrences", [])
        node_id = occurrences[0].get("nodeId", "") if occurrences else ""
        file_key = occurrences[0].get("fileKey", "") if occurrences else ""

        results.append({
            "name": name,
            "position": position,
            "nodeId": node_id,
            "fileKey": file_key
        })

    return results


def main():
    setup_windows_utf8()

    parser = argparse.ArgumentParser(description='pending 상태인 섹션 추출')
    parser.add_argument('page', nargs='?', default=None, help='특정 페이지만 (생략시 전체)')
    parser.add_argument('--common', action='store_true', help='공통 컴포넌트만')
    parser.add_argument('--count-only', action='store_true', help='개수만 출력')
    parser.add_argument('--batch-size', type=int, default=0, help='배치당 최대 개수 (0=무제한)')
    parser.add_argument('--batch-index', type=int, default=0, help='배치 인덱스 (0부터 시작)')

    args = parser.parse_args()

    # --common 옵션: 공통 컴포넌트만
    if args.common:
        components = get_pending_common_components()

        if args.count_only:
            print(len(components))
            return

        if not components:
            print("# No pending common components")
            return

        # 배치 처리
        if args.batch_size > 0:
            total_batches = math.ceil(len(components) / args.batch_size)
            start = args.batch_index * args.batch_size
            end = start + args.batch_size
            components = components[start:end]
            print(f"# Common components (batch {args.batch_index + 1}/{total_batches}, {len(components)} items)")
        else:
            print("# Common components (pending)")

        for comp in components:
            print(f"common|{comp['position']}|{comp['name'].lower()}|{comp['nodeId']}|{comp['fileKey']}")
        return

    # 페이지 지정 또는 전체
    sections = get_pending_sections(args.page)

    if args.count_only:
        print(len(sections))
        return

    if not sections:
        print(f"# No pending sections" + (f" for {args.page}" if args.page else ""))
        return

    # 배치 처리
    if args.batch_size > 0:
        total_batches = math.ceil(len(sections) / args.batch_size)
        start = args.batch_index * args.batch_size
        end = start + args.batch_size
        sections = sections[start:end]
        print(f"# Pending sections (batch {args.batch_index + 1}/{total_batches}, {len(sections)} items): pageName|position|sectionSlug|nodeId|fileKey")
    else:
        print("# Pending sections: pageName|position|sectionSlug|nodeId|fileKey")

    for s in sections:
        print(f"{s['pageName']}|{s['position']}|{s['sectionSlug']}|{s['nodeId']}|{s['fileKey']}")


if __name__ == "__main__":
    main()
