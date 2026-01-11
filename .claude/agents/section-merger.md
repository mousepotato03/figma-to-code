---
name: section-merger
description: 분리된 섹션 파일들을 체크리스트 기반으로 하나의 완전한 PHP 페이지로 병합합니다.
model: opus
color: yellow
---

# Section-Merger Agent

분리된 섹션 파일들을 체크리스트(v2) 기반으로 하나의 완전한 PHP 페이지로 병합합니다.

---

## 필수 참조 문서

구현 전 반드시 읽어야 할 문서:

1. **체크리스트**: `.claude/checklist/{checklistFile}` (checklist-v2 스키마)
2. **체크리스트 스키마**: `.claude/docs/checklist-schema-v2.md`
3. **프로젝트 컨벤션**: `.claude/docs/convention.md`

---

## Input Format

```json
{
  "checklistFile": "Home.json",
  "pageName": "home",
  "outputFile": "home.php"
}
```

| 필드            | 설명                            | 예시                  |
| --------------- | ------------------------------- | --------------------- |
| `checklistFile` | 체크리스트 파일명               | `Home.json` |
| `pageName`      | 정규화된 페이지명 (섹션 폴더명) | `home`                |
| `outputFile`    | 출력 PHP 파일 경로              | `home.php`            |

---

## Workflow

### Step 1: 체크리스트 읽기 (v2 스키마)

```
Read .claude/checklist/{checklistFile}
```

**checklist-v2에서 추출할 정보:**

| 필드 | 용도 |
|------|------|
| `metadata.pageName` | 페이지 제목 |
| `layout.type` | 페이지 레이아웃 구조 |
| `commonComponents[].placement` | 컴포넌트 배치 위치 |
| `sections[].order` | 섹션 순서 |
| `sections[].id` | 섹션 식별자 |
| `responsive.breakpoint` | 반응형 기준점 (기본 768) |

---

### Step 2: 공통 컴포넌트 분류 (v2 기준)

`commonComponents`를 `placement` 값으로 분류:

| placement | 배치 위치 | 예시 |
|-----------|----------|------|
| `top-fixed` | body 시작 직후 (고정) | Navbar |
| `top-static` | body 시작 직후 (일반) | Header |
| `bottom` | body 종료 직전 | Footer |
| `left` | main 좌측 | Sidebar |
| `right` | main 우측 | Sidebar |

---

### Step 3: 섹션 파일 수집

```
Glob {pageName}/*.php
```

정렬 규칙:

- 파일명 prefix 숫자순 (01-, 02-, ...)
- 체크리스트 `sections[].order`와 매칭 확인

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
  <link rel="stylesheet" href="css/theme.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/{pageName}.css">
</head>
<body>
  <!-- Header Components (placement: top-*) -->
  <?php include 'includes/navbar.php'; ?>

  <main class="page-{pageName}">
    <!-- Section 1: {section.name} (id: {section.id}) -->
    {section1 content - 직접 병합}

    <!-- Section 2: {section.name} (id: {section.id}) -->
    {section2 content - 직접 병합}

    <!-- ... -->
  </main>

  <!-- Footer Components (placement: bottom) -->
  <?php include 'includes/footer.php'; ?>

  <!-- Scripts -->
  <script src="assets/js/common.js"></script>
</body>
</html>
```

---

### Step 6: 섹션 폴더 삭제

병합 완료 후 원본 섹션 폴더 삭제:

```bash
rm -rf {pageName}/
```

예: `rm -rf home/`

---

### Step 7: 마커 파일 생성

**성공 시**: `.claude/markers/{pageName}/merged.done`

```
merged|{ISO timestamp}|{outputFile}|{completedCount}|{failedCount}
```

예시:

```
merged|2026-01-04T12:00:00Z|home.php|9|0
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
<!-- Section 1: Hero Section (id: hero) -->
<section class="hero-section" data-section-id="hero">
  ...섹션 내용...
</section>

<!-- Section 2: Features (id: features) -->
<section class="features-section" data-section-id="features">
  ...섹션 내용...
</section>
```

### 공통 컴포넌트는 include 사용

```php
<?php include 'includes/navbar.php'; ?>
```

이유: 여러 페이지에서 재사용, 수정 시 한 곳만 변경

---

## 에러 처리

### 섹션 파일 누락

```php
<!-- Section 3: Missing Section (id: about) -->
<!-- ERROR: File {pageName}/03-about.php not found -->
```

### 실패 마커 섹션

```php
<!-- Section 5: Business Areas (id: business) - SKIPPED (marker: .failed) -->
<!-- TODO: Re-implement this section -->
```

### 마커 없는 섹션

```php
<!-- Section 7: Statistics (id: stats) - SKIPPED (no marker) -->
<!-- WARNING: This section was not yet implemented -->
```

### 공통 컴포넌트 파일 누락

```php
<?php
if (file_exists('includes/navbar.php')) {
    include 'includes/navbar.php';
} else {
    echo '<!-- Navbar: includes/navbar.php not found -->';
}
?>
```

---

## 필수 규칙

**공통 규칙**: `.claude/docs/agent-guidelines.md` 참조
