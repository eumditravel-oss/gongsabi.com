<?php
$menu = ['notice' => '공지사항', 'pds' => '자료실', 'faq' => '자주 묻는 질문'];
?>
<section class="sub-visual"><div class="wrap"><h2>고객센터</h2><p>공사비닷컴의 최신 정보와 자료를 확인합니다.</p></div></section>
<div class="wrap sub-layout">
    <aside class="lnb"><h3>고객센터</h3><a class="<?= $boardType === 'notice' ? 'on' : '' ?>" href="/front/customer/notice">공지사항</a><a class="<?= $boardType === 'pds' ? 'on' : '' ?>" href="/front/customer/pds">자료실</a><a class="<?= $boardType === 'faq' ? 'on' : '' ?>" href="/front/customer/faq">자주 묻는 질문</a><a href="/front/customer/qna">Q&A</a><a href="/front/customer/contact">업무 제휴</a></aside>
    <section class="sub-content">
        <div class="path">HOME &gt; 고객센터 &gt; <?= e($title ?? '') ?></div>
        <h3 class="content-title"><?= e($title ?? '') ?></h3>
        <p class="content-lead"><?= $boardType === 'pds' ? '공사비와 관련한 다양하고 유용한 정보를 제공합니다.' : ($boardType === 'faq' ? '가장 많이 묻는 질문을 정리했습니다.' : '공사비닷컴과 관련한 최신 정보를 확인할 수 있습니다.') ?></p>
        <form method="get" class="board-search"><input type="text" name="keyword" value="<?= e($keyword ?? '') ?>" placeholder="검색어 입력"><button type="submit">검색</button></form>
        <table class="basic-table board-table"><thead><tr><th>No</th><th>제목</th><th>등록일</th><th>조회</th></tr></thead><tbody>
            <?php foreach (($posts ?? []) as $post): ?>
                <tr><td><?= e($post['id']) ?></td><td class="left"><a href="/front/customer/notice_view/<?= e($post['id']) ?>"><?= !empty($post['is_notice']) ? '<span class="notice-badge">공지</span>' : '' ?><?= e($post['title']) ?></a></td><td><?= e(substr((string)$post['created_at'], 0, 10)) ?></td><td><?= e($post['views'] ?? 0) ?></td></tr>
            <?php endforeach; ?>
        </tbody></table>
    </section>
</div>
