<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

ns_redirect_legacy_url('/ferramentas/calculadora-porcentagem');
ns_render_page_start('tool:calculadora-porcentagem');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navegação breadcrumb">
      <a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span>
      <a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span>
      <span>Calculadora de Porcentagem</span>
    </nav>

    <?php ns_render_ad_slot('leaderboard'); ?>

    <div class="tool-header">
      <div class="tool-page-icon" style="background:linear-gradient(135deg,#fef3e8,#fde0bd);font-size:1.8rem;font-weight:900;color:var(--orange)">%</div>
      <div>
        <h1>Calculadora de Porcentagem</h1>
        <p>Calcule percentual, desconto, aumento e variação entre valores sem sair da mesma tela.</p>
        <span class="tag tag-orange">Matemática</span>
      </div>
    </div>

    <div class="tool-box">
      <div class="form-group">
        <label for="tipo">Tipo de Cálculo</label>
        <select id="tipo" class="form-control" onchange="atualizarCampos()">
          <option value="percentual">Qual é X% de Y?</option>
          <option value="quanto-porcento">X é qual % de Y?</option>
          <option value="desconto">Desconto de X% sobre Y</option>
          <option value="aumento">Aumento de X% sobre Y</option>
          <option value="variacao">Variação percentual de X para Y</option>
        </select>
      </div>

      <div id="campos-dinamicos"></div>

      <button class="btn btn-primary btn-block btn-lg" onclick="calcularPorcentagem()">Calcular</button>

      <div class="result-box" id="resultado">
        <div class="result-label">Resultado</div>
        <div class="result-value" id="res-principal">—</div>
        <div id="res-detalhe" style="margin-top:.5rem;font-size:.9rem;color:var(--text2);"></div>
      </div>
    </div>

    <?php ns_render_ad_slot('rectangle'); ?>

    <div class="seo-content">
      <h2>Percentual no dia a dia</h2>
      <p>Use esta calculadora para descontos, reajustes, promoções, comparações de rendimento e leitura rápida de variações.</p>
      <h3>Fórmulas principais</h3>
      <ul>
        <li>Parte = Total × (% / 100)</li>
        <li>Porcentagem = (Parte / Total) × 100</li>
        <li>Variação = ((Final - Inicial) / Inicial) × 100</li>
      </ul>
    </div>

    <div class="related-tools">
      <h2>Ferramentas relacionadas</h2>
      <div class="related-grid">
        <a href="<?= ns_escape(ns_href('/ferramentas/juros-simples')) ?>" class="related-card"><span class="related-card-icon">💰</span> Juros Simples</a>
        <a href="<?= ns_escape(ns_href('/ferramentas/juros-compostos')) ?>" class="related-card"><span class="related-card-icon">📈</span> Juros Compostos</a>
        <a href="<?= ns_escape(ns_href('/ferramentas/calculadora-idade')) ?>" class="related-card"><span class="related-card-icon">🎂</span> Calculadora de Idade</a>
      </div>
    </div>
  </div>
</main>
<script>
  const configs = {
    percentual: { a: 'Percentual (%)', b: 'Valor Base (Y)' },
    'quanto-porcento': { a: 'Valor X', b: 'Valor Total Y' },
    desconto: { a: 'Desconto (%)', b: 'Valor Original (R$)' },
    aumento: { a: 'Aumento (%)', b: 'Valor Original (R$)' },
    variacao: { a: 'Valor Inicial', b: 'Valor Final' }
  };

  function atualizarCampos() {
    const tipo = document.getElementById('tipo').value;
    const c = configs[tipo];
    document.getElementById('campos-dinamicos').innerHTML = `
      <div class="form-row">
        <div class="form-group">
          <label for="val-a">${c.a}</label>
          <input type="number" id="val-a" class="form-control" placeholder="0" step="any" />
        </div>
        <div class="form-group">
          <label for="val-b">${c.b}</label>
          <input type="number" id="val-b" class="form-control" placeholder="0" step="any" />
        </div>
      </div>
    `;
    document.getElementById('resultado').classList.remove('show');
  }

  function calcularPorcentagem() {
    const tipo = document.getElementById('tipo').value;
    const a = parseFloat(document.getElementById('val-a').value);
    const b = parseFloat(document.getElementById('val-b').value);
    if (isNaN(a) || isNaN(b)) {
      alert('Preencha os dois campos.');
      return;
    }
    let principal = '';
    let detalhe = '';

    if (tipo === 'percentual') {
      const r = b * (a / 100);
      principal = 'R$ ' + fmtBRL(r);
      detalhe = `${fmtNum(a, 2)}% de ${fmtBRL(b)} = ${fmtBRL(r)}`;
    } else if (tipo === 'quanto-porcento') {
      if (b === 0) {
        alert('Valor total não pode ser zero.');
        return;
      }
      const r = (a / b) * 100;
      principal = fmtNum(r, 2) + '%';
      detalhe = `${fmtBRL(a)} representa ${fmtNum(r, 2)}% de ${fmtBRL(b)}`;
    } else if (tipo === 'desconto') {
      const desc = b * (a / 100);
      const final = b - desc;
      principal = 'R$ ' + fmtBRL(final);
      detalhe = `Desconto de ${fmtNum(a, 2)}%: economiza R$ ${fmtBRL(desc)}. Preço final: R$ ${fmtBRL(final)}`;
    } else if (tipo === 'aumento') {
      const aum = b * (a / 100);
      const final = b + aum;
      principal = 'R$ ' + fmtBRL(final);
      detalhe = `Aumento de ${fmtNum(a, 2)}%: R$ ${fmtBRL(aum)} a mais. Novo valor: R$ ${fmtBRL(final)}`;
    } else if (tipo === 'variacao') {
      if (a === 0) {
        alert('Valor inicial não pode ser zero.');
        return;
      }
      const r = ((b - a) / a) * 100;
      principal = fmtNum(r, 2) + '%';
      detalhe = `${r >= 0 ? 'Aumento' : 'Redução'} de ${fmtNum(Math.abs(r), 2)}%: de ${fmtBRL(a)} para ${fmtBRL(b)}`;
    }

    document.getElementById('res-principal').textContent = principal;
    document.getElementById('res-detalhe').textContent = detalhe;
    showResult('resultado');
  }

  atualizarCampos();
</script>
<?php ns_render_page_end(); ?>
