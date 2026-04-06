<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/config/bootstrap.php';
ns_redirect_legacy_url('/ferramentas/encoder-base64');
ns_render_page_start('tool:encoder-base64');
?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span>Encoder Base64</span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#eef7ff,#d5e9ff);">🔐</div><div><h1>Encoder Base64 Online</h1><p>Converta texto para Base64 com rapidez, sem frameworks e com processamento local no navegador.</p><span class="tag tag-blue">Desenvolvimento</span></div></div>
  <div class="tool-box">
    <div class="form-group"><label for="base64-entrada">Texto original</label><textarea id="base64-entrada" class="form-control" rows="8"></textarea></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="codificarBase64()">Codificar</button><button type="button" class="btn btn-outline" onclick="limparBase64Encode()">Limpar</button><button type="button" class="copy-btn" onclick="copiarBase64Encode(this)">Copiar resultado</button></div>
    <div class="notice notice-warn" id="erro-b64e" style="display:none;"><span>⚠️</span><span id="erro-b64e-texto"></span></div>
    <div class="form-group" style="margin-top:1rem;"><label for="base64-saida">Base64</label><textarea id="base64-saida" class="form-control" rows="8" readonly></textarea></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
  <div class="seo-content"><h2>O que esta ferramenta resolve</h2><p>Encoder Base64 Online foi estruturada para resolver uma tarefa prática com execução rápida no navegador, sem instalação. Converta texto para Base64 com rapidez, sem frameworks e com processamento local no navegador.</p><h2>Quando usar</h2><p>Use quando você precisa de uma resposta imediata para trabalho, estudo, operação ou validação técnica e quer reduzir retrabalho.</p><h2>Quando NÃO usar</h2><p>Não use como única base para decisões críticas sem revisão humana, validação de contexto e conferência de unidades/entradas.</p><h2>Erros comuns</h2><ul><li>Preencher campos com unidade errada.</li><li>Interpretar resultado sem contexto do problema real.</li><li>Copiar saída sem validar premissas e limites.</li></ul><h2>Exemplo prático</h2><p>Preencha os campos com dados reais, execute, valide a interpretação exibida na tela e só então use o resultado em relatório, orçamento ou documentação.</p><h2>Boas práticas de qualidade</h2><p>Revise dados de entrada, mantenha rastreabilidade da origem dos números e faça dupla checagem quando o resultado impactar finanças, saúde, jurídico ou compliance.</p></div><div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/decoder-base64')) ?>" class="related-card"><span class="related-card-icon">🔓</span> Decoder Base64</a><a href="<?= ns_escape(ns_href('/ferramentas/formatador-json')) ?>" class="related-card"><span class="related-card-icon">🧩</span> Formatador JSON</a><a href="<?= ns_escape(ns_href('/ferramentas/validador-json')) ?>" class="related-card"><span class="related-card-icon">✅</span> Validador JSON</a></div></div>
</div></main>
<script>
function erroB64e(msg){document.getElementById('erro-b64e-texto').textContent=msg;document.getElementById('erro-b64e').style.display='flex';}
function limparErroB64e(){document.getElementById('erro-b64e').style.display='none';}
function codificarBase64(){const texto=document.getElementById('base64-entrada').value;limparErroB64e();if(!texto){erroB64e('Digite um texto para codificar em Base64.');return;}document.getElementById('base64-saida').value=btoa(unescape(encodeURIComponent(texto)));}
function limparBase64Encode(){document.getElementById('base64-entrada').value='';document.getElementById('base64-saida').value='';limparErroB64e();}
function copiarBase64Encode(button){const texto=document.getElementById('base64-saida').value;if(!texto){erroB64e('Gere o resultado antes de copiar.');return;}copyToClipboard(texto,button);}
</script>
<?php ns_render_page_end(); ?>
