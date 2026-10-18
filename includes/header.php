<?php
$navItems = [
    ['label' => 'Services', 'url' => '/services.php'],
    ['label' => 'Solutions', 'url' => '/solutions.php'],
    ['label' => 'Our work', 'url' => '/portfolio.php'],
    ['label' => 'About', 'url' => '/about.php'],
    ['label' => 'Insights', 'url' => '/insights.php'],
    ['label' => 'Contact', 'url' => '/contact.php'],
];
?>
<header class="site-header">
    <div class="shell site-header__inner">
        <a class="brand" href="/" aria-label="Shop Now Africa home">
            <svg class="brand__mark" viewBox="0 0 44 44" role="img" aria-label="SNA mark"><rect width="44" height="44" rx="11" fill="#2F80ED"/><path d="M11 15.5c3.2-2.7 7.1-4.2 11.7-4.2 3.7 0 6.8.9 9.3 2.6M11 21.9h12.8c5.1 0 8.2 2.1 8.2 5.4 0 3.5-3.1 5.5-8.6 5.5-4.6 0-8.6-1.2-12-3.7" fill="none" stroke="#071525" stroke-width="2.2" stroke-linecap="round"/><circle cx="32.5" cy="13.2" r="2.2" fill="#FFCA72"/></svg>
            <span class="brand__type"><strong>Shop Now Africa</strong><small>Ideas → solutions → impact</small></span>
        </a>
        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation"><span></span><span></span><span></span><span class="sr-only">Open navigation</span></button>
        <nav id="primary-navigation" class="primary-nav" aria-label="Primary navigation">
            <div class="primary-nav__links">
                <a href="/"<?= nav_active('/') ?>>Home</a>
                <?php foreach ($navItems as $item): ?><a href="<?= e($item['url']) ?>"<?= nav_active($item['url']) ?>><?= e($item['label']) ?></a><?php endforeach; ?>
            </div>
            <a class="button button--primary button--small primary-nav__cta" href="/rfp.php">Submit an RFP <span aria-hidden="true">↗</span></a>
        </nav>
    </div>
</header>
