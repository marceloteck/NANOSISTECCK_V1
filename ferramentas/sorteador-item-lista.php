<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

ns_redirect_legacy_url('/ferramentas/sorteador-item-lista');
ns_render_page_start('tool:sorteador-item-lista');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span>Sorteador de Item da Lista</span></nav>
    <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#eef4ff,#dbe7ff)">🧰</div><div><h1>Sorteador de Item da Lista</h1><p>Escolher um item com interface simples e resultado imediato.</p><span class="tag tag-green">Utilitários</span></div></div>
    <div class="tool-box">
      <style>.tool-box textarea.form-control{min-height:96px} .inline-btns{display:flex;gap:.6rem;flex-wrap:wrap}</style>
      <div class='form-row'><div class='form-group'><label for='input-text'>Prefixo/Lista base (opcional)</label><textarea id='input-text' class='form-control' rows='4' placeholder='Ex: promoção'></textarea></div><div class='form-group'><label for='input-a'>Quantidade</label><input id='input-a' type='number' class='form-control' min='1' step='1' value='5'></div></div>
      <div class="inline-btns"><button class="btn btn-primary" onclick="runTool()">Executar</button><button class="btn btn-outline" onclick="clearTool()">Limpar</button><button class="copy-btn" onclick="copyTool(this)">Copiar resultado</button></div>
      <div class="notice notice-warn" id="tool-error" style="display:none;"><span>⚠️</span><span id="tool-error-text"></span></div>
      <div class="result-box" id="tool-result"><div class="result-label">Resultado</div><pre id="result-text" style="white-space:pre-wrap;margin:0">-</pre><div id="tool-detail" style="margin-top:.75rem;color:var(--text2)"></div></div>
    </div>
    <div class="seo-content"><h2>Sobre esta ferramenta</h2><p>Esta página de sorteador de item da lista foi criada para executar a tarefa de forma local, sem depender de API externa. Isso melhora desempenho, privacidade e disponibilidade.</p><h3>Como usar</h3><p>Preencha os campos, clique em <strong>Executar</strong>, confira o resultado e use <strong>Copiar resultado</strong> quando precisar reaproveitar a saída em outro contexto.</p></div>
    <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/gerador-numero-aleatorio')) ?>" class="related-card"><span class="related-card-icon">🧰</span> Gerador Numero Aleatorio</a><a href="<?= ns_escape(ns_href('/ferramentas/gerador-numero-loteria')) ?>" class="related-card"><span class="related-card-icon">🧰</span> Gerador Numero Loteria</a><a href="<?= ns_escape(ns_href('/ferramentas/sorteador-nomes')) ?>" class="related-card"><span class="related-card-icon">🧰</span> Sorteador Nomes</a></div></div>
  </div>
</main>
<script>
const slug="sorteador-item-lista";
function erro(m){document.getElementById('tool-error-text').textContent=m;document.getElementById('tool-error').style.display='flex';document.getElementById('tool-result').classList.remove('show');}
function ok(t){document.getElementById('tool-error').style.display='none';document.getElementById('result-text').textContent=t;showResult('tool-result');}
function runTool(){const base=document.getElementById('input-text').value.trim(); const n=Math.max(1,parseInt(document.getElementById('input-a').value||'5',10)); const chars='ABCDEFGHJKLMNPQRSTUVWXYZ23456789'; let out=[]; for(let i=0;i<n;i++){let s=''; for(let j=0;j<8;j++){s+=chars[Math.floor(Math.random()*chars.length)];} out.push(base?`${base}-${s}`:s);} if(slug.includes('lancador-moeda')){out=[Math.random()<0.5?'Cara':'Coroa'];} if(slug.includes('rolagem-dado')){out=[String(1+Math.floor(Math.random()*6))];} document.getElementById('tool-detail').textContent=`${out.length} item(ns) gerado(s).`; const text=out.join('\n'); ok(text);}
function clearTool(){document.querySelectorAll('.tool-box input,.tool-box textarea').forEach(el=>el.value='');document.getElementById('result-text').textContent='-';document.getElementById('tool-detail').textContent='';document.getElementById('tool-result').classList.remove('show');document.getElementById('tool-error').style.display='none';}
function copyTool(btn){const t=document.getElementById('result-text').textContent; if(!t||t==='-'){erro('Gere um resultado antes de copiar.');return;} copyToClipboard(t,btn);}
</script>
<?php ns_render_page_end(); ?>
