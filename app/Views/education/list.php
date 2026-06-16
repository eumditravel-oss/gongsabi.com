<?php $isBook = ($kind ?? '') === 'book'; ?>
<section class="sub-visual"><div class="wrap"><h2>공사비 교육</h2><p>공사비 기초부터 적산, 수량산출, 내역서 작성까지 학습합니다.</p></div></section>
<div class="wrap sub-layout">
    <aside class="lnb"><h3>공사비 교육</h3><a class="<?= !$isBook ? 'on' : '' ?>" href="/front/education/lecture">공사비 교육</a><a class="<?= $isBook ? 'on' : '' ?>" href="/front/education/book">교재 안내</a><a href="/front/education/youtube">동영상 강의</a></aside>
    <section class="sub-content">
        <div class="path">HOME &gt; 공사비 교육 &gt; <?= e($title ?? '') ?></div>
        <h3 class="content-title"><?= e($title ?? '') ?></h3>
        <p class="content-lead"><?= $isBook ? '공사비 실무 교재와 교육 자료를 안내합니다.' : '공사비에 대한 기초부터 건축 적산 및 내역서 작성 실습항목의 이해, 설계변경까지 배울 수 있습니다.' ?></p>
        <p class="guide-text">궁금하거나 필요하신 교육내용을 요청하시면 교육과정 개설 시 반영할 수 있습니다.</p>
        <div class="product-list">
            <?php foreach (($products ?? []) as $product): ?>
                <article class="product-card old-box">
                    <div class="product-thumb"><i class="fa <?= $isBook ? 'fa-book' : 'fa-chalkboard-teacher' ?>"></i></div>
                    <div class="product-info"><h4><?= e($product['name']) ?></h4><p><?= e($product['description']) ?></p><b><?= money((int) $product['price']) ?></b></div>
                    <button type="button" class="js-payment pay-btn" data-product-code="<?= e($product['code']) ?>">신청하기</button>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</div>
