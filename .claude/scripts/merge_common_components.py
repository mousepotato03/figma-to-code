# -*- coding: utf-8 -*-
"""
공통 컴포넌트 병합 스크립트 (JSON 버전)

체크리스트 JSON 파일들에서 공통 컴포넌트를 추출하여
_common_component.json으로 통합합니다.
"""

import sys
from datetime import datetime
from pathlib import Path
from utils import find_checklist_files, load_json_safe, save_json


def extract_common_components(data: dict) -> list[dict]:
    """JSON 데이터에서 commonComponents 추출"""
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
        file_key = page_data.get('fileKey', '')  # 페이지 메타데이터에서 fileKey 가져옴
        for comp in page_data['components']:
            name = comp.get('name', 'Unknown')
            if name not in merged:
                merged[name] = {
                    'name': name,
                    'nodeId': comp.get('nodeId', ''),  # 첫 번째 occurrence의 nodeId를 대표로 사용
                    'occurrences': [],
                }

            # 출처 정보 추가 (v2 스키마: placement 사용)
            occurrence = {
                'page': page_name,
                'nodeId': comp.get('nodeId', ''),
                'fileKey': file_key,
                'placement': comp.get('placement', ''),  # v2 스키마 필드명
            }

            merged[name]['occurrences'].append(occurrence)

    return list(merged.values())


def update_source_file(filepath: Path, data: dict) -> bool:
    """
    원본 파일의 commonComponents를 참조 형태로 변환
    reference 필드 추가하여 통합됨을 표시
    """
    modified = False

    for comp in data.get('commonComponents', []):
        if comp.get('reference') != '_common_component.json':
            comp['reference'] = '_common_component.json'
            modified = True

    if modified:
        return save_json(filepath, data)

    return False


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
    modified_files = []

    for filepath in files:
        data = load_json_safe(filepath)

        if data:
            components = extract_common_components(data)
            metadata = data.get('metadata', {})
            page_name = metadata.get('pageName', filepath.stem)
            file_key = metadata.get('fileKey', '')  # 페이지 메타데이터에서 fileKey 추출

            if components:
                all_data.append({
                    'page': page_name,
                    'fileKey': file_key,  # fileKey 포함
                    'components': components
                })

                # 원본 파일 업데이트 (참조 형태로 변환)
                if update_source_file(filepath, data):
                    modified_files.append(filepath.name)

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
    print(f"Components: {len(merged)} | Modified files: {len(modified_files)}")


if __name__ == "__main__":
    main()
