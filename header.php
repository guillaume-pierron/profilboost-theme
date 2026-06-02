<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ───────── NAVBAR ───────── -->
<header class="navbar" id="site-navbar">
  <div class="container navbar-inner">

    <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-logo">
      <?php
      $logo_id = get_theme_mod('custom_logo');
      if ($logo_id) {
        echo wp_get_attachment_image($logo_id, 'full', false, ['class' => 'nav-logo-img', 'alt' => get_bloginfo('name')]);
      } else { ?>
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/profilboost_logo_sombre.svg'); ?>" alt="<?php bloginfo('name'); ?>" class="nav-logo-img" />
      <?php } ?>
    </a>

    <ul class="nav-links">
      <?php
      wp_nav_menu([
        'theme_location' => 'primary',
        'container'      => false,
        'items_wrap'     => '%3$s',
        'walker'         => new ProfilBoost_Walker_Nav(),
        'fallback_cb'    => 'profilboost_fallback_menu',
      ]);
      ?>
    </ul>

    <div class="nav-cta">
      <?php
      $contact_url = get_permalink(get_page_by_path('contact'));
      if (!$contact_url) $contact_url = home_url('/contact');
      ?>
      <a href="<?php echo esc_url($contact_url); ?>" class="btn btn-primary">Nous contacter <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
      <button class="hamburger" id="hamburger" aria-label="Menu">
        <span></span><span></span><span></span>
      </button>
    </div>

  </div>
</header>

<!-- ───────── MOBILE MENU ───────── -->
<nav class="mobile-menu" id="mobileMenu">
  <?php
  wp_nav_menu([
    'theme_location' => 'primary',
    'container'      => false,
    'items_wrap'     => '%3$s',
    'walker'         => new ProfilBoost_Walker_Mobile(),
    'fallback_cb'    => 'profilboost_fallback_mobile_menu',
  ]);
  ?>
  <a href="<?php echo esc_url($contact_url); ?>" class="btn btn-primary mobile-cta" onclick="closeMenu()">Nous contacter</a>
</nav>
