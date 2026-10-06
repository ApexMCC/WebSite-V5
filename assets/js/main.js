(function () {
  // ---------- Slideshow ----------
  var slides  = document.querySelectorAll('.slide');
  var dots    = document.querySelectorAll('.slide-dot');
  var counter = document.querySelector('.slide-counter .current');
  var current = 0;
  var autoplayTimer;
  var knownVideos = window.APEX_KNOWN_VIDEOS || {};

  if (slides.length) {
    // Auto-detect videos: slideshow/slide-{index}.mp4, or a known video file.
    slides.forEach(function (slide, i) {
      var bg = slide.querySelector('.slide-bg');
      var vid = document.createElement('video');
      vid.muted = true; vid.loop = true; vid.playsInline = true; vid.preload = 'auto';
      vid.src = '/slideshow/slide-' + i + '.mp4';
      vid.addEventListener('error', function () {
        if (knownVideos[i]) vid.src = '/' + knownVideos[i];
      });
      vid.addEventListener('loadeddata', function () {
        bg.appendChild(vid);
        if (slide.classList.contains('active')) vid.play().catch(function () {});
      });
    });

    var goToSlide = function (index) {
      var outVideo = slides[current].querySelector('video');
      if (outVideo) outVideo.pause();
      slides[current].classList.remove('active');
      dots[current].classList.remove('active');
      current = (index + slides.length) % slides.length;
      slides[current].classList.add('active');
      dots[current].classList.add('active');
      counter.textContent = current + 1 < 10 ? '0' + (current + 1) : '' + (current + 1);
      var inVideo = slides[current].querySelector('video');
      if (inVideo) inVideo.play().catch(function () {});
    };

    var resetAutoplay = function () {
      clearInterval(autoplayTimer);
      autoplayTimer = setInterval(function () { goToSlide(current + 1); }, 6000);
    };

    document.getElementById('nextSlide').addEventListener('click', function () { goToSlide(current + 1); resetAutoplay(); });
    document.getElementById('prevSlide').addEventListener('click', function () { goToSlide(current - 1); resetAutoplay(); });
    dots.forEach(function (dot) {
      dot.addEventListener('click', function () { goToSlide(parseInt(dot.dataset.slide, 10)); resetAutoplay(); });
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'ArrowRight') { goToSlide(current + 1); resetAutoplay(); }
      if (e.key === 'ArrowLeft')  { goToSlide(current - 1); resetAutoplay(); }
    });
    resetAutoplay();
  }

  // ---------- Active nav on scroll ----------
  window.addEventListener('scroll', function () {
    var sections = document.querySelectorAll('[id]');
    var navLinks = document.querySelectorAll('.nav-links a');
    var currentId = '';
    sections.forEach(function (s) {
      if (s.offsetTop - 100 <= window.scrollY) currentId = s.getAttribute('id');
    });
    navLinks.forEach(function (link) {
      link.classList.remove('active');
      if (link.getAttribute('href') === '#' + currentId) link.classList.add('active');
    });
  });

  // ---------- Dropdowns ----------
  document.querySelectorAll('.nav-dropdown-btn').forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      var dropdown = this.closest('.nav-dropdown');
      dropdown.classList.toggle('open');
      this.setAttribute('aria-expanded', dropdown.classList.contains('open'));
    });
  });
  document.addEventListener('click', function (e) {
    document.querySelectorAll('.nav-dropdown.open').forEach(function (dd) {
      if (!dd.contains(e.target)) {
        dd.classList.remove('open');
        dd.querySelector('.nav-dropdown-btn').setAttribute('aria-expanded', 'false');
      }
    });
  });
  document.querySelectorAll('.nav-dropdown-menu a').forEach(function (link) {
    link.addEventListener('click', function () {
      var t = document.getElementById('mobile-menu-toggle');
      if (t) t.checked = false;
    });
  });

  // ---------- Scroll reveal ----------
  var revealItems = document.querySelectorAll('.about-section, .marquee-section, .site-footer');
  revealItems.forEach(function (item) { item.classList.add('reveal'); });
  if ('IntersectionObserver' in window && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    var observer = new IntersectionObserver(function (entries, obs) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) { entry.target.classList.add('is-visible'); obs.unobserve(entry.target); }
      });
    }, { threshold: 0.12 });
    revealItems.forEach(function (item) { observer.observe(item); });
  } else {
    revealItems.forEach(function (item) { item.classList.add('is-visible'); });
  }
})();
