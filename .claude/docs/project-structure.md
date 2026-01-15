# 프로젝트 구조

이 문서는 프로젝트의 폴더/파일 구조와 개발환경 설정을 정의합니다.

---

## 0. 개발환경

### 기술 스택

- **바닐라 환경**: 순수 PHP, CSS, JS만 사용
- **경로 참조**: 상대 경로 또는 절대 경로 직접 사용

---

## 1. 폴더 구조

```
root/
├── includes/          # 공통 컴포넌트 (header, footer, nav, db-connect)
├── css/               # 스타일시트 (reset.css, fonts.css, common.css, [페이지].css)
├── js/                # 자바스크립트 파일
├── assets/
│   ├── images/        # 페이지별 이미지 (assets/images/{pageName}/)
│   └── icons/         # 공용 아이콘
├── [페이지명]/        # 개발 중: 섹션별 분리 (hero.php, features.php 등)
├── 페이지.php         # 최종: 통합된 페이지
└── .claude/
```

---

## 2. 공통 컴포넌트 사용

```php
<?php include_once 'includes/navbar.php'; ?>

<!-- 페이지 내용 -->
<?php include_once 'includes/footer.php'; ?>
```

### 파일명 규칙 (Figma 컴포넌트명 기준)

| Figma 컴포넌트명     | PHP 파일명                        |
| -------------------- | --------------------------------- |
| `Navbar`             | `includes/navbar.php`             |
| `Footer`             | `includes/footer.php`             |
| `Quick Contact Form` | `includes/quick-contact-form.php` |

**변환 규칙:**

1. 소문자로 변환
2. 공백, 언더바 → 하이픈(-) 치환
3. `.php` 확장자 추가

---

## 3. 스타일시트 로딩 순서

페이지 `<head>`에 포함할 CSS:

```html
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/fonts.css" />
<link rel="stylesheet" href="css/common.css" />
<link rel="stylesheet" href="css/{pageName}.css" />
```

---

## 4. 이미지/아이콘 처리

### 저장 경로

| 유형   | 경로                        | 설명                   |
| ------ | --------------------------- | ---------------------- |
| 이미지 | `assets/images/{pageName}/` | 페이지별 그룹화        |
| 아이콘 | `assets/icons/`             | 공용, 페이지 구분 없음 |

### 파일명 규칙

- **원본 파일명 그대로 유지** (rename 금지)

### 다운로드 방법

- figma mcp tool의 get_design_context 함수에서 전달받은 url들을 통해 다운로드.

---

## 5. 마커 파일 시스템

### 개요

구현 상태를 파일 시스템 기반으로 추적하여 토큰 사용량을 최적화합니다.

### 마커 파일 종류

#### 섹션 완료 마커 (`.done` / `.failed`)

- **위치**: `.claude/markers/{pageName}/{section-id}.done`
- **형식**: `completed|2026-01-06T12:00:00Z|{php-path}|{css-path}`
- **용도**: 개별 섹션 구현 완료 표시

#### 페이지 완료 마커 (`page.completed`)

- **위치**: `.claude/markers/{pageName}/page.completed`
- **형식**: `completed|2026-01-06T12:00:00Z|{pageName}|{completedCount}|{failedCount}`
- **용도**: 모든 섹션 완료 시 생성 (pending = 0)
- **효과**: 다음 `figma-implement` 실행 시 해당 페이지 건너뜀 (토큰 절약)

#### 공통 컴포넌트 완료 마커 (`components.completed`)

- **위치**: `.claude/markers/common/components.completed`
- **형식**: `completed|2026-01-06T12:00:00Z|common|{completedCount}|0`
- **용도**: 모든 공통 컴포넌트 완료 시 생성
- **효과**: 다음 `figma-implement` 실행 시 1단계 건너뜀

### 주의사항

- 체크리스트 수동 수정 시 해당 페이지의 `page.completed` 삭제 필요
- 마커 파일 삭제 시 다음 실행에서 자동 재생성됨
