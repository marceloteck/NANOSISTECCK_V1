<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/config/bootstrap.php';
ns_redirect_legacy_url('/ferramentas/remover-espacos-extras');
ns_render_page_start('tool:remover-espacos-extras');
?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span>Remover Espaços Extras</span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#fff5ea,#ffdabb);">✂️</div><div><h1>Remover Espaços Extras</h1><p>Limpe espaços duplicados, linhas com excesso de separação e deixe o texto mais organizado em um clique.</p><span class="tag tag-orange">Texto</span></div></div>
  <div class="tool-box">
    <div class="form-group"><label for="texto-espacos">Texto original</label><textarea id="texto-espacos" class="form-control" rows="9" placeholder="Cole o texto com espaços extras aqui..."></textarea></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="removerEspacos()">Limpar texto</button><button type="button" class="btn btn-outline" onclick="limparEspacos()">Limpar campos</button><button type="button" class="copy-btn" onclick="copiarEspacos(this)">Copiar resultado</button></div>
    <div class="notice notice-warn" id="erro-espacos" style="display:none;"><span>⚠️</span><span id="erro-espacos-texto"></span></div>
    <div class="form-group" style="margin-top:1rem;"><label for="texto-espacos-resultado">Resultado</label><textarea id="texto-espacos-resultado" class="form-control" rows="9" readonly></textarea></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
  <div class="seo-content"><h2>O que é essa ferramenta</h2><p>A ferramenta de remover espaços extras foi criada para limpar textos com formatação ruim, muito comuns após copiar conteúdo de PDF, planilha, e-mail ou páginas da web. Ela reduz espaços duplicados, remove excesso nas extremidades e melhora a legibilidade.</p><p>Esse tipo de limpeza é útil em produção de conteúdo, atendimento, documentação, cadastro e revisão editorial.</p><h2>Como usar</h2><p>Cole o texto na caixa principal e clique em limpar texto. O sistema normaliza espaços repetidos e devolve o conteúdo pronto para uso na área de resultado. Se o campo estiver vazio, a página exibe uma mensagem amigável.</p><p>O botão copiar resultado ajuda a reaproveitar o texto tratado com rapidez.</p><h2>Exemplo de uso</h2><p>Se um texto veio com vários espaços entre palavras ou com linhas quebradas de forma irregular, a ferramenta ajusta isso automaticamente. O conteúdo continua o mesmo, mas com leitura muito melhor.</p><p>Isso economiza tempo em tarefas repetitivas e evita correções manuais cansativas.</p><h2>Perguntas frequentes</h2><h3>Ela apaga palavras?</h3><p>Não. A ferramenta apenas normaliza espaços, preservando o conteúdo textual.</p><h3>Funciona com textos longos?</h3><p>Sim. O processamento acontece localmente no navegador e é rápido para uso comum.</p><h3>Posso colar conteúdo de PDF?</h3><p>Sim. Essa é uma das utilidades mais comuns da ferramenta.</p></div>
  <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/contador-palavras')) ?>" class="related-card"><span class="related-card-icon">📄</span> Contador de Palavras</a><a href="<?= ns_escape(ns_href('/ferramentas/inverter-texto')) ?>" class="related-card"><span class="related-card-icon">🔁</span> Inverter Texto</a><a href="<?= ns_escape(ns_href('/ferramentas/capitalizar-texto')) ?>" class="related-card"><span class="related-card-icon">✍️</span> Capitalizar Texto</a></div></div>
</div></main>
<script>
function erroEspacos(msg){document.getElementById('erro-espacos-texto').textContent=msg;document.getElementById('erro-espacos').style.display='flex';}
function limparErroEspacos(){document.getElementById('erro-espacos').style.display='none';}
function removerEspacos(){const texto=document.getElementById('texto-espacos').value;limparErroEspacos();if(!texto.trim()){erroEspacos('Cole ou digite um texto para limpar.');return;}const resultado=texto.replace(/[ \t]+/g,' ').replace(/\s*\n\s*/g,'\n').trim();document.getElementById('texto-espacos-resultado').value=resultado;}
function limparEspacos(){document.getElementById('texto-espacos').value='';document.getElementById('texto-espacos-resultado').value='';limparErroEspacos();}
function copiarEspacos(button){const texto=document.getElementById('texto-espacos-resultado').value;if(!texto){erroEspacos('Gere um resultado antes de copiar.');return;}copyToClipboard(texto,button);}
</script>
<?php ns_render_page_end(); ?>
