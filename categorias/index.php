<?php
declare(strict_types=1);
require_once __DIR__ . "/../config/bootstrap.php";
ns_render_page_start("tools", ["meta"=>["title"=>"Categorias de Ferramentas | NANOSISTECCK Tools","description"=>"Explore as categorias do portal de ferramentas.","path"=>"/categorias"]]);
?>
<main><div class="container" style="padding:2rem 0 4rem"><h1>Categorias</h1><div class="tools-grid">
<a class="tool-card" href="<?= ns_escape(ns_href('/categorias/matematica')) ?>"><div class="tool-card-icon">🧮</div><div><div class="tool-card-title">Matemática</div><div class="tool-card-desc">Ver ferramentas de matemática.</div></div></a>
<a class="tool-card" href="<?= ns_escape(ns_href('/categorias/matematica-avancada')) ?>"><div class="tool-card-icon">📐</div><div><div class="tool-card-title">Matemática Avançada</div><div class="tool-card-desc">Ver ferramentas de matemática avançada.</div></div></a>
<a class="tool-card" href="<?= ns_escape(ns_href('/categorias/saude')) ?>"><div class="tool-card-icon">💚</div><div><div class="tool-card-title">Saúde</div><div class="tool-card-desc">Ver ferramentas de saúde.</div></div></a>
<a class="tool-card" href="<?= ns_escape(ns_href('/categorias/financas')) ?>"><div class="tool-card-icon">💰</div><div><div class="tool-card-title">Finanças</div><div class="tool-card-desc">Ver ferramentas de finanças.</div></div></a>
<a class="tool-card" href="<?= ns_escape(ns_href('/categorias/cotidiano')) ?>"><div class="tool-card-icon">🏠</div><div><div class="tool-card-title">Cotidiano</div><div class="tool-card-desc">Ver ferramentas de cotidiano.</div></div></a>
<a class="tool-card" href="<?= ns_escape(ns_href('/categorias/conversores')) ?>"><div class="tool-card-icon">🔄</div><div><div class="tool-card-title">Conversores</div><div class="tool-card-desc">Ver ferramentas de conversores.</div></div></a>
<a class="tool-card" href="<?= ns_escape(ns_href('/categorias/texto')) ?>"><div class="tool-card-icon">📝</div><div><div class="tool-card-title">Texto</div><div class="tool-card-desc">Ver ferramentas de texto.</div></div></a>
<a class="tool-card" href="<?= ns_escape(ns_href('/categorias/dev')) ?>"><div class="tool-card-icon">💻</div><div><div class="tool-card-title">Desenvolvimento</div><div class="tool-card-desc">Ver ferramentas de desenvolvimento.</div></div></a>
<a class="tool-card" href="<?= ns_escape(ns_href('/categorias/devops')) ?>"><div class="tool-card-icon">⚙️</div><div><div class="tool-card-title">DevOps</div><div class="tool-card-desc">Ver ferramentas de devops.</div></div></a>
<a class="tool-card" href="<?= ns_escape(ns_href('/categorias/seo')) ?>"><div class="tool-card-icon">🔎</div><div><div class="tool-card-title">SEO</div><div class="tool-card-desc">Ver ferramentas de seo.</div></div></a>
<a class="tool-card" href="<?= ns_escape(ns_href('/categorias/marketing')) ?>"><div class="tool-card-icon">📣</div><div><div class="tool-card-title">Marketing</div><div class="tool-card-desc">Ver ferramentas de marketing.</div></div></a>
<a class="tool-card" href="<?= ns_escape(ns_href('/categorias/produtividade')) ?>"><div class="tool-card-icon">⏱️</div><div><div class="tool-card-title">Produtividade</div><div class="tool-card-desc">Ver ferramentas de produtividade.</div></div></a>
<a class="tool-card" href="<?= ns_escape(ns_href('/categorias/educacao')) ?>"><div class="tool-card-icon">🎓</div><div><div class="tool-card-title">Educação</div><div class="tool-card-desc">Ver ferramentas de educação.</div></div></a>
<a class="tool-card" href="<?= ns_escape(ns_href('/categorias/administrativo')) ?>"><div class="tool-card-icon">📁</div><div><div class="tool-card-title">Administrativo</div><div class="tool-card-desc">Ver ferramentas de administrativo.</div></div></a>
<a class="tool-card" href="<?= ns_escape(ns_href('/categorias/design')) ?>"><div class="tool-card-icon">🎨</div><div><div class="tool-card-title">Design</div><div class="tool-card-desc">Ver ferramentas de design.</div></div></a>
<a class="tool-card" href="<?= ns_escape(ns_href('/categorias/utilitarios')) ?>"><div class="tool-card-icon">🧰</div><div><div class="tool-card-title">Utilitários</div><div class="tool-card-desc">Ver ferramentas de utilitários.</div></div></a>
<a class="tool-card" href="<?= ns_escape(ns_href('/categorias/dados')) ?>"><div class="tool-card-icon">🗃️</div><div><div class="tool-card-title">Dados</div><div class="tool-card-desc">Ver ferramentas de dados.</div></div></a>
</div></div></main><?php ns_render_page_end(); ?>