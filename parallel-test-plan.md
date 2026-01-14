# Figma Implement 병렬 처리 테스트 계획

## 목표
- **1순위**: 안정성 (API rate limit으로 인한 파이프라인 중단 방지)
- **2순위**: 속도 (병렬 처리를 통한 성능 개선)

## 환경
- Figma 플랜: Professional (분당 10~15 요청)
- 429 응답 시 `Retry-After` 헤더 제공

---

## Case 1: 고정 배치 병렬 처리 (페이지 순차 + 섹션 병렬)

### 설명
- **페이지는 순차** 처리, **섹션은 배치 병렬** 처리
- 배치 사이즈 5개로 고정
- 한 배치가 **완전히 끝날 때까지** 대기 후 다음 배치 시작
- 페이지 완료 후 CSS 병합 → 페이지 병합 → 다음 페이지
- 429 발생 시 서브에이전트가 `Retry-After` 만큼 대기 후 재시도

### 수도코드

```python
BATCH_SIZE = 5

# ========== 1. 공통 컴포넌트 처리 ==========
common_components = get_pending_components()  # _common_component.json

for i in range(0, len(common_components), BATCH_SIZE):
    batch = common_components[i:i + BATCH_SIZE]

    # 배치 내 모든 항목 병렬 실행
    for component in batch:
        Task(
            subagent_type="figma-implementer",
            run_in_background=True,
            prompt=component
        )

    # 현재 배치의 모든 마커가 생성될 때까지 대기
    wait_for_markers(
        path=".claude/markers/common",
        pattern="*.done",
        required_count=len(batch),
        interval=30,
        max_retries=20
    )

# 공통 컴포넌트 CSS 병합
merge_css("common")
write_marker(".claude/markers/common/components.completed")


# ========== 2. 페이지별 처리 (순차) ==========
pages = get_pending_pages()  # 완료 마커 없는 페이지만

for page in pages:
    sections = get_pending_sections(page.name)

    # 2-1. 섹션 배치 병렬 처리
    for i in range(0, len(sections), BATCH_SIZE):
        batch = sections[i:i + BATCH_SIZE]

        for section in batch:
            Task(
                subagent_type="figma-implementer",
                run_in_background=True,
                prompt=section
            )

        wait_for_markers(
            path=f".claude/markers/{page.name}",
            pattern="*.done",
            required_count=len(batch),
            interval=30,
            max_retries=20
        )

    # 2-2. 페이지 후처리 (섹션 모두 완료 후)
    merge_css(page.name)
    write_marker(f".claude/markers/{page.name}/page.completed")

    # 2-3. 페이지 병합
    Task(subagent_type="section-merger", run_in_background=True, ...)
    wait_for_markers(
        path=f".claude/markers/{page.name}",
        pattern="merged.done",
        required_count=1,
        interval=10,
        max_retries=12
    )

    # 2-4. 정리
    cleanup(page.name)

    # 다음 페이지로 진행
```

### 서브에이전트 내부 로직 (figma-implementer)

```python
max_retries = 5

for attempt in range(max_retries):
    response = mcp_figma_get_design_context(nodeId, fileKey)

    if response.status == 429:
        retry_after = int(response.headers["Retry-After"])
        sleep(retry_after)
        continue

    # 성공 시 구현 진행
    break
else:
    # 모든 재시도 실패 시 .failed 마커 생성
    write_failed_marker()
```

### 예상 동작
```
[공통 컴포넌트]
  Batch 1: comp1~5 병렬 → 마커 대기
  Batch 2: comp6~8 병렬 → 마커 대기
  → CSS 병합 → components.completed

[Page A] (8개 섹션)
  Batch 1: section1~5 병렬 → 마커 대기 (일부 429 → Retry-After → 재시도)
  Batch 2: section6~8 병렬 → 마커 대기
  → CSS 병합 → page.completed → 페이지 병합 → cleanup

[Page B] (6개 섹션)
  Batch 1: section1~5 병렬 → 마커 대기
  Batch 2: section6 병렬 → 마커 대기
  → CSS 병합 → page.completed → 페이지 병합 → cleanup
```

### 장점
- 구현 단순
- 배치 간 명확한 경계
- 페이지별 후처리 시점 명확

### 단점
- 배치 내 가장 느린 항목에 맞춰 대기
- Rate limit 활용 비효율 가능
- 한 페이지가 끝나야 다음 페이지 시작

---

## Case 2: 동적 병렬 + Retry-After

### 설명
- 초기 병렬 수 N개로 시작
- 429 발생 시 해당 에이전트가 `Retry-After` 대기 후 재시도
- 배치 경계 없이 연속 실행

### 수도코드

```python
MAX_CONCURRENT = 5
pending_sections = get_pending_sections()
active_count = 0

for section in pending_sections:
    # 동시 실행 수 제한
    while active_count >= MAX_CONCURRENT:
        # 완료된 마커 확인
        completed = check_new_markers()
        active_count -= completed
        if active_count >= MAX_CONCURRENT:
            sleep(10)

    # 새 작업 시작
    Task(
        subagent_type="figma-implementer",
        run_in_background=True,
        prompt=section
    )
    active_count += 1

# 남은 작업 완료 대기
wait_for_all_markers()
```

### 서브에이전트 내부 로직 (figma-implementer)

```python
max_retries = 3
for attempt in range(max_retries):
    response = mcp_figma_get_design_context(nodeId, fileKey)

    if response.status == 429:
        retry_after = response.headers["Retry-After"]
        sleep(retry_after)
        continue

    # 성공 시 구현 진행
    break
```

### 장점
- 빈 슬롯 즉시 활용
- Rate limit 최대 활용

### 단점
- 구현 복잡도 증가
- 동시 실행 추적 필요

---

## Case 3: 적응형 병렬 → 순차 전환

### 설명
- 병렬 수 5개로 시작
- 429 다발 시 병렬 수 감소 (5 → 3 → 1)
- 최악의 경우 순차 처리로 폴백
- `Retry-After` 항상 적용

### 수도코드

```python
concurrent_limit = 5
consecutive_429_count = 0
pending_sections = get_pending_sections()

for section in pending_sections:
    Task(
        subagent_type="figma-implementer",
        run_in_background=True,
        prompt=section
    )

    # 현재 병렬 수만큼 실행 후 대기
    if running_count >= concurrent_limit:
        results = wait_for_batch()

        # 429 발생 비율 확인
        rate_limit_hits = count_429_in_results(results)

        if rate_limit_hits > threshold:
            consecutive_429_count += 1
            # 병렬 수 감소
            if consecutive_429_count >= 2:
                concurrent_limit = max(1, concurrent_limit - 2)
                consecutive_429_count = 0
        else:
            consecutive_429_count = 0
```

### 서브에이전트 내부 로직

```python
max_retries = 5
for attempt in range(max_retries):
    response = mcp_figma_get_design_context(nodeId, fileKey)

    if response.status == 429:
        retry_after = response.headers["Retry-After"]
        # 마커에 429 발생 기록 (커맨드가 참조)
        write_rate_limit_marker(retry_after)
        sleep(retry_after)
        continue

    break
```

### 장점
- 최대한 빠르게 시작
- 상황에 따라 자동 조절
- 안정성 보장 (최악 = 순차 처리)

### 단점
- 가장 복잡한 구현
- 상태 추적 오버헤드

---

## 테스트 순서

1. **Case 1** 먼저 테스트 (구현 간단, 기본 동작 검증)
2. 결과에 따라 **Case 2** 또는 **Case 3** 진행

## 성공 기준

- [ ] 파이프라인 중단 없이 완료
- [ ] 기존 순차 처리 대비 시간 단축
- [ ] 불필요한 컨텍스트 소모 없음
