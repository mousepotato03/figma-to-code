---
description: figma-urls.json의 모든 URL에서 변수를 수집하여 theme.css 생성
---

다음 두 작업을 **병렬로** 수행해줘 (Task 도구를 사용하여 동시에 실행):

## Task 1: theme.css 생성 (subagent_type: general-purpose)

1. `.claude/figma-urls.json` 파일을 읽어서 모든 URL을 가져와
2. 각 URL에 대해 `mcp__figma__get_variable_defs` 함수를 호출해
3. 모든 결과를 merge해 (중복 키는 마지막 값으로 덮어쓰기)
4. 결과를 CSS 변수로 변환하여 `css/theme.css` 파일에 저장해

CSS 변환 규칙:
- 색상값 (#으로 시작): `--color-{name}: {value};`
- Font(...): 파싱하여 개별 CSS 변수로 분리
  - `--font-{name}-family: {family};`
  - `--font-{name}-size: {size}px;`
  - `--font-{name}-weight: {weight};`
  - `--font-{name}-line-height: {lineHeight};`
  - `--font-{name}-letter-spacing: {letterSpacing}px;`
- 숫자값: `--{name}: {value}px;`
- 변수명의 `/`는 `-`로 변환, 공백은 `-`로 변환, 소문자로 통일

## Task 2: reset.css 확인/생성 (subagent_type: general-purpose)

1. `css/reset.css` 파일이 존재하는지 확인
2. 없으면 기본 reset.css 생성 (box-sizing, margin/padding 초기화 등 포함)
