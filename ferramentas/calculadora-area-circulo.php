<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/config/bootstrap.php';
ns_redirect_legacy_url('/ferramentas/calculadora-area-circulo');
ns_render_page_start('tool:calculadora-area-circulo');
?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navega��o breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">In�cio</a><span class="sep">�</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">�</span><span>Calculadora de �rea do C�rculo</span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#eefcfb,#c9f3ee);">?</div><div><h1>Calculadora de �rea do C�rculo</h1><p>Informe o raio e descubra a �rea do c�rculo com c�lculo instant�neo usando a f�rmula cl�ssica com pi.</p><span class="tag tag-green">Matem�tica</span></div></div>
  <div class="tool-box">
    <div class="form-group"><label for="raio-circulo">Raio</label><input type="number" id="raio-circulo" class="form-control" min="0" step="0.01" placeholder="Ex: 3" /></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="calcularAreaCirculo()">Calcular �rea</button><button type="button" class="btn btn-outline" onclick="limparAreaCirculo()">Limpar</button><button type="button" class="copy-btn" onclick="copiarAreaCirculo(this)">Copiar resultado</button></div>
    <div class="notice notice-warn" id="erro-area-circulo" style="display:none;"><span>??</span><span id="erro-area-circulo-texto"></span></div>
    <div class="result-box" id="resultado-area-circulo"><div class="result-label">�rea do c�rculo</div><div class="result-value" id="area-circulo-valor">�</div><div id="area-circulo-detalhe" style="margin-top:1rem;color:var(--text2);"></div></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
  <div class="seo-content">
    <h2>O que � essa ferramenta</h2><p>A calculadora de �rea do c�rculo serve para descobrir rapidamente o tamanho da superf�cie circular a partir do raio. � uma conta frequente em estudos, fabrica��o, design, arquitetura, pe�as t�cnicas e tarefas do dia a dia que envolvem tampas, rodas, tubos e objetos redondos.</p><p>A p�gina usa JavaScript puro para aplicar a f�rmula A = p � r� diretamente no navegador. Isso deixa o carregamento r�pido e evita processamento desnecess�rio no servidor.</p>
    <h2>Como usar</h2><p>Digite o valor do raio e clique no bot�o de calcular. Em seguida, a ferramenta mostra a �rea em unidades quadradas e resume a f�rmula utilizada. Se o valor estiver vazio ou menor que zero, uma mensagem de valida��o aparece na tela.</p><p>O bot�o limpar reinicia a interface, enquanto o bot�o copiar resultado ajuda a levar a resposta para or�amento, estudo ou anota��o.</p>
    <h2>Exemplo de uso</h2><p>Com raio 3, a �rea do c�rculo fica pr�xima de 28,27 unidades quadradas. O c�lculo � pi multiplicado por 3 ao quadrado. Esse exemplo mostra como a ferramenta acelera contas geom�tricas que poderiam gerar erros se feitas �s pressas.</p><p>Ela funciona bem para estudantes, professores, t�cnicos e profissionais que precisam de respostas imediatas.</p>
    <h2>Perguntas frequentes</h2><h3>Qual f�rmula � usada?</h3><p>A f�rmula � �rea igual a pi vezes o raio ao quadrado.</p><h3>Posso usar n�mero decimal?</h3><p>Sim. A calculadora aceita valores decimais normalmente.</p><h3>O resultado depende da unidade?</h3><p>Sim. A unidade final fica ao quadrado em rela��o � unidade usada no raio.</p>
  </div>
  <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/calculadora-area-quadrado')) ?>" class="related-card"><span class="related-card-icon">?</span> �rea do Quadrado</a><a href="<?= ns_escape(ns_href('/ferramentas/calculadora-area-triangulo')) ?>" class="related-card"><span class="related-card-icon">??</span> �rea do Tri�ngulo</a><a href="<?= ns_escape(ns_href('/ferramentas/calculadora-volume-cilindro')) ?>" class="related-card"><span class="related-card-icon">??</span> Volume do Cilindro</a></div></div>
</div></main>
<script>
function erroAreaCirculo(msg){document.getElementById('erro-area-circulo-texto').textContent=msg;document.getElementById('erro-area-circulo').style.display='flex';document.getElementById('resultado-area-circulo').classList.remove('show');}
function limparErroAreaCirculo(){document.getElementById('erro-area-circulo').style.display='none';}
function calcularAreaCirculo(){const raio=parseFloat(document.getElementById('raio-circulo').value);limparErroAreaCirculo();if(isNaN(raio)||raio<=0){erroAreaCirculo('Informe um raio v�lido e maior que zero.');return;}const area=Math.PI*raio*raio;document.getElementById('area-circulo-valor').textContent=fmtNum(area,2)+' u�';document.getElementById('area-circulo-detalhe').textContent='F�rmula aplicada: p � '+fmtNum(raio,2)+'�.';showResult('resultado-area-circulo');}
function limparAreaCirculo(){document.getElementById('raio-circulo').value='';document.getElementById('resultado-area-circulo').classList.remove('show');limparErroAreaCirculo();}
function copiarAreaCirculo(button){if(!document.getElementById('resultado-area-circulo').classList.contains('show')){erroAreaCirculo('Calcule a �rea antes de copiar o resultado.');return;}copyToClipboard('�rea do c�rculo: '+document.getElementById('area-circulo-valor').textContent,button);}
</script>
<?php ns_render_page_end(); ?>
