<!-- ───────── FOOTER ───────── -->
<footer class="footer">
  <div class="container">
    <div class="footer-top">

      <div class="footer-brand">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo">
          <?php
          $logo_id = get_theme_mod('custom_logo');
          if ($logo_id) {
            echo wp_get_attachment_image($logo_id, 'full', false, ['class' => 'footer-logo-img', 'alt' => get_bloginfo('name')]);
          } else { ?>
            <span><?php bloginfo('name'); ?></span>
          <?php } ?>
        </a>
        <p class="footer-brand-desc">
          <?php echo esc_html(get_field('footer_desc', 'option') ?: 'Nous aidons les professionnels à valoriser leur profil et à atteindre leurs objectifs de carrière.'); ?>
        </p>
        <div class="footer-socials">
          <?php $linkedin = get_field('social_linkedin', 'option') ?: '#'; ?>
          <?php $instagram = get_field('social_instagram', 'option') ?: '#'; ?>
          <?php $youtube = get_field('social_youtube', 'option') ?: '#'; ?>
          <a href="<?php echo esc_url($linkedin); ?>" class="social-link" aria-label="LinkedIn" target="_blank" rel="noopener">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
          </a>
          <a href="<?php echo esc_url($instagram); ?>" class="social-link" aria-label="Instagram" target="_blank" rel="noopener">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
          </a>
          <a href="<?php echo esc_url($youtube); ?>" class="social-link" aria-label="YouTube" target="_blank" rel="noopener">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 00-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46A2.78 2.78 0 001.46 6.42 29 29 0 001 12a29 29 0 00.46 5.58 2.78 2.78 0 001.95 1.95C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 001.95-1.95A29 29 0 0023 12a29 29 0 00-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/></svg>
          </a>
        </div>
      </div>

      <div>
        <h4 class="footer-col-title">Navigation</h4>
        <ul class="footer-col-links">
          <li><a href="<?php echo esc_url(home_url('/')); ?>">Accueil</a></li>
          <li><a href="<?php echo esc_url(home_url('/formules')); ?>">Formules</a></li>
          <li><a href="<?php echo esc_url(home_url('/about')); ?>">Qui sommes-nous</a></li>
          <li><a href="<?php echo esc_url(home_url('/ressources')); ?>">Ressources</a></li>
          <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
        </ul>
      </div>

      <div>
        <h4 class="footer-col-title">Nos services</h4>
        <ul class="footer-col-links">
          <li><a href="<?php echo esc_url(home_url('/service-cv-lm')); ?>">Création de CV &amp; LM</a></li>
          <li><a href="<?php echo esc_url(home_url('/service-linkedin')); ?>">Optimisation LinkedIn</a></li>
          <li><a href="<?php echo esc_url(home_url('/service-coaching')); ?>">Coaching entretien</a></li>
        </ul>
      </div>

      <div>
        <h4 class="footer-col-title">Ressources</h4>
        <ul class="footer-col-links">
          <li><a href="<?php echo esc_url(home_url('/ressources')); ?>">Conseils carrière</a></li>
          <li><a href="<?php echo esc_url(home_url('/ressources')); ?>">Guides gratuits</a></li>
          <li><a href="<?php echo esc_url(home_url('/ressources')); ?>">Blog</a></li>
          <li><a href="<?php echo esc_url(home_url('/ressources')); ?>">FAQ</a></li>
        </ul>
      </div>

      <div>
        <h4 class="footer-col-title">Newsletter</h4>
        <p class="footer-newsletter-desc">Recevez nos conseils carrière et nos offres exclusives.</p>
        <?php if (function_exists('get_field') && get_field('newsletter_form_shortcode', 'option')) : ?>
          <?php echo do_shortcode(get_field('newsletter_form_shortcode', 'option')); ?>
        <?php else : ?>
        <div class="footer-newsletter-form">
          <input type="email" class="footer-newsletter-input" placeholder="Votre email" />
          <button class="footer-newsletter-btn">S'inscrire</button>
        </div>
        <?php endif; ?>
      </div>

    </div>
    <hr class="footer-divider" />
    <div class="footer-bottom">
      <p class="footer-copy">
        <?php echo esc_html(get_field('footer_copyright', 'option') ?: '© ' . date('Y') . ' ProfilBoost. Tous droits réservés.'); ?>
      </p>
      <div class="footer-legal">
        <?php
        $mentions = get_permalink(get_page_by_path('mentions-legales'));
        $privacy  = get_permalink(get_page_by_path('politique-de-confidentialite'));
        ?>
        <?php if ($mentions) : ?>
          <a href="<?php echo esc_url($mentions); ?>">Mentions légales</a>
        <?php else : ?>
          <a href="#">Mentions légales</a>
        <?php endif; ?>
        <?php if ($privacy) : ?>
          <a href="<?php echo esc_url($privacy); ?>">Politique de confidentialité</a>
        <?php else : ?>
          <a href="#">Politique de confidentialité</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
