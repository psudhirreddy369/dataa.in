<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

$page_title = 'AI Chatbot | WhatsApp & Enterprise Conversational AI | ' . COMPANY_NAME;
$page_description = 'Conversational AI for websites, WhatsApp and enterprise channels. FAQ automation, lead qualification, customer support, workflow automation and human handover.';
$page_keywords = 'AI Chatbot, WhatsApp Chatbot, Enterprise Chatbot, Conversational AI, Business Automation';

require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="container reveal">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/index.php">Home</a><span aria-hidden="true">/</span>
      <a href="/products.php">Products</a><span aria-hidden="true">/</span>
      <span>AI Chatbot</span>
    </nav>
    <h1>Conversational AI for Every Customer Interaction</h1>
    <p class="lead">Deploy intelligent assistants on websites, WhatsApp and enterprise channels to automate FAQs, qualify leads and support customers — with human handover when needed.</p>
    <div class="btn-group" style="margin-top:1.5rem">
      <a class="btn btn-primary" href="/contact.php?product=AI+Chatbot">Book a Demo</a>
      <a class="btn btn-secondary" href="#chat-demo-section">Try the demo</a>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-header reveal">
      <p class="section-label">Capabilities</p>
      <h2 class="section-heading">Where the chatbot fits</h2>
    </div>
    <div class="card-grid-3">
      <article class="glass-card reveal"><div class="card-icon"><i class="fa-solid fa-globe"></i></div><h3>Website AI Chatbot</h3><p>Embed conversational support and lead capture directly on your digital properties.</p></article>
      <article class="glass-card reveal delay-1"><div class="card-icon"><i class="fa-brands fa-whatsapp"></i></div><h3>WhatsApp AI Chatbot</h3><p>Meet customers on WhatsApp with automated answers and structured service flows.</p></article>
      <article class="glass-card reveal delay-2"><div class="card-icon"><i class="fa-solid fa-book"></i></div><h3>Enterprise Knowledge Assistant</h3><p>Ground responses in approved knowledge for consistent, policy-aligned answers.</p></article>
      <article class="glass-card reveal"><div class="card-icon"><i class="fa-solid fa-user-plus"></i></div><h3>Lead Generation</h3><p>Qualify interest, collect details and route high-intent conversations to sales.</p></article>
      <article class="glass-card reveal delay-1"><div class="card-icon"><i class="fa-solid fa-headset"></i></div><h3>Customer Support</h3><p>Resolve common tickets automatically and escalate complex cases to humans.</p></article>
      <article class="glass-card reveal delay-2"><div class="card-icon"><i class="fa-solid fa-gears"></i></div><h3>Workflow Automation</h3><p>Trigger API actions — status checks, ticket creation, reminders — from chat.</p></article>
    </div>
  </div>
</section>

<section class="section section-alt" id="chat-demo-section">
  <div class="container two-col">
    <div class="reveal">
      <p class="section-label">Interactive demo</p>
      <h2 class="section-heading">See a conversation in action</h2>
      <p class="section-lead">This front-end demonstration walks through a typical application-status enquiry. Production bots connect to your systems and knowledge sources.</p>
      <ul class="check-list">
        <li><i class="fa-solid fa-circle-check"></i> AI-powered conversations</li>
        <li><i class="fa-solid fa-circle-check"></i> API integration &amp; human handover</li>
        <li><i class="fa-solid fa-circle-check"></i> Analytics and multi-language support</li>
      </ul>
    </div>
    <div class="chat-demo reveal delay-1" id="chat-demo">
      <div class="chat-demo-header">
        <div class="avatar"><i class="fa-solid fa-robot"></i></div>
        <div>
          <strong>AI Assistant</strong>
          <span>Online · demo mode</span>
        </div>
      </div>
      <div class="chat-messages" role="log" aria-live="polite"></div>
      <div class="chat-actions">
        <button type="button" id="chat-start">Start a Conversation</button>
        <button type="button" id="chat-reset">Reset</button>
      </div>
    </div>
  </div>
</section>

<section class="cta-band">
  <div class="container reveal">
    <h2>Start a conversation about your chatbot use case</h2>
    <p>Website, WhatsApp or internal assistant — share your channels and we will map the right approach.</p>
    <a class="btn btn-primary" href="/contact.php?product=AI+Chatbot">Book a Demo</a>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
