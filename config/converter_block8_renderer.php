<?php

declare(strict_types=1);

function ns_converter_block8_slugs(): array
{
    return [
        'conversor-kg-libras','conversor-libras-kg','conversor-litros-galoes','conversor-lt-ml','conversor-m2-ft2','conversor-m2-hectares',
        'conversor-mb-gb','conversor-mbps-mbs','conversor-mbs-mbps','conversor-meses-semanas','conversor-metros-pes','conversor-minutos-decimais',
        'conversor-ml-lt','conversor-moedas-fixo','conversor-octal-decimal','conversor-oncas-gramas','conversor-pes-metros','conversor-polegadas-cm',
        'conversor-porcentagem-decimal','conversor-romano-decimal','conversor-semanas-dias','conversor-semanas-meses','conversor-texto-ascii','conversor-texto-unicode',
        'conversor-unicode-texto','conversor-anos-dias','conversor-horas-minutos','conversor-km-milhas'
    ];
}

function ns_roman_to_decimal(string $roman): int
{
    $roman = strtoupper(trim($roman));
    $map = ['I' => 1, 'V' => 5, 'X' => 10, 'L' => 50, 'C' => 100, 'D' => 500, 'M' => 1000];
    $total = 0;
    $prev = 0;
    for ($i = strlen($roman) - 1; $i >= 0; $i--) {
        $char = $roman[$i];
        $value = $map[$char] ?? 0;
        if ($value < $prev) {
            $total -= $value;
        } else {
            $total += $value;
            $prev = $value;
        }
    }
    return $total;
}

function ns_render_converter_block8_tool(string $slug): void
{
    if (!in_array($slug, ns_converter_block8_slugs(), true)) { http_response_code(404); echo 'Conversor do bloco 8 não encontrado.'; return; }
    $tool = ns_tool($slug);
    if (!$tool) { http_response_code(404); echo 'Ferramenta inválida.'; return; }

    ns_redirect_legacy_url('/ferramentas/' . $slug);
    ns_render_page_start('tool:' . $slug);
    ?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span><?= ns_escape($tool['name']) ?></span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:<?= ns_escape($tool['gradient']) ?>"><?= ns_escape($tool['icon']) ?></div><div><h1><?= ns_escape($tool['name']) ?></h1><p><?= ns_escape($tool['lead']) ?></p><span class="tag tag-green">Conversores</span></div></div>
  <div class="tool-box">
    <div class="form-group"><label for="input-value">Valor</label><input id="input-value" class="form-control" type="text" /></div>
    <div class="form-group"><label for="input-rate">Taxa (apenas conversor de moeda)</label><input id="input-rate" class="form-control" type="number" step="any" placeholder="ex: 5.25" /></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="runTool()">Converter</button><button type="button" class="btn btn-outline" onclick="clearTool()">Limpar</button><button type="button" class="copy-btn" onclick="copyTool(this)">Copiar resultado</button></div>
    <div class="notice notice-warn" id="tool-error" style="display:none;"><span>⚠️</span><span id="tool-error-text"></span></div>
    <div class="result-box" id="tool-result"><div class="result-label">Resultado</div><pre id="result-text" style="white-space:pre-wrap;margin:0">-</pre></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
</div></main>
<script>
const slug = <?= json_encode($slug, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
function showError(m){document.getElementById('tool-error-text').textContent=m;document.getElementById('tool-error').style.display='flex';document.getElementById('tool-result').classList.remove('show');}
function setResult(v){document.getElementById('tool-error').style.display='none';document.getElementById('result-text').textContent=String(v);showResult('tool-result');}
function runTool(){
  const raw=(document.getElementById('input-value').value||'').trim();
  if(!raw){showError('Informe um valor.');return;}
  const n=parseFloat(raw.replace(',','.'));
  if(slug==='conversor-texto-ascii'){setResult(Array.from(raw).map(c=>c.charCodeAt(0)).join(' '));return;}
  if(slug==='conversor-texto-unicode'){setResult(Array.from(raw).map(c=>'U+'+c.charCodeAt(0).toString(16).toUpperCase().padStart(4,'0')).join(' '));return;}
  if(slug==='conversor-unicode-texto'){const out=raw.split(/\s+/).map(h=>String.fromCharCode(parseInt(h.replace(/^U\+/i,''),16)||0)).join('');setResult(out);return;}
  if(slug==='conversor-romano-decimal'){const map={I:1,V:5,X:10,L:50,C:100,D:500,M:1000}; let s=0,p=0; raw.toUpperCase().split('').reverse().forEach(ch=>{const v=map[ch]||0; if(v<p)s-=v; else{s+=v;p=v;}}); setResult(s); return;}
  if(slug==='conversor-octal-decimal'){setResult(parseInt(raw,8));return;}
  if(Number.isNaN(n)){showError('Número inválido.');return;}
  if(slug==='conversor-moedas-fixo'){const rate=parseFloat(document.getElementById('input-rate').value||''); if(Number.isNaN(rate)||rate<=0){showError('Informe taxa válida.');return;} setResult(n*rate); return;}
  const map={
    'conversor-kg-libras':n*2.20462,'conversor-libras-kg':n/2.20462,'conversor-litros-galoes':n/3.78541,'conversor-lt-ml':n*1000,
    'conversor-m2-ft2':n*10.7639,'conversor-m2-hectares':n/10000,'conversor-mb-gb':n/1024,'conversor-mbps-mbs':n/8,
    'conversor-mbs-mbps':n*8,'conversor-meses-semanas':n*4.34524,'conversor-metros-pes':n*3.28084,'conversor-minutos-decimais':n/60,
    'conversor-ml-lt':n/1000,'conversor-oncas-gramas':n*28.3495,'conversor-pes-metros':n/3.28084,'conversor-polegadas-cm':n*2.54,
    'conversor-porcentagem-decimal':n/100,'conversor-semanas-dias':n*7,'conversor-semanas-meses':n/4.34524,'conversor-anos-dias':n*365,
    'conversor-horas-minutos':n*60,'conversor-km-milhas':n*0.621371
  };
  if(!(slug in map)){showError('Conversão não mapeada.');return;}
  setResult(map[slug]);
}
function clearTool(){document.getElementById('input-value').value='';document.getElementById('input-rate').value='';document.getElementById('result-text').textContent='-';document.getElementById('tool-result').classList.remove('show');document.getElementById('tool-error').style.display='none';}
function copyTool(btn){const t=document.getElementById('result-text').textContent;if(!t||t==='-'){showError('Gere um resultado antes de copiar.');return;}copyToClipboard(t,btn);}
</script>
<?php ns_render_page_end();
}
