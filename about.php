<?php
require __DIR__ . '/includes/bootstrap.php';
render_layout(page_meta('About SNA', 'Learn how Shop Now Africa helps organisations move from ideas to practical digital solutions.', '/about.php'), fn() => render_page_content('about'));
