<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/config/bootstrap.php';
ns_redirect_legacy_url('/ferramentas/gerador-slug-url');
ns_render_page_start('tool:gerador-slug-url');
?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span>Gerador de Slug URL</span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#eefbf9,#d1f2eb);">🔗</div><div><h1>Gerador de Slug URL</h1><p>Transforme frases e títulos em URLs amigáveis, limpas e mais fáceis de usar em páginas, artigos e produtos.</p><span class="tag tag-green">Desenvolvimento</span></div></div>
  <div class="tool-box">
    <div class="form-group"><label for="slug-entrada">Texto original</label><textarea id="slug-entrada" class="form-control" rows="7"></textarea></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="gerarSlug()">Gerar slug</button><button type="button" class="btn btn-outline" onclick="limparSlug()">Limpar</button><button type="button" class="copy-btn" onclick="copiarSlug(this)">Copiar slug</button></div>
    <div class="notice notice-warn" id="erro-slug" style="display:none;"><span>⚠️</span><span id="erro-slug-texto"></span></div>
    <div class="form-group" style="margin-top:1rem;"><label for="slug-resultado">Slug</label><input type="text" id="slug-resultado" class="form-control" readonly /></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
  <div class="seo-content"><h2>O que é essa ferramenta</h2><p>O gerador de slug URL converte títulos e frases em um formato limpo, geralmente usado em links amigáveis para SEO, blogs, produtos e páginas institucionais. O slug costuma remover acentos, espaços e caracteres especiais para criar URLs mais legíveis.</p><p>Essa padronização ajuda a manter consistência técnica e facilita compartilhamento.</p><h2>Como usar</h2><p>Digite ou cole um texto no campo principal e clique em gerar slug. A ferramenta normaliza letras, remove acentos, troca espaços por hífens e reduz sequências desnecessárias. Se o campo estiver vazio, a página solicita que você digite algo.</p><p>Depois, o resultado pode ser copiado para CMS, código ou cadastro de página.</p><h2>Exemplo de uso</h2><p>Um título como “Como Calcular Juros Compostos em 2026” pode virar um slug semelhante a “como-calcular-juros-compostos-em-2026”. Isso ajuda a manter URLs curtas e fáceis de entender.</p><p>É um recurso útil para produção de conteúdo, SEO e desenvolvimento web.</p><h2>Perguntas frequentes</h2><h3>O slug remove acentos?</h3><p>Sim. A ferramenta normaliza o texto para uma forma mais amigável para URL.</p><h3>Troca espaços por hífen?</h3><p>Sim. Esse é o comportamento padrão da ferramenta.</p><h3>Serve para e-commerce?</h3><p>Sim. É útil para artigos, produtos, categorias e páginas diversas.</p></div>
  <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/validador-email')) ?>" class="related-card"><span class="related-card-icon">📧</span> Validador de Email</a><a href="<?= ns_escape(ns_href('/ferramentas/formatador-json')) ?>" class="related-card"><span class="related-card-icon">🧩</span> Formatador JSON</a><a href="<?= ns_escape(ns_href('/ferramentas/conversor-texto')) ?>" class="related-card"><span class="related-card-icon">🔄</span> Conversor de Texto</a></div></div>
</div></main>
<script>
function erroSlug(msg){document.getElementById('erro-slug-texto').textContent=msg;document.getElementById('erro-slug').style.display='flex';}
function limparErroSlug(){document.getElementById('erro-slug').style.display='none';}
function gerarSlug(){const texto=document.getElementById('slug-entrada').value.trim();limparErroSlug();if(!texto){erroSlug('Digite um texto para gerar o slug.');return;}const slug=texto.normalize('NFD').replace(/[\u0300-\u036f]/g,'').toLowerCase().replace(/[^a-z0-9]+/g,'-').replace(/^-+|-+$/g,'').replace(/-{2,}/g,'-');document.getElementById('slug-resultado').value=slug;}
function limparSlug(){document.getElementById('slug-entrada').value='';document.getElementById('slug-resultado').value='';limparErroSlug();}
function copiarSlug(button){const texto=document.getElementById('slug-resultado').value;if(!texto){erroSlug('Gere o slug antes de copiar.');return;}copyToClipboard(texto,button);}
</script>
<?php ns_render_page_end(); ?>
