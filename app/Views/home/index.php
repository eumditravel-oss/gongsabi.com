<section class="main-visual">
    <div class="wrap main-visual-inner">
        <div class="visual-copy">
            <p class="visual-kicker">Construction Cost Information Platform</p>
            <h2>대한민국 건물의<br>면적당 공사비를 검색합니다.</h2>
            <p>건물종류별, 지역별, 면적별, 착공년도별 공사비 자료와 건축/골조 내역서, 공사기간 산정, 간접 공사비 계산 서비스를 제공합니다.</p>
            <div class="visual-buttons"><a href="/front/data/gongsabi">공사비 검색</a><a href="/front/education/lecture">교육 신청</a></div>
        </div>
        <div class="visual-card">
            <h3>공사비 빠른검색</h3>
            <form action="/front/data/gongsabi" method="get" class="mini-search">
                <label>건물의 종류<select name="building_type"><option value="office">업무시설</option><option value="housing">공동주택</option><option value="commercial">근린생활시설</option><option value="factory">공장</option></select></label>
                <label>지역<select name="region"><option value="seoul">서울</option><option value="gyeonggi">경기/인천</option><option value="local">지방</option><option value="jeju">제주</option></select></label>
                <label>연면적<input type="number" name="area" placeholder="㎡"></label>
                <label>착공년도<select name="year"><option>2026</option><option>2025</option><option>2024</option><option>2023</option><option>2022</option></select></label>
                <button type="submit">검색하기</button>
            </form>
        </div>
    </div>
</section>

<section class="wrap service-tiles">
    <a href="/front/report/geonchuk" class="service-tile"><i class="fa fa-building"></i><strong>건축 공사비</strong><span>비교할 수 있는 내역서 제공</span></a>
    <a href="/front/report/goljo" class="service-tile"><i class="fa fa-drafting-compass"></i><strong>골조 공사비</strong><span>골조 내역서 및 수량 검토</span></a>
    <a href="/front/report/gigan" class="service-tile"><i class="fa fa-calendar-check"></i><strong>공사기간의 산정</strong><span>규모 조건별 기간 산정</span></a>
    <a href="/front/report/ganjeob" class="service-tile"><i class="fa fa-calculator"></i><strong>간접 공사비 계산</strong><span>건물 종류별 간접비 계산</span></a>
</section>

<section class="wrap home-two-col">
    <div class="home-panel data-panel old-box">
        <div class="box-title"><h3>공사비 검색</h3><a href="/front/data/gongsabi">더보기</a></div>
        <p class="box-desc">건물의 종류 · 면적 · 지역 · 착공년도를 선택하시면 면적당 공사비 정보를 찾으실 수 있습니다.</p>
        <table class="basic-table small"><thead><tr><th>구분</th><th>서비스명</th><th>이용안내</th></tr></thead><tbody>
            <tr><td>DATA</td><td><a href="/front/data/gongsabi">면적당 공사비 검색</a></td><td>비회원/무료회원 샘플 검색</td></tr>
            <tr><td>DATA</td><td><a href="/front/data/danga">공사 단가 검색</a></td><td>설계가 · 도급가 · 실행가 검색</td></tr>
            <tr><td>DATA</td><td><a href="/front/data/goljo">골조 면적별 수량</a></td><td>골조를 면적별 수량으로 검색</td></tr>
        </tbody></table>
    </div>
    <div class="home-panel old-box">
        <div class="box-title"><h3>공지사항</h3><a href="/front/customer/notice">더보기</a></div>
        <ul class="notice-list compact">
            <?php foreach (($notices ?? []) as $post): ?>
                <li><a href="/front/customer/notice_view/<?= e($post['id']) ?>"><?= e($post['title']) ?></a><span><?= e(substr((string) $post['created_at'], 0, 10)) ?></span></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<section class="wrap home-three-col">
    <article class="old-box link-card"><h3>공사비 교육</h3><p>공사비에 대한 기초부터 적산, 내역서 작성 실습, 설계변경까지 배울 수 있습니다.</p><a href="/front/education/lecture">교육 바로가기</a></article>
    <article class="old-box link-card"><h3>동영상 강의</h3><p>공사비의 이해, 골조 수량 산출 등 실무 강의 목차를 확인할 수 있습니다.</p><a href="/front/education/youtube">동영상 보기</a></article>
    <article class="old-box link-card"><h3>건설 장터</h3><p>현장 자재 거래, 구인/구직, 파트너스 등 건설 산업 커뮤니티를 제공합니다.</p><a href="/front/community">커뮤니티 바로가기</a></article>
</section>

<section class="wrap partners-strip">
    <span>Partners</span>
    <b>공사비닷컴의 주요 협력사들 입니다.</b>
    <em>종합건설 / 설계 / 시행 · 가설 / 토공 / 골조 · 타일 / 석공 / 창호 / 유리 · 전기 / 설비 / 장비</em>
</section>
