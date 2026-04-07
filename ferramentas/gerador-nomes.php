<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Gerador de Nomes Online Grátis: Personagens, Bebês, Marcas e Empresas | NANOSISTECCK Tools</title>
  <meta name="description" content="Gere nomes aleatórios e criativos para personagens, bebês, marcas, empresas, perfis fictícios, RPG e projetos. Escolha estilo, gênero, quantidade, sobrenome e tema. Ferramenta grátis, rápida e profissional." />
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
  <link rel="canonical" href="https://tools.nanosistecck.com/ferramentas/gerador-nomes.php" />

  <meta property="og:type" content="website" />
  <meta property="og:locale" content="pt_BR" />
  <meta property="og:site_name" content="NANOSISTECCK Tools" />
  <meta property="og:title" content="Gerador de Nomes Online Grátis para Personagens, Marcas e Projetos" />
  <meta property="og:description" content="Crie nomes aleatórios, criativos e prontos para usar em histórias, startups, jogos, perfis e branding." />
  <meta property="og:url" content="https://tools.nanosistecck.com/ferramentas/gerador-nomes.php" />

  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Gerador de Nomes Online Grátis" />
  <meta name="twitter:description" content="Crie nomes para personagens, empresas, marcas e projetos com filtros avançados." />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../css/style.css" />

  <style>
    .name-hero {
      display: grid;
      grid-template-columns: 1.15fr .85fr;
      gap: 1.5rem;
      margin-bottom: 1.5rem;
      align-items: stretch;
    }
    .hero-card,
    .info-card,
    .tool-box-premium,
    .content-card,
    .faq-card,
    .result-card,
    .tip-card {
      background: #fff;
      border: 1px solid rgba(20,20,20,.08);
      border-radius: 22px;
      box-shadow: 0 10px 30px rgba(20,20,20,.05);
    }
    .hero-card {
      padding: 1.5rem;
      background: linear-gradient(135deg, #f3fff6 0%, #ffffff 45%, #f8fbff 100%);
    }
    .hero-card h1 {
      margin: 0 0 .75rem;
      font-size: clamp(1.95rem, 4vw, 2.9rem);
      line-height: 1.05;
      letter-spacing: -0.03em;
    }
    .hero-card p {
      margin: 0 0 1rem;
      color: var(--text2);
      line-height: 1.75;
      font-size: 1.03rem;
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
      gap: .45rem;
      padding: .55rem .85rem;
      border-radius: 999px;
      background: #f7f7fb;
      border: 1px solid rgba(20,20,20,.08);
      font-size: .92rem;
      font-weight: 700;
    }
    .info-card {
      padding: 1.2rem;
      display: grid;
      gap: .9rem;
    }
    .tip-card {
      padding: 1rem;
      background: linear-gradient(135deg, #f8fff9 0%, #ffffff 100%);
    }
    .tip-card .tip-label {
      font-size: .82rem;
      text-transform: uppercase;
      letter-spacing: .04em;
      color: var(--text2);
      font-weight: 700;
      margin-bottom: .35rem;
    }
    .tip-card .tip-value {
      font-size: 1.08rem;
      font-weight: 800;
      line-height: 1.4;
    }

    .tool-box-premium {
      padding: 1.5rem;
      margin-bottom: 1.5rem;
    }
    .tool-box-premium h2 {
      margin-top: 0;
      margin-bottom: .35rem;
      font-size: 1.2rem;
    }
    .tool-box-premium .section-subtitle {
      margin: 0 0 1.25rem;
      color: var(--text2);
      line-height: 1.75;
    }
    .form-grid-4 {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 1rem;
    }
    .helper-text {
      margin-top: .5rem;
      color: var(--text2);
      font-size: .92rem;
      line-height: 1.6;
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

    .validation-box {
      display: none;
      margin-top: 1rem;
      border-radius: 16px;
      padding: 1rem;
      font-size: .96rem;
      line-height: 1.7;
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

    .results-wrapper {
      display: none;
      margin-top: 1.4rem;
      border-top: 1px solid rgba(20,20,20,.08);
      padding-top: 1.4rem;
    }
    .result-header {
      display: grid;
      grid-template-columns: 1.05fr .95fr;
      gap: 1rem;
      margin-bottom: 1rem;
    }
    .result-card {
      padding: 1.2rem;
    }
    .result-card h3 {
      margin-top: 0;
      margin-bottom: .55rem;
      font-size: 1.08rem;
    }
    .result-card p {
      margin: 0;
      color: var(--text2);
      line-height: 1.75;
    }
    .result-big {
      font-size: clamp(1.5rem, 4vw, 2.25rem);
      font-weight: 900;
      color: var(--primary);
      letter-spacing: -0.03em;
      margin-bottom: .45rem;
    }

    .generated-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: .9rem;
      margin-bottom: 1rem;
    }
    .name-card {
      border: 1px solid rgba(20,20,20,.08);
      border-radius: 18px;
      padding: 1rem;
      background: linear-gradient(135deg, #fcfcff 0%, #ffffff 100%);
    }
    .name-card .name-main {
      font-size: 1.1rem;
      font-weight: 800;
      margin-bottom: .4rem;
      color: var(--text);
      line-height: 1.35;
      word-break: break-word;
    }
    .name-card .name-meta {
      font-size: .9rem;
      color: var(--text2);
      line-height: 1.6;
      margin-bottom: .85rem;
    }
    .name-card .name-actions {
      display: flex;
      flex-wrap: wrap;
      gap: .55rem;
    }
    .mini-action-btn {
      border: 1px solid rgba(20,20,20,.1);
      background: #fff;
      border-radius: 12px;
      padding: .6rem .8rem;
      font-size: .88rem;
      font-weight: 700;
      cursor: pointer;
    }

    .insight-box {
      background: #f8fbff;
      border: 1px solid rgba(20,20,20,.08);
      border-radius: 18px;
      padding: 1rem;
      color: var(--text);
      line-height: 1.8;
      margin-bottom: 1rem;
    }

    .history-box {
      border: 1px solid rgba(20,20,20,.08);
      border-radius: 18px;
      padding: 1rem;
      background: #fff;
      margin-top: 1rem;
    }
    .history-box h3 {
      margin-top: 0;
      margin-bottom: .6rem;
    }
    .history-list {
      display: flex;
      flex-wrap: wrap;
      gap: .55rem;
    }
    .history-item {
      padding: .5rem .75rem;
      border-radius: 999px;
      background: #f5f7fb;
      font-size: .9rem;
      font-weight: 700;
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
      .name-hero,
      .result-header,
      .form-grid-4,
      .generated-grid,
      .content-grid {
        grid-template-columns: 1fr;
      }
    }
  </style>

  <script type="application/ld+json">
  {
    "@context":"https://schema.org",
    "@type":"WebApplication",
    "name":"Gerador de Nomes Online",
    "applicationCategory":"UtilitiesApplication",
    "operatingSystem":"Web",
    "isAccessibleForFree":true,
    "url":"https://tools.nanosistecck.com/ferramentas/gerador-nomes.php",
    "description":"Ferramenta online gratuita para gerar nomes aleatórios e criativos para personagens, marcas, empresas, projetos, perfis e histórias."
  }
  </script>

  <script type="application/ld+json">
  {
    "@context":"https://schema.org",
    "@type":"BreadcrumbList",
    "itemListElement":[
      {"@type":"ListItem","position":1,"name":"Início","item":"https://tools.nanosistecck.com/"},
      {"@type":"ListItem","position":2,"name":"Ferramentas","item":"https://tools.nanosistecck.com/ferramentas/"},
      {"@type":"ListItem","position":3,"name":"Gerador de Nomes","item":"https://tools.nanosistecck.com/ferramentas/gerador-nomes.php"}
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
        "name":"Para que serve um gerador de nomes?",
        "acceptedAnswer":{
          "@type":"Answer",
          "text":"Serve para criar nomes de personagens, marcas, startups, perfis, projetos, avatares, usuários fictícios e ideias criativas de forma rápida."
        }
      },
      {
        "@type":"Question",
        "name":"Posso gerar nomes para empresas e marcas?",
        "acceptedAnswer":{
          "@type":"Answer",
          "text":"Sim. A ferramenta possui modos e estilos que ajudam a criar nomes mais curtos, criativos, fortes e memoráveis para branding e projetos."
        }
      },
      {
        "@type":"Question",
        "name":"Os nomes gerados são reais?",
        "acceptedAnswer":{
          "@type":"Answer",
          "text":"Os nomes são combinações automáticas para inspiração e uso criativo. O ideal é sempre validar disponibilidade, contexto cultural e eventual uso comercial."
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
        <span>Gerador de Nomes</span>
      </nav>

      <section class="name-hero">
  <div class="hero-card">
    <h1>Gerador de Nomes Online com Filtros Inteligentes</h1>



  <aside class="info-card" aria-label="Destaques da ferramenta">
    <div class="tip-card">
      <div class="tip-label">Indicado para</div>
      <div class="tip-value">personagens, branding, startups, RPG, perfis de teste e projetos criativos</div>
    </div>

    <div class="tip-card">
      <div class="tip-label">O que você pode gerar</div>
      <div class="tip-value">nomes simples, compostos, fictícios, comerciais e mais memoráveis</div>
    </div>

    <div class="tip-card">
      <div class="tip-label">Diferencial</div>
      <div class="tip-value">resultados com mais contexto, melhor organização e menos aparência genérica</div>
    </div>
  </aside>
</section>

      <section class="tool-box-premium" aria-labelledby="titulo-gerador">
        <h2 id="titulo-gerador">Gere nomes mais úteis e menos genéricos</h2>
        <p class="section-subtitle">
          Escolha o objetivo do nome, o gênero, a quantidade e o estilo desejado.
          Isso ajuda a sair de resultados aleatórios demais e aproxima a ferramenta do uso real.
        </p>

        <div class="form-grid-4">
          <div class="form-group">
            <label for="uso">Finalidade do nome</label>
            <select id="uso" class="form-control">
              <option value="personagem">Personagem / História</option>
              <option value="bebe">Bebê / Inspiração pessoal</option>
              <option value="empresa">Empresa / Marca</option>
              <option value="projeto">Projeto / Produto</option>
              <option value="usuario">Usuário fictício / Teste</option>
              <option value="rpg">RPG / Fantasia leve</option>
            </select>
            <div class="helper-text">A finalidade muda o tom do nome e a interpretação do resultado.</div>
          </div>

          <div class="form-group">
            <label for="genero">Estilo de gênero</label>
            <select id="genero" class="form-control">
              <option value="m">Masculino</option>
              <option value="f">Feminino</option>
              <option value="n">Neutro</option>
              <option value="a" selected>Aleatório</option>
            </select>
            <div class="helper-text">Escolha masculino, feminino, neutro ou mistura aleatória.</div>
          </div>

          <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <select id="quantidade" class="form-control">
              <option value="3">3 nomes</option>
              <option value="6" selected>6 nomes</option>
              <option value="10">10 nomes</option>
              <option value="20">20 nomes</option>
            </select>
            <div class="helper-text">Gere poucos nomes bem selecionados ou uma lista maior para explorar.</div>
          </div>

          <div class="form-group">
            <label for="formato">Formato</label>
            <select id="formato" class="form-control">
              <option value="primeiro">Só primeiro nome</option>
              <option value="completo" selected>Nome e sobrenome</option>
              <option value="duplo">Nome composto</option>
              <option value="marca">Formato curto para marca</option>
            </select>
            <div class="helper-text">O formato ajuda a aproximar o nome do objetivo real.</div>
          </div>

          <div class="form-group">
            <label for="tom">Tom do nome</label>
            <select id="tom" class="form-control">
              <option value="classico">Clássico</option>
              <option value="moderno" selected>Moderno</option>
              <option value="forte">Forte</option>
              <option value="leve">Leve</option>
              <option value="criativo">Criativo</option>
            </select>
            <div class="helper-text">Escolha a sensação que o nome deve transmitir.</div>
          </div>

          <div class="form-group">
            <label for="origem">Estilo cultural</label>
            <select id="origem" class="form-control">
              <option value="br" selected>Brasileiro / Popular</option>
              <option value="mix">Misto / Internacional leve</option>
              <option value="latino">Latino</option>
            </select>
            <div class="helper-text">Ajusta a base de nomes para soar mais familiar ou mais aberta.</div>
          </div>

          <div class="form-group">
            <label for="repeticao">Evitar repetidos?</label>
            <select id="repeticao" class="form-control">
              <option value="sim" selected>Sim</option>
              <option value="nao">Não</option>
            </select>
            <div class="helper-text">Melhora a qualidade da lista gerada em lotes maiores.</div>
          </div>

          <div class="form-group">
            <label for="favorito">Prioridade</label>
            <select id="favorito" class="form-control">
              <option value="equilibrado" selected>Equilibrado</option>
              <option value="curto">Mais curto</option>
              <option value="memoravel">Mais memorável</option>
              <option value="serio">Mais sério</option>
            </select>
            <div class="helper-text">Direciona a geração para nomes com estilo mais útil ao objetivo.</div>
          </div>
        </div>

        <div class="form-actions">
          <button class="btn btn-primary btn-lg" type="button" onclick="gerarNomesPremium()">
            🎲 Gerar nomes agora
          </button>
          <button class="btn-secondary-soft" type="button" onclick="gerarNovamente()">
            🔄 Gerar nova lista
          </button>
          <button class="btn-secondary-soft" type="button" onclick="copiarTodosResultados()">
            📋 Copiar todos
          </button>
          <button class="btn-secondary-soft" type="button" onclick="limparResultados()">
            ✨ Limpar
          </button>
        </div>

        <div id="validationBox" class="validation-box" role="alert" aria-live="polite"></div>

        <div id="resultsWrapper" class="results-wrapper" aria-live="polite">
          <div class="result-header">
            <div class="result-card">
              <h3>Resumo da geração</h3>
              <div class="result-big" id="resultTitle">—</div>
              <p id="resultSummary">
                Aqui você verá um resumo da intenção escolhida, do estilo e do motivo pelo qual essa lista pode funcionar melhor.
              </p>
            </div>

            <div class="result-card">
              <h3>Leitura estratégica</h3>
              <p id="resultInsight">
                Vamos interpretar os nomes gerados para facilitar escolha, branding, personagem ou uso em testes.
              </p>
            </div>
          </div>

          <div class="insight-box">
            <strong>Dica profissional:</strong>
            <span id="proTipText">nomes fortes não são apenas bonitos; eles precisam combinar com contexto, público, memória e utilidade.</span>
          </div>

          <div id="generatedGrid" class="generated-grid"></div>

          <div class="history-box" id="historyBox" style="display:none;">
            <h3>Últimos nomes gerados</h3>
            <div class="history-list" id="historyList"></div>
          </div>

          <div class="trust-note">
            <strong>Importante:</strong> esta ferramenta é excelente para inspiração criativa, prototipagem, histórias,
            naming inicial e perfis de teste. Para uso comercial, jurídico ou registro de marca, valide disponibilidade,
            contexto cultural e possíveis conflitos antes de adotar o nome final.
          </div>
        </div>
      </section>

      <div class="content-grid">
        <section class="content-card">
          <h2>Para que serve um gerador de nomes?</h2>
          <p>
            Um bom gerador de nomes acelera decisões criativas. Ele ajuda a sair do bloqueio inicial e encontrar opções
            úteis para personagens, perfis de teste, usuários fictícios, marcas, startups, livros, campanhas, jogos e projetos.
          </p>
          <p>
            Nesta versão, o objetivo não é apenas “sortear palavras”, mas entregar nomes com mais contexto, leitura de estilo
            e melhor aproveitamento prático.
          </p>
        </section>

        <section class="content-card">
          <h2>Casos de uso mais comuns</h2>
          <ul>
            <li>criar nomes para personagens de livros, romances, séries e RPG;</li>
            <li>gerar nomes para startups, marcas e produtos;</li>
            <li>preencher bases fictícias em sistemas e protótipos;</li>
            <li>criar perfis de usuário para testes e demos;</li>
            <li>buscar ideias para nomes de bebê e inspiração pessoal;</li>
            <li>gerar nicknames, aliases e identidades criativas.</li>
          </ul>
        </section>
      </div>

      <div class="ad-slot ad-slot-rectangle" aria-label="Espaço publicitário">
        📢 Espaço para Anúncio – Google AdSense
      </div>

      <div class="content-grid">
        <section class="content-card">
          <h2>Como escolher um nome melhor</h2>
          <p>
            Um nome bom depende do contexto. Para personagem, ele deve combinar com personalidade, tempo e ambientação.
            Para marca, precisa ser simples, lembrável e transmitir posicionamento. Para usuário fictício, precisa soar natural.
          </p>
          <p>
            Por isso esta ferramenta adiciona filtros de tom, formato e finalidade, evitando resultados genéricos demais.
          </p>
        </section>

        <section class="content-card">
          <h2>O que torna esta página mais útil</h2>
          <p>
            Em vez de entregar apenas uma lista aleatória, esta ferramenta oferece interpretação, histórico local,
            cópia rápida, filtros mais ricos e resultados com maior utilidade prática.
          </p>
          <p>
            Isso aumenta o valor para o usuário, melhora retenção e faz da página algo mais forte para SEO e monetização.
          </p>
        </section>
      </div>

      <section class="faq-card">
        <h2>Perguntas frequentes</h2>

        <div class="faq-item">
          <h3>Posso usar este gerador para criar nome de empresa?</h3>
          <p>
            Sim. O modo de empresa e marca tende a gerar opções mais curtas, fortes e com melhor leitura para branding inicial.
          </p>
        </div>

        <div class="faq-item">
          <h3>Os nomes servem para personagens e histórias?</h3>
          <p>
            Sim. Essa é uma das aplicações mais fortes da ferramenta, especialmente quando você escolhe formato completo,
            tom e finalidade adequados.
          </p>
        </div>

        <div class="faq-item">
          <h3>Os nomes são únicos?</h3>
          <p>
            A ferramenta busca variar as combinações, mas não garante exclusividade absoluta. Para uso comercial ou registro,
            faça verificação complementar.
          </p>
        </div>

        <div class="faq-item">
          <h3>Posso copiar só um nome específico?</h3>
          <p>
            Sim. Cada resultado possui botão individual de cópia, além da opção de copiar a lista inteira.
          </p>
        </div>
      </section>

      <div class="related-tools">
        <h2>Ferramentas relacionadas</h2>
        <div class="related-grid">
          <a href="gerador-senhas.php" class="related-card"><span class="related-card-icon">🔐</span> Gerador de Senhas</a>
          <a href="contador-caracteres.php" class="related-card"><span class="related-card-icon">🔢</span> Contador de Caracteres</a>
          <a href="gerador-bio-instagram.php" class="related-card"><span class="related-card-icon">✨</span> Gerador de Bio</a>
        </div>
      </div>
    </div>
  </main>

  <footer class="site-footer" id="site-footer"></footer>

  <script src="../js/main.js"></script>
  <script src="../js/layout.js"></script>
  <script>
    const maleClassic = ['Lucas','Mateus','Pedro','Gabriel','Rafael','Felipe','Bruno','Eduardo','Henrique','Diego','Rodrigo','Leonardo','Carlos','Miguel','Samuel','Victor','Bernardo','Caio','Gustavo','Nicolas'];
    const femaleClassic = ['Ana','Maria','Júlia','Isabela','Fernanda','Beatriz','Camila','Amanda','Larissa','Natália','Helena','Alice','Carolina','Gabriela','Heloísa','Mariana','Lívia','Juliana','Renata','Elisa'];
    const neutralBase = ['Alex','Noa','Kai','Ariel','Dani','Sam','Loren','Gael','Eli','Nico','Téo','Chris','Mika','Yuri','Éden'];
    const surnamesBR = ['Silva','Santos','Oliveira','Souza','Rodrigues','Ferreira','Alves','Pereira','Lima','Gomes','Costa','Ribeiro','Martins','Carvalho','Almeida','Lopes','Sousa','Fernandes','Vieira','Barbosa','Rocha','Dias','Nascimento','Andrade','Moreira','Nunes','Marques','Machado','Mendes','Freitas'];
    const creativeStarts = ['Neo','Vita','Lume','Alta','Nexa','Brisa','Clari','Lumina','Vera','Astra','Nori','Orbe','Vento','Pulse','Mova'];
    const creativeEnds = ['on','ix','ia','us','fy','ora','ex','ive','up','ly','um','lab','hub','core','flow'];
    const fantasyStarts = ['Elar','Vael','Ther','Lun','Kael','Aerin','Drae','Syl','Nym','Orin','Maev','Tarin','Vey','Zor','Ily'];
    const fantasyEnds = ['ion','ara','eth','or','wyn','iel','an','is','en','or','ith','ael','une','yr','os'];

    let generatedNames = [];
    let generationHistory = [];

    function randomItem(arr) {
      return arr[Math.floor(Math.random() * arr.length)];
    }

    function capitalize(str) {
      return str.charAt(0).toUpperCase() + str.slice(1);
    }

    function makeBrandName(tom, prioridade) {
      let start = randomItem(creativeStarts);
      let end = randomItem(creativeEnds);
      let base = start + end;

      if (tom === 'forte') base = randomItem(['Vortex','Nexor','Altum','Bravix','Coreon','Fortis','Astrix']);
      if (tom === 'leve') base = randomItem(['Lumina','Brisa','Levia','Flora','Claria','Aurea','Nuvia']);
      if (tom === 'classico') base = randomItem(['Alvor','Monte','Prime','Atlas','Vera','Forma','Nobre']);
      if (prioridade === 'curto') base = base.slice(0, Math.min(base.length, 5));
      if (prioridade === 'memoravel') base = base.replace(/(.)\1+/g, '$1');

      return capitalize(base);
    }

    function getPoolByGenero(genero, origem, tom) {
      let malePool = [...maleClassic];
      let femalePool = [...femaleClassic];
      let neutralPool = [...neutralBase];

      if (origem === 'mix') {
        malePool.push('Kevin','Liam','Logan','Noah','Ethan','Ryan');
        femalePool.push('Olivia','Emma','Sophia','Mia','Chloe','Ella');
        neutralPool.push('Taylor','Jordan','Sky','Robin','Quinn');
      }

      if (origem === 'latino') {
        malePool.push('Santiago','Benício','Emilio','Thiago','Joaquim');
        femalePool.push('Valentina','Antonella','Aurora','Elena','Cecília');
      }

      if (tom === 'forte') {
        malePool.push('Augusto','Dante','Enzo','Valentim');
        femalePool.push('Bianca','Aurora','Valentina','Catarina');
      }

      if (tom === 'leve') {
        malePool.push('Theo','Noel','Léo');
        femalePool.push('Luna','Mel','Clara');
        neutralPool.push('Sol','Nuri');
      }

      if (genero === 'm') return malePool;
      if (genero === 'f') return femalePool;
      if (genero === 'n') return neutralPool;
      return [...malePool, ...femalePool, ...neutralPool];
    }

    function makeFantasyName() {
      return capitalize(randomItem(fantasyStarts) + randomItem(fantasyEnds));
    }

    function generateSingleName(config) {
      const { uso, genero, formato, tom, origem, prioridade } = config;

      if (uso === 'empresa' || formato === 'marca') {
        return makeBrandName(tom, prioridade);
      }

      if (uso === 'rpg') {
        const base = makeFantasyName();
        if (formato === 'completo') {
          return base + ' ' + randomItem(['Stormborn','Valerian','Moonfall','Drake','Silverwind','Nightbloom']);
        }
        return base;
      }

      const pool = getPoolByGenero(genero, origem, tom);
      let first = randomItem(pool);

      if (formato === 'duplo') {
        let second = randomItem(pool.filter(n => n !== first));
        return `${first} ${second}`;
      }

      if (formato === 'completo') {
        return `${first} ${randomItem(surnamesBR)}`;
      }

      if (uso === 'projeto') {
        return `${first} ${randomItem(['Lab','Studio','Flow','Hub','Core'])}`;
      }

      return first;
    }

    function describeName(name, config) {
      const { uso, tom, formato } = config;
      let style = tom === 'forte' ? 'passa força e presença'
        : tom === 'leve' ? 'soa leve e agradável'
        : tom === 'criativo' ? 'tem pegada mais criativa'
        : tom === 'classico' ? 'tem leitura mais tradicional'
        : 'soa moderno e atual';

      let useText = uso === 'empresa' ? 'pode funcionar bem em branding inicial'
        : uso === 'personagem' ? 'combina com histórias e personagens'
        : uso === 'usuario' ? 'é útil para perfis fictícios e testes'
        : uso === 'bebe' ? 'pode servir como inspiração pessoal'
        : uso === 'rpg' ? 'tem boa atmosfera para fantasia e RPG'
        : 'pode ser útil para projetos e ideias criativas';

      let formatText = formato === 'completo' ? 'em formato mais completo'
        : formato === 'duplo' ? 'como nome composto'
        : formato === 'marca' ? 'em formato curto e mais comercial'
        : 'em formato simples e direto';

      return `${style}, ${formatText} e ${useText}.`;
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

    function copyText(text, button = null) {
      navigator.clipboard.writeText(text).then(() => {
        if (button) {
          const original = button.textContent;
          button.textContent = '✅ Copiado';
          setTimeout(() => button.textContent = original, 1400);
        }
      });
    }

    function copiarTodosResultados() {
      if (!generatedNames.length) {
        showValidation('Gere alguns nomes antes de copiar a lista.', 'error');
        return;
      }
      copyText(generatedNames.map(item => item.name).join('\n'));
      showValidation('Lista completa copiada com sucesso.', 'success');
    }

    function limparResultados() {
      generatedNames = [];
      document.getElementById('generatedGrid').innerHTML = '';
      document.getElementById('resultsWrapper').style.display = 'none';
      clearValidation();
    }

    function gerarNovamente() {
      gerarNomesPremium();
    }

    function saveHistory(names) {
      generationHistory = [...names.map(n => n.name), ...generationHistory].slice(0, 12);
      localStorage.setItem('nanosistecck_name_history', JSON.stringify(generationHistory));
      renderHistory();
    }

    function loadHistory() {
      try {
        generationHistory = JSON.parse(localStorage.getItem('nanosistecck_name_history') || '[]');
      } catch (e) {
        generationHistory = [];
      }
      renderHistory();
    }

    function renderHistory() {
      const historyBox = document.getElementById('historyBox');
      const historyList = document.getElementById('historyList');
      if (!generationHistory.length) {
        historyBox.style.display = 'none';
        historyList.innerHTML = '';
        return;
      }

      historyBox.style.display = 'block';
      historyList.innerHTML = generationHistory.map(name =>
        `<button type="button" class="history-item" onclick="copyText('${String(name).replace(/'/g, "\\'")}', this)">${name}</button>`
      ).join('');
    }

    function gerarNomesPremium() {
      clearValidation();

      const config = {
        uso: document.getElementById('uso').value,
        genero: document.getElementById('genero').value,
        quantidade: parseInt(document.getElementById('quantidade').value, 10),
        formato: document.getElementById('formato').value,
        tom: document.getElementById('tom').value,
        origem: document.getElementById('origem').value,
        repeticao: document.getElementById('repeticao').value,
        prioridade: document.getElementById('favorito').value
      };

      const results = [];
      const used = new Set();
      let safety = 0;

      while (results.length < config.quantidade && safety < 300) {
        safety++;
        const candidate = generateSingleName(config);
        if (config.repeticao === 'sim' && used.has(candidate)) continue;
        used.add(candidate);
        results.push({
          name: candidate,
          desc: describeName(candidate, config)
        });
      }

      if (!results.length) {
        showValidation('Não foi possível gerar nomes com essa combinação. Tente outro formato ou objetivo.', 'error');
        return;
      }

      generatedNames = results;

      const titleMap = {
        personagem: 'Lista de nomes para personagem',
        bebe: 'Sugestões de nomes para inspiração',
        empresa: 'Ideias de nomes para empresa ou marca',
        projeto: 'Sugestões de nomes para projeto ou produto',
        usuario: 'Nomes para perfil fictício e testes',
        rpg: 'Nomes para RPG e fantasia'
      };

      document.getElementById('resultTitle').textContent = titleMap[config.uso] || 'Nomes gerados';
      document.getElementById('resultSummary').textContent =
        `Geramos ${results.length} opção(ões) com foco em ${config.uso}, estilo ${config.tom}, formato ${config.formato} e leitura ${config.prioridade}.`;
      document.getElementById('resultInsight').textContent =
        config.uso === 'empresa'
          ? 'Para nomes de marca, priorize os mais simples, fáceis de pronunciar e com boa lembrança sonora.'
          : config.uso === 'personagem'
          ? 'Para personagens, observe se o nome combina com idade, personalidade, época e papel narrativo.'
          : config.uso === 'usuario'
          ? 'Para perfis fictícios, prefira nomes naturais, equilibrados e fáceis de reutilizar em testes e demonstrações.'
          : config.uso === 'rpg'
          ? 'Para fantasia, o melhor nome costuma equilibrar sonoridade marcante com fácil leitura.'
          : 'Use esta lista como ponto de partida e refine os nomes que mais combinam com seu objetivo.';

      document.getElementById('proTipText').textContent =
        config.uso === 'empresa'
          ? 'antes de usar um nome como marca, confira domínio, redes sociais e disponibilidade jurídica.'
          : 'salve os nomes que chamarem atenção e refine os melhores em vez de escolher no impulso.';

      const grid = document.getElementById('generatedGrid');
      grid.innerHTML = results.map((item, index) => `
        <div class="name-card">
          <div class="name-main">${item.name}</div>
          <div class="name-meta">${item.desc}</div>
          <div class="name-actions">
            <button type="button" class="mini-action-btn" onclick="copyText('${item.name.replace(/'/g, "\\'")}', this)">📋 Copiar</button>
            <button type="button" class="mini-action-btn" onclick="favoritarNome(${index})">⭐ Favoritar</button>
          </div>
        </div>
      `).join('');

      saveHistory(results);

      document.getElementById('resultsWrapper').style.display = 'block';
      showValidation('Nomes gerados com sucesso.', 'success');

      document.getElementById('resultsWrapper').scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    }

    function favoritarNome(index) {
      if (!generatedNames[index]) return;
      copyText(generatedNames[index].name);
      showValidation(`Nome "${generatedNames[index].name}" copiado para facilitar sua seleção.`, 'success');
    }

    document.addEventListener('DOMContentLoaded', function () {
      loadHistory();
    });
  </script>
</body>
</html>