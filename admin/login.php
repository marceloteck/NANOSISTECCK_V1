<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

ns_redirect_legacy_url('/admin/login');
ns_admin_start_session();

if (ns_admin_is_authenticated()) {
    header('Location: ' . ns_href('/admin'));
    exit;
}

if (!ns_admin_has_any_user()) {
    header('Location: ' . ns_href('/admin/cadastro'));
    exit;
}

$errorMessage = null;
$successMessage = isset($_GET['created']) ? 'Usuário criado com sucesso. Faça login.' : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim((string) ($_POST['username'] ?? ''));
    $password = (string) ($_POST['password'] ?? '');

    if (!ns_csrf_validate($_POST['csrf_token'] ?? null)) {
        $errorMessage = 'Sessão inválida. Recarregue a página.';
    } elseif ($username === '' || $password === '') {
        $errorMessage = 'Informe usuário e senha.';
    } elseif (ns_admin_is_rate_limited($username)) {
        $errorMessage = 'Muitas tentativas inválidas. Aguarde 15 minutos e tente novamente.';
    } else {
        $user = ns_admin_verify_credentials($username, $password);

        if ($user !== null) {
            ns_admin_record_login_attempt($username, true);
            ns_admin_login($user);
            header('Location: ' . ns_href('/admin'));
            exit;
        }

        ns_admin_record_login_attempt($username, false);
        $errorMessage = 'Credenciais inválidas.';
    }
}

ns_render_page_start('admin_login', ['is_admin' => true, 'body_class' => 'admin-body']);
?>
<main>
  <section class="section">
    <div class="container" style="max-width: 520px;">
      <div class="tool-box">
        <h1>Login do Administrador</h1>
        <p>Use sua conta de administrador para acessar o painel seguro.</p>

        <?php if ($errorMessage !== null): ?>
          <div class="notice notice-warn"><span>!</span><span><?= ns_escape($errorMessage) ?></span></div>
        <?php endif; ?>

        <?php if ($successMessage !== null): ?>
          <div class="notice notice-success"><span>✓</span><span><?= ns_escape($successMessage) ?></span></div>
        <?php endif; ?>

        <form method="post" class="admin-form" autocomplete="off">
          <input type="hidden" name="csrf_token" value="<?= ns_escape(ns_csrf_token()) ?>" />
          <div class="form-group">
            <label for="username">Usuário</label>
            <input class="form-control" id="username" name="username" maxlength="80" required />
          </div>
          <div class="form-group">
            <label for="password">Senha</label>
            <input class="form-control" id="password" name="password" type="password" maxlength="255" required />
          </div>
          <button class="btn btn-primary btn-lg" type="submit">Entrar</button>
        </form>
      </div>
    </div>
  </section>
</main>
<?php ns_render_page_end(); ?>
