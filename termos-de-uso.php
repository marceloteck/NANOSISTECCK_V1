<?php

declare(strict_types=1);

require_once __DIR__ . '/config/bootstrap.php';

ns_redirect_legacy_url('/termos-de-uso');
ns_render_page_start('terms');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navegação breadcrumb">
      <a href="<?= ns_escape(ns_href('/')) ?>">Início</a>
      <span class="sep">›</span>
      <span>Termos de Uso</span>
    </nav>

    <h1 style="margin-bottom:1.5rem;">Termos de Uso</h1>
    <div class="seo-content">
      <p>Última atualização: abril de 2026</p>
      <p>Ao acessar o <strong>NANOSISTECCK Tools</strong>, você concorda com estes termos para uso das ferramentas, conteúdos e recursos administrativos da plataforma.</p>

      <h2>1. Uso permitido</h2>
      <p>As ferramentas são fornecidas para uso pessoal, educacional e profissional legítimo. É proibido utilizá-las para fraude, abuso, automação maliciosa ou qualquer prática ilegal.</p>

      <h2>2. Resultados e responsabilidade</h2>
      <p>Calculadoras e geradores entregam resultados baseados nas entradas informadas. O usuário é responsável por validar números, fórmulas e impacto operacional antes de tomar decisões financeiras, jurídicas ou técnicas.</p>

      <h2>3. Uso do gerador de CPF</h2>
      <p>O gerador de CPF existe exclusivamente para desenvolvimento, QA e educação. O uso de documentos gerados para fraude, cadastro indevido ou falsidade ideológica é proibido.</p>

      <h2>4. Disponibilidade do serviço</h2>
      <p>A plataforma pode evoluir, ser modificada ou ficar indisponível temporariamente por manutenção, implantação ou ajustes de infraestrutura sem aviso prévio.</p>

      <h2>5. Propriedade intelectual</h2>
      <p>Layout, código, textos, estrutura e identidade visual pertencem ao NANOSISTECCK, exceto quando indicado de outra forma. Reprodução integral sem autorização não é permitida.</p>

      <h2>6. Mudanças futuras</h2>
      <p>Os termos podem ser ajustados a qualquer momento. O uso contínuo do site após alterações representa concordância com a versão vigente.</p>
    </div>
  </div>
</main>
<?php ns_render_page_end(); ?>
