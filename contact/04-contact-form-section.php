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
