<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gerador de Senhas Fortes Online – Grátis | NANOSISTECCK Tools</title>
  <meta name="description" content="Gere senhas fortes e seguras online. Personalize o tamanho, letras maiúsculas, minúsculas, números e símbolos. Gerador de senhas gratuito e sem cadastro." />
  <meta name="keywords" content="gerador de senhas, criar senha forte, senha segura online, gerador senha aleatória, password generator" />
  <meta name="robots" content="index, follow" />
  <link rel="canonical" href="https://tools.nanosistecck.com/ferramentas/gerador-senhas.php" />
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
        <span>Gerador de Senhas</span>
      </nav>

      <div class="ad-slot ad-slot-leaderboard">📢 Espaço para Anúncio – Google AdSense</div>

      <div class="tool-header">
        <div class="tool-page-icon" style="background:linear-gradient(135deg,#e8eaff,#c5caff)">🔐</div>
        <div>
          <h1>Gerador de Senhas Fortes</h1>
          <p>Crie senhas fortes, aleatórias e seguras em segundos. Personalize o tamanho e os tipos de caracteres conforme sua necessidade.</p>
          <span class="tag tag-blue">Segurança</span>
        </div>
      </div>

      <div class="tool-box">
        <!-- Senha gerada -->
        <div class="form-group">
          <label>Senha Gerada</label>
          <div style="display:flex;gap:.5rem;align-items:center;">
            <input type="text" id="senha-output" class="form-control" readonly placeholder="Clique em gerar..." style="font-family:monospace;font-size:1.1rem;font-weight:600;letter-spacing:1px;" />
            <button class="copy-btn" id="copy-btn" onclick="copiarSenha()" title="Copiar senha" style="flex-shrink:0;padding:.7rem 1rem;">📋</button>
          </div>
        </div>

        <!-- Barra de força -->
        <div id="forca-container" style="display:none;margin-bottom:1.25rem;">
          <div style="font-size:.8rem;font-weight:600;color:var(--text3);margin-bottom:.35rem;">Força da Senha: <span id="forca-label">—</span></div>
          <div style="height:6px;background:var(--border);border-radius:50px;overflow:hidden;">
            <div id="forca-bar" style="height:100%;border-radius:50px;transition:width .3s ease,background .3s ease;width:0%;"></div>
          </div>
        </div>

        <!-- Configurações -->
        <div class="form-group">
          <label for="tamanho">Tamanho: <span id="tamanho-label">16</span> caracteres</label>
          <input type="range" id="tamanho" min="4" max="64" value="16" oninput="atualizarTamanho()" style="width:100%;accent-color:var(--primary);cursor:pointer;" />
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:.75rem;margin-bottom:1.25rem;">
          <label style="display:flex;align-items:center;gap:.5rem;font-size:.9rem;cursor:pointer;user-select:none;">
            <input type="checkbox" id="maiusculas" checked style="accent-color:var(--primary);width:16px;height:16px;" />
            Letras Maiúsculas (A-Z)
          </label>
          <label style="display:flex;align-items:center;gap:.5rem;font-size:.9rem;cursor:pointer;user-select:none;">
            <input type="checkbox" id="minusculas" checked style="accent-color:var(--primary);width:16px;height:16px;" />
            Letras Minúsculas (a-z)
          </label>
          <label style="display:flex;align-items:center;gap:.5rem;font-size:.9rem;cursor:pointer;user-select:none;">
            <input type="checkbox" id="numeros" checked style="accent-color:var(--primary);width:16px;height:16px;" />
            Números (0-9)
          </label>
          <label style="display:flex;align-items:center;gap:.5rem;font-size:.9rem;cursor:pointer;user-select:none;">
            <input type="checkbox" id="simbolos" style="accent-color:var(--primary);width:16px;height:16px;" />
            Símbolos (!@#$...)
          </label>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:.75rem;margin-bottom:1.5rem;">
          <div class="form-group" style="margin:0;">
            <label for="qtd-senhas">Quantidade</label>
            <select id="qtd-senhas" class="form-control">
              <option value="1" selected>1 senha</option>
              <option value="5">5 senhas</option>
              <option value="10">10 senhas</option>
            </select>
          </div>
        </div>
        <button class="btn btn-primary btn-block btn-lg" onclick="gerarSenhas()">
          🔐 Gerar Senha
        </button>

        <div id="lista-senhas" style="display:none;margin-top:1.25rem;"></div>
      </div>

      <div class="notice notice-success">
        <span>🔒</span>
        <span>Todas as senhas são geradas localmente no seu navegador. Nenhum dado é enviado para nossos servidores.</span>
      </div>

      <div class="ad-slot ad-slot-rectangle">📢 Espaço para Anúncio – Google AdSense</div>

      <div class="seo-content">
        <h2>Por Que Usar Senhas Fortes?</h2>
        <p>
          Uma <strong>senha forte</strong> é a primeira linha de defesa contra invasões de contas. Senhas fracas ou reutilizadas são responsáveis pela maioria dos ataques de segurança. Use nosso <strong>gerador de senhas online</strong> para criar senhas imprevisíveis e seguras.
        </p>
        <h3>Características de uma Senha Forte</h3>
        <ul>
          <li>Mínimo de 12 caracteres (recomendado: 16+)</li>
          <li>Combinação de letras maiúsculas e minúsculas</li>
          <li>Incluir números e símbolos especiais</li>
          <li>Não usar palavras do dicionário</li>
          <li>Única para cada conta ou serviço</li>
        </ul>
        <h3>Dicas de Segurança</h3>
        <ul>
          <li>Use um gerenciador de senhas (Bitwarden, 1Password, etc.)</li>
          <li>Ative a autenticação de dois fatores sempre que possível</li>
          <li>Nunca compartilhe sua senha por e-mail ou WhatsApp</li>
          <li>Troque senhas regularmente em serviços críticos</li>
        </ul>
      </div>

      <div class="related-tools">
        <h2>Ferramentas Relacionadas</h2>
        <div class="related-grid">
          <a href="gerador-nomes.php" class="related-card"><span class="related-card-icon">👤</span> Gerador de Nomes</a>
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
    const CHARS = {
      mai: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
      min: 'abcdefghijklmnopqrstuvwxyz',
      num: '0123456789',
      sim: '!@#$%^&*()_+-=[]{}|;:,.<>?'
    };

    function atualizarTamanho() {
      document.getElementById('tamanho-label').textContent = document.getElementById('tamanho').value;
    }

    function calcularForca(senha) {
      let score = 0;
      if (senha.length >= 8)  score++;
      if (senha.length >= 12) score++;
      if (senha.length >= 16) score++;
      if (/[A-Z]/.test(senha)) score++;
      if (/[a-z]/.test(senha)) score++;
      if (/[0-9]/.test(senha)) score++;
      if (/[^A-Za-z0-9]/.test(senha)) score++;
      return score;
    }

    function gerarUmaSenha() {
      const tamanho = parseInt(document.getElementById('tamanho').value);
      let charset = '';
      if (document.getElementById('maiusculas').checked) charset += CHARS.mai;
      if (document.getElementById('minusculas').checked) charset += CHARS.min;
      if (document.getElementById('numeros').checked)   charset += CHARS.num;
      if (document.getElementById('simbolos').checked)  charset += CHARS.sim;
      if (!charset) { alert('Selecione ao menos um tipo de caractere.'); return null; }

      let senha = '';
      const arr = new Uint32Array(tamanho);
      window.crypto.getRandomValues(arr);
      for (let k = 0; k < tamanho; k++) {
        senha += charset[arr[k] % charset.length];
      }
      return senha;
    }

    function gerarSenhas() {
      const qtd = parseInt(document.getElementById('qtd-senhas').value);
      if (qtd === 1) {
        const s = gerarUmaSenha();
        if (!s) return;
        document.getElementById('senha-output').value = s;
        // Força
        const score = calcularForca(s);
        const niveis = ['','Muito Fraca','Fraca','Razoável','Boa','Forte','Muito Forte','Excelente'];
        const cores  = ['','#e53e3e','#e53e3e','#e67e22','#f1c40f','#2ecc71','#27ae60','#1a7fcf'];
        const pct    = Math.round((score / 7) * 100);
        document.getElementById('forca-container').style.display = 'block';
        document.getElementById('forca-label').textContent = niveis[score] || 'Forte';
        document.getElementById('forca-bar').style.width      = pct + '%';
        document.getElementById('forca-bar').style.background = cores[score] || '#1a73e8';
        document.getElementById('lista-senhas').style.display = 'none';
      } else {
        const senhas = Array.from({length: qtd}, () => gerarUmaSenha()).filter(Boolean);
        const lista = document.getElementById('lista-senhas');
        lista.innerHTML = `
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:.75rem;">
            <span style="font-size:.85rem;font-weight:600;color:var(--text3);">${senhas.length} senhas geradas</span>
            <button class="copy-btn" onclick="copyToClipboard(document.getElementById('lista-senhas').querySelectorAll('.senha-item').length && [...document.getElementById('lista-senhas').querySelectorAll('.senha-text')].map(e=>e.textContent).join('\\n'), this)">📋 Copiar Todas</button>
          </div>
          ${senhas.map(s => `
            <div class="senha-item" style="display:flex;align-items:center;gap:.5rem;padding:.55rem .85rem;background:var(--surface2);border-radius:var(--radius-sm);margin-bottom:.4rem;">
              <span class="senha-text" style="flex:1;font-family:monospace;font-size:.9rem;font-weight:600;letter-spacing:.5px;word-break:break-all;">${s}</span>
              <button class="copy-btn" onclick="copyToClipboard('${s}',this)" style="flex-shrink:0;">📋</button>
            </div>
          `).join('')}
        `;
        lista.style.display = 'block';
        document.getElementById('senha-output').value = senhas[0] || '';
        document.getElementById('forca-container').style.display = 'none';
      }
    }

    function copiarSenha() {
      const s = document.getElementById('senha-output').value;
      if (s) copyToClipboard(s, document.getElementById('copy-btn'));
    }
  </script>
</body>
</html>
