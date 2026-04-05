<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/config/bootstrap.php';
ns_redirect_legacy_url('/ferramentas/gerador-uuid');
ns_render_page_start('tool:gerador-uuid');
?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span>Gerador de UUID</span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#eef3ff,#d4ddff);">🆔</div><div><h1>Gerador de UUID Online</h1><p>Gere UUID v4 aleatório no navegador com um clique, sem dependência de servidor e com cópia rápida.</p><span class="tag tag-blue">Desenvolvimento</span></div></div>
  <div class="tool-box">
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="gerarUUID()">Gerar UUID</button><button type="button" class="btn btn-outline" onclick="limparUUID()">Limpar</button><button type="button" class="copy-btn" onclick="copiarUUID(this)">Copiar UUID</button></div>
    <div class="form-group" style="margin-top:1rem;"><label for="uuid-resultado">UUID gerado</label><input type="text" id="uuid-resultado" class="form-control" readonly /></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
  <div class="seo-content"><h2>O que é essa ferramenta</h2><p>O gerador de UUID online cria identificadores únicos no formato UUID v4, muito usados em sistemas, bancos de dados, APIs, filas, integrações e ambientes de teste. É uma ferramenta prática para desenvolvedores que precisam gerar IDs rapidamente sem abrir terminal ou instalar pacote.</p><p>O processo acontece no navegador com a API criptográfica do ambiente, o que traz agilidade e boa aleatoriedade.</p><h2>Como usar</h2><p>Clique em gerar UUID para criar um novo identificador. O valor aparece no campo de resultado e pode ser copiado com um clique. Se quiser começar de novo, use o botão limpar.</p><p>A ferramenta foi pensada para uso rápido, sem formulários extras e sem necessidade de backend.</p><h2>Exemplo de uso</h2><p>Ao criar registros temporários, testar payloads ou simular chaves em um projeto, o UUID ajuda a representar um identificador único sem depender de sequência numérica.</p><p>Isso é útil em desenvolvimento web, automações e ambientes de QA.</p><h2>Perguntas frequentes</h2><h3>É UUID v4?</h3><p>Sim. A ferramenta gera UUID no padrão v4 quando o navegador oferece suporte nativo.</p><h3>Precisa de internet?</h3><p>Depois que a página carrega, a geração acontece localmente no navegador.</p><h3>Posso gerar vários?</h3><p>Sim. Basta clicar novamente para criar um novo valor.</p></div>
  <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/formatador-json')) ?>" class="related-card"><span class="related-card-icon">🧩</span> Formatador JSON</a><a href="<?= ns_escape(ns_href('/ferramentas/validador-json')) ?>" class="related-card"><span class="related-card-icon">✅</span> Validador JSON</a><a href="<?= ns_escape(ns_href('/ferramentas/gerador-senhas')) ?>" class="related-card"><span class="related-card-icon">🔐</span> Gerador de Senhas</a></div></div>
</div></main>
<script>
function gerarUUID(){document.getElementById('uuid-resultado').value=crypto.randomUUID();}
function limparUUID(){document.getElementById('uuid-resultado').value='';}
function copiarUUID(button){const valor=document.getElementById('uuid-resultado').value;if(!valor){gerarUUID();}copyToClipboard(document.getElementById('uuid-resultado').value,button);}
</script>
<?php ns_render_page_end(); ?>
