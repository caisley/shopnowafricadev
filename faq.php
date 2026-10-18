<?php
require __DIR__ . '/includes/bootstrap.php';
render_layout(page_meta('Frequently asked questions', 'Answers to common questions about Shop Now Africa services, project requests, scope, and next steps.', '/faq.php'), fn() => render_page_content('faq'));
