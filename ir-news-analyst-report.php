<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ir-news-analyst-report</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/ir-news-analyst-report.css">
</head>
<body>
  <!-- Fixed Top: Main Navbar -->
  <?php include_once 'includes/navbar.php'; ?>

  <main class="page-ir-news-analyst-report">
    <!-- flow-1: Header Section (id: header-section) -->
    <section class="header-section">
      <div class="header-content">
        <div class="header-indicator">
          <div class="indicator-bar"></div>
        </div>
        <h1 class="header-title">Investor Relations & News Center</h1>
      </div>
    </section>

    <!-- flow-2: Sub Navigation Section (id: sub-navigation-section) -->
    <section class="sub-navigation-section">
      <div class="sub-navigation-intro">
        <p class="intro-text">지속 가능한 성장을 위한 투자 정보와 나이벡의 새로운 도전을 공유합니다.</p>
        <p class="intro-text">투자자와 고객 여러분의 합리적인 의사결정을 돕기 위해 신뢰할 수 있는 정보를 약속드립니다.</p>
      </div>
      <nav class="sub-navigation-navbar">
        <a href="ir-news-press-releases.php" class="nav-link">
          <span>Press Releases</span>
        </a>
        <a href="ir-news-business-report.php" class="nav-link">
          <span>Business Report</span>
        </a>
        <div class="nav-link active">
          <span>Analyst Report</span>
        </div>
        <a href="ir-news-notice.php" class="nav-link">
          <span>Notice</span>
        </a>
      </nav>
    </section>

    <!-- flow-3: Analyst Report List Section (id: analyst-report-list-section) -->
    <section class="analyst-report-list-section">
      <div class="analyst-report-list-container">
        <div class="analyst-report-list-header">
          <div class="analyst-report-list-title-wrap">
            <h2 class="analyst-report-list-title">애널리스트 리포트</h2>
          </div>
        </div>

        <div class="analyst-report-list">
          <!-- Report Item 1 -->
          <article class="analyst-report-item">
            <div class="analyst-report-content">
              <h3 class="analyst-report-item-title">[IR 협의회] 나이벡 (138610) 기술이전이 만든 턴어라운드, 이제는 신약가치의 입증 시간</h3>
              <span class="analyst-report-date">2025.10.27</span>
            </div>
            <a href="#" class="analyst-report-download-btn">
              <span class="analyst-report-download-text">PDF Download</span>
              <img src="assets/icons/download-file.png" alt="다운로드" class="analyst-report-download-icon">
            </a>
          </article>

          <!-- Report Item 2 -->
          <article class="analyst-report-item">
            <div class="analyst-report-content">
              <h3 class="analyst-report-item-title">[키움증권] 나이벡 학회발표, 파트너사 공개, 추가 기술 이전 기대</h3>
              <span class="analyst-report-date">2025.09.26</span>
            </div>
            <a href="#" class="analyst-report-download-btn">
              <span class="analyst-report-download-text">PDF Download</span>
              <img src="assets/icons/download-file.png" alt="다운로드" class="analyst-report-download-icon">
            </a>
          </article>

          <!-- Report Item 3 -->
          <article class="analyst-report-item">
            <div class="analyst-report-content">
              <h3 class="analyst-report-item-title">[키움증권] 산업레포트 2025.08.12</h3>
              <span class="analyst-report-date">2025.08.12</span>
            </div>
            <a href="#" class="analyst-report-download-btn">
              <span class="analyst-report-download-text">PDF Download</span>
              <img src="assets/icons/download-file.png" alt="다운로드" class="analyst-report-download-icon">
            </a>
          </article>

          <!-- Report Item 4 -->
          <article class="analyst-report-item">
            <div class="analyst-report-content">
              <h3 class="analyst-report-item-title">[흥국증권] 이나경 애널리스트 나이벡</h3>
              <span class="analyst-report-date">2023.02.04</span>
            </div>
            <a href="#" class="analyst-report-download-btn">
              <span class="analyst-report-download-text">PDF Download</span>
              <img src="assets/icons/download-file.png" alt="다운로드" class="analyst-report-download-icon">
            </a>
          </article>

          <!-- Report Item 5 -->
          <article class="analyst-report-item">
            <div class="analyst-report-content">
              <h3 class="analyst-report-item-title">[이베스트 강하나 애널리스트] KRAS 변이 항암제 국내 선두주자</h3>
              <span class="analyst-report-date">2022.01.48</span>
            </div>
            <a href="#" class="analyst-report-download-btn">
              <span class="analyst-report-download-text">PDF Download</span>
              <img src="assets/icons/download-file.png" alt="다운로드" class="analyst-report-download-icon">
            </a>
          </article>

          <!-- Report Item 6 -->
          <article class="analyst-report-item">
            <div class="analyst-report-content">
              <h3 class="analyst-report-item-title">[흥국증권] 이나경 애널리스트 나이벡</h3>
              <span class="analyst-report-date">2022.02.04</span>
            </div>
            <a href="#" class="analyst-report-download-btn">
              <span class="analyst-report-download-text">PDF Download</span>
              <img src="assets/icons/download-file.png" alt="다운로드" class="analyst-report-download-icon">
            </a>
          </article>
        </div>

        <!-- Pagination -->
        <nav class="analyst-report-pagination" aria-label="페이지 네비게이션">
          <button class="analyst-report-page-btn analyst-report-page-prev" aria-label="이전 페이지">&lt;</button>
          <button class="analyst-report-page-btn analyst-report-page-num active" aria-current="page">1</button>
          <button class="analyst-report-page-btn analyst-report-page-num">2</button>
          <button class="analyst-report-page-btn analyst-report-page-next" aria-label="다음 페이지">&gt;</button>
        </nav>
      </div>
    </section>

    <!-- flow-4: Footer (id: footer) - common component -->
    <?php include_once 'includes/footer.php'; ?>
  </main>

  <!-- Scripts -->
  <script src="js/common.js"></script>
</body>
</html>
