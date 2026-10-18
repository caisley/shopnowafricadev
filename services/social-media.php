<?php
require dirname(__DIR__) . '/includes/bootstrap.php';
render_layout(page_meta('Social media management', 'Explore how Shop Now Africa can help with social media management.', '/services/social-media.php'), fn() => render_service_page('social-media'));
