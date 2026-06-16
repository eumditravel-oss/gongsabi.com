<section class="page-title">
    <p>DATA</p>
    <h1>면적당 공사비 검색</h1>
    <span>건축, 골조, 단가 데이터를 조건별로 검색합니다.</span>
</section>

<section class="content-band">
    <nav class="tab-line" aria-label="공사비 자료 분류">
        <a class="active" href="/front/data/gongsabi">면적당 공사비</a>
        <a href="/front/data/goljo">골조 자료</a>
        <a href="/front/data/danga">단가 자료</a>
    </nav>
    <form method="get" class="filter-grid">
        <label>자료명<input type="search" name="keyword" value="<?= e($keyword) ?>" placeholder="공사비 자료명"></label>
        <label>지역<select name="region"><option value="">전체</option><option>서울</option><option>수도권</option><option>지방</option><option>제주</option></select></label>
        <label>구조<select name="structure"><option value="">전체</option><option>철근콘크리트</option><option>철골조</option><option>목구조</option></select></label>
        <label>용도<select name="use"><option value="">전체</option><option>근린생활시설</option><option>업무시설</option><option>공동주택</option><option>공장</option></select></label>
        <button class="btn primary" type="submit"><i class="fa fa-search"></i> 검색</button>
    </form>
    <p class="result-count">검색결과 : <?= count($rows) ?>건</p>
    <table class="list-table">
        <thead>
            <tr>
                <th>분류</th>
                <th>자료명</th>
                <th>단위</th>
                <th>단가</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td><?= e($row['category']) ?></td>
                    <td><?= e($row['name']) ?></td>
                    <td><?= e($row['unit']) ?></td>
                    <td><?= money((int) $row['price']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
