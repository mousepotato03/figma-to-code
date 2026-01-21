<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>drug-discovery-core-technology</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/drug-discovery-core-technology.css">
</head>
<body>
  <!-- Fixed Top: Main Navbar -->
  <?php include_once 'includes/navbar.php'; ?>

  <main class="page-drug-discovery-core-technology">
    <!-- flow-1: Header Section (id: header-section) -->
    <section class="header-section">
      <div class="header-title-area">
        <div class="header-title-wrapper">
          <div class="title-accent-bar"></div>
          <h1 class="header-main-title">펩타이드 혁신, 치료 과학의 새로운 기준</h1>
        </div>
      </div>

      <div class="header-visual-area">
        <div class="visual-background-layer">
          <img src="assets/images/drug-discovery-core-technology/123402.png" alt="" class="bg-pattern-image" aria-hidden="true">
        </div>
        <div class="dna-structure-wrapper">
          <div class="dna-structure-container">
            <img src="assets/images/drug-discovery-core-technology/dna-structure.png" alt="" class="dna-image" aria-hidden="true">
            <img src="assets/images/drug-discovery-core-technology/dna-structure-overlay.png" alt="" class="dna-image-overlay" aria-hidden="true">
          </div>
        </div>
        <div class="blur-effect-layer"></div>
        <div class="gradient-overlay-1"></div>
        <div class="gradient-overlay-2"></div>
        <div class="header-description">
          <p>나이벡은 증상 완화가 아닌 질환의 근본 원인을 분자 수준에서</p>
          <p>타깃으로 하는 신약을 개발합니다.</p>
          <p>우리의 펩타이드 기술은 의학 연구를 정밀 치료제로 전환합니다.</p>
        </div>
      </div>
    </section>

    <!-- flow-2: Navbar Index (id: navbar-index) -->
    <?php include_once 'includes/navbar_index.php'; ?>

    <!-- flow-3: Peptide Discovery Section (id: peptide-discovery-section) -->
    <section class="peptide-discovery-section">
      <div class="peptide-discovery-container">
        <!-- Header -->
        <div class="peptide-header">
          <h2 class="peptide-title">질환의 근원을 제어하는 펩타이드 디스커버리</h2>
          <p class="peptide-description">
            나이벡의 펩타이드 발굴 플랫폼은 환자 조직 빅데이터와 독자적인 파지 디스플레이(Phage Display) 기술을 결합하여, <br>
            난치성 질환의 핵심 타겟을 정밀하게 찾아냅니다. 우리는 질환의 원인에 직접 작용하는 최적의 신약 후보물질을 설계합니다.
          </p>
        </div>

        <!-- Tabs Component -->
        <div class="peptide-tabs-component">
          <!-- Tabs Menu -->
          <div class="peptide-tabs-menu">
            <div class="peptide-tab-item active" data-tab="target-discovery">
              <h3 class="tab-title active">정밀 타겟 발굴 시스템</h3>
              <p class="tab-content">환자 조직 빅데이터를 기반으로 구축한 질환 모델에 독자적인 파지 디스플레이(Phage Display) 기술을 적용했습니다. 이를 통해 질환을 유발하는 핵심 타겟을 정확히 찾아내고, 이에 강력하게 결합하는 최적의 펩타이드 후보군을 선별합니다.</p>
            </div>
            <div class="peptide-tab-item" data-tab="peptide-library">
              <h3 class="tab-title">방대한 펩타이드 라이브러리</h3>
            </div>
            <div class="peptide-tab-item" data-tab="dual-control">
              <h3 class="tab-title">세포 내·외 이중 제어 기전</h3>
            </div>
            <div class="peptide-tab-item" data-tab="safety">
              <h3 class="tab-title">기존 치료제를 넘어서는 안전성</h3>
            </div>
          </div>

          <!-- Tabs Content -->
          <div class="peptide-tabs-content">
            <div class="tabs-image-wrapper">
              <img src="assets/images/drug-discovery-core-technology/deiteo-jeonsong-gwa-dijiteol-haengseong-ui-3d-illeoseuteu-1.png" alt="데이터 전송과 디지털 행성의 3D 일러스트레이션" class="tabs-image">
              <div class="tabs-image-overlay"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- flow-4: PEPTARDEL Platform Section (id: peptardel-platform-section) -->
    <section class="peptardel-platform-section">
      <div class="peptardel-platform-header">
        <h2 class="peptardel-platform-title">PEPTARDEL 플랫폼 - 3가지 정밀 펩타이드 전달 기술</h2>
        <div class="peptardel-platform-description">
          <p>PEPTARDEL은 약물의 체내 안정성과 효능을 극대화하는 지속형·국소 전달 기술을 통합한 플랫폼입니다.</p>
          <p>분자 수준의 정밀 제어를 통해 목표 조직에 정확하게 작용하며, 치료 효과를 장기간 유지합니다.</p>
        </div>
      </div>

      <div class="peptardel-cards-row">
        <!-- PEPTARDEL-T Card -->
        <article class="peptardel-card">
          <div class="peptardel-card-image peptardel-card-image--rotated">
            <img src="assets/images/drug-discovery-core-technology/dna-representation-concept-1.png" alt="DNA representation concept" loading="lazy">
          </div>
          <div class="peptardel-card-content">
            <h3 class="peptardel-card-title">PEPTARDEL-T</h3>
            <p class="peptardel-card-description">
              표적 세포막을 투과함과 동시에<br>
              long-acting 할 수 있는 One Body<br>
              펩타이드 전달체
            </p>
          </div>
        </article>

        <!-- PEPTARDEL-S Card -->
        <article class="peptardel-card">
          <div class="peptardel-card-image">
            <img src="assets/images/drug-discovery-core-technology/alaelo-tteol-eojineun-balg-eun-nogsaeg-ingkeu-bang-ul-1.png" alt="Green ink drop" loading="lazy">
          </div>
          <div class="peptardel-card-content">
            <h3 class="peptardel-card-title">PEPTARDEL-S</h3>
            <p class="peptardel-card-description">
              약효지속 시간과 체내 전달체<br>
              잔류 속도까지 고려한 최적의 주사제
            </p>
          </div>
        </article>

        <!-- PEPTARDEL-O Card -->
        <article class="peptardel-card">
          <div class="peptardel-card-image peptardel-card-image--capsules">
            <img src="assets/images/drug-discovery-core-technology/a-device.png" alt="Device" class="device-image" loading="lazy">
            <img src="assets/images/drug-discovery-core-technology/transparent-green-capsules-1.png" alt="Green capsules" class="capsules-image" loading="lazy">
          </div>
          <div class="peptardel-card-content">
            <h3 class="peptardel-card-title">PEPTARDEL-O</h3>
            <p class="peptardel-card-description">
              맞춤형 경구제형으로 국소 체류 시간을<br>
              연장하고, 안정적인 혈중 농도를<br>
              유지하는 지속형 제제
            </p>
          </div>
        </article>
      </div>
    </section>

    <!-- flow-5: PEPTARDEL-T Section (id: peptardel-t-section) -->
    <section class="peptardel-t-section">
      <div class="peptardel-t-container">
        <!-- Header -->
        <div class="peptardel-t-header">
          <h2 class="peptardel-t-title">PEPTARDEL-T : Targeted delivery 구현</h2>
          <p class="peptardel-t-description">표적 세포막을 투과함과 동시에 long-acting 할 수 있는 One Body 펩타이드 전달체, PEPTARDEL-T는 나이벡이 독자적으로 개발한 차세대 펩타이드 기반 약물전달 플랫폼(Drug Delivery System, DDS)으로, 치료 물질이 표적 부위에 보다 효과적으로 도달하고 작용할 수 있도록 설계된 기술입니다.</p>
        </div>

        <!-- Three Columns -->
        <div class="peptardel-t-cards">
          <!-- Column 1 -->
          <div class="peptardel-t-card">
            <div class="peptardel-t-card-image">
              <div class="peptardel-t-illustration peptardel-t-illustration-1">
                <!-- Illustration placeholder -->
              </div>
            </div>
            <div class="peptardel-t-card-content">
              <h3 class="peptardel-t-card-heading">Heading</h3>
              <p class="peptardel-t-card-text">Text</p>
            </div>
          </div>

          <!-- Arrow 1 -->
          <div class="peptardel-t-arrow">
            <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
              <polygon points="0,17.5 35,0 35,35" fill="currentColor"/>
            </svg>
          </div>

          <!-- Column 2 -->
          <div class="peptardel-t-card">
            <div class="peptardel-t-card-image">
              <div class="peptardel-t-illustration peptardel-t-illustration-2">
                <!-- Illustration placeholder -->
              </div>
            </div>
            <div class="peptardel-t-card-content">
              <h3 class="peptardel-t-card-heading">Heading</h3>
              <p class="peptardel-t-card-text">Text</p>
            </div>
          </div>

          <!-- Arrow 2 -->
          <div class="peptardel-t-arrow">
            <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
              <polygon points="0,17.5 35,0 35,35" fill="currentColor"/>
            </svg>
          </div>

          <!-- Column 3 -->
          <div class="peptardel-t-card">
            <div class="peptardel-t-card-image">
              <div class="peptardel-t-illustration peptardel-t-illustration-3">
                <!-- Illustration placeholder -->
              </div>
            </div>
            <div class="peptardel-t-card-content">
              <h3 class="peptardel-t-card-heading">Heading</h3>
              <p class="peptardel-t-card-text">Text</p>
            </div>
          </div>
        </div>

        <!-- Bottom Content -->
        <div class="peptardel-t-bottom">
          <div class="peptardel-t-bottom-image"></div>
          <p class="peptardel-t-bottom-text">이 시스템은 펩타이드의 높은 생체적합성과 정밀한 결합 특성을 활용하여 약물의 안정성, 효율성, 전달력을 향상시키는 데 중점을 두고 있으며, 기존 치료 방식의 한계를 보완하고 새로운 치료 가능성을 확장하는 핵심 기술로 활용되고 있습니다. 이를 통해 나이벡은 치료 효과를 극대화하고 부작용은 최소화할 수 있는 보다 정밀하고 진보된 치료 솔루션을 구현하고 있습니다.</p>
        </div>
      </div>
    </section>

    <!-- flow-6: PEPTARDEL-S Section (id: peptardel-s-section) -->
    <section class="peptardel-s-section">
      <div class="peptardel-s-header">
        <h2 class="peptardel-s-title">PEPTARDEL-S : 펩타이드 지속형 약물전달 플랫폼</h2>
        <div class="peptardel-s-description">
          <p class="peptardel-s-description-bold">상용화된 기술에서 한 단계 진보한 차세대 약물전달 플랫폼 : 약효지속 시간과 체내 전달체 잔류 속도까지 고려한 최적의 주사제,</p>
          <p><span class="peptardel-s-highlight">PEPTARDEL-S</span>는 나이벡이 개발한 주사형 펩타이드 전달 최적화 시스템으로,</p>
          <p>약효의 지속 시간과 체내 전달체의 잔류 속도까지 정밀하게 설계된 약물전달 플랫폼입니다.</p>
        </div>
      </div>

      <div class="peptardel-s-row">
        <div class="peptardel-s-diagram">
          <div class="diagram-label peptide-label">
            <p>펩타이드</p>
            <p>+</p>
            <p>안정화제</p>
          </div>
          <div class="diagram-label polymer-label">고분자</div>
          <div class="diagram-label fluidized-label">
            <p>Fluidized solid</p>
            <p>(미립자)</p>
          </div>
          <div class="diagram-label microsphere-label">
            <p>미립구(Microsphere)</p>
            <p>완성</p>
          </div>
          <div class="diagram-label release-label">생체내 지속형 방출</div>
          <div class="diagram-label peptardel-label">
            <p>피하주사용</p>
            <p>Peptardel</p>
          </div>
          <img src="assets/images/drug-discovery-core-technology/1.svg" alt="Process diagram" class="diagram-main-image">
        </div>

        <div class="peptardel-s-chart">
          <div class="chart-y-label">
            <p>Amount of</p>
            <p>released</p>
          </div>
          <div class="chart-container">
            <p class="chart-title">Hydrogel</p>
            <div class="chart-logo">
              <img src="assets/images/drug-discovery-core-technology/image-45.png" alt="Logo">
            </div>
            <div class="chart-graph">
              <div class="chart-y-axis">
                <span>2500</span>
                <span>2000</span>
                <span>1500</span>
                <span>1000</span>
                <span>500</span>
              </div>
              <div class="chart-grid">
                <img src="assets/images/drug-discovery-core-technology/group22.svg" alt="Grid line" class="grid-line-1">
                <img src="assets/images/drug-discovery-core-technology/group23.svg" alt="Grid line" class="grid-line-2">
                <img src="assets/images/drug-discovery-core-technology/vector5.svg" alt="Chart axis" class="chart-axis">
                <img src="assets/images/drug-discovery-core-technology/group24.svg" alt="Chart line" class="chart-line-1">
                <img src="assets/images/drug-discovery-core-technology/group25.svg" alt="Chart line" class="chart-line-2">
              </div>
              <div class="chart-x-axis">
                <span>0</span>
                <span>10</span>
                <span>20</span>
                <span>30</span>
                <span>40</span>
                <span>50</span>
                <span>60</span>
                <span>70</span>
                <span>80</span>
                <span>90</span>
              </div>
            </div>
            <p class="chart-x-label">Times (Day)</p>
            <div class="chart-legend">
              <div class="legend-item">
                <img src="assets/images/drug-discovery-core-technology/group26.svg" alt="90 days line">
                <span>90 days</span>
              </div>
              <div class="legend-item">
                <img src="assets/images/drug-discovery-core-technology/group27.svg" alt="30 days line">
                <span>30 days</span>
              </div>
              <div class="legend-item">
                <img src="assets/images/drug-discovery-core-technology/group29.svg" alt="14 days line">
                <span>14 days</span>
              </div>
              <div class="legend-item">
                <img src="assets/images/drug-discovery-core-technology/group30.svg" alt="7 days line">
                <span>7 days</span>
              </div>
            </div>
            <div class="chart-logo-small">
              <img src="assets/images/drug-discovery-core-technology/image-45.png" alt="Logo">
            </div>
          </div>
        </div>
      </div>

      <div class="peptardel-s-footer">
        <p>펩타이드의 구조적 특성과 약물 방출 속도를 동시에 고려한 제형 기술을 통해 치료 효과가 필요한 시간 동안 안정적으로 유지되도록 설계되었으며, 체내에서의 불필요한 축적이나 급격한 소실을 최소화함으로써 안정성과 효율성을 동시에 향상시킵니다.</p>
        <p>&nbsp;</p>
        <p>이를 통해 나이벡은 보다 정밀하고 예측 가능한 치료 환경을 구현하며, 신약 개발과 고기능성 치료제 영역에서 경쟁력을 강화하고 있습니다.</p>
      </div>
    </section>

    <!-- flow-7: PEPTARDEL-O Section (id: peptardel-o-section) -->
    <section class="peptardel-o-section">
      <div class="peptardel-o-header">
        <h2 class="peptardel-o-title">PEPTARDEL-O : 대장표적용 경구제형</h2>
        <div class="peptardel-o-description">
          <p><strong>맞춤형 경구제형 플랫폼을 통한 1) 국소체류지속 및 2) 혈중농도 지속형 제제, PEPTARDEL-O</strong>는</p>
          <p>나이벡이 개발한 맞춤형 경구제형 기반 펩타이드 전달 플랫폼으로, 경구 투여 시 약물의 국소 체류 시간과</p>
          <p>혈중 농도 유지를 동시에 고려하여 설계된 기술입니다.</p>
        </div>
      </div>

      <div class="peptardel-o-content">
        <div class="peptardel-o-column">
          <div class="process-sidebar"></div>

          <div class="process-steps">
            <!-- Step 1: API 안정화제 -->
            <div class="process-step">
              <p class="step-title">API 안정화제</p>
              <div class="step-image">
                <img src="assets/images/drug-discovery-core-technology/Group.png" alt="API 안정화제">
              </div>
            </div>

            <!-- Arrow 1 -->
            <div class="process-arrow">
              <img src="assets/images/drug-discovery-core-technology/Vector.svg" alt="arrow" class="arrow-icon">
              <span class="arrow-label">캡슐 충전</span>
            </div>

            <!-- Step 2: Uncoated capsule -->
            <div class="process-step">
              <p class="step-subtitle">Uncoated capsule</p>
              <div class="step-image capsule-images">
                <img src="assets/images/drug-discovery-core-technology/Group1.png" alt="Uncoated capsule" class="capsule-top">
                <img src="assets/images/drug-discovery-core-technology/Group2.png" alt="Capsule shadow" class="capsule-shadow">
              </div>
            </div>

            <!-- Arrow 2 -->
            <div class="process-arrow">
              <img src="assets/images/drug-discovery-core-technology/Vector.svg" alt="arrow" class="arrow-icon">
              <span class="arrow-label-multi">
                <span>Enteric</span>
                <span>Coating</span>
              </span>
            </div>

            <!-- Step 3: 최종 경구 제형 -->
            <div class="process-step">
              <p class="step-title">최종 경구 제형</p>
              <div class="step-image final-capsule-images">
                <img src="assets/images/drug-discovery-core-technology/Group3.png" alt="최종 경구 제형" class="final-capsule">
                <img src="assets/images/drug-discovery-core-technology/Group4.png" alt="Capsule shadow" class="final-shadow">
              </div>
            </div>
          </div>
        </div>

        <div class="peptardel-o-info">
          <div class="info-gradient-bg">
            <img src="assets/images/drug-discovery-core-technology/Frame48.png" alt="PEPTARDEL-O illustration" class="info-image">
          </div>
          <div class="info-text">
            <p>소화 환경에서도 펩타이드의 <strong>안정성</strong>을 확보하고,</p>
            <p>유효 성분이 표적 부위에 보다 오래 머무르도록 제어함으로써</p>
            <p><strong>치료 효과를 지속적으로 발휘</strong>할 수 있도록 지원합니다.</p>
            <p>&nbsp;</p>
            <p>또한 약물 흡수율과 <strong>생체이용률을 향상시키는 구조로</strong> 설계되어,</p>
            <p>주사제에 의존하지 않고도 효율적인 치료가 가능하도록 돕는</p>
            <p>차세대 경구용 펩타이드 전달 시스템입니다.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- flow-8: Footer (id: footer) -->
    <?php include_once 'includes/footer.php'; ?>
  </main>

  <!-- Scripts -->
  <script src="js/common.js"></script>
</body>
</html>
