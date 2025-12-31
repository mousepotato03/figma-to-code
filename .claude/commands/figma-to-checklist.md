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
각 URL에 대해 figma-page-analyzer 에이전트를 1개씩 할당하여 **병렬로** 실행해줘.

예시 (URL 3개인 경우):
- 에이전트 1 → URL 1번 분석 → 체크리스트 1 생성
- 에이전트 2 → URL 2번 분석 → 체크리스트 2 생성
- 에이전트 3 → URL 3번 분석 → 체크리스트 3 생성

**중요**:
- 반드시 URL 개수만큼 에이전트를 생성하여 병렬 실행
- 모든 에이전트가 완료될 때까지 대기

## 3단계: 공통 컴포넌트 병합 (순차 실행)
2단계의 모든 체크리스트가 생성된 후에,
아래 파이썬 스크립트를 실행하여 공통 컴포넌트를 추출해줘:

```bash
python .claude/scripts/merge_common_components.py
```

**중요**: 이 단계는 반드시 2단계가 완료된 후에 실행

## 완료 보고
- 생성된 체크리스트 파일 목록
- 공통 컴포넌트 파일 경로
- 각 페이지에서 발견된 공통 컴포넌트 요약
