<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

ns_redirect_legacy_url('/ferramentas/conversor-galoes-litros');
ns_render_page_start('tool:conversor-galoes-litros');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span>Conversor de Galões para Litros</span></nav>
    <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#eef4ff,#dbe7ff)">🔄</div><div><h1>Conversor de Galões para Litros</h1><p>Volume com interface simples e resultado imediato.</p><span class="tag tag-green">Conversores</span></div></div>
    <div class="tool-box">
      <style>.tool-box textarea.form-control{min-height:96px} .inline-btns{display:flex;gap:.6rem;flex-wrap:wrap}</style>
      <div class='form-row'><div class='form-group'><label for='input-a'>Valor A</label><input id='input-a' type='number' class='form-control' step='any' placeholder='Digite um valor'></div><div class='form-group'><label for='input-b'>Valor B / Taxa (opcional)</label><input id='input-b' type='number' class='form-control' step='any' placeholder='Segundo valor'></div></div>
      <div class="inline-btns"><button class="btn btn-primary" onclick="runTool()">Executar</button><button class="btn btn-outline" onclick="clearTool()">Limpar</button><button class="copy-btn" onclick="copyTool(this)">Copiar resultado</button></div>
      <div class="notice notice-warn" id="tool-error" style="display:none;"><span>⚠️</span><span id="tool-error-text"></span></div>
      <div class="result-box" id="tool-result"><div class="result-label">Resultado</div><pre id="result-text" style="white-space:pre-wrap;margin:0">-</pre><div id="tool-detail" style="margin-top:.75rem;color:var(--text2)"></div></div>
    </div>
    <div class="seo-content"><h2>Sobre esta ferramenta</h2><p>Esta página de conversor de galões para litros foi criada para executar a tarefa de forma local, sem depender de API externa. Isso melhora desempenho, privacidade e disponibilidade.</p><h3>Como usar</h3><p>Preencha os campos, clique em <strong>Executar</strong>, confira o resultado e use <strong>Copiar resultado</strong> quando precisar reaproveitar a saída em outro contexto.</p></div>
    <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/conversor-moedas-fixo')) ?>" class="related-card"><span class="related-card-icon">🔄</span> Conversor Moedas Fixo</a><a href="<?= ns_escape(ns_href('/ferramentas/conversor-metros-pes')) ?>" class="related-card"><span class="related-card-icon">🔄</span> Conversor Metros Pes</a><a href="<?= ns_escape(ns_href('/ferramentas/conversor-pes-metros')) ?>" class="related-card"><span class="related-card-icon">🔄</span> Conversor Pes Metros</a></div></div>
  </div>
</main>
<script>
const slug="conversor-galoes-litros";
function erro(m){document.getElementById('tool-error-text').textContent=m;document.getElementById('tool-error').style.display='flex';document.getElementById('tool-result').classList.remove('show');}
function ok(t){document.getElementById('tool-error').style.display='none';document.getElementById('result-text').textContent=t;showResult('tool-result');}
function runTool(){const a=parseFloat(document.getElementById('input-a').value); const b=parseFloat(document.getElementById('input-b').value); if(Number.isNaN(a)){erro('Informe ao menos o primeiro valor.');return;} let r=0; if(slug.includes('conversor')){const taxa=Number.isNaN(b)?1:b; r=a*taxa; document.getElementById('tool-detail').textContent='Conversão feita com taxa manual.';} else if(slug.includes('contador')){r=Math.max(0,Math.round(a));} else if(slug.includes('calculadora')){r=Number.isNaN(b)?a:a+b;} else if(slug.includes('somador')){r=(Number.isNaN(b)?0:b)+a;} else if(slug.includes('subtrator')){r=a-(Number.isNaN(b)?0:b);} else if(slug.includes('multiplicador')){r=a*(Number.isNaN(b)?1:b);} else if(slug.includes('divisor')){if(!b){erro('O segundo valor não pode ser zero.');return;} r=a/b;} else {r=Number.isNaN(b)?a:a+b;} const text=`Resultado: ${fmtNum(r,6)}`; ok(text);}
function clearTool(){document.querySelectorAll('.tool-box input,.tool-box textarea').forEach(el=>el.value='');document.getElementById('result-text').textContent='-';document.getElementById('tool-detail').textContent='';document.getElementById('tool-result').classList.remove('show');document.getElementById('tool-error').style.display='none';}
function copyTool(btn){const t=document.getElementById('result-text').textContent; if(!t||t==='-'){erro('Gere um resultado antes de copiar.');return;} copyToClipboard(t,btn);}
</script>
<?php ns_render_page_end(); ?>
