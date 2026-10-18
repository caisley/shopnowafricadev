<?php
declare(strict_types=1);

function sna_config(string $key = '', mixed $default = null): mixed
{
    $config = $GLOBALS['sna_config'] ?? [];
    return $key === '' ? $config : ($config[$key] ?? $default);
}

function e(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function site_url(string $path = ''): string
{
    $base = rtrim((string) sna_config('site_url', ''), '/');
    if ($path === '') {
        return $base;
    }
    return $base . '/' . ltrim($path, '/');
}

function asset_url(string $path): string
{
    return '/' . ltrim($path, '/');
}

function current_path(): string
{
    return parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
}

function nav_active(string $path): string
{
    $current = rtrim(current_path(), '/') ?: '/';
    $target = rtrim($path, '/') ?: '/';
    return $current === $target ? ' aria-current="page" class="is-active"' : '';
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return (string) $_SESSION['csrf_token'];
}

function verify_csrf(?string $token): bool
{
    return is_string($token) && hash_equals((string) ($_SESSION['csrf_token'] ?? ''), $token);
}

function old_value(array $old, string $key): string
{
    return e($old[$key] ?? '');
}

function page_meta(string $title, string $description, string $path = '/', bool $noindex = false): array
{
    return [
        'title' => $title . ' | ' . sna_config('site_name', 'Shop Now Africa'),
        'description' => $description,
        'canonical' => site_url($path),
        'noindex' => $noindex,
    ];
}

function render_layout(array $meta, callable $content, array $options = []): void
{
    $pageTitle = (string) ($meta['title'] ?? sna_config('site_name'));
    $description = (string) ($meta['description'] ?? sna_config('site_tagline'));
    $canonical = (string) ($meta['canonical'] ?? site_url('/'));
    $noindex = !empty($meta['noindex']);
    $eyebrow = (string) ($options['eyebrow'] ?? 'Shop Now Africa');
    $darkHeader = !empty($options['dark_header']);
    $pageClass = (string) ($options['page_class'] ?? '');
    $ogType = (string) ($options['og_type'] ?? 'website');
    $ogImage = site_url('/assets/images/og-mark.png');
    ?>
<!doctype html>
<html lang="en-GH">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($description) ?>">
    <link rel="canonical" href="<?= e($canonical) ?>">
    <?php if ($noindex): ?><meta name="robots" content="noindex, nofollow">
    <?php else: ?><meta name="robots" content="index, follow">
    <?php endif; ?>
    <meta property="og:type" content="<?= e($ogType) ?>">
    <meta property="og:site_name" content="<?= e(sna_config('site_name')) ?>">
    <meta property="og:title" content="<?= e($pageTitle) ?>">
    <meta property="og:description" content="<?= e($description) ?>">
    <meta property="og:url" content="<?= e($canonical) ?>">
    <meta property="og:image" content="<?= e($ogImage) ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($pageTitle) ?>">
    <meta name="twitter:description" content="<?= e($description) ?>">
    <meta name="theme-color" content="#071525">
    <link rel="icon" href="<?= e(asset_url('assets/images/favicon.svg')) ?>" type="image/svg+xml">
    <link rel="stylesheet" href="<?= e(asset_url('assets/css/styles.css')) ?>">
    <script type="application/ld+json">
    <?= json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => sna_config('site_name'),
        'url' => site_url('/'),
        'description' => sna_config('site_tagline'),
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>
    </script>
</head>
<body class="<?= e(trim('no-js ' . ($darkHeader ? 'has-dark-header ' : '') . $pageClass)) ?>">
<a class="skip-link" href="#main-content">Skip to content</a>
<?php include __DIR__ . '/header.php'; ?>
<main id="main-content">
    <?php $content(); ?>
</main>
<?php include __DIR__ . '/footer.php'; ?>
<div class="cookie-banner" data-cookie-banner hidden>
    <div>
        <p class="eyebrow">Privacy choices</p>
        <p class="cookie-banner__text">This site uses essential cookies for security and saved preferences. Optional analytics and marketing cookies are off unless you choose otherwise.</p>
    </div>
    <div class="cookie-banner__actions">
        <button class="button button--ghost button--small" type="button" data-cookie-action="reject">Reject optional</button>
        <button class="button button--ghost button--small" type="button" data-cookie-action="customise">Customise</button>
        <button class="button button--primary button--small" type="button" data-cookie-action="accept">Accept all</button>
    </div>
</div>
<div class="cookie-modal" data-cookie-modal hidden aria-hidden="true">
    <div class="cookie-modal__backdrop" data-cookie-action="close"></div>
    <section class="cookie-modal__panel" role="dialog" aria-modal="true" aria-labelledby="cookie-modal-title">
        <button class="icon-button cookie-modal__close" type="button" aria-label="Close cookie preferences" data-cookie-action="close">×</button>
        <p class="eyebrow">Cookie preferences</p>
        <h2 id="cookie-modal-title">Choose what this site may remember.</h2>
        <p>Essential cookies support security, form protection, and your consent choice. Optional analytics and marketing cookies are not currently connected to this release.</p>
        <label class="consent-option"><input type="checkbox" checked disabled> <span><strong>Essential</strong><small>Required for core site functions and security.</small></span></label>
        <label class="consent-option"><input type="checkbox" data-cookie-optional> <span><strong>Optional analytics</strong><small>Enable only when a verified analytics setup and privacy review are complete.</small></span></label>
        <div class="form-actions"><button class="button button--primary" type="button" data-cookie-action="save">Save preferences</button></div>
    </section>
</div>
<script src="<?= e(asset_url('assets/js/site.js')) ?>" defer></script>
</body>
</html>
<?php
}

function render_breadcrumbs(array $items): void
{
    echo '<nav class="breadcrumbs" aria-label="Breadcrumb"><ol>';
    foreach ($items as $index => $item) {
        $isLast = $index === array_key_last($items);
        echo '<li>';
        if (!$isLast && !empty($item['url'])) {
            echo '<a href="' . e($item['url']) . '">' . e($item['label']) . '</a>';
        } else {
            echo '<span aria-current="page">' . e($item['label']) . '</span>';
        }
        echo '</li>';
    }
    echo '</ol></nav>';
}

function render_page_intro(string $eyebrow, string $title, string $body, string $class = ''): void
{
    echo '<section class="page-intro ' . e($class) . '"><div class="shell">';
    echo '<p class="eyebrow">' . e($eyebrow) . '</p><h1>' . e($title) . '</h1><p class="page-intro__body">' . e($body) . '</p>';
    echo '</div></section>';
}

function render_cta_band(string $eyebrow = 'Start with the problem', string $title = 'Ready to make the next move clearer?', string $body = 'Tell us what you are trying to improve. We will help you find a practical route from idea to impact.'): void
{
    echo '<section class="cta-band"><div class="shell cta-band__inner"><div><p class="eyebrow eyebrow--light">' . e($eyebrow) . '</p><h2>' . e($title) . '</h2><p>' . e($body) . '</p></div><div class="cta-band__actions"><a class="button button--light" href="/contact.php">Discuss a project <span aria-hidden="true">↗</span></a><a class="button button--outline-light" href="/rfp.php">Submit an RFP</a></div></div></section>';
}
