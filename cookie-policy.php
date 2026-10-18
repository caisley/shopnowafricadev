<?php
require __DIR__ . '/includes/bootstrap.php';
render_layout(page_meta('Cookie policy', 'Understand the essential cookies and saved preference controls used by the Shop Now Africa website.', '/cookie-policy.php'), fn() => render_legal('cookies'));
