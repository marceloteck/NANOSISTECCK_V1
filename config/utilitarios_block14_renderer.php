<?php

declare(strict_types=1);

function ns_block14_slugs(): array
{
    return [
        'calculadora-percentual-lista','contador-itens-lista','decoder-codigo-morse','divisor-lista-em-blocos','embaralhador-lista',
        'gerador-codigo-cupom','gerador-codigo-morse','gerador-codigo-verificacao','gerador-id-curto','gerador-linha-do-tempo-texto',
        'gerador-nome-arquivo-seguro','gerador-numero-aleatorio','gerador-numero-loteria','gerador-resumo-lista','gerador-senha-pin',
        'intercalador-listas','lancador-moeda','mesclador-listas','removedor-caracteres-especiais-arquivo','removedor-itens-duplicados-lista',
        'rolagem-dado','rolagem-dados-rpg','sorteador-item-lista','sorteador-nomes','sorteador-times',
    ];
}

function ns_render_block14_tool(string $slug): void
{
    if (!in_array($slug, ns_block14_slugs(), true)) { http_response_code(404); echo 'Ferramenta do bloco 14 não encontrada.'; return; }
    $tool = ns_tool($slug); if (!$tool) { http_response_code(404); echo 'Ferramenta inválida.'; return; }

    ns_redirect_legacy_url('/ferramentas/' . $slug);
    ns_render_page_start('tool:' . $slug);
    ?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span><?= ns_escape($tool['name']) ?></span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:<?= ns_escape($tool['gradient']) ?>"><?= ns_escape($tool['icon']) ?></div><div><h1><?= ns_escape($tool['name']) ?></h1><p><?= ns_escape($tool['lead']) ?></p><span class="tag tag-green">Utilitários</span></div></div>
  <div class="tool-box">
    <div class="form-group"><label for="input-text">Entrada</label><textarea id="input-text" class="form-control" style="min-height:120px"></textarea></div>
    <div class="form-row"><div class="form-group"><label for="input-a">Valor A</label><input id="input-a" class="form-control" type="text" /></div><div class="form-group"><label for="input-b">Valor B</label><input id="input-b" class="form-control" type="text" /></div></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="runTool()">Executar</button><button type="button" class="btn btn-outline" onclick="clearTool()">Limpar</button><button type="button" class="copy-btn" onclick="copyTool(this)">Copiar resultado</button></div>
    <div class="notice notice-warn" id="tool-error" style="display:none;"><span>⚠️</span><span id="tool-error-text"></span></div>
    <div class="result-box" id="tool-result"><div class="result-label">Resultado</div><pre id="result-text" style="white-space:pre-wrap;margin:0">-</pre></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
</div></main>
<script>
const slug = <?= json_encode($slug, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
const text=()=> (document.getElementById('input-text').value||'').trim();
const n=(id)=> parseFloat((document.getElementById(id).value||'').trim().replace(',','.'));
function err(m){document.getElementById('tool-error-text').textContent=m;document.getElementById('tool-error').style.display='flex';document.getElementById('tool-result').classList.remove('show');}
function out(t){document.getElementById('tool-error').style.display='none';document.getElementById('result-text').textContent=t;showResult('tool-result');}
function runTool(){
  const t=text(), a=n('input-a'), b=n('input-b');
  if(slug==='lancador-moeda'){ out(Math.random()<0.5?'Cara':'Coroa'); return; }
  if(slug==='rolagem-dado'){ out(String(1+Math.floor(Math.random()*6))); return; }
  if(slug==='rolagem-dados-rpg'){ const faces=Number.isNaN(a)?20:Math.max(2,Math.floor(a)); out(String(1+Math.floor(Math.random()*faces))); return; }
  if(slug==='gerador-numero-aleatorio' || slug==='gerador-numero-loteria'){ const min=Number.isNaN(a)?1:Math.floor(a), max=Number.isNaN(b)?60:Math.floor(b); if(max<=min){err('Faixa inválida.');return;} const val=min+Math.floor(Math.random()*(max-min+1)); out(String(val)); return; }
  if(slug==='sorteador-nomes' || slug==='sorteador-item-lista' || slug==='sorteador-times'){ if(!t){err('Informe itens, um por linha.');return;} const items=t.split(/\r?\n/).map(s=>s.trim()).filter(Boolean); if(items.length===0){err('Lista vazia.');return;} out(items[Math.floor(Math.random()*items.length)]); return; }
  if(slug==='contador-itens-lista'){ if(!t){err('Informe itens.');return;} const items=t.split(/\r?\n/).map(s=>s.trim()).filter(Boolean); out(`Itens: ${items.length}`); return; }
  if(slug==='removedor-itens-duplicados-lista'){ if(!t){err('Informe itens.');return;} const items=[...new Set(t.split(/\r?\n/).map(s=>s.trim()).filter(Boolean))]; out(items.join('\n')); return; }
  if(slug==='divisor-lista-em-blocos'){ if(!t||Number.isNaN(a)||a<=0){err('Informe lista e tamanho do bloco.');return;} const items=t.split(/\r?\n/).map(s=>s.trim()).filter(Boolean); const size=Math.floor(a); const chunks=[]; for(let i=0;i<items.length;i+=size){chunks.push(items.slice(i,i+size).join(', '));} out(chunks.join('\n')); return; }
  if(slug==='embaralhador-lista'){ if(!t){err('Informe lista.');return;} const items=t.split(/\r?\n/).filter(Boolean); for(let i=items.length-1;i>0;i--){const j=Math.floor(Math.random()*(i+1)); [items[i],items[j]]=[items[j],items[i]];} out(items.join('\n')); return; }
  if(slug==='intercalador-listas' || slug==='mesclador-listas'){ if(!t){err('Informe lista na área de texto.');return;} const l1=t.split(/\r?\n/).filter(Boolean), l2=(document.getElementById('input-b').value||'').split(',').map(s=>s.trim()).filter(Boolean); if(slug==='mesclador-listas'){ out(l1.concat(l2).join('\n')); } else { const max=Math.max(l1.length,l2.length); const outArr=[]; for(let i=0;i<max;i++){ if(l1[i]) outArr.push(l1[i]); if(l2[i]) outArr.push(l2[i]); } out(outArr.join('\n')); } return; }
  if(slug==='calculadora-percentual-lista'){ if(!t){err('Informe números (um por linha).');return;} const nums=t.split(/\r?\n/).map(v=>parseFloat(v.replace(',','.'))).filter(v=>!Number.isNaN(v)); const total=nums.reduce((s,x)=>s+x,0); out(nums.map((x,i)=>`Item ${i+1}: ${total?((x/total)*100).toFixed(2):'0.00'}%`).join('\n')); return; }
  if(slug==='gerador-codigo-cupom' || slug==='gerador-codigo-verificacao' || slug==='gerador-id-curto' || slug==='gerador-senha-pin'){ const len=Number.isNaN(a)?8:Math.max(4,Math.floor(a)); const chars=slug==='gerador-senha-pin'?'0123456789':'ABCDEFGHJKLMNPQRSTUVWXYZ23456789'; let r=''; for(let i=0;i<len;i++) r+=chars[Math.floor(Math.random()*chars.length)]; out(r); return; }
  if(slug==='gerador-codigo-morse'){ if(!t){err('Informe texto.');return;} const map={'a':'.-','b':'-...','c':'-.-.','d':'-..','e':'.','f':'..-.','g':'--.','h':'....','i':'..','j':'.---','k':'-.-','l':'.-..','m':'--','n':'-.','o':'---','p':'.--.','q':'--.-','r':'.-.','s':'...','t':'-','u':'..-','v':'...-','w':'.--','x':'-..-','y':'-.--','z':'--..','0':'-----','1':'.----','2':'..---','3':'...--','4':'....-','5':'.....','6':'-....','7':'--...','8':'---..','9':'----.'}; out(t.toLowerCase().split('').map(ch=>map[ch]||'/').join(' ')); return; }
  if(slug==='decoder-codigo-morse'){ if(!t){err('Informe código morse.');return;} const map={'.-':'a','-...':'b','-.-.':'c','-..':'d','.':'e','..-.':'f','--.':'g','....':'h','..':'i','.---':'j','-.-':'k','.-..':'l','--':'m','-.':'n','---':'o','.--.':'p','--.-':'q','.-.':'r','...':'s','-':'t','..-':'u','...-':'v','.--':'w','-..-':'x','-.--':'y','--..':'z','-----':'0','.----':'1','..---':'2','...--':'3','....-':'4','.....':'5','-....':'6','--...':'7','---..':'8','----.':'9'}; out(t.split(/\s+/).map(c=>map[c]||'?').join('')); return; }
  if(slug==='gerador-linha-do-tempo-texto' || slug==='gerador-resumo-lista'){ if(!t){err('Informe texto/lista.');return;} const lines=t.split(/\r?\n/).filter(Boolean); if(slug==='gerador-linha-do-tempo-texto') out(lines.map((l,i)=>`${i+1}. ${l}`).join('\n')); else out(lines.slice(0,Math.max(1,Number.isNaN(a)?5:Math.floor(a))).join('\n')); return; }
  if(slug==='removedor-caracteres-especiais-arquivo' || slug==='gerador-nome-arquivo-seguro'){ const base=t||'arquivo'; out(base.normalize('NFD').replace(/[\u0300-\u036f]/g,'').replace(/[^a-zA-Z0-9._-]+/g,'-').toLowerCase()); return; }
  err('Preencha os campos necessários para esta ferramenta.');
}
function clearTool(){document.getElementById('input-text').value='';document.getElementById('input-a').value='';document.getElementById('input-b').value='';document.getElementById('result-text').textContent='-';document.getElementById('tool-result').classList.remove('show');document.getElementById('tool-error').style.display='none';}
function copyTool(btn){const t=document.getElementById('result-text').textContent;if(!t||t==='-'){err('Gere um resultado antes de copiar.');return;}copyToClipboard(t,btn);}
</script>
<?php ns_render_page_end();
}
