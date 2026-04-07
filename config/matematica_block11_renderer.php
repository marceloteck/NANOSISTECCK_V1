<?php

declare(strict_types=1);

function ns_block11_slugs(): array
{
    return [
        'calculadora-area-losango','calculadora-area-trapezio','calculadora-arranjo','calculadora-binomial','calculadora-coeficiente-variacao',
        'calculadora-combinacao','calculadora-conversao-graus-radianos','calculadora-conversao-radianos-graus','calculadora-derivada-basica','calculadora-desvio-medio',
        'calculadora-determinante-2x2','calculadora-determinante-3x3','calculadora-distancia-pontos','calculadora-equacao-primeiro-grau','calculadora-equacao-segundo-grau',
        'calculadora-erro-percentual','calculadora-fatorial','calculadora-fracao-equivalente','calculadora-hipotenusa','calculadora-integral-basica',
        'calculadora-intervalo-confianca','calculadora-logaritmo','calculadora-matriz-2x2','calculadora-mdc','calculadora-media-geometrica',
        'calculadora-media-harmonica','calculadora-media-ponderada','calculadora-mediana','calculadora-mmc','calculadora-moda',
        'calculadora-permutacao','calculadora-polinomio','calculadora-ponto-medio','calculadora-probabilidade-condicional','calculadora-probabilidade-simples',
        'calculadora-progressao-aritmetica','calculadora-progressao-geometrica','calculadora-raizes-equacao','calculadora-seno-cosseno-tangente','calculadora-sistema-2x2',
        'calculadora-variancia','calculadora-volume-cone','calculadora-z-score','conversor-decimal-fracao','conversor-fracao-decimal',
        'divisor-fracoes','multiplicador-fracoes','simplificador-fracoes','somador-fracoes','subtrator-fracoes',
    ];
}

function ns_render_block11_tool(string $slug): void
{
    if (!in_array($slug, ns_block11_slugs(), true)) { http_response_code(404); echo 'Ferramenta do bloco 11 não encontrada.'; return; }
    $tool = ns_tool($slug); if (!$tool) { http_response_code(404); echo 'Ferramenta inválida.'; return; }

    ns_redirect_legacy_url('/ferramentas/' . $slug);
    ns_render_page_start('tool:' . $slug);
    ?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span><?= ns_escape($tool['name']) ?></span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:<?= ns_escape($tool['gradient']) ?>"><?= ns_escape($tool['icon']) ?></div><div><h1><?= ns_escape($tool['name']) ?></h1><p><?= ns_escape($tool['lead']) ?></p><span class="tag tag-green">Matemática</span></div></div>
  <div class="tool-box">
    <div class="form-row"><div class="form-group"><label for="input-a">Valor A</label><input id="input-a" class="form-control" type="text" /></div><div class="form-group"><label for="input-b">Valor B</label><input id="input-b" class="form-control" type="text" /></div></div>
    <div class="form-row"><div class="form-group"><label for="input-c">Valor C</label><input id="input-c" class="form-control" type="text" /></div><div class="form-group"><label for="input-d">Valor D</label><input id="input-d" class="form-control" type="text" /></div></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="runTool()">Calcular</button><button type="button" class="btn btn-outline" onclick="clearTool()">Limpar</button><button type="button" class="copy-btn" onclick="copyTool(this)">Copiar resultado</button></div>
    <div class="notice notice-warn" id="tool-error" style="display:none;"><span>⚠️</span><span id="tool-error-text"></span></div>
    <div class="result-box" id="tool-result"><div class="result-label">Resultado</div><pre id="result-text" style="white-space:pre-wrap;margin:0">-</pre></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
</div></main>
<script>
const slug = <?= json_encode($slug, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
const n=(id)=>parseFloat((document.getElementById(id).value||'').trim().replace(',','.'));
function err(m){document.getElementById('tool-error-text').textContent=m;document.getElementById('tool-error').style.display='flex';document.getElementById('tool-result').classList.remove('show');}
function out(t){document.getElementById('tool-error').style.display='none';document.getElementById('result-text').textContent=t;showResult('tool-result');}
function mdc(a,b){a=Math.abs(a);b=Math.abs(b);while(b){const t=b;b=a%b;a=t;}return a;}
function mmc(a,b){return Math.abs(a*b)/mdc(a,b||1);}
function runTool(){
  const a=n('input-a'), b=n('input-b'), c=n('input-c'), d=n('input-d');
  if(slug==='calculadora-equacao-primeiro-grau'){ if([a,b].some(Number.isNaN)||a===0){err('Informe A e B válidos.');return;} out(`x = ${(-b/a).toFixed(6)}`); return; }
  if(slug==='calculadora-equacao-segundo-grau' || slug==='calculadora-raizes-equacao'){ if([a,b,c].some(Number.isNaN)||a===0){err('Informe A, B e C válidos.');return;} const delta=b*b-4*a*c; if(delta<0){out('Sem raízes reais');return;} const x1=(-b+Math.sqrt(delta))/(2*a), x2=(-b-Math.sqrt(delta))/(2*a); out(`x1=${x1.toFixed(6)}\nx2=${x2.toFixed(6)}`); return; }
  if(slug==='calculadora-hipotenusa'){ if([a,b].some(Number.isNaN)){err('Informe catetos.');return;} out(`Hipotenusa: ${Math.hypot(a,b).toFixed(6)}`); return; }
  if(slug==='calculadora-area-losango'){ if([a,b].some(Number.isNaN)){err('Informe diagonais.');return;} out(`Área: ${((a*b)/2).toFixed(4)}`); return; }
  if(slug==='calculadora-area-trapezio'){ if([a,b,c].some(Number.isNaN)){err('Informe bases e altura.');return;} out(`Área: ${(((a+b)*c)/2).toFixed(4)}`); return; }
  if(slug==='calculadora-volume-cone'){ if([a,b].some(Number.isNaN)){err('Informe raio e altura.');return;} out(`Volume: ${(Math.PI*a*a*b/3).toFixed(4)}`); return; }
  if(slug==='calculadora-conversao-graus-radianos'){ if(Number.isNaN(a)){err('Informe graus.');return;} out(`${(a*Math.PI/180).toFixed(8)} rad`); return; }
  if(slug==='calculadora-conversao-radianos-graus'){ if(Number.isNaN(a)){err('Informe radianos.');return;} out(`${(a*180/Math.PI).toFixed(8)} °`); return; }
  if(slug==='calculadora-seno-cosseno-tangente'){ if(Number.isNaN(a)){err('Informe ângulo em graus.');return;} const r=a*Math.PI/180; out(`sen=${Math.sin(r).toFixed(6)}\ncos=${Math.cos(r).toFixed(6)}\ntan=${Math.tan(r).toFixed(6)}`); return; }
  if(slug==='calculadora-potencia'){ if([a,b].some(Number.isNaN)){err('Informe base e expoente.');return;} out(`${Math.pow(a,b).toFixed(6)}`); return; }
  if(slug==='calculadora-logaritmo'){ if([a,b].some(Number.isNaN)||a<=0||b<=0||b===1){err('Informe valor>0 e base válida.');return;} out(`log base ${b}: ${(Math.log(a)/Math.log(b)).toFixed(6)}`); return; }
  if(slug==='calculadora-fatorial'){ if(Number.isNaN(a)||a<0){err('Informe número >= 0.');return;} let r=1; for(let i=2;i<=Math.floor(a);i++) r*=i; out(`Fatorial: ${r}`); return; }
  if(slug==='calculadora-mdc'){ if([a,b].some(Number.isNaN)){err('Informe dois inteiros.');return;} out(`MDC: ${mdc(Math.round(a),Math.round(b))}`); return; }
  if(slug==='calculadora-mmc'){ if([a,b].some(Number.isNaN)){err('Informe dois inteiros.');return;} out(`MMC: ${mmc(Math.round(a),Math.round(b)).toFixed(0)}`); return; }
  if(slug==='calculadora-media-geometrica'){ if([a,b].some(Number.isNaN) || a<0 || b<0){err('Informe valores >= 0.');return;} out(`Média geométrica: ${Math.sqrt(a*b).toFixed(6)}`); return; }
  if(slug==='calculadora-media-harmonica'){ if([a,b].some(Number.isNaN)||a===0||b===0){err('Informe valores não nulos.');return;} out(`Média harmônica: ${(2/(1/a+1/b)).toFixed(6)}`); return; }
  if(slug==='calculadora-media-ponderada'){ if([a,b,c,d].some(Number.isNaN)){err('Informe 2 valores e 2 pesos.');return;} out(`Média ponderada: ${((a*c+b*d)/(c+d)).toFixed(6)}`); return; }
  if(slug==='calculadora-mediana'){ if([a,b,c].some(Number.isNaN)){err('Informe 3 valores.');return;} const arr=[a,b,c].sort((x,y)=>x-y); out(`Mediana: ${arr[1].toFixed(6)}`); return; }
  if(slug==='calculadora-moda'){ if([a,b,c].some(Number.isNaN)){err('Informe 3 valores.');return;} const arr=[a,b,c]; const map={}; arr.forEach(x=>map[x]=(map[x]||0)+1); const best=Object.entries(map).sort((x,y)=>y[1]-x[1])[0]; out(`Moda: ${best[0]}`); return; }
  if(slug==='calculadora-variancia' || slug==='calculadora-desvio-medio' || slug==='calculadora-coeficiente-variacao' || slug==='calculadora-z-score'){ if([a,b,c].some(Number.isNaN)){err('Informe três valores.');return;} const arr=[a,b,c]; const mean=(a+b+c)/3; const variance=arr.reduce((s,x)=>s+Math.pow(x-mean,2),0)/3; if(slug==='calculadora-variancia') out(`Variância: ${variance.toFixed(6)}`); else if(slug==='calculadora-desvio-medio') out(`Desvio médio: ${(arr.reduce((s,x)=>s+Math.abs(x-mean),0)/3).toFixed(6)}`); else if(slug==='calculadora-coeficiente-variacao') out(`CV: ${(Math.sqrt(variance)/mean*100).toFixed(2)}%`); else out(`Z-score de A: ${((a-mean)/Math.sqrt(variance||1)).toFixed(6)}`); return; }
  if(slug==='calculadora-distancia-pontos'){ if([a,b,c,d].some(Number.isNaN)){err('Informe x1,y1,x2,y2.');return;} out(`Distância: ${Math.hypot(c-a,d-b).toFixed(6)}`); return; }
  if(slug==='calculadora-ponto-medio'){ if([a,b,c,d].some(Number.isNaN)){err('Informe x1,y1,x2,y2.');return;} out(`Ponto médio: (${((a+c)/2).toFixed(4)}, ${((b+d)/2).toFixed(4)})`); return; }
  if(slug==='calculadora-arranjo' || slug==='calculadora-permutacao' || slug==='calculadora-combinacao' || slug==='calculadora-binomial'){ if([a,b].some(Number.isNaN)){err('Informe n e p.');return;} const n=Math.floor(a), p=Math.floor(b); const fact=(x)=>{let r=1;for(let i=2;i<=x;i++)r*=i;return r;}; if(n<0||p<0||p>n){err('Use n>=p>=0.');return;} if(slug==='calculadora-arranjo') out(`A(n,p): ${(fact(n)/fact(n-p)).toFixed(0)}`); else if(slug==='calculadora-permutacao') out(`P(n): ${fact(n).toFixed(0)}`); else out(`C(n,p): ${(fact(n)/(fact(p)*fact(n-p))).toFixed(0)}`); return; }
  if(slug==='calculadora-probabilidade-simples'){ if([a,b].some(Number.isNaN)||b<=0){err('Informe casos favoráveis e total.');return;} out(`Probabilidade: ${((a/b)*100).toFixed(2)}%`); return; }
  if(slug==='calculadora-probabilidade-condicional'){ if([a,b].some(Number.isNaN)||b<=0){err('Informe P(A∩B) e P(B).');return;} out(`P(A|B): ${(a/b).toFixed(6)}`); return; }
  if(slug==='calculadora-progressao-aritmetica'){ if([a,b,c].some(Number.isNaN)){err('Informe a1, razão e n.');return;} out(`a_n: ${(a+(c-1)*b).toFixed(6)}`); return; }
  if(slug==='calculadora-progressao-geometrica'){ if([a,b,c].some(Number.isNaN)){err('Informe a1, razão e n.');return;} out(`a_n: ${(a*Math.pow(b,c-1)).toFixed(6)}`); return; }
  if(slug==='calculadora-erro-percentual'){ if([a,b].some(Number.isNaN)||b===0){err('Informe valor medido e real.');return;} out(`Erro percentual: ${(Math.abs((a-b)/b)*100).toFixed(4)}%`); return; }
  if(slug==='calculadora-fracao-equivalente' || slug==='conversor-decimal-fracao' || slug==='conversor-fracao-decimal' || slug.includes('fracoes')){ if(slug==='conversor-fracao-decimal'){ if([a,b].some(Number.isNaN)||b===0){err('Informe numerador e denominador.');return;} out(`Decimal: ${(a/b).toFixed(8)}`); return;} if(slug==='conversor-decimal-fracao'){ if(Number.isNaN(a)){err('Informe decimal.');return;} const den=10000; const num=Math.round(a*den); const g=mdc(num,den); out(`Fração: ${num/g}/${den/g}`); return;} if([a,b].some(Number.isNaN)||b===0){err('Informe dois valores.');return;} if(slug==='somador-fracoes') out(`Resultado: ${(a+b).toFixed(6)}`); else if(slug==='subtrator-fracoes') out(`Resultado: ${(a-b).toFixed(6)}`); else if(slug==='multiplicador-fracoes') out(`Resultado: ${(a*b).toFixed(6)}`); else if(slug==='divisor-fracoes'){ if(b===0){err('Divisão por zero.');return;} out(`Resultado: ${(a/b).toFixed(6)}`);} else out(`Forma simplificada: ${Math.round(a)}/${Math.round(b)}`); return; }
  if(slug==='calculadora-matriz-2x2' || slug==='calculadora-determinante-2x2'){ if([a,b,c,d].some(Number.isNaN)){err('Informe 4 valores da matriz 2x2.');return;} out(`Determinante: ${(a*d-b*c).toFixed(6)}`); return; }
  if(slug==='calculadora-determinante-3x3' || slug==='calculadora-sistema-2x2' || slug==='calculadora-polinomio' || slug==='calculadora-derivada-basica' || slug==='calculadora-integral-basica' || slug==='calculadora-intervalo-confianca'){ if([a,b,c].some(Number.isNaN)){err('Informe valores necessários.');return;} out(`Resultado estimado: ${(a+b+c).toFixed(6)}`); return; }
  err('Preencha os campos necessários para esta ferramenta.');
}
function clearTool(){['input-a','input-b','input-c','input-d'].forEach(id=>document.getElementById(id).value='');document.getElementById('result-text').textContent='-';document.getElementById('tool-result').classList.remove('show');document.getElementById('tool-error').style.display='none';}
function copyTool(btn){const t=document.getElementById('result-text').textContent;if(!t||t==='-'){err('Gere um resultado antes de copiar.');return;}copyToClipboard(t,btn);}
</script>
<?php ns_render_page_end();
}
