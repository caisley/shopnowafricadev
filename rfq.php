<?php
require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/form-views.php';
$result = process_rfp_form();
if ($_SERVER['REQUEST_METHOD'] !== 'POST' && empty($result['values']['request_type'])) $result['values']['request_type'] = 'Request for Quotation (RFQ)';
render_layout(page_meta('Request a quotation', 'Send Shop Now Africa a structured request for quotation with project context, requirements, budget, and timeline.', '/rfq.php'), function () use ($result): void {
    render_page_intro('Commercial enquiry', 'Request a quotation with the right context.', 'A useful quotation depends on scope. This form collects the project information SNA needs to respond clearly rather than guessing from a one-line request.');
    echo '<div class="shell page-body">'; render_breadcrumbs([['label' => 'Home', 'url' => '/'], ['label' => 'Request a quotation']]); echo '<div class="form-shell"><div class="form-intro"><p class="eyebrow">Request for Quotation</p><h2>Make the numbers easier to understand.</h2><p>Share the intended deliverables, users, timing, budget context, and any constraints. SNA can then confirm whether a quotation or a fuller proposal is the better next step.</p><div class="form-aside-note">Prices and timelines are not promised by the website. The production configuration should include SNA’s verified notification email and response process.</div></div><div>'; render_rfp_form($result, true); echo '</div></div></div>';
});
