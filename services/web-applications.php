<?php
require dirname(__DIR__) . '/includes/bootstrap.php';
render_layout(page_meta('Custom web applications and management systems', 'Explore how Shop Now Africa can help with custom web applications and management systems.', '/services/web-applications.php'), fn() => render_service_page('web-applications'));
