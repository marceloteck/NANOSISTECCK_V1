<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/config/bootstrap.php';
ns_redirect_legacy_url('/ferramentas/formatador-json');
ns_render_page_start('tool:formatador-json');
?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span>Formatador JSON</span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#edf2ff,#d5ddff);">🧩</div><div><h1>Formatador JSON Online</h1><p>Formate e organize JSON com indentação legível no navegador, sem enviar dados para o servidor.</p><span class="tag tag-blue">Desenvolvimento</span></div></div>
  <div class="tool-box">
    <div class="form-group"><label for="json-formatar">JSON</label><textarea id="json-formatar" class="form-control" rows="10" placeholder='{"nome":"teste","ativo":true}'></textarea></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="formatarJSON()">Formatar JSON</button><button type="button" class="btn btn-outline" onclick="limparFormatadorJSON()">Limpar</button><button type="button" class="copy-btn" onclick="copiarFormatadorJSON(this)">Copiar resultado</button></div>
    <div class="notice notice-warn" id="erro-json-formatar" style="display:none;"><span>⚠️</span><span id="erro-json-formatar-texto"></span></div>
    <div class="form-group" style="margin-top:1rem;"><label for="json-formatado">Resultado formatado</label><textarea id="json-formatado" class="form-control" rows="12" readonly></textarea></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
  <div class="seo-content"><h2>O que é essa ferramenta</h2><p>O formatador JSON online organiza a estrutura de um JSON em um formato mais legível, com quebras de linha e indentação. Isso facilita leitura, revisão, debug, documentação e compartilhamento entre desenvolvedores.</p><p>Como a formatação roda no navegador, o dado não precisa sair da página, o que melhora velocidade e privacidade.</p><h2>Como usar</h2><p>Cole o JSON bruto no campo principal e clique em formatar JSON. Se a estrutura for válida, o sistema gera uma versão identada e pronta para copiar. Se houver erro de sintaxe, uma mensagem amigável aparece indicando que o conteúdo precisa ser corrigido.</p><p>O botão limpar reinicia ambos os campos rapidamente.</p><h2>Exemplo de uso</h2><p>Ao receber um JSON minificado ou vindo de API em linha única, a ferramenta transforma esse conteúdo em um formato visual muito mais fácil de entender. Isso acelera inspeção, debug e análise de payloads.</p><p>É especialmente útil para rotina de front-end, back-end, QA e integrações.</p><h2>Perguntas frequentes</h2><h3>O JSON é enviado para o servidor?</h3><p>Não. Toda a lógica acontece localmente no navegador.</p><h3>Ela valida o JSON?</h3><p>Sim. Se o JSON estiver inválido, a ferramenta informa o erro em vez de formatar.</p><h3>Posso usar com payload grande?</h3><p>Sim, dentro dos limites normais do navegador para edição de texto.</p></div>
  <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/validador-json')) ?>" class="related-card"><span class="related-card-icon">✅</span> Validador JSON</a><a href="<?= ns_escape(ns_href('/ferramentas/conversor-texto')) ?>" class="related-card"><span class="related-card-icon">🔄</span> Conversor de Texto</a><a href="<?= ns_escape(ns_href('/ferramentas/gerador-senhas')) ?>" class="related-card"><span class="related-card-icon">🔐</span> Gerador de Senhas</a></div></div>
</div></main>
<script>
function erroJSONFormatar(msg){document.getElementById('erro-json-formatar-texto').textContent=msg;document.getElementById('erro-json-formatar').style.display='flex';}
function limparErroJSONFormatar(){document.getElementById('erro-json-formatar').style.display='none';}
function formatarJSON(){const texto=document.getElementById('json-formatar').value.trim();limparErroJSONFormatar();if(!texto){erroJSONFormatar('Cole um JSON para formatar.');return;}try{const objeto=JSON.parse(texto);document.getElementById('json-formatado').value=JSON.stringify(objeto,null,2);}catch(error){erroJSONFormatar('JSON inválido. Revise a sintaxe antes de formatar.');}}
function limparFormatadorJSON(){document.getElementById('json-formatar').value='';document.getElementById('json-formatado').value='';limparErroJSONFormatar();}
function copiarFormatadorJSON(button){const texto=document.getElementById('json-formatado').value;if(!texto){erroJSONFormatar('Formate o JSON antes de copiar.');return;}copyToClipboard(texto,button);}
</script>
<?php ns_render_page_end(); ?>
