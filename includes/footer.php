<footer class="site-footer">
  <div class="footer-inner">
    <div class="footer-grid">
      <div class="footer-brand">
        <a class="footer-logo" href="/" aria-label="Apex MCC home">
          <img src="/cdn/apex_long.png" alt="Apex MCC logo">
        </a>
        <p class="footer-tagline"><?= e(SITE_TAGLINE) ?></p>
        <form class="footer-form" action="<?= e(FORM_ENDPOINT) ?>" method="POST">
          <input type="email" name="email" placeholder="you@email.com" aria-label="Email address" required />
          <button type="submit">Sign up</button>
        </form>
        <p class="footer-note">Updates on events and milestones. No spam — unsubscribe anytime.</p>
      </div>

      <div class="footer-cols">
        <?php foreach ($footerCols as $title => $links): ?>
          <div class="footer-col">
            <h4 class="footer-col-title"><?= e($title) ?></h4>
            <ul>
              <?php foreach ($links as $link):
                  $label = $link[0];
                  $href  = $link[1];
                  $attrs = $link[2] ?? [];
              ?>
                <?php if ($href === null): ?>
                  <li class="footer-soon"><?= e($label) ?></li>
                <?php else: ?>
                  <li><a href="<?= e($href) ?>"<?php foreach ($attrs as $k => $v) echo ' ' . e($k) . '="' . e($v) . '"'; ?>><?= e($label) ?></a></li>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="footer-bottom">
      <span class="footer-copy">&copy; <?= date('Y') ?> <?= e(SITE_NAME) ?>. All rights reserved.</span>
      <div class="footer-links">
        <a href="/coming-soon.html">Privacy</a>
        <a href="/coming-soon.html">Terms</a>
        <a href="https://www.apexmcc.org/sitemap.xml">Site Map</a>
        <button class="footer-top" onclick="window.scrollTo({top:0,behavior:'smooth'})">Back to top &uarr;</button>
      </div>
    </div>
  </div>
</footer>
