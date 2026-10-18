<?php
require dirname(__DIR__) . '/includes/bootstrap.php';
render_layout(page_meta('Website design and development', 'Explore how Shop Now Africa can help with website design and development.', '/services/website-design.php'), fn() => render_service_page('website-design'));
