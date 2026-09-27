<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

$page_title = 'Industries | AI & Automation Use Cases | ' . COMPANY_NAME;
$page_description = 'Industry use cases for AI voice, chatbots, CPaaS and video analytics across telecom, banking, healthcare, education, retail, logistics, manufacturing and more.';
$page_keywords = 'AI Solutions India, AI Solutions Hyderabad, Telecom Automation, Healthcare Chatbot, BFSI AI';

$industries = [
    'telecom' => [
        'title' => 'Telecom',
        'icon' => 'fa-tower-cell',
        'cases' => ['Customer service automation', 'Outbound campaigns', 'WhatsApp communication', 'IVR automation'],
    ],
    'banking' => [
        'title' => 'Banking & Financial Services',
        'icon' => 'fa-building-columns',
        'cases' => ['Service desk voice automation', 'Transaction alerts & reminders', 'FAQ chatbot', 'Secure workflow handoffs'],
    ],
    'healthcare' => [
        'title' => 'Healthcare',
        'icon' => 'fa-heart-pulse',
        'cases' => ['AI appointment calling', 'Patient reminders', 'FAQ chatbot', 'Hospital video analytics'],
    ],
    'education' => [
        'title' => 'Education',
        'icon' => 'fa-graduation-cap',
        'cases' => ['Admission enquiry chatbot', 'Fee reminder calling', 'Parent communication', 'Campus CCTV analytics'],
    ],
    'retail' => [
        'title' => 'Retail',
        'icon' => 'fa-bag-shopping',
        'cases' => ['Order status assistants', 'Promotional messaging', 'Store footfall analytics', 'Support automation'],
    ],
    'logistics' => [
        'title' => 'Logistics',
        'icon' => 'fa-truck',
        'cases' => ['Shipment update bots', 'Driver / customer calling', 'Yard vehicle detection', 'Exception alerts'],
    ],
    'manufacturing' => [
        'title' => 'Manufacturing',
        'icon' => 'fa-industry',
        'cases' => ['Safety / PPE monitoring', 'Restricted zone alerts', 'Shift communication', 'Operations dashboards'],
    ],
    'utilities' => [
        'title' => 'Utilities',
        'icon' => 'fa-bolt',
        'cases' => ['Outage notifications', 'Bill reminder voice/SMS', 'Field service chatbot', 'Site monitoring analytics'],
    ],
    'government' => [
        'title' => 'Government',
        'icon' => 'fa-landmark',
        'cases' => ['Citizen service assistants', 'Appointment automation', 'Multilingual IVR', 'Facility video analytics'],
    ],
    'real-estate' => [
        'title' => 'Real Estate',
        'icon' => 'fa-house',
        'cases' => ['Lead qualification chatbot', 'Site visit reminders', 'WhatsApp nurturing', 'Premises monitoring'],
    ],
    'hospitality' => [
        'title' => 'Hospitality',
        'icon' => 'fa-hotel',
        'cases' => ['Reservation assistants', 'Guest messaging', 'Feedback calling', 'Lobby / perimeter analytics'],
    ],
];

require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="container reveal">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/index.php">Home</a><span aria-hidden="true">/</span><span>Industries</span>
    </nav>
    <h1>Solutions for industries such as…</h1>
    <p class="lead">Example use cases by sector. Each engagement is scoped to your channels, systems and compliance needs.</p>
  </div>
</section>

<section class="section">
  <div class="container industry-grid">
    <?php $i = 0; foreach ($industries as $id => $ind): ?>
    <article class="glass-card industry-card reveal<?php echo $i % 3 === 1 ? ' delay-1' : ($i % 3 === 2 ? ' delay-2' : ''); ?>" id="<?php echo e($id); ?>">
      <div class="card-icon"><i class="fa-solid <?php echo e($ind['icon']); ?>"></i></div>
      <h2 style="font-size:1.15rem"><?php echo e($ind['title']); ?></h2>
      <ul>
        <?php foreach ($ind['cases'] as $case): ?>
        <li><?php echo e($case); ?></li>
        <?php endforeach; ?>
      </ul>
    </article>
    <?php $i++; endforeach; ?>
  </div>
</section>

<section class="cta-band">
  <div class="container reveal">
    <h2>Discuss your industry workflow</h2>
    <p>Share the operational problem — we will map voice, chat, CPaaS or vision capabilities that fit.</p>
    <a class="btn btn-primary" href="/contact.php">Book a Demo</a>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
