<section class="gs-visual gs-auto-slider" data-slider="hero" data-interval="5200">
    <div class="gs-visual-viewport">
        <div class="gs-visual-track">
            <div class="gs-visual-slide"><img src="<?= asset('img/hero-slide-01.jpg') ?>" alt="건축 공사 수량 산출 및 내역서 작성의 자존심"></div>
            <div class="gs-visual-slide"><img src="<?= asset('img/hero-slide-02.jpg') ?>" alt="공사비닷컴 공사비 검색 안내"></div>
            <div class="gs-visual-slide"><img src="<?= asset('img/hero-slide-03.jpg') ?>" alt="현장기술자를 위한 건축견적이야기"></div>
            <div class="gs-visual-slide"><img src="<?= asset('img/hero-slide-04.jpg') ?>" alt="CON COST 바로가기"></div>
        </div>
    </div>
</section>

<section class="gs-business">
    <h2>Business</h2>
    <div class="gs-business-list">
        <article>
            <img src="<?= asset('img/biz-search.jpg') ?>" alt="공사비 검색">
            <h3>공사비 검색</h3>
            <p>대한민국 건물의 건물종류별, 지역별, 면적별, 연도별 면적당 공사비를 검색합니다.</p>
            <a href="/front/data/gongsabi"><i>→</i> MORE VIEW</a>
        </article>
        <article>
            <img src="<?= asset('img/biz-report.jpg') ?>" alt="내역서 작성">
            <h3>내역서 작성</h3>
            <p>건축 및 골조 내역서, 공사기간의 산정, 간접 공사비 계산 서비스를 제공합니다.</p>
            <a href="/front/report/geonchuk"><i>→</i> MORE VIEW</a>
        </article>
        <article>
            <img src="<?= asset('img/biz-edu.jpg') ?>" alt="공사비 교육">
            <h3>공사비 교육</h3>
            <p>건설공정에 이어지고재와 동영상 교육을 통한 건축 수량 산출 및 내역서 작성 전문 교육을 영상하는 교육입니다.</p>
            <a href="/front/education/lecture"><i>→</i> MORE VIEW</a>
        </article>
        <article>
            <img src="<?= asset('img/biz-market.jpg') ?>" alt="건설 장터">
            <h3>건설 장터</h3>
            <p>건설 현장 각 자재거래와 구인·구직 등 건설인의 정보공터 입니다.</p>
            <a href="/front/community/market"><i>→</i> MORE VIEW</a>
        </article>
    </div>
</section>

<section class="gs-mid-panel">
    <div class="gs-quick-grid">
        <a href="/front/education/lecture_regist"><b class="ico pc"></b><span>교육 요청</span></a>
        <a class="blue" href="/front/customer/contact"><b class="ico doc"></b><span>업무 제휴</span></a>
        <a class="dark" href="/front/community/recruit"><b class="ico group"></b><span>인재 채용</span></a>
        <a class="light" href="/front/customer/qna"><b class="ico book"></b><span>견적 요청</span></a>
    </div>
    <div class="gs-contact-boxes">
        <article>
            <h3>대표 전화</h3>
            <p class="tel"><span>☎</span> 02. 2202. 2258</p>
            <p class="tel"><span>▣</span> 02. 2202. 2259</p>
        </article>
        <article>
            <h3>고객센터</h3>
            <p class="help"><span>▣</span> 24시간 접수가능</p>
            <small>고객님의 문의와 건의사항을<br>친절하게 답변드립니다.</small>
        </article>
    </div>
    <article class="gs-notice-box">
        <div class="gs-notice-head"><h3>공지사항</h3><a href="/front/customer/notice">＋</a></div>
        <ul>
            <li><a href="/front/customer/notice_view/1">특허청 상표등록증을 획득하였습니다.</a><span>2021-03-10</span></li>
            <?php foreach (array_slice($notices ?? [], 0, 3) as $notice): ?>
                <li><a href="/front/customer/notice_view/<?= e($notice['id']) ?>"><?= e($notice['title']) ?></a><span><?= e(substr((string) $notice['created_at'], 0, 10)) ?></span></li>
            <?php endforeach; ?>
            <li><a href="/front/customer/notice">건축컨설팅의 출발점은...</a><span>2020-11-27</span></li>
        </ul>
    </article>
</section>

<section class="gs-banner-wrap gs-banner-slider" data-slider="banner" data-interval="4800">
    <button type="button" class="gs-banner-prev" aria-label="이전">‹</button>
    <div class="gs-banner-viewport">
        <div class="gs-banner-track">
            <div class="gs-banner-slide"><img src="<?= asset('img/bottom-slide-01.jpg') ?>" alt="건영기술단 배너"></div>
            <div class="gs-banner-slide"><img src="<?= asset('img/bottom-slide-02.jpg') ?>" alt="강릉건설 배너"></div>
            <div class="gs-banner-slide"><img src="<?= asset('img/bottom-slide-03.jpg') ?>" alt="협력사 배너"></div>
            <div class="gs-banner-slide"><img src="<?= asset('img/bottom-slide-04.jpg') ?>" alt="건축사사무소 배너"></div>
        </div>
    </div>
    <button type="button" class="gs-banner-next" aria-label="다음">›</button>
</section>
