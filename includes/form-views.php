<?php
declare(strict_types=1);

function render_form_errors(array $errors): void
{
    if (!$errors) return;
    echo '<div class="form-errors" role="alert"><strong>Please review the items below.</strong><ul>'; foreach ($errors as $error) echo '<li>' . e($error) . '</li>'; echo '</ul></div>';
}

function render_contact_form(array $result): void
{
    if ($result['ok']) { echo '<div class="confirmation" role="status"><p class="eyebrow">Request received</p><h2>Thanks for reaching out.</h2><p>' . e($result['message']) . '</p><span class="reference-code">' . e($result['reference']) . '</span>'; if ($result['delivery'] === 'not-configured') echo '<p class="form-note">This installation has stored the request securely, but its notification email is still a placeholder. SNA should configure and test delivery before launch.</p>'; if ($result['delivery'] === 'failed') echo '<p class="form-note">Your request was stored securely, but the configured notification channel reported a delivery problem. Please keep this reference and contact SNA through its verified business channel.</p>'; echo '</div>'; return; }
    render_form_errors($result['errors']);
    ?>
    <form class="form-panel" method="post" action="/contact.php" novalidate>
        <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
        <div class="honeypot" aria-hidden="true"><label>Website URL <input type="text" name="website_url" tabindex="-1" autocomplete="off"></label></div>
        <div class="field-grid">
            <div class="field"><label for="name">Your name <span>*</span></label><input id="name" name="name" type="text" required maxlength="120" value="<?= old_value($result['values'], 'name') ?>" autocomplete="name"><small>Tell us who we will be speaking with.</small></div>
            <div class="field"><label for="organisation">Organisation</label><input id="organisation" name="organisation" type="text" maxlength="160" value="<?= old_value($result['values'], 'organisation') ?>" autocomplete="organization"></div>
            <div class="field"><label for="email">Email <span>*</span></label><input id="email" name="email" type="email" required maxlength="190" value="<?= old_value($result['values'], 'email') ?>" autocomplete="email"></div>
            <div class="field"><label for="telephone">Telephone</label><input id="telephone" name="telephone" type="tel" maxlength="60" value="<?= old_value($result['values'], 'telephone') ?>" autocomplete="tel"></div>
            <div class="field field--full"><label for="service">Service of interest</label><select id="service" name="service"><option value="">Choose an area</option><?php foreach (['Website design and development', 'Custom web applications', 'Brand identity and graphic design', 'Social media management', 'Digital marketing', 'Digital strategy and consultancy', 'IT solutions and automation', 'Not sure yet'] as $option): ?><option<?= ($result['values']['service'] ?? '') === $option ? ' selected' : '' ?>><?= e($option) ?></option><?php endforeach; ?></select></div>
            <div class="field field--full"><label for="message">How can we help? <span>*</span></label><textarea id="message" name="message" required maxlength="4000" placeholder="Share the business problem, idea, or next step you have in mind."><?= old_value($result['values'], 'message') ?></textarea></div>
        </div>
        <label class="consent-label" style="margin-top:21px"><input type="checkbox" name="privacy_acknowledgement" value="yes" required> <span>I confirm that the information I have provided can be used to respond to this enquiry. Please read the <a class="text-link" href="/privacy-policy.php">Privacy Policy</a>.</span></label>
        <div class="form-actions"><span class="field"><small>Required fields are marked with an asterisk.</small></span><button class="button button--primary" type="submit">Send enquiry <span aria-hidden="true">↗</span></button></div>
    </form>
    <?php
}

function render_privacy_request_form(array $result): void
{
    if ($result['ok']) { echo '<div class="confirmation" role="status"><p class="eyebrow">Request received</p><h2>Your request is on record.</h2><p>' . e($result['message']) . '</p><span class="reference-code">' . e($result['reference']) . '</span></div>'; return; }
    render_form_errors($result['errors']);
    ?>
    <form class="form-panel" method="post" action="/privacy-requests.php" novalidate>
        <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
        <div class="honeypot" aria-hidden="true"><label>Website URL <input type="text" name="website_url" tabindex="-1" autocomplete="off"></label></div>
        <div class="field-grid">
            <div class="field"><label for="privacy-name">Your name <span>*</span></label><input id="privacy-name" name="name" type="text" required maxlength="120" value="<?= old_value($result['values'], 'name') ?>" autocomplete="name"></div>
            <div class="field"><label for="privacy-email">Email <span>*</span></label><input id="privacy-email" name="email" type="email" required maxlength="190" value="<?= old_value($result['values'], 'email') ?>" autocomplete="email"></div>
            <div class="field field--full"><label for="request-type">What do you need? <span>*</span></label><select id="request-type" name="request_type" required><option value="">Choose a request type</option><?php foreach (['Access to information', 'Correction of information', 'Deletion request', 'Question about processing', 'Other privacy concern'] as $option): ?><option<?= ($result['values']['request_type'] ?? '') === $option ? ' selected' : '' ?>><?= e($option) ?></option><?php endforeach; ?></select></div>
            <div class="field field--full"><label for="privacy-message">Details <span>*</span></label><textarea id="privacy-message" name="message" required maxlength="3000" placeholder="Share only the details needed to help us locate and understand your request."><?= old_value($result['values'], 'message') ?></textarea></div>
        </div>
        <div class="form-actions"><span class="field"><small>SNA may need to confirm identity and assess any lawful exceptions before responding.</small></span><button class="button button--primary" type="submit">Send request <span aria-hidden="true">↗</span></button></div>
    </form>
    <?php
}

function render_rfp_form(array $result, bool $isRfq = false): void
{
    if ($result['ok']) { echo '<div class="confirmation" role="status"><p class="eyebrow">Request received</p><h2>Your ' . ($isRfq ? 'quotation request' : 'project request') . ' is on record.</h2><p>' . e($result['message']) . '</p><span class="reference-code">' . e($result['reference']) . '</span>'; if ($result['delivery'] === 'not-configured') echo '<p class="form-note">This installation has stored the request securely, but its notification email is still a placeholder. SNA should configure and test delivery before launch.</p>'; if ($result['delivery'] === 'failed') echo '<p class="form-note">Your request was stored securely, but the configured notification channel reported a delivery problem. Please keep this reference and contact SNA through its verified business channel.</p>'; echo '</div>'; return; }
    render_form_errors($result['errors']);
    $values = $result['values'];
    ?>
    <form class="form-panel" method="post" enctype="multipart/form-data" action="<?= $isRfq ? '/rfq.php' : '/rfp.php' ?>" data-multistep-form novalidate>
        <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
        <div class="honeypot" aria-hidden="true"><label>Website URL <input type="text" name="website_url" tabindex="-1" autocomplete="off"></label></div>
        <div class="form-progress" aria-label="Form progress">
            <?php foreach (['Organisation', 'Project', 'Commercial', 'Documents', 'Privacy'] as $index => $label): ?><span class="form-progress__item<?= $index === 0 ? ' is-active' : '' ?>" data-progress-step><?= e($label) ?></span><?php endforeach; ?>
        </div>
        <section class="form-step is-active" data-form-step aria-labelledby="rfp-step-1"><h2 id="rfp-step-1" data-step-heading tabindex="-1">Organisation details</h2><p>Start with the people and organisation behind the request.</p><div class="field-grid">
            <div class="field field--full"><label for="organisation">Organisation or business name <span>*</span></label><input id="organisation" name="organisation" type="text" required maxlength="400" value="<?= old_value($values, 'organisation') ?>" autocomplete="organization"></div>
            <div class="field"><label for="name">Contact person’s full name <span>*</span></label><input id="name" name="name" type="text" required maxlength="400" value="<?= old_value($values, 'name') ?>" autocomplete="name"></div>
            <div class="field"><label for="email">Work email address <span>*</span></label><input id="email" name="email" type="email" required maxlength="190" value="<?= old_value($values, 'email') ?>" autocomplete="email"></div>
            <div class="field"><label for="telephone">Telephone number <span>*</span></label><input id="telephone" name="telephone" type="tel" required maxlength="60" value="<?= old_value($values, 'telephone') ?>" autocomplete="tel" placeholder="Include country code"></div>
            <div class="field"><label for="country">Country <span>*</span></label><input id="country" name="country" type="text" required maxlength="120" value="<?= old_value($values, 'country') ?>" autocomplete="country-name"></div>
            <div class="field"><label for="website">Website, if available</label><input id="website" name="website" type="url" maxlength="300" value="<?= old_value($values, 'website') ?>" placeholder="https://"></div>
            <div class="field field--full"><label for="organisation-type">Organisation type <span>*</span></label><select id="organisation-type" name="organisation_type" required><option value="">Choose a type</option><?php foreach (['SME or enterprise', 'Startup or entrepreneur', 'Education institution', 'Healthcare organisation', 'Religious institution', 'NGO or development organisation', 'Public or professional institution', 'Other'] as $option): ?><option<?= ($values['organisation_type'] ?? '') === $option ? ' selected' : '' ?>><?= e($option) ?></option><?php endforeach; ?></select></div>
        </div><div class="form-actions"><span></span><button class="button button--primary" type="button" data-next-step>Project details <span aria-hidden="true">→</span></button></div></section>
        <section class="form-step" data-form-step aria-labelledby="rfp-step-2"><h2 id="rfp-step-2" data-step-heading tabindex="-1">Project requirements</h2><p>Give us enough context to understand the problem and the shape of a useful response.</p><div class="field-grid">
            <div class="field field--full"><label for="project-title">Project title <span>*</span></label><input id="project-title" name="project_title" type="text" required maxlength="400" value="<?= old_value($values, 'project_title') ?>"></div>
            <div class="field"><label for="service-category">Service category <span>*</span></label><select id="service-category" name="service_category" required><option value="">Choose a service</option><?php foreach (['Website design and development', 'Custom web applications and management systems', 'Graphic design and brand identity', 'Social media management', 'Digital marketing and online presence', 'Digital strategy and business consultancy', 'IT solutions and business process automation', 'Digital transformation and technology advisory', 'A combination / not sure yet'] as $option): ?><option<?= ($values['service_category'] ?? '') === $option ? ' selected' : '' ?>><?= e($option) ?></option><?php endforeach; ?></select></div>
            <div class="field"><label for="industry">Industry <span>*</span></label><input id="industry" name="industry" type="text" required maxlength="200" value="<?= old_value($values, 'industry') ?>" placeholder="e.g. education, retail"></div>
            <div class="field field--full"><label for="problem">Business problem <span>*</span></label><textarea id="problem" name="problem" required maxlength="4000" placeholder="What needs to work better, change, or become possible?"><?= old_value($values, 'problem') ?></textarea></div>
            <div class="field field--full"><label for="deliverables">Desired deliverables <span>*</span></label><textarea id="deliverables" name="deliverables" required maxlength="4000" placeholder="What would you like the engagement to produce?"><?= old_value($values, 'deliverables') ?></textarea></div>
            <div class="field field--full"><label for="requirements">Key functional requirements</label><textarea id="requirements" name="requirements" maxlength="4000" placeholder="List important features, workflows, integrations, or constraints."><?= old_value($values, 'requirements') ?></textarea></div>
            <div class="field"><label for="users">Intended users <span>*</span></label><input id="users" name="users" type="text" required maxlength="400" value="<?= old_value($values, 'users') ?>" placeholder="Who will use it?"></div>
            <div class="field"><label for="technology">Preferred technologies</label><input id="technology" name="technology" type="text" maxlength="400" value="<?= old_value($values, 'technology') ?>" placeholder="Optional"></div>
            <div class="field field--full"><label for="existing-system">Existing website or application</label><textarea id="existing-system" name="existing_system" maxlength="2000" placeholder="Share a URL or explain what already exists."><?= old_value($values, 'existing_system') ?></textarea></div>
        </div><div class="form-actions"><button class="button button--ghost" type="button" data-previous-step>← Back</button><button class="button button--primary" type="button" data-next-step>Commercial details <span aria-hidden="true">→</span></button></div></section>
        <section class="form-step" data-form-step aria-labelledby="rfp-step-3"><h2 id="rfp-step-3" data-step-heading tabindex="-1">Commercial information</h2><p>It is okay if some answers are still open. Use the options to show where the brief needs discussion.</p><div class="field-grid">
            <div class="field"><label for="budget">Indicative budget range</label><select id="budget" name="budget"><option value="">Choose an option</option><?php foreach (['Not sure yet', 'Under GHS 10,000', 'GHS 10,000 – 25,000', 'GHS 25,000 – 50,000', 'Above GHS 50,000', 'Prefer to discuss'] as $option): ?><option<?= ($values['budget'] ?? '') === $option ? ' selected' : '' ?>><?= e($option) ?></option><?php endforeach; ?></select></div>
            <div class="field"><label for="start-date">Preferred project start date</label><input id="start-date" name="start_date" type="text" maxlength="160" value="<?= old_value($values, 'start_date') ?>" placeholder="e.g. Q2 2027 or flexible"></div>
            <div class="field"><label for="timeline">Expected delivery timeline</label><input id="timeline" name="timeline" type="text" maxlength="160" value="<?= old_value($values, 'timeline') ?>" placeholder="e.g. 8–12 weeks or unsure"></div>
            <div class="field"><label for="request-type">This is a <span>*</span></label><select id="request-type" name="request_type" required><option value="">Choose one</option><?php foreach (['Request for Proposal (RFP)', 'Request for Quotation (RFQ)', 'General project enquiry'] as $option): ?><option<?= ($values['request_type'] ?? '') === $option || ($isRfq && $option === 'Request for Quotation (RFQ)') ? ' selected' : '' ?>><?= e($option) ?></option><?php endforeach; ?></select></div>
            <div class="field field--full"><label for="comments">Additional requirements or comments</label><textarea id="comments" name="comments" maxlength="4000" placeholder="Anything else that will help us respond responsibly?"><?= old_value($values, 'comments') ?></textarea></div>
        </div><div class="form-actions"><button class="button button--ghost" type="button" data-previous-step>← Back</button><button class="button button--primary" type="button" data-next-step>Supporting documents <span aria-hidden="true">→</span></button></div></section>
        <section class="form-step" data-form-step aria-labelledby="rfp-step-4"><h2 id="rfp-step-4" data-step-heading tabindex="-1">Supporting documents</h2><p>Upload only information you are authorised to share. Files are validated and stored privately when the hosting environment allows it.</p><div class="field-grid"><div class="field field--full"><label for="supporting-document">Project brief or supporting document</label><input id="supporting-document" name="supporting_document" type="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.txt"><small>Allowed: PDF, DOC, DOCX, XLS, XLSX, TXT. Maximum 5 MB. No executable files.</small></div></div><div class="aside-note"><p class="eyebrow">Before you continue</p><p>Do not upload passwords, payment information, or unnecessary sensitive personal data. If hosting cannot support private storage, the handover documentation will explain the limitation.</p></div><div class="form-actions"><button class="button button--ghost" type="button" data-previous-step>← Back</button><button class="button button--primary" type="button" data-next-step>Privacy & submit <span aria-hidden="true">→</span></button></div></section>
        <section class="form-step" data-form-step aria-labelledby="rfp-step-5"><h2 id="rfp-step-5" data-step-heading tabindex="-1">Privacy & submission</h2><p>We use these details to assess and respond to your request. Marketing consent is optional and never a condition of submitting.</p><label class="consent-label"><input type="checkbox" name="privacy_acknowledgement" value="yes" required<?= !empty($values['privacy_acknowledgement']) && $values['privacy_acknowledgement'] === 'yes' ? ' checked' : '' ?>> <span>I acknowledge that I have read the <a class="text-link" href="/privacy-policy.php">Privacy Policy</a> and consent to SNA using these details to handle this request. <span class="required">*</span></span></label><label class="consent-label" style="margin-top:17px"><input type="checkbox" name="marketing_consent" value="yes"<?= ($values['marketing_consent'] ?? '') === 'yes' ? ' checked' : '' ?>> <span>I would like to receive occasional marketing or insights from SNA. This is optional.</span></label><div class="form-actions"><button class="button button--ghost" type="button" data-previous-step>← Back</button><button class="button button--primary" type="submit">Submit request <span aria-hidden="true">↗</span></button></div></section>
    </form>
    <?php
}
