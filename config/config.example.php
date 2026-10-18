<?php
/**
 * Copy this file to config.php and replace placeholders before production use.
 * Keep real credentials outside the public document root where cPanel allows.
 */
return [
    'site_name' => 'Shop Now Africa',
    'site_tagline' => 'From ideas to solutions to impact.',
    'site_url' => 'https://shopnowafrica.com',
    'contact_email' => 'REPLACE_WITH_OFFICIAL_SNA_EMAIL',
    'notify_email' => 'REPLACE_WITH_RFP_NOTIFICATION_EMAIL',
    'from_email' => 'REPLACE_WITH_VERIFIED_FROM_EMAIL',
    'mail_enabled' => false,
    'storage_path' => dirname(__DIR__) . '/storage',
    'max_upload_bytes' => 5242880,
    'allowed_upload_extensions' => ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'txt'],
    'allowed_upload_mimes' => [
        'application/pdf',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/vnd.ms-excel',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'text/plain',
    ],
    'session_name' => 'sna_session',
];
