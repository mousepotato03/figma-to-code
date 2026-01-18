# Checklist Schema

체크리스트 JSON 파일의 스키마 정의 문서입니다.

## 목적

체크리스트는 **병합/조립 설명서** 역할을 합니다.

- 구현 에이전트: `nodeId`로 `get_design_context` 호출 (상세 정보는 Figma MCP에서 획득)
- 병합 에이전트: 노드 순서(order), 공통 컴포넌트 배치에 활용
- 반응형 처리: `.claude/docs/figma-to-css.md` 가이드라인 참조

---

## 스키마 구조 (v5)

```json
{
  "$schema": "checklist-v5",
  "metadata": { ... },
  "nodes": [ ... ]
}
```

### v4에서 v5로 변경된 점

| 항목 | v4 | v5 |
|------|----|----|
| 배열 구조 | `commonComponents` + `sections` 분리 | `nodes` 통합 배열 |
| order 범위 | sections만 order 보유 | 모든 노드에 order 부여 |
| 타입 구분 | 배열로 암묵적 구분 | `type` 필드로 명시 |

---

## 필드 정의

### metadata (필수)

| 필드         | 타입   | 설명                      |
| ------------ | ------ | ------------------------- |
| `pageName`   | string | 페이지 이름 (파일명 기반) |
| `figmaUrl`   | string | 원본 Figma URL            |
| `fileKey`    | string | Figma 파일 키             |
| `nodeId`     | string | 페이지 노드 ID            |
| `analyzedAt` | string | 분석 시점 (ISO 8601)      |

```json
"metadata": {
  "pageName": "about-nibec-overview",
  "figmaUrl": "https://www.figma.com/design/...",
  "fileKey": "YOUR_FILE_KEY",
  "nodeId": "2413:12132",
  "analyzedAt": "2026-01-18T00:00:00Z"
}
```

---

### nodes (배열)

모든 컴포넌트와 섹션을 통합한 배열. `order` 순서대로 배치됩니다.

| 필드     | 타입                    | 설명                            |
| -------- | ----------------------- | ------------------------------- |
| `id`     | string                  | 고유 ID (영문, kebab-case)      |
| `type`   | "common" \| "section"   | 공통 컴포넌트/섹션 구분         |
| `name`   | string                  | 이름 (한글 가능)                |
| `nodeId` | string                  | Figma 노드 ID                   |
| `order`  | number                  | 배치 순서 (1부터 시작, 통합)    |

```json
"nodes": [
  {
    "id": "navbar",
    "type": "common",
    "name": "Navbar",
    "nodeId": "2413:18106",
    "order": 1
  },
  {
    "id": "header-section",
    "type": "section",
    "name": "Header Section - 타이틀 및 배경 이미지",
    "nodeId": "2413:12134",
    "order": 2
  },
  {
    "id": "navbar-index",
    "type": "common",
    "name": "Navbar_index",
    "nodeId": "2413:12144",
    "order": 3
  },
  {
    "id": "vision-section",
    "type": "section",
    "name": "Vision Section - 인간 중심의 R&D 전문 기업 소개",
    "nodeId": "2413:12145",
    "order": 4
  },
  {
    "id": "footer",
    "type": "common",
    "name": "Footer",
    "nodeId": "2508:10671",
    "order": 999
  }
]
```

---

## 공통 컴포넌트 타입 (type: "common")

오직 다음 4가지만 공통 컴포넌트(`type: "common"`)로 분류:

1. Navigation bars (navbar, top navigation)
2. Footers
3. Sidebars
4. Modal/Dialog templates

위 4가지를 제외한 모든 요소는 섹션(`type: "section"`)으로 분류.

---

## Navbar 오버레이 배치 규칙

### 배치 원칙

Navbar는 첫 번째 섹션 위에 **overlay**로 배치됩니다:

- Navbar: `position: fixed; top: 0; z-index: 1000;`
- 첫 번째 섹션(Hero 등)은 화면 최상단부터 시작
- Navbar가 첫 번째 섹션 위에 겹쳐짐
- 첫 번째 섹션에 `padding-top` 추가하지 않음

### 병합 시 처리

`section-merger`가 병합 시:

1. `type: "common"` + `name`에 "navbar" 포함 → `<header>` 영역에 include
2. `type: "common"` + `name`에 "footer" 포함 → `<footer>` 영역에 include
3. `type: "section"` → `<main>` 내부에 순서대로 직접 병합

---

## 전체 예시

```json
{
  "$schema": "checklist-v5",
  "metadata": {
    "pageName": "about-nibec-overview",
    "figmaUrl": "https://www.figma.com/design/YOUR_FILE_KEY/...",
    "fileKey": "YOUR_FILE_KEY",
    "nodeId": "2413:12132",
    "analyzedAt": "2026-01-18T00:00:00Z"
  },
  "nodes": [
    {
      "id": "navbar",
      "type": "common",
      "name": "Navbar",
      "nodeId": "2413:18106",
      "order": 1
    },
    {
      "id": "navbar-index",
      "type": "common",
      "name": "Navbar_index",
      "nodeId": "2413:12144",
      "order": 2
    },
    {
      "id": "header-section",
      "type": "section",
      "name": "Header Section - 타이틀 및 배경 이미지",
      "nodeId": "2413:12134",
      "order": 3
    },
    {
      "id": "vision-section",
      "type": "section",
      "name": "Vision Section - 인간 중심의 R&D 전문 기업 소개",
      "nodeId": "2413:12145",
      "order": 4
    },
    {
      "id": "our-core-values-section",
      "type": "section",
      "name": "Our Core Values Section - 4개 핵심 가치 카드 그리드",
      "nodeId": "2413:12173",
      "order": 5
    },
    {
      "id": "innovation-base-section",
      "type": "section",
      "name": "Innovation Base Section - 세 가지 혁신 기반 카드 그리드",
      "nodeId": "2413:12257",
      "order": 6
    },
    {
      "id": "video-section",
      "type": "section",
      "name": "Video Section - 비디오 플레이어 및 텍스트",
      "nodeId": "2413:12281",
      "order": 7
    },
    {
      "id": "footer",
      "type": "common",
      "name": "Footer",
      "nodeId": "2508:10671",
      "order": 8
    }
  ]
}
```

---

## Order 부여 규칙

**원칙**: `get_metadata` XML 응답에서 노드가 나타나는 순서 그대로 order 부여

```xml
<!-- get_metadata 응답 예시 -->
<frame id="2413:12132" name="페이지">
  <instance id="2413:18106" name="Navbar" />      <!-- order: 1 -->
  <instance id="2413:12144" name="Navbar_index" /> <!-- order: 2 -->
  <frame id="2413:12134" name="Header Section" /> <!-- order: 3 -->
  <frame id="2413:12145" name="Vision Section" /> <!-- order: 4 -->
  ...
  <instance id="2508:10671" name="Footer" />      <!-- order: N (마지막) -->
</frame>
```

**규칙**:
1. 페이지 루트의 **직계 자식 노드**들을 순회
2. 등장 순서대로 order 1, 2, 3, ... 부여
3. type은 별도로 분류 (navbar/footer/sidebar/modal → common, 나머지 → section)
4. **하드코딩된 order 범위 없음** (Figma 구조를 그대로 반영)

이 규칙으로 Figma 디자인의 실제 레이어 순서가 체크리스트에 정확히 반영됩니다.
