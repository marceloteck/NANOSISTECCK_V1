<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/config/bootstrap.php';
ns_redirect_legacy_url('/ferramentas/calculadora-volume-cilindro');
ns_render_page_start('tool:calculadora-volume-cilindro');
?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span>Calculadora de Volume do Cilindro</span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#edf4ff,#cedfff);">🥫</div><div><h1>Calculadora de Volume do Cilindro</h1><p>Calcule o volume de um cilindro usando raio e altura com resposta rápida e pronta para copiar.</p><span class="tag tag-blue">Matemática</span></div></div>
  <div class="tool-box">
    <div class="form-row"><div class="form-group"><label for="raio-cilindro">Raio</label><input type="number" id="raio-cilindro" class="form-control" min="0" step="0.01" /></div><div class="form-group"><label for="altura-cilindro">Altura</label><input type="number" id="altura-cilindro" class="form-control" min="0" step="0.01" /></div></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="calcularVolumeCilindro()">Calcular volume</button><button type="button" class="btn btn-outline" onclick="limparVolumeCilindro()">Limpar</button><button type="button" class="copy-btn" onclick="copiarVolumeCilindro(this)">Copiar resultado</button></div>
    <div class="notice notice-warn" id="erro-cilindro" style="display:none;"><span>⚠️</span><span id="erro-cilindro-texto"></span></div>
    <div class="result-box" id="resultado-cilindro"><div class="result-label">Volume do cilindro</div><div class="result-value" id="cilindro-valor">—</div><div id="cilindro-detalhe" style="margin-top:1rem;color:var(--text2);"></div></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
  <div class="seo-content"><h2>O que é essa ferramenta</h2><p>A calculadora de volume do cilindro foi feita para descobrir a capacidade ou o espaço interno de objetos cilíndricos, como latas, tubos, caixas técnicas e reservatórios. O cálculo depende de duas medidas: o raio da base circular e a altura.</p><p>Ao usar a ferramenta, você evita erro manual e recebe a resposta instantaneamente no navegador. Isso é útil para estudo, projeto e estimativas rápidas.</p><h2>Como usar</h2><p>Informe o raio e a altura do cilindro. Depois clique em calcular volume. A página aplica a fórmula V = π × r² × h e mostra o resultado em unidades cúbicas. Se algum valor for inválido, a ferramenta apresenta uma mensagem simples para correção.</p><p>O botão de copiar facilita reaproveitar a resposta em documentos, orçamentos e exercícios.</p><h2>Exemplo de uso</h2><p>Se um cilindro tem raio 2 e altura 10, o volume é aproximadamente 125,66 unidades cúbicas. Esse tipo de cálculo aparece em embalagens, recipientes, colunas e canos.</p><p>Com a automação da conta, a página economiza tempo e torna o processo mais confiável.</p><h2>Perguntas frequentes</h2><h3>Qual fórmula é usada?</h3><p>O volume do cilindro é calculado por pi vezes o raio ao quadrado vezes a altura.</p><h3>Posso usar qualquer unidade?</h3><p>Sim, desde que raio e altura estejam na mesma unidade.</p><h3>O resultado sai em unidade cúbica?</h3><p>Sim. Se a entrada estiver em metros, por exemplo, a saída será em metros cúbicos.</p></div>
  <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/calculadora-area-circulo')) ?>" class="related-card"><span class="related-card-icon">⭕</span> Área do Círculo</a><a href="<?= ns_escape(ns_href('/ferramentas/calculadora-volume-esfera')) ?>" class="related-card"><span class="related-card-icon">⚽</span> Volume da Esfera</a><a href="<?= ns_escape(ns_href('/ferramentas/calculadora-regra-de-tres')) ?>" class="related-card"><span class="related-card-icon">📐</span> Regra de Três</a></div></div>
</div></main>
<script>
function erroCilindro(msg){document.getElementById('erro-cilindro-texto').textContent=msg;document.getElementById('erro-cilindro').style.display='flex';document.getElementById('resultado-cilindro').classList.remove('show');}
function limparErroCilindro(){document.getElementById('erro-cilindro').style.display='none';}
function calcularVolumeCilindro(){const raio=parseFloat(document.getElementById('raio-cilindro').value);const altura=parseFloat(document.getElementById('altura-cilindro').value);limparErroCilindro();if(isNaN(raio)||isNaN(altura)||raio<=0||altura<=0){erroCilindro('Informe raio e altura maiores que zero.');return;}const volume=Math.PI*raio*raio*altura;document.getElementById('cilindro-valor').textContent=fmtNum(volume,2)+' u³';document.getElementById('cilindro-detalhe').textContent='Fórmula aplicada: π × '+fmtNum(raio,2)+'² × '+fmtNum(altura,2)+'.';showResult('resultado-cilindro');}
function limparVolumeCilindro(){document.getElementById('raio-cilindro').value='';document.getElementById('altura-cilindro').value='';document.getElementById('resultado-cilindro').classList.remove('show');limparErroCilindro();}
function copiarVolumeCilindro(button){if(!document.getElementById('resultado-cilindro').classList.contains('show')){erroCilindro('Calcule o volume antes de copiar o resultado.');return;}copyToClipboard('Volume do cilindro: '+document.getElementById('cilindro-valor').textContent,button);}
</script>
<?php ns_render_page_end(); ?>
