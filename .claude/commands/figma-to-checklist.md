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

## 2단계: 페이지 분석 (순차 실행)

각 URL에 대해 figma-page-analyzer 에이전트를 **순차적으로** 실행:

```
for each URL in urls:
  1. Task 도구 호출:
     - subagent_type: "figma-page-analyzer"
     - prompt: URL
     - run_in_background: true

  2. 완료 대기 (마커 폴링):
     - sleep 30초
     - Glob으로 해당 URL의 체크리스트 파일 존재 확인
     - 최대 10회 반복 (30초 × 10 = 5분)

  3. 다음 URL로 진행
```

**중요: TaskOutput 호출 금지** (컨텍스트 절약)

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
- `Navbar`, `Navbar (상단 네비게이션)`, `Navbar [Instance]` → 하나의 `Navbar`로 통합
- 사용 페이지 목록과 출처별 메타데이터 병합

## 완료 보고
"체크리스트 생성 완료" 한 줄만 출력 (상세 요약 금지, 컨텍스트 절약)
