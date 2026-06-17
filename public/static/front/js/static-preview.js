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
    if (!closeLink) return;
    event.preventDefault();
    hideModal(closeLink);
  });
}());
