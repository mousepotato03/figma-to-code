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
  <!-- Header Components -->
  <?php include_once 'includes/navbar.php'; ?>

  <main class="page-home">
    <!-- Section 1: Header Hero Section (id: hero) -->
    <section class="hero-section">
      <div class="hero-container">
        <img src="assets/images/home/image-26.jpg" alt="Hero background" class="hero-bg-image" />
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
          <img src="assets/icons/mouse-scroll.png" alt="Scroll down" class="scroll-icon" />
        </a>
      </div>
    </section>

    <!-- Section 2: About Visual Section (id: about-visual) -->
    <section class="about-visual">
      <!-- Background layer with blur and overlay -->
      <div class="about-visual__bg">
        <img
          src="assets/images/home/young-asian-woman-working-lab.jpg"
          alt=""
          class="about-visual__bg-image"
        >
        <div class="about-visual__bg-overlay"></div>
      </div>

      <!-- Masked image layer -->
      <div class="about-visual__mask-group">
        <img
          src="assets/images/home/young-asian-woman-working-lab.jpg"
          alt=""
          class="about-visual__mask-image"
        >
      </div>

      <!-- Content area -->
      <div class="about-visual__content">
        <div class="about-visual__text-group">
          <h2 class="about-visual__title">
            We create a healthier world through regenerative science.
          </h2>
          <p class="about-visual__description">
            Our research transforms the body's natural healing power into science,<br>
            offering new solutions for critical diseases.
          </p>
        </div>

        <div class="about-visual__actions">
          <a href="#" class="about-visual__button">
            <span class="about-visual__button-text">Learn more</span>
            <img
              src="assets/icons/chevron-right.svg"
              alt=""
              class="about-visual__button-icon"
            >
          </a>
        </div>
      </div>

      <!-- Inner shadow overlay -->
      <div class="about-visual__inner-shadow"></div>
    </section>

    <!-- Section 3: Research Domains Section (id: research-domains) -->
    <section class="research-domains">
      <div class="research-domains__container">
        <!-- Left Text Content -->
        <div class="research-domains__text-content">
          <div class="research-domains__accent-bar"></div>
          <div class="research-domains__text-wrapper">
            <h2 class="research-domains__title">Our scientific approach</h2>
            <p class="research-domains__subtitle">
              Pioneering biotechnology across multiple critical<br>
              research domains
            </p>
          </div>
        </div>

        <!-- Right Circles Area -->
        <div class="research-domains__circles-area">
          <!-- Medical Device Circle -->
          <div class="research-domains__circle research-domains__circle--medical">
            <div class="research-domains__circle-content">
              <img src="assets/icons/medical-device-icon.png" alt="Medical Device Icon" class="research-domains__icon">
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
              <img src="assets/icons/test-tube-3.png" alt="Drug Discovery Icon" class="research-domains__icon research-domains__icon--tube">
              <h3 class="research-domains__circle-title">Drug discovery</h3>
              <p class="research-domains__circle-desc">
                Innovative therapeutic research targeting complex medical challenges
              </p>
            </div>
          </div>

          <!-- DNA Helix Decorative -->
          <div class="research-domains__dna-helix">
            <img src="assets/images/home/dna-helix.png" alt="" class="research-domains__dna-img">
          </div>

          <!-- Colorful Circle -->
          <div class="research-domains__circle research-domains__circle--colorful">
            <img src="assets/images/home/translucent-oil-drops-liquid-colorful-blurred-background.jpg" alt="" class="research-domains__colorful-bg">
          </div>

          <!-- Logo Circle -->
          <div class="research-domains__circle research-domains__circle--logo">
            <img src="assets/images/home/nibec-logo-white-6.png" alt="NIBEC Logo" class="research-domains__logo-img">
          </div>
        </div>
      </div>
    </section>

    <!-- Section 4: Drug Delivery Platform Section (id: drug-delivery) -->
    <section class="drug-delivery-platform">
      <!-- Header Section -->
      <div class="ddp-header">
        <div class="ddp-header-inner">
          <div class="ddp-header-content">
            <div class="ddp-accent-bar"></div>
            <div class="ddp-header-text">
              <h2 class="ddp-title">
                Core Platform Technology : <br>PEPTARDEL
              </h2>
              <p class="ddp-subtitle">
                Next-Generation Drug Delivery Platform Maximizing Peptide Drug Bioavailability.
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- PEPTARDEL-T Section -->
      <div class="ddp-card ddp-card-t">
        <div class="ddp-card-content ddp-card-content--green">
          <img src="assets/icons/mission-statement-icon.png" alt="" class="ddp-icon" aria-hidden="true">
          <div class="ddp-card-text">
            <div class="ddp-card-titles">
              <h3 class="ddp-card-title">PEPTARDEL-T</h3>
              <p class="ddp-card-tagline">Targeted delivery</p>
            </div>
            <p class="ddp-card-description ddp-card-description--light">
              A One Body peptide delivery system capable of simultaneously penetrating target cell membranes <br class="hide-mobile">and providing long-acting effects
            </p>
          </div>
        </div>
        <div class="ddp-card-image ddp-card-image--t">
          <img src="assets/images/home/a-device.png" alt="" class="ddp-bg-image" aria-hidden="true">
          <img src="assets/images/home/dna-representation-concept-1.png" alt="DNA representation" class="ddp-dna-image">
        </div>
      </div>

      <!-- PEPTARDEL-S Section -->
      <div class="ddp-card ddp-card-s">
        <div class="ddp-card-image ddp-card-image--s">
          <img src="assets/images/home/alaelo-tteol-eojineun-balg-eun-nogsaeg-ingkeu-bang-ul-1.png" alt="Green ink droplet" class="ddp-droplet-image">
        </div>
        <div class="ddp-card-content ddp-card-content--light">
          <img src="assets/icons/calendar-icon.png" alt="" class="ddp-icon" aria-hidden="true">
          <div class="ddp-card-text">
            <div class="ddp-card-titles">
              <h3 class="ddp-card-title ddp-card-title--green">PEPTARDEL-S</h3>
              <p class="ddp-card-tagline ddp-card-tagline--green">Sustained Release</p>
            </div>
            <p class="ddp-card-description">
              Precisely controls drug release kinetics to sustain therapeutic effects <br class="hide-mobile">for 7 days up to 3 months.
            </p>
          </div>
        </div>
      </div>

      <!-- PEPTARDEL-O Section -->
      <div class="ddp-card ddp-card-o">
        <div class="ddp-card-content ddp-card-content--green ddp-card-content--o">
          <img src="assets/icons/tablet-icon.png" alt="" class="ddp-icon" aria-hidden="true">
          <div class="ddp-card-text">
            <div class="ddp-card-titles">
              <h3 class="ddp-card-title">PEPTARDEL-O</h3>
              <p class="ddp-card-tagline">Oral formulation for colorectal cancer</p>
            </div>
            <p class="ddp-card-description ddp-card-description--light">
              Sustained-release formulations with prolonged local residence <br class="hide-mobile">and sustained blood concentration via a customized oral formulation platform
            </p>
          </div>
        </div>
        <div class="ddp-card-image ddp-card-image--o">
          <img src="assets/images/home/a-device-1.png" alt="" class="ddp-bg-image" aria-hidden="true">
          <img src="assets/images/home/transparent-green-capsules-1.png" alt="Green capsules" class="ddp-capsules-image">
        </div>
      </div>
    </section>

    <!-- Section 5: Medical Devices Section (id: medical-devices) -->
    <section class="medical-devices-section">
      <div class="medical-devices-header">
        <div class="header-content">
          <div class="accent-bar"></div>
          <div class="header-text">
            <h2 class="section-title">Advancing biotechnology frontiers</h2>
            <p class="section-description">We develop precision medical devices, drug discovery platforms, and bio-cosmetic innovations that enhance tissue regeneration and therapeutic outcomes.</p>
          </div>
        </div>
      </div>

      <div class="medical-devices-cards">
        <article class="device-card">
          <div class="card-background">
            <div class="card-bg-color"></div>
            <div class="card-image-wrapper">
              <img src="assets/images/home/medical-card-1.png" alt="Peptide-based Regenerative Biomaterials" class="card-image">
            </div>
          </div>
          <div class="card-content">
            <div class="card-text">
              <h3 class="card-title">
                <span>Peptide-based </span>
                <span>Regenerative</span>
                <span>Biomaterials</span>
              </h3>
              <p class="card-description">Breakthrough peptide solutions for regenerative medicine</p>
            </div>
            <a href="#" class="card-btn" aria-label="Learn more about Peptide-based Regenerative Biomaterials">
              <img src="assets/icons/arrow-icon.svg" alt="" class="btn-icon">
            </a>
          </div>
        </article>

        <article class="device-card">
          <div class="card-background">
            <div class="card-bg-color"></div>
            <div class="card-image-wrapper">
              <img src="assets/images/home/medical-card-2.png" alt="Oral care Products" class="card-image">
            </div>
          </div>
          <div class="card-content">
            <div class="card-text">
              <h3 class="card-title">
                <span>Oral care </span>
                <span>Products</span>
              </h3>
              <p class="card-description">Developing targeted therapies for complex medical challenges</p>
            </div>
            <a href="#" class="card-btn" aria-label="Learn more about Oral care Products">
              <img src="assets/icons/arrow-icon.svg" alt="" class="btn-icon">
            </a>
          </div>
        </article>

        <article class="device-card">
          <div class="card-background">
            <div class="card-bg-color"></div>
            <div class="card-image-wrapper">
              <img src="assets/images/home/medical-card-3.png" alt="Bio-cosmetic innovations" class="card-image">
            </div>
          </div>
          <div class="card-content">
            <div class="card-text">
              <h3 class="card-title">
                <span>Bio-cosmetic</span>
                <span>innovations</span>
              </h3>
              <p class="card-description">Advanced biotechnology for personal care and wellness</p>
            </div>
            <a href="#" class="card-btn" aria-label="Learn more about Bio-cosmetic innovations">
              <img src="assets/icons/arrow-icon.svg" alt="" class="btn-icon">
            </a>
          </div>
        </article>
      </div>
    </section>

    <!-- Section 6: Products Pipeline Section (id: products-pipeline) -->
    <section class="products-pipeline">
      <div class="products-pipeline__bg">
        <img src="assets/images/home/products-pipeline-bg.jpg" alt="" class="products-pipeline__bg-img">
        <div class="products-pipeline__bg-overlay"></div>
      </div>

      <div class="products-pipeline__content">
        <!-- Header Section -->
        <header class="products-pipeline__header">
          <h2 class="products-pipeline__title">Pioneering biotechnology</h2>
          <p class="products-pipeline__description">
            We partner with leading institutions and research centers worldwide to develop<br>
            peptide-based solutions that address diverse healthcare challenges.
          </p>
        </header>

        <!-- Stats Cards Row -->
        <div class="products-pipeline__stats">
          <!-- Key Global Partners Card -->
          <div class="products-pipeline__stat-card">
            <div class="products-pipeline__stat-info">
              <div class="products-pipeline__stat-icon">
                <img src="assets/icons/handshake-icon.svg" alt="">
              </div>
              <h3 class="products-pipeline__stat-label">Key Global<br>Partners</h3>
            </div>
            <div class="products-pipeline__stat-value-container products-pipeline__stat-value-container--partners">
              <img src="assets/images/home/partners-container.jpg" alt="" class="products-pipeline__stat-bg">
              <div class="products-pipeline__stat-overlay"></div>
              <span class="products-pipeline__stat-number products-pipeline__stat-number--partners">12+</span>
            </div>
          </div>

          <!-- L/O Contract Value Card -->
          <div class="products-pipeline__stat-card">
            <div class="products-pipeline__stat-info">
              <div class="products-pipeline__stat-icon">
                <img src="assets/icons/molecule-icon.svg" alt="">
              </div>
              <h3 class="products-pipeline__stat-label">L/O Contract<br>Value</h3>
            </div>
            <div class="products-pipeline__stat-value-container products-pipeline__stat-value-container--contract">
              <img src="assets/images/home/contract-value-image.jpg" alt="" class="products-pipeline__stat-bg">
              <div class="products-pipeline__stat-overlay"></div>
              <span class="products-pipeline__stat-number products-pipeline__stat-number--contract">$435M</span>
            </div>
          </div>
        </div>

        <!-- Global Market Row -->
        <div class="products-pipeline__market">
          <div class="products-pipeline__market-info">
            <div class="products-pipeline__market-icon">
              <img src="assets/icons/market-approval-icon.svg" alt="">
            </div>
            <h3 class="products-pipeline__market-label">Global Market<br>Approvals &amp; Presence</h3>
          </div>
          <div class="products-pipeline__market-value">
            <span class="products-pipeline__market-number">5+</span>
          </div>
        </div>
      </div>
    </section>

    <!-- Section 7: Research Statistics Section (id: research-statistics) -->
    <section class="research-statistics">
      <div class="research-statistics__header">
        <div class="research-statistics__header-inner">
          <div class="research-statistics__accent-bar"></div>
          <div class="research-statistics__header-content">
            <h2 class="research-statistics__title">Progress built on consistent research.</h2>
            <p class="research-statistics__description">
              Through continuous innovation and scientific rigor,<br>
              we achieve results that stand the test of time.
            </p>
          </div>
        </div>
      </div>

      <div class="research-statistics__grid">
        <!-- Stat Card 1: 85% -->
        <div class="research-statistics__stat-card research-statistics__stat-card--image">
          <img src="/assets/images/home/research-statistics-bg-1.jpg" alt="Research background" class="research-statistics__stat-image">
          <div class="research-statistics__stat-overlay"></div>
          <span class="research-statistics__stat-number">85%</span>
        </div>

        <!-- Info Card 1: Research Success Rate -->
        <div class="research-statistics__info-card">
          <div class="research-statistics__info-content">
            <div class="research-statistics__info-group">
              <h3 class="research-statistics__info-title">
                Research<br>success rate
              </h3>
              <div class="research-statistics__links">
                <a href="#" class="research-statistics__link">
                  <span>Medical Device Products</span>
                  <img src="/assets/icons/chevron-right-white.svg" alt="" class="research-statistics__link-icon">
                </a>
                <a href="#" class="research-statistics__link">
                  <span>Drug Discovery Products</span>
                  <img src="/assets/icons/chevron-right-white.svg" alt="" class="research-statistics__link-icon">
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Stat Card 2: 12 -->
        <div class="research-statistics__stat-card research-statistics__stat-card--image">
          <img src="/assets/images/home/research-statistics-bg-2.jpg" alt="Research programs" class="research-statistics__stat-image">
          <div class="research-statistics__stat-overlay"></div>
          <span class="research-statistics__stat-number">12</span>
        </div>

        <!-- Info Card 2: Active Research Programs -->
        <div class="research-statistics__info-card">
          <div class="research-statistics__info-content">
            <div class="research-statistics__info-group">
              <h3 class="research-statistics__info-title">Active research programs</h3>
              <div class="research-statistics__links">
                <a href="#" class="research-statistics__link">
                  <span>Medical Device Pipeline</span>
                  <img src="/assets/icons/chevron-right-white.svg" alt="" class="research-statistics__link-icon">
                </a>
                <a href="#" class="research-statistics__link">
                  <span>Drug Discovery Pipeline</span>
                  <img src="/assets/icons/chevron-right-white.svg" alt="" class="research-statistics__link-icon">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section 8: Investor Relations Heading (id: investor-relations-heading) -->
    <section class="investor-relations-heading">
      <div class="investor-relations-heading__container">
        <div class="investor-relations-heading__accent-bar"></div>
        <div class="investor-relations-heading__content">
          <h2 class="investor-relations-heading__title">
            Sharing progress with transparency.
          </h2>
          <p class="investor-relations-heading__description">
            We share our achievements and growth openly, building the future together with our partners and investors.
          </p>
        </div>
      </div>
    </section>

    <!-- Section 9: Investor Relations Content Section (id: investor-relations-content) -->
    <section class="investor-relations">
      <!-- Left Panel: Green Background with Report Info -->
      <div class="investor-relations__left">
        <div class="investor-relations__content">
          <h2 class="investor-relations__title">
            <span>NIBEC Quarterly</span>
            <span>Business &amp;</span>
            <span>Research Report</span>
            <span class="investor-relations__title--highlight">(Q2 2025)</span>
          </h2>
          <a href="#" class="investor-relations__button">
            <span>View Latest Report</span>
            <img src="assets/icons/top-left-arrow.svg" alt="" class="investor-relations__button-icon">
          </a>
        </div>

        <!-- Image with Border -->
        <div class="investor-relations__image-container">
          <img src="assets/images/home/investor-relations-image-border.png" alt="Quarterly Report" class="investor-relations__image">
        </div>

        <!-- Rotated Text -->
        <div class="investor-relations__rotated-text">
          <p class="investor-relations__rotated-text--green">Investor</p>
          <p>Relations</p>
        </div>

        <!-- Logo -->
        <div class="investor-relations__logo">
          <span class="sr-only">NIBEC</span>
        </div>
      </div>

      <!-- Right Panel: Press Releases -->
      <div class="investor-relations__right">
        <div class="investor-relations__press">
          <h3 class="investor-relations__press-title">Press Releases</h3>

          <!-- Press Item 1 -->
          <article class="investor-relations__press-item">
            <time class="investor-relations__press-date">October 21, 2025</time>
            <a href="#" class="investor-relations__press-link">
              <p class="investor-relations__press-text">
                <span class="investor-relations__press-tag">[IR Council]</span>
                <span> Naibec (138610) Turnaround Achieved Through Technology Transfer, Now Time to Prove New Drug Value</span>
              </p>
              <img src="assets/icons/chevron-right.svg" alt="" class="investor-relations__press-chevron">
            </a>
          </article>

          <!-- Press Item 2 -->
          <article class="investor-relations__press-item">
            <time class="investor-relations__press-date">October 21, 2025</time>
            <a href="#" class="investor-relations__press-link">
              <p class="investor-relations__press-text">
                <span class="investor-relations__press-tag">[IR Council]</span>
                <span> Naibec (138610) Turnaround Achieved Through Technology Transfer, Now Time to Prove New Drug Value</span>
              </p>
              <img src="assets/icons/chevron-right.svg" alt="" class="investor-relations__press-chevron">
            </a>
          </article>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer Components -->
  <?php include_once 'includes/footer.php'; ?>

  <!-- Scripts -->
  <script src="js/common.js"></script>
</body>
</html>
