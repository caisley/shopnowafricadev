<?php
require __DIR__ . '/includes/bootstrap.php';
render_layout(page_meta('Terms and conditions', 'Read the baseline terms for using the Shop Now Africa website and project enquiry routes.', '/terms.php'), fn() => render_legal('terms'));
