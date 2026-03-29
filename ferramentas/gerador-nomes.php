<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gerador de Nomes Aleatórios Online – Grátis | NANOSISTECCK Tools</title>
  <meta name="description" content="Gere nomes aleatórios para personagens, empresas ou projetos. Masculino, feminino, neutro ou completo. Gerador de nomes online gratuito e sem cadastro." />
  <meta name="keywords" content="gerador de nomes, nomes aleatórios, nomes para personagens, gerador nome fictício, nome aleatório online" />
  <meta name="robots" content="index, follow" />
  <link rel="canonical" href="https://tools.nanosistecck.com/ferramentas/gerador-nomes.php" />
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
        <span>Gerador de Nomes</span>
      </nav>

      <div class="ad-slot ad-slot-leaderboard">📢 Espaço para Anúncio – Google AdSense</div>

      <div class="tool-header">
        <div class="tool-page-icon" style="background:linear-gradient(135deg,#e8f5e9,#c8e6c9)">👤</div>
        <div>
          <h1>Gerador de Nomes Aleatórios</h1>
          <p>Gere nomes aleatórios para personagens, avatares, projetos ou empresas. Masculino, feminino, neutro ou nome completo com sobrenome.</p>
          <span class="tag tag-green">Criatividade</span>
        </div>
      </div>

      <div class="tool-box">
        <div class="form-row">
          <div class="form-group">
            <label for="genero">Gênero</label>
            <select id="genero" class="form-control">
              <option value="m">Masculino</option>
              <option value="f">Feminino</option>
              <option value="a">Aleatório</option>
            </select>
          </div>
          <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <select id="quantidade" class="form-control">
              <option value="1">1 nome</option>
              <option value="5" selected>5 nomes</option>
              <option value="10">10 nomes</option>
              <option value="20">20 nomes</option>
            </select>
          </div>
          <div class="form-group">
            <label for="sobrenome">Incluir Sobrenome?</label>
            <select id="sobrenome" class="form-control">
              <option value="sim">Sim</option>
              <option value="nao">Não</option>
            </select>
          </div>
        </div>
        <button class="btn btn-primary btn-block btn-lg" onclick="gerarNomes()">
          🎲 Gerar Nomes
        </button>

        <div class="result-box" id="resultado" style="display:none">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:.85rem;">
            <div class="result-label" style="margin:0">Nomes Gerados</div>
            <button class="copy-btn" id="copy-btn" onclick="copiarNomes()">📋 Copiar Todos</button>
          </div>
          <div id="lista-nomes" style="display:grid;gap:.4rem;"></div>
        </div>
      </div>

      <div class="ad-slot ad-slot-rectangle">📢 Espaço para Anúncio – Google AdSense</div>

      <div class="seo-content">
        <h2>Para Que Serve o Gerador de Nomes?</h2>
        <p>
          O <strong>gerador de nomes aleatórios</strong> é muito usado por escritores, desenvolvedores de jogos, roteiristas, criadores de conteúdo e desenvolvedores de software que precisam criar personagens ou preencher dados fictícios de forma rápida.
        </p>
        <h3>Casos de Uso</h3>
        <ul>
          <li>Criar personagens para livros, RPGs e jogos</li>
          <li>Preencher dados fictícios em protótipos de sistemas</li>
          <li>Gerar nomes para avatares e perfis de teste</li>
          <li>Inspiração criativa para startups e projetos</li>
          <li>Naming de empresas e marcas fictícias</li>
        </ul>
        <h3>Nomes Brasileiros e Populares</h3>
        <p>
          Nossa base inclui os nomes mais populares do Brasil, mesclando nomes tradicionais, modernos e internacionais. Todos os nomes gerados são fictícios e não representam pessoas reais.
        </p>
      </div>

      <div class="related-tools">
        <h2>Ferramentas Relacionadas</h2>
        <div class="related-grid">
          <a href="gerador-senhas.php" class="related-card"><span class="related-card-icon">🔐</span> Gerador de Senhas</a>
          <a href="gerador-cpf.php" class="related-card"><span class="related-card-icon">🪪</span> Gerador de CPF</a>
          <a href="contador-caracteres.php" class="related-card"><span class="related-card-icon">🔢</span> Contador de Caracteres</a>
        </div>
      </div>
    </div>
  </main>
  <footer class="site-footer" id="site-footer"></footer>

  <script src="../js/main.js"></script>
  <script src="../js/layout.js"></script>
  <script>
    const nM = ['Lucas','Mateus','Pedro','Gabriel','Rafael','Felipe','Bruno','Eduardo','Henrique','Diego','Thiago','Rodrigo','Leonardo','André','Carlos','Fábio','Igor','Jonas','Leandro','Marcelo','Nathan','Otávio','Paulo','Renato','Sérgio','Tiago','Victor','Wagner','Xavier','Yuri','Alexandre','Bernardo','Caio','Danilo','Enzo','Fernando','Gustavo','Hélio','Ivan','Júlio','Kevin','Luis','Miguel','Nicolas','Otávio','Patrick','Quintino','Ricardo','Samuel','Tales'];
    const nF = ['Ana','Maria','Julia','Isabela','Fernanda','Beatriz','Camila','Amanda','Leticia','Larissa','Natália','Patrícia','Renata','Sabrina','Tatiana','Vanessa','Yasmin','Aline','Bruna','Carla','Daniela','Elisa','Fabiana','Gisele','Helena','Ingrid','Juliana','Karina','Lívia','Mariana','Nathalia','Olivia','Paula','Roberta','Sandra','Thainá','Úrsula','Viviane','Wanda','Xuxa','Zélia','Alice','Carolina','Diana','Eliana','Gabriela','Heloísa','Iara','Jaqueline','Keila'];
    const sob = ['Silva','Santos','Oliveira','Souza','Rodrigues','Ferreira','Alves','Pereira','Lima','Gomes','Costa','Ribeiro','Martins','Carvalho','Almeida','Lopes','Sousa','Fernandes','Vieira','Barbosa','Rocha','Dias','Nascimento','Andrade','Moreira','Nunes','Marques','Machado','Mendes','Freitas','Cardoso','Ramos','Araújo','Teixeira','Correia','Melo','Pinto','Fonseca','Monteiro','Moura','Leite','Neves','Miranda','Barros','Queiroz','Borges','Medeiros','Reis','Cunha','Campos'];

    let nomesGerados = [];

    function gerarNomes() {
      const genero = document.getElementById('genero').value;
      const qtd    = parseInt(document.getElementById('quantidade').value);
      const comSob = document.getElementById('sobrenome').value === 'sim';
      nomesGerados = [];

      for (let k = 0; k < qtd; k++) {
        let pool = genero === 'm' ? nM : genero === 'f' ? nF : (Math.random() > .5 ? nM : nF);
        const prim = pool[Math.floor(Math.random() * pool.length)];
        const sobr = sob[Math.floor(Math.random() * sob.length)];
        nomesGerados.push(comSob ? prim + ' ' + sobr : prim);
      }

      const lista = document.getElementById('lista-nomes');
      lista.innerHTML = nomesGerados.map(n =>
        `<div style="padding:.55rem .9rem;background:var(--surface2);border-radius:var(--radius-sm);font-weight:600;font-size:.95rem;">${n}</div>`
      ).join('');
      document.getElementById('resultado').classList.add('show');
      document.getElementById('resultado').style.display = 'block';
    }

    function copiarNomes() {
      copyToClipboard(nomesGerados.join('\n'), document.getElementById('copy-btn'));
    }
  </script>
</body>
</html>
