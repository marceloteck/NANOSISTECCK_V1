<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

ns_redirect_legacy_url('/ferramentas/calculadora-area-quadrado');
ns_render_page_start('tool:calculadora-area-quadrado');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navega��o breadcrumb">
      <a href="<?= ns_escape(ns_href('/')) ?>">In�cio</a><span class="sep">�</span>
      <a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">�</span>
      <span>Calculadora de �rea do Quadrado</span>
    </nav>
    <?php ns_render_ad_slot('leaderboard'); ?>
    <div class="tool-header">
      <div class="tool-page-icon" style="background:linear-gradient(135deg,#f3f6ff,#d7defe);">?</div>
      <div>
        <h1>Calculadora de �rea do Quadrado</h1>
        <p>Informe o lado do quadrado e descubra instantaneamente a �rea em unidades quadradas, com explica��o clara da f�rmula.</p>
        <span class="tag tag-blue">Matem�tica</span>
      </div>
    </div>
    <div class="tool-box">
      <div class="form-group">
        <label for="lado-quadrado">Lado do quadrado</label>
        <input type="number" id="lado-quadrado" class="form-control" step="0.01" min="0" placeholder="Ex: 5" />
      </div>
      <div class="form-row">
        <button type="button" class="btn btn-primary" onclick="calcularAreaQuadrado()">Calcular �rea</button>
        <button type="button" class="btn btn-outline" onclick="limparAreaQuadrado()">Limpar</button>
        <button type="button" class="copy-btn" onclick="copiarAreaQuadrado(this)">Copiar resultado</button>
      </div>
      <div class="notice notice-warn" id="erro-area-quadrado" style="display:none;"><span>??</span><span id="erro-area-quadrado-texto"></span></div>
      <div class="result-box" id="resultado-area-quadrado">
        <div class="result-label">�rea do quadrado</div>
        <div class="result-value" id="area-quadrado-valor">�</div>
        <div id="area-quadrado-detalhe" style="margin-top:1rem;color:var(--text2);"></div>
      </div>
    </div>
    <?php ns_render_ad_slot('rectangle'); ?>
    <div class="seo-content">
      <h2>O que � essa ferramenta</h2>
      <p>A calculadora de �rea do quadrado ajuda a descobrir rapidamente a medida da superf�cie de um quadrado a partir do comprimento do lado. Essa conta � comum em atividades escolares, obras, pisos, revestimentos, cortes de material e pequenos projetos de engenharia ou arquitetura.</p>
      <p>Como a f�rmula � simples, a maior vantagem da ferramenta est� na rapidez e na redu��o de erro. O usu�rio informa o lado, clica no bot�o e v� o resultado imediatamente. Tudo acontece no navegador, o que mant�m a p�gina r�pida e escal�vel para um portal com muitas calculadoras.</p>
      <h2>Como usar</h2>
      <p>Digite o valor do lado no campo indicado. Em seguida, clique em calcular �rea. O resultado ser� exibido em unidades quadradas, porque a �rea representa uma medida bidimensional. Se o valor estiver vazio ou inv�lido, a p�gina mostra uma mensagem clara para corre��o.</p>
      <p>Voc� pode usar o bot�o limpar para refazer a conta e o bot�o copiar resultado para compartilhar a resposta em trabalhos, or�amentos ou anota��es.</p>
      <h2>Exemplo de uso</h2>
      <p>Se um quadrado possui lado igual a 5, a �rea ser� 25. Isso acontece porque a f�rmula � lado vezes lado. Em uma aplica��o pr�tica, esse c�lculo pode ajudar a estimar quantos metros quadrados de piso s�o necess�rios para cobrir uma superf�cie quadrada.</p>
      <p>A mesma l�gica vale para papel, placas, mosaicos, artesanato e dimensionamento b�sico de superf�cies.</p>
      <h2>Perguntas frequentes</h2>
      <h3>Qual � a f�rmula da �rea do quadrado?</h3>
      <p>A f�rmula � lado ao quadrado, ou seja, lado multiplicado por lado.</p>
      <h3>O resultado sai em metro quadrado?</h3>
      <p>Depende da unidade usada no lado. Se o lado estiver em metros, o resultado sai em metros quadrados.</p>
      <h3>Posso usar n�mero decimal?</h3>
      <p>Sim. A calculadora aceita valores com casas decimais para medi��es mais precisas.</p>
    </div>
    <div class="related-tools">
      <h2>Ferramentas relacionadas</h2>
      <div class="related-grid">
        <a href="<?= ns_escape(ns_href('/ferramentas/calculadora-area-triangulo')) ?>" class="related-card"><span class="related-card-icon">??</span> �rea do Tri�ngulo</a>
        <a href="<?= ns_escape(ns_href('/ferramentas/calculadora-area-circulo')) ?>" class="related-card"><span class="related-card-icon">?</span> �rea do C�rculo</a>
        <a href="<?= ns_escape(ns_href('/ferramentas/calculadora-regra-de-tres')) ?>" class="related-card"><span class="related-card-icon">??</span> Regra de Tr�s</a>
      </div>
    </div>
  </div>
</main>
<script>
  function erroAreaQuadrado(msg) {
    document.getElementById('erro-area-quadrado-texto').textContent = msg;
    document.getElementById('erro-area-quadrado').style.display = 'flex';
    document.getElementById('resultado-area-quadrado').classList.remove('show');
  }
  function limparErroAreaQuadrado() {
    document.getElementById('erro-area-quadrado').style.display = 'none';
  }
  function calcularAreaQuadrado() {
    const lado = parseFloat(document.getElementById('lado-quadrado').value);
    limparErroAreaQuadrado();
    if (isNaN(lado) || lado <= 0) {
      erroAreaQuadrado('Informe um lado v�lido e maior que zero.');
      return;
    }
    const area = lado * lado;
    document.getElementById('area-quadrado-valor').textContent = fmtNum(area, 2) + ' u�';
    document.getElementById('area-quadrado-detalhe').textContent = 'A f�rmula usada foi lado � lado: ' + fmtNum(lado, 2) + ' � ' + fmtNum(lado, 2) + '.';
    showResult('resultado-area-quadrado');
  }
  function limparAreaQuadrado() {
    document.getElementById('lado-quadrado').value = '';
    document.getElementById('resultado-area-quadrado').classList.remove('show');
    limparErroAreaQuadrado();
  }
  function copiarAreaQuadrado(button) {
    const box = document.getElementById('resultado-area-quadrado');
    if (!box.classList.contains('show')) {
      erroAreaQuadrado('Calcule a �rea antes de copiar o resultado.');
      return;
    }
    copyToClipboard('�rea do quadrado: ' + document.getElementById('area-quadrado-valor').textContent, button);
  }
</script>
<?php ns_render_page_end(); ?>
