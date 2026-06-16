<?php
$active = $reportType ?? 'geonchuk';
$labels = [
    'geonchuk' => ['건축 내역서 작성', '정확한 수량산출을 바탕으로 한 산출서, 내역서, 공사비 비교 자료를 제공합니다.'],
    'goljo' => ['골조 내역서 작성', '비교할 수 있는 골조내역서를 제공합니다.'],
    'gigan' => ['공사기간 산정', '관계법령과 기준, 건설기준, 산업안전보건 및 환경기준 등을 고려한 공사기간 산정 서비스입니다.'],
    'ganjeob' => ['간접 공사비 계산', '건물 종류별 간접 공사비를 계산해주는 서비스입니다.'],
];
[$heading, $lead] = $labels[$active] ?? [$serviceName, '공사비 관련 서비스를 제공합니다.'];
?>
<section class="sub-visual"><div class="wrap"><p>REPORT</p><h2>보고서</h2></div></section>
<div class="wrap sub-layout">
    <aside class="lnb"><h3>보고서</h3><a class="<?= $active === 'geonchuk' ? 'on' : '' ?>" href="/front/report/geonchuk">건축 내역서 작성</a><a class="<?= $active === 'goljo' ? 'on' : '' ?>" href="/front/report/goljo">골조 내역서 작성</a><a class="<?= $active === 'gigan' ? 'on' : '' ?>" href="/front/report/gigan">공사기간 산정</a><a class="<?= $active === 'ganjeob' ? 'on' : '' ?>" href="/front/report/ganjeob">간접 공사비 계산</a></aside>
    <section class="sub-content">
        <div class="content-title"><h1><?= e($heading) ?></h1><p><?= e($lead) ?></p></div>
        <div class="ready-box">
            <h2>서비스 오픈 준비중 입니다.</h2>
            <p><?= e($lead) ?></p>
            <?php if ($active === 'ganjeob'): ?><p class="warn">현재 휴대폰결제가 불가능합니다.</p><?php endif; ?>
        </div>
        <details class="restore-logic">
            <summary>복원용 임시 산정 로직 확인</summary>
            <p>원본 DB와 산정식이 없는 상태에서 운영 테스트를 위해 넣은 임시 계산기입니다. 실제 운영 전 기존 DB 백업 또는 검증된 단가표로 교체해야 합니다.</p>
            <form class="form-panel report-form">
                <?= csrf_field() ?>
                <input type="hidden" name="report_type" value="<?= e($reportType) ?>">
                <label>연면적(㎡)<input type="number" min="1" step="0.1" name="area" value="330" required></label>
                <label>층수<input type="number" min="1" name="floors" value="3" required></label>
                <label>구조<select name="structure"><option value="reinforced_concrete">철근콘크리트</option><option value="steel">철골조</option><option value="wood">목구조</option><option value="remodeling">리모델링</option></select></label>
                <label>마감 등급<select name="finish_grade"><option value="economy">경제형</option><option value="standard" selected>표준형</option><option value="premium">고급형</option></select></label>
                <label>지역<select name="region"><option value="seoul">서울</option><option value="metro">수도권</option><option value="local">지방</option><option value="jeju">제주</option></select></label>
                <button type="submit" class="btn primary">산정하기</button>
            </form>
            <div class="result-panel" id="estimate-result"><h2>공사비 상세</h2><dl><div><dt>단가</dt><dd>-</dd></div><div><dt>직접공사비</dt><dd>-</dd></div><div><dt>층수 보정</dt><dd>-</dd></div><div><dt>간접비</dt><dd>-</dd></div><div><dt>부가세</dt><dd>-</dd></div><div><dt>총 공사비</dt><dd>-</dd></div></dl></div>
        </details>
    </section>
</div>
