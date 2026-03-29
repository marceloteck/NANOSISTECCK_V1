<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calculadora de Porcentagem Online – Grátis | NANOSISTECCK Tools</title>
  <meta name="description" content="Calcule porcentagens online: desconto, aumento, variação percentual, percentual de um valor e muito mais. Rápido, gratuito e sem cadastro." />
  <meta name="keywords" content="calculadora porcentagem, calcular porcentagem, calcular desconto, calcular aumento percentual, variação percentual online" />
  <meta name="robots" content="index, follow" />
  <link rel="canonical" href="https://tools.nanosistecck.com/ferramentas/calculadora-porcentagem.php" />
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
        <span>Calculadora de Porcentagem</span>
      </nav>

      <div class="ad-slot ad-slot-leaderboard">📢 Espaço para Anúncio – Google AdSense</div>

      <div class="tool-header">
        <div class="tool-page-icon" style="background:linear-gradient(135deg,#fef3e8,#fde0bd);font-size:1.8rem;font-weight:900;color:var(--orange)">%</div>
        <div>
          <h1>Calculadora de Porcentagem</h1>
          <p>Calcule porcentagens, descontos, aumentos e variações de forma simples. Escolha o tipo de cálculo e obtenha o resultado instantâneo.</p>
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

        <div id="campos-dinamicos">
          <!-- campos inseridos via JS -->
        </div>

        <button class="btn btn-primary btn-block btn-lg" onclick="calcularPorcentagem()">
          Calcular
        </button>

        <div class="result-box" id="resultado">
          <div class="result-label">Resultado</div>
          <div class="result-value" id="res-principal">—</div>
          <div id="res-detalhe" style="margin-top:.5rem;font-size:.9rem;color:var(--text2);"></div>
        </div>
      </div>

      <div class="ad-slot ad-slot-rectangle">📢 Espaço para Anúncio – Google AdSense</div>

      <div class="seo-content">
        <h2>Como Calcular Porcentagem Online</h2>
        <p>
          Nossa <strong>calculadora de porcentagem</strong> resolve os principais tipos de cálculos percentuais que você precisa no dia a dia: descobrir X% de um valor, calcular descontos, aumentos de preço ou a variação percentual entre dois números.
        </p>
        <h3>Tipos de Cálculos Disponíveis</h3>
        <ul>
          <li><strong>X% de Y:</strong> Quanto é, por exemplo, 15% de R$ 200? Resposta: R$ 30.</li>
          <li><strong>X é qual % de Y?:</strong> R$ 30 representa que percentual de R$ 200? Resposta: 15%.</li>
          <li><strong>Desconto:</strong> Um produto de R$ 200 com 15% de desconto custa quanto? Resposta: R$ 170.</li>
          <li><strong>Aumento:</strong> Um salário de R$ 2.000 com 10% de aumento vira quanto? Resposta: R$ 2.200.</li>
          <li><strong>Variação:</strong> De R$ 150 para R$ 200 é um aumento de quantos %? Resposta: 33,33%.</li>
        </ul>
        <h3>Fórmulas de Porcentagem</h3>
        <ul>
          <li>Parte = Total × (% / 100)</li>
          <li>Porcentagem = (Parte / Total) × 100</li>
          <li>Variação % = ((Valor Final − Valor Inicial) / Valor Inicial) × 100</li>
        </ul>
      </div>

      <div class="related-tools">
        <h2>Ferramentas Relacionadas</h2>
        <div class="related-grid">
          <a href="juros-simples.php" class="related-card"><span class="related-card-icon">💰</span> Juros Simples</a>
          <a href="juros-compostos.php" class="related-card"><span class="related-card-icon">📈</span> Juros Compostos</a>
          <a href="calculadora-idade.php" class="related-card"><span class="related-card-icon">🎂</span> Calculadora de Idade</a>
        </div>
      </div>
    </div>
  </main>
  <footer class="site-footer" id="site-footer"></footer>

  <script src="../js/main.js"></script>
  <script src="../js/layout.js"></script>
  <script>
    const configs = {
      percentual:      { a: 'Percentual (%)',   b: 'Valor Base (Y)' },
      'quanto-porcento': { a: 'Valor X',        b: 'Valor Total Y' },
      desconto:        { a: 'Desconto (%)',      b: 'Valor Original (R$)' },
      aumento:         { a: 'Aumento (%)',       b: 'Valor Original (R$)' },
      variacao:        { a: 'Valor Inicial',     b: 'Valor Final' },
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
      if (isNaN(a) || isNaN(b)) { alert('Preencha os dois campos.'); return; }
      let principal = '', detalhe = '';

      if (tipo === 'percentual') {
        const r = b * (a / 100);
        principal = 'R$ ' + fmtBRL(r);
        detalhe = `${fmtNum(a,2)}% de ${fmtBRL(b)} = ${fmtBRL(r)}`;
      } else if (tipo === 'quanto-porcento') {
        if (b === 0) { alert('Valor total não pode ser zero.'); return; }
        const r = (a / b) * 100;
        principal = fmtNum(r, 2) + '%';
        detalhe = `${fmtBRL(a)} representa ${fmtNum(r,2)}% de ${fmtBRL(b)}`;
      } else if (tipo === 'desconto') {
        const desc = b * (a / 100);
        const final = b - desc;
        principal = 'R$ ' + fmtBRL(final);
        detalhe = `Desconto de ${fmtNum(a,2)}%: economiza R$ ${fmtBRL(desc)}. Preço final: R$ ${fmtBRL(final)}`;
      } else if (tipo === 'aumento') {
        const aum = b * (a / 100);
        const final = b + aum;
        principal = 'R$ ' + fmtBRL(final);
        detalhe = `Aumento de ${fmtNum(a,2)}%: R$ ${fmtBRL(aum)} a mais. Novo valor: R$ ${fmtBRL(final)}`;
      } else if (tipo === 'variacao') {
        if (a === 0) { alert('Valor inicial não pode ser zero.'); return; }
        const r = ((b - a) / a) * 100;
        principal = fmtNum(r, 2) + '%';
        const tipo_var = r >= 0 ? '📈 Aumento' : '📉 Redução';
        detalhe = `${tipo_var} de ${fmtNum(Math.abs(r),2)}%: de ${fmtBRL(a)} para ${fmtBRL(b)}`;
      }

      document.getElementById('res-principal').textContent = principal;
      document.getElementById('res-detalhe').textContent   = detalhe;
      showResult('resultado');
    }

    // Inicializar
    atualizarCampos();
  </script>
</body>
</html>
