<section class="page-title">
    <p>EDUCATION</p>
    <h1><?= e($title) ?></h1>
</section>

<section class="product-grid">
    <?php foreach ($products as $product): ?>
        <?php
        $imageKey = $kind === 'book' ? 'book_image_url' : 'lecture_image_url';
        $imageUrl = trim((string) ($siteSettings[$imageKey] ?? ''));
        ?>
        <article class="product-card">
            <?php if ($imageUrl !== ''): ?>
                <img src="<?= e($imageUrl) ?>" alt="<?= e($product['name']) ?>">
            <?php else: ?>
                <div class="product-placeholder">IMAGE</div>
            <?php endif; ?>
            <div>
                <h2><?= e($product['name']) ?></h2>
                <p><?= e($product['description']) ?></p>
                <strong><?= money((int) $product['price']) ?></strong>
                <button class="btn primary js-payment"
                        data-product-code="<?= e($product['code']) ?>"
                        data-product-name="<?= e($product['name']) ?>">
                    결제하기
                </button>
            </div>
        </article>
    <?php endforeach; ?>
</section>
