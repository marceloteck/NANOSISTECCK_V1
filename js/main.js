/* =============================================
   NANOSISTECCK – main.js
   Utilitários globais reutilizados
   ============================================= */

(function markActiveLink() {
  document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
      const current = window.location.pathname;
      document.querySelectorAll('.main-nav a').forEach(function (link) {
        const href = link.getAttribute('href') || '';
        if (!href) return;
        const cleanHref = href.replace(/index\.php$/, '').replace(/\/$/, '');
        const cleanCurrent = current.replace(/index\.php$/, '').replace(/\/$/, '');
        if (cleanHref && cleanCurrent.endsWith(cleanHref)) {
          link.classList.add('active');
        }
      });
    }, 50);
  });
})();

function copyToClipboard(text, btn) {
  navigator.clipboard.writeText(text).then(function () {
    if (!btn) return;
    const original = btn.innerHTML;
    btn.innerHTML = '✓ Copiado!';
    btn.classList.add('copied');
    setTimeout(function () {
      btn.innerHTML = original;
      btn.classList.remove('copied');
    }, 2000);
  }).catch(function () {
    const ta = document.createElement('textarea');
    ta.value = text;
    document.body.appendChild(ta);
    ta.select();
    document.execCommand('copy');
    document.body.removeChild(ta);
  });
}

function fmtBRL(n) {
  return Number(n).toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}

function fmtNum(n, decimals) {
  return Number(n).toLocaleString('pt-BR', {
    minimumFractionDigits: decimals || 0,
    maximumFractionDigits: decimals || 2,
  });
}

function showResult(boxId) {
  const box = document.getElementById(boxId);
  if (!box) return;
  box.classList.add('show');
  box.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
