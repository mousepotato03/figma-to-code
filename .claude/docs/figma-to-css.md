# Figma to CSS Conversion Protocols

이 문서는 피그마(Figma) 디자인을 웹 브라우저(CSS)로 구현할 때 발생하는 구조적 불일치를 해결하고, 반응형 환경에서 견고하게 작동하는 코드를 작성하기 위한 기술 표준입니다.

## 0. 황금 규칙 (Golden Rule)

**Figma API 응답값이 항상 최우선입니다.**

`get_design_context`가 반환하는 Tailwind 클래스의 값을 **절대 임의로 변경하지 마세요.**

**단, 다음 예외 적용:**
- 섹션 9의 "이미지 Crop/Mask 처리 규칙"에 해당하는 경우, 하드코딩된 좌표값 대신 정상적인 이미지 배치 방식을 사용합니다.

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

| 피그마 속성 (Figma) | CSS 속성 (CSS) | 구현 가이드 및 주의사항 |
| --- | --- | --- |
| **Hug Contents** | `width: max-content` | 상황에 따라 `fit-content` 사용 가능. |
| **Fill Container** | `flex: 1` | **필수:** 자식 요소가 컨테이너를 뚫고 나가는 것을 방지하기 위해 `min-width: 0` (가로) 또는 `min-height: 0` (세로)를 반드시 함께 선언. |
| **Space Between** | `justify-content: space-between` | **경고:** 줄바꿈(Wrap)이 발생하는 경우 사용 금지 |
| **Item Spacing** | `gap` | `margin`으로 간격을 벌리는 방식 금지.|

### 2.2 줄바꿈(Wrap) 처리 전략

피그마의 'Wrap' + 'Space Between' 조합은 CSS Flexbox에서 시각적 오류(마지막 줄 정렬 깨짐)를 유발합니다.

- **금지:** Wrapping Collection(카드 리스트 등)에 `justify-content: space-between` 사용 금지.
- **해결:**
    1. **CSS Grid 사용 (권장):** `grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));`.
    2. **Flexbox 대안:** `gap`을 사용하고 마지막 요소에 `margin-right: auto` 적용.

---

## 3. 유동성 아키텍처 (Fluidity via Math)

### 3.1 Clamp 함수와 선형 보간

고정된 Breakpoint 사이를 유동적으로 연결하기 위해 `clamp()` 함수를 사용합니다.

- **적용 대상:** 24px 이상의 폰트 사이즈 및 주요 레이아웃 간격.
- **공식:** $Size = clamp(MIN, SLOPE + INTERCEPT, MAX)$.
    - *예시:* 모바일(375px)에서 24px, 데스크톱(1920px)에서 40px인 경우
    - `font-size: clamp(1.5rem, 1.03vw + 1.25rem, 2.5rem);`.

---

## 4. 타이포그래피 및 수직 리듬 (Typography)

### 4.1 단위 없는 행간 (Unitless Line Height)

- **문제:** 피그마는 행간을 px로 정의하지만, CSS에서 절대 단위(px, rem) 행간은 상속 문제를 일으킵니다.
- **규칙:** 반드시 **단위 없는 비율(Unitless Ratio)**로 변환합니다.
    - *공식:* `피그마 행간(px) / 피그마 폰트 사이즈(px) = CSS 값`
    - *예시:* 16px/24px → `line-height: 1.5;`


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

---

## 7. Overflow 및 Clipping 규칙 (Overflow & Clipping)

### 7.1 Clip Content 변환 원칙

피그마의 "Clip content" 옵션이 켜져 있어도 **무조건 `overflow: hidden`을 적용하지 마세요.**

| 요소 유형 | overflow 적용 | 이유 |
|-----------|---------------|------|
| 이미지 컨테이너 | ✅ `overflow: hidden` | 이미지가 영역을 벗어나면 잘라야 함 |
| 텍스트 컨테이너 | ❌ 금지 | 반응형에서 텍스트 줄 수가 변함 |
| 데코레이션/애니메이션 | ✅ 허용 | 시각적 효과 제어 목적 |
| 레이아웃 섹션 | ⚠️ 주의 | 자식 요소가 동적 높이면 금지 |

### 7.2 텍스트 컨테이너 규칙

**텍스트를 포함하는 컨테이너에는 절대로:**
1. `overflow: hidden` 사용 금지
2. `height` 고정값 사용 금지 (max-height는 허용)
3. 부모-자식 모두에 overflow 중첩 적용 금지

**대신 사용할 것:**
- `min-height`: 최소 높이 보장
- `height: auto`: 내용물에 따른 유동 높이

```css
/* ❌ 잘못된 예 - 텍스트가 잘릴 수 있음 */
.text-container {
  height: 25rem;
  overflow: hidden;
}

/* ✅ 올바른 예 - 텍스트 양에 따라 확장 */
.text-container {
  min-height: 25rem;
  height: auto;
}
```

---

## 8. 고정 크기 vs 유동 크기 결정 기준 (Fixed vs Fluid Sizing)

### 8.1 높이(Height) 결정 매트릭스

| 컨테이너 내용물 | 권장 높이 설정 | 예시 |
|----------------|----------------|------|
| 텍스트만 | `height: auto` + `min-height` | 타이틀, 본문 영역 |
| 이미지만 | `height` 고정 또는 `aspect-ratio` | 썸네일, 배너 |
| 텍스트 + 이미지 혼합 | `min-height` + `height: auto` | 카드 컴포넌트 |
| 비디오/iframe | `padding-bottom` 비율 또는 `aspect-ratio` | 비디오 플레이어 |

### 8.2 반응형 높이 오버라이드 규칙

미디어 쿼리에서 `min-height`를 사용할 때, 기존 `height` 고정값을 반드시 해제하세요:

```css
/* ❌ 잘못된 예 - height: 25rem이 여전히 적용됨 */
.container { height: 25rem; }
@media (max-width: 768px) {
  .container { min-height: 12.5rem; }
}

/* ✅ 올바른 예 - 기존 고정값 해제 */
.container { height: 25rem; }
@media (max-width: 768px) {
  .container {
    height: auto;
    min-height: 12.5rem;
  }
}
```

### 8.3 속성 매핑 테이블 보강

| 피그마 속성 (Figma) | CSS 속성 (CSS) | 구현 가이드 및 주의사항 |
|---------------------|----------------|-------------------------|
| **Clip content (ON)** | 상황별 판단 필요 | 이미지 컨테이너에만 `overflow: hidden` 적용. 텍스트 컨테이너는 금지. |
| **Fixed height** | `height` 또는 `min-height` | 텍스트 컨테이너는 `min-height` + `height: auto` 조합 권장 |

---

## 9. 이미지 Crop/Mask 처리 규칙 (Image Crop & Mask Handling)

### 9.1 문제 상황

디자이너가 Figma에서 원본 이미지의 **특정 영역만** 보여주기 위해:
- 이미지를 큰 음수 좌표(`top: -200px`, `left: -150px` 등)로 배치
- 부모 컨테이너로 clip 처리
- CSS mask를 사용하여 특정 영역만 노출

이러한 하드코딩된 좌표값을 그대로 CSS로 변환하면 레이아웃이 깨집니다.

### 9.2 판별 기준

다음 조건 중 하나라도 해당하면 **"Crop된 이미지"**로 판단:

| 조건 | 예시 |
|------|------|
| 이미지의 top/left가 **-50px 이하** | `top: -213px`, `left: -140px` |
| 이미지 크기가 **컨테이너보다 150% 이상** | 컨테이너 1920px, 이미지 2500px |
| **mask-position**에 음수 값 존재 | `mask-position: -81px -7px` |
| 이미지가 **부모 영역 밖으로 크게 벗어남** | `width: 200%`, `height: 130%` |

### 9.3 처리 규칙

**Crop된 이미지로 판단되면:**

1. **하드코딩된 좌표값 무시** - 음수 top/left, mask-position 등 사용하지 않음

2. **정상적인 이미지 배치 적용:**
   ```css
   .image-container {
     position: relative;
     overflow: hidden;
   }

   .image-container img {
     width: 100%;
     height: 100%;
     object-fit: cover;
     object-position: center; /* 또는 디자인 의도에 맞게 조정 */
   }
   ```

3. **마커 파일에 후처리 필요 메모 추가:**
   ```
   completed|{timestamp}|{php}|{css}|IMAGE_CROP_NEEDED:{이미지파일명}
   ```