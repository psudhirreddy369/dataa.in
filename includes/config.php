<?php
/**
 * Site configuration — change these values once; they update site-wide.
 */
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('COMPANY_NAME', 'Dataa');
define('COMPANY_EMAIL', 'connect@dataa.in');
define('COMPANY_PHONE', '+91 77913 25111');
define('COMPANY_ADDRESS', 'Hyderabad, Rajendranagar, Telangana, India');
define('COMPANY_WEBSITE', 'dataa.in');
define('COMPANY_TAGLINE', 'AI · Communication · Automation · Video Analytics');

// Optional social URLs — leave empty to hide icons in the footer
define('SOCIAL_LINKEDIN', '');
define('SOCIAL_TWITTER', '');
define('SOCIAL_YOUTUBE', '');

// Contact form recipient (defaults to company email)
define('CONTACT_TO_EMAIL', COMPANY_EMAIL);

// Base URL for canonical / OG tags (no trailing slash)
define('SITE_URL', 'https://dataa.in');

define('SITE_YEAR', (int) date('Y'));

/**
 * Escape output for HTML context.
 */
function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**
 * Whether a contact detail is still a placeholder.
 */
function is_placeholder(string $value): bool
{
    $placeholders = [
        'YOUR COMPANY NAME',
        'YOUR EMAIL',
        'YOUR PHONE',
        'YOUR DOMAIN',
    ];
    return in_array($value, $placeholders, true);
}

/**
 * Safe mailto / tel href — empty if placeholder.
 */
function contact_email_href(): string
{
    return is_placeholder(COMPANY_EMAIL) ? '#' : 'mailto:' . COMPANY_EMAIL;
}

function contact_phone_href(): string
{
    if (is_placeholder(COMPANY_PHONE)) {
        return '#';
    }
    $digits = preg_replace('/[^0-9+]/', '', COMPANY_PHONE);
    return 'tel:' . $digits;
}

/**
 * CSRF helpers
 */
function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_field(): string
{
    return '<input type="hidden" name="csrf_token" value="' . e(csrf_token()) . '">';
}

function verify_csrf(?string $token): bool
{
    return is_string($token)
        && isset($_SESSION['csrf_token'])
        && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Active nav helper
 */
function nav_active(string $file): string
{
    $script = basename($_SERVER['SCRIPT_NAME'] ?? '');
    return $script === $file ? ' active' : '';
}

function is_products_section(): bool
{
    $script = basename($_SERVER['SCRIPT_NAME'] ?? '');
    return in_array($script, [
        'products.php',
        'ai-voice-agent.php',
        'ai-chatbot.php',
        'video-analytics.php',
    ], true);
}
