<?php

declare(strict_types=1);

function ns_converter_block7_slugs(): array
{
    return [
        'conversor-anos-meses','conversor-ascii-texto','conversor-binario-decimal','conversor-bits-bytes','conversor-bytes-bits',
        'conversor-celsius-kelvin','conversor-cm-polegadas','conversor-decimal-binario','conversor-decimal-hexadecimal','conversor-decimal-horas',
        'conversor-decimal-octal','conversor-decimal-porcentagem','conversor-decimal-romano','conversor-dias-semanas','conversor-fahrenheit-kelvin',
        'conversor-ft2-m2','conversor-galoes-litros','conversor-gb-tb','conversor-gramas-oncas','conversor-hectares-m2',
        'conversor-hexadecimal-decimal','conversor-horas-decimais','conversor-kb-mb','conversor-kelvin-celsius','conversor-kelvin-fahrenheit'
    ];
}

function ns_render_converter_block7_tool(string $slug): void
{
    if (!in_array($slug, ns_converter_block7_slugs(), true)) {
        http_response_code(404);
        echo 'Conversor do bloco 7 não encontrado.';
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
  <div class="tool-header"><div class="tool-page-icon" style="background:<?= ns_escape($tool['gradient']) ?>"><?= ns_escape($tool['icon']) ?></div><div><h1><?= ns_escape($tool['name']) ?></h1><p><?= ns_escape($tool['lead']) ?></p><span class="tag tag-green">Conversores</span></div></div>
  <div class="tool-box">
    <div class="form-group"><label for="input-value">Valor de entrada</label><input id="input-value" class="form-control" type="text" /></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="runTool()">Converter</button><button type="button" class="btn btn-outline" onclick="clearTool()">Limpar</button><button type="button" class="copy-btn" onclick="copyTool(this)">Copiar resultado</button></div>
    <div class="notice notice-warn" id="tool-error" style="display:none;"><span>⚠️</span><span id="tool-error-text"></span></div>
    <div class="result-box" id="tool-result"><div class="result-label">Resultado</div><pre id="result-text" style="white-space:pre-wrap;margin:0">-</pre></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
</div></main>
<script>
const slug = <?= json_encode($slug, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
function showError(m){document.getElementById('tool-error-text').textContent=m;document.getElementById('tool-error').style.display='flex';document.getElementById('tool-result').classList.remove('show');}
function setResult(t){document.getElementById('tool-error').style.display='none';document.getElementById('result-text').textContent=t;showResult('tool-result');}
function toRoman(num){const map=[[1000,'M'],[900,'CM'],[500,'D'],[400,'CD'],[100,'C'],[90,'XC'],[50,'L'],[40,'XL'],[10,'X'],[9,'IX'],[5,'V'],[4,'IV'],[1,'I']];let n=Math.floor(num);if(n<=0||n>3999)return 'fora do intervalo';let out='';for(const [v,s] of map){while(n>=v){out+=s;n-=v;}}return out;}
function runTool(){
  const raw=(document.getElementById('input-value').value||'').trim();
  if(!raw){showError('Informe um valor.');return;}
  const n=parseFloat(raw.replace(',','.'));
  if(slug==='conversor-ascii-texto'){setResult(raw.split(/\s+/).map(c=>String.fromCharCode(parseInt(c,10)||0)).join(''));return;}
  if(slug==='conversor-binario-decimal'){setResult(String(parseInt(raw,2)));return;}
  if(slug==='conversor-decimal-binario'){if(Number.isNaN(n)){showError('Número inválido.');return;}setResult(Math.floor(n).toString(2));return;}
  if(slug==='conversor-decimal-hexadecimal'){if(Number.isNaN(n)){showError('Número inválido.');return;}setResult(Math.floor(n).toString(16).toUpperCase());return;}
  if(slug==='conversor-hexadecimal-decimal'){setResult(String(parseInt(raw,16)));return;}
  if(slug==='conversor-decimal-octal'){if(Number.isNaN(n)){showError('Número inválido.');return;}setResult(Math.floor(n).toString(8));return;}
  if(slug==='conversor-decimal-romano'){if(Number.isNaN(n)){showError('Número inválido.');return;}setResult(toRoman(n));return;}
  if(Number.isNaN(n)){showError('Número inválido.');return;}
  const map={
    'conversor-anos-meses':n*12,
    'conversor-bits-bytes':n/8,
    'conversor-bytes-bits':n*8,
    'conversor-celsius-kelvin':n+273.15,
    'conversor-cm-polegadas':n/2.54,
    'conversor-decimal-horas':n/60,
    'conversor-decimal-porcentagem':n*100,
    'conversor-dias-semanas':n/7,
    'conversor-ft2-m2':n*0.092903,
    'conversor-galoes-litros':n*3.78541,
    'conversor-gb-tb':n/1024,
    'conversor-gramas-oncas':n/28.3495,
    'conversor-hectares-m2':n*10000,
    'conversor-horas-decimais':n*60,
    'conversor-kb-mb':n/1024,
    'conversor-kelvin-celsius':n-273.15,
    'conversor-kelvin-fahrenheit':(n-273.15)*9/5+32,
    'conversor-fahrenheit-kelvin':(n-32)*5/9+273.15
  };
  if(!(slug in map)){showError('Conversão não mapeada.');return;}
  setResult(String(map[slug]));
}
function clearTool(){document.getElementById('input-value').value='';document.getElementById('result-text').textContent='-';document.getElementById('tool-result').classList.remove('show');document.getElementById('tool-error').style.display='none';}
function copyTool(btn){const t=document.getElementById('result-text').textContent;if(!t||t==='-'){showError('Gere um resultado antes de copiar.');return;}copyToClipboard(t,btn);}
</script>
<?php ns_render_page_end();
}
