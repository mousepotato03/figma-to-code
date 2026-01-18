<nav class="navbar">
  <div class="navbar-inner">
    <a href="/" class="navbar-brand">
      <img src="assets/icons/logo.svg" alt="M Dental" class="navbar-logo">
    </a>

    <!-- Hamburger button (mobile) -->
    <button class="navbar-toggle hide-desktop" aria-label="Open menu">
      <span class="hamburger-line"></span>
      <span class="hamburger-line"></span>
      <span class="hamburger-line"></span>
    </button>

    <!-- Navigation menu -->
    <ul class="navbar-menu">
      <li class="navbar-item">
        <a href="/about" class="navbar-link">치과소개</a>
      </li>
      <li class="navbar-item">
        <a href="/special" class="navbar-link">M 특별함</a>
      </li>
      <li class="navbar-item">
        <a href="/implant" class="navbar-link">임플란트</a>
      </li>
      <li class="navbar-item">
        <a href="/clinic" class="navbar-link">심미클리닉</a>
      </li>
      <li class="navbar-item">
        <a href="/dental-care" class="navbar-link">덴탈케어</a>
      </li>
      <li class="navbar-item">
        <a href="/community" class="navbar-link">커뮤니티</a>
      </li>
      <li class="navbar-item">
        <a href="/login" class="navbar-link">로그인</a>
      </li>
    </ul>
  </div>
</nav>

<script>
document.querySelector('.navbar-toggle').addEventListener('click', function() {
  document.querySelector('.navbar-menu').classList.toggle('active');
  this.classList.toggle('active');
});
</script>
