<?php
require __DIR__ . '/includes/bootstrap.php';
render_layout(page_meta('Privacy policy', 'Read how this first Shop Now Africa website release handles information and what must be configured before launch.', '/privacy-policy.php'), fn() => render_legal('privacy'));
