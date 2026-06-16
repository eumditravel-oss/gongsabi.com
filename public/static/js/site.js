document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('[data-scrap]').forEach((el) => {
    el.addEventListener('click', (event) => {
      event.preventDefault();
      alert('스크랩 내용은 마이페이지 > 공사비검색에서 보실 수 있습니다.');
    });
  });

  const reportForm = document.querySelector('.report-form');
  if (reportForm) {
    reportForm.addEventListener('submit', async (event) => {
      event.preventDefault();
      const result = document.querySelector('#estimate-result');
      if (!result) return;
      const formData = new FormData(reportForm);
      try {
        const response = await fetch('/front/report/estimate', { method: 'POST', body: formData });
        const data = await response.json();
        if (!data.ok) throw new Error(data.message || '산정 실패');
        const r = data.result;
        const fmt = (value) => new Intl.NumberFormat('ko-KR').format(Math.round(Number(value || 0))) + '원';
        result.innerHTML = `<h2>공사비 상세</h2><dl>
          <div><dt>단가</dt><dd>${fmt(r.unit_price)}</dd></div>
          <div><dt>직접공사비</dt><dd>${fmt(r.direct_cost)}</dd></div>
          <div><dt>층수 보정</dt><dd>${r.floor_factor}</dd></div>
          <div><dt>간접비</dt><dd>${fmt(r.indirect_cost)}</dd></div>
          <div><dt>부가세</dt><dd>${fmt(r.vat)}</dd></div>
          <div><dt>총 공사비</dt><dd>${fmt(r.total_cost)}</dd></div>
          <div><dt>예상 공사기간</dt><dd>${r.duration_months}개월</dd></div>
        </dl>`;
      } catch (error) {
        result.innerHTML = `<h2>오류</h2><p>${error.message}</p>`;
      }
    });
  }
});
