<?php
declare(strict_types=1);
require_once __DIR__ . '/config.php';

$page_title = $page_title ?? COMPANY_NAME . ' | AI Voice, Chatbot & Video Analytics';
$page_description = $page_description ?? 'Enterprise AI solutions for intelligent voice conversations, conversational automation and real-time video analytics.';
$page_keywords = $page_keywords ?? 'AI Voice Agent, AI Chatbot, Video Analytics, Conversational AI, CPaaS, Computer Vision, AI Solutions Hyderabad';
$page_canonical = $page_canonical ?? SITE_URL . '/' . ltrim(basename($_SERVER['SCRIPT_NAME'] ?? 'index.php'), '/');
if (($page_canonical_path ?? null) === '/' || basename($_SERVER['SCRIPT_NAME'] ?? '') === 'index.php') {
    $page_canonical = SITE_URL . '/';
}
$page_og_type = $page_og_type ?? 'website';
$body_class = $body_class ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo e($page_title); ?></title>
  <meta name="description" content="<?php echo e($page_description); ?>">
  <meta name="keywords" content="<?php echo e($page_keywords); ?>">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="<?php echo e($page_canonical); ?>">

  <meta property="og:type" content="<?php echo e($page_og_type); ?>">
  <meta property="og:site_name" content="<?php echo e(COMPANY_NAME); ?>">
  <meta property="og:title" content="<?php echo e($page_title); ?>">
  <meta property="og:description" content="<?php echo e($page_description); ?>">
  <meta property="og:url" content="<?php echo e($page_canonical); ?>">
  <meta property="og:locale" content="en_IN">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo e($page_title); ?>">
  <meta name="twitter:description" content="<?php echo e($page_description); ?>">

  <link rel="icon" href="/assets/icons/favicon.svg" type="image/svg+xml">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
  <link rel="stylesheet" href="/assets/css/style.css">

  <?php if (!empty($structured_data)): ?>
  <script type="application/ld+json"><?php echo $structured_data; ?></script>
  <?php endif; ?>
</head>
<body class="<?php echo e($body_class); ?>">
<a class="skip-link" href="#main-content">Skip to content</a>
<?php require __DIR__ . '/navbar.php'; ?>
<main id="main-content">
