<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/config/bootstrap.php';
ns_redirect_legacy_url('/ferramentas/gerador-robots-txt');
ns_render_page_start('tool:gerador-robots-txt');
?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span>Gerador de Robots.txt</span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#eef9f0,#d4f0dc);">🤖</div><div><h1>Gerador de Robots.txt</h1><p>Crie um arquivo robots.txt básico com regras simples de rastreamento e campo opcional de sitemap.</p><span class="tag tag-green">SEO</span></div></div>
  <div class="tool-box">
    <div class="form-row"><div class="form-group"><label for="robots-agent">User-agent</label><input type="text" id="robots-agent" class="form-control" value="*" /></div><div class="form-group"><label for="robots-sitemap">Sitemap</label><input type="text" id="robots-sitemap" class="form-control" placeholder="https://example.com/sitemap.xml" /></div></div>
    <div class="form-group"><label for="robots-disallow">Disallow (uma linha por caminho)</label><textarea id="robots-disallow" class="form-control" rows="5" placeholder="/admin&#10;/privado"></textarea></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="gerarRobots()">Gerar robots.txt</button><button type="button" class="btn btn-outline" onclick="limparRobots()">Limpar</button><button type="button" class="copy-btn" onclick="copiarRobots(this)">Copiar código</button></div>
    <div class="form-group" style="margin-top:1rem;"><label for="robots-codigo">Arquivo gerado</label><textarea id="robots-codigo" class="form-control" rows="12" readonly></textarea></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
  <div class="seo-content"><h2>O que é essa ferramenta</h2><p>O gerador de robots.txt cria um modelo simples desse arquivo, usado para orientar rastreadores sobre caminhos permitidos ou bloqueados em um site. É um recurso comum em projetos de SEO técnico e publicação web.</p><p>A ferramenta foi pensada para agilizar a montagem inicial do arquivo com uma estrutura clara e pronta para copiar.</p><h2>Como usar</h2><p>Informe o user-agent desejado, liste os caminhos que devem ficar em disallow e, se quiser, adicione a URL do sitemap. Depois clique em gerar robots.txt. O código aparece no campo final, pronto para cópia.</p><p>Isso ajuda a padronizar a criação de um arquivo essencial em muitos sites.</p><h2>Exemplo de uso</h2><p>Um site pode bloquear áreas como painel administrativo e páginas privadas, deixando as páginas públicas liberadas para rastreamento. O robots.txt ajuda a organizar isso de maneira simples.</p><p>Apesar disso, ele não substitui segurança nem controle de acesso real do sistema.</p><h2>Perguntas frequentes</h2><h3>Robots.txt bloqueia acesso do usuário?</h3><p>Não. Ele apenas orienta rastreadores, não protege conteúdo de forma efetiva.</p><h3>Posso incluir sitemap?</h3><p>Sim. A ferramenta tem campo específico para isso.</p><h3>Posso usar várias linhas em disallow?</h3><p>Sim. Basta informar um caminho por linha.</p></div>
  <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/gerador-meta-tags')) ?>" class="related-card"><span class="related-card-icon">🏷️</span> Meta Tags</a><a href="<?= ns_escape(ns_href('/ferramentas/gerador-slug-url')) ?>" class="related-card"><span class="related-card-icon">🔗</span> Gerador de Slug</a><a href="<?= ns_escape(ns_href('/ferramentas/formatador-json')) ?>" class="related-card"><span class="related-card-icon">🧩</span> Formatador JSON</a></div></div>
</div></main>
<script>
function gerarRobots(){const agent=document.getElementById('robots-agent').value.trim()||'*';const sitemap=document.getElementById('robots-sitemap').value.trim();const linhas=(document.getElementById('robots-disallow').value.split(/\r?\n/).map(function(item){return item.trim();}).filter(Boolean));let codigo='User-agent: '+agent+'\n';if(!linhas.length){codigo+='Disallow:\n';}else{linhas.forEach(function(item){codigo+='Disallow: '+item+'\n';});}if(sitemap){codigo+='\nSitemap: '+sitemap+'\n';}document.getElementById('robots-codigo').value=codigo;}
function limparRobots(){document.getElementById('robots-agent').value='*';document.getElementById('robots-sitemap').value='';document.getElementById('robots-disallow').value='';document.getElementById('robots-codigo').value='';}
function copiarRobots(button){const texto=document.getElementById('robots-codigo').value;if(!texto){gerarRobots();}copyToClipboard(document.getElementById('robots-codigo').value,button);}
</script>
<?php ns_render_page_end(); ?>
