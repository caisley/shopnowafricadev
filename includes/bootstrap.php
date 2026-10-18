<?php
declare(strict_types=1);

$configFile = dirname(__DIR__) . '/config/config.php';
$config = file_exists($configFile)
    ? require $configFile
    : require dirname(__DIR__) . '/config/config.example.php';

$GLOBALS['sna_config'] = $config;
date_default_timezone_set('Africa/Accra');

if (PHP_SAPI !== 'cli' && !headers_sent()) {
    header('X-Content-Type-Options: nosniff');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('Permissions-Policy: geolocation=(), microphone=(), camera=()');
    header("Content-Security-Policy: default-src 'self'; script-src 'self'; style-src 'self' 'unsafe-inline'; img-src 'self' data:; font-src 'self'; connect-src 'self'; form-action 'self'; base-uri 'self'");
}

if (session_status() !== PHP_SESSION_ACTIVE) {
    $isHttps = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
    session_name((string) ($config['session_name'] ?? 'sna_session'));
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'secure' => $isHttps,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_start();
}

require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/content.php';
require_once __DIR__ . '/form-handler.php';
