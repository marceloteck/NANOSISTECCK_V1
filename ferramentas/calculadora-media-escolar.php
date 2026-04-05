<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

ns_redirect_legacy_url('/ferramentas/calculadora-media-escolar');
ns_render_page_start('tool:calculadora-media-escolar');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navegação breadcrumb">
      <a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span>
      <a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span>
      <span>Calculadora de Média Escolar</span>
    </nav>
    <?php ns_render_ad_slot('leaderboard'); ?>
    <div class="tool-header">
      <div class="tool-page-icon" style="background:linear-gradient(135deg,#eef7ff,#d3e7ff);">📝</div>
      <div>
        <h1>Calculadora de Média Escolar Online</h1>
        <p>Some até quatro notas, descubra a média final e veja rapidamente um status estimado de aprovação.</p>
        <span class="tag tag-blue">Matemática</span>
      </div>
    </div>
    <div class="tool-box">
      <div class="form-row">
        <div class="form-group"><label for="n1">Nota 1</label><input type="number" id="n1" class="form-control" step="0.01" min="0" max="10" /></div>
        <div class="form-group"><label for="n2">Nota 2</label><input type="number" id="n2" class="form-control" step="0.01" min="0" max="10" /></div>
        <div class="form-group"><label for="n3">Nota 3</label><input type="number" id="n3" class="form-control" step="0.01" min="0" max="10" /></div>
        <div class="form-group"><label for="n4">Nota 4</label><input type="number" id="n4" class="form-control" step="0.01" min="0" max="10" /></div>
      </div>
      <div class="form-group">
        <label for="media-minima">Média mínima para aprovação</label>
        <input type="number" id="media-minima" class="form-control" value="6" step="0.01" min="0" max="10" />
      </div>
      <div class="form-row">
        <button type="button" class="btn btn-primary" onclick="calcularMediaEscolar()">Calcular média</button>
        <button type="button" class="btn btn-outline" onclick="limparMediaEscolar()">Limpar</button>
        <button type="button" class="copy-btn" onclick="copiarMediaEscolar(this)">Copiar resultado</button>
      </div>
      <div class="notice notice-warn" id="erro-media" style="display:none;"><span>⚠️</span><span id="erro-media-texto"></span></div>
      <div class="result-box" id="resultado-media">
        <div class="result-grid">
          <div class="result-item"><div class="label">Média final</div><div class="value" id="media-final">—</div></div>
          <div class="result-item"><div class="label">Quantidade de notas</div><div class="value" id="media-qtde">—</div></div>
          <div class="result-item"><div class="label">Status</div><div class="value" id="media-status">—</div></div>
        </div>
        <div id="media-detalhe" style="margin-top:1rem;color:var(--text2);"></div>
      </div>
    </div>
    <?php ns_render_ad_slot('rectangle'); ?>
    <div class="seo-content">
      <h2>O que é essa ferramenta</h2>
      <p>A calculadora de média escolar online ajuda estudantes, pais e professores a descobrir rapidamente a média final de uma sequência de notas. Em vez de usar calculadora comum ou planilha, basta preencher os campos disponíveis e o sistema realiza a soma e a divisão automaticamente. Essa é uma das utilidades mais procuradas por alunos no período de provas, recuperação e fechamento de boletim.</p>
      <p>A ferramenta funciona toda no navegador, sem precisar enviar dados para o servidor. Isso melhora o tempo de resposta e mantém a experiência simples, algo essencial em sites com muitas ferramentas e foco em SEO técnico.</p>
      <h2>Como usar</h2>
      <p>Digite de uma a quatro notas nos campos disponíveis. Não é obrigatório preencher todos. Depois informe a média mínima exigida para aprovação, caso queira comparar o resultado com a regra da escola. Ao clicar em calcular, a página mostra a média obtida, quantas notas foram consideradas e um status simples de aprovado ou abaixo da média.</p>
      <p>Se desejar, use o botão de copiar para levar o resumo para uma conversa, planilha ou anotação. O botão limpar remove tudo e deixa a calculadora pronta para um novo aluno ou nova disciplina.</p>
      <h2>Exemplo de uso</h2>
      <p>Imagine notas 7,5; 8; 6 e 9 com média mínima 6. A soma é 30,5 e a média final é 7,63. Com isso, o aluno está acima da exigência definida. Essa leitura rápida é útil para acompanhar desempenho ao longo do semestre e antecipar se será preciso reforço ou recuperação.</p>
      <p>Também pode ser usada para simular cenários, por exemplo descobrir qual nota é necessária na próxima avaliação para atingir determinada meta.</p>
      <h2>Perguntas frequentes</h2>
      <h3>Preciso preencher as quatro notas?</h3>
      <p>Não. A calculadora usa apenas os campos preenchidos, então você pode calcular com duas, três ou quatro notas.</p>
      <h3>Serve para qualquer escola?</h3>
      <p>Sim. Basta ajustar o valor da média mínima exigida de acordo com a regra usada pela instituição.</p>
      <h3>Ela calcula peso diferente por prova?</h3>
      <p>Não nesta versão. Aqui o cálculo é de média aritmética simples, com todas as notas tendo o mesmo peso.</p>
    </div>
    <div class="related-tools">
      <h2>Ferramentas relacionadas</h2>
      <div class="related-grid">
        <a href="<?= ns_escape(ns_href('/ferramentas/calculadora-regra-de-tres')) ?>" class="related-card"><span class="related-card-icon">📐</span> Regra de Três</a>
        <a href="<?= ns_escape(ns_href('/ferramentas/calculadora-porcentagem')) ?>" class="related-card"><span class="related-card-icon">%</span> Calculadora de Porcentagem</a>
        <a href="<?= ns_escape(ns_href('/ferramentas/contador-palavras')) ?>" class="related-card"><span class="related-card-icon">📄</span> Contador de Palavras</a>
      </div>
    </div>
  </div>
</main>
<script>
  function erroMedia(msg) {
    document.getElementById('erro-media-texto').textContent = msg;
    document.getElementById('erro-media').style.display = 'flex';
    document.getElementById('resultado-media').classList.remove('show');
  }
  function limparErroMedia() {
    document.getElementById('erro-media').style.display = 'none';
  }
  function calcularMediaEscolar() {
    const ids = ['n1', 'n2', 'n3', 'n4'];
    const notas = ids.map(function (id) { return document.getElementById(id).value.trim(); })
      .filter(function (v) { return v !== ''; })
      .map(function (v) { return parseFloat(v); });
    const minima = parseFloat(document.getElementById('media-minima').value);
    limparErroMedia();
    if (!notas.length) {
      erroMedia('Informe pelo menos uma nota para calcular a média.');
      return;
    }
    if (notas.some(function (n) { return isNaN(n) || n < 0 || n > 10; }) || isNaN(minima)) {
      erroMedia('Use notas entre 0 e 10 e uma média mínima válida.');
      return;
    }
    const soma = notas.reduce(function (acc, value) { return acc + value; }, 0);
    const media = soma / notas.length;
    document.getElementById('media-final').textContent = fmtNum(media, 2);
    document.getElementById('media-qtde').textContent = String(notas.length);
    document.getElementById('media-status').textContent = media >= minima ? 'Aprovado' : 'Abaixo da média';
    document.getElementById('media-detalhe').textContent = 'Foram consideradas ' + notas.length + ' nota(s) com média mínima definida em ' + fmtNum(minima, 2) + '.';
    showResult('resultado-media');
  }
  function limparMediaEscolar() {
    ['n1', 'n2', 'n3', 'n4'].forEach(function (id) { document.getElementById(id).value = ''; });
    document.getElementById('media-minima').value = '6';
    document.getElementById('resultado-media').classList.remove('show');
    limparErroMedia();
  }
  function copiarMediaEscolar(button) {
    const box = document.getElementById('resultado-media');
    if (!box.classList.contains('show')) {
      erroMedia('Calcule a média antes de copiar o resultado.');
      return;
    }
    copyToClipboard(
      'Média final: ' + document.getElementById('media-final').textContent + '\n' +
      'Notas consideradas: ' + document.getElementById('media-qtde').textContent + '\n' +
      'Status: ' + document.getElementById('media-status').textContent,
      button
    );
  }
</script>
<?php ns_render_page_end(); ?>
