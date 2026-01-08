---
description: Figma 구현 전체 파이프라인 실행 (theme → checklist → implement)
---

다음 작업을 순차적으로 수행해줘:

## 1단계: Theme 생성
/figma-theme 실행

## 2단계: Checklist 생성
/figma-to-checklist 실행

## 3단계: 구현
figma-urls.json의 각 URL에 대해 /figma-implement 실행

## 완료 조건
- 각 단계 완료 후 다음 단계 진행
- 모든 URL 구현 완료 시 요약 출력
