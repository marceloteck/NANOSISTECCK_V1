<?php

declare(strict_types=1);

require_once __DIR__ . '/config/bootstrap.php';

ns_redirect_legacy_url('/termos-de-uso');
ns_render_page_start('terms');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navega��o breadcrumb">
      <a href="<?= ns_escape(ns_href('/')) ?>">In�cio</a>
      <span class="sep">�</span>
      <span>Termos de Uso</span>
    </nav>

    <h1 style="margin-bottom:1.5rem;">Termos de Uso</h1>
    <div class="seo-content">
      <p>�ltima atualiza��o: abril de 2026</p>
      <p>Ao acessar o <strong>NANOSISTECCK Tools</strong>, voc� concorda com estes termos para uso das ferramentas, conte�dos e recursos administrativos da plataforma.</p>

      <h2>1. Uso permitido</h2>
      <p>As ferramentas s�o fornecidas para uso pessoal, educacional e profissional leg�timo. � proibido utiliz�-las para fraude, abuso, automa��o maliciosa ou qualquer pr�tica ilegal.</p>

      <h2>2. Resultados e responsabilidade</h2>
      <p>Calculadoras e geradores entregam resultados baseados nas entradas informadas. O usu�rio � respons�vel por validar n�meros, f�rmulas e impacto operacional antes de tomar decis�es financeiras, jur�dicas ou t�cnicas.</p>

      <h2>3. Uso do gerador de CPF</h2>
      <p>O gerador de CPF existe exclusivamente para desenvolvimento, QA e educa��o. O uso de documentos gerados para fraude, cadastro indevido ou falsidade ideol�gica � proibido.</p>

      <h2>4. Disponibilidade do servi�o</h2>
      <p>A plataforma pode evoluir, ser modificada ou ficar indispon�vel temporariamente por manuten��o, implanta��o ou ajustes de infraestrutura sem aviso pr�vio.</p>

      <h2>5. Propriedade intelectual</h2>
      <p>Layout, c�digo, textos, estrutura e identidade visual pertencem ao NANOSISTECCK, exceto quando indicado de outra forma. Reprodu��o integral sem autoriza��o n�o � permitida.</p>

      <h2>6. Mudan�as futuras</h2>
      <p>Os termos podem ser ajustados a qualquer momento. O uso cont�nuo do site ap�s altera��es representa concord�ncia com a vers�o vigente.</p>
    </div>
  </div>
</main>
<?php ns_render_page_end(); ?>
