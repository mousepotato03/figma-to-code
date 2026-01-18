---
description: Figma 구현 전체 파이프라인 실행 (base CSS → checklist → implement → fonts)
---

다음 작업을 순차적으로 수행해줘:

---

# 1단계: 기본 CSS 확인

```bash
python .claude/scripts/ensure_base_css.py
```

reset.css가 없으면 자동 생성됨

---

# 2단계: Checklist 생성

## 2-1. URL 데이터 로드

`.claude/figma-urls.json`에서 URL 목록을 읽어와.

전체 URL 사용

## 2-2. 페이지 분석 (배치 병렬 실행)

URL들을 10개씩 배치로 나누어 **병렬 실행** (시간 기반 연속 실행):

```
BATCH_SIZE = 10
BATCH_INTERVAL = 60  # 초

batches = split(urls, BATCH_SIZE)  # URL을 10개씩 그룹화

for i, batch in enumerate(batches):
  1. 배치 내 모든 URL 병렬 실행:
     for each URL in batch (parallel):
       Task 도구 호출:
         - subagent_type: "figma-page-analyzer"
         - prompt: URL
         - run_in_background: true

  2. if i < len(batches) - 1:  # 다음 배치가 있을 때만 대기
     60초 대기:
     ```bash
     python -c "import time; time.sleep(60)"
     ```

  3. 다음 배치로 진행

# 모든 배치 실행 후
4. 전체 완료 대기:
   ```bash
   python .claude/scripts/wait_files.py --path .claude/checklists --glob "*.json" --count {total_url_count} --timeout 120
   ```
```

**중요: TaskOutput 호출 금지**

## 2-3. 공통 컴포넌트 1차 병합 (순차 실행)

2-2의 모든 체크리스트가 생성된 후에, 아래 파이썬 스크립트를 실행하여 공통 컴포넌트를 추출해줘:

```bash
python .claude/scripts/merge_common_components.py
```

**동작**:
- 각 체크리스트 JSON의 commonComponents를 참조 형태로 변환
- `_common_component.json`에 모든 공통 컴포넌트 수집

**중요**: 이 단계는 반드시 2-2가 완료된 후에 실행

## 2-4. 공통 컴포넌트 중복 정리

2-3 완료 후, common-component-merger 에이전트를 실행해줘.

```
Task 도구 호출 시:
- subagent_type: "common-component-merger"
```

**동작**:
- 예를들어 `Navbar`, `Navbar (상단 네비게이션)`, `Navbar [Instance]` → 컴포넌트 하나로 통합
- 사용 페이지 목록과 출처별 메타데이터 병합

---

# 3단계: 구현

체크리스트 기반으로 Figma 디자인을 PHP/CSS로 구현합니다.

**컨텍스트 절약 규칙**:
- API 응답 원본 출력 금지
- 생성 코드 미리보기 금지
- 작업 예고/중간 설명 금지
- TaskOutput 호출 금지

### 정규화 규칙
| 대상 | 규칙 |
|------|------|
| pageName | prefix(`A_`, `B_`) 제거, 특수문자(`•`, `>`, `/`) → 하이픈, 공백 → 하이픈, 소문자, 연속 하이픈 제거 |
| slug | 괄호 제거, 공백 → 하이픈, 소문자 |

**예시**:
- `A_Home • Desktop` → `home`
- `About NIBEC > History` → `about-nibec-history`
- `Header (Hero Section)` → `header-hero-section`

### 배치 처리 공통 흐름 (시간 기반 연속 실행)
```
1. get_pending_sections.py --count-only → totalBatches = ceil(count / BATCH_SIZE)
2. while batchIndex < totalBatches:
   a. get_pending_sections.py --batch-size 10 --batch-index {batchIndex}
   b. 배치 내 모든 Task 병렬 호출 (단일 메시지에서 동시!)
   c. batchIndex += 1
   d. if batchIndex < totalBatches:  # 다음 배치가 있을 때만 대기
      90초 대기:
      ```bash
      python -c "import time; time.sleep(90)"
      ```
3. 모든 배치 실행 후 전체 완료 대기:
   ```bash
   python .claude/scripts/wait_files.py --path {마커경로} --mode marker --count {total_count}
   ```
4. 완료 마커 생성
```

## 헬퍼 스크립트

| 스크립트 | 용도 | 사용법 |
|---------|------|--------|
| `wait_files.py` | 파일 폴링 대기 | `python .claude/scripts/wait_files.py --path {경로} --mode marker --count {개수}` |
| `get_pending_sections.py` | pending 항목 조회 | `python .claude/scripts/get_pending_sections.py {pageName} --batch-size 10 --batch-index 0` |
| `merge_section_css.py` | CSS 병합 | `python .claude/scripts/merge_section_css.py {pageName}` |

## 3-0. 준비

체크리스트 목록 확인:
```
Glob .claude/checklists/*.json
```
- `_common_component.json`: 공통 컴포넌트
- 나머지: 페이지별 체크리스트

## 3-1. 공통 컴포넌트 구현

### 3-1-1. 완료 여부 확인
```bash
Glob .claude/markers/common/components.completed
```
- 파일 존재 → 3-1 건너뛰기
- 파일 없음 → 계속 진행

### 3-1-2. 배치 병렬 구현
**배치 처리 공통 흐름** 적용:
- 스크립트: `get_pending_sections.py --common`
- 마커 경로: `.claude/markers/common`

**Task prompt JSON**:
```json
{
  "target": {
    "type": "common",
    "name": "{component.name}",
    "slug": "{component.slug}",
    "nodeId": "{component.occurrences[0].nodeId}",
    "fileKey": "{component.occurrences[0].fileKey}"
  },
  "context": {
    "pageName": "_common",
    "position": "fixed-top"
  },
  "outputPaths": {
    "php": "includes/{component.slug}.php",
    "css": "css/common/{component.slug}.css",
    "marker": ".claude/markers/common/{component.slug}"
  }
}
```

### 3-1-3. CSS 병합 및 완료 마커
```bash
python .claude/scripts/merge_section_css.py common
```

완료 마커 생성:
```
Write .claude/markers/common/components.completed:
completed|{timestamp}|common|{doneCount}|{failedCount}
```

## 3-2. 체크리스트 선택

### 3-2-1. 마커로 사전 필터링
```bash
# 각 페이지의 완료 마커 확인
Glob .claude/markers/{pageName}/page.completed
```
- 마커 존재 → 건너뛰기 (체크리스트 읽기 불필요)
- 마커 없음 → 처리 대상

### 3-2-2. 처리 대상 선택
`_common_component.json` 제외, 알파벳순 처리

## 3-3. 섹션 배치 병렬 구현

### 3-3-1. 디렉토리 생성
```bash
mkdir -p css/{pageName} .claude/markers/{pageName} {pageName}
```

### 3-3-2. 배치 병렬 실행
**배치 처리 공통 흐름** 적용:
- 스크립트: `get_pending_sections.py {pageName}`
- 마커 경로: `.claude/markers/{pageName}`

**Task prompt JSON**:
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
    "position": "{section.position}",
    "size": { "width": 1920, "height": 1080 }
  },
  "outputPaths": {
    "php": "{pageName}/{flowNum:02d}-{section-slug}.php",
    "css": "css/{pageName}/{flowNum:02d}-{section-slug}.css",
    "marker": ".claude/markers/{pageName}/{flowNum:02d}-{section-slug}"
  }
}
```

**position → 파일명 변환 규칙**:
| position | flowNum | PHP 경로 |
|----------|---------|----------|
| `flow-1` | 01 | `{pageName}/01-{slug}.php` |
| `flow-2` | 02 | `{pageName}/02-{slug}.php` |
| `fixed-top` | - | `includes/navbar.php` (공통 컴포넌트) |
| `fixed-bottom-right` | - | `includes/fab-{slug}.php` (공통 컴포넌트) |

**예시 (home 페이지)**:
| 섹션 | position | PHP | CSS |
|------|----------|-----|-----|
| Hero Section | flow-1 | home/01-hero-section.php | css/home/01-hero-section.css |
| About Section | flow-2 | home/02-about-section.php | css/home/02-about-section.css |
| Footer | flow-3 | home/03-footer.php | css/home/03-footer.css |

## 3-4. CSS/PHP 병합

**순차 실행 (백그라운드 작업 누락 방지):**

1. **CSS 병합** (foreground):
   ```bash
   python .claude/scripts/merge_section_css.py {pageName}
   ```

2. **PHP 병합** (Task, background):
   ```json
   {
     "checklistFile": "{체크리스트 파일명}",
     "pageName": "{정규화된 페이지명}",
     "outputFile": "{pageName}.php"
   }
   ```
   - subagent_type: `section-merger`

3. **PHP 병합 완료 대기** (`page.completed` 마커):
   ```bash
   python .claude/scripts/wait_files.py --path .claude/markers/{pageName} --file page.completed --timeout 180
   ```

## 3-5. 정리 및 다음 진행

### 3-5-1. 섹션별 파일 삭제
```bash
rm -rf {pageName}/
```

### 3-5-2. 페이지 완료 마커 생성
```
Write .claude/markers/{pageName}/page.completed:
completed|{timestamp}|{pageName}|{doneCount}|{failedCount}
```

### 3-5-3. 최종 파일 구조
```
프로젝트/
├── {pageName}.php          ← 최종 통합 페이지
├── css/{pageName}.css      ← 최종 통합 CSS
├── .claude/checklists/     ← 설계도 (보관)
├── .claude/markers/        ← 작업 이력
└── includes/               ← 공통 컴포넌트
```

### 3-5-4. 다음 체크리스트
3-2로 돌아가 다음 체크리스트 처리

---

# 4단계: 폰트 설정

`.claude/fonts.json`을 읽어서 `css/fonts.css` 직접 생성:

1. `.claude/fonts.json` 파일 Read
2. `css/fonts.css` 생성:
   - Google Fonts 가능: @import URL 생성
   - Google Fonts 불가 (Pretendard, Paperlogy 등): CDN @import 추가
     - Pretendard: `https://cdn.jsdelivr.net/gh/orioncactus/pretendard@v1.3.9/dist/web/variable/pretendardvariable.min.css`
     - Paperlogy: `https://cdn.jsdelivr.net/gh/niceplugin/paperlogy@1.0.1/dist/css/paperlogy.min.css`
   - CSS 변수 설정 (--font-pretendard, --font-paperlogy 등)
3. Write로 `css/fonts.css` 저장
4. Google Fonts/CDN 모두 불가능한 폰트가 있으면 사용자에게 알림:
   ```
   ⚠️ 다음 폰트는 직접 파일을 구해서 적용해야 합니다:
   - {폰트명1}
   - {폰트명2}
   ```

---

# 완료 조건

- 각 단계 완료 후 다음 단계 진행
- 모든 URL 구현 완료 시 "파이프라인 실행 완료" 출력
