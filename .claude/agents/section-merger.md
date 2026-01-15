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

1. **체크리스트**: `.claude/checklist/{checklistFile}`
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
  "checklistFile": "Home.json",
  "pageName": "home",
  "outputFile": "home.php"
}
```

| 필드            | 설명                            | 예시        |
| --------------- | ------------------------------- | ----------- |
| `checklistFile` | 체크리스트 파일명               | `Home.json` |
| `pageName`      | 정규화된 페이지명 (섹션 폴더명) | `home`      |
| `outputFile`    | 출력 PHP 파일 경로              | `home.php`  |

---

## Workflow

### Step 1: 참조 문서 읽기

```
Read .claude/docs/project-structure.md
Read .claude/checklist/{checklistFile}
```

**체크리스트에서 추출할 정보:**

| 필드                           | 용도               |
| ------------------------------ | ------------------ |
| `metadata.pageName`            | 페이지 제목        |
| `commonComponents[].name`      | 컴포넌트 이름      |
| `sections[].order`             | 섹션 순서          |
| `sections[].id`                | 섹션 식별자        |

---

### Step 2: 공통 컴포넌트 분류

`commonComponents`를 이름으로 분류:

| 이름 패턴 | 배치 위치 |
| --------- | --------- |
| Navigation, Navbar, Header | body 시작 직후 |
| Footer | body 종료 직전 |

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
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/{pageName}.css">
</head>
<body>
  <!-- Header Components -->
  <?php include_once 'includes/{header-component-filename}.php'; ?>

  <main class="page-{pageName}">
    <!-- Section 1: {section.name} (id: {section.id}) -->
    {section1 content - 직접 병합}

    <!-- Section 2: {section.name} (id: {section.id}) -->
    {section2 content - 직접 병합}

    <!-- ... -->
  </main>

  <!-- Footer Components -->
  <?php include_once 'includes/{footer-component-filename}.php'; ?>

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
<!-- Section 1: Hero Section (id: hero) -->
<section class="hero-section" data-section-id="hero">
  ...섹션 내용...
</section>

<!-- Section 2: Features (id: features) -->
<section class="features-section" data-section-id="features">
  ...섹션 내용...
</section>
```

### 공통 컴포넌트는 include_once 사용

```php
<?php include_once 'includes/{component-filename}.php'; ?>
```

**파일명은 체크리스트 `commonComponents[].name` 기반으로 생성:**
- `Navbar` → `includes/navbar.php`
- `Footer` → `includes/footer.php`

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

- 실패 시 `.failed` 마커 생성
