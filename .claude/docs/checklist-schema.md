# Checklist Schema

체크리스트 JSON 파일의 스키마 정의 문서입니다.

## 목적

체크리스트는 **병합/조립 설명서** 역할을 합니다.

- 구현 에이전트: `nodeId`로 `get_design_context` 호출 (상세 정보는 Figma MCP에서 획득)
- 병합 에이전트: 노드 위치(position), 공통 컴포넌트 배치에 활용
- 반응형 처리: `.claude/docs/figma-to-css.md` 가이드라인 참조

---

## 스키마 구조 (v6)

```json
{
  "$schema": "checklist-v6",
  "metadata": { ... },
  "nodes": [ ... ]
}
```

### v5에서 v6로 변경된 점

| 항목 | v5 | v6 |
|------|----|----|
| 배치 필드 | `order` (number) | `position` (string) |
| 배치 표현 | 단순 숫자 (1, 2, 3...) | flow/fixed 구분 |
| 고정 요소 | 표현 불가 | `fixed-*` anchor로 표현 |

---

## Position 필드 네이밍 체계

### 필드명
- `order` (number) → `position` (string)

### position 값 형식

```
position := <flow-position> | <fixed-position>

flow-position  := "flow-" + <number>    // flow-1, flow-2, flow-3, ...
fixed-position := "fixed-" + <anchor>   // fixed-top, fixed-bottom, fixed-bottom-right, ...
```

### 전체 Anchor 목록

**중요**: `position` 값은 **분류/힌트** 용도로만 사용됩니다. 실제 CSS 좌표값(top, bottom, left, right, width, height)은 **피그마 디자인 데이터**에서 추출해야 합니다.

| position 값 | 분류 | 설명 |
|-------------|------|------|
| `flow-1`, `flow-2`, ... | document flow | 스크롤 콘텐츠 (순서대로 배치) |
| `fixed-top` | fixed 포지션 | 상단 고정 요소 (navbar 등). 실제 좌표는 피그마 값 사용 |
| `fixed-bottom` | fixed 포지션 | 하단 고정 요소 (CTA/예약폼). 실제 좌표는 피그마 값 사용 |
| `fixed-top-left` | fixed 포지션 | 좌상단 고정 요소. 실제 좌표는 피그마 값 사용 |
| `fixed-top-right` | fixed 포지션 | 우상단 고정 요소. 실제 좌표는 피그마 값 사용 |
| `fixed-bottom-left` | fixed 포지션 | 좌하단 FAB. 실제 좌표는 피그마 값 사용 |
| `fixed-bottom-right` | fixed 포지션 | 우하단 FAB. 실제 좌표는 피그마 값 사용 |
| `fixed-left` | fixed 포지션 | 좌측 사이드바. 실제 좌표는 피그마 값 사용 |
| `fixed-right` | fixed 포지션 | 우측 사이드바. 실제 좌표는 피그마 값 사용 |

### Position과 CSS의 관계

- `fixed-*` → `position: fixed;` 적용 (좌표는 피그마 데이터의 x, y 값 기반)
- `flow-*` → normal document flow (배치 순서만 의미)

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

모든 컴포넌트와 섹션을 통합한 배열. `position` 기준으로 배치됩니다.

| 필드       | 타입                    | 설명                            |
| ---------- | ----------------------- | ------------------------------- |
| `id`       | string                  | 고유 ID (영문, kebab-case)      |
| `type`     | "common" \| "section"   | 공통 컴포넌트/섹션 구분         |
| `name`     | string                  | 이름 (한글 가능)                |
| `nodeId`   | string                  | Figma 노드 ID                   |
| `position` | string                  | 배치 위치 (flow-N 또는 fixed-*) |

```json
"nodes": [
  {
    "id": "navbar",
    "type": "common",
    "name": "Navbar",
    "nodeId": "2413:18106",
    "position": "fixed-top"
  },
  {
    "id": "hero-section",
    "type": "section",
    "name": "Hero Section - 타이틀 및 배경 이미지",
    "nodeId": "2413:12134",
    "position": "flow-1"
  },
  {
    "id": "rooms-section",
    "type": "section",
    "name": "Rooms Section - 객실 소개",
    "nodeId": "2413:12145",
    "position": "flow-2"
  },
  {
    "id": "footer",
    "type": "common",
    "name": "Footer",
    "nodeId": "2508:10671",
    "position": "flow-3"
  },
  {
    "id": "booking-fab",
    "type": "common",
    "name": "Quick Booking FAB",
    "nodeId": "2413:12300",
    "position": "fixed-bottom-right"
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

## Position 부여 규칙

### 기본 원칙

`get_metadata` XML 응답에서 노드의 특성에 따라 position 부여:

1. **고정 요소 감지**: 이름/패턴으로 fixed 요소 판별
2. **스크롤 콘텐츠**: 나머지는 flow-N으로 순서 부여

### 고정 요소 감지 규칙

| 패턴 | position | 조건 |
|------|----------|------|
| Navbar, Navigation, Header (nav) | `fixed-top` | 상단에 위치 |
| FAB, Floating Button | `fixed-bottom-right` | 우하단 고정 버튼 |
| Bottom Bar, Reservation Bar | `fixed-bottom` | 하단 고정 바 |
| Sidebar (left) | `fixed-left` | 좌측 사이드바 |
| Sidebar (right) | `fixed-right` | 우측 사이드바 |

### flow 순서 부여

고정 요소를 제외한 노드들에 등장 순서대로 flow-1, flow-2, ... 부여:

```xml
<!-- get_metadata 응답 예시 -->
<frame id="2413:12132" name="페이지">
  <instance id="2413:18106" name="Navbar" />           <!-- fixed-top -->
  <frame id="2413:12134" name="Hero Section" />        <!-- flow-1 -->
  <frame id="2413:12145" name="Rooms Section" />       <!-- flow-2 -->
  <instance id="2508:10671" name="Footer" />           <!-- flow-3 -->
  <instance id="2413:12300" name="Booking FAB" />      <!-- fixed-bottom-right -->
</frame>
```

**규칙**:
1. 페이지 루트의 **직계 자식 노드**들을 순회
2. 고정 요소는 `fixed-*` position 부여
3. 나머지는 등장 순서대로 `flow-1`, `flow-2`, ... 부여
4. type은 별도로 분류 (navbar/footer/sidebar/modal → common, 나머지 → section)

---

## Navbar 오버레이 배치 규칙

### 배치 원칙

Navbar는 첫 번째 섹션 위에 **overlay**로 배치됩니다:

- Navbar: `position: fixed;` + 피그마 좌표값 (top, left, width 등)
- z-index는 레이어링을 위해 1000 사용
- 첫 번째 섹션(Hero 등)은 화면 최상단부터 시작
- Navbar가 첫 번째 섹션 위에 겹쳐짐
- 첫 번째 섹션에 `padding-top` 추가하지 않음

### 병합 시 처리

`section-merger`가 병합 시:

1. `position: "fixed-top"` → `<header>` 영역에 include
2. `position: "fixed-bottom"` → body 끝, footer 앞에 include
3. `position: "fixed-bottom-right"` (FAB) → body 끝에 include
4. `position: "flow-*"` → `<main>` 내부에 순서대로 직접 병합

---

## 전체 예시

```json
{
  "$schema": "checklist-v6",
  "metadata": {
    "pageName": "hotel-booking",
    "figmaUrl": "https://www.figma.com/design/YOUR_FILE_KEY/...",
    "fileKey": "YOUR_FILE_KEY",
    "nodeId": "2413:12132",
    "analyzedAt": "2026-01-19T00:00:00Z"
  },
  "nodes": [
    {
      "id": "navbar",
      "type": "common",
      "name": "Navbar",
      "nodeId": "2413:18106",
      "position": "fixed-top"
    },
    {
      "id": "hero-section",
      "type": "section",
      "name": "Hero Section - 메인 비주얼",
      "nodeId": "2413:12134",
      "position": "flow-1"
    },
    {
      "id": "rooms-section",
      "type": "section",
      "name": "Rooms Section - 객실 소개",
      "nodeId": "2413:12145",
      "position": "flow-2"
    },
    {
      "id": "amenities-section",
      "type": "section",
      "name": "Amenities Section - 편의시설",
      "nodeId": "2413:12200",
      "position": "flow-3"
    },
    {
      "id": "footer",
      "type": "common",
      "name": "Footer",
      "nodeId": "2508:10671",
      "position": "flow-4"
    },
    {
      "id": "booking-fab",
      "type": "common",
      "name": "Quick Booking FAB",
      "nodeId": "2413:12300",
      "position": "fixed-bottom-right"
    },
    {
      "id": "reservation-bar",
      "type": "common",
      "name": "Reservation Bar",
      "nodeId": "2413:12400",
      "position": "fixed-bottom"
    }
  ]
}
```

---

## v5 → v6 마이그레이션 가이드

기존 v5 체크리스트를 v6로 변환하는 방법:

### 자동 변환 규칙

| v5 (order) | v6 (position) | 조건 |
|------------|---------------|------|
| `order: N` (navbar) | `fixed-top` | name에 "navbar" 포함 |
| `order: N` (footer) | `flow-M` | name에 "footer" 포함, 마지막 flow |
| `order: N` (기타) | `flow-N` | 순서 유지 |

### 수동 확인 필요

- FAB/Floating 요소 → `fixed-bottom-right`
- 하단 고정 바 → `fixed-bottom`
- 사이드바 → `fixed-left` 또는 `fixed-right`

### 스크립트 지원

Python 스크립트에서 v5/v6 하위 호환성 제공:
- `order` 필드 존재 → v5로 간주, `flow-{order}` 변환
- `position` 필드 존재 → v6 그대로 사용
