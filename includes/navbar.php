<?php
declare(strict_types=1);
?>
<header class="site-header" id="site-header">
  <div class="container header-inner">
    <a class="brand" href="/index.php" aria-label="<?php echo e(COMPANY_NAME); ?> home">
      <span class="brand-mark" aria-hidden="true"></span>
      <span class="brand-text"><?php echo e(COMPANY_NAME); ?></span>
    </a>

    <nav class="nav-desktop" aria-label="Primary">
      <ul class="nav-list">
        <li><a class="nav-link<?php echo nav_active('index.php'); ?>" href="/index.php">Home</a></li>
        <li class="has-dropdown<?php echo is_products_section() ? ' is-current' : ''; ?>">
          <button class="nav-link nav-dropdown-btn<?php echo is_products_section() ? ' active' : ''; ?>" type="button" aria-expanded="false" aria-haspopup="true" id="products-menu-btn">
            Products <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
          </button>
          <ul class="dropdown" role="menu" aria-labelledby="products-menu-btn">
            <li role="none"><a role="menuitem" href="/products.php">All Products</a></li>
            <li role="none"><a role="menuitem" href="/ai-voice-agent.php">AI Voice Agent</a></li>
            <li role="none"><a role="menuitem" href="/ai-chatbot.php">AI Chatbot</a></li>
            <li role="none"><a role="menuitem" href="/video-analytics.php">Video Analytics</a></li>
          </ul>
        </li>
        <li><a class="nav-link<?php echo nav_active('solutions.php'); ?>" href="/solutions.php">Solutions</a></li>
        <li><a class="nav-link<?php echo nav_active('industries.php'); ?>" href="/industries.php">Industries</a></li>
        <li><a class="nav-link<?php echo nav_active('about.php'); ?>" href="/about.php">About</a></li>
        <li><a class="nav-link<?php echo nav_active('contact.php'); ?>" href="/contact.php">Contact</a></li>
      </ul>
    </nav>

    <a class="btn btn-primary btn-sm header-cta" href="/contact.php">Book a Demo</a>

    <button class="nav-toggle" type="button" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-nav">
      <span></span><span></span><span></span>
    </button>
  </div>

  <nav class="nav-mobile" id="mobile-nav" hidden aria-label="Mobile">
    <ul>
      <li><a href="/index.php">Home</a></li>
      <li class="mobile-group">
        <span class="mobile-group-label">Products</span>
        <a href="/products.php">All Products</a>
        <a href="/ai-voice-agent.php">AI Voice Agent</a>
        <a href="/ai-chatbot.php">AI Chatbot</a>
        <a href="/video-analytics.php">Video Analytics</a>
      </li>
      <li><a href="/solutions.php">Solutions</a></li>
      <li><a href="/industries.php">Industries</a></li>
      <li><a href="/about.php">About</a></li>
      <li><a href="/contact.php">Contact</a></li>
      <li class="mobile-cta"><a class="btn btn-primary" href="/contact.php">Book a Demo</a></li>
    </ul>
  </nav>
</header>
