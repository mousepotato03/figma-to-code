<section class="news-list-section">
  <div class="news-list-container">
    <!-- 헤더: 제목 + 검색 -->
    <div class="news-list-header">
      <div class="news-list-title-wrap">
        <h2 class="news-list-title">공지사항</h2>
      </div>
      <div class="news-list-search">
        <div class="search-select">
          <select class="search-condition">
            <option value="">검색 조건</option>
            <option value="title">제목</option>
            <option value="content">내용</option>
          </select>
          <img src="assets/icons/arrow-down.svg" alt="" class="select-arrow" aria-hidden="true">
        </div>
        <input type="text" class="search-input" placeholder="">
        <button type="button" class="search-btn">조회</button>
      </div>
    </div>

    <!-- 테이블 -->
    <div class="news-table">
      <!-- 테이블 헤더 -->
      <div class="news-table-header">
        <span class="col-num">번호</span>
        <span class="col-title">제목</span>
        <span class="col-views">조회수</span>
        <span class="col-date">등록일</span>
      </div>

      <!-- 테이블 바디 -->
      <a href="#" class="news-table-row">
        <span class="col-num">99</span>
        <div class="col-title-wrap">
          <span class="col-title-text">회사 문의사항에 대한 안내</span>
        </div>
        <span class="col-views">84</span>
        <span class="col-date">2025-12-10</span>
      </a>

      <a href="#" class="news-table-row">
        <span class="col-num">99</span>
        <div class="col-title-wrap">
          <span class="col-title-text">NIBEC 12월 정기 IR 개최 안내</span>
        </div>
        <span class="col-views">84</span>
        <span class="col-date">2025-12-10</span>
      </a>

      <a href="#" class="news-table-row">
        <span class="col-num">99</span>
        <div class="col-title-wrap">
          <span class="col-title-text truncate">[대표이사 인사말] 2024년 한 해 동안 나이벡을 아끼고 성원해 주신 주주 여러분께 진심으로 감사 드립니다.</span>
        </div>
        <span class="col-views">84</span>
        <span class="col-date">2025-12-10</span>
      </a>

      <a href="#" class="news-table-row">
        <span class="col-num">99</span>
        <div class="col-title-wrap">
          <span class="col-title-text">제 21기 정기 주주총회 대표이사 인사말</span>
        </div>
        <span class="col-views">84</span>
        <span class="col-date">2025-12-10</span>
      </a>

      <a href="#" class="news-table-row">
        <span class="col-num">99</span>
        <div class="col-title-wrap">
          <span class="col-title-text">[공고정정] 신주발행 및 주식명의개서정지 공고</span>
        </div>
        <span class="col-views">84</span>
        <span class="col-date">2025-12-10</span>
      </a>

      <a href="#" class="news-table-row">
        <span class="col-num">99</span>
        <div class="col-title-wrap">
          <span class="col-title-text">[공고] 신주발행 및 주식명의 개서정지 공고</span>
        </div>
        <span class="col-views">84</span>
        <span class="col-date">2025-12-10</span>
      </a>

      <a href="#" class="news-table-row">
        <span class="col-num">99</span>
        <div class="col-title-wrap">
          <span class="col-title-text">주주님들께 드리는 감사의 글</span>
        </div>
        <span class="col-views">84</span>
        <span class="col-date">2025-12-10</span>
      </a>

      <a href="#" class="news-table-row">
        <span class="col-num">99</span>
        <div class="col-title-wrap">
          <span class="col-title-text">[공고] 신주발행가액 확정공고</span>
        </div>
        <span class="col-views">84</span>
        <span class="col-date">2025-12-10</span>
      </a>
    </div>

    <!-- 페이지네이션 -->
    <nav class="pagination" aria-label="페이지 네비게이션">
      <button type="button" class="page-btn page-prev" aria-label="이전 페이지">&lt;</button>
      <button type="button" class="page-btn page-num active" aria-current="page">1</button>
      <button type="button" class="page-btn page-num">2</button>
      <button type="button" class="page-btn page-num">3</button>
      <button type="button" class="page-btn page-num">4</button>
      <span class="page-ellipsis">...</span>
      <button type="button" class="page-btn page-num">40</button>
      <button type="button" class="page-btn page-next" aria-label="다음 페이지">&gt;</button>
    </nav>
  </div>
</section>
