# 프로젝트 컨벤션

## 1. 폴더 구조

```
root/
├── includes/          # 공통 컴포넌트 (header, footer, nav, db-connect)
├── css/               # 스타일시트 (reset.css, theme.css, [페이지].css)
├── assets/
│   ├── images/        # 페이지별 이미지 (assets/images/{pageName}/)
│   └── icons/         # 공용 아이콘
├── [페이지명]/        # 개발 중: 섹션별 분리 (hero.php, features.php 등)
├── 페이지.php         # 최종: 통합된 페이지
└── .claude/
    ├── checklist/     # 페이지 구조 정의 (JSON)
    ├── markers/       # 구현 상태 추적 (마커 파일)
    │   ├── common/    # 공통 컴포넌트 마커
    │   │   ├── Navbar.done
    │   │   ├── Footer.done
    │   │   └── components.completed  # 모든 컴포넌트 완료 시
    │   └── [페이지명]/  # 페이지별 섹션 마커
    │       ├── 01-hero.done
    │       ├── 02-features.done
    │       └── page.completed  # 모든 섹션 완료 시
    └── scripts/       # 유틸리티 스크립트
```

## 2. 공통 컴포넌트 사용

```php
<?php include_once 'includes/header.php'; ?>
<?php include_once 'includes/nav.php'; ?>

<!-- 페이지 내용 -->
<?php include_once 'includes/footer.php'; ?>
```

## 3. 구현 규칙

### 이미지/아이콘 처리

**저장 경로:**
- 이미지: `assets/images/{pageName}/` (페이지별 그룹화)
- 아이콘: `assets/icons/` (공용, 페이지 구분 없음)

**파일명:**
- 원본 파일명 그대로 유지 (rename 금지)

**다운로드 방법:**
1. `get_design_context` 응답의 `downloadUrls`에서 asset URL 확인
2. `curl -o` 명령으로 다운로드
3. 해당 경로에 저장
4. HTML에서 올바른 경로로 참조

**예시:**
```bash
# 이미지 다운로드
mkdir -p assets/images/home
curl -o "assets/images/home/hero-bg.png" "https://figma-alpha-api.s3.us-west-2.amazonaws.com/..."

# 아이콘 다운로드
mkdir -p assets/icons
curl -o "assets/icons/arrow-right.svg" "https://figma-alpha-api.s3.us-west-2.amazonaws.com/..."
```

```html
<img src="assets/images/home/hero-bg.png" alt="Hero background" />
<img src="assets/icons/arrow-right.svg" alt="Arrow" class="icon" />
```

### 스타일시트

- `reset.css`, `theme.css` 필수 import
- 페이지별 별도 CSS 파일 생성 (페이지명과 일치)

### Figma 정확도

- `get_design_context` 값 그대로 사용. 임의 추정 금지
- margin, padding, 모든 사이즈 정확히 구현
- **예외**: 섹션 최상위 컨테이너의 `width: 1920px` 등 캔버스 크기는 `width: 100%`로 변환

## 4. 마커 파일 시스템

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

### 토큰 절감 효과

| 시나리오 | Before | After | 절감율 |
|---------|--------|-------|--------|
| 프로젝트 초기 (모두 pending) | 38,000 토큰 | 38,000 토큰 | 0% |
| 프로젝트 중반 (50% 완료) | 38,000 토큰 | 19,000 토큰 | 50% |
| 프로젝트 후반 (90% 완료) | 38,000 토큰 | 3,800 토큰 | 90% |
| 완료 후 재실행 | 38,000 토큰 | ~0 토큰 | 100% |

### 유틸리티 스크립트

#### 마커 파일 생성
```bash
# 기존 완료된 체크리스트에 대해 마커 파일 생성
python .claude/scripts/generate_completion_markers.py
```

#### 마커 파일 정리 (선택사항)
```bash
# page.completed가 있는 페이지의 섹션별 마커 삭제
python .claude/scripts/cleanup_markers.py
```

### 주의사항
- 체크리스트 수동 수정 시 해당 페이지의 `page.completed` 삭제 필요
- 마커 파일 삭제 시 다음 실행에서 자동 재생성됨
- Git 커밋 여부: 선택사항 (팀원 공유 시 커밋 권장)
