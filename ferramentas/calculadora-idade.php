<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

ns_redirect_legacy_url('/ferramentas/calculadora-idade');
ns_render_page_start('tool:calculadora-idade');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navegação breadcrumb">
      <a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span>
      <a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span>
      <span>Calculadora de Idade</span>
    </nav>

    <?php ns_render_ad_slot('leaderboard'); ?>

    <div class="tool-header">
      <div class="tool-page-icon" style="background:linear-gradient(135deg,#fce8ff,#f0c8ff)">🎂</div>
      <div>
        <h1>Calculadora de Idade</h1>
        <p>Descubra sua idade exata, dias vividos e quanto falta para o próximo aniversário.</p>
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
      <button class="btn btn-primary btn-block btn-lg" onclick="calcularIdade()">Calcular Minha Idade</button>

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

    <?php ns_render_ad_slot('rectangle'); ?>

    <div class="seo-content">
      <h2>Quando usar</h2>
      <p>Esta ferramenta ajuda em cadastros, validações de maioridade, curiosidades e conferência de datas com base em uma referência específica.</p>
    </div>

    <div class="related-tools">
      <h2>Ferramentas relacionadas</h2>
      <div class="related-grid">
        <a href="<?= ns_escape(ns_href('/ferramentas/calculadora-porcentagem')) ?>" class="related-card"><span class="related-card-icon">%</span> Porcentagem</a>
        <a href="<?= ns_escape(ns_href('/ferramentas/contador-caracteres')) ?>" class="related-card"><span class="related-card-icon">🔢</span> Contador de Caracteres</a>
        <a href="<?= ns_escape(ns_href('/ferramentas/gerador-nomes')) ?>" class="related-card"><span class="related-card-icon">👤</span> Gerador de Nomes</a>
      </div>
    </div>
  </div>
</main>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('ref').value = new Date().toISOString().split('T')[0];
  });

  function calcularIdade() {
    const nasc = new Date(document.getElementById('nasc').value + 'T00:00:00');
    const ref = new Date(document.getElementById('ref').value + 'T00:00:00');

    if (isNaN(nasc.getTime()) || isNaN(ref.getTime())) {
      alert('Informe as duas datas.');
      return;
    }
    if (nasc >= ref) {
      alert('A data de nascimento deve ser anterior à data de referência.');
      return;
    }

    let anos = ref.getFullYear() - nasc.getFullYear();
    let mAno = ref.getMonth() - nasc.getMonth();
    let dAno = ref.getDate() - nasc.getDate();
    if (dAno < 0) {
      mAno--;
    }
    if (mAno < 0) {
      anos--;
      mAno += 12;
    }

    const diffMs = ref - nasc;
    const diasTotais = Math.floor(diffMs / (1000 * 60 * 60 * 24));
    const mesesTotais = anos * 12 + mAno;

    let proxAniv = new Date(ref.getFullYear(), nasc.getMonth(), nasc.getDate());
    if (proxAniv <= ref) {
      proxAniv.setFullYear(proxAniv.getFullYear() + 1);
    }
    const diasParaAniv = Math.ceil((proxAniv - ref) / (1000 * 60 * 60 * 24));
    const mesesNomes = ['jan', 'fev', 'mar', 'abr', 'mai', 'jun', 'jul', 'ago', 'set', 'out', 'nov', 'dez'];
    const proxStr = `${proxAniv.getDate()} de ${mesesNomes[proxAniv.getMonth()]} (${diasParaAniv} dias)`;

    document.getElementById('res-anos').textContent = anos + ' anos';
    document.getElementById('res-meses').textContent = mesesTotais + ' meses';
    document.getElementById('res-dias').textContent = diasTotais.toLocaleString('pt-BR') + ' dias';
    document.getElementById('res-prox').textContent = proxStr;

    const msg = diasParaAniv === 0
      ? 'Feliz aniversário!'
      : diasParaAniv <= 7
        ? `Seu aniversário está chegando. Faltam ${diasParaAniv} dia(s).`
        : `Você tem ${anos} anos, ${mAno} meses e ${Math.abs(dAno < 0 ? dAno + 30 : dAno)} dias de vida.`;
    document.getElementById('res-msg').textContent = msg;
    showResult('resultado');
  }
</script>
<?php ns_render_page_end(); ?>
