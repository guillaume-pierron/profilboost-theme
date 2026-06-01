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
        <span><?php bloginfo('name'); ?></span>
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
      <a href="<?php echo esc_url($contact_url); ?>" class="btn btn-primary">Nous contacter</a>
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
