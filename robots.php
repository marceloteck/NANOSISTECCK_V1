<?php

declare(strict_types=1);

require_once __DIR__ . '/config/bootstrap.php';

header('Content-Type: text/plain; charset=UTF-8');
?>
User-agent: *
Allow: /

Disallow: /admin
Disallow: /admin/

Sitemap: <?= ns_url('/sitemap.xml') . PHP_EOL ?>
