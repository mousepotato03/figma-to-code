---
description: 체크리스트 기반 Figma 섹션을 PHP/CSS로 구현
arguments:
  - name: checklist
    description: 특정 체크리스트 파일명 (생략시 전체 순차 처리)
    required: false
---

체크리스트 기반으로 Figma 디자인을 PHP/CSS로 구현합니다.

**컨텍스트 절약 규칙**:
- API 응답 원본 출력 금지
- 생성 코드 미리보기 금지
- 작업 예고/중간 설명 금지
- TaskOutput 호출 금지

---

## 상수 및 공통 규칙

### 상수
| 상수 | 값 | 설명 |
|------|---|------|
| BATCH_SIZE | 5 | 병렬 실행 배치 크기 |

### 정규화 규칙
| 대상 | 규칙 |
|------|------|
| pageName | prefix(`A_`, `B_`) 제거, 특수문자(`•`, `>`, `/`) → 하이픈, 공백 → 하이픈, 소문자, 연속 하이픈 제거 |
| slug | 괄호 제거, 공백 → 하이픈, 소문자 |

**예시**:
- `A_Home • Desktop` → `home`
- `About NIBEC > History` → `about-nibec-history`
- `Header (Hero Section)` → `header-hero-section`

### 배치 처리 공통 흐름
```
1. get_pending_sections.py --count-only → totalBatches = ceil(count / BATCH_SIZE)
2. while batchIndex < totalBatches:
   a. get_pending_sections.py --batch-size 5 --batch-index {batchIndex}
   b. 배치 내 모든 Task 병렬 호출 (단일 메시지에서 동시!)
   c. wait_markers.py로 블로킹 대기
   d. batchIndex += 1
3. 완료 마커 생성
```

---

## 헬퍼 스크립트

| 스크립트 | 용도 | 사용법 |
|---------|------|--------|
| `wait_markers.py` | 마커 폴링 대기 | `python .claude/scripts/wait_markers.py --path {경로} --count {개수}` |
| `get_pending_sections.py` | pending 항목 조회 | `python .claude/scripts/get_pending_sections.py {pageName} --batch-size 5 --batch-index 0` |
| `merge_section_css.py` | CSS 병합 | `python .claude/scripts/merge_section_css.py {pageName}` |

---

## 0단계: 준비

체크리스트 목록 확인:
```
Glob .claude/checklists/*.json
```
- `_common_component.json`: 공통 컴포넌트
- 나머지: 페이지별 체크리스트

---

## 1단계: 공통 컴포넌트 구현

### 1-1. 완료 여부 확인
```bash
Glob .claude/markers/common/components.completed
```
- 파일 존재 → 1단계 건너뛰기
- 파일 없음 → 계속 진행

### 1-2. 배치 병렬 구현
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
    "order": 0
  },
  "outputPaths": {
    "php": "includes/{component.slug}.php",
    "css": "css/common/{component.slug}.css",
    "marker": ".claude/markers/common/{component.slug}"
  }
}
```

### 1-3. CSS 병합 및 완료 마커
```bash
python .claude/scripts/merge_section_css.py common
```

완료 마커 생성:
```
Write .claude/markers/common/components.completed:
completed|{timestamp}|common|{doneCount}|{failedCount}
```

---

## 2단계: 체크리스트 선택

### 2-1. 마커로 사전 필터링
```bash
# 각 페이지의 완료 마커 확인
Glob .claude/markers/{pageName}/page.completed
```
- 마커 존재 → 건너뛰기 (체크리스트 읽기 불필요)
- 마커 없음 → 처리 대상

### 2-2. 처리 대상 선택
- `$ARGUMENTS.checklist` 지정 시: 해당 파일만
- 미지정 시: `_common_component.json` 제외, 알파벳순 처리

---

## 3단계: 섹션 배치 병렬 구현

### 3-1. 디렉토리 생성
```bash
mkdir -p css/{pageName} .claude/markers/{pageName} {pageName}
```

### 3-2. 배치 병렬 실행
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

**예시 (home 페이지)**:
| 섹션 | order | PHP | CSS |
|------|-------|-----|-----|
| Header (Hero Section) | 1 | home/01-header-hero-section.php | css/home/01-header-hero-section.css |
| About Section | 2 | home/02-about-section.php | css/home/02-about-section.css |

---

## 4단계: CSS/PHP 병합

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
   python .claude/scripts/wait_markers.py --path .claude/markers/{pageName} --pattern page.completed --interval 10 --timeout 180
   ```

---

## 5단계: 정리 및 다음 진행

### 5-1. 섹션별 파일 삭제
```bash
rm -rf {pageName}/
```

### 5-2. 페이지 완료 마커 생성
```
Write .claude/markers/{pageName}/page.completed:
completed|{timestamp}|{pageName}|{doneCount}|{failedCount}
```

### 5-3. 최종 파일 구조
```
프로젝트/
├── {pageName}.php          ← 최종 통합 페이지
├── css/{pageName}.css      ← 최종 통합 CSS
├── .claude/checklists/     ← 설계도 (보관)
├── .claude/markers/        ← 작업 이력
└── includes/               ← 공통 컴포넌트
```

### 5-4. 다음 체크리스트
- `$ARGUMENTS.checklist` 지정 시: 종료
- 미지정 시: 2단계로 돌아가 다음 체크리스트 처리

---

## 완료 보고

```
완료
```
