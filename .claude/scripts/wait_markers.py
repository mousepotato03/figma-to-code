#!/usr/bin/env python3
"""
마커 파일 폴링 대기 스크립트
배치 실행 후 마커 파일이 생성될 때까지 대기

사용법:
  # 마커 개수 기반 대기 (*.done, *.failed 파일 카운팅)
  python wait_markers.py --path .claude/markers/common --count 5
  python wait_markers.py --path .claude/markers/home --count 3 --interval 60 --timeout 900

  # 특정 파일 대기 (--pattern 옵션)
  python wait_markers.py --path .claude/markers/home --pattern merged.done --timeout 120
  python wait_markers.py --path .claude/markers/home --pattern page.completed --interval 10

출력:
  SUCCESS|done:5|failed:0|new:5|elapsed:180      (--count 모드)
  SUCCESS|pattern:merged.done|elapsed:45         (--pattern 모드)
  TIMEOUT|done:3|failed:1|new:4|elapsed:1800     (--count 타임아웃)
  TIMEOUT|pattern:page.completed|elapsed:120     (--pattern 타임아웃)
"""

import argparse
import time
import sys
from pathlib import Path


def count_markers(path: Path) -> tuple:
    """마커 파일 개수 반환

    Returns:
        (done 개수, failed 개수)
    """
    if not path.exists():
        return 0, 0

    done = len(list(path.glob("*.done")))
    failed = len(list(path.glob("*.failed")))
    return done, failed


def wait_for_pattern(path: Path, pattern: str, interval: int, timeout: int) -> int:
    """특정 패턴의 마커 파일 대기

    Args:
        path: 마커 디렉토리 경로
        pattern: 대기할 파일명 (예: page.completed, merged.done)
        interval: 폴링 간격 (초)
        timeout: 최대 대기 시간 (초)

    Returns:
        0: 성공 (파일 발견), 1: 타임아웃
    """
    target_file = path / pattern
    start_time = time.time()

    while True:
        elapsed = int(time.time() - start_time)

        # 파일 존재 확인
        if target_file.exists():
            print(f"SUCCESS|pattern:{pattern}|elapsed:{elapsed}")
            return 0

        # 타임아웃 체크
        if elapsed >= timeout:
            print(f"TIMEOUT|pattern:{pattern}|elapsed:{elapsed}")
            return 1

        # 대기
        time.sleep(interval)


def wait_for_markers(path: Path, count: int, interval: int, timeout: int) -> int:
    """마커 폴링 메인 로직

    Args:
        path: 마커 디렉토리 경로
        count: 필요한 새 마커 개수
        interval: 폴링 간격 (초)
        timeout: 최대 대기 시간 (초)

    Returns:
        0: 성공, 1: 타임아웃
    """
    # 시작 시점 마커 개수 기록
    initial_done, initial_failed = count_markers(path)
    initial_count = initial_done + initial_failed

    start_time = time.time()
    current_done, current_failed = initial_done, initial_failed
    new_markers = 0

    while True:
        elapsed = int(time.time() - start_time)

        # 타임아웃 체크
        if elapsed >= timeout:
            print(f"TIMEOUT|done:{current_done}|failed:{current_failed}|new:{new_markers}|elapsed:{elapsed}")
            return 1

        # 대기
        time.sleep(interval)

        # 현재 마커 개수 확인
        current_done, current_failed = count_markers(path)
        current_count = current_done + current_failed
        new_markers = current_count - initial_count

        elapsed = int(time.time() - start_time)

        # 필요한 수 도달 시 성공
        if new_markers >= count:
            print(f"SUCCESS|done:{current_done}|failed:{current_failed}|new:{new_markers}|elapsed:{elapsed}")
            return 0


def main():
    parser = argparse.ArgumentParser(
        description='마커 파일 폴링 대기',
        formatter_class=argparse.RawDescriptionHelpFormatter,
        epilog='''
예시:
  python wait_markers.py --path .claude/markers/common --count 5
  python wait_markers.py --path .claude/markers/home --count 3 --interval 60 --timeout 900
  python wait_markers.py --path .claude/markers/home --pattern merged.done --timeout 120
        '''
    )
    parser.add_argument('--path', required=True, help='마커 디렉토리 경로')
    parser.add_argument('--count', type=int, help='필요한 새 마커 개수 (--pattern과 함께 사용 불가)')
    parser.add_argument('--pattern', help='특정 마커 파일명 (예: page.completed, merged.done)')
    parser.add_argument('--interval', type=int, default=90, help='폴링 간격 (초, 기본값: 90)')
    parser.add_argument('--timeout', type=int, default=480, help='최대 대기 시간 (초, 기본값: 480)')

    args = parser.parse_args()

    # --count 또는 --pattern 중 하나는 필수
    if not args.count and not args.pattern:
        parser.error('--count 또는 --pattern 중 하나는 필수입니다')

    if args.count and args.pattern:
        parser.error('--count와 --pattern은 동시에 사용할 수 없습니다')

    if args.pattern:
        exit_code = wait_for_pattern(
            Path(args.path),
            args.pattern,
            args.interval,
            args.timeout
        )
    else:
        exit_code = wait_for_markers(
            Path(args.path),
            args.count,
            args.interval,
            args.timeout
        )

    sys.exit(exit_code)


if __name__ == "__main__":
    main()
