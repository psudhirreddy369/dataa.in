<?php
declare(strict_types=1);
?>
</main>

<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <a class="brand" href="/index.php">
          <span class="brand-mark" aria-hidden="true"></span>
          <span class="brand-text"><?php echo e(COMPANY_NAME); ?></span>
        </a>
        <p class="footer-tagline"><?php echo e(COMPANY_TAGLINE); ?></p>
        <p class="footer-desc">Enterprise AI solutions for intelligent voice conversations, conversational automation and real-time video analytics.</p>
        <?php if (SOCIAL_LINKEDIN || SOCIAL_TWITTER || SOCIAL_YOUTUBE): ?>
        <div class="footer-social">
          <?php if (SOCIAL_LINKEDIN): ?>
          <a href="<?php echo e(SOCIAL_LINKEDIN); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
          <?php endif; ?>
          <?php if (SOCIAL_TWITTER): ?>
          <a href="<?php echo e(SOCIAL_TWITTER); ?>" target="_blank" rel="noopener noreferrer" aria-label="X / Twitter"><i class="fa-brands fa-x-twitter"></i></a>
          <?php endif; ?>
          <?php if (SOCIAL_YOUTUBE): ?>
          <a href="<?php echo e(SOCIAL_YOUTUBE); ?>" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
          <?php endif; ?>
        </div>
        <?php endif; ?>
      </div>

      <div class="footer-col">
        <h3>Company</h3>
        <ul>
          <li><a href="/index.php">Home</a></li>
          <li><a href="/about.php">About</a></li>
          <li><a href="/contact.php">Contact</a></li>
          <li><a href="/privacy-policy.php">Privacy Policy</a></li>
          <li><a href="/terms.php">Terms &amp; Conditions</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h3>Products</h3>
        <ul>
          <li><a href="/ai-voice-agent.php">AI Voice Agent</a></li>
          <li><a href="/ai-chatbot.php">AI Chatbot</a></li>
          <li><a href="/video-analytics.php">Video Analytics</a></li>
          <li><a href="/products.php">All Products</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h3>Solutions</h3>
        <ul>
          <li><a href="/solutions.php#customer-experience">Customer Experience</a></li>
          <li><a href="/solutions.php#enterprise-automation">Enterprise Automation</a></li>
          <li><a href="/solutions.php#security-monitoring">Security &amp; Monitoring</a></li>
          <li><a href="/solutions.php#communication">Communication</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h3>Industries</h3>
        <ul>
          <li><a href="/industries.php">All Industries</a></li>
          <li><a href="/industries.php#telecom">Telecom</a></li>
          <li><a href="/industries.php#healthcare">Healthcare</a></li>
          <li><a href="/industries.php#banking">Banking &amp; BFSI</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h3>Contact</h3>
        <ul class="footer-contact">
          <li>
            <span class="label">Email</span>
            <a href="<?php echo e(contact_email_href()); ?>"><?php echo e(COMPANY_EMAIL); ?></a>
          </li>
          <li>
            <span class="label">Phone</span>
            <a href="<?php echo e(contact_phone_href()); ?>"><?php echo e(COMPANY_PHONE); ?></a>
          </li>
          <li>
            <span class="label">Location</span>
            <span><?php echo e(COMPANY_ADDRESS); ?></span>
          </li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <p>&copy; <?php echo SITE_YEAR; ?> <?php echo e(COMPANY_NAME); ?>. All rights reserved.</p>
      <p class="footer-links">
        <a href="/privacy-policy.php">Privacy</a>
        <a href="/terms.php">Terms</a>
      </p>
    </div>
  </div>
</footer>

<button type="button" class="back-to-top" id="back-to-top" aria-label="Back to top" hidden>
  <i class="fa-solid fa-arrow-up" aria-hidden="true"></i>
</button>

<script src="/assets/js/main.js" defer></script>
<?php if (!empty($page_scripts) && is_array($page_scripts)): ?>
  <?php foreach ($page_scripts as $script): ?>
  <script src="<?php echo e($script); ?>" defer></script>
  <?php endforeach; ?>
<?php endif; ?>
</body>
</html>
