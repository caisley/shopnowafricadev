<?php
require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/form-views.php';
$result = process_contact_form();
render_layout(page_meta('Contact SNA', 'Talk to Shop Now Africa about a website, system, brand, digital marketing, consultancy, or technology project.', '/contact.php'), function () use ($result): void {
    render_page_intro('Start a conversation', 'Tell us what needs to work better.', 'Share the business problem, idea, or next decision. The more context you give us, the more useful the first response can be.');
    echo '<div class="shell page-body">'; render_breadcrumbs([['label' => 'Home', 'url' => '/'], ['label' => 'Contact']]); echo '<div class="form-shell"><div class="form-intro"><p class="eyebrow">Contact SNA</p><h2>Clear question. Useful next step.</h2><p>Use the form for a general enquiry, a service conversation, or a project that is still taking shape.</p><div class="form-aside-note">Official email, telephone, address, and social links are intentionally editable placeholders until SNA supplies and verifies them for production.</div></div><div>'; render_contact_form($result); echo '</div></div></div>';
});
