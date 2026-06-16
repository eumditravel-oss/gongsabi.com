<section class="sub-visual"><div class="wrap"><h2>고객센터</h2><p>게시글 상세</p></div></section>
<div class="wrap sub-content single">
    <div class="path">HOME &gt; 고객센터 &gt; 게시글</div>
    <h3 class="content-title"><?= e($post['title'] ?? '') ?></h3>
    <table class="basic-table view-table"><tr><th>등록일</th><td><?= e(substr((string)($post['created_at'] ?? ''), 0, 10)) ?></td><th>조회</th><td><?= e($post['views'] ?? 0) ?></td></tr></table>
    <div class="view-content old-box"><?= nl2br(e($post['content'] ?? '')) ?></div>
    <p class="btn-row"><a class="list-btn" href="/front/customer/notice">목록</a></p>
</div>
