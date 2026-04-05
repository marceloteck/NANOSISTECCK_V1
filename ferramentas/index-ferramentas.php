<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

ns_redirect_legacy_url('/ferramentas');

$catalog = ns_catalog();
$groupedTools = ns_grouped_tools();

ns_render_page_start('tools');
?>
<main>
  <div class="container" style="padding-top:2.5rem; padding-bottom:4rem;">
    <div class="breadcrumb" aria-label="Navegação breadcrumb">
      <a href="<?= ns_escape(ns_href('/')) ?>">Início</a>
      <span class="sep">›</span>
      <span>Ferramentas</span>
    </div>

    <div class="section-header" style="text-align:left; margin-bottom:2rem;">
      <span class="section-eyebrow">Ferramentas</span>
      <h1>Todas as Ferramentas Online</h1>
      <p>Explore calculadoras, ferramentas de texto, utilitários para desenvolvimento e páginas de SEO feitas para responder rápido e explicar bem cada resultado.</p>
    </div>

    <?php ns_render_ad_slot('leaderboard'); ?>

    <?php foreach ($catalog['categories'] as $categoryKey => $category): ?>
      <?php if (empty($groupedTools[$categoryKey])) { continue; } ?>
      <h2 style="font-size:1.1rem; margin:2.5rem 0 1rem; color:var(--text2);"><?= ns_escape($category['icon'] . ' ' . $category['label']) ?></h2>
      <div class="tools-grid" style="margin-top:0;">
        <?php foreach ($groupedTools[$categoryKey] as $tool): ?>
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
    <?php endforeach; ?>

    <div class="seo-content" style="max-width:760px; margin:3rem auto 0;">
      <h2>Como usar o catálogo</h2>
      <p>Escolha uma categoria, abra a ferramenta desejada e siga as instruções da própria página. Cada utilitário foi pensado para entregar resultado imediato, linguagem clara e navegação simples, mantendo um padrão mais forte de qualidade editorial e utilidade real para o visitante.</p>
    </div>
  </div>
</main>
<?php ns_render_page_end(); ?>
