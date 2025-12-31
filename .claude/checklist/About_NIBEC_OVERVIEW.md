# About NIBEC > OVERVIEW 구조 분석

> 분석 일시: 2026-01-01
> Figma URL: https://www.figma.com/design/PbENz9XeDICQsut5z1DfiC/NIBEC_%EB%B3%B8%EC%9E%91%EC%97%85?node-id=2413-12132

## 페이지 개요

NIBEC 회사 소개 페이지의 OVERVIEW 섹션입니다. 회사의 비전, 핵심 가치, 역사, 혁신 기반, 그리고 지속가능한 미래를 향한 메시지를 담고 있습니다. 전체 높이 7397px의 풀페이지 레이아웃으로 구성되어 있습니다.

## 일회성 섹션 (Page-specific Sections)

### Header (Hero Section) [ ]
- 순서: 1
- 크기: 1920 x 760px (Header 400px + Layout 360px)
- 설명: 페이지 상단 히어로 영역, 타이틀과 서브 텍스트 포함
- 주요 요소:
  - Frame 18: 타이틀 영역 (Rectangle 장식 + 헤드라인 텍스트)
  - Layout / 145 /: 배경 이미지와 소개 텍스트
  - 메인 메시지: "나이벡은 펩타이드 기술 기반의 바이오 연구를 선도하며..."
- 구현 노트: 배경 이미지 위 오버레이 텍스트, 좌측 정렬 레이아웃

### Vision Section [ ]
- 순서: 2
- 크기: 1920 x 1277px
- 설명: 회사 비전 및 미션 소개 섹션
- 주요 요소:
  - vision_title: 섹션 제목 ("인간 중심의 R&D 전문 기업 - NIBEC")
  - Group 22: 2개의 좌우 교차 레이아웃 섹션
    - Section 1: 좌측 이미지 + 우측 텍스트 (Vision)
    - Section 2: 좌측 텍스트 + 우측 이미지 (Mission)
- 구현 노트: 지그재그 레이아웃 패턴, 각 섹션 460px 높이

### Core Values Section [ ]
- 순서: 3
- 크기: 1920 x 1051px
- 설명: 4가지 핵심 가치 소개
- 주요 요소:
  - 섹션 제목: "가치로부터 시작되는 바이오 혁신"
  - 4개의 Content Top 카드 (각 320px 너비):
    - 탁월함: 아이콘 + 제목 + 설명
    - 협력: 아이콘 + 제목 + 설명
    - 혁신: 아이콘 + 제목 + 설명
    - 책임: 아이콘 + 제목 + 설명
- 구현 노트: 4열 그리드 레이아웃, 아이콘 100x100px

### Company Story Section [ ]
- 순서: 4
- 크기: 1920 x 823px
- 설명: 회사 역사 및 설립 배경 소개
- 주요 요소:
  - 제목: "과학적 발견을 넘어, 치유의 확신으로"
  - 본문: 2004년 설립 배경, IBEC 연구센터 기반
  - 3가지 핵심 포인트 (좌측 바 장식)
  - "NIBEC's History" 버튼 (chevron_right 아이콘)
  - 우측: 장식 이미지 (470px 너비)
- 구현 노트: 2열 레이아웃 (텍스트 810px + 이미지 470px)

### Three Innovation Pillars Section [ ]
- 순서: 5
- 크기: 1912 x 1176px
- 설명: 세 가지 혁신 기반 소개
- 주요 요소:
  - 제목: "우리를 증명하는 세 가지 혁신 기반"
  - 3개의 Column 카드 (각 약 399px 너비):
    - 이미지 (337px 높이) + Content (300px 높이)
    - Heading + Text 구성
- 구현 노트: 3열 카드 그리드, 이미지 상단 배치

### Video/Media Section [ ]
- 순서: 6
- 크기: 1920 x 1311px
- 설명: 비디오 플레이어 섹션
- 주요 요소:
  - 제목: "지속가능하고 건강한 내일을 향한 과학"
  - 비디오 플레이어 (1321 x 740px)
    - 프로그레스 바
    - 컨트롤 버튼들
    - 재생 버튼 (105 x 105px)
  - 캡션: "NIBEC's Journey Toward a Better Life"
- 구현 노트: 커스텀 비디오 플레이어 UI, 중앙 정렬

## 전체 구조 트리

```
2-1. About NIBEC > OVERVIEW (1920 x 1080, viewport)
|
+-- Navbar [Instance] (1920 x 130) - 최상단 고정
|
+-- Frame 23 (1920 x 7397) - 메인 컨텐츠 컨테이너
    |
    +-- Frame 72 / Header (1920 x 760)
    |   +-- Header (1920 x 400)
    |   |   +-- Frame 18: 타이틀 영역
    |   +-- Layout / 145 / (1920 x 360)
    |       +-- 배경 이미지들
    |       +-- 소개 텍스트
    |
    +-- Navbar_index [Instance] (1920 x 72)
    |
    +-- vision (1920 x 1277)
    |   +-- vision_title (1920 x 357)
    |   +-- Group 22 (1920 x 920)
    |       +-- Section 1: 이미지 좌 + 텍스트 우
    |       +-- Section 2: 텍스트 좌 + 이미지 우
    |
    +-- Our core values (1920 x 1051)
    |   +-- Frame 67: 섹션 제목
    |   +-- Frame 68: 4개 가치 카드 그리드
    |
    +-- Frame 70 / Company Story (1920 x 823)
    |   +-- Frame 73 (1280px 중앙)
    |       +-- Frame 22: 텍스트 영역
    |       +-- solidarity_940922 1: 이미지 영역
    |
    +-- solidarity_940922 1 / Three Pillars (1912 x 1176)
    |   +-- Frame 67: 제목
    |   +-- Row: 3개 Column 카드
    |
    +-- Layout / 369 / Video Section (1920 x 1311)
    |   +-- Frame 67: 제목
    |   +-- Frame 44: 비디오 플레이어
    |   +-- 캡션 텍스트
    |
    +-- footer [Instance] (1920 x 927)
```

## 구현 권장사항

### 레이아웃
- 컨테이너 최대 너비: 1280px (좌우 320px 패딩)
- 섹션 간 일관된 상단 패딩: 150px
- 그리드 시스템: 4열(Core Values), 3열(Three Pillars), 2열(Vision, Story) 활용

### 반응형 고려사항
- 모바일: 멀티 컬럼 레이아웃을 단일 컬럼으로 전환
- 태블릿: 4열 -> 2열, 3열 -> 2열 또는 1열
- 지그재그 레이아웃(Vision)은 모바일에서 이미지-텍스트 순서로 스택

### 접근성
- 비디오 플레이어: 키보드 네비게이션, 자막 지원
- 이미지 alt 텍스트 필수
- 충분한 색상 대비 확보
- 포커스 상태 명확히 표시

### 인터랙션
- Navbar: 스크롤 시 고정, 호버 효과
- "NIBEC's History" 버튼: 호버 시 화살표 이동 애니메이션
- 비디오 플레이어: 커스텀 컨트롤 구현
- 스크롤 애니메이션: 섹션별 페이드인 효과 고려