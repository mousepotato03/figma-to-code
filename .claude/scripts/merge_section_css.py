#!/usr/bin/env python3
"""
Merge section CSS files into a single page CSS file.

Usage:
    python merge_section_css.py <page_name>

Example:
    python merge_section_css.py home
    # Merges css/home/*.css -> css/home.css
"""

import shutil
import sys
from pathlib import Path


def merge_css(page_name: str) -> None:
    """Merge all section CSS files for a page into a single file."""

    css_dir = Path(f"css/{page_name}")
    output_file = Path(f"css/{page_name}.css")

    if not css_dir.exists():
        print(f"Error: Directory {css_dir} not found")
        sys.exit(1)

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
            out.write(css_file.read_text(encoding="utf-8").strip())
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
