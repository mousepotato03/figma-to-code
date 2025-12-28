---
description: Figma URL을 figma-urls.json에 추가합니다. 공백으로 구분된 여러 URL을 한 번에 등록할 수 있습니다.
allowed-tools: Read, Write
---

# Figma URL 등록

사용자가 입력한 Figma URL들을 `figma-urls.json` 파일에 추가합니다.

## 입력

$ARGUMENTS

## 실행 절차

1. `figma-urls.json` 파일을 읽습니다
2. $ARGUMENTS에서 공백으로 구분된 URL들을 파싱합니다
3. 각 URL이 유효한 Figma URL인지 확인합니다 (https://www.figma.com/design/ 또는 https://figma.com/design/ 로 시작)
4. 중복되지 않는 URL만 urls 배열에 추가합니다
5. 파일을 저장합니다

## 유효성 검사

- Figma URL 패턴: `https://(www.)?figma.com/design/...`
- 이미 존재하는 URL은 스킵하고 알림

## 출력

- 추가된 URL 목록
- 스킵된 URL (중복 또는 유효하지 않음)
- 최종 등록된 총 URL 개수
