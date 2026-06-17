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

// v7: 메인 비주얼과 하단 배너를 원본처럼 우측→좌측 자동 슬라이드로 동작시킴
(function () {
  function setupLoopSlider(root, trackSelector, slideSelector, prevSelector, nextSelector) {
    if (!root) return;
    const track = root.querySelector(trackSelector);
    if (!track) return;
    let slides = Array.from(track.querySelectorAll(slideSelector));
    if (slides.length <= 1) return;

    const firstClone = slides[0].cloneNode(true);
    firstClone.setAttribute('aria-hidden', 'true');
    track.appendChild(firstClone);
    slides = Array.from(track.querySelectorAll(slideSelector));

    let index = 0;
    let timer = null;
    const interval = Number(root.dataset.interval || 5000);

    function move(toIndex, withTransition) {
      if (!withTransition) track.classList.add('no-transition');
      else track.classList.remove('no-transition');
      index = toIndex;
      track.style.transform = 'translateX(' + (-100 * index) + '%)';
      if (!withTransition) {
        track.offsetHeight;
        track.classList.remove('no-transition');
      }
    }

    function next() { move(index + 1, true); }
    function prev() {
      if (index === 0) {
        move(slides.length - 1, false);
        requestAnimationFrame(() => requestAnimationFrame(() => move(slides.length - 2, true)));
      } else {
        move(index - 1, true);
      }
    }
    function restart() {
      if (timer) clearInterval(timer);
      timer = setInterval(next, interval);
    }

    track.addEventListener('transitionend', () => {
      if (index === slides.length - 1) move(0, false);
    });

    const nextBtn = nextSelector ? root.querySelector(nextSelector) : null;
    const prevBtn = prevSelector ? root.querySelector(prevSelector) : null;
    if (nextBtn) nextBtn.addEventListener('click', () => { next(); restart(); });
    if (prevBtn) prevBtn.addEventListener('click', () => { prev(); restart(); });

    root.addEventListener('mouseenter', () => { if (timer) clearInterval(timer); });
    root.addEventListener('mouseleave', restart);
    move(0, false);
    restart();
  }

  document.addEventListener('DOMContentLoaded', () => {
    setupLoopSlider(document.querySelector('[data-slider="hero"]'), '.gs-visual-track', '.gs-visual-slide');
    setupLoopSlider(document.querySelector('[data-slider="banner"]'), '.gs-banner-track', '.gs-banner-slide', '.gs-banner-prev', '.gs-banner-next');
  });
})();
