<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>치과소개_M치과</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/theme.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/m-dental.css">
</head>
<body>
  <!-- Header Components (placement: top-fixed) -->
  <?php
  if (file_exists('includes/navigation-bar.php')) {
      include 'includes/navigation-bar.php';
  } else {
      echo '<!-- Navigation Bar: includes/navigation-bar.php not found -->';
  }
  ?>

  <main class="page-m-dental">
    <!-- Section 1: Hero Banner (id: hero) -->
    <!-- Hero Banner Section -->
    <section class="hero-banner">
      <div class="hero-background">
        <img src="assets/images/m-dental/main-banner.png" alt="Main banner background" class="hero-bg-image" />
      </div>
      <div class="hero-overlay">
        <img src="assets/images/m-dental/hero-patient.png" alt="Dental patient" class="hero-patient-image" />
        <div class="hero-overlay-dark"></div>
      </div>
      <div class="hero-content">
        <div class="hero-heading">
          <p>진심이 통하는 진료,</p>
          <p>믿을 수 있는 결과</p>
        </div>
      </div>
    </section>

    <!-- Section 2: 병원 소개 텍스트 (id: intro-text) -->
    <section class="intro-text-section">
      <div class="intro-text-container">
        <div class="intro-text-content">
          <p>
            <span>엠치과의원은 </span>
            <span class="text-bold">15년</span>
            <span> 동안 수많은 환자분들의 미소를 되찾아드리며, </span>
          </p>
          <p>
            <span>정확한 진단과 정직한 치료만이 </span>
            <span class="text-bold">신뢰</span>
            <span>를 만든다는 믿음으로 진료해왔습니다.</span>
          </p>
          <p>환자 한 분 한 분의 이야기를 끝까지 듣고, 가족을 대하듯 세심하게 치료하는 것이</p>
          <p>저희의 기본 원칙입니다. 최신 디지털 장비와 안전한 시스템으로, 처음 상담부터 시술 후</p>
          <p>
            <span>관리까지 </span>
            <span class="text-bold">모든 과정을 꼼꼼하게 책임</span>
            <span>지겠습니다.</span>
          </p>
          <p class="text-spacer">&nbsp;</p>
          <p>오늘의 진료가 내일의 편안한 미소로 이어질 수 있도록</p>
          <p>
            <span>— </span>
            <span class="text-bold">엠치과의원</span>
            <span>은 늘 환자 곁에서 함께하겠습니다.</span>
          </p>
        </div>
      </div>
    </section>

    <!-- Section 3: 배경 이미지 섹션 (id: background-image) -->
    <section class="promises-section">
      <div class="promises-container">
        <!-- Section Title -->
        <div class="promises-header">
          <h2 class="promises-title">엠치과의 3가지 약속, 진심으로 지켜갑니다</h2>
        </div>

        <!-- Promise Cards -->
        <div class="promises-cards">
          <!-- Card 1: 과잉 없는 진료 -->
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
              <img src="assets/images/m-dental/card1-naver.png" alt="과잉 없는 진료" class="promise-card__img">
            </div>
          </article>

          <!-- Card 2: 정확한 진단과 꼼꼼한 시술 -->
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
              <img src="assets/images/m-dental/card2-naver.png" alt="정확한 진단과 꼼꼼한 시술" class="promise-card__img">
            </div>
          </article>

          <!-- Card 3: 끝까지 함께하는 사후관리 -->
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
            <div class="promise-card__image promise-card__image--bg">
              <img src="assets/images/m-dental/card3-img.png" alt="끝까지 함께하는 사후관리" class="promise-card__img">
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- Section 4: 시설 소개 (id: facilities) -->
    <!-- Facilities Section -->
    <section class="facilities-section">
      <div class="facilities-container">
        <!-- Header -->
        <div class="facilities-header">
          <div class="facilities-title-wrapper">
            <h2 class="facilities-title">
              <span>환자분의 치아는 물론,</span>
              <span>마음까지 편히 쉬다 가실 수 있는 공간이 되길 바랍니다.</span>
            </h2>
          </div>
          <p class="facilities-subtitle">
            치료의 시간이 아닌,<strong> 회복의 시간</strong>이 될 수 있도록 정성을 다하겠습니다.
          </p>
        </div>

        <!-- Facilities Grid -->
        <div class="facilities-content">
          <!-- Main Image - Waiting Room -->
          <div class="facility-card facility-card--main">
            <div class="facility-image-wrapper">
              <img src="assets/images/m-dental/facility-waiting-room.jpg" alt="고객대기실" class="facility-image">
            </div>
            <div class="facility-overlay">
              <span class="facility-name">고객대기실</span>
            </div>
          </div>

          <!-- Grid 2x2 -->
          <div class="facilities-grid">
            <!-- Treatment Room -->
            <div class="facility-card">
              <div class="facility-image-wrapper">
                <img src="assets/images/m-dental/facility-treatment-room.jpg" alt="진료실" class="facility-image">
              </div>
              <div class="facility-overlay">
                <span class="facility-name">진료실</span>
              </div>
            </div>

            <!-- Powder Room -->
            <div class="facility-card">
              <div class="facility-image-wrapper">
                <img src="assets/images/m-dental/facility-powder-room.jpg" alt="파우더룸" class="facility-image">
              </div>
              <div class="facility-overlay">
                <span class="facility-name">파우더룸</span>
              </div>
            </div>

            <!-- Surgery Room -->
            <div class="facility-card">
              <div class="facility-image-wrapper">
                <img src="assets/images/m-dental/facility-surgery-room.jpg" alt="수술실" class="facility-image">
              </div>
              <div class="facility-overlay">
                <span class="facility-name">수술실</span>
              </div>
            </div>

            <!-- Consultation Room -->
            <div class="facility-card">
              <div class="facility-image-wrapper">
                <img src="assets/images/m-dental/facility-consultation-room.jpg" alt="상담실" class="facility-image">
              </div>
              <div class="facility-overlay">
                <span class="facility-name">상담실</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer Components (placement: bottom) -->
  <?php
  if (file_exists('includes/footer.php')) {
      include 'includes/footer.php';
  } else {
      echo '<!-- Footer: includes/footer.php not found -->';
  }
  ?>

  <!-- Side Quick Menu -->
  <?php
  if (file_exists('includes/side-quick-menu.php')) {
      include 'includes/side-quick-menu.php';
  }
  ?>

  <!-- Scripts -->
  <script src="assets/js/common.js"></script>
</body>
</html>
