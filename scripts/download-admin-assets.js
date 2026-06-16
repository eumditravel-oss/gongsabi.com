const fs = require('fs');
const http = require('http');
const https = require('https');
const path = require('path');
const { URL } = require('url');

const root = path.resolve(__dirname, '..');
const origin = 'http://www.gongsabi.com';
const seen = new Set();

const initialAssets = [
  '/static/img/logo_s.png',
  '/static/admin/assets/css/bootstrap.min.css',
  '/static/admin/assets/css/icons.min.css',
  '/static/admin/assets/css/app.min.css',
  '/static/css/admin/style.css?version=1781593645',
  '/static/admin/assets/js/vendor.min.js',
  '/static/admin/assets/libs/jquery-knob/jquery.knob.min.js',
  '/static/admin/assets/libs/peity/jquery.peity.min.js',
  '/static/admin/assets/libs/jquery-sparkline/jquery.sparkline.min.js',
  '/static/admin/assets/js/pages/dashboard-1.init.js',
  '/static/admin/assets/js/app.min.js',
  '/static/js/admin.js',
  '/admin/assets/images/users/avatar-1.jpg',
  '/admin/assets/images/users/avatar-2.jpg',
  '/admin/assets/images/users/avatar-3.jpg',
  '/admin/assets/images/users/avatar-4.jpg',
  '/admin/assets/images/users/avatar-5.jpg',
  '/admin/assets/images/users/avatar-6.jpg',
  '/admin/assets/images/users/avatar-7.jpg',
  '/admin/assets/images/users/avatar-9.jpg',
  '/admin/assets/images/users/avatar-10.jpg',
];

function toAbsoluteUrl(value, base = origin) {
  return new URL(value, base).toString();
}

function targetPathFor(urlString) {
  const url = new URL(urlString);
  let pathname = decodeURIComponent(url.pathname);
  let rel;
  if (pathname.startsWith('/static/')) {
    rel = pathname.slice('/static/'.length);
  } else if (pathname.startsWith('/admin/assets/')) {
    rel = `admin/assets/${pathname.slice('/admin/assets/'.length)}`;
  } else {
    rel = `external/${pathname.replace(/^\/+/, '')}`;
  }
  return path.join(root, 'public', 'static', ...rel.split('/'));
}

function request(urlString) {
  return new Promise((resolve, reject) => {
    const client = urlString.startsWith('https:') ? https : http;
    client
      .get(urlString, (res) => {
        if (res.statusCode >= 300 && res.statusCode < 400 && res.headers.location) {
          resolve(request(toAbsoluteUrl(res.headers.location, urlString)));
          return;
        }
        if (res.statusCode !== 200) {
          console.warn(`skipped ${res.statusCode} ${urlString}`);
          res.resume();
          resolve(null);
          return;
        }
        const chunks = [];
        res.on('data', (chunk) => chunks.push(chunk));
        res.on('end', () => resolve(Buffer.concat(chunks)));
      })
      .on('error', reject);
  });
}

function cssUrls(css, baseUrl) {
  const urls = [];
  css.replace(/url\((['"]?)(?!data:|#)([^'")]+)\1\)/gi, (_match, _quote, value) => {
    urls.push(toAbsoluteUrl(value.trim(), baseUrl));
    return _match;
  });
  return urls;
}

async function download(urlString) {
  const absoluteUrl = toAbsoluteUrl(urlString);
  if (new URL(absoluteUrl).origin !== origin) {
    console.warn(`skipped external ${absoluteUrl}`);
    return;
  }
  const cacheKey = absoluteUrl.split('#')[0];
  if (seen.has(cacheKey)) return;
  seen.add(cacheKey);

  const filePath = targetPathFor(absoluteUrl);
  const bytes = await request(absoluteUrl);
  if (!bytes) return;
  fs.mkdirSync(path.dirname(filePath), { recursive: true });
  fs.writeFileSync(filePath, bytes);
  console.log(`downloaded ${absoluteUrl}`);

  if (/\.css(?:\?|$)/i.test(absoluteUrl)) {
    const css = bytes.toString('utf8');
    for (const nested of cssUrls(css, absoluteUrl)) {
      await download(nested);
    }
  }
}

(async () => {
  for (const asset of initialAssets) {
    await download(asset);
  }
})().catch((error) => {
  console.error(error.message);
  process.exit(1);
});
