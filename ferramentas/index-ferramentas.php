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
      <p>Catálogo organizado por categoria, com páginas otimizadas para SEO técnico, compartilhamento e crescimento futuro do projeto.</p>
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
      <h2>Estrutura preparada para novas ferramentas</h2>
      <p>O catálogo agora usa um mapa central de ferramentas. Isso significa menos repetição de links, mais consistência de SEO e inclusão mais segura de novas páginas no sitemap, footer e painel administrativo.</p>
    </div>
  </div>
</main>
<?php ns_render_page_end(); ?>
