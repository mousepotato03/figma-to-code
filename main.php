<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>main</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <!-- position: fixed-top - Navbar (id: navbar) -->
  <?php include_once 'includes/navbar.php'; ?>

  <main class="page-main">
    <!-- flow-1: Hero Section - 임플란트 메인 비주얼 및 Before/After (id: hero-section) -->
    <section class="hero-section">
      <div class="hero-content">
        <div class="hero-text-container">
          <div class="hero-text-block">
            <p class="hero-subtitle">M DENTAL HOSPITAL</p>
            <h1 class="hero-title">
              <span>15년 경력의</span>
              <span>정직한 임플란트</span>
            </h1>
            <p class="hero-description">
              대전 유성구 관평동에서 임플란트를 가장 <span class="highlight">'</span>안전하고 자연스럽<span class="highlight">게'</span><br>
              첨단 CT 진단과 <span class="highlight">1:1</span> 맞춤 계획으로 시술부터 사후관리까지 책임집니다.
            </p>
          </div>

          <div class="hero-buttons">
            <a href="#" class="btn-primary">임플란트 상담 예약하기</a>
            <a href="#" class="btn-secondary">시술 전후 결과 보기</a>
          </div>

          <div class="hero-tags">
            <span class="tag">임플란트 전문</span>
            <span class="tag">15년 임상경력</span>
            <span class="tag">디지털 CT & 3D 스캔</span>
            <span class="tag">생명 시술관리</span>
          </div>
        </div>

        <div class="hero-image-container">
          <div class="before-after-wrapper">
            <div class="image-before">
              <img src="assets/images/main/hero-image-15.png" alt="Before treatment">
            </div>
            <div class="vertical-divider"></div>
            <div class="drag-icon">
              <img src="assets/images/main/hero-drag-icon.png" alt="Drag to compare">
            </div>
          </div>
          <p class="image-disclaimer">본사진은 환자분의 동의하에 게재 하였습니다</p>
        </div>
      </div>

      <p class="hero-bottom-text">ZEAH DENTAL HOSPITAL</p>
    </section>

    <!-- flow-2: Why M Dental Section - 왜 엠치과일까요? 4가지 포인트 (id: why-m-dental-section) -->
    <section class="why-m-dental-section">
      <div class="why-m-dental-content">
        <header class="why-m-dental-header">
          <h2 class="why-m-dental-title">왜, 엠치과일까요?</h2>
          <p class="why-m-dental-subtitle">
            임플란트는 <strong>정확한 진단</strong>과 <strong>경험</strong>이 결과를 좌우합니다.<br>
            엠치과는 안전·기능·심미의 균형을 지향합니다.
          </p>
        </header>

        <div class="why-m-dental-cards">
          <!-- Card 01 -->
          <article class="why-m-dental-card">
            <div class="card-image">
              <img src="assets/images/main/image-background-2.png" alt="15년 임상 경험">
            </div>
            <div class="card-content">
              <div class="card-point">
                <span class="point-label">POINT </span>
                <span class="point-number">01</span>
              </div>
              <h3 class="card-title">15년 임상 경험</h3>
              <p class="card-description">
                풍부한 케이스로 검증된 전문 시술과<br>
                합리적 플랜을 제안합니다.
              </p>
            </div>
          </article>

          <!-- Card 02 -->
          <article class="why-m-dental-card">
            <div class="card-image">
              <img src="assets/images/main/image-background.png" alt="정밀 진단">
            </div>
            <div class="card-content">
              <div class="card-point">
                <span class="point-label">POINT </span>
                <span class="point-number">02</span>
              </div>
              <h3 class="card-title">정밀 진단</h3>
              <p class="card-description">
                CT·3D 스캔 기반의 데이터<br>
                중심 진단으로 리스크를 줄입니다.
              </p>
            </div>
          </article>

          <!-- Card 03 -->
          <article class="why-m-dental-card">
            <div class="card-image">
              <img src="assets/images/main/image-background-1.png" alt="맞춤 수술 가이드">
            </div>
            <div class="card-content">
              <div class="card-point">
                <span class="point-label">POINT </span>
                <span class="point-number">03</span>
              </div>
              <h3 class="card-title">맞춤 수술 가이드</h3>
              <p class="card-description">
                치조골 상태와 생활패턴을 반영한<br>
                1:1 가이드 수술로 회복을 돕습니다.
              </p>
            </div>
          </article>

          <!-- Card 04 -->
          <article class="why-m-dental-card">
            <div class="card-image">
              <img src="assets/images/main/dentist-explains.png" alt="사후 관리 시스템">
            </div>
            <div class="card-content">
              <div class="card-point">
                <span class="point-label">POINT </span>
                <span class="point-number">04</span>
              </div>
              <h3 class="card-title">사후 관리 시스템</h3>
              <p class="card-description">
                정기검진·위생관리·응급 대응까지<br>
                체계적으로 케어합니다.
              </p>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- flow-3: Video Section - 엠치과 영상 (id: video-section) -->
    <section class="video-section">
      <div class="video-section__bg">
        <img src="assets/images/main/m-1.jpg" alt="" class="video-section__bg-img">
      </div>

      <div class="video-section__content">
        <article class="implant-card">
          <div class="implant-card__container">
            <div class="implant-card__badge-wrap">
              <span class="implant-card__badge">디지털 네비게이션 임플란트</span>
            </div>
            <div class="implant-card__desc-wrap">
              <p class="implant-card__desc">고난이도 케이스도 계획된 위치에<br>정확히 식립되는 정밀 수술 시스템</p>
            </div>
          </div>
        </article>

        <article class="implant-card">
          <div class="implant-card__container">
            <div class="implant-card__badge-wrap">
              <span class="implant-card__badge">최소 침습 임플란트</span>
            </div>
            <div class="implant-card__desc-wrap">
              <p class="implant-card__desc">잇몸 절개 없이<br>빠른 일상 복귀를 돕는 최소침습 방식</p>
            </div>
          </div>
        </article>

        <article class="implant-card">
          <div class="implant-card__container">
            <div class="implant-card__badge-wrap">
              <span class="implant-card__badge">전체 임플란트</span>
            </div>
            <div class="implant-card__desc-wrap">
              <p class="implant-card__desc">윗턱 아래턱 전반의 교합과 기능을<br>복원하는 종합 치료 솔루션</p>
            </div>
          </div>
        </article>

        <article class="implant-card">
          <div class="implant-card__container">
            <div class="implant-card__badge-wrap">
              <span class="implant-card__badge">임플란트 틀니</span>
            </div>
            <div class="implant-card__desc-wrap">
              <p class="implant-card__desc">잇몸뼈 손실을 최소화하며<br>안정적인 틀니 고정을 돕는 기술</p>
            </div>
          </div>
        </article>

        <article class="implant-card">
          <div class="implant-card__container">
            <div class="implant-card__badge-wrap">
              <span class="implant-card__badge">원데이 임플란트</span>
            </div>
            <div class="implant-card__desc-wrap">
              <p class="implant-card__desc">임시 보철을 바로 제작해 불편함 없이<br>당일 시술이 가능한 시스템</p>
            </div>
          </div>
        </article>
      </div>

      <div class="video-section__illustration">
        <img src="assets/images/main/metal-dental-post.png" alt="Dental implant illustration" class="video-section__implant-img">
      </div>
    </section>

    <!-- flow-4: Testimonial Section - 환자 후기 및 Before/After (id: testimonial-section) -->
    <section class="testimonial-section">
      <div class="testimonial-container">
        <!-- Heading -->
        <div class="testimonial-heading">
          <h2 class="testimonial-title">엠치과를 방문하신 환자분들의 생생한 후기</h2>
        </div>
        <div class="testimonial-subtitle">
          <p>임플란트 시술 전과 후, <strong>환자분들의 표정이 바뀝니다</strong></p>
          <p><strong>직접 경험한 분</strong>들의 이야기를 들어보세요</p>
        </div>

        <!-- Before/After Comparison -->
        <div class="comparison-wrapper">
          <div class="comparison-container">
            <div class="comparison-cards">
              <!-- Before Card -->
              <article class="comparison-card">
                <div class="comparison-img-container">
                  <img src="assets/images/main/before-photo.jpg" alt="임플란트 시술 전 모습" class="comparison-img">
                </div>
                <div class="comparison-img-container">
                  <img src="assets/images/main/teeth-compare.jpg" alt="치아 비포 이미지" class="comparison-img">
                </div>
                <div class="comparison-label comparison-label--before">
                  <span>Before</span>
                </div>
              </article>

              <!-- After Card -->
              <article class="comparison-card">
                <div class="comparison-img-container">
                  <img src="assets/images/main/after-photo.jpg" alt="임플란트 시술 후 모습" class="comparison-img">
                </div>
                <div class="comparison-img-container">
                  <img src="assets/images/main/teeth-compare.jpg" alt="치아 애프터 이미지" class="comparison-img comparison-img--flipped">
                </div>
                <div class="comparison-label comparison-label--after">
                  <span>After</span>
                </div>
              </article>
            </div>
            <p class="comparison-disclaimer">※ 치료 결과는 개인별로 차이가 있을 수 있으며 부작용이 발생할 수 있습니다.</p>
          </div>
        </div>

        <!-- Testimonial Reviews -->
        <div class="reviews-container">
          <!-- Review 1 - Featured -->
          <article class="review-card review-card--featured">
            <div class="review-content">
              <div class="review-avatar">
                <img src="assets/images/main/avatar-1.png" alt="김OO님 프로필" class="avatar-img">
              </div>
              <div class="review-text">
                <p class="reviewer-name">김OO님</p>
                <p class="review-message">항상 부어 있던 잇몸이 이제는 편안합니다. <br>식사할 때마다 느껴지는 안정감이 정말 좋아요.</p>
              </div>
            </div>
          </article>

          <!-- Review 2 -->
          <article class="review-card">
            <div class="review-content">
              <div class="review-avatar">
                <img src="assets/images/main/avatar-3.png" alt="이OO님 프로필" class="avatar-img">
              </div>
              <div class="review-text">
                <p class="reviewer-name">이OO님</p>
                <p class="review-message">다음날부터 바로 식사할 수 있었고, 회복도 빨랐습니다.</p>
              </div>
            </div>
          </article>

          <!-- Review 3 -->
          <article class="review-card">
            <div class="review-content">
              <div class="review-avatar">
                <img src="assets/images/main/avatar-2.png" alt="박OO님 프로필" class="avatar-img">
              </div>
              <div class="review-text">
                <p class="reviewer-name">박OO님</p>
                <p class="review-message">틀니로 고민 많았는데, 임플란트 틀니로 바꾸고 나서 훨씬 편해졌어요. <br>식사와 발음이 자연스러워졌습니다.</p>
              </div>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- flow-5: CTA Section (id: cta-section) -->
    <section class="cta-section">
      <div class="cta-section__container">
        <div class="cta-section__content">
          <!-- Heading -->
          <h2 class="cta-section__title">전국에서 찾아오는  엠치과</h2>

          <!-- Tags -->
          <div class="cta-section__tags">
            <span class="cta-section__tag">#입소문 난 원장님 실력</span>
            <span class="cta-section__tag">#전국 어디서나 편리한 접근</span>
            <span class="cta-section__tag">#당일 상담 및 시술 가능</span>
            <span class="cta-section__tag">#정확한 3D CT 진단</span>
            <span class="cta-section__tag">#장거리 환자 우선 예약 혜택</span>
          </div>

          <!-- Description -->
          <p class="cta-section__description">
            <strong>정밀한 진단</strong>과 <strong>꼼꼼한 수술</strong>, 그리고 <strong>꾸준한 사후관리</strong>로<br>
            관평동을 넘어 대전 전역에서 환자분들이 찾아오고 있습니다
          </p>
        </div>

        <!-- Map decoration -->
        <div class="cta-section__map-wrapper">
          <img src="assets/images/main/map-south-korea.png" alt="" class="cta-section__map" aria-hidden="true">
        </div>
      </div>
    </section>

    <!-- flow-6: Footer (id: footer) -->
    <?php include_once 'includes/footer.php'; ?>
  </main>

  <!-- position: fixed-bottom - Reservation Bar - 상담 예약 폼 (id: reservation-bar) -->
  <section class="reservation-bar">
    <div class="reservation-bar__header">
      <span class="reservation-bar__title">신청 예약하기</span>
    </div>
    <form class="reservation-bar__form">
      <div class="reservation-bar__phone">
        <span class="reservation-bar__phone-number">042)671-2875</span>
      </div>
      <div class="reservation-bar__input-group">
        <input type="text" class="reservation-bar__input" placeholder="성함" name="name" required>
      </div>
      <div class="reservation-bar__input-group">
        <input type="tel" class="reservation-bar__input" placeholder="연락처" name="phone" required>
      </div>
      <div class="reservation-bar__checkbox-group">
        <input type="checkbox" id="privacy-agree" class="reservation-bar__checkbox" required>
        <label for="privacy-agree" class="reservation-bar__checkbox-label">개인정보 수집 및 이용에 관한 사항에 동의합니다.</label>
      </div>
      <button type="submit" class="reservation-bar__submit">상담신청</button>
    </form>
  </section>

  <!-- position: fixed-bottom-right - Quick Contact FAB - SNS 바로가기 (id: quick-contact-fab) -->
  <?php include_once 'includes/quick-contact-fab.php'; ?>

  <!-- Scripts -->
  <script src="js/common.js"></script>
</body>
</html>
