---
description: Figma 구현 전체 파이프라인 실행 (base CSS → checklist → implement → fonts)
---

다음 작업을 순차적으로 수행해줘:

## 1단계: 기본 CSS 확인

```bash
python .claude/scripts/ensure_base_css.py
```

reset.css가 없으면 자동 생성됨

## 2단계: Checklist 생성

`.claude/commands/figma-to-checklist.md` 파일을 Read한 후, 그 내용대로 실행

## 3단계: 구현

`.claude/commands/figma-implement.md` 파일을 Read한 후, 그 내용대로 실행

## 4단계: 폰트 설정

```bash
python .claude/scripts/setup_fonts.py
```

- 구현 과정에서 수집된 폰트 정보(`.claude/fonts.json`)를 바탕으로 설정
- Google Fonts에서 다운로드 가능한 폰트는 자동으로 `css/fonts.css`에 @import 추가
- 다운로드 불가능한 폰트는 목록으로 출력되며, 직접 폰트 파일을 추가해야 함

## 완료 조건

- 각 단계 완료 후 다음 단계 진행
- 모든 URL 구현 완료 시 "완료" 출력
