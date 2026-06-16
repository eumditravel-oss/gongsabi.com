<?php
$tabs = [
    'gongsabi' => ['면적당 공사비 검색', '/front/data/gongsabi'],
    'danga' => ['공사 단가 검색', '/front/data/danga'],
    'goljo' => ['골조 면적별 수량', '/front/data/goljo'],
];
$filters = $filters ?? [];
$isPaid = $isPaid ?? false;
?>
<section class="sub-visual"><div class="wrap"><h2>공사비 자료</h2><p>공사비와 관련한 다양한 데이터를 검색합니다.</p></div></section>
<div class="wrap sub-layout">
    <aside class="lnb"><h3>공사비 자료</h3><?php foreach ($tabs as $key => $tab): ?><a class="<?= $dataType === $key ? 'on' : '' ?>" href="<?= e($tab[1]) ?>"><?= e($tab[0]) ?></a><?php endforeach; ?></aside>
    <section class="sub-content">
        <div class="path">HOME &gt; 공사비 자료 &gt; <?= e($pageTitle) ?></div>
        <h3 class="content-title"><?= e($pageTitle) ?></h3>
        <p class="content-lead"><?= e($pageLead) ?></p>
        <p class="guide-text">비회원과 무료회원일 경우 샘플만 검색이 가능하고 유료회원 가입을 하시면 공사비의 모든 정보를 검색하실 수 있습니다.</p>

        <form method="get" class="filter-box">
            <div class="filter-row">
                <?php if ($dataType === 'danga'): ?>
                    <label>공종<select name="building_type"><option value="">전체</option><option value="철근콘크리트">철근콘크리트</option><option value="철골공사">철골공사</option><option value="마감공사">마감공사</option><option value="토공사">토공사</option></select></label>
                    <label>단가종류<select name="price_type"><option value="">전체</option><option value="설계가"<?= selected($filters['price_type'] ?? '', '설계가') ?>>설계가</option><option value="도급가"<?= selected($filters['price_type'] ?? '', '도급가') ?>>도급가</option><option value="실행가"<?= selected($filters['price_type'] ?? '', '실행가') ?>>실행가</option></select></label>
                <?php else: ?>
                    <label>건물의 종류<select name="building_type"><option value="">전체</option><option value="office">업무시설</option><option value="housing">공동주택</option><option value="commercial">근린생활시설</option><option value="factory">공장</option></select></label>
                    <label>면적<input type="number" name="area" value="<?= e($filters['area'] ?? '') ?>" placeholder="연면적 ㎡"></label>
                <?php endif; ?>
                <label>지역<select name="region"><option value="">전체</option><option value="seoul"<?= selected($filters['region'] ?? '', 'seoul') ?>>서울</option><option value="gyeonggi"<?= selected($filters['region'] ?? '', 'gyeonggi') ?>>경기/인천</option><option value="local"<?= selected($filters['region'] ?? '', 'local') ?>>지방</option><option value="jeju"<?= selected($filters['region'] ?? '', 'jeju') ?>>제주</option></select></label>
                <label>착공년도<select name="year"><option value="">전체</option><?php foreach (range(2026, 2020) as $year): ?><option value="<?= $year ?>"<?= selected($filters['year'] ?? '', (string) $year) ?>><?= $year ?></option><?php endforeach; ?></select></label>
                <label class="grow">검색어<input type="text" name="keyword" value="<?= e($filters['keyword'] ?? '') ?>" placeholder="자료명 또는 분류"></label>
                <button type="submit">검색</button>
            </div>
        </form>

        <div class="table-util"><span>총 <b><?= count($rows) ?></b>건</span><span>※ 공사비닷컴에서 제공되는 서비스 및 자료는 참고용이므로 손실이나 손해에 관하여 법적 책임을 지지 않습니다.</span></div>
        <table class="basic-table data-table-list">
            <thead><tr><th>No</th><th>분류</th><th>자료명</th><th>지역</th><th>면적</th><th>착공년도</th><th>단위</th><th>공사비/단가</th><th>상세</th></tr></thead>
            <tbody>
            <?php if (!$rows): ?><tr><td colspan="9" class="empty">검색 결과가 없습니다.</td></tr><?php endif; ?>
            <?php foreach ($rows as $row): ?>
                <?php $locked = empty($row['sample']) && !$isPaid; ?>
                <tr class="<?= $locked ? 'locked-row' : '' ?>">
                    <td><?= e($row['no']) ?></td><td><?= e($row['category']) ?></td><td class="left"><?= $locked ? '유료회원 전용 자료' : e($row['name']) ?></td><td><?= e($row['region']) ?></td><td><?= e($row['area_band']) ?></td><td><?= e($row['year']) ?></td><td><?= e($row['unit']) ?></td><td><?= $locked ? '<span class="lock">잠김</span>' : money((int)$row['price']) ?></td>
                    <td><button type="button" class="sm-btn js-detail" data-title="<?= e($locked ? '유료회원 전용 자료' : $row['name']) ?>" data-body="<?= e($locked ? '유료회원 가입 후 전체 공사비 정보를 검색하실 수 있습니다.' : $row['desc']) ?>" data-price="<?= e($locked ? '비공개' : money((int)$row['price'])) ?>">상세</button></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div class="member-guide">
            <h4>공사비 상세</h4>
            <p>※ 스크랩 내용은 마이페이지 &gt; 공사비검색 &gt; <?= e($pageTitle) ?> 에서 보실 수 있습니다.</p>
            <a href="/front/auth/regist">유료회원 가입 안내</a>
        </div>
    </section>
</div>
