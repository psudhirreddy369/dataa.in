<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

$page_title = 'AI Voice Agent | Voice AI Calling Solution | ' . COMPANY_NAME;
$page_description = 'AI Voice Agents that talk, understand and act. Automate inbound and outbound calls with speech recognition, LLM reasoning, transcription, analytics and CRM integration.';
$page_keywords = 'AI Voice Agent, AI Voice Bot, AI Calling Solution, Voice Automation, Conversational AI, SIP';

require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="container reveal">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/index.php">Home</a><span aria-hidden="true">/</span>
      <a href="/products.php">Products</a><span aria-hidden="true">/</span>
      <span>AI Voice Agent</span>
    </nav>
    <h1>AI Voice Agents That Talk, Understand and Act</h1>
    <p class="lead">Automate business conversations across inbound support and outbound campaigns — connected to telephony, AI reasoning and your enterprise systems.</p>
    <div class="btn-group" style="margin-top:1.5rem">
      <a class="btn btn-primary" href="/contact.php?product=AI+Voice+Agent">Request AI Voice Demo</a>
      <a class="btn btn-secondary" href="/products.php">All Products</a>
    </div>
  </div>
</section>

<section class="section">
  <div class="container two-col">
    <div class="reveal">
      <p class="section-label">Architecture</p>
      <h2 class="section-heading">From call to business action</h2>
      <p class="section-lead">The platform connects telephony to speech AI, language models and business logic so agents can respond and update systems in real time.</p>
    </div>
    <div class="flow-box reveal delay-1" aria-label="AI Voice Agent architecture">
      <div class="flow-step"><span>1</span> Customer</div>
      <div class="flow-arrow">↓</div>
      <div class="flow-step"><span>2</span> Phone / SIP / Telephony</div>
      <div class="flow-arrow">↓</div>
      <div class="flow-step"><span>3</span> Voice AI Platform</div>
      <div class="flow-arrow">↓</div>
      <div class="flow-step"><span>4</span> Speech Recognition</div>
      <div class="flow-arrow">↓</div>
      <div class="flow-step"><span>5</span> LLM / AI Engine</div>
      <div class="flow-arrow">↓</div>
      <div class="flow-step"><span>6</span> Business Logic</div>
      <div class="flow-arrow">↓</div>
      <div class="flow-step"><span>7</span> CRM / ERP / APIs</div>
      <div class="flow-arrow">↓</div>
      <div class="flow-step"><span>8</span> Voice Response</div>
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="container">
    <div class="section-header reveal">
      <p class="section-label">Features</p>
      <h2 class="section-heading">What the AI Voice Agent covers</h2>
    </div>
    <div class="feature-blocks">
      <article class="feature-block reveal">
        <h3><i class="fa-solid fa-phone-flip"></i> Inbound AI Calling</h3>
        <p>Handle customer calls automatically for FAQs, status checks, routing and structured data capture.</p>
      </article>
      <article class="feature-block reveal delay-1">
        <h3><i class="fa-solid fa-bullhorn"></i> Outbound AI Campaigns</h3>
        <p>Automate reminders, notifications, surveys, collections and customer engagement campaigns.</p>
      </article>
      <article class="feature-block reveal">
        <h3><i class="fa-solid fa-comments"></i> Intelligent Conversations</h3>
        <p>AI understands intent and responds dynamically instead of rigid menu trees alone.</p>
      </article>
      <article class="feature-block reveal delay-1">
        <h3><i class="fa-solid fa-file-lines"></i> Call Transcription</h3>
        <p>Convert conversations into searchable text for compliance review and quality analysis.</p>
      </article>
      <article class="feature-block reveal">
        <h3><i class="fa-solid fa-chart-column"></i> Conversation Analytics</h3>
        <p>Extract sentiment, keywords, intent, call outcomes and customer feedback signals.</p>
      </article>
      <article class="feature-block reveal delay-1">
        <h3><i class="fa-solid fa-plug"></i> CRM Integration</h3>
        <p>Integrate with enterprise applications through APIs so call outcomes update systems of record.</p>
      </article>
      <article class="feature-block reveal">
        <h3><i class="fa-solid fa-calendar-check"></i> Scheduling &amp; Follow-ups</h3>
        <p>Automatically schedule appointments and create follow-up actions from the conversation.</p>
      </article>
      <article class="feature-block reveal delay-1">
        <h3><i class="fa-solid fa-language"></i> Multi-language</h3>
        <p>Support Indian languages and English depending on the deployment requirements.</p>
      </article>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-header reveal">
      <h2 class="section-heading">FAQ</h2>
    </div>
    <div class="faq-list reveal">
      <div class="faq-item">
        <button type="button" aria-expanded="false">Does this work with existing telephony? <i class="fa-solid fa-chevron-down"></i></button>
        <div class="faq-panel">Deployments typically connect through SIP / telephony integrations and can sit alongside existing IVR or contact-centre setups depending on architecture.</div>
      </div>
      <div class="faq-item">
        <button type="button" aria-expanded="false">Can humans take over a call? <i class="fa-solid fa-chevron-down"></i></button>
        <div class="faq-panel">Yes — designs can include escalation and warm handoff paths when the conversation needs a human agent.</div>
      </div>
      <div class="faq-item">
        <button type="button" aria-expanded="false">What systems can it connect to? <i class="fa-solid fa-chevron-down"></i></button>
        <div class="faq-panel">CRM, ERP and custom applications via REST APIs and webhooks — scoped per project.</div>
      </div>
    </div>
  </div>
</section>

<section class="cta-band">
  <div class="container reveal">
    <h2>Request an AI Voice demo</h2>
    <p>Share your call use cases, languages and systems — we will outline a practical pilot approach.</p>
    <a class="btn btn-primary" href="/contact.php?product=AI+Voice+Agent">Request AI Voice Demo</a>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
