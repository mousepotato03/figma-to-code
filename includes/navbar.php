<nav class="navbar">
  <!-- Top Bar -->
  <div class="navbar-topbar">
    <div class="navbar-topbar-container">
      <div class="navbar-topbar-actions">
        <button class="navbar-lang-btn" aria-label="언어 선택">
          <img src="assets/icons/world-icon.svg" alt="" class="navbar-lang-icon">
        </button>
      </div>
    </div>
  </div>

  <!-- Main Navbar -->
  <div class="navbar-main">
    <div class="navbar-container">
      <!-- Logo -->
      <a href="/" class="navbar-logo">
        <img src="assets/images/common/logo_nibec_white.svg" alt="NIBEC" class="navbar-logo-img">
      </a>

      <!-- Hamburger Button (Mobile) -->
      <button class="navbar-toggle" aria-label="메뉴 열기">
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
      </button>

      <!-- Navigation Menu -->
      <div class="navbar-menu">
        <a href="/about-nibec-overview.php" class="navbar-link">About NIBEC</a>
        <a href="/drug-discovery-core-technology.php" class="navbar-link">Drug Discovery</a>
        <a href="/medical-device-division-core-technology.php" class="navbar-link">Medical Device</a>
        <a href="/ir-new-notice.php" class="navbar-link">IR &amp; News</a>
        <a href="/contact.php" class="navbar-link">Contact</a>
      </div>
    </div>
  </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const navbarToggle = document.querySelector('.navbar-toggle');
  const navbarMenu = document.querySelector('.navbar-menu');

  if (navbarToggle && navbarMenu) {
    navbarToggle.addEventListener('click', function() {
      navbarMenu.classList.toggle('active');
      this.classList.toggle('active');
    });
  }
});
</script>
