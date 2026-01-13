# Figma to Standard CSS 변환 규칙

핵심 가이드: Figma JSON 데이터를 시맨틱 HTML 및 표준 CSS로 변환하기 위한 엄격한 규칙.

## 1. 사고 모델 (Mental Model)

- **무시 (IGNORE):** 절대 좌표 (x, y, absoluteBoundingBox).
- **확인 (READ):** Auto Layout, 계층 구조(Hierarchy), 중첩(Nesting).
- **해석 (INTERPRET):** Frame은 정적인 이미지가 아니라, 유연한 Flexbox/Grid 컨테이너임.

## 2. 레이아웃 엔진 (Auto Layout -> Flexbox)

Figma 속성을 CSS 속성으로 매핑:

### 방향 (Direction)

- HORIZONTAL: display: flex; flex-direction: row;
- VERTICAL: display: flex; flex-direction: column;

### 정렬 (Alignment)

- primaryAxisAlignItems -> justify-content (MIN: flex-start, MAX: flex-end, CENTER: center, SPACE_BETWEEN: space-between)
- counterAxisAlignItems -> align-items (MIN: flex-start, MAX: flex-end, CENTER: center, STRETCH: stretch)

### 간격 (Spacing)

- itemSpacing -> gap (rem으로 변환)
- wraps 처리:
  - **기본값:** `flex-wrap: nowrap` (명시적 설정)
  - **Figma wraps=true 시:** 아래 "flex-wrap 사용 규칙" 참조 후 적용 여부 결정
  - **주의:** wraps가 true여도 무조건 wrap 적용하지 말 것

## 3. 크기 전략 (Sizing Strategy)

### 꽉 채우기 (Fill Container)

- 조건: layoutGrow: 1 또는 layoutAlign: STRETCH
- CSS: flex: 1; 또는 width: 100%; 또는 align-self: stretch;
- 의도: 남은 공간을 모두 점유.

### 내용물 맞춤 (Hug Contents)

- 조건: SizingMode: AUTO
- CSS: width: max-content; 또는 width: auto;
- 의도: 자식 콘텐츠 크기에 맞춤.

### 고정 너비 (Fixed Width)

- CSS: overflow 방지를 위해 width 대신 max-width 사용 권장.

### 최상위 컨테이너 (Root)

- CSS: width: 100%; max-width: 1920px; margin: 0 auto;

## 4. 단위 시스템 (Hybrid)

### REM (유연성)

- 대상: font-size, padding, margin, gap, border-radius, 레이아웃 크기.
- 공식: 입력 px / 16 = 출력 rem.

### PX (정밀성)

- 대상: border-width (1px), box-shadow, 미디어 쿼리 분기점, 4px 미만 미세 조정.

## 5. 반응형 규칙 (Desktop First)

기본 스타일 = 데스크톱 (1920px 기준).

### 분기점 체계 (필수)

| 분기점 | 대상 | 적용 규칙 |
|--------|------|----------|
| 1440px | 대형 노트북 | 큰 패딩/gap 80%로 축소 |
| 1200px | 노트북 | 고정 너비 → max-width, 패딩 60%로 축소 |
| 1024px | 태블릿 | 레이아웃 재배치 시작, 일부 세로 스택 |
| 768px | 모바일 | 전체 세로 스택, 최소 패딩 |

**중요:** 768px만 처리하면 1920px~769px 구간에서 레이아웃이 깨짐. **1200px 분기점은 필수.**

### 반응형 값 (clamp 사용) - 필수

패딩/갭이 **40px(2.5rem) 이상**인 경우 반드시 clamp() 사용:

```css
/* BAD - 고정값 */
padding: 7.5rem;  /* 120px */
gap: 5.8125rem;   /* 93px */

/* GOOD - clamp() 사용 */
padding: clamp(1.5rem, 6vw, 7.5rem);
gap: clamp(1.5rem, 5vw, 5.8125rem);
```

공식:
- padding: `clamp(1rem, {원본px/20}vw, {원본rem})`
- gap: `clamp(1rem, {원본px/25}vw, {원본rem})`

### 고정 너비 처리 - 필수

고정 width 값은 반드시 max-width로 변환:

```css
/* BAD */
width: 43.75rem;  /* 700px 고정 - 작은 화면에서 overflow */

/* GOOD */
max-width: 43.75rem;
width: 100%;
```

### flex-wrap 사용 규칙 (중요)

**기본 원칙:** Figma에 wraps 속성이 있더라도 **기본적으로 flex-wrap: nowrap 사용**.

#### wrap 사용 금지 케이스

| 요소 | 이유 | 대안 |
|------|------|------|
| 버튼 그룹 (2-4개) | 예측 불가능한 줄바꿈 | 1024px에서 세로 스택 |
| 태그/뱃지 (4개 이하) | 한 줄 표시 의도 | 컨테이너 min-width 설정 |
| 네비게이션 메뉴 | 레이아웃 깨짐 | 햄버거 메뉴로 전환 |

#### wrap 허용 케이스 (조건부)

| 요소 | 조건 | 필수 추가 조치 |
|------|------|---------------|
| 태그 목록 (5개 이상) | 명시적 그리드 의도 | min-width 설정 |
| 카드 그리드 | CSS Grid 사용 불가 시 | 1200px 분기점 필수 |
| 갤러리 아이템 | 반응형 열 수 변경 필요 | 아이템에 flex-basis 설정 |

#### 코드 예시

```css
/* BAD - wrap만 사용하면 예측 불가능한 줄바꿈 발생 */
.buttons {
  display: flex;
  flex-wrap: wrap;
}

/* GOOD - 분기점에서 명시적 스택 전환 */
.buttons {
  display: flex;
  flex-wrap: nowrap;
  gap: clamp(0.5rem, 2vw, 1rem);
}
@media (max-width: 1024px) {
  .buttons {
    flex-direction: column;
  }
}

/* wrap 필요 시 - 필수 조건 충족 */
.tag-list {
  display: flex;
  flex-wrap: wrap;
  gap: 0.5rem;
}
.tag-list > * {
  min-width: 5rem;  /* 예측 가능한 줄바꿈 */
}
```

### 타이포그래피 (Typography)

- Viewport 설정에만 의존하지 말 것.
- 방법 A: font-size: clamp(min, val, max);
- 방법 B: 미디어 쿼리 내에서 font-size를 20-30% 축소.

### 레이아웃 오버라이드 요약

| 분기점 | 적용 내용 |
|--------|----------|
| 1200px | 패딩/gap 축소, 고정 너비 유연화 |
| 1024px | 일부 가로→세로 전환, 버튼 스택 |
| 768px | 전체 세로 스택, 최소 패딩(1rem~1.5rem) |

## 6. 금지 사항 (Negative Constraints)

- position: absolute 금지 (순수 장식이나 오버레이 제외).
- 고정 높이(fixed height) 금지 (min-height 또는 height: auto 사용).
- div 남발 금지 (시맨틱 태그 사용: section, nav, button, header, footer).
- 부정 여백(Negative Margin) 삭제 금지 (예: margin-right: -20px 등 겹침 의도 유지).

## 7. 출력 형식

- 표준 CSS (Standard CSS).
- 클래스 명명: BEM 방식 또는 직관적인 kebab-case.
- Fill/Hug 로직 적용 부분에 짧은 주석 추가.

## 8. 배경 이미지 처리 규칙 (Background Images)

### 판단 기준 (필수)

배경 이미지의 position은 **Figma 계층 구조**로 결정. 이름(bg, background)으로 판단 금지.

| 조건 | CSS 적용 |
|------|---------|
| 섹션/프레임의 직접 자식 | `position: absolute; inset: 0;` (부모 기준) |
| 페이지 최상위 레이어 | `position: fixed;` (뷰포트 기준) |
| 체크리스트 placement가 fixed 계열 | `position: fixed;` |

### 금지 사항

- **이름에 "bg", "background" 포함 여부로 position 결정 금지**
- 섹션 내부 배경에 `position: fixed` 적용 금지
- 반응형에서 섹션 배경을 fixed로 변경 금지

### 올바른 예시

```css
/* 섹션 내부 배경 - position: absolute (부모 섹션 기준) */
.hero__background {
  position: absolute;
  inset: 0;
  z-index: -1;
}

.hero__bg-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* 모바일에서도 동일하게 유지 */
@media (max-width: 768px) {
  .hero__background {
    position: absolute; /* fixed 아님! */
  }
}
```

### 잘못된 예시

```css
/* BAD - 섹션 배경에 fixed 적용 */
@media (max-width: 768px) {
  .hero__background {
    position: fixed; /* 스크롤해도 배경이 전체 페이지에 깔림 */
  }
}
```
