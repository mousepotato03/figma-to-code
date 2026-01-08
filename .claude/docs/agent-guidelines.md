# 에이전트 공통 규칙

이 문서는 모든 서브에이전트가 준수해야 할 공통 규칙을 정의합니다.

---

## 1. 컨텍스트 절약 (필수)

### 절대 금지 사항

| 금지 항목 | 이유 |
|----------|------|
| API 응답 원본 출력 | 컨텍스트 폭발 |
| 생성 코드 미리보기 | 중복 토큰 낭비 |
| "~를 하겠습니다" 작업 예고 | 불필요한 출력 |
| 도구 호출 결과 요약 | 자동 표시됨 |
| 중간 과정 설명 | 최종 결과만 필요 |

### 왜 이 규칙이 중요한가?

서브에이전트는 최대 5개가 병렬 실행됨. 각 에이전트의 **모든 출력**이 메인 세션 컨텍스트로 반환되므로, 불필요한 출력은 컨텍스트를 빠르게 소진시킴.

---

## 2. 체크리스트 JSON 접근 금지

**절대로** `.claude/checklist/*.json` 파일을 읽거나 수정하지 마세요.

- 상태 관리는 메인 세션의 역할
- 에이전트는 마커 파일(.done/.failed)만 생성
- JSON 충돌 방지를 위한 핵심 규칙

**예외**: `common-component-merger`는 `_common_component.json` 수정이 목적

---

## 3. 마커 파일 시스템

에이전트는 JSON 대신 마커 파일로 상태를 보고합니다.

### 성공 시 (.done 파일)

```
{type}|{ISO timestamp}|{details...}
```

### 실패 시 (.failed 파일)

```
failed|{ISO timestamp}|{error reason}
```

**마커 파일 위치**: `.claude/markers/{pageName}/`

각 에이전트별 구체적 형식은 해당 에이전트 문서 참조.

---

## 4. 최종 출력 형식

작업 완료 시 **이 형식만** 출력:

```
완료: {대상명}
{에이전트별 요약 정보}
```

**허용되는 출력:**
- 도구 호출 (Read, Write, Bash, MCP 등)
- 위 형식의 최종 완료 메시지

---

## 5. 에러 처리

1. 최대 3회 재시도
2. 실패 시 `.failed` 마커 생성
3. 에러 원인 기록

---

## 에이전트별 추가 규칙

| 에이전트 | 추가 참조 문서 |
|---------|---------------|
| figma-implementer | `.claude/docs/convention.md`, `css/theme.css` |
| figma-page-analyzer | - |
| section-merger | `.claude/docs/convention.md` |
| common-component-merger | - |
