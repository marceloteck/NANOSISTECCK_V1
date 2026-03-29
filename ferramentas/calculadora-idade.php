<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calculadora de Idade Online – Quantos Anos Tenho? | NANOSISTECCK Tools</title>
  <meta name="description" content="Descubra sua idade exata em anos, meses, dias e horas. Saiba quando é seu próximo aniversário e quantos dias faltam. Calculadora de idade online gratuita." />
  <meta name="keywords" content="calculadora de idade, quantos anos tenho, calcular idade, próximo aniversário, dias para aniversário" />
  <meta name="robots" content="index, follow" />
  <link rel="canonical" href="https://tools.nanosistecck.com/ferramentas/calculadora-idade.php" />
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
        <span>Calculadora de Idade</span>
      </nav>

      <div class="ad-slot ad-slot-leaderboard">📢 Espaço para Anúncio – Google AdSense</div>

      <div class="tool-header">
        <div class="tool-page-icon" style="background:linear-gradient(135deg,#fce8ff,#f0c8ff)">🎂</div>
        <div>
          <h1>Calculadora de Idade</h1>
          <p>Descubra sua idade exata em anos, meses e dias. Saiba também quando é o seu próximo aniversário e quantos dias faltam.</p>
          <span class="tag tag-blue">Datas</span>
        </div>
      </div>

      <div class="tool-box">
        <div class="form-row">
          <div class="form-group">
            <label for="nasc">Data de Nascimento</label>
            <input type="date" id="nasc" class="form-control" />
          </div>
          <div class="form-group">
            <label for="ref">Data de Referência</label>
            <input type="date" id="ref" class="form-control" />
          </div>
        </div>
        <button class="btn btn-primary btn-block btn-lg" onclick="calcularIdade()">
          Calcular Minha Idade
        </button>

        <div class="result-box" id="resultado">
          <div class="result-grid">
            <div class="result-item">
              <div class="label">Anos Completos</div>
              <div class="value" id="res-anos" style="color:var(--primary)">—</div>
            </div>
            <div class="result-item">
              <div class="label">Meses Completos</div>
              <div class="value" id="res-meses">—</div>
            </div>
            <div class="result-item">
              <div class="label">Dias Totais Vividos</div>
              <div class="value" id="res-dias">—</div>
            </div>
            <div class="result-item">
              <div class="label">Próximo Aniversário</div>
              <div class="value" id="res-prox" style="color:var(--accent)">—</div>
            </div>
          </div>
          <div id="res-msg" style="margin-top:1rem;font-size:.95rem;color:var(--text2);text-align:center;font-weight:600;"></div>
        </div>
      </div>

      <div class="ad-slot ad-slot-rectangle">📢 Espaço para Anúncio – Google AdSense</div>

      <div class="seo-content">
        <h2>Como Calcular Sua Idade Exata</h2>
        <p>
          Nossa <strong>calculadora de idade online</strong> descobre sua idade precisa em anos, meses e dias com base na data de nascimento. Além disso, informa quantos dias faltam para o seu próximo aniversário.
        </p>
        <h3>Para Que Serve a Calculadora de Idade?</h3>
        <ul>
          <li>Descobrir a idade exata para cadastros e formulários</li>
          <li>Calcular a idade de crianças em meses e dias</li>
          <li>Saber quantos dias faltam para o aniversário</li>
          <li>Verificar se alguém é maior de idade</li>
          <li>Curiosidades sobre quantos dias você já viveu</li>
        </ul>
        <h3>Curiosidades sobre Idades</h3>
        <ul>
          <li>Uma pessoa de 30 anos viveu aproximadamente 10.950 dias</li>
          <li>Uma pessoa de 40 anos viveu aproximadamente 14.600 dias</li>
          <li>Quem nasce no dia 29 de fevereiro comemora aniversário oficial a cada 4 anos</li>
        </ul>
      </div>

      <div class="related-tools">
        <h2>Ferramentas Relacionadas</h2>
        <div class="related-grid">
          <a href="calculadora-porcentagem.php" class="related-card"><span class="related-card-icon">%</span> Porcentagem</a>
          <a href="contador-caracteres.php" class="related-card"><span class="related-card-icon">🔢</span> Contador de Caracteres</a>
          <a href="gerador-nomes.php" class="related-card"><span class="related-card-icon">👤</span> Gerador de Nomes</a>
        </div>
      </div>
    </div>
  </main>
  <footer class="site-footer" id="site-footer"></footer>

  <script src="../js/main.js"></script>
  <script src="../js/layout.js"></script>
  <script>
    // Pré-preencher data de referência com hoje
    document.addEventListener('DOMContentLoaded', function () {
      const hoje = new Date().toISOString().split('T')[0];
      document.getElementById('ref').value = hoje;
    });

    function calcularIdade() {
      const nasc = new Date(document.getElementById('nasc').value + 'T00:00:00');
      const ref  = new Date(document.getElementById('ref').value  + 'T00:00:00');
      if (isNaN(nasc.getTime()) || isNaN(ref.getTime())) { alert('Informe as duas datas.'); return; }
      if (nasc >= ref) { alert('A data de nascimento deve ser anterior à data de referência.'); return; }

      // Anos
      let anos = ref.getFullYear() - nasc.getFullYear();
      let mAno = ref.getMonth() - nasc.getMonth();
      let dAno = ref.getDate() - nasc.getDate();
      if (dAno < 0) mAno--;
      if (mAno < 0) { anos--; mAno += 12; }

      // Dias totais
      const diffMs = ref - nasc;
      const diasTotais = Math.floor(diffMs / (1000 * 60 * 60 * 24));
      const mesesTotais = anos * 12 + mAno;

      // Próximo aniversário
      let proxAniv = new Date(ref.getFullYear(), nasc.getMonth(), nasc.getDate());
      if (proxAniv <= ref) proxAniv.setFullYear(proxAniv.getFullYear() + 1);
      const diasParaAniv = Math.ceil((proxAniv - ref) / (1000 * 60 * 60 * 24));
      const mesesNomes = ['jan','fev','mar','abr','mai','jun','jul','ago','set','out','nov','dez'];
      const proxStr = `${proxAniv.getDate()} de ${mesesNomes[proxAniv.getMonth()]} (${diasParaAniv} dias)`;

      document.getElementById('res-anos').textContent   = anos + ' anos';
      document.getElementById('res-meses').textContent  = mesesTotais + ' meses';
      document.getElementById('res-dias').textContent   = diasTotais.toLocaleString('pt-BR') + ' dias';
      document.getElementById('res-prox').textContent   = proxStr;

      const msg = diasParaAniv === 0
        ? '🎉 Feliz Aniversário!'
        : diasParaAniv <= 7
        ? `🎂 Seu aniversário está chegando! Faltam apenas ${diasParaAniv} dia(s).`
        : `Você tem ${anos} anos, ${mAno} meses e ${Math.abs(dAno < 0 ? dAno + 30 : dAno)} dias de vida.`;
      document.getElementById('res-msg').textContent = msg;
      showResult('resultado');
    }
  </script>
</body>
</html>
