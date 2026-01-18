<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>dental-intro-m-dental</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/dental-intro-m-dental.css">
</head>
<body>
  <!-- Fixed Top Components (Navbar) -->
  <?php include_once 'includes/navbar.php'; ?>

  <main class="page-dental-intro-m-dental">
    <!-- flow-1: Hero Section - 메인 배너 및 슬로건 (id: hero-section) -->
    <section class="hero-section">
      <div class="hero-background">
        <img src="assets/images/dental-intro-m-dental/main_banner.png" alt="" class="hero-bg-image" />
        <div class="hero-overlay">
          <img src="assets/images/dental-intro-m-dental/hero-patient.png" alt="Dental patient" class="hero-patient-image" />
          <div class="hero-overlay-dark"></div>
        </div>
      </div>
      <div class="hero-content">
        <h1 class="hero-title">
          <span>진심이 통하는 진료,</span>
          <span>믿을 수 있는 결과</span>
        </h1>
      </div>
    </section>

    <!-- flow-2: Intro Section - 엠치과 소개 텍스트 (id: intro-section) -->
    <section class="intro-section">
      <div class="intro-container">
        <div class="intro-content">
          <p class="intro-text">
            <span class="intro-text-regular">엠치과의원은 </span><span class="intro-text-semibold">15년</span><span class="intro-text-regular"> 동안 수많은 환자분들의 미소를 되찾아드리며,</span><br>
            <span class="intro-text-regular">정확한 진단과 정직한 치료만이 </span><span class="intro-text-semibold">신뢰</span><span class="intro-text-regular">를 만든다는 믿음으로 진료해왔습니다.</span><br>
            <span class="intro-text-regular">환자 한 분 한 분의 이야기를 끝까지 듣고, 가족을 대하듯 세심하게 치료하는 것이</span><br>
            <span class="intro-text-regular">저희의 기본 원칙입니다. 최신 디지털 장비와 안전한 시스템으로, 처음 상담부터 시술 후</span><br>
            <span class="intro-text-regular">관리까지 </span><span class="intro-text-semibold">모든 과정을 꼼꼼하게 책임</span><span class="intro-text-regular">지겠습니다.</span>
          </p>
          <p class="intro-text intro-text-closing">
            <span class="intro-text-regular">오늘의 진료가 내일의 편안한 미소로 이어질 수 있도록</span><br>
            <span class="intro-text-regular">— </span><span class="intro-text-semibold">엠치과의원</span><span class="intro-text-regular">은 늘 환자 곁에서 함께하겠습니다.</span>
          </p>
        </div>
      </div>
    </section>

    <!-- flow-3: Background Section - 엠치과 배경 이미지 (id: background-section) -->
    <section class="background-section">
      <div class="background-section__inner">
        <header class="background-section__header">
          <h2 class="background-section__title">엠치과의 3가지 약속, 진심으로 지켜갑니다</h2>
        </header>

        <div class="background-section__cards">
          <!-- Card 1 -->
          <article class="promise-card promise-card--mint">
            <div class="promise-card__header promise-card__header--mint">
              <div class="promise-card__number">
                <span>01</span>
              </div>
              <div class="promise-card__content">
                <h3 class="promise-card__title">과잉 없는 진료</h3>
                <p class="promise-card__desc">꼭 필요한 치료만 권하고, 환자분이<br>안심할 수 있는 정직한 진료를 약속합니다.</p>
              </div>
            </div>
            <div class="promise-card__image">
              <img src="assets/images/dental-intro-m-dental/card1-naver.png" alt="과잉 없는 진료">
            </div>
          </article>

          <!-- Card 2 -->
          <article class="promise-card promise-card--white">
            <div class="promise-card__header promise-card__header--white">
              <div class="promise-card__number">
                <span>02</span>
              </div>
              <div class="promise-card__content">
                <h3 class="promise-card__title">정확한 진단과<br>꼼꼼한 시술</h3>
                <p class="promise-card__desc">한 번의 시술도 대충하지 않습니다.</p>
              </div>
            </div>
            <div class="promise-card__image">
              <img src="assets/images/dental-intro-m-dental/card2-naver.png" alt="정확한 진단과 꼼꼼한 시술">
            </div>
          </article>

          <!-- Card 3 -->
          <article class="promise-card promise-card--mint">
            <div class="promise-card__header promise-card__header--mint">
              <div class="promise-card__number">
                <span>03</span>
              </div>
              <div class="promise-card__content">
                <h3 class="promise-card__title">끝까지 함께하는<br>사후관리</h3>
                <p class="promise-card__desc">치료가 끝나도 인연은 계속됩니다.</p>
              </div>
            </div>
            <div class="promise-card__image">
              <img src="assets/images/dental-intro-m-dental/card3-bg.png" alt="끝까지 함께하는 사후관리">
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- flow-4: Facility Section - 시설 안내 갤러리 (id: facility-section) -->
    <section class="facility-section">
      <div class="facility-header">
        <h2 class="facility-title">
          <span>환자분의 치아는 물론,</span>
          <span>마음까지 편히 쉬다 가실 수 있는 공간이 되길 바랍니다.</span>
        </h2>
        <p class="facility-subtitle">
          치료의 시간이 아닌, <strong>회복의 시간</strong>이 될 수 있도록 정성을 다하겠습니다.
        </p>
      </div>

      <div class="facility-gallery">
        <!-- Main large image -->
        <article class="facility-card facility-card--large">
          <div class="facility-card__image">
            <img src="assets/images/dental-intro-m-dental/facility-main.jpg" alt="고객대기실" loading="lazy">
          </div>
          <div class="facility-card__overlay">
            <span class="facility-card__label">고객대기실</span>
          </div>
        </article>

        <!-- Grid of 4 smaller images -->
        <div class="facility-grid">
          <article class="facility-card">
            <div class="facility-card__image">
              <img src="assets/images/dental-intro-m-dental/facility-treatment.jpg" alt="진료실" loading="lazy">
            </div>
            <div class="facility-card__overlay">
              <span class="facility-card__label">진료실</span>
            </div>
          </article>

          <article class="facility-card">
            <div class="facility-card__image">
              <img src="assets/images/dental-intro-m-dental/facility-powder.jpg" alt="파우더룸" loading="lazy">
            </div>
            <div class="facility-card__overlay">
              <span class="facility-card__label">파우더룸</span>
            </div>
          </article>

          <article class="facility-card">
            <div class="facility-card__image">
              <img src="assets/images/dental-intro-m-dental/facility-surgery.jpg" alt="수술실" loading="lazy">
            </div>
            <div class="facility-card__overlay">
              <span class="facility-card__label">수술실</span>
            </div>
          </article>

          <article class="facility-card">
            <div class="facility-card__image">
              <img src="assets/images/dental-intro-m-dental/facility-consultation.jpg" alt="상담실" loading="lazy">
            </div>
            <div class="facility-card__overlay">
              <span class="facility-card__label">상담실</span>
            </div>
          </article>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <?php include_once 'includes/footer.php'; ?>

  <!-- Scripts -->
  <script src="js/common.js"></script>
</body>
</html>
