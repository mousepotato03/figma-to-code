<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact - NIBEC</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/theme.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/contact.css">
</head>
<body>
  <!-- Header Components -->
  <?php include 'includes/navbar.php'; ?>

  <main class="page-contact">
    <!-- Section 1: Header -->
    <section class="contact-header">
      <div class="contact-header__content">
        <div class="contact-header__accent"></div>
        <h1 class="contact-header__title">Connect with NIBEC</h1>
      </div>
    </section>

    <!-- Section 2: SubNavigation -->
    <section class="subnavigation">
      <div class="subnavigation__description">
        <p>나이벡에 대한 모든 궁금증, 빠르고 정확하게 안내해 드립니다.</p>
        <p>담당 부서별 연락처와 전 세계 나이벡 거점 위치를 통해 가장 편리한 방법으로 우리와 연결하세요.</p>
      </div>
      <nav class="subnavigation__navbar">
        <div class="subnavigation__link subnavigation__link--active">
          <span>Contact Us</span>
        </div>
        <a href="#" class="subnavigation__link">
          <span>Locations</span>
        </a>
        <div class="subnavigation__link subnavigation__link--empty"></div>
        <div class="subnavigation__link subnavigation__link--empty"></div>
      </nav>
    </section>

    <!-- Section 3: DepartmentContacts -->
    <section class="department-contacts">
      <div class="department-contacts__container">
        <div class="department-contacts__header">
          <h2 class="department-contacts__title">Direct Contacts</h2>
        </div>

        <div class="department-contacts__grid">
          <!-- Divider -->
          <div class="department-contacts__divider"></div>

          <!-- Contact Card 1: CDMO -->
          <div class="department-contacts__card">
            <div class="department-contacts__card-content">
              <h3 class="department-contacts__card-title">위탁생산 관련 문의</h3>
              <p class="department-contacts__card-desc">라이선스 아웃, 신약 공동 개발 및<br>CDMO 파트너십 제안</p>
            </div>
            <div class="department-contacts__card-contact">
              <span class="department-contacts__icon department-contacts__icon--mail"></span>
              <a href="mailto:bd@nibec.co.kr" class="department-contacts__email">bd@nibec.co.kr</a>
            </div>
          </div>

          <!-- Divider -->
          <div class="department-contacts__divider"></div>

          <!-- Contact Card 2: Sales -->
          <div class="department-contacts__card">
            <div class="department-contacts__card-content">
              <h3 class="department-contacts__card-title">제품 구매 및 유통 문의</h3>
              <p class="department-contacts__card-desc">골이식재 등 의료기기 제품 구매 및 유통 문의</p>
            </div>
            <div class="department-contacts__card-contact">
              <span class="department-contacts__icon department-contacts__icon--mail"></span>
              <a href="mailto:sales@nibec.co.kr" class="department-contacts__email">sales@nibec.co.kr</a>
            </div>
          </div>

          <!-- Divider -->
          <div class="department-contacts__divider"></div>

          <!-- Contact Card 3: Investor -->
          <div class="department-contacts__card department-contacts__card--investor">
            <div class="department-contacts__card-content">
              <h3 class="department-contacts__card-title">주주 및 투자자 문의</h3>
              <p class="department-contacts__card-desc">공시, 재무 정보 및 기업 설명회 관련 문의</p>
            </div>
            <div class="department-contacts__card-info">
              <div class="department-contacts__info-row">
                <span class="department-contacts__icon department-contacts__icon--call"></span>
                <span class="department-contacts__info-text">+82-2-765-1976</span>
              </div>
              <div class="department-contacts__info-row">
                <span class="department-contacts__icon department-contacts__icon--location"></span>
                <span class="department-contacts__info-text">서울 종로구 율곡로 174 창경빌딩 10층</span>
              </div>
            </div>
          </div>

          <!-- Divider -->
          <div class="department-contacts__divider"></div>
        </div>
      </div>
    </section>

    <!-- Section 4: ContactForm -->
    <section class="contactform-section">
      <div class="contactform-container">
        <!-- Left Content -->
        <div class="contactform-content">
          <div class="contactform-header">
            <h2 class="contactform-title">General Inquiries</h2>
            <div class="contactform-description">
              <p>채용, 미디어 제휴 등 위에 명시되지 않은</p>
              <p>기타 문의 사항은 우측의 온라인 양식을 이용해 주세요.</p>
            </div>
          </div>
          <div class="contactform-info">
            <div class="contactform-info-row">
              <div class="contactform-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M4 20C3.45 20 2.97917 19.8042 2.5875 19.4125C2.19583 19.0208 2 18.55 2 18V6C2 5.45 2.19583 4.97917 2.5875 4.5875C2.97917 4.19583 3.45 4 4 4H20C20.55 4 21.0208 4.19583 21.4125 4.5875C21.8042 4.97917 22 5.45 22 6V18C22 18.55 21.8042 19.0208 21.4125 19.4125C21.0208 19.8042 20.55 20 20 20H4ZM12 13L4 8V18H20V8L12 13ZM12 11L20 6H4L12 11ZM4 8V6V18V8Z" fill="#283C36"/>
                </svg>
              </div>
              <a href="mailto:webmaster@nibec.co.kr" class="contactform-link">webmaster@nibec.co.kr</a>
            </div>
            <div class="contactform-info-row">
              <div class="contactform-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M19.95 21C17.8667 21 15.8083 20.5458 13.775 19.6375C11.7417 18.7292 9.89167 17.4417 8.225 15.775C6.55833 14.1083 5.27083 12.2583 4.3625 10.225C3.45417 8.19167 3 6.13333 3 4.05C3 3.75 3.1 3.5 3.3 3.3C3.5 3.1 3.75 3 4.05 3H8.1C8.33333 3 8.54167 3.07917 8.725 3.2375C8.90833 3.39583 9.01667 3.58333 9.05 3.8L9.7 7.3C9.73333 7.56667 9.725 7.79167 9.675 7.975C9.625 8.15833 9.53333 8.31667 9.4 8.45L6.975 10.9C7.30833 11.5167 7.70417 12.1125 8.1625 12.6875C8.62083 13.2625 9.125 13.8167 9.675 14.35C10.1917 14.8667 10.7333 15.3458 11.3 15.7875C11.8667 16.2292 12.4667 16.6333 13.1 17L15.45 14.65C15.6 14.5 15.7958 14.3875 16.0375 14.3125C16.2792 14.2375 16.5167 14.2167 16.75 14.25L20.2 14.95C20.4333 15.0167 20.625 15.1375 20.775 15.3125C20.925 15.4875 21 15.6833 21 15.9V19.95C21 20.25 20.9 20.5 20.7 20.7C20.5 20.9 20.25 21 19.95 21Z" fill="#283C36"/>
                </svg>
              </div>
              <span class="contactform-text">+82-43-532-7458</span>
            </div>
            <div class="contactform-info-row contactform-info-row--address">
              <div class="contactform-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12 12C12.55 12 13.0208 11.8042 13.4125 11.4125C13.8042 11.0208 14 10.55 14 10C14 9.45 13.8042 8.97917 13.4125 8.5875C13.0208 8.19583 12.55 8 12 8C11.45 8 10.9792 8.19583 10.5875 8.5875C10.1958 8.97917 10 9.45 10 10C10 10.55 10.1958 11.0208 10.5875 11.4125C10.9792 11.8042 11.45 12 12 12ZM12 19.35C14.0333 17.4833 15.5417 15.7875 16.525 14.2625C17.5083 12.7375 18 11.3833 18 10.2C18 8.38333 17.4208 6.89583 16.2625 5.7375C15.1042 4.57917 13.6833 4 12 4C10.3167 4 8.89583 4.57917 7.7375 5.7375C6.57917 6.89583 6 8.38333 6 10.2C6 11.3833 6.49167 12.7375 7.475 14.2625C8.45833 15.7875 9.96667 17.4833 12 19.35ZM12 22C9.31667 19.7167 7.3125 17.5958 5.9875 15.6375C4.6625 13.6792 4 11.8667 4 10.2C4 7.7 4.80417 5.70833 6.4125 4.225C8.02083 2.74167 9.88333 2 12 2C14.1167 2 15.9792 2.74167 17.5875 4.225C19.1958 5.70833 20 7.7 20 10.2C20 11.8667 19.3375 13.6792 18.0125 15.6375C16.6875 17.5958 14.6833 19.7167 12 22Z" fill="#283C36"/>
                </svg>
              </div>
              <div class="contactform-address">
                <p>충북 진천군 이월면 밤디길 116</p>
                <p>이월전기전자농공단지 (27816)</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Form -->
        <form class="contactform-form" id="contact-form">
          <div class="contactform-input-group">
            <label class="contactform-label">이름</label>
            <div class="contactform-field">
              <input type="text" name="name" placeholder="Name" class="contactform-input" required>
            </div>
          </div>

          <div class="contactform-input-group">
            <label class="contactform-label">이메일</label>
            <div class="contactform-field">
              <input type="email" name="email" placeholder="Email address" class="contactform-input" required>
            </div>
          </div>

          <div class="contactform-input-group">
            <label class="contactform-label">전화번호</label>
            <div class="contactform-field">
              <input type="tel" name="phone" class="contactform-input">
            </div>
          </div>

          <div class="contactform-input-group">
            <label class="contactform-label">제목</label>
            <div class="contactform-field">
              <input type="text" name="subject" class="contactform-input" required>
            </div>
          </div>

          <div class="contactform-input-group">
            <label class="contactform-label">문의 내용</label>
            <div class="contactform-field contactform-field--textarea">
              <textarea name="message" class="contactform-textarea" required></textarea>
            </div>
          </div>

          <div class="contactform-checkbox-group">
            <input type="checkbox" id="privacy-agree" name="privacy" class="contactform-checkbox" required>
            <label for="privacy-agree" class="contactform-checkbox-label">
              <a href="#" class="contactform-privacy-link">개인정보취급방침</a>에 동의합니다.
            </label>
          </div>

          <button type="submit" class="contactform-submit">SEND</button>
        </form>
      </div>
    </section>
  </main>

  <!-- Footer Components -->
  <?php include 'includes/footer.php'; ?>

  <!-- Scripts -->
  <script>
    // Form validation and submission handling
    document.getElementById('contact-form').addEventListener('submit', function(e) {
      e.preventDefault();

      const form = this;
      const submitBtn = form.querySelector('.contactform-submit');
      const originalText = submitBtn.textContent;

      // Show loading state
      submitBtn.textContent = 'SENDING...';
      submitBtn.disabled = true;

      // Simulate form submission (replace with actual form handling)
      setTimeout(function() {
        submitBtn.textContent = 'SENT!';

        // Reset form after success
        setTimeout(function() {
          form.reset();
          submitBtn.textContent = originalText;
          submitBtn.disabled = false;
        }, 2000);
      }, 1500);
    });
  </script>
</body>
</html>
