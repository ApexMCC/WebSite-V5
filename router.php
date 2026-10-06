<?php
/**
 * Local dev router:  php -S 127.0.0.1:8000 router.php
 * Mimics .htaccess: serves real files, old .html URLs, and 404 -> coming soon.
 */
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($path === '/coming-soon.html') { header('Location: /coming-soon.php', true, 301); exit; }
if ($path === '/index.html')       { header('Location: /', true, 301); exit; }

// Never expose config/includes
if (preg_match('#^/(includes/|config\.php$|router\.php$)#', $path)) { http_response_code(403); exit('Forbidden'); }

$file = __DIR__ . $path;
if ($path !== '/' && is_file($file)) return false;          // serve static file / .php as-is
if ($path === '/' || is_dir($file)) {
    if (is_file(rtrim($file, '/') . '/index.php'))  { require rtrim($file, '/') . '/index.php'; return true; }
    if (is_file(rtrim($file, '/') . '/index.html')) { readfile(rtrim($file, '/') . '/index.html'); return true; }
}
require __DIR__ . '/404.php';
