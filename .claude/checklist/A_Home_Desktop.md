# A_Home Desktop 구조 분석

> 분석 일시: 2026-01-01
> Figma URL: https://www.figma.com/design/PbENz9XeDICQsut5z1DfiC/NIBEC_%EB%B3%B8%EC%9E%91%EC%97%85?node-id=2413-13474

## 페이지 개요

NIBEC 바이오테크 기업의 메인 홈페이지. 데스크탑 버전(1920x1080)으로 Hero 섹션부터 Footer까지 총 10개 이상의 섹션으로 구성된 풀페이지 랜딩 구조.

## 일회성 섹션 (Page-specific Sections)

### Hero Section (Header) [ ]

- 순서: 1
- 위치: y: 0 ~ 1080
- 설명: 풀스크린 히어로 영역, 배경 이미지 + 헤드라인 + 서브텍스트 + Scroll Down 버튼
- 주요 요소:
  - 배경 이미지 (GettyImages-1410019115)
  - 헤드라인 텍스트
  - 설명 텍스트 (바이오테크 관련)
  - Scroll Down 버튼 (마우스 아이콘 포함)
- 구현 노트: 풀스크린 레이아웃, 텍스트 오버레이, 스크롤 유도 애니메이션 고려

### About/Mission Section (Frame 12) [ ]

- 순서: 2
- 위치: y: 1080 ~ 2160
- 설명: 연구원 이미지 배경 + 타원형 마스크 + 중앙 헤드라인/CTA
- 주요 요소:
  - 배경 이미지 (연구원)
  - 타원형 마스크 그룹
  - 분자 구조 장식 (hidden 상태)
  - 헤드라인 + Learn more 버튼
- 구현 노트: clip-path 또는 mask 활용, 시각적 효과 요소

### Research Domains Section (Layout 145) [ ]

- 순서: 3
- 위치: y: 2160 ~ 3240
- 설명: 연구 분야 소개, 좌측 텍스트 + 우측 원형 카드 그리드
- 주요 요소:
  - 섹션 제목 + 설명
  - 2개의 원형 카드 (각 카드에 아이콘 + 제목 + 설명)
  - NIBEC 로고 원형 요소
  - 장식용 배경 이미지
- 구현 노트: CSS Grid 또는 absolute positioning, 원형 컨테이너 스타일링

### Drug Delivery Platform Section (Frame 53) [ ]

- 순서: 4
- 위치: y: 3240 ~ 5253
- 설명: PEPTARDEL 약물 전달 플랫폼 상세 소개, 4개 하위 섹션
- 주요 요소:
  - 메인 헤드라인 (Delivering care to hardest-to-reach areas)
  - 섹션 1: One Body 펩타이드 전달 시스템 (아이콘 + 텍스트 + 이미지)
  - 섹션 2: 약물 방출 제어 (7일~3개월)
  - 섹션 3: 경구용 지속 방출 제형
- 구현 노트: 교차 레이아웃 (이미지 좌/우 번갈아 배치), 아이콘 시스템 필요

### Medical Device & Innovation Section (Layout 369 첫번째) [ ]

- 순서: 5
- 위치: y: 5253 ~ 6492
- 설명: 의료기기, 신약 개발, 바이오 코스메틱 소개
- 주요 요소:
  - 섹션 제목 + 설명
  - 3개 카드 그리드 (Card_1, Card_2, Card_3)
- 구현 노트: 3열 카드 레이아웃 (각 카드 526.67px 너비)

### Additional Layout Section (Layout 369 두번째) [ ]

- 순서: 6
- 위치: y: 6492 ~ 7647
- 설명: 추가 레이아웃 섹션 (내용 미상세)
- 주요 요소: 빈 프레임으로 보임 (하위 요소 미표시)
- 구현 노트: 상세 내용 확인 필요

### Statistics Section (Frame 59) [ ]

- 순서: 7
- 위치: y: 7647 ~ 8592
- 설명: 성과 통계 (연구 성공률, 활성 연구 프로그램)
- 주요 요소:
  - 섹션 제목 + 설명
  - 85% - Research success rate (이미지 배경 + 오버레이)
  - 12 - Active research programs
  - Medical Device/Drug Discovery Products 링크
  - Medical Device/Drug Discovery Pipeline 링크
- 구현 노트: 4열 그리드, 이미지 오버레이 + 큰 숫자 타이포그래피

### IR/News Section Header (Frame 19) [ ]

- 순서: 8
- 위치: y: 8592 ~ 9057
- 설명: IR/뉴스 섹션 소개 헤드라인
- 주요 요소:
  - 섹션 제목
  - 설명 텍스트 (파트너/투자자와 함께 성장)
- 구현 노트: 중앙 정렬 텍스트 블록

### Investor Relations & Press Section (Layout 369 세번째) [ ]

- 순서: 9
- 위치: y: 9057 ~ 9597
- 설명: IR 정보 및 보도자료 하이라이트
- 주요 요소:
  - 좌측: Investor Relations (이미지 배경 + 텍스트 + View Latest Report 버튼)
  - 우측: Press Releases (최근 뉴스 2개 항목)
    - IR Council 관련 기사 링크들
  - NIBEC 로고
- 구현 노트: 2열 레이아웃, 뉴스 목록 스타일링

## 전체 구조 트리

```
A_Home Desktop (1920 x 1080 viewport)
+-- Navbar [Instance] (1920 x 130) - 공통
+-- contants (1920 x 10524)
    +-- Header/Hero Section (1920 x 1080)
    |   +-- 배경 이미지
    |   +-- 헤드라인 텍스트
    |   +-- Scroll Down 버튼
    +-- Frame 12 - About Section (1920 x 1080)
    |   +-- 마스크 그룹 (타원형)
    |   +-- 중앙 텍스트 + CTA
    +-- Layout 145 - Research Domains (1920 x 1080)
    |   +-- 텍스트 블록
    |   +-- 원형 카드 x 2
    +-- Frame 53 - Drug Delivery (1920 x 2013)
    |   +-- 메인 헤드라인
    |   +-- 섹션 x 4 (교차 레이아웃)
    +-- Layout 369 - Medical/Innovation (1920 x 1239)
    |   +-- 섹션 헤드라인
    |   +-- 카드 x 3
    +-- Layout 369 - Additional (1920 x 1155)
    +-- Frame 59 - Statistics (1920 x 945)
    |   +-- 섹션 헤드라인
    |   +-- 통계 카드 x 4
    +-- Frame 19 - IR Header (1920 x 465)
    +-- Layout 369 - IR/Press (1920 x 540)
    |   +-- IR 컨테이너
    |   +-- Press 목록
    +-- Footer [Instance] (1920 x 927) - 공통
```

## 구현 권장사항

### 레이아웃
- 전체 페이지는 1920px 기준 데스크탑 레이아웃
- 섹션별 max-width 설정 및 중앙 정렬 필요
- 좌우 패딩 110px 기준으로 컨텐츠 영역 설정

### 반응형 고려사항
- 현재 데스크탑 버전만 분석됨
- 태블릿/모바일 breakpoint 별도 디자인 확인 필요
- 원형 카드, 통계 섹션 등 모바일 레이아웃 재배치 필요

### 접근성
- 히어로 섹션 배경 이미지에 적절한 alt 텍스트
- 통계 수치에 대한 스크린리더 친화적 마크업
- 버튼/링크 포커스 상태 스타일링

### 인터랙션
- Scroll Down 버튼 스크롤 애니메이션
- Learn more, chevron_right 버튼 호버 효과
- 통계 섹션 카운트업 애니메이션 고려
- 섹션 진입 시 fade-in 애니메이션 고려