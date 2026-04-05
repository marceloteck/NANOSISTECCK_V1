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
  <div class="seo-content"><h2>O que é essa ferramenta</h2><p>O encoder Base64 online converte texto comum para o formato Base64, muito usado em integrações, autenticação básica, testes, URLs e serialização simples de conteúdo. É uma utilidade frequente no dia a dia de desenvolvimento.</p><p>O resultado é gerado no navegador, sem envio de dados para o servidor, o que melhora velocidade e privacidade.</p><h2>Como usar</h2><p>Digite ou cole o texto no primeiro campo e clique em codificar. A versão em Base64 aparece logo abaixo pronta para cópia. Se o campo estiver vazio, a página pede que você informe algum conteúdo.</p><p>O botão limpar reinicia os dois campos para uma nova conversão.</p><h2>Exemplo de uso</h2><p>Ao precisar testar payloads ou converter um valor curto para interoperabilidade, essa ferramenta evita abrir terminal ou escrever código manual. Basta colar, converter e usar.</p><p>É uma solução simples e direta para tarefas técnicas repetitivas.</p><h2>Perguntas frequentes</h2><h3>Base64 é criptografia?</h3><p>Não. Base64 é um formato de codificação, não um mecanismo de segurança.</p><h3>O texto é enviado ao servidor?</h3><p>Não. Toda a operação acontece localmente no navegador.</p><h3>Posso usar acentos?</h3><p>Sim. A ferramenta trata texto UTF-8 antes de converter.</p></div>
  <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/decoder-base64')) ?>" class="related-card"><span class="related-card-icon">🔓</span> Decoder Base64</a><a href="<?= ns_escape(ns_href('/ferramentas/formatador-json')) ?>" class="related-card"><span class="related-card-icon">🧩</span> Formatador JSON</a><a href="<?= ns_escape(ns_href('/ferramentas/validador-json')) ?>" class="related-card"><span class="related-card-icon">✅</span> Validador JSON</a></div></div>
</div></main>
<script>
function erroB64e(msg){document.getElementById('erro-b64e-texto').textContent=msg;document.getElementById('erro-b64e').style.display='flex';}
function limparErroB64e(){document.getElementById('erro-b64e').style.display='none';}
function codificarBase64(){const texto=document.getElementById('base64-entrada').value;limparErroB64e();if(!texto){erroB64e('Digite um texto para codificar em Base64.');return;}document.getElementById('base64-saida').value=btoa(unescape(encodeURIComponent(texto)));}
function limparBase64Encode(){document.getElementById('base64-entrada').value='';document.getElementById('base64-saida').value='';limparErroB64e();}
function copiarBase64Encode(button){const texto=document.getElementById('base64-saida').value;if(!texto){erroB64e('Gere o resultado antes de copiar.');return;}copyToClipboard(texto,button);}
</script>
<?php ns_render_page_end(); ?>
