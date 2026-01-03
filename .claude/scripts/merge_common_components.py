# -*- coding: utf-8 -*-
"""
공통 컴포넌트 병합 스크립트

체크리스트 파일들에서 공통 컴포넌트 섹션을 추출하여
_common_component.md로 통합합니다.

원본 파일에서는 섹션을 삭제하지 않고 참조 형태로 변환하여
메타데이터(위치, 크기)를 보존합니다.
"""

import re
import sys
from pathlib import Path


def find_checklist_files(checklist_dir: Path) -> list[Path]:
    """체크리스트 파일 목록 반환 (_common_component.md 제외)"""
    files = []
    for f in checklist_dir.glob("*.md"):
        if f.name != "_common_component.md":
            files.append(f)
    return sorted(files)


def extract_common_section(content: str) -> tuple[str | None, int, int]:
    """
    마크다운에서 공통 컴포넌트 섹션만 추출 (일회성 섹션 제외)

    Returns:
        (섹션 내용, 시작 위치, 끝 위치)
    """
    # 패턴: ## 공통 컴포넌트 ~ 다음 ## 헤더 직전까지
    # 일회성 섹션이 바로 붙어있어도 인식하도록 개선
    pattern = r'^(## (?:🔄 )?공통 컴포넌트[^\n]*\n.*?)(?=\n## |## (?:📄 )?일회성|\Z)'

    match = re.search(pattern, content, re.MULTILINE | re.DOTALL)

    if not match:
        return None, -1, -1

    section = match.group(1).strip()
    return section, match.start(), match.end()


def parse_components_with_metadata(section_text: str) -> list[dict]:
    """
    섹션에서 개별 컴포넌트와 메타데이터 파싱

    Returns:
        [{'name': 이름, 'content': 전체내용, 'metadata': 메타데이터만}]
    """
    components = []

    # 각 컴포넌트 블록 추출
    blocks = re.split(r'^### ', section_text, flags=re.MULTILINE)[1:]

    for block in blocks:
        lines = block.strip().split('\n')
        if not lines:
            continue

        # 첫 줄에서 컴포넌트 이름 추출 (대괄호 내용 포함해서 추출)
        name_match = re.match(r'^(.+?)(?:\s*\[.\])?\s*$', lines[0])
        if name_match:
            name = name_match.group(1).strip()
            content_lines = lines[1:]
            content = '\n'.join(content_lines).strip()

            # 메타데이터 추출 (위치, 크기 정보)
            metadata = extract_metadata(content_lines)

            components.append({
                'name': name,
                'content': content,
                'metadata': metadata
            })

    return components


def extract_metadata(lines: list[str]) -> dict:
    """컴포넌트 내용에서 메타데이터(위치, 크기) 추출"""
    metadata = {}

    for line in lines:
        line = line.strip()
        # 위치 정보
        if '위치' in line or 'y:' in line.lower():
            metadata['position'] = line.lstrip('- ').strip()
        # 크기 정보
        elif '크기' in line or 'x' in line.lower():
            if re.search(r'\d+\s*x\s*\d+', line, re.IGNORECASE):
                metadata['size'] = line.lstrip('- ').strip()

    return metadata


def transform_to_reference(content: str, section_start: int, section_end: int, section_text: str) -> str:
    """
    공통 컴포넌트 섹션을 참조 형태로 변환
    - 섹션 헤더에 참조 표시 추가
    - 각 컴포넌트에 [공통] 태그와 참조 링크 추가
    """
    # 섹션 헤더 변환
    new_section = section_text

    # 헤더 변환: ## 공통 컴포넌트 → ## 공통 컴포넌트 (→ _common_component.md 참조)
    new_section = re.sub(
        r'^(## (?:🔄 )?공통 컴포넌트)(\s*)$',
        r'\1 (→ _common_component.md 참조)\2',
        new_section,
        count=1,
        flags=re.MULTILINE
    )

    # 각 컴포넌트의 체크박스를 [공통]으로 변경
    new_section = re.sub(
        r'^(### .+?)\s*\[\s*\]\s*$',
        r'\1 [공통]',
        new_section,
        flags=re.MULTILINE
    )

    # 원본 내용에서 섹션 교체
    before = content[:section_start]
    after = content[section_end:]

    return before + new_section + after


def merge_components(all_data: list[dict]) -> dict:
    """
    여러 페이지의 컴포넌트 병합 (출처별 메타데이터 보존)

    Args:
        all_data: [{'page': 페이지명, 'filepath': 파일경로, 'components': [컴포넌트들]}]

    Returns:
        {컴포넌트명: {'pages': [{'name': 페이지명, 'metadata': {...}}], 'content': 첫번째 내용}}
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
            merged[name]['pages'].append({
                'name': page_name,
                'metadata': comp.get('metadata', {})
            })

    return merged


def generate_output(merged: dict, page_count: int) -> str:
    """_common_component.md 내용 생성 (출처별 메타데이터 포함)"""
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
        page_names = [p['name'] for p in data['pages']]
        pages_str = ", ".join(page_names)
        pages_count = f"({len(data['pages'])}/{page_count})"

        lines.append(f"### {idx}. {name} [ ]")

        # 출처별 메타데이터 (사용 페이지 개수 포함)
        has_metadata = any(p.get('metadata') for p in data['pages'])
        if has_metadata:
            lines.append(f"- **출처별 메타데이터** {pages_count}:")
            for page_info in data['pages']:
                meta = page_info.get('metadata', {})
                if meta:
                    meta_parts = []
                    if 'position' in meta:
                        meta_parts.append(meta['position'])
                    if 'size' in meta:
                        meta_parts.append(meta['size'])
                    if meta_parts:
                        lines.append(f"  - {page_info['name']}: {', '.join(meta_parts)}")
        else:
            # 메타데이터 없으면 사용 페이지 목록만 표시
            lines.append(f"- **사용 페이지** {pages_count}: {pages_str}")

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
        section, start, end = extract_common_section(content)

        if section:
            page_name = get_page_name(filepath)
            components = parse_components_with_metadata(section)

            if components:
                all_data.append({
                    'page': page_name,
                    'filepath': filepath,
                    'components': components
                })

                # 원본 파일 업데이트 (참조 형태로 변환)
                transformed = transform_to_reference(content, start, end, section)
                filepath.write_text(transformed, encoding='utf-8')
                modified_files.append(filepath.name)

    if not all_data:
        print("No common component sections found.")
        sys.exit(0)

    # 병합
    merged = merge_components(all_data)

    # 출력 파일 생성
    output_content = generate_output(merged, len(files))
    output_path = checklist_dir / "_common_component.md"
    output_path.write_text(output_content, encoding='utf-8')

    # 결과 출력
    print(f"Done: _common_component.md")
    print(f"Components: {len(merged)} | Modified files: {len(modified_files)}")


if __name__ == "__main__":
    main()
