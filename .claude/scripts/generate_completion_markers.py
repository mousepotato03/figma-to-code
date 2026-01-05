#!/usr/bin/env python3
"""
기존 체크리스트에서 완료된 페이지의 마커 파일 생성

Usage:
    python .claude/scripts/generate_completion_markers.py
"""
import json
from pathlib import Path
from datetime import datetime


def normalize_page_name(filename):
    """체크리스트 파일명 → 페이지명 정규화

    Examples:
        A_Home_Desktop → home-desktop
        About_NIBEC_History → about-nibec-history
        About NIBEC > OVERVIEW → about-nibec-overview
    """
    name = filename.replace('.json', '')

    # A_, B_, C_ 등 prefix 제거
    if name and name[0].isalpha() and name[1:2] == '_':
        parts = name.split('_', 1)
        if len(parts) > 1:
            name = parts[1]

    # 특수문자 → 하이픈
    name = name.replace('>', '-').replace('•', '-').replace('/', '-')
    name = name.replace('_', '-').replace(' ', '-')

    # 소문자 변환
    name = name.lower()

    # 연속 하이픈 제거
    while '--' in name:
        name = name.replace('--', '-')

    return name.strip('-')


def main():
    # Windows 인코딩 문제 해결
    import sys
    if sys.platform == 'win32':
        import io
        sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding='utf-8')

    checklist_dir = Path('.claude/checklist')
    marker_dir = Path('.claude/markers')

    if not checklist_dir.exists():
        print(f"[ERROR] {checklist_dir} not found")
        return

    print("=" * 60)
    print("마커 파일 생성 시작")
    print("=" * 60)

    # 1. 공통 컴포넌트 처리
    common_file = checklist_dir / '_common_component.json'
    if common_file.exists():
        with open(common_file, 'r', encoding='utf-8') as f:
            data = json.load(f)

        components = data.get('components', [])
        total = len(components)
        completed = sum(1 for c in components if c.get('status') == 'completed')
        failed = sum(1 for c in components if c.get('status') == 'failed')

        if completed + failed == total and total > 0:  # 모두 완료
            marker_path = marker_dir / 'common' / 'components.completed'
            marker_path.parent.mkdir(parents=True, exist_ok=True)
            timestamp = datetime.now().isoformat()
            marker_content = f"completed|{timestamp}|common|{completed}|{failed}"
            marker_path.write_text(marker_content, encoding='utf-8')
            print(f"[OK] {marker_path}")
            print(f"  -> {completed}/{total} components completed")
        else:
            print(f"[SKIP] Common components: {completed}/{total} completed, {failed} failed (not all done)")

    # 2. 페이지별 체크리스트 처리
    processed = 0
    skipped = 0

    for json_file in sorted(checklist_dir.glob('*.json')):
        if json_file.stem == '_common_component':
            continue

        with open(json_file, 'r', encoding='utf-8') as f:
            data = json.load(f)

        sections = data.get('sections', [])
        if not sections:
            print(f"[SKIP] {json_file.name}: No sections")
            skipped += 1
            continue

        total = len(sections)
        completed = sum(1 for s in sections if s.get('status') == 'completed')
        failed = sum(1 for s in sections if s.get('status') == 'failed')
        pending = sum(1 for s in sections if s.get('status') == 'pending')

        if pending == 0 and total > 0:  # 모든 섹션이 완료 또는 실패
            page_name = normalize_page_name(json_file.stem)
            marker_path = marker_dir / page_name / 'page.completed'
            marker_path.parent.mkdir(parents=True, exist_ok=True)
            timestamp = datetime.now().isoformat()
            marker_content = f"completed|{timestamp}|{page_name}|{completed}|{failed}"
            marker_path.write_text(marker_content, encoding='utf-8')
            print(f"[OK] {marker_path}")
            print(f"  -> {json_file.name}: {completed}/{total} sections completed, {failed} failed")
            processed += 1
        else:
            print(f"[SKIP] {json_file.name}: {completed}/{total} completed, {failed} failed, {pending} pending")
            skipped += 1

    print("=" * 60)
    print(f"완료! {processed}개 페이지 마커 생성, {skipped}개 페이지 건너뜀")
    print("=" * 60)


if __name__ == '__main__':
    main()
