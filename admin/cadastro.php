<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

ns_redirect_legacy_url('/admin/cadastro');
ns_admin_start_session();

if (ns_admin_has_any_user()) {
    header('Location: ' . ns_href('/admin/login'));
    exit;
}

$errorMessage = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = strtolower(trim((string) ($_POST['username'] ?? '')));
    $password = (string) ($_POST['password'] ?? '');
    $passwordConfirm = (string) ($_POST['password_confirm'] ?? '');

    if (!ns_csrf_validate($_POST['csrf_token'] ?? null)) {
        $errorMessage = 'Sessão inválida. Recarregue a página.';
    } elseif (!preg_match('/^[a-z0-9._-]{4,80}$/', $username)) {
        $errorMessage = 'Usuário inválido. Use 4-80 caracteres (a-z, 0-9, ponto, _ e -).';
    } elseif (strlen($password) < 12) {
        $errorMessage = 'A senha precisa ter pelo menos 12 caracteres.';
    } elseif ($password !== $passwordConfirm) {
        $errorMessage = 'As senhas não conferem.';
    } else {
        try {
            $pdo = ns_admin_db();
            $stmt = $pdo->prepare('INSERT INTO admin_users (username, password_hash, is_active) VALUES (:username, :password_hash, 1)');
            $stmt->execute([
                ':username' => $username,
                ':password_hash' => password_hash($password, PASSWORD_DEFAULT),
            ]);

            session_regenerate_id(true);
            header('Location: ' . ns_href('/admin/login?created=1'));
            exit;
        } catch (Throwable $exception) {
            $errorMessage = 'Não foi possível concluir o cadastro inicial.';
        }
    }
}

ns_render_page_start('admin_register', ['is_admin' => true, 'body_class' => 'admin-body']);
?>
<main>
  <section class="section">
    <div class="container" style="max-width: 560px;">
      <div class="tool-box">
        <h1>Cadastro inicial do administrador</h1>
        <p>Este cadastro funciona somente uma vez. Depois que o primeiro usuário for criado, esta página redireciona para o login.</p>

        <?php if ($errorMessage !== null): ?>
          <div class="notice notice-warn"><span>!</span><span><?= ns_escape($errorMessage) ?></span></div>
        <?php endif; ?>

        <form method="post" class="admin-form" autocomplete="off">
          <input type="hidden" name="csrf_token" value="<?= ns_escape(ns_csrf_token()) ?>" />

          <div class="form-group">
            <label for="username">Usuário</label>
            <input class="form-control" id="username" name="username" maxlength="80" required />
          </div>

          <div class="form-group">
            <label for="password">Senha (mín. 12 caracteres)</label>
            <input class="form-control" id="password" name="password" type="password" maxlength="255" required />
          </div>

          <div class="form-group">
            <label for="password_confirm">Confirmar senha</label>
            <input class="form-control" id="password_confirm" name="password_confirm" type="password" maxlength="255" required />
          </div>

          <button class="btn btn-primary btn-lg" type="submit">Criar usuário admin</button>
        </form>
      </div>
    </div>
  </section>
</main>
<?php ns_render_page_end(); ?>
