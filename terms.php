<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

$page_title = 'Terms & Conditions | ' . COMPANY_NAME;
$page_description = 'Terms and Conditions for the ' . COMPANY_NAME . ' website and related business enquiries.';

require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="container reveal">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/index.php">Home</a><span aria-hidden="true">/</span><span>Terms &amp; Conditions</span>
    </nav>
    <h1>Terms &amp; Conditions</h1>
    <p class="lead">Last updated: September 2026</p>
  </div>
</section>

<section class="section">
  <div class="container legal-content reveal">
    <p>By using this website you agree to these terms.</p>

    <h2>Website purpose</h2>
    <p>This website provides information about <?php echo e(COMPANY_NAME); ?>’s technology capabilities and a way to contact us for business enquiries. Content is for general information and does not constitute a binding offer unless confirmed in a separate agreement.</p>

    <h2>Enquiries</h2>
    <p>Submitting a form or contacting us does not create a client relationship. Project scope, pricing, timelines and deliverables are defined only in written agreements between the parties.</p>

    <h2>Acceptable use</h2>
    <p>You agree not to misuse the website, attempt unauthorised access, submit malicious content, or use contact channels for spam or unlawful purposes.</p>

    <h2>Intellectual property</h2>
    <p>Website design, text, graphics and branding are owned by <?php echo e(COMPANY_NAME); ?> or its licensors. You may not copy or reuse materials without permission, except for fair personal viewing.</p>

    <h2>Disclaimer</h2>
    <p>The site is provided “as is”. Capability descriptions outline what can be built; they are not guarantees of specific outcomes for every project.</p>

    <h2>Limitation of liability</h2>
    <p>To the fullest extent permitted by law, <?php echo e(COMPANY_NAME); ?> is not liable for indirect or consequential damages arising from use of this website.</p>

    <h2>Changes</h2>
    <p>We may update these terms periodically. Continued use of the site after changes constitutes acceptance of the revised terms.</p>

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
