<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/config/bootstrap.php';
ns_redirect_legacy_url('/ferramentas/capitalizar-texto');
ns_render_page_start('tool:capitalizar-texto');
?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span>Capitalizar Texto</span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#fff6ea,#ffe1b8);">✍️</div><div><h1>Capitalizar Texto Online</h1><p>Coloque a primeira letra de cada palavra em maiúscula com um clique, ideal para títulos, nomes e padronização.</p><span class="tag tag-orange">Texto</span></div></div>
  <div class="tool-box">
    <div class="form-group"><label for="texto-capitalizar-entrada">Texto original</label><textarea id="texto-capitalizar-entrada" class="form-control" rows="9" placeholder="Digite o texto..."></textarea></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="capitalizarTexto()">Capitalizar</button><button type="button" class="btn btn-outline" onclick="limparCapitalizar()">Limpar</button><button type="button" class="copy-btn" onclick="copiarCapitalizado(this)">Copiar resultado</button></div>
    <div class="notice notice-warn" id="erro-capitalizar" style="display:none;"><span>⚠️</span><span id="erro-capitalizar-texto"></span></div>
    <div class="form-group" style="margin-top:1rem;"><label for="texto-capitalizar-resultado">Resultado</label><textarea id="texto-capitalizar-resultado" class="form-control" rows="9" readonly></textarea></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
  <div class="seo-content"><h2>O que é essa ferramenta</h2><p>A ferramenta de capitalizar texto transforma a primeira letra de cada palavra em maiúscula, criando um formato muito usado em títulos, nomes próprios, cabeçalhos e elementos de interface. É uma conversão simples, mas extremamente útil em fluxos de edição e cadastro.</p><p>Como tudo roda no navegador, a resposta é imediata e a experiência permanece leve.</p><h2>Como usar</h2><p>Cole ou digite o texto no campo de entrada e clique em capitalizar. O sistema gera uma nova versão com cada palavra iniciando por letra maiúscula. Se o campo estiver vazio, a ferramenta exibe uma mensagem amigável.</p><p>Depois, é possível copiar o texto gerado ou limpar os campos para outra conversão.</p><h2>Exemplo de uso</h2><p>Se você recebe um nome de produto, uma lista de tópicos ou um título todo em minúsculo, essa ferramenta cria uma versão mais apresentável para interfaces, documentos ou publicações.</p><p>Isso economiza tempo e evita correção manual repetitiva.</p><h2>Perguntas frequentes</h2><h3>Ela mantém acentuação?</h3><p>Sim. Os caracteres em português são preservados durante a conversão.</p><h3>Funciona com frases longas?</h3><p>Sim. A ferramenta aceita blocos de texto comuns de trabalho.</p><h3>É igual a texto maiúsculo?</h3><p>Não. Aqui apenas a primeira letra de cada palavra fica em maiúscula.</p></div>
  <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/texto-maiusculo')) ?>" class="related-card"><span class="related-card-icon">🔠</span> Texto Maiúsculo</a><a href="<?= ns_escape(ns_href('/ferramentas/texto-minusculo')) ?>" class="related-card"><span class="related-card-icon">🔡</span> Texto Minúsculo</a><a href="<?= ns_escape(ns_href('/ferramentas/contador-palavras')) ?>" class="related-card"><span class="related-card-icon">📄</span> Contador de Palavras</a></div></div>
</div></main>
<script>
function erroCapitalizar(msg){document.getElementById('erro-capitalizar-texto').textContent=msg;document.getElementById('erro-capitalizar').style.display='flex';}
function limparErroCapitalizar(){document.getElementById('erro-capitalizar').style.display='none';}
function capitalizarTexto(){const texto=document.getElementById('texto-capitalizar-entrada').value;limparErroCapitalizar();if(!texto){erroCapitalizar('Digite um texto para capitalizar.');return;}const resultado=texto.toLocaleLowerCase('pt-BR').replace(/\b([a-zà-ÿ])/gi,function(match){return match.toLocaleUpperCase('pt-BR');});document.getElementById('texto-capitalizar-resultado').value=resultado;}
function limparCapitalizar(){document.getElementById('texto-capitalizar-entrada').value='';document.getElementById('texto-capitalizar-resultado').value='';limparErroCapitalizar();}
function copiarCapitalizado(button){const texto=document.getElementById('texto-capitalizar-resultado').value;if(!texto){erroCapitalizar('Gere o texto capitalizado antes de copiar.');return;}copyToClipboard(texto,button);}
</script>
<?php ns_render_page_end(); ?>
