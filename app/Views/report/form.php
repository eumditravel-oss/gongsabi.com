<?php
$menus = [
    'geonchuk' => ['건축 공사비', '/front/report/geonchuk'],
    'goljo' => ['골조 공사비', '/front/report/goljo'],
    'gigan' => ['공사기간의 산정', '/front/report/gigan'],
    'ganjeob' => ['간접 공사비 계산', '/front/report/ganjeob'],
];
?>
<section class="sub-visual"><div class="wrap"><h2>보고서</h2><p>건축 및 골조 내역서, 공사기간, 간접 공사비를 산정합니다.</p></div></section>
<div class="wrap sub-layout">
    <aside class="lnb"><h3>보고서</h3><?php foreach ($menus as $key => $menu): ?><a class="<?= $reportType === $key ? 'on' : '' ?>" href="<?= e($menu[1]) ?>"><?= e($menu[0]) ?></a><?php endforeach; ?></aside>
    <section class="sub-content">
        <div class="path">HOME &gt; 보고서 &gt; <?= e($serviceName) ?></div>
        <h3 class="content-title"><?= e($serviceName) ?></h3>
        <p class="content-lead"><?= e($serviceLead) ?></p>
        <div class="ready-box">
            <strong>서비스 오픈 준비중 입니다.</strong>
            <p>기존 공사비닷컴의 공개 화면 흐름을 유지하면서, 새 호스팅 환경에서는 아래 산정 API와 저장 로직을 사용할 수 있도록 구성했습니다.</p>
        </div>

        <form class="report-form estimate-form" method="post" action="/front/report/estimate">
            <?= csrf_field() ?>
            <input type="hidden" name="report_type" value="<?= e($reportType) ?>">
            <h4>산정 조건 입력</h4>
            <div class="form-grid">
                <label>건물의 종류<select name="building_type"><option value="office">업무시설</option><option value="housing">공동주택</option><option value="commercial">근린생활시설</option><option value="factory">공장/창고</option><option value="medical">의료시설</option><option value="education">교육연구시설</option></select></label>
                <label>구조<select name="structure"><option value="reinforced_concrete">철근콘크리트조</option><option value="steel">철골조</option><option value="src">SRC조</option><option value="wood">목구조</option><option value="remodeling">리모델링</option></select></label>
                <label>지역<select name="region"><option value="seoul">서울</option><option value="gyeonggi">경기/인천</option><option value="local">지방</option><option value="jeju">제주</option></select></label>
                <label>마감등급<select name="finish_grade"><option value="economy">경제형</option><option value="standard" selected>표준형</option><option value="premium">고급형</option><option value="luxury">최고급형</option></select></label>
                <label>연면적<input type="number" name="area" min="1" step="1" required placeholder="㎡"></label>
                <label>지상층수<input type="number" name="floors" min="1" value="5"></label>
                <label>지하층수<input type="number" name="basement" min="0" value="1"></label>
                <button type="submit">산정하기</button>
            </div>
        </form>
        <div id="estimate-result" class="estimate-result"></div>

        <div class="calc-logic old-box">
            <h4>재구현 산정 로직</h4>
            <ol>
                <li>기준단가 = 구조 기준단가 × 건물종류 보정률 × 지역 보정률 × 마감등급 보정률</li>
                <li>직접공사비 = 연면적 × 기준단가</li>
                <li>층수/지하층 보정 = 직접공사비 × 보정률</li>
                <li>간접공사비 = 보정 직접공사비 × 규모별 간접비율</li>
                <li>총공사비 = 직접공사비 + 보정금액 + 간접비 + 부가세</li>
            </ol>
        </div>
    </section>
</div>
