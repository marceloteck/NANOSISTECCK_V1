<?php

declare(strict_types=1);

require_once __DIR__ . '/config/bootstrap.php';

ns_redirect_legacy_url('/');

$tools = array_values(ns_tools());
$featuredTools = array_slice($tools, 0, 10);

ns_render_page_start('home');
?>
<main>
  <section class="hero" aria-label="Apresentação">
    <div class="container">
      <div class="hero-grid">
        <div class="hero-content">
          <div class="hero-badge">
            <span>⚡</span> <?= count($tools) ?> Ferramentas gratuitas
          </div>
          <h1>Ferramentas online<br><span>rápidas, úteis e profissionais</span></h1>
          <p>Calculadoras financeiras, geradores e conversores prontos para uso imediato. Tudo com foco em velocidade, mobile-first e experiência limpa.</p>
          <div class="hero-actions">
            <a href="<?= ns_escape(ns_href('/ferramentas')) ?>" class="btn btn-primary btn-lg">Ver ferramentas</a>
            <a href="<?= ns_escape(ns_href('/ferramentas')) ?>" class="btn btn-secondary btn-lg">Catálogo completo</a>
          </div>
        </div>

        <div class="hero-visual" aria-hidden="true">
          <?php foreach (array_slice($featuredTools, 0, 4) as $tool): ?>
            <div class="hero-card">
              <div class="hero-card-icon"><?= ns_escape($tool['icon']) ?></div>
              <div>
                <div class="hero-card-text"><?= ns_escape($tool['short_name']) ?></div>
                <div class="hero-card-sub"><?= ns_escape($tool['category']) ?></div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <div class="stats-bar" aria-label="Estatísticas">
    <div class="container">
      <div class="stats-inner">
        <div class="stat-item">
          <span class="stat-num"><?= count($tools) ?>+</span>
          <span class="stat-label">Ferramentas</span>
        </div>
        <div class="stat-item">
          <span class="stat-num">100%</span>
          <span class="stat-label">Gratuito</span>
        </div>
        <div class="stat-item">
          <span class="stat-num">0</span>
          <span class="stat-label">Cadastros</span>
        </div>
        <div class="stat-item">
          <span class="stat-num">&lt;2s</span>
          <span class="stat-label">Meta de carga</span>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <?php ns_render_ad_slot('leaderboard'); ?>
  </div>

  <section class="section section--alt" id="ferramentas" aria-labelledby="tools-heading">
    <div class="container">
      <div class="section-header">
        <span class="section-eyebrow">Ferramentas</span>
        <h2 id="tools-heading">Catálogo técnico preparado para crescer</h2>
        <p>Cada ferramenta agora nasce dentro de uma base comum de SEO, schema, canonical e URLs limpas. Isso reduz erro humano e acelera futuras entregas.</p>
      </div>

      <div class="tools-grid">
        <?php foreach ($featuredTools as $tool): ?>
          <a href="<?= ns_escape(ns_href('/ferramentas/' . $tool['slug'])) ?>" class="tool-card" aria-label="<?= ns_escape($tool['name']) ?>">
            <div class="tool-card-icon" style="background:<?= ns_escape($tool['gradient']) ?>"><?= ns_escape($tool['icon']) ?></div>
            <div>
              <div class="tool-card-title"><?= ns_escape($tool['name']) ?></div>
              <div class="tool-card-desc"><?= ns_escape($tool['excerpt']) ?></div>
              <span class="tool-card-tag"><?= ns_escape($tool['category']) ?></span>
            </div>
          </a>
        <?php endforeach; ?>
      </div>

      <div style="text-align:center; margin-top:2.5rem;">
        <a href="<?= ns_escape(ns_href('/ferramentas')) ?>" class="btn btn-outline btn-lg">Ver todas as ferramentas</a>
      </div>
    </div>
  </section>

  <div class="container">
    <?php ns_render_ad_slot('rectangle'); ?>
  </div>

  <section class="section" id="sobre" aria-labelledby="about-heading">
    <div class="container">
      <div style="max-width:760px; margin:0 auto;">
        <span class="section-eyebrow">Sobre o projeto</span>
        <h2 id="about-heading">SEO técnico, UX estável e manutenção previsível</h2>
        <p style="margin:.85rem 0 1.5rem; font-size:1.05rem; color:var(--text2);">
          O <strong>NANOSISTECCK Tools</strong> foi reorganizado para entregar performance, rastreabilidade e gestão centralizada. O público enxerga páginas rápidas; o admin controla branding e meta tags sem retrabalho.
        </p>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:1.25rem; margin-top:2rem;">
          <div style="background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);padding:1.5rem;">
            <div style="font-size:1.8rem;margin-bottom:.5rem;">⚡</div>
            <h3 style="font-size:1rem;margin-bottom:.4rem;">Carregamento enxuto</h3>
            <p style="font-size:.88rem;">Header e footer saem direto do PHP, sem depender de injeção via JavaScript para o conteúdo estrutural.</p>
          </div>
          <div style="background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);padding:1.5rem;">
            <div style="font-size:1.8rem;margin-bottom:.5rem;">🔎</div>
            <h3 style="font-size:1rem;margin-bottom:.4rem;">SEO completo</h3>
            <p style="font-size:.88rem;">Canonical, Open Graph, Twitter Card, JSON-LD e sitemap dinâmico alinhados com as páginas reais.</p>
          </div>
          <div style="background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);padding:1.5rem;">
            <div style="font-size:1.8rem;margin-bottom:.5rem;">📱</div>
            <h3 style="font-size:1rem;margin-bottom:.4rem;">Mobile first</h3>
            <p style="font-size:.88rem;">Grid, menu e navegação foram mantidos responsivos para preservar a experiência em telas pequenas.</p>
          </div>
          <div style="background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);padding:1.5rem;">
            <div style="font-size:1.8rem;margin-bottom:.5rem;">🧩</div>
            <h3 style="font-size:1rem;margin-bottom:.4rem;">Escalável</h3>
            <p style="font-size:.88rem;">O catálogo centraliza links, categorias e cards, o que diminui risco ao adicionar novas ferramentas no futuro.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section section--alt" aria-label="Boas práticas de SEO e estrutura">
    <div class="container">
      <div style="max-width:760px; margin:0 auto;" class="seo-content">
        <h2>Como o site ficou mais forte para Google e compartilhamento</h2>
        <p>O projeto agora usa uma base técnica única para evitar inconsistência entre páginas, mantendo títulos, descrições, canonical, schema e metas sociais sob a mesma regra.</p>

        <h3>URLs amigáveis e consistentes</h3>
        <p>As ferramentas passam a responder em rotas limpas como <strong>/ferramentas/juros-simples</strong>, com redirecionamento 301 do formato antigo com <strong>.php</strong>.</p>

        <h3>Estrutura que o crawler entende</h3>
        <p>Header, footer e links internos agora saem prontos no HTML. Isso melhora legibilidade para robôs, aumenta previsibilidade do DOM e reduz dependência de JavaScript para SEO básico.</p>

        <h3>Gestão centralizada</h3>
        <p>O painel administrativo em <strong>/admin</strong> permite editar as meta tags de todas as páginas e ferramentas sem abrir arquivo por arquivo.</p>

        <ul>
          <li>Dados estruturados com JSON-LD para site, coleção de ferramentas e páginas individuais</li>
          <li>Robots e sitemap gerados pelo código a partir do catálogo real do projeto</li>
          <li>Links internos consistentes entre home, catálogo e ferramentas relacionadas</li>
          <li>Base pronta para novas páginas sem duplicar SEO manualmente</li>
        </ul>
      </div>
    </div>
  </section>

  <div class="container">
    <?php ns_render_ad_slot('leaderboard'); ?>
  </div>
</main>
<?php ns_render_page_end(); ?>
