<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

ns_redirect_legacy_url('/ferramentas/juros-simples');
ns_render_page_start('tool:juros-simples');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navegação breadcrumb">
      <a href="<?= ns_escape(ns_href('/')) ?>">Início</a>
      <span class="sep">›</span>
      <a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a>
      <span class="sep">›</span>
      <span>Juros Simples</span>
    </nav>

    <?php ns_render_ad_slot('leaderboard'); ?>

    <div class="tool-header">
      <div class="tool-page-icon" style="background:linear-gradient(135deg,#e8f0fe,#c5d8ff)">💰</div>
      <div>
        <h1>Calculadora de Juros Simples</h1>
        <p>Calcule o montante final, os juros totais e o valor futuro de qualquer operação com juros simples. Rápido e gratuito.</p>
        <span class="tag tag-blue">Finanças</span>
      </div>
    </div>

    <div class="tool-box">
      <div class="form-row">
        <div class="form-group">
          <label for="capital">Capital Inicial (R$)</label>
          <input type="number" id="capital" class="form-control" placeholder="Ex: 1000" min="0" step="0.01" />
        </div>
        <div class="form-group">
          <label for="taxa">Taxa de Juros (% ao mês)</label>
          <input type="number" id="taxa" class="form-control" placeholder="Ex: 2.5" min="0" step="0.01" />
        </div>
        <div class="form-group">
          <label for="periodo">Período (meses)</label>
          <input type="number" id="periodo" class="form-control" placeholder="Ex: 12" min="1" step="1" />
        </div>
      </div>
      <button class="btn btn-primary btn-block btn-lg" onclick="calcularJurosSimples()">
        Calcular Juros Simples
      </button>

      <div class="result-box" id="resultado">
        <div class="result-grid">
          <div class="result-item">
            <div class="label">Capital Inicial</div>
            <div class="value" id="res-capital">—</div>
          </div>
          <div class="result-item">
            <div class="label">Juros Totais</div>
            <div class="value" id="res-juros" style="color:var(--orange)">—</div>
          </div>
          <div class="result-item">
            <div class="label">Montante Final</div>
            <div class="value" id="res-montante" style="color:var(--accent)">—</div>
          </div>
          <div class="result-item">
            <div class="label">Taxa Total no Período</div>
            <div class="value" id="res-taxa-total">—</div>
          </div>
        </div>
      </div>
    </div>

    <div class="notice notice-info">
      <span>ℹ️</span>
      <span><strong>Fórmula usada:</strong> J = C × i × t | M = C + J, onde C = capital, i = taxa (%), t = tempo (meses).</span>
    </div>

    <?php ns_render_ad_slot('rectangle'); ?>

    <div class="seo-content">
      <h2>O que são juros simples?</h2>
      <p>Os <strong>juros simples</strong> incidem sempre sobre o capital inicial, sem acumular juros sobre juros. São comuns em operações de curto prazo e comparações rápidas de custo financeiro.</p>

      <h3>Fórmula</h3>
      <ul>
        <li><strong>J = C × i × t</strong></li>
        <li><strong>M = C + J</strong></li>
      </ul>

      <h3>Quando usar</h3>
      <p>Use este cálculo para empréstimos simples, simulações rápidas e cenários em que a base de incidência não muda ao longo do período.</p>

      <h3>Exemplos</h3>
      <ul>
        <li>R$ 1.000 a 2% ao mês por 6 meses gera R$ 120 de juros.</li>
        <li>R$ 5.000 a 1,5% ao mês por 12 meses gera R$ 900 de juros.</li>
      </ul>
    </div>

    <div class="related-tools">
      <h2>Ferramentas relacionadas</h2>
      <div class="related-grid">
        <a href="<?= ns_escape(ns_href('/ferramentas/juros-compostos')) ?>" class="related-card"><span class="related-card-icon">📈</span> Juros Compostos</a>
        <a href="<?= ns_escape(ns_href('/ferramentas/simulador-financiamento')) ?>" class="related-card"><span class="related-card-icon">🏠</span> Simulador de Financiamento</a>
        <a href="<?= ns_escape(ns_href('/ferramentas/calculadora-porcentagem')) ?>" class="related-card"><span class="related-card-icon">%</span> Calculadora de Porcentagem</a>
      </div>
    </div>
  </div>
</main>
<script>
  function calcularJurosSimples() {
    const C = parseFloat(document.getElementById('capital').value);
    const i = parseFloat(document.getElementById('taxa').value);
    const t = parseFloat(document.getElementById('periodo').value);

    if (isNaN(C) || isNaN(i) || isNaN(t) || C <= 0 || i <= 0 || t <= 0) {
      alert('Por favor, preencha todos os campos com valores positivos.');
      return;
    }

    const J = C * (i / 100) * t;
    const M = C + J;
    const taxaTotal = i * t;

    document.getElementById('res-capital').textContent = 'R$ ' + fmtBRL(C);
    document.getElementById('res-juros').textContent = 'R$ ' + fmtBRL(J);
    document.getElementById('res-montante').textContent = 'R$ ' + fmtBRL(M);
    document.getElementById('res-taxa-total').textContent = fmtNum(taxaTotal, 2) + '%';
    showResult('resultado');
  }
</script>
<?php ns_render_page_end(); ?>
