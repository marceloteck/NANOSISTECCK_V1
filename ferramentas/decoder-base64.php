<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/config/bootstrap.php';
ns_redirect_legacy_url('/ferramentas/decoder-base64');
ns_render_page_start('tool:decoder-base64');
?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navega��o breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">In�cio</a><span class="sep">�</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">�</span><span>Decoder Base64</span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#f0f8ff,#d8e9ff);">??</div><div><h1>Decoder Base64 Online</h1><p>Converta Base64 para texto leg�vel com valida��o amig�vel e resultado instant�neo no navegador.</p><span class="tag tag-blue">Desenvolvimento</span></div></div>
  <div class="tool-box">
    <div class="form-group"><label for="base64-decode-entrada">Base64</label><textarea id="base64-decode-entrada" class="form-control" rows="8"></textarea></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="decodificarBase64()">Decodificar</button><button type="button" class="btn btn-outline" onclick="limparBase64Decode()">Limpar</button><button type="button" class="copy-btn" onclick="copiarBase64Decode(this)">Copiar resultado</button></div>
    <div class="notice notice-warn" id="erro-b64d" style="display:none;"><span>??</span><span id="erro-b64d-texto"></span></div>
    <div class="form-group" style="margin-top:1rem;"><label for="base64-decode-saida">Texto decodificado</label><textarea id="base64-decode-saida" class="form-control" rows="8" readonly></textarea></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
  <div class="seo-content"><h2>O que � essa ferramenta</h2><p>O decoder Base64 online transforma conte�do codificado em Base64 de volta para texto leg�vel. Isso � �til para testes de API, payloads, headers e rotinas simples de integra��o.</p><p>A opera��o roda inteiramente no navegador para garantir rapidez e uso direto.</p><h2>Como usar</h2><p>Cole o conte�do em Base64 no primeiro campo e clique em decodificar. Se o valor for v�lido, o texto original aparecer� na caixa de sa�da. Se houver erro de estrutura, a interface exibe uma mensagem amig�vel.</p><p>Depois voc� pode copiar o resultado para outro sistema ou ambiente de teste.</p><h2>Exemplo de uso</h2><p>Ao receber um token curto ou um payload de teste em Base64, a ferramenta ajuda a entender o conte�do sem precisar escrever c�digo ou abrir ferramentas externas.</p><p>� uma utilidade frequente em rotinas t�cnicas e de suporte.</p><h2>Perguntas frequentes</h2><h3>Todo Base64 vira texto leg�vel?</h3><p>Nem sempre. O resultado depende do conte�do originalmente codificado.</p><h3>A ferramenta valida erro?</h3><p>Sim. Se o conte�do estiver inv�lido, ela informa que n�o foi poss�vel decodificar.</p><h3>� seguro usar para dados sens�veis?</h3><p>Base64 n�o � criptografia. Use com cuidado se o conte�do for sens�vel.</p></div>
  <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/encoder-base64')) ?>" class="related-card"><span class="related-card-icon">??</span> Encoder Base64</a><a href="<?= ns_escape(ns_href('/ferramentas/formatador-json')) ?>" class="related-card"><span class="related-card-icon">??</span> Formatador JSON</a><a href="<?= ns_escape(ns_href('/ferramentas/validador-json')) ?>" class="related-card"><span class="related-card-icon">?</span> Validador JSON</a></div></div>
</div></main>
<script>
function erroB64d(msg){document.getElementById('erro-b64d-texto').textContent=msg;document.getElementById('erro-b64d').style.display='flex';}
function limparErroB64d(){document.getElementById('erro-b64d').style.display='none';}
function decodificarBase64(){const texto=document.getElementById('base64-decode-entrada').value.trim();limparErroB64d();if(!texto){erroB64d('Cole um valor Base64 para decodificar.');return;}try{document.getElementById('base64-decode-saida').value=decodeURIComponent(escape(atob(texto)));}catch(error){erroB64d('N�o foi poss�vel decodificar. Verifique se o conte�do � um Base64 v�lido.');}}
function limparBase64Decode(){document.getElementById('base64-decode-entrada').value='';document.getElementById('base64-decode-saida').value='';limparErroB64d();}
function copiarBase64Decode(button){const texto=document.getElementById('base64-decode-saida').value;if(!texto){erroB64d('Gere o resultado antes de copiar.');return;}copyToClipboard(texto,button);}
</script>
<?php ns_render_page_end(); ?>
