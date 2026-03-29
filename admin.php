<?php
$settingsFile = __DIR__ . '/config/site-settings.json';
$saveMessage = null;
$errorMessage = null;

function loadSettings(string $file): array {
  if (!file_exists($file)) {
    return [
      'branding' => ['site_name' => 'NANOSISTECCK', 'description' => ''],
      'ads' => [
        'leaderboard' => ['enabled' => false, 'html' => '', 'fallback_text' => '📢 Espaço para Anúncio'],
        'rectangle' => ['enabled' => false, 'html' => '', 'fallback_text' => '📢 Espaço para Anúncio'],
      ],
    ];
  }

  $raw = file_get_contents($file);
  $decoded = json_decode($raw, true);
  return is_array($decoded) ? $decoded : [];
}

$settings = loadSettings($settingsFile);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $settings = [
    'branding' => [
      'site_name' => trim($_POST['site_name'] ?? 'NANOSISTECCK'),
      'description' => trim($_POST['description'] ?? ''),
    ],
    'ads' => [
      'leaderboard' => [
        'enabled' => isset($_POST['leaderboard_enabled']),
        'html' => trim($_POST['leaderboard_html'] ?? ''),
        'fallback_text' => trim($_POST['leaderboard_fallback'] ?? '📢 Espaço para Anúncio'),
      ],
      'rectangle' => [
        'enabled' => isset($_POST['rectangle_enabled']),
        'html' => trim($_POST['rectangle_html'] ?? ''),
        'fallback_text' => trim($_POST['rectangle_fallback'] ?? '📢 Espaço para Anúncio'),
      ],
    ],
  ];

  $encoded = json_encode($settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
  if ($encoded === false) {
    $errorMessage = 'Falha ao serializar configurações.';
  } elseif (file_put_contents($settingsFile, $encoded . PHP_EOL) === false) {
    $errorMessage = 'Não foi possível salvar o arquivo de configuração.';
  } else {
    $saveMessage = 'Configurações salvas com sucesso!';
  }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Painel Administrador | NANOSISTECCK Tools</title>
  <meta name="robots" content="noindex, nofollow" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <header class="site-header" id="site-header"></header>

  <main>
    <section class="section">
      <div class="container" style="max-width: 900px;">
        <div class="section-header" style="text-align:left; margin-bottom:1.5rem;">
          <span class="section-eyebrow">⚙️ Administração</span>
          <h1>Painel de Configuração Externa</h1>
          <p>Configure marca, anúncios e conteúdos sem editar código-fonte.</p>
        </div>

        <?php if ($saveMessage): ?>
          <div class="notice notice-success" style="margin-bottom:1rem;"><span>✅</span><span><?= htmlspecialchars($saveMessage) ?></span></div>
        <?php endif; ?>

        <?php if ($errorMessage): ?>
          <div class="notice notice-warn" style="margin-bottom:1rem;"><span>⚠️</span><span><?= htmlspecialchars($errorMessage) ?></span></div>
        <?php endif; ?>

        <form method="post" class="tool-box">
          <h2 style="margin-top:0;">Branding</h2>
          <div class="form-row">
            <div class="form-group">
              <label for="site_name">Nome do site</label>
              <input class="form-control" id="site_name" name="site_name" value="<?= htmlspecialchars($settings['branding']['site_name'] ?? 'NANOSISTECCK') ?>" />
            </div>
            <div class="form-group">
              <label for="description">Descrição curta</label>
              <input class="form-control" id="description" name="description" value="<?= htmlspecialchars($settings['branding']['description'] ?? '') ?>" />
            </div>
          </div>

          <h2>Anúncio Leaderboard</h2>
          <div class="form-group">
            <label><input type="checkbox" name="leaderboard_enabled" <?= !empty($settings['ads']['leaderboard']['enabled']) ? 'checked' : '' ?> /> Habilitar código personalizado</label>
          </div>
          <div class="form-group">
            <label for="leaderboard_html">HTML/Script do anúncio</label>
            <textarea class="form-control" id="leaderboard_html" name="leaderboard_html" rows="6" placeholder="Cole aqui seu script AdSense ou outra rede."><?= htmlspecialchars($settings['ads']['leaderboard']['html'] ?? '') ?></textarea>
          </div>
          <div class="form-group">
            <label for="leaderboard_fallback">Texto de fallback</label>
            <input class="form-control" id="leaderboard_fallback" name="leaderboard_fallback" value="<?= htmlspecialchars($settings['ads']['leaderboard']['fallback_text'] ?? '') ?>" />
          </div>

          <h2>Anúncio Retângulo</h2>
          <div class="form-group">
            <label><input type="checkbox" name="rectangle_enabled" <?= !empty($settings['ads']['rectangle']['enabled']) ? 'checked' : '' ?> /> Habilitar código personalizado</label>
          </div>
          <div class="form-group">
            <label for="rectangle_html">HTML/Script do anúncio</label>
            <textarea class="form-control" id="rectangle_html" name="rectangle_html" rows="6" placeholder="Cole aqui seu script AdSense ou outra rede."><?= htmlspecialchars($settings['ads']['rectangle']['html'] ?? '') ?></textarea>
          </div>
          <div class="form-group">
            <label for="rectangle_fallback">Texto de fallback</label>
            <input class="form-control" id="rectangle_fallback" name="rectangle_fallback" value="<?= htmlspecialchars($settings['ads']['rectangle']['fallback_text'] ?? '') ?>" />
          </div>

          <button class="btn btn-primary btn-lg" type="submit">💾 Salvar configurações</button>
        </form>
      </div>
    </section>
  </main>

  <footer class="site-footer" id="site-footer"></footer>
  <script src="js/main.js"></script>
  <script src="js/layout.js"></script>
</body>
</html>
