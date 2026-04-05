<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/config/bootstrap.php';
ns_redirect_legacy_url('/ferramentas/inverter-texto');
ns_render_page_start('tool:inverter-texto');
?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span>Inverter Texto</span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#eaf7ff,#cde6ff);">🔁</div><div><h1>Inverter Texto Online</h1><p>Reverta rapidamente a ordem dos caracteres de qualquer frase, palavra ou bloco de texto.</p><span class="tag tag-blue">Texto</span></div></div>
  <div class="tool-box">
    <div class="form-group"><label for="texto-inverter">Texto original</label><textarea id="texto-inverter" class="form-control" rows="9" placeholder="Digite o texto para inverter..."></textarea></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="inverterTexto()">Inverter texto</button><button type="button" class="btn btn-outline" onclick="limparInversao()">Limpar</button><button type="button" class="copy-btn" onclick="copiarInversao(this)">Copiar resultado</button></div>
    <div class="notice notice-warn" id="erro-inverter" style="display:none;"><span>⚠️</span><span id="erro-inverter-texto"></span></div>
    <div class="form-group" style="margin-top:1rem;"><label for="texto-invertido">Resultado</label><textarea id="texto-invertido" class="form-control" rows="9" readonly></textarea></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
  <div class="seo-content"><h2>O que é essa ferramenta</h2><p>A ferramenta de inverter texto transforma a sequência dos caracteres e devolve o conteúdo ao contrário. Ela é útil em brincadeiras, testes de interface, manipulação simples de strings e pequenos experimentos com texto.</p><p>Por ser uma operação leve feita em JavaScript puro, o resultado aparece na hora e sem custos extras de servidor.</p><h2>Como usar</h2><p>Digite ou cole o texto no campo principal e clique em inverter texto. O resultado será exibido na segunda caixa, pronto para cópia. Se nada for digitado, a página mostra uma mensagem amigável orientando o preenchimento.</p><p>O botão limpar reinicia os dois campos para uma nova conversão.</p><h2>Exemplo de uso</h2><p>Ao inserir a palavra "teste", o resultado será "etset". Em textos maiores, o comportamento é o mesmo, apenas invertendo toda a sequência de caracteres.</p><p>Isso pode ser útil para demonstração, validação rápida e uso recreativo.</p><h2>Perguntas frequentes</h2><h3>Ela inverte palavras ou letras?</h3><p>Nesta versão, a ferramenta inverte a sequência completa de caracteres.</p><h3>Posso usar com frases longas?</h3><p>Sim. O processamento é local e rápido para uso normal.</p><h3>O texto original é alterado?</h3><p>Não. O conteúdo original permanece na primeira caixa e o resultado aparece em uma área separada.</p></div>
  <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/texto-maiusculo')) ?>" class="related-card"><span class="related-card-icon">🔠</span> Texto Maiúsculo</a><a href="<?= ns_escape(ns_href('/ferramentas/texto-minusculo')) ?>" class="related-card"><span class="related-card-icon">🔡</span> Texto Minúsculo</a><a href="<?= ns_escape(ns_href('/ferramentas/remover-espacos-extras')) ?>" class="related-card"><span class="related-card-icon">✂️</span> Remover Espaços</a></div></div>
</div></main>
<script>
function erroInverter(msg){document.getElementById('erro-inverter-texto').textContent=msg;document.getElementById('erro-inverter').style.display='flex';}
function limparErroInverter(){document.getElementById('erro-inverter').style.display='none';}
function inverterTexto(){const texto=document.getElementById('texto-inverter').value;limparErroInverter();if(!texto){erroInverter('Digite um texto para inverter.');return;}document.getElementById('texto-invertido').value=texto.split('').reverse().join('');}
function limparInversao(){document.getElementById('texto-inverter').value='';document.getElementById('texto-invertido').value='';limparErroInverter();}
function copiarInversao(button){const texto=document.getElementById('texto-invertido').value;if(!texto){erroInverter('Gere o texto invertido antes de copiar.');return;}copyToClipboard(texto,button);}
</script>
<?php ns_render_page_end(); ?>
