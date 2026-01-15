<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>about-nibec-overview</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/about-nibec-overview.css">
</head>
<body>
  <!-- Header Components -->
  <?php include_once 'includes/navbar.php'; ?>
  <?php include_once 'includes/navbar-index.php'; ?>

  <main class="page-about-nibec-overview">
    <!-- Section 1: Header Section (타이틀 + 배경 이미지) (id: header) -->
    <section class="header-section">
      <div class="header-title-area">
        <div class="title-container">
          <div class="title-accent-bar"></div>
          <h1 class="header-title">펩타이드 기술로 여는  더 건강한 미래</h1>
        </div>
      </div>
      <div class="header-image-area">
        <div class="header-bg-image">
          <img src="/assets/images/about-nibec-overview/geongang-han-saenghwal-bangsig.jpg" alt="건강한 생활방식 배경 이미지">
        </div>
        <div class="header-gradient-overlay"></div>
        <div class="header-blur-overlay"></div>
        <p class="header-description">
          나이벡은 펩타이드 기술 기반의 바이오 연구를 선도하며,<br>
          과학적 발견을 실질적인 의료 혁신으로 발전시켜<br>
          인류의 삶을 더 나은 방향으로 이끌고자 합니다.
        </p>
      </div>
    </section>

    <!-- Section 2: Vision Section (비전 소개 + 좌우 교차 레이아웃) (id: vision) -->
    <section class="vision-section">
      <!-- Title Area -->
      <div class="vision-title">
        <div class="vision-title-inner">
          <div class="vision-headline">
            <h2 class="vision-main-title">인간 중심의 R&D 전문 기업 - NIBEC</h2>
          </div>
          <p class="vision-description">
            우리는 생명공학의 한계를 뛰어넘어 글로벌 의료에 의미 있는 변화를 창출하고, 우리의 작업은 과학적 탁월성과 인간의 잠재력에 대한 헌신으로 추진됩니다.
          </p>
        </div>
      </div>

      <!-- Content Rows -->
      <div class="vision-content">
        <!-- Row 1: Image Left, Text Right -->
        <div class="vision-row">
          <div class="vision-image-wrapper">
            <img src="assets/images/about-nibec-overview/vision-section-img1.jpg" alt="NIBEC Vision" class="vision-image">
          </div>
          <div class="vision-text vision-text--light">
            <div class="vision-text-inner">
              <div class="vision-text-header">
                <p class="vision-subtitle">Our Vision</p>
                <h3 class="vision-text-title">첨단 생명공학의 미래를 선도하다</h3>
              </div>
              <p class="vision-text-description">
                나이벡은 펩타이드 기술을 중심으로 한 첨단 생명공학 연구를 통해<br>
                인류의 건강과 삶의 질을 향상시키는 세상을 만들어가고자 합니다.
              </p>
            </div>
          </div>
        </div>

        <!-- Row 2: Text Left, Image Right -->
        <div class="vision-row vision-row--reverse">
          <div class="vision-text vision-text--dark">
            <div class="vision-text-inner">
              <div class="vision-text-header vision-text-header--mission">
                <p class="vision-subtitle">Our mission</p>
                <h3 class="vision-text-title">
                  펩타이드 기술로<br>
                  인류의 건강한 미래를 만듭니다
                </h3>
              </div>
              <p class="vision-text-description">
                나이벡은 펩타이드 기술을 기반으로 혁신적인 치료<br>
                플랫폼을 개발하여, 질병의 한계를 넘어 인류의 건강한 삶을<br>
                실현하고자 합니다.
              </p>
            </div>
          </div>
          <div class="vision-image-wrapper">
            <img src="assets/images/about-nibec-overview/vision-section-img2.jpg" alt="NIBEC Mission" class="vision-image">
          </div>
        </div>
      </div>
    </section>

    <!-- Section 3: Our Core Values Section (4개 카드 그리드) (id: core-values) -->
    <section class="core-values-section">
      <div class="core-values-container">
        <header class="core-values-header">
          <h2 class="core-values-title">가치로부터 시작되는 바이오 혁신</h2>
          <p class="core-values-description">나이벡은 탁월함, 협력, 혁신, 그리고 책임을 연구의 원동력으로 삼아, 인류의 건강한 내일을 위한 지속 가능한 혁신을 이어갑니다.</p>
        </header>

        <div class="core-values-grid">
          <!-- Card 1: Scientific Excellence -->
          <article class="value-card">
            <div class="value-card-icon">
              <img src="assets/images/about-nibec-overview/microscope-icon.png" alt="Scientific Excellence Icon" width="100" height="100">
            </div>
            <h3 class="value-card-title">과학적 탁월성</h3>
            <div class="value-card-content value-card-content--primary">
              <p>과학적 정밀성과<br>품질을 바탕으로 의미 있는<br>발전을 추구합니다.</p>
            </div>
          </article>

          <!-- Card 2: Open Partnership -->
          <article class="value-card">
            <div class="value-card-icon">
              <img src="assets/images/about-nibec-overview/knowledge-icon.png" alt="Open Partnership Icon" width="100" height="100">
            </div>
            <h3 class="value-card-title">열린 파트너십</h3>
            <div class="value-card-content value-card-content--secondary">
              <p>열린 협력과 지식<br>공유를 통해 새로운 가치를<br>만들어갑니다.</p>
            </div>
          </article>

          <!-- Card 3: Limitless Innovation -->
          <article class="value-card">
            <div class="value-card-icon">
              <img src="assets/images/about-nibec-overview/genetic-engineering-icon.png" alt="Limitless Innovation Icon" width="100" height="100">
            </div>
            <h3 class="value-card-title">한계 없는 혁신</h3>
            <div class="value-card-content value-card-content--primary">
              <p>한계를 넘어<br>생명공학의 미래를<br>새롭게 정의합니다.</p>
            </div>
          </article>

          <!-- Card 4: Trust and Principles -->
          <article class="value-card">
            <div class="value-card-icon">
              <img src="assets/images/about-nibec-overview/sheet-icon.png" alt="Trust and Principles Icon" width="100" height="100">
            </div>
            <h3 class="value-card-title">신뢰와 원칙</h3>
            <div class="value-card-content value-card-content--secondary">
              <p>투명성과 책임을<br>바탕으로 신뢰받는<br>연구문화를 만듭니다.</p>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- Section 4: Innovation Base Section (3개 카드 그리드) (id: innovation-base) -->
    <section class="innovation-base-section">
      <div class="innovation-base-container">
        <header class="innovation-base-header">
          <h2 class="innovation-base-title">우리를 증명하는 세 가지 혁신 기반</h2>
          <p class="innovation-base-description">
            나이벡의 혁신은 하루아침에 이루어지지 않았습니다. 검증된 융합 연구의 유산과 독자적인 기술 플랫폼, 그리고 근원적 치료를 향한 비전은<br>
            나이벡이 글로벌 바이오 리더로 성장할 수밖에 없는 확실한 증거이자 기반입니다.
          </p>
        </header>

        <div class="innovation-cards">
          <!-- Card 1 -->
          <article class="innovation-card">
            <div class="innovation-card__image-wrapper">
              <img src="assets/images/about-nibec-overview/image-112.jpg" alt="검증된 융합 연구 유산" class="innovation-card__image">
            </div>
            <div class="innovation-card__content">
              <h3 class="innovation-card__title">검증된 융합 연구 유산</h3>
              <p class="innovation-card__text">
                서울대학교 치과대학 부설 IBEC의<br>
                9년간 축적된 융합 연구 성과를<br>
                계승하여 탄탄한 기술적 기반을 마련
              </p>
            </div>
          </article>

          <!-- Card 2 -->
          <article class="innovation-card">
            <div class="innovation-card__image-wrapper">
              <img src="assets/images/about-nibec-overview/nanotechnology-concept.jpg" alt="독자적 기술 플랫폼" class="innovation-card__image">
            </div>
            <div class="innovation-card__content">
              <h3 class="innovation-card__title">독자적 기술 플랫폼</h3>
              <p class="innovation-card__text">
                독자적인 펩타이드 발굴 기술(PEPscovery)과 약물전달 플랫폼(PEPTARDEL)을 결합하여 부작용<br>
                없는 표적 정밀 치료를 실현
              </p>
            </div>
          </article>

          <!-- Card 3 -->
          <article class="innovation-card">
            <div class="innovation-card__image-wrapper">
              <img src="assets/images/about-nibec-overview/cute-woman-casual.jpg" alt="치료 그 이상의 가치" class="innovation-card__image">
            </div>
            <div class="innovation-card__content">
              <h3 class="innovation-card__title">치료 그 이상의 가치</h3>
              <p class="innovation-card__text">
                기존 단백질 의약품의 한계를 넘어,<br>
                조직 재생과 근원적 치료가 가능한<br>
                차세대 펩타이드 융합 바이오<br>
                솔루션을 제시
              </p>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- Section 5: Video Section (비디오 플레이어 + 텍스트) (id: video-section) -->
    <section class="video-section">
      <div class="video-section__header">
        <h2 class="video-section__title">
          지속가능하고 건강한 내일을 향한 과학
        </h2>
        <p class="video-section__description">
          나이벡의 혁신은 기술을 넘어, 생명을 회복하고 인류에 영감을 주며,<br>
          재생바이오테크놀로지의 새로운 시대를 이끌어가는 약속입니다.
        </p>
      </div>

      <div class="video-section__player-wrapper">
        <div class="video-section__player">
          <div class="video-section__video-container">
            <img
              src="assets/images/about-nibec-overview/image-24.jpg"
              alt="NIBEC video thumbnail"
              class="video-section__thumbnail"
            >
            <div class="video-section__overlay"></div>
          </div>

          <!-- Play button overlay -->
          <button class="video-section__play-btn" aria-label="Play video">
            <img src="assets/icons/play-button-large.svg" alt="Play" class="video-section__play-icon">
          </button>

          <!-- Player controls -->
          <div class="video-section__controls">
            <div class="video-section__progress">
              <img src="assets/icons/player-progress.svg" alt="" class="video-section__progress-bar">
            </div>
            <div class="video-section__controls-row">
              <div class="video-section__controls-left">
                <img src="assets/icons/player-controls.svg" alt="Player controls" class="video-section__control-group">
              </div>
              <div class="video-section__controls-right">
                <img src="assets/icons/player-play.svg" alt="Play" class="video-section__control-icon">
                <img src="assets/icons/player-skip.svg" alt="Skip" class="video-section__control-icon video-section__control-icon--skip">
                <img src="assets/icons/player-expand.svg" alt="Expand" class="video-section__control-icon video-section__control-icon--expand">
                <div class="video-section__volume">
                  <img src="assets/icons/player-volume.svg" alt="Volume" class="video-section__control-icon video-section__control-icon--volume">
                  <img src="assets/icons/player-volume-2.svg" alt="" class="video-section__control-icon video-section__control-icon--volume">
                </div>
                <img src="assets/icons/player-pause.svg" alt="Pause" class="video-section__control-icon">
              </div>
            </div>
          </div>
        </div>
      </div>

      <p class="video-section__caption">
        NIBEC's Journey Toward a Better Life
      </p>
    </section>
  </main>

  <!-- Footer Components -->
  <?php include_once 'includes/footer.php'; ?>

  <!-- Scripts -->
  <script src="js/common.js"></script>
</body>
</html>
