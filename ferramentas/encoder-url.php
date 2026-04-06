<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

ns_redirect_legacy_url('/ferramentas/encoder-url');
ns_render_page_start('tool:encoder-url');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span>Encoder URL</span></nav>
    <?php ns_render_ad_slot('leaderboard'); ?>
    <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#eefbfd,#d8f3f8);">🔗</div><div><h1>Encoder URL</h1><p>Converta texto para URL encoded e evite falhas com espaços e caracteres especiais.</p><span class="tag tag-green">Desenvolvimento</span></div></div>
    <div class="tool-box">
      <div class="form-group"><label for="urlenc-in">Texto</label><textarea id="urlenc-in" class="form-control" rows="8"></textarea></div>
      <div class="form-row"><button class="btn btn-primary" type="button" onclick="encURL()">Codificar</button><button class="btn btn-outline" type="button" onclick="clearURLenc()">Limpar</button><button class="copy-btn" type="button" onclick="copyURLenc(this)">Copiar resultado</button></div>
      <div class="notice notice-warn" id="urlenc-error" style="display:none;"><span>⚠️</span><span id="urlenc-error-text"></span></div>
      <div class="form-group" style="margin-top:1rem;"><label for="urlenc-out">Resultado</label><textarea id="urlenc-out" class="form-control" rows="5" readonly></textarea></div>
    </div>
    <?php ns_render_ad_slot('rectangle'); ?>
    <div class="seo-content"><h2>O que esta ferramenta resolve</h2><p>Converte texto para o formato seguro de URL, ideal para parâmetros de query string e integrações web.</p><h2>Quando usar</h2><p>Use ao montar links com parâmetros dinâmicos, UTMs, payloads em URL e testes de integração.</p><h2>Quando não usar</h2><p>Não use encode de URL para criptografia. É apenas codificação de transporte.</p><h2>Erros comuns</h2><ul><li>Codificar URL inteira quando só o parâmetro precisa de encode.</li><li>Esquecer decode no consumo da aplicação.</li></ul><h2>Exemplo prático</h2><p>`promoção verão` vira `promo%C3%A7%C3%A3o%20ver%C3%A3o` para envio seguro em query string.</p></div>
  </div>
</main>
<script>
function urlEncError(msg){document.getElementById('urlenc-error-text').textContent=msg;document.getElementById('urlenc-error').style.display='flex';}
function urlEncClearError(){document.getElementById('urlenc-error').style.display='none';}
function encURL(){
  const value=document.getElementById('urlenc-in').value;
  urlEncClearError();
  if(!value.trim()){urlEncError('Digite um texto para codificar.');return;}
  document.getElementById('urlenc-out').value=encodeURIComponent(value);
}
function clearURLenc(){document.getElementById('urlenc-in').value='';document.getElementById('urlenc-out').value='';urlEncClearError();}
function copyURLenc(b){const v=document.getElementById('urlenc-out').value;if(!v){urlEncError('Gere um resultado antes de copiar.');return;}copyToClipboard(v,b)}
</script>
<?php ns_render_page_end(); ?>
