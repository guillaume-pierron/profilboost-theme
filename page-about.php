<?php get_header(); ?>

<?php
$hero_label    = pb_field('hero_label',    'Notre équipe');
$hero_title    = pb_field('hero_title',    'Des experts passionnés à votre service');
$hero_subtitle = pb_field('hero_subtitle', "ProfilBoost est né d'une conviction simple : chaque candidat mérite d'être vu à sa juste valeur. Depuis 2018, nous aidons les professionnels à se démarquer et à décrocher les postes qu'ils méritent.");

$story_title  = pb_field('story_title', "Nés d'une frustration, animés par une mission");
$story_body   = function_exists('get_field') ? get_field('story_body') : '';
if (!$story_body) $story_body = "<p>Tout a commencé en 2018 lorsque <strong>Sophie Renard</strong>, après 10 ans en tant que DRH dans un grand groupe, a réalisé quelque chose de frappant : des dizaines de candidats hautement qualifiés étaient éliminés dès la première sélection — non par manque de compétences, mais à cause d'un CV mal structuré ou d'un profil LinkedIn invisible.</p><p>Elle a fondé ProfilBoost avec une ambition claire : <strong>mettre l'expertise RH au service des candidats</strong>, pas seulement des entreprises.</p>";
$story_quote  = pb_field('story_quote',  "Trop de talents passent inaperçus. Notre mission, c'est de leur donner la visibilité qu'ils méritent.");
$story_author = pb_field('story_author', '— Sophie Renard, Co-fondatrice & Directrice de ProfilBoost');

$contact_url = esc_url(get_permalink(get_page_by_path('contact')) ?: home_url('/contact'));
$formules_url = esc_url(get_permalink(get_page_by_path('formules')) ?: home_url('/formules'));

/* Stats */
$default_stats = [
    ['num' => '1 200+', 'label' => 'clients accompagnés depuis 2018'],
    ['num' => '96%',    'label' => 'taux de satisfaction client'],
    ['num' => '72h',    'label' => 'délai de livraison moyen'],
    ['num' => '×3',     'label' => "plus de chances de décrocher un entretien"],
];
$stats = [];
if (function_exists('have_rows') && have_rows('stats_blocks')) {
    while (have_rows('stats_blocks')) { the_row(); $stats[] = ['num' => get_sub_field('num'), 'label' => get_sub_field('label')]; }
}
if (empty($stats)) $stats = $default_stats;
$stat_classes = ['sb-navy', 'sb-blue', 'sb-light', 'sb-purple'];

/* Values */
$default_values = [
    ['title' => 'Excellence',        'desc' => "Chaque document que nous produisons est soumis à un contrôle qualité rigoureux. Nous n'envoyons que ce que nous sommes fiers de livrer."],
    ['title' => 'Personnalisation',  'desc' => "Pas de template générique. Chaque profil est unique, chaque solution est construite sur mesure pour refléter votre singularité."],
    ['title' => 'Confiance',         'desc' => "Vos données restent strictement confidentielles. Nous nous engageons sur des résultats concrets et assumons notre responsabilité."],
    ['title' => 'Impact',            'desc' => "Nous mesurons notre succès à travers le vôtre. Des résultats tangibles, mesurables, dès les premières candidatures envoyées."],
];
$values = [];
if (function_exists('have_rows') && have_rows('values')) {
    while (have_rows('values')) { the_row(); $values[] = ['title' => get_sub_field('title'), 'desc' => get_sub_field('desc')]; }
}
if (empty($values)) $values = $default_values;
$val_icons = [
    '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>',
    '<path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/>',
    '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>',
    '<polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>',
];
$val_icon_classes = ['vi-blue', 'vi-purple', 'vi-green', 'vi-amber'];

/* Team */
$default_team = [
    ['name' => 'Sophie Renard',    'role' => 'Co-fondatrice & Directrice',              'bio' => "Ancienne DRH dans un grand groupe industriel, Sophie a 10 ans d'expérience en recrutement et gestion des talents.", 'photo' => pb_img('', 'sophie_renard.jpg'), 'tags' => 'Recrutement,RH,Stratégie', 'class' => 'ta-1'],
    ['name' => 'Marc Lefebvre',    'role' => 'Expert CV & Lettre de Motivation',         'bio' => "Ancien recruteur pour plusieurs cabinets de conseil, Marc maîtrise les codes des ATS et des processus de présélection.", 'photo' => pb_img('', 'marc_lefebvre.jpg'),    'tags' => 'CV,ATS,Copywriting', 'class' => 'ta-2'],
    ['name' => 'Amelia Chen',      'role' => 'Spécialiste LinkedIn & Personal Branding', 'bio' => "Experte en marketing digital et personal branding, Amelia optimise chaque profil pour maximiser la visibilité.", 'photo' => pb_img('', 'amelia_chen.jpg'),     'tags' => 'LinkedIn,SEO,Branding', 'class' => 'ta-3'],
    ['name' => 'Bertrand Moreau',  'role' => 'Coach Carrière Certifié',                  'bio' => "Coach certifié ICF et ancien manager RH, Bertrand prépare les candidats à exceller en entretien.", 'photo' => pb_img('', 'bertrand_moreau.jpg'), 'tags' => 'Coaching,Entretien,ICF', 'class' => 'ta-4'],
];
$team = [];
if (function_exists('have_rows') && have_rows('team_members')) {
    $ta_classes = ['ta-1','ta-2','ta-3','ta-4'];
    $idx = 0;
    while (have_rows('team_members')) {
        the_row();
        $team[] = ['name' => get_sub_field('name'), 'role' => get_sub_field('role'), 'bio' => get_sub_field('bio'), 'photo' => get_sub_field('photo'), 'tags' => get_sub_field('tags'), 'class' => $ta_classes[$idx % 4]];
        $idx++;
    }
}
if (empty($team)) $team = $default_team;

/* Timeline */
$default_timeline = [
    ['year' => '2018', 'title' => 'Fondation de ProfilBoost', 'desc' => "Sophie Renard crée ProfilBoost à Paris avec une équipe de 2 experts RH et les premiers services de rédaction de CV.", 'side' => 'left'],
    ['year' => '2019', 'title' => 'Lancement du service LinkedIn', 'desc' => "Face à la montée en puissance de LinkedIn dans le recrutement, Amelia Chen rejoint l'équipe et lance l'offre d'optimisation de profil.", 'side' => 'right'],
    ['year' => '2021', 'title' => '500 clients accompagnés', 'desc' => "ProfilBoost franchit le cap des 500 clients et étoffe son équipe avec Bertrand Moreau pour lancer le service de coaching entretien.", 'side' => 'left'],
    ['year' => '2024', 'title' => '1 200+ clients & note 5 étoiles', 'desc' => "ProfilBoost atteint 1 200 clients accompagnés avec un taux de satisfaction de 96% et une note moyenne de 5 étoiles.", 'side' => 'right'],
];
$timeline = [];
if (function_exists('have_rows') && have_rows('timeline_items')) {
    $i = 0;
    while (have_rows('timeline_items')) {
        the_row();
        $timeline[] = ['year' => get_sub_field('year'), 'title' => get_sub_field('title'), 'desc' => get_sub_field('desc'), 'side' => ($i % 2 === 0 ? 'left' : 'right')];
        $i++;
    }
}
if (empty($timeline)) $timeline = $default_timeline;
?>

<!-- ───────── HERO ───────── -->
<section class="hero" style="padding: 56px 0 72px;">
  <div class="container">
    <div class="hero-inner-2col">
      <div class="hero-content">
        <p class="hero-label fade-up"><?php echo esc_html($hero_label); ?></p>
        <h1 class="hero-title fade-up-2" style="white-space:normal;font-size:clamp(28px,3.5vw,48px);"><?php echo esc_html($hero_title); ?></h1>
        <p class="hero-subtitle fade-up-3"><?php echo esc_html($hero_subtitle); ?></p>
        <div class="hero-actions fade-up-4">
          <a href="<?php echo $contact_url; ?>" class="btn btn-primary">Nous contacter<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
          <a href="<?php echo $formules_url; ?>" class="btn-outline-blue">Voir nos formules</a>
        </div>
      </div>
      <div class="hero-visual-about" style="display:flex;align-items:center;justify-content:center;">
        <div class="team-grid">
          <?php
          $team_tiles = [
            ['photo' => pb_img('', 'sophie_renard.jpg'),   'initials' => 'SR', 'class' => 't1 has-photo'],
            ['photo' => pb_img('', 'marc_lefebvre.jpg'),   'initials' => 'ML', 'class' => 't2 has-photo'],
            ['photo' => pb_img('', 'amelia_chen.jpg'),     'initials' => 'AC', 'class' => 't3 has-photo'],
            ['photo' => pb_img('', 'bertrand_moreau.jpg'), 'initials' => 'BM', 'class' => 't4 has-photo'],
          ];
          foreach ($team_tiles as $tile) : ?>
          <div class="team-tile <?php echo $tile['class']; ?>">
            <div class="team-tile-inner">
              <img src="<?php echo $tile['photo']; ?>" alt="" class="team-tile-photo" />
              <div class="tile-overlay"></div>
              <span class="tile-initials"><?php echo esc_html($tile['initials']); ?></span>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ───────── NOTRE HISTOIRE ───────── -->
<section class="story-section">
  <div class="container">
    <div class="story-inner">
      <div class="story-content reveal">
        <p class="section-label">Notre histoire</p>
        <h2 class="section-title"><?php echo esc_html($story_title); ?></h2>
        <div class="story-body"><?php echo wp_kses_post($story_body); ?></div>
        <blockquote class="story-quote">
          <?php echo esc_html($story_quote); ?>
          <cite><?php echo esc_html($story_author); ?></cite>
        </blockquote>
        <a href="<?php echo $contact_url; ?>" class="btn btn-primary">Discutons de votre projet<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
      </div>

      <div class="stats-mosaic reveal reveal-delay-1">
        <?php foreach ($stats as $i => $s) : ?>
        <div class="stat-block <?php echo $stat_classes[$i % 4]; ?>">
          <div class="stat-num"><?php echo esc_html($s['num']); ?></div>
          <div class="stat-label"><?php echo esc_html($s['label']); ?></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ───────── NOS VALEURS ───────── -->
<section class="values-section">
  <div class="container">
    <div class="values-header reveal">
      <p class="section-label">Ce qui nous anime</p>
      <h2 class="section-title">Nos <span class="underline-blue">valeurs</span></h2>
      <p style="font-size:15px;color:var(--gray-500);max-width:480px;margin:16px auto 0;line-height:1.65;text-align:center;">
        Quatre convictions fondamentales qui guident chacune de nos actions et définissent notre façon de travailler.
      </p>
    </div>
    <div class="values-grid">
      <?php foreach ($values as $i => $v) : ?>
      <div class="value-card reveal<?php echo $i > 0 ? ' reveal-delay-' . min($i, 3) : ''; ?>">
        <div class="value-icon <?php echo $val_icon_classes[$i % 4]; ?>">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo $val_icons[$i % 4]; ?></svg>
        </div>
        <div class="value-title"><?php echo esc_html($v['title']); ?></div>
        <div class="value-desc"><?php echo esc_html($v['desc']); ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ───────── NOTRE ÉQUIPE ───────── -->
<section class="team-section">
  <div class="container">
    <div class="team-header reveal">
      <p class="section-label">L'équipe</p>
      <h2 class="section-title">Des experts à vos <span class="underline-blue">côtés</span></h2>
      <p style="font-size:15px;color:var(--gray-500);max-width:480px;margin:16px auto 0;line-height:1.65;text-align:center;">
        Une équipe de professionnels du recrutement, du branding et du coaching, tous engagés pour votre réussite.
      </p>
    </div>
    <div class="team-grid-main">
      <?php foreach ($team as $i => $m) :
        $tags = is_array($m['tags']) ? $m['tags'] : array_map('trim', explode(',', $m['tags']));
      ?>
      <div class="team-card reveal<?php echo $i > 0 ? ' reveal-delay-' . min($i, 3) : ''; ?>">
        <div class="team-avatar-wrap <?php echo $m['class']; ?>">
          <?php if ($m['photo']) : ?>
            <img src="<?php echo esc_url($m['photo']); ?>" alt="<?php echo esc_attr($m['name']); ?>" class="team-avatar-photo" />
          <?php else : ?>
            <div class="team-initials-circle"><?php echo esc_html(mb_substr($m['name'], 0, 2)); ?></div>
          <?php endif; ?>
        </div>
        <div class="team-body">
          <div class="team-name"><?php echo esc_html($m['name']); ?></div>
          <div class="team-role"><?php echo esc_html($m['role']); ?></div>
          <div class="team-bio"><?php echo esc_html($m['bio']); ?></div>
          <div class="team-tags">
            <?php foreach ($tags as $tag) : ?>
              <span class="team-tag"><?php echo esc_html(trim($tag)); ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ───────── TIMELINE ───────── -->
<section class="timeline-section">
  <div class="container">
    <div class="timeline-header reveal">
      <p class="section-label">Notre parcours</p>
      <h2 class="section-title">ProfilBoost en quelques <span class="underline-blue">étapes clés</span></h2>
    </div>
    <div class="timeline reveal">
      <?php foreach ($timeline as $i => $tl) :
        $is_left = ($tl['side'] === 'left');
      ?>
      <div class="tl-item">
        <div class="tl-left">
          <?php if ($is_left) : ?>
            <div class="tl-year"><?php echo esc_html($tl['year']); ?></div>
            <div class="tl-title"><?php echo esc_html($tl['title']); ?></div>
            <div class="tl-desc"><?php echo esc_html($tl['desc']); ?></div>
          <?php endif; ?>
        </div>
        <div class="tl-center">
          <div class="tl-dot">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 00-2.91-.09z"/><path d="M12 15l-3-3a22 22 0 012-3.95A12.88 12.88 0 0122 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 01-4 2z"/></svg>
          </div>
        </div>
        <div class="tl-right">
          <?php if (!$is_left) : ?>
            <div class="tl-year"><?php echo esc_html($tl['year']); ?></div>
            <div class="tl-title"><?php echo esc_html($tl['title']); ?></div>
            <div class="tl-desc"><?php echo esc_html($tl['desc']); ?></div>
          <?php endif; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ───────── CTA ───────── -->
<section class="cta-banner" style="padding-top:80px; padding-bottom:80px;">
  <div class="container">
    <div class="cta-inner-card cta-dark reveal">
      <div class="cta-inner">
        <div class="cta-logo-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
        </div>
        <div class="cta-text">
          <h2>Prêt à écrire la suite de votre histoire ?</h2>
          <p>Notre équipe est là pour vous accompagner à chaque étape de votre parcours professionnel.</p>
        </div>
        <a href="<?php echo $contact_url; ?>" class="btn btn-white">Nous contacter<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
