<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

ns_redirect_legacy_url('/ferramentas/simulador-financiamento');
ns_render_page_start('tool:simulador-financiamento');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navegação breadcrumb">
      <a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span>
      <a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span>
      <span>Simulador de Financiamento</span>
    </nav>

    <?php ns_render_ad_slot('leaderboard'); ?>

    <div class="tool-header">
      <div class="tool-page-icon" style="background:linear-gradient(135deg,#fff3e8,#ffd8b8)">🏠</div>
      <div>
        <h1>Simulador de Financiamento</h1>
        <p>Compare parcelas, juros totais e custo final no sistema Price ou SAC antes de assumir uma operação de crédito.</p>
        <span class="tag tag-orange">Finanças</span>
      </div>
    </div>

    <div class="tool-box">
      <div class="form-row">
        <div class="form-group">
          <label for="valor">Valor do Financiamento (R$)</label>
          <input type="number" id="valor" class="form-control" placeholder="Ex: 50000" min="0" step="0.01" />
        </div>
        <div class="form-group">
          <label for="taxa">Taxa de Juros (% ao mês)</label>
          <input type="number" id="taxa" class="form-control" placeholder="Ex: 1.5" min="0" step="0.01" />
        </div>
        <div class="form-group">
          <label for="parcelas">Número de Parcelas</label>
          <input type="number" id="parcelas" class="form-control" placeholder="Ex: 60" min="1" step="1" />
        </div>
        <div class="form-group">
          <label for="sistema">Sistema de Amortização</label>
          <select id="sistema" class="form-control">
            <option value="price">Tabela Price</option>
            <option value="sac">SAC</option>
          </select>
        </div>
      </div>
      <button class="btn btn-primary btn-block btn-lg" onclick="simularFinanciamento()">Simular Financiamento</button>

      <div class="result-box" id="resultado">
        <div class="result-grid">
          <div class="result-item">
            <div class="label">Valor Financiado</div>
            <div class="value" id="res-valor">—</div>
          </div>
          <div class="result-item">
            <div class="label">1ª Parcela</div>
            <div class="value" id="res-parcela1" style="color:var(--orange)">—</div>
          </div>
          <div class="result-item">
            <div class="label">Total de Juros</div>
            <div class="value" id="res-juros" style="color:var(--orange)">—</div>
          </div>
          <div class="result-item">
            <div class="label">Custo Total</div>
            <div class="value" id="res-total">—</div>
          </div>
        </div>
        <div id="res-detalhe" style="margin-top:1rem;font-size:.88rem;color:var(--text2);"></div>
      </div>
    </div>

    <div class="notice notice-info">
      <span>ℹ️</span>
      <span><strong>Price:</strong> parcelas fixas. <strong>SAC:</strong> amortização constante e parcelas decrescentes.</span>
    </div>

    <?php ns_render_ad_slot('rectangle'); ?>

    <div class="seo-content"><h2>O que esta ferramenta resolve</h2><p>Simulador de Financiamento foi estruturada para resolver uma tarefa prática com execução rápida no navegador, sem instalação. Use Simulador de Financiamento para executar a tarefa com rapidez.</p><h2>Quando usar</h2><p>Use quando você precisa de uma resposta imediata para trabalho, estudo, operação ou validação técnica e quer reduzir retrabalho.</p><h2>Quando NÃO usar</h2><p>Não use como única base para decisões críticas sem revisão humana, validação de contexto e conferência de unidades/entradas.</p><h2>Erros comuns</h2><ul><li>Preencher campos com unidade errada.</li><li>Interpretar resultado sem contexto do problema real.</li><li>Copiar saída sem validar premissas e limites.</li></ul><h2>Exemplo prático</h2><p>Preencha os campos com dados reais, execute, valide a interpretação exibida na tela e só então use o resultado em relatório, orçamento ou documentação.</p><h2>Boas práticas de qualidade</h2><p>Revise dados de entrada, mantenha rastreabilidade da origem dos números e faça dupla checagem quando o resultado impactar finanças, saúde, jurídico ou compliance.</p></div><div class="related-tools">
      <h2>Ferramentas relacionadas</h2>
      <div class="related-grid">
        <a href="<?= ns_escape(ns_href('/ferramentas/juros-simples')) ?>" class="related-card"><span class="related-card-icon">💰</span> Juros Simples</a>
        <a href="<?= ns_escape(ns_href('/ferramentas/juros-compostos')) ?>" class="related-card"><span class="related-card-icon">📈</span> Juros Compostos</a>
        <a href="<?= ns_escape(ns_href('/ferramentas/calculadora-porcentagem')) ?>" class="related-card"><span class="related-card-icon">%</span> Porcentagem</a>
      </div>
    </div>
  </div>
</main>
<script>
  function simularFinanciamento() {
    const PV = parseFloat(document.getElementById('valor').value);
    const i = parseFloat(document.getElementById('taxa').value) / 100;
    const n = parseInt(document.getElementById('parcelas').value, 10);
    const sistema = document.getElementById('sistema').value;

    if (isNaN(PV) || PV <= 0) {
      alert('Informe o valor do financiamento.');
      return;
    }
    if (isNaN(i) || i <= 0) {
      alert('Informe a taxa de juros.');
      return;
    }
    if (isNaN(n) || n <= 0) {
      alert('Informe o número de parcelas.');
      return;
    }

    let parcela1;
    let totalJuros;
    let totalPago;
    let detalhe;

    if (sistema === 'price') {
      const PMT = PV * i / (1 - Math.pow(1 + i, -n));
      parcela1 = PMT;
      totalPago = PMT * n;
      totalJuros = totalPago - PV;
      detalhe = `Todas as ${n} parcelas têm o mesmo valor de R$ ${fmtBRL(PMT)}.`;
    } else {
      const amort = PV / n;
      let saldoDevedor = PV;
      totalJuros = 0;
      for (let k = 1; k <= n; k++) {
        const juro = saldoDevedor * i;
        totalJuros += juro;
        if (k === 1) {
          parcela1 = amort + juro;
        }
        saldoDevedor -= amort;
      }
      const ultimaParcela = amort + (PV / n) * i;
      totalPago = PV + totalJuros;
      detalhe = `1ª parcela: R$ ${fmtBRL(parcela1)} | Última parcela: R$ ${fmtBRL(ultimaParcela)} | Amortização fixa: R$ ${fmtBRL(amort)}`;
    }

    document.getElementById('res-valor').textContent = 'R$ ' + fmtBRL(PV);
    document.getElementById('res-parcela1').textContent = 'R$ ' + fmtBRL(parcela1);
    document.getElementById('res-juros').textContent = 'R$ ' + fmtBRL(totalJuros);
    document.getElementById('res-total').textContent = 'R$ ' + fmtBRL(totalPago);
    document.getElementById('res-detalhe').textContent = detalhe;
    showResult('resultado');
  }
</script>
<?php ns_render_page_end(); ?>
