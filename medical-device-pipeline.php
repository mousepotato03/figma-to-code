<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>medical-device-pipeline</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/medical-device-pipeline.css">
</head>
<body>
  <!-- Fixed Top Components (Navbar) -->
  <?php include_once 'includes/navbar.php'; ?>

  <main class="page-medical-device-pipeline">
    <!-- flow-1: Hero Section (Header + Layout) (id: hero-section) -->
    <section class="hero-section">
      <!-- Header Area -->
      <div class="hero-header">
        <div class="hero-header-content">
          <div class="title-accent"></div>
          <h1 class="hero-title">차세대 재생의료기기 파이프라인</h1>
        </div>
      </div>

      <!-- Visual Area with Gradient Background -->
      <div class="hero-visual">
        <!-- Background Images -->
        <div class="hero-bg-layer hero-bg-bottles"></div>
        <div class="hero-bg-layer hero-bg-syringe"></div>
        <div class="hero-bg-layer hero-bg-genetic"></div>

        <!-- Gradient Overlays -->
        <div class="hero-overlay hero-overlay-blur"></div>
        <div class="hero-overlay hero-overlay-left"></div>
        <div class="hero-overlay hero-overlay-right"></div>

        <!-- Description Text -->
        <p class="hero-description">
          펩타이드 기반 융합기술과 조직재생 바이오소재를 중심으로 진행 중인<br>
          나이벡의 의료기기 개발 현황을 한눈에 볼 수 있도록 제공합니다.
        </p>
      </div>
    </section>

    <!-- flow-2: Navbar Index (서브 네비게이션) (id: navbar-index) -->
    <nav class="navbar-index">
      <div class="navbar-index__link">
        <p class="navbar-index__text">
          <span class="navbar-index__text--regular">Medical Device Division > </span>
          <span class="navbar-index__text--semibold">Pipeline</span>
        </p>
      </div>
    </nav>

    <!-- flow-3: Features Section (아이콘 4개 그리드) (id: features-section) -->
    <section class="features-grid-section">
      <div class="features-grid">
        <!-- Feature Card 1: 주요 글로벌 규제 기관 인허가 -->
        <div class="feature-card feature-card--green">
          <div class="feature-icon-wrapper">
            <img src="assets/icons/icon-globe.svg" alt="글로벌 규제" class="feature-icon">
          </div>
          <p class="feature-title">주요 글로벌<br>규제 기관 인허가</p>
        </div>

        <!-- Feature Card 2: 5+ (숫자 강조) -->
        <div class="feature-card feature-card--image">
          <img src="assets/images/medical-device-pipeline/frame-156.jpg" alt="" class="feature-bg-image">
          <span class="feature-number">5+</span>
        </div>

        <!-- Feature Card 3: 생체 융합성 -->
        <div class="feature-card feature-card--green">
          <div class="feature-icon-wrapper">
            <img src="assets/icons/icon-biocompatibility.svg" alt="생체 융합성" class="feature-icon">
          </div>
          <p class="feature-title">생체 융합성</p>
        </div>

        <!-- Feature Card 4: 100% -->
        <div class="feature-card feature-card--image">
          <img src="assets/images/medical-device-pipeline/frame-157.jpg" alt="" class="feature-bg-image">
          <div class="feature-card-overlay"></div>
          <span class="feature-percentage"><span class="percentage-number">100</span><span class="percentage-sign">%</span></span>
        </div>
      </div>
    </section>

    <!-- flow-4: Pipeline Section (파이프라인 테이블) (id: pipeline-section) -->
    <section class="pipeline-table-section">
      <div class="pipeline-table-container">
        <!-- Pipeline Module 1: 펩타콜 이즈그라프트 -->
        <article class="pipeline-module pipeline-module--first">
          <div class="pipeline-module__header">
            <div class="pipeline-module__content">
              <h2 class="pipeline-module__title">
                <span>펩타콜</span>
                <span>이즈그라프트</span>
              </h2>
            </div>
          </div>
          <div class="pipeline-module__body">
            <div class="pipeline-table">
              <div class="pipeline-table__header">
                <div class="pipeline-table__col pipeline-table__col--indication">
                  <span>POTENTIAL</span>
                  <span>INDICATION</span>
                </div>
                <div class="pipeline-table__col pipeline-table__col--region">REGION</div>
                <div class="pipeline-table__col pipeline-table__col--phase">PHASE 1</div>
                <div class="pipeline-table__col pipeline-table__col--phase">PHASE 2</div>
                <div class="pipeline-table__col pipeline-table__col--phase">PHASE 3</div>
                <div class="pipeline-table__col pipeline-table__col--phase">Registration</div>
              </div>
              <div class="pipeline-table__divider">
                <img src="assets/images/medical-device-pipeline/pipeline-divider.svg" alt="">
              </div>
              <div class="pipeline-table__row">
                <div class="pipeline-table__col pipeline-table__col--indication">Periodontitis Treatment</div>
                <div class="pipeline-table__col pipeline-table__col--region">N/A</div>
                <div class="pipeline-table__col pipeline-table__col--phase">
                  <div class="pipeline-bar pipeline-bar--active"></div>
                </div>
                <div class="pipeline-table__col pipeline-table__col--phase">
                  <div class="pipeline-bar pipeline-bar--active"></div>
                </div>
                <div class="pipeline-table__col pipeline-table__col--phase">
                  <div class="pipeline-bar pipeline-bar--active"></div>
                </div>
                <div class="pipeline-table__col pipeline-table__col--phase">
                  <div class="pipeline-bar pipeline-bar--inactive"></div>
                </div>
              </div>
              <div class="pipeline-table__row">
                <div class="pipeline-table__col pipeline-table__col--indication">Bone Regeneration</div>
                <div class="pipeline-table__col pipeline-table__col--region">N/A</div>
                <div class="pipeline-table__col pipeline-table__col--phase">
                  <div class="pipeline-bar pipeline-bar--active"></div>
                </div>
                <div class="pipeline-table__col pipeline-table__col--phase">
                  <div class="pipeline-bar pipeline-bar--active"></div>
                </div>
                <div class="pipeline-table__col pipeline-table__col--phase">
                  <div class="pipeline-bar pipeline-bar--active"></div>
                </div>
                <div class="pipeline-table__col pipeline-table__col--phase">
                  <div class="pipeline-bar pipeline-bar--inactive"></div>
                </div>
              </div>
            </div>
          </div>
          <button class="pipeline-module__btn-more" aria-label="더보기">
            <img src="assets/icons/btn-more-arrow.svg" alt="">
          </button>
        </article>

        <!-- Pipeline Module 2: OssGen-X 15 -->
        <article class="pipeline-module pipeline-module--last">
          <div class="pipeline-module__header">
            <div class="pipeline-module__content">
              <h2 class="pipeline-module__title pipeline-module__title--en">
                <span>OssGen</span>
                <span>-X 15</span>
              </h2>
            </div>
          </div>
          <div class="pipeline-module__body">
            <div class="pipeline-table">
              <div class="pipeline-table__header">
                <div class="pipeline-table__col pipeline-table__col--indication">
                  <span>POTENTIAL</span>
                  <span>INDICATION</span>
                </div>
                <div class="pipeline-table__col pipeline-table__col--region">REGION</div>
                <div class="pipeline-table__col pipeline-table__col--phase">PHASE 1</div>
                <div class="pipeline-table__col pipeline-table__col--phase">PHASE 2</div>
                <div class="pipeline-table__col pipeline-table__col--phase">PHASE 3</div>
                <div class="pipeline-table__col pipeline-table__col--phase">Registration</div>
              </div>
              <div class="pipeline-table__divider">
                <img src="assets/images/medical-device-pipeline/pipeline-divider.svg" alt="">
              </div>
              <div class="pipeline-table__row">
                <div class="pipeline-table__col pipeline-table__col--indication">치주염 억제</div>
                <div class="pipeline-table__col pipeline-table__col--region">KR, US</div>
                <div class="pipeline-table__col pipeline-table__col--phase">
                  <div class="pipeline-bar pipeline-bar--active"></div>
                </div>
                <div class="pipeline-table__col pipeline-table__col--phase">
                  <div class="pipeline-bar pipeline-bar--active"></div>
                </div>
                <div class="pipeline-table__col pipeline-table__col--phase">
                  <div class="pipeline-bar pipeline-bar--active"></div>
                </div>
                <div class="pipeline-table__col pipeline-table__col--phase">
                  <div class="pipeline-bar pipeline-bar--active"></div>
                </div>
              </div>
              <div class="pipeline-table__row">
                <div class="pipeline-table__col pipeline-table__col--indication">골재생</div>
                <div class="pipeline-table__col pipeline-table__col--region">KR, US</div>
                <div class="pipeline-table__col pipeline-table__col--phase">
                  <div class="pipeline-bar pipeline-bar--active"></div>
                </div>
                <div class="pipeline-table__col pipeline-table__col--phase">
                  <div class="pipeline-bar pipeline-bar--active"></div>
                </div>
                <div class="pipeline-table__col pipeline-table__col--phase">
                  <div class="pipeline-bar pipeline-bar--active"></div>
                </div>
                <div class="pipeline-table__col pipeline-table__col--phase">
                  <div class="pipeline-bar pipeline-bar--active"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="pipeline-module__btn-more pipeline-module__btn-more--icon">
            <img src="assets/icons/plus-sign.svg" alt="">
          </div>
        </article>
      </div>
    </section>

    <!-- flow-5: Footer (id: footer) -->
    <?php include_once 'includes/footer.php'; ?>
  </main>

  <!-- Scripts -->
  <script src="js/common.js"></script>
</body>
</html>
