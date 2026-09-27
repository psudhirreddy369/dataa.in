<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

$page_title = COMPANY_NAME . ' | AI Voice Agent, Chatbot & Video Analytics';
$page_description = 'Enterprise AI solutions for intelligent voice conversations, conversational automation and real-time video analytics. Built for business operations.';
$page_keywords = 'AI Voice Agent, AI Chatbot, AI Video Analytics, Conversational AI, CPaaS, Computer Vision, AI Solutions India, AI Solutions Hyderabad';
$page_canonical_path = '/';

$structured_data = json_encode([
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'Organization',
            'name' => COMPANY_NAME,
            'url' => SITE_URL,
            'email' => is_placeholder(COMPANY_EMAIL) ? null : COMPANY_EMAIL,
            'telephone' => is_placeholder(COMPANY_PHONE) ? null : COMPANY_PHONE,
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => 'Hyderabad',
                'addressRegion' => 'Telangana',
                'addressCountry' => 'IN',
            ],
            'description' => 'AI, communication and automation technology provider focused on voice AI, chatbots and video analytics.',
        ],
        [
            '@type' => 'WebSite',
            'name' => COMPANY_NAME,
            'url' => SITE_URL,
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

require __DIR__ . '/includes/header.php';
?>

<!-- 2. Hero -->
<section class="hero" aria-labelledby="hero-heading">
  <div class="grad-orb grad-orb-1" aria-hidden="true"></div>
  <div class="grad-orb grad-orb-2" aria-hidden="true"></div>
  <div class="container hero-grid">
    <div class="hero-copy reveal">
      <p class="hero-eyebrow"><i class="fa-solid fa-microchip" aria-hidden="true"></i> AI · CPaaS · Automation · Vision</p>
      <h1 id="hero-heading">Build Smarter. Automate Conversations. See More with AI.</h1>
      <p class="hero-lead">Enterprise AI solutions for intelligent voice conversations, conversational automation and real-time video analytics.</p>
      <div class="btn-group">
        <a class="btn btn-primary" href="/contact.php">Book a Demo</a>
        <a class="btn btn-secondary" href="/products.php">Explore Products</a>
      </div>
    </div>

    <div class="hero-visual reveal delay-2" aria-hidden="true">
      <div class="network">
        <svg class="network-svg" viewBox="0 0 400 400" preserveAspectRatio="none">
          <defs>
            <linearGradient id="lineGrad" x1="0%" y1="0%" x2="100%" y2="100%">
              <stop offset="0%" stop-color="#6366f1"/>
              <stop offset="100%" stop-color="#22d3ee"/>
            </linearGradient>
          </defs>
          <path class="network-line" d="M80 70 L200 180 L320 70"/>
          <path class="network-line" d="M60 190 L200 180 L340 190"/>
          <path class="network-line" d="M100 320 L200 180 L300 320"/>
        </svg>
        <div class="hero-node core"><i class="fa-solid fa-brain"></i> AI Platform</div>
        <div class="hero-node n1"><i class="fa-solid fa-phone-volume"></i> Voice AI</div>
        <div class="hero-node n2"><i class="fa-solid fa-comments"></i> Chatbot</div>
        <div class="hero-node n3"><i class="fa-solid fa-eye"></i> Computer Vision</div>
        <div class="hero-node n4"><i class="fa-solid fa-chart-line"></i> Analytics</div>
        <div class="hero-node n5"><i class="fa-solid fa-gears"></i> Automation</div>
        <div class="hero-node n6"><i class="fa-solid fa-plug"></i> API Integration</div>
      </div>
    </div>
  </div>
</section>

<!-- 3. Trusted Technology / Capability Strip -->
<section class="section section-alt" id="capabilities" aria-labelledby="cap-heading">
  <div class="container">
    <div class="section-header centered reveal">
      <p class="section-label">Capabilities</p>
      <h2 class="section-heading" id="cap-heading" style="max-width:22ch">Technology That Connects AI With Your Business</h2>
      <p class="section-lead">Practical AI products designed to integrate with communication channels, enterprise systems and existing camera infrastructure.</p>
    </div>

    <div class="capability-strip reveal">
      <div class="cap-item"><i class="fa-solid fa-robot" aria-hidden="true"></i><span>AI</span></div>
      <div class="cap-item"><i class="fa-solid fa-bolt" aria-hidden="true"></i><span>Automation</span></div>
      <div class="cap-item"><i class="fa-solid fa-tower-broadcast" aria-hidden="true"></i><span>Communication</span></div>
      <div class="cap-item"><i class="fa-solid fa-chart-pie" aria-hidden="true"></i><span>Analytics</span></div>
      <div class="cap-item"><i class="fa-solid fa-cloud" aria-hidden="true"></i><span>Cloud</span></div>
      <div class="cap-item"><i class="fa-solid fa-link" aria-hidden="true"></i><span>Integration</span></div>
    </div>

    <div class="stats-grid">
      <div class="stat-card reveal">
        <div class="stat-value"><span data-counter="10" data-suffix="+">0</span></div>
        <div class="stat-label">Years Technology Experience</div>
      </div>
      <div class="stat-card reveal delay-1">
        <div class="stat-value"><span data-counter="3" data-suffix="+">0</span></div>
        <div class="stat-label">AI Product Categories</div>
      </div>
      <div class="stat-card reveal delay-2">
        <div class="stat-value">Enterprise Ready</div>
        <div class="stat-label">Enterprise Integrations</div>
      </div>
      <div class="stat-card reveal delay-3">
        <div class="stat-value">24×7</div>
        <div class="stat-label">Automation Capability</div>
      </div>
    </div>

    <div class="channel-pills reveal" style="justify-content:center;margin-top:2rem">
      <span class="pill">API Driven</span>
      <span class="pill">Multi-Channel</span>
      <span class="pill">Cloud Ready</span>
      <span class="pill">Enterprise Ready</span>
    </div>
  </div>
</section>

<!-- 4. Products -->
<section class="section" id="products" aria-labelledby="products-heading">
  <div class="container">
    <div class="section-header reveal">
      <p class="section-label">Products</p>
      <h2 class="section-heading" id="products-heading">AI Products Built for Real Business</h2>
      <p class="section-lead">Three product lines that cover voice, messaging and visual intelligence — designed for integration, not demos.</p>
    </div>

    <div class="card-grid-3">
      <article class="glass-card reveal">
        <div class="card-icon" aria-hidden="true"><i class="fa-solid fa-phone-volume"></i></div>
        <h3>AI Voice Agent</h3>
        <p>Intelligent voice automation that can understand customer conversations, respond naturally and automate inbound and outbound calling workflows.</p>
        <ul class="feature-list">
          <li><i class="fa-solid fa-check"></i> Natural language conversations</li>
          <li><i class="fa-solid fa-check"></i> Inbound &amp; outbound calls</li>
          <li><i class="fa-solid fa-check"></i> Speech-to-text &amp; text-to-speech</li>
          <li><i class="fa-solid fa-check"></i> Call recording &amp; transcription</li>
          <li><i class="fa-solid fa-check"></i> Sentiment &amp; keyword analysis</li>
          <li><i class="fa-solid fa-check"></i> CRM / API &amp; SIP integration</li>
          <li><i class="fa-solid fa-check"></i> Scheduling, follow-ups, multi-language</li>
        </ul>
        <a class="card-link" href="/ai-voice-agent.php">Explore AI Voice Agent <i class="fa-solid fa-arrow-right"></i></a>
      </article>

      <article class="glass-card reveal delay-1">
        <div class="card-icon" aria-hidden="true"><i class="fa-solid fa-comments"></i></div>
        <h3>AI Chatbot</h3>
        <p>Intelligent conversational automation for websites, WhatsApp and enterprise communication channels.</p>
        <ul class="feature-list">
          <li><i class="fa-solid fa-check"></i> AI-powered conversations</li>
          <li><i class="fa-solid fa-check"></i> WhatsApp &amp; website chatbot</li>
          <li><i class="fa-solid fa-check"></i> FAQ &amp; lead qualification</li>
          <li><i class="fa-solid fa-check"></i> Customer support automation</li>
          <li><i class="fa-solid fa-check"></i> Workflow &amp; API integration</li>
          <li><i class="fa-solid fa-check"></i> Human handover &amp; analytics</li>
          <li><i class="fa-solid fa-check"></i> Multi-language support</li>
        </ul>
        <a class="card-link" href="/ai-chatbot.php">Explore AI Chatbot <i class="fa-solid fa-arrow-right"></i></a>
      </article>

      <article class="glass-card reveal delay-2">
        <div class="card-icon" aria-hidden="true"><i class="fa-solid fa-video"></i></div>
        <h3>AI Video Analytics</h3>
        <p>Transform existing camera infrastructure into an intelligent visual monitoring platform using AI and computer vision.</p>
        <ul class="feature-list">
          <li><i class="fa-solid fa-check"></i> Object, person &amp; vehicle detection</li>
          <li><i class="fa-solid fa-check"></i> Intrusion &amp; restricted-area monitoring</li>
          <li><i class="fa-solid fa-check"></i> Crowd &amp; PPE / safety monitoring</li>
          <li><i class="fa-solid fa-check"></i> Number plate recognition where applicable</li>
          <li><i class="fa-solid fa-check"></i> Event detection &amp; real-time alerts</li>
          <li><i class="fa-solid fa-check"></i> Camera analytics dashboard</li>
        </ul>
        <a class="card-link" href="/video-analytics.php">Explore Video Analytics <i class="fa-solid fa-arrow-right"></i></a>
      </article>
    </div>
  </div>
</section>

<!-- 5. AI Voice Agent Highlight -->
<section class="section section-alt" id="voice-highlight" aria-labelledby="voice-hl-heading">
  <div class="container two-col">
    <div class="reveal">
      <p class="section-label">AI Voice Agent</p>
      <h2 class="section-heading" id="voice-hl-heading">Voice agents that talk, understand and act</h2>
      <p class="section-lead">Automate inbound support and outbound engagement with speech recognition, LLM reasoning and telephony integration.</p>
      <ul class="check-list">
        <li><i class="fa-solid fa-circle-check"></i> Handle customer calls with natural conversations</li>
        <li><i class="fa-solid fa-circle-check"></i> Run outbound reminders, surveys and collections</li>
        <li><i class="fa-solid fa-circle-check"></i> Transcribe calls and extract sentiment &amp; keywords</li>
        <li><i class="fa-solid fa-circle-check"></i> Connect outcomes to CRM and business APIs</li>
      </ul>
      <a class="btn btn-primary" href="/ai-voice-agent.php">Explore AI Voice Agent</a>
    </div>
    <div class="flow-box reveal delay-2" aria-label="Voice AI architecture">
      <div class="flow-step"><span>1</span> Customer</div>
      <div class="flow-arrow">↓</div>
      <div class="flow-step"><span>2</span> Phone / SIP / Telephony</div>
      <div class="flow-arrow">↓</div>
      <div class="flow-step"><span>3</span> Voice AI Platform</div>
      <div class="flow-arrow">↓</div>
      <div class="flow-step"><span>4</span> Speech Recognition → LLM → Business Logic</div>
      <div class="flow-arrow">↓</div>
      <div class="flow-step"><span>5</span> CRM / ERP / APIs → Voice Response</div>
    </div>
  </div>
</section>

<!-- 6. AI Chatbot Highlight -->
<section class="section" id="chatbot-highlight" aria-labelledby="chat-hl-heading">
  <div class="container two-col">
    <div class="chat-demo reveal" id="chat-demo" aria-label="Interactive chatbot demonstration">
      <div class="chat-demo-header">
        <div class="avatar" aria-hidden="true"><i class="fa-solid fa-robot"></i></div>
        <div>
          <strong>AI Chatbot Demo</strong>
          <span>Interactive preview</span>
        </div>
      </div>
      <div class="chat-messages" role="log" aria-live="polite"></div>
      <div class="chat-actions">
        <button type="button" id="chat-start">Start a Conversation</button>
        <button type="button" id="chat-reset">Reset</button>
      </div>
    </div>
    <div class="reveal delay-1">
      <p class="section-label">AI Chatbot</p>
      <h2 class="section-heading" id="chat-hl-heading">Conversational AI across your channels</h2>
      <p class="section-lead">Deploy assistants on websites, WhatsApp and enterprise channels for FAQs, lead qualification, support and workflow automation.</p>
      <ul class="check-list">
        <li><i class="fa-solid fa-circle-check"></i> Website and WhatsApp AI chatbots</li>
        <li><i class="fa-solid fa-circle-check"></i> Knowledge-assisted answers with API actions</li>
        <li><i class="fa-solid fa-circle-check"></i> Human handover when needed</li>
        <li><i class="fa-solid fa-circle-check"></i> Conversation analytics for continuous improvement</li>
      </ul>
      <a class="btn btn-secondary" href="/ai-chatbot.php">Explore AI Chatbot</a>
    </div>
  </div>
</section>

<!-- 7. Video Analytics Highlight -->
<section class="section section-alt" id="video-highlight" aria-labelledby="video-hl-heading">
  <div class="container two-col">
    <div class="reveal">
      <p class="section-label">Video Analytics</p>
      <h2 class="section-heading" id="video-hl-heading">Turn cameras into intelligent sensors</h2>
      <p class="section-lead">AI video analytics transforms conventional CCTV infrastructure into a real-time intelligence platform for security and operations.</p>
      <ul class="check-list">
        <li><i class="fa-solid fa-circle-check"></i> Detect people, vehicles, intrusion and crowd events</li>
        <li><i class="fa-solid fa-circle-check"></i> Monitor restricted zones and safety / PPE compliance</li>
        <li><i class="fa-solid fa-circle-check"></i> Route alerts to dashboards, APIs and notification channels</li>
      </ul>
      <a class="btn btn-primary" href="/video-analytics.php">Explore Video Analytics</a>
    </div>
    <div class="dash-mock reveal delay-2" aria-hidden="true">
      <div class="dash-top">
        <span><i class="fa-solid fa-circle" style="color:#22d3ee;font-size:0.55rem"></i> Live analytics</span>
        <span>Cam-03 · Edge</span>
      </div>
      <div class="dash-grid">
        <div class="dash-feed">
          <div class="cv-scan"></div>
          <div class="cv-box" style="top:22%;left:18%;width:28%;height:40%" data-label="person 0.94"></div>
          <div class="cv-box" style="top:40%;right:14%;width:24%;height:28%" data-label="vehicle 0.89"></div>
        </div>
        <div class="dash-side">
          <div class="dash-alert ok"><strong>Zone clear</strong> Gate B — normal activity</div>
          <div class="dash-alert warn"><strong>Crowd threshold</strong> Lobby — elevated density</div>
          <div class="dash-alert"><strong>Event log</strong> 12 detections · last 15 min</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 8. CPaaS + Communication -->
<section class="section" id="cpaas" aria-labelledby="cpaas-heading">
  <div class="container two-col">
    <div class="reveal">
      <p class="section-label">CPaaS</p>
      <h2 class="section-heading" id="cpaas-heading">Communication Meets Intelligence</h2>
      <p class="section-lead">Combine enterprise communication infrastructure with AI-powered automation across messaging and voice channels.</p>
      <div class="channel-pills">
        <span class="pill">WhatsApp</span>
        <span class="pill">SMS</span>
        <span class="pill">IVR</span>
        <span class="pill">Voice</span>
        <span class="pill">SIP</span>
        <span class="pill">RCS</span>
        <span class="pill">Chatbot</span>
        <span class="pill">AI Voice</span>
      </div>
      <div class="omni-flow" aria-label="CPaaS flow">
        <strong>Customer</strong>
        <span class="sep">→</span>
        <strong>WhatsApp / SMS / Voice</strong>
        <span class="sep">→</span>
        <strong>CPaaS</strong>
        <span class="sep">→</span>
        <strong>AI Engine</strong>
        <span class="sep">→</span>
        <strong>Business Application</strong>
      </div>
    </div>
    <div class="reveal delay-1">
      <div class="card-grid-2">
        <div class="glass-card">
          <div class="card-icon"><i class="fa-brands fa-whatsapp"></i></div>
          <h3>Messaging</h3>
          <p>WhatsApp Business, SMS and RCS workflows for notifications, support and engagement.</p>
        </div>
        <div class="glass-card">
          <div class="card-icon"><i class="fa-solid fa-headset"></i></div>
          <h3>Voice &amp; IVR</h3>
          <p>SIP telephony, IVR trees and AI voice agents connected to the same business logic.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 9. Solutions -->
<section class="section section-alt" id="solutions" aria-labelledby="solutions-heading">
  <div class="container">
    <div class="section-header reveal">
      <p class="section-label">Solutions</p>
      <h2 class="section-heading" id="solutions-heading">Where AI products create operational value</h2>
    </div>
    <div class="card-grid-4">
      <article class="glass-card reveal">
        <div class="card-icon"><i class="fa-solid fa-users"></i></div>
        <h3>Customer Experience</h3>
        <p>AI Voice, AI Chatbot, WhatsApp automation and omnichannel communication.</p>
        <a class="card-link" href="/solutions.php#customer-experience">View solutions <i class="fa-solid fa-arrow-right"></i></a>
      </article>
      <article class="glass-card reveal delay-1">
        <div class="card-icon"><i class="fa-solid fa-diagram-project"></i></div>
        <h3>Enterprise Automation</h3>
        <p>Workflow automation, API integration, CRM sync and business process automation.</p>
        <a class="card-link" href="/solutions.php#enterprise-automation">View solutions <i class="fa-solid fa-arrow-right"></i></a>
      </article>
      <article class="glass-card reveal delay-2">
        <div class="card-icon"><i class="fa-solid fa-shield-halved"></i></div>
        <h3>Security &amp; Monitoring</h3>
        <p>AI CCTV, computer vision, video analytics and real-time alerts.</p>
        <a class="card-link" href="/solutions.php#security-monitoring">View solutions <i class="fa-solid fa-arrow-right"></i></a>
      </article>
      <article class="glass-card reveal delay-3">
        <div class="card-icon"><i class="fa-solid fa-satellite-dish"></i></div>
        <h3>Communication</h3>
        <p>CPaaS, SMS, WhatsApp, IVR, SIP and voice automation platforms.</p>
        <a class="card-link" href="/solutions.php#communication">View solutions <i class="fa-solid fa-arrow-right"></i></a>
      </article>
    </div>
  </div>
</section>

<!-- 10. Industries -->
<section class="section" id="industries-home" aria-labelledby="ind-home-heading">
  <div class="container">
    <div class="section-header reveal">
      <p class="section-label">Industries</p>
      <h2 class="section-heading" id="ind-home-heading">Built for sector-specific workflows</h2>
      <p class="section-lead">Capability-oriented solutions for organisations that need reliable communication, automation and visual intelligence.</p>
    </div>
    <div class="channel-pills reveal">
      <span class="pill">Telecom</span>
      <span class="pill">Banking &amp; BFSI</span>
      <span class="pill">Healthcare</span>
      <span class="pill">Education</span>
      <span class="pill">Retail</span>
      <span class="pill">Logistics</span>
      <span class="pill">Manufacturing</span>
      <span class="pill">Utilities</span>
      <span class="pill">Government</span>
      <span class="pill">Real Estate</span>
      <span class="pill">Hospitality</span>
    </div>
    <div class="mt-2 reveal">
      <a class="btn btn-secondary" href="/industries.php">Explore Industries</a>
    </div>
  </div>
</section>

<!-- 11. Technology Stack -->
<section class="section section-alt" id="technology" aria-labelledby="tech-heading">
  <div class="container">
    <div class="section-header reveal">
      <p class="section-label">Technology</p>
      <h2 class="section-heading" id="tech-heading">Built Around Modern AI &amp; Cloud Technologies</h2>
      <p class="section-lead">Organised by capability — not as a logo wall or unsupported certification list.</p>
    </div>
    <div class="tech-groups">
      <div class="tech-group reveal">
        <h3><i class="fa-solid fa-brain"></i> AI / Intelligence</h3>
        <div class="tech-tags">
          <span class="tech-tag">AI / LLM</span>
          <span class="tech-tag">Computer Vision</span>
          <span class="tech-tag">Python</span>
          <span class="tech-tag">FastAPI</span>
        </div>
      </div>
      <div class="tech-group reveal delay-1">
        <h3><i class="fa-solid fa-code"></i> Application</h3>
        <div class="tech-tags">
          <span class="tech-tag">PHP</span>
          <span class="tech-tag">JavaScript</span>
          <span class="tech-tag">REST APIs</span>
        </div>
      </div>
      <div class="tech-group reveal delay-2">
        <h3><i class="fa-solid fa-tower-cell"></i> Communication</h3>
        <div class="tech-tags">
          <span class="tech-tag">SIP</span>
          <span class="tech-tag">SMPP</span>
          <span class="tech-tag">WebRTC</span>
        </div>
      </div>
      <div class="tech-group reveal">
        <h3><i class="fa-solid fa-cloud"></i> Cloud &amp; Ops</h3>
        <div class="tech-tags">
          <span class="tech-tag">Docker</span>
          <span class="tech-tag">Kubernetes</span>
          <span class="tech-tag">AWS</span>
          <span class="tech-tag">Prometheus</span>
          <span class="tech-tag">Grafana</span>
        </div>
      </div>
      <div class="tech-group reveal delay-1">
        <h3><i class="fa-solid fa-database"></i> Data</h3>
        <div class="tech-tags">
          <span class="tech-tag">MySQL</span>
          <span class="tech-tag">Redis</span>
          <span class="tech-tag">Kafka</span>
        </div>
      </div>
      <div class="tech-group reveal delay-2">
        <h3><i class="fa-solid fa-diagram-project"></i> Delivery</h3>
        <div class="tech-tags">
          <span class="tech-tag">Microservices</span>
          <span class="tech-tag">CI/CD</span>
          <span class="tech-tag">API Integration</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 12. Why Us -->
<section class="section" id="why-us" aria-labelledby="why-heading">
  <div class="container">
    <div class="section-header reveal">
      <p class="section-label">Why us</p>
      <h2 class="section-heading" id="why-heading">Technology Expertise That Goes Beyond Development</h2>
      <p class="section-lead">Capability-based delivery across architecture, AI integration, communication systems and production operations.</p>
    </div>
    <div class="card-grid-3">
      <article class="glass-card reveal">
        <div class="card-icon"><i class="fa-solid fa-sitemap"></i></div>
        <h3>Solution Architecture</h3>
        <p>Design scalable enterprise solutions with clear integration boundaries and operational ownership.</p>
      </article>
      <article class="glass-card reveal delay-1">
        <div class="card-icon"><i class="fa-solid fa-microchip"></i></div>
        <h3>AI Integration</h3>
        <p>Integrate voice AI, LLMs and computer vision into business workflows that already exist.</p>
      </article>
      <article class="glass-card reveal delay-2">
        <div class="card-icon"><i class="fa-solid fa-tower-broadcast"></i></div>
        <h3>Communication Technology</h3>
        <p>Experience across SMS, WhatsApp, IVR, SIP and CPaaS systems.</p>
      </article>
      <article class="glass-card reveal">
        <div class="card-icon"><i class="fa-solid fa-server"></i></div>
        <h3>Cloud &amp; DevOps</h3>
        <p>Containerized deployment, monitoring and production infrastructure.</p>
      </article>
      <article class="glass-card reveal delay-1">
        <div class="card-icon"><i class="fa-solid fa-plug"></i></div>
        <h3>Enterprise Integration</h3>
        <p>Connect AI products with CRM, ERP and custom APIs.</p>
      </article>
      <article class="glass-card reveal delay-2">
        <div class="card-icon"><i class="fa-solid fa-handshake"></i></div>
        <h3>Customer-Centric Delivery</h3>
        <p>Support technical discovery, demos, deployment and production support.</p>
      </article>
    </div>
  </div>
</section>

<!-- 13. Case Studies (placeholders) -->
<section class="section section-alt" id="case-studies" aria-labelledby="cases-heading">
  <div class="container">
    <div class="section-header reveal">
      <p class="section-label">Case studies</p>
      <h2 class="section-heading" id="cases-heading">Example engagement patterns</h2>
      <p class="section-lead">Editable placeholders for project narratives. Replace with approved customer stories when available — no invented metrics.</p>
    </div>
    <div class="card-grid-2">
      <article class="glass-card case-card reveal">
        <h3>AI Voice Automation</h3>
        <div class="meta"><span class="pill">Voice AI</span><span class="pill">Telephony</span></div>
        <span class="label">Challenge</span>
        <p>High inbound call volume for routine queries and appointment changes.</p>
        <span class="label">Solution</span>
        <p>AI voice agent with SIP integration, transcription and CRM updates.</p>
        <span class="label">Technology</span>
        <p>Speech AI, LLM orchestration, SIP, REST APIs.</p>
        <span class="label">Outcome</span>
        <p>Faster call handling for defined intents with human escalation paths. <!-- EDITABLE --></p>
        <p class="placeholder-note">Placeholder case study — replace with approved content.</p>
      </article>
      <article class="glass-card case-card reveal delay-1">
        <h3>Healthcare Conversational AI</h3>
        <div class="meta"><span class="pill">Chatbot</span><span class="pill">Healthcare</span></div>
        <span class="label">Challenge</span>
        <p>Patients need status updates and FAQs outside clinic hours.</p>
        <span class="label">Solution</span>
        <p>WhatsApp and web chatbot with knowledge base and appointment flows.</p>
        <span class="label">Technology</span>
        <p>Conversational AI, WhatsApp API, workflow automation.</p>
        <span class="label">Outcome</span>
        <p>Consistent after-hours responses with optional staff handover. <!-- EDITABLE --></p>
        <p class="placeholder-note">Placeholder case study — replace with approved content.</p>
      </article>
      <article class="glass-card case-card reveal">
        <h3>Telecom Communication Automation</h3>
        <div class="meta"><span class="pill">CPaaS</span><span class="pill">Telecom</span></div>
        <span class="label">Challenge</span>
        <p>Multi-channel customer notifications with fallback requirements.</p>
        <span class="label">Solution</span>
        <p>Omnichannel orchestration across WhatsApp, SMS, IVR and voice.</p>
        <span class="label">Technology</span>
        <p>CPaaS, SMPP, SIP, automation rules.</p>
        <span class="label">Outcome</span>
        <p>Unified messaging workflows with channel fallback. <!-- EDITABLE --></p>
        <p class="placeholder-note">Placeholder case study — replace with approved content.</p>
      </article>
      <article class="glass-card case-card reveal delay-1">
        <h3>AI Video Monitoring</h3>
        <div class="meta"><span class="pill">Vision</span><span class="pill">Security</span></div>
        <span class="label">Challenge</span>
        <p>Existing CCTV lacked automated event detection and alerting.</p>
        <span class="label">Solution</span>
        <p>Computer vision pipelines for intrusion, crowd and zone monitoring.</p>
        <span class="label">Technology</span>
        <p>Computer vision, edge/cloud inference, alert APIs.</p>
        <span class="label">Outcome</span>
        <p>Faster awareness of defined visual events for operations teams. <!-- EDITABLE --></p>
        <p class="placeholder-note">Placeholder case study — replace with approved content.</p>
      </article>
    </div>
  </div>
</section>

<!-- 14. CTA -->
<section class="cta-band" aria-labelledby="cta-heading">
  <div class="container reveal">
    <h2 id="cta-heading">Ready to explore AI for your operations?</h2>
    <p>Book a demo for AI Voice Agent, AI Chatbot or Video Analytics — or discuss a custom integration.</p>
    <div class="btn-group" style="justify-content:center">
      <a class="btn btn-primary" href="/contact.php">Book a Demo</a>
      <a class="btn btn-secondary" href="/products.php">Explore Products</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
