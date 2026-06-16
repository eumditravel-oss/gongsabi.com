<section class="page-title">
    <p>CUSTOMER</p>
    <h1><?= e($post['title']) ?></h1>
    <span><?= e(substr((string) $post['created_at'], 0, 10)) ?></span>
</section>

<section class="content-band prose">
    <?= nl2br(e($post['content'])) ?>
    <p><a class="text-link" href="/front/customer/notice">목록</a></p>
</section>
