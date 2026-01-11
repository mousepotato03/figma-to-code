#!/usr/bin/env python3
"""
pending 상태인 섹션만 추출하여 간단한 형식으로 출력
메인 세션이 체크리스트 JSON 전체를 읽지 않도록 함

사용법:
  python get_pending_sections.py              # 모든 페이지의 pending 섹션
  python get_pending_sections.py home         # 특정 페이지만
  python get_pending_sections.py --common     # 공통 컴포넌트만

출력 형식:
  pageName|order|sectionSlug|nodeId|fileKey
  home|01|header-hero-section|2413:13489|PbENz9XeDICQsut5z1DfiC
"""

import sys
import re
from pathlib import Path

# 프로젝트 루트 기준 경로
SCRIPT_DIR = Path(__file__).parent
PROJECT_ROOT = SCRIPT_DIR.parent.parent
CHECKLIST_DIR = PROJECT_ROOT / ".claude" / "checklist"
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


def has_marker(page_name: str, order: int, section_slug: str) -> bool:
    """마커 파일 존재 여부 확인"""
    marker_path = MARKERS_DIR / page_name / f"{order:02d}-{section_slug}.done"
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
        sections = data.get("sections", [])

        for section in sections:
            name = section.get("name", "")
            node_id = section.get("nodeId", "")
            order = section.get("order", 0)
            section_slug = slugify(name)

            # 마커 파일로 이미 완료됐는지 확인
            if has_marker(page_name, order, section_slug):
                continue

            results.append({
                "pageName": page_name,
                "order": order,
                "sectionSlug": section_slug,
                "nodeId": node_id,
                "fileKey": file_key
            })

    return results


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

        # occurrences에서 첫 번째 nodeId 추출
        occurrences = comp.get("occurrences", [])
        node_id = occurrences[0].get("nodeId", "") if occurrences else ""
        file_key = occurrences[0].get("fileKey", "") if occurrences else ""

        results.append({
            "name": name,
            "nodeId": node_id,
            "fileKey": file_key
        })

    return results


def main():
    setup_windows_utf8()

    args = sys.argv[1:]

    # --common 옵션: 공통 컴포넌트만
    if "--common" in args:
        components = get_pending_common_components()
        if not components:
            print("# No pending common components")
            return

        print("# Common components (pending)")
        for comp in components:
            print(f"common|00|{comp['name'].lower()}|{comp['nodeId']}|{comp['fileKey']}")
        return

    # 페이지 지정 또는 전체
    target_page = args[0] if args else None
    sections = get_pending_sections(target_page)

    if not sections:
        print(f"# No pending sections" + (f" for {target_page}" if target_page else ""))
        return

    print("# Pending sections: pageName|order|sectionSlug|nodeId|fileKey")
    for s in sections:
        print(f"{s['pageName']}|{s['order']:02d}|{s['sectionSlug']}|{s['nodeId']}|{s['fileKey']}")


if __name__ == "__main__":
    main()
