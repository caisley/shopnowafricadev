<?php
declare(strict_types=1);

function post_string(string $key, int $max = 5000): string
{
    $value = trim((string) ($_POST[$key] ?? ''));
    $value = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $value) ?? '';
    return mb_substr($value, 0, $max);
}

function form_rate_limited(string $bucket): bool
{
    $now = time();
    $_SESSION['form_attempts'] ??= [];
    $last = (int) ($_SESSION['form_attempts'][$bucket] ?? 0);
    $_SESSION['form_attempts'][$bucket] = $now;
    $ipHash = hash('sha256', (string) ($_SERVER['REMOTE_ADDR'] ?? 'unknown'));
    $rateFile = rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'sna-rate-' . $bucket . '-' . $ipHash;
    $sharedLast = (int) (@file_get_contents($rateFile) ?: 0);
    @file_put_contents($rateFile, (string) $now, LOCK_EX);
    return ($last > 0 && ($now - $last) < 8) || ($sharedLast > 0 && ($now - $sharedLast) < 30);
}

function form_base_result(): array
{
    return ['ok' => false, 'errors' => [], 'values' => [], 'reference' => '', 'delivery' => 'not-configured', 'message' => ''];
}

function add_required_error(array &$errors, string $key, string $label, string $value): void
{
    if ($value === '') $errors[$key] = $label . ' is required.';
}

function validate_email_field(array &$errors, string $key, string $label, string $value): void
{
    if ($value !== '' && !filter_var($value, FILTER_VALIDATE_EMAIL)) $errors[$key] = 'Enter a valid ' . strtolower($label) . '.';
}

function validate_enum_field(array &$errors, string $key, string $label, string $value, array $allowed, bool $optional = false): void
{
    if ($optional && $value === '') return;
    if (!in_array($value, $allowed, true)) $errors[$key] = 'Choose a valid ' . strtolower($label) . '.';
}

function ensure_private_storage(): bool
{
    $root = (string) sna_config('storage_path', dirname(__DIR__) . '/storage');
    $submissions = $root . '/submissions';
    $uploads = $root . '/private_uploads';
    foreach ([$root, $submissions, $uploads] as $directory) {
        if (!is_dir($directory) && !@mkdir($directory, 0700, true) && !is_dir($directory)) return false;
    }
    return is_writable($submissions) && is_writable($uploads);
}

function new_submission_reference(): string
{
    return 'SNA-' . date('Ymd') . '-' . strtoupper(bin2hex(random_bytes(3)));
}

function store_submission(string $type, array $payload): string|false
{
    if (!ensure_private_storage()) return false;
    $reference = new_submission_reference();
    $payload['reference'] = $reference;
    $payload['submission_type'] = $type;
    $payload['stored_at'] = date(DATE_ATOM);
    $path = rtrim((string) sna_config('storage_path'), '/') . '/submissions/' . $reference . '.json';
    $encoded = json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    if ($encoded === false || @file_put_contents($path, $encoded, LOCK_EX) === false) return false;
    return $reference;
}

function send_submission_notification(string $subject, array $payload): string
{
    if (!sna_config('mail_enabled', false)) return 'not-configured';
    $destination = (string) sna_config('notify_email', '');
    $from = (string) sna_config('from_email', '');
    if (!filter_var($destination, FILTER_VALIDATE_EMAIL) || !filter_var($from, FILTER_VALIDATE_EMAIL)) return 'not-configured';
    $lines = [];
    foreach ($payload as $key => $value) {
        if (is_scalar($value)) $lines[] = strtoupper(str_replace('_', ' ', (string) $key)) . ': ' . (string) $value;
    }
    $headers = ['From: ' . $from, 'Content-Type: text/plain; charset=UTF-8', 'X-Mailer: Shop Now Africa Website'];
    $sent = @mail($destination, $subject, implode("\n", $lines), implode("\r\n", $headers));
    if (!$sent) {
        error_log('Shop Now Africa notification mail failed: ' . $subject);
        return 'failed';
    }
    return 'sent';
}

function process_contact_form(): array
{
    $result = form_base_result();
    $values = [
        'name' => post_string('name', 120), 'organisation' => post_string('organisation', 160), 'email' => post_string('email', 190),
        'telephone' => post_string('telephone', 60), 'service' => post_string('service', 120), 'message' => post_string('message', 4000),
    ];
    $result['values'] = $values;
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') return $result;
    if (!verify_csrf($_POST['csrf_token'] ?? null)) $result['errors']['form'] = 'Your session check has expired. Please refresh and try again.';
    if (post_string('website_url', 200) !== '') $result['errors']['form'] = 'We could not process this request.';
    if (form_rate_limited('contact')) $result['errors']['form'] = 'Please wait a few seconds before sending another request.';
    add_required_error($result['errors'], 'name', 'Name', $values['name']); add_required_error($result['errors'], 'email', 'Email', $values['email']);
    add_required_error($result['errors'], 'message', 'Message', $values['message']); validate_email_field($result['errors'], 'email', 'email address', $values['email']);
    validate_enum_field($result['errors'], 'service', 'service', $values['service'], ['Website design and development', 'Custom web applications', 'Brand identity and graphic design', 'Social media management', 'Digital marketing', 'Digital strategy and consultancy', 'IT solutions and automation', 'Not sure yet'], true);
    if (empty($_POST['privacy_acknowledgement'])) $result['errors']['privacy_acknowledgement'] = 'Please acknowledge the Privacy Policy before sending your enquiry.';
    if ($result['errors']) return $result;
    $payload = $values + ['ip_hash' => hash('sha256', (string) ($_SERVER['REMOTE_ADDR'] ?? '')), 'user_agent' => mb_substr((string) ($_SERVER['HTTP_USER_AGENT'] ?? ''), 0, 240)];
    $reference = store_submission('contact', $payload);
    if ($reference === false) { $result['errors']['form'] = 'The request could not be securely saved. Please try again later or contact SNA through its configured business channel.'; return $result; }
    $result['ok'] = true; $result['reference'] = $reference; $result['delivery'] = send_submission_notification('New SNA contact enquiry ' . $reference, $payload); $result['message'] = 'Your message has been recorded with reference ' . $reference . '.'; return $result;
}

function process_privacy_request(): array
{
    $result = form_base_result();
    $values = ['name' => post_string('name', 120), 'email' => post_string('email', 190), 'request_type' => post_string('request_type', 100), 'message' => post_string('message', 3000)];
    $result['values'] = $values;
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') return $result;
    if (!verify_csrf($_POST['csrf_token'] ?? null)) $result['errors']['form'] = 'Your session check has expired. Please refresh and try again.';
    if (post_string('website_url', 200) !== '') $result['errors']['form'] = 'We could not process this request.';
    if (form_rate_limited('privacy')) $result['errors']['form'] = 'Please wait a few seconds before sending another request.';
    add_required_error($result['errors'], 'name', 'Name', $values['name']); add_required_error($result['errors'], 'email', 'Email', $values['email']); add_required_error($result['errors'], 'request_type', 'Request type', $values['request_type']); add_required_error($result['errors'], 'message', 'Message', $values['message']); validate_email_field($result['errors'], 'email', 'email address', $values['email']);
    validate_enum_field($result['errors'], 'request_type', 'request type', $values['request_type'], ['Access to information', 'Correction of information', 'Deletion request', 'Question about processing', 'Other privacy concern']);
    if ($result['errors']) return $result;
    $payload = $values + ['ip_hash' => hash('sha256', (string) ($_SERVER['REMOTE_ADDR'] ?? ''))]; $reference = store_submission('privacy-request', $payload);
    if ($reference === false) { $result['errors']['form'] = 'The request could not be securely saved. Please try again later.'; return $result; }
    $result['ok'] = true; $result['reference'] = $reference; $result['delivery'] = send_submission_notification('New SNA privacy request ' . $reference, $payload); $result['message'] = 'Your request has been recorded with reference ' . $reference . '.'; return $result;
}

function handle_supporting_upload(array &$errors): string
{
    if (empty($_FILES['supporting_document']) || ($_FILES['supporting_document']['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) return '';
    $file = $_FILES['supporting_document'];
    if (($file['error'] ?? UPLOAD_ERR_OK) !== UPLOAD_ERR_OK) { $errors['supporting_document'] = 'The supporting document could not be uploaded.'; return ''; }
    $max = (int) sna_config('max_upload_bytes', 5242880);
    if ((int) ($file['size'] ?? 0) > $max) { $errors['supporting_document'] = 'The supporting document must be 5 MB or smaller.'; return ''; }
    $original = (string) ($file['name'] ?? 'document'); $extension = strtolower(pathinfo($original, PATHINFO_EXTENSION));
    $allowedExtensions = (array) sna_config('allowed_upload_extensions', []); if (!in_array($extension, $allowedExtensions, true)) { $errors['supporting_document'] = 'This file type is not allowed.'; return ''; }
    $mime = class_exists('finfo') ? (new finfo(FILEINFO_MIME_TYPE))->file((string) $file['tmp_name']) : (string) ($file['type'] ?? '');
    if (!in_array($mime, (array) sna_config('allowed_upload_mimes', []), true)) { $errors['supporting_document'] = 'The uploaded file content does not match an allowed document type.'; return ''; }
    if (!ensure_private_storage()) { $errors['supporting_document'] = 'Private upload storage is not available. Submit without the file or configure storage first.'; return ''; }
    $safeName = bin2hex(random_bytes(16)) . '.' . $extension; $target = rtrim((string) sna_config('storage_path'), '/') . '/private_uploads/' . $safeName;
    if (!is_uploaded_file((string) $file['tmp_name']) || !move_uploaded_file((string) $file['tmp_name'], $target)) { $errors['supporting_document'] = 'The supporting file could not be saved securely.'; return ''; }
    return $safeName;
}

function process_rfp_form(): array
{
    $result = form_base_result();
    $keys = ['organisation', 'name', 'email', 'telephone', 'country', 'website', 'organisation_type', 'project_title', 'service_category', 'industry', 'problem', 'deliverables', 'requirements', 'users', 'technology', 'existing_system', 'budget', 'start_date', 'timeline', 'request_type', 'comments'];
    $values = []; foreach ($keys as $key) $values[$key] = post_string($key, in_array($key, ['problem', 'deliverables', 'requirements', 'comments'], true) ? 4000 : 400);
    $values['marketing_consent'] = !empty($_POST['marketing_consent']) ? 'yes' : 'no'; $values['privacy_acknowledgement'] = !empty($_POST['privacy_acknowledgement']) ? 'yes' : 'no'; $result['values'] = $values;
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') return $result;
    if (!verify_csrf($_POST['csrf_token'] ?? null)) $result['errors']['form'] = 'Your session check has expired. Please refresh and try again.';
    if (post_string('website_url', 200) !== '') $result['errors']['form'] = 'We could not process this request.';
    if (form_rate_limited('rfp')) $result['errors']['form'] = 'Please wait a few seconds before sending another request.';
    foreach (['organisation' => 'Organisation or business name', 'name' => 'Contact name', 'email' => 'Work email', 'telephone' => 'Telephone number', 'country' => 'Country', 'organisation_type' => 'Organisation type', 'project_title' => 'Project title', 'service_category' => 'Service category', 'industry' => 'Industry', 'problem' => 'Business problem', 'deliverables' => 'Desired deliverables', 'users' => 'Intended users', 'request_type' => 'Request type'] as $key => $label) add_required_error($result['errors'], $key, $label, $values[$key]);
    validate_enum_field($result['errors'], 'organisation_type', 'organisation type', $values['organisation_type'], ['SME or enterprise', 'Startup or entrepreneur', 'Education institution', 'Healthcare organisation', 'Religious institution', 'NGO or development organisation', 'Public or professional institution', 'Other']);
    validate_enum_field($result['errors'], 'service_category', 'service category', $values['service_category'], ['Website design and development', 'Custom web applications and management systems', 'Graphic design and brand identity', 'Social media management', 'Digital marketing and online presence', 'Digital strategy and business consultancy', 'IT solutions and business process automation', 'Digital transformation and technology advisory', 'A combination / not sure yet']);
    validate_enum_field($result['errors'], 'budget', 'budget range', $values['budget'], ['Not sure yet', 'Under GHS 10,000', 'GHS 10,000 – 25,000', 'GHS 25,000 – 50,000', 'Above GHS 50,000', 'Prefer to discuss'], true);
    validate_enum_field($result['errors'], 'request_type', 'request type', $values['request_type'], ['Request for Proposal (RFP)', 'Request for Quotation (RFQ)', 'General project enquiry']);
    validate_email_field($result['errors'], 'email', 'work email address', $values['email']);
    if ($values['website'] !== '' && !filter_var($values['website'], FILTER_VALIDATE_URL)) $result['errors']['website'] = 'Enter a valid website URL or leave this field blank.';
    if ($values['privacy_acknowledgement'] !== 'yes') $result['errors']['privacy_acknowledgement'] = 'Please acknowledge the Privacy Policy before submitting.';
    if ($result['errors']) return $result;
    $upload = handle_supporting_upload($result['errors']); if ($result['errors']) return $result;
    $payload = $values + ['supporting_document' => $upload !== '' ? 'private/' . $upload : 'none', 'ip_hash' => hash('sha256', (string) ($_SERVER['REMOTE_ADDR'] ?? ''))]; $reference = store_submission('rfp-rfq', $payload);
    if ($reference === false) { if ($upload !== '') @unlink(rtrim((string) sna_config('storage_path'), '/') . '/private_uploads/' . $upload); $result['errors']['form'] = 'The request could not be securely saved. Please try again later or contact SNA through its configured business channel.'; return $result; }
    $result['ok'] = true; $result['reference'] = $reference; $result['delivery'] = send_submission_notification('New SNA RFP/RFQ ' . $reference, $payload); $result['message'] = 'Your request has been recorded with reference ' . $reference . '.'; return $result;
}
