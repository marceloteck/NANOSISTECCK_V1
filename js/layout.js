/* =============================================
   NANOSISTECCK – layout.js
   Layout compartilhado + configuração externa
   ============================================= */

(function () {
  const BASE = window.location.pathname.includes('/ferramentas/') ? '../' : '';

  const TOOLS = [
    { href: BASE + 'ferramentas/juros-simples.php', icon: '💰', title: 'Juros Simples' },
    { href: BASE + 'ferramentas/juros-compostos.php', icon: '📈', title: 'Juros Compostos' },
    { href: BASE + 'ferramentas/simulador-financiamento.php', icon: '🏠', title: 'Financiamento' },
    { href: BASE + 'ferramentas/calculadora-porcentagem.php', icon: '%', title: 'Porcentagem' },
    { href: BASE + 'ferramentas/calculadora-idade.php', icon: '🎂', title: 'Calculadora de Idade' },
    { href: BASE + 'ferramentas/gerador-nomes.php', icon: '👤', title: 'Gerador de Nomes' },
    { href: BASE + 'ferramentas/gerador-senhas.php', icon: '🔐', title: 'Gerador de Senhas' },
    { href: BASE + 'ferramentas/contador-caracteres.php', icon: '🔢', title: 'Contador de Caracteres' },
    { href: BASE + 'ferramentas/conversor-texto.php', icon: '🔄', title: 'Conversor de Texto' },
    { href: BASE + 'ferramentas/gerador-cpf.php', icon: '🪪', title: 'Gerador de CPF' },
  ];

  async function loadSettings() {
    try {
      const response = await fetch(BASE + 'config/site-settings.json', { cache: 'no-store' });
      if (!response.ok) throw new Error('Falha ao carregar configurações');
      return await response.json();
    } catch (error) {
      console.warn('Configuração externa indisponível:', error.message);
      return null;
    }
  }

  function renderHeader(settings) {
    const el = document.getElementById('site-header');
    if (!el) return;

    const siteName = settings?.branding?.site_name || 'NANOSISTECCK';
    el.innerHTML = `
      <div class="container">
        <div class="header-inner">
          <a href="${BASE}index.php" class="logo" aria-label="${siteName} Home">
            <div class="logo-icon">N</div>
            <span class="logo-text">NANO<span>SISTECCK</span></span>
          </a>
          <nav class="main-nav" id="main-nav" aria-label="Navegação principal">
            <a href="${BASE}index.php">Início</a>
            <a href="${BASE}ferramentas/index-ferramentas.php">Ferramentas</a>
            <a href="${BASE}index.php#sobre">Sobre</a>
            <a href="${BASE}admin.php">Admin</a>
            <a href="${BASE}index.php#contato" class="nav-cta btn">Contato</a>
          </nav>
          <button class="hamburger" id="hamburger" aria-label="Abrir menu" aria-expanded="false">☰</button>
        </div>
      </div>
    `;
  }

  function renderFooter(settings) {
    const el = document.getElementById('site-footer');
    if (!el) return;

    const brandDescription = settings?.branding?.description || 'Ecossistema de ferramentas digitais úteis, rápidas e inteligentes.';
    const toolLinks = TOOLS.map(t => `<a href="${t.href}">${t.icon} ${t.title}</a>`).join('');

    el.innerHTML = `
      <div class="container">
        <div class="footer-grid">
          <div class="footer-brand">
            <a href="${BASE}index.php" class="logo" style="color:#fff">
              <div class="logo-icon">N</div>
              <span class="logo-text">NANO<span style="color:var(--accent)">SISTECCK</span></span>
            </a>
            <p>${brandDescription}</p>
          </div>
          <div class="footer-col">
            <h4>Ferramentas</h4>
            ${toolLinks}
          </div>
          <div class="footer-col">
            <h4>Links</h4>
            <a href="${BASE}index.php">Início</a>
            <a href="${BASE}ferramentas/index-ferramentas.php">Todas as Ferramentas</a>
            <a href="${BASE}politica-privacidade.php">Privacidade</a>
            <a href="${BASE}termos-de-uso.php">Termos de Uso</a>
            <a href="${BASE}admin.php">Administrador</a>
          </div>
        </div>
        <div class="footer-bottom">
          <p>© ${new Date().getFullYear()} ${siteNameFromSettings(settings)}. Todos os direitos reservados.</p>
          <div class="footer-links">
            <a href="${BASE}sitemap.xml">Sitemap</a>
            <a href="${BASE}politica-privacidade.php">Privacidade</a>
          </div>
        </div>
      </div>
    `;
  }

  function siteNameFromSettings(settings) {
    return settings?.branding?.site_name || 'NANOSISTECCK';
  }

  function applyAdSlots(settings) {
    if (!settings?.ads) return;

    const adMap = {
      leaderboard: settings.ads.leaderboard,
      rectangle: settings.ads.rectangle,
    };

    Object.entries(adMap).forEach(([slotName, slotConfig]) => {
      if (!slotConfig) return;
      const selector = `.ad-slot-${slotName}`;
      document.querySelectorAll(selector).forEach((adNode) => {
        const html = (slotConfig.enabled && slotConfig.html) ? slotConfig.html : (slotConfig.fallback_text || 'Espaço para anúncio');
        adNode.innerHTML = html;
      });
    });
  }

  function setupHamburger() {
    const ham = document.getElementById('hamburger');
    const nav = document.getElementById('main-nav');
    if (!ham || !nav) return;

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

  document.addEventListener('DOMContentLoaded', async function () {
    const settings = await loadSettings();
    renderHeader(settings);
    renderFooter(settings);
    applyAdSlots(settings);
    setupHamburger();
  });
})();
