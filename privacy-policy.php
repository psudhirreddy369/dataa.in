<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

$page_title = 'Privacy Policy | ' . COMPANY_NAME;
$page_description = 'Privacy Policy for ' . COMPANY_NAME . '. How we handle website enquiry and contact information.';

require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="container reveal">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/index.php">Home</a><span aria-hidden="true">/</span><span>Privacy Policy</span>
    </nav>
    <h1>Privacy Policy</h1>
    <p class="lead">Last updated: September 2026</p>
  </div>
</section>

<section class="section">
  <div class="container legal-content reveal">
    <p><?php echo e(COMPANY_NAME); ?> (“we”, “us”) operates this website. This policy describes how we handle information related to visitors and business enquiries.</p>

    <h2>Information we collect</h2>
    <p>When you submit the contact form or email us, we may receive:</p>
    <ul>
      <li>Name and company name</li>
      <li>Email address and phone number</li>
      <li>Product interest and message content</li>
      <li>Technical metadata such as IP address and submission time (security / abuse prevention)</li>
    </ul>

    <h2>How we use information</h2>
    <p>We use enquiry details to respond to your request, discuss potential projects and improve our communication with prospective customers. We do not sell personal information.</p>

    <h2>Sharing</h2>
    <p>We may share information with service providers who help operate email, hosting or CRM tools, solely for those purposes. We may disclose information if required by law.</p>

    <h2>Data retention</h2>
    <p>Enquiry records are retained as long as needed to handle your request and maintain reasonable business records, unless a longer period is required by law.</p>

    <h2>Security</h2>
    <p>We take reasonable technical and organisational measures to protect information. No method of transmission over the internet is completely secure.</p>

    <h2>Your choices</h2>
    <p>To update or request deletion of enquiry information you have provided, contact us at <?php echo e(COMPANY_EMAIL); ?>.</p>

    <h2>Contact</h2>
    <p>
      <?php echo e(COMPANY_NAME); ?><br>
      <?php echo e(COMPANY_ADDRESS); ?><br>
      Email: <?php echo e(COMPANY_EMAIL); ?><br>
      Phone: <?php echo e(COMPANY_PHONE); ?>
    </p>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
