<?php

declare(strict_types=1);

require_once __DIR__ . '/config/bootstrap.php';

ns_redirect_legacy_url('/politica-de-privacidade');
ns_render_page_start('privacy');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navegação breadcrumb">
      <a href="<?= ns_escape(ns_href('/')) ?>">Início</a>
      <span class="sep">›</span>
      <span>Política de Privacidade</span>
    </nav>

    <h1 style="margin-bottom:1.5rem;">Política de Privacidade</h1>
    <div class="seo-content">
      <p>Última atualização: abril de 2026</p>
      <p>O <strong>NANOSISTECCK Tools</strong> valoriza a privacidade dos visitantes. Esta política resume como tratamos dados, cookies e recursos de terceiros.</p>

      <h2>1. Processamento das ferramentas</h2>
      <p>As ferramentas disponíveis nesta plataforma foram desenhadas para funcionar localmente no navegador sempre que possível. Isso reduz exposição de dados e melhora performance.</p>

      <h2>2. Dados técnicos e navegação</h2>
      <p>O servidor pode registrar dados técnicos básicos, como IP, navegador, páginas acessadas e tempo de resposta, para diagnóstico, segurança e melhoria contínua da plataforma.</p>

      <h2>3. Cookies e terceiros</h2>
      <p>O site pode utilizar cookies de medição, segurança e publicidade. Quando houver integração com Google AdSense, Analytics ou serviços equivalentes, esses provedores podem aplicar suas próprias políticas.</p>

      <h2>4. Compartilhamento e links externos</h2>
      <p>Páginas podem conter links para serviços externos. O NANOSISTECCK não controla a política de privacidade desses destinos e recomenda leitura direta nas fontes originais.</p>

      <h2>5. Direitos do titular</h2>
      <p>Nos termos da LGPD, o titular pode solicitar esclarecimentos sobre eventual tratamento de dados pessoais. Caso exista coleta identificável em alguma integração futura, os canais oficiais deverão atender a essa demanda.</p>

      <h2>6. Atualizações desta política</h2>
      <p>Esta página pode ser atualizada para refletir mudanças técnicas, legais ou operacionais. A versão publicada nesta URL substitui as anteriores.</p>
    </div>
  </div>
</main>
<?php ns_render_page_end(); ?>
