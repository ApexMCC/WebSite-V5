<?php
/**
 * Expects (optional) before include:
 *   $pageTitle, $pageDescription, $pageUrl, $extraHead
 */
$pageTitle       = $pageTitle       ?? "Apex MCC | Michigan's Future Multicultural Community Center";
$pageDescription = $pageDescription ?? SITE_TAGLINE;
$pageUrl         = $pageUrl         ?? SITE_URL . '/';
$ogImage         = SITE_URL . '/cdn/Logo.png';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?= e(GA_ID) ?>"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', '<?= e(GA_ID) ?>');
</script>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
<title><?= e($pageTitle) ?></title>
<meta name="title" content="<?= e($pageTitle) ?>">
<meta name="description" content="<?= e($pageDescription) ?>">
<meta name="robots" content="index, follow" />
<meta name="theme-color" content="<?= e(THEME_COLOR) ?>">
<meta property="og:type" content="website">
<meta property="og:url" content="<?= e($pageUrl) ?>">
<meta property="og:title" content="<?= e($pageTitle) ?>">
<meta property="og:description" content="<?= e($pageDescription) ?>">
<meta property="og:image" content="<?= e($ogImage) ?>">
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="<?= e($pageUrl) ?>">
<meta property="twitter:title" content="<?= e($pageTitle) ?>">
<meta property="twitter:description" content="<?= e($pageDescription) ?>">
<meta property="twitter:image" content="<?= e($ogImage) ?>">
<link rel="icon" type="image/png" href="/cdn/apex_icon.png" />
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200..1000&family=Nunito:wght@200..1000&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/styles.css" />
<style>
/* Focus-visible keyboard support for desktop dropdowns (focus within) */
.nav-dropdown:focus-within .nav-dropdown-menu { opacity:1; visibility: visible; pointer-events: auto; }
</style>
<script>document.documentElement.classList.add("js");</script>
<?= $extraHead ?? '' ?>
</head>
<body>
