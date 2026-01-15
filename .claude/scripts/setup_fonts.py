#!/usr/bin/env python3
"""
Font Setup Script
- Reads font info collected during implementation from .claude/fonts.json
- Checks Google Fonts availability
- Generates css/fonts.css with @import for available fonts
- Lists fonts requiring manual setup
"""

import json
import os
import urllib.request
import urllib.error
from pathlib import Path

FONTS_JSON = Path(".claude/fonts.json")
OUTPUT_CSS = Path("css/fonts.css")

def load_fonts():
    """Load font data from .claude/fonts.json"""
    if not FONTS_JSON.exists():
        print("No fonts.json found - no fonts to set up")
        return {}

    with open(FONTS_JSON, "r", encoding="utf-8") as f:
        data = json.load(f)

    return data.get("fonts", {})

def check_google_fonts(font_name: str, weights: list) -> bool:
    """Check if font is available on Google Fonts"""
    # Format weights for Google Fonts URL
    weights_str = ";".join(sorted(weights, key=int))
    # Replace spaces with + for URL
    font_name_url = font_name.replace(" ", "+")
    url = f"https://fonts.googleapis.com/css2?family={font_name_url}:wght@{weights_str}"

    try:
        req = urllib.request.Request(url, method="HEAD")
        req.add_header("User-Agent", "Mozilla/5.0")
        with urllib.request.urlopen(req, timeout=5) as response:
            return response.status == 200
    except (urllib.error.HTTPError, urllib.error.URLError):
        return False

def generate_google_fonts_url(fonts: dict) -> str:
    """Generate Google Fonts @import URL for multiple fonts"""
    families = []
    for font_name, info in fonts.items():
        weights = info.get("weights", ["400"])
        weights_str = ";".join(sorted(weights, key=int))
        font_name_url = font_name.replace(" ", "+")
        families.append(f"family={font_name_url}:wght@{weights_str}")

    return f"https://fonts.googleapis.com/css2?{'&'.join(families)}&display=swap"

def main():
    fonts = load_fonts()

    if not fonts:
        return

    available_fonts = {}
    manual_fonts = []

    print("Checking font availability...")

    for font_name, info in fonts.items():
        weights = info.get("weights", ["400"])
        if check_google_fonts(font_name, weights):
            available_fonts[font_name] = info
            print(f"  [OK] {font_name} ({', '.join(weights)})")
        else:
            manual_fonts.append((font_name, weights))
            print(f"  [--] {font_name} - not on Google Fonts")

    # Generate CSS
    OUTPUT_CSS.parent.mkdir(parents=True, exist_ok=True)

    css_lines = ["/* Auto-generated font imports */", ""]

    if available_fonts:
        url = generate_google_fonts_url(available_fonts)
        css_lines.append(f"@import url('{url}');")
        css_lines.append("")

    if manual_fonts:
        css_lines.append("/* TODO: Manual font setup required */")
        for font_name, weights in manual_fonts:
            css_lines.append(f"/* - {font_name} ({', '.join(weights)}) */")
        css_lines.append("")

    with open(OUTPUT_CSS, "w", encoding="utf-8") as f:
        f.write("\n".join(css_lines))

    # Summary
    print("")
    print(f"Generated: {OUTPUT_CSS}")

    if available_fonts:
        print(f"  Auto-configured: {', '.join(available_fonts.keys())}")

    if manual_fonts:
        print("")
        print("Manual setup required for:")
        for font_name, weights in manual_fonts:
            print(f"  - {font_name}")
        print("")
        print("Download font files and add @font-face to css/fonts.css")

if __name__ == "__main__":
    main()
