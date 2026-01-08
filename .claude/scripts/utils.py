#!/usr/bin/env python3
"""
공용 유틸리티 함수 모음
모든 스크립트에서 import하여 사용
"""

import json
import sys
from pathlib import Path
from typing import Optional


def normalize_page_name(filename: str) -> str:
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


def load_json_safe(filepath: Path) -> Optional[dict]:
    """JSON 파일 안전 로드 (에러 처리 포함)

    Args:
        filepath: JSON 파일 경로

    Returns:
        파싱된 딕셔너리 또는 None (에러 시)
    """
    try:
        with open(filepath, 'r', encoding='utf-8') as f:
            return json.load(f)
    except (json.JSONDecodeError, IOError) as e:
        print(f"Warning: Failed to load {filepath.name}: {e}")
        return None


def save_json(filepath: Path, data: dict, ensure_ascii: bool = False) -> bool:
    """JSON 파일 저장

    Args:
        filepath: 저장 경로
        data: 저장할 데이터
        ensure_ascii: ASCII만 사용 여부

    Returns:
        성공 여부
    """
    try:
        filepath.parent.mkdir(parents=True, exist_ok=True)
        with open(filepath, 'w', encoding='utf-8') as f:
            json.dump(data, f, ensure_ascii=ensure_ascii, indent=2)
        return True
    except IOError as e:
        print(f"Error: Failed to save {filepath}: {e}")
        return False


def setup_windows_utf8():
    """Windows 환경에서 UTF-8 인코딩 설정"""
    if sys.platform == 'win32':
        import io
        sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding='utf-8')


def find_checklist_files(checklist_dir: Path, exclude_common: bool = True) -> list:
    """체크리스트 JSON 파일 목록 반환

    Args:
        checklist_dir: 체크리스트 디렉토리
        exclude_common: _common_component.json 제외 여부

    Returns:
        정렬된 파일 경로 목록
    """
    files = []
    for f in checklist_dir.glob("*.json"):
        if exclude_common and f.name == "_common_component.json":
            continue
        files.append(f)
    return sorted(files)


if __name__ == '__main__':
    # 테스트
    print("Testing normalize_page_name:")
    tests = [
        "A_Home_Desktop",
        "About_NIBEC_History",
        "About NIBEC > OVERVIEW",
    ]
    for t in tests:
        print(f"  {t} → {normalize_page_name(t)}")
