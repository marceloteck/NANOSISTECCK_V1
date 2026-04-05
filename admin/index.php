<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

ns_redirect_legacy_url('/admin');

$settings = ns_load_settings();
$saveMessage = null;
$errorMessage = null;
$pages = ns_page_definitions();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updated = $settings;

    $updated['branding']['site_name'] = trim((string) ($_POST['site_name'] ?? $settings['branding']['site_name']));
    $updated['branding']['short_name'] = trim((string) ($_POST['short_name'] ?? $settings['branding']['short_name']));
    $updated['branding']['description'] = trim((string) ($_POST['brand_description'] ?? $settings['branding']['description']));
    $updated['branding']['tagline'] = trim((string) ($_POST['tagline'] ?? $settings['branding']['tagline']));

    $updated['company']['name'] = trim((string) ($_POST['company_name'] ?? $settings['company']['name']));
    $updated['company']['url'] = rtrim(trim((string) ($_POST['company_url'] ?? $settings['company']['url'])), '/');
    $updated['company']['logo'] = trim((string) ($_POST['company_logo'] ?? $settings['company']['logo']));
    $updated['company']['email'] = trim((string) ($_POST['company_email'] ?? $settings['company']['email']));
    $updated['company']['telephone'] = trim((string) ($_POST['company_telephone'] ?? $settings['company']['telephone']));

    $updated['social']['twitter'] = trim((string) ($_POST['twitter'] ?? $settings['social']['twitter']));
    $updated['seo']['default_image'] = trim((string) ($_POST['default_image'] ?? $settings['seo']['default_image']));
    $updated['seo']['default_title'] = trim((string) ($_POST['default_title'] ?? $settings['seo']['default_title']));
    $updated['seo']['default_description'] = trim((string) ($_POST['default_description'] ?? $settings['seo']['default_description']));
    $updated['seo']['default_keywords'] = trim((string) ($_POST['default_keywords'] ?? $settings['seo']['default_keywords']));

    foreach (['leaderboard', 'rectangle'] as $slotName) {
        $updated['ads'][$slotName]['enabled'] = isset($_POST[$slotName . '_enabled']);
        $updated['ads'][$slotName]['html'] = trim((string) ($_POST[$slotName . '_html'] ?? ''));
        $updated['ads'][$slotName]['fallback_text'] = trim((string) ($_POST[$slotName . '_fallback'] ?? 'Espa�o para an�ncio'));
    }

    $updated['seo']['pages'] = $updated['seo']['pages'] ?? [];

    foreach ($pages as $pageKey => $page) {
        if ($pageKey === 'admin') {
            continue;
        }

        $prefix = 'seo_' . preg_replace('/[^a-z0-9_:-]/i', '_', $pageKey) . '_';
        $updated['seo']['pages'][$pageKey] = [
            'title' => trim((string) ($_POST[$prefix . 'title'] ?? $page['title'])),
            'description' => trim((string) ($_POST[$prefix . 'description'] ?? $page['description'])),
            'keywords' => trim((string) ($_POST[$prefix . 'keywords'] ?? $page['keywords'])),
            'og_title' => trim((string) ($_POST[$prefix . 'og_title'] ?? $page['title'])),
            'og_description' => trim((string) ($_POST[$prefix . 'og_description'] ?? $page['description'])),
            'image' => trim((string) ($_POST[$prefix . 'image'] ?? ($settings['seo']['default_image'] ?? ''))),
            'robots' => trim((string) ($_POST[$prefix . 'robots'] ?? $page['robots'])),
        ];
    }

    if (ns_save_settings($updated)) {
        $settings = ns_load_settings();
        $saveMessage = 'Configura��es salvas com sucesso.';
    } else {
        $errorMessage = 'N�o foi poss�vel gravar o arquivo de configura��o.';
    }
}

ns_render_page_start('admin', ['is_admin' => true, 'body_class' => 'admin-body']);
?>
<main>
  <section class="section">
    <div class="container admin-shell">
      <div class="section-header admin-header">
        <span class="section-eyebrow">Administra��o</span>
        <h1>Painel de SEO, branding e conte�do t�cnico</h1>
        <p>Gerencie meta tags, compartilhamento social, an�ncios e identidade do site sem duplicar configura��o entre p�ginas.</p>
      </div>

      <?php if ($saveMessage !== null): ?>
        <div class="notice notice-success"><span>?</span><span><?= ns_escape($saveMessage) ?></span></div>
      <?php endif; ?>

      <?php if ($errorMessage !== null): ?>
        <div class="notice notice-warn"><span>!</span><span><?= ns_escape($errorMessage) ?></span></div>
      <?php endif; ?>

      <div class="admin-layout">
        <aside class="admin-sidebar tool-box">
          <h2>Base implantada</h2>
          <ul class="seo-content">
            <li>URLs limpas com redirect 301</li>
            <li>Canonical, Open Graph e Twitter Cards por p�gina</li>
            <li>Sitemap e robots din�micos</li>
            <li>Estrutura pronta para novas ferramentas</li>
          </ul>
        </aside>

        <form method="post" class="admin-form">
          <section class="tool-box">
            <h2>Branding</h2>
            <div class="form-row">
              <div class="form-group">
                <label for="site_name">Nome do site</label>
                <input class="form-control" id="site_name" name="site_name" value="<?= ns_escape($settings['branding']['site_name']) ?>" />
              </div>
              <div class="form-group">
                <label for="short_name">Nome curto</label>
                <input class="form-control" id="short_name" name="short_name" value="<?= ns_escape($settings['branding']['short_name']) ?>" />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label for="brand_description">Descri��o institucional</label>
                <textarea class="form-control" id="brand_description" name="brand_description" rows="3"><?= ns_escape($settings['branding']['description']) ?></textarea>
              </div>
              <div class="form-group">
                <label for="tagline">Tagline</label>
                <textarea class="form-control" id="tagline" name="tagline" rows="3"><?= ns_escape($settings['branding']['tagline']) ?></textarea>
              </div>
            </div>
          </section>

          <section class="tool-box">
            <h2>Empresa e compartilhamento</h2>
            <div class="form-row">
              <div class="form-group">
                <label for="company_name">Empresa</label>
                <input class="form-control" id="company_name" name="company_name" value="<?= ns_escape($settings['company']['name']) ?>" />
              </div>
              <div class="form-group">
                <label for="company_url">URL base</label>
                <input class="form-control" id="company_url" name="company_url" value="<?= ns_escape($settings['company']['url']) ?>" />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label for="company_logo">Logo</label>
                <input class="form-control" id="company_logo" name="company_logo" value="<?= ns_escape($settings['company']['logo']) ?>" />
              </div>
              <div class="form-group">
                <label for="default_image">Imagem SEO padr�o</label>
                <input class="form-control" id="default_image" name="default_image" value="<?= ns_escape($settings['seo']['default_image']) ?>" />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label for="company_email">E-mail</label>
                <input class="form-control" id="company_email" name="company_email" value="<?= ns_escape($settings['company']['email']) ?>" />
              </div>
              <div class="form-group">
                <label for="company_telephone">Telefone</label>
                <input class="form-control" id="company_telephone" name="company_telephone" value="<?= ns_escape($settings['company']['telephone']) ?>" />
              </div>
            </div>
            <div class="form-group">
              <label for="twitter">Twitter/X</label>
              <input class="form-control" id="twitter" name="twitter" value="<?= ns_escape($settings['social']['twitter']) ?>" placeholder="@usuario" />
            </div>
          </section>

          <section class="tool-box">
            <h2>SEO padr�o</h2>
            <div class="form-group">
              <label for="default_title">T�tulo padr�o</label>
              <input class="form-control" id="default_title" name="default_title" value="<?= ns_escape($settings['seo']['default_title']) ?>" />
            </div>
            <div class="form-group">
              <label for="default_description">Descri��o padr�o</label>
              <textarea class="form-control" id="default_description" name="default_description" rows="3"><?= ns_escape($settings['seo']['default_description']) ?></textarea>
            </div>
            <div class="form-group">
              <label for="default_keywords">Keywords padr�o</label>
              <input class="form-control" id="default_keywords" name="default_keywords" value="<?= ns_escape($settings['seo']['default_keywords']) ?>" />
            </div>
          </section>

          <section class="tool-box">
            <h2>An�ncios</h2>
            <?php foreach (['leaderboard' => 'Leaderboard', 'rectangle' => 'Ret�ngulo'] as $slotKey => $slotLabel): ?>
              <div class="admin-subsection">
                <div class="form-group">
                  <label><input type="checkbox" name="<?= ns_escape($slotKey) ?>_enabled" <?= !empty($settings['ads'][$slotKey]['enabled']) ? 'checked' : '' ?> /> Habilitar <?= ns_escape($slotLabel) ?></label>
                </div>
                <div class="form-group">
                  <label for="<?= ns_escape($slotKey) ?>_html">HTML/Script</label>
                  <textarea class="form-control" id="<?= ns_escape($slotKey) ?>_html" name="<?= ns_escape($slotKey) ?>_html" rows="4"><?= ns_escape($settings['ads'][$slotKey]['html']) ?></textarea>
                </div>
                <div class="form-group">
                  <label for="<?= ns_escape($slotKey) ?>_fallback">Fallback</label>
                  <input class="form-control" id="<?= ns_escape($slotKey) ?>_fallback" name="<?= ns_escape($slotKey) ?>_fallback" value="<?= ns_escape($settings['ads'][$slotKey]['fallback_text']) ?>" />
                </div>
              </div>
            <?php endforeach; ?>
          </section>

          <section class="tool-box">
            <h2>SEO por p�gina</h2>
            <?php foreach ($pages as $pageKey => $page): ?>
              <?php if ($pageKey === 'admin') { continue; } ?>
              <?php $meta = ns_page_meta($pageKey); ?>
              <?php $prefix = 'seo_' . preg_replace('/[^a-z0-9_:-]/i', '_', $pageKey) . '_'; ?>
              <div class="admin-subsection">
                <h3><?= ns_escape($pageKey) ?></h3>
                <p class="admin-path"><a href="<?= ns_escape($meta['canonical']) ?>" target="_blank" rel="noopener"><?= ns_escape($meta['path']) ?></a></p>
                <div class="form-group">
                  <label for="<?= ns_escape($prefix) ?>title">Title</label>
                  <input class="form-control" id="<?= ns_escape($prefix) ?>title" name="<?= ns_escape($prefix) ?>title" value="<?= ns_escape($meta['title']) ?>" />
                </div>
                <div class="form-group">
                  <label for="<?= ns_escape($prefix) ?>description">Description</label>
                  <textarea class="form-control" id="<?= ns_escape($prefix) ?>description" name="<?= ns_escape($prefix) ?>description" rows="3"><?= ns_escape($meta['description']) ?></textarea>
                </div>
                <div class="form-group">
                  <label for="<?= ns_escape($prefix) ?>keywords">Keywords</label>
                  <input class="form-control" id="<?= ns_escape($prefix) ?>keywords" name="<?= ns_escape($prefix) ?>keywords" value="<?= ns_escape($meta['keywords']) ?>" />
                </div>
                <div class="form-row">
                  <div class="form-group">
                    <label for="<?= ns_escape($prefix) ?>og_title">OG Title</label>
                    <input class="form-control" id="<?= ns_escape($prefix) ?>og_title" name="<?= ns_escape($prefix) ?>og_title" value="<?= ns_escape($meta['og_title']) ?>" />
                  </div>
                  <div class="form-group">
                    <label for="<?= ns_escape($prefix) ?>image">Imagem</label>
                    <input class="form-control" id="<?= ns_escape($prefix) ?>image" name="<?= ns_escape($prefix) ?>image" value="<?= ns_escape($meta['image']) ?>" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="<?= ns_escape($prefix) ?>og_description">OG Description</label>
                  <textarea class="form-control" id="<?= ns_escape($prefix) ?>og_description" name="<?= ns_escape($prefix) ?>og_description" rows="2"><?= ns_escape($meta['og_description']) ?></textarea>
                </div>
                <div class="form-group">
                  <label for="<?= ns_escape($prefix) ?>robots">Robots</label>
                  <input class="form-control" id="<?= ns_escape($prefix) ?>robots" name="<?= ns_escape($prefix) ?>robots" value="<?= ns_escape($meta['robots']) ?>" />
                </div>
              </div>
            <?php endforeach; ?>
          </section>

          <button class="btn btn-primary btn-lg" type="submit">Salvar painel</button>
        </form>
      </div>
    </div>
  </section>
</main>
<?php ns_render_page_end(); ?>
