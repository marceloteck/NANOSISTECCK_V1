<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/config/bootstrap.php';
ns_redirect_legacy_url('/ferramentas/texto-maiusculo');
ns_render_page_start('tool:texto-maiusculo');
?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navega��o breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">In�cio</a><span class="sep">�</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">�</span><span>Texto Mai�sculo</span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#eef5ff,#d4e2ff);">??</div><div><h1>Texto Mai�sculo Online</h1><p>Converta qualquer frase para letras mai�sculas com velocidade, sem instalar nada e com bot�o de copiar.</p><span class="tag tag-blue">Texto</span></div></div>
  <div class="tool-box">
    <div class="form-group"><label for="texto-maiusculo-entrada">Texto original</label><textarea id="texto-maiusculo-entrada" class="form-control" rows="9" placeholder="Digite o texto..."></textarea></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="converterMaiusculo()">Converter</button><button type="button" class="btn btn-outline" onclick="limparMaiusculo()">Limpar</button><button type="button" class="copy-btn" onclick="copiarMaiusculo(this)">Copiar resultado</button></div>
    <div class="notice notice-warn" id="erro-maiusculo" style="display:none;"><span>??</span><span id="erro-maiusculo-texto"></span></div>
    <div class="form-group" style="margin-top:1rem;"><label for="texto-maiusculo-resultado">Resultado</label><textarea id="texto-maiusculo-resultado" class="form-control" rows="9" readonly></textarea></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
  <div class="seo-content"><h2>O que esta ferramenta resolve</h2><p>Texto Mai�sculo Online foi estruturada para resolver uma tarefa prática com execução rápida no navegador, sem instalação. Converta qualquer frase para letras mai�sculas com velocidade, sem instalar nada e com bot�o de copiar.</p><h2>Quando usar</h2><p>Use quando você precisa de uma resposta imediata para trabalho, estudo, operação ou validação técnica e quer reduzir retrabalho.</p><h2>Quando NÃO usar</h2><p>Não use como única base para decisões críticas sem revisão humana, validação de contexto e conferência de unidades/entradas.</p><h2>Erros comuns</h2><ul><li>Preencher campos com unidade errada.</li><li>Interpretar resultado sem contexto do problema real.</li><li>Copiar saída sem validar premissas e limites.</li></ul><h2>Exemplo prático</h2><p>Preencha os campos com dados reais, execute, valide a interpretação exibida na tela e só então use o resultado em relatório, orçamento ou documentação.</p><h2>Boas práticas de qualidade</h2><p>Revise dados de entrada, mantenha rastreabilidade da origem dos números e faça dupla checagem quando o resultado impactar finanças, saúde, jurídico ou compliance.</p></div><div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/texto-minusculo')) ?>" class="related-card"><span class="related-card-icon">??</span> Texto Min�sculo</a><a href="<?= ns_escape(ns_href('/ferramentas/capitalizar-texto')) ?>" class="related-card"><span class="related-card-icon">??</span> Capitalizar Texto</a><a href="<?= ns_escape(ns_href('/ferramentas/contador-palavras')) ?>" class="related-card"><span class="related-card-icon">??</span> Contador de Palavras</a></div></div>
</div></main>
<script>
function erroMaiusculo(msg){document.getElementById('erro-maiusculo-texto').textContent=msg;document.getElementById('erro-maiusculo').style.display='flex';}
function limparErroMaiusculo(){document.getElementById('erro-maiusculo').style.display='none';}
function converterMaiusculo(){const texto=document.getElementById('texto-maiusculo-entrada').value;limparErroMaiusculo();if(!texto){erroMaiusculo('Digite um texto para converter.');return;}document.getElementById('texto-maiusculo-resultado').value=texto.toLocaleUpperCase('pt-BR');}
function limparMaiusculo(){document.getElementById('texto-maiusculo-entrada').value='';document.getElementById('texto-maiusculo-resultado').value='';limparErroMaiusculo();}
function copiarMaiusculo(button){const texto=document.getElementById('texto-maiusculo-resultado').value;if(!texto){erroMaiusculo('Gere o texto convertido antes de copiar.');return;}copyToClipboard(texto,button);}
</script>
<?php ns_render_page_end(); ?>
