---
description: 체크리스트 기반 Figma 섹션을 PHP/CSS로 구현
arguments:
  - name: checklist
    description: 특정 체크리스트 파일명 (생략시 전체 순차 처리)
    required: false
---

체크리스트 기반으로 Figma 디자인을 PHP/CSS로 구현합니다.

**컨텍스트 절약 규칙**: `.claude/docs/agent-guidelines.md` 참조

---

## 폴링 헬퍼: wait_for_markers

마커 파일 기반 완료 대기를 위한 공통 로직입니다.

### 파라미터

| 파라미터 | 설명 | 예시 |
|---------|------|------|
| `path` | 마커 디렉토리 경로 | `.claude/markers/common` |
| `pattern` | Glob 패턴 | `*.done`, `merged.*` |
| `interval` | 대기 간격 (초) | `30`, `10` |
| `maxRetries` | 최대 반복 횟수 | `10`, `20`, `12` |
| `requiredCount` | 필요한 마커 개수 | pending 개수 |

### 로직

```
1. sleep {interval}초
2. Glob {path}/{pattern} + {path}/*.failed 로 마커 개수 확인
3. 마커 개수 >= requiredCount → 완료, 다음 단계 진행
4. 아니면 2번 반복 (최대 maxRetries회)
5. 타임아웃 시 현재 상태로 진행
```

**중요: TaskOutput 호출 금지!** (컨텍스트 절약)

---

## 0단계: 준비

### 0-1. 체크리스트 목록 확인
```
Glob .claude/checklist/*.json
```
- `_common_component.json`: 공통 컴포넌트
- 나머지: 페이지별 체크리스트

---

## 1단계: 공통 컴포넌트 구현 (병렬 처리)

### 1-1. 공통 컴포넌트 완료 확인 (마커 우선)

1. 완료 마커 존재 확인:
   ```bash
   Glob .claude/markers/common/components.completed
   ```
   - 파일 존재 → 1단계 전체 건너뛰기 ✅ (공통 컴포넌트 모두 완료됨)
   - 파일 없음 → 체크리스트 읽기

2. 체크리스트 읽기 (마커 없을 때만):
   ```
   Read .claude/checklist/_common_component.json
   ```

### 1-2. pending 컴포넌트 병렬 구현
각 pending 컴포넌트에 대해 **병렬로** figma-implementer 호출:

```
Task 도구 호출:
- subagent_type: "figma-implementer"
- run_in_background: true   ← 병렬 실행!
- prompt: (아래 JSON 형식)
```

```json
{
  "target": {
    "type": "common",
    "name": "{component.name}",
    "nodeId": "{component.occurrences[0].nodeId}",
    "fileKey": "PbENz9XeDICQsut5z1DfiC"
  },
  "context": {
    "pageName": "_common",
    "order": 0,
    "size": { "width": 1920, "height": 130 }
  },
  "outputPaths": {
    "php": "includes/{lowercase-name}.php",
    "css": "css/common/{name}.css",
    "marker": ".claude/markers/common/{name}"
  }
}
```

**이름 변환 규칙**:
- `Navbar` → `navbar.php`
- `Footer` → `footer.php`
- `Navbar_index` → `navbar_index.php`

### 1-3. 완료 대기

`wait_for_markers(.claude/markers/common, *.done, 180초, 10회, pending개수)`

### 1-4. 공통 CSS 병합
모든 공통 컴포넌트 완료 후:
```bash
python .claude/scripts/merge_section_css.py common
```
결과: `css/common/*.css` → `css/common.css`

### 1-5. 완료 마커 생성

마커 파일 기반으로 완료 여부 확인:

```javascript
// 마커 파일 개수로 완료 확인
const doneMarkers = Glob('.claude/markers/common/*.done');
const failedMarkers = Glob('.claude/markers/common/*.failed');
const totalComponents = pendingCount; // 1-2에서 확인한 개수

if (doneMarkers.length + failedMarkers.length >= totalComponents) {
  const timestamp = new Date().toISOString();

  // 완료 마커 생성
  Write `.claude/markers/common/components.completed`:
  `completed|${timestamp}|common|${doneMarkers.length}|${failedMarkers.length}`
}
```

**중요**: 다음 실행 시 이 마커가 있으면 1단계 전체를 건너뜀

---

## 2단계: 체크리스트 선택 (마커 기반 최적화)

### 2-1. 마커로 사전 필터링 (토큰 절약)

```bash
# 1. 모든 페이지명 추출 (체크리스트 파일명에서)
Glob .claude/checklist/*.json
  → 파일명에서 페이지명 정규화
  → 예: About_NIBEC_History.json → about-nibec-history
  → 예: A_Home_Desktop.json → home-desktop (A_ prefix 제거)

# 2. 각 페이지의 완료 마커 확인
for each pageName:
  Glob .claude/markers/{pageName}/page.completed
  if (마커 파일 존재):
    → 건너뛰기 ✅ (체크리스트 읽기 불필요, 토큰 절약)
  else:
    → 처리 대상 목록에 추가
```

**페이지명 정규화 규칙**:
- `A_Home_Desktop` → `home-desktop` (prefix 제거)
- `About NIBEC > History` → `about-nibec-history`
- `About NIBEC • OVERVIEW` → `about-nibec-overview`
- 특수문자 (`>`, `•`, `/`) → 하이픈
- 공백 → 하이픈
- 소문자 변환
- 연속 하이픈 제거

**토큰 절감 효과**:
- Before: 19개 체크리스트 전부 읽기 (38,000 토큰)
- After: 마커 파일만 확인 (Glob만, 거의 0 토큰)

### 2-2. 처리 대상 체크리스트만 읽기

마커 없는 페이지들만 체크리스트 전체 읽기:
- `$ARGUMENTS.checklist` 지정 시: 해당 파일만 읽기
- 미지정 시:
  1. `_common_component.json` 제외
  2. 파일명 알파벳순 정렬
  3. 순차 처리

---

## 3단계: 섹션 병렬 구현 (최대 5개 동시)

### 3-1. 페이지 정보 추출
체크리스트 메타데이터에서:
- `fileKey`: Figma 파일 키
- `pageName`: 페이지 이름 → 정규화

**pageName 정규화 규칙**:
- `A_Home • Desktop` → `home`
- `About NIBEC > History` → `about-nibec-history`
- 앞의 `A_`, `B_` 등 prefix 제거
- 특수문자(`•`, `>`, `/`) → 하이픈
- 공백 → 하이픈
- 소문자 변환

### 3-2. 디렉토리 생성
```bash
mkdir -p css/{pageName}
mkdir -p .claude/markers/{pageName}
mkdir -p {pageName}
```

### 3-3. pending 섹션 수집
체크리스트의 `sections` 배열에서 마커 파일이 없는 섹션 필터링

### 3-4. 기존 마커 파일 개수 기록
```
Glob .claude/markers/{pageName}/*
```
기존 마커 개수 기억 (완료 확인용) 

### 3-5. 섹션별 병렬 실행 (최대 5개씩)
각 섹션에 대해 **병렬로** figma-implementer 호출:

```
Task 도구 호출:
- subagent_type: "figma-implementer"
- run_in_background: true  ← 병렬 실행!
- prompt: (아래 JSON 형식)
```

```json
{
  "target": {
    "type": "section",
    "name": "{section.name}",
    "nodeId": "{section.nodeId}",
    "fileKey": "{metadata.fileKey}"
  },
  "context": {
    "pageName": "{normalized-pageName}",
    "order": {section.order},
    "size": { "width": 1920, "height": 1080 }
  },
  "outputPaths": {
    "php": "{pageName}/{order:02d}-{section-slug}.php",
    "css": "css/{pageName}/{order:02d}-{section-slug}.css",
    "marker": ".claude/markers/{pageName}/{order:02d}-{section-slug}"
  }
}
```

**section-slug 생성 규칙**:
- `Header (Hero Section)` → `header-hero-section`
- 괄호 제거, 공백 → 하이픈, 소문자

**예시 (home 페이지)**:
| 섹션 | order | PHP | CSS | 마커 |
|------|-------|-----|-----|------|
| Header (Hero Section) | 1 | home/01-header-hero-section.php | css/home/01-header-hero-section.css | .claude/markers/home/01-header-hero-section |
| About Section | 2 | home/02-about-section.php | css/home/02-about-section.css | .claude/markers/home/02-about-section |

### 3-6. 완료 대기

`wait_for_markers(.claude/markers/{pageName}, *.done, 180초, 20회, pending개수)`

타임아웃 시 생성된 마커들만으로 4단계 진행

---

## 4단계: CSS 병합

모든 섹션 완료 후:
```bash
python .claude/scripts/merge_section_css.py {pageName}
```

결과: `css/{pageName}/*.css` → `css/{pageName}.css`

---

## 5단계: 페이지 완료 마커 생성

마커 파일 기반으로 완료 여부 확인:

1. `.claude/markers/{pageName}/*.done` 파일 목록 수집
2. `.claude/markers/{pageName}/*.failed` 파일 목록 수집
3. **페이지 완료 확인 및 마커 생성**:
   ```javascript
   const totalSections = checklist.sections.length;
   const doneMarkers = Glob('.claude/markers/{pageName}/*.done');
   const failedMarkers = Glob('.claude/markers/{pageName}/*.failed');

   if (doneMarkers.length + failedMarkers.length >= totalSections) {
     // 모든 섹션이 완료 또는 실패 → 페이지 완료 마커 생성
     const timestamp = new Date().toISOString();

     Write `.claude/markers/{pageName}/page.completed`:
     `completed|${timestamp}|{pageName}|${doneMarkers.length}|${failedMarkers.length}`
   }
   ```

**중요**:
- 마커 개수가 섹션 수와 같으면 페이지 작업 완료
- 다음 실행 시 이 페이지는 2단계에서 건너뜀

---

## 6단계: 페이지 병합 (메인 세션에서 직접 처리)

섹션 파일들을 하나의 완전한 PHP 페이지로 병합합니다.

### 6-1. 섹션 파일 읽기 및 병합

```
Task 도구 호출:
- subagent_type: "section-merger"
- run_in_background: true
- prompt: (아래 JSON 형식)
```

```json
{
  "checklistFile": "{체크리스트 파일명}",
  "pageName": "{정규화된 페이지명}",
  "outputFile": "{pageName}.php"
}
```

**예시 (home 페이지)**:
```json
{
  "checklistFile": "A_Home_Desktop.json",
  "pageName": "home",
  "outputFile": "home.php"
}
```

### 6-2. 완료 대기

`wait_for_markers(.claude/markers/{pageName}, merged.*, 10초, 12회, 1)`

### 6-3. 결과 확인

마커 파일 읽기:
```
merged|2026-01-04T12:00:00Z|home.php|9|0
```

파싱:
- `outputFile`: 생성된 통합 페이지
- `completedCount`: 병합된 섹션 수
- `failedCount`: 건너뛴 섹션 수

---

## 7단계: 정리 (Cleanup)

페이지 병합 완료 후, 더 이상 필요 없는 임시 파일들을 정리합니다.

### 7-1. 섹션별 PHP 파일 삭제

```bash
rm -rf {pageName}/
```

**이유**:
- 이미 `{pageName}.php`로 병합됨
- 섹션별 파일은 중간 산출물
- 체크리스트에 모든 정보 보존됨

**예시**:
```bash
# home/ 디렉토리 전체 삭제
rm -rf home/

# 삭제되는 파일:
# - home/01-header-hero-section.php
# - home/02-lab-section-with-feature-cards.php
# - ...
# - home/08-news-investor-relations-section.php
```

### 7-2. 마커 파일 정리 (선택사항)

마커 파일은 작업 이력이므로 보관 권장하지만, 정리가 필요하면:

```bash
# 섹션별 마커만 삭제 (merged.done은 보관)
rm .claude/markers/{pageName}/*.done
rm .claude/markers/{pageName}/*.failed

# 또는 전체 삭제
# rm -rf .claude/markers/{pageName}/
```

**보관 권장**:
- ✅ `.claude/markers/{pageName}/merged.done` - 병합 이력
- ⚠️ `.claude/markers/{pageName}/*.done` - 섹션 구현 이력 (디버깅용)

### 7-3. CSS 정리 확인

`merge_section_css.py` 스크립트가 이미 자동으로 처리함:
- ✅ `css/{pageName}/*.css` → `css/{pageName}.css` 병합 후 자동 삭제
- ✅ `css/{pageName}/` 디렉토리 자동 삭제

**확인**:
```bash
# CSS 병합 결과 확인
ls css/{pageName}.css  # ✓ 존재해야 함
ls css/{pageName}/     # ✗ 삭제되어야 함
```

### 7-4. 최종 파일 구조

정리 후 남는 파일:

```
프로젝트/
├── {pageName}.php              ← 최종 통합 페이지
├── css/
│   └── {pageName}.css          ← 최종 통합 CSS
├── .claude/
│   ├── checklist/
│   │   └── {ChecklistName}.json  ← 설계도 (필수 보관)
│   └── markers/
│       └── {pageName}/
│           └── merged.done        ← 병합 이력
└── includes/                   ← 공통 컴포넌트
    ├── navbar.php
    └── footer.php
```

---

## 8단계: 다음 체크리스트 진행

### 조건 확인
- 현재 체크리스트의 모든 섹션이 completed 또는 failed
- 페이지 병합 완료
- 또는 $ARGUMENTS.checklist 지정시 여기서 종료

### 다음 체크리스트로
2단계로 돌아가 다음 체크리스트 선택 후 반복

**중요**: 각 페이지 완료 시마다 7단계 정리 수행!

---

## 완료 보고

"완료" 한 단어만 출력 (상세 요약 금지, 컨텍스트 절약)
