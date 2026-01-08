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
**중요: TaskOutput을 호출하지 마세요!** (컨텍스트 절약)

대신 파일 생성으로 완료 확인:
1. `sleep 60` 후 Glob으로 `.claude/checklist/*.json` 파일 개수 체크
2. 새로 생성된 파일 개수 = (현재 파일 수 - 기존 파일 수)
3. 새 파일 개수 >= URL 개수면 → 3단계 진행
4. 아니면 1분 후 다시 체크 (최대 5분, 5회 반복)

### 2-4. 타임아웃/실패 처리
5분 후에도 파일이 부족하면:

1. **실패한 URL 파악**
   - 예상 파일 수 vs 실제 생성된 파일 수 비교
   - 어떤 URL의 체크리스트가 없는지 확인

2. **AskUserQuestion으로 사용자에게 질문**
   ```
   AskUserQuestion 도구 호출:
   - question: "일부 페이지 분석이 실패했습니다 (N/M개 완료). 어떻게 할까요?"
   - header: "분석 실패"
   - options:
     - label: "재시도"
       description: "실패한 URL만 다시 분석 (최대 1회)"
     - label: "계속 진행"
       description: "성공한 파일들로 3단계 진행"
     - label: "중단"
       description: "작업 취소"
   ```

3. **사용자 선택에 따른 처리**
   - "재시도": 실패한 URL들만 다시 figma-page-analyzer 실행 → 2-3으로 복귀
   - "계속 진행": 성공한 파일들로 3단계 진행
   - "중단": 작업 종료

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
- 생성된 체크리스트 파일 목록 (*.json)
- 공통 컴포넌트 파일 경로 (`_common_component.json`)
- 최종 공통 컴포넌트 목록 (Navbar, Footer, Navbar_index 등)
