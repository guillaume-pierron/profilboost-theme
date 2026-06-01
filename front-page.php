<?php get_header(); ?>

<?php
/* ── Helpers ── */
$tpl = get_template_directory_uri();

$hero_label    = pb_field('hero_label',    'Experts en optimisation professionnelle');
$hero_title    = pb_field('hero_title',    'Nous concevons les CV qui captivent les recruteurs');
$hero_subtitle = pb_field('hero_subtitle', 'Des CV percutants, créés par des experts, qui valorisent votre parcours, passent les filtres ATS et vous ouvrent les portes des entretiens.');
$hero_cta      = pb_field('hero_cta_text', 'Booster mon profil');
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
    ['title' => 'Audit gratuit',         'desc' => 'Un échange de 30 minutes pour analyser votre profil, vos objectifs et définir la meilleure stratégie.'],
    ['title' => 'Création sur-mesure',   'desc' => 'Nos experts rédigent et optimisent vos documents selon votre secteur et vos ambitions.'],
    ['title' => 'Révision & ajustements','desc' => "Nous affinons ensemble jusqu'à votre satisfaction complète."],
    ['title' => 'Décrochez vos entretiens', 'desc' => "Vous postulez avec confiance, armé d'un profil optimisé."],
];
$hiw_steps = [];
if (function_exists('have_rows') && have_rows('hiw_steps')) {
    while (have_rows('hiw_steps')) { the_row(); $hiw_steps[] = ['title' => get_sub_field('title'), 'desc' => get_sub_field('desc')]; }
}
if (empty($hiw_steps)) $hiw_steps = $default_steps;

/* Plus items defaults */
$default_plus = [
    ['title' => 'Paiement en 4 fois',      'desc' => 'Payez en plusieurs fois sans frais.'],
    ['title' => 'Livraison en 72h',         'desc' => "Des délais rapides pour ne pas rater vos opportunités."],
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
            Concevons les CV<br>qui <span class="accent">captivent</span> les recruteurs
          <?php } ?>
        </h1>
        <p class="hero-subtitle fade-up-3"><?php echo esc_html($hero_subtitle); ?></p>
        <div class="hero-actions fade-up-4">
          <a href="<?php echo $contact_url; ?>" class="btn btn-primary">
            <?php echo esc_html($hero_cta); ?>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </a>
        </div>
        <div class="hero-social-proof fade-up-4">
          <div class="avatars">
            <div class="avatar"><div class="avatar-initials">MR</div></div>
            <div class="avatar" style="background:linear-gradient(135deg,#a78bfa,#8b5cf6)"><div class="avatar-initials">SL</div></div>
            <div class="avatar" style="background:linear-gradient(135deg,#34d399,#10b981)"><div class="avatar-initials">AB</div></div>
            <div class="avatar" style="background:linear-gradient(135deg,#f87171,#ef4444)"><div class="avatar-initials">TC</div></div>
          </div>
          <span class="proof-text"><strong><?php echo esc_html($hero_stat1); ?></strong></span>
          <div class="proof-sep"></div>
          <div>
            <div class="stars">★★★★★</div>
            <div class="proof-rating"><strong><?php echo esc_html($hero_stat2); ?></strong></div>
          </div>
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
        '<svg viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 00-2.91-.09z"/><path d="M12 15l-3-3a22 22 0 012-3.95A12.88 12.88 0 0122 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 01-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/></svg>',
        '<svg viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>',
        '<svg viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/><line x1="2" y1="20" x2="22" y2="20"/></svg>',
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
  <div class="container">
    <h2 class="section-title reveal">Pourquoi <span class="underline-blue">choisir</span> ProfilBoost ?</h2>
    <div class="why-grid">
      <?php
      $why_items = [
        ['icon' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>',                                                                              'title' => 'Expertise professionnelle',      'desc' => "Des rédacteurs RH certifiés, spécialisés par secteur d'activité."],
        ['icon' => '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>',                 'title' => 'Différenciation et visibilité',  'desc' => "Un CV unique qui vous distingue et renforce votre positionnement."],
        ['icon' => '<polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>',                                                                                   'title' => 'Gain de temps et de confiance', 'desc' => "On s'occupe de tout, vous gagnez en sérénité et en impact."],
      ];
      $delays = ['', ' reveal-delay-1', ' reveal-delay-2'];
      foreach ($why_items as $i => $item) : ?>
      <div class="why-card reveal<?php echo $delays[$i]; ?>">
        <div class="why-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo $item['icon']; ?></svg>
        </div>
        <h3><?php echo esc_html($item['title']); ?></h3>
        <p><?php echo esc_html($item['desc']); ?></p>
      </div>
      <?php endforeach; ?>
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
      $cv_url       = esc_url(get_permalink(get_page_by_path('service-cv-lm'))       ?: home_url('/service-cv-lm'));
      $li_url       = esc_url(get_permalink(get_page_by_path('service-linkedin'))     ?: home_url('/service-linkedin'));
      $coaching_url = esc_url(get_permalink(get_page_by_path('service-coaching'))     ?: home_url('/service-coaching'));
      ?>

      <!-- CV & LM -->
      <div class="svc-card reveal">
        <div class="svc-card-head" style="background: linear-gradient(145deg, rgba(10,22,40,.72) 0%, rgba(30,64,175,.60) 100%), url('<?php echo $svc_img_cv; ?>') center/cover no-repeat;">
          <span class="svc-num">Service N°1</span>
          <div class="svc-head-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
          </div>
          <p class="svc-head-title">Création de CV &amp;<br>Lettre de Motivation</p>
        </div>
        <div class="svc-card-body">
          <p class="svc-card-desc">Des documents percutants, modernes et optimisés ATS pour valoriser votre parcours et décrocher plus d'entretiens.</p>
          <ul class="svc-list">
            <?php foreach (['Design professionnel sur-mesure', 'Optimisation ATS garantie', 'Contenu convaincant et personnalisé', 'Livraison sous 72h, PDF & Word'] as $feat) : ?>
            <li>
              <div class="svc-check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
              <?php echo esc_html($feat); ?>
            </li>
            <?php endforeach; ?>
          </ul>
          <a href="<?php echo $cv_url; ?>" class="svc-card-link">
            En savoir plus
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </a>
        </div>
      </div>

      <!-- LinkedIn -->
      <div class="svc-card reveal reveal-delay-1">
        <div class="svc-card-head" style="background: linear-gradient(145deg, rgba(0,40,85,.72) 0%, rgba(10,102,194,.60) 100%), url('<?php echo $svc_img_li; ?>') center/cover no-repeat;">
          <span class="svc-num">Service N°2</span>
          <div class="svc-head-icon">
            <svg viewBox="0 0 24 24" fill="white"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
          </div>
          <p class="svc-head-title">Optimisation du<br>Profil LinkedIn</p>
        </div>
        <div class="svc-card-body">
          <p class="svc-card-desc">Un profil LinkedIn optimisé pour renforcer votre e-réputation, être visible des recruteurs et attirer les bonnes opportunités.</p>
          <ul class="svc-list">
            <?php foreach (['Photo, bannière & titre percutants', 'Résumé optimisé SEO LinkedIn', 'Mots-clés stratégiques et visibilité accrue', 'Compétences & recommandations ciblées'] as $feat) : ?>
            <li>
              <div class="svc-check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
              <?php echo esc_html($feat); ?>
            </li>
            <?php endforeach; ?>
          </ul>
          <a href="<?php echo $li_url; ?>" class="svc-card-link">
            En savoir plus
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </a>
        </div>
      </div>

      <!-- Coaching -->
      <div class="svc-card reveal reveal-delay-2">
        <div class="svc-card-head" style="background: linear-gradient(145deg, rgba(26,10,42,.72) 0%, rgba(109,40,217,.60) 100%), url('<?php echo $svc_img_coaching; ?>') center/cover no-repeat;">
          <span class="svc-num">Service N°3</span>
          <div class="svc-head-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg>
          </div>
          <p class="svc-head-title">Coaching &amp;<br>Préparation entretien</p>
        </div>
        <div class="svc-card-body">
          <p class="svc-card-desc">Entraînez-vous en conditions réelles avec un coach expert et abordez vos entretiens avec la confiance qui fait la différence.</p>
          <ul class="svc-list">
            <?php foreach (["Simulation d'entretien en conditions réelles", 'Méthode STAR & réponses structurées', 'Feedback détaillé & rapport personnalisé', 'Séance visio ou présentiel, résultats dès J+1'] as $feat) : ?>
            <li>
              <div class="svc-check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
              <?php echo esc_html($feat); ?>
            </li>
            <?php endforeach; ?>
          </ul>
          <a href="<?php echo $coaching_url; ?>" class="svc-card-link">
            En savoir plus
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ───────── HOW IT WORKS ───────── -->
<section class="hiw-section">
  <div class="container">
    <div class="reveal">
      <p class="section-label">Notre méthode</p>
      <h2 class="section-title">Comment ça <span class="underline-blue">marche</span> ?</h2>
      <p class="section-subtitle">Un processus simple et transparent pour transformer votre profil en 4 étapes.</p>
    </div>
    <div class="hiw-steps">
      <div class="hiw-connector"></div>
      <?php
      $delays = ['', ' reveal-delay-1', ' reveal-delay-2', ' reveal-delay-3'];
      foreach ($hiw_steps as $i => $step) :
      ?>
      <div class="hiw-step reveal<?php echo $delays[$i % 4]; ?>">
        <div class="hiw-num"><?php echo ($i + 1); ?></div>
        <h3 class="hiw-step-title"><?php echo esc_html($step['title']); ?></h3>
        <p class="hiw-step-desc"><?php echo esc_html($step['desc']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ───────── LES PLUS ───────── -->
<section class="plus-section">
  <div class="container">
    <div class="plus-inner-card" style="background: linear-gradient(140deg, rgba(10,22,40,.82) 0%, rgba(13,30,68,.78) 60%, rgba(14,32,80,.85) 100%), url('<?php echo $plus_bg; ?>') center/cover no-repeat;">
      <div class="plus-header reveal">
        <h2 class="plus-title">Les <span class="plus-accent">+</span> de ProfilBoost</h2>
        <p class="plus-subtitle">Un accompagnement complet pour maximiser vos chances de décrocher le poste que vous visez.</p>
      </div>
      <div class="plus-cards">
        <?php
        $plus_icons = [
          '<path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>',
          '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
          '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/>',
        ];
        foreach ($plus_items as $i => $item) : ?>
        <div class="plus-card reveal<?php echo $i > 0 ? ' reveal-delay-' . $i : ''; ?>">
          <div class="plus-card-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo $plus_icons[$i % 3]; ?></svg>
          </div>
          <div>
            <h3><?php echo esc_html($item['title']); ?></h3>
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
<section class="cta-banner">
  <div class="container">
    <div class="cta-inner-card">
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
    </div>
  </div>
</section>

<?php get_footer(); ?>
