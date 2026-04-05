<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/config/bootstrap.php';
ns_redirect_legacy_url('/ferramentas/contador-palavras');
ns_render_page_start('tool:contador-palavras');
?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span>Contador de Palavras</span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#fff8e8,#ffe7ae);">📄</div><div><h1>Contador de Palavras Online</h1><p>Conte palavras, caracteres, frases, linhas e parágrafos em tempo real com uma interface simples e rápida.</p><span class="tag tag-orange">Texto</span></div></div>
  <div class="tool-box">
    <div class="form-group"><label for="texto-contador">Texto</label><textarea id="texto-contador" class="form-control" rows="10" placeholder="Cole ou digite seu texto aqui..." oninput="contarPalavras()"></textarea></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="contarPalavras()">Contar agora</button><button type="button" class="btn btn-outline" onclick="limparContador()">Limpar</button><button type="button" class="copy-btn" onclick="copiarContador(this)">Copiar resultado</button></div>
    <div class="result-box show" id="resultado-contador">
      <div class="result-grid">
        <div class="result-item"><div class="label">Palavras</div><div class="value" id="cont-palavras">0</div></div>
        <div class="result-item"><div class="label">Caracteres</div><div class="value" id="cont-caracteres">0</div></div>
        <div class="result-item"><div class="label">Frases</div><div class="value" id="cont-frases">0</div></div>
        <div class="result-item"><div class="label">Parágrafos</div><div class="value" id="cont-paragrafos">0</div></div>
      </div>
      <div id="cont-detalhe" style="margin-top:1rem;color:var(--text2);">Digite um texto para ver as métricas instantaneamente.</div>
    </div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
  <div class="seo-content"><h2>O que é essa ferramenta</h2><p>O contador de palavras online foi criado para analisar rapidamente o tamanho de um texto. Ele conta palavras, caracteres, frases e parágrafos, algo muito útil para produção de conteúdo, SEO, redações, posts de blog, textos acadêmicos e descrições comerciais.</p><p>Como a contagem acontece em tempo real no navegador, a experiência é imediata e muito leve, ideal para um site com centenas de ferramentas.</p><h2>Como usar</h2><p>Cole ou digite o texto no campo principal. As métricas são atualizadas automaticamente conforme você escreve. Se preferir, também pode clicar no botão de contagem manual. O botão limpar zera a análise e o botão copiar resultado gera um resumo rápido das métricas principais.</p><p>Isso facilita o uso em rotinas editoriais, planejamentos de posts e revisão de conteúdo.</p><h2>Exemplo de uso</h2><p>Se você precisa publicar uma meta description curta, um resumo de produto ou uma introdução de artigo, basta colar o texto e acompanhar o total de palavras e caracteres. Dessa forma, você consegue ajustar o conteúdo sem abrir outras ferramentas.</p><p>A simplicidade é o principal valor aqui: escrever, medir e corrigir tudo na mesma tela.</p><h2>Perguntas frequentes</h2><h3>Conta espaços como caracteres?</h3><p>Sim. A métrica de caracteres considera todo o conteúdo digitado, incluindo espaços.</p><h3>Funciona em tempo real?</h3><p>Sim. O cálculo é atualizado conforme o usuário digita ou cola o texto.</p><h3>Serve para SEO?</h3><p>Sim. É útil para títulos, meta descriptions, parágrafos e outros elementos que exigem controle de tamanho.</p></div>
  <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/contador-caracteres')) ?>" class="related-card"><span class="related-card-icon">🔢</span> Contador de Caracteres</a><a href="<?= ns_escape(ns_href('/ferramentas/remover-espacos-extras')) ?>" class="related-card"><span class="related-card-icon">✂️</span> Remover Espaços</a><a href="<?= ns_escape(ns_href('/ferramentas/capitalizar-texto')) ?>" class="related-card"><span class="related-card-icon">✍️</span> Capitalizar Texto</a></div></div>
</div></main>
<script>
function contarPalavras(){const texto=document.getElementById('texto-contador').value;const palavras=texto.trim()?texto.trim().split(/\s+/).length:0;const frases=(texto.match(/[.!?]+/g)||[]).length;const paragrafos=texto.trim()?texto.trim().split(/\n\s*\n/).length:0;document.getElementById('cont-palavras').textContent=String(palavras);document.getElementById('cont-caracteres').textContent=String(texto.length);document.getElementById('cont-frases').textContent=String(frases);document.getElementById('cont-paragrafos').textContent=String(paragrafos);document.getElementById('cont-detalhe').textContent='Análise atualizada em tempo real para facilitar revisão e SEO.';}
function limparContador(){document.getElementById('texto-contador').value='';contarPalavras();}
function copiarContador(button){copyToClipboard('Palavras: '+document.getElementById('cont-palavras').textContent+'\nCaracteres: '+document.getElementById('cont-caracteres').textContent+'\nFrases: '+document.getElementById('cont-frases').textContent+'\nParágrafos: '+document.getElementById('cont-paragrafos').textContent,button);}
contarPalavras();
</script>
<?php ns_render_page_end(); ?>
