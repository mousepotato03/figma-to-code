# -*- coding: utf-8 -*-
"""
공통 컴포넌트 병합 스크립트

체크리스트 파일들에서 공통 컴포넌트 섹션을 추출하여
common_component.md로 통합하고, 원본에서 해당 섹션을 삭제합니다.
"""

import re
import sys
from pathlib import Path


def find_checklist_files(checklist_dir: Path) -> list[Path]:
    """체크리스트 파일 목록 반환 (common_component.md 제외)"""
    files = []
    for f in checklist_dir.glob("*.md"):
        if f.name != "common_component.md":
            files.append(f)
    return sorted(files)


def extract_common_section(content: str) -> tuple[str | None, str]:
    """
    마크다운에서 공통 컴포넌트 섹션 추출

    Returns:
        (섹션 내용, 섹션 제거된 원본)
    """
    # 패턴: ## 🔄 공통 컴포넌트 또는 ## 공통 컴포넌트
    pattern = r'^(## (?:🔄 )?공통 컴포넌트.*?)(?=^## |\Z)'

    match = re.search(pattern, content, re.MULTILINE | re.DOTALL)

    if not match:
        return None, content

    section = match.group(1).strip()
    # 원본에서 섹션 제거
    cleaned = re.sub(pattern, '', content, count=1, flags=re.MULTILINE | re.DOTALL)
    # 연속된 빈 줄 정리
    cleaned = re.sub(r'\n{3,}', '\n\n', cleaned)

    return section, cleaned.strip()


def parse_components(section_text: str) -> list[dict]:
    """섹션에서 개별 컴포넌트 파싱"""
    components = []

    # ### 컴포넌트명 [ ] 패턴으로 분리
    pattern = r'^### (.+?)(?:\s*\[.\])?[\s\S]*?(?=^### |\Z)'
    matches = re.findall(pattern, section_text, re.MULTILINE)

    # 각 컴포넌트 블록 추출
    blocks = re.split(r'^### ', section_text, flags=re.MULTILINE)[1:]  # 첫 번째는 헤더 부분

    for block in blocks:
        lines = block.strip().split('\n')
        if not lines:
            continue

        # 첫 줄에서 컴포넌트 이름 추출
        name_match = re.match(r'^(.+?)(?:\s*\[.\])?\s*$', lines[0])
        if name_match:
            name = name_match.group(1).strip()
            # 나머지 내용
            content = '\n'.join(lines[1:]).strip()
            components.append({
                'name': name,
                'content': content
            })

    return components


def merge_components(all_data: list[dict]) -> dict:
    """
    여러 페이지의 컴포넌트 병합

    Args:
        all_data: [{'page': 페이지명, 'components': [컴포넌트들]}]

    Returns:
        {컴포넌트명: {'pages': [페이지들], 'content': 첫 번째 내용}}
    """
    merged = {}

    for page_data in all_data:
        page_name = page_data['page']
        for comp in page_data['components']:
            name = comp['name']
            if name not in merged:
                merged[name] = {
                    'pages': [],
                    'content': comp['content']
                }
            merged[name]['pages'].append(page_name)

    return merged


def generate_output(merged: dict, page_count: int) -> str:
    """common_component.md 내용 생성"""
    lines = [
        "# 공통 컴포넌트 목록",
        "",
        "## 개요",
        f"- 분석된 페이지 수: {page_count}개",
        f"- 발견된 공통 컴포넌트: {len(merged)}개",
        "",
        "---",
        "",
        "## 컴포넌트 목록",
        ""
    ]

    for idx, (name, data) in enumerate(merged.items(), 1):
        pages_str = ", ".join(data['pages'])
        pages_count = f"({len(data['pages'])}/{page_count})"

        lines.append(f"### {idx}. {name} [ ]")
        lines.append(f"- **사용 페이지**: {pages_str} {pages_count}")

        # 원본 내용 추가 (있으면)
        if data['content']:
            lines.append(data['content'])

        lines.append("")
        lines.append("---")
        lines.append("")

    return '\n'.join(lines)


def get_page_name(filepath: Path) -> str:
    """파일명에서 페이지 이름 추출"""
    name = filepath.stem
    # checklist_ 접두사 제거
    if name.startswith("checklist_"):
        name = name[10:]
    # 언더스코어를 공백으로
    return name.replace("_", " ")


def main():
    # 스크립트 위치 기준으로 체크리스트 폴더 찾기
    script_dir = Path(__file__).parent
    checklist_dir = script_dir.parent / "checklist"

    if not checklist_dir.exists():
        print(f"Error: Checklist folder not found: {checklist_dir}")
        sys.exit(1)

    # 체크리스트 파일 찾기
    files = find_checklist_files(checklist_dir)

    if not files:
        print("No checklist files to process.")
        sys.exit(0)

    all_data = []
    modified_files = []

    for filepath in files:
        content = filepath.read_text(encoding='utf-8')
        section, cleaned = extract_common_section(content)

        if section:
            page_name = get_page_name(filepath)
            components = parse_components(section)

            if components:
                all_data.append({
                    'page': page_name,
                    'components': components
                })

                # 원본 파일 업데이트 (섹션 제거)
                filepath.write_text(cleaned, encoding='utf-8')
                modified_files.append(filepath.name)

    if not all_data:
        print("No common component sections found.")
        sys.exit(0)

    # 병합
    merged = merge_components(all_data)

    # 출력 파일 생성
    output_content = generate_output(merged, len(files))
    output_path = checklist_dir / "common_component.md"
    output_path.write_text(output_content, encoding='utf-8')

    # 결과 출력
    print(f"Done: common_component.md")
    print(f"Components: {len(merged)} | Modified files: {len(modified_files)}")


if __name__ == "__main__":
    main()
