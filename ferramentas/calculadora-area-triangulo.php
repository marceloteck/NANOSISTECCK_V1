<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

ns_redirect_legacy_url('/ferramentas/calculadora-area-triangulo');
ns_render_page_start('tool:calculadora-area-triangulo');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navega��o breadcrumb">
      <a href="<?= ns_escape(ns_href('/')) ?>">In�cio</a><span class="sep">�</span>
      <a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">�</span>
      <span>Calculadora de �rea do Tri�ngulo</span>
    </nav>
    <?php ns_render_ad_slot('leaderboard'); ?>
    <div class="tool-header">
      <div class="tool-page-icon" style="background:linear-gradient(135deg,#fff1ef,#ffd2c8);">??</div>
      <div>
        <h1>Calculadora de �rea do Tri�ngulo</h1>
        <p>Calcule rapidamente a �rea do tri�ngulo usando base e altura, com f�rmula simples e resultado instant�neo.</p>
        <span class="tag tag-orange">Matem�tica</span>
      </div>
    </div>
    <div class="tool-box">
      <div class="form-row">
        <div class="form-group"><label for="base-triangulo">Base</label><input type="number" id="base-triangulo" class="form-control" min="0" step="0.01" /></div>
        <div class="form-group"><label for="altura-triangulo">Altura</label><input type="number" id="altura-triangulo" class="form-control" min="0" step="0.01" /></div>
      </div>
      <div class="form-row">
        <button type="button" class="btn btn-primary" onclick="calcularAreaTriangulo()">Calcular �rea</button>
        <button type="button" class="btn btn-outline" onclick="limparAreaTriangulo()">Limpar</button>
        <button type="button" class="copy-btn" onclick="copiarAreaTriangulo(this)">Copiar resultado</button>
      </div>
      <div class="notice notice-warn" id="erro-area-triangulo" style="display:none;"><span>??</span><span id="erro-area-triangulo-texto"></span></div>
      <div class="result-box" id="resultado-area-triangulo">
        <div class="result-label">�rea do tri�ngulo</div>
        <div class="result-value" id="area-triangulo-valor">�</div>
        <div id="area-triangulo-detalhe" style="margin-top:1rem;color:var(--text2);"></div>
      </div>
    </div>
    <?php ns_render_ad_slot('rectangle'); ?>
    <div class="seo-content">
      <h2>O que � essa ferramenta</h2>
      <p>A calculadora de �rea do tri�ngulo foi criada para resolver rapidamente uma das f�rmulas mais comuns da geometria. Ela utiliza base e altura para encontrar a medida da superf�cie triangular. � �til para estudo, desenho t�cnico, constru��o civil, marcenaria, corte de chapas e planejamento de materiais.</p>
      <p>Como a conta � executada no navegador com JavaScript puro, a ferramenta responde em poucos milissegundos. Isso melhora a experi�ncia do usu�rio, reduz carga do servidor e mant�m a p�gina compat�vel com um projeto de centenas de utilidades.</p>
      <h2>Como usar</h2>
      <p>Digite a base do tri�ngulo em um campo e a altura no outro. Depois clique em calcular �rea. O sistema multiplica base por altura e divide o resultado por dois. Se algum campo estiver vazio ou com valor menor ou igual a zero, a p�gina exibe uma valida��o amig�vel antes de mostrar qualquer resposta.</p>
      <p>Ap�s o c�lculo, voc� pode copiar o resultado para colar em um trabalho, or�amento ou bloco de notas. O bot�o limpar reseta os campos para um novo c�lculo.</p>
      <h2>Exemplo de uso</h2>
      <p>Se a base de um tri�ngulo mede 10 e a altura mede 6, a �rea ser� 30 unidades quadradas. O c�lculo � feito da seguinte forma: 10 � 6 � 2. Em situa��es reais, isso ajuda a dimensionar pe�as triangulares, coberturas, estruturas ou ilustra��es geom�tricas.</p>
      <p>� uma ferramenta pr�tica para quem quer rapidez sem precisar relembrar a f�rmula toda vez.</p>
      <h2>Perguntas frequentes</h2>
      <h3>Qual f�rmula � usada?</h3>
      <p>A f�rmula � base multiplicada pela altura e dividida por dois.</p>
      <h3>Posso usar cent�metros ou metros?</h3>
      <p>Sim. O importante � usar a mesma unidade para base e altura. O resultado sair� em unidade quadrada correspondente.</p>
      <h3>Funciona para qualquer tri�ngulo?</h3>
      <p>Sim, desde que voc� tenha a medida da base escolhida e a altura perpendicular referente a essa base.</p>
    </div>
    <div class="related-tools">
      <h2>Ferramentas relacionadas</h2>
      <div class="related-grid">
        <a href="<?= ns_escape(ns_href('/ferramentas/calculadora-area-quadrado')) ?>" class="related-card"><span class="related-card-icon">?</span> �rea do Quadrado</a>
        <a href="<?= ns_escape(ns_href('/ferramentas/calculadora-area-circulo')) ?>" class="related-card"><span class="related-card-icon">?</span> �rea do C�rculo</a>
        <a href="<?= ns_escape(ns_href('/ferramentas/calculadora-regra-de-tres')) ?>" class="related-card"><span class="related-card-icon">??</span> Regra de Tr�s</a>
      </div>
    </div>
  </div>
</main>
<script>
  function erroAreaTriangulo(msg) {
    document.getElementById('erro-area-triangulo-texto').textContent = msg;
    document.getElementById('erro-area-triangulo').style.display = 'flex';
    document.getElementById('resultado-area-triangulo').classList.remove('show');
  }
  function limparErroAreaTriangulo() {
    document.getElementById('erro-area-triangulo').style.display = 'none';
  }
  function calcularAreaTriangulo() {
    const base = parseFloat(document.getElementById('base-triangulo').value);
    const altura = parseFloat(document.getElementById('altura-triangulo').value);
    limparErroAreaTriangulo();
    if (isNaN(base) || isNaN(altura) || base <= 0 || altura <= 0) {
      erroAreaTriangulo('Informe base e altura com valores maiores que zero.');
      return;
    }
    const area = (base * altura) / 2;
    document.getElementById('area-triangulo-valor').textContent = fmtNum(area, 2) + ' u�';
    document.getElementById('area-triangulo-detalhe').textContent = 'F�rmula aplicada: (' + fmtNum(base, 2) + ' � ' + fmtNum(altura, 2) + ') � 2.';
    showResult('resultado-area-triangulo');
  }
  function limparAreaTriangulo() {
    document.getElementById('base-triangulo').value = '';
    document.getElementById('altura-triangulo').value = '';
    document.getElementById('resultado-area-triangulo').classList.remove('show');
    limparErroAreaTriangulo();
  }
  function copiarAreaTriangulo(button) {
    const box = document.getElementById('resultado-area-triangulo');
    if (!box.classList.contains('show')) {
      erroAreaTriangulo('Calcule a �rea antes de copiar o resultado.');
      return;
    }
    copyToClipboard('�rea do tri�ngulo: ' + document.getElementById('area-triangulo-valor').textContent, button);
  }
</script>
<?php ns_render_page_end(); ?>
