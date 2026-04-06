<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

if (PHP_SAPI !== 'cli') {
    fwrite(STDERR, "Este script deve ser executado via CLI.\n");
    exit(1);
}

$username = trim((string) ($argv[1] ?? ''));
$password = (string) ($argv[2] ?? '');

if ($username === '' || $password === '') {
    fwrite(STDERR, "Uso: php scripts/create_admin_user.php <usuario> <senha>\n");
    exit(1);
}

if (strlen($password) < 12) {
    fwrite(STDERR, "A senha precisa ter no mínimo 12 caracteres.\n");
    exit(1);
}

$pdo = ns_admin_db();
$normalizedUsername = strtolower($username);
$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare('INSERT INTO admin_users (username, password_hash, is_active) VALUES (:username, :password_hash, 1)
    ON CONFLICT(username) DO UPDATE SET password_hash = excluded.password_hash, is_active = 1, updated_at = CURRENT_TIMESTAMP');

$stmt->execute([
    ':username' => $normalizedUsername,
    ':password_hash' => $hash,
]);

fwrite(STDOUT, "Usuário administrador '{$normalizedUsername}' criado/atualizado com sucesso.\n");
