<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>medical-device-division-product</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/medical-device-division-product.css">
</head>
<body>
  <!-- Fixed Top: Main Navbar -->
  <?php include_once 'includes/navbar.php'; ?>

  <main class="page-medical-device-division-product">
    <!-- flow-1: Header Section (id: header-section) -->
    <section class="header-section">
      <!-- Header Title Area -->
      <div class="header-title-area">
        <div class="title-wrapper">
          <div class="title-accent-bar"></div>
          <h1 class="header-title">펩타이드 기반 의료 솔루션</h1>
        </div>
      </div>

      <!-- Visual Banner Area -->
      <div class="header-visual-area">
        <!-- Background gradient -->
        <div class="visual-bg-gradient"></div>

        <!-- Background images with blur effects -->
        <div class="visual-bg-image visual-bg-image-1">
          <img src="assets/images/medical-device-division-product/close-up-blue-bottles-table-2.jpg" alt="" loading="lazy">
        </div>
        <div class="visual-bg-image visual-bg-image-2">
          <img src="assets/images/medical-device-division-product/closeup-medical-syringe-vials-1.jpg" alt="" loading="lazy">
        </div>
        <div class="visual-bg-image visual-bg-image-3">
          <img src="assets/images/medical-device-division-product/closeup-medical-syringe-vials-1.jpg" alt="" loading="lazy">
        </div>

        <!-- Overlay gradients -->
        <div class="visual-overlay visual-overlay-1"></div>
        <div class="visual-overlay visual-overlay-2"></div>

        <!-- Description text -->
        <p class="header-description">
          나이벡의 의료기기 제품군은 생리활성 펩타이드, 콜라겐 기반 바이오소재,<br>
          그리고 정밀 재생 공학을 융합하여 개발된 고기능 재생 솔루션입니다.
        </p>
      </div>
    </section>

    <!-- flow-2: Navbar Index (Sub Navigation) (id: navbar-index) -->
    <section class="navbar-index-sub-navigation">
      <nav class="breadcrumb-nav">
        <p class="breadcrumb-text">
          <span class="breadcrumb-parent">Medical Device Division > </span><span class="breadcrumb-current">Product</span>
        </p>
      </nav>
    </section>

    <!-- flow-3: Breadcrumb Navigation (id: breadcrumb-section) -->
    <nav class="breadcrumb-navigation" aria-label="제품 카테고리 필터">
      <ul class="breadcrumb-list">
        <li class="breadcrumb-item active">
          <a href="#" class="breadcrumb-link" data-filter="all">전체</a>
        </li>
        <li class="breadcrumb-item">
          <a href="#" class="breadcrumb-link" data-filter="peptide">펩타이드 기반 융합바이오</a>
        </li>
        <li class="breadcrumb-item">
          <a href="#" class="breadcrumb-link" data-filter="medicine">의약품</a>
        </li>
        <li class="breadcrumb-item">
          <a href="#" class="breadcrumb-link" data-filter="biomaterial">조직재생용 바이오소재</a>
        </li>
        <li class="breadcrumb-item">
          <a href="#" class="breadcrumb-link" data-filter="cosmetic">화장품</a>
        </li>
      </ul>
    </nav>

    <!-- flow-4: Product List Section (id: product-list-section) -->
    <section class="product-list-section">
      <!-- Product 1: OssGen-X 15 -->
      <article class="product-module">
        <div class="product-module__inner">
          <div class="product-module__info">
            <h3 class="product-module__title">OssGen-X 15</h3>
            <div class="product-module__subtitle-wrap">
              <p class="product-module__subtitle">펩타이드 함유 치과용 골 이식재</p>
            </div>
          </div>
          <button class="product-module__btn" aria-label="자세히 보기">
            <img src="assets/icons/plus-sign.svg" alt="" class="product-module__btn-icon">
          </button>
        </div>
      </article>

      <!-- Product 2: MinoCure -->
      <article class="product-module">
        <div class="product-module__inner">
          <div class="product-module__info">
            <h3 class="product-module__title">MinoCure</h3>
            <div class="product-module__subtitle-wrap">
              <p class="product-module__subtitle">치과용연고 (0.25g / 0.5g)</p>
            </div>
          </div>
          <div class="product-module__btn">
            <img src="assets/icons/plus-sign.svg" alt="" class="product-module__btn-icon">
          </div>
        </div>
      </article>

      <!-- Product 3: OCS-B Xenomatrix -->
      <article class="product-module">
        <div class="product-module__inner">
          <div class="product-module__info">
            <h3 class="product-module__title">OCS-B Xenomatrix</h3>
            <div class="product-module__subtitle-wrap">
              <p class="product-module__subtitle">이종골이식재</p>
            </div>
          </div>
          <div class="product-module__btn">
            <img src="assets/icons/plus-sign.svg" alt="" class="product-module__btn-icon">
          </div>
        </div>
      </article>

      <!-- Product 4: Equimatrix-collagen -->
      <article class="product-module">
        <div class="product-module__inner">
          <div class="product-module__info">
            <h3 class="product-module__title">Equimatrix-collagen</h3>
            <div class="product-module__subtitle-wrap">
              <p class="product-module__subtitle">골이식용 복합재료</p>
            </div>
          </div>
          <div class="product-module__btn">
            <img src="assets/icons/plus-sign.svg" alt="" class="product-module__btn-icon">
          </div>
        </div>
      </article>

      <!-- Product 5: GuidOss -->
      <article class="product-module">
        <div class="product-module__inner">
          <div class="product-module__info">
            <h3 class="product-module__title">GuidOss</h3>
            <div class="product-module__subtitle-wrap">
              <p class="product-module__subtitle">흡수성치주조직재생유도재</p>
            </div>
          </div>
          <div class="product-module__btn">
            <img src="assets/icons/plus-sign.svg" alt="" class="product-module__btn-icon">
          </div>
        </div>
      </article>

      <!-- Product 6: Dr. MyYou (Expanded) -->
      <article class="product-module product-module--expanded">
        <div class="product-module__inner">
          <div class="product-module__info">
            <h3 class="product-module__title">Dr. MyYou</h3>
            <div class="product-module__subtitle-wrap">
              <p class="product-module__subtitle">닥터마이유 에센스 / 크림 / 마스크</p>
            </div>
          </div>
          <div class="product-module__btn">
            <img src="assets/icons/plus-sign.svg" alt="" class="product-module__btn-icon">
          </div>
        </div>

        <div class="product-detail">
          <div class="product-detail__image-wrap">
            <div class="product-detail__image-container">
              <img src="assets/images/medical-device-division-product/image94.png" alt="Dr. MyYou 제품 이미지" class="product-detail__image">
            </div>
            <a href="#" class="product-detail__more-btn">
              <span class="product-detail__more-text">more Details</span>
              <img src="assets/icons/chevron-right.svg" alt="" class="product-detail__more-icon">
            </a>
          </div>

          <div class="product-detail__specs">
            <div class="product-detail__spec-row">
              <span class="product-detail__spec-label">핵심 성분</span>
              <ul class="product-detail__spec-list">
                <li>청정 제주 발효 마유 (Fermented Horse Oil)</li>
                <li>팔미토일 트라이펩타이드-5 (Palmitoyl Tripeptide-5)</li>
                <li>8가지 백색 꽃 추출물 (연꽃, 아이리스, 자스민, 릴리, 에델바이스, 장미, 프리지아, 수선화)</li>
              </ul>
            </div>

            <div class="product-detail__spec-row">
              <span class="product-detail__spec-label">제형 / 용량</span>
              <ul class="product-detail__spec-list">
                <li>닥터마이유 스킨 밸런싱 에센스 : 50ml / 고농축 플루이드 타입(50ml)</li>
                <li>닥터마이유 스킨 프로텍팅 크림 : 50ml (g) / 소프트 멜팅 크림 텍스처</li>
                <li>닥터마이유 스킨 프로텍팅 마스크 : 25ml x 5ea (1 Box) / 초극세사 시트</li>
              </ul>
            </div>

            <div class="product-detail__spec-row">
              <span class="product-detail__spec-label">주요 기능</span>
              <ul class="product-detail__spec-list">
                <li>미백 · 주름개선 2중 기능성</li>
                <li>[유수분 밸런스] 피부결 정돈 및 다음 단계 부스팅 효과</li>
                <li>[집중 영양 공급] 수분 보호막 형성 및 피부 장벽 강화</li>
              </ul>
            </div>

            <div class="product-detail__spec-row">
              <span class="product-detail__spec-label">특장점</span>
              <ul class="product-detail__spec-list">
                <li>고보습 영양막 (Premium Horse Oil) : 피부 깊숙이 침투하여 수분 증발을 막고 강력한 보습 보호막 형성</li>
                <li>탄력 강화 솔루션 (Peptide Complex) : 피부 탄력 저하를 방지하고, 느슨해진 피부 밀도를 촘촘하게 케어하여 생기 부여</li>
                <li>화이트 플라워 콤플렉스 (White Flower Complex 8) : 자극받은 피부를 진정시키고, 칙칙한 피부 톤을 맑고 화사하게 가꾸어 줌</li>
              </ul>
            </div>

            <div class="product-detail__spec-row">
              <span class="product-detail__spec-label">상품 정보<br>제공 고시</span>
              <ul class="product-detail__spec-list">
                <li>제조업자 : (주)나이벡 (NIBEC)</li>
                <li>제조국 : 대한민국 (Korea)</li>
                <li>피부타입 : 모든 피부용</li>
                <li>사용기한 : 제품 별도 표기</li>
              </ul>
            </div>
          </div>
        </div>
      </article>
    </section>

    <!-- flow-5: Footer (id: footer) -->
    <?php include_once 'includes/footer.php'; ?>
  </main>

  <!-- Scripts -->
  <script src="js/common.js"></script>
</body>
</html>
