#!/usr/bin/env python3
"""
페이지 완료 후 개별 섹션 마커 삭제 (용량 절약)

page.completed가 있으면 섹션별 *.done 파일은 불필요하므로 삭제합니다.

Usage:
    python .claude/scripts/cleanup_markers.py
"""
from pathlib import Path


def main():
    marker_dir = Path('.claude/markers')

    if not marker_dir.exists():
        print(f"❌ Error: {marker_dir} not found")
        return

    print("=" * 60)
    print("마커 파일 정리 시작")
    print("=" * 60)

    cleaned_pages = 0
    deleted_files = 0

    for page_dir in sorted(marker_dir.iterdir()):
        if not page_dir.is_dir():
            continue

        page_completed = page_dir / 'page.completed'
        components_completed = page_dir / 'components.completed'

        # 페이지 완료 마커 또는 컴포넌트 완료 마커가 있는 경우
        if page_completed.exists() or components_completed.exists():
            page_deleted = 0

            # 섹션별 마커 삭제
            for marker in page_dir.glob('*.done'):
                if marker.name not in ['page.completed', 'components.completed', 'merged.done']:
                    marker.unlink()
                    print(f"🗑️  {marker.relative_to(Path.cwd())}")
                    page_deleted += 1
                    deleted_files += 1

            for marker in page_dir.glob('*.failed'):
                marker.unlink()
                print(f"🗑️  {marker.relative_to(Path.cwd())}")
                page_deleted += 1
                deleted_files += 1

            if page_deleted > 0:
                print(f"✓ {page_dir.name} - {page_deleted}개 섹션 마커 삭제")
                cleaned_pages += 1

    print("=" * 60)
    if deleted_files > 0:
        print(f"완료! {cleaned_pages}개 페이지에서 {deleted_files}개 마커 파일 삭제")
    else:
        print("삭제할 마커 파일이 없습니다.")
    print("=" * 60)


if __name__ == '__main__':
    main()
