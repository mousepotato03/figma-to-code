# Checklist Schema

체크리스트 JSON 파일의 스키마 정의 문서입니다.

---

## 목적

`get_metadata`와 `get_screenshot`을 종합적으로 활용하여:
- **공통 컴포넌트** (여러 페이지에서 재사용) vs **일회성 섹션** (해당 페이지 전용) 분류
- 각 요소의 배치 위치 (고정/스크롤) 결정

---

## 스키마 구조 (v6)

```json
{
  "$schema": "checklist-v6",
  "metadata": { "pageName", "figmaUrl", "fileKey", "nodeId", "analyzedAt" },
  "nodes": [ ... ]
}
```

---

## nodes 배열 필드

| 필드       | 타입                    | 설명                            |
| ---------- | ----------------------- | ------------------------------- |
| `id`       | string                  | 고유 ID (영문, kebab-case)      |
| `type`     | "common" \| "section"   | 공통 컴포넌트/섹션 구분         |
| `name`     | string                  | 이름 (한글 가능)                |
| `nodeId`   | string                  | Figma 노드 ID                   |
| `position` | string                  | 배치 위치 (flow-N 또는 fixed-*) |

### position 값
- `flow-1`, `flow-2`, ... → 스크롤 콘텐츠 (순서대로 배치)
- `fixed-top` → 상단 고정 
- `fixed-bottom` → 하단 고정 
- `fixed-bottom-right` → 우하단 

### position 결정 방법

position 값을 결정할 때 다음 두 가지 정보를 종합적으로 고려:

1. **`get_screenshot`**: 실제 시각적 위치, 고정 요소 여부 확인
   - 화면 상단/하단에 고정된 요소인지 시각적으로 확인
   - 콘텐츠 흐름에 따른 실제 배치 순서 파악

2. **`get_metadata`**: 노드 이름, 계층 구조, 순서 정보
   - 노드 이름에 "navbar", "header", "footer" 등 키워드 포함 여부
   - 부모-자식 관계 및 형제 노드 순서

---

## Navbar 오버레이 배치 규칙

### 배치 원칙

Navbar는 첫 번째 섹션 위에 **overlay**로 배치:

- Navbar: `position: fixed;` + 피그마 좌표값
- z-index: 1000
- 첫 번째 섹션(Hero)은 화면 최상단부터 시작
- 첫 번째 섹션에 `padding-top` 추가하지 않음

### 병합 시 처리

| position | 병합 위치 |
|----------|-----------|
| `fixed-top` | `<header>` 영역에 include |
| `fixed-bottom` | body 끝, footer 앞에 include |
| `fixed-bottom-right` | body 끝에 include |
| `flow-*` | `<main>` 내부에 순서대로 병합 |

---

## 예시

```json
{
  "$schema": "checklist-v6",
  "metadata": {
    "pageName": "hotel-booking",
    "figmaUrl": "https://www.figma.com/design/...",
    "fileKey": "YOUR_FILE_KEY",
    "nodeId": "2413:12132",
    "analyzedAt": "2026-01-19T00:00:00Z"
  },
  "nodes": [
    { "id": "navbar", "type": "common", "name": "Navbar", "nodeId": "2413:18106", "position": "fixed-top" },
    { "id": "hero-section", "type": "section", "name": "Hero Section", "nodeId": "2413:12134", "position": "flow-1" },
    { "id": "rooms-section", "type": "section", "name": "Rooms Section", "nodeId": "2413:12145", "position": "flow-2" },
    { "id": "footer", "type": "common", "name": "Footer", "nodeId": "2508:10671", "position": "flow-3" },
    { "id": "booking-fab", "type": "common", "name": "Booking FAB", "nodeId": "2413:12300", "position": "fixed-bottom-right" }
  ]
}
```
