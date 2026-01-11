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

## 2단계: 페이지 분석 (백그라운드 병렬 실행)

### 2-1. 사전 준비
1. Glob으로 `.claude/checklist/*.json` 파일 목록을 확인하고 **기존 파일 개수**를 기억
2. 분석할 **URL 개수**를 기억

### 2-2. 백그라운드 실행
각 URL에 대해 figma-page-analyzer 에이전트를 병렬로 실행:
```
Task 도구 호출 시:
- subagent_type: "figma-page-analyzer"
- prompt: URL
- run_in_background: true
```

### 2-3. 완료 대기 (파일 폴링)

**중요: TaskOutput 호출 금지** (컨텍스트 절약)

폴링 로직:
1. `sleep 60` 후 Glob으로 `.claude/checklist/*.json` 파일 개수 체크
2. 새 파일 개수 >= URL 개수 → 3단계 진행
3. 최대 5분, 5회 반복

### 2-4. 타임아웃/실패 처리

5분 후에도 파일 부족시 AskUserQuestion으로 사용자에게 재시도/계속/중단 선택 요청

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
