---
description: Figma URL들을 분석하여 체크리스트 생성 후 공통 컴포넌트 추출
arguments:
  - name: count
    description: 분석할 URL 개수 (기본값: 전체)
    required: false
---

다음 작업을 순차적으로 수행해줘:

## 1단계: URL 데이터 로드

`.claude/figma-urls.json`에서 URL 목록을 읽어와.

- count 인자가 있으면: 상위 {count}개만 사용
- count 인자가 없으면: 전체 URL 사용

## 2단계: 페이지 분석 (배치 병렬 실행)

URL들을 5개씩 배치로 나누어 **병렬 실행**:

```
BATCH_SIZE = 5

batches = split(urls, BATCH_SIZE)  # URL을 5개씩 그룹화

for each batch in batches:
  1. 배치 내 모든 URL 병렬 실행:
     for each URL in batch (parallel):
       Task 도구 호출:
         - subagent_type: "figma-page-analyzer"
         - prompt: URL
         - run_in_background: true

  2. 배치 완료 대기 (마커 폴링):
     - sleep 30초
     - 체크리스트 파일 개수 확인
     - 예상 개수에 도달하면 다음 배치로
     - 최대 10회 반복 (30초 × 10 = 5분)

  3. 다음 배치로 진행
```

### 체크리스트 파일 확인 방법

체크리스트 파일은 **정확히** 아래 경로에 생성됨:

```
.claude/checklist/*.json
```

파일 존재 확인 시 반드시 아래 Glob 패턴 사용:

```
Glob(pattern: "*.json", path: ".claude/checklist")
```

또는 Python 명령어 (플랫폼 독립적):

```bash
python -c "from pathlib import Path; print(len(list(Path('.claude/checklist').glob('*.json'))))"
```

**중요: TaskOutput 호출 금지**

### 타임아웃/실패 처리

개별 URL이 5분 후에도 완료되지 않으면:

- 해당 URL 건너뛰고 다음 URL 진행
- 최종 보고 시 실패 URL 목록 포함

## 3단계: 공통 컴포넌트 1차 병합 (순차 실행)

2단계의 모든 체크리스트가 생성된 후에,
아래 파이썬 스크립트를 실행하여 공통 컴포넌트를 추출해줘:

```bash
python .claude/scripts/merge_common_components.py
```

**동작**:

- 각 체크리스트 JSON의 commonComponents를 참조 형태로 변환
- `_common_component.json`에 모든 공통 컴포넌트 수집

**중요**: 이 단계는 반드시 2단계가 완료된 후에 실행

## 4단계: 공통 컴포넌트 중복 정리

3단계 완료 후, common-component-merger 에이전트를 실행해줘.

```
Task 도구 호출 시:
- subagent_type: "common-component-merger"
```

**동작**:

- 예를들어 `Navbar`, `Navbar (상단 네비게이션)`, `Navbar [Instance]` → 컴포넌트 하나로 통합
- 사용 페이지 목록과 출처별 메타데이터 병합

## 완료 보고

"체크리스트 생성 완료" 한 줄만 출력 (상세 요약 금지, 컨텍스트 절약)
