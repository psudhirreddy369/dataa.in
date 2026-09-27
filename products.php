<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

$page_title = 'AI Products | Voice Agent, Chatbot & Video Analytics | ' . COMPANY_NAME;
$page_description = 'Explore AI products: AI Voice Agent for calling automation, AI Chatbot for conversational channels, and AI Video Analytics for computer vision monitoring.';
$page_keywords = 'AI Voice Agent, AI Chatbot, AI Video Analytics, Conversational AI, Computer Vision';

require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="container reveal">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/index.php">Home</a><span aria-hidden="true">/</span><span>Products</span>
    </nav>
    <h1>AI Products Built for Real Business</h1>
    <p class="lead">Choose a product line — or combine voice, chat and vision into a connected automation stack.</p>
  </div>
</section>

<section class="section">
  <div class="container card-grid-3">
    <article class="glass-card reveal">
      <div class="card-icon"><i class="fa-solid fa-phone-volume"></i></div>
      <h2 style="font-size:1.2rem">AI Voice Agent</h2>
      <p>Intelligent voice automation for inbound and outbound calling, transcription, analytics and CRM integration.</p>
      <ul class="feature-list">
        <li><i class="fa-solid fa-check"></i> Natural conversations &amp; multi-language</li>
        <li><i class="fa-solid fa-check"></i> STT / TTS, recording, transcription</li>
        <li><i class="fa-solid fa-check"></i> SIP / telephony &amp; API integration</li>
      </ul>
      <a class="card-link" href="/ai-voice-agent.php">Explore AI Voice Agent <i class="fa-solid fa-arrow-right"></i></a>
    </article>
    <article class="glass-card reveal delay-1">
      <div class="card-icon"><i class="fa-solid fa-comments"></i></div>
      <h2 style="font-size:1.2rem">AI Chatbot</h2>
      <p>Conversational automation for websites, WhatsApp and enterprise channels with handover and analytics.</p>
      <ul class="feature-list">
        <li><i class="fa-solid fa-check"></i> FAQ, lead qualification, support</li>
        <li><i class="fa-solid fa-check"></i> WhatsApp &amp; website deployment</li>
        <li><i class="fa-solid fa-check"></i> Workflow &amp; API actions</li>
      </ul>
      <a class="card-link" href="/ai-chatbot.php">Explore AI Chatbot <i class="fa-solid fa-arrow-right"></i></a>
    </article>
    <article class="glass-card reveal delay-2">
      <div class="card-icon"><i class="fa-solid fa-video"></i></div>
      <h2 style="font-size:1.2rem">AI Video Analytics</h2>
      <p>Computer vision on existing cameras for detection, safety monitoring, alerts and dashboards.</p>
      <ul class="feature-list">
        <li><i class="fa-solid fa-check"></i> People, vehicle &amp; intrusion detection</li>
        <li><i class="fa-solid fa-check"></i> Crowd, PPE &amp; zone monitoring</li>
        <li><i class="fa-solid fa-check"></i> Real-time alerts &amp; APIs</li>
      </ul>
      <a class="card-link" href="/video-analytics.php">Explore Video Analytics <i class="fa-solid fa-arrow-right"></i></a>
    </article>
  </div>
</section>

<section class="cta-band">
  <div class="container reveal">
    <h2>Not sure which product fits?</h2>
    <p>Tell us about your channels, systems and goals — we will map a practical approach.</p>
    <a class="btn btn-primary" href="/contact.php">Book a Demo</a>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
