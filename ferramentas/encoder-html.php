<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

ns_redirect_legacy_url('/ferramentas/encoder-html');
ns_render_page_start('tool:encoder-html');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span>Encoder HTML</span></nav>
    <?php ns_render_ad_slot('leaderboard'); ?>
    <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#fff7ef,#ffe0c8);">💻</div><div><h1>Encoder HTML</h1><p>Converta caracteres especiais em entidades HTML para exibir código com segurança.</p><span class="tag tag-orange">Desenvolvimento</span></div></div>
    <div class="tool-box">
      <div class="form-group"><label for="he-in">Texto</label><textarea id="he-in" class="form-control" rows="8"></textarea></div>
      <div class="form-row"><button class="btn btn-primary" type="button" onclick="encHTML()">Codificar</button><button class="btn btn-outline" type="button" onclick="clearHE()">Limpar</button><button class="copy-btn" type="button" onclick="copyHE(this)">Copiar resultado</button></div>
      <div class="notice notice-warn" id="he-error" style="display:none;"><span>⚠️</span><span id="he-error-text"></span></div>
      <div class="form-group" style="margin-top:1rem;"><label for="he-out">Resultado</label><textarea id="he-out" class="form-control" rows="5" readonly></textarea></div>
    </div>
    <?php ns_render_ad_slot('rectangle'); ?>
    <div class="seo-content"><h2>O que esta ferramenta resolve</h2><p>Transforma `<`, `>`, `&` e outros caracteres em entidades HTML para evitar renderização acidental de tags em documentação e conteúdo técnico.</p><h2>Quando usar</h2><p>Use ao publicar exemplos de código em CMS, e-mails HTML, bases de conhecimento e páginas de suporte.</p><h2>Quando não usar</h2><p>Não use para sanitização completa de segurança no backend. Isso exige validação e escaping no servidor.</p><h2>Erros comuns</h2><ul><li>Aplicar encode duas vezes sem necessidade.</li><li>Assumir que encode substitui proteção contra XSS no backend.</li></ul><h2>Exemplo prático</h2><p>`<div class="card">` vira `&lt;div class=&quot;card&quot;&gt;`, permitindo exibição segura em tutoriais.</p></div>
  </div>
</main>
<script>
function heError(msg){document.getElementById('he-error-text').textContent=msg;document.getElementById('he-error').style.display='flex';}
function heClearError(){document.getElementById('he-error').style.display='none';}
function encHTML(){
  const source=document.getElementById('he-in').value;
  heClearError();
  if(!source.trim()){heError('Digite um texto para codificar.');return;}
  const d=document.createElement('div');
  d.textContent=source;
  document.getElementById('he-out').value=d.innerHTML;
}
function clearHE(){document.getElementById('he-in').value='';document.getElementById('he-out').value='';heClearError();}
function copyHE(b){const v=document.getElementById('he-out').value;if(!v){heError('Gere um resultado antes de copiar.');return;}copyToClipboard(v,b)}
</script>
<?php ns_render_page_end(); ?>
