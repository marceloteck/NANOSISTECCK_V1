<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/config/bootstrap.php';
ns_redirect_legacy_url('/ferramentas/calculadora-markup');
ns_render_page_start('tool:calculadora-markup');
?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span>Calculadora de Markup</span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#eef6ff,#d3e5ff);">🧮</div><div><h1>Calculadora de Markup</h1><p>Descubra o preço de venda aplicando um percentual de markup sobre o custo do produto ou serviço.</p><span class="tag tag-blue">Finanças</span></div></div>
  <div class="tool-box">
    <div class="form-row"><div class="form-group"><label for="mu-custo">Custo (R$)</label><input type="number" id="mu-custo" class="form-control" min="0" step="0.01" /></div><div class="form-group"><label for="mu-markup">Markup (%)</label><input type="number" id="mu-markup" class="form-control" min="0" step="0.01" /></div></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="calcularMarkup()">Calcular markup</button><button type="button" class="btn btn-outline" onclick="limparMarkup()">Limpar</button><button type="button" class="copy-btn" onclick="copiarMarkup(this)">Copiar resultado</button></div>
    <div class="notice notice-warn" id="erro-mu" style="display:none;"><span>⚠️</span><span id="erro-mu-texto"></span></div>
    <div class="result-box" id="resultado-mu"><div class="result-grid"><div class="result-item"><div class="label">Preço de venda</div><div class="value" id="mu-venda">—</div></div><div class="result-item"><div class="label">Acréscimo</div><div class="value" id="mu-acrescimo">—</div></div></div><div id="mu-detalhe" style="margin-top:1rem;color:var(--text2);"></div></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
  <div class="seo-content"><h2>O que é essa ferramenta</h2><p>A calculadora de markup é útil para definir preço de venda com base no custo e em um percentual de acréscimo. É muito usada em varejo, distribuição, serviços e operações que precisam padronizar precificação.</p><p>Ela ajuda a transformar custo em preço sugerido de forma rápida e fácil de entender.</p><h2>Como usar</h2><p>Digite o custo e o percentual de markup desejado. Ao calcular, a ferramenta mostra o valor acrescido e o preço final de venda. Se houver erro nos campos, a página informa de forma clara o que corrigir.</p><p>Isso facilita simulações rápidas para orçamento e gestão de portfólio.</p><h2>Exemplo de uso</h2><p>Se um produto custa R$ 50 e você aplica markup de 80%, o acréscimo será R$ 40 e o preço de venda sugerido será R$ 90. Esse raciocínio ajuda a manter consistência em tabelas comerciais.</p><p>Depois, você pode complementar a análise com margem de lucro e ponto de equilíbrio.</p><h2>Perguntas frequentes</h2><h3>Markup é igual margem?</h3><p>Não. O markup é aplicado sobre o custo, enquanto a margem é lida sobre o preço de venda.</p><h3>Serve para serviço?</h3><p>Sim. Basta usar o custo total estimado da operação.</p><h3>Posso usar decimal no percentual?</h3><p>Sim. A ferramenta aceita valores percentuais com casas decimais.</p></div>
  <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/calculadora-margem-lucro')) ?>" class="related-card"><span class="related-card-icon">💵</span> Margem de Lucro</a><a href="<?= ns_escape(ns_href('/ferramentas/calculadora-break-even')) ?>" class="related-card"><span class="related-card-icon">💹</span> Break Even</a><a href="<?= ns_escape(ns_href('/ferramentas/calculadora-desconto')) ?>" class="related-card"><span class="related-card-icon">🏷️</span> Desconto</a></div></div>
</div></main>
<script>
function erroMU(msg){document.getElementById('erro-mu-texto').textContent=msg;document.getElementById('erro-mu').style.display='flex';document.getElementById('resultado-mu').classList.remove('show');}
function limparErroMU(){document.getElementById('erro-mu').style.display='none';}
function calcularMarkup(){const custo=parseFloat(document.getElementById('mu-custo').value);const markup=parseFloat(document.getElementById('mu-markup').value);limparErroMU();if(isNaN(custo)||isNaN(markup)||custo<0||markup<0){erroMU('Informe custo e percentual de markup válidos.');return;}const acrescimo=custo*(markup/100);const venda=custo+acrescimo;document.getElementById('mu-acrescimo').textContent='R$ '+fmtBRL(acrescimo);document.getElementById('mu-venda').textContent='R$ '+fmtBRL(venda);document.getElementById('mu-detalhe').textContent='Preço de venda calculado por custo + acréscimo percentual.';showResult('resultado-mu');}
function limparMarkup(){document.getElementById('mu-custo').value='';document.getElementById('mu-markup').value='';document.getElementById('resultado-mu').classList.remove('show');limparErroMU();}
function copiarMarkup(button){if(!document.getElementById('resultado-mu').classList.contains('show')){erroMU('Calcule o markup antes de copiar.');return;}copyToClipboard('Preço de venda: '+document.getElementById('mu-venda').textContent+'\nAcréscimo: '+document.getElementById('mu-acrescimo').textContent,button);}
</script>
<?php ns_render_page_end(); ?>
