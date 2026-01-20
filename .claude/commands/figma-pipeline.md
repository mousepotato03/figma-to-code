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

## 실행 흐름

```
# 설정
BATCH_SIZE = 10
BATCH_INTERVAL = 60  # 초

# 2-1. URL 로드
urls = load(".claude/figma-urls.json")
totalCount = len(urls)
batches = split(urls, BATCH_SIZE)

# 2-2. 페이지 분석 (배치 병렬)
for i, batch in enumerate(batches):
  # 배치 내 병렬 실행
  for url in batch (parallel):
    Task(subagent_type="figma-page-analyzer", prompt=url, run_in_background=true)

  # 다음 배치 대기 (마지막 배치 제외)
  if i < len(batches) - 1:
    sleep(60)

# 분석 완료 대기 (반드시 포그라운드에서 실행. **백그라운드 실행 금지**)
wait_files.py --path .claude/checklists --glob "*.json" --count {totalCount}

# 2-3. 공통 컴포넌트 1차 병합
python .claude/scripts/merge_common_components.py

# 2-4. 공통 컴포넌트 중복 정리
Task(subagent_type="common-component-merger")
```

**중요: TaskOutput 호출 금지**

## 세부 단계 설명

### 2-1. URL 데이터 로드
- 소스: `.claude/figma-urls.json`
- 전체 URL 사용

### 2-2. 페이지 분석
- Task: `figma-page-analyzer`
- 출력: `.claude/checklists/{pageName}.json`

### 2-3. 공통 컴포넌트 1차 병합
- 각 체크리스트의 `type: "common"` 노드 추출
- 출력: `_common_component.json`

### 2-4. 공통 컴포넌트 중복 정리
- 유사 이름 컴포넌트 통합 (예: `Navbar`, `Navbar (상단 네비게이션)`, `Navbar [Instance]` → 하나로)
- 사용 페이지 목록과 출처별 메타데이터 병합

---

# 3단계: 구현

체크리스트 기반으로 Figma 디자인을 PHP/CSS로 구현합니다.

## 설정값
```
BATCH_SIZE = 10
BATCH_INTERVAL = 60  # 초
```

## 헬퍼 스크립트

| 스크립트 | 용도 | 사용법 |
|---------|------|--------|
| `wait_files.py` | 파일 폴링 대기 | `python .claude/scripts/wait_files.py --path {경로} --mode marker --count {개수}` |
| `get_pending_sections.py` | pending 항목 조회 | `python .claude/scripts/get_pending_sections.py --batch-size 10 --batch-index 0` |
| `merge_section_css.py` | CSS 병합 | `python .claude/scripts/merge_section_css.py {pageName}` |

### wait_files.py 옵션

| 옵션 | 설명 |
|------|------|
| `--path` | **필수** - 대상 디렉토리 경로 |
| `--mode marker` | *.done + *.failed 자동 카운팅 |
| `--glob "패턴"` | glob 패턴 (예: `*.json`, `**/*.done`) |
| `--recursive` | 마커 모드에서 하위 디렉토리 재귀 검색 |
| `--count N` | 대기할 파일 개수 |
| `--timeout N` | 최대 대기 시간 (초, 기본값: 600) |

---

## 3-1. 공통 컴포넌트 구현

### 3-1-1. 완료 여부 확인
```bash
Glob .claude/markers/common/components.completed
```
- 파일 존재 → 3-1 건너뛰기
- 파일 없음 → 계속 진행

### 3-1-2. 배치 병렬 구현
```
totalCount = Bash("python .claude/scripts/get_pending_sections.py --common --count-only")
totalBatches = ceil(totalCount / BATCH_SIZE)

for batchIndex in range(totalBatches):
  sections = Bash(f"python .claude/scripts/get_pending_sections.py --common --batch-size {BATCH_SIZE} --batch-index {batchIndex}")

  # 배치 내 모든 Task 병렬 호출 (단일 메시지!)
  for section in sections (parallel):
    Task(subagent_type="figma-implementer", prompt={JSON}, run_in_background=true)

  # 다음 배치가 있으면 60초 대기
  if batchIndex < totalBatches - 1:
    sleep(60)

# 전체 완료 대기
wait_files.py --path .claude/markers/common --mode marker --count {totalCount}
```

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

---

## 3-2. 전체 섹션 풀 수집

모든 페이지의 pending 섹션을 하나의 풀로 수집합니다.

### 3-2-1. 총 섹션 수 확인
```bash
python .claude/scripts/get_pending_sections.py --count-only
```
- 결과: `totalCount`
- 배치 수: `totalBatches = ceil(totalCount / BATCH_SIZE)`

### 3-2-2. 필요 디렉토리 생성 (병렬)
pending 섹션에서 고유 페이지 목록 추출 후 디렉토리 생성:
```bash
# 페이지 목록 확인
python .claude/scripts/get_pending_sections.py --pages-only

# 각 페이지별 디렉토리 생성 (병렬 Bash)
for pageName in pageNames (parallel):
  mkdir -p css/{pageName} .claude/markers/{pageName} {pageName}
```

---

## 3-3. 순차 구현

전체 섹션을 하나씩 순차적으로 실행합니다.

```
sections = Bash("python .claude/scripts/get_pending_sections.py")

for section in sections:
  Task(
    subagent_type="figma-implementer",
    prompt={JSON}
  )
  # 각 Task 완료 후 다음 진행
```

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

---

## 3-4. 전체 섹션 완료 대기

모든 섹션 실행 후, 전체 섹션 마커 완료 확인.

### 카운트 계산
```
# 공통 컴포넌트 개수 (3-1에서 이미 계산됨)
commonCount = Bash("python .claude/scripts/get_pending_sections.py --common --count-only")

# 일반 섹션 개수 (3-2에서 이미 계산됨)
sectionCount = Bash("python .claude/scripts/get_pending_sections.py --count-only")

# 전체 마커 대기 개수
totalCount = commonCount + sectionCount
```

### 대기 명령 (두 가지 방법 중 택일)
```bash
# 방법 1: --recursive 플래그 사용
python .claude/scripts/wait_files.py --path .claude/markers --mode marker --recursive --count {totalCount}

# 방법 2: glob 패턴 사용
python .claude/scripts/wait_files.py --path .claude/markers --glob "**/*.done" --count {totalCount}
```

**주의**: `--path`는 필수 인자입니다.

---

## 3-5. CSS/PHP 병합 (모든 페이지 병렬)

### 3-5-1. CSS 병합 (병렬 Bash)
스크립트 기반이므로 Bash로 병렬 실행:
```
for pageName in pageNames (parallel):
  Bash(f"python .claude/scripts/merge_section_css.py {pageName}")
```

### 3-5-2. PHP 병합 (병렬 Task)
서브에이전트 기반이므로 Task로 병렬 실행:
```
for pageName in pageNames (parallel):
  Task(
    subagent_type="section-merger",
    prompt={JSON},
    run_in_background=true
  )
```

**Task prompt JSON**:
```json
{
  "checklistFile": "{pageName}.json",
  "pageName": "{정규화된 페이지명}",
  "outputFile": "{pageName}.php"
}
```

### 3-5-3. PHP 병합 완료 대기
```bash
python .claude/scripts/wait_files.py --path .claude/markers --glob "*/page.completed" --count {len(pageNames)}
```

---

## 3-6. 정리

### 3-6-1. 섹션별 파일 삭제
```bash
for pageName in pageNames:
  rm -rf {pageName}/
```

### 3-6-2. 최종 파일 구조
```
프로젝트/
├── {pageName}.php          ← 최종 통합 페이지
├── css/{pageName}.css      ← 최종 통합 CSS
├── .claude/checklists/     ← 설계도 (보관)
├── .claude/markers/        ← 작업 이력
└── includes/               ← 공통 컴포넌트
```

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
