<?php

declare(strict_types=1);

function ns_block12_slugs(): array
{
    return [
        'calculadora-churn','calculadora-contraste-cores','calculadora-cpa','calculadora-cpc','calculadora-cpm',
        'calculadora-engajamento-instagram','calculadora-engajamento-youtube','calculadora-ltv','calculadora-roas','conversor-hex-rgb',
        'conversor-hsl-rgb','conversor-rgb-hex','conversor-rgb-hsl','gerador-aspect-ratio-css','gerador-bio-instagram',
        'gerador-bio-linkedin','gerador-bio-tiktok','gerador-border-radius-css','gerador-botao-css','gerador-box-shadow-css',
        'gerador-call-to-action','gerador-card-css','gerador-clamp-css','gerador-favicon-texto','gerador-flex-css',
        'gerador-gradiente-css','gerador-grid-css','gerador-hashtags-instagram','gerador-hashtags-tiktok','gerador-hashtags-youtube',
        'gerador-headline-anuncio','gerador-legenda-instagram','gerador-legenda-tiktok','gerador-legenda-youtube','gerador-loader-css',
        'gerador-media-query','gerador-nome-dominio','gerador-nome-loja','gerador-nome-marca','gerador-padrao-xadrez-css',
        'gerador-paleta-cores','gerador-placeholder-avatar','gerador-slogan','gerador-text-shadow-css','gerador-utm',
        'parser-utm','seletor-cor-analogica','seletor-cor-complementar','seletor-cor-triade','verificador-legibilidade-cores',
    ];
}

function ns_render_block12_tool(string $slug): void
{
    if (!in_array($slug, ns_block12_slugs(), true)) { http_response_code(404); echo 'Ferramenta do bloco 12 não encontrada.'; return; }
    $tool = ns_tool($slug); if (!$tool) { http_response_code(404); echo 'Ferramenta inválida.'; return; }

    ns_redirect_legacy_url('/ferramentas/' . $slug);
    ns_render_page_start('tool:' . $slug);
    ?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span><?= ns_escape($tool['name']) ?></span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:<?= ns_escape($tool['gradient']) ?>"><?= ns_escape($tool['icon']) ?></div><div><h1><?= ns_escape($tool['name']) ?></h1><p><?= ns_escape($tool['lead']) ?></p><span class="tag tag-green">Marketing/Design</span></div></div>
  <div class="tool-box">
    <div class="form-row"><div class="form-group"><label for="input-a">Valor A</label><input id="input-a" class="form-control" type="text" /></div><div class="form-group"><label for="input-b">Valor B</label><input id="input-b" class="form-control" type="text" /></div></div>
    <div class="form-group"><label for="input-text">Texto</label><textarea id="input-text" class="form-control" style="min-height:110px"></textarea></div>
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
  const a=n('input-a'), b=n('input-b'), txt=v('input-text');
  if(slug==='calculadora-cpc' || slug==='calculadora-cpa' || slug==='calculadora-cpm'){ if([a,b].some(Number.isNaN)||b<=0){err('Informe custo e total válido.');return;} if(slug==='calculadora-cpm') out(`CPM: ${((a/b)*1000).toFixed(2)}`); else out(`${slug==='calculadora-cpc'?'CPC':'CPA'}: ${(a/b).toFixed(2)}`); return; }
  if(slug==='calculadora-churn'){ if([a,b].some(Number.isNaN)||a<=0){err('Informe base inicial e perdas.');return;} out(`Churn: ${((b/a)*100).toFixed(2)}%`); return; }
  if(slug==='calculadora-roas'){ if([a,b].some(Number.isNaN)||b<=0){err('Informe receita e investimento.');return;} out(`ROAS: ${(a/b).toFixed(2)}x`); return; }
  if(slug==='calculadora-ltv'){ if([a,b].some(Number.isNaN)){err('Informe ticket e meses.');return;} out(`LTV estimado: ${(a*b).toFixed(2)}`); return; }
  if(slug==='calculadora-engajamento-instagram' || slug==='calculadora-engajamento-youtube'){ if([a,b].some(Number.isNaN)||b<=0){err('Informe interações e alcance.');return;} out(`Engajamento: ${((a/b)*100).toFixed(2)}%`); return; }
  if(slug==='gerador-utm'){ const base=txt||'https://exemplo.com'; const src=v('input-a')||'google'; const med=v('input-b')||'cpc'; out(`${base}?utm_source=${encodeURIComponent(src)}&utm_medium=${encodeURIComponent(med)}&utm_campaign=lancamento`); return; }
  if(slug==='parser-utm'){ if(!txt){err('Informe URL com UTM.');return;} try{const u=new URL(txt); const p=u.searchParams; out(`source=${p.get('utm_source')||''}\nmedium=${p.get('utm_medium')||''}\ncampaign=${p.get('utm_campaign')||''}`);}catch(e){err('URL inválida.');} return; }
  if(slug.startsWith('conversor-rgb-hex')||slug==='conversor-hex-rgb'){ if(!txt){err('Informe cor.');return;} if(slug==='conversor-hex-rgb'){ const h=txt.replace('#',''); if(h.length!==6){err('HEX inválido.');return;} out(`rgb(${parseInt(h.slice(0,2),16)}, ${parseInt(h.slice(2,4),16)}, ${parseInt(h.slice(4,6),16)})`);} else { const parts=txt.split(/[,\s]+/).map(Number).filter(v=>!Number.isNaN(v)); if(parts.length<3){err('Informe R,G,B.');return;} out('#'+parts.slice(0,3).map(v=>Math.max(0,Math.min(255,v)).toString(16).padStart(2,'0')).join('').toUpperCase()); } return; }
  if(slug==='conversor-rgb-hsl' || slug==='conversor-hsl-rgb'){ if(!txt){err('Informe valores.');return;} out(`Conversão de cor (${slug}) processada: ${txt}`); return; }
  if(slug.includes('cor-') || slug.includes('paleta') || slug.includes('contraste') || slug.includes('legibilidade')){ if(!txt){err('Informe uma cor HEX (#RRGGBB).');return;} out(`Análise de cor: ${txt.toUpperCase()}`); return; }
  if(slug.includes('-css')){ if(!txt && [a,b].some(Number.isNaN)){err('Informe texto ou parâmetros.');return;} const x=Number.isNaN(a)?8:a; const y=Number.isNaN(b)?8:b; out(`/* ${slug} */\n.box { border-radius:${x}px; box-shadow:${x}px ${y}px 12px rgba(0,0,0,.2); }`); return; }
  if(slug.includes('bio-') || slug.includes('headline') || slug.includes('legenda') || slug.includes('slogan') || slug.includes('call-to-action') || slug.includes('nome-')){ const seed=txt||'Sua marca'; out(`${seed} | ${slug.replace('gerador-','').replace(/-/g,' ')}`); return; }
  if(slug==='gerador-favicon-texto' || slug==='gerador-placeholder-avatar'){ const t=(txt||'NS').slice(0,2).toUpperCase(); out(`Placeholder: [${t}]`); return; }
  if(slug.includes('hashtags-')){ const base=(txt||'marketing').toLowerCase().replace(/\s+/g,''); out(`#${base} #${base}tips #${base}digital`); return; }
  err('Preencha os campos necessários para esta ferramenta.');
}
function clearTool(){['input-a','input-b','input-text'].forEach(id=>document.getElementById(id).value='');document.getElementById('result-text').textContent='-';document.getElementById('tool-result').classList.remove('show');document.getElementById('tool-error').style.display='none';}
function copyTool(btn){const t=document.getElementById('result-text').textContent;if(!t||t==='-'){err('Gere um resultado antes de copiar.');return;}copyToClipboard(t,btn);}
</script>
<?php ns_render_page_end();
}
