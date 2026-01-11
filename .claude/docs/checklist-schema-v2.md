# Checklist Schema v2

체크리스트 JSON 파일의 스키마 정의 문서입니다.

## 목적

체크리스트는 **병합/조립 설명서 + 반응형 힌트** 역할을 합니다.

- 구현 에이전트: `nodeId`로 `get_design_context` 호출 (상세 정보는 Figma MCP에서 획득)
- 병합 에이전트: 섹션 순서, 공통 컴포넌트 배치, 반응형 처리에 활용

---

## 스키마 구조

```json
{
  "$schema": "checklist-v2",
  "metadata": { ... },
  "layout": { ... },
  "commonComponents": [ ... ],
  "sections": [ ... ],
  "responsive": { ... }
}
```

---

## 필드 정의

### metadata (필수)

| 필드 | 타입 | 설명 |
|------|------|------|
| `pageName` | string | 페이지 이름 (파일명 기반) |
| `figmaUrl` | string | 원본 Figma URL |
| `fileKey` | string | Figma 파일 키 |
| `nodeId` | string | 페이지 노드 ID |
| `analyzedAt` | string | 분석 시점 (ISO 8601) |
| `designWidth` | number | 디자인 캔버스 너비 (보통 1920) |

```json
"metadata": {
  "pageName": "덴탈클리닉_사랑니_발치",
  "figmaUrl": "https://www.figma.com/design/...",
  "fileKey": "NlimFGIcvGyhgGct3sUxBB",
  "nodeId": "127:6621",
  "analyzedAt": "2026-01-11T00:00:00Z",
  "designWidth": 1920
}
```

---

### layout (필수)

페이지 전체 레이아웃 정보.

| 필드 | 타입 | 설명 |
|------|------|------|
| `type` | string | 레이아웃 유형: `single-column`, `sidebar-left`, `sidebar-right` |
| `containerWidth` | number | 콘텐츠 컨테이너 너비 (px) |
| `sidePadding` | number | 좌우 여백 (px) |

```json
"layout": {
  "type": "single-column",
  "containerWidth": 1580,
  "sidePadding": 170
}
```

---

### commonComponents (배열)

공통 컴포넌트 목록. 오직 다음 4가지만 해당:
1. Navigation bars
2. Footers
3. Sidebars
4. Modal/Dialog templates

| 필드 | 타입 | 설명 |
|------|------|------|
| `name` | string | 컴포넌트 이름 |
| `nodeId` | string | Figma 노드 ID |
| `placement` | string | 배치 위치: `top-fixed`, `top-static`, `bottom`, `left`, `right` |
| `mobileVariant` | string | 모바일 변형: `hamburger-menu`, `bottom-nav`, `hidden`, `unchanged` |

```json
"commonComponents": [
  {
    "name": "Navigation Bar",
    "nodeId": "127:6625",
    "placement": "top-fixed",
    "mobileVariant": "hamburger-menu"
  },
  {
    "name": "Footer",
    "nodeId": "127:6700",
    "placement": "bottom",
    "mobileVariant": "unchanged"
  }
]
```

#### mobileVariant 옵션

| 값 | 설명 |
|----|------|
| `hamburger-menu` | 햄버거 메뉴로 변환 (Navbar용) |
| `bottom-nav` | 하단 네비게이션으로 변환 |
| `hidden` | 모바일에서 숨김 |
| `unchanged` | 변경 없음 (Footer 등) |

---

### sections (배열)

페이지 섹션 목록. 순서대로 배치됩니다.

| 필드 | 타입 | 설명 |
|------|------|------|
| `id` | string | 섹션 고유 ID (영문, kebab-case) |
| `name` | string | 섹션 이름 (한글 가능) |
| `nodeId` | string | Figma 노드 ID |
| `order` | number | 배치 순서 (1부터 시작) |
| `layoutHint` | string | 레이아웃 힌트 (아래 참조) |
| `mobileStack` | boolean | 모바일에서 세로 스택 여부 |

```json
"sections": [
  {
    "id": "hero",
    "name": "Hero Section",
    "nodeId": "127:6622",
    "order": 1,
    "layoutHint": "full-width-bg",
    "mobileStack": false
  },
  {
    "id": "content",
    "name": "사랑니 발치 설명",
    "nodeId": "127:6653",
    "order": 2,
    "layoutHint": "text-image-split",
    "mobileStack": true
  }
]
```

#### layoutHint 유형

| 힌트 | 설명 | 데스크톱 | 모바일 (mobileStack=true) |
|------|------|---------|-------------------------|
| `full-width-bg` | 전체 너비 배경 이미지/색상 | 그대로 | 그대로 (패딩 축소) |
| `text-image-split` | 텍스트 + 이미지 좌우 배치 | 가로 배치 | 세로 스택 |
| `card-grid` | 카드 그리드 (3-4열) | 다중 열 | 1열 |
| `two-column` | 2열 레이아웃 | 가로 배치 | 세로 스택 |
| `center-content` | 중앙 정렬 콘텐츠 | 중앙 정렬 | 그대로 (패딩 축소) |

#### layoutHint 판단 기준

Figma 메타데이터에서 다음을 분석하여 결정:

- **전체 너비 배경 이미지** → `full-width-bg`
- **좌우로 텍스트/이미지 배치** (x 좌표 차이 큼) → `text-image-split`
- **3개 이상 동일 크기 프레임이 가로로 배열** → `card-grid`
- **2개의 주요 컬럼** → `two-column`
- **단일 중앙 콘텐츠** → `center-content`

#### mobileStack 판단 기준

- 가로 배치 요소가 있으면 대부분 `true`
- 단, `full-width-bg`는 기본적으로 `false`
- `center-content`도 기본적으로 `false`

---

### responsive (필수)

반응형 관련 설정.

| 필드 | 타입 | 설명 |
|------|------|------|
| `breakpoint` | number | 모바일 브레이크포인트 (기본: 768) |
| `mobileNotes` | string[] | 모바일 변환 시 참고사항 (병합 에이전트용) |

```json
"responsive": {
  "breakpoint": 768,
  "mobileNotes": [
    "네비게이션 → 햄버거 메뉴",
    "text-image-split 섹션들 → 세로 스택"
  ]
}
```

---

## 전체 예시

```json
{
  "$schema": "checklist-v2",
  "metadata": {
    "pageName": "덴탈클리닉_사랑니_발치",
    "figmaUrl": "https://www.figma.com/design/NlimFGIcvGyhgGct3sUxBB/...",
    "fileKey": "NlimFGIcvGyhgGct3sUxBB",
    "nodeId": "127:6621",
    "analyzedAt": "2026-01-11T00:00:00Z",
    "designWidth": 1920
  },
  "layout": {
    "type": "single-column",
    "containerWidth": 1580,
    "sidePadding": 170
  },
  "commonComponents": [
    {
      "name": "Navigation Bar",
      "nodeId": "127:6625",
      "placement": "top-fixed",
      "mobileVariant": "hamburger-menu"
    }
  ],
  "sections": [
    {
      "id": "hero",
      "name": "Hero Section",
      "nodeId": "127:6622",
      "order": 1,
      "layoutHint": "full-width-bg",
      "mobileStack": false
    },
    {
      "id": "content",
      "name": "사랑니 발치 설명",
      "nodeId": "127:6653",
      "order": 2,
      "layoutHint": "text-image-split",
      "mobileStack": true
    }
  ],
  "responsive": {
    "breakpoint": 768,
    "mobileNotes": [
      "네비게이션 → 햄버거 메뉴",
      "text-image-split 섹션들 → 세로 스택"
    ]
  }
}
```

---

## v1에서 v2로 마이그레이션

### 제거된 필드

| v1 필드 | 이유 |
|---------|------|
| `overview` | 불필요 (pageName으로 충분) |
| `sections[].description` | get_design_context가 제공 |
| `sections[].keyElements` | get_design_context가 제공 |
| `sections[].implementationNotes` | layoutHint로 대체 |
| `sections[].status` | marker 파일로 관리 |
| `commonComponents[].size` | get_design_context가 제공 |
| `commonComponents[].implementation` | 불필요 |
| `commonComponents[].children` | get_design_context가 제공 |
| `recommendations` | 구현 에이전트 재량으로 이동 |

### 변경된 필드

| v1 필드 | v2 필드 | 변경 사항 |
|---------|---------|----------|
| `commonComponents[].position` | `commonComponents[].placement` | 이름 변경 + 값 표준화 |
| - | `sections[].id` | 신규 추가 |
| - | `sections[].layoutHint` | 신규 추가 |
| - | `sections[].mobileStack` | 신규 추가 |
| - | `commonComponents[].mobileVariant` | 신규 추가 |
| - | `layout` | 신규 추가 |
| - | `responsive` | 신규 추가 |
