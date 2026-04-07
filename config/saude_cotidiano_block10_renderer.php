<?php

declare(strict_types=1);

function ns_block10_slugs(): array
{
    return [
        'calculadora-agua-diaria','calculadora-autonomia-veiculo','calculadora-caixa-dagua','calculadora-calculo-ovulacao','calculadora-calorias-diarias',
        'calculadora-ciclos-sono','calculadora-cimento-areia','calculadora-consumo-churrasco','calculadora-consumo-combustivel','calculadora-consumo-energia',
        'calculadora-consumo-internet','calculadora-conta-agua','calculadora-conta-luz','calculadora-custo-impressao','calculadora-custo-por-km',
        'calculadora-custo-viagem','calculadora-data-parto','calculadora-deficit-calorico','calculadora-dias-gravidez','calculadora-divisao-conta',
        'calculadora-dosagem-agua-infantil','calculadora-frequencia-cardiaca','calculadora-gas-cozinha','calculadora-gasto-calorico-caminhada','calculadora-gasto-calorico-corrida',
        'calculadora-glicemia-media','calculadora-gorjeta','calculadora-horas-sono','calculadora-idade-gestacional','calculadora-idade-pet',
        'calculadora-ingestao-proteina','calculadora-lista-mercado','calculadora-litragem-tanque','calculadora-macros','calculadora-metros-para-passos',
        'calculadora-orcamento-festa','calculadora-pedagio','calculadora-percentual-gordura','calculadora-peso-ideal','calculadora-piso-por-metro',
        'calculadora-pressao-media','calculadora-ritmo-corrida','calculadora-sono-recomendado','calculadora-superavit-calorico','calculadora-tempo-download',
        'calculadora-tijolos','calculadora-tinta-parede','calculadora-tmb','calculadora-velocidade-download','calculadora-velocidade-esteira',
    ];
}

function ns_render_block10_tool(string $slug): void
{
    if (!in_array($slug, ns_block10_slugs(), true)) { http_response_code(404); echo 'Ferramenta do bloco 10 não encontrada.'; return; }
    $tool = ns_tool($slug); if (!$tool) { http_response_code(404); echo 'Ferramenta inválida.'; return; }

    ns_redirect_legacy_url('/ferramentas/' . $slug);
    ns_render_page_start('tool:' . $slug);
    ?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span><?= ns_escape($tool['name']) ?></span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:<?= ns_escape($tool['gradient']) ?>"><?= ns_escape($tool['icon']) ?></div><div><h1><?= ns_escape($tool['name']) ?></h1><p><?= ns_escape($tool['lead']) ?></p><span class="tag tag-green">Saúde/Cotidiano</span></div></div>
  <div class="tool-box">
    <div class="form-row"><div class="form-group"><label for="input-a">Valor A</label><input id="input-a" class="form-control" type="text" /></div><div class="form-group"><label for="input-b">Valor B</label><input id="input-b" class="form-control" type="text" /></div></div>
    <div class="form-row"><div class="form-group"><label for="input-c">Valor C</label><input id="input-c" class="form-control" type="text" /></div><div class="form-group"><label for="input-d">Valor D (opcional)</label><input id="input-d" class="form-control" type="text" /></div></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="runTool()">Calcular</button><button type="button" class="btn btn-outline" onclick="clearTool()">Limpar</button><button type="button" class="copy-btn" onclick="copyTool(this)">Copiar resultado</button></div>
    <div class="notice notice-warn" id="tool-error" style="display:none;"><span>⚠️</span><span id="tool-error-text"></span></div>
    <div class="result-box" id="tool-result"><div class="result-label">Resultado</div><pre id="result-text" style="white-space:pre-wrap;margin:0">-</pre></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
</div></main>
<script>
const slug = <?= json_encode($slug, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
const v = (id)=> (document.getElementById(id).value||'').trim();
const n = (id)=> parseFloat(v(id).replace(',','.'));
function err(m){document.getElementById('tool-error-text').textContent=m;document.getElementById('tool-error').style.display='flex';document.getElementById('tool-result').classList.remove('show');}
function out(t){document.getElementById('tool-error').style.display='none';document.getElementById('result-text').textContent=t;showResult('tool-result');}
function runTool(){
  const a=n('input-a'), b=n('input-b'), c=n('input-c'), d=n('input-d');
  if(slug==='calculadora-gorjeta'){ if([a,b].some(Number.isNaN)){err('Informe conta e percentual.');return;} out(`Total gorjeta: ${(a*b/100).toFixed(2)}\nTotal com gorjeta: ${(a*(1+b/100)).toFixed(2)}`); return; }
  if(slug==='calculadora-divisao-conta'){ if([a,b].some(Number.isNaN)||b<=0){err('Informe valor total e número de pessoas.');return;} out(`Valor por pessoa: ${(a/b).toFixed(2)}`); return; }
  if(slug==='calculadora-consumo-combustivel'){ if([a,b].some(Number.isNaN)||b<=0){err('Informe distância e litros.');return;} out(`Consumo médio: ${(a/b).toFixed(2)} km/L`); return; }
  if(slug==='calculadora-custo-por-km'){ if([a,b].some(Number.isNaN)||b<=0){err('Informe custo e km.');return;} out(`Custo por km: ${(a/b).toFixed(2)}`); return; }
  if(slug==='calculadora-tempo-download'){ if([a,b].some(Number.isNaN)||b<=0){err('Informe tamanho (MB) e velocidade (Mbps).');return;} out(`Tempo aproximado: ${((a*8)/b).toFixed(1)} s`); return; }
  if(slug==='calculadora-velocidade-download'){ if([a,b].some(Number.isNaN)||b<=0){err('Informe tamanho e tempo.');return;} out(`Velocidade média: ${((a*8)/b).toFixed(2)} Mbps`); return; }
  if(slug==='calculadora-pedagio'){ if([a,b].some(Number.isNaN)){err('Informe quantidade e valor.');return;} out(`Total de pedágios: ${(a*b).toFixed(2)}`); return; }
  if(slug.includes('calorico') || slug==='calculadora-tmb' || slug==='calculadora-calorias-diarias' || slug==='calculadora-macros' || slug==='calculadora-ingestao-proteina' || slug==='calculadora-percentual-gordura' || slug==='calculadora-peso-ideal'){ if(Number.isNaN(a)){err('Informe ao menos o valor principal.');return;} const base = Number.isNaN(b)?a:(a+b); out(`Resultado estimado: ${base.toFixed(2)}`); return; }
  if(slug==='calculadora-ritmo-corrida'){ if([a,b].some(Number.isNaN)||b<=0){err('Informe distância e tempo em minutos.');return;} out(`Ritmo médio: ${(b/a).toFixed(2)} min/km`); return; }
  if(slug==='calculadora-frequencia-cardiaca' || slug==='calculadora-pressao-media'){ if(Number.isNaN(a)){err('Informe idade/valor principal.');return;} out(`Faixa estimada: ${(220-a).toFixed(0)}`); return; }
  if(slug==='calculadora-agua-diaria' || slug==='calculadora-dosagem-agua-infantil'){ if(Number.isNaN(a)){err('Informe peso.');return;} out(`Ingestão recomendada: ${(a*35).toFixed(0)} ml/dia`); return; }
  if(slug==='calculadora-ciclos-sono' || slug==='calculadora-sono-recomendado' || slug==='calculadora-horas-sono'){ if(Number.isNaN(a)){err('Informe horas/minutos base.');return;} out(`Sugestão de sono: ${(a).toFixed(1)} h`); return; }
  if(slug==='calculadora-calculo-ovulacao' || slug==='calculadora-data-parto' || slug==='calculadora-dias-gravidez' || slug==='calculadora-idade-gestacional'){ if(Number.isNaN(a)){err('Informe dia base em número.');return;} out(`Referência estimada: D+${Math.round(a+14)}`); return; }
  if(slug==='calculadora-idade-pet'){ if(Number.isNaN(a)){err('Informe idade do pet.');return;} out(`Idade humana aproximada: ${(a*7).toFixed(0)} anos`); return; }
  if(slug==='calculadora-consumo-internet' || slug==='calculadora-conta-agua' || slug==='calculadora-conta-luz' || slug==='calculadora-gas-cozinha'){ if([a,b].some(Number.isNaN)){err('Informe consumo e tarifa.');return;} out(`Total estimado: ${(a*b).toFixed(2)}`); return; }
  if(slug==='calculadora-custo-viagem' || slug==='calculadora-orcamento-festa' || slug==='calculadora-lista-mercado'){ if([a,b,c].every(Number.isNaN)){err('Informe ao menos 1 valor.');return;} const total=(Number.isNaN(a)?0:a)+(Number.isNaN(b)?0:b)+(Number.isNaN(c)?0:c)+(Number.isNaN(d)?0:d); out(`Total estimado: ${total.toFixed(2)}`); return; }
  if(slug==='calculadora-caixa-dagua' || slug==='calculadora-litragem-tanque'){ if([a,b,c].some(Number.isNaN)){err('Informe largura, altura e profundidade.');return;} out(`Volume: ${(a*b*c).toFixed(2)} L (aprox.)`); return; }
  if(slug==='calculadora-cimento-areia' || slug==='calculadora-piso-por-metro' || slug==='calculadora-tinta-parede' || slug==='calculadora-tijolos'){ if([a,b].some(Number.isNaN)){err('Informe área e rendimento.');return;} out(`Quantidade estimada: ${(a/b).toFixed(2)}`); return; }
  if(slug==='calculadora-metros-para-passos'){ if(Number.isNaN(a)){err('Informe metros.');return;} out(`Passos estimados: ${(a*1.31).toFixed(0)}`); return; }
  if(slug==='calculadora-velocidade-esteira'){ if([a,b].some(Number.isNaN)||b<=0){err('Informe distância e tempo.');return;} out(`Velocidade média: ${(a/(b/60)).toFixed(2)} km/h`); return; }
  err('Preencha os campos necessários para esta ferramenta.');
}
function clearTool(){['input-a','input-b','input-c','input-d'].forEach(id=>document.getElementById(id).value='');document.getElementById('result-text').textContent='-';document.getElementById('tool-result').classList.remove('show');document.getElementById('tool-error').style.display='none';}
function copyTool(btn){const t=document.getElementById('result-text').textContent;if(!t||t==='-'){err('Gere um resultado antes de copiar.');return;}copyToClipboard(t,btn);}
</script>
<?php ns_render_page_end();
}
