<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>drug-discovery-division-pipeline</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/drug-discovery-division-pipeline.css">
</head>
<body>
  <!-- Fixed Top: Main Navbar -->
  <?php include_once 'includes/navbar.php'; ?>

  <main class="page-drug-discovery-division-pipeline">
    <!-- flow-1: Header Section (id: header-section) -->
    <section class="header-section">
      <div class="header-title-area">
        <div class="header-title-wrapper">
          <div class="title-accent-bar"></div>
          <h1 class="header-title">글로벌 혁신 신약 파이프라인</h1>
        </div>
      </div>

      <div class="header-visual-area">
        <div class="visual-bg-layer">
          <img
            src="assets/images/drug-discovery-division-pipeline/beullue-golib-doen-geulim-dna-gujo.png"
            alt=""
            class="bg-dna-structure"
          />
        </div>
        <div class="visual-dna-right">
          <img
            src="assets/images/drug-discovery-division-pipeline/susja-1i-issneun-nogsaeg-dna-gadag.png"
            alt=""
            class="dna-strand-img"
          />
        </div>
        <div class="visual-dna-left">
          <img
            src="assets/images/drug-discovery-division-pipeline/susja-1i-issneun-nogsaeg-dna-gadag.png"
            alt=""
            class="dna-strand-img blurred"
          />
        </div>
        <div class="visual-blur-overlay"></div>
        <div class="visual-gradient-overlay"></div>
        <div class="visual-green-gradient"></div>
        <p class="header-description">
          정밀한 펩타이드 치료제를 통해<br>
          질병의 분자 기전을 재프로그래밍하고 지속 가능한 임상적 효과를 실현합니다.
        </p>
      </div>
    </section>

    <!-- flow-2: Navbar Index (서브 네비게이션) (id: navbar-index) -->
    <?php include_once 'includes/navbar_index.php'; ?>

    <!-- flow-3: Stats Section (타겟 적응증, 연구개발 투자규모) (id: stats-section) -->
    <section class="stats-section">
      <div class="stats-container">
        <!-- 타겟 적응증 카드 -->
        <div class="stats-card">
          <div class="stats-card-label">
            <div class="stats-icon-wrapper">
              <img src="assets/icons/group-menu.svg" alt="" class="stats-icon">
            </div>
            <p class="stats-label-text">타겟 적응증</p>
          </div>
          <div class="stats-card-value">
            <div class="stats-bg-image" style="background-image: url('assets/images/drug-discovery-division-pipeline/frame-156.jpg');"></div>
            <div class="stats-overlay"></div>
            <p class="stats-number">9+</p>
          </div>
        </div>

        <!-- 연구개발 투자규모 카드 -->
        <div class="stats-card">
          <div class="stats-card-label">
            <div class="stats-icon-wrapper">
              <img src="assets/icons/layer-x0020-1.svg" alt="" class="stats-icon">
            </div>
            <p class="stats-label-text">연구개발 투자규모</p>
          </div>
          <div class="stats-card-value">
            <div class="stats-bg-image" style="background-image: url('assets/images/drug-discovery-division-pipeline/frame-157.jpg');"></div>
            <div class="stats-overlay"></div>
            <p class="stats-number"><span class="stats-number-main">45</span><span class="stats-number-unit">억</span></p>
          </div>
        </div>
      </div>
    </section>

    <!-- flow-4: Pipeline Section (파이프라인 목록) (id: pipeline-section) -->
    <section class="pipeline-list-section">
      <div class="pipeline-list-container">

        <!-- Pipeline Item 1: 섬유증 치료제 -->
        <article class="pipeline-item">
          <div class="pipeline-title-col">
            <h3 class="pipeline-title">섬유증 치료제</h3>
          </div>
          <div class="pipeline-content-col">
            <div class="pipeline-phases">
              <div class="pipeline-header">
                <div class="phase-label-indication">
                  <span>POTENTIAL</span>
                  <span>INDICATION</span>
                </div>
                <span class="phase-label">Preclinical</span>
                <span class="phase-label">PHASE 1</span>
                <span class="phase-label">PHASE 2</span>
                <span class="phase-label">PHASE 3</span>
                <span class="phase-label">Registration</span>
              </div>
              <div class="pipeline-divider">
                <img src="assets/images/drug-discovery-division-pipeline/pipeline-divider.svg" alt="">
              </div>
              <div class="pipeline-row">
                <span class="indication-name">섬유종</span>
                <span class="phase-bar active"></span>
                <span class="phase-bar active"></span>
                <span class="phase-bar active"></span>
                <span class="phase-bar"></span>
                <span class="phase-bar"></span>
              </div>
              <div class="pipeline-row">
                <span class="indication-name">염증성 질환</span>
                <span class="phase-bar active"></span>
                <span class="phase-bar active"></span>
                <span class="phase-bar active"></span>
                <span class="phase-bar"></span>
                <span class="phase-bar"></span>
              </div>
            </div>
          </div>
          <button class="btn-more" aria-label="더 보기">
            <img src="assets/icons/btn-more-arrow.svg" alt="">
          </button>
        </article>

        <!-- Pipeline Item 2: 비만 및 대사 치료제 -->
        <article class="pipeline-item">
          <div class="pipeline-title-col">
            <h3 class="pipeline-title">
              <span class="title-main">비만 및</span>
              <span class="title-main">대사 치료제</span>
              <span class="title-sub">(NIPEP-AOP)</span>
            </h3>
          </div>
          <div class="pipeline-content-col">
            <div class="pipeline-phases">
              <div class="pipeline-header">
                <div class="phase-label-indication">
                  <span>POTENTIAL</span>
                  <span>INDICATION</span>
                </div>
                <span class="phase-label">Preclinical</span>
                <span class="phase-label">PHASE 1</span>
                <span class="phase-label">PHASE 2</span>
                <span class="phase-label">PHASE 3</span>
                <span class="phase-label">Registration</span>
              </div>
              <div class="pipeline-divider">
                <img src="assets/images/drug-discovery-division-pipeline/pipeline-divider.svg" alt="">
              </div>
              <div class="pipeline-row">
                <span class="indication-name">비만</span>
                <span class="phase-bar active"></span>
                <span class="phase-bar active"></span>
                <span class="phase-bar active"></span>
                <span class="phase-bar"></span>
                <span class="phase-bar"></span>
              </div>
              <div class="pipeline-row">
                <span class="indication-name">MASH</span>
                <span class="phase-bar active"></span>
                <span class="phase-bar active"></span>
                <span class="phase-bar active"></span>
                <span class="phase-bar"></span>
                <span class="phase-bar"></span>
              </div>
            </div>
          </div>
          <button class="btn-more btn-plus" aria-label="더 보기">
            <img src="assets/icons/plus-sign.svg" alt="">
          </button>
        </article>

        <!-- Pipeline Item 3: 근감소증 치료제 -->
        <article class="pipeline-item">
          <div class="pipeline-title-col">
            <h3 class="pipeline-title">
              <span class="title-main">근감소증 치료제</span>
              <span class="title-sub">(NIPEP-MUS)</span>
            </h3>
          </div>
          <div class="pipeline-content-col">
            <div class="pipeline-phases">
              <div class="pipeline-header">
                <div class="phase-label-indication">
                  <span>POTENTIAL</span>
                  <span>INDICATION</span>
                </div>
                <span class="phase-label">Preclinical</span>
                <span class="phase-label">PHASE 1</span>
                <span class="phase-label">PHASE 2</span>
                <span class="phase-label">PHASE 3</span>
                <span class="phase-label">Registration</span>
              </div>
              <div class="pipeline-divider">
                <img src="assets/images/drug-discovery-division-pipeline/pipeline-divider.svg" alt="">
              </div>
              <div class="pipeline-row">
                <span class="indication-name">노화에 의한 근감소증</span>
                <span class="phase-bar active"></span>
                <span class="phase-bar active"></span>
                <span class="phase-bar active"></span>
                <span class="phase-bar"></span>
                <span class="phase-bar"></span>
              </div>
            </div>
          </div>
          <button class="btn-more btn-plus" aria-label="더 보기">
            <img src="assets/icons/plus-sign.svg" alt="">
          </button>
        </article>

        <!-- Pipeline Item 4: 치주염 치료제 -->
        <article class="pipeline-item">
          <div class="pipeline-title-col">
            <h3 class="pipeline-title">
              <span class="title-main">치주염 치료제</span>
              <span class="title-sub">(NIPEP-PERIO)</span>
            </h3>
          </div>
          <div class="pipeline-content-col">
            <div class="pipeline-phases">
              <div class="pipeline-header">
                <div class="phase-label-indication">
                  <span>POTENTIAL</span>
                  <span>INDICATION</span>
                </div>
                <span class="phase-label">Preclinical</span>
                <span class="phase-label">PHASE 1</span>
                <span class="phase-label">PHASE 2</span>
                <span class="phase-label">PHASE 3</span>
                <span class="phase-label">Registration</span>
              </div>
              <div class="pipeline-divider">
                <img src="assets/images/drug-discovery-division-pipeline/pipeline-divider.svg" alt="">
              </div>
              <div class="pipeline-row">
                <span class="indication-name">치주염</span>
                <span class="phase-bar active"></span>
                <span class="phase-bar active"></span>
                <span class="phase-bar active"></span>
                <span class="phase-bar"></span>
                <span class="phase-bar"></span>
              </div>
              <div class="pipeline-row">
                <span class="indication-name">임플란트 주위염</span>
                <span class="phase-bar active"></span>
                <span class="phase-bar active"></span>
                <span class="phase-bar active"></span>
                <span class="phase-bar"></span>
                <span class="phase-bar"></span>
              </div>
            </div>
          </div>
          <button class="btn-more btn-plus" aria-label="더 보기">
            <img src="assets/icons/plus-sign.svg" alt="">
          </button>
        </article>

        <!-- Pipeline Item 5: 폐동맥 고혈압 치료제 -->
        <article class="pipeline-item pipeline-item-last">
          <div class="pipeline-title-col">
            <h3 class="pipeline-title">
              <span class="title-main">폐동맥</span>
              <span class="title-main">고혈압 치료제</span>
              <span class="title-sub">(NIPEP-PAH)</span>
            </h3>
          </div>
          <div class="pipeline-content-col">
            <div class="pipeline-phases">
              <div class="pipeline-header">
                <div class="phase-label-indication">
                  <span>POTENTIAL</span>
                  <span>INDICATION</span>
                </div>
                <span class="phase-label">Preclinical</span>
                <span class="phase-label">PHASE 1</span>
                <span class="phase-label">PHASE 2</span>
                <span class="phase-label">PHASE 3</span>
                <span class="phase-label">Registration</span>
              </div>
              <div class="pipeline-divider">
                <img src="assets/images/drug-discovery-division-pipeline/pipeline-divider.svg" alt="">
              </div>
              <div class="pipeline-row">
                <span class="indication-name">폐동맥</span>
                <span class="phase-bar active"></span>
                <span class="phase-bar active"></span>
                <span class="phase-bar active"></span>
                <span class="phase-bar"></span>
                <span class="phase-bar"></span>
              </div>
              <div class="pipeline-row">
                <span class="indication-name">고혈압</span>
                <span class="phase-bar active"></span>
                <span class="phase-bar active"></span>
                <span class="phase-bar active"></span>
                <span class="phase-bar"></span>
                <span class="phase-bar"></span>
              </div>
            </div>
          </div>
          <button class="btn-more btn-plus" aria-label="더 보기">
            <img src="assets/icons/plus-sign.svg" alt="">
          </button>
        </article>

      </div>
    </section>

    <!-- flow-5: Footer (id: footer) -->
    <?php include_once 'includes/footer.php'; ?>
  </main>

  <!-- Scripts -->
  <script src="js/common.js"></script>
</body>
</html>
