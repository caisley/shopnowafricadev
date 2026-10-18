<?php
require __DIR__ . '/includes/bootstrap.php';
render_layout(page_meta('Website disclaimer', 'Important context for interpreting Shop Now Africa service descriptions, examples, and website information.', '/disclaimer.php'), fn() => render_legal('disclaimer'));
