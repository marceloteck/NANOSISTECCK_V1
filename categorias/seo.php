<?php

declare(strict_types=1);
require_once __DIR__ . '/../config/bootstrap.php';
$tools = array_filter(ns_tools(), static fn($t) => $t['category_key'] === 'seo');
ns_render_page_start('tools', ['meta'=>['title'=>'SEO | NANOSISTECCK Tools','description'=>'Ferramentas de seo','path'=>'/categorias/seo']]);
?>
<main><div class="container" style="padding:2rem 0 4rem"><div class="breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/categorias')) ?>">Categorias</a><span class="sep">›</span><span>SEO</span></div><h1>🔎 SEO</h1><div class="tools-grid"><?php foreach($tools as $tool): ?><a class="tool-card" href="<?= ns_escape(ns_href('/ferramentas/' . $tool['slug'])) ?>"><div class="tool-card-icon"><?= ns_escape($tool['icon']) ?></div><div><div class="tool-card-title"><?= ns_escape($tool['name']) ?></div><div class="tool-card-desc"><?= ns_escape($tool['excerpt']) ?></div></div></a><?php endforeach; ?></div></div></main>
<?php ns_render_page_end(); ?>
