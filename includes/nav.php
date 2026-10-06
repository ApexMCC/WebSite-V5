<nav class="site-nav">
  <div class="nav-container">
    <a href="/" class="nav-logo" aria-label="Apex MCC home">
      <img src="/cdn/apex_long.png" alt="Apex MCC logo">
    </a>

    <input type="checkbox" id="mobile-menu-toggle" class="mobile-menu-toggle">
    <label for="mobile-menu-toggle" class="mobile-menu-button" aria-label="Open navigation menu">
      <span></span><span></span><span></span>
    </label>

    <div class="nav-links">
      <?php foreach ($nav as $item): ?>
        <?php if (empty($item['children'])): ?>
          <a href="<?= e($item['href']) ?>"><?= e($item['label']) ?></a>
        <?php else: ?>
          <div class="nav-dropdown">
            <button class="nav-dropdown-btn" aria-haspopup="true" aria-expanded="false">
              <?= e($item['label']) ?> <span class="dd-arrow" aria-hidden="true">▾</span>
            </button>
            <div class="nav-dropdown-menu">
              <?php foreach ($item['children'] as [$label, $href]): ?>
                <a href="<?= e($href) ?>"><?= e($label) ?></a>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>

      <a href="/internal/donate.html" class="donate-button">
        DONATE <span aria-hidden="true">→</span>
      </a>
    </div>
  </div>
</nav>
