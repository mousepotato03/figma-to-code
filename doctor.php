<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>치과소개_의료진소개</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/theme.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/doctor.css">
</head>
<body>
  <!-- Header Components (placement: top-fixed) -->
  <?php
  if (file_exists('includes/navbar.php')) {
      include 'includes/navbar.php';
  } else {
      echo '<!-- Navbar: includes/navbar.php not found -->';
  }
  ?>

  <main class="page-doctor">
    <!-- Section 1: Hero 배너 (id: hero) -->
    <!-- Hero Banner Section -->
    <section class="hero-banner" data-node-id="50:1238">
      <div class="hero-banner-bg" data-node-id="50:1239">
        <img src="assets/images/doctor/main_banner.jpg" alt="Doctor main banner" class="hero-bg-image" />
        <div class="hero-overlay" data-node-id="143:312">
          <img src="assets/images/doctor/overlay_image.jpg" alt="" class="overlay-image" />
          <div class="overlay-dark"></div>
        </div>
      </div>
    </section>

    <!-- Section 2: 통합치의학전문의 소개 헤딩 (id: intro-heading) -->
    <section class="intro-heading">
      <div class="intro-heading__container">
        <h2 class="intro-heading__title">
          <span class="intro-heading__text intro-heading__text--white">엠치과는 </span>
          <span class="intro-heading__text intro-heading__text--accent">통합치의학전문의</span><span class="intro-heading__text intro-heading__text--white">가 </span>
          <span class="intro-heading__text intro-heading__text--white">진료하는 치과입니다.</span>
        </h2>
      </div>
    </section>

    <!-- Section 3: 대표원장 프로필 (id: doctor-profile) -->
    <!-- Doctor Profile Section -->
    <section class="doctor-profile-section">
      <div class="doctor-profile-wrapper">
        <!-- Left Content -->
        <div class="doctor-profile-content">
          <!-- Stats Paragraph -->
          <div class="doctor-stats-paragraph">
            <div class="doctor-stats-number">15+</div>
            <div class="doctor-stats-text">
              <p>처음부터 끝까지 한 명의 전문의가</p>
              <p>책임지는 믿을 수 있는 진료.</p>
            </div>
          </div>

          <!-- Doctor Info -->
          <div class="doctor-info-container">
            <div class="doctor-name-container">
              <div class="doctor-name">손성환</div>
            </div>
            <div class="doctor-title-container">
              <div class="doctor-specialty">통합치의학 전문의</div>
              <div class="doctor-position">대표원장</div>
            </div>
          </div>

          <!-- Career List -->
          <div class="doctor-career-container">
            <div class="doctor-career-list">
              <p>부산대 치과대학 졸업</p>
              <p>창원 광포치과의원</p>
              <p>동국대 의과대학 경주병원 임상교수, 외래교수, 치과과장</p>
              <p>유디치과 서울독산점 대표원장</p>
              <p>산재의료원 인천중앙병원 치과원장</p>
              <p>근로복지공단 인천지사 치과자문의</p>
              <p>창원 한마음병원 치과과장</p>
              <p>삼성전자 탕정사업장 치과원장</p>
              <p>건국대의대 충주병원 치과과장</p>
              <p>순천향대학교 구미병원 치과과장</p>
              <p>현)영천고은치과 대표원장</p>
            </div>
          </div>
        </div>

        <!-- Right Image Area -->
        <div class="doctor-image-container">
          <div class="doctor-image-bg-overlay"></div>
          <div class="doctor-image-pattern"></div>
          <div class="doctor-image-gradient"></div>
          <div class="doctor-profile-image">
            <img src="assets/images/doctor/image5.png" alt="손성환 대표원장" />
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

  <!-- Scripts -->
  <script src="assets/js/common.js"></script>
</body>
</html>
