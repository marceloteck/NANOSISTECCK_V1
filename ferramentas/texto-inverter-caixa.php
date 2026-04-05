<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

ns_redirect_legacy_url('/ferramentas/texto-inverter-caixa');
ns_render_page_start('tool:texto-inverter-caixa');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span>Inverter Caixa do Texto</span></nav>
    <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#eef4ff,#dbe7ff)">📝</div><div><h1>Inverter Caixa do Texto</h1><p>Maiúsculas/minúsculas alternadas com interface simples e resultado imediato.</p><span class="tag tag-green">Texto</span></div></div>
    <div class="tool-box">
      <style>.tool-box textarea.form-control{min-height:96px} .inline-btns{display:flex;gap:.6rem;flex-wrap:wrap}</style>
      <div class='form-group'><label for='input-text'>Texto de entrada</label><textarea id='input-text' class='form-control' rows='7' placeholder='Cole ou digite aqui'></textarea></div><div class='form-group'><label for='input-b'>Texto secundário (opcional)</label><textarea id='input-b' class='form-control' rows='4' placeholder='Use quando precisar comparar'></textarea></div>
      <div class="inline-btns"><button class="btn btn-primary" onclick="runTool()">Executar</button><button class="btn btn-outline" onclick="clearTool()">Limpar</button><button class="copy-btn" onclick="copyTool(this)">Copiar resultado</button></div>
      <div class="notice notice-warn" id="tool-error" style="display:none;"><span>⚠️</span><span id="tool-error-text"></span></div>
      <div class="result-box" id="tool-result"><div class="result-label">Resultado</div><pre id="result-text" style="white-space:pre-wrap;margin:0">-</pre><div id="tool-detail" style="margin-top:.75rem;color:var(--text2)"></div></div>
    </div>
    <div class="seo-content"><h2>Sobre esta ferramenta</h2><p>Esta página de inverter caixa do texto foi criada para executar a tarefa de forma local, sem depender de API externa. Isso melhora desempenho, privacidade e disponibilidade.</p><h3>Como usar</h3><p>Preencha os campos, clique em <strong>Executar</strong>, confira o resultado e use <strong>Copiar resultado</strong> quando precisar reaproveitar a saída em outro contexto.</p></div>
    <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/removedor-linhas-vazias')) ?>" class="related-card"><span class="related-card-icon">📝</span> Removedor Linhas Vazias</a><a href="<?= ns_escape(ns_href('/ferramentas/removedor-linhas-duplicadas')) ?>" class="related-card"><span class="related-card-icon">📝</span> Removedor Linhas Duplicadas</a><a href="<?= ns_escape(ns_href('/ferramentas/ordenador-linhas-alfabetico')) ?>" class="related-card"><span class="related-card-icon">📝</span> Ordenador Linhas Alfabetico</a></div></div>
  </div>
</main>
<script>
const slug="texto-inverter-caixa";
function erro(m){document.getElementById('tool-error-text').textContent=m;document.getElementById('tool-error').style.display='flex';document.getElementById('tool-result').classList.remove('show');}
function ok(t){document.getElementById('tool-error').style.display='none';document.getElementById('result-text').textContent=t;showResult('tool-result');}
function runTool(){const txt=document.getElementById('input-text').value; if(!txt.trim()){erro('Digite um texto de entrada.');return;} let out=txt; if(slug.includes('removedor')){out=txt.replace(/\s+/g,' ').trim();} else if(slug.includes('extrator')){const m=txt.match(/[\w@.:/#-]+/g)||[]; out=m.join('\n');} else if(slug.includes('formatador')||slug.includes('beautifier')){out=txt.split('\n').map((l,i)=>`${i+1}. ${l.trim()}`).join('\n');} else if(slug.includes('minificador')){out=txt.replace(/\s+/g,' ').trim();} else if(slug.includes('parser')){out=txt.split(/[&\n]+/).filter(Boolean).map(v=>`• ${v}`).join('\n');} else if(slug.includes('decoder')){try{out=decodeURIComponent(txt);}catch(e){out=txt;}} else if(slug.includes('encoder')){out=encodeURIComponent(txt);} else if(slug.includes('comparador')||slug.includes('diff')){const b=document.getElementById('input-b').value; out = txt===b ? 'Textos idênticos' : `Texto A: ${txt.length} chars | Texto B: ${b.length} chars`; } else {out=txt.toUpperCase();} ok(text);}
function clearTool(){document.querySelectorAll('.tool-box input,.tool-box textarea').forEach(el=>el.value='');document.getElementById('result-text').textContent='-';document.getElementById('tool-detail').textContent='';document.getElementById('tool-result').classList.remove('show');document.getElementById('tool-error').style.display='none';}
function copyTool(btn){const t=document.getElementById('result-text').textContent; if(!t||t==='-'){erro('Gere um resultado antes de copiar.');return;} copyToClipboard(t,btn);}
</script>
<?php ns_render_page_end(); ?>
