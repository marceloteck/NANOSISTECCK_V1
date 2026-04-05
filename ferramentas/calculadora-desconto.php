<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

ns_redirect_legacy_url('/ferramentas/calculadora-desconto');
ns_render_page_start('tool:calculadora-desconto');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navega��o breadcrumb">
      <a href="<?= ns_escape(ns_href('/')) ?>">In�cio</a><span class="sep">�</span>
      <a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">�</span>
      <span>Calculadora de Desconto</span>
    </nav>
    <?php ns_render_ad_slot('leaderboard'); ?>
    <div class="tool-header">
      <div class="tool-page-icon" style="background:linear-gradient(135deg,#fff4e8,#ffd6ad);">???</div>
      <div>
        <h1>Calculadora de Desconto Online Gr�tis</h1>
        <p>Descubra o valor do desconto, o pre�o final e a economia gerada em segundos, com c�lculo simples direto no navegador.</p>
        <span class="tag tag-orange">Finan�as</span>
      </div>
    </div>
    <div class="tool-box">
      <div class="form-row">
        <div class="form-group">
          <label for="valor-original">Valor original (R$)</label>
          <input type="number" id="valor-original" class="form-control" placeholder="Ex: 250" min="0" step="0.01" />
        </div>
        <div class="form-group">
          <label for="percentual-desconto">Desconto (%)</label>
          <input type="number" id="percentual-desconto" class="form-control" placeholder="Ex: 15" min="0" step="0.01" />
        </div>
      </div>
      <div class="form-row">
        <button type="button" class="btn btn-primary" onclick="calcularDesconto()">Calcular desconto</button>
        <button type="button" class="btn btn-outline" onclick="limparDesconto()">Limpar</button>
        <button type="button" class="copy-btn" onclick="copiarDesconto(this)">Copiar resultado</button>
      </div>
      <div class="notice notice-warn" id="erro-desconto" style="display:none;"><span>??</span><span id="erro-desconto-texto"></span></div>
      <div class="result-box" id="resultado-desconto">
        <div class="result-label">Resultado</div>
        <div class="result-grid">
          <div class="result-item"><div class="label">Pre�o final</div><div class="value" id="desconto-final">�</div></div>
          <div class="result-item"><div class="label">Valor economizado</div><div class="value" id="desconto-valor">�</div></div>
          <div class="result-item"><div class="label">Percentual</div><div class="value" id="desconto-percentual-res">�</div></div>
        </div>
        <div id="desconto-detalhe" style="margin-top:1rem;color:var(--text2);"></div>
      </div>
    </div>
    <?php ns_render_ad_slot('rectangle'); ?>
    <div class="seo-content">
      <h2>O que � essa ferramenta</h2>
      <p>A calculadora de desconto � uma ferramenta online criada para mostrar rapidamente quanto voc� economiza em uma compra ou negocia��o. Em vez de fazer a conta manualmente, basta informar o valor original e a porcentagem de desconto para obter o pre�o final. Esse tipo de c�lculo � muito usado em promo��es, lojas virtuais, marketplaces, or�amento de servi�os e compara��o de ofertas.</p>
      <p>Como o processamento acontece no pr�prio navegador, a resposta aparece na hora e sem sobrecarga no servidor. Isso deixa a p�gina leve, r�pida e ideal para tr�fego org�nico. Para um site com muitas utilidades, ferramentas assim t�m excelente potencial de reten��o porque resolvem uma d�vida objetiva em poucos segundos.</p>
      <h2>Como usar</h2>
      <p>Digite o valor original do produto ou servi�o no primeiro campo. No segundo, informe o percentual de desconto que ser� aplicado. Depois clique em calcular. A ferramenta mostra o pre�o com desconto, o valor economizado em reais e confirma a taxa aplicada. Se algum campo estiver vazio ou com valor inv�lido, uma mensagem amig�vel aparece logo abaixo dos bot�es.</p>
      <p>O bot�o limpar reinicia a calculadora para uma nova simula��o. J� o bot�o copiar resultado facilita o uso em atendimento, redes sociais, propostas comerciais ou compara��es de pre�o.</p>
      <h2>Exemplo de uso</h2>
      <p>Se um produto custa R$ 250,00 e recebe 15% de desconto, a economia ser� de R$ 37,50. O valor final pago ser� R$ 212,50. Esse tipo de conta � muito comum em promo��es sazonais, negocia��es B2B e campanhas de e-commerce. Ter a conta pronta evita erro de cabe�a e acelera a decis�o de compra.</p>
      <p>Tamb�m � �til para quem vende, porque ajuda a simular rapidamente o impacto de descontos diferentes antes de publicar uma oferta.</p>
      <h2>Perguntas frequentes</h2>
      <h3>Como calcular desconto percentual?</h3>
      <p>Basta multiplicar o valor original pelo percentual dividido por 100. Depois, subtraia esse desconto do valor original para encontrar o pre�o final.</p>
      <h3>Posso usar para promo��es e or�amento?</h3>
      <p>Sim. A ferramenta serve tanto para compras do dia a dia quanto para montar propostas, promo��es e campanhas de vendas.</p>
      <h3>O c�lculo � feito no servidor?</h3>
      <p>N�o. Todo o c�lculo acontece no navegador com JavaScript puro, o que melhora a velocidade e a experi�ncia do usu�rio.</p>
    </div>
    <div class="related-tools">
      <h2>Ferramentas relacionadas</h2>
      <div class="related-grid">
        <a href="<?= ns_escape(ns_href('/ferramentas/calculadora-porcentagem')) ?>" class="related-card"><span class="related-card-icon">%</span> Calculadora de Porcentagem</a>
        <a href="<?= ns_escape(ns_href('/ferramentas/juros-simples')) ?>" class="related-card"><span class="related-card-icon">??</span> Juros Simples</a>
        <a href="<?= ns_escape(ns_href('/ferramentas/simulador-financiamento')) ?>" class="related-card"><span class="related-card-icon">??</span> Simulador de Financiamento</a>
      </div>
    </div>
  </div>
</main>
<script>
  function erroDesconto(msg) {
    document.getElementById('erro-desconto-texto').textContent = msg;
    document.getElementById('erro-desconto').style.display = 'flex';
    document.getElementById('resultado-desconto').classList.remove('show');
  }
  function limparErroDesconto() {
    document.getElementById('erro-desconto').style.display = 'none';
  }
  function calcularDesconto() {
    const valor = parseFloat(document.getElementById('valor-original').value);
    const percentual = parseFloat(document.getElementById('percentual-desconto').value);
    limparErroDesconto();
    if (isNaN(valor) || isNaN(percentual)) {
      erroDesconto('Preencha o valor original e o percentual de desconto.');
      return;
    }
    if (valor <= 0 || percentual < 0) {
      erroDesconto('Use valores v�lidos e maiores que zero para simular o desconto.');
      return;
    }
    const desconto = valor * (percentual / 100);
    const final = valor - desconto;
    document.getElementById('desconto-final').textContent = 'R$ ' + fmtBRL(final);
    document.getElementById('desconto-valor').textContent = 'R$ ' + fmtBRL(desconto);
    document.getElementById('desconto-percentual-res').textContent = fmtNum(percentual, 2) + '%';
    document.getElementById('desconto-detalhe').textContent = 'Pre�o original de R$ ' + fmtBRL(valor) + ' com desconto de ' + fmtNum(percentual, 2) + '% resulta em economia de R$ ' + fmtBRL(desconto) + '.';
    showResult('resultado-desconto');
  }
  function limparDesconto() {
    document.getElementById('valor-original').value = '';
    document.getElementById('percentual-desconto').value = '';
    document.getElementById('resultado-desconto').classList.remove('show');
    limparErroDesconto();
  }
  function copiarDesconto(button) {
    const box = document.getElementById('resultado-desconto');
    if (!box.classList.contains('show')) {
      erroDesconto('Calcule o desconto antes de copiar o resultado.');
      return;
    }
    copyToClipboard(
      'Pre�o final: ' + document.getElementById('desconto-final').textContent + '\n' +
      'Economia: ' + document.getElementById('desconto-valor').textContent + '\n' +
      'Percentual: ' + document.getElementById('desconto-percentual-res').textContent,
      button
    );
  }
</script>
<?php ns_render_page_end(); ?>
