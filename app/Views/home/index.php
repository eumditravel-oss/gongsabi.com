<section class="hero">
    <div class="hero-copy">
        <p>Construction Cost Platform</p>
        <h1>공사비닷컴</h1>
        <span>공사비 자료, 교육, 보고서, 결제까지 직접 운영하는 새 플랫폼</span>
        <div class="hero-actions">
            <a class="btn primary" href="/front/report/geonchuk">공사비 보고서</a>
            <a class="btn" href="/front/data/gongsabi">자료 검색</a>
        </div>
    </div>
    <div class="hero-visual">
        <?php if (!empty($siteSettings['hero_image_url'])): ?>
            <img src="<?= e($siteSettings['hero_image_url']) ?>" alt="공사비 서비스">
        <?php else: ?>
            <div class="image-placeholder">MAIN IMAGE</div>
        <?php endif; ?>
    </div>
</section>

<?php if (!empty($siteSettings['ad_side_image_url'])): ?>
    <aside class="floating-ad">
        <a href="<?= e($siteSettings['ad_side_link_url'] ?: '#') ?>">
            <img src="<?= e($siteSettings['ad_side_image_url']) ?>" alt="측면 광고">
        </a>
    </aside>
<?php endif; ?>

<section class="quick-menu">
    <a href="/front/report/geonchuk"><i class="fa fa-file-invoice"></i><span>건축 공사비</span></a>
    <a href="/front/report/goljo"><i class="fa fa-building"></i><span>골조 공사비</span></a>
    <a href="/front/report/gigan"><i class="fa fa-calendar-alt"></i><span>공사기간</span></a>
    <a href="/front/report/ganjeob"><i class="fa fa-calculator"></i><span>간접비</span></a>
</section>

<section class="section-grid">
    <div class="section-copy">
        <p class="eyebrow">DATA</p>
        <h2>면적당 공사비 검색</h2>
        <p>구조, 지역, 마감 등급 기준으로 공사비 자료를 정리하고 운영자가 직접 단가를 보정할 수 있습니다.</p>
        <a class="text-link" href="/front/data/gongsabi">공사비 자료 보기</a>
    </div>
    <?php if (!empty($siteSettings['main_section_data_image_url'])): ?>
        <img src="<?= e($siteSettings['main_section_data_image_url']) ?>" alt="공사비 자료">
    <?php else: ?>
        <div class="section-placeholder">DATA IMAGE</div>
    <?php endif; ?>
</section>

<section class="section-grid reverse">
    <?php if (!empty($siteSettings['main_section_education_image_url'])): ?>
        <img src="<?= e($siteSettings['main_section_education_image_url']) ?>" alt="공사비 교육">
    <?php else: ?>
        <div class="section-placeholder">EDUCATION IMAGE</div>
    <?php endif; ?>
    <div class="section-copy">
        <p class="eyebrow">EDUCATION</p>
        <h2>공사비 교육</h2>
        <p>강의와 교재 상품을 등록하고, 결제 완료 후 이용 권한을 부여하는 흐름으로 확장됩니다.</p>
        <a class="text-link" href="/front/education/lecture">교육 과정 보기</a>
    </div>
</section>

<section class="notice-band">
    <div>
        <p class="eyebrow">NOTICE</p>
        <h2>공지사항</h2>
    </div>
    <ul>
        <?php foreach ($notices as $notice): ?>
            <li>
                <a href="/front/customer/notice_view/<?= e($notice['id']) ?>"><?= e($notice['title']) ?></a>
                <span><?= e(substr((string) $notice['created_at'], 0, 10)) ?></span>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
