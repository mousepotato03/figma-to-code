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

## 2단계: 페이지 분석 (병렬 실행)
각 URL에 대해 figma-page-analyzer 에이전트를 병렬로 실행해줘.

### 실행 방법
```
Task 도구 호출 시:
- subagent_type: "figma-page-analyzer"
- prompt: URL 정보 (fileKey, nodeId, 파일명)
```

### 예시 (URL 3개인 경우):
단일 메시지에 3개 Task 호출 → 병렬 실행 → 모든 Task 완료 시 자동으로 다음 단계 진행

## 3단계: 공통 컴포넌트 1차 병합 (순차 실행)
2단계의 모든 체크리스트가 생성된 후에,
아래 파이썬 스크립트를 실행하여 공통 컴포넌트를 추출해줘:

```bash
python .claude/scripts/merge_common_components.py
```

**동작**:
- 각 체크리스트의 공통 컴포넌트 섹션을 참조 형태로 변환 (메타데이터 보존)
- `common_component.md`에 모든 공통 컴포넌트 수집

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
- 생성된 체크리스트 파일 목록
- 공통 컴포넌트 파일 경로
- 최종 공통 컴포넌트 목록 (Navbar, Footer, Navbar_index)
