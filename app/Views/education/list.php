<?php $active = $kind ?? 'lecture'; ?>
<section class="sub-visual"><div class="wrap"><p>EDUCATION</p><h2>공사비 교육</h2></div></section>
<div class="wrap sub-layout">
    <aside class="lnb"><h3>공사비 교육</h3><a class="<?= $active === 'lecture' ? 'on' : '' ?>" href="/front/education/lecture">공사비 교육</a><a class="<?= $active === 'book' ? 'on' : '' ?>" href="/front/education/book">교재 안내</a><a href="/front/education/youtube">동영상 강의</a></aside>
    <section class="sub-content">
        <div class="content-title"><h1><?= $active === 'book' ? '교재 안내' : '공사비 교육' ?></h1><p>공사비에 대한 기초부터 건축 적산(수량산출) 및 내역서 작성 실습항목의 이해 및 설계변경에 대해 심도있게 배울 수 있습니다.</p></div>
        <div class="product-list">
            <?php foreach ($products as $product): ?>
            <article class="product-row">
                <div class="product-thumb"><?= $active === 'book' ? 'BOOK' : 'LECTURE' ?></div>
                <div><h2><?= e($product['name']) ?></h2><p><?= e($product['description']) ?></p><strong><?= money((int)$product['price']) ?></strong><form method="post" action="/front/payment/prepare"><?= csrf_field() ?><input type="hidden" name="product_code" value="<?= e($product['code']) ?>"><button type="submit">신청하기</button></form></div>
            </article>
            <?php endforeach; ?>
        </div>
    </section>
</div>
