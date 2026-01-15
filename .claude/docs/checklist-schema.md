# Checklist Schema

체크리스트 JSON 파일의 스키마 정의 문서입니다.

## 목적

체크리스트는 **병합/조립 설명서** 역할을 합니다.

- 구현 에이전트: `nodeId`로 `get_design_context` 호출 (상세 정보는 Figma MCP에서 획득)
- 병합 에이전트: 섹션 순서, 공통 컴포넌트 배치에 활용
- 반응형 처리: `.claude/docs/figma-to-css.md` 가이드라인 참조

---

## 스키마 구조

```json
{
  "$schema": "checklist-v4",
  "metadata": { ... },
  "commonComponents": [ ... ],
  "sections": [ ... ]
}
```

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
  "pageName": "덴탈클리닉_사랑니_발치",
  "figmaUrl": "https://www.figma.com/design/...",
  "fileKey": "NlimFGIcvGyhgGct3sUxBB",
  "nodeId": "127:6621",
  "analyzedAt": "2026-01-11T00:00:00Z"
}
```

---

### commonComponents (배열)

공통 컴포넌트 목록. 오직 다음 4가지만 해당:

1. Navigation bars
2. Footers
3. Sidebars
4. Modal/Dialog templates

| 필드     | 타입   | 설명          |
| -------- | ------ | ------------- |
| `name`   | string | 컴포넌트 이름 |
| `nodeId` | string | Figma 노드 ID |

```json
"commonComponents": [
  {
    "name": "Navigation Bar",
    "nodeId": "127:6625"
  },
  {
    "name": "Footer",
    "nodeId": "127:6700"
  },
  {
    "name": "Quick Contact Form",
    "nodeId": "11:1815"
  },
  {
    "name": "Chat Widget",
    "nodeId": "127:6702"
  }
]
```

---

### sections (배열)

페이지 섹션 목록. 순서대로 배치됩니다.

| 필드     | 타입   | 설명                            |
| -------- | ------ | ------------------------------- |
| `id`     | string | 섹션 고유 ID (영문, kebab-case) |
| `name`   | string | 섹션 이름 (한글 가능)           |
| `nodeId` | string | Figma 노드 ID                   |
| `order`  | number | 배치 순서 (1부터 시작)          |

```json
"sections": [
  {
    "id": "hero",
    "name": "Hero Section",
    "nodeId": "127:6622",
    "order": 1
  },
  {
    "id": "content",
    "name": "사랑니 발치 설명",
    "nodeId": "127:6653",
    "order": 2
  }
]
```

## 전체 예시

```json
{
  "$schema": "checklist-v4",
  "metadata": {
    "pageName": "덴탈클리닉_사랑니_발치",
    "figmaUrl": "https://www.figma.com/design/NlimFGIcvGyhgGct3sUxBB/...",
    "fileKey": "NlimFGIcvGyhgGct3sUxBB",
    "nodeId": "127:6621",
    "analyzedAt": "2026-01-11T00:00:00Z"
  },
  "commonComponents": [
    {
      "name": "Navigation Bar",
      "nodeId": "127:6625"
    },
    {
      "name": "Footer",
      "nodeId": "127:6700"
    }
  ],
  "sections": [
    {
      "id": "hero",
      "name": "Hero Section",
      "nodeId": "127:6622",
      "order": 1
    },
    {
      "id": "content",
      "name": "사랑니 발치 설명",
      "nodeId": "127:6653",
      "order": 2
    }
  ]
}
```
