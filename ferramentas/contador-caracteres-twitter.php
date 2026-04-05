<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/config/bootstrap.php';
ns_redirect_legacy_url('/ferramentas/contador-caracteres-twitter');
ns_render_page_start('tool:contador-caracteres-twitter');
?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span>Contador de Caracteres para Twitter</span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#eaf7ff,#cfe7ff);">🐦</div><div><h1>Contador de Caracteres para Twitter</h1><p>Acompanhe o total de caracteres de um post e veja quanto ainda cabe dentro do limite escolhido.</p><span class="tag tag-blue">Texto</span></div></div>
  <div class="tool-box">
    <div class="form-group"><label for="twitter-texto">Texto do post</label><textarea id="twitter-texto" class="form-control" rows="8" placeholder="Digite o texto do post aqui..." oninput="contarTwitter()"></textarea></div>
    <div class="form-group"><label for="twitter-limite">Limite de caracteres</label><input type="number" id="twitter-limite" class="form-control" value="280" min="1" step="1" oninput="contarTwitter()" /></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="contarTwitter()">Atualizar contagem</button><button type="button" class="btn btn-outline" onclick="limparTwitter()">Limpar</button><button type="button" class="copy-btn" onclick="copiarTwitter(this)">Copiar resumo</button></div>
    <div class="result-box show" id="resultado-twitter"><div class="result-grid"><div class="result-item"><div class="label">Caracteres</div><div class="value" id="twitter-total">0</div></div><div class="result-item"><div class="label">Restantes</div><div class="value" id="twitter-restante">280</div></div></div><div id="twitter-detalhe" style="margin-top:1rem;color:var(--text2);">Digite um texto para acompanhar a contagem em tempo real.</div></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
  <div class="seo-content"><h2>O que é essa ferramenta</h2><p>O contador de caracteres para Twitter ajuda a revisar rapidamente o tamanho de um post antes de publicar. Isso é útil para redes sociais, atendimento, campanhas, lançamentos e planejamento editorial.</p><p>A ferramenta mostra o total digitado e quanto ainda resta com base no limite escolhido.</p><h2>Como usar</h2><p>Digite o texto do post e acompanhe a contagem em tempo real. Se quiser, ajuste o limite manualmente para simular outro formato de publicação. O resultado aparece imediatamente na tela, sem reload e sem sair da página.</p><p>Você pode copiar o resumo da contagem para revisão ou aprovação interna.</p><h2>Exemplo de uso</h2><p>Ao escrever um anúncio curto, uma chamada de campanha ou um post institucional, essa ferramenta ajuda a manter o texto dentro da meta, evitando cortes ou retrabalho na hora de publicar.</p><p>Ela é especialmente útil para redação rápida em equipes de marketing e social media.</p><h2>Perguntas frequentes</h2><h3>O limite é fixo?</h3><p>Nesta ferramenta, você pode ajustar o limite manualmente para o cenário desejado.</p><h3>Conta espaços?</h3><p>Sim. Todos os caracteres digitados entram na contagem.</p><h3>Funciona em tempo real?</h3><p>Sim. A atualização acontece conforme o usuário digita.</p></div>
  <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/contador-caracteres')) ?>" class="related-card"><span class="related-card-icon">🔢</span> Contador de Caracteres</a><a href="<?= ns_escape(ns_href('/ferramentas/contador-palavras')) ?>" class="related-card"><span class="related-card-icon">📄</span> Contador de Palavras</a><a href="<?= ns_escape(ns_href('/ferramentas/capitalizar-texto')) ?>" class="related-card"><span class="related-card-icon">✍️</span> Capitalizar Texto</a></div></div>
</div></main>
<script>
function contarTwitter(){const texto=document.getElementById('twitter-texto').value;const limite=parseInt(document.getElementById('twitter-limite').value,10)||280;const total=texto.length;const restante=limite-total;document.getElementById('twitter-total').textContent=String(total);document.getElementById('twitter-restante').textContent=String(restante);document.getElementById('twitter-detalhe').textContent=restante>=0?'Seu texto ainda cabe no limite definido.':'Seu texto passou do limite definido.';}
function limparTwitter(){document.getElementById('twitter-texto').value='';document.getElementById('twitter-limite').value='280';contarTwitter();}
function copiarTwitter(button){copyToClipboard('Caracteres: '+document.getElementById('twitter-total').textContent+'\nRestantes: '+document.getElementById('twitter-restante').textContent,button);}
contarTwitter();
</script>
<?php ns_render_page_end(); ?>
