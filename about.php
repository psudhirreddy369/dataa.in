<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

$page_title = 'About | ' . COMPANY_NAME . ' — AI, Communication & Automation';
$page_description = 'Engineering AI solutions for real-world business problems across voice AI, conversational automation, computer vision, cloud and enterprise integration.';
$page_keywords = 'AI Company Hyderabad, AI Solutions, Conversational AI, Computer Vision, Enterprise Integration';

require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="container reveal">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/index.php">Home</a><span aria-hidden="true">/</span><span>About</span>
    </nav>
    <h1>Engineering AI Solutions for Real-World Business Problems</h1>
    <p class="lead"><?php echo e(COMPANY_NAME); ?> focuses on AI, communication, automation, computer vision, cloud and enterprise integration — building systems organisations can operate in production.</p>
  </div>
</section>

<section class="section">
  <div class="container container-narrow reveal">
    <p class="section-label">Our Mission</p>
    <h2 class="section-heading" style="max-width:none">Connect intelligence to operations</h2>
    <p class="section-lead" style="max-width:none">Help businesses automate conversations and visual monitoring with technology that integrates into existing channels, cameras and software — without unsupported marketing claims.</p>
  </div>
</section>

<section class="section section-alt">
  <div class="container">
    <div class="section-header reveal">
      <p class="section-label">Our Expertise</p>
      <h2 class="section-heading">Disciplines we combine</h2>
    </div>
    <div class="pillars">
      <article class="glass-card reveal"><h3>AI</h3><p>Voice AI, LLMs, conversational systems and applied machine intelligence.</p></article>
      <article class="glass-card reveal delay-1"><h3>Communication</h3><p>CPaaS patterns across WhatsApp, SMS, IVR, SIP and voice automation.</p></article>
      <article class="glass-card reveal delay-2"><h3>Automation</h3><p>Workflow orchestration that turns AI outcomes into business actions.</p></article>
      <article class="glass-card reveal"><h3>Computer Vision</h3><p>Video analytics for security, safety and operational monitoring.</p></article>
      <article class="glass-card reveal delay-1"><h3>Cloud</h3><p>Containerized delivery, monitoring and scalable infrastructure.</p></article>
      <article class="glass-card reveal delay-2"><h3>Enterprise Integration</h3><p>CRM, ERP and custom API connectivity for production workflows.</p></article>
    </div>
  </div>
</section>

<section class="section">
  <div class="container two-col">
    <div class="reveal">
      <p class="section-label">Our Approach</p>
      <h2 class="section-heading">Discovery → architecture → deployment</h2>
      <ul class="check-list">
        <li><i class="fa-solid fa-circle-check"></i> Clarify the operational problem and constraints</li>
        <li><i class="fa-solid fa-circle-check"></i> Design around channels, cameras and system integrations</li>
        <li><i class="fa-solid fa-circle-check"></i> Pilot with measurable intents and escalation paths</li>
        <li><i class="fa-solid fa-circle-check"></i> Harden for production monitoring and support</li>
      </ul>
    </div>
    <div class="reveal delay-1">
      <p class="section-label">Our Technology</p>
      <h2 class="section-heading">Modern AI &amp; cloud stack</h2>
      <p class="section-lead">We work with AI/LLM systems, Python/FastAPI services, PHP and JavaScript applications, SIP/SMPP/WebRTC communication, Docker/Kubernetes/AWS infrastructure, and data stores such as MySQL, Redis and Kafka — selected to fit the problem.</p>
      <a class="btn btn-secondary" href="/index.php#technology">View technology section</a>
    </div>
  </div>
</section>

<section class="cta-band">
  <div class="container reveal">
    <h2>Work with <?php echo e(COMPANY_NAME); ?></h2>
    <p>Based in <?php echo e(COMPANY_ADDRESS); ?>. Reach out for demos, technical discovery or deployment discussions.</p>
    <a class="btn btn-primary" href="/contact.php">Contact Us</a>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
