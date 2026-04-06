<?php

declare(strict_types=1);

require_once __DIR__ . '/config/bootstrap.php';

/**
 * @return array<int, array{loc:string,lastmod:string,changefreq:string,priority:string}>
 */
function ns_sitemap_entries(): array
{
    $entries = [];
    $seen = [];

    $append = static function (string $path, string $lastmod, string $changefreq, string $priority) use (&$entries, &$seen): void {
        $loc = ns_url($path);

        if (isset($seen[$loc])) {
            return;
        }

        $seen[$loc] = true;
        $entries[] = [
            'loc' => $loc,
            'lastmod' => $lastmod,
            'changefreq' => $changefreq,
            'priority' => $priority,
        ];
    };

    foreach (ns_page_definitions() as $page) {
        $robots = strtolower((string) ($page['robots'] ?? 'index,follow'));

        if (str_contains($robots, 'noindex')) {
            continue;
        }

        $path = (string) ($page['path'] ?? '/');
        $lastmod = date('Y-m-d');

        if (!empty($page['tool_slug'])) {
            $toolFile = __DIR__ . '/ferramentas/' . $page['tool_slug'] . '.php';
            if (is_file($toolFile)) {
                $lastmod = date('Y-m-d', (int) filemtime($toolFile));
            }
        }

        $append(
            $path,
            $lastmod,
            (string) ($page['changefreq'] ?? 'monthly'),
            (string) ($page['priority'] ?? '0.5')
        );
    }

    $categoryFiles = glob(__DIR__ . '/categorias/*.php') ?: [];
    foreach ($categoryFiles as $categoryFile) {
        $basename = basename($categoryFile, '.php');
        $path = $basename === 'index' ? '/categorias' : '/categorias/' . $basename;

        $append(
            $path,
            date('Y-m-d', (int) filemtime($categoryFile)),
            'weekly',
            $basename === 'index' ? '0.8' : '0.7'
        );
    }

    return $entries;
}

/**
 * @param array<int, array{loc:string,lastmod:string,changefreq:string,priority:string}> $entries
 */
function ns_render_sitemap_xml(array $entries): string
{
    $xml = ['<?xml version="1.0" encoding="UTF-8"?>', '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'];

    foreach ($entries as $entry) {
        $xml[] = '  <url>';
        $xml[] = '    <loc>' . ns_escape($entry['loc']) . '</loc>';
        $xml[] = '    <lastmod>' . ns_escape($entry['lastmod']) . '</lastmod>';
        $xml[] = '    <changefreq>' . ns_escape($entry['changefreq']) . '</changefreq>';
        $xml[] = '    <priority>' . ns_escape($entry['priority']) . '</priority>';
        $xml[] = '  </url>';
    }

    $xml[] = '</urlset>';

    return implode(PHP_EOL, $xml) . PHP_EOL;
}

function ns_write_robots_file(): void
{
    $robotsContent = implode(PHP_EOL, [
        'User-agent: *',
        'Allow: /',
        '',
        'Disallow: /admin',
        'Disallow: /admin/',
        '',
        'Sitemap: ' . ns_url('/sitemap.xml'),
        '',
    ]);

    file_put_contents(__DIR__ . '/robots.txt', $robotsContent, LOCK_EX);
}

$entries = ns_sitemap_entries();
$xml = ns_render_sitemap_xml($entries);

file_put_contents(__DIR__ . '/sitemap.xml', $xml, LOCK_EX);
ns_write_robots_file();

header('Content-Type: application/xml; charset=UTF-8');
echo $xml;
