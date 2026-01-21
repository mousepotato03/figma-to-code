<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>locations</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/locations.css">
</head>
<body>
  <!-- Fixed Top: Main Navbar -->
  <?php include_once 'includes/navbar.php'; ?>

  <main class="page-locations">
    <!-- flow-1: Header (id: header-section) -->
    <section class="locations-header">
      <div class="locations-header__title-area">
        <div class="locations-header__title-row">
          <div class="locations-header__accent-bar"></div>
          <h1 class="locations-header__title">Connect with NIBEC</h1>
        </div>
      </div>

      <div class="locations-header__content-area">
        <div class="locations-header__bg-image locations-header__bg-image--right">
          <img src="assets/images/locations/susja-1i-issneun-nogsaeg-dna-gadag.png" alt="" loading="lazy">
        </div>
        <div class="locations-header__bg-image locations-header__bg-image--left">
          <img src="assets/images/locations/susja-1i-issneun-nogsaeg-dna-gadag.png" alt="" loading="lazy">
        </div>
        <div class="locations-header__gradient-overlay locations-header__gradient-overlay--primary"></div>
        <div class="locations-header__gradient-overlay locations-header__gradient-overlay--secondary"></div>

        <div class="locations-header__content-wrapper">
          <div class="locations-header__description">
            <p>나이벡에 대한 모든 궁금증, 빠르고 정확하게 안내해 드립니다.</p>
            <p>담당 부서별 연락처와 전 세계 나이벡 거점 위치를 통해 가장 편리한 방법으로 우리와 연결하세요.</p>
          </div>

          <nav class="locations-header__nav">
            <a href="contact.php" class="locations-header__nav-link">
              <span>Contact Us</span>
            </a>
            <a href="locations.php" class="locations-header__nav-link locations-header__nav-link--active">
              <span>Locations</span>
            </a>
            <div class="locations-header__nav-link locations-header__nav-link--empty"></div>
            <div class="locations-header__nav-link locations-header__nav-link--empty"></div>
          </nav>
        </div>
      </div>
    </section>

    <!-- flow-2: Korea Headquarters (id: location-korea-hq) -->
    <section class="korea-headquarters">
      <div class="headquarters-container">
        <!-- Left Content -->
        <div class="headquarters-content">
          <div class="section-title">
            <h2 class="title">본사 &amp; GMP공장</h2>
            <p class="subtitle">최첨단 GMP 생산 시설 &amp; 경영 지원</p>
          </div>

          <div class="contact-info">
            <div class="contact-row">
              <img src="assets/icons/fax.svg" alt="Fax" class="contact-icon">
              <span class="contact-text">043-537-1714</span>
            </div>

            <div class="contact-row">
              <img src="assets/icons/call.svg" alt="Phone" class="contact-icon">
              <span class="contact-text">043-532-7458</span>
            </div>

            <div class="contact-row">
              <img src="assets/icons/location-on.svg" alt="Location" class="contact-icon">
              <span class="contact-text address">
                충북 진천군 이월면 밤디길 116<br>
                이월전기전자농공1단지
              </span>
            </div>
          </div>
        </div>

        <!-- Right Map -->
        <div class="headquarters-map">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3179.8!2d127.45!3d36.87!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2z7Lap67aB7KeE7LKc6rWw7J207LmY66m07JuU67CR65SU6ri4MTE2!5e0!3m2!1sko!2skr!4v1640000000000!5m2!1sko!2skr"
            width="100%"
            height="100%"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
    </section>

    <!-- flow-3: Branch Office 1 (id: location-branch-1) -->
    <section class="branch-office-seoul">
      <div class="branch-office-content">
        <div class="section-title">
          <div class="title-content">
            <h2 class="branch-title">서울 지사</h2>
            <p class="branch-subtitle">영업 및 글로벌 마케팅 거점</p>
          </div>
        </div>
        <div class="contact-info">
          <div class="contact-row">
            <img src="assets/icons/fax.svg" alt="팩스" class="contact-icon">
            <p class="contact-text">02-747-9647</p>
          </div>
          <div class="contact-row">
            <img src="assets/icons/call.svg" alt="전화" class="contact-icon">
            <p class="contact-text">02-765-1976, 02-765-1979</p>
          </div>
          <div class="contact-row">
            <img src="assets/icons/location-on.svg" alt="위치" class="contact-icon">
            <p class="contact-text contact-address">서울시 종로구 율곡로 174 창경빌딩 10층</p>
          </div>
        </div>
      </div>
      <div class="branch-map">
        <img src="assets/images/locations/image-115.png" alt="서울 지사 위치 지도" class="map-image">
      </div>
    </section>

    <!-- flow-4: Branch Office 2 (id: location-branch-2) -->
    <section class="branch-office-2">
      <div class="branch-office-2__content">
        <div class="branch-office-2__info">
          <div class="branch-office-2__title-group">
            <h2 class="branch-office-2__title">중앙 연구소</h2>
            <p class="branch-office-2__subtitle">서울대학교 치과대학 내 위치, 신기술 선행 연구</p>
          </div>
          <div class="branch-office-2__contact">
            <div class="branch-office-2__contact-row">
              <img src="assets/icons/fax-vector.svg" alt="팩스" class="branch-office-2__icon">
              <span class="branch-office-2__contact-text">02-744-8732</span>
            </div>
            <div class="branch-office-2__contact-row">
              <img src="assets/icons/call-icon.svg" alt="전화" class="branch-office-2__icon">
              <span class="branch-office-2__contact-text">02-740-8732</span>
            </div>
            <div class="branch-office-2__contact-row branch-office-2__contact-row--address">
              <img src="assets/icons/location-on-icon.svg" alt="위치" class="branch-office-2__icon">
              <div class="branch-office-2__address">
                <p>서울시 종로구 대학로 101 서울대학교치과대학</p>
                <p>치과생체재료연구동 403~4호</p>
              </div>
            </div>
          </div>
        </div>
        <div class="branch-office-2__image-container">
          <img src="assets/images/locations/image-116.jpg" alt="중앙 연구소" class="branch-office-2__image">
        </div>
      </div>
    </section>

    <!-- flow-5: Footer (id: footer) -->
    <?php include_once 'includes/footer.php'; ?>
  </main>

  <!-- Scripts -->
  <script src="js/common.js"></script>
</body>
</html>
