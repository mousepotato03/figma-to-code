<nav class="navbar">
  <!-- Top Bar -->
  <div class="navbar-topbar">
    <div class="navbar-topbar-container">
      <div class="navbar-topbar-actions">
        <button class="navbar-lang-btn" aria-label="Language selector">
          <img src="assets/icons/world.png" alt="Language" class="navbar-lang-icon">
        </button>
      </div>
    </div>
  </div>

  <!-- Main Navbar -->
  <div class="navbar-main">
    <div class="navbar-main-container">
      <a href="/" class="navbar-logo">
        <img src="assets/images/_common/logo_nibec.png" alt="NIBEC" class="navbar-logo-img">
      </a>

      <!-- Hamburger Button (Mobile) -->
      <button class="navbar-toggle" aria-label="Toggle menu">
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
      </button>

      <!-- Navigation Menu -->
      <div class="navbar-menu">
        <a href="/about" class="navbar-link">About NIBEC</a>
        <a href="/drug-discovery" class="navbar-link">Drug Discovery</a>
        <a href="/medical-device" class="navbar-link">Medical Device</a>
        <a href="/ir-news" class="navbar-link">IR &amp; News</a>
        <a href="/contact" class="navbar-link">Contact</a>
      </div>
    </div>
  </div>
</nav>

<script>
document.querySelector('.navbar-toggle').addEventListener('click', function() {
  document.querySelector('.navbar-menu').classList.toggle('active');
  this.classList.toggle('active');
});
</script>
