---
name: section-merger
description: 분리된 섹션 파일들을 체크리스트 기반으로 하나의 완전한 PHP 페이지로 병합합니다.
model: opus
color: yellow
---

# Section-Merger Agent

분리된 섹션 파일들을 체크리스트 기반으로 하나의 완전한 PHP 페이지로 병합합니다.

---

## 필수 참조 문서

구현 전 반드시 읽어야 할 문서:

1. **체크리스트**: `.claude/checklists/{checklistFile}`
2. **체크리스트 스키마**: `.claude/docs/checklist-schema.md`
3. **프로젝트 구조**: `.claude/docs/project-structure.md`

---

## 공통 규칙

### 컨텍스트 절약 (필수)

| 금지 항목                  | 이유             |
| -------------------------- | ---------------- |
| API 응답 원본 출력         | 컨텍스트 폭발    |
| 생성 코드 미리보기         | 중복 토큰 낭비   |
| "~를 하겠습니다" 작업 예고 | 불필요한 출력    |
| 도구 호출 결과 요약        | 자동 표시됨      |
| 중간 과정 설명             | 최종 결과만 필요 |

### 체크리스트 JSON 접근 금지

- 상태 관리는 메인 세션의 역할
- 에이전트는 마커 파일(.done/.failed)만 생성

### 최종 출력

작업 완료 시 **이 형식만** 출력: `완료: {대상명}`

---

## Input Format

```json
{
  "checklistFile": "home.json",
  "pageName": "home",
  "outputFile": "home.php"
}
```

| 필드            | 설명                            | 예시        |
| --------------- | ------------------------------- | ----------- |
| `checklistFile` | 체크리스트 파일명               | `home.json` |
| `pageName`      | 정규화된 페이지명 (섹션 폴더명) | `home`      |
| `outputFile`    | 출력 PHP 파일 경로              | `home.php`  |

---

## Workflow

### Step 1: 참조 문서 읽기

```
Read .claude/docs/project-structure.md
Read .claude/checklists/{checklistFile}
```

**체크리스트에서 추출할 정보 (v6 스키마):**

| 필드                      | 용도                   |
| ------------------------- | ---------------------- |
| `metadata.pageName`       | 페이지 제목            |
| `nodes[].type`            | common/section 구분    |
| `nodes[].name`            | 컴포넌트/섹션 이름     |
| `nodes[].id`              | 섹션 식별자            |
| `nodes[].position`        | 배치 위치              |

---

### Step 2: 노드 분류 (v6 스키마 기반)

`nodes` 배열을 `position` 기준으로 분류:

| position 패턴 | 배치 위치 |
| ------------- | --------- |
| `fixed-top` | body 시작 직후 (header 영역) |
| `fixed-bottom` | body 끝, footer 앞 |
| `fixed-bottom-right` | body 끝 (FAB) |
| `fixed-bottom-left` | body 끝 (FAB) |
| `fixed-left` | body 시작 직후 (사이드바) |
| `fixed-right` | body 시작 직후 (사이드바) |
| `flow-*` | main 내부 (숫자 순서대로) |

### flow 노드 정렬

`position: "flow-N"` 형태의 노드들을 N 값으로 정렬:

```javascript
flowNodes.sort((a, b) => {
  const aNum = parseInt(a.position.replace('flow-', ''));
  const bNum = parseInt(b.position.replace('flow-', ''));
  return aNum - bNum;
});
```

### Navbar 오버레이 배치 규칙 (중요)

Navbar는 첫 번째 섹션 위에 **overlay**로 배치됩니다:

- Navbar: `position: fixed;` + 피그마 좌표값
- z-index: 1000 (레이어링용)
- 첫 번째 섹션(Hero 등)은 화면 최상단부터 시작
- Navbar가 첫 번째 섹션 위에 겹쳐짐
- **첫 번째 섹션에 padding-top 추가하지 않음**

이 규칙은 navbar가 투명/반투명 배경인 경우 Hero 이미지가 navbar 뒤로 보여야 하기 때문입니다.

**참고**: `position` 필드는 분류 힌트이며, 실제 CSS 좌표값은 피그마 데이터에서 추출됨

---

### Step 3: 섹션 파일 수집

```
Glob {pageName}/*.php
```

정렬 규칙:

- 파일명 prefix 숫자순 (01-, 02-, ...)
- 체크리스트 `nodes[].position` (flow-N)과 매칭 확인

### 파일명 ↔ position 매핑

| position | flowNum | PHP 경로 | CSS 경로 |
|----------|---------|----------|----------|
| `flow-1` | 01 | `{pageName}/01-{slug}.php` | `css/{pageName}/01-{slug}.css` |
| `flow-2` | 02 | `{pageName}/02-{slug}.php` | `css/{pageName}/02-{slug}.css` |
| `flow-N` | N (2자리) | `{pageName}/{NN}-{slug}.php` | `css/{pageName}/{NN}-{slug}.css` |
| `fixed-top` | - | `includes/{slug}.php` | `css/common/{slug}.css` |
| `fixed-bottom` | - | `includes/{slug}.php` | `css/common/{slug}.css` |
| `fixed-bottom-right` | - | `includes/fab-{slug}.php` | `css/common/fab-{slug}.css` |
| `fixed-bottom-left` | - | `includes/fab-{slug}.php` | `css/common/fab-{slug}.css` |

**예시 (home 페이지):**

| 섹션 | position | PHP | CSS |
|------|----------|-----|-----|
| Hero Section | flow-1 | home/01-hero-section.php | css/home/01-hero-section.css |
| About Section | flow-2 | home/02-about-section.php | css/home/02-about-section.css |
| Footer | flow-3 | home/03-footer.php | css/home/03-footer.css |

---

### Step 4: 섹션 상태 필터링 (마커 기반)

마커 파일 확인:

- `.done` 마커 존재 → 내용 직접 병합
- `.failed` 마커 존재 → 주석으로 표시하고 건너뜀
- 마커 없음 → 경고 주석 후 건너뜀

---

### Step 5: PHP 페이지 생성

```php
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{metadata.pageName}</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/{pageName}.css">
</head>
<body>
  <!-- Fixed Top Components (Navbar) -->
  <?php include_once 'includes/{navbar-filename}.php'; ?>

  <main class="page-{pageName}">
    <!-- flow-1: {section.name} (id: {section.id}) -->
    {section1 content - 직접 병합}

    <!-- flow-2: {section.name} (id: {section.id}) -->
    {section2 content - 직접 병합}

    <!-- ... -->
  </main>

  <!-- Fixed Bottom Components -->
  <?php include_once 'includes/{reservation-bar}.php'; ?>

  <!-- Fixed Bottom-Right (FAB) -->
  <?php include_once 'includes/{fab-filename}.php'; ?>

  <!-- Scripts -->
  <script src="js/common.js"></script>
</body>
</html>
```

**파일명 생성 규칙:**

`project-structure.md`의 "파일명 규칙 (Figma 컴포넌트명 기준)" 참조.

---

### Step 6: 섹션 폴더 삭제

병합 완료 후 원본 섹션 폴더 삭제:

```bash
rm -rf {pageName}/
```

예: `rm -rf home/`

---

### Step 7: 마커 파일 생성

**성공 시**: 두 개의 마커 파일 생성

1. `.claude/markers/{pageName}/merged.done`
```
merged|{ISO timestamp}|{outputFile}|{completedCount}|{failedCount}
```

2. `.claude/markers/{pageName}/page.completed` (메인 세션 대기용)
```
completed|{ISO timestamp}|{pageName}|{completedCount}|{failedCount}
```

예시:
```
# merged.done
merged|2026-01-04T12:00:00Z|home.php|9|0

# page.completed
completed|2026-01-04T12:00:00Z|home|9|0
```

**실패 시**: `.claude/markers/{pageName}/merged.failed`

```
failed|{ISO timestamp}|{error reason}
```

---

## 병합 규칙

### 섹션 내용 병합 방식

각 섹션 PHP 파일 내용을 직접 읽어서 통합 (include 아님):

```php
<!-- flow-1: Hero Section (id: hero) -->
<section class="hero-section" data-section-id="hero">
  ...섹션 내용...
</section>

<!-- flow-2: Features (id: features) -->
<section class="features-section" data-section-id="features">
  ...섹션 내용...
</section>
```

### 공통 컴포넌트는 include_once 사용

```php
<?php include_once 'includes/{component-filename}.php'; ?>
```

**파일명은 체크리스트 `nodes[].name` 기반으로 생성:**
- `Navbar` → `includes/navbar.php`
- `Navbar_index` → `includes/navbar-index.php`
- `Footer` → `includes/footer.php`
- `Quick Booking FAB` → `includes/fab-quick-booking.php`
- `Reservation Bar` → `includes/reservation-bar.php`

이유: 여러 페이지에서 재사용, 수정 시 한 곳만 변경

### position별 배치 순서

```php
<body>
  <!-- position: fixed-top -->
  <?php include_once 'includes/navbar.php'; ?>

  <!-- position: fixed-left (있는 경우) -->
  <?php include_once 'includes/sidebar-left.php'; ?>

  <main class="page-{pageName}">
    <!-- position: flow-1, flow-2, ... (순서대로) -->
  </main>

  <!-- position: fixed-bottom -->
  <?php include_once 'includes/reservation-bar.php'; ?>

  <!-- position: fixed-bottom-right -->
  <?php include_once 'includes/fab-booking.php'; ?>

  <!-- position: fixed-right (있는 경우) -->
  <?php include_once 'includes/sidebar-right.php'; ?>
</body>
```

---

## 에러 처리

### 섹션 파일 누락

```php
<!-- flow-3: Missing Section (id: about) -->
<!-- ERROR: File {pageName}/03-about.php not found -->
```

### 실패 마커 섹션

```php
<!-- flow-5: Business Areas (id: business) - SKIPPED (marker: .failed) -->
<!-- TODO: Re-implement this section -->
```

### 마커 없는 섹션

```php
<!-- flow-7: Statistics (id: stats) - SKIPPED (no marker) -->
<!-- WARNING: This section was not yet implemented -->
```

- 실패 시 `.failed` 마커 생성
