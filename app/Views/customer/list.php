<?php
$boardType = $boardType ?? 'notice';
$labels = ['notice' => '공지사항', 'pds' => '자료실', 'faq' => '자주 묻는 질문'];
?>
<section class="sub-visual"><div class="wrap"><p>CUSTOMER</p><h2>고객센터</h2></div></section>
<div class="wrap sub-layout">
    <aside class="lnb"><h3>고객센터</h3><a class="<?= $boardType === 'notice' ? 'on' : '' ?>" href="/front/customer/notice">공지사항</a><a class="<?= $boardType === 'pds' ? 'on' : '' ?>" href="/front/customer/pds">자료실</a><a class="<?= $boardType === 'faq' ? 'on' : '' ?>" href="/front/customer/faq">자주 묻는 질문</a><a href="/front/customer/qna">Q&amp;A</a></aside>
    <section class="sub-content">
        <div class="content-title"><h1><?= e($labels[$boardType] ?? $title) ?></h1><p>공사비닷컴의 공지와 자료를 확인하실 수 있습니다.</p></div>
        <form class="board-search" method="get"><input type="search" name="keyword" value="<?= e($keyword) ?>" placeholder="검색어를 입력하세요."><button type="submit">검색</button></form>
        <table class="legacy-table board-table"><thead><tr><th>번호</th><th>제목</th><th>등록일</th><th>조회</th></tr></thead><tbody><?php foreach ($posts as $i => $post): ?><tr><td><?= $i + 1 ?></td><td class="left"><a href="/front/customer/notice_view/<?= e($post['id']) ?>"><?= e($post['title']) ?></a></td><td><?= e(substr((string)$post['created_at'], 0, 10)) ?></td><td><?= e($post['views'] ?? 0) ?></td></tr><?php endforeach; ?></tbody></table>
    </section>
</div>
