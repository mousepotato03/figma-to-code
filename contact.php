<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>contact</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/contact.css">
</head>
<body>
  <!-- Fixed Top: Main Navbar -->
  <?php include_once 'includes/navbar.php'; ?>

  <main class="page-contact">
    <!-- flow-1: Header Section (id: header-section) -->
    <section class="header-section">
      <div class="header-content">
        <div class="header-accent-bar"></div>
        <h1 class="header-title">Connect with NIBEC</h1>
      </div>
    </section>

    <!-- flow-2: Sub Navigation (id: sub-navigation) -->
    <section class="sub-navigation">
      <div class="sub-navigation__background">
        <div class="sub-navigation__image-right">
          <img src="assets/images/contact/susja-1i-issneun-nogsaeg-dna-gadag.jpg" alt="" />
        </div>
        <div class="sub-navigation__image-left">
          <img src="assets/images/contact/susja-1i-issneun-nogsaeg-dna-gadag.jpg" alt="" />
        </div>
        <div class="sub-navigation__gradient-overlay"></div>
        <div class="sub-navigation__gradient-top"></div>
      </div>

      <div class="sub-navigation__content">
        <div class="sub-navigation__description">
          <p>나이벡에 대한 모든 궁금증, 빠르고 정확하게 안내해 드립니다.</p>
          <p>담당 부서별 연락처와 전 세계 나이벡 거점 위치를 통해 가장 편리한 방법으로 우리와 연결하세요.</p>
        </div>

        <nav class="sub-navigation__navbar">
          <a href="#contact-us" class="sub-navigation__link sub-navigation__link--active">
            <span>Contact Us</span>
          </a>
          <a href="#locations" class="sub-navigation__link">
            <span>Locations</span>
          </a>
          <div class="sub-navigation__link sub-navigation__link--empty"></div>
          <div class="sub-navigation__link sub-navigation__link--empty"></div>
        </nav>
      </div>
    </section>

    <!-- flow-3: Contact Info Section (id: contact-info-section) -->
    <section class="contact-info-section">
      <div class="contact-info-container">
        <div class="contact-info-header">
          <h2 class="contact-info-title">Direct Contacts</h2>
        </div>

        <div class="contact-info-cards">
          <!-- 위탁생산 관련 문의 -->
          <div class="contact-info-card">
            <div class="contact-card-content">
              <div class="contact-card-header">
                <h3 class="contact-card-title">위탁생산 관련 문의</h3>
                <p class="contact-card-desc">라이선스 아웃, 신약 공동 개발 및<br>CDMO 파트너십 제안</p>
              </div>
              <div class="contact-card-row">
                <img src="assets/icons/mail.svg" alt="이메일" class="contact-icon">
                <a href="mailto:bd@nibec.co.kr" class="contact-email">bd@nibec.co.kr</a>
              </div>
            </div>
          </div>

          <div class="contact-divider"></div>

          <!-- 제품 구매 및 유통 문의 -->
          <div class="contact-info-card">
            <div class="contact-card-content">
              <div class="contact-card-header">
                <h3 class="contact-card-title">제품 구매 및 유통 문의</h3>
                <p class="contact-card-desc">골이식재 등 의료기기 제품 구매 및 유통 문의</p>
              </div>
              <div class="contact-card-row">
                <img src="assets/icons/mail.svg" alt="이메일" class="contact-icon">
                <a href="mailto:sales@nibec.co.kr" class="contact-email">sales@nibec.co.kr</a>
              </div>
            </div>
          </div>

          <div class="contact-divider"></div>

          <!-- 주주 및 투자자 문의 -->
          <div class="contact-info-card">
            <div class="contact-card-content">
              <div class="contact-card-header">
                <h3 class="contact-card-title">주주 및 투자자 문의</h3>
                <p class="contact-card-desc">공시, 재무 정보 및 기업 설명회 관련 문의</p>
              </div>
              <div class="contact-card-details">
                <div class="contact-card-row">
                  <img src="assets/icons/call.svg" alt="전화" class="contact-icon">
                  <span class="contact-text">+82-2-765-1976</span>
                </div>
                <div class="contact-card-row">
                  <img src="assets/icons/location_on.svg" alt="위치" class="contact-icon">
                  <span class="contact-text">서울 종로구 율곡로 174 창경빌딩 10층</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- flow-4: Contact Form Section (id: contact-form-section) -->
    <section class="contact-form-section">
      <div class="contact-form-container">
        <div class="contact-form-component">
          <!-- Left: Content -->
          <div class="contact-form-content">
            <div class="contact-form-text">
              <h2 class="contact-form-title">General Inquiries</h2>
              <div class="contact-form-desc">
                <p>채용, 미디어 제휴 등 위에 명시되지 않은</p>
                <p>기타 문의 사항은 우측의 온라인 양식을 이용해 주세요.</p>
              </div>
            </div>
            <div class="contact-info-list">
              <div class="contact-info-row">
                <img src="assets/icons/mail.svg" alt="Email" class="contact-info-icon">
                <a href="mailto:webmaster@nibec.co.kr" class="contact-info-email">webmaster@nibec.co.kr</a>
              </div>
              <div class="contact-info-row">
                <img src="assets/icons/call.svg" alt="Phone" class="contact-info-icon">
                <span class="contact-info-text">+82-43-532-7458</span>
              </div>
              <div class="contact-info-row contact-info-row--address">
                <img src="assets/icons/location_on.svg" alt="Address" class="contact-info-icon">
                <div class="contact-info-address">
                  <p>충북 진천군 이월면 밤디길 116</p>
                  <p>이월전기전자농공단지 (27816)</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Right: Form -->
          <form class="contact-form" action="#" method="POST">
            <div class="form-group">
              <label class="form-label" for="contact-name">이름</label>
              <input type="text" id="contact-name" name="name" class="form-input" placeholder="Name">
            </div>
            <div class="form-group">
              <label class="form-label" for="contact-email">이메일</label>
              <input type="email" id="contact-email" name="email" class="form-input" placeholder="Email address">
            </div>
            <div class="form-group">
              <label class="form-label" for="contact-phone">전화번호</label>
              <input type="tel" id="contact-phone" name="phone" class="form-input" placeholder="">
            </div>
            <div class="form-group">
              <label class="form-label" for="contact-subject">제목</label>
              <input type="text" id="contact-subject" name="subject" class="form-input" placeholder="">
            </div>
            <div class="form-group">
              <label class="form-label" for="contact-message">문의 내용</label>
              <textarea id="contact-message" name="message" class="form-textarea" placeholder=""></textarea>
            </div>
            <div class="form-checkbox">
              <input type="checkbox" id="contact-privacy" name="privacy" class="checkbox-input">
              <label for="contact-privacy" class="checkbox-label">
                <a href="#" class="privacy-link">개인정보취급방침</a>에 동의합니다.
              </label>
            </div>
            <button type="submit" class="form-submit-btn">SEND</button>
          </form>
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
