<?php
require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/form-views.php';
$result = process_privacy_request();
render_layout(page_meta('Data protection requests', 'Contact Shop Now Africa about access, correction, deletion, or questions concerning personal information handled through this website.', '/privacy-requests.php'), function () use ($result): void {
    render_page_intro('Privacy & data protection', 'A clear route for questions about your information.', 'Use this page to ask how information submitted through the site is handled or to make a request about your personal information.');
    echo '<div class="shell page-body">'; render_breadcrumbs([['label' => 'Home', 'url' => '/'], ['label' => 'Data protection requests']]); echo '<div class="form-shell"><div class="form-intro"><p class="eyebrow">Data protection request</p><h2>Ask for clarity. We will review the route.</h2><p>SNA may need to confirm identity and consider applicable legal or operational exceptions before responding. Do not include passwords or unnecessary sensitive details.</p><div class="form-aside-note">The official privacy contact and legal identity must be supplied by SNA and reviewed before production launch.</div></div><div>'; render_privacy_request_form($result); echo '</div></div></div>';
});
