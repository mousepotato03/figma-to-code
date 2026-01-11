<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>main</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/theme.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <!-- Header Components (placement: top-fixed) -->
  <?php include 'includes/navigation-bar.php'; ?>

  <main class="page-main">
    <!-- Section 1: Hero Section - 임플란트 소개 (id: hero) -->
    <!-- Hero Section - Implant Introduction -->
    <section class="hero-section">
      <div class="hero-container">
        <!-- Left Content -->
        <div class="hero-content">
          <!-- Text Block -->
          <div class="hero-text-block">
            <p class="hero-subtitle">M DENTAL HOSPITAL</p>
            <h1 class="hero-title">
              <span>15년 경력의</span>
              <span>정직한 임플란트</span>
            </h1>
            <p class="hero-description">
              대전 유성구 관평동에서 임플란트를 가장 <span class="quote">'</span>안전하고 자연스럽<span class="quote">게'</span><br>
              첨단 CT 진단과 <span class="ratio">1:1</span> 맞춤 계획으로 시술부터 사후관리까지 책임집니다.
            </p>
          </div>

          <!-- CTA Buttons -->
          <div class="hero-buttons">
            <a href="#" class="btn-primary">임플란트 상담 예약하기</a>
            <a href="#" class="btn-secondary">시술 전후 결과 보기</a>
          </div>

          <!-- Feature Tags -->
          <div class="hero-tags">
            <span class="hero-tag">임플란트 전문</span>
            <span class="hero-tag">15년 임상경력</span>
            <span class="hero-tag">디지털 CT & 3D 스캔</span>
            <span class="hero-tag">생명 시술관리</span>
          </div>
        </div>

        <!-- Right Image Comparison -->
        <div class="hero-image-container">
          <div class="image-comparison">
            <div class="comparison-before">
              <img src="assets/images/main/image15.png" alt="Before treatment">
            </div>
            <div class="comparison-divider"></div>
            <div class="comparison-drag-icon">
              <img src="assets/icons/drag-icon.png" alt="Drag to compare">
            </div>
          </div>
          <p class="image-disclaimer">본사진은 환자분의 동의하에 게재 하였습니다</p>
        </div>
      </div>

      <!-- Bottom Hospital Name -->
      <p class="hero-hospital-name">ZEAH DENTAL HOSPITAL</p>
    </section>

    <!-- Section 2: 왜 엠치과일까요? - 4가지 포인트 (id: why-m-dental) -->
    <section class="why-m-dental">
      <div class="why-m-dental__header">
        <h2 class="why-m-dental__title">왜, 엠치과일까요?</h2>
        <p class="why-m-dental__subtitle">
          임플란트는 <span class="why-m-dental__highlight">정확한 진단</span>과 <span class="why-m-dental__highlight">경험</span>이 결과를 좌우합니다.<br>
          엠치과는 안전·기능·심미의 균형을 지향합니다.
        </p>
      </div>

      <div class="why-m-dental__cards">
        <!-- Point 01 -->
        <article class="point-card">
          <div class="point-card__image">
            <img src="assets/images/main/image-background-2.png" alt="15년 임상 경험">
          </div>
          <div class="point-card__content">
            <div class="point-card__label">
              <span class="point-card__label-text">POINT</span>
              <span class="point-card__label-number">01</span>
            </div>
            <h3 class="point-card__title">15년 임상 경험</h3>
            <p class="point-card__description">
              풍부한 케이스로 검증된 전문 시술과<br>
              합리적 플랜을 제안합니다.
            </p>
          </div>
        </article>

        <!-- Point 02 -->
        <article class="point-card">
          <div class="point-card__image">
            <img src="assets/images/main/image-background.png" alt="정밀 진단">
          </div>
          <div class="point-card__content">
            <div class="point-card__label">
              <span class="point-card__label-text">POINT</span>
              <span class="point-card__label-number">02</span>
            </div>
            <h3 class="point-card__title">정밀 진단</h3>
            <p class="point-card__description">
              CT·3D 스캔 기반의 데이터<br>
              중심 진단으로 리스크를 줄입니다.
            </p>
          </div>
        </article>

        <!-- Point 03 -->
        <article class="point-card">
          <div class="point-card__image">
            <img src="assets/images/main/image-background-1.png" alt="맞춤 수술 가이드">
          </div>
          <div class="point-card__content">
            <div class="point-card__label">
              <span class="point-card__label-text">POINT</span>
              <span class="point-card__label-number">03</span>
            </div>
            <h3 class="point-card__title">맞춤 수술 가이드</h3>
            <p class="point-card__description">
              치조골 상태와 생활패턴을 반영한<br>
              1:1 가이드 수술로 회복을 돕습니다.
            </p>
          </div>
        </article>

        <!-- Point 04 -->
        <article class="point-card">
          <div class="point-card__image point-card__image--overflow">
            <img src="assets/images/main/dentist-explains.png" alt="사후 관리 시스템">
          </div>
          <div class="point-card__content">
            <div class="point-card__label">
              <span class="point-card__label-text">POINT</span>
              <span class="point-card__label-number">04</span>
            </div>
            <h3 class="point-card__title">사후 관리 시스템</h3>
            <p class="point-card__description">
              정기검진·위생관리·응급 대응까지<br>
              체계적으로 케어합니다.
            </p>
          </div>
        </article>
      </div>
    </section>

    <!-- Section 3: 병원 전경 이미지 (id: hospital-image) -->
    <!-- Hospital Image Section - Implant Services -->
    <section class="hospital-image-section">
      <div class="hospital-image-content">
        <!-- Service Item 1 -->
        <div class="service-card">
          <div class="service-card-inner">
            <div class="service-badge">
              <span class="service-badge-text">디지털 네비게이션 임플란트</span>
            </div>
            <div class="service-description">
              <p>고난이도 케이스도 계획된 위치에</p>
              <p>정확히 식립되는 정밀 수술 시스템</p>
            </div>
          </div>
        </div>

        <!-- Service Item 2 -->
        <div class="service-card">
          <div class="service-card-inner">
            <div class="service-badge">
              <span class="service-badge-text">최소 침습 임플란트</span>
            </div>
            <div class="service-description">
              <p>잇몸 절개 없이</p>
              <p>빠른 일상 복귀를 돕는 최소침습 방식</p>
            </div>
          </div>
        </div>

        <!-- Service Item 3 -->
        <div class="service-card">
          <div class="service-card-inner">
            <div class="service-badge">
              <span class="service-badge-text">전체 임플란트</span>
            </div>
            <div class="service-description">
              <p>윗턱·아래턱 전반의 교합과 기능을</p>
              <p>복원하는 종합 치료 솔루션</p>
            </div>
          </div>
        </div>

        <!-- Service Item 4 -->
        <div class="service-card">
          <div class="service-card-inner">
            <div class="service-badge">
              <span class="service-badge-text">임플란트 틀니</span>
            </div>
            <div class="service-description">
              <p>잇몸뼈 손실을 최소화하며</p>
              <p>안정적인 틀니 고정을 돕는 기술</p>
            </div>
          </div>
        </div>

        <!-- Service Item 5 -->
        <div class="service-card">
          <div class="service-card-inner">
            <div class="service-badge">
              <span class="service-badge-text">원데이 임플란트</span>
            </div>
            <div class="service-description">
              <p>임시 보철을 바로 제작해 불편함 없이</p>
              <p>당일 시술이 가능한 시스템.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Dental Implant Decoration Image -->
      <div class="dental-implant-decoration">
        <img src="assets/images/main/dental-implant-icon.png" alt="Dental implant illustration" class="dental-implant-image" />
      </div>
    </section>

    <!-- Section 4: 환자 후기 - Before/After 및 리뷰 (id: patient-reviews) -->
    <section class="patient-reviews">
      <div class="patient-reviews__container">
        <!-- Section Header -->
        <div class="patient-reviews__header">
          <h2 class="patient-reviews__title">엠치과를 방문하신 환자분들의 생생한 후기</h2>
          <p class="patient-reviews__subtitle">
            임플란트 시술 전과 후, <span class="patient-reviews__subtitle--bold">환자분들의 표정이 바뀝니다</span><br>
            <span class="patient-reviews__subtitle--bold">직접 경험한 분</span>들의 이야기를 들어보세요
          </p>
        </div>

        <!-- Before/After Section -->
        <div class="patient-reviews__before-after">
          <div class="patient-reviews__before-after-wrapper">
            <div class="patient-reviews__compare-cards">
              <!-- Before Card -->
              <div class="patient-reviews__compare-card">
                <div class="patient-reviews__compare-img patient-reviews__compare-img--top">
                  <img src="assets/images/main/before.png" alt="Before - Face" class="patient-reviews__compare-face">
                </div>
                <div class="patient-reviews__compare-img patient-reviews__compare-img--bottom">
                  <img src="assets/images/main/teeth-before-after.png" alt="Before - Teeth" class="patient-reviews__compare-teeth patient-reviews__compare-teeth--before">
                </div>
                <div class="patient-reviews__compare-label patient-reviews__compare-label--before">
                  <span>Before</span>
                </div>
              </div>

              <!-- After Card -->
              <div class="patient-reviews__compare-card">
                <div class="patient-reviews__compare-img patient-reviews__compare-img--top">
                  <img src="assets/images/main/after.png" alt="After - Face" class="patient-reviews__compare-face patient-reviews__compare-face--after">
                </div>
                <div class="patient-reviews__compare-img patient-reviews__compare-img--bottom">
                  <img src="assets/images/main/teeth-before-after.png" alt="After - Teeth" class="patient-reviews__compare-teeth patient-reviews__compare-teeth--after">
                </div>
                <div class="patient-reviews__compare-label patient-reviews__compare-label--after">
                  <span>After</span>
                </div>
              </div>
            </div>

            <p class="patient-reviews__disclaimer">※ 치료 결과는 개인별로 차이가 있을 수 있으며 부작용이 발생할 수 있습니다.</p>
          </div>
        </div>

        <!-- Reviews Section -->
        <div class="patient-reviews__reviews">
          <!-- Featured Review -->
          <div class="patient-reviews__review-card patient-reviews__review-card--featured">
            <div class="patient-reviews__review-content">
              <img src="assets/images/main/avatar-1.png" alt="Avatar" class="patient-reviews__avatar patient-reviews__avatar--large">
              <div class="patient-reviews__review-text">
                <p class="patient-reviews__reviewer-name">김OO님</p>
                <p class="patient-reviews__review-message">
                  항상 부어 있던 잇몸이 이제는 편안합니다.<br>
                  식사할 때마다 느껴지는 안정감이 정말 좋아요.
                </p>
              </div>
            </div>
          </div>

          <!-- Review 2 -->
          <div class="patient-reviews__review-card">
            <div class="patient-reviews__review-content">
              <img src="assets/images/main/avatar-3.png" alt="Avatar" class="patient-reviews__avatar">
              <div class="patient-reviews__review-text">
                <p class="patient-reviews__reviewer-name">이OO님</p>
                <p class="patient-reviews__review-message">
                  다음날부터 바로 식사할 수 있었고, 회복도 빨랐습니다.
                </p>
              </div>
            </div>
          </div>

          <!-- Review 3 -->
          <div class="patient-reviews__review-card">
            <div class="patient-reviews__review-content">
              <img src="assets/images/main/avatar-2.png" alt="Avatar" class="patient-reviews__avatar">
              <div class="patient-reviews__review-text">
                <p class="patient-reviews__reviewer-name">박OO님</p>
                <p class="patient-reviews__review-message">
                  틀니로 고민 많았는데, 임플란트 틀니로 바꾸고 나서 훨씬<br>
                  편해졌어요. 식사와 발음이 자연스러워졌습니다.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section 5: CTA 섹션 (id: cta-section) -->
    <!-- CTA Section - Main Page -->
    <section class="cta-section">
      <div class="cta-container">
        <div class="cta-content">
          <!-- Heading -->
          <div class="cta-heading">
            <h2 class="cta-title">전국에서 찾아오는  엠치과</h2>
          </div>

          <!-- Tag List -->
          <div class="cta-tags">
            <div class="cta-tags-row">
              <span class="cta-tag">#입소문 난 원장님 실력</span>
              <span class="cta-tag">#전국 어디서나 편리한 접근</span>
              <span class="cta-tag">#당일 상담 및 시술 가능</span>
            </div>
            <div class="cta-tags-row">
              <span class="cta-tag">#정확한 3D CT 진단</span>
              <span class="cta-tag">#장거리 환자 우선 예약 혜택</span>
            </div>
          </div>

          <!-- Description -->
          <div class="cta-description">
            <p>
              <strong>정밀한 진단</strong>과 <strong>꼼꼼한 수술</strong>, 그리고 <strong>꾸준한 사후관리</strong>로<br>
              관평동을 넘어 대전 전역에서 환자분들이 찾아오고 있습니다
            </p>
          </div>

          <!-- Map Image (decorative) -->
          <div class="cta-map">
            <img src="assets/images/main/map-south-korea.png" alt="" aria-hidden="true">
          </div>
        </div>
      </div>
    </section>

    <!-- Section 6: 예약 신청 폼 (id: reservation-form) -->
    <!-- Reservation Form Section -->
    <section class="reservation-section">
      <div class="reservation-container">
        <!-- Header Tab -->
        <div class="reservation-header">
          <span class="reservation-title">신청 예약하기</span>
        </div>

        <!-- Form Area -->
        <div class="reservation-form">
          <!-- Phone Number -->
          <div class="reservation-phone">
            <span class="phone-number">042)671-2875</span>
          </div>

          <!-- Name Input -->
          <div class="reservation-input">
            <input type="text" placeholder="성함" name="name" />
          </div>

          <!-- Contact Input -->
          <div class="reservation-input">
            <input type="text" placeholder="연락처" name="contact" />
          </div>

          <!-- Privacy Agreement -->
          <div class="reservation-checkbox">
            <input type="checkbox" id="privacy-agree" name="privacy" />
            <label for="privacy-agree">개인정보 수집 및 이용에 관한 사항에 동의합니다.</label>
          </div>

          <!-- Submit Button -->
          <button type="submit" class="reservation-submit">상담신청</button>
        </div>
      </div>
    </section>
  </main>

  <!-- Side Quick Menu (placement: right) -->
  <?php include 'includes/side-quick-menu.php'; ?>

  <!-- Footer Components (placement: bottom) -->
  <?php include 'includes/footer.php'; ?>

  <!-- Scripts -->
  <script src="assets/js/common.js"></script>
</body>
</html>
