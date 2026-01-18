#!/usr/bin/env python3
"""
범용 파일 폴링 대기 스크립트
지정한 조건의 파일이 생성될 때까지 대기

사용법:
  # glob 패턴으로 파일 개수 대기
  python wait_files.py --path .claude/checklists --glob "*.json" --count 2
  python wait_files.py --path .claude/markers/home --glob "*.done" --count 5

  # 마커 모드 (*.done + *.failed 자동 카운팅)
  python wait_files.py --path .claude/markers/common --mode marker --count 5

  # 특정 파일 대기
  python wait_files.py --path .claude/markers/home --file merged.done
  python wait_files.py --path .claude/checklistss --file home.json

  # 옵션
  --timeout: 최대 대기 시간 (초, 기본값: 600)

출력:
  SUCCESS|found:2|elapsed:45
  TIMEOUT|found:1|expected:2|elapsed:600
"""

import argparse
import time
import sys
from pathlib import Path

POLL_INTERVAL = 5  # 5초마다 체크


def count_files_by_glob(path: Path, pattern: str) -> int:
    """glob 패턴으로 파일 개수 반환"""
    if not path.exists():
        return 0
    return len(list(path.glob(pattern)))


def count_markers(path: Path) -> tuple:
    """마커 파일 개수 반환 (done, failed)"""
    if not path.exists():
        return 0, 0
    done = len(list(path.glob("*.done")))
    failed = len(list(path.glob("*.failed")))
    return done, failed


def wait_for_file(path: Path, filename: str, timeout: int) -> int:
    """특정 파일 대기

    Returns:
        0: 성공, 1: 타임아웃
    """
    target = path / filename
    start_time = time.time()

    # 즉시 체크 (이미 존재하는 경우)
    if target.exists():
        print(f"SUCCESS|file:{filename}|elapsed:0")
        return 0

    while True:
        elapsed = int(time.time() - start_time)

        if target.exists():
            print(f"SUCCESS|file:{filename}|elapsed:{elapsed}")
            return 0

        if elapsed >= timeout:
            print(f"TIMEOUT|file:{filename}|elapsed:{elapsed}")
            return 1

        time.sleep(POLL_INTERVAL)


def wait_for_count(path: Path, glob_pattern: str, count: int, timeout: int) -> int:
    """glob 패턴으로 파일 개수 대기

    Returns:
        0: 성공, 1: 타임아웃
    """
    start_time = time.time()

    # 즉시 체크
    current = count_files_by_glob(path, glob_pattern)
    if current >= count:
        print(f"SUCCESS|found:{current}|expected:{count}|elapsed:0")
        return 0

    while True:
        elapsed = int(time.time() - start_time)

        if elapsed >= timeout:
            print(f"TIMEOUT|found:{current}|expected:{count}|elapsed:{elapsed}")
            return 1

        time.sleep(POLL_INTERVAL)

        current = count_files_by_glob(path, glob_pattern)
        elapsed = int(time.time() - start_time)

        if current >= count:
            print(f"SUCCESS|found:{current}|expected:{count}|elapsed:{elapsed}")
            return 0


def wait_for_markers(path: Path, count: int, timeout: int) -> int:
    """마커 모드: *.done + *.failed 파일 개수 대기

    Returns:
        0: 성공, 1: 타임아웃
    """
    initial_done, initial_failed = count_markers(path)
    initial_total = initial_done + initial_failed

    start_time = time.time()

    while True:
        elapsed = int(time.time() - start_time)

        if elapsed >= timeout:
            current_done, current_failed = count_markers(path)
            new_count = (current_done + current_failed) - initial_total
            print(f"TIMEOUT|done:{current_done}|failed:{current_failed}|new:{new_count}|expected:{count}|elapsed:{elapsed}")
            return 1

        time.sleep(POLL_INTERVAL)

        current_done, current_failed = count_markers(path)
        current_total = current_done + current_failed
        new_count = current_total - initial_total
        elapsed = int(time.time() - start_time)

        if new_count >= count:
            print(f"SUCCESS|done:{current_done}|failed:{current_failed}|new:{new_count}|elapsed:{elapsed}")
            return 0


def main():
    parser = argparse.ArgumentParser(
        description='범용 파일 폴링 대기',
        formatter_class=argparse.RawDescriptionHelpFormatter,
        epilog='''
예시:
  # 체크리스트 JSON 파일 2개 대기
  python wait_files.py --path .claude/checklists --glob "*.json" --count 2

  # 마커 파일 5개 대기 (*.done + *.failed)
  python wait_files.py --path .claude/markers/home --mode marker --count 5

  # 특정 파일 대기
  python wait_files.py --path .claude/markers/home --file merged.done
        '''
    )

    parser.add_argument('--path', required=True, help='대상 디렉토리 경로')
    parser.add_argument('--glob', help='glob 패턴 (예: *.json, *.done)')
    parser.add_argument('--mode', choices=['marker'], help='marker: *.done + *.failed 자동 카운팅')
    parser.add_argument('--file', help='특정 파일명 대기')
    parser.add_argument('--count', type=int, help='필요한 파일 개수')
    parser.add_argument('--timeout', type=int, default=600, help='최대 대기 시간 (초, 기본값: 600)')

    args = parser.parse_args()
    path = Path(args.path)

    # 모드 검증
    modes_specified = sum([
        bool(args.glob),
        bool(args.mode),
        bool(args.file)
    ])

    if modes_specified == 0:
        parser.error('--glob, --mode, --file 중 하나는 필수입니다')

    if modes_specified > 1:
        parser.error('--glob, --mode, --file 중 하나만 사용 가능합니다')

    # --file 모드
    if args.file:
        exit_code = wait_for_file(path, args.file, args.timeout)

    # --glob 모드
    elif args.glob:
        if not args.count:
            parser.error('--glob 사용 시 --count는 필수입니다')
        exit_code = wait_for_count(path, args.glob, args.count, args.timeout)

    # --mode marker
    elif args.mode == 'marker':
        if not args.count:
            parser.error('--mode marker 사용 시 --count는 필수입니다')
        exit_code = wait_for_markers(path, args.count, args.timeout)

    sys.exit(exit_code)


if __name__ == "__main__":
    main()
