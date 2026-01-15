# Figma to CSS Conversion Protocols

이 문서는 피그마(Figma) 디자인을 웹 브라우저(CSS)로 구현할 때 발생하는 구조적 불일치를 해결하고, 반응형 환경에서 견고하게 작동하는 코드를 작성하기 위한 기술 표준입니다.

## 0. 황금 규칙 (Golden Rule)

**Figma API 응답값이 항상 최우선입니다.**

`get_design_context`가 반환하는 Tailwind 클래스의 값을 **절대 임의로 변경하지 마세요.**

- `flex` → `display: flex`
- `flex-row` → `flex-direction: row`
- `flex-col` → `flex-direction: column`
- `gap-[35px]` → `gap: 2.1875rem`
- `items-center` → `align-items: center`
- `justify-between` → `justify-content: space-between`

이 문서의 모든 규칙은 **Figma API가 명시하지 않은 경우**에만 적용되는 fallback입니다.

---

## 1. 멘탈 모델의 전환 (Philosophy)

피그마는 **벡터 기반의 절대 좌표** 시스템이지만, 브라우저는 **유동적인 박스 모델** 시스템입니다.

- **원칙:** 디자인의 픽셀 값을 단순히 복사(Translation)하지 말고, 디자이너의 **의도(Intent)**를 브라우저의 언어로 통역해야 합니다.
- **좌표계:** `position: absolute`와 `top/left` 좌표값 사용을 금지합니다. 오직 장식 요소나 오버레이(Overlay) UI에만 제한적으로 사용하십시오.
- **관계성:** 모든 레이아웃은 요소 간의 '관계(Padding, Gap)'를 정의하는 `display: flex` 또는 `display: grid`로 구현합니다.

---

## 2. 레이아웃 엔진 변환 규칙 (Layout Engine)

### 2.1 속성 매핑 표준 (The Rosetta Stone)

피그마의 Auto Layout 속성을 CSS로 변환할 때는 다음 매핑 테이블을 따릅니다.

| 피그마 속성 (Figma) | CSS 속성 (CSS)                   | 구현 가이드 및 주의사항                                                                                                               |
| :------------------ | :------------------------------- | :------------------------------------------------------------------------------------------------------------------------------------ |
| **Direction**       | `flex-direction`                 | **Figma API 값 그대로 사용.** 반응형 미디어쿼리에서만 Mobile First 원칙 적용 (좁은 화면에서 `column` 전환 고려).                      |
| **Hug Contents**    | `width: max-content`             | 상황에 따라 `fit-content` 사용 가능.                                                                                                  |
| **Fill Container**  | `flex: 1`                        | **필수:** 자식 요소가 컨테이너를 뚫고 나가는 것을 방지하기 위해 `min-width: 0` (가로) 또는 `min-height: 0` (세로)를 반드시 함께 선언. |
| **Space Between**   | `justify-content: space-between` | **경고:** 줄바꿈(Wrap)이 발생하는 경우 사용 금지 (하단 2.2 참조).                                                                     |
| **Item Spacing**    | `gap`                            | `margin`으로 간격을 벌리는 방식 금지. `rem` 단위 변환 권장.                                                                           |

### 2.2 줄바꿈(Wrap) 처리 전략

피그마의 'Wrap' + 'Space Between' 조합은 CSS Flexbox에서 시각적 오류(마지막 줄 정렬 깨짐)를 유발합니다.

- **금지:** Wrapping Collection(카드 리스트 등)에 `justify-content: space-between` 사용 금지.
- **해결:**
  1.  **CSS Grid 사용 (권장):** `grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));`.
  2.  **Flexbox 대안:** `gap`을 사용하고 마지막 요소에 `margin-right: auto` 적용.

---

## 3. 유동성 아키텍처 (Fluidity via Math)

### 3.1 Clamp 함수와 선형 보간

고정된 Breakpoint 사이를 유동적으로 연결하기 위해 `clamp()` 함수를 사용합니다.

- **적용 대상:** 24px 이상의 폰트 사이즈 및 주요 레이아웃 간격.
- **공식:** $Size = clamp(MIN, SLOPE + INTERCEPT, MAX)$.
  - _예시:_ 모바일(375px)에서 24px, 데스크톱(1920px)에서 40px인 경우
  - `font-size: clamp(1.5rem, 1.03vw + 1.25rem, 2.5rem);`.

---

## 4. 타이포그래피 및 수직 리듬 (Typography)

### 4.1 단위 없는 행간 (Unitless Line Height)

- **문제:** 피그마는 행간을 px로 정의하지만, CSS에서 절대 단위(px, rem) 행간은 상속 문제를 일으킵니다.
- **규칙:** 반드시 **단위 없는 비율(Unitless Ratio)**로 변환합니다.
  - _공식:_ `피그마 행간(px) / 피그마 폰트 사이즈(px) = CSS 값`
  - _예시:_ 16px/24px → `line-height: 1.5;`

### 4.2 수직 정렬 (Vertical Alignment)

- **규칙:** 텍스트 수직 정렬을 위해 `padding-top` 등을 미세 조정하여 픽셀을 맞추지 마십시오. 브라우저 렌더링 엔진 차이로 인해 실패할 확률이 높습니다.
- **해결:** Flexbox의 `align-items: center`를 사용하여 브라우저가 텍스트 렌더링 높이를 기준으로 중앙을 잡도록 유도합니다.

---

## 5. 반응형 로직: 컨테이너 쿼리 (Container Queries)

뷰포트(화면 전체)가 아닌, 컴포넌트가 놓인 **부모 공간의 크기**에 반응해야 합니다.

- **규칙:**
  - **Media Query (@media):** 전체 페이지 레이아웃 변경(사이드바 숨김 등)에만 사용.
  - **Container Query (@container):** 컴포넌트 내부의 배치 변경(카드형 UI 스택 변경 등)에 사용.
- **단위:** 유동적 컴포넌트 내부에서는 `vw` 대신 `cqi` (Container Query Inline-size) 단위를 사용합니다.

```css
.card-container {
  container-type: inline-size;
}
@container (max-width: 400px) {
  .card-content {
    flex-direction: column;
  } /* 공간이 좁으면 세로 배치 */
}
```

---

## 6. 계층 구조 보존 규칙 (Hierarchy Preservation)

Figma의 부모-자식 관계는 HTML에서도 **반드시 유지**해야 합니다. Figma API(`get_design_context`)가 반환하는 React+Tailwind 코드의 중첩 구조를 그대로 HTML로 변환하세요.

### 6.1 필수 중첩 조건

다음 조건 중 하나라도 해당되면 HTML에서 부모-자식 구조를 **반드시** 유지:

| 조건                 | 설명                                                                                                    |
| -------------------- | ------------------------------------------------------------------------------------------------------- |
| **투명도 배경 조합** | 부모에 불투명 배경(`bg-black`, `bg-[#xxx]`)이 있고, 자식에 투명도 배경(`rgba()`, `opacity`)이 있는 경우 |
| **overflow: hidden** | 부모가 `overflow: hidden`인 경우, 자식이 잘림 처리됨                                                    |
| **시각적 종속 관계** | 부모의 그림자, 테두리, 둥근 모서리가 자식에 영향을 미치는 경우                                          |

### 6.2 변환 예시

**Figma API 응답 (React+Tailwind):**

```jsx
<div className="bg-black">
  {" "}
  {/* 부모: 검정 배경 */}
  <div className="bg-[rgba(255,255,255,0.1)]">
    {" "}
    {/* 자식: 10% 흰색 */}
    ...
  </div>
</div>
```

**✅ 올바른 HTML 변환:**

```html
<div class="parent">
  <!-- background: #000 -->
  <div class="child">
    <!-- background: rgba(255,255,255,0.1) -->
    ...
  </div>
</div>
```

**❌ 잘못된 HTML 변환 (금지):**

```html
<div class="parent"></div>
<!-- 여기서 닫힘 -->
<div class="child">...</div>
<!-- 형제로 분리됨 - rgba가 제대로 렌더링 안됨! -->
```
