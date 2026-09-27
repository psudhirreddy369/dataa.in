<?php
/**
 * Contact form partial — used on contact.php (and optionally elsewhere).
 */
declare(strict_types=1);

$form_status = $form_status ?? null; // ['type' => 'success'|'error', 'message' => '...']
$form_errors = $form_errors ?? [];
$form_old = $form_old ?? [
    'name' => '',
    'company' => '',
    'email' => '',
    'phone' => '',
    'product' => '',
    'message' => '',
    'website' => '', // honeypot
];

$product_options = [
    'AI Voice Agent',
    'AI Chatbot',
    'Video Analytics',
    'CPaaS',
    'Custom AI Solution',
    'Other',
];

$prefill = isset($_GET['product']) ? trim((string) $_GET['product']) : '';
if ($prefill !== '' && $form_old['product'] === '' && in_array($prefill, $product_options, true)) {
    $form_old['product'] = $prefill;
}
?>

<form class="contact-form" id="contact-form" method="post" action="/contact.php" novalidate>
  <?php echo csrf_field(); ?>

  <!-- Honeypot spam protection — leave empty -->
  <div class="hp-field" aria-hidden="true">
    <label for="website">Website</label>
    <input type="text" id="website" name="website" tabindex="-1" autocomplete="off" value="<?php echo e($form_old['website']); ?>">
  </div>

  <?php if ($form_status): ?>
  <div class="alert alert-<?php echo e($form_status['type']); ?>" role="status">
    <?php echo e($form_status['message']); ?>
  </div>
  <?php endif; ?>

  <div class="form-grid">
    <div class="form-group<?php echo isset($form_errors['name']) ? ' has-error' : ''; ?>">
      <label for="name">Name <span class="req">*</span></label>
      <input type="text" id="name" name="name" required autocomplete="name" value="<?php echo e($form_old['name']); ?>">
      <?php if (isset($form_errors['name'])): ?><span class="field-error"><?php echo e($form_errors['name']); ?></span><?php endif; ?>
    </div>

    <div class="form-group<?php echo isset($form_errors['company']) ? ' has-error' : ''; ?>">
      <label for="company">Company</label>
      <input type="text" id="company" name="company" autocomplete="organization" value="<?php echo e($form_old['company']); ?>">
      <?php if (isset($form_errors['company'])): ?><span class="field-error"><?php echo e($form_errors['company']); ?></span><?php endif; ?>
    </div>

    <div class="form-group<?php echo isset($form_errors['email']) ? ' has-error' : ''; ?>">
      <label for="email">Email <span class="req">*</span></label>
      <input type="email" id="email" name="email" required autocomplete="email" value="<?php echo e($form_old['email']); ?>">
      <?php if (isset($form_errors['email'])): ?><span class="field-error"><?php echo e($form_errors['email']); ?></span><?php endif; ?>
    </div>

    <div class="form-group<?php echo isset($form_errors['phone']) ? ' has-error' : ''; ?>">
      <label for="phone">Phone</label>
      <input type="tel" id="phone" name="phone" autocomplete="tel" value="<?php echo e($form_old['phone']); ?>">
      <?php if (isset($form_errors['phone'])): ?><span class="field-error"><?php echo e($form_errors['phone']); ?></span><?php endif; ?>
    </div>

    <div class="form-group full<?php echo isset($form_errors['product']) ? ' has-error' : ''; ?>">
      <label for="product">Product Interested In <span class="req">*</span></label>
      <select id="product" name="product" required>
        <option value="">Select a product</option>
        <?php foreach ($product_options as $opt): ?>
        <option value="<?php echo e($opt); ?>"<?php echo $form_old['product'] === $opt ? ' selected' : ''; ?>><?php echo e($opt); ?></option>
        <?php endforeach; ?>
      </select>
      <?php if (isset($form_errors['product'])): ?><span class="field-error"><?php echo e($form_errors['product']); ?></span><?php endif; ?>
    </div>

    <div class="form-group full<?php echo isset($form_errors['message']) ? ' has-error' : ''; ?>">
      <label for="message">Message <span class="req">*</span></label>
      <textarea id="message" name="message" rows="5" required placeholder="Describe your use case, channels, or technical goals…"><?php echo e($form_old['message']); ?></textarea>
      <?php if (isset($form_errors['message'])): ?><span class="field-error"><?php echo e($form_errors['message']); ?></span><?php endif; ?>
    </div>
  </div>

  <div class="form-actions">
    <button type="submit" class="btn btn-primary" id="contact-submit">Send Enquiry</button>
  </div>
  <p class="form-note">We use your details only to respond to this enquiry. See our <a href="/privacy-policy.php">Privacy Policy</a>.</p>
</form>
