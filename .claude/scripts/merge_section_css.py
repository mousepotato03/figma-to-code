#!/usr/bin/env python3
"""
Merge section CSS files into a single page CSS file.

Usage:
    python merge_section_css.py <page_name>

Example:
    python merge_section_css.py home
    # Merges css/home/*.css -> css/home.css
"""

import json
import shutil
import sys
from pathlib import Path

# Windows 콘솔 한글 출력 깨짐 방지
if sys.platform == 'win32':
    sys.stdout.reconfigure(encoding='utf-8')


def count_sections_from_checklist(checklist_path: Path) -> int:
    """체크리스트에서 섹션 수 카운트 (common 제외)"""
    if not checklist_path.exists():
        return 0

    with checklist_path.open("r", encoding="utf-8") as f:
        data = json.load(f)

    sections = data.get("sections", [])
    # common 타입 섹션은 별도 CSS 디렉토리이므로 제외
    return sum(1 for s in sections if s.get("type") != "common")


def validate_sections(page_name: str, css_dir: Path) -> None:
    """체크리스트 섹션 수와 CSS 파일 수 비교 검증"""
    checklist_path = Path(f".claude/checklists/{page_name}.json")

    expected = count_sections_from_checklist(checklist_path)
    actual = len(list(css_dir.glob("*.css")))

    if expected == 0:
        print(f"Warning: Checklist not found at {checklist_path}, skipping validation")
        return

    if expected != actual:
        missing = expected - actual
        print(f"ERROR: Section count mismatch for '{page_name}'")
        print(f"  Expected: {expected} CSS files (from checklist)")
        print(f"  Found:    {actual} CSS files")
        print(f"  Missing:  {missing} CSS file(s)")
        print(f"\nCheck .claude/markers/{page_name}/ for .failed markers")
        sys.exit(1)

    print(f"Validation passed: {actual}/{expected} sections")


def merge_css(page_name: str) -> None:
    """Merge all section CSS files for a page into a single file."""

    css_dir = Path(f"css/{page_name}")
    output_file = Path(f"css/{page_name}.css")

    if not css_dir.exists():
        print(f"Error: Directory {css_dir} not found")
        sys.exit(1)

    # 병합 전 섹션 수 검증
    validate_sections(page_name, css_dir)

    # Get all CSS files sorted by name (order prefix ensures correct order)
    css_files = sorted(css_dir.glob("*.css"))

    if not css_files:
        print(f"Error: No CSS files found in {css_dir}")
        sys.exit(1)

    with output_file.open("w", encoding="utf-8") as out:
        # Header comment
        out.write(f"/* {page_name}.css - Auto-merged from {len(css_files)} section files */\n")
        out.write(f"/* Do not edit directly - regenerate with merge_section_css.py */\n\n")

        for css_file in css_files:
            section_name = css_file.stem  # e.g., "01-hero"
            out.write(f"/* ========== {section_name} ========== */\n")
            content = css_file.read_text(encoding="utf-8").strip()
            # 병합 후 한 단계 위로 이동하므로 상대 경로 조정
            # css/{pageName}/*.css -> css/{pageName}.css
            content = content.replace("../../assets/", "../assets/")
            out.write(content)
            out.write("\n\n")

    print(f"Merged {len(css_files)} files -> {output_file}")
    for f in css_files:
        print(f"  - {f.name}")

    # Delete source directory after merge
    shutil.rmtree(css_dir)
    print(f"Deleted source directory: {css_dir}")


def main():
    if len(sys.argv) != 2:
        print("Usage: python merge_section_css.py <page_name>")
        print("Example: python merge_section_css.py home")
        sys.exit(1)

    page_name = sys.argv[1]
    merge_css(page_name)


if __name__ == "__main__":
    main()
