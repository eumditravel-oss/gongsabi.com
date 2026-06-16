<?php
$active = $dataType ?? 'index';
$condition = $condition ?? [];
$keyword = $keyword ?? '';
$buildingTypes = ['건물 종류', '업무시설', '공동주택', '근린생활시설', '공장'];
$regions = ['지역', '서울', '경기/인천', '지방', '제주', '전국'];
$areas = ['면적(㎡)', '1,000㎡ 미만', '3,000㎡ 이상', '5,000㎡ 이상', '10,000㎡ 이상'];
$years = ['착공년도', '2026', '2025', '2024', '2023', '2022'];
$gongjongs = ['공정', '건축', '토목', '기계', '전기'];
$gongsoos = ['공종', '철근콘크리트', '마감', '설비', '전기'];
$goljoTypes = ['구조형식', 'RC조', '철골조', 'SRC조'];
?>
<div class="gs-subnav">
    <div class="gs-subnav-inner">
        <a class="home" href="/">⌂</a>
        <a class="on" href="/front/data">공사비 검색 <span>⌄</span></a>
        <?php if ($active === 'gongsabi'): ?><a class="on" href="/front/data/gongsabi">면적당 공사비 검색 <span>⌄</span></a><?php endif; ?>
        <?php if ($active === 'danga'): ?><a class="on" href="/front/data/danga">공사 단가 검색 <span>⌄</span></a><?php endif; ?>
        <?php if ($active === 'goljo'): ?><a class="on" href="/front/data/goljo">골조 면적별 수량 <span>⌄</span></a><?php endif; ?>
    </div>
</div>

<?php if ($active === 'index'): ?>
<section class="gs-page gs-data-index-page">
    <h1 class="gs-center-title">공사비 검색</h1>
    <div class="data-lead">건물의 종류 | 면적 | 지역 | 착공년도를 선택하시면<br>면적당 공사비 정보를 찾으실 수 있습니다.<br>비회원과 무료회원일 경우, 샘플만 검색이 가능하고<br><strong>유료회원 가입</strong>을 하시면 공사비의 모든 정보를 검색하실 수 있습니다.</div>
    <p class="data-note">※ 공사비닷컴에서 제공하는 서비스 및 자료는 참고용이므로<br>손실이나 손해에 관하여 법적책임을 지지 않습니다.</p>
    <div class="data-card-row">
        <a href="/front/data/gongsabi"><img src="<?= asset('img/biz-search.jpg') ?>" alt="면적당 공사비 검색"><span>면적당 공사비 검색</span></a>
        <a href="/front/data/danga"><img src="<?= asset('img/data-danga.jpg') ?>" alt="공사 단가 검색"><span>공사 단가 검색</span></a>
        <a href="/front/data/goljo"><img src="<?= asset('img/data-goljo.jpg') ?>" alt="골조 면적별 수량"><span>골조 면적별 수량</span></a>
    </div>
    <section class="gs-banner-wrap data-banner"><button type="button">‹</button><img src="<?= asset('img/data-banner-placeholder.jpg') ?>" alt="하단 배너 임시 이미지"><button type="button">›</button></section>
</section>
<?php else: ?>
<section class="gs-data-search-page">
    <h1 class="gs-center-title"><?= e($pageTitle) ?></h1>
    <div class="data-lead"><?= nl2br(e(str_replace(' / ', ' | ', $pageLead))) ?><br>비회원과 무료회원일 경우, 샘플만 검색이 가능하고<br><strong>유료회원 가입</strong>을 하시면 공사비의 모든 정보를 검색하실 수 있습니다.</div>
    <p class="data-note">※ 공사비닷컴에서 제공하는 서비스 및 자료는 참고용이므로<br>손실이나 손해에 관하여 법적책임을 지지 않습니다.</p>

    <?php if ($active === 'goljo'): ?>
        <form method="get" class="search-box search-box-goljo">
            <div class="goljo-top"><select name="building_type"><?php foreach ($buildingTypes as $item): ?><option><?= e($item) ?></option><?php endforeach; ?></select><select name="area_range"><?php foreach ($goljoTypes as $item): ?><option><?= e($item) ?></option><?php endforeach; ?></select><div class="error-stack"><div>A PHP Error was encountered<br><small>Severity: Notice<br>Message: Undefined index<br>Filename: data/goljo.php</small></div><div>A PHP Error was encountered<br><small>Severity: Notice<br>Message: Undefined index<br>Filename: data/goljo.php</small></div><div>A PHP Error was encountered<br><small>Severity: Notice<br>Message: Undefined index<br>Filename: data/goljo.php</small></div><div>A PHP Error was encountered<br><small>Severity: Notice<br>Message: Undefined index<br>Filename: data/goljo.php</small></div></div></div>
            <div class="goljo-bottom"><select name="floor"><option>층수</option></select></div>
            <div class="search-bottom"><input type="search" name="keyword" value="<?= e($keyword) ?>" placeholder="검색어를 입력해 주십시오."><button>검색</button></div>
        </form>
    <?php elseif ($active === 'danga'): ?>
        <form method="get" class="search-box search-box-danga">
            <select name="gongjong"><?php foreach ($gongjongs as $item): ?><option><?= e($item) ?></option><?php endforeach; ?></select><select name="gongsoo"><?php foreach ($gongsoos as $item): ?><option><?= e($item) ?></option><?php endforeach; ?></select><input type="search" name="keyword" value="<?= e($keyword) ?>" placeholder="검색어를 입력해 주십시오."><button>검색</button>
        </form>
    <?php else: ?>
        <form method="get" class="search-box search-box-area">
            <select name="building_type"><?php foreach ($buildingTypes as $item): ?><option><?= e($item) ?></option><?php endforeach; ?></select><select name="area_range"><?php foreach ($areas as $item): ?><option><?= e($item) ?></option><?php endforeach; ?></select><select name="region"><?php foreach ($regions as $item): ?><option><?= e($item) ?></option><?php endforeach; ?></select><select name="start_year"><?php foreach ($years as $item): ?><option><?= e($item) ?></option><?php endforeach; ?></select><input type="search" name="keyword" value="<?= e($keyword) ?>" placeholder="검색어를 입력해 주십시오."><button>검색</button>
        </form>
    <?php endif; ?>

    <div class="wide-result-label">검색결과 : <?= count($rows) ?>건</div>
    <table class="wide-data-table <?= $active === 'danga' || $active === 'goljo' ? 'complex' : '' ?>">
        <?php if ($active === 'danga'): ?>
            <thead><tr><th rowspan="2">공정</th><th rowspan="2">공종</th><th rowspan="2">품명</th><th rowspan="2">규격</th><th rowspan="2">단위</th><th rowspan="2">수량</th><th rowspan="2">기준년도</th><th colspan="4">설계가</th><th colspan="4">도급가</th><th colspan="4">실행가</th><th rowspan="2">상세</th></tr><tr><th>재료비</th><th>노무비</th><th>장비</th><th>합계</th><th>재료비</th><th>노무비</th><th>장비</th><th>합계</th><th>재료비</th><th>노무비</th><th>장비</th><th>합계</th></tr></thead>
            <tbody><tr><td colspan="20" class="empty"></td></tr></tbody>
        <?php elseif ($active === 'goljo'): ?>
            <thead><tr><th>공정</th><th>공종</th><th>품명</th><th>규격</th><th>단위</th><th>수량</th><th>기준년도</th><th colspan="4">설계가</th><th colspan="4">도급가</th><th colspan="4">실행가</th><th>상세</th></tr></thead>
            <tbody><tr><td colspan="20" class="empty"></td></tr></tbody>
        <?php else: ?>
            <thead><tr><th>공사명</th><th>건물종류</th><th>면적(㎡)</th><th>공사비(㎡)</th><th>지역</th><th>착공년도</th><th>구분</th><th>등급</th><th>상세</th></tr></thead>
            <tbody><tr><td colspan="9" class="empty"></td></tr></tbody>
        <?php endif; ?>
    </table>
</section>
<?php endif; ?>
