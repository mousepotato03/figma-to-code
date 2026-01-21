<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ir-new-notice</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/ir-new-notice/01-header-section.css">
  <link rel="stylesheet" href="css/ir-new-notice/02-layout-intro-section.css">
  <link rel="stylesheet" href="css/ir-new-notice/03-news-list-section.css">
</head>
<body>
  <!-- Fixed Top: Main Navbar -->
  <?php include_once 'includes/navbar.php'; ?>

  <main class="page-ir-new-notice">
    <!-- flow-1: Header Section (id: header-section) -->
    <section class="header-section">
      <div class="header-content">
        <div class="header-accent-bar"></div>
        <h1 class="header-title">Investor Relations &amp; News Center</h1>
      </div>
    </section>

    <!-- flow-2: Layout Intro Section (id: layout-intro-section) -->
    <section class="intro-section">
      <!-- 배경 이미지 (데코레이션) -->
      <div class="intro-bg-decoration">
        <img src="assets/images/ir-new-notice/susja-1i-issneun-nogsaeg-dna-gadag.png" alt="" class="bg-image-right">
        <img src="assets/images/ir-new-notice/susja-1i-issneun-nogsaeg-dna-gadag.png" alt="" class="bg-image-left">
      </div>

      <!-- 그라데이션 오버레이 -->
      <div class="intro-overlay"></div>
      <div class="intro-overlay-secondary"></div>

      <!-- 콘텐츠 영역 -->
      <div class="intro-content">
        <!-- 소개 텍스트 -->
        <div class="intro-text-wrapper">
          <p class="intro-description">
            지속 가능한 성장을 위한 투자 정보와 나이벡의 새로운 도전을 공유합니다.<br>
            투자자와 고객 여러분의 합리적인 의사결정을 돕기 위해 신뢰할 수 있는 정보를 약속드립니다.
          </p>
        </div>

        <!-- 네비게이션 탭 -->
        <nav class="intro-nav">
          <a href="#" class="nav-link">Press Releases</a>
          <a href="#" class="nav-link">Business Report</a>
          <a href="#" class="nav-link">Analyst Report</a>
          <a href="#" class="nav-link active">Notice</a>
        </nav>
      </div>
    </section>

    <!-- flow-3: News List Section (id: news-list-section) -->
    <section class="news-list-section">
      <div class="news-list-container">
        <!-- 헤더: 제목 + 검색 -->
        <div class="news-list-header">
          <div class="news-list-title-wrap">
            <h2 class="news-list-title">공지사항</h2>
          </div>
          <div class="news-list-search">
            <div class="search-select">
              <select class="search-condition">
                <option value="">검색 조건</option>
                <option value="title">제목</option>
                <option value="content">내용</option>
              </select>
              <img src="assets/icons/arrow-down.svg" alt="" class="select-arrow" aria-hidden="true">
            </div>
            <input type="text" class="search-input" placeholder="">
            <button type="button" class="search-btn">조회</button>
          </div>
        </div>

        <!-- 테이블 -->
        <div class="news-table">
          <!-- 테이블 헤더 -->
          <div class="news-table-header">
            <span class="col-num">번호</span>
            <span class="col-title">제목</span>
            <span class="col-views">조회수</span>
            <span class="col-date">등록일</span>
          </div>

          <!-- 테이블 바디 -->
          <a href="#" class="news-table-row">
            <span class="col-num">99</span>
            <div class="col-title-wrap">
              <span class="col-title-text">회사 문의사항에 대한 안내</span>
            </div>
            <span class="col-views">84</span>
            <span class="col-date">2025-12-10</span>
          </a>

          <a href="#" class="news-table-row">
            <span class="col-num">99</span>
            <div class="col-title-wrap">
              <span class="col-title-text">NIBEC 12월 정기 IR 개최 안내</span>
            </div>
            <span class="col-views">84</span>
            <span class="col-date">2025-12-10</span>
          </a>

          <a href="#" class="news-table-row">
            <span class="col-num">99</span>
            <div class="col-title-wrap">
              <span class="col-title-text truncate">[대표이사 인사말] 2024년 한 해 동안 나이벡을 아끼고 성원해 주신 주주 여러분께 진심으로 감사 드립니다.</span>
            </div>
            <span class="col-views">84</span>
            <span class="col-date">2025-12-10</span>
          </a>

          <a href="#" class="news-table-row">
            <span class="col-num">99</span>
            <div class="col-title-wrap">
              <span class="col-title-text">제 21기 정기 주주총회 대표이사 인사말</span>
            </div>
            <span class="col-views">84</span>
            <span class="col-date">2025-12-10</span>
          </a>

          <a href="#" class="news-table-row">
            <span class="col-num">99</span>
            <div class="col-title-wrap">
              <span class="col-title-text">[공고정정] 신주발행 및 주식명의개서정지 공고</span>
            </div>
            <span class="col-views">84</span>
            <span class="col-date">2025-12-10</span>
          </a>

          <a href="#" class="news-table-row">
            <span class="col-num">99</span>
            <div class="col-title-wrap">
              <span class="col-title-text">[공고] 신주발행 및 주식명의 개서정지 공고</span>
            </div>
            <span class="col-views">84</span>
            <span class="col-date">2025-12-10</span>
          </a>

          <a href="#" class="news-table-row">
            <span class="col-num">99</span>
            <div class="col-title-wrap">
              <span class="col-title-text">주주님들께 드리는 감사의 글</span>
            </div>
            <span class="col-views">84</span>
            <span class="col-date">2025-12-10</span>
          </a>

          <a href="#" class="news-table-row">
            <span class="col-num">99</span>
            <div class="col-title-wrap">
              <span class="col-title-text">[공고] 신주발행가액 확정공고</span>
            </div>
            <span class="col-views">84</span>
            <span class="col-date">2025-12-10</span>
          </a>
        </div>

        <!-- 페이지네이션 -->
        <nav class="pagination" aria-label="페이지 네비게이션">
          <button type="button" class="page-btn page-prev" aria-label="이전 페이지">&lt;</button>
          <button type="button" class="page-btn page-num active" aria-current="page">1</button>
          <button type="button" class="page-btn page-num">2</button>
          <button type="button" class="page-btn page-num">3</button>
          <button type="button" class="page-btn page-num">4</button>
          <span class="page-ellipsis">...</span>
          <button type="button" class="page-btn page-num">40</button>
          <button type="button" class="page-btn page-next" aria-label="다음 페이지">&gt;</button>
        </nav>
      </div>
    </section>

    <!-- flow-4: Footer (id: footer) -->
    <?php include_once 'includes/footer.php'; ?>
  </main>

  <!-- Scripts -->
  <script src="js/common.js"></script>
</body>
</html>
