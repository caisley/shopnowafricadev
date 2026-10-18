<?php
require dirname(__DIR__) . '/includes/bootstrap.php';
render_layout(page_meta('Digital strategy and business consultancy', 'Explore how Shop Now Africa can help with digital strategy and business consultancy.', '/services/strategy.php'), fn() => render_service_page('strategy'));
