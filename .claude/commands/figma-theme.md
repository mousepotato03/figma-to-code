---
description: Figma Variables를 추출하여 theme.css 파일을 생성합니다
allowed-tools: Read, Write, Bash, mcp__figma__get_variable_defs
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

### 2. URL 파싱 (parse_figma_urls 스킬 사용)

`parse_figma_urls` 스킬을 실행하여 URL에서 fileKey와 nodeId를 추출합니다.

```bash
python .claude/skills/parse_figma_urls/scripts/parse_figma_urls.py
```

**결과**: `figma-urls.json`에 `parsed` 객체가 추가됩니다.

```json
{
  "urls": ["..."],
  "parsed": {
    "PbENz9XeDICQsut5z1DfiC": ["2413:13474", "2413:12132", "2413:12335"]
  }
}
```

스킬이 자동으로 처리하는 것:
- URL에서 fileKey와 nodeId 추출
- nodeId 형식 변환 (`2413-13474` → `2413:13474`)
- 중복 제거 및 fileKey별 그룹화

### 3. Variables 수집 및 병합

**3.1 모든 nodeId에 대해 반복 호출**

`figma-urls.json`의 `parsed` 객체에서 각 fileKey의 모든 nodeId에 대해 `mcp__figma__get_variable_defs` 호출:

```
For each fileKey:
  For each nodeId in fileKey:
    variables = mcp__figma__get_variable_defs(fileKey, nodeId)
    Merge into collection
```

**3.2 병합 및 중복 처리**

- 중복 변수명 발견 시: 첫 번째 값 유지
- 경고 로그: `⚠ Duplicate variable '{name}' found in node {nodeId} (keeping first from {originalNodeId})`
- 모든 고유 변수를 최종 컬렉션에 저장

**3.3 로그 출력 예시**

```
✓ Collected 45 variables from node 2413:13474
✓ Collected 12 variables from node 2413:12132 (3 duplicates skipped)
✓ Total unique variables: 57
```

### 4. 폰트 감지 및 Import 생성

**4.1 사용된 폰트 추출**

모든 typography 변수에서 font-family 스캔:
- 고유 폰트명 수집 (예: "Paperlogy", "Pretendard", "Poppins")
- 각 폰트별 사용된 font-weight 수집

**4.2 폰트 분류**

내장 폰트 데이터베이스로 분류:

```javascript
const KNOWN_FONTS = {
  // Google Fonts
  "Poppins": { type: "google-fonts" },
  "Inter": { type: "google-fonts" },
  "Roboto": { type: "google-fonts" },
  "Open Sans": { type: "google-fonts" },
  "Lato": { type: "google-fonts" },
  "Montserrat": { type: "google-fonts" },

  // CDN (Open Source)
  "Pretendard": {
    type: "cdn",
    url: "https://cdn.jsdelivr.net/gh/orioncactus/pretendard@v1.3.9/dist/web/static/pretendard.min.css"
  },
  "Noto Sans KR": { type: "google-fonts" },
  "Nanum Gothic": { type: "google-fonts" },

  // Commercial Fonts
  "Paperlogy": { type: "commercial" },
  "Neue Haas Grotesk": { type: "commercial" },
  "Proxima Nova": { type: "commercial" }
};
```

**4.3 Import 문 생성**

폰트 타입에 따라 적절한 import 생성:

- **Google Fonts**:
  ```css
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
  ```

- **CDN Fonts**:
  ```css
  @import url('https://cdn.jsdelivr.net/gh/orioncactus/pretendard@v1.3.9/dist/web/static/pretendard.min.css');
  ```

- **Commercial/Unknown Fonts**: 주석으로 수동 설정 가이드 제공
  ```css
  /* Paperlogy Font - Commercial License Required
   * Required weights: 700, 800
   *
   * Add @font-face declarations here:
   * @font-face {
   *   font-family: 'Paperlogy';
   *   src: url('/fonts/paperlogy-bold.woff2') format('woff2');
   *   font-weight: 700;
   *   font-display: swap;
   * }
   */
  ```

### 5. 타이포그래피 유틸리티 클래스 생성

**5.1 클래스명 생성 규칙**

변수 패턴 `--{category}-{variant}-{property}`에서 클래스명 추출:
- `--title-h1-font-family` → `.title-h1`
- `--body-large-font-family` → `.body-large`
- `--display-menu-strong-font-family` → `.display-menu-strong`

**5.2 필수 속성 확인**

유틸리티 클래스 생성 조건:
- `font-family` (필수)
- `font-weight` (필수)
- `font-size` (필수)
- `line-height` (권장)
- `letter-spacing` (선택)

**5.3 클래스 생성**

각 typography 토큰에 대해 CSS 클래스 생성:

```css
.title-h1 {
  font-family: var(--title-h1-font-family);
  font-weight: var(--title-h1-font-weight);
  font-size: var(--title-h1-font-size);
  line-height: var(--title-h1-line-height);
  letter-spacing: var(--title-h1-letter-spacing);
}

.body-large {
  font-family: var(--body-large-font-family);
  font-weight: var(--body-large-font-weight);
  font-size: var(--body-large-font-size);
  line-height: var(--body-large-line-height);
  letter-spacing: var(--body-large-letter-spacing);
}
```

### 6. CSS 변환 규칙

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

### 7. theme.css 파일 구조 생성

**최종 CSS 파일 구조:**

```css
/* 1. Font Imports (최상단) */
@import url('...');

/* 2. Commercial Font Instructions */
/* Manual setup required... */

/* 3. CSS Custom Properties */
:root {
  /* Variables organized by category */
}

/* 4. Typography Utility Classes */
.title-h1 { ... }
.body-large { ... }

/* 5. Dark Mode Overrides (if applicable) */
[data-theme="dark"] {
  /* Dark mode variables */
}
```

**파일 위치:** `css/theme.css`

## 출력 형식 예시

```css
/* ========================================
 * Font Imports
 * Auto-generated from Figma Variables
 * ======================================== */

/* Google Fonts - Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

/* Korean Font - Pretendard (Open Source) */
@import url('https://cdn.jsdelivr.net/gh/orioncactus/pretendard@v1.3.9/dist/web/static/pretendard.min.css');

/* ========================================
 * Commercial/Custom Fonts Require Manual Setup
 * ======================================== */

/* Paperlogy Font - Commercial License Required
 * Required weights: 700, 800
 *
 * Add your @font-face declarations here:
 * @font-face {
 *   font-family: 'Paperlogy';
 *   src: url('/fonts/paperlogy-bold.woff2') format('woff2');
 *   font-weight: 700;
 *   font-display: swap;
 * }
 */

:root {
  /* ========================================
   * Colors
   * ======================================== */
  --color-scheme-1-background: #ffffff;
  --color-scheme-1-text: #000000;
  --gray: #283C36;
  --logogreen: #006241;
  --lightgray: #F6F5F2;

  /* ========================================
   * Typography - Variables
   * ======================================== */
  --title-h1-font-family: "Paperlogy";
  --title-h1-font-weight: 800;
  --title-h1-font-size: 60px;
  --title-h1-line-height: 1.2;
  --title-h1-letter-spacing: -1px;

  --body-large-font-family: "Pretendard";
  --body-large-font-weight: 400;
  --body-large-font-size: 20px;
  --body-large-line-height: 1.6;
  --body-large-letter-spacing: -2px;

  --button-font-family: "Poppins";
  --button-font-weight: 500;
  --button-font-size: 14px;
  --button-line-height: 1.5;
  --button-letter-spacing: 0;

  /* ========================================
   * Spacing
   * ======================================== */
  --page-padding-padding-global: 64px;
  --section-padding-padding-section-medium: 80px;

  /* ========================================
   * Effects & Borders
   * ======================================== */
  --stroke-border-width: 1px;
  --radius-large: 0;
}

/* ========================================
 * Typography Utility Classes
 * Auto-generated from Figma Variables
 * ======================================== */

/* Title Styles */
.title-h1 {
  font-family: var(--title-h1-font-family);
  font-weight: var(--title-h1-font-weight);
  font-size: var(--title-h1-font-size);
  line-height: var(--title-h1-line-height);
  letter-spacing: var(--title-h1-letter-spacing);
}

/* Body Text Styles */
.body-large {
  font-family: var(--body-large-font-family);
  font-weight: var(--body-large-font-weight);
  font-size: var(--body-large-font-size);
  line-height: var(--body-large-line-height);
  letter-spacing: var(--body-large-letter-spacing);
}

/* UI Component Styles */
.button {
  font-family: var(--button-font-family);
  font-weight: var(--button-font-weight);
  font-size: var(--button-font-size);
  line-height: var(--button-line-height);
  letter-spacing: var(--button-letter-spacing);
}

/* Dark Mode (if applicable) */
[data-theme="dark"] {
  --color-scheme-1-background: #111827;
  --color-scheme-1-text: #f9fafb;
}
```

## 사용 예시

### HTML에서 타이포그래피 클래스 사용

```html
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Figma Theme Example</title>
  <link rel="stylesheet" href="css/theme.css">
</head>
<body>
  <!-- 유틸리티 클래스로 타이포그래피 적용 -->
  <h1 class="title-h1">메인 제목</h1>
  <h3 class="title-h3">서브 제목</h3>
  <h3 class="title-en-h3">English Headline</h3>

  <p class="body-large">큰 본문 텍스트입니다.</p>
  <p class="body-midium">중간 본문 텍스트입니다.</p>
  <p class="body-small">작은 본문 텍스트입니다.</p>

  <button class="button">클릭하세요</button>
  <span class="display-menu">메뉴 아이템</span>

  <!-- CSS 변수 직접 사용 -->
  <div style="
    font-family: var(--title-h1-font-family);
    font-size: var(--title-h1-font-size);
    color: var(--logogreen);
  ">
    커스텀 스타일
  </div>
</body>
</html>
```

### CSS에서 변수 활용

```css
/* theme.css의 변수를 다른 스타일에 활용 */
.custom-heading {
  font-family: var(--title-h1-font-family);
  font-size: calc(var(--title-h1-font-size) * 0.8);
  color: var(--logogreen);
  background: var(--lightgray);
  padding: var(--page-padding-padding-global);
}

.card {
  background: var(--color-scheme-1-background);
  color: var(--color-scheme-1-text);
  border: var(--stroke-border-width) solid var(--gray);
  border-radius: var(--radius-large);
}
```

## 에러 처리

### 파일 및 URL 에러
- `figma-urls.json` 파일이 없으면: 에러 메시지 출력 후 종료
- URL 파싱 에러: `parse_figma_urls` 스킬에서 처리 (형식 오류 시 해당 URL 스킵, 경고 출력)
- `parsed` 객체가 비어있으면: 경고 출력 후 종료

### MCP 호출 에러
- MCP 호출 실패: 해당 nodeId 스킵, 경고 출력, 나머지 계속
- 빈 응답: 해당 nodeId 스킵, 정보 로그
- 레이트 리밋 (선택 사항): 500ms 딜레이 후 재시도 (최대 3회)

### 데이터 에러
- 중복 변수: 첫 번째 값 유지, 경고 로그 (출처 nodeId 포함)
- 불완전한 typography 토큰: 유틸리티 클래스 생성 스킵, 경고
- 알 수 없는 폰트: 주석으로 수동 설정 가이드 제공

## 주의사항

### 기존 파일 처리
- **전체 재생성**: 기존 theme.css는 완전히 덮어씁니다
- 커스텀 CSS는 별도 파일(예: custom.css)로 관리 권장
- 수동 추가한 스타일은 스킬 실행 전에 백업하세요

### 폰트 라이선스
- **Commercial 폰트**: 자동 import 안됨, 주석으로 가이드만 제공
- Paperlogy 등 상용 폰트는 라이선스 확인 후 수동 설정 필요
- Pretendard, Poppins 등은 자동 import
- 폰트 파일 호스팅은 직접 준비해야 합니다

### Variables 수집
- 모든 nodeId에서 Variables 수집하여 누락 방지
- 여러 Figma 파일의 Variables는 하나의 theme.css로 병합
- 중복 변수는 첫 번째 발견 값 사용
- 동일 fileKey의 여러 nodeId도 모두 수집됩니다
