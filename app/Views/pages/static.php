<?php $menu = $menu ?? []; $section = $section ?? '공사비닷컴'; $active = $active ?? ''; ?>
<section class="sub-visual"><div class="wrap"><p><?= e($section) ?></p><h2><?= e($section) ?></h2></div></section>
<div class="wrap sub-layout">
    <?php if ($menu): ?><aside class="lnb"><h3><?= e($section) ?></h3><?php foreach ($menu as $key => $item): ?><a class="<?= $active === $key ? 'on' : '' ?>" href="<?= e($item[1]) ?>"><?= e($item[0]) ?></a><?php endforeach; ?></aside><?php endif; ?>
    <section class="sub-content">
        <div class="content-title"><h1><?= e($heading) ?></h1><p><?= e($lead) ?></p></div>
        <div class="legacy-card">
            <ul class="dot-list">
                <?php foreach ($items as $item): ?><li><?= e($item) ?></li><?php endforeach; ?>
            </ul>
        </div>
    </section>
</div>
