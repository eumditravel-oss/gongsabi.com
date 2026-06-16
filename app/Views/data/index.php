<?php
$active = $dataType ?? 'gongsabi';
$condition = $condition ?? [];
$buildingTypes = ['업무시설', '공동주택', '근린생활시설', '공장'];
$regions = ['서울', '경기/인천', '지방', '제주', '전국'];
$areas = ['1,000㎡ 미만', '3,000㎡ 이상', '5,000㎡ 이상', '10,000㎡ 이상', '공종 단가'];
$years = ['2026', '2025', '2024', '2023', '2022'];
?>
<section class="sub-visual"><div class="wrap"><p>DATA</p><h2>공사비 자료</h2></div></section>
<div class="wrap sub-layout">
    <aside class="lnb"><h3>공사비 자료</h3><a class="<?= $active === 'gongsabi' ? 'on' : '' ?>" href="/front/data/gongsabi">면적당 공사비 검색</a><a class="<?= $active === 'danga' ? 'on' : '' ?>" href="/front/data/danga">공사 단가 검색</a><a class="<?= $active === 'goljo' ? 'on' : '' ?>" href="/front/data/goljo">골조 면적별 수량</a></aside>
    <section class="sub-content">
        <div class="content-title"><h1><?= e($pageTitle) ?></h1><p><?= e($pageLead) ?></p></div>
        <div class="member-guide">
            <h2>“공사비닷컴 온라인 회원이 되시면”</h2>
            <ul><li>면적당 공사비 정보의 샘플 검색</li><li>공사 단가 검색의 샘플 검색</li><li>골조 면적별 수량 검색의 샘플 검색</li></ul>
            <p>비회원과 무료회원일 경우, 샘플만 검색이 가능하고 유료회원 가입을 하시면 공사비의 모든 정보를 검색하실 수 있습니다.</p>
        </div>
        <form method="get" class="legacy-search-form">
            <div class="form-row"><label>건물의 종류</label><select name="building_type"><option value="">전체</option><?php foreach ($buildingTypes as $item): ?><option value="<?= e($item) ?>"<?= selected($condition['building_type'] ?? '', $item) ?>><?= e($item) ?></option><?php endforeach; ?></select></div>
            <div class="form-row"><label>면적</label><select name="area_range"><option value="">전체</option><?php foreach ($areas as $item): ?><option value="<?= e($item) ?>"<?= selected($condition['area_range'] ?? '', $item) ?>><?= e($item) ?></option><?php endforeach; ?></select></div>
            <div class="form-row"><label>지역</label><select name="region"><option value="">전체</option><?php foreach ($regions as $item): ?><option value="<?= e($item) ?>"<?= selected($condition['region'] ?? '', $item) ?>><?= e($item) ?></option><?php endforeach; ?></select></div>
            <div class="form-row"><label>착공년도</label><select name="start_year"><option value="">전체</option><?php foreach ($years as $item): ?><option value="<?= e($item) ?>"<?= selected($condition['start_year'] ?? '', $item) ?>><?= e($item) ?></option><?php endforeach; ?></select></div>
            <div class="form-row wide"><label>검색어</label><input type="search" name="keyword" value="<?= e($keyword) ?>" placeholder="자료명 또는 공종명을 입력하세요."></div>
            <button type="submit">검색</button>
        </form>
        <div class="result-top"><strong>검색결과</strong><span><?= count($rows) ?>건</span><em>※ 스크랩 내용은 마이페이지 &gt; 공사비검색에서 확인할 수 있습니다.</em></div>
        <table class="legacy-table data-list">
            <thead><tr><th>번호</th><th>분류</th><th>자료명</th><th>면적</th><th>지역</th><th>착공년도</th><th>단위</th><th>금액/수량</th><th>구분</th></tr></thead>
            <tbody>
                <?php if (!$rows): ?><tr><td colspan="9" class="empty">검색 결과가 없습니다.</td></tr><?php endif; ?>
                <?php foreach ($rows as $i => $row): ?>
                <tr class="<?= ($row['member'] ?? '') === '유료' ? 'locked' : '' ?>">
                    <td><?= $i + 1 ?></td><td><?= e($row['category']) ?></td><td class="left"><a href="#" data-scrap><?= e($row['name']) ?></a></td><td><?= e($row['area']) ?></td><td><?= e($row['region']) ?></td><td><?= e($row['year']) ?></td><td><?= e($row['unit']) ?></td><td><?= is_numeric($row['price']) && $row['price'] > 1000 ? number_format((float)$row['price']) : e($row['price']) ?></td><td><span class="badge <?= ($row['member'] ?? '') === '유료' ? 'pay' : 'free' ?>"><?= e($row['member']) ?></span></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</div>
