const fs = require('fs');
const path = require('path');

const html = fs.readFileSync(path.join(__dirname, 'index.html'), 'utf8');
let passed = 0;
let failed = 0;

function check(name, condition) {
  if (condition) {
    console.log(`  ✓ ${name}`);
    passed++;
  } else {
    console.log(`  ✗ ${name}`);
    failed++;
  }
}

console.log('\nApex MCC Website Checks\n');

// 1. basic html structure
check('Has DOCTYPE declaration', html.includes('<!DOCTYPE html>'));
check('Has <html lang="en">', html.includes('<html lang="en">'));
check('Has meta viewport tag', html.includes('name="viewport"'));

// 2. title
check('Has page title with Apex MCC', /<title>.*Apex MCC.*<\/title>/.test(html));

// 3. fonts loaded
check('Loads Nunito fonts from Google', html.includes('fonts.googleapis.com') && html.includes('Nunito'));

// 4. favicon
check('Has favicon link', html.includes('cdn/apex_icon.png'));

// 5. navbar exists
check('Has navbar element', html.includes('class="navbar"'));
check('Has PinSystem pill menu toggle', html.includes('menu-pill'));

// 6. drawer exists
check('Has slide-out drawer', html.includes('class="drawer"'));
check('Has drawer overlay', html.includes('drawerOverlay'));

// 7. slideshow
check('Has 4 slides', (html.match(/data-index="\d"/g) || []).length === 4);
check('Has slideshow dots', html.includes('slide-dot'));
check('Has slideshow arrows', html.includes('slide-arrow'));

// 8. slideshow images are local
check('Slide images use local ./slideshow paths', html.includes("url('slideshow/"));

// 9. about section
check('Has "What Is Apex MCC?" section', html.includes('What Is Apex MCC?'));

// 10. pillars section
check('Has 3 pillar cards', (html.match(/class="pillar-card/g) || []).length === 3);

// 11. donate link
check('Has Cash App donate link', html.includes('cash.app/f/POOL'));

// 12. social links in drawer
check('Has social links (Instagram, Facebook, X, TikTok)',
  html.includes('instagram.com') &&
  html.includes('facebook.com') &&
  html.includes('x.com') &&
  html.includes('tiktok.com'));

// 13. footer
check('Has footer with copyright', html.includes('2026 Apex MCC'));

// 14. JS: slideshow logic present
check('Has slideshow JS (goToSlide function)', html.includes('goToSlide'));

// 15. no external CSS frameworks (hand-written)
check('No Bootstrap or Tailwind', !html.includes('bootstrap') && !html.includes('tailwindcss'));

console.log(`\n${passed} passed, ${failed} failed, ${passed + failed} total\n`);
process.exit(failed > 0 ? 1 : 0);
