<?php

declare(strict_types=1);

function ns_block13_slugs(): array
{
    return [
        'calculadora-anos-entre-datas','calculadora-data-futura','calculadora-data-passada','calculadora-dias-entre-datas','calculadora-faltas-maximas',
        'calculadora-horas-estudo','calculadora-media-bimestral','calculadora-media-trimestral','calculadora-meses-entre-datas','calculadora-meta-diaria',
        'calculadora-meta-mensal','calculadora-meta-semanal','calculadora-nota-enem-simples','calculadora-nota-minima','calculadora-nota-vestibular',
        'calculadora-percentual-acertos','calculadora-pomodoro','calculadora-presenca-escolar','calculadora-prioridade-tarefas','calculadora-produtividade-horas',
        'calculadora-questoes-restantes','calculadora-redacao-palavras','calculadora-semanas-entre-datas','calculadora-tempo-por-questao','contador-dias-uteis',
        'contador-fins-de-semana','conversor-numeros-romanos-estudo','cronograma-provas','cronometro-estudos','cronometro-treino',
        'despertador-online-simples','divisor-objetivo-etapas','embaralhador-perguntas','gerador-agenda-horarios','gerador-alfabeto-fonetico',
        'gerador-cartoes-estudo','gerador-certificado-texto','gerador-checklist','gerador-contas-matematica','gerador-lista-compras',
        'gerador-lista-estudo','gerador-lista-tarefas','gerador-palavras-soletrar','gerador-planejamento-diario','gerador-planejamento-semanal',
        'gerador-questoes-aleatorias','gerador-tabuada','sorteador-alunos','sorteador-grupos','temporizador-reverso',
    ];
}

function ns_render_block13_tool(string $slug): void
{
    if (!in_array($slug, ns_block13_slugs(), true)) { http_response_code(404); echo 'Ferramenta do bloco 13 não encontrada.'; return; }
    $tool = ns_tool($slug); if (!$tool) { http_response_code(404); echo 'Ferramenta inválida.'; return; }

    ns_redirect_legacy_url('/ferramentas/' . $slug);
    ns_render_page_start('tool:' . $slug);
    ?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span><?= ns_escape($tool['name']) ?></span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:<?= ns_escape($tool['gradient']) ?>"><?= ns_escape($tool['icon']) ?></div><div><h1><?= ns_escape($tool['name']) ?></h1><p><?= ns_escape($tool['lead']) ?></p><span class="tag tag-green">Educação/Produtividade</span></div></div>
  <div class="tool-box">
    <div class="form-row"><div class="form-group"><label for="input-a">Valor A</label><input id="input-a" class="form-control" type="text" /></div><div class="form-group"><label for="input-b">Valor B</label><input id="input-b" class="form-control" type="text" /></div></div>
    <div class="form-row"><div class="form-group"><label for="input-c">Valor C</label><input id="input-c" class="form-control" type="text" /></div><div class="form-group"><label for="input-text">Texto/Lista</label><textarea id="input-text" class="form-control" style="min-height:100px"></textarea></div></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="runTool()">Executar</button><button type="button" class="btn btn-outline" onclick="clearTool()">Limpar</button><button type="button" class="copy-btn" onclick="copyTool(this)">Copiar resultado</button></div>
    <div class="notice notice-warn" id="tool-error" style="display:none;"><span>⚠️</span><span id="tool-error-text"></span></div>
    <div class="result-box" id="tool-result"><div class="result-label">Resultado</div><pre id="result-text" style="white-space:pre-wrap;margin:0">-</pre></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
</div></main>
<script>
const slug = <?= json_encode($slug, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
const v=(id)=> (document.getElementById(id).value||'').trim();
const n=(id)=> parseFloat(v(id).replace(',','.'));
function err(m){document.getElementById('tool-error-text').textContent=m;document.getElementById('tool-error').style.display='flex';document.getElementById('tool-result').classList.remove('show');}
function out(t){document.getElementById('tool-error').style.display='none';document.getElementById('result-text').textContent=t;showResult('tool-result');}
function runTool(){
  const a=n('input-a'), b=n('input-b'), c=n('input-c'), txt=v('input-text');
  if(slug.includes('media-') || slug.includes('nota-')){ if([a,b].some(Number.isNaN)){err('Informe ao menos duas notas.');return;} const vals=[a,b,c].filter(x=>!Number.isNaN(x)); const media=vals.reduce((s,x)=>s+x,0)/vals.length; out(`Média: ${media.toFixed(2)}`); return; }
  if(slug.includes('percentual-acertos')){ if([a,b].some(Number.isNaN)||b<=0){err('Informe acertos e total.');return;} out(`Acerto: ${((a/b)*100).toFixed(2)}%`); return; }
  if(slug.includes('meta-')){ if([a,b].some(Number.isNaN)||b<=0){err('Informe objetivo e períodos.');return;} out(`Meta por período: ${(a/b).toFixed(2)}`); return; }
  if(slug.includes('questoes-restantes') || slug==='calculadora-tempo-por-questao'){ if([a,b].some(Number.isNaN)||b<=0){err('Informe total e resolvidas/tempo.');return;} out(`Resultado: ${(a/b).toFixed(2)}`); return; }
  if(slug.includes('presenca-escolar') || slug.includes('faltas-maximas')){ if([a,b].some(Number.isNaN)||b<=0){err('Informe aulas e faltas/limite.');return;} out(`Percentual: ${((a/b)*100).toFixed(2)}%`); return; }
  if(slug.includes('dias-entre-datas') || slug.includes('semanas-entre-datas') || slug.includes('meses-entre-datas') || slug.includes('anos-entre-datas') || slug==='contador-dias-uteis' || slug==='contador-fins-de-semana'){ if([a,b].some(Number.isNaN)){err('Informe intervalo em dias (A e B).');return;} const diff=Math.abs(a-b); if(slug.includes('semanas')) out(`Semanas: ${(diff/7).toFixed(2)}`); else if(slug.includes('meses')) out(`Meses: ${(diff/30).toFixed(2)}`); else if(slug.includes('anos')) out(`Anos: ${(diff/365).toFixed(2)}`); else out(`Dias: ${diff.toFixed(0)}`); return; }
  if(slug==='calculadora-data-futura' || slug==='calculadora-data-passada'){ if([a,b].some(Number.isNaN)){err('Informe dia base e deslocamento.');return;} out(`Resultado: D${slug==='calculadora-data-futura'?'+':'-'}${Math.abs(Math.round(b))}`); return; }
  if(slug.includes('pomodoro') || slug.includes('cronometro') || slug.includes('temporizador') || slug.includes('despertador')){ if(Number.isNaN(a)){err('Informe minutos.');return;} out(`Tempo configurado: ${a.toFixed(0)} min`); return; }
  if(slug.includes('prioridade-tarefas') || slug.includes('produtividade-horas') || slug.includes('horas-estudo')){ if([a,b].some(Number.isNaN)){err('Informe horas e tarefas.');return;} out(`Produtividade: ${(b>0?(a/b):a).toFixed(2)}`); return; }
  if(slug==='conversor-numeros-romanos-estudo'){ if(!txt){err('Informe número romano.');return;} const map={I:1,V:5,X:10,L:50,C:100,D:500,M:1000}; let s=0,p=0; txt.toUpperCase().split('').reverse().forEach(ch=>{const v=map[ch]||0; if(v<p)s-=v; else{s+=v;p=v;}}); out(`Decimal: ${s}`); return; }
  if(slug.includes('sorteador-')){ if(!txt){err('Informe lista no campo texto.');return;} const items=txt.split(/\r?\n/).map(s=>s.trim()).filter(Boolean); if(items.length===0){err('Lista vazia.');return;} out(items[Math.floor(Math.random()*items.length)]); return; }
  if(slug.includes('gerador-')){
    if(slug==='gerador-tabuada'){ if(Number.isNaN(a)){err('Informe um número.');return;} let lines=[]; for(let i=1;i<=10;i++) lines.push(`${a} x ${i} = ${(a*i).toFixed(0)}`); out(lines.join('\n')); return; }
    if(slug==='gerador-contas-matematica'){ const q=Number.isNaN(a)?5:Math.max(1,Math.floor(a)); let lines=[]; for(let i=0;i<q;i++){const x=1+Math.floor(Math.random()*20), y=1+Math.floor(Math.random()*20); lines.push(`${x} + ${y} = ?`);} out(lines.join('\n')); return; }
    if(slug==='gerador-alfabeto-fonetico'){ if(!txt){err('Informe texto.');return;} const m={a:'alfa',b:'bravo',c:'charlie',d:'delta',e:'echo',f:'foxtrot',g:'golf',h:'hotel',i:'india',j:'juliet',k:'kilo',l:'lima',m:'mike',n:'november',o:'oscar',p:'papa',q:'quebec',r:'romeo',s:'sierra',t:'tango',u:'uniform',v:'victor',w:'whiskey',x:'xray',y:'yankee',z:'zulu'}; out(txt.toLowerCase().split('').map(ch=>m[ch]||ch).join(' ')); return; }
    const base = txt || 'Item 1\nItem 2\nItem 3';
    if(slug==='gerador-checklist' || slug==='gerador-lista-estudo' || slug==='gerador-lista-tarefas' || slug==='gerador-lista-compras') { out(base.split(/\r?\n/).filter(Boolean).map(i=>`[ ] ${i}`).join('\n')); return; }
    if(slug==='gerador-planejamento-diario' || slug==='gerador-planejamento-semanal' || slug==='gerador-agenda-horarios' || slug==='cronograma-provas') { out(`Plano (${slug.replace('gerador-','')}):\n- Prioridade 1\n- Prioridade 2\n- Revisão`); return; }
    if(slug==='gerador-cartoes-estudo' || slug==='gerador-certificado-texto' || slug==='gerador-palavras-soletrar' || slug==='gerador-questoes-aleatorias' || slug==='embaralhador-perguntas' || slug==='divisor-objetivo-etapas'){ out(base); return; }
  }
  err('Preencha os campos necessários para esta ferramenta.');
}
function clearTool(){['input-a','input-b','input-c','input-text'].forEach(id=>document.getElementById(id).value='');document.getElementById('result-text').textContent='-';document.getElementById('tool-result').classList.remove('show');document.getElementById('tool-error').style.display='none';}
function copyTool(btn){const t=document.getElementById('result-text').textContent;if(!t||t==='-'){err('Gere um resultado antes de copiar.');return;}copyToClipboard(t,btn);}
</script>
<?php ns_render_page_end();
}
