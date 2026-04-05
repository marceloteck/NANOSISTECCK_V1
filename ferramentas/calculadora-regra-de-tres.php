<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

ns_redirect_legacy_url('/ferramentas/calculadora-regra-de-tres');
ns_render_page_start('tool:calculadora-regra-de-tres');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navega��o breadcrumb">
      <a href="<?= ns_escape(ns_href('/')) ?>">In�cio</a><span class="sep">�</span>
      <a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">�</span>
      <span>Calculadora de Regra de Tr�s</span>
    </nav>
    <?php ns_render_ad_slot('leaderboard'); ?>
    <div class="tool-header">
      <div class="tool-page-icon" style="background:linear-gradient(135deg,#eaf3ff,#cdddff);">??</div>
      <div>
        <h1>Calculadora de Regra de Tr�s Online</h1>
        <p>Resolva propor��es simples com quatro campos e encontre o valor desconhecido sem precisar montar a conta manualmente.</p>
        <span class="tag tag-blue">Matem�tica</span>
      </div>
    </div>
    <div class="tool-box">
      <div class="form-row">
        <div class="form-group"><label for="r1">Valor 1</label><input type="number" id="r1" class="form-control" step="any" placeholder="Ex: 2" /></div>
        <div class="form-group"><label for="r2">Valor 2</label><input type="number" id="r2" class="form-control" step="any" placeholder="Ex: 10" /></div>
        <div class="form-group"><label for="r3">Valor 3</label><input type="number" id="r3" class="form-control" step="any" placeholder="Ex: 5" /></div>
        <div class="form-group"><label for="r4">Valor X</label><input type="number" id="r4" class="form-control" step="any" placeholder="Deixe vazio para calcular" /></div>
      </div>
      <div class="notice notice-info" style="margin-top:0;"><span>??</span><span>Deixe apenas um campo vazio. A calculadora encontra o valor faltante usando propor��o simples.</span></div>
      <div class="form-row">
        <button type="button" class="btn btn-primary" onclick="calcularRegraTres()">Calcular</button>
        <button type="button" class="btn btn-outline" onclick="limparRegraTres()">Limpar</button>
        <button type="button" class="copy-btn" onclick="copiarRegraTres(this)">Copiar resultado</button>
      </div>
      <div class="notice notice-warn" id="erro-regra" style="display:none;"><span>??</span><span id="erro-regra-texto"></span></div>
      <div class="result-box" id="resultado-regra">
        <div class="result-label">Valor encontrado</div>
        <div class="result-value" id="regra-valor">�</div>
        <div id="regra-detalhe" style="margin-top:1rem;color:var(--text2);"></div>
      </div>
    </div>
    <?php ns_render_ad_slot('rectangle'); ?>
    <div class="seo-content">
      <h2>O que � essa ferramenta</h2>
      <p>A calculadora de regra de tr�s online serve para resolver propor��es simples entre grandezas. Ela � �til quando existe uma rela��o direta entre dois pares de valores e um dos n�meros est� faltando. Esse tipo de c�lculo aparece em receitas, escalas, porcentagens, velocidade, produ��o, compras por quantidade e diversas situa��es do cotidiano.</p>
      <p>Em vez de montar a multiplica��o cruzada manualmente, voc� pode preencher os campos na tela e deixar apenas um deles em branco. O sistema identifica qual � o valor desconhecido e faz a conta no navegador. Isso reduz erros, acelera o uso e deixa a ferramenta ideal para celulares e consultas r�pidas.</p>
      <h2>Como usar</h2>
      <p>Informe tr�s valores conhecidos e deixe somente um campo vazio. Depois clique em calcular. A ferramenta localiza o termo faltante e exibe o resultado com explica��o resumida. Se mais de um campo estiver vazio, ou se houver divis�o por zero, uma mensagem de erro amig�vel aparece para orientar a corre��o.</p>
      <p>Voc� pode usar a calculadora para descobrir pre�o proporcional, ajustar quantidade de ingredientes, estimar produtividade ou comparar rela��es entre medidas.</p>
      <h2>Exemplo de uso</h2>
      <p>Imagine que 2 unidades custam R$ 10 e voc� quer saber quanto custam 5 unidades. Basta preencher 2, 10 e 5, deixando o quarto campo vazio. A calculadora encontra o valor 25. O mesmo racioc�nio vale para dist�ncia, tempo, consumo, escalas de desenho e dimensionamento b�sico.</p>
      <p>Essa praticidade torna a ferramenta muito �til para estudantes, profissionais administrativos, vendedores e qualquer pessoa que precise fazer conta r�pida sem abrir planilhas.</p>
      <h2>Perguntas frequentes</h2>
      <h3>Posso deixar qualquer campo vazio?</h3>
      <p>Sim. Desde que apenas um campo fique vazio, o sistema calcula o valor faltante usando a propor��o.</p>
      <h3>Funciona para porcentagem?</h3>
      <p>Em muitos casos, sim. Regra de tr�s e porcentagem est�o ligadas em situa��es de propor��o direta.</p>
      <h3>O c�lculo � instant�neo?</h3>
      <p>Sim. A opera��o acontece localmente no navegador e o resultado aparece imediatamente.</p>
    </div>
    <div class="related-tools">
      <h2>Ferramentas relacionadas</h2>
      <div class="related-grid">
        <a href="<?= ns_escape(ns_href('/ferramentas/calculadora-porcentagem')) ?>" class="related-card"><span class="related-card-icon">%</span> Calculadora de Porcentagem</a>
        <a href="<?= ns_escape(ns_href('/ferramentas/calculadora-media-escolar')) ?>" class="related-card"><span class="related-card-icon">??</span> M�dia Escolar</a>
        <a href="<?= ns_escape(ns_href('/ferramentas/calculadora-area-circulo')) ?>" class="related-card"><span class="related-card-icon">?</span> �rea do C�rculo</a>
      </div>
    </div>
  </div>
</main>
<script>
  function erroRegra(msg) {
    document.getElementById('erro-regra-texto').textContent = msg;
    document.getElementById('erro-regra').style.display = 'flex';
    document.getElementById('resultado-regra').classList.remove('show');
  }
  function limparErroRegra() {
    document.getElementById('erro-regra').style.display = 'none';
  }
  function calcularRegraTres() {
    const ids = ['r1', 'r2', 'r3', 'r4'];
    const valores = ids.map(function (id) {
      const value = document.getElementById(id).value.trim();
      return value === '' ? null : parseFloat(value);
    });
    limparErroRegra();
    const vazios = valores.map(function (v, i) { return v === null ? i : -1; }).filter(function (i) { return i >= 0; });
    if (vazios.length !== 1) {
      erroRegra('Deixe exatamente um campo vazio para calcular a propor��o.');
      return;
    }
    let resultado = 0;
    const vazio = vazios[0];
    if (vazio === 0) {
      if (valores[3] === 0) { erroRegra('N�o � poss�vel dividir por zero.'); return; }
      resultado = (valores[1] * valores[2]) / valores[3];
    } else if (vazio === 1) {
      if (valores[2] === 0) { erroRegra('N�o � poss�vel dividir por zero.'); return; }
      resultado = (valores[0] * valores[3]) / valores[2];
    } else if (vazio === 2) {
      if (valores[1] === 0) { erroRegra('N�o � poss�vel dividir por zero.'); return; }
      resultado = (valores[0] * valores[3]) / valores[1];
    } else {
      if (valores[0] === 0) { erroRegra('N�o � poss�vel dividir por zero.'); return; }
      resultado = (valores[1] * valores[2]) / valores[0];
    }
    document.getElementById(ids[vazio]).value = fmtNum(resultado, 4).replace(',', '.');
    document.getElementById('regra-valor').textContent = fmtNum(resultado, 4);
    document.getElementById('regra-detalhe').textContent = 'A propor��o foi resolvida por multiplica��o cruzada com base nos tr�s valores informados.';
    showResult('resultado-regra');
  }
  function limparRegraTres() {
    ['r1', 'r2', 'r3', 'r4'].forEach(function (id) { document.getElementById(id).value = ''; });
    document.getElementById('resultado-regra').classList.remove('show');
    limparErroRegra();
  }
  function copiarRegraTres(button) {
    const box = document.getElementById('resultado-regra');
    if (!box.classList.contains('show')) {
      erroRegra('Calcule a regra de tr�s antes de copiar o resultado.');
      return;
    }
    copyToClipboard('Valor encontrado: ' + document.getElementById('regra-valor').textContent, button);
  }
</script>
<?php ns_render_page_end(); ?>
