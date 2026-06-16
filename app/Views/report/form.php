<section class="page-title">
    <p>REPORT</p>
    <h1><?= e($serviceName) ?></h1>
    <span>공개 화면 흐름을 기준으로 새 DB에 산정 이력을 저장합니다.</span>
</section>

<section class="calculator-layout">
    <form class="form-panel report-form">
        <?= csrf_field() ?>
        <input type="hidden" name="report_type" value="<?= e($reportType) ?>">
        <label>
            연면적(㎡)
            <input type="number" min="1" step="0.1" name="area" value="330" required>
        </label>
        <label>
            층수
            <input type="number" min="1" name="floors" value="3" required>
        </label>
        <label>
            구조
            <select name="structure">
                <option value="reinforced_concrete">철근콘크리트</option>
                <option value="steel">철골조</option>
                <option value="wood">목구조</option>
                <option value="remodeling">리모델링</option>
            </select>
        </label>
        <label>
            마감 등급
            <select name="finish_grade">
                <option value="economy">경제형</option>
                <option value="standard" selected>표준형</option>
                <option value="premium">고급형</option>
            </select>
        </label>
        <label>
            지역
            <select name="region">
                <option value="seoul">서울</option>
                <option value="metro">수도권</option>
                <option value="local">지방</option>
                <option value="jeju">제주</option>
            </select>
        </label>
        <button type="submit" class="btn primary">산정하기</button>
    </form>
    <div class="result-panel" id="estimate-result">
        <h2>공사비 상세</h2>
        <dl>
            <div><dt>단가</dt><dd>-</dd></div>
            <div><dt>직접공사비</dt><dd>-</dd></div>
            <div><dt>간접비</dt><dd>-</dd></div>
            <div><dt>부가세</dt><dd>-</dd></div>
            <div><dt>총 공사비</dt><dd>-</dd></div>
        </dl>
    </div>
</section>
