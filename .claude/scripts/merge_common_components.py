# -*- coding: utf-8 -*-
"""
공통 컴포넌트 병합 스크립트 (v5 스키마 지원)

체크리스트 JSON 파일들에서 공통 컴포넌트(type: "common")를 추출하여
_common_component.json으로 통합합니다.
"""

import sys
from datetime import datetime
from pathlib import Path
from utils import find_checklist_files, load_json_safe, save_json


def extract_common_components_v5(data: dict) -> list[dict]:
    """
    v5 스키마: nodes 배열에서 type='common'인 항목 추출
    v4 스키마 (하위 호환): commonComponents 배열 추출
    """
    # v5 스키마 확인
    if data.get('$schema') == 'checklist-v5' and 'nodes' in data:
        return [
            node for node in data.get('nodes', [])
            if node.get('type') == 'common'
        ]

    # v4 스키마 (하위 호환)
    return data.get('commonComponents', [])


def merge_components(all_data: list[dict]) -> list[dict]:
    """
    여러 페이지의 컴포넌트 병합 (출처별 메타데이터 보존)

    Args:
        all_data: [{'page': 페이지명, 'fileKey': 파일키, 'components': [컴포넌트들]}]

    Returns:
        병합된 컴포넌트 목록
    """
    merged = {}

    for page_data in all_data:
        page_name = page_data['page']
        file_key = page_data.get('fileKey', '')
        for comp in page_data['components']:
            name = comp.get('name', 'Unknown')
            if name not in merged:
                merged[name] = {
                    'name': name,
                    'nodeId': comp.get('nodeId', ''),
                    'occurrences': [],
                }

            # 출처 정보 추가
            occurrence = {
                'page': page_name,
                'nodeId': comp.get('nodeId', ''),
                'fileKey': file_key,
            }

            merged[name]['occurrences'].append(occurrence)

    return list(merged.values())


def generate_output(merged: list[dict], page_count: int) -> dict:
    """_common_component.json 내용 생성"""
    return {
        "$schema": "common-components-v2",
        "metadata": {
            "totalPages": page_count,
            "generatedAt": datetime.now().isoformat()
        },
        "components": merged
    }


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

    for filepath in files:
        data = load_json_safe(filepath)

        if data:
            # v5 또는 v4 스키마에서 공통 컴포넌트 추출
            components = extract_common_components_v5(data)
            metadata = data.get('metadata', {})
            page_name = metadata.get('pageName', filepath.stem)
            file_key = metadata.get('fileKey', '')

            if components:
                all_data.append({
                    'page': page_name,
                    'fileKey': file_key,
                    'components': components
                })

    if not all_data:
        print("No common components found.")
        sys.exit(0)

    # 병합
    merged = merge_components(all_data)

    # 출력 파일 생성
    output_content = generate_output(merged, len(files))
    output_path = checklist_dir / "_common_component.json"
    save_json(output_path, output_content)

    # 결과 출력
    print(f"Done: _common_component.json")
    print(f"Components: {len(merged)}")


if __name__ == "__main__":
    main()
