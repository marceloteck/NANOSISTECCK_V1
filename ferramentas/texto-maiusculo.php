<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/config/bootstrap.php';
ns_redirect_legacy_url('/ferramentas/texto-maiusculo');
ns_render_page_start('tool:texto-maiusculo');
?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navega��o breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">In�cio</a><span class="sep">�</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">�</span><span>Texto Mai�sculo</span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#eef5ff,#d4e2ff);">??</div><div><h1>Texto Mai�sculo Online</h1><p>Converta qualquer frase para letras mai�sculas com velocidade, sem instalar nada e com bot�o de copiar.</p><span class="tag tag-blue">Texto</span></div></div>
  <div class="tool-box">
    <div class="form-group"><label for="texto-maiusculo-entrada">Texto original</label><textarea id="texto-maiusculo-entrada" class="form-control" rows="9" placeholder="Digite o texto..."></textarea></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="converterMaiusculo()">Converter</button><button type="button" class="btn btn-outline" onclick="limparMaiusculo()">Limpar</button><button type="button" class="copy-btn" onclick="copiarMaiusculo(this)">Copiar resultado</button></div>
    <div class="notice notice-warn" id="erro-maiusculo" style="display:none;"><span>??</span><span id="erro-maiusculo-texto"></span></div>
    <div class="form-group" style="margin-top:1rem;"><label for="texto-maiusculo-resultado">Resultado</label><textarea id="texto-maiusculo-resultado" class="form-control" rows="9" readonly></textarea></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
  <div class="seo-content"><h2>O que � essa ferramenta</h2><p>A ferramenta de texto mai�sculo converte rapidamente letras min�sculas em mai�sculas, preservando o conte�do e mudando apenas o formato visual do texto. � �til para t�tulos, destaques, padroniza��o editorial e revis�o r�pida.</p><p>O processamento � instant�neo e ocorre inteiramente no navegador, mantendo a ferramenta leve e escal�vel.</p><h2>Como usar</h2><p>Digite ou cole o texto de entrada e clique em converter. O resultado aparece no campo de sa�da pronto para uso. Caso o campo esteja vazio, a interface mostra uma mensagem amig�vel.</p><p>Depois voc� pode copiar o texto convertido ou limpar os campos para uma nova opera��o.</p><h2>Exemplo de uso</h2><p>Ao colar um t�tulo de produto, um nome de campanha ou um aviso operacional, voc� pode gerar a vers�o em caixa alta sem editar manualmente palavra por palavra.</p><p>Isso agiliza fluxos de conte�do e padroniza��o visual.</p><h2>Perguntas frequentes</h2><h3>Os acentos s�o preservados?</h3><p>Sim. A convers�o mant�m caracteres acentuados normalmente.</p><h3>O texto original some?</h3><p>N�o. O conte�do original permanece no campo de entrada.</p><h3>Posso usar em textos longos?</h3><p>Sim. A ferramenta suporta textos comuns de trabalho e produ��o de conte�do.</p></div>
  <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/texto-minusculo')) ?>" class="related-card"><span class="related-card-icon">??</span> Texto Min�sculo</a><a href="<?= ns_escape(ns_href('/ferramentas/capitalizar-texto')) ?>" class="related-card"><span class="related-card-icon">??</span> Capitalizar Texto</a><a href="<?= ns_escape(ns_href('/ferramentas/contador-palavras')) ?>" class="related-card"><span class="related-card-icon">??</span> Contador de Palavras</a></div></div>
</div></main>
<script>
function erroMaiusculo(msg){document.getElementById('erro-maiusculo-texto').textContent=msg;document.getElementById('erro-maiusculo').style.display='flex';}
function limparErroMaiusculo(){document.getElementById('erro-maiusculo').style.display='none';}
function converterMaiusculo(){const texto=document.getElementById('texto-maiusculo-entrada').value;limparErroMaiusculo();if(!texto){erroMaiusculo('Digite um texto para converter.');return;}document.getElementById('texto-maiusculo-resultado').value=texto.toLocaleUpperCase('pt-BR');}
function limparMaiusculo(){document.getElementById('texto-maiusculo-entrada').value='';document.getElementById('texto-maiusculo-resultado').value='';limparErroMaiusculo();}
function copiarMaiusculo(button){const texto=document.getElementById('texto-maiusculo-resultado').value;if(!texto){erroMaiusculo('Gere o texto convertido antes de copiar.');return;}copyToClipboard(texto,button);}
</script>
<?php ns_render_page_end(); ?>
