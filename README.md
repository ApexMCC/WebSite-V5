# Apex MCC – PHP version

PHP port of https://github.com/ApexMCC/WebSite-V4 (requires PHP 7.4+, Apache with mod_rewrite).

## Structure
- `config.php`        – site constants, nav, slides, partners, footer links, fundraising numbers
- `includes/`         – head, nav, footer, scripts partials
- `index.php`         – homepage
- `coming-soon.php`   – placeholder page
- `404.php`           – missing pages redirect to coming-soon (same as the old 404.html)
- `router.php`        – dev router for `php -S`
- `assets/js/main.js` – slideshow, dropdowns, scroll reveal (extracted from inline script)
- `.htaccess`         – 404 handler, redirects, blocks direct access to config/includes

## Run locally
    php -S 127.0.0.1:8000 router.php

## Deploy
Upload everything to any PHP 7.4+ host (Apache with mod_rewrite for `.htaccess`).
Images, CSS, `internal/`, `staff/` and `calender.html` are the original files, unchanged.

## Updating fundraising
Edit `$funding['raised']` / `['goal']` in `config.php`; the percent, progress bar and labels update automatically.

## Not converted
`calender.html`, `internal/donate.html`, `staff/` – still static HTML; they can use
the same includes (see 404.php for a template).
