<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

ns_redirect_legacy_url('/ferramentas/calculadora-imc');
ns_render_page_start('tool:calculadora-imc', [
    'meta' => [
        'title' => 'Calculadora de IMC Online Gr�tis | NANOSISTECCK Tools',
        'description' => 'Calcule seu IMC online gr�tis e descubra a faixa de peso ideal com resultado imediato, r�pido e f�cil de entender.',
    ],
]);
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navega��o breadcrumb">
      <a href="<?= ns_escape(ns_href('/')) ?>">In�cio</a>
      <span class="sep">�</span>
      <a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a>
      <span class="sep">�</span>
      <span>Calculadora de IMC</span>
    </nav>

    <?php ns_render_ad_slot('leaderboard'); ?>

    <div class="tool-header">
      <div class="tool-page-icon" style="background:linear-gradient(135deg,#e8fbf5,#c7f3e4);">??</div>
      <div>
        <h1>Calculadora de IMC Online Gr�tis</h1>
        <p>Descubra seu �ndice de massa corporal em segundos com uma calculadora simples, leve e f�cil de usar em qualquer dispositivo.</p>
        <span class="tag tag-green">Sa�de</span>
      </div>
    </div>

    <div class="tool-box">
      <div class="form-row">
        <div class="form-group">
          <label for="peso">Peso (kg)</label>
          <input type="number" id="peso" class="form-control" placeholder="Ex: 72.5" min="1" step="0.1" inputmode="decimal" />
        </div>
        <div class="form-group">
          <label for="altura">Altura (cm)</label>
          <input type="number" id="altura" class="form-control" placeholder="Ex: 175" min="1" step="0.1" inputmode="decimal" />
        </div>
      </div>

      <div class="notice notice-info" style="margin-top:0;">
        <span>??</span>
        <span>O IMC � uma refer�ncia pr�tica para adultos. Ele n�o substitui avalia��o m�dica, nutricional ou an�lise de composi��o corporal.</span>
      </div>

      <div class="form-row" style="margin-top:1rem;">
        <button type="button" class="btn btn-primary" onclick="calcularIMC()">Calcular IMC</button>
        <button type="button" class="btn btn-outline" onclick="limparIMC()">Limpar</button>
        <button type="button" class="copy-btn" id="btn-copiar-imc" onclick="copiarResultadoIMC(this)">Copiar resultado</button>
      </div>

      <div class="notice notice-warn" id="imc-erro" style="display:none;">
        <span>??</span>
        <span id="imc-erro-texto"></span>
      </div>

      <div class="result-box" id="resultado-imc" aria-live="polite">
        <div class="result-label">Resultado do IMC</div>
        <div class="result-value" id="imc-principal">�</div>
        <div class="result-grid">
          <div class="result-item">
            <div class="label">Classifica��o</div>
            <div class="value" id="imc-classificacao">�</div>
          </div>
          <div class="result-item">
            <div class="label">Faixa saud�vel</div>
            <div class="value" id="imc-faixa">�</div>
          </div>
          <div class="result-item">
            <div class="label">Peso de refer�ncia</div>
            <div class="value" id="imc-referencia">�</div>
          </div>
        </div>
        <div id="imc-detalhe" style="margin-top:1rem;font-size:.95rem;color:var(--text2);"></div>
      </div>
    </div>

    <?php ns_render_ad_slot('rectangle'); ?>

    <div class="seo-content">
      <h2>O que � essa ferramenta</h2>
      <p>A calculadora de IMC � uma ferramenta online usada para estimar o �ndice de massa corporal a partir do peso e da altura. Esse �ndice � uma medida amplamente conhecida para avaliar se uma pessoa adulta est� em uma faixa considerada abaixo do peso, peso adequado, sobrepeso ou obesidade. Como o c�lculo � simples e r�pido, a ferramenta se tornou uma das mais buscadas na internet por pessoas que querem um par�metro inicial para acompanhar a pr�pria sa�de.</p>
      <p>O IMC � obtido dividindo o peso em quilos pela altura em metros ao quadrado. Apesar de n�o medir percentual de gordura, massa muscular ou outros fatores cl�nicos importantes, ele funciona como um indicador pr�tico para triagem inicial. Por isso, � muito usado em conte�dos educativos, academias, consultas e programas de bem-estar. Nesta p�gina, todo o c�lculo � feito em JavaScript no navegador, o que torna a resposta imediata e reduz a depend�ncia do servidor.</p>

      <h2>Como usar</h2>
      <p>Usar a ferramenta � simples. Primeiro, informe seu peso atual em quilos. Depois, digite sua altura em cent�metros. Em seguida, clique no bot�o para calcular o IMC. O sistema mostra o valor do �ndice, a classifica��o correspondente e uma faixa de peso de refer�ncia baseada na faixa saud�vel mais conhecida para adultos. Se algum campo estiver vazio ou com valor inv�lido, uma mensagem amig�vel aparece na tela para orientar a corre��o.</p>
      <p>Depois do c�lculo, voc� ainda pode usar o bot�o de copiar resultado para salvar o resumo e compartilhar em mensagens, anota��es ou com um profissional de sa�de. Se quiser come�ar de novo, basta usar o bot�o limpar. O foco aqui � oferecer uma experi�ncia r�pida, objetiva e mobile friendly, sem travamentos e sem etapas extras.</p>

      <h2>Exemplo de uso</h2>
      <p>Imagine uma pessoa com 72 quilos e 175 cent�metros de altura. Ao preencher esses valores, a calculadora converte automaticamente a altura para metros e aplica a f�rmula do IMC. O resultado fica pr�ximo de 23,51, normalmente classificado como peso adequado. A ferramenta tamb�m exibe uma estimativa de faixa saud�vel para essa altura, ajudando o usu�rio a interpretar o n�mero de forma mais pr�tica.</p>
      <p>Esse tipo de consulta � �til para acompanhar evolu��o em dieta, atividade f�sica ou mudan�a de h�bitos. Em vez de fazer a conta manualmente, o usu�rio recebe uma resposta pronta, com contexto e leitura facilitada.</p>

      <h2>Perguntas frequentes</h2>
      <h3>O IMC � confi�vel?</h3>
      <p>O IMC � �til como refer�ncia inicial, especialmente para adultos, mas n�o deve ser visto como diagn�stico isolado. Pessoas com muita massa muscular, por exemplo, podem ter IMC elevado sem excesso de gordura corporal.</p>
      <h3>Posso usar essa calculadora para crian�as?</h3>
      <p>O uso mais comum do IMC desta forma � para adultos. Crian�as e adolescentes exigem interpreta��o por idade e sexo, com curvas espec�ficas.</p>
      <h3>Qual � o IMC considerado normal?</h3>
      <p>De forma geral, a faixa entre 18,5 e 24,9 � a mais usada como refer�ncia de peso adequado para adultos. Ainda assim, a an�lise ideal deve considerar contexto cl�nico e orienta��o profissional.</p>
    </div>

    <div class="related-tools">
      <h2>Ferramentas relacionadas</h2>
      <div class="related-grid">
        <a href="<?= ns_escape(ns_href('/ferramentas/calculadora-idade')) ?>" class="related-card"><span class="related-card-icon">??</span> Calculadora de Idade</a>
        <a href="<?= ns_escape(ns_href('/ferramentas/calculadora-porcentagem')) ?>" class="related-card"><span class="related-card-icon">%</span> Calculadora de Porcentagem</a>
        <a href="<?= ns_escape(ns_href('/ferramentas/contador-caracteres')) ?>" class="related-card"><span class="related-card-icon">??</span> Contador de Caracteres</a>
      </div>
    </div>
  </div>
</main>
<script>
  function exibirErroIMC(mensagem) {
    document.getElementById('imc-erro-texto').textContent = mensagem;
    document.getElementById('imc-erro').style.display = 'flex';
    document.getElementById('resultado-imc').classList.remove('show');
  }

  function esconderErroIMC() {
    document.getElementById('imc-erro').style.display = 'none';
    document.getElementById('imc-erro-texto').textContent = '';
  }

  function classificarIMC(imc) {
    if (imc < 18.5) {
      return 'Abaixo do peso';
    }
    if (imc < 25) {
      return 'Peso adequado';
    }
    if (imc < 30) {
      return 'Sobrepeso';
    }
    if (imc < 35) {
      return 'Obesidade grau 1';
    }
    if (imc < 40) {
      return 'Obesidade grau 2';
    }
    return 'Obesidade grau 3';
  }

  function calcularFaixaSaudavel(alturaMetros) {
    const pesoMin = 18.5 * alturaMetros * alturaMetros;
    const pesoMax = 24.9 * alturaMetros * alturaMetros;
    return {
      min: pesoMin,
      max: pesoMax
    };
  }

  function calcularIMC() {
    const peso = parseFloat(document.getElementById('peso').value);
    const alturaCm = parseFloat(document.getElementById('altura').value);

    esconderErroIMC();

    if (isNaN(peso) || isNaN(alturaCm)) {
      exibirErroIMC('Preencha peso e altura para calcular o IMC.');
      return;
    }

    if (peso <= 0 || alturaCm <= 0) {
      exibirErroIMC('Informe valores maiores que zero nos dois campos.');
      return;
    }

    if (peso > 500) {
      exibirErroIMC('Confira o peso informado. Use quilogramas, por exemplo 72.5.');
      return;
    }

    if (alturaCm < 50 || alturaCm > 280) {
      exibirErroIMC('Confira a altura informada em cent�metros. Exemplo: 175.');
      return;
    }

    const alturaMetros = alturaCm / 100;
    const imc = peso / (alturaMetros * alturaMetros);
    const classificacao = classificarIMC(imc);
    const faixa = calcularFaixaSaudavel(alturaMetros);
    const detalhe = 'Com ' + fmtNum(peso, 1) + ' kg e ' + fmtNum(alturaCm, 1) + ' cm, seu IMC � ' + fmtNum(imc, 2) + '.';

    document.getElementById('imc-principal').textContent = fmtNum(imc, 2);
    document.getElementById('imc-classificacao').textContent = classificacao;
    document.getElementById('imc-faixa').textContent = fmtNum(faixa.min, 1) + ' kg a ' + fmtNum(faixa.max, 1) + ' kg';
    document.getElementById('imc-referencia').textContent = fmtNum((faixa.min + faixa.max) / 2, 1) + ' kg';
    document.getElementById('imc-detalhe').textContent = detalhe + ' Use o resultado apenas como refer�ncia inicial.';

    showResult('resultado-imc');
  }

  function limparIMC() {
    document.getElementById('peso').value = '';
    document.getElementById('altura').value = '';
    document.getElementById('imc-principal').textContent = '�';
    document.getElementById('imc-classificacao').textContent = '�';
    document.getElementById('imc-faixa').textContent = '�';
    document.getElementById('imc-referencia').textContent = '�';
    document.getElementById('imc-detalhe').textContent = '';
    esconderErroIMC();
    document.getElementById('resultado-imc').classList.remove('show');
    document.getElementById('peso').focus();
  }

  function copiarResultadoIMC(button) {
    const resultado = document.getElementById('resultado-imc');
    if (!resultado.classList.contains('show')) {
      exibirErroIMC('Calcule o IMC antes de copiar o resultado.');
      return;
    }

    esconderErroIMC();

    const texto = [
      'Resultado do IMC',
      'IMC: ' + document.getElementById('imc-principal').textContent,
      'Classifica��o: ' + document.getElementById('imc-classificacao').textContent,
      'Faixa saud�vel: ' + document.getElementById('imc-faixa').textContent,
      'Peso de refer�ncia: ' + document.getElementById('imc-referencia').textContent
    ].join('\n');

    copyToClipboard(texto, button);
  }
</script>
<?php ns_render_page_end(); ?>
