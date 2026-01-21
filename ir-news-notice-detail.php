<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ir-news-notice-detail</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/ir-news-notice-detail.css">
</head>
<body>
  <!-- Fixed Top: Main Navbar -->
  <?php include_once 'includes/navbar.php'; ?>

  <main class="page-ir-news-notice-detail">
    <!-- flow-1: Header Section (id: header-section) -->
    <section class="header-section">
      <div class="header-section__content">
        <div class="header-section__accent-bar"></div>
        <h1 class="header-section__title">Investor Relations &amp; News Center</h1>
      </div>
    </section>

    <!-- flow-2: Page Intro Section (id: page-intro-section) -->
    <section class="page-intro-section">
      <!-- 배경 이미지 (데코레이션) -->
      <div class="page-intro-bg-decoration">
        <img src="assets/images/ir-news-notice-detail/susja-1i-issneun-nogsaeg-dna-gadag.png" alt="" class="page-intro-bg-image-right">
        <img src="assets/images/ir-news-notice-detail/susja-1i-issneun-nogsaeg-dna-gadag.png" alt="" class="page-intro-bg-image-left">
      </div>

      <!-- 그라데이션 오버레이 -->
      <div class="page-intro-overlay"></div>
      <div class="page-intro-overlay-secondary"></div>

      <!-- 콘텐츠 영역 -->
      <div class="page-intro-content">
        <!-- 소개 텍스트 -->
        <div class="page-intro-text-wrapper">
          <p class="page-intro-description">
            지속 가능한 성장을 위한 투자 정보와 나이벡의 새로운 도전을 공유합니다.<br>
            투자자와 고객 여러분의 합리적인 의사결정을 돕기 위해 신뢰할 수 있는 정보를 약속드립니다.
          </p>
        </div>

        <!-- 네비게이션 탭 -->
        <nav class="page-intro-nav">
          <a href="#" class="page-intro-nav-link">Press Releases</a>
          <a href="#" class="page-intro-nav-link">Business Report</a>
          <a href="#" class="page-intro-nav-link">Analyst Report</a>
          <a href="#" class="page-intro-nav-link active">Notice</a>
        </nav>
      </div>
    </section>

    <!-- flow-3: Notice Detail Section (id: notice-detail-section) -->
    <section class="notice-detail-section">
      <div class="notice-detail-container">
        <div class="notice-detail-newslist">
          <!-- 제목 영역 -->
          <div class="notice-detail-header">
            <div class="notice-detail-title-wrap">
              <div class="notice-detail-title-content">
                <h2 class="notice-detail-page-title">공지사항</h2>
              </div>
            </div>
          </div>

          <!-- 공지 상세 내용 -->
          <article class="notice-detail-content">
            <header class="notice-detail-article-header">
              <h1 class="notice-detail-article-title">NIBEC 12월 정기 IR 개최 안내</h1>
              <time class="notice-detail-article-date" datetime="2025-12-10">2025-12-10</time>
            </header>

            <div class="notice-detail-article-body">
              <div class="notice-detail-article-text">
                <p class="notice-detail-main-title">나이벡 12월 정기 투자자 관계(IR) 행사 안내</p>
                <p class="notice-detail-spacer">&nbsp;</p>
                <p class="notice-detail-subtitle">나이벡</p>
                <p class="notice-detail-spacer">&nbsp;</p>
                <ul class="notice-detail-list">
                  <li>나이벡은 다양한 투자자분들과 활발한 소통을 위해 12월에 정기 투자자 관계(IR) 행사를 개최합니다.</li>
                </ul>
                <p class="notice-detail-spacer">&nbsp;</p>
                <p class="notice-detail-subtitle">행사 개요</p>
                <p class="notice-detail-spacer">&nbsp;</p>
                <ul class="notice-detail-list">
                  <li>일시: 2025년 12월 11일 목요일 오후 2시</li>
                  <li>대상: 나이벡 주주 및 국내외 기관 투자자</li>
                  <li>장소: 서울특별시 여의도 회의실 (※ 개별 정보는 참석 확정자에 한해 제공됩니다.)</li>
                  <li>참석 인원: 선착순 10명</li>
                  <li>주요 내용: 주요 사업 진행 상황 공유</li>
                </ul>
                <p class="notice-detail-spacer">&nbsp;</p>
                <p class="notice-detail-subtitle">사전 신청 안내</p>
                <p class="notice-detail-spacer">&nbsp;</p>
                <p class="notice-detail-body-text">참석을 희망하시는 분은 아래 QR 코드를 스캔하여 사전 등록을 완료해 주시기 바랍니다.</p>
                <p class="notice-detail-body-text">선착순 10명으로 제한되며, 등록을 완료하신 분들께는 참석 확정 여부를 개별적으로 안내해 드립니다.</p>
                <p class="notice-detail-body-text">본 정기 투자자 관계 워크숍은 일회성 행사가 아니라 향후 지속적으로 정기적으로 개최될 예정입니다.</p>
                <p class="notice-detail-body-text">많은 관심과 참여에 진심으로 감사드립니다.</p>
                <p class="notice-detail-spacer">&nbsp;</p>
                <p class="notice-detail-body-text">나이벡 주식회사 전략홍보실</p>
                <p class="notice-detail-spacer">&nbsp;</p>
                <p class="notice-detail-body-text">연락처: 02-765-1973</p>
              </div>
            </div>
          </article>

          <!-- 이전/다음 네비게이션 -->
          <nav class="notice-detail-navigation">
            <div class="notice-detail-nav-list">
              <a href="#" class="notice-detail-nav-item">
                <span class="notice-detail-nav-label">Prev</span>
                <div class="notice-detail-nav-title-wrap">
                  <span class="notice-detail-nav-title">회사 문의 사항에 대한 안내 글</span>
                </div>
              </a>
              <a href="#" class="notice-detail-nav-item">
                <span class="notice-detail-nav-label">Next</span>
                <div class="notice-detail-nav-title-wrap notice-detail-nav-title-wrap--next">
                  <span class="notice-detail-nav-title notice-detail-nav-title--truncate">[대표이사 인사말] 2024년 한 해 동안 나이벡을 아끼고 성원해 주신 주주 여러분께 진심으로 감사 드립니다.</span>
                </div>
              </a>
            </div>
            <a href="#" class="notice-detail-list-btn" aria-label="목록으로 돌아가기">
              <div class="notice-detail-list-icon-wrap">
                <img src="assets/icons/list-icon.svg" alt="" class="notice-detail-list-icon">
              </div>
            </a>
          </nav>
        </div>
      </div>
    </section>

    <!-- flow-4: Footer (id: footer) -->
    <?php include_once 'includes/footer.php'; ?>
  </main>

  <!-- Scripts -->
  <script src="js/common.js"></script>
</body>
</html>
