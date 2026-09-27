<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

$page_title = 'AI Video Analytics | Computer Vision Platform | ' . COMPANY_NAME;
$page_description = 'Turn cameras into intelligent sensors. AI video analytics for people counting, intrusion detection, crowd monitoring, PPE detection, number plate recognition and real-time alerts.';
$page_keywords = 'AI Video Analytics, Computer Vision, AI CCTV, Video Analytics, Intrusion Detection';

require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="container reveal">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/index.php">Home</a><span aria-hidden="true">/</span>
      <a href="/products.php">Products</a><span aria-hidden="true">/</span>
      <span>Video Analytics</span>
    </nav>
    <h1>Turn Your Cameras Into Intelligent Sensors</h1>
    <p class="lead">AI video analytics transforms conventional CCTV infrastructure into a real-time intelligence platform for security and operations.</p>
    <div class="btn-group" style="margin-top:1.5rem">
      <a class="btn btn-primary" href="/contact.php?product=Video+Analytics">Book a Demo</a>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-header reveal">
      <p class="section-label">Features</p>
      <h2 class="section-heading">Detection and monitoring capabilities</h2>
    </div>
    <div class="card-grid-4">
      <?php
      $features = [
        ['fa-users', 'People Counting'],
        ['fa-car', 'Vehicle Detection'],
        ['fa-door-open', 'Intrusion Detection'],
        ['fa-ban', 'Restricted Zone Monitoring'],
        ['fa-people-group', 'Crowd Detection'],
        ['fa-helmet-safety', 'Safety Monitoring'],
        ['fa-vest', 'PPE Detection'],
        ['fa-id-card', 'Number Plate Recognition'],
        ['fa-box', 'Abandoned Object Detection'],
        ['fa-bell', 'Real-Time Alerts'],
      ];
      foreach ($features as $i => $f):
      ?>
      <article class="glass-card reveal<?php echo $i % 3 === 1 ? ' delay-1' : ($i % 3 === 2 ? ' delay-2' : ''); ?>">
        <div class="card-icon"><i class="fa-solid <?php echo $f[0]; ?>"></i></div>
        <h3><?php echo e($f[1]); ?></h3>
        <p>Configurable detection rules and alert routing for operational response.</p>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="container two-col">
    <div class="flow-box reveal" aria-label="Video analytics architecture">
      <div class="flow-step"><span>1</span> CCTV / IP Camera</div>
      <div class="flow-arrow">↓</div>
      <div class="flow-step"><span>2</span> Video Stream</div>
      <div class="flow-arrow">↓</div>
      <div class="flow-step"><span>3</span> AI Computer Vision Engine</div>
      <div class="flow-arrow">↓</div>
      <div class="flow-step"><span>4</span> Event Detection</div>
      <div class="flow-arrow">↓</div>
      <div class="flow-step"><span>5</span> Analytics</div>
      <div class="flow-arrow">↓</div>
      <div class="flow-step"><span>6</span> Dashboard</div>
      <div class="flow-arrow">↓</div>
      <div class="flow-step"><span>7</span> Alert / API / Notification</div>
    </div>
    <div class="reveal delay-1">
      <p class="section-label">Architecture</p>
      <h2 class="section-heading">From stream to decision</h2>
      <p class="section-lead">Process camera feeds with computer vision models, surface events on a centralized dashboard, and push alerts to teams or downstream systems.</p>
      <ul class="check-list">
        <li><i class="fa-solid fa-circle-check"></i> Works with existing camera infrastructure where compatible</li>
        <li><i class="fa-solid fa-circle-check"></i> Edge or centralized inference depending on latency and bandwidth</li>
        <li><i class="fa-solid fa-circle-check"></i> API hooks for SOC tools, ticketing and messaging</li>
      </ul>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-header reveal">
      <p class="section-label">Dashboard</p>
      <h2 class="section-heading">Interactive monitoring mockup</h2>
    </div>
    <div class="dash-mock reveal" style="max-width:900px;margin-inline:auto" aria-hidden="true">
      <div class="dash-top">
        <span><i class="fa-solid fa-circle" style="color:#22d3ee;font-size:0.55rem"></i> Operations dashboard</span>
        <span>Sites online · mock UI</span>
      </div>
      <div class="dash-grid">
        <div class="dash-feed">
          <div class="cv-scan"></div>
          <div class="cv-box" style="top:18%;left:14%;width:30%;height:42%" data-label="person"></div>
          <div class="cv-box" style="bottom:14%;right:16%;width:26%;height:32%" data-label="zone"></div>
        </div>
        <div class="dash-side">
          <div class="dash-alert ok"><strong>PPE check</strong> Zone A — compliant</div>
          <div class="dash-alert warn"><strong>Intrusion rule</strong> Fence line — review clip</div>
          <div class="dash-alert"><strong>Crowd index</strong> Entrance — moderate</div>
          <div class="dash-alert"><strong>ANPR</strong> Gate 2 — plate match queue</div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="cta-band">
  <div class="container reveal">
    <h2>Discuss video analytics for your sites</h2>
    <p>Share camera types, environments and monitoring goals — we will outline a practical deployment path.</p>
    <a class="btn btn-primary" href="/contact.php?product=Video+Analytics">Book a Demo</a>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
