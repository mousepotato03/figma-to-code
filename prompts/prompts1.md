figma-urls.json에 등록된 NIBEC 프로젝트의 페이지들을 PHP 웹사이트로 변환해주세요.

## 프로젝트 정보
- figma_urls 파일 확인하여 페이지 링크들 참조
- theme.css 생성 완료 (css/theme.css)

## 작업 순서

### 메인 에이전트 역할
1. figma-urls.json 읽어서 URL 목록 확인
2. URL을 **하나씩 순차적으로** f2p-orchestrator에게 전달
3. 페이지 완성 확인 후 다음 URL로 이동

### f2p-orchestrator 역할 (URL당 1회 호출)
1. get_metadata 호출하여 페이지 구조 파악
2. 공통 컴포넌트 식별 (NavBar, Footer 등)
3. checklist/check_[pagename].md 작성
4. f2p-worker에게 섹션별 작업 배분
5. 완료된 섹션들을 페이지 파일에 조립

## 출력 구조
- [PageName].php (11개 페이지 파일)
- css/[PageName].css (페이지별 스타일)
- includes/*.php (공통 컴포넌트)
- assets/icons/[PageName]/ (아이콘)
- assets/images/[PageName]/ (이미지)
- checklist/check_[pagename].md (진행 상황 추적)

## 필수 규칙
1. css/theme.css의 CSS 변수 반드시 사용 (하드코딩 금지)
2. Overflow 발생 시 get_metadata로 하위 노드 분할 후 재배정
3. 2회 연속 실패 시 [실패] 처리 후 다음 작업으로 이동
4. 일회성 섹션은 페이지 파일에 직접 작성, 공통 컴포넌트만 include

작업을 시작해주세요.