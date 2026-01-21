<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/home.css">
</head>
<body>
  <!-- Fixed Top: Main Navbar -->
  <?php include_once 'includes/navbar.php'; ?>

  <main class="page-home">
    <!-- flow-1: Hero Section (Header) (id: hero-section) -->
    <section class="hero-section">
      <div class="hero-background">
        <img src="assets/images/home/image-26.jpg" alt="Hero background" class="hero-bg-image">
      </div>

      <div class="hero-content">
        <h1 class="hero-title">Innovative peptide</h1>

        <div class="hero-description">
          <p>We develop cutting-edge biotechnologies that push</p>
          <p>the boundaries of human healing.</p>
          <p>Our research bridges scientific innovation with clinical solutions.</p>
        </div>

        <a href="#next-section" class="hero-scroll-btn">
          <span class="scroll-text">Scroll Down</span>
          <img src="assets/images/home/mouse-icon.png" alt="Scroll down" class="scroll-icon">
        </a>
      </div>
    </section>

    <!-- flow-2: About Section (Frame 12) (id: about-section) -->
    <section class="about-section">
      <!-- 배경 레이어 -->
      <div class="about-bg-layer">
        <div class="about-bg-overlay"></div>
      </div>

      <!-- 마스크 이미지 레이어 -->
      <div class="about-mask-layer">
        <img src="assets/images/home/image-young-asian-woman-working-lab.jpg" alt="Research lab" class="about-mask-image">
      </div>

      <!-- 콘텐츠 영역 -->
      <div class="about-content">
        <div class="about-text-wrapper">
          <h2 class="about-title">We create a healthier world through regenerative science.</h2>
          <p class="about-description">
            Our research transforms the body's natural healing power into science,<br>
            offering new solutions for critical diseases.
          </p>
        </div>

        <div class="about-actions">
          <a href="#" class="about-btn">
            <span class="about-btn-text">Learn more</span>
            <img src="assets/icons/chevron-right.svg" alt="" class="about-btn-icon">
          </a>
        </div>
      </div>

      <!-- 인셋 섀도우 오버레이 -->
      <div class="about-inset-shadow"></div>
    </section>

    <!-- flow-3: Research Domains Section (Layout 145) (id: research-domains-section) -->
    <section class="research-domains">
      <div class="research-domains__container">
        <!-- Left Content -->
        <div class="research-domains__content">
          <div class="research-domains__accent-bar"></div>
          <div class="research-domains__text">
            <h2 class="research-domains__title">Our scientific approach</h2>
            <p class="research-domains__subtitle">
              Pioneering biotechnology across multiple critical<br>
              research domains
            </p>
          </div>
        </div>

        <!-- Right Visual Area -->
        <div class="research-domains__visual">
          <!-- Medical Device Circle -->
          <div class="research-domains__circle research-domains__circle--medical">
            <div class="research-domains__circle-content">
              <img src="assets/images/home/medical-device-icon.png" alt="Medical Device Icon" class="research-domains__icon">
              <h3 class="research-domains__circle-title">Medical device</h3>
              <p class="research-domains__circle-desc">
                Advanced peptide-based<br>
                technologies for regenerative<br>
                medical solutions
              </p>
            </div>
          </div>

          <!-- Drug Discovery Circle -->
          <div class="research-domains__circle research-domains__circle--drug">
            <div class="research-domains__circle-content">
              <img src="assets/images/home/test-tube-icon.png" alt="Drug Discovery Icon" class="research-domains__icon">
              <h3 class="research-domains__circle-title">Drug discovery</h3>
              <p class="research-domains__circle-desc">
                Innovative therapeutic research targeting complex medical challenges
              </p>
            </div>
          </div>

          <!-- DNA Helix Decoration -->
          <div class="research-domains__dna">
            <img src="assets/images/home/dna-helix.png" alt="" class="research-domains__dna-img">
          </div>

          <!-- Oil Drops Circle -->
          <div class="research-domains__circle research-domains__circle--oil">
            <img src="assets/images/home/translucent-oil-drops-liquid-colorful-blurred-background.png" alt="" class="research-domains__oil-img">
          </div>

          <!-- Center Logo Circle -->
          <div class="research-domains__logo-circle">
            <img src="assets/images/home/nibec-logo-white.png" alt="NIBEC Logo" class="research-domains__logo">
          </div>
        </div>
      </div>
    </section>

    <!-- flow-4: Drug Delivery Platform Section (Frame 53) (id: drug-delivery-section) -->
    <section class="drug-delivery-platform">
      <!-- Header Section -->
      <div class="platform-header">
        <div class="platform-header-content">
          <div class="platform-header-inner">
            <div class="accent-bar"></div>
            <div class="header-text">
              <h2 class="header-title">
                Core Platform Technology : <br>PEPTARDEL
              </h2>
              <p class="header-description">
                Next-Generation Drug Delivery Platform Maximizing Peptide Drug Bioavailability.
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- PEPTARDEL-T Section -->
      <div class="platform-section section-t">
        <div class="section-content section-content-dark">
          <img src="assets/icons/icon-mission.svg" alt="Mission icon" class="section-icon">
          <div class="section-text">
            <div class="section-titles">
              <h3 class="section-main-title">PEPTARDEL-T</h3>
              <p class="section-subtitle">Targeted delivery</p>
            </div>
            <p class="section-description">
              A One Body peptide delivery system capable of simultaneously penetrating target cell membranes and providing long-acting effects
            </p>
          </div>
        </div>
        <div class="section-image-container section-image-t">
          <img src="assets/images/home/a-device.png" alt="Device background" class="image-bg">
          <img src="assets/images/home/dna-representation-concept.png" alt="DNA representation" class="image-overlay image-dna">
        </div>
      </div>

      <!-- PEPTARDEL-S Section -->
      <div class="platform-section section-s">
        <div class="section-image-container section-image-s">
          <img src="assets/images/home/green-ink-drop.png" alt="Green ink drop" class="image-full">
        </div>
        <div class="section-content section-content-light">
          <img src="assets/icons/icon-calendar.svg" alt="Calendar icon" class="section-icon">
          <div class="section-text">
            <div class="section-titles">
              <h3 class="section-main-title section-title-dark">PEPTARDEL-S</h3>
              <p class="section-subtitle section-subtitle-dark">Sustained Release</p>
            </div>
            <p class="section-description section-description-dark">
              Precisely controls drug release kinetics to sustain therapeutic effects for 7 days up to 3 months.
            </p>
          </div>
        </div>
      </div>

      <!-- PEPTARDEL-O Section -->
      <div class="platform-section section-o">
        <div class="section-content section-content-dark section-content-o">
          <img src="assets/icons/icon-tablet.svg" alt="Tablet icon" class="section-icon">
          <div class="section-text">
            <div class="section-titles">
              <h3 class="section-main-title">PEPTARDEL-O</h3>
              <p class="section-subtitle">Oral formulation for colorectal cancer</p>
            </div>
            <p class="section-description">
              Sustained-release formulations with prolonged local residence and sustained blood concentration via a customized oral formulation platform
            </p>
          </div>
        </div>
        <div class="section-image-container section-image-o">
          <img src="assets/images/home/a-device-2.png" alt="Device background" class="image-bg">
          <img src="assets/images/home/green-capsules-1.png" alt="Green capsules" class="image-overlay image-capsules">
        </div>
      </div>
    </section>

    <!-- flow-5: Business Areas Section (Layout 369 - First) (id: business-areas-section) -->
    <section class="business-areas">
      <div class="business-areas__header">
        <div class="business-areas__header-content">
          <div class="business-areas__accent-bar"></div>
          <div class="business-areas__text-group">
            <h2 class="business-areas__title">Advancing biotechnology frontiers</h2>
            <p class="business-areas__description">
              We develop precision medical devices, drug discovery platforms, and bio-cosmetic innovations that enhance tissue regeneration and therapeutic outcomes.
            </p>
          </div>
        </div>
      </div>

      <div class="business-areas__cards">
        <article class="business-card">
          <div class="business-card__image-wrapper">
            <img src="assets/images/home/card1.png" alt="Peptide-based Regenerative Biomaterials" class="business-card__image">
          </div>
          <div class="business-card__content">
            <div class="business-card__text">
              <h3 class="business-card__title">
                Peptide-based<br>
                Regenerative<br>
                Biomaterials
              </h3>
              <p class="business-card__subtitle">
                Breakthrough peptide solutions for regenerative medicine
              </p>
            </div>
            <a href="#" class="business-card__btn" aria-label="Learn more about Peptide-based Regenerative Biomaterials">
              <img src="assets/icons/arrow-icon.svg" alt="" class="business-card__btn-icon">
            </a>
          </div>
        </article>

        <article class="business-card">
          <div class="business-card__image-wrapper">
            <img src="assets/images/home/card2.png" alt="Oral care Products" class="business-card__image">
          </div>
          <div class="business-card__content">
            <div class="business-card__text">
              <h3 class="business-card__title">
                Oral care<br>
                Products
              </h3>
              <p class="business-card__subtitle">
                Developing targeted therapies for complex medical challenges
              </p>
            </div>
            <a href="#" class="business-card__btn" aria-label="Learn more about Oral care Products">
              <img src="assets/icons/arrow-icon.svg" alt="" class="business-card__btn-icon">
            </a>
          </div>
        </article>

        <article class="business-card">
          <div class="business-card__image-wrapper">
            <img src="assets/images/home/card3.png" alt="Bio-cosmetic innovations" class="business-card__image">
          </div>
          <div class="business-card__content">
            <div class="business-card__text">
              <h3 class="business-card__title">
                Bio-cosmetic<br>
                innovations
              </h3>
              <p class="business-card__subtitle">
                Advanced biotechnology for personal care and wellness
              </p>
            </div>
            <a href="#" class="business-card__btn" aria-label="Learn more about Bio-cosmetic innovations">
              <img src="assets/icons/arrow-icon.svg" alt="" class="business-card__btn-icon">
            </a>
          </div>
        </article>
      </div>
    </section>

    <!-- flow-6: Business Areas Section 2 (Layout 369 - Second) (id: business-areas-section-2) -->
    <section class="business-areas-369">
      <div class="business-areas-369__bg-overlay"></div>

      <div class="business-areas-369__content">
        <!-- Header -->
        <div class="business-areas-369__header">
          <h2 class="business-areas-369__title">Pioneering biotechnology</h2>
          <p class="business-areas-369__desc">
            We partner with leading institutions and research centers worldwide to develop<br>
            peptide-based solutions that address diverse healthcare challenges.
          </p>
        </div>

        <!-- Stats Cards -->
        <div class="business-areas-369__cards">
          <!-- Card 1: Key Global Partners -->
          <div class="business-areas-369__card">
            <div class="business-areas-369__card-info">
              <div class="business-areas-369__icon-circle">
                <img src="assets/icons/handshake-icon.svg" alt="Partners icon" class="business-areas-369__icon">
              </div>
              <h3 class="business-areas-369__card-title">Key Global<br>Partners</h3>
            </div>
            <div class="business-areas-369__card-image">
              <img src="assets/images/home/container.png" alt="Global partners" class="business-areas-369__img">
              <div class="business-areas-369__card-overlay"></div>
              <span class="business-areas-369__card-number">12+</span>
            </div>
          </div>

          <!-- Card 2: L/O Contract Value -->
          <div class="business-areas-369__card">
            <div class="business-areas-369__card-info">
              <div class="business-areas-369__icon-circle">
                <img src="assets/icons/contract-icon.svg" alt="Contract icon" class="business-areas-369__icon">
              </div>
              <h3 class="business-areas-369__card-title">L/O Contract<br>Value</h3>
            </div>
            <div class="business-areas-369__card-image">
              <img src="assets/images/home/image.png" alt="Contract value" class="business-areas-369__img">
              <div class="business-areas-369__card-overlay"></div>
              <span class="business-areas-369__card-number business-areas-369__card-number--medium">$435M</span>
            </div>
          </div>
        </div>

        <!-- Bottom Stats -->
        <div class="business-areas-369__bottom-stats">
          <div class="business-areas-369__stat-item">
            <div class="business-areas-369__icon-circle business-areas-369__icon-circle--green">
              <img src="assets/icons/global-icon.svg" alt="Global icon" class="business-areas-369__icon">
            </div>
            <h3 class="business-areas-369__stat-title">Global Market<br>Approvals & Presence</h3>
          </div>
          <span class="business-areas-369__stat-number">5+</span>
        </div>
      </div>
    </section>

    <!-- flow-7: Statistics Section (Frame 59) (id: statistics-section) -->
    <section class="statistics-section">
      <!-- Header Area -->
      <div class="statistics-header">
        <div class="statistics-header-content">
          <div class="accent-bar"></div>
          <div class="statistics-header-text">
            <h2 class="statistics-title">Progress built on consistent research.</h2>
            <p class="statistics-description">
              Through continuous innovation and scientific rigor,<br>
              we achieve results that stand the test of time.
            </p>
          </div>
        </div>
      </div>

      <!-- Cards Area -->
      <div class="statistics-cards">
        <!-- Card 1: 85% with image background -->
        <div class="statistics-card statistics-card--image">
          <img src="assets/images/home/statistics-bg-1.jpg" alt="Research background" class="statistics-card__bg">
          <div class="statistics-card__overlay"></div>
          <span class="statistics-card__number">85%</span>
        </div>

        <!-- Card 2: Research success rate -->
        <div class="statistics-card statistics-card--green">
          <div class="statistics-card__content">
            <h3 class="statistics-card__title">Research<br>success rate</h3>
            <div class="statistics-card__buttons">
              <a href="#" class="statistics-button">
                <span>Medical Device Products</span>
                <img src="assets/icons/chevron-right-white.svg" alt="" class="statistics-button__icon">
              </a>
              <a href="#" class="statistics-button">
                <span>Drug Discovery Products</span>
                <img src="assets/icons/chevron-right-white.svg" alt="" class="statistics-button__icon">
              </a>
            </div>
          </div>
        </div>

        <!-- Card 3: 12 with image background -->
        <div class="statistics-card statistics-card--image">
          <img src="assets/images/home/statistics-bg-2.jpg" alt="Research programs background" class="statistics-card__bg">
          <div class="statistics-card__overlay"></div>
          <span class="statistics-card__number">12</span>
        </div>

        <!-- Card 4: Active research programs -->
        <div class="statistics-card statistics-card--green">
          <div class="statistics-card__content">
            <h3 class="statistics-card__title">Active research programs</h3>
            <div class="statistics-card__buttons">
              <a href="#" class="statistics-button">
                <span>Medical Device Pipeline</span>
                <img src="assets/icons/chevron-right-white.svg" alt="" class="statistics-button__icon">
              </a>
              <a href="#" class="statistics-button">
                <span>Drug Discovery Pipeline</span>
                <img src="assets/icons/chevron-right-white.svg" alt="" class="statistics-button__icon">
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- flow-8: IR Heading Section (Frame 19) (id: ir-heading-section) -->
    <section class="ir-heading-section">
      <div class="ir-heading-content">
        <div class="ir-heading-accent-bar"></div>
        <div class="ir-heading-text-wrapper">
          <h2 class="ir-heading-title">Sharing progress with transparency.</h2>
          <p class="ir-heading-description">We share our achievements and growth openly, building the future together with our partners and investors.</p>
        </div>
      </div>
    </section>

    <!-- flow-9: IR & News Section (Layout 369 - Third) (id: ir-news-section) -->
    <section class="ir-news-section">
      <div class="ir-news-container">
        <!-- Left: Investor Relations Panel -->
        <div class="ir-panel">
          <div class="ir-panel-content">
            <h2 class="ir-title">
              <span>NIBEC Quarterly</span>
              <span>Business &</span>
              <span>Research Report</span>
              <span class="ir-title-highlight">(Q2 2025)</span>
            </h2>
            <a href="#" class="ir-button">
              <span>View Latest Report</span>
              <span class="ir-button-icon">
                <img src="assets/icons/top-left-arrow.svg" alt="">
              </span>
            </a>
          </div>
          <div class="ir-image-wrapper">
            <img src="assets/images/home/image-border.png" alt="Investor Relations Report" class="ir-image">
          </div>
          <div class="ir-rotated-text">
            <span class="ir-rotated-highlight">Investor</span>
            <span>Relations</span>
          </div>
        </div>

        <!-- Right: Press Releases Panel -->
        <div class="press-panel">
          <div class="press-content">
            <h2 class="press-title">Press Releases</h2>

            <div class="press-list">
              <!-- Press Item 1 -->
              <article class="press-item">
                <time class="press-date" datetime="2025-10-21">October 21, 2025</time>
                <a href="#" class="press-link">
                  <p class="press-text">
                    <span class="press-tag">[IR Council]</span>
                    <span> Naibec (138610) Turnaround Achieved Through Technology Transfer, Now Time to Prove New Drug Value</span>
                  </p>
                  <span class="press-arrow">
                    <img src="assets/icons/chevron-right.svg" alt="">
                  </span>
                </a>
              </article>

              <!-- Press Item 2 -->
              <article class="press-item">
                <time class="press-date" datetime="2025-10-21">October 21, 2025</time>
                <a href="#" class="press-link">
                  <p class="press-text">
                    <span class="press-tag">[IR Council]</span>
                    <span> Naibec (138610) Turnaround Achieved Through Technology Transfer, Now Time to Prove New Drug Value</span>
                  </p>
                  <span class="press-arrow">
                    <img src="assets/icons/chevron-right.svg" alt="">
                  </span>
                </a>
              </article>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- flow-10: Footer (id: footer) -->
    <?php include_once 'includes/footer.php'; ?>
  </main>

  <!-- Scripts -->
  <script src="js/common.js"></script>
</body>
</html>
