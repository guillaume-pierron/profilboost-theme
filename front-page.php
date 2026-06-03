<?php get_header(); ?>
<div class="pb-grad">
<?php
/* ── Helpers ── */
$tpl = get_template_directory_uri();

$hero_label    = pb_field('hero_label',    'Experts en optimisation professionnelle');
$hero_title    = pb_field('hero_title',    'Nous concevons les CV qui captivent les recruteurs');
$hero_subtitle = pb_field('hero_subtitle', 'Des CV percutants, créés par des experts, qui valorisent votre parcours, passent les filtres ATS et vous ouvrent les portes des entretiens.');
$hero_cta      = pb_field('hero_cta_text', 'Démarrer mon audit gratuit');
$hero_stat1    = pb_field('hero_stat_clients', '+500 clients accompagnés');
$hero_stat2    = pb_field('hero_stat_rating',  '4,9/5 basé sur 200+ avis');

$cv1 = pb_img('hero_cv_1', 'cv_1.png');
$cv2 = pb_img('hero_cv_2', 'CV_2.png');
$cv3 = pb_img('hero_cv_3', 'CV_3.png');

$svc_img_cv       = pb_img('service_img_cv',       'Service_n_1.jpg');
$svc_img_li       = pb_img('service_img_li',        'service_n_2.jpg');
$svc_img_coaching = pb_img('service_img_coaching',  'service_n_3.jpg');

$plus_bg = pb_img('plus_bg_image', 'Les_plus_de_ProfiBoost.jpg');

$cta_title = pb_field('cta_title', 'Prêt à booster votre carrière ?');
$cta_text  = pb_field('cta_text',  'Discutons de votre projet et créons ensemble un CV qui vous ouvrira de nouvelles portes.');
$cta_btn   = pb_field('cta_btn',   'Nous contacter');

$contact_url = esc_url(get_permalink(get_page_by_path('contact')) ?: home_url('/contact'));

/* Features bar defaults */
$default_features = [
    ['title' => "Mettez en valeur vos opportunités",   'desc' => "Un CV qui capte l'attention et reflète tout votre potentiel."],
    ['title' => "Attirez l'attention des recruteurs",  'desc' => "Un contenu structuré pour passer les filtres ATS et marquer les esprits."],
    ['title' => "Évitez les erreurs éliminatoires",    'desc' => "Zéro faute, zéro oubli : un CV professionnel et sans risque."],
];
$features = (function_exists('get_field') && have_rows('features_bar')) ? [] : $default_features;
if (function_exists('have_rows') && have_rows('features_bar')) {
    while (have_rows('features_bar')) { the_row(); $features[] = ['title' => get_sub_field('title'), 'desc' => get_sub_field('desc')]; }
}

/* HiW steps defaults */
$default_steps = [
    ['title' => 'Audit gratuit',       'desc' => "Un échange de 30 min pour analyser votre profil, vos objectifs et établir la stratégie idéale."],
    ['title' => 'Création sur-mesure', 'desc' => "Nos experts rédigent et optimisent vos documents selon votre secteur et vos ambitions."],
    ['title' => 'Révision finale',     'desc' => "Nous affinons ensemble chaque détail jusqu'à obtenir un résultat à la hauteur de vos attentes."],
    ['title' => 'Décrochez le poste',  'desc' => "Postulez avec assurance et bénéficiez de notre soutien à chaque étape de votre recherche."],
];
$hiw_steps = [];
if (function_exists('have_rows') && have_rows('hiw_steps')) {
    while (have_rows('hiw_steps')) { the_row(); $hiw_steps[] = ['title' => get_sub_field('title'), 'desc' => get_sub_field('desc')]; }
}
if (empty($hiw_steps)) $hiw_steps = $default_steps;

/* Plus items defaults */
$default_plus = [
    ['title' => 'Paiement en 4 fois',      'desc' => 'Payez en plusieurs fois sans frais.'],
    ['title' => 'Livraison en 72h',         'desc' => "Vos documents prêts en 3 jours ouvrés."],
    ['title' => 'Satisfait ou remboursé',   'desc' => 'Votre satisfaction est notre priorité absolue.'],
];
$plus_items = [];
if (function_exists('have_rows') && have_rows('plus_items')) {
    while (have_rows('plus_items')) { the_row(); $plus_items[] = ['title' => get_sub_field('title'), 'desc' => get_sub_field('desc')]; }
}
if (empty($plus_items)) $plus_items = $default_plus;

/* Testimonials defaults */
$default_testi = [
    ['name' => 'Marie-Claire Dupont', 'job' => 'Responsable Marketing · Paris',     'initials' => 'MC', 'quote' => "Mon CV a été entièrement repensé en 48h. Après des mois sans réponse, j'ai décroché 3 entretiens en une semaine."],
    ['name' => 'Thomas Bernard',      'job' => 'Ingénieur logiciel · Lyon',          'initials' => 'TB', 'quote' => "L'optimisation LinkedIn a multiplié les sollicitations de recruteurs par 4 en moins d'un mois."],
    ['name' => 'Isabelle Martin',     'job' => 'Directrice commerciale · Bordeaux',  'initials' => 'IM', 'quote' => "Le coaching m'a permis d'aborder mes entretiens avec une assurance que je n'avais jamais eue."],
];
$testimonials = [];
if (function_exists('have_rows') && have_rows('testimonials')) {
    while (have_rows('testimonials')) { the_row(); $testimonials[] = ['name' => get_sub_field('name'), 'job' => get_sub_field('job'), 'initials' => get_sub_field('initials'), 'quote' => get_sub_field('quote')]; }
}
if (empty($testimonials)) $testimonials = $default_testi;

$tav_classes = ['tav-1', 'tav-2', 'tav-3'];
?>

<!-- ───────── HERO ───────── -->
<section class="hero" style="padding-bottom: 100px;">
  <div class="container">
    <div class="hero-inner">
      <div class="hero-content">
        <p class="hero-label fade-up"><?php echo esc_html($hero_label); ?></p>
        <h1 class="hero-title fade-up-2">
          <?php
          $custom_title = function_exists('get_field') ? get_field('hero_title') : '';
          if ($custom_title) {
            echo nl2br(esc_html($custom_title));
          } else { ?>
            Décrochez le poste que vous <span class="accent">méritez</span>
          <?php } ?>
        </h1>
        <p class="hero-subtitle fade-up-3"><?php echo esc_html($hero_subtitle); ?></p>
        <div class="hero-services fade-up-4">
          <a href="<?php echo esc_url(home_url('/service-cv-lm')); ?>" class="hero-service-item">
            <div class="hero-service-icon hero-service-icon-grad">
              <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><defs><linearGradient id="g1" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="#4cbdfa"/><stop offset="100%" stop-color="#058ed9"/></linearGradient></defs><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z" stroke="url(#g1)"/><polyline points="14 2 14 8 20 8" stroke="url(#g1)"/><line x1="16" y1="13" x2="8" y2="13" stroke="url(#g1)"/><line x1="16" y1="17" x2="8" y2="17" stroke="url(#g1)"/></svg>
            </div>
            <span>CV &amp; Lettre de motivation</span>
          </a>
          <div class="hero-service-sep"></div>
          <a href="<?php echo esc_url(home_url('/service-linkedin')); ?>" class="hero-service-item">
            <div class="hero-service-icon hero-service-icon-grad">
              <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><defs><linearGradient id="g2" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="#4cbdfa"/><stop offset="100%" stop-color="#058ed9"/></linearGradient></defs><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z" stroke="url(#g2)"/><rect x="2" y="9" width="4" height="12" stroke="url(#g2)"/><circle cx="4" cy="4" r="2" stroke="url(#g2)"/></svg>
            </div>
            <span>Profil LinkedIn</span>
          </a>
          <div class="hero-service-sep"></div>
          <a href="<?php echo esc_url(home_url('/service-coaching')); ?>" class="hero-service-item">
            <div class="hero-service-icon hero-service-icon-grad">
              <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><defs><linearGradient id="g3" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="#4cbdfa"/><stop offset="100%" stop-color="#058ed9"/></linearGradient></defs><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z" stroke="url(#g3)"/></svg>
            </div>
            <span>Coaching entretien</span>
          </a>
        </div>
        <div class="hero-actions fade-up-4">
          <a href="<?php echo $contact_url; ?>" class="btn btn-primary">
            <?php echo esc_html($hero_cta); ?>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </a>
        </div>
      </div>

      <div class="hero-visual">
        <div class="deco-shape deco-triangle-1"></div>
        <div class="deco-shape deco-triangle-2"></div>
        <div class="deco-shape deco-circle-1"></div>
        <div class="deco-shape deco-circle-2"></div>
        <div class="deco-dots-grid">
          <?php for ($i = 0; $i < 20; $i++) echo '<div class="deco-dot"></div>'; ?>
        </div>
        <div class="cv-fan">
          <img src="<?php echo $cv1; ?>" alt="Exemple CV 1" class="cv-img cv-img-1" />
          <img src="<?php echo $cv2; ?>" alt="Exemple CV 2" class="cv-img cv-img-2" />
          <img src="<?php echo $cv3; ?>" alt="Exemple CV 3" class="cv-img cv-img-3" />
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ───────── FEATURES BAR ───────── -->
<div class="features-bar">
  <div class="container">
    <div class="features-bar-inner">
      <?php
      $feat_icons = [
        '<svg viewBox="0 0 24 24" fill="none" stroke="#4cbdfa" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 00-2.91-.09z"/><path d="M12 15l-3-3a22 22 0 012-3.95A12.88 12.88 0 0122 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 01-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/></svg>',
        '<svg viewBox="0 0 24 24" fill="none" stroke="#4cbdfa" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>',
        '<svg viewBox="0 0 24 24" fill="none" stroke="#4cbdfa" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/><line x1="2" y1="20" x2="22" y2="20"/></svg>',
      ];
      $delays = ['', ' reveal-delay-1', ' reveal-delay-2'];
      foreach ($features as $i => $feat) : ?>
      <div class="feature-item reveal<?php echo $delays[$i]; ?>">
        <div class="feature-icon blue-pale"><?php echo $feat_icons[$i % 3]; ?></div>
        <div class="feature-text">
          <h3><?php echo esc_html($feat['title']); ?></h3>
          <p><?php echo esc_html($feat['desc']); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- ───────── WHY SECTION ───────── -->
<section class="why-section">
  <div class="why-deco-circle-1"></div>
  <div class="why-deco-circle-2"></div>
  <div class="container">

    <p class="why-label reveal">• Pourquoi choisir ProfilBoost ? •</p>
    <h2 class="why-title reveal">Des résultats concrets,<br>pas des <span class="why-accent">promesses.</span></h2>
    <p class="why-subtitle reveal">Nos clients le mesurent chaque semaine — voici ce que<br>notre accompagnement change <strong>concrètement</strong>.</p>

    <div class="why-grid">
      <?php
      $why_items = [
        ['icon' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>',                                              'stat' => '3x',  'title' => "plus d'entretiens",       'desc' => "Nos clients décrochent en moyenne 3x plus d'entretiens dans les 30 jours suivant leur accompagnement.", 'link' => '/service-cv-lm'],
        ['icon' => '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>', 'stat' => '+4x', 'title' => "de visibilité LinkedIn",  'desc' => "Un profil LinkedIn optimisé multiplie par 4 les sollicitations de recruteurs en moins d'un mois.",      'link' => '/service-cv-lm'],
        ['icon' => '<polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>',                                                  'stat' => '72h', 'title' => "livraison garantie",        'desc' => "Vos documents prêts en 3 jours ouvrés, avec une garantie satisfait ou remboursé sans conditions.",      'link' => '/service-coaching'],
      ];
      $delays = ['', ' reveal-delay-1', ' reveal-delay-2'];
      foreach ($why_items as $i => $item) : ?>
      <div class="why-card reveal<?php echo $delays[$i]; ?>">
        <div class="why-stat"><?php echo esc_html($item['stat']); ?></div>
        <h3><?php echo esc_html($item['title']); ?></h3>
        <p><?php echo esc_html($item['desc']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- Social proof encart unique -->
    <div class="why-proof-single reveal">
      <div class="why-proof-half">
        <div class="why-stat-block-num">+500</div>
        <div class="why-stat-block-label">clients accompagnés</div>
      </div>
      <div class="why-proof-divider"></div>
      <div class="why-proof-half">
        <div class="why-rating-row">
          <span class="why-stat-block-stars">★★★★★</span>
          <span class="why-stat-block-num">4,9/5</span>
        </div>
        <div class="why-stat-block-label">basé sur 200+ avis vérifiés</div>
      </div>
    </div>

  </div>
</section>

<!-- ───────── SERVICES SECTION ───────── -->
<section class="services-showcase">
  <div class="container">
    <div class="reveal" style="text-align:center;">
      <p class="section-label">Nos services</p>
      <h2 class="section-title">Tout pour réussir votre <span class="underline-blue">carrière</span></h2>
      <p class="section-subtitle" style="margin-top:14px;margin-bottom:0;">
        Un accompagnement complet, du CV optimisé à l'entretien réussi, en passant par une présence LinkedIn percutante.
      </p>
    </div>

    <div class="svc-cards">
      <?php
      $cv_url       = esc_url(get_permalink(get_page_by_path('service-cv-lm'))   ?: home_url('/service-cv-lm'));
      $li_url       = esc_url(get_permalink(get_page_by_path('service-linkedin')) ?: home_url('/service-linkedin'));
      $coaching_url = esc_url(get_permalink(get_page_by_path('service-coaching')) ?: home_url('/service-coaching'));
      $chk = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>';
      $arrow = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>';
      ?>

      <!-- CV & LM -->
      <div class="svc-card reveal">
        <div class="svc-card-top">
          <span class="svc-badge svc-badge-1">Service 01</span>
          <div class="svc-card-img" style="background-image: url('<?php echo $svc_img_cv; ?>');"></div>
        </div>
        <div class="svc-card-body">
          <h3 class="svc-card-title">Création de CV &amp;<br>Lettre de motivation</h3>
          <p class="svc-card-desc">Des documents percutants, modernes et adaptés à votre secteur.</p>
          <ul class="svc-list">
            <?php foreach (['Design professionnel sur-mesure', 'Optimisation ATS garantie', 'Livraison sous 72h'] as $feat) : ?>
            <li><div class="svc-check svc-check-1"><?php echo $chk; ?></div><?php echo esc_html($feat); ?></li>
            <?php endforeach; ?>
          </ul>
          <a href="<?php echo $cv_url; ?>" class="svc-card-link">Voir le service <?php echo $arrow; ?></a>
        </div>
      </div>

      <!-- LinkedIn -->
      <div class="svc-card reveal reveal-delay-1">
        <div class="svc-card-top">
          <span class="svc-badge svc-badge-2">Service 02</span>
          <div class="svc-card-img" style="background-image: url('<?php echo $svc_img_li; ?>');"></div>
        </div>
        <div class="svc-card-body">
          <h3 class="svc-card-title">Optimisation du<br>Profil LinkedIn</h3>
          <p class="svc-card-desc">Renforcez votre présence LinkedIn et attirez les meilleures opportunités.</p>
          <ul class="svc-list">
            <?php foreach (['Photo, bannière & titre percutants', 'Résumé optimisé SEO LinkedIn', 'Recommandations & compétences ciblées'] as $feat) : ?>
            <li><div class="svc-check svc-check-2"><?php echo $chk; ?></div><?php echo esc_html($feat); ?></li>
            <?php endforeach; ?>
          </ul>
          <a href="<?php echo $li_url; ?>" class="svc-card-link">Voir le service <?php echo $arrow; ?></a>
        </div>
      </div>

      <!-- Coaching -->
      <div class="svc-card reveal reveal-delay-2">
        <div class="svc-card-top">
          <span class="svc-badge svc-badge-3">Service 03</span>
          <div class="svc-card-img" style="background-image: url('<?php echo $svc_img_coaching; ?>');"></div>
        </div>
        <div class="svc-card-body">
          <h3 class="svc-card-title">Coaching &amp;<br>Préparation entretien</h3>
          <p class="svc-card-desc">Préparez-vous en conditions réelles pour convaincre et décrocher le poste.</p>
          <ul class="svc-list">
            <?php foreach (["Entraînement en conditions réelles", 'Méthode STAR & réponses structurées', 'Gestion du stress et des objections'] as $feat) : ?>
            <li><div class="svc-check svc-check-3"><?php echo $chk; ?></div><?php echo esc_html($feat); ?></li>
            <?php endforeach; ?>
          </ul>
          <a href="<?php echo $coaching_url; ?>" class="svc-card-link">Voir le service <?php echo $arrow; ?></a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ───────── HOW IT WORKS + LES PLUS ───────── -->
<section class="hiw-section">
  <div class="container">
    <div class="hiw-plus-grid">

      <!-- Gauche : Notre méthode -->
      <div class="hiw-left reveal">
        <p class="section-label hiw-label">Notre méthode</p>
        <h2 class="hiw-main-title">Un processus simple,<br>une transformation garantie</h2>
        <div class="hiw-steps">
          <div class="hiw-connector"></div>
          <?php
          $hiw_colors = ['hiw-num-1', 'hiw-num-2', 'hiw-num-3', 'hiw-num-4'];
          foreach ($hiw_steps as $i => $step) : ?>
          <div class="hiw-step">
            <div class="hiw-num <?php echo $hiw_colors[$i % 4]; ?>"><?php echo ($i + 1); ?></div>
            <h3 class="hiw-step-title"><?php echo esc_html($step['title']); ?></h3>
            <p class="hiw-step-desc"><?php echo esc_html($step['desc']); ?></p>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Droite : Les + -->
      <div class="hiw-plus-card reveal reveal-delay-2">
        <h3 class="hiw-plus-card-title">Les + de ProfilBoost</h3>
        <?php
        $plus_icons = [
          '<rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/>',
          '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
          '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/>',
        ];
        foreach ($plus_items as $i => $item) : ?>
        <div class="hiw-plus-item">
          <div class="hiw-plus-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo $plus_icons[$i % 3]; ?></svg>
          </div>
          <div class="hiw-plus-text">
            <h4><?php echo esc_html($item['title']); ?></h4>
            <p><?php echo esc_html($item['desc']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</section>

<!-- ───────── TESTIMONIALS ───────── -->
<section class="testi-section">
  <div class="container">
    <div class="reveal">
      <p class="section-label">Ils nous font confiance</p>
      <h2 class="section-title">Ce que disent nos <span class="underline-blue">clients</span></h2>
      <p class="section-subtitle">Plus de 1&nbsp;200 candidats ont transformé leur carrière avec ProfilBoost.</p>
    </div>
    <div class="testi-grid">
      <?php foreach ($testimonials as $i => $t) : ?>
      <div class="testi-card reveal<?php echo $i > 0 ? ' reveal-delay-' . $i : ''; ?>">
        <div class="testi-stars">
          <span class="testi-star">★</span><span class="testi-star">★</span><span class="testi-star">★</span><span class="testi-star">★</span><span class="testi-star">★</span>
        </div>
        <p class="testi-quote"><?php echo esc_html($t['quote']); ?></p>
        <div class="testi-author">
          <div class="testi-avatar <?php echo $tav_classes[$i % 3]; ?>"><?php echo esc_html($t['initials']); ?></div>
          <div>
            <p class="testi-name"><?php echo esc_html($t['name']); ?></p>
            <p class="testi-job"><?php echo esc_html($t['job']); ?></p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ───────── RESOURCES PREVIEW ───────── -->
<?php
$res_url = esc_url(get_permalink(get_page_by_path('ressources')) ?: home_url('/ressources'));
$recent_posts = get_posts(['numberposts' => 3, 'post_status' => 'publish']);
?>
<section class="res-preview-section">
  <div class="container">
    <div class="reveal">
      <p class="section-label">Le blog</p>
      <h2 class="section-title">Conseils pour votre <span class="underline-blue">recherche d'emploi</span></h2>
      <p class="section-subtitle">Stratégies, astuces et guides pratiques pour maximiser vos chances à chaque étape.</p>
    </div>

    <?php if (!empty($recent_posts)) : ?>
    <div class="res-grid">
      <?php foreach ($recent_posts as $i => $post) :
        setup_postdata($post);
        $thumbnail = get_the_post_thumbnail_url($post->ID, 'medium');
        $cat = get_the_category($post->ID);
        $cat_name = !empty($cat) ? $cat[0]->name : 'Blog';
        $rc_classes = ['rc-cv', 'rc-li', 'rc-carr'];
      ?>
      <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="res-card reveal<?php echo $i > 0 ? ' reveal-delay-' . $i : ''; ?>">
        <div class="res-card-cover <?php echo $rc_classes[$i % 3]; ?>"
          <?php if ($thumbnail) : ?>style="background: linear-gradient(145deg, rgba(10,22,40,.50), rgba(30,64,175,.40)), url('<?php echo esc_url($thumbnail); ?>') center/cover no-repeat;"<?php endif; ?>>
          <span class="res-cat-badge"><?php echo esc_html($cat_name); ?></span>
        </div>
        <div class="res-card-body">
          <h3 class="res-card-title"><?php echo get_the_title($post->ID); ?></h3>
          <p class="res-card-excerpt"><?php echo wp_trim_words(get_the_excerpt($post->ID), 18); ?></p>
          <div class="res-card-meta">
            <span class="res-read-time"><?php echo get_the_date('', $post->ID); ?></span>
            <span class="res-card-link">Lire <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
          </div>
        </div>
      </a>
      <?php endforeach; wp_reset_postdata(); ?>
    </div>
    <?php else : ?>
    <!-- Fallback statique si aucun article -->
    <div class="res-grid">
      <?php
      $static_res = [
        ['title' => '5 erreurs qui font rejeter votre CV en moins de 10 secondes', 'cat' => 'CV & LM',  'time' => '5 min', 'img' => 'images/5_erreur.jpg',    'rc' => 'rc-cv'],
        ['title' => 'LinkedIn en 2024 : les mots-clés qui attirent les recruteurs',  'cat' => 'LinkedIn','time' => '8 min', 'img' => 'images/keywords.jpg',    'rc' => 'rc-li'],
        ['title' => 'Comment négocier son salaire sans se brûler les ailes',          'cat' => 'Carrière','time' => '6 min', 'img' => 'images/nego.jpg',        'rc' => 'rc-carr'],
      ];
      foreach ($static_res as $i => $r) : ?>
      <a href="<?php echo $res_url; ?>" class="res-card reveal<?php echo $i > 0 ? ' reveal-delay-' . $i : ''; ?>">
        <div class="res-card-cover <?php echo $r['rc']; ?>" style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/' . $r['img']); ?>')">
          <span class="res-cat-badge"><?php echo esc_html($r['cat']); ?></span>
        </div>
        <div class="res-card-body">
          <h3 class="res-card-title"><?php echo esc_html($r['title']); ?></h3>
          <div class="res-card-meta">
            <span class="res-read-time"><?php echo esc_html($r['time']); ?> de lecture</span>
            <span class="res-card-link">Lire <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
          </div>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="res-section-footer reveal">
      <a href="<?php echo $res_url; ?>" class="btn btn-primary">
        Voir toutes les ressources
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>
  </div>
</section>

<!-- ───────── CTA BANNER ───────── -->
<section class="cta-banner-fullwidth">
  <div class="cta-inner">
    <div class="cta-icon">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>
      </svg>
    </div>
    <div class="cta-text">
      <h2><?php echo esc_html($cta_title); ?></h2>
      <p><?php echo esc_html($cta_text); ?></p>
    </div>
    <a href="<?php echo $contact_url; ?>" class="btn btn-white">
      <?php echo esc_html($cta_btn); ?>
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </a>
  </div>
</section>

</div>
<?php get_footer(); ?>
