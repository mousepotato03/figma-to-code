---
description: Figma Variables를 추출하여 theme.css 파일을 생성합니다
allowed-tools: Read, Write, mcp__figma__get_variable_defs
---

# Theme Generator

Figma Variables를 CSS 커스텀 프로퍼티로 변환하여 theme.css를 생성합니다.

## 실행 절차

### 1. figma-urls.json 읽기

프로젝트 루트의 `figma-urls.json` 파일을 읽어 Figma URL 목록을 가져옵니다.

```json
{
  "urls": ["https://www.figma.com/design/FILE_KEY/..."]
}
```

### 2. URL에서 file_key 추출

각 URL에서 file_key를 추출합니다.

- 패턴: `https://www.figma.com/design/([a-zA-Z0-9]+)/...`
- 예시: `AryF9wmziio1738n3K7EQZ`

### 3. MCP get_variable_defs 호출

각 file_key에 대해 `mcp__figma__get_variable_defs` 도구를 호출하여 Variables 데이터를 가져옵니다.

### 4. CSS 변환 규칙

#### Collection → 섹션 주석

```css
/* ========================================
 * Collection Name
 * ======================================== */
```

#### Mode 처리

- 첫 번째 Mode (보통 Light) → `:root { }`
- Dark Mode가 있으면 → `[data-theme="dark"] { }`

#### Variable Name → CSS 변수명

- CamelCase/PascalCase → kebab-case
- 슬래시(/) → 하이픈(-)
- 예시: `colors/primary/500` → `--colors-primary-500`

#### 값 변환

- **Color**: hex (#RRGGBB) 또는 rgba()
- **Number**: 그대로 사용 (단위는 컨텍스트에 따라 px, rem 등 추가)
- **String**: 그대로 사용
- **Alias**: `var(--referenced-variable)` 형식으로 변환

### 5. theme.css 출력

`css/theme.css` 파일을 생성합니다.

## 출력 형식 예시

```css
:root {
  /* ========================================
   * Colors
   * ======================================== */
  --color-primary: #1e40af;
  --color-primary-light: #3b82f6;
  --color-primary-dark: #1e3a8a;

  --color-gray-50: #f9fafb;
  --color-gray-100: #f3f4f6;
  --color-gray-900: #111827;

  /* ========================================
   * Typography
   * ======================================== */
  --font-family-main: "Inter", sans-serif;
  --font-size-sm: 0.875rem;
  --font-size-base: 1rem;
  --font-size-lg: 1.125rem;

  /* ========================================
   * Spacing
   * ======================================== */
  --spacing-1: 0.25rem;
  --spacing-2: 0.5rem;
  --spacing-4: 1rem;

  /* ========================================
   * Effects
   * ======================================== */
  --radius-sm: 0.25rem;
  --radius-md: 0.5rem;
  --radius-lg: 1rem;
}

[data-theme="dark"] {
  --color-background: #111827;
  --color-text-primary: #f9fafb;
}
```

## 에러 처리

- `figma-urls.json` 파일이 없으면: 에러 메시지 출력 후 종료
- URL 형식이 잘못되면: 해당 URL 스킵하고 경고 출력
- MCP 호출 실패 시: 해당 파일 스킵하고 경고 출력, 나머지 파일 계속 처리

## 주의사항

- 기존 theme.css가 있으면, 기존 내용에서 추가할 부분만 추가합니다.
- 여러 Figma 파일의 Variables는 하나의 theme.css로 병합됩니다
