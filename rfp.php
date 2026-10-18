<?php
require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/form-views.php';
$result = process_rfp_form();
render_layout(page_meta('Submit an RFP', 'Send Shop Now Africa a structured project request with organisation, requirements, commercial context, and supporting documents.', '/rfp.php'), function () use ($result): void {
    render_page_intro('Project enquiry', 'Give the idea a useful shape.', 'The RFP process helps us understand your organisation, project requirements, commercial context, and preferred next step. It is fine if some answers are still open.');
    echo '<div class="shell page-body">'; render_breadcrumbs([['label' => 'Home', 'url' => '/'], ['label' => 'Submit an RFP']]); echo '<div class="form-shell"><div class="form-intro"><p class="eyebrow">Request for Proposal</p><h2>Bring us the business problem, not just the brief.</h2><p>This form is designed for websites, digital services, custom systems, branding, marketing, automation, consultancy, and wider technology work.</p><div class="form-aside-note"><strong>Before you start.</strong><br>Allow a few minutes. Your progress is kept on this page while you move between steps; it is only submitted when you choose Submit request.</div></div><div>'; render_rfp_form($result, false); echo '</div></div></div>';
});
