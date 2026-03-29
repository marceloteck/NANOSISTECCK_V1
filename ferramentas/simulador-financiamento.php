<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Simulador de Financiamento Online – Calcule Parcelas Grátis | NANOSISTECCK Tools</title>
  <meta name="description" content="Simule financiamentos e descubra o valor das parcelas, os juros totais e o custo total do crédito. Sistema Price ou SAC. Calculadora gratuita online." />
  <meta name="keywords" content="simulador financiamento, calcular parcelas financiamento, tabela price, tabela SAC, simulador empréstimo, calculadora parcelas" />
  <meta name="robots" content="index, follow" />
  <link rel="canonical" href="https://tools.nanosistecck.com/ferramentas/simulador-financiamento.php" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
  <header class="site-header" id="site-header"></header>
  <main>
    <div class="tool-page">
      <nav class="breadcrumb">
        <a href="../index.php">Início</a><span class="sep">›</span>
        <a href="index-ferramentas.php">Ferramentas</a><span class="sep">›</span>
        <span>Simulador de Financiamento</span>
      </nav>

      <div class="ad-slot ad-slot-leaderboard">📢 Espaço para Anúncio – Google AdSense</div>

      <div class="tool-header">
        <div class="tool-page-icon" style="background:linear-gradient(135deg,#fff3e8,#ffd8b8)">🏠</div>
        <div>
          <h1>Simulador de Financiamento</h1>
          <p>Descubra o valor das parcelas, os juros totais e o custo total de qualquer financiamento. Suporte para Tabela Price e SAC.</p>
          <span class="tag tag-orange">Finanças</span>
        </div>
      </div>

      <div class="tool-box">
        <div class="form-row">
          <div class="form-group">
            <label for="valor">Valor do Financiamento (R$)</label>
            <input type="number" id="valor" class="form-control" placeholder="Ex: 50000" min="0" step="0.01" />
          </div>
          <div class="form-group">
            <label for="taxa">Taxa de Juros (% ao mês)</label>
            <input type="number" id="taxa" class="form-control" placeholder="Ex: 1.5" min="0" step="0.01" />
          </div>
          <div class="form-group">
            <label for="parcelas">Número de Parcelas</label>
            <input type="number" id="parcelas" class="form-control" placeholder="Ex: 60" min="1" step="1" />
          </div>
          <div class="form-group">
            <label for="sistema">Sistema de Amortização</label>
            <select id="sistema" class="form-control">
              <option value="price">Tabela Price (parcelas fixas)</option>
              <option value="sac">SAC (amortização constante)</option>
            </select>
          </div>
        </div>
        <button class="btn btn-primary btn-block btn-lg" onclick="simularFinanciamento()">
          Simular Financiamento
        </button>

        <div class="result-box" id="resultado">
          <div class="result-grid">
            <div class="result-item">
              <div class="label">Valor Financiado</div>
              <div class="value" id="res-valor">—</div>
            </div>
            <div class="result-item">
              <div class="label">1ª Parcela</div>
              <div class="value" id="res-parcela1" style="color:var(--orange)">—</div>
            </div>
            <div class="result-item">
              <div class="label">Total de Juros</div>
              <div class="value" id="res-juros" style="color:var(--orange)">—</div>
            </div>
            <div class="result-item">
              <div class="label">Custo Total</div>
              <div class="value" id="res-total" style="color:var(--text)">—</div>
            </div>
          </div>
          <div id="res-detalhe" style="margin-top:1rem;font-size:.88rem;color:var(--text2);"></div>
        </div>
      </div>

      <div class="notice notice-info">
        <span>ℹ️</span>
        <span><strong>Price:</strong> parcelas fixas — os juros são maiores no início. <strong>SAC:</strong> amortização fixa — as parcelas diminuem ao longo do tempo.</span>
      </div>

      <div class="ad-slot ad-slot-rectangle">📢 Espaço para Anúncio – Google AdSense</div>

      <div class="seo-content">
        <h2>Como Funciona o Simulador de Financiamento?</h2>
        <p>
          Nosso <strong>simulador de financiamento online</strong> calcula as parcelas, juros totais e custo total do seu crédito de forma rápida e gratuita. Basta informar o valor financiado, a taxa de juros mensal e o número de parcelas.
        </p>
        <h3>Tabela Price vs SAC</h3>
        <p>
          Na <strong>Tabela Price</strong>, todas as parcelas têm o mesmo valor. Os juros são maiores no início e a amortização aumenta ao longo do tempo. Muito usada em financiamentos imobiliários e veículos.
        </p>
        <p>
          No sistema <strong>SAC (Sistema de Amortização Constante)</strong>, a amortização é sempre igual. Os juros diminuem mês a mês, fazendo com que as parcelas sejam decrescentes. O custo total é menor do que na Tabela Price.
        </p>
        <h3>Dicas para Financiar com Inteligência</h3>
        <ul>
          <li>Compare sempre a taxa de juros efetiva (CET – Custo Efetivo Total)</li>
          <li>Prefira o SAC se puder arcar com a primeira parcela maior</li>
          <li>Quanto menor o prazo, menores os juros totais pagos</li>
          <li>Amortizações extras reduzem significativamente o custo total</li>
        </ul>
      </div>

      <div class="related-tools">
        <h2>Ferramentas Relacionadas</h2>
        <div class="related-grid">
          <a href="juros-simples.php" class="related-card"><span class="related-card-icon">💰</span> Juros Simples</a>
          <a href="juros-compostos.php" class="related-card"><span class="related-card-icon">📈</span> Juros Compostos</a>
          <a href="calculadora-porcentagem.php" class="related-card"><span class="related-card-icon">%</span> Porcentagem</a>
        </div>
      </div>
    </div>
  </main>
  <footer class="site-footer" id="site-footer"></footer>

  <script src="../js/main.js"></script>
  <script src="../js/layout.js"></script>
  <script>
    function simularFinanciamento() {
      const PV = parseFloat(document.getElementById('valor').value);
      const i  = parseFloat(document.getElementById('taxa').value) / 100;
      const n  = parseInt(document.getElementById('parcelas').value);
      const sistema = document.getElementById('sistema').value;

      if (isNaN(PV) || PV <= 0) { alert('Informe o valor do financiamento.'); return; }
      if (isNaN(i) || i <= 0)  { alert('Informe a taxa de juros.'); return; }
      if (isNaN(n) || n <= 0)  { alert('Informe o número de parcelas.'); return; }

      let parcela1, totalJuros, totalPago, detalhe;

      if (sistema === 'price') {
        // PMT = PV × i / (1 - (1 + i)^-n)
        const PMT = PV * i / (1 - Math.pow(1 + i, -n));
        parcela1   = PMT;
        totalPago  = PMT * n;
        totalJuros = totalPago - PV;
        detalhe    = `Todas as ${n} parcelas têm o mesmo valor de R$ ${fmtBRL(PMT)}.`;
      } else {
        // SAC: amortização = PV/n, juros decrescentes
        const amort = PV / n;
        let saldoDevedor = PV;
        totalJuros = 0;
        for (let k = 1; k <= n; k++) {
          const juro = saldoDevedor * i;
          totalJuros += juro;
          if (k === 1) parcela1 = amort + juro;
          saldoDevedor -= amort;
        }
        const ultimaParcela = amort + (PV / n) * i; // última parcela (menor)
        totalPago = PV + totalJuros;
        detalhe = `1ª parcela: R$ ${fmtBRL(parcela1)} | Última parcela: R$ ${fmtBRL(ultimaParcela)} | Amortização fixa: R$ ${fmtBRL(amort)}`;
      }

      document.getElementById('res-valor').textContent    = 'R$ ' + fmtBRL(PV);
      document.getElementById('res-parcela1').textContent = 'R$ ' + fmtBRL(parcela1);
      document.getElementById('res-juros').textContent    = 'R$ ' + fmtBRL(totalJuros);
      document.getElementById('res-total').textContent    = 'R$ ' + fmtBRL(totalPago);
      document.getElementById('res-detalhe').textContent  = detalhe;
      showResult('resultado');
    }
  </script>
</body>
</html>
