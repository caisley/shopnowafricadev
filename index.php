<?php
require __DIR__ . '/includes/bootstrap.php';
render_layout(page_meta('Digital solutions built around your business', 'Shop Now Africa helps businesses and institutions turn ideas into practical digital solutions, websites, systems, and strategy.', '/'), fn() => render_page_content('home'), ['dark_header' => true, 'page_class' => 'home-page']);
