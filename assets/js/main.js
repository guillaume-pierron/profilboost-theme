/* ProfilBoost — Main JS */

document.addEventListener('DOMContentLoaded', function () {

  /* ── Navbar transparent → scrolled ── */
  const navbar = document.getElementById('site-navbar');
  if (navbar) {
    const onScroll = () => {
      if (window.scrollY > 50) {
        navbar.classList.remove('navbar--transparent');
        navbar.classList.add('navbar--scrolled');
      } else {
        navbar.classList.add('navbar--transparent');
        navbar.classList.remove('navbar--scrolled');
      }
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  /* ── Scroll reveal ── */
  const revealEls = document.querySelectorAll('.reveal');
  if (revealEls.length) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.classList.add('visible');
          io.unobserve(e.target);
        }
      });
    }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });
    revealEls.forEach(el => io.observe(el));
  }

  /* ── Hamburger menu ── */
  const hamburger = document.getElementById('hamburger');
  const mobileMenu = document.getElementById('mobileMenu');
  if (hamburger && mobileMenu) {
    hamburger.addEventListener('click', () => {
      hamburger.classList.toggle('open');
      mobileMenu.classList.toggle('open');
      document.body.style.overflow = mobileMenu.classList.contains('open') ? 'hidden' : '';
    });
  }

  window.closeMenu = function () {
    if (hamburger && mobileMenu) {
      hamburger.classList.remove('open');
      mobileMenu.classList.remove('open');
      document.body.style.overflow = '';
      const toggle = mobileMenu.querySelector('.mobile-services-toggle');
      const sub = mobileMenu.querySelector('.mobile-services-sub');
      if (toggle) toggle.classList.remove('open');
      if (sub) sub.classList.remove('open');
    }
  };

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') window.closeMenu();
  });

  window.toggleMobileServices = function (btn) {
    const sub = btn.nextElementSibling;
    const isOpen = sub.classList.contains('open');
    btn.classList.toggle('open', !isOpen);
    sub.classList.toggle('open', !isOpen);
  };

  /* ── FAQ accordion ── */
  document.querySelectorAll('.faq-question').forEach(btn => {
    btn.addEventListener('click', () => {
      const item = btn.closest('.faq-item');
      const isOpen = item.classList.contains('open');
      document.querySelectorAll('.faq-item.open').forEach(el => el.classList.remove('open'));
      if (!isOpen) item.classList.add('open');
    });
  });

  /* ── Contact form mock submit ── */
  const contactForm = document.getElementById('contactForm');
  if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
      e.preventDefault();
      const btn = contactForm.querySelector('.form-submit');
      btn.textContent = 'Envoi en cours…';
      btn.disabled = true;
      setTimeout(() => {
        contactForm.style.display = 'none';
        const success = document.getElementById('formSuccess');
        if (success) success.classList.add('visible');
      }, 1200);
    });
  }

});
