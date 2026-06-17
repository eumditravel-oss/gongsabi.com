(function () {
  function hideModal(closeLink) {
    var modal = closeLink && closeLink.closest ? closeLink.closest('.modal_content') : null;
    if (modal) modal.style.display = 'none';
    var wrapper = document.querySelector('.modal_content_wrapper');
    if (wrapper) wrapper.style.display = 'none';
  }

  window.close_modal = function (el) {
    hideModal(el);
    return false;
  };

  document.addEventListener('click', function (event) {
    var closeLink = event.target.closest ? event.target.closest('.modal_close a') : null;
    if (closeLink) {
      event.preventDefault();
      hideModal(closeLink);
      return;
    }

    var searchBtn = event.target.closest ? event.target.closest('button[type="submit"], input[type="submit"], .btn-search') : null;
    if (searchBtn || (event.target.innerText && (event.target.innerText.trim() === '검색' || event.target.innerText.trim() === '공사비 검색'))) {
      event.preventDefault();
      alert('정적 미리보기 사이트에서는 데이터베이스 검색 기능이 지원되지 않습니다.\n실제 검색을 위해서는 웹 서버 환경이 필요합니다.');
      return;
    }
  });
}());
