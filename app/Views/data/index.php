<section class="page-title">
    <p>DATA</p>
    <h1>면적당 공사비 검색</h1>
</section>

<section class="content-band">
    <form method="get" class="search-row">
        <input type="search" name="keyword" value="<?= e($keyword) ?>" placeholder="공사비 자료명">
        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
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
