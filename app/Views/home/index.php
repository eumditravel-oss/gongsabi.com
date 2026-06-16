<section class="hero">
    <div class="hero-inner">
        <div class="hero-copy">
            <span class="overline">Construction Cost Platform</span>
            <h1>공사비 데이터와<br>산정 보고서를 한 번에</h1>
            <p>면적당 공사비, 골조 공사비, 공사기간, 간접비 산정 흐름을 통합한 건설 원가 정보 플랫폼입니다.</p>
            <div class="hero-actions">
                <a class="btn primary" href="/front/report/geonchuk">공사비 보고서</a>
                <a class="btn ghost" href="/front/data/gongsabi">자료 검색</a>
            </div>
        </div>
        <div class="hero-visual">
            <?php if (!empty($siteSettings['hero_image_url'])): ?>
                <img src="<?= e($siteSettings['hero_image_url']) ?>" alt="공사비 서비스">
            <?php else: ?>
                <div class="hero-screen" aria-hidden="true">
                    <div class="browser"><span class="dot"></span><span class="dot"></span><span class="dot"></span></div>
                    <div class="metric-grid">
                        <div class="metric-card">
                            <span>면적당 공사비</span>
                            <strong>2,148,000</strong>
                            <span>원 / ㎡</span>
                            <div class="chart-bars"><i></i><i></i><i></i><i></i><i></i></div>
                        </div>
                        <div class="metric-card">
                            <span>예상 공사기간</span>
                            <strong>9.5</strong>
                            <span>개월</span>
                        </div>
                        <div class="metric-card">
                            <span>간접비율</span>
                            <strong>11.5%</strong>
                            <span>공사규모별 보정</span>
                        </div>
                    </div>
                </div>
                <div class="hero-estimate" aria-hidden="true">
                    <b>공사비 요약</b>
                    <dl>
                        <div><dt>직접공사비</dt><dd>7.09억</dd></div>
                        <div><dt>간접비</dt><dd>0.81억</dd></div>
                        <div><dt>총 공사비</dt><dd>8.69억</dd></div>
                    </dl>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="main-search" aria-label="공사비 빠른 검색">
    <div class="search-tabs">
        <a class="active" href="/front/data/gongsabi">공사비 자료</a>
        <a href="/front/report/geonchuk">건축 공사비</a>
        <a href="/front/report/goljo">골조 공사비</a>
        <a href="/front/report/gigan">공사기간</a>
    </div>
    <form class="search-panel" action="/front/data/gongsabi" method="get">
        <label>건물용도<select name="type"><option>근린생활시설</option><option>업무시설</option><option>공동주택</option><option>공장</option></select></label>
        <label>지역<select name="region"><option>서울</option><option>수도권</option><option>지방</option><option>제주</option></select></label>
        <label>구조<select name="structure"><option>철근콘크리트</option><option>철골조</option><option>목구조</option></select></label>
        <label>연면적<input type="number" name="area" placeholder="㎡ 입력"></label>
        <button class="btn primary" type="submit">검색</button>
    </form>
</section>

<?php if (!empty($siteSettings['ad_side_image_url'])): ?>
    <aside class="floating-ad">
        <a href="<?= e($siteSettings['ad_side_link_url'] ?: '#') ?>">
            <img src="<?= e($siteSettings['ad_side_image_url']) ?>" alt="측면 광고">
        </a>
    </aside>
<?php endif; ?>

<section class="quick-menu">
    <a href="/front/report/geonchuk"><i class="fa fa-file-invoice"></i><strong>건축 공사비</strong><span>용도·면적 기준 공사비 산정</span></a>
    <a href="/front/report/goljo"><i class="fa fa-building"></i><strong>골조 공사비</strong><span>구조별 골조 단가 검토</span></a>
    <a href="/front/report/gigan"><i class="fa fa-calendar-alt"></i><strong>공사기간</strong><span>공정 규모별 기간 예측</span></a>
    <a href="/front/report/ganjeob"><i class="fa fa-calculator"></i><strong>간접비</strong><span>규모별 간접공사비 계산</span></a>
</section>

<section class="section">
    <div class="section-head">
        <div>
            <p class="eyebrow">REPORT SERVICE</p>
            <h2>실무형 공사비 산정 서비스</h2>
            <p>입력값을 기준으로 공사비 구성, 간접비, 부가세, 예상 공사기간을 단계별로 확인합니다.</p>
        </div>
        <a class="text-link" href="/front/report/geonchuk">보고서 바로가기</a>
    </div>
    <div class="service-grid">
        <article class="service-card primary-card">
            <h3>공사비 보고서</h3>
            <p>면적·구조·마감·지역 조건을 조합하여 초기 사업성 검토용 산정 결과를 제공합니다.</p>
            <ul><li>직접공사비</li><li>층수 보정</li><li>간접비·부가세</li></ul>
        </article>
        <article class="service-card">
            <h3>공사기간 검토</h3>
            <p>연면적과 층수를 기준으로 공사기간을 빠르게 추정합니다.</p>
            <ul><li>규모 기준</li><li>층수 보정</li><li>월 단위 표시</li></ul>
        </article>
        <article class="service-card">
            <h3>간접비 산정</h3>
            <p>직접공사비에 연동되는 간접비 구조를 별도로 확인할 수 있습니다.</p>
            <ul><li>간접비율</li><li>부가세</li><li>총액 산정</li></ul>
        </article>
    </div>
</section>

<section class="data-showcase">
    <div class="data-layout">
        <div class="section-copy">
            <p class="eyebrow">DATA</p>
            <h2>면적당 공사비 검색</h2>
            <p>구조, 지역, 마감 등급 기준으로 공사비 자료를 정리하고 운영자가 단가와 보정률을 직접 관리할 수 있습니다.</p>
            <a class="text-link" href="/front/data/gongsabi">공사비 자료 보기</a>
        </div>
        <div class="data-panel">
            <div class="data-panel-head">
                <strong>최근 공사비 자료</strong>
                <div class="data-tags"><span>건축</span><span>골조</span><span>단가</span></div>
            </div>
            <table class="data-table">
                <thead><tr><th>분류</th><th>자료명</th><th>단위</th><th>단가</th></tr></thead>
                <tbody>
                    <tr><td>건축</td><td>철근콘크리트 표준형</td><td>㎡</td><td>1,850,000</td></tr>
                    <tr><td>골조</td><td>철골조 기본형</td><td>㎡</td><td>1,420,000</td></tr>
                    <tr><td>건축</td><td>고급 마감 보정</td><td>비율</td><td>1.22</td></tr>
                    <tr><td>지역</td><td>제주 지역 보정</td><td>비율</td><td>1.12</td></tr>
                </tbody>
            </table>
            <div class="data-more"><a class="btn" href="/front/data/gongsabi">전체 자료 검색</a></div>
        </div>
    </div>
</section>

<section class="edu-notice">
    <article class="edu-card">
        <p class="eyebrow">EDUCATION</p>
        <h2>공사비 교육</h2>
        <p>강의와 교재 상품을 등록하고, 결제 완료 후 이용 권한을 부여하는 흐름으로 확장됩니다.</p>
        <a class="btn primary" href="/front/education/lecture">교육 과정 보기</a>
        <div class="edu-icons"><span><i class="fa fa-play"></i></span><span><i class="fa fa-book"></i></span><span><i class="fa fa-chalkboard-teacher"></i></span></div>
    </article>
    <section class="notice-band">
        <div>
            <p class="eyebrow">NOTICE</p>
            <h2>공지사항</h2>
        </div>
        <ul>
            <?php foreach ($notices as $notice): ?>
                <li>
                    <a href="/front/customer/notice_view/<?= e($notice['id']) ?>"><?= e($notice['title']) ?></a>
                    <span><?= e(substr((string) $notice['created_at'], 0, 10)) ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</section>
