<section class="page-title">
    <p>GONGSABI.COM</p>
    <h1><?= e($heading) ?></h1>
    <span><?= e($lead) ?></span>
</section>

<section class="content-band">
    <div class="feature-list">
        <?php foreach ($items as $item): ?>
            <div>
                <i class="fa fa-check"></i>
                <span><?= e($item) ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</section>
