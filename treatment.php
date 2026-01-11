<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>치과소개_진료안내</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/theme.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/treatment.css">
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

  <main class="page-treatment">
    <!-- Section 1: 진료안내 배너 (id: hero-banner) -->
    <!-- Hero Banner Section -->
    <section class="hero-banner" data-node-id="188:1845">
      <div class="hero-banner__background" data-node-id="188:1846">
        <img src="assets/images/treatment/main_banner.png" alt="Main banner background" class="hero-banner__bg-image" />
        <div class="hero-banner__overlay" data-node-id="188:1899">
          <img src="assets/images/treatment/14_1.png" alt="Overlay image" class="hero-banner__overlay-image" />
          <div class="hero-banner__overlay-dark"></div>
        </div>
      </div>
      <div class="hero-banner__container" data-node-id="188:1875">
        <div class="hero-banner__heading" data-node-id="188:1876">
          <h1 class="hero-banner__title" data-node-id="188:1877">진료안내</h1>
        </div>
      </div>
    </section>

    <!-- Section 2: 엠치과의 진료과목 (id: care-categories) -->
    <!-- Care Categories Section -->
    <section class="care-categories">
      <div class="care-categories__container">
        <h2 class="care-categories__title">
          <span class="care-categories__highlight">엠치과</span>의 진료과목
        </h2>

        <div class="care-categories__grid">
          <!-- Card 01: Implant -->
          <div class="care-card">
            <div class="care-card__header">
              <div class="care-card__label">
                <span class="care-card__label-text">Care</span>
                <span class="care-card__label-number">01</span>
              </div>
              <h3 class="care-card__title">임플란트</h3>
            </div>
            <div class="care-card__image">
              <img src="assets/images/treatment/3d-dental-implants-surgery-concept-with-tool.jpg" alt="임플란트 수술 도구">
            </div>
          </div>

          <!-- Card 02: Gum Disease -->
          <div class="care-card">
            <div class="care-card__header">
              <div class="care-card__label">
                <span class="care-card__label-text">Care</span>
                <span class="care-card__label-number">02</span>
              </div>
              <h3 class="care-card__title">잇몸질환</h3>
            </div>
            <div class="care-card__image">
              <img src="assets/images/treatment/gum-disease.jpg" alt="잇몸질환 치료">
            </div>
          </div>

          <!-- Card 03: Cavity & Root Canal -->
          <div class="care-card">
            <div class="care-card__header">
              <div class="care-card__label">
                <span class="care-card__label-text">Care</span>
                <span class="care-card__label-number">03</span>
              </div>
              <h3 class="care-card__title">충치 신경치료</h3>
            </div>
            <div class="care-card__image">
              <img src="assets/images/treatment/teeth-dental-scaler.jpg" alt="충치 신경치료 도구">
            </div>
          </div>

          <!-- Card 04: Teeth Whitening -->
          <div class="care-card">
            <div class="care-card__header">
              <div class="care-card__label">
                <span class="care-card__label-text">Care</span>
                <span class="care-card__label-number">04</span>
              </div>
              <h3 class="care-card__title">치아미백</h3>
            </div>
            <div class="care-card__image">
              <img src="assets/images/treatment/close-up-dentist-instruments.jpg" alt="치아미백 시술">
            </div>
          </div>

          <!-- Card 05: Aesthetic Prosthetics -->
          <div class="care-card">
            <div class="care-card__header">
              <div class="care-card__label">
                <span class="care-card__label-text">Care</span>
                <span class="care-card__label-number">05</span>
              </div>
              <h3 class="care-card__title">심미보철</h3>
            </div>
            <div class="care-card__image">
              <img src="assets/images/treatment/dental-implant.jpg" alt="심미보철 임플란트">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section 3: 진료시간 (id: office-hours) -->
    <section class="office-hours-section">
      <h2 class="office-hours-title">진료시간</h2>

      <div class="schedule-container">
        <!-- Schedule Table -->
        <div class="schedule-table">
          <!-- Header Row: Days -->
          <div class="schedule-header">
            <div class="schedule-cell header-cell">MON</div>
            <div class="schedule-cell header-cell">TUE</div>
            <div class="schedule-cell header-cell">WED</div>
            <div class="schedule-cell header-cell">THU</div>
            <div class="schedule-cell header-cell">FRI</div>
          </div>

          <!-- Sub Header Row: 진료시간 -->
          <div class="schedule-subheader">
            <div class="schedule-cell subheader-cell empty"></div>
            <div class="schedule-cell subheader-cell empty"></div>
            <div class="schedule-cell subheader-cell highlight">진료시간</div>
            <div class="schedule-cell subheader-cell empty"></div>
            <div class="schedule-cell subheader-cell empty"></div>
          </div>

          <!-- Morning Hours Row -->
          <div class="schedule-row">
            <div class="schedule-cell time-cell">
              <span class="time-start">10:00 AM</span>
              <span class="time-divider">-</span>
              <span class="time-end">12:00 PM</span>
            </div>
            <div class="schedule-cell time-cell">
              <span class="time-start">10:00 AM</span>
              <span class="time-divider">-</span>
              <span class="time-end">12:00 PM</span>
            </div>
            <div class="schedule-cell time-cell">
              <span class="time-start">10:00 AM</span>
              <span class="time-divider">-</span>
              <span class="time-end">12:00 PM</span>
            </div>
            <div class="schedule-cell time-cell">
              <span class="time-start">10:00 AM</span>
              <span class="time-divider">-</span>
              <span class="time-end">12:00 PM</span>
            </div>
            <div class="schedule-cell time-cell">
              <span class="time-start">10:00 AM</span>
              <span class="time-divider">-</span>
              <span class="time-end">14:00 PM</span>
            </div>
          </div>

          <!-- Lunch Time Info -->
          <div class="lunch-time-row">
            <div class="lunch-time-info">
              <span class="lunch-label">점심시간</span>
              <span class="lunch-time">12:30 PM - 14:00 PM</span>
            </div>
          </div>

          <!-- Afternoon Hours Row -->
          <div class="schedule-row">
            <div class="schedule-cell time-cell">
              <span class="time-start">12:30 AM</span>
              <span class="time-divider">-</span>
              <span class="time-end">14:00 PM</span>
            </div>
            <div class="schedule-cell time-cell">
              <span class="time-start">12:30 AM</span>
              <span class="time-divider">-</span>
              <span class="time-end">14:00 PM</span>
            </div>
            <div class="schedule-cell time-cell">
              <span class="time-start">12:30 AM</span>
              <span class="time-divider">-</span>
              <span class="time-end">14:00 PM</span>
            </div>
            <div class="schedule-cell time-cell">
              <span class="time-start">12:30 AM</span>
              <span class="time-divider">-</span>
              <span class="time-end">14:00 PM</span>
            </div>
            <div class="schedule-cell time-cell empty-time"></div>
          </div>

          <!-- Evening Status Row -->
          <div class="schedule-row evening-row">
            <div class="schedule-cell evening-cell no-evening colspan-2">야간 진료 없음</div>
            <div class="schedule-cell evening-cell has-evening">야간 진료</div>
            <div class="schedule-cell evening-cell has-evening">야간 진료</div>
            <div class="schedule-cell evening-cell no-evening">야간 진료 없음</div>
          </div>

          <!-- Evening Hours Row -->
          <div class="schedule-row">
            <div class="schedule-cell time-cell empty-time colspan-2"></div>
            <div class="schedule-cell time-cell">
              <span class="time-start">17:00 AM</span>
              <span class="time-divider">-</span>
              <span class="time-end">19:00 PM</span>
            </div>
            <div class="schedule-cell time-cell">
              <span class="time-start">17:00 AM</span>
              <span class="time-divider">-</span>
              <span class="time-end">19:00 PM</span>
            </div>
            <div class="schedule-cell time-cell empty-time"></div>
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
