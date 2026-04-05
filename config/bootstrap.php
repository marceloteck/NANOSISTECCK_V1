<?php

declare(strict_types=1);

function ns_catalog(): array
{
    static $catalog;

    if ($catalog === null) {
        $catalog = require __DIR__ . '/catalog.php';
    }

    return $catalog;
}

function ns_default_settings(): array
{
    return [
        'branding' => [
            'site_name' => 'NANOSISTECCK Tools',
            'short_name' => 'NANOSISTECCK',
            'description' => 'Ecossistema de ferramentas digitais úteis, rápidas e inteligentes.',
            'tagline' => 'Ferramentas online para finanças, texto, produtividade e automação.',
        ],
        'company' => [
            'name' => 'NANOSISTECCK',
            'url' => 'https://tools.nanosistecck.com',
            'logo' => 'https://tools.nanosistecck.com/assets/brand/og-default.svg',
            'email' => '',
            'telephone' => '',
        ],
        'social' => [
            'twitter' => '',
        ],
        'ads' => [
            'leaderboard' => [
                'enabled' => false,
                'html' => '',
                'fallback_text' => 'Espaço para anúncio - Google AdSense',
            ],
            'rectangle' => [
                'enabled' => false,
                'html' => '',
                'fallback_text' => 'Espaço para anúncio - Google AdSense',
            ],
        ],
        'seo' => [
            'default_image' => 'https://tools.nanosistecck.com/assets/brand/og-default.svg',
            'default_title' => 'Ferramentas Online Profissionais | NANOSISTECCK Tools',
            'default_description' => 'Ferramentas online rápidas para finanças, texto, produtividade e desenvolvimento.',
            'default_keywords' => 'ferramentas online, calculadoras online, geradores online, produtividade',
            'pages' => [],
        ],
    ];
}

function ns_recursive_merge(array $defaults, array $overrides): array
{
    foreach ($overrides as $key => $value) {
        if (is_array($value) && isset($defaults[$key]) && is_array($defaults[$key])) {
            $defaults[$key] = ns_recursive_merge($defaults[$key], $value);
        } else {
            $defaults[$key] = $value;
        }
    }

    return $defaults;
}

function ns_settings_file(): string
{
    return __DIR__ . '/site-settings.json';
}

function ns_load_settings(): array
{
    $defaults = ns_default_settings();
    $file = ns_settings_file();

    if (!is_file($file)) {
        return $defaults;
    }

    $raw = file_get_contents($file);
    if ($raw === false) {
        return $defaults;
    }

    $decoded = json_decode($raw, true);

    return is_array($decoded) ? ns_recursive_merge($defaults, $decoded) : $defaults;
}

function ns_save_settings(array $settings): bool
{
    $encoded = json_encode($settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    if ($encoded === false) {
        return false;
    }

    return file_put_contents(ns_settings_file(), $encoded . PHP_EOL) !== false;
}

function ns_site_url(): string
{
    $settings = ns_load_settings();
    return rtrim($settings['company']['url'] ?? 'https://tools.nanosistecck.com', '/');
}

function ns_href(string $path = '/'): string
{
    $path = '/' . ltrim($path, '/');
    return $path === '//' ? '/' : $path;
}

function ns_url(string $path = '/'): string
{
    return ns_site_url() . ns_href($path);
}

function ns_asset_url(string $path): string
{
    $relativePath = ltrim($path, '/');
    $absolutePath = dirname(__DIR__) . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $relativePath);
    $version = is_file($absolutePath) ? (string) filemtime($absolutePath) : '1';

    return ns_href($relativePath) . '?v=' . $version;
}

function ns_tools(): array
{
    return ns_catalog()['tools'];
}

function ns_tool(string $slug): ?array
{
    $tools = ns_tools();
    return $tools[$slug] ?? null;
}

function ns_grouped_tools(): array
{
    $groups = [];

    foreach (ns_tools() as $tool) {
        $groups[$tool['category_key']][] = $tool;
    }

    return $groups;
}

function ns_page_definitions(): array
{
    static $pages;

    if ($pages !== null) {
        return $pages;
    }

    $catalog = ns_catalog();
    $settings = ns_load_settings();
    $siteName = $settings['branding']['site_name'];

    $pages = [
        'home' => [
            'page_key' => 'home',
            'title' => 'Ferramentas Online Grátis e Profissionais | ' . $siteName,
            'description' => 'Calculadoras financeiras, geradores, utilitários de texto e ferramentas online profissionais para uso imediato, gratuito e responsivo.',
            'keywords' => 'ferramentas online grátis, calculadoras financeiras online, geradores online, ferramentas de produtividade',
            'path' => '/',
            'robots' => 'index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1',
            'schema' => 'website',
            'priority' => '1.0',
            'changefreq' => 'weekly',
        ],
        'tools' => [
            'page_key' => 'tools',
            'title' => 'Todas as Ferramentas Online | ' . $siteName,
            'description' => 'Explore todas as ferramentas online da NANOSISTECCK Tools organizadas por categoria, com páginas rápidas, mobile-first e prontas para SEO.',
            'keywords' => 'catálogo de ferramentas online, ferramentas financeiras, ferramentas de texto, ferramentas grátis',
            'path' => '/ferramentas',
            'robots' => 'index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1',
            'schema' => 'collection',
            'priority' => '0.9',
            'changefreq' => 'weekly',
        ],
        'privacy' => [
            'page_key' => 'privacy',
            'title' => 'Política de Privacidade | ' . $siteName,
            'description' => 'Leia a política de privacidade da NANOSISTECCK Tools e entenda como o site trata dados, cookies e serviços de terceiros.',
            'keywords' => 'política de privacidade, lgpd, privacidade nanosistecck tools',
            'path' => '/politica-de-privacidade',
            'robots' => 'index,follow',
            'schema' => 'webpage',
            'priority' => '0.3',
            'changefreq' => 'yearly',
        ],
        'terms' => [
            'page_key' => 'terms',
            'title' => 'Termos de Uso | ' . $siteName,
            'description' => 'Consulte os termos de uso da NANOSISTECCK Tools para entender regras, responsabilidades e limitações das ferramentas disponíveis.',
            'keywords' => 'termos de uso, termos legais, uso das ferramentas nanosistecck',
            'path' => '/termos-de-uso',
            'robots' => 'index,follow',
            'schema' => 'webpage',
            'priority' => '0.3',
            'changefreq' => 'yearly',
        ],
        'admin' => [
            'page_key' => 'admin',
            'title' => 'Painel Administrativo | ' . $siteName,
            'description' => 'Painel administrativo para branding, anúncios e meta tags da NANOSISTECCK Tools.',
            'keywords' => 'painel administrativo nanosistecck',
            'path' => '/admin',
            'robots' => 'noindex,nofollow',
            'schema' => 'webpage',
            'priority' => '0.1',
            'changefreq' => 'monthly',
        ],
    ];

    foreach ($catalog['tools'] as $tool) {
        $pages[$tool['page_key']] = [
            'page_key' => $tool['page_key'],
            'title' => $tool['name'] . ' Online | ' . $siteName,
            'description' => $tool['lead'],
            'keywords' => $tool['keywords'],
            'path' => '/ferramentas/' . $tool['slug'],
            'robots' => 'index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1',
            'schema' => 'tool',
            'tool_slug' => $tool['slug'],
            'priority' => $tool['priority'],
            'changefreq' => $tool['changefreq'],
        ];
    }

    return $pages;
}

function ns_page_meta(string $pageKey, array $overrides = []): array
{
    $settings = ns_load_settings();
    $pages = ns_page_definitions();
    $page = $pages[$pageKey] ?? [
        'page_key' => $pageKey,
        'title' => $settings['seo']['default_title'],
        'description' => $settings['seo']['default_description'],
        'keywords' => $settings['seo']['default_keywords'],
        'path' => '/',
        'robots' => 'index,follow',
        'schema' => 'webpage',
        'priority' => '0.5',
        'changefreq' => 'monthly',
    ];

    $storedOverrides = $settings['seo']['pages'][$pageKey] ?? [];
    $meta = ns_recursive_merge($page, $storedOverrides);
    $meta = ns_recursive_merge($meta, $overrides);

    $meta['site_name'] = $settings['branding']['site_name'];
    $meta['image'] = $meta['image'] ?? $settings['seo']['default_image'];
    $meta['canonical'] = ns_url($meta['path']);
    $meta['og_title'] = $meta['og_title'] ?? $meta['title'];
    $meta['og_description'] = $meta['og_description'] ?? $meta['description'];
    $meta['twitter_title'] = $meta['twitter_title'] ?? $meta['og_title'];
    $meta['twitter_description'] = $meta['twitter_description'] ?? $meta['og_description'];

    return $meta;
}

function ns_escape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function ns_current_path(): string
{
    $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
    return $path ? rtrim($path, '/') ?: '/' : '/';
}

function ns_redirect_legacy_url(string $canonicalPath): void
{
    $current = ns_current_path();
    $canonicalPath = rtrim($canonicalPath, '/') ?: '/';

    if ($current === $canonicalPath) {
        return;
    }

    $basename = basename($current);
    if (str_ends_with($basename, '.php') || $current === '/admin.php') {
        header('Location: ' . ns_href($canonicalPath), true, 301);
        exit;
    }
}

function ns_render_schema(array $meta): void
{
    $settings = ns_load_settings();
    $tool = isset($meta['tool_slug']) ? ns_tool($meta['tool_slug']) : null;
    $siteUrl = ns_site_url();
    $schemas = [];

    $schemas[] = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => $settings['company']['name'],
        'url' => $siteUrl,
        'logo' => $settings['company']['logo'],
    ];

    if ($meta['schema'] === 'website') {
        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => $settings['branding']['site_name'],
            'url' => $siteUrl,
            'description' => $meta['description'],
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => $siteUrl . '/ferramentas?q={search_term_string}',
                'query-input' => 'required name=search_term_string',
            ],
        ];
    } elseif ($meta['schema'] === 'collection') {
        $items = [];
        $position = 1;

        foreach (ns_tools() as $toolItem) {
            $items[] = [
                '@type' => 'ListItem',
                'position' => $position++,
                'url' => ns_url('/ferramentas/' . $toolItem['slug']),
                'name' => $toolItem['name'],
            ];
        }

        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type' => 'CollectionPage',
            'name' => $meta['title'],
            'url' => $meta['canonical'],
            'description' => $meta['description'],
            'mainEntity' => [
                '@type' => 'ItemList',
                'itemListElement' => $items,
            ],
        ];
    } elseif ($meta['schema'] === 'tool' && $tool !== null) {
        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type' => 'SoftwareApplication',
            'name' => $tool['name'],
            'applicationCategory' => $tool['category'],
            'operatingSystem' => 'Web',
            'isAccessibleForFree' => true,
            'offers' => [
                '@type' => 'Offer',
                'price' => '0',
                'priceCurrency' => 'BRL',
            ],
            'description' => $meta['description'],
            'url' => $meta['canonical'],
            'publisher' => [
                '@type' => 'Organization',
                'name' => $settings['company']['name'],
                'url' => $siteUrl,
            ],
        ];
        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Início',
                    'item' => $siteUrl . '/',
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Ferramentas',
                    'item' => $siteUrl . '/ferramentas',
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 3,
                    'name' => $tool['name'],
                    'item' => $meta['canonical'],
                ],
            ],
        ];
    } else {
        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => $meta['title'],
            'url' => $meta['canonical'],
            'description' => $meta['description'],
        ];
    }

    echo '<script type="application/ld+json">' . json_encode($schemas, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . PHP_EOL;
}

function ns_render_header(string $pageKey, bool $isAdmin = false): void
{
    $settings = ns_load_settings();
    $siteName = $settings['branding']['short_name'] ?: 'NANOSISTECCK';
    $currentPath = ns_current_path();
    $links = [
        ['href' => ns_href('/'), 'label' => 'Início'],
        ['href' => ns_href('/ferramentas'), 'label' => 'Ferramentas'],
        ['href' => ns_href('/#sobre'), 'label' => 'Sobre'],
        ['href' => ns_href('/politica-de-privacidade'), 'label' => 'Privacidade'],
    ];

    echo '  <header class="site-header">' . PHP_EOL;
    echo '    <div class="container">' . PHP_EOL;
    echo '      <div class="header-inner">' . PHP_EOL;
    echo '        <a href="' . ns_escape(ns_href('/')) . '" class="logo" aria-label="' . ns_escape($siteName) . ' Home">' . PHP_EOL;
    echo '          <div class="logo-icon">N</div>' . PHP_EOL;
    echo '          <span class="logo-text">NANO<span>SISTECCK</span></span>' . PHP_EOL;
    echo '        </a>' . PHP_EOL;
    echo '        <button class="hamburger" id="hamburger" aria-label="Abrir menu" aria-expanded="false">☰</button>' . PHP_EOL;
    echo '        <nav class="main-nav" id="main-nav" aria-label="Navegação principal">' . PHP_EOL;

    foreach ($links as $link) {
        $active = $currentPath === rtrim($link['href'], '/') || ($link['href'] === '/' && $currentPath === '/');
        $class = $active && $link['href'] !== '/#sobre' ? ' class="active"' : '';
        echo '          <a href="' . ns_escape($link['href']) . '"' . $class . '>' . ns_escape($link['label']) . '</a>' . PHP_EOL;
    }

    if ($isAdmin) {
        echo '          <a href="' . ns_escape(ns_href('/admin')) . '" class="nav-cta btn active">Admin</a>' . PHP_EOL;
    } else {
        echo '          <a href="' . ns_escape(ns_href('/ferramentas')) . '" class="nav-cta btn">Explorar</a>' . PHP_EOL;
    }

    echo '        </nav>' . PHP_EOL;
    echo '      </div>' . PHP_EOL;
    echo '    </div>' . PHP_EOL;
    echo '  </header>' . PHP_EOL;
}

function ns_render_ad_slot(string $slotName, string $extraClass = ''): void
{
    $settings = ns_load_settings();
    $slot = $settings['ads'][$slotName] ?? [];
    $content = (!empty($slot['enabled']) && !empty($slot['html']))
        ? $slot['html']
        : ns_escape((string) ($slot['fallback_text'] ?? 'Espaço para anúncio'));

    echo '<div class="ad-slot ad-slot-' . ns_escape($slotName) . ($extraClass !== '' ? ' ' . ns_escape($extraClass) : '') . '" aria-label="Anúncio">';
    echo $content;
    echo '</div>';
}

function ns_render_footer(): void
{
    $settings = ns_load_settings();
    $toolLinks = array_values(ns_tools());

    echo '  <footer class="site-footer">' . PHP_EOL;
    echo '    <div class="container">' . PHP_EOL;
    echo '      <div class="footer-grid">' . PHP_EOL;
    echo '        <div class="footer-brand">' . PHP_EOL;
    echo '          <a href="' . ns_escape(ns_href('/')) . '" class="logo" style="color:#fff">' . PHP_EOL;
    echo '            <div class="logo-icon">N</div>' . PHP_EOL;
    echo '            <span class="logo-text">NANO<span style="color:var(--accent)">SISTECCK</span></span>' . PHP_EOL;
    echo '          </a>' . PHP_EOL;
    echo '          <p>' . ns_escape($settings['branding']['description']) . '</p>' . PHP_EOL;
    echo '        </div>' . PHP_EOL;
    echo '        <div class="footer-col">' . PHP_EOL;
    echo '          <h4>Ferramentas</h4>' . PHP_EOL;
    foreach ($toolLinks as $tool) {
        echo '          <a href="' . ns_escape(ns_href('/ferramentas/' . $tool['slug'])) . '">' . ns_escape($tool['icon'] . ' ' . $tool['short_name']) . '</a>' . PHP_EOL;
    }
    echo '        </div>' . PHP_EOL;
    echo '        <div class="footer-col">' . PHP_EOL;
    echo '          <h4>Institucional</h4>' . PHP_EOL;
    echo '          <a href="' . ns_escape(ns_href('/')) . '">Início</a>' . PHP_EOL;
    echo '          <a href="' . ns_escape(ns_href('/ferramentas')) . '">Todas as Ferramentas</a>' . PHP_EOL;
    echo '          <a href="' . ns_escape(ns_href('/politica-de-privacidade')) . '">Política de Privacidade</a>' . PHP_EOL;
    echo '          <a href="' . ns_escape(ns_href('/termos-de-uso')) . '">Termos de Uso</a>' . PHP_EOL;
    echo '          <a href="' . ns_escape(ns_href('/admin')) . '" rel="nofollow">Administrador</a>' . PHP_EOL;
    echo '        </div>' . PHP_EOL;
    echo '      </div>' . PHP_EOL;
    echo '      <div class="footer-bottom">' . PHP_EOL;
    echo '        <p>© ' . date('Y') . ' ' . ns_escape($settings['company']['name']) . '. Todos os direitos reservados.</p>' . PHP_EOL;
    echo '        <div class="footer-links">' . PHP_EOL;
    echo '          <a href="' . ns_escape(ns_href('/sitemap.xml')) . '">Sitemap</a>' . PHP_EOL;
    echo '          <a href="' . ns_escape(ns_href('/robots.txt')) . '">Robots</a>' . PHP_EOL;
    echo '        </div>' . PHP_EOL;
    echo '      </div>' . PHP_EOL;
    echo '    </div>' . PHP_EOL;
    echo '  </footer>' . PHP_EOL;
}

function ns_render_page_start(string $pageKey, array $options = []): void
{
    $meta = ns_page_meta($pageKey, $options['meta'] ?? []);
    $settings = ns_load_settings();
    $twitter = trim((string) ($settings['social']['twitter'] ?? ''));
    $bodyClass = trim((string) ($options['body_class'] ?? ''));
    $isAdmin = !empty($options['is_admin']);

    echo '<!DOCTYPE html>' . PHP_EOL;
    echo '<html lang="pt-BR">' . PHP_EOL;
    echo '<head>' . PHP_EOL;
    echo '  <meta charset="UTF-8" />' . PHP_EOL;
    echo '  <meta http-equiv="X-UA-Compatible" content="IE=edge" />' . PHP_EOL;
    echo '  <meta name="viewport" content="width=device-width, initial-scale=1.0" />' . PHP_EOL;
    echo '  <meta name="robots" content="' . ns_escape($meta['robots']) . '" />' . PHP_EOL;
    echo '  <meta name="description" content="' . ns_escape($meta['description']) . '" />' . PHP_EOL;
    echo '  <meta name="keywords" content="' . ns_escape($meta['keywords']) . '" />' . PHP_EOL;
    echo '  <meta name="author" content="' . ns_escape($settings['company']['name']) . '" />' . PHP_EOL;
    echo '  <meta name="theme-color" content="#0f1b35" />' . PHP_EOL;
    echo '  <meta name="format-detection" content="telephone=no" />' . PHP_EOL;
    echo '  <meta name="application-name" content="' . ns_escape($settings['branding']['site_name']) . '" />' . PHP_EOL;
    echo '  <title>' . ns_escape($meta['title']) . '</title>' . PHP_EOL;
    echo '  <link rel="canonical" href="' . ns_escape($meta['canonical']) . '" />' . PHP_EOL;
    echo '  <link rel="alternate" hreflang="pt-BR" href="' . ns_escape($meta['canonical']) . '" />' . PHP_EOL;
    echo '  <link rel="preconnect" href="https://fonts.googleapis.com" />' . PHP_EOL;
    echo '  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />' . PHP_EOL;
    echo '  <link rel="preload" as="style" href="' . ns_escape(ns_asset_url('css/style.css')) . '" />' . PHP_EOL;
    echo '  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />' . PHP_EOL;
    echo '  <link rel="stylesheet" href="' . ns_escape(ns_asset_url('css/style.css')) . '" />' . PHP_EOL;
    echo '  <meta property="og:locale" content="pt_BR" />' . PHP_EOL;
    echo '  <meta property="og:type" content="website" />' . PHP_EOL;
    echo '  <meta property="og:site_name" content="' . ns_escape($settings['branding']['site_name']) . '" />' . PHP_EOL;
    echo '  <meta property="og:title" content="' . ns_escape($meta['og_title']) . '" />' . PHP_EOL;
    echo '  <meta property="og:description" content="' . ns_escape($meta['og_description']) . '" />' . PHP_EOL;
    echo '  <meta property="og:url" content="' . ns_escape($meta['canonical']) . '" />' . PHP_EOL;
    echo '  <meta property="og:image" content="' . ns_escape($meta['image']) . '" />' . PHP_EOL;
    echo '  <meta property="og:image:alt" content="' . ns_escape($meta['og_title']) . '" />' . PHP_EOL;
    echo '  <meta name="twitter:card" content="summary_large_image" />' . PHP_EOL;
    echo '  <meta name="twitter:title" content="' . ns_escape($meta['twitter_title']) . '" />' . PHP_EOL;
    echo '  <meta name="twitter:description" content="' . ns_escape($meta['twitter_description']) . '" />' . PHP_EOL;
    echo '  <meta name="twitter:image" content="' . ns_escape($meta['image']) . '" />' . PHP_EOL;
    if ($twitter !== '') {
        echo '  <meta name="twitter:site" content="' . ns_escape($twitter) . '" />' . PHP_EOL;
    }
    ns_render_schema($meta);
    echo '</head>' . PHP_EOL;
    echo '<body' . ($bodyClass !== '' ? ' class="' . ns_escape($bodyClass) . '"' : '') . '>' . PHP_EOL;
    ns_render_header($pageKey, $isAdmin);
}

function ns_render_page_end(): void
{
    ns_render_footer();
    echo '  <script src="' . ns_escape(ns_asset_url('js/main.js')) . '"></script>' . PHP_EOL;
    echo '</body>' . PHP_EOL;
    echo '</html>' . PHP_EOL;
}
