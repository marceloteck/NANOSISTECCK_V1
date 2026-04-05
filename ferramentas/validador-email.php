<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/config/bootstrap.php';
ns_redirect_legacy_url('/ferramentas/validador-email');
ns_render_page_start('tool:validador-email');
?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span>Validador de Email</span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#fff4ef,#ffd8c6);">📧</div><div><h1>Validador de Email Online</h1><p>Verifique rapidamente se o formato de um email parece válido antes de usar em formulário, cadastro ou integração.</p><span class="tag tag-orange">Desenvolvimento</span></div></div>
  <div class="tool-box">
    <div class="form-group"><label for="email-entrada">Email</label><input type="email" id="email-entrada" class="form-control" placeholder="nome@dominio.com" /></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="validarEmail()">Validar email</button><button type="button" class="btn btn-outline" onclick="limparEmail()">Limpar</button><button type="button" class="copy-btn" onclick="copiarEmail(this)">Copiar diagnóstico</button></div>
    <div class="result-box show" id="resultado-email"><div class="result-label">Diagnóstico</div><div class="result-value" id="email-status">Aguardando validação</div><div id="email-detalhe" style="margin-top:1rem;color:var(--text2);">Digite um email e clique no botão para validar o formato.</div></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
  <div class="seo-content"><h2>O que é essa ferramenta</h2><p>O validador de email online verifica se um endereço informado segue um formato básico válido. É útil em testes, integração de formulários, depuração de cadastros e revisão rápida de listas.</p><p>Essa verificação não confirma se a caixa existe, apenas se a estrutura informada está correta.</p><h2>Como usar</h2><p>Digite o email no campo principal e clique em validar. A ferramenta retorna se o formato parece válido ou se há erro estrutural. O diagnóstico pode ser copiado para uso em QA, suporte ou documentação.</p><p>O processo é todo feito no navegador, de forma rápida e simples.</p><h2>Exemplo de uso</h2><p>Se um formulário está rejeitando um cadastro, essa ferramenta ajuda a testar se o endereço informado contém domínio, usuário e separadores esperados. Isso economiza tempo em revisão manual.</p><p>É útil para desenvolvedores, suporte e usuários finais.</p><h2>Perguntas frequentes</h2><h3>O email testado é enviado para algum lugar?</h3><p>Não. A validação acontece localmente no navegador.</p><h3>Ela verifica se a caixa existe?</h3><p>Não. A ferramenta valida apenas o formato do endereço.</p><h3>Serve para formulários?</h3><p>Sim. Pode ajudar a revisar entradas e mensagens de validação.</p></div>
  <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/gerador-slug-url')) ?>" class="related-card"><span class="related-card-icon">🔗</span> Gerador de Slug</a><a href="<?= ns_escape(ns_href('/ferramentas/formatador-json')) ?>" class="related-card"><span class="related-card-icon">🧩</span> Formatador JSON</a><a href="<?= ns_escape(ns_href('/ferramentas/gerador-senhas')) ?>" class="related-card"><span class="related-card-icon">🔐</span> Gerador de Senhas</a></div></div>
</div></main>
<script>
function validarEmail(){const email=document.getElementById('email-entrada').value.trim();const valido=/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);document.getElementById('email-status').textContent=email?(valido?'Formato válido':'Formato inválido'):'Aguardando validação';document.getElementById('email-detalhe').textContent=email?(valido?'A estrutura do email atende a uma validação básica de formato.':'O endereço informado não parece seguir um formato válido de email.'):'Digite um email e clique no botão para validar o formato.';}
function limparEmail(){document.getElementById('email-entrada').value='';validarEmail();}
function copiarEmail(button){copyToClipboard(document.getElementById('email-status').textContent+'\n'+document.getElementById('email-detalhe').textContent,button);}
</script>
<?php ns_render_page_end(); ?>
