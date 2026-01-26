# [Protocol] Figma to CSS Conversion Standards

**목적:** 피그마 디자인의 의도를 웹 브라우저로 완벽하게 이식하고, 디자인 시안이 부재한 모바일 환경에서도 무너지지 않는 반응형 아키텍처를 구축함.

---

## 0. 핵심 원칙 (Core Principles)

**"데스크톱은 정교하게(Strict), 모바일은 유연하게(Fluid)."**

Figma API 및 디자인 시안을 해석하는 두 가지 모드입니다.

| 모드 | 뷰포트 범위 | 변환 원칙 | 목표 |
| --- | --- | --- | --- |
| **Desktop Mode** | `1200px ~ 1920px` | **Pixel Match** | 피그마 수치를 `rem`으로 1:1 변환하여 오차 0% 지향 |
| **Mobile Mode** | `~ 1199px` | **Fluid Logic** | 알고리즘 기반의 레이아웃 재배치 (Stacking & Stretching) |

---

## 1. 레이아웃 엔진 매핑 (Layout Engine)

피그마의 **Auto Layout**은 CSS의 **Flexbox**와 논리적으로 동일합니다. 개발자의 직관이 아닌 아래 매핑 테이블을 따릅니다.

### 1.1 Auto Layout 변환 테이블

| Figma 설정 | CSS 속성 매핑 | 비고 |
| --- | --- | --- |
| **Direction: Horizontal** `→` | `display: flex; flex-direction: row;` | 가로 배치 |
| **Direction: Vertical** `↓` | `display: flex; flex-direction: column;` | 세로 배치 |
| **Resizing: Hug contents** | `width: max-content` 또는 `width: fit-content` | 내용물만큼 크기 잡기 |
| **Resizing: Fill container** | `flex: 1` 또는 `align-self: stretch` | 남은 공간 채우기 |
| **Spacing Mode: Auto** | `justify-content: space-between` | 양끝 정렬 |
| **Align: Center** | `align-items: center` | 수직 중앙 정렬 |

---

## 2. 하이브리드 사이징 전략 (Hybrid Sizing Strategy)

**기존 v2.0의 무분별한 `clamp()` 사용을 폐기합니다.** 데스크톱에서의 디자인 왜곡을 막기 위해 **"구간별 전략"**을 사용합니다.

### 2.1 데스크톱 잠금 (Desktop Locking)

* **원칙:** 데스크톱 구간에서는 피그마의 `px` 수치를 고정된 `rem`으로 변환합니다. 유동적인 `%`나 `vw` 사용을 자제하여 디자이너가 의도한 간격을 정확히 구현합니다.
* **최대폭 제한 (Constraint):** 1920px 이상의 광활한 모니터에서 디자인이 찢어지는 것을 방지하기 위해 래퍼(Wrapper)를 사용합니다.
```css
.section-wrapper {
    width: 100%;
    display: flex;
    justify-content: center;
    background-color: var(--bg-color); /* 배경은 전체로 확장 */
}
.section-content {
    width: 100%;
    max-width: 1920px; /* 디자인 기준 해상도 */
    /* margin: 0 auto; (flex 사용 시 불필요하나 안전장치로 사용 가능) */
}

```



### 2.2 모바일 유동성 (Mobile Fluidity)

* **원칙:** 브레이크포인트(Tablet/Mobile) 이하로 떨어지면 고정값(`px`, `rem`)을 **상대값(`%`, `vw`)**으로 전환합니다.
* **좌우 여백:** 모바일에서는 절대 `px`로 여백을 고정하지 않습니다.
* *Bad:* `padding: 0 20px;`
* *Good:* `padding-inline: 5%;` (화면 크기에 비례하여 숨통을 틔움)



---

## 3. [중요] 디자인 없는 모바일 대응 프로토콜 (Mobile Stacking Protocol)

모바일 디자인 시안이 없을 때, 개발자는 다음 **4단계 알고리즘**을 통해 기계적으로 레이아웃을 변환합니다.

### Step 1. Column Drop (수직 적재)

**피그마 원본에서** 가로로 나열된(`flex-direction: row`) 섹션과 카드 리스트는 모바일에서 세로(`column`)로 전환합니다.

> ⚠️ **주의:** 피그마 원본에서 이미 세로 배치(`flex-direction: column`)인 요소는 **변환하지 마세요.** 이 규칙은 데스크톱에서 가로였던 것만 모바일에서 세로로 바꾸는 것이지, 세로였던 것을 가로로 바꾸라는 의미가 아닙니다.

```css
@media (max-width: 768px) {
    .card-list { flex-direction: column; }
}
```

### Step 2. Full Width (꽉 채우기)

고정된 너비(`width: 400px`)를 가진 요소들은 모바일에서 `width: 100%`로 강제 변환하여 화면을 꽉 채웁니다.

### Step 3. Order Flow (시선 흐름)

가로 배치 시 **[좌측 → 우측]** 순서였던 요소는, 모바일 세로 배치 시 **[상단 → 하단]** 순서로 쌓입니다.

* *예외:* 이미지가 텍스트보다 덜 중요한 장식요소라면 `order` 속성을 이용해 텍스트 아래로 내립니다.

### Step 4. Touch Target (터치 영역 확보)

마우스 클릭(Desktop)과 달리 손가락 터치(Mobile)는 정밀도가 떨어집니다.

* **규칙:** 모든 버튼, 링크, 입력창의 높이는 모바일에서 **최소 44px 이상**이어야 합니다.
```css
@media (max-width: 768px) {
    button, input { min-height: 44px; }
}

```



---

## 4. 타이포그래피 및 정렬 (Typography)

### 4.1 렌더링 오차 보정

웹 브라우저의 폰트 렌더링(Baseline 기준)은 피그마(Bounding Box 중앙)와 미세하게 다릅니다. 텍스트가 상단이나 하단으로 쏠리는 현상을 방지하기 위해 Flexbox를 활용합니다.

```css
.text-box {
    display: flex;
    align-items: center; /* 텍스트 수직 중앙 보정 */
    min-height: 1.5em; /* 라인 하이트 확보 */
}

```

### 4.2 행간(Line-height)의 단위

* **절대 규칙:** 행간은 반드시 **Unitless(단위 없음)** 값으로 변환합니다.
* *Figma:* Font 16px / Line-height 24px
* *CSS:* `line-height: 1.5;` (24 / 16)



---

## 5. 이미지 및 미디어 처리 (Asset Handling)

### 5.1 고정비가 아닌 비율비 (Aspect Ratio)

모바일에서 이미지가 깨지는 것을 막기 위해 `width/height` 고정값 대신 `aspect-ratio`를 사용합니다.

```css
.thumbnail {
    width: 100%;
    /* height: 300px;  <-- (X) 높이 고정 금지 */
    aspect-ratio: 16 / 9; /* 비율 유지하며 자동 리사이징 */
    object-fit: cover;
}

```

### 5.2 좌표 기반 Crop 대응

디자이너가 피그마에서 마스킹을 위해 좌표(`top: -50px` 등)를 비정상적으로 사용한 경우:

1. 좌표값을 무시합니다.
2. `display: grid` 또는 `flex`로 부모 컨테이너 중앙에 배치합니다.
3. `object-fit: cover`로 이미지가 영역을 자연스럽게 채우도록 처리합니다.

---

## 6. 컨테이너 쿼리 (Container Queries)

화면 전체 폭(`media query`)보다 **부모 컴포넌트의 폭**에 반응해야 하는 "재사용 컴포넌트(카드, 리스트 아이템 등)"에는 컨테이너 쿼리를 우선 적용합니다.

```css
.card-wrapper { container-type: inline-size; }

@container (max-width: 400px) {
  /* 화면이 커도, 카드가 놓인 공간이 좁으면 모바일 레이아웃 적용 */
  .card { flex-direction: column; }
}

```
---