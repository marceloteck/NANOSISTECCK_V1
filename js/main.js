document.addEventListener('DOMContentLoaded', function () {
  var hamburger = document.getElementById('hamburger');
  var nav = document.getElementById('main-nav');

  if (hamburger && nav) {
    hamburger.addEventListener('click', function () {
      var isOpen = nav.classList.toggle('open');
      hamburger.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });

    document.addEventListener('click', function (event) {
      if (!hamburger.contains(event.target) && !nav.contains(event.target)) {
        nav.classList.remove('open');
        hamburger.setAttribute('aria-expanded', 'false');
      }
    });
  }
});

function copyToClipboard(text, btn) {
  navigator.clipboard.writeText(text).then(function () {
    if (!btn) {
      return;
    }

    var original = btn.innerHTML;
    btn.innerHTML = '✓ Copiado!';
    btn.classList.add('copied');

    setTimeout(function () {
      btn.innerHTML = original;
      btn.classList.remove('copied');
    }, 2000);
  }).catch(function () {
    var ta = document.createElement('textarea');
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
  var box = document.getElementById(boxId);
  if (!box) {
    return;
  }

  box.classList.add('show');
  box.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
