<?php
require __DIR__ . '/includes/bootstrap.php';
http_response_code(404);
render_layout(page_meta('Page not found', 'The Shop Now Africa page you requested could not be found.', '/404.php', true), function (): void {
    render_page_intro('404 / Not found', 'The route you followed has gone quiet.', 'Try the main navigation, return to the homepage, or start a new project conversation.');
    echo '<div class="shell page-body"><div class="resource-empty"><p class="eyebrow">Nothing here yet</p><h2>Let’s get you back to a useful next step.</h2><p>The URL may be out of date or the page may have moved.</p><div class="button-row"><a class="button button--primary" href="/">Back to home</a><a class="button button--outline-light" style="background:var(--navy);" href="/contact.php">Contact SNA</a></div></div></div>';
});
