<section class="page-title">
    <p>CUSTOMER</p>
    <h1><?= e($title) ?></h1>
</section>

<section class="content-band">
    <form method="get" class="search-row">
        <input type="search" name="keyword" value="<?= e($keyword) ?>" placeholder="검색어">
        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
    </form>
    <table class="list-table">
        <thead>
            <tr>
                <th>번호</th>
                <th>제목</th>
                <th>등록일</th>
                <th>조회</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td><?= e($post['id']) ?></td>
                <td><a href="/front/customer/notice_view/<?= e($post['id']) ?>"><?= e($post['title']) ?></a></td>
                <td><?= e(substr((string) $post['created_at'], 0, 10)) ?></td>
                <td><?= e($post['views'] ?? 0) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>
