<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/config/bootstrap.php';
ns_redirect_legacy_url('/ferramentas/texto-minusculo');
ns_render_page_start('tool:texto-minusculo');
?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span>Texto Minúsculo</span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#f1f8ff,#d8eaff);">🔡</div><div><h1>Texto Minúsculo Online</h1><p>Transforme texto em letras minúsculas com rapidez e padronize frases, títulos e blocos de conteúdo.</p><span class="tag tag-blue">Texto</span></div></div>
  <div class="tool-box">
    <div class="form-group"><label for="texto-minusculo-entrada">Texto original</label><textarea id="texto-minusculo-entrada" class="form-control" rows="9" placeholder="Digite o texto..."></textarea></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="converterMinusculo()">Converter</button><button type="button" class="btn btn-outline" onclick="limparMinusculo()">Limpar</button><button type="button" class="copy-btn" onclick="copiarMinusculo(this)">Copiar resultado</button></div>
    <div class="notice notice-warn" id="erro-minusculo" style="display:none;"><span>⚠️</span><span id="erro-minusculo-texto"></span></div>
    <div class="form-group" style="margin-top:1rem;"><label for="texto-minusculo-resultado">Resultado</label><textarea id="texto-minusculo-resultado" class="form-control" rows="9" readonly></textarea></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
  <div class="seo-content"><h2>O que é essa ferramenta</h2><p>A ferramenta de texto minúsculo converte palavras e frases para caixa baixa de forma automática. Ela é útil para padronização, revisão de conteúdo, limpeza de textos copiados e ajustes rápidos em nomes, descrições e cadastros.</p><p>Toda a conversão acontece localmente no navegador, o que mantém a página leve e muito rápida.</p><h2>Como usar</h2><p>Cole ou digite o texto e clique em converter. O conteúdo em minúsculo aparece no campo de saída. Se o campo de entrada estiver vazio, a ferramenta exibe uma validação amigável e evita gerar resultado em branco.</p><p>Depois você pode copiar a versão convertida ou limpar tudo para um novo uso.</p><h2>Exemplo de uso</h2><p>Se você recebe um texto todo em caixa alta ou com padronização inconsistente, pode normalizar o conteúdo em segundos sem editar manualmente cada palavra.</p><p>Isso é útil para atendimento, importação de conteúdo e revisão editorial.</p><h2>Perguntas frequentes</h2><h3>Acentos continuam corretos?</h3><p>Sim. A conversão mantém acentuação e caracteres do português.</p><h3>Serve para nomes e títulos?</h3><p>Sim. É útil para qualquer conteúdo textual simples.</p><h3>Posso copiar o resultado?</h3><p>Sim. O botão copiar resultado envia o texto convertido para a área de transferência.</p></div>
  <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/texto-maiusculo')) ?>" class="related-card"><span class="related-card-icon">🔠</span> Texto Maiúsculo</a><a href="<?= ns_escape(ns_href('/ferramentas/capitalizar-texto')) ?>" class="related-card"><span class="related-card-icon">✍️</span> Capitalizar Texto</a><a href="<?= ns_escape(ns_href('/ferramentas/remover-espacos-extras')) ?>" class="related-card"><span class="related-card-icon">✂️</span> Remover Espaços</a></div></div>
</div></main>
<script>
function erroMinusculo(msg){document.getElementById('erro-minusculo-texto').textContent=msg;document.getElementById('erro-minusculo').style.display='flex';}
function limparErroMinusculo(){document.getElementById('erro-minusculo').style.display='none';}
function converterMinusculo(){const texto=document.getElementById('texto-minusculo-entrada').value;limparErroMinusculo();if(!texto){erroMinusculo('Digite um texto para converter.');return;}document.getElementById('texto-minusculo-resultado').value=texto.toLocaleLowerCase('pt-BR');}
function limparMinusculo(){document.getElementById('texto-minusculo-entrada').value='';document.getElementById('texto-minusculo-resultado').value='';limparErroMinusculo();}
function copiarMinusculo(button){const texto=document.getElementById('texto-minusculo-resultado').value;if(!texto){erroMinusculo('Gere o texto convertido antes de copiar.');return;}copyToClipboard(texto,button);}
</script>
<?php ns_render_page_end(); ?>
