<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

ns_redirect_legacy_url('/ferramentas/juros-compostos');
ns_render_page_start('tool:juros-compostos');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navegação breadcrumb">
      <a href="<?= ns_escape(ns_href('/')) ?>">Início</a>
      <span class="sep">›</span>
      <a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a>
      <span class="sep">›</span>
      <span>Juros Compostos</span>
    </nav>

    <?php ns_render_ad_slot('leaderboard'); ?>

    <div class="tool-header">
      <div class="tool-page-icon" style="background:linear-gradient(135deg,#e6f9f4,#b8f0e0)">📈</div>
      <div>
        <h1>Calculadora de Juros Compostos</h1>
        <p>Descubra quanto seu dinheiro pode render com capitalização recorrente e aportes mensais opcionais.</p>
        <span class="tag tag-green">Finanças</span>
      </div>
    </div>

    <div class="tool-box">
      <div class="form-row">
        <div class="form-group">
          <label for="capital">Capital Inicial (R$)</label>
          <input type="number" id="capital" class="form-control" placeholder="Ex: 1000" min="0" step="0.01" />
        </div>
        <div class="form-group">
          <label for="taxa">Taxa de Juros (% ao mês)</label>
          <input type="number" id="taxa" class="form-control" placeholder="Ex: 1.2" min="0" step="0.01" />
        </div>
        <div class="form-group">
          <label for="periodo">Período (meses)</label>
          <input type="number" id="periodo" class="form-control" placeholder="Ex: 24" min="1" step="1" />
        </div>
        <div class="form-group">
          <label for="aporte">Aporte Mensal (R$)</label>
          <input type="number" id="aporte" class="form-control" placeholder="Ex: 200" min="0" step="0.01" />
        </div>
      </div>
      <button class="btn btn-primary btn-block btn-lg" onclick="calcularJurosCompostos()">Calcular Juros Compostos</button>

      <div class="result-box" id="resultado">
        <div class="result-grid">
          <div class="result-item">
            <div class="label">Montante Final</div>
            <div class="value" id="res-montante" style="color:var(--accent)">—</div>
          </div>
          <div class="result-item">
            <div class="label">Capital Investido</div>
            <div class="value" id="res-capital">—</div>
          </div>
          <div class="result-item">
            <div class="label">Juros Ganhos</div>
            <div class="value" id="res-juros" style="color:var(--primary)">—</div>
          </div>
          <div class="result-item">
            <div class="label">Rendimento Total</div>
            <div class="value" id="res-rendimento">—</div>
          </div>
        </div>
      </div>
    </div>

    <div class="notice notice-info">
      <span>ℹ️</span>
      <span><strong>Fórmula usada:</strong> M = C × (1 + i)^n. Quando há aportes, a série uniforme é somada ao montante.</span>
    </div>

    <?php ns_render_ad_slot('rectangle'); ?>

    <div class="seo-content"><h2>O que esta ferramenta resolve</h2><p>Calculadora de Juros Compostos foi estruturada para resolver uma tarefa prática com execução rápida no navegador, sem instalação. Use Calculadora de Juros Compostos para executar a tarefa com rapidez.</p><h2>Quando usar</h2><p>Use quando você precisa de uma resposta imediata para trabalho, estudo, operação ou validação técnica e quer reduzir retrabalho.</p><h2>Quando NÃO usar</h2><p>Não use como única base para decisões críticas sem revisão humana, validação de contexto e conferência de unidades/entradas.</p><h2>Erros comuns</h2><ul><li>Preencher campos com unidade errada.</li><li>Interpretar resultado sem contexto do problema real.</li><li>Copiar saída sem validar premissas e limites.</li></ul><h2>Exemplo prático</h2><p>Preencha os campos com dados reais, execute, valide a interpretação exibida na tela e só então use o resultado em relatório, orçamento ou documentação.</p><h2>Boas práticas de qualidade</h2><p>Revise dados de entrada, mantenha rastreabilidade da origem dos números e faça dupla checagem quando o resultado impactar finanças, saúde, jurídico ou compliance.</p></div><div class="related-tools">
      <h2>Ferramentas relacionadas</h2>
      <div class="related-grid">
        <a href="<?= ns_escape(ns_href('/ferramentas/juros-simples')) ?>" class="related-card"><span class="related-card-icon">💰</span> Juros Simples</a>
        <a href="<?= ns_escape(ns_href('/ferramentas/simulador-financiamento')) ?>" class="related-card"><span class="related-card-icon">🏠</span> Simulador de Financiamento</a>
        <a href="<?= ns_escape(ns_href('/ferramentas/calculadora-porcentagem')) ?>" class="related-card"><span class="related-card-icon">%</span> Calculadora de Porcentagem</a>
      </div>
    </div>
  </div>
</main>
<script>
  function calcularJurosCompostos() {
    const C = parseFloat(document.getElementById('capital').value) || 0;
    const i = parseFloat(document.getElementById('taxa').value) / 100;
    const n = parseInt(document.getElementById('periodo').value, 10);
    const a = parseFloat(document.getElementById('aporte').value) || 0;

    if (C <= 0 && a <= 0) {
      alert('Informe ao menos o capital inicial ou o aporte mensal.');
      return;
    }
    if (isNaN(i) || i <= 0) {
      alert('Informe a taxa de juros.');
      return;
    }
    if (isNaN(n) || n <= 0) {
      alert('Informe o período.');
      return;
    }

    const montanteCapital = C * Math.pow(1 + i, n);
    let montanteAportes = 0;
    if (a > 0 && i > 0) {
      montanteAportes = a * ((Math.pow(1 + i, n) - 1) / i);
    }

    const M = montanteCapital + montanteAportes;
    const totalInvestido = C + (a * n);
    const juros = M - totalInvestido;
    const rendimento = totalInvestido > 0 ? ((M / totalInvestido - 1) * 100) : 0;

    document.getElementById('res-montante').textContent = 'R$ ' + fmtBRL(M);
    document.getElementById('res-capital').textContent = 'R$ ' + fmtBRL(totalInvestido);
    document.getElementById('res-juros').textContent = 'R$ ' + fmtBRL(juros);
    document.getElementById('res-rendimento').textContent = fmtNum(rendimento, 2) + '%';
    showResult('resultado');
  }
</script>
<?php ns_render_page_end(); ?>
