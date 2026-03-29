/* =============================================
   NANOSISTECCK – layout.js
   Injeta Header e Footer em todas as páginas
   ============================================= */

(function () {

  const BASE = (function () {
    const depth = (document.currentScript ? document.currentScript.src : '').split('/').length;
    // Se estiver em subpasta, ajusta o path relativo
    const path = window.location.pathname;
    if (path.includes('/ferramentas/')) return '../';
    return '';
  })();

  const TOOLS = [
    { href: BASE + 'ferramentas/juros-simples.html',       icon: '💰', title: 'Juros Simples' },
    { href: BASE + 'ferramentas/juros-compostos.html',     icon: '📈', title: 'Juros Compostos' },
    { href: BASE + 'ferramentas/simulador-financiamento.html', icon: '🏠', title: 'Financiamento' },
    { href: BASE + 'ferramentas/calculadora-porcentagem.html', icon: '%',  title: 'Porcentagem' },
    { href: BASE + 'ferramentas/calculadora-idade.html',   icon: '🎂', title: 'Calculadora de Idade' },
    { href: BASE + 'ferramentas/gerador-nomes.html',       icon: '👤', title: 'Gerador de Nomes' },
    { href: BASE + 'ferramentas/gerador-senhas.html',      icon: '🔐', title: 'Gerador de Senhas' },
    { href: BASE + 'ferramentas/contador-caracteres.html', icon: '🔢', title: 'Contador de Caracteres' },
    { href: BASE + 'ferramentas/conversor-texto.html',     icon: '🔄', title: 'Conversor de Texto' },
    { href: BASE + 'ferramentas/gerador-cpf.html',         icon: '🪪', title: 'Gerador de CPF' },
  ];

  /* ---- HEADER ---- */
  function renderHeader() {
    const el = document.getElementById('site-header');
    if (!el) return;

    const dropItems = TOOLS.slice(0, 6).map(t =>
      `<a href="${t.href}">${t.icon} ${t.title}</a>`
    ).join('');

    el.innerHTML = `
      <div class="container">
        <div class="header-inner">
          <a href="${BASE}index.html" class="logo" aria-label="NANOSISTECCK Home">
            <div class="logo-icon">N</div>
            <span class="logo-text">NANO<span>SISTECCK</span></span>
          </a>
          <nav class="main-nav" id="main-nav" aria-label="Navegação principal">
            <a href="${BASE}index.html">Início</a>
            <a href="${BASE}ferramentas/index-ferramentas.html">Ferramentas</a>
            <a href="${BASE}index.html#sobre">Sobre</a>
            <a href="${BASE}index.html#contato" class="nav-cta btn">Contato</a>
          </nav>
          <button class="hamburger" id="hamburger" aria-label="Abrir menu" aria-expanded="false">☰</button>
        </div>
      </div>
    `;
  }

  /* ---- FOOTER ---- */
  function renderFooter() {
    const el = document.getElementById('site-footer');
    if (!el) return;

    const toolLinks = TOOLS.map(t =>
      `<a href="${t.href}">${t.icon} ${t.title}</a>`
    ).join('');

    el.innerHTML = `
      <div class="container">
        <div class="footer-grid">
          <div class="footer-brand">
            <a href="${BASE}index.html" class="logo" style="color:#fff">
              <div class="logo-icon">N</div>
              <span class="logo-text">NANO<span style="color:var(--accent)">SISTECCK</span></span>
            </a>
            <p>Ecossistema de ferramentas digitais úteis, rápidas e inteligentes. Ativos digitais que geram valor real.</p>
          </div>
          <div class="footer-col">
            <h4>Ferramentas</h4>
            ${toolLinks}
          </div>
          <div class="footer-col">
            <h4>Links</h4>
            <a href="${BASE}index.html">Início</a>
            <a href="${BASE}ferramentas/index-ferramentas.html">Todas as Ferramentas</a>
            <a href="${BASE}index.html#sobre">Sobre</a>
            <a href="${BASE}politica-privacidade.html">Privacidade</a>
            <a href="${BASE}termos-de-uso.html">Termos de Uso</a>
          </div>
        </div>
        <div class="footer-bottom">
          <p>© ${new Date().getFullYear()} NANOSISTECCK. Todos os direitos reservados.</p>
          <div class="footer-links">
            <a href="${BASE}sitemap.xml">Sitemap</a>
            <a href="${BASE}politica-privacidade.html">Privacidade</a>
          </div>
        </div>
      </div>
    `;
  }

  document.addEventListener('DOMContentLoaded', function () {
    renderHeader();
    renderFooter();

    /* Hamburger */
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
        }
      });
    }
  });

})();
