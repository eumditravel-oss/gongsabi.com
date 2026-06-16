<section class="sub-visual"><div class="wrap"><h2><?= e($section ?? '공사비닷컴') ?></h2><p>대한민국 공사비 정보 플랫폼</p></div></section>
<div class="wrap sub-layout">
    <aside class="lnb"><h3><?= e($section ?? '메뉴') ?></h3><?php foreach (($menu ?? []) as $m): ?><a class="<?= ($activeSlug ?? '') === $m[2] ? 'on' : '' ?>" href="<?= e($m[1]) ?>"><?= e($m[0]) ?></a><?php endforeach; ?></aside>
    <section class="sub-content">
        <div class="path">HOME &gt; <?= e($section ?? '') ?> &gt; <?= e($heading ?? '') ?></div>
        <h3 class="content-title"><?= e($heading ?? '') ?></h3>
        <p class="content-lead"><?= e($lead ?? '') ?></p>
        <div class="static-card old-box">
            <?php foreach (($items ?? []) as $item): ?>
                <p><?= e($item) ?></p>
            <?php endforeach; ?>
        </div>
        <?php if (($section ?? '') === '커뮤니티'): ?>
            <table class="basic-table"><thead><tr><th>No</th><th>제목</th><th>작성자</th><th>등록일</th><th>조회</th></tr></thead><tbody>
                <tr><td>3</td><td class="left">공사비 검토 의뢰 접수 안내</td><td>관리자</td><td><?= date('Y-m-d') ?></td><td>0</td></tr>
                <tr><td>2</td><td class="left">현장 자재 거래 게시판 운영 안내</td><td>관리자</td><td><?= date('Y-m-d') ?></td><td>0</td></tr>
                <tr><td>1</td><td class="left">구인 / 구직 게시판 이용 안내</td><td>관리자</td><td><?= date('Y-m-d') ?></td><td>0</td></tr>
            </tbody></table>
        <?php endif; ?>
    </section>
</div>
