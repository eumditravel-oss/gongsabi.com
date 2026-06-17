<?php
$active = $active ?? 'company1';
$tab = $tab ?? '';
$tabs = [
    'talent' => ['인재상 및 부서소개', '/front/company/company3?tab=talent'],
    'process' => ['채용 절차', '/front/company/company3?tab=process'],
    'notice' => ['채용 공고', '/front/company/company3?tab=notice'],
];
?>
<div class="gs-subnav">
    <div class="gs-subnav-inner">
        <a class="home" href="/">⌂</a>
        <a class="<?= $active !== 'company4' ? 'on' : '' ?>" href="/front/company">회사소개 <span>⌄</span></a>
        <?php if ($active === 'company1'): ?>
            <a class="on" href="/front/company/company1">대표이사 인사말 <span>⌄</span></a>
        <?php elseif ($active === 'company2'): ?>
            <a class="on" href="/front/company/company2">기업소개 <span>⌄</span></a>
        <?php elseif ($active === 'company3'): ?>
            <a class="on" href="/front/company/company3">채용안내 <span>⌄</span></a>
        <?php elseif ($active === 'company4'): ?>
            <a class="on" href="/front/company/company4">오시는길 <span>⌄</span></a>
        <?php endif; ?>
    </div>
</div>

<?php if ($active === 'company1'): ?>
<section class="gs-page gs-ceo-page">
    <h1 class="gs-center-title">대표이사 소개</h1>
    <div class="gs-section-title"><h2>대표이사 인사말</h2></div>
    <div class="ceo-greeting">
        <div class="ceo-photo"><img src="<?= asset('img/company-ceo.jpg') ?>" alt="대표이사 사진 임시 이미지"></div>
        <div class="ceo-text">
            <h3>공사비 닷컴을 찾아주신<br>여러분들 진심으로 환영합니다.</h3>
            <p>공사비닷컴은 지난 30년간 모아진 건축 데이터베이스와 축적된 기술 노하우를 바탕으로 국내 최대의 공사비 정보 플랫폼을 제공합니다.</p>
            <p>인재와 품질을 통한 High Quality 실현이라는 경영이념 아래, 건설 원가 검토 및 산출 업무와 공사비 데이터 관리 분야의 표준을 만들기 위해 노력하고 있습니다.</p>
            <p>정보의 홍수 속에서 정확하고 믿을 수 있는 데이터를 제공할 수 있는 공사비닷컴이 될 것을 약속드리며, 언제나 새로운 도약을 이루어나가기 위해 멈추지 않겠습니다.</p>
            <p class="signature">대표이사&nbsp;&nbsp;&nbsp; <strong>현 동 명</strong></p>
        </div>
    </div>
    <div class="gs-section-title resume-title"><h2>대표이사 약력</h2></div>
    <div class="career-table">
        <div class="career-label">약력</div>
        <div class="career-content"><ul><li>한성고, 홍익대 건축학과 졸업</li><li>제2기한양광장 공정팀 공사관리 근무</li><li>쌍용건설 건축견적부 근무</li><li>생성건설 영업관리 및 주택 기관원 현장 근무</li><li>대한주택공사 통합산업과정 수료</li></ul></div>
        <div class="career-label">현재</div>
        <div class="career-content"><ul><li>한양대학교 강사 ‘건축 적산 실습’</li><li>하회건설협회 강사 ‘해외 입찰 실무 과정’</li><li>서울시교육청 설계 심의 위원</li><li>한국VE 협회 전문위원</li><li>공사비닷컴 대표이사</li></ul></div>
        <div class="career-label">저서</div>
        <div class="career-content"><ul><li>튼튼하고 아름다운 건축시공이야기</li><li>현장기술자를 위한 건축 견적이야기</li><li>해외공사 입찰 매뉴얼</li><li>FED 공사 견적 매뉴얼</li></ul></div>
    </div>
</section>
<?php elseif ($active === 'company2'): ?>
<section class="gs-page gs-about-page">
    <h1 class="gs-left-big-title">왜, 공사비닷컴인가?</h1>
    <div class="gs-title-line"></div>
    <div class="why-copy">
        <p>공사비닷컴은 <strong>“왜?”</strong>라는 질문에서 시작되었습니다.</p>
        <p>왜 건설기능에는 믿을 수 있는 공사비의 표준이 없을까?<br>왜 원가검토는 공사 이전부터 준공 때까지 체계적인 관리가 어려울까?<br>고객과 시장이 필요로 하는 시스템을 통해 기준과 표준을 만들어 갑니다.</p>
        <p class="blue">이제 그 답을 향한 저희의 시작이 ‘공사비닷컴’입니다.</p>
    </div>
    <div class="blue-card-row">
        <article class="cyan"><h2>가장 정확한<br>빅데이터 입니다.</h2><p>빅데이터를 활용하여 공사 초기부터 공사기간과 예산을 절감할 수 있습니다.</p><b>1</b></article>
        <article class="navy"><h2>시간과 비용을<br>대폭 줄여줍니다.</h2><p>내역서 작성과 공사비 산정에 필요한 정보를 체계적으로 제공합니다.</p><b>2</b></article>
    </div>
    <div class="gs-section-title"><h2>공사비닷컴이 추구하는 3가지</h2></div>
    <div class="value-list">
        <div><span>표준<br><small>Standard</small></span><p>정확성을 바탕으로 한 빅데이터를 활용하여 공사기간과 예산을 절감하여 줍니다.</p></div>
        <div><span>혁신<br><small>Innovation</small></span><p>시간과 비용이 많이 소요되는 내역서 작성을 10분만에 작성합니다.</p></div>
        <div><span>신뢰<br><small>Confidence</small></span><p>신뢰할 수 있는 교육과 공사비의 표준을 제공합니다.</p></div>
    </div>
    <div class="gs-section-title"><h2>공사비닷컴이 걸어온 길</h2></div>
    <div class="history-line">
        <div class="history-card left"><strong>2020</strong><p>상표등록증 출원 04<br>현장기술자를 위한 건축 견적이야기 출간 07<br>개산견적 내역서 작성 OPEN 10</p><img src="<?= asset('img/history-books.jpg') ?>" alt="도서 이미지 임시"></div>
        <div class="history-card right"><strong>2019</strong><p>유튜브 채널 신설 “현동명의 공사비닷컴”</p><img src="<?= asset('img/history-youtube.jpg') ?>" alt="유튜브 이미지 임시"></div>
        <div class="history-card left small"><strong>2017</strong><p>연구개발전담부서 인정 06</p></div>
        <div class="history-card right small"><strong>2016</strong><p>공사비닷컴 설립<br>ISO 9001, ISO 14001 인증</p></div>
    </div>
</section>
<?php elseif ($active === 'company3'): ?>
<section class="gs-page gs-recruit-page">
    <nav class="tab-nav">
        <?php foreach ($tabs as $key => [$label, $href]): ?>
            <a class="<?= $tab === $key ? 'on' : '' ?>" href="<?= e($href) ?>"><?= e($label) ?></a>
        <?php endforeach; ?>
    </nav>
    <?php if ($tab === 'process'): ?>
        <h1 class="gs-center-title recruit-title">채용 절차</h1>
        <div class="process-box">
            <h2>공사비닷컴과 함께 건설시장의 신뢰와 표준을<br>만들어갈 열정적인 인재를 찾습니다!</h2>
            <div class="process-steps"><span>온라인 지원 접수</span><i></i><span>서류 전형</span><i></i><span>1차 면접</span><i></i><span>2차 면접</span><i></i><span>최종 합격</span></div>
            <h3>1. 지원분야 및 근무조건</h3>
            <table><tr><th>지원분야</th><th>근무조건 및 복리후생</th></tr><tr><td>프로그램개발팀<br>영업팀<br>홍보팀<br>경영지원팀</td><td>근무형태 : 정규직<br>근무시간 : 주5일 09시~17시<br>복리후생 : 연차, 경조, 교육휴가, 포상제도, 생일선물 등</td></tr></table>
            <h3>2. 제출서류</h3><p>- 입사지원서<br>- 자기소개서 및 해당 직무 기술서</p>
            <h3>3. 접수기한 및 문의</h3><p>- 접수기한 : 상시채용<br>- 문의접수 : 이지선 / 02-2202-2258</p>
            <h3>4. 기타사항</h3><p>- 합격자 발표는 합격자에 한하여 개별 통지<br>- 기재사항 허위 판명 시 채용이 취소됩니다.</p>
        </div>
    <?php elseif ($tab === 'notice'): ?>
        <h1 class="gs-center-title recruit-title">채용 공고</h1>
        <div class="recruit-board-head"><a class="download-btn" href="#">입사지원서 양식 다운로드</a></div>
        <table class="recruit-board"><thead><tr><th>번호</th><th>제목</th><th>작성일</th></tr></thead><tbody><tr><td>2</td><td>공사비닷컴 신입사원 모집</td><td>2020-09-01</td></tr><tr><td>1</td><td>공사비닷컴 경력사원 모집</td><td>2020-09-01</td></tr></tbody></table>
    <?php else: ?>
        <h1 class="gs-center-title recruit-title">인재상</h1>
        <div class="talent-visuals">
            <article><img src="<?= asset('img/talent-01.jpg') ?>" alt="커뮤니케이터"><b>커뮤니케이터</b><p>고객의 니즈를 이해하고 배려를 기반으로 소통할 수 있는 인재</p></article>
            <article><img src="<?= asset('img/talent-02.jpg') ?>" alt="강한 주인의식"><b>강한 주인의식과 자신감</b><p>오늘보다 더 나은 자신과 회사를 위해 끊임없이 도전하는 인재</p></article>
            <article><img src="<?= asset('img/talent-03.jpg') ?>" alt="긍정 자세"><b>변화에 대한<br>긍정적이고 유연한 자세</b><p>시장과 고객에 대한 변화를 항상 주시하고 긍정적으로 선도할 수 있는 인재</p></article>
        </div>
        <h1 class="gs-center-title dept-title">부서소개</h1>
        <div class="dept-list">
            <article><span class="gray">▣</span><h3>프로그램 개발팀</h3><p>개산견적의 프로그램<br>수정 및 개발</p></article>
            <article><span class="cyan">◎</span><h3>영업팀</h3><p>유무료 회원의<br>유치 및 관리</p></article>
            <article><span class="light">◇</span><h3>홍보팀</h3><p>SNS 채널,<br>레터 관리 및 광고</p></article>
            <article><span class="blue">⚙</span><h3>경영지원팀</h3><p>기획, 인사/총무,<br>재무, 원가</p></article>
        </div>
    <?php endif; ?>
</section>
<?php elseif ($active === 'company4'): ?>
<section class="gs-page gs-location-page">
    <h1 class="gs-left-big-title">오시는 길</h1>
    <div class="gs-title-line"></div>
    <div class="map-area"><div class="map-placeholder">네이버 지도 Open API 인증이 실패했습니다.</div><aside><h3>전화</h3><p>02.2202.2258</p><h3>주소</h3><p>05585<br>서울특별시 송파구 백제고분로 372 6<br>송원빌딩 6층</p><h3>안내</h3><p>주차공간이 협소하니<br>가급적 대중교통을 이용하시기 바랍니다.</p></aside></div>
    <div class="transport-title">대중교통 이용시</div>
    <div class="transport-row"><div class="transport-icon">▭</div><div><h3>주변 버스 정류장</h3><p><b class="green">지선</b> 2311번 / 2412번 / 3012번 / 3214번 / 3317번 / 3318번 / 3413번</p><p><b class="green2">마을</b> 강남05 / 16번 / 31번 / 32번 / 70번 / 101번 / 119번</p><p><b class="blue">간선</b> 301번 / 302번 / 303번 / 320번 / 340번 / 350번 / 360번 / 362번 / N13번</p><p><b class="red">광역</b> 500-1번 / 1007번 / 1009번 / 1112번 / 5600번</p></div></div>
    <div class="transport-row"><div class="transport-icon">▣</div><div><h3>주변 지하철</h3><p><b class="pink">8호선</b> 석촌역 7번출구</p><p><b class="gold">9호선</b> 석촌역 6번출구</p></div></div>
</section>
<?php endif; ?>
