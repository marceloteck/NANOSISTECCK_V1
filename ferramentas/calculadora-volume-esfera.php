<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/config/bootstrap.php';
ns_redirect_legacy_url('/ferramentas/calculadora-volume-esfera');
ns_render_page_start('tool:calculadora-volume-esfera');
?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span>Calculadora de Volume da Esfera</span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#eef9ff,#cee8ff);">⚽</div><div><h1>Calculadora de Volume da Esfera</h1><p>Descubra o volume de uma esfera informando apenas o raio, com cálculo automático e resultado pronto para copiar.</p><span class="tag tag-blue">Matemática</span></div></div>
  <div class="tool-box">
    <div class="form-group"><label for="raio-esfera">Raio</label><input type="number" id="raio-esfera" class="form-control" min="0" step="0.01" /></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="calcularVolumeEsfera()">Calcular volume</button><button type="button" class="btn btn-outline" onclick="limparVolumeEsfera()">Limpar</button><button type="button" class="copy-btn" onclick="copiarVolumeEsfera(this)">Copiar resultado</button></div>
    <div class="notice notice-warn" id="erro-esfera" style="display:none;"><span>⚠️</span><span id="erro-esfera-texto"></span></div>
    <div class="result-box" id="resultado-esfera"><div class="result-label">Volume da esfera</div><div class="result-value" id="esfera-valor">—</div><div id="esfera-detalhe" style="margin-top:1rem;color:var(--text2);"></div></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
  <div class="seo-content"><h2>O que é essa ferramenta</h2><p>A calculadora de volume da esfera ajuda a encontrar a capacidade geométrica de objetos esféricos ou aproximados, como bolas, reservatórios e componentes técnicos. É uma ferramenta útil para estudo, projeto e dimensionamento rápido.</p><p>Com a fórmula aplicada localmente no navegador, a resposta sai imediatamente e sem depender do servidor, preservando performance e simplicidade.</p><h2>Como usar</h2><p>Digite o valor do raio e clique em calcular volume. O sistema aplica a fórmula V = 4 ÷ 3 × π × r³. Caso o campo esteja vazio ou o número seja inválido, uma mensagem amigável aparece antes do cálculo.</p><p>Depois do resultado, você pode copiar a resposta com um clique ou limpar os campos para uma nova simulação.</p><h2>Exemplo de uso</h2><p>Se o raio da esfera for 3, o volume fica próximo de 113,10 unidades cúbicas. Esse cálculo pode ser usado em exercícios de geometria, embalagens e modelagem básica.</p><p>Ter a resposta imediata reduz erro operacional e melhora o fluxo de consulta para o usuário.</p><h2>Perguntas frequentes</h2><h3>Qual fórmula é usada?</h3><p>A ferramenta usa quatro terços de pi vezes o raio ao cubo.</p><h3>Posso usar decimal no raio?</h3><p>Sim. Valores decimais são aceitos normalmente.</p><h3>O resultado sai em unidade cúbica?</h3><p>Sim. A saída sempre será uma unidade cúbica equivalente à unidade usada no raio.</p></div>
  <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/calculadora-volume-cilindro')) ?>" class="related-card"><span class="related-card-icon">🥫</span> Volume do Cilindro</a><a href="<?= ns_escape(ns_href('/ferramentas/calculadora-area-circulo')) ?>" class="related-card"><span class="related-card-icon">⭕</span> Área do Círculo</a><a href="<?= ns_escape(ns_href('/ferramentas/calculadora-regra-de-tres')) ?>" class="related-card"><span class="related-card-icon">📐</span> Regra de Três</a></div></div>
</div></main>
<script>
function erroEsfera(msg){document.getElementById('erro-esfera-texto').textContent=msg;document.getElementById('erro-esfera').style.display='flex';document.getElementById('resultado-esfera').classList.remove('show');}
function limparErroEsfera(){document.getElementById('erro-esfera').style.display='none';}
function calcularVolumeEsfera(){const raio=parseFloat(document.getElementById('raio-esfera').value);limparErroEsfera();if(isNaN(raio)||raio<=0){erroEsfera('Informe um raio válido e maior que zero.');return;}const volume=(4/3)*Math.PI*Math.pow(raio,3);document.getElementById('esfera-valor').textContent=fmtNum(volume,2)+' u³';document.getElementById('esfera-detalhe').textContent='Fórmula aplicada: 4/3 × π × '+fmtNum(raio,2)+'³.';showResult('resultado-esfera');}
function limparVolumeEsfera(){document.getElementById('raio-esfera').value='';document.getElementById('resultado-esfera').classList.remove('show');limparErroEsfera();}
function copiarVolumeEsfera(button){if(!document.getElementById('resultado-esfera').classList.contains('show')){erroEsfera('Calcule o volume antes de copiar o resultado.');return;}copyToClipboard('Volume da esfera: '+document.getElementById('esfera-valor').textContent,button);}
</script>
<?php ns_render_page_end(); ?>
