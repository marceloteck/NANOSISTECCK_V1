<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

ns_redirect_legacy_url('/ferramentas/densidade-palavra-chave');
ns_render_page_start('tool:densidade-palavra-chave');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navegação breadcrumb">
      <a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span>Densidade de Palavra‑Chave</span>
    </nav>

    <?php ns_render_ad_slot('leaderboard'); ?>

    <div class="tool-header">
      <div class="tool-page-icon" style="background:linear-gradient(135deg,#eefbf0,#d8f2dd);">🔎</div>
      <div>
        <h1>Densidade de Palavra‑Chave</h1>
        <p>Calcule ocorrências de um termo no texto e estime densidade percentual com validação de entrada.</p>
        <span class="tag tag-green">SEO</span>
      </div>
    </div>

    <div class="tool-box">
      <div class="form-group">
        <label for="dpk-key">Palavra‑chave</label>
        <input id="dpk-key" class="form-control" type="text" placeholder="Ex.: ferramentas online" />
      </div>
      <div class="form-group">
        <label for="dpk-text">Texto</label>
        <textarea id="dpk-text" class="form-control" rows="10" placeholder="Cole o texto para análise"></textarea>
      </div>
      <div class="form-row">
        <button class="btn btn-primary" type="button" onclick="calcDPK()">Calcular densidade</button>
        <button class="btn btn-outline" type="button" onclick="clearDPK()">Limpar</button>
      </div>
      <div class="notice notice-warn" id="dpk-error" style="display:none;"><span>⚠️</span><span id="dpk-error-text"></span></div>
      <div class="result-box" id="dpk-res">
        <div class="result-grid">
          <div class="result-item"><div class="label">Ocorrências</div><div class="value" id="dpk-occ">—</div></div>
          <div class="result-item"><div class="label">Total de palavras</div><div class="value" id="dpk-total">—</div></div>
          <div class="result-item"><div class="label">Densidade</div><div class="value" id="dpk-den">—</div></div>
        </div>
        <div id="dpk-detail" style="margin-top:1rem;color:var(--text2);"></div>
      </div>
    </div>

    <?php ns_render_ad_slot('rectangle'); ?>

    <div class="seo-content">
      <h2>O que esta ferramenta resolve</h2>
      <p>Ela mede com rapidez a presença de um termo dentro de um texto e ajuda na revisão editorial de páginas SEO sem depender de planilha.</p>
      <h2>Quando usar</h2>
      <p>Use para revisar artigos antes de publicar, comparar versões de conteúdo e checar excesso/ausência do termo principal.</p>
      <h2>Quando não usar</h2>
      <p>Não use densidade isolada como métrica final de qualidade. Relevância semântica, intenção de busca e clareza para o usuário são mais importantes.</p>
      <h2>Erros comuns</h2>
      <ul>
        <li>Comparar densidades de textos com tamanhos muito diferentes.</li>
        <li>Forçar repetição de palavra sem naturalidade.</li>
        <li>Ignorar variações semânticas e contexto.</li>
      </ul>
      <h2>Exemplo prático</h2>
      <p>Em um texto com 800 palavras, 12 ocorrências da palavra-chave geram densidade de 1,5%. O ideal é manter naturalidade e foco no valor da resposta.</p>
    </div>
  </div>
</main>
<script>
function dpkError(msg){document.getElementById('dpk-error-text').textContent=msg;document.getElementById('dpk-error').style.display='flex';document.getElementById('dpk-res').classList.remove('show');}
function dpkClearError(){document.getElementById('dpk-error').style.display='none';}
function calcDPK(){
  const key = document.getElementById('dpk-key').value.trim().toLowerCase();
  const text = document.getElementById('dpk-text').value.toLowerCase().trim();
  dpkClearError();

  if(!key){dpkError('Informe a palavra‑chave.');return;}
  if(!text){dpkError('Cole um texto para análise.');return;}

  const words = text.split(/\s+/).filter(Boolean);
  if(words.length < 20){dpkError('Use ao menos 20 palavras para uma leitura minimamente útil.');return;}

  const escaped = key.replace(/[.*+?^${}()|[\]\\]/g,'\\$&');
  const occurrences = (text.match(new RegExp(escaped, 'g')) || []).length;
  const density = (occurrences / words.length) * 100;

  document.getElementById('dpk-occ').textContent = String(occurrences);
  document.getElementById('dpk-total').textContent = String(words.length);
  document.getElementById('dpk-den').textContent = fmtNum(density, 2) + '%';
  document.getElementById('dpk-detail').textContent = 'Interpretação: use densidade como indicador auxiliar; priorize clareza e intenção de busca.';
  showResult('dpk-res');
}
function clearDPK(){
  document.getElementById('dpk-key').value='';
  document.getElementById('dpk-text').value='';
  document.getElementById('dpk-res').classList.remove('show');
  dpkClearError();
}
</script>
<?php ns_render_page_end(); ?>
