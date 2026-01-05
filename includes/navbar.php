<header class="navbar">
  <!-- Top Bar -->
  <div class="navbar__topbar">
    <div class="navbar__topbar-container">
      <div class="navbar__actions">
        <button class="navbar__lang-btn" type="button" aria-label="Language selector">
          <img src="" alt="placeholder" data-image-id="world-icon" class="navbar__lang-icon image-placeholder" />
          <!-- IMAGE_PLACEHOLDER_WORLD_ICON -->
        </button>
      </div>
    </div>
  </div>

  <!-- Main Navigation -->
  <nav class="navbar__main">
    <div class="navbar__main-container">
      <!-- Logo -->
      <a href="home.php" class="navbar__logo-link">
        <img src="" alt="NIBEC Logo" data-image-id="logo" class="navbar__logo image-placeholder" />
        <!-- IMAGE_PLACEHOLDER_LOGO -->
      </a>

      <!-- Navigation Links -->
      <ul class="navbar__menu">
        <!-- About NIBEC -->
        <li class="navbar__menu-item navbar__menu-item--has-dropdown">
          <a href="about-nibec-overview.php" class="navbar__menu-link">About NIBEC</a>
          <div class="navbar__dropdown">
            <div class="navbar__dropdown-container">
              <div class="navbar__dropdown-info">
                <p class="navbar__dropdown-title">About NIBEC</p>
                <p class="navbar__dropdown-desc">Founded on research from Seoul National University's IBEC, NIBEC is a global bio-healthcare leader shaping a healthier future through innovative peptide fusion technology.</p>
              </div>
              <ul class="navbar__dropdown-links">
                <li><a href="about-nibec-overview.php" class="navbar__dropdown-link navbar__dropdown-link--active">Overview</a></li>
                <li><a href="about-nibec-history.php" class="navbar__dropdown-link">History</a></li>
                <li><a href="about-nibec-leadership.php" class="navbar__dropdown-link">Leadership</a></li>
                <li><a href="about-nibec-certifications-compliance.php" class="navbar__dropdown-link">Certifications &amp; Compliance</a></li>
                <li><a href="global-network.php" class="navbar__dropdown-link">Global Network</a></li>
              </ul>
            </div>
          </div>
        </li>

        <!-- Drug Discovery -->
        <li class="navbar__menu-item navbar__menu-item--has-dropdown">
          <a href="drug-discovery-division-core-technology.php" class="navbar__menu-link">Drug Discovery</a>
          <div class="navbar__dropdown">
            <div class="navbar__dropdown-container">
              <div class="navbar__dropdown-info">
                <p class="navbar__dropdown-title">Drug Discovery</p>
                <p class="navbar__dropdown-desc">Leveraging our proprietary peptide platform technology, we are developing innovative therapeutics targeting unmet medical needs across multiple disease areas.</p>
              </div>
              <ul class="navbar__dropdown-links">
                <li><a href="drug-discovery-division-core-technology.php" class="navbar__dropdown-link navbar__dropdown-link--active">Core Technology</a></li>
                <li><a href="drug-discovery-division-pipeline.php" class="navbar__dropdown-link">Pipeline</a></li>
              </ul>
            </div>
          </div>
        </li>

        <!-- Medical Device -->
        <li class="navbar__menu-item navbar__menu-item--has-dropdown">
          <a href="medical-device-division-core-technology.php" class="navbar__menu-link">Medical Device</a>
          <div class="navbar__dropdown">
            <div class="navbar__dropdown-container">
              <div class="navbar__dropdown-info">
                <p class="navbar__dropdown-title">Medical Device</p>
                <p class="navbar__dropdown-desc">Combining peptide technology with collagen expertise, we provide optimal tissue regeneration solutions. We lead global standards in high-performance dental and surgical devices.</p>
              </div>
              <ul class="navbar__dropdown-links">
                <li><a href="medical-device-division-core-technology.php" class="navbar__dropdown-link navbar__dropdown-link--active">Core Technology</a></li>
                <li><a href="medical-device-division-pipeline.php" class="navbar__dropdown-link">Pipeline</a></li>
                <li><a href="medical-device-division-product.php" class="navbar__dropdown-link">Products</a></li>
              </ul>
            </div>
          </div>
        </li>

        <!-- IR & News -->
        <li class="navbar__menu-item navbar__menu-item--has-dropdown">
          <a href="ir-news-pressreleases.php" class="navbar__menu-link">IR &amp; News</a>
          <div class="navbar__dropdown">
            <div class="navbar__dropdown-container">
              <div class="navbar__dropdown-info">
                <p class="navbar__dropdown-title">IR &amp; News</p>
                <p class="navbar__dropdown-desc">Stay informed with the latest news, press releases, and investor relations updates from NIBEC.</p>
              </div>
              <ul class="navbar__dropdown-links">
                <li><a href="ir-news-pressreleases.php" class="navbar__dropdown-link navbar__dropdown-link--active">Press Releases</a></li>
                <li><a href="ir-new-notice.php" class="navbar__dropdown-link">Notice</a></li>
                <li><a href="ir-news-businessreport.php" class="navbar__dropdown-link">Business Report</a></li>
                <li><a href="ir-news-analyst-report.php" class="navbar__dropdown-link">Analyst Report</a></li>
              </ul>
            </div>
          </div>
        </li>

        <!-- Contact (No dropdown) -->
        <li class="navbar__menu-item">
          <a href="contact.php" class="navbar__menu-link">Contact</a>
        </li>
      </ul>
    </div>
  </nav>
</header>

<script>
// 드롭다운 하위 메뉴 위치 동적 계산
document.addEventListener('DOMContentLoaded', function() {
  const dropdownItems = document.querySelectorAll('.navbar__menu-item--has-dropdown');
  const navbarMain = document.querySelector('.navbar__main');

  dropdownItems.forEach(function(item) {
    item.addEventListener('mouseenter', function() {
      const menuLink = this.querySelector('.navbar__menu-link');
      const dropdownLinks = this.querySelector('.navbar__dropdown-links');

      if (menuLink && dropdownLinks && navbarMain) {
        const linkRect = menuLink.getBoundingClientRect();
        const navbarRect = navbarMain.getBoundingClientRect();

        // 상위 메뉴 링크의 왼쪽 위치에 맞춰 하위 메뉴 위치 설정
        dropdownLinks.style.left = (linkRect.left - navbarRect.left) + 'px';
      }
    });
  });
});
</script>
