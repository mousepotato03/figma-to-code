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
  <!-- Fixed Top Components (Navbar) -->
  <?php include_once 'includes/navbar.php'; ?>

  <main class="page-home">
    <!-- flow-1: Header (Hero Section) (id: hero-section) -->
    <section class="header-hero">
      <div class="header-hero__background">
        <img src="assets/images/home/image-26.jpg" alt="Hero background" class="header-hero__bg-image">
      </div>
      <div class="header-hero__content">
        <h1 class="header-hero__title">Innovative peptide</h1>
        <div class="header-hero__description">
          <p>We develop cutting-edge biotechnologies that push</p>
          <p>the boundaries of human healing.</p>
          <p>Our research bridges scientific innovation with clinical solutions.</p>
        </div>
        <a href="#main-content" class="header-hero__scroll-btn">
          <span class="header-hero__scroll-text">Scroll Down</span>
          <img src="assets/images/home/mouse-icon.png" alt="Scroll down" class="header-hero__scroll-icon">
        </a>
      </div>
    </section>

    <!-- flow-2: Frame 12 (About Section) (id: about-section) -->
    <section class="about-section">
      <div class="about-bg-overlay"></div>
      <div class="about-bg-image"></div>

      <div class="about-content">
        <div class="about-text-group">
          <h1 class="about-title">We create a healthier world through regenerative science.</h1>
          <p class="about-description">
            Our research transforms the body's natural healing power into science,<br>
            offering new solutions for critical diseases.
          </p>
        </div>

        <div class="about-actions">
          <a href="#" class="btn-learn-more">
            <span>LEARN MORE</span>
            <img src="assets/icons/chevron-right.svg" alt="" class="btn-icon">
          </a>
        </div>
      </div>

      <div class="about-vignette"></div>
    </section>

    <!-- flow-3: Layout 145 (Research Domains) (id: research-domains-section) -->
    <section class="research-domains">
      <div class="research-domains__container">
        <!-- Left content: Title area -->
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

        <!-- Right visual area: Circles -->
        <div class="research-domains__visual">
          <!-- Medical Device Circle (Top) -->
          <div class="research-domains__circle research-domains__circle--medical">
            <div class="research-domains__circle-content">
              <div class="research-domains__icon">
                <img src="assets/images/home/medical-device-icon.svg" alt="Medical Device Icon">
              </div>
              <h3 class="research-domains__circle-title">Medical device</h3>
              <p class="research-domains__circle-desc">
                Advanced peptide-based<br>
                technologies for regenerative<br>
                medical solutions
              </p>
            </div>
          </div>

          <!-- Drug Discovery Circle (Bottom Right) -->
          <div class="research-domains__circle research-domains__circle--drug">
            <div class="research-domains__circle-content">
              <div class="research-domains__icon research-domains__icon--tube">
                <img src="assets/images/home/test-tube-group3.svg" alt="Test Tube Icon">
              </div>
              <h3 class="research-domains__circle-title">Drug discovery</h3>
              <p class="research-domains__circle-desc">
                Innovative therapeutic research targeting complex medical challenges
              </p>
            </div>
          </div>

          <!-- DNA Helix decoration -->
          <div class="research-domains__dna">
            <img src="assets/images/home/dna-helix.svg" alt="">
          </div>

          <!-- Oil drops Circle (Bottom Left) -->
          <div class="research-domains__circle research-domains__circle--oil">
            <img src="assets/images/home/translucent-oil-drops-liquid-colorful-blurred-background-1.png" alt="" class="research-domains__oil-bg">
          </div>

          <!-- Logo Circle (Center) -->
          <div class="research-domains__circle research-domains__circle--logo">
            <img src="assets/images/common/logo-nibec.svg" alt="NIBEC Logo" class="research-domains__logo-img">
          </div>
        </div>
      </div>
    </section>

    <!-- flow-4: Frame 53 (Drug Delivery Platform) (id: drug-delivery-platform-section) -->
    <!-- Drug Delivery Platform Section -->
    <section class="drug-delivery-platform">
      <!-- Header Section -->
      <div class="platform-header">
        <div class="platform-header-content">
          <div class="platform-header-inner">
            <div class="accent-bar"></div>
            <div class="platform-title-block">
              <h2 class="platform-title">
                Core Platform Technology : <br>PEPTARDEL
              </h2>
              <p class="platform-subtitle">
                Next-Generation Drug Delivery Platform Maximizing Peptide Drug Bioavailability.
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- PEPTARDEL-T Section -->
      <div class="platform-section peptardel-t">
        <div class="platform-content dark">
          <img src="assets/icons/icon-mission.svg" alt="" class="platform-icon" aria-hidden="true">
          <div class="platform-text">
            <div class="platform-text-title">
              <h3 class="platform-name">PEPTARDEL-T</h3>
              <p class="platform-type">Targeted delivery</p>
            </div>
            <p class="platform-description">
              A One Body peptide delivery system capable of simultaneously penetrating target cell membranes and providing long-acting effects
            </p>
          </div>
        </div>
        <div class="platform-image peptardel-t-image">
          <img src="assets/images/home/a-device-dna.png" alt="" class="bg-image">
          <img src="assets/images/home/dna-representation-concept-1.png" alt="DNA representation" class="dna-image">
        </div>
      </div>

      <!-- PEPTARDEL-S Section -->
      <div class="platform-section peptardel-s">
        <div class="platform-image peptardel-s-image">
          <img src="assets/images/home/green-ink-drops.png" alt="Green ink drops" class="ink-image">
        </div>
        <div class="platform-content light">
          <img src="assets/icons/icon-calendar.svg" alt="" class="platform-icon" aria-hidden="true">
          <div class="platform-text">
            <div class="platform-text-title">
              <h3 class="platform-name">PEPTARDEL-S</h3>
              <p class="platform-type">Sustained Release</p>
            </div>
            <p class="platform-description">
              Precisely controls drug release kinetics to sustain therapeutic effects for 7 days up to 3 months.
            </p>
          </div>
        </div>
      </div>

      <!-- PEPTARDEL-O Section -->
      <div class="platform-section peptardel-o">
        <div class="platform-content dark wide">
          <img src="assets/icons/icon-tablet.svg" alt="" class="platform-icon" aria-hidden="true">
          <div class="platform-text">
            <div class="platform-text-title">
              <h3 class="platform-name">PEPTARDEL-O</h3>
              <p class="platform-type">Oral formulation for colorectal cancer</p>
            </div>
            <p class="platform-description">
              Sustained-release formulations with prolonged local residence and sustained blood concentration via a customized oral formulation platform
            </p>
          </div>
        </div>
        <div class="platform-image peptardel-o-image">
          <img src="assets/images/home/a-device-capsules.png" alt="" class="bg-image">
          <img src="assets/images/home/transparent-green-capsules-1.png" alt="Green capsules" class="capsules-image">
        </div>
      </div>
    </section>

    <!-- flow-5: Layout 369 (Business Areas 1) (id: business-areas-section-1) -->
    <section class="business-areas-1">
      <div class="business-areas-1__header">
        <div class="business-areas-1__header-inner">
          <div class="business-areas-1__accent-bar"></div>
          <div class="business-areas-1__header-content">
            <h2 class="business-areas-1__title">Advancing biotechnology frontiers</h2>
            <p class="business-areas-1__description">
              We develop precision medical devices, drug discovery platforms, and bio-cosmetic innovations that enhance tissue regeneration and therapeutic outcomes.
            </p>
          </div>
        </div>
      </div>

      <div class="business-areas-1__cards">
        <article class="business-areas-1__card">
          <div class="business-areas-1__card-image">
            <img src="assets/images/home/card1.png" alt="Peptide-based Regenerative Biomaterials">
          </div>
          <div class="business-areas-1__card-content">
            <div class="business-areas-1__card-text">
              <h3 class="business-areas-1__card-title">
                Peptide-based<br>Regenerative<br>Biomaterials
              </h3>
              <p class="business-areas-1__card-desc">
                Breakthrough peptide solutions for regenerative medicine
              </p>
            </div>
            <a href="#" class="business-areas-1__card-btn" aria-label="Learn more about Peptide-based Regenerative Biomaterials">
              <img src="assets/icons/arrow-up-right.svg" alt="" class="business-areas-1__card-btn-icon">
            </a>
          </div>
        </article>

        <article class="business-areas-1__card">
          <div class="business-areas-1__card-image">
            <img src="assets/images/home/card2.png" alt="Oral care Products">
          </div>
          <div class="business-areas-1__card-content">
            <div class="business-areas-1__card-text">
              <h3 class="business-areas-1__card-title">
                Oral care<br>Products
              </h3>
              <p class="business-areas-1__card-desc">
                Developing targeted therapies for complex medical challenges
              </p>
            </div>
            <a href="#" class="business-areas-1__card-btn" aria-label="Learn more about Oral care Products">
              <img src="assets/icons/arrow-up-right.svg" alt="" class="business-areas-1__card-btn-icon">
            </a>
          </div>
        </article>

        <article class="business-areas-1__card">
          <div class="business-areas-1__card-image">
            <img src="assets/images/home/card3.png" alt="Bio-cosmetic innovations">
          </div>
          <div class="business-areas-1__card-content">
            <div class="business-areas-1__card-text">
              <h3 class="business-areas-1__card-title">
                Bio-cosmetic<br>innovations
              </h3>
              <p class="business-areas-1__card-desc">
                Advanced biotechnology for personal care and wellness
              </p>
            </div>
            <a href="#" class="business-areas-1__card-btn" aria-label="Learn more about Bio-cosmetic innovations">
              <img src="assets/icons/arrow-up-right.svg" alt="" class="business-areas-1__card-btn-icon">
            </a>
          </div>
        </article>
      </div>
    </section>

    <!-- flow-6: Layout 369 (Business Areas 2) (id: business-areas-section-2) -->
    <section class="business-areas-2">
      <div class="business-areas-2__bg"></div>
      <div class="business-areas-2__overlay"></div>

      <div class="business-areas-2__content">
        <!-- Header -->
        <div class="business-areas-2__header">
          <h2 class="business-areas-2__title">Pioneering biotechnology</h2>
          <p class="business-areas-2__desc">
            We partner with leading institutions and research centers worldwide to develop
            peptide-based solutions that address diverse healthcare challenges.
          </p>
        </div>

        <!-- Stats Cards -->
        <div class="business-areas-2__cards">
          <!-- Key Global Partners Card -->
          <div class="business-areas-2__card">
            <div class="business-areas-2__card-info">
              <div class="business-areas-2__icon-wrap">
                <img src="assets/icons/handshake-icon.svg" alt="" class="business-areas-2__icon">
              </div>
              <h3 class="business-areas-2__card-title">Key Global<br>Partners</h3>
            </div>
            <div class="business-areas-2__card-image" style="background-image: url('assets/images/home/container-partners.jpg');">
              <div class="business-areas-2__card-overlay"></div>
              <span class="business-areas-2__card-number">12+</span>
            </div>
          </div>

          <!-- L/O Contract Value Card -->
          <div class="business-areas-2__card">
            <div class="business-areas-2__card-info">
              <div class="business-areas-2__icon-wrap">
                <img src="assets/icons/contract-icon.svg" alt="" class="business-areas-2__icon">
              </div>
              <h3 class="business-areas-2__card-title">L/O Contract<br>Value</h3>
            </div>
            <div class="business-areas-2__card-image" style="background-image: url('assets/images/home/contract-value.jpg');">
              <div class="business-areas-2__card-overlay"></div>
              <span class="business-areas-2__card-number business-areas-2__card-number--small">$435M</span>
            </div>
          </div>
        </div>

        <!-- Bottom Stats -->
        <div class="business-areas-2__bottom">
          <div class="business-areas-2__bottom-item">
            <div class="business-areas-2__bottom-icon-wrap">
              <img src="assets/icons/global-market-icon.svg" alt="" class="business-areas-2__bottom-icon">
            </div>
            <h4 class="business-areas-2__bottom-title">Global Market<br>Approvals & Presence</h4>
          </div>
          <span class="business-areas-2__bottom-number">5+</span>
        </div>
      </div>
    </section>

    <!-- flow-7: Frame 59 (Statistics) (id: statistics-section) -->
    <!-- Statistics Section -->
    <section class="statistics-section">
      <div class="statistics-header">
        <div class="statistics-header-content">
          <div class="accent-bar"></div>
          <div class="header-text">
            <h2 class="statistics-title">Progress built on consistent research.</h2>
            <p class="statistics-description">
              Through continuous innovation and scientific rigor,<br>
              we achieve results that stand the test of time.
            </p>
          </div>
        </div>
      </div>

      <div class="statistics-cards">
        <!-- Card 1: 85% Research Success Rate -->
        <div class="stat-card stat-card-image">
          <div class="stat-card-bg" style="background-image: url('assets/images/home/statistics-bg-1.jpg');"></div>
          <div class="stat-card-overlay"></div>
          <span class="stat-number">85%</span>
        </div>

        <!-- Card 2: Research Success Rate Text -->
        <div class="stat-card stat-card-content">
          <div class="stat-card-inner">
            <h3 class="stat-card-title">Research<br>success rate</h3>
            <div class="stat-card-links">
              <a href="#" class="stat-link">
                <span>Medical Device Products</span>
                <img src="assets/icons/chevron-right-white.svg" alt="" class="link-icon">
              </a>
              <a href="#" class="stat-link">
                <span>Drug Discovery Products</span>
                <img src="assets/icons/chevron-right-white.svg" alt="" class="link-icon">
              </a>
            </div>
          </div>
        </div>

        <!-- Card 3: 12 Active Research Programs -->
        <div class="stat-card stat-card-image">
          <div class="stat-card-bg" style="background-image: url('assets/images/home/statistics-bg-2.jpg');"></div>
          <div class="stat-card-overlay"></div>
          <span class="stat-number">12</span>
        </div>

        <!-- Card 4: Active Research Programs Text -->
        <div class="stat-card stat-card-content">
          <div class="stat-card-inner">
            <h3 class="stat-card-title">Active research programs</h3>
            <div class="stat-card-links">
              <a href="#" class="stat-link">
                <span>Medical Device Pipeline</span>
                <img src="assets/icons/chevron-right-white.svg" alt="" class="link-icon">
              </a>
              <a href="#" class="stat-link">
                <span>Drug Discovery Pipeline</span>
                <img src="assets/icons/chevron-right-white.svg" alt="" class="link-icon">
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- flow-8: Frame 19 (IR Heading) (id: ir-heading-section) -->
    <section class="ir-heading-section">
      <div class="ir-heading-container">
        <div class="ir-heading-accent"></div>
        <div class="ir-heading-content">
          <h2 class="ir-heading-title">Sharing progress with transparency.</h2>
          <p class="ir-heading-description">We share our achievements and growth openly, building the future together with our partners and investors.</p>
        </div>
      </div>
    </section>

    <!-- flow-9: Layout 369 (IR News) (id: ir-news-section) -->
    <section class="ir-news-section">
      <!-- Left Panel: Report Card -->
      <div class="ir-news-report-card">
        <div class="report-card-content">
          <h2 class="report-card-title">
            <span>NIBEC Quarterly </span>
            <span>Business & </span>
            <span>Research Report </span>
            <span class="highlight">(Q2 2025)</span>
          </h2>
          <a href="#" class="report-card-btn">
            <span>View Latest Report</span>
            <img src="assets/icons/top-left-arrow.svg" alt="" class="arrow-icon">
          </a>
        </div>
        <div class="report-card-image">
          <img src="assets/images/home/image-border.png" alt="Report cover">
        </div>
        <div class="report-card-badge">
          <span class="badge-text-green">Investor</span>
          <span class="badge-text-white">Relations</span>
        </div>
        <div class="report-card-logo">
          <img src="assets/images/common/logo-nibec-white.svg" alt="NIBEC">
        </div>
      </div>

      <!-- Right Panel: Press Releases -->
      <div class="ir-news-press-releases">
        <div class="press-releases-content">
          <h2 class="press-releases-title">Press Releases</h2>

          <div class="press-releases-list">
            <!-- Press Release Item 1 -->
            <article class="press-release-item">
              <p class="press-release-date">October 21, 2025</p>
              <a href="#" class="press-release-link">
                <div class="press-release-text">
                  <span class="press-release-tag">[IR Council]</span>
                  <span class="press-release-summary"> Naibec (138610) Turnaround Achieved Through Technology Transfer, Now Time to Prove New Drug Value</span>
                </div>
                <img src="assets/icons/chevron-right.svg" alt="" class="chevron-icon">
              </a>
            </article>

            <!-- Press Release Item 2 -->
            <article class="press-release-item">
              <p class="press-release-date">October 21, 2025</p>
              <a href="#" class="press-release-link">
                <div class="press-release-text">
                  <span class="press-release-tag">[IR Council]</span>
                  <span class="press-release-summary"> Naibec (138610) Turnaround Achieved Through Technology Transfer, Now Time to Prove New Drug Value</span>
                </div>
                <img src="assets/icons/chevron-right.svg" alt="" class="chevron-icon">
              </a>
            </article>
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
