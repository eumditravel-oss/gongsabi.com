const fs = require('fs');
const path = require('path');

const root = path.resolve(__dirname, '..');
const publicSnapshotDir = path.join(root, 'resources', 'snapshots');
const adminSnapshotDir = path.join(root, 'resources', 'admin-snapshots');

const explicitRoutes = new Map([
  ['front__community.html', 'front/community'],
  ['front__community__gongsabi.html', 'front/community/gongsabi'],
  ['front__community__market.html', 'front/community/market'],
  ['front__community__partners.html', 'front/community/partners'],
  ['front__community__recruit.html', 'front/community/recruit'],
  ['front__company.html', 'front/company'],
  ['front__company__company1.html', 'front/company/company1'],
  ['front__company__company2.html', 'front/company/company2'],
  ['front__company__company3.html', 'front/company/company3'],
  ['front__company__company4.html', 'front/company/company4'],
  ['front__company__privacy.html', 'front/company/privacy'],
  ['front__company__term.html', 'front/company/term'],
  ['front__customer.html', 'front/customer'],
  ['front__customer__faq.html', 'front/customer/faq'],
  ['front__customer__notice.html', 'front/customer/notice'],
  ['front__customer__notice_view__21.html', 'front/customer/notice_view/21'],
  ['front__customer__notice_view__22.html', 'front/customer/notice_view/22'],
  ['front__customer__notice_view__23.html', 'front/customer/notice_view/23'],
  ['front__customer__notice_view__27.html', 'front/customer/notice_view/27'],
  ['front__customer__pds.html', 'front/customer/pds'],
  ['front__customer__qna.html', 'front/customer/qna'],
  ['front__data.html', 'front/data'],
  ['front__data__danga.html', 'front/data/danga'],
  ['front__data__goljo.html', 'front/data/goljo'],
  ['front__data__gongsabi.html', 'front/data/gongsabi'],
  ['front__education.html', 'front/education'],
  ['front__education__book.html', 'front/education/book'],
  ['front__education__lecture.html', 'front/education/lecture'],
  ['front__education__lecture_regist.html', 'front/education/lecture_regist'],
  ['front__education__youtube.html', 'front/education/youtube'],
  ['front__report.html', 'front/report'],
  ['front__report__ganjeob.html', 'front/report/ganjeob'],
  ['front__report__geonchuk.html', 'front/report/geonchuk'],
  ['front__report__gigan.html', 'front/report/gigan'],
  ['front__report__goljo.html', 'front/report/goljo'],
  ['front__auth__login.html', 'front/auth/login'],
  ['front__auth__regist.html', 'front/auth/regist'],
]);

function ensureDir(dir) {
  fs.mkdirSync(dir, { recursive: true });
}

function tidyText(text) {
  return text.replace(/\t/g, '    ').replace(/[ \t]+$/gm, '');
}

function removeDir(dir) {
  if (fs.existsSync(dir)) fs.rmSync(dir, { recursive: true, force: true });
}

function routeFromSnapshotName(fileName) {
  if (explicitRoutes.has(fileName)) return explicitRoutes.get(fileName);
  return fileName.replace(/\.html$/i, '').split('__').join('/');
}

function outputPathForRoute(route) {
  return path.join(root, ...route.split('/'), 'index.html');
}

function prefixForRoute(route) {
  const depth = route.split('/').filter(Boolean).length;
  return depth === 0 ? '' : '../'.repeat(depth);
}

function normalizeInternalRoute(value) {
  const clean = value.split('#')[0].split('?')[0].replace(/^\/+/, '');
  if (clean === '') return 'index.html';
  if (clean === 'admin') return 'admin/dashboard/';
  if (clean === 'front') return 'front/company/';
  return clean.endsWith('/') ? clean : `${clean}/`;
}

function rewriteInternalAttributes(html, attr, prefix) {
  return html.replace(new RegExp(`${attr}=([\"'])(/[^\"']*)\\1`, 'gi'), (match, quote, url) => {
    if (url.startsWith('/static/')) return `${attr}=${quote}${prefix}public/static/${url.slice('/static/'.length)}${quote}`;
    if (url.startsWith('/admin/assets/')) return `${attr}=${quote}${prefix}public/static/admin/assets/${url.slice('/admin/assets/'.length)}${quote}`;
    if (url === '/' || url === '') return `${attr}=${quote}${prefix}index.html${quote}`;
    if (url === '/admin' || url === '/admin/') return `${attr}=${quote}${prefix}admin/dashboard/${quote}`;
    if (url.startsWith('/front/') || url.startsWith('/admin/')) {
      if (/delete|download|modify|proc|logout|login_proc|order/i.test(url)) {
        return `${attr}=${quote}#${quote}`;
      }
      return `${attr}=${quote}${prefix}${normalizeInternalRoute(url)}${quote}`;
    }
    return match;
  });
}

function rewriteStaticHtml(raw, route, options = {}) {
  const prefix = prefixForRoute(route);
  let html = raw;

  html = html.replace(/<iframe\b[^>]*id=["']itemscout-extension-gtag["'][\s\S]*?<\/iframe>/gi, '');
  html = html.replace(/<div\b[^>]*id=["']its-image-search-container["'][^>]*><\/div>/gi, '');
  html = html.replace(/<div\b[^>]*id=["']its-image-crop-container["'][^>]*><\/div>/gi, '');
  html = html.replace(/<div\b[^>]*id=["']codex-agent-overlay-root["'][^>]*><\/div>/gi, '');
  html = html.replace(/<script\b[^>]*src=["']chrome-extension:[^>]*><\/script>/gi, '');
  html = html.replace(/<div\b[^>]*class=["'][^"']*\bimp-dialog\b[^"']*["'][\s\S]*?<div\b[^>]*class=["'][^"']*\bimp-header\b[^"']*["'][\s\S]*?<\/div>\s*<\/div>/gi, '');
  html = html.replace(/<link\s+rel=["']shortcut icon["']\s+href=["']data:image\/svg\+xml[^>]*>/i, '<link rel="shortcut icon" href="/static/img/favicon.ico">');
  html = html.replace(/<base\b[^>]*>\s*/gi, '');
  html = html.replace(/<div\b[^>]*style=["'][^"']*border:\s*1px\s+solid\s+#990000[^"']*["'][\s\S]*?<\/div>/gi, '');

  const cdnLinks = options.admin 
    ? `    <!-- Inject Admin Required CDNs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">`
    : `    <!-- Inject Front Required CDNs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <!-- Inject Modern Theme CSS -->
    <link rel="stylesheet" href="${prefix}public/static/front/css/b2b-platform.css">`;
  
  html = html.replace(/(<\/head>)/i, cdnLinks + '\n$1');

  html = html.replace(/["'](?:\/static\/front\/css\/style\.css|public\/static\/front\/css\/style\.css)\?[^"']*/gi, `"${prefix}public/static/front/css/style-pages.css`);
  html = html.replace(/["'](?:\/static\/css\/admin\/style\.css|public\/static\/css\/admin\/style\.css)\?[^"']*/gi, `"${prefix}public/static/css/admin/style-pages.css`);
  html = html.replace(/url\((['"]?)\/static\//gi, `url($1${prefix}public/static/`);
  html = html.replace(/url\((['"]?)\/admin\/assets\//gi, `url($1${prefix}public/static/admin/assets/`);
  html = html.replace(/(src|href)=(["'])assets\/images\/users\/[^"']+\2/gi, `$1=$2${prefix}public/static/img/logo_s.png$2`);
  html = rewriteInternalAttributes(html, 'href', prefix);
  html = rewriteInternalAttributes(html, 'src', prefix);
  html = rewriteInternalAttributes(html, 'action', prefix);

  html = html.replace(/action=(["'])[^"']*\1/gi, 'action="#"');
  html = html.replace(/<form\b(?![^>]*\bonsubmit=)/gi, '<form onsubmit="return false;"');
  html = html.replace(/<a\b([^>]*?)href=(["'])#\2/gi, '<a$1href="#"');

  if (options.admin) {
    html = html.replace(/(<body\b[^>]*>)/i, '$1\n    <div class="static-admin-note">정적 미리보기입니다. 버튼과 저장 동작은 비활성화되어 있습니다.</div>');
    html = html.replace(/(<\/head>)/i, '    <link rel="stylesheet" href="' + prefix + 'public/static/css/admin/static-preview.css">\n$1');
    html = html.replace(/<div class="static-admin-note">[\s\S]*?<\/div>/, '<div class="static-admin-note">정적 미리보기입니다. 버튼과 저장 동작은 비활성화되어 있습니다.</div>');
  } else {
    const cdnScripts = `
    <!-- Inject Front Required JS CDNs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>`;
    html = html.replace(/<script\b[^>]*src=["'][^"']*static-preview\.js["'][^>]*><\/script>\s*/gi, '');
    html = html.replace(/(<\/body>)/i, cdnScripts + '\n    <script src="' + prefix + 'public/static/front/js/static-preview.js"></script>\n$1');
  }

  return html;
}

function writeRoute(route, html) {
  const outFile = outputPathForRoute(route);
  ensureDir(path.dirname(outFile));
  fs.writeFileSync(outFile, tidyText(html), 'utf8');
}

function buildCssCopies() {
  const frontStyle = path.join(root, 'public', 'static', 'front', 'css', 'style.css');
  const frontPagesStyle = path.join(root, 'public', 'static', 'front', 'css', 'style-pages.css');
  if (fs.existsSync(frontStyle)) {
    const previewFixes = [
      '',
      '/* Static preview fixes */',
      '.modal_content .modal_footer > div.modal_close{text-align:right!important;}',
      '.modal_content .modal_footer > div.modal_close a{display:inline-flex!important;align-items:center;justify-content:center;min-width:58px;height:28px;margin-top:6px;border:1px solid rgba(255,255,255,.85);border-radius:2px;background:rgba(255,255,255,.1);color:#fff!important;font-size:14px!important;line-height:26px!important;text-indent:0!important;text-decoration:none!important;}',
      '.modal_content .modal_footer > div.modal_close a:hover{background:rgba(255,255,255,.2);}',
    ].join('\n');
    const css = fs.readFileSync(frontStyle, 'utf8').replace(/\/static\//g, '../../') + previewFixes;
    fs.writeFileSync(frontPagesStyle, tidyText(css), 'utf8');
  }

  const adminStyle = path.join(root, 'public', 'static', 'css', 'admin', 'style.css');
  const adminPagesStyle = path.join(root, 'public', 'static', 'css', 'admin', 'style-pages.css');
  if (fs.existsSync(adminStyle)) {
    const css = fs.readFileSync(adminStyle, 'utf8').replace(/\/static\//g, '../../').replace(/\/admin\/assets\//g, '../../admin/assets/');
    ensureDir(path.dirname(adminPagesStyle));
    fs.writeFileSync(adminPagesStyle, tidyText(css), 'utf8');
  }

  const staticPreviewCss = path.join(root, 'public', 'static', 'css', 'admin', 'static-preview.css');
  ensureDir(path.dirname(staticPreviewCss));
  fs.writeFileSync(staticPreviewCss, tidyText([
    '.static-admin-note{position:fixed;right:16px;bottom:16px;z-index:9999;background:#323a46;color:#fff;border-radius:4px;padding:8px 12px;font-size:12px;box-shadow:0 3px 12px rgba(0,0,0,.18)}',
    'a[href="#"]{cursor:default}',
    '.btn[href="#"]{pointer-events:none}',
  ].join('\n')), 'utf8');

  const frontPreviewJs = path.join(root, 'public', 'static', 'front', 'js', 'static-preview.js');
  ensureDir(path.dirname(frontPreviewJs));
  fs.writeFileSync(frontPreviewJs, tidyText(`(function () {
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
      alert('정적 미리보기 사이트에서는 데이터베이스 검색 기능이 지원되지 않습니다.\\n실제 검색을 위해서는 웹 서버 환경이 필요합니다.');
      return;
    }
  });
}());
`), 'utf8');
}

function buildPublicPages() {
  const indexPath = path.join(root, 'index.html');
  if (fs.existsSync(indexPath)) {
    const rawIndex = fs.readFileSync(indexPath, 'utf8');
    fs.writeFileSync(indexPath, tidyText(rewriteStaticHtml(rawIndex, '')), 'utf8');
  }

  for (const file of fs.readdirSync(publicSnapshotDir).filter((name) => name.endsWith('.html'))) {
    const route = routeFromSnapshotName(file);
    const raw = fs.readFileSync(path.join(publicSnapshotDir, file), 'utf8');
    writeRoute(route, rewriteStaticHtml(raw, route));
  }
}

function buildAdminPages() {
  if (!fs.existsSync(adminSnapshotDir)) return;
  for (const file of fs.readdirSync(adminSnapshotDir).filter((name) => name.endsWith('.html'))) {
    const route = routeFromSnapshotName(file);
    const raw = fs.readFileSync(path.join(adminSnapshotDir, file), 'utf8');
    writeRoute(route, rewriteStaticHtml(raw, route, { admin: true }));
  }

  const dashboardSnapshot = path.join(adminSnapshotDir, 'admin__dashboard.html');
  if (fs.existsSync(dashboardSnapshot)) {
    const raw = fs.readFileSync(dashboardSnapshot, 'utf8');
    writeRoute('admin', rewriteStaticHtml(raw, 'admin', { admin: true }));
  }
}

removeDir(path.join(root, 'front'));
removeDir(path.join(root, 'admin'));
buildCssCopies();
buildPublicPages();
buildAdminPages();

console.log('Static preview pages generated.');
