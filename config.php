<?php
/**
 * Apex MCC – central site configuration.
 * Edit content here instead of hunting through HTML.
 */

define('SITE_NAME',   'Apex MCC');
define('SITE_URL',    'https://apexmcc.org');
define('SITE_TAGLINE','Building Community. Empowering People. Providing Opportunity.');
define('GA_ID',       'G-G2MD4PXZ6R');
define('FORM_ENDPOINT','https://formspree.io/f/xrpgeegw');
define('THEME_COLOR', '#3bc94e');

/** Safe HTML escape helper */
function e($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Fundraising numbers (percent is calculated automatically) */
$funding = [
    'raised' => 100000,
    'goal'   => 2400000,
];
$funding['percent'] = (int) round($funding['raised'] / $funding['goal'] * 100);

function money_short(int $n): string {
    if ($n >= 1000000) return '$' . rtrim(rtrim(number_format($n / 1000000, 1), '0'), '.') . 'M';
    return '$' . number_format($n);
}

/** Navigation: a plain link or a dropdown with children */
$nav = [
    ['label' => 'HOME', 'href' => '/'],
    ['label' => 'OUR COMMUNITY', 'children' => [
        ['About Apex MCC',     '/community/about/'],
        ['Our Mission',        '/community/mission/'],
        ['Community Programs', '/community/programs/'],
        ['Leadership',         '/community/leadership/'],
        ['Partners',           '/community/partners/'],
        ['FAQ',                '/community/faq/'],
    ]],
    ['label' => 'FUNDRAISING', 'children' => [
        ['Campaigns',             '/funding/campaigns/'],
        ['Where Your Money Goes', '/funding/where-your-money-goes/'],
        ['Fundraising Events',    '/funding/events/'],
        ['Sponsorship',           '/funding/sponsorship/'],
        ['Donate',                '/internal/donate.html'],
    ]],
    ['label' => 'ROADMAP', 'children' => [
        ['Our Vision',        '/roadmap/vision/'],
        ['Current Phase',     '/roadmap/current-phase/'],
        ['Project Timeline',  '/roadmap/timeline/'],
        ['Future Plans',      '/roadmap/future-plans/'],
        ['Progress Updates',  '/roadmap/progress/'],
    ]],
    ['label' => 'GET INVOLVED', 'children' => [
        ['Volunteer',          '/get-involved/volunteer/'],
        ['Attend an Event',    '/get-involved/attend/'],
        ['Become a Partner',   '/get-involved/partner/'],
        ['Fundraise for Apex', '/get-involved/fundraise/'],
        ['Spread the Word',    '/get-involved/spread-the-word/'],
    ]],
    ['label' => 'For Students & Parents', 'children' => [
        ['Volunteer',                '/hiring/volunteer/'],
        ['Employment',               '/hiring/employment/'],
        ['Internships',              '/hiring/internships/'],
        ['Leadership Opportunities', '/hiring/leadership/'],
        ['Apex Academy',             'https://canvas.windevpublicschools.org/'],
    ]],
];

/** Hero slideshow. First slide uses the special "hero" layout with the funding card. */
$slides = [
    [
        'layout' => 'hero',
        'image'  => 'slideshow/5029919.webp',
        'title'  => 'BUILDING A<br>HOME FOR<br><span class="highlight">EVERY</span><br>COMMUNITY.',
        'body'   => 'Apex Multicultural Community Center is a nonprofit in development — raising funds, finalizing plans, and hiring a founding team to build a permanent home for 40+ cultural communities in our region.',
    ],
    [
        'image'   => 'slideshow/d4zf2td.jpg',
        'label'   => 'Community Center',
        'heading' => 'Where People<br><em>Connect</em><br>&amp; Grow',
        'body'    => 'A place where diverse communities come together, access resources, and find real opportunities.',
        'buttons' => [
            ['Support Us', '/internal/donate.html', 'primary'],
            ['Our Mission', '#about', 'outline'],
        ],
    ],
    [
        'image'   => 'slideshow/wjtt28t.jpg',
        'label'   => 'Education &amp; Opportunity',
        'heading' => 'Empowering<br><em>Every</em><br>Individual',
        'body'    => 'Education, community support, resources, and a welcoming environment for all — that\'s our vision.',
        'buttons' => [
            ['Donate Now', '/internal/donate.html', 'primary'],
            ['About Us', '#about', 'outline'],
        ],
    ],
    [
        'image'   => 'slideshow/overhang.webp',
        'label'   => 'Coming Soon',
        'heading' => 'People.<br><em>Community.</em><br>Opportunity.',
        'body'    => 'We\'re still building, but our focus remains simple — creating a space where everyone belongs.',
        'buttons' => [
            ['Get Involved', '/coming-soon.html', 'primary'],
        ],
    ],
];

/** Slides that have a known background video (index => file) */
$knownVideos = [3 => 'slideshow/j1nqztw.mp4'];

/** "Trusted & Supported By" logos (repeated twice for a seamless marquee loop) */
$partners = [
    ['cdn/image-11.webp', 'OCEC'],
    ['cdn/lavadev.webp',  'Lavadev'],
];

/** Footer columns */
$footerCols = [
    'Explore' => [
        ['What Is Apex MCC',     '/#about'],
        ['Our Mission',          '/#about'],
        ['Donate',               '/internal/donate.html'],
        ['Community Calender',   '/calender.html'],
    ],
    'Get Involved' => [
        ['Official Website', 'https://www.apexmcc.org/', ['target' => '_blank', 'rel' => 'noreferrer']],
        ['Volunteer — Coming Soon',    null],
        ['Interest Form — Coming Soon', null],
    ],
    'Contact' => [
        ['Instagram — Coming Soon', '/coming-soon.html', ['class' => 'social-coming-soon']],
        ['Facebook — Coming Soon',  '/coming-soon.html', ['class' => 'social-coming-soon']],
        ['X (Twitter)',             'https://x.com/ApexMCC', ['target' => '_blank', 'rel' => 'noreferrer']],
        ['TikTok — Coming Soon',    '/coming-soon.html', ['class' => 'social-coming-soon']],
        ['LinkedIn',                'https://www.linkedin.com/company/apexmcc/', ['target' => '_blank', 'rel' => 'noreferrer']],
    ],
];
