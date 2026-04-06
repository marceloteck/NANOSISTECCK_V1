<?php

declare(strict_types=1);

function ns_admin_db_config(): array
{
    return [
        'host' => getenv('NS_ADMIN_DB_HOST') ?: '127.0.0.1',
        'port' => (int) (getenv('NS_ADMIN_DB_PORT') ?: 3306),
        'database' => getenv('NS_ADMIN_DB_NAME') ?: 'nanosistecck_admin',
        'username' => getenv('NS_ADMIN_DB_USER') ?: 'root',
        'password' => getenv('NS_ADMIN_DB_PASS') ?: '',
        'charset' => getenv('NS_ADMIN_DB_CHARSET') ?: 'utf8mb4',
    ];
}

function ns_admin_db(): PDO
{
    static $pdo;

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $config = ns_admin_db_config();
    $dsn = sprintf(
        'mysql:host=%s;port=%d;dbname=%s;charset=%s',
        $config['host'],
        $config['port'],
        $config['database'],
        $config['charset']
    );

    $pdo = new PDO($dsn, $config['username'], $config['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);

    ns_admin_run_migrations($pdo);

    return $pdo;
}

function ns_admin_run_migrations(PDO $pdo): void
{
    $pdo->exec('CREATE TABLE IF NOT EXISTS admin_users (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(80) NOT NULL UNIQUE,
        password_hash VARCHAR(255) NOT NULL,
        is_active TINYINT(1) NOT NULL DEFAULT 1,
        last_login_at DATETIME NULL,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');

    $pdo->exec('CREATE TABLE IF NOT EXISTS admin_login_attempts (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(80) NOT NULL,
        ip_address VARCHAR(45) NOT NULL,
        user_agent VARCHAR(255) NOT NULL,
        success TINYINT(1) NOT NULL DEFAULT 0,
        attempted_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        INDEX idx_attempts_username_attempted_at (username, attempted_at),
        INDEX idx_attempts_ip_attempted_at (ip_address, attempted_at)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');
}
