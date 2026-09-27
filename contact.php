<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

$page_title = 'Contact | Book a Demo | ' . COMPANY_NAME;
$page_description = 'Contact ' . COMPANY_NAME . ' to book a demo for AI Voice Agent, AI Chatbot, Video Analytics or CPaaS solutions. ' . COMPANY_ADDRESS . '.';
$page_keywords = 'Book a Demo, AI Voice Agent Demo, Contact AI Company Hyderabad';

$form_status = null;
$form_errors = [];
$form_old = [
    'name' => '',
    'company' => '',
    'email' => '',
    'phone' => '',
    'product' => '',
    'message' => '',
    'website' => '',
];

$allowed_products = [
    'AI Voice Agent',
    'AI Chatbot',
    'Video Analytics',
    'CPaaS',
    'Custom AI Solution',
    'Other',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form_old['name'] = trim((string) ($_POST['name'] ?? ''));
    $form_old['company'] = trim((string) ($_POST['company'] ?? ''));
    $form_old['email'] = trim((string) ($_POST['email'] ?? ''));
    $form_old['phone'] = trim((string) ($_POST['phone'] ?? ''));
    $form_old['product'] = trim((string) ($_POST['product'] ?? ''));
    $form_old['message'] = trim((string) ($_POST['message'] ?? ''));
    $form_old['website'] = trim((string) ($_POST['website'] ?? ''));
    $token = $_POST['csrf_token'] ?? null;

    // Honeypot — bots fill this
    if ($form_old['website'] !== '') {
        $form_status = [
            'type' => 'success',
            'message' => 'Thank you. Your enquiry has been received.',
        ];
        $form_old = [
            'name' => '', 'company' => '', 'email' => '', 'phone' => '',
            'product' => '', 'message' => '', 'website' => '',
        ];
    } elseif (!verify_csrf(is_string($token) ? $token : null)) {
        $form_status = [
            'type' => 'error',
            'message' => 'Security check failed. Please refresh the page and try again.',
        ];
    } else {
        if ($form_old['name'] === '' || strlen($form_old['name']) < 2) {
            $form_errors['name'] = 'Please enter your name.';
        }
        if ($form_old['email'] === '' || !filter_var($form_old['email'], FILTER_VALIDATE_EMAIL)) {
            $form_errors['email'] = 'Please enter a valid email address.';
        }
        if ($form_old['product'] === '' || !in_array($form_old['product'], $allowed_products, true)) {
            $form_errors['product'] = 'Please select a product.';
        }
        if ($form_old['message'] === '' || strlen($form_old['message']) < 10) {
            $form_errors['message'] = 'Please provide a longer message.';
        }
        // Basic phone sanity (optional field)
        if ($form_old['phone'] !== '' && strlen(preg_replace('/\s+/', '', $form_old['phone'])) > 20) {
            $form_errors['phone'] = 'Please enter a valid phone number.';
        }

        if (empty($form_errors)) {
            $safeName = str_replace(["\r", "\n"], '', $form_old['name']);
            $safeEmail = str_replace(["\r", "\n"], '', $form_old['email']);
            $safeProduct = $form_old['product'];

            $subject = 'Website enquiry: ' . $safeProduct . ' — ' . $safeName;
            $body = "New website enquiry\n\n"
                . "Name: {$form_old['name']}\n"
                . "Company: {$form_old['company']}\n"
                . "Email: {$form_old['email']}\n"
                . "Phone: {$form_old['phone']}\n"
                . "Product: {$safeProduct}\n\n"
                . "Message:\n{$form_old['message']}\n\n"
                . "Submitted: " . date('c') . "\n"
                . "IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown') . "\n";

            $payload = [
                'name' => $form_old['name'],
                'company' => $form_old['company'],
                'email' => $form_old['email'],
                'phone' => $form_old['phone'],
                'product' => $safeProduct,
                'message' => $form_old['message'],
                'at' => date('c'),
                'ip' => $_SERVER['REMOTE_ADDR'] ?? null,
            ];

            // Persist enquiry first (works without mail server)
            $logDir = __DIR__ . '/storage';
            $logged = false;
            if (!is_dir($logDir)) {
                @mkdir($logDir, 0775, true);
            }
            if (is_dir($logDir) && is_writable($logDir)) {
                $logged = @file_put_contents(
                    $logDir . '/enquiries.log',
                    json_encode($payload, JSON_UNESCAPED_UNICODE) . PHP_EOL,
                    FILE_APPEND | LOCK_EX
                ) !== false;
            }

            // Best-effort email — many local/Docker hosts have no MTA, so failure is OK
            $mailOk = false;
            $to = CONTACT_TO_EMAIL;
            $canMail = filter_var($to, FILTER_VALIDATE_EMAIL) !== false;
            if ($canMail) {
                $domain = preg_replace('/^www\./', '', COMPANY_WEBSITE);
                $headers = [
                    'MIME-Version: 1.0',
                    'Content-Type: text/plain; charset=UTF-8',
                    'From: Dataa Website <noreply@' . $domain . '>',
                    'Reply-To: ' . $safeEmail,
                    'X-Mailer: PHP/' . PHP_VERSION,
                ];
                $mailOk = @mail(
                    $to,
                    '=?UTF-8?B?' . base64_encode($subject) . '?=',
                    $body,
                    implode("\r\n", $headers)
                );
            }

            // Append mail status to a side log line when possible
            if ($logged && is_writable($logDir)) {
                @file_put_contents(
                    $logDir . '/mail-status.log',
                    date('c') . ' mailed=' . ($mailOk ? '1' : '0') . ' to=' . $to . PHP_EOL,
                    FILE_APPEND | LOCK_EX
                );
            }

            if ($logged || $mailOk) {
                $form_status = [
                    'type' => 'success',
                    'message' => 'Thank you. Your enquiry has been received. Our team will follow up shortly'
                        . ($mailOk ? '.' : ' (you can also email ' . COMPANY_EMAIL . ' directly).'),
                ];
                $form_old = [
                    'name' => '', 'company' => '', 'email' => '', 'phone' => '',
                    'product' => '', 'message' => '', 'website' => '',
                ];
                unset($_SESSION['csrf_token']);
            } else {
                $form_status = [
                    'type' => 'error',
                    'message' => 'Unable to save your enquiry right now. Please email ' . COMPANY_EMAIL . ' or call ' . COMPANY_PHONE . '.',
                ];
            }
        } else {
            $form_status = [
                'type' => 'error',
                'message' => 'Please correct the highlighted fields.',
            ];
        }
    }
}

require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="container reveal">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/index.php">Home</a><span aria-hidden="true">/</span><span>Contact</span>
    </nav>
    <h1>Book a Demo</h1>
    <p class="lead">Tell us about your use case — AI Voice Agent, AI Chatbot, Video Analytics, CPaaS or a custom AI solution.</p>
  </div>
</section>

<section class="section">
  <div class="container contact-layout">
    <aside class="contact-info reveal">
      <h2>Contact details</h2>
      <p>Prefer email or phone? Use the details from your configuration — update them in <code>includes/config.php</code>.</p>
      <div class="contact-detail">
        <span class="label">Company</span>
        <span><?php echo e(COMPANY_NAME); ?></span>
      </div>
      <div class="contact-detail">
        <span class="label">Email</span>
        <a href="<?php echo e(contact_email_href()); ?>"><?php echo e(COMPANY_EMAIL); ?></a>
      </div>
      <div class="contact-detail">
        <span class="label">Phone</span>
        <a href="<?php echo e(contact_phone_href()); ?>"><?php echo e(COMPANY_PHONE); ?></a>
      </div>
      <div class="contact-detail">
        <span class="label">Location</span>
        <span><?php echo e(COMPANY_ADDRESS); ?></span>
      </div>
    </aside>

    <div class="contact-form-wrap reveal delay-1">
      <?php require __DIR__ . '/includes/contact-form.php'; ?>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
