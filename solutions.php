<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

$page_title = 'AI & Communication Solutions | ' . COMPANY_NAME;
$page_description = 'Solutions for customer experience, enterprise automation, security monitoring and CPaaS communication — powered by AI voice, chatbots and video analytics.';
$page_keywords = 'Enterprise Automation, CPaaS, Omnichannel Communication, AI Solutions, Business Automation';

require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="container reveal">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/index.php">Home</a><span aria-hidden="true">/</span><span>Solutions</span>
    </nav>
    <h1>Solutions Across Experience, Automation &amp; Security</h1>
    <p class="lead">Combine AI products with communication infrastructure and enterprise integration to solve operational problems.</p>
  </div>
</section>

<section class="section" id="customer-experience">
  <div class="container">
    <div class="section-header reveal">
      <p class="section-label">Customer Experience</p>
      <h2 class="section-heading">Conversations that resolve and convert</h2>
    </div>
    <div class="card-grid-2">
      <article class="glass-card reveal"><h3>AI Voice</h3><p>Inbound and outbound voice automation for support, reminders and engagement.</p><a class="card-link" href="/ai-voice-agent.php">Learn more <i class="fa-solid fa-arrow-right"></i></a></article>
      <article class="glass-card reveal delay-1"><h3>AI Chatbot</h3><p>Website and messaging assistants for FAQs, lead qualification and support.</p><a class="card-link" href="/ai-chatbot.php">Learn more <i class="fa-solid fa-arrow-right"></i></a></article>
      <article class="glass-card reveal"><h3>WhatsApp Automation</h3><p>Structured WhatsApp workflows for notifications, service and conversational AI.</p></article>
      <article class="glass-card reveal delay-1"><h3>Omnichannel Communication</h3><p>Coordinate WhatsApp, SMS, voice and chat with consistent business logic.</p></article>
    </div>
  </div>
</section>

<section class="section section-alt" id="enterprise-automation">
  <div class="container">
    <div class="section-header reveal">
      <p class="section-label">Enterprise Automation</p>
      <h2 class="section-heading">Connect AI to how work already happens</h2>
    </div>
    <div class="card-grid-2">
      <article class="glass-card reveal"><h3>Workflow automation</h3><p>Orchestrate multi-step processes across channels and systems.</p></article>
      <article class="glass-card reveal delay-1"><h3>API integration</h3><p>Expose and consume REST APIs so assistants can read and write business data.</p></article>
      <article class="glass-card reveal"><h3>CRM integration</h3><p>Update tickets, leads and customer records from voice and chat outcomes.</p></article>
      <article class="glass-card reveal delay-1"><h3>Business process automation</h3><p>Reduce manual handoffs for status checks, reminders and approvals.</p></article>
    </div>
  </div>
</section>

<section class="section" id="security-monitoring">
  <div class="container">
    <div class="section-header reveal">
      <p class="section-label">Security &amp; Monitoring</p>
      <h2 class="section-heading">Visual intelligence for operations teams</h2>
    </div>
    <div class="card-grid-2">
      <article class="glass-card reveal"><h3>AI CCTV</h3><p>Layer detection and alerting on camera networks you already operate.</p></article>
      <article class="glass-card reveal delay-1"><h3>Computer Vision</h3><p>Models for people, vehicles, objects and scene events.</p></article>
      <article class="glass-card reveal"><h3>Video Analytics</h3><p>Dashboards, event history and operational reporting.</p><a class="card-link" href="/video-analytics.php">Explore product <i class="fa-solid fa-arrow-right"></i></a></article>
      <article class="glass-card reveal delay-1"><h3>Real-time alerts</h3><p>Notify teams via dashboard, API, SMS or messaging channels.</p></article>
    </div>
  </div>
</section>

<section class="section section-alt" id="communication">
  <div class="container">
    <div class="section-header reveal">
      <p class="section-label">Communication</p>
      <h2 class="section-heading">CPaaS and channel infrastructure</h2>
    </div>
    <div class="channel-pills reveal">
      <span class="pill">CPaaS</span>
      <span class="pill">SMS</span>
      <span class="pill">WhatsApp</span>
      <span class="pill">IVR</span>
      <span class="pill">SIP</span>
      <span class="pill">Voice Automation</span>
    </div>
    <p class="section-lead reveal" style="margin-top:1.5rem">Design communication platforms that carry AI conversations and transactional messaging with enterprise-grade integration patterns.</p>
  </div>
</section>

<section class="cta-band">
  <div class="container reveal">
    <h2>Map a solution to your use case</h2>
    <p>Book a demo or send a brief — we will help identify the right product mix.</p>
    <a class="btn btn-primary" href="/contact.php">Book a Demo</a>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
