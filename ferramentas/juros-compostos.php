<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calculadora de Juros Compostos Online – Grátis | NANOSISTECCK Tools</title>
  <meta name="description" content="Simule o crescimento de investimentos com juros compostos. Veja quanto seu dinheiro vai render com capitalização mensal ou anual. Calculadora gratuita online." />
  <meta name="keywords" content="calculadora juros compostos, calcular juros compostos, montante juros compostos, capitalização composta, rendimento investimento" />
  <meta name="robots" content="index, follow" />
  <link rel="canonical" href="https://tools.nanosistecck.com/ferramentas/juros-compostos.php" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
  <header class="site-header" id="site-header"></header>
  <main>
    <div class="tool-page">
      <nav class="breadcrumb" aria-label="Navegação breadcrumb">
        <a href="../index.php">Início</a>
        <span class="sep">›</span>
        <a href="index-ferramentas.php">Ferramentas</a>
        <span class="sep">›</span>
        <span>Juros Compostos</span>
      </nav>

      <div class="ad-slot ad-slot-leaderboard">📢 Espaço para Anúncio – Google AdSense</div>

      <div class="tool-header">
        <div class="tool-page-icon" style="background:linear-gradient(135deg,#e6f9f4,#b8f0e0)">📈</div>
        <div>
          <h1>Calculadora de Juros Compostos</h1>
          <p>Descubra quanto seu dinheiro vai render com juros compostos. Simule investimentos e calcule o montante final com capitalização mensal ou anual.</p>
          <span class="tag tag-green">Finanças</span>
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
            <input type="number" id="taxa" class="form-control" placeholder="Ex: 1.2" min="0" step="0.01" />
          </div>
          <div class="form-group">
            <label for="periodo">Período (meses)</label>
            <input type="number" id="periodo" class="form-control" placeholder="Ex: 24" min="1" step="1" />
          </div>
          <div class="form-group">
            <label for="aporte">Aporte Mensal (R$) <span style="color:var(--text3);font-weight:400">(opcional)</span></label>
            <input type="number" id="aporte" class="form-control" placeholder="Ex: 200" min="0" step="0.01" />
          </div>
        </div>
        <button class="btn btn-primary btn-block btn-lg" onclick="calcularJurosCompostos()">
          Calcular Juros Compostos
        </button>

        <div class="result-box" id="resultado">
          <div class="result-grid">
            <div class="result-item">
              <div class="label">Montante Final</div>
              <div class="value" id="res-montante" style="color:var(--accent)">—</div>
            </div>
            <div class="result-item">
              <div class="label">Capital Investido</div>
              <div class="value" id="res-capital">—</div>
            </div>
            <div class="result-item">
              <div class="label">Juros Ganhos</div>
              <div class="value" id="res-juros" style="color:var(--primary)">—</div>
            </div>
            <div class="result-item">
              <div class="label">Rendimento Total</div>
              <div class="value" id="res-rendimento">—</div>
            </div>
          </div>
        </div>
      </div>

      <div class="notice notice-info">
        <span>ℹ️</span>
        <span><strong>Fórmula usada:</strong> M = C × (1 + i)ⁿ, onde C = capital, i = taxa mensal, n = meses. Com aportes usa-se a fórmula da série de pagamentos.</span>
      </div>

      <div class="ad-slot ad-slot-rectangle">📢 Espaço para Anúncio – Google AdSense</div>

      <div class="seo-content">
        <h2>O Que São Juros Compostos?</h2>
        <p>
          Os <strong>juros compostos</strong> são calculados sobre o capital acumulado, incluindo os juros de períodos anteriores — o famoso "juros sobre juros". Esse modelo é o mais utilizado em investimentos de médio e longo prazo, como CDB, Tesouro Direto, ações e poupança.
        </p>

        <h3>Fórmula dos Juros Compostos</h3>
        <ul>
          <li><strong>M = C × (1 + i)ⁿ</strong></li>
          <li>M = montante final, C = capital, i = taxa mensal, n = número de períodos</li>
        </ul>

        <h3>Por Que os Juros Compostos são Poderosos?</h3>
        <p>
          Com os juros compostos, o crescimento é <strong>exponencial</strong>: cada mês, os juros incidem sobre um valor maior. Quanto mais tempo deixar o dinheiro investido, maior será o impacto dos juros compostos. Einstein chegou a chamar esse fenômeno de "a oitava maravilha do mundo".
        </p>

        <h3>Exemplos Práticos</h3>
        <ul>
          <li>R$ 1.000 a 1% ao mês por 12 meses → Montante: R$ 1.126,83 (juros: R$ 126,83)</li>
          <li>R$ 1.000 a 1% ao mês por 24 meses → Montante: R$ 1.269,73 (juros: R$ 269,73)</li>
          <li>R$ 1.000 a 1% ao mês por 60 meses → Montante: R$ 1.816,70 (juros: R$ 816,70)</li>
        </ul>
      </div>

      <div class="related-tools">
        <h2>Ferramentas Relacionadas</h2>
        <div class="related-grid">
          <a href="juros-simples.php" class="related-card"><span class="related-card-icon">💰</span> Juros Simples</a>
          <a href="simulador-financiamento.php" class="related-card"><span class="related-card-icon">🏠</span> Simulador de Financiamento</a>
          <a href="calculadora-porcentagem.php" class="related-card"><span class="related-card-icon">%</span> Calculadora de Porcentagem</a>
        </div>
      </div>
    </div>
  </main>
  <footer class="site-footer" id="site-footer"></footer>

  <script src="../js/main.js"></script>
  <script src="../js/layout.js"></script>
  <script>
    function calcularJurosCompostos() {
      const C = parseFloat(document.getElementById('capital').value) || 0;
      const i = parseFloat(document.getElementById('taxa').value) / 100;
      const n = parseInt(document.getElementById('periodo').value);
      const a = parseFloat(document.getElementById('aporte').value) || 0;
      if (C <= 0 && a <= 0) { alert('Informe ao menos o capital inicial ou o aporte mensal.'); return; }
      if (isNaN(i) || i <= 0) { alert('Informe a taxa de juros.'); return; }
      if (isNaN(n) || n <= 0) { alert('Informe o período.'); return; }

      // Montante do capital inicial
      const montanteCapital = C * Math.pow(1 + i, n);
      // Montante dos aportes (fórmula série uniforme de pagamentos)
      let montanteAportes = 0;
      if (a > 0 && i > 0) {
        montanteAportes = a * ((Math.pow(1 + i, n) - 1) / i);
      }
      const M = montanteCapital + montanteAportes;
      const totalInvestido = C + (a * n);
      const juros = M - totalInvestido;
      const rendimento = totalInvestido > 0 ? ((M / totalInvestido - 1) * 100) : 0;

      document.getElementById('res-montante').textContent   = 'R$ ' + fmtBRL(M);
      document.getElementById('res-capital').textContent    = 'R$ ' + fmtBRL(totalInvestido);
      document.getElementById('res-juros').textContent      = 'R$ ' + fmtBRL(juros);
      document.getElementById('res-rendimento').textContent = fmtNum(rendimento, 2) + '%';
      showResult('resultado');
    }
  </script>
</body>
</html>
