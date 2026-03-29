<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calculadora de Juros Simples Online – Grátis | NANOSISTECCK Tools</title>
  <meta name="description" content="Calcule juros simples online de forma rápida e gratuita. Insira capital, taxa e período e descubra o montante final, os juros totais e o valor futuro." />
  <meta name="keywords" content="calculadora juros simples, calcular juros simples online, fórmula juros simples, montante juros simples" />
  <meta name="robots" content="index, follow" />
  <link rel="canonical" href="https://tools.nanosistecck.com/ferramentas/juros-simples.php" />
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
        <span>Juros Simples</span>
      </nav>

      <div class="ad-slot ad-slot-leaderboard">📢 Espaço para Anúncio – Google AdSense</div>

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
        <span><strong>Fórmula usada:</strong> J = C × i × t &nbsp;|&nbsp; M = C + J, onde C = capital, i = taxa (%), t = tempo (meses)</span>
      </div>

      <div class="ad-slot ad-slot-rectangle">📢 Espaço para Anúncio – Google AdSense</div>

      <div class="seo-content">
        <h2>O Que é Juros Simples?</h2>
        <p>
          Os <strong>juros simples</strong> são calculados sempre sobre o capital inicial (principal), sem levar em conta os juros acumulados de períodos anteriores. São amplamente usados em empréstimos de curto prazo, cheque especial e alguns tipos de financiamento.
        </p>

        <h3>Fórmula dos Juros Simples</h3>
        <p>A fórmula básica para calcular juros simples é:</p>
        <ul>
          <li><strong>J = C × i × t</strong> (Juros = Capital × Taxa × Tempo)</li>
          <li><strong>M = C + J</strong> (Montante = Capital + Juros)</li>
        </ul>

        <h3>Quando Usar Juros Simples?</h3>
        <p>
          Os juros simples são mais comuns em operações de curto prazo. Se você precisa calcular o rendimento de uma aplicação de renda fixa por alguns meses, ou o custo de um empréstimo pessoal com prazo definido, esta calculadora é ideal.
        </p>

        <h3>Diferença entre Juros Simples e Compostos</h3>
        <p>
          Nos juros simples, os juros incidem apenas sobre o capital inicial. Já nos <strong>juros compostos</strong>, os juros de cada período são somados ao capital, gerando "juros sobre juros". Para investimentos longos, os juros compostos geram resultados muito maiores.
        </p>

        <h3>Exemplos Práticos</h3>
        <ul>
          <li>Capital de R$ 1.000, taxa de 2% ao mês por 6 meses → Juros: R$ 120 | Montante: R$ 1.120</li>
          <li>Capital de R$ 5.000, taxa de 1,5% ao mês por 12 meses → Juros: R$ 900 | Montante: R$ 5.900</li>
        </ul>
      </div>

      <div class="related-tools">
        <h2>Ferramentas Relacionadas</h2>
        <div class="related-grid">
          <a href="juros-compostos.php" class="related-card"><span class="related-card-icon">📈</span> Juros Compostos</a>
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
      const taxaTotal = (i * t);
      document.getElementById('res-capital').textContent  = 'R$ ' + fmtBRL(C);
      document.getElementById('res-juros').textContent    = 'R$ ' + fmtBRL(J);
      document.getElementById('res-montante').textContent = 'R$ ' + fmtBRL(M);
      document.getElementById('res-taxa-total').textContent = fmtNum(taxaTotal, 2) + '%';
      showResult('resultado');
    }
  </script>
</body>
</html>
