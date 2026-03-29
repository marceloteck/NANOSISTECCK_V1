<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contador de Caracteres Online – Grátis | NANOSISTECCK Tools</title>
  <meta name="description" content="Conte caracteres, palavras, frases e parágrafos de qualquer texto em tempo real. Ideal para redes sociais, SEO, SMS e limites de caracteres. Gratuito e online." />
  <meta name="keywords" content="contador de caracteres, contar palavras online, contador palavras, contagem caracteres texto, contador caracteres gratuito" />
  <meta name="robots" content="index, follow" />
  <link rel="canonical" href="https://tools.nanosistecck.com/ferramentas/contador-caracteres.php" />
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
        <span>Contador de Caracteres</span>
      </nav>

      <div class="ad-slot ad-slot-leaderboard">📢 Espaço para Anúncio – Google AdSense</div>

      <div class="tool-header">
        <div class="tool-page-icon" style="background:linear-gradient(135deg,#fff8e1,#ffe082)">🔢</div>
        <div>
          <h1>Contador de Caracteres</h1>
          <p>Conte caracteres, palavras, frases e parágrafos em tempo real. Perfeito para Twitter, Instagram, SEO e limites de campos de texto.</p>
          <span class="tag tag-blue">Texto</span>
        </div>
      </div>

      <div class="tool-box">
        <!-- Limite opcional -->
        <div style="display:flex;gap:1rem;align-items:center;margin-bottom:1rem;flex-wrap:wrap;">
          <label style="display:flex;align-items:center;gap:.5rem;font-size:.88rem;cursor:pointer;">
            <input type="checkbox" id="usa-limite" style="accent-color:var(--primary);" onchange="toggleLimite()" />
            Definir limite de caracteres:
          </label>
          <input type="number" id="limite" class="form-control" value="280" min="1" step="1" style="width:100px;display:none;" oninput="contarCaracteres()" />
          <span id="limite-presets" style="display:flex;gap:.4rem;flex-wrap:wrap;"></span>
        </div>

        <div class="form-group">
          <label for="texto">Digite ou cole seu texto aqui</label>
          <textarea id="texto" class="form-control" rows="8" placeholder="Cole ou escreva seu texto aqui..." oninput="contarCaracteres()"></textarea>
        </div>

        <!-- Barra de progresso -->
        <div id="barra-container" style="display:none;margin-bottom:1rem;">
          <div style="display:flex;justify-content:space-between;font-size:.8rem;color:var(--text3);margin-bottom:.35rem;">
            <span id="barra-label">0 / 280</span>
            <span id="barra-pct">0%</span>
          </div>
          <div style="height:8px;background:var(--border);border-radius:50px;overflow:hidden;">
            <div id="barra-progress" style="height:100%;border-radius:50px;background:var(--accent);transition:width .2s ease,background .2s ease;width:0%;"></div>
          </div>
        </div>

        <!-- Stats em tempo real -->
        <div class="result-grid" style="margin-top:.5rem;">
          <div class="result-item">
            <div class="label">Caracteres (total)</div>
            <div class="value" id="cnt-total">0</div>
          </div>
          <div class="result-item">
            <div class="label">Sem Espaços</div>
            <div class="value" id="cnt-sem-espaco">0</div>
          </div>
          <div class="result-item">
            <div class="label">Palavras</div>
            <div class="value" id="cnt-palavras">0</div>
          </div>
          <div class="result-item">
            <div class="label">Frases</div>
            <div class="value" id="cnt-frases">0</div>
          </div>
          <div class="result-item">
            <div class="label">Parágrafos</div>
            <div class="value" id="cnt-paragrafos">0</div>
          </div>
          <div class="result-item">
            <div class="label">Tempo de Leitura</div>
            <div class="value" id="cnt-leitura">0 seg</div>
          </div>
        </div>

        <div style="display:flex;gap:.75rem;margin-top:1.25rem;flex-wrap:wrap;">
          <button class="btn btn-outline" onclick="document.getElementById('texto').value='';contarCaracteres();">🗑️ Limpar</button>
          <button class="copy-btn" onclick="copyToClipboard(document.getElementById('texto').value, this)">📋 Copiar Texto</button>
        </div>
      </div>

      <div class="ad-slot ad-slot-rectangle">📢 Espaço para Anúncio – Google AdSense</div>

      <div class="seo-content">
        <h2>Por Que Contar Caracteres?</h2>
        <p>
          O <strong>contador de caracteres online</strong> é essencial para quem escreve para redes sociais, e-mail marketing, SEO ou sistemas com limites de campos. Diferentes plataformas têm limites diferentes.
        </p>
        <h3>Limites de Caracteres por Plataforma</h3>
        <ul>
          <li><strong>Twitter / X:</strong> 280 caracteres por tweet</li>
          <li><strong>Instagram:</strong> 2.200 caracteres na legenda</li>
          <li><strong>Meta description (SEO):</strong> 155-160 caracteres</li>
          <li><strong>Title tag (SEO):</strong> 50-60 caracteres</li>
          <li><strong>SMS:</strong> 160 caracteres por mensagem</li>
          <li><strong>WhatsApp Status:</strong> 700 caracteres</li>
          <li><strong>LinkedIn Post:</strong> 3.000 caracteres</li>
        </ul>
        <h3>Contagem de Palavras</h3>
        <p>
          Para textos de blog ou artigos, a contagem de palavras é crucial. Artigos com mais de 1.500 palavras tendem a ter melhor desempenho no Google. Nossa ferramenta conta palavras em tempo real enquanto você digita.
        </p>
      </div>

      <div class="related-tools">
        <h2>Ferramentas Relacionadas</h2>
        <div class="related-grid">
          <a href="conversor-texto.php" class="related-card"><span class="related-card-icon">🔄</span> Conversor de Texto</a>
          <a href="gerador-nomes.php" class="related-card"><span class="related-card-icon">👤</span> Gerador de Nomes</a>
          <a href="gerador-senhas.php" class="related-card"><span class="related-card-icon">🔐</span> Gerador de Senhas</a>
        </div>
      </div>
    </div>
  </main>
  <footer class="site-footer" id="site-footer"></footer>

  <script src="../js/main.js"></script>
  <script src="../js/layout.js"></script>
  <script>
    const presets = [
      { label: 'Twitter (280)', val: 280 },
      { label: 'SMS (160)',     val: 160 },
      { label: 'Meta Desc (160)', val: 160 },
      { label: 'Title SEO (60)', val: 60 },
    ];

    function toggleLimite() {
      const usa = document.getElementById('usa-limite').checked;
      document.getElementById('limite').style.display = usa ? 'block' : 'none';
      document.getElementById('limite-presets').style.display = usa ? 'flex' : 'none';
      document.getElementById('barra-container').style.display = usa ? 'block' : 'none';
      contarCaracteres();
    }

    function contarCaracteres() {
      const txt = document.getElementById('texto').value;
      const total        = txt.length;
      const semEspaco    = txt.replace(/\s/g, '').length;
      const palavras     = txt.trim() ? txt.trim().split(/\s+/).length : 0;
      const frases       = txt.trim() ? txt.split(/[.!?]+/).filter(s => s.trim().length > 0).length : 0;
      const paragrafos   = txt.trim() ? txt.split(/\n+/).filter(p => p.trim().length > 0).length : 0;
      const leituraMin   = palavras / 200; // ~200 WPM
      const leituraTexto = leituraMin < 1 ? Math.round(leituraMin * 60) + ' seg' : leituraMin.toFixed(1) + ' min';

      document.getElementById('cnt-total').textContent       = total.toLocaleString('pt-BR');
      document.getElementById('cnt-sem-espaco').textContent  = semEspaco.toLocaleString('pt-BR');
      document.getElementById('cnt-palavras').textContent    = palavras.toLocaleString('pt-BR');
      document.getElementById('cnt-frases').textContent      = frases.toLocaleString('pt-BR');
      document.getElementById('cnt-paragrafos').textContent  = paragrafos.toLocaleString('pt-BR');
      document.getElementById('cnt-leitura').textContent     = leituraTexto;

      if (document.getElementById('usa-limite').checked) {
        const lim = parseInt(document.getElementById('limite').value) || 280;
        const pct = Math.min(100, Math.round((total / lim) * 100));
        document.getElementById('barra-label').textContent    = `${total} / ${lim}`;
        document.getElementById('barra-pct').textContent      = pct + '%';
        document.getElementById('barra-progress').style.width = pct + '%';
        document.getElementById('barra-progress').style.background =
          pct > 100 ? '#e53e3e' : pct > 80 ? '#e67e22' : 'var(--accent)';
      }
    }

    // Init presets
    document.addEventListener('DOMContentLoaded', function () {
      const el = document.getElementById('limite-presets');
      presets.forEach(function (p) {
        const btn = document.createElement('button');
        btn.textContent = p.label;
        btn.className = 'tag tag-gray';
        btn.style.cursor = 'pointer';
        btn.style.border = 'none';
        btn.onclick = function () {
          document.getElementById('limite').value = p.val;
          document.getElementById('usa-limite').checked = true;
          toggleLimite();
        };
        el.appendChild(btn);
      });
      el.style.display = 'none';
    });
  </script>
</body>
</html>
