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

    // Toggle Megamenu for mobile
    var mobileBtn = event.target.closest ? event.target.closest('.b2b-mobile-menu-btn') : null;
    if (mobileBtn) {
       var nav = document.querySelector('.b2b-nav');
       if(nav) {
          nav.style.display = (nav.style.display === 'flex' ? 'none' : 'flex');
          nav.style.flexDirection = 'column';
          nav.style.position = 'absolute';
          nav.style.top = '80px';
          nav.style.left = '0';
          nav.style.width = '100%';
          nav.style.background = '#fff';
          nav.style.padding = '20px';
          nav.style.borderBottom = '1px solid #E2E8F0';
       }
    }
  });
}());
