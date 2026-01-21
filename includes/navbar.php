<nav class="navbar">
  <!-- Top Bar (Language) -->
  <div class="navbar-top">
    <div class="navbar-top-container">
      <div class="navbar-actions">
        <button class="language-btn" aria-label="언어 선택">
          <img src="assets/icons/world-icon.svg" alt="" class="language-icon">
        </button>
      </div>
    </div>
  </div>

  <!-- Main Navigation -->
  <div class="navbar-main">
    <div class="navbar-container">
      <!-- Logo -->
      <a href="/" class="navbar-brand">
        <img src="assets/images/common/logo-nibec.svg" alt="NIBEC" class="navbar-logo">
      </a>

      <!-- Hamburger Button (Mobile) -->
      <button class="navbar-toggle" aria-label="메뉴 열기">
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
      </button>

      <!-- Navigation Menu -->
      <div class="navbar-menu">
        <a href="/about-nibec-overview.php" class="nav-link">About NIBEC</a>
        <a href="/drug-discovery-core-technology.php" class="nav-link">Drug Discovery</a>
        <a href="/medical-device-division-core-technology.php" class="nav-link">Medical Device</a>
        <a href="/ir-news-press-releases.php" class="nav-link">IR &amp; News</a>
        <a href="/contact.php" class="nav-link">Contact</a>
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
      navbarToggle.classList.toggle('active');
    });
  }
});
</script>
