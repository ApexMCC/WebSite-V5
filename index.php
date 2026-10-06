<?php
require __DIR__ . '/config.php';

$pageTitle = "Apex MCC | Michigan's Future Multicultural Community Center";
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/nav.php';
?>

<section class="hero">
  <div class="slideshow">
    <?php foreach ($slides as $i => $s): ?>
      <div class="slide<?= $i === 0 ? ' active' : '' ?>" data-index="<?= $i ?>">
        <div class="slide-bg" style="background-image: url('/<?= e($s['image']) ?>')"></div>
        <div class="slide-overlay"></div>
        <div class="hero-glow"></div>
        <div class="slide-content">

        <?php if (($s['layout'] ?? '') === 'hero'): ?>
          <div class="slide-1-layout">
            <div>
              <h1 class="slide-1-title"><?= $s['title'] /* trusted markup from config.php */ ?></h1>
              <p class="slide-body"><?= e($s['body']) ?></p>
            </div>

            <div class="funding-card">
              <div class="funding-header">
                <span class="funding-label">Raised so far</span>
                <span class="funding-percent"><?= (int)$funding['percent'] ?>% OF GOAL</span>
              </div>
              <div class="progress-track">
                <div class="progress-fill" style="width: <?= round($funding['raised'] / $funding['goal'] * 100, 1) ?>%"></div>
              </div>
              <div class="funding-footer">
                <span><?= e('$' . number_format($funding['raised'])) ?> raised</span>
                <span><?= e(money_short($funding['goal'])) ?> goal</span>
              </div>
              <div class="slide-btns">
                <a href="/internal/donate.html" class="slide-btn primary">DONATE NOW <span aria-hidden="true">→</span></a>
                <a href="/hiring/" class="slide-btn outline">JOIN THE TEAM</a>
              </div>
            </div>
          </div>

        <?php else: ?>
          <div class="slide-text">
            <div class="slide-label"><?= $s['label'] ?></div>
            <h1 class="slide-heading"><?= $s['heading'] ?></h1>
            <p class="slide-body"><?= e($s['body']) ?></p>
            <div class="slide-btns">
              <?php foreach ($s['buttons'] as [$text, $href, $style]): ?>
                <a href="<?= e($href) ?>" class="slide-btn <?= e($style) ?>"><?= e($text) ?></a>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>

        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="slideshow-controls">
    <div class="slide-dots">
      <?php foreach ($slides as $i => $_): ?>
        <button class="slide-dot<?= $i === 0 ? ' active' : '' ?>" data-slide="<?= $i ?>" aria-label="Slide <?= $i + 1 ?>"></button>
      <?php endforeach; ?>
    </div>
    <div style="display: flex; align-items: center; gap: 20px">
      <span class="slide-counter">
        <span class="current">01</span> / <?= sprintf('%02d', count($slides)) ?>
      </span>
      <div class="slide-arrows">
        <button class="slide-arrow" id="prevSlide" aria-label="Previous">&#8592;</button>
        <button class="slide-arrow" id="nextSlide" aria-label="Next">&#8594;</button>
      </div>
    </div>
  </div>
</section>

<!-- WHAT IS APEX MCC? -->
<section class="about-section" id="about">
  <header class="about-header">
    <p class="about-eyebrow">welcome to</p>
    <h2 class="about-title">Apex MCC</h2>
  </header>
  <div class="about-body">
    <p>Apex MCC is a non-profit organization based in Michigan focused on creating a future community space that supports and empowers individuals in need.</p>
    <p>We're currently in the early stages of developing our vision. Our goal is to create a place where people can connect, access resources, find opportunities, and grow.</p>
    <p>Our vision includes education, community support, resources, events, and a welcoming environment for all.</p>
  </div>
  <footer class="about-footer">
    <a href="#about">Learn More</a>
  </footer>
</section>

<section class="marquee-section">
  <p class="marquee-label">Trusted &amp; Supported By</p>
  <div class="marquee-track">
    <?php /* 3 repeats per set x 2 sets = seamless loop, same as the original markup */
    for ($set = 0; $set < 2; $set++):
      for ($rep = 0; $rep < 3; $rep++):
        foreach ($partners as [$src, $alt]): ?>
          <div class="marquee-item"><img src="/<?= e($src) ?>" alt="<?= e($alt) ?>"></div>
        <?php endforeach;
      endfor;
    endfor; ?>
  </div>
</section>

<?php
require __DIR__ . '/includes/footer.php';
require __DIR__ . '/includes/scripts.php';
