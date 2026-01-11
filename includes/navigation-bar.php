<nav class="navbar">
  <div class="navbar-inner">
    <!-- Logo -->
    <div class="navbar-brand">
      <a href="/">
        <img src="assets/icons/logo.png" alt="Logo" class="navbar-logo" />
      </a>
    </div>

    <!-- Hamburger Button (mobile) -->
    <button class="navbar-toggle hide-desktop" aria-label="Menu">
      <span class="hamburger-line"></span>
      <span class="hamburger-line"></span>
      <span class="hamburger-line"></span>
    </button>

    <!-- Navigation Menu -->
    <div class="navbar-menu">
      <a href="/intro" class="navbar-link">치과소개</a>
      <a href="/special" class="navbar-link">M 특별함</a>
      <a href="/implant" class="navbar-link">임플란트</a>
      <a href="/clinic" class="navbar-link">심미클리닉</a>
      <a href="/dentalcare" class="navbar-link">덴탈케어</a>
      <a href="/community" class="navbar-link">커뮤니티</a>
      <a href="/login" class="navbar-link">로그인</a>
    </div>
  </div>
</nav>

<script>
document.querySelector('.navbar-toggle').addEventListener('click', function() {
  document.querySelector('.navbar-menu').classList.toggle('active');
  this.classList.toggle('active');
});
</script>
