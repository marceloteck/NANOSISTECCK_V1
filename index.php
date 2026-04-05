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
          <p>Use calculadoras, geradores e utilitários online com resposta imediata, instruções claras e páginas pensadas para resolver tarefas reais sem complicação.</p>
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
        <h2 id="tools-heading">Ferramentas úteis para tarefas do dia a dia</h2>
        <p>Encontre páginas objetivas para calcular, validar, converter e escrever melhor. Cada ferramenta foi organizada para entregar resposta rápida, explicação simples e navegação fácil em qualquer tela.</p>
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
        <h2 id="about-heading">Conteúdo útil, resposta rápida e navegação simples</h2>
        <p style="margin:.85rem 0 1.5rem; font-size:1.05rem; color:var(--text2);">
          O <strong>NANOSISTECCK Tools</strong> foi estruturado para ajudar o usuário a resolver tarefas práticas com rapidez. O foco é oferecer páginas leves, explicativas e úteis, sem excesso de etapas e com informações fáceis de aplicar.
        </p>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:1.25rem; margin-top:2rem;">
          <div style="background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);padding:1.5rem;">
            <div style="font-size:1.8rem;margin-bottom:.5rem;">⚡</div>
            <h3 style="font-size:1rem;margin-bottom:.4rem;">Carregamento enxuto</h3>
            <p style="font-size:.88rem;">As páginas foram feitas para abrir rápido, especialmente em celular, com foco em experiência direta e sem peso desnecessário.</p>
          </div>
          <div style="background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);padding:1.5rem;">
            <div style="font-size:1.8rem;margin-bottom:.5rem;">🔎</div>
            <h3 style="font-size:1rem;margin-bottom:.4rem;">SEO bem estruturado</h3>
            <p style="font-size:.88rem;">Title, descrição, URLs limpas e dados estruturados ajudam cada ferramenta a ser encontrada e entendida com mais facilidade.</p>
          </div>
          <div style="background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);padding:1.5rem;">
            <div style="font-size:1.8rem;margin-bottom:.5rem;">📱</div>
            <h3 style="font-size:1rem;margin-bottom:.4rem;">Experiência simples</h3>
            <p style="font-size:.88rem;">A navegação foi pensada para reduzir atrito: preencher, calcular, entender o resultado e seguir para a próxima tarefa.</p>
          </div>
          <div style="background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);padding:1.5rem;">
            <div style="font-size:1.8rem;margin-bottom:.5rem;">🧩</div>
            <h3 style="font-size:1rem;margin-bottom:.4rem;">Catálogo escalável</h3>
            <p style="font-size:.88rem;">Novas ferramentas entram com padrão consistente de conteúdo, SEO e usabilidade para manter qualidade à medida que o site cresce.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section section--alt" aria-label="Boas práticas de SEO e estrutura">
    <div class="container">
      <div style="max-width:760px; margin:0 auto;" class="seo-content">
        <h2>Como o site foi estruturado para ser mais útil para o usuário</h2>
        <p>O objetivo não é apenas listar ferramentas, mas entregar páginas que expliquem o que fazem, como usar e quando o resultado pode ajudar. Isso melhora a experiência do visitante e fortalece a qualidade editorial do projeto.</p>

        <h3>URLs amigáveis e consistentes</h3>
        <p>As ferramentas usam rotas curtas e claras, o que facilita compartilhamento, entendimento do tema da página e navegação entre conteúdos relacionados.</p>

        <h3>Estrutura fácil de interpretar</h3>
        <p>Os elementos principais da página, como navegação, links internos e conteúdo essencial, já chegam prontos no HTML para melhorar leitura por usuários e buscadores.</p>

        <h3>Conteúdo com padrão consistente</h3>
        <p>O projeto mantém uma base central para organizar meta tags, categorias e navegação, o que ajuda a preservar clareza, qualidade e manutenção previsível.</p>

        <ul>
          <li>Ferramentas com explicação prática, resultado claro e ações rápidas como copiar e limpar</li>
          <li>Links internos consistentes entre home, catálogo e páginas relacionadas</li>
          <li>Base técnica preparada para crescer sem perder padrão de SEO e usabilidade</li>
          <li>Conteúdo pensado para ser útil de verdade, e não apenas preencher espaço</li>
        </ul>
      </div>
    </div>
  </section>

  <div class="container">
    <?php ns_render_ad_slot('leaderboard'); ?>
  </div>
</main>
<?php ns_render_page_end(); ?>
