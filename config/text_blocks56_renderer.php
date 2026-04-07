<?php

declare(strict_types=1);

function ns_text_block56_slugs(): array
{
    return [
        'contador-consoantes','contador-digitos','contador-frases','contador-paragrafos','contador-vogais',
        'embaralhador-linhas','extrator-emails-texto','extrator-hashtags','extrator-mencoes','extrator-numeros','extrator-urls-texto',
        'ordenador-linhas-alfabetico','ordenador-linhas-reverso','removedor-acentos','removedor-letras-texto','removedor-linhas-duplicadas',
        'removedor-linhas-vazias','removedor-numeros-texto','removedor-pontuacao','separador-espaco-linhas','separador-linhas-espaco',
        'separador-linhas-virgula','separador-virgula-linhas','texto-camel-case','texto-desescapar-html','texto-envolver-aspas',
        'texto-envolver-parenteses','texto-escapar-html','texto-frequencia-palavras','texto-gerador-iniciais','texto-inverter-caixa',
        'texto-kebab-case','texto-mascarar-cartao','texto-mascarar-cnpj','texto-mascarar-cpf','texto-mascarar-telefone',
        'texto-normalizar-espacos','texto-numerar-linhas','texto-ofuscar-email','texto-palavras-unicas','texto-pascal-case',
        'texto-prefixo','texto-quebrar-por-tamanho','texto-remover-html','texto-remover-quebras','texto-repetir','texto-snake-case',
        'texto-sufixo','texto-title-case','texto-truncar','comparador-texto','contador-caracteres','texto-maiusculo'
    ];
}

function ns_render_text_block56_tool(string $slug): void
{
    if (!in_array($slug, ns_text_block56_slugs(), true)) {
        http_response_code(404);
        echo 'Ferramenta de texto não encontrada.';
        return;
    }

    $tool = ns_tool($slug);
    if (!$tool) {
        http_response_code(404);
        echo 'Ferramenta inválida.';
        return;
    }

    ns_redirect_legacy_url('/ferramentas/' . $slug);
    ns_render_page_start('tool:' . $slug);
    ?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span><?= ns_escape($tool['name']) ?></span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:<?= ns_escape($tool['gradient']) ?>"><?= ns_escape($tool['icon']) ?></div><div><h1><?= ns_escape($tool['name']) ?></h1><p><?= ns_escape($tool['lead']) ?></p><span class="tag tag-green">Texto</span></div></div>
  <div class="tool-box">
    <div class="form-group"><label for="input-text">Texto principal</label><textarea id="input-text" class="form-control" style="min-height:120px"></textarea></div>
    <div class="form-group"><label for="input-extra">Parâmetro / texto auxiliar</label><input id="input-extra" class="form-control" type="text" /></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="runTool()">Executar</button><button type="button" class="btn btn-outline" onclick="clearTool()">Limpar</button><button type="button" class="copy-btn" onclick="copyTool(this)">Copiar resultado</button></div>
    <div class="notice notice-warn" id="tool-error" style="display:none;"><span>⚠️</span><span id="tool-error-text"></span></div>
    <div class="result-box" id="tool-result"><div class="result-label">Resultado</div><pre id="result-text" style="white-space:pre-wrap;margin:0">-</pre></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
</div></main>
<script>
const slug = <?= json_encode($slug, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
function v(id){const el=document.getElementById(id);return el?el.value:'';}
function txt(){return v('input-text');}
function showError(m){document.getElementById('tool-error-text').textContent=m;document.getElementById('tool-error').style.display='flex';document.getElementById('tool-result').classList.remove('show');}
function setResult(t){document.getElementById('tool-error').style.display='none';document.getElementById('result-text').textContent=t;showResult('tool-result');}
function toCamel(s){return s.toLowerCase().replace(/[^a-z0-9\s]+/gi,' ').trim().split(/\s+/).map((w,i)=>i===0?w:w[0].toUpperCase()+w.slice(1)).join('');}
function runTool(){
  const t=txt(); const x=v('input-extra');
  if(slug==='comparador-texto'){if(!t||!x){showError('Preencha texto principal e auxiliar.');return;} setResult(t===x?'Textos idênticos':'Textos diferentes'); return;}
  if(slug==='contador-caracteres'){setResult(`Caracteres: ${t.length}\nSem espaços: ${t.replace(/\s+/g,'').length}`); return;}
  if(slug==='contador-consoantes'){const m=(t.toLowerCase().match(/[bcdfghjklmnpqrstvwxyz]/g)||[]).length; setResult(String(m)); return;}
  if(slug==='contador-digitos'){setResult(String((t.match(/\d/g)||[]).length)); return;}
  if(slug==='contador-frases'){setResult(String((t.match(/[.!?]+/g)||[]).length || (t.trim()?1:0))); return;}
  if(slug==='contador-paragrafos'){setResult(String(t.trim()?t.split(/\n\s*\n/).length:0)); return;}
  if(slug==='contador-vogais'){setResult(String((t.toLowerCase().match(/[aeiouáéíóúâêîôûãõà]/g)||[]).length)); return;}
  if(slug==='embaralhador-linhas'){const arr=t.split('\n'); for(let i=arr.length-1;i>0;i--){const j=Math.floor(Math.random()*(i+1)); [arr[i],arr[j]]=[arr[j],arr[i]];} setResult(arr.join('\n')); return;}
  if(slug==='extrator-emails-texto'){setResult((t.match(/[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}/gi)||[]).join('\n')); return;}
  if(slug==='extrator-hashtags'){setResult((t.match(/#[\p{L}0-9_]+/gu)||[]).join('\n')); return;}
  if(slug==='extrator-mencoes'){setResult((t.match(/@[a-zA-Z0-9_\.]+/g)||[]).join('\n')); return;}
  if(slug==='extrator-numeros'){setResult((t.match(/\d+/g)||[]).join('\n')); return;}
  if(slug==='extrator-urls-texto'){setResult((t.match(/https?:\/\/[^\s]+/g)||[]).join('\n')); return;}
  if(slug==='ordenador-linhas-alfabetico'){setResult(t.split('\n').sort((a,b)=>a.localeCompare(b,'pt-BR')).join('\n')); return;}
  if(slug==='ordenador-linhas-reverso'){setResult(t.split('\n').reverse().join('\n')); return;}
  if(slug==='removedor-acentos'){setResult(t.normalize('NFD').replace(/[\u0300-\u036f]/g,'')); return;}
  if(slug==='removedor-letras-texto'){setResult(t.replace(/[A-Za-zÀ-ÿ]/g,'')); return;}
  if(slug==='removedor-linhas-duplicadas'){const seen=new Set(); setResult(t.split('\n').filter(l=>{if(seen.has(l))return false;seen.add(l);return true;}).join('\n')); return;}
  if(slug==='removedor-linhas-vazias'){setResult(t.split('\n').filter(l=>l.trim()!=='').join('\n')); return;}
  if(slug==='removedor-numeros-texto'){setResult(t.replace(/\d+/g,'')); return;}
  if(slug==='removedor-pontuacao'){setResult(t.replace(/[\p{P}$+<=>^`|~]/gu,'')); return;}
  if(slug==='separador-espaco-linhas'){setResult(t.split(/\s+/).filter(Boolean).join('\n')); return;}
  if(slug==='separador-linhas-espaco'){setResult(t.split('\n').filter(Boolean).join(' ')); return;}
  if(slug==='separador-linhas-virgula'){setResult(t.split('\n').filter(Boolean).join(',')); return;}
  if(slug==='separador-virgula-linhas'){setResult(t.split(',').map(s=>s.trim()).join('\n')); return;}
  if(slug==='texto-camel-case'){setResult(toCamel(t)); return;}
  if(slug==='texto-desescapar-html'){const el=document.createElement('textarea'); el.innerHTML=t; setResult(el.value); return;}
  if(slug==='texto-envolver-aspas'){setResult(t.split('\n').map(l=>`"${l}"`).join('\n')); return;}
  if(slug==='texto-envolver-parenteses'){setResult(t.split('\n').map(l=>`(${l})`).join('\n')); return;}
  if(slug==='texto-escapar-html'){setResult(t.replace(/[&<>"']/g,ch=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[ch]))); return;}
  if(slug==='texto-frequencia-palavras'){const words=t.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g,'').match(/[a-z0-9]+/g)||[]; const map={}; words.forEach(w=>map[w]=(map[w]||0)+1); setResult(Object.entries(map).sort((a,b)=>b[1]-a[1]).map(([k,n])=>`${k}: ${n}`).join('\n')); return;}
  if(slug==='texto-gerador-iniciais'){setResult((t.match(/\b\p{L}/gu)||[]).join('').toUpperCase()); return;}
  if(slug==='texto-inverter-caixa'){setResult(Array.from(t).map(ch=>ch===ch.toUpperCase()?ch.toLowerCase():ch.toUpperCase()).join('')); return;}
  if(slug==='texto-kebab-case'){setResult(toCamel(t).replace(/([A-Z])/g,'-$1').toLowerCase().replace(/^-/,'')); return;}
  if(slug==='texto-mascarar-cartao'){setResult(t.replace(/\b(\d{4})\d{8}(\d{4})\b/g,'$1********$2')); return;}
  if(slug==='texto-mascarar-cnpj'){setResult(t.replace(/\b(\d{2})\d{10}(\d{2})\b/g,'$1**********$2')); return;}
  if(slug==='texto-mascarar-cpf'){setResult(t.replace(/\b(\d{3})\d{5}(\d{3})\b/g,'$1*****$2')); return;}
  if(slug==='texto-mascarar-telefone'){setResult(t.replace(/\b(\d{2})\d{5}(\d{4})\b/g,'$1*****$2')); return;}
  if(slug==='texto-normalizar-espacos'){setResult(t.replace(/\s+/g,' ').trim()); return;}
  if(slug==='texto-numerar-linhas'){setResult(t.split('\n').map((l,i)=>`${i+1}. ${l}`).join('\n')); return;}
  if(slug==='texto-ofuscar-email'){setResult(t.replace(/([A-Z0-9._%+-]{2})[A-Z0-9._%+-]*(@[A-Z0-9.-]+\.[A-Z]{2,})/gi,'$1***$2')); return;}
  if(slug==='texto-palavras-unicas'){const words=Array.from(new Set((t.match(/[\p{L}0-9]+/gu)||[]).map(w=>w.toLowerCase()))); setResult(words.join('\n')); return;}
  if(slug==='texto-pascal-case'){const c=toCamel(t); setResult(c?c[0].toUpperCase()+c.slice(1):''); return;}
  if(slug==='texto-prefixo'){setResult(t.split('\n').map(l=>x+l).join('\n')); return;}
  if(slug==='texto-quebrar-por-tamanho'){const n=Math.max(parseInt(x||'80',10),1); const out=[]; for(let i=0;i<t.length;i+=n)out.push(t.slice(i,i+n)); setResult(out.join('\n')); return;}
  if(slug==='texto-remover-html'){setResult(t.replace(/<[^>]+>/g,'')); return;}
  if(slug==='texto-remover-quebras'){setResult(t.replace(/[\r\n]+/g,' ')); return;}
  if(slug==='texto-repetir'){const n=Math.min(Math.max(parseInt(x||'2',10),1),200); setResult(Array.from({length:n},()=>t).join('\n')); return;}
  if(slug==='texto-snake-case'){setResult(toCamel(t).replace(/([A-Z])/g,'_$1').toLowerCase().replace(/^_/,'').replace(/__+/g,'_')); return;}
  if(slug==='texto-sufixo'){setResult(t.split('\n').map(l=>l+x).join('\n')); return;}
  if(slug==='texto-title-case'){setResult(t.toLowerCase().replace(/\b\p{L}/gu,c=>c.toUpperCase())); return;}
  if(slug==='texto-truncar'){const n=Math.max(parseInt(x||'120',10),1); setResult(t.length>n?t.slice(0,n)+'...':t); return;}
  if(slug==='texto-maiusculo'){setResult(t.toUpperCase()); return;}
  showError('Operação não mapeada para esta ferramenta.');
}
function clearTool(){document.querySelectorAll('.tool-box input,.tool-box textarea').forEach(el=>el.value='');document.getElementById('result-text').textContent='-';document.getElementById('tool-result').classList.remove('show');document.getElementById('tool-error').style.display='none';}
function copyTool(btn){const t=document.getElementById('result-text').textContent;if(!t||t==='-'){showError('Gere um resultado antes de copiar.');return;}copyToClipboard(t,btn);}
</script>
<?php ns_render_page_end();
}
