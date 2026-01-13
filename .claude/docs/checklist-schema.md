# Checklist Schema

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
| `placement` | string | 배치 위치: `top-fixed`, `top-static`, `bottom`, `bottom-fixed`, `floating-right`, `floating-left`, `left`, `right` |
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
  },
  {
    "name": "Quick Contact Form",
    "nodeId": "11:1815",
    "placement": "bottom-fixed",
    "mobileVariant": "unchanged"
  },
  {
    "name": "Chat Widget",
    "nodeId": "127:6702",
    "placement": "floating-right",
    "mobileVariant": "hidden"
  }
]
```

#### placement 옵션 상세

| 값 | 설명 | CSS 처리 | 사용 예시 |
|----|------|---------|----------|
| `top-fixed` | 상단 고정 (스크롤 따라다님) | `position: fixed; top: 0;` | Navbar |
| `top-static` | 상단 정적 (스크롤 시 사라짐) | `position: static;` | Navbar (특수) |
| `bottom` | 페이지 맨 아래 배치 | `position: static;` (문서 흐름) | Footer |
| `bottom-fixed` | 하단 고정 (스크롤 따라다님) | `position: fixed; bottom: 0;` | 고정 상담폼, 하단바 |
| `floating-right` | 우측 플로팅 | `position: fixed; right: 20px;` | 채팅 위젯, 피드백 버튼 |
| `floating-left` | 좌측 플로팅 | `position: fixed; left: 20px;` | 사이드 위젯 |
| `left` | 좌측 사이드바 | - | Sidebar |
| `right` | 우측 사이드바 | - | Sidebar |

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
| `responsiveHints` | object | 분기점별 반응형 처리 힌트 (선택) |

```json
"sections": [
  {
    "id": "hero",
    "name": "Hero Section",
    "nodeId": "127:6622",
    "order": 1,
    "layoutHint": "full-width-bg",
    "mobileStack": false,
    "responsiveHints": {
      "1200px": "패딩 축소, 이미지 max-width 적용",
      "768px": "세로 스택, 버튼 풀 너비"
    }
  },
  {
    "id": "content",
    "name": "사랑니 발치 설명",
    "nodeId": "127:6653",
    "order": 2,
    "layoutHint": "text-image-split",
    "mobileStack": true,
    "responsiveHints": {
      "1200px": "이미지 50% 너비로 축소",
      "768px": "이미지 → 텍스트 순서로 세로 스택"
    }
  }
]
```

#### responsiveHints 필드 (v3 신규)

각 분기점에서 어떻게 처리해야 하는지 힌트를 제공합니다.

| 분기점 | 일반적인 힌트 |
|--------|-------------|
| `1440px` | 패딩/gap 80%로 축소 |
| `1200px` | 패딩/gap 60%로 축소, 고정 너비 → max-width |
| `1024px` | 일부 레이아웃 세로 전환, 버튼 스택 |
| `768px` | 전체 세로 스택, 최소 패딩 |

**참고:** `responsiveHints`는 구현 에이전트에게 분기점별 처리 방법을 안내합니다. layoutHint와 mobileStack만으로 부족한 세부 지침을 제공합니다.

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
| `breakpoints` | object | 분기점 정의 (v3에서 확장) |
| `criticalBreakpoint` | number | 레이아웃 변경이 시작되는 핵심 분기점 (기본: 1200) |
| `mobileBreakpoint` | number | 모바일 분기점 (기본: 768) |
| `mobileNotes` | string[] | 모바일 변환 시 참고사항 (병합 에이전트용) |

```json
"responsive": {
  "breakpoints": {
    "desktop": 1920,
    "laptop": 1440,
    "tablet-landscape": 1200,
    "tablet": 1024,
    "mobile": 768
  },
  "criticalBreakpoint": 1200,
  "mobileBreakpoint": 768,
  "mobileNotes": [
    "네비게이션 → 햄버거 메뉴",
    "text-image-split 섹션들 → 세로 스택"
  ]
}
```

**중요:** `criticalBreakpoint`(기본 1200px)는 레이아웃이 변경되기 시작하는 지점입니다. 이 분기점에서 패딩/gap 축소, 고정 너비 유연화 등이 적용됩니다.

---

## 전체 예시

```json
{
  "$schema": "checklist-v3",
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
      "mobileStack": false,
      "responsiveHints": {
        "1200px": "패딩 축소, 이미지 max-width 적용",
        "768px": "세로 스택, 버튼 풀 너비"
      }
    },
    {
      "id": "content",
      "name": "사랑니 발치 설명",
      "nodeId": "127:6653",
      "order": 2,
      "layoutHint": "text-image-split",
      "mobileStack": true,
      "responsiveHints": {
        "1200px": "이미지 50% 너비로 축소",
        "768px": "세로 스택"
      }
    }
  ],
  "responsive": {
    "breakpoints": {
      "desktop": 1920,
      "laptop": 1440,
      "tablet-landscape": 1200,
      "tablet": 1024,
      "mobile": 768
    },
    "criticalBreakpoint": 1200,
    "mobileBreakpoint": 768,
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

---

## v2에서 v3로 마이그레이션

### 신규 필드 (v3)

| 필드 | 설명 |
|------|------|
| `sections[].responsiveHints` | 분기점별 반응형 처리 힌트 |
| `responsive.breakpoints` | 분기점 객체 (desktop, laptop, tablet-landscape, tablet, mobile) |
| `responsive.criticalBreakpoint` | 핵심 분기점 (기본 1200px) |
| `responsive.mobileBreakpoint` | 모바일 분기점 (기본 768px) |

### 변경된 필드 (v3)

| v2 필드 | v3 필드 | 변경 사항 |
|---------|---------|----------|
| `$schema: "checklist-v2"` | `$schema: "checklist-v3"` | 스키마 버전 업 |
| `responsive.breakpoint` | `responsive.mobileBreakpoint` | 이름 변경 (명확화) |

### 하위 호환성

v2 체크리스트도 계속 사용 가능합니다. 다만 v3 필드가 없으면 기본값이 적용됩니다:
- `responsiveHints`: 빈 객체 {}
- `criticalBreakpoint`: 1200
- `breakpoints`: 기본 분기점 세트
