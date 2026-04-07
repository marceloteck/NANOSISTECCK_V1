<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Calculadora de Idade Online Grátis: Descubra Anos, Meses, Dias e Próximo Aniversário | NANOSISTECCK Tools</title>
  <meta name="description" content="Calcule sua idade exata em anos, meses, semanas e dias. Descubra quantos dias você já viveu, quanto falta para o próximo aniversário e se já é maior de idade. Ferramenta grátis, rápida e precisa." />
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
  <link rel="canonical" href="https://tools.nanosistecck.com/ferramentas/calculadora-idade.php" />

  <meta property="og:type" content="website" />
  <meta property="og:locale" content="pt_BR" />
  <meta property="og:site_name" content="NANOSISTECCK Tools" />
  <meta property="og:title" content="Calculadora de Idade Online Grátis: Descubra Sua Idade Exata" />
  <meta property="og:description" content="Veja sua idade em anos, meses, dias, semanas, horas e descubra quanto falta para o próximo aniversário." />
  <meta property="og:url" content="https://tools.nanosistecck.com/ferramentas/calculadora-idade.php" />

  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Calculadora de Idade Online Grátis" />
  <meta name="twitter:description" content="Calcule sua idade exata e veja seu próximo aniversário com precisão." />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../css/style.css" />

  <style>
    .age-hero {
      display: grid;
      grid-template-columns: 1.15fr .85fr;
      gap: 1.5rem;
      align-items: stretch;
      margin-bottom: 1.5rem;
    }
    .age-hero-card,
    .age-info-card,
    .tool-box-premium,
    .content-card,
    .faq-card,
    .mini-card {
      background: #fff;
      border: 1px solid rgba(20, 20, 20, 0.08);
      border-radius: 22px;
      box-shadow: 0 10px 30px rgba(20, 20, 20, 0.05);
    }
    .age-hero-card {
      padding: 1.5rem;
      background: linear-gradient(135deg, #fff8ff 0%, #ffffff 50%, #f8fbff 100%);
    }
    .age-hero-card h1 {
      margin: 0 0 .75rem;
      font-size: clamp(1.9rem, 4vw, 2.8rem);
      line-height: 1.08;
      letter-spacing: -0.03em;
    }
    .age-hero-card p {
      margin: 0 0 1rem;
      color: var(--text2);
      font-size: 1.02rem;
      line-height: 1.75;
    }
    .hero-badges {
      display: flex;
      flex-wrap: wrap;
      gap: .6rem;
      margin-top: 1rem;
    }
    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: .4rem;
      padding: .55rem .85rem;
      border-radius: 999px;
      font-size: .92rem;
      font-weight: 700;
      background: #f7f7fb;
      color: #222;
      border: 1px solid rgba(20,20,20,.08);
    }
    .age-info-card {
      padding: 1.3rem;
      display: grid;
      gap: .9rem;
    }
    .mini-card {
      padding: 1rem;
      background: linear-gradient(135deg, #f8faff 0%, #ffffff 100%);
    }
    .mini-card .mini-label {
      font-size: .84rem;
      color: var(--text2);
      margin-bottom: .35rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: .04em;
    }
    .mini-card .mini-value {
      font-size: 1.15rem;
      font-weight: 800;
      color: var(--text);
    }
    .tool-box-premium {
      padding: 1.5rem;
      margin-bottom: 1.5rem;
    }
    .tool-box-premium .section-title {
      margin: 0 0 .35rem;
      font-size: 1.2rem;
    }
    .tool-box-premium .section-subtitle {
      margin: 0 0 1.25rem;
      color: var(--text2);
      line-height: 1.7;
    }
    .form-grid-3 {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      gap: 1rem;
    }
    .helper-text {
      font-size: .92rem;
      line-height: 1.6;
      color: var(--text2);
      margin-top: .5rem;
    }
    .form-actions {
      display: flex;
      flex-wrap: wrap;
      gap: .75rem;
      margin-top: 1rem;
    }
    .btn-secondary-soft {
      border: 1px solid rgba(20,20,20,.12);
      background: #fff;
      color: var(--text);
      font-weight: 700;
      border-radius: 14px;
      padding: .95rem 1.1rem;
      cursor: pointer;
    }
    .validation-box,
    .insight-box {
      margin-top: 1rem;
      border-radius: 16px;
      padding: 1rem 1rem;
      font-size: .96rem;
      line-height: 1.7;
      display: none;
    }
    .validation-box.error {
      display: block;
      background: #fff4f4;
      color: #9a1f1f;
      border: 1px solid rgba(154,31,31,.14);
    }
    .validation-box.success {
      display: block;
      background: #f3fff8;
      color: #17663d;
      border: 1px solid rgba(23,102,61,.14);
    }
    .result-box-premium {
      display: none;
      margin-top: 1.35rem;
      border-top: 1px solid rgba(20,20,20,.08);
      padding-top: 1.35rem;
    }
    .result-summary {
      display: grid;
      grid-template-columns: 1.1fr .9fr;
      gap: 1rem;
      margin-bottom: 1rem;
    }
    .result-highlight {
      background: linear-gradient(135deg, #f7efff 0%, #ffffff 100%);
      border: 1px solid rgba(20,20,20,.08);
      border-radius: 18px;
      padding: 1.2rem;
    }
    .result-highlight h2 {
      margin: 0 0 .5rem;
      font-size: 1.1rem;
    }
    .result-highlight .big-age {
      font-size: clamp(1.7rem, 4vw, 2.5rem);
      font-weight: 900;
      color: var(--primary);
      letter-spacing: -0.03em;
      margin-bottom: .5rem;
    }
    .result-highlight p {
      margin: 0;
      color: var(--text2);
      line-height: 1.75;
    }
    .result-grid-premium {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: .9rem;
      margin-bottom: 1rem;
    }
    .result-item-premium {
      border: 1px solid rgba(20,20,20,.08);
      border-radius: 18px;
      padding: 1rem;
      background: #fff;
    }
    .result-item-premium .label {
      font-size: .82rem;
      color: var(--text2);
      margin-bottom: .4rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: .04em;
    }
    .result-item-premium .value {
      font-size: 1.25rem;
      font-weight: 800;
      color: var(--text);
      line-height: 1.2;
    }
    .insight-box {
      display: block;
      background: #f8fbff;
      border: 1px solid rgba(20,20,20,.08);
      color: var(--text);
    }
    .content-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1rem;
      margin: 1.5rem 0;
    }
    .content-card,
    .faq-card {
      padding: 1.25rem;
    }
    .content-card h2,
    .faq-card h2 {
      margin-top: 0;
      font-size: 1.15rem;
    }
    .content-card p,
    .content-card li,
    .faq-card p {
      color: var(--text2);
      line-height: 1.8;
    }
    .faq-item + .faq-item {
      margin-top: 1rem;
      padding-top: 1rem;
      border-top: 1px solid rgba(20,20,20,.08);
    }
    .faq-item h3 {
      margin: 0 0 .45rem;
      font-size: 1rem;
    }
    .trust-note {
      margin-top: 1rem;
      padding: .95rem 1rem;
      border-radius: 14px;
      background: #f7f7fb;
      color: var(--text2);
      font-size: .94rem;
      line-height: 1.7;
    }
    .ad-slot {
      margin: 1.5rem 0;
    }
    @media (max-width: 992px) {
      .age-hero,
      .result-summary,
      .content-grid,
      .form-grid-3,
      .result-grid-premium {
        grid-template-columns: 1fr;
      }
    }
  </style>

  <script type="application/ld+json">
  {
    "@context":"https://schema.org",
    "@type":"WebApplication",
    "name":"Calculadora de Idade Online",
    "applicationCategory":"UtilitiesApplication",
    "operatingSystem":"Web",
    "isAccessibleForFree":true,
    "url":"https://tools.nanosistecck.com/ferramentas/calculadora-idade.php",
    "description":"Ferramenta online gratuita para calcular idade exata em anos, meses, semanas e dias, além de informar o próximo aniversário e quantos dias faltam."
  }
  </script>

  <script type="application/ld+json">
  {
    "@context":"https://schema.org",
    "@type":"BreadcrumbList",
    "itemListElement":[
      {"@type":"ListItem","position":1,"name":"Início","item":"https://tools.nanosistecck.com/"},
      {"@type":"ListItem","position":2,"name":"Ferramentas","item":"https://tools.nanosistecck.com/ferramentas/"},
      {"@type":"ListItem","position":3,"name":"Calculadora de Idade","item":"https://tools.nanosistecck.com/ferramentas/calculadora-idade.php"}
    ]
  }
  </script>

  <script type="application/ld+json">
  {
    "@context":"https://schema.org",
    "@type":"FAQPage",
    "mainEntity":[
      {
        "@type":"Question",
        "name":"Como calcular a idade exata?",
        "acceptedAnswer":{
          "@type":"Answer",
          "text":"A idade exata é calculada comparando a data de nascimento com uma data de referência, levando em conta anos completos, meses, dias e anos bissextos."
        }
      },
      {
        "@type":"Question",
        "name":"Quem nasceu em 29 de fevereiro pode usar a calculadora?",
        "acceptedAnswer":{
          "@type":"Answer",
          "text":"Sim. A ferramenta considera anos bissextos e ajusta o próximo aniversário para datas válidas quando necessário."
        }
      },
      {
        "@type":"Question",
        "name":"A calculadora serve para saber se alguém é maior de idade?",
        "acceptedAnswer":{
          "@type":"Answer",
          "text":"Sim. Além da idade completa, a página informa de forma clara se a pessoa já atingiu 18 anos na data de referência escolhida."
        }
      }
    ]
  }
  </script>
</head>
<body>
  <header class="site-header" id="site-header"></header>

  <main>
    <div class="tool-page">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="../index.php">Início</a><span class="sep">›</span>
        <a href="index-ferramentas.php">Ferramentas</a><span class="sep">›</span>
        <span>Calculadora de Idade</span>
      </nav>

      <section class="age-hero">
        <div class="age-hero-card">
          <h1>Calculadora de Idade Online com Resultado Exato</h1>
          <p>
            Descubra sua idade exata em <strong>anos, meses, semanas, dias e horas</strong>.
            Veja também <strong>quantos dias você já viveu</strong>, quando será seu
            <strong>próximo aniversário</strong> e se você já é <strong>maior de idade</strong>.
          </p>
          <div class="hero-badges">
            <span class="hero-badge">🎯 Resultado detalhado</span>
            <span class="hero-badge">📅 Considera anos bissextos</span>
            <span class="hero-badge">⚡ Cálculo instantâneo</span>
            <span class="hero-badge">🆓 100% grátis</span>
          </div>
        </div>

        <aside class="age-info-card" aria-label="Destaques da ferramenta">
          <div class="mini-card">
            <div class="mini-label">Ideal para</div>
            <div class="mini-value">cadastros, curiosidade, maioridade e documentos</div>
          </div>
          <div class="mini-card">
            <div class="mini-label">Você descobre</div>
            <div class="mini-value">idade completa, próximos aniversários e tempo vivido</div>
          </div>
          <div class="mini-card">
            <div class="mini-label">Diferencial</div>
            <div class="mini-value">explicação clara do resultado, sem cálculo genérico</div>
          </div>
        </aside>
      </section>

      <section class="tool-box-premium" aria-labelledby="titulo-calculo">
        <h2 id="titulo-calculo" class="section-title">Calcule sua idade com precisão</h2>
        <p class="section-subtitle">
          Preencha sua data de nascimento e, se quiser, escolha uma data de referência.
          Isso é útil para descobrir a idade em uma data específica, como matrícula, concurso,
          contrato, processo seletivo ou emissão de documento.
        </p>

        <div class="form-grid-3">
          <div class="form-group">
            <label for="nasc">Data de nascimento</label>
            <input type="date" id="nasc" class="form-control" max="" />
            <div class="helper-text">Informe a data real de nascimento para calcular a idade completa.</div>
          </div>

          <div class="form-group">
            <label for="ref">Data de referência</label>
            <input type="date" id="ref" class="form-control" />
            <div class="helper-text">Por padrão, usamos a data de hoje. Você pode alterar para qualquer data futura ou passada.</div>
          </div>

          <div class="form-group">
            <label for="modo">Objetivo do cálculo</label>
            <select id="modo" class="form-control">
              <option value="completo">Resultado completo</option>
              <option value="maioridade">Verificar maioridade</option>
              <option value="aniversario">Ver próximo aniversário</option>
              <option value="documentos">Uso em cadastro e documentos</option>
            </select>
            <div class="helper-text">Esse campo personaliza a interpretação final do resultado.</div>
          </div>
        </div>

        <div class="form-actions">
          <button class="btn btn-primary btn-lg" type="button" onclick="calcularIdadePremium()">
            Calcular idade agora
          </button>
          <button class="btn-secondary-soft" type="button" onclick="preencherExemplo()">
            Testar com exemplo
          </button>
          <button class="btn-secondary-soft" type="button" onclick="limparFormulario()">
            Limpar dados
          </button>
        </div>

        <div id="validationBox" class="validation-box" role="alert" aria-live="polite"></div>

        <div id="resultadoPremium" class="result-box-premium" aria-live="polite">
          <div class="result-summary">
            <div class="result-highlight">
              <h2>Resumo da sua idade</h2>
              <div class="big-age" id="resumoPrincipal">—</div>
              <p id="resumoSecundario">
                Preencha os campos acima para visualizar uma interpretação clara, precisa e útil.
              </p>
            </div>

            <div class="result-highlight">
              <h2>Próximo aniversário</h2>
              <div class="big-age" id="proximoAniversarioResumo">—</div>
              <p id="textoProximoAniversario">
                Vamos mostrar aqui a próxima data de aniversário e quanto tempo falta até ela.
              </p>
            </div>
          </div>

          <div class="result-grid-premium">
            <div class="result-item-premium">
              <div class="label">Anos completos</div>
              <div class="value" id="resAnos">—</div>
            </div>
            <div class="result-item-premium">
              <div class="label">Meses totais</div>
              <div class="value" id="resMesesTotais">—</div>
            </div>
            <div class="result-item-premium">
              <div class="label">Semanas vividas</div>
              <div class="value" id="resSemanas">—</div>
            </div>
            <div class="result-item-premium">
              <div class="label">Dias vividos</div>
              <div class="value" id="resDias">—</div>
            </div>

            <div class="result-item-premium">
              <div class="label">Horas aproximadas</div>
              <div class="value" id="resHoras">—</div>
            </div>
            <div class="result-item-premium">
              <div class="label">Idade detalhada</div>
              <div class="value" id="resDetalhada">—</div>
            </div>
            <div class="result-item-premium">
              <div class="label">Maior de idade?</div>
              <div class="value" id="resMaioridade">—</div>
            </div>
            <div class="result-item-premium">
              <div class="label">Próximo aniversário em</div>
              <div class="value" id="resDiasAniversario">—</div>
            </div>
          </div>

          <div class="insight-box" id="insightBox">
            <strong>Leitura do resultado:</strong>
            <span id="insightText">—</span>
          </div>

          <div class="trust-note">
            <strong>Como calculamos:</strong> comparamos a data de nascimento com a data de referência,
            considerando anos, meses e dias reais do calendário, inclusive anos bissextos.
            O resultado é informativo e útil para rotina, cadastro, curiosidade e conferência pessoal.
          </div>
        </div>
      </section>

      <div class="content-grid">
        <section class="content-card">
          <h2>Para que serve uma calculadora de idade?</h2>
          <p>
            Essa ferramenta é útil para descobrir a idade correta em processos de matrícula, formulários,
            concursos, contratos, seguros, cadastros, exames e também para simples conferência pessoal.
            Em vez de fazer contas manuais, você obtém um resultado exato com interpretação imediata.
          </p>
          <p>
            Ao contrário de uma página genérica, aqui você vê não só a idade em anos, mas também meses totais,
            dias vividos, semanas aproximadas, se já atingiu a maioridade e quando será o próximo aniversário.
          </p>
        </section>

        <section class="content-card">
          <h2>Quando usar esta ferramenta</h2>
          <ul>
            <li>Descobrir sua idade exata em uma data específica</li>
            <li>Verificar se uma pessoa já completou 18 anos</li>
            <li>Conferir idade para cadastro, escola, concurso ou contrato</li>
            <li>Calcular a idade de bebês e crianças com mais precisão</li>
            <li>Saber quantos dias faltam para o próximo aniversário</li>
            <li>Matar a curiosidade sobre quantos dias de vida você já viveu</li>
          </ul>
        </section>
      </div>

      <div class="ad-slot ad-slot-rectangle" aria-label="Espaço publicitário">
        📢 Espaço para Anúncio – Google AdSense
      </div>

      <div class="content-grid">
        <section class="content-card">
          <h2>O que esta calculadora faz melhor</h2>
          <p>
            Muitas calculadoras de idade mostram apenas “X anos”. Isso é pouco. Nesta versão, o foco é oferecer
            uma resposta mais rica, confiável e útil para o usuário. Por isso, a ferramenta entrega:
          </p>
          <ul>
            <li>idade completa em anos, meses e dias;</li>
            <li>tempo total vivido em dias, semanas e horas;</li>
            <li>próximo aniversário com contagem regressiva;</li>
            <li>interpretação contextual do resultado;</li>
            <li>tratamento de datas especiais, como anos bissextos.</li>
          </ul>
        </section>

        <section class="content-card">
          <h2>Limitações importantes</h2>
          <p>
            O resultado é excelente para uso geral, curiosidade e apoio em cadastros, mas não substitui regras
            legais específicas de editais, contratos ou sistemas oficiais que possam usar critérios próprios de corte.
          </p>
          <p>
            Se a sua necessidade for jurídica, administrativa ou contratual, confira sempre a regra do órgão,
            empresa ou edital responsável.
          </p>
        </section>
      </div>

      <section class="faq-card">
        <h2>Perguntas frequentes</h2>

        <div class="faq-item">
          <h3>Como a calculadora de idade funciona?</h3>
          <p>
            Ela compara a data de nascimento com a data de referência escolhida e calcula o tempo decorrido
            usando o calendário real, em vez de fazer aproximações genéricas.
          </p>
        </div>

        <div class="faq-item">
          <h3>Posso calcular a idade em uma data passada ou futura?</h3>
          <p>
            Sim. Basta alterar a data de referência. Isso é útil para descobrir idade em dia de prova,
            matrícula, contratação, aposentadoria ou qualquer outro marco.
          </p>
        </div>

        <div class="faq-item">
          <h3>Quem nasceu em 29 de fevereiro pode usar?</h3>
          <p>
            Sim. A ferramenta trata corretamente datas de ano bissexto e ajusta o próximo aniversário
            para uma data válida.
          </p>
        </div>

        <div class="faq-item">
          <h3>Esta calculadora serve para descobrir se alguém é maior de idade?</h3>
          <p>
            Sim. O resultado mostra claramente se a pessoa já completou 18 anos na data de referência informada.
          </p>
        </div>
      </section>

      <div class="related-tools">
        <h2>Ferramentas relacionadas</h2>
        <div class="related-grid">
          <a href="calculadora-porcentagem.php" class="related-card"><span class="related-card-icon">%</span> Calculadora de Porcentagem</a>
          <a href="contador-caracteres.php" class="related-card"><span class="related-card-icon">🔢</span> Contador de Caracteres</a>
          <a href="calculadora-dias-entre-datas.php" class="related-card"><span class="related-card-icon">📆</span> Dias Entre Datas</a>
        </div>
      </div>
    </div>
  </main>

  <footer class="site-footer" id="site-footer"></footer>

  <script src="../js/main.js"></script>
  <script src="../js/layout.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const hoje = new Date();
      const hojeStr = formatInputDate(hoje);
      document.getElementById('ref').value = hojeStr;
      document.getElementById('nasc').setAttribute('max', hojeStr);
    });

    function formatInputDate(date) {
      const year = date.getFullYear();
      const month = String(date.getMonth() + 1).padStart(2, '0');
      const day = String(date.getDate()).padStart(2, '0');
      return `${year}-${month}-${day}`;
    }

    function formatDateBR(date) {
      return new Intl.DateTimeFormat('pt-BR', {
        day: '2-digit',
        month: 'long',
        year: 'numeric'
      }).format(date);
    }

    function showValidation(message, type = 'error') {
      const box = document.getElementById('validationBox');
      box.className = `validation-box ${type}`;
      box.textContent = message;
    }

    function clearValidation() {
      const box = document.getElementById('validationBox');
      box.className = 'validation-box';
      box.textContent = '';
    }

    function preencherExemplo() {
      document.getElementById('nasc').value = '1995-08-17';
      document.getElementById('ref').value = formatInputDate(new Date());
      document.getElementById('modo').value = 'completo';
      calcularIdadePremium();
    }

    function limparFormulario() {
      document.getElementById('nasc').value = '';
      document.getElementById('ref').value = formatInputDate(new Date());
      document.getElementById('modo').value = 'completo';
      clearValidation();
      document.getElementById('resultadoPremium').style.display = 'none';
    }

    function parseDateFromInput(value) {
      if (!value) return null;
      const parts = value.split('-').map(Number);
      if (parts.length !== 3) return null;
      return new Date(parts[0], parts[1] - 1, parts[2], 12, 0, 0);
    }

    function isLeapYear(year) {
      return (year % 4 === 0 && year % 100 !== 0) || (year % 400 === 0);
    }

    function getSafeBirthday(year, birthMonth, birthDay) {
      if (birthMonth === 1 && birthDay === 29 && !isLeapYear(year)) {
        return new Date(year, 1, 28, 12, 0, 0);
      }
      return new Date(year, birthMonth, birthDay, 12, 0, 0);
    }

    function diffYMD(start, end) {
      let years = end.getFullYear() - start.getFullYear();
      let months = end.getMonth() - start.getMonth();
      let days = end.getDate() - start.getDate();

      if (days < 0) {
        months--;
        const previousMonthLastDay = new Date(end.getFullYear(), end.getMonth(), 0).getDate();
        days += previousMonthLastDay;
      }

      if (months < 0) {
        years--;
        months += 12;
      }

      return { years, months, days };
    }

    function calcularIdadePremium() {
      clearValidation();

      const nasc = parseDateFromInput(document.getElementById('nasc').value);
      const ref = parseDateFromInput(document.getElementById('ref').value);
      const modo = document.getElementById('modo').value;

      if (!nasc || !ref) {
        showValidation('Preencha a data de nascimento e a data de referência para continuar.');
        return;
      }

      if (nasc > ref) {
        showValidation('A data de nascimento não pode ser posterior à data de referência.');
        return;
      }

      const age = diffYMD(nasc, ref);
      const diffMs = ref.getTime() - nasc.getTime();
      const totalDays = Math.floor(diffMs / 86400000);
      const totalWeeks = Math.floor(totalDays / 7);
      const totalHours = Math.floor(diffMs / 3600000);
      const totalMonths = age.years * 12 + age.months;
      const isAdult = age.years >= 18;

      let nextBirthday = getSafeBirthday(ref.getFullYear(), nasc.getMonth(), nasc.getDate());
      if (nextBirthday < ref || formatInputDate(nextBirthday) === formatInputDate(ref)) {
        nextBirthday = getSafeBirthday(ref.getFullYear() + 1, nasc.getMonth(), nasc.getDate());
      }
      const daysToBirthday = Math.ceil((nextBirthday.getTime() - ref.getTime()) / 86400000);

      const resumoPrincipal = `${age.years} ano${age.years !== 1 ? 's' : ''}, ${age.months} ${age.months === 1 ? 'mês' : 'meses'} e ${age.days} dia${age.days !== 1 ? 's' : ''}`;
      const proximoAnivTexto = formatDateBR(nextBirthday);

      let insight = '';
      if (modo === 'maioridade') {
        insight = isAdult
          ? 'Na data informada, a pessoa já atingiu a maioridade civil. Isso ajuda em verificações rápidas para cadastros, contratos e conferências pessoais.'
          : 'Na data informada, a pessoa ainda não atingiu 18 anos completos. Se o objetivo for cadastro ou regra legal, confira também os critérios específicos do sistema ou edital.';
      } else if (modo === 'aniversario') {
        insight = daysToBirthday === 0
          ? 'Hoje é a data de aniversário na referência informada. Ótimo momento para alertas, mensagens, campanhas e lembretes.'
          : `Faltam ${daysToBirthday} dia${daysToBirthday !== 1 ? 's' : ''} para o próximo aniversário. Esse dado é útil para planejamento de lembretes, ações de CRM e comunicação personalizada.`;
      } else if (modo === 'documentos') {
        insight = 'Esse formato de resultado é útil para preencher formulários, conferir idade em matrículas, documentos, fichas e cadastros. Ainda assim, em situações oficiais, confirme a regra específica da instituição.';
      } else {
        insight = `Você já viveu aproximadamente ${totalDays.toLocaleString('pt-BR')} dias e ${totalHours.toLocaleString('pt-BR')} horas até a data de referência escolhida. É um resultado completo, claro e útil para uso pessoal e administrativo.`;
      }

      let resumoSecundario = '';
      if (daysToBirthday === 0) {
        resumoSecundario = 'Hoje é o seu aniversário na data de referência escolhida. Parabéns!';
      } else if (daysToBirthday <= 7) {
        resumoSecundario = `Seu próximo aniversário está muito perto: faltam apenas ${daysToBirthday} dia${daysToBirthday !== 1 ? 's' : ''}.`;
      } else {
        resumoSecundario = `Na data analisada, sua idade completa é de ${resumoPrincipal}.`;
      }

      document.getElementById('resumoPrincipal').textContent = resumoPrincipal;
      document.getElementById('resumoSecundario').textContent = resumoSecundario;
      document.getElementById('proximoAniversarioResumo').textContent = proximoAnivTexto;
      document.getElementById('textoProximoAniversario').textContent =
        daysToBirthday === 0
          ? 'A data de referência coincide com o aniversário.'
          : `Faltam ${daysToBirthday} dia${daysToBirthday !== 1 ? 's' : ''} para o próximo aniversário.`;

      document.getElementById('resAnos').textContent = `${age.years} ano${age.years !== 1 ? 's' : ''}`;
      document.getElementById('resMesesTotais').textContent = `${totalMonths.toLocaleString('pt-BR')} meses`;
      document.getElementById('resSemanas').textContent = `${totalWeeks.toLocaleString('pt-BR')} semanas`;
      document.getElementById('resDias').textContent = `${totalDays.toLocaleString('pt-BR')} dias`;
      document.getElementById('resHoras').textContent = `${totalHours.toLocaleString('pt-BR')} horas`;
      document.getElementById('resDetalhada').textContent = resumoPrincipal;
      document.getElementById('resMaioridade').textContent = isAdult ? 'Sim' : 'Não';
      document.getElementById('resDiasAniversario').textContent =
        daysToBirthday === 0 ? 'Hoje' : `${daysToBirthday} dia${daysToBirthday !== 1 ? 's' : ''}`;

      document.getElementById('insightText').textContent = insight;
      document.getElementById('resultadoPremium').style.display = 'block';
      showValidation('Cálculo concluído com sucesso.', 'success');

      document.getElementById('resultadoPremium').scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    }
  </script>
</body>
</html>