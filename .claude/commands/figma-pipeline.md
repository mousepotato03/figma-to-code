---
description: Figma 구현 전체 파이프라인 실행 (theme → checklist → implement)
---

다음 작업을 순차적으로 수행해줘:

## 1단계: Theme 생성

`.claude/commands/figma-theme.md` 파일을 Read한 후, 그 내용대로 Task 에이전트(subagent_type: general-purpose)로 실행

## 2단계: Checklist 생성

`.claude/commands/figma-to-checklist.md` 파일을 Read한 후, 그 내용대로 실행

## 3단계: 구현

`.claude/commands/figma-implement.md` 파일을 Read한 후, 그 내용대로 실행

## 완료 조건

- 각 단계 완료 후 다음 단계 진행
- 모든 URL 구현 완료 시 "완료" 한 단어만 출력 (요약 금지, 컨텍스트 절약)
