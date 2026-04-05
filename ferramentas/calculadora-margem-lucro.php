<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/config/bootstrap.php';
ns_redirect_legacy_url('/ferramentas/calculadora-margem-lucro');
ns_render_page_start('tool:calculadora-margem-lucro');
?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span>Calculadora de Margem de Lucro</span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#eefbf4,#cff3df);">💵</div><div><h1>Calculadora de Margem de Lucro</h1><p>Descubra sua margem de lucro em percentual e em valor absoluto com base no custo e no preço de venda.</p><span class="tag tag-green">Finanças</span></div></div>
  <div class="tool-box">
    <div class="form-row"><div class="form-group"><label for="ml-custo">Custo (R$)</label><input type="number" id="ml-custo" class="form-control" min="0" step="0.01" /></div><div class="form-group"><label for="ml-venda">Preço de venda (R$)</label><input type="number" id="ml-venda" class="form-control" min="0" step="0.01" /></div></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="calcularMargemLucro()">Calcular margem</button><button type="button" class="btn btn-outline" onclick="limparMargemLucro()">Limpar</button><button type="button" class="copy-btn" onclick="copiarMargemLucro(this)">Copiar resultado</button></div>
    <div class="notice notice-warn" id="erro-ml" style="display:none;"><span>⚠️</span><span id="erro-ml-texto"></span></div>
    <div class="result-box" id="resultado-ml"><div class="result-grid"><div class="result-item"><div class="label">Lucro</div><div class="value" id="ml-lucro">—</div></div><div class="result-item"><div class="label">Margem</div><div class="value" id="ml-margem">—</div></div></div><div id="ml-detalhe" style="margin-top:1rem;color:var(--text2);"></div></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
  <div class="seo-content"><h2>O que é essa ferramenta</h2><p>A calculadora de margem de lucro ajuda a entender quanto de cada venda realmente sobra depois de descontar o custo. Essa informação é essencial para precificação, controle financeiro e comparação entre produtos.</p><p>A página foi construída para responder rápido e com explicação clara, sem depender de processamento no servidor.</p><h2>Como usar</h2><p>Digite o custo do produto ou serviço e depois o preço de venda. Ao clicar em calcular, a ferramenta mostra o lucro em reais e a margem percentual sobre o preço de venda. Se os valores forem inválidos, a página orienta a correção.</p><p>Também é possível copiar o resultado para orçamento, planilha ou relatório.</p><h2>Exemplo de uso</h2><p>Se um item custa R$ 40 e é vendido por R$ 100, o lucro é R$ 60 e a margem é 60%. Essa leitura é útil para comparar produtos e ajustar metas comerciais.</p><p>Ela complementa outras análises como markup, break even e ROI.</p><h2>Perguntas frequentes</h2><h3>Margem e markup são iguais?</h3><p>Não. A margem é calculada sobre o preço de venda, enquanto o markup é aplicado sobre o custo.</p><h3>Posso usar para serviços?</h3><p>Sim. Basta estimar o custo total e o preço cobrado.</p><h3>Serve para e-commerce?</h3><p>Sim. É útil para produtos físicos, digitais e operações de venda em geral.</p></div>
  <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/calculadora-markup')) ?>" class="related-card"><span class="related-card-icon">🧮</span> Markup</a><a href="<?= ns_escape(ns_href('/ferramentas/calculadora-roi')) ?>" class="related-card"><span class="related-card-icon">📈</span> ROI</a><a href="<?= ns_escape(ns_href('/ferramentas/calculadora-break-even')) ?>" class="related-card"><span class="related-card-icon">💹</span> Break Even</a></div></div>
</div></main>
<script>
function erroML(msg){document.getElementById('erro-ml-texto').textContent=msg;document.getElementById('erro-ml').style.display='flex';document.getElementById('resultado-ml').classList.remove('show');}
function limparErroML(){document.getElementById('erro-ml').style.display='none';}
function calcularMargemLucro(){const custo=parseFloat(document.getElementById('ml-custo').value);const venda=parseFloat(document.getElementById('ml-venda').value);limparErroML();if(isNaN(custo)||isNaN(venda)||custo<0||venda<=0||venda<custo){erroML('Informe custo e preço de venda válidos. O preço deve ser maior ou igual ao custo.');return;}const lucro=venda-custo;const margem=(lucro/venda)*100;document.getElementById('ml-lucro').textContent='R$ '+fmtBRL(lucro);document.getElementById('ml-margem').textContent=fmtNum(margem,2)+'%';document.getElementById('ml-detalhe').textContent='A margem é calculada sobre o preço final de venda.';showResult('resultado-ml');}
function limparMargemLucro(){document.getElementById('ml-custo').value='';document.getElementById('ml-venda').value='';document.getElementById('resultado-ml').classList.remove('show');limparErroML();}
function copiarMargemLucro(button){if(!document.getElementById('resultado-ml').classList.contains('show')){erroML('Calcule a margem antes de copiar.');return;}copyToClipboard('Lucro: '+document.getElementById('ml-lucro').textContent+'\nMargem: '+document.getElementById('ml-margem').textContent,button);}
</script>
<?php ns_render_page_end(); ?>
