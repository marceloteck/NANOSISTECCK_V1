<?php

declare(strict_types=1);

require_once __DIR__ . '/config/bootstrap.php';

header('Content-Type: application/xml; charset=UTF-8');

$pages = ns_page_definitions();
$dynamicPages = [];

foreach ($pages as $pageKey => $page) {
    if ($pageKey === 'admin') {
        continue;
    }

    $dynamicPages[] = [
        'loc' => ns_url($page['path']),
        'lastmod' => date('Y-m-d'),
        'changefreq' => $page['changefreq'] ?? 'monthly',
        'priority' => $page['priority'] ?? '0.5',
    ];
}

echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($dynamicPages as $entry): ?>
  <url>
    <loc><?= ns_escape($entry['loc']) ?></loc>
    <lastmod><?= ns_escape($entry['lastmod']) ?></lastmod>
    <changefreq><?= ns_escape($entry['changefreq']) ?></changefreq>
    <priority><?= ns_escape($entry['priority']) ?></priority>
  </url>
<?php endforeach; ?>
</urlset>
