#!/usr/bin/env python3
"""
프로젝트 기본 CSS 파일 확인/생성
- reset.css: 없으면 생성
"""
import os

CSS_DIR = "css"

RESET_CSS = '''/* CSS Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html, body {
  width: 100%;
  height: 100%;
}

body {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen",
    "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue",
    sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

a {
  color: inherit;
  text-decoration: none;
}

ul, ol, li {
  list-style: none;
}

img {
  display: block;
  max-width: 100%;
  height: auto;
}

button {
  border: none;
  background: none;
  cursor: pointer;
  font: inherit;
}

input, textarea, select {
  font: inherit;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
}
'''

def ensure_file(path, content):
    if os.path.exists(path):
        print(f"[OK] {path} exists, skipping")
        return False
    os.makedirs(os.path.dirname(path), exist_ok=True)
    with open(path, 'w', encoding='utf-8') as f:
        f.write(content)
    print(f"[OK] {path} created")
    return True

if __name__ == "__main__":
    os.makedirs(CSS_DIR, exist_ok=True)
    ensure_file(f"{CSS_DIR}/reset.css", RESET_CSS)
    print("Done")
