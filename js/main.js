/* =============================================
   NANOSISTECCK – main.js
   Componentes globais (header, footer, nav)
   ============================================= */

/* ------ Hamburger menu ------ */
(function () {
  document.addEventListener('DOMContentLoaded', function () {
    const ham = document.getElementById('hamburger');
    const nav = document.getElementById('main-nav');
    if (ham && nav) {
      ham.addEventListener('click', function () {
        nav.classList.toggle('open');
        ham.setAttribute('aria-expanded', nav.classList.contains('open'));
      });
      document.addEventListener('click', function (e) {
        if (!ham.contains(e.target) && !nav.contains(e.target)) {
          nav.classList.remove('open');
          ham.setAttribute('aria-expanded', 'false');
        }
      });
    }

    /* Active nav link */
    const path = window.location.pathname;
    document.querySelectorAll('.main-nav a').forEach(function (a) {
      if (a.getAttribute('href') && path.includes(a.getAttribute('href').replace('.html', ''))) {
        a.classList.add('active');
      }
    });
  });
})();

/* ------ Copy to clipboard utility ------ */
function copyToClipboard(text, btn) {
  navigator.clipboard.writeText(text).then(function () {
    if (btn) {
      const orig = btn.innerHTML;
      btn.innerHTML = '✓ Copiado!';
      btn.classList.add('copied');
      setTimeout(function () {
        btn.innerHTML = orig;
        btn.classList.remove('copied');
      }, 2000);
    }
  }).catch(function () {
    const ta = document.createElement('textarea');
    ta.value = text;
    document.body.appendChild(ta);
    ta.select();
    document.execCommand('copy');
    document.body.removeChild(ta);
  });
}

/* ------ Format number (BR) ------ */
function fmtBRL(n) {
  return Number(n).toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}
function fmtNum(n, decimals) {
  return Number(n).toLocaleString('pt-BR', { minimumFractionDigits: decimals || 0, maximumFractionDigits: decimals || 2 });
}

/* ------ Show result ------ */
function showResult(boxId) {
  const box = document.getElementById(boxId);
  if (box) { box.classList.add('show'); box.scrollIntoView({ behavior: 'smooth', block: 'nearest' }); }
}
