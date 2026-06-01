<?php get_header(); ?>

<?php
$hero_title    = pb_field('hero_title',    'Choisissez votre formule de succès');
$hero_subtitle = pb_field('hero_subtitle', "Des prestations sur mesure pour valoriser votre profil, séduire les recruteurs et décrocher le poste que vous méritez.");

$price_cv       = pb_field('price_cv',       '89');
$price_li       = pb_field('price_li',       '69');
$price_coaching = pb_field('price_coaching', '99');

$cv_url       = esc_url(get_permalink(get_page_by_path('service-cv-lm'))   ?: home_url('/service-cv-lm'));
$li_url       = esc_url(get_permalink(get_page_by_path('service-linkedin')) ?: home_url('/service-linkedin'));
$coaching_url = esc_url(get_permalink(get_page_by_path('service-coaching')) ?: home_url('/service-coaching'));
$contact_url  = esc_url(get_permalink(get_page_by_path('contact'))          ?: home_url('/contact'));

$svc_img_cv       = pb_img('service_img_cv',       'Service_n_1.jpg');
$svc_img_li       = pb_img('service_img_li',       'service_n_2.jpg');
$svc_img_coaching = pb_img('service_img_coaching', 'service_n_3.jpg');

/* Helpers SVG */
$check_yes = '<span class="check-yes"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>';
$check_no  = '<span class="check-no"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></span>';

/* FAQ */
$default_faq = [
    ['question' => 'Combien de temps faut-il pour recevoir mon CV ou ma lettre de motivation ?',
     'answer'   => 'Nos délais de livraison standard sont de 72h ouvrées après réception de toutes vos informations. Si vous avez une urgence, nous proposons également une option livraison express sous 24h.'],
    ['question' => 'Les révisions sont-elles vraiment illimitées ?',
     'answer'   => "Oui, nous offrons des révisions illimitées sur l'ensemble de nos services. Notre objectif est que vous soyez 100% satisfait du résultat final."],
    ['question' => "Comment se déroule une session de coaching ?",
     'answer'   => "La session débute par un échange de 15 min pour cibler vos besoins, suivi d'une simulation d'entretien en conditions réelles (45 à 60 min). Nous terminons par un débriefing approfondi avec vos points forts, axes d'amélioration et un plan d'action."],
    ['question' => 'Puis-je commander plusieurs services en même temps ?',
     'answer'   => "Absolument ! Nous proposons des packs combinés à tarif préférentiel. Contactez-nous pour un devis personnalisé — la combinaison CV + LinkedIn bénéficie d'une remise de 15%."],
    ['question' => 'Comment vous transmettre mes informations ?',
     'answer'   => "Après votre commande, vous recevez un questionnaire détaillé à remplir en ligne (10 à 15 min). Vous pouvez également nous transmettre un CV existant ou un profil LinkedIn par email."],
    ['question' => 'Proposez-vous une garantie satisfait ou remboursé ?',
     'answer'   => "Oui. Si après toutes les révisions vous n'êtes pas satisfait du résultat, nous vous remboursons intégralement sous 14 jours."],
];
$faq_items = [];
if (function_exists('have_rows') && have_rows('faq_items')) {
    while (have_rows('faq_items')) { the_row(); $faq_items[] = ['question' => get_sub_field('question'), 'answer' => get_sub_field('answer')]; }
}
if (empty($faq_items)) $faq_items = $default_faq;

/* Testimonials */
$default_testi = [
    ['name' => 'Thomas L.', 'role' => 'Chef de projet IT',   'initials' => 'TL', 'quote' => "Grâce à ProfilBoost, mon CV a retenu l'attention des recruteurs et j'ai décroché 3 entretiens en une semaine !", 'bg' => 'background: linear-gradient(135deg, #60a5fa, #2563eb);'],
    ['name' => 'Sophie M.', 'role' => 'Marketing Manager',   'initials' => 'SM', 'quote' => "Un service professionnel, rapide et à l'écoute. Mon profil LinkedIn est maintenant beaucoup plus visible.", 'bg' => 'background: linear-gradient(135deg, #f9a8d4, #ec4899);'],
    ['name' => 'Julien R.', 'role' => 'Ingénieur mécanique', 'initials' => 'JR', 'quote' => "La préparation aux entretiens m'a permis de gagner en confiance et d'obtenir le poste souhaité.", 'bg' => 'background: linear-gradient(135deg, #6ee7b7, #059669);'],
];
$testimonials = [];
if (function_exists('have_rows') && have_rows('testimonials')) {
    while (have_rows('testimonials')) { the_row(); $testimonials[] = ['name' => get_sub_field('name'), 'role' => get_sub_field('role'), 'initials' => get_sub_field('initials'), 'quote' => get_sub_field('quote'), 'bg' => 'background: linear-gradient(135deg, #60a5fa, #2563eb);']; }
}
if (empty($testimonials)) $testimonials = $default_testi;
?>

<!-- ───────── HERO ───────── -->
<section class="hero hero-inner-page">
  <div class="container">
    <div style="text-align:center; position:relative; z-index:1;">
      <div class="breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>">Accueil</a>
        <span class="breadcrumb-sep">›</span>
        <span class="breadcrumb-current">Formules</span>
      </div>
      <h1 class="hero-title fade-up-2" style="white-space:normal; font-size:clamp(32px,5vw,56px);"><?php echo esc_html($hero_title); ?></h1>
      <p class="hero-subtitle fade-up-3" style="margin:0 auto 40px; max-width:560px;"><?php echo esc_html($hero_subtitle); ?></p>
      <div class="hero-stats fade-up-4">
        <div class="hero-stat"><span class="hero-stat-num">1 200+</span><span class="hero-stat-label">clients accompagnés</span></div>
        <div class="hero-stat"><span class="hero-stat-num">96%</span><span class="hero-stat-label">de satisfaction</span></div>
        <div class="hero-stat"><span class="hero-stat-num">72h</span><span class="hero-stat-label">délai de livraison</span></div>
        <div class="hero-stat"><span class="hero-stat-num">5★</span><span class="hero-stat-label">note moyenne</span></div>
      </div>
    </div>
  </div>
</section>

<!-- ───────── PRICING CARDS ───────── -->
<section class="pricing-section">
  <div class="container">
    <div class="reveal">
      <p class="section-label">Nos prestations</p>
      <h2 class="section-title">Des offres pensées pour <span class="underline-blue">chaque étape</span></h2>
      <p class="section-subtitle" style="margin-top:16px;">Que vous repartiez de zéro ou que vous cherchiez à optimiser votre présence en ligne, nous avons la formule adaptée.</p>
    </div>

    <div class="pricing-grid">

      <!-- CV & LM -->
      <div class="pricing-card reveal">
        <div class="pricing-head" style="background: linear-gradient(145deg, rgba(10,22,40,.72) 0%, rgba(30,64,175,.60) 100%), url('<?php echo $svc_img_cv; ?>') center/cover no-repeat;">
          <div class="pricing-service-num">Service N°1</div>
          <div class="pricing-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
          </div>
          <div class="pricing-title">Création de CV &amp;<br>Lettre de Motivation</div>
          <div class="pricing-price"><span class="price-from">À partir de</span><span class="price-amount"><?php echo esc_html($price_cv); ?></span><span class="price-currency">€</span></div>
        </div>
        <div class="pricing-body">
          <p class="pricing-desc">Un CV percutant et une lettre de motivation sur mesure, rédigés par un expert RH pour passer les filtres ATS et retenir l'attention des recruteurs.</p>
          <ul class="pricing-features">
            <?php foreach (['CV rédigé par un expert RH', 'Design professionnel sur mesure', 'Optimisation ATS garantie', 'Lettre de motivation incluse', 'Révisions illimitées', 'Livraison PDF & Word sous 72h'] as $f) : ?>
            <li class="feat-in"><span class="feat-dot-in"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><?php echo esc_html($f); ?></li>
            <?php endforeach; ?>
            <?php foreach (['Optimisation profil LinkedIn', "Simulation d'entretien"] as $f) : ?>
            <li class="feat-out"><span class="feat-dot-out"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></span><?php echo esc_html($f); ?></li>
            <?php endforeach; ?>
          </ul>
          <a href="<?php echo $cv_url; ?>" class="pricing-cta-outline">Découvrir le service <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
          <a href="<?php echo $contact_url; ?>" class="pricing-cta-detail">Demander un devis gratuit</a>
        </div>
      </div>

      <!-- LinkedIn (featured) -->
      <div class="pricing-card featured reveal reveal-delay-1">
        <div class="featured-badge">Le plus populaire</div>
        <div class="pricing-head" style="background: linear-gradient(145deg, rgba(0,40,85,.72) 0%, rgba(10,102,194,.60) 100%), url('<?php echo $svc_img_li; ?>') center/cover no-repeat;">
          <div class="pricing-service-num">Service N°2</div>
          <div class="pricing-icon"><svg viewBox="0 0 24 24" fill="white"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg></div>
          <div class="pricing-title">Optimisation du<br>Profil LinkedIn</div>
          <div class="pricing-price"><span class="price-from">À partir de</span><span class="price-amount"><?php echo esc_html($price_li); ?></span><span class="price-currency">€</span></div>
        </div>
        <div class="pricing-body">
          <p class="pricing-desc">Un profil LinkedIn 100% optimisé pour attirer les recruteurs, renforcer votre e-réputation et multiplier vos opportunités professionnelles.</p>
          <ul class="pricing-features">
            <?php foreach (['Audit complet de votre profil', 'Titre & résumé optimisés', 'Stratégie de mots-clés SEO', 'Recommandations & compétences', 'Conseils stratégie réseau', 'Modifications appliquées sous 72h'] as $f) : ?>
            <li class="feat-in"><span class="feat-dot-in"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><?php echo esc_html($f); ?></li>
            <?php endforeach; ?>
            <?php foreach (['Création de CV', "Simulation d'entretien"] as $f) : ?>
            <li class="feat-out"><span class="feat-dot-out"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></span><?php echo esc_html($f); ?></li>
            <?php endforeach; ?>
          </ul>
          <a href="<?php echo $li_url; ?>" class="pricing-cta-primary">Découvrir le service <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
          <a href="<?php echo $contact_url; ?>" class="pricing-cta-detail">Demander un devis gratuit</a>
        </div>
      </div>

      <!-- Coaching -->
      <div class="pricing-card reveal reveal-delay-2">
        <div class="pricing-head" style="background: linear-gradient(145deg, rgba(26,10,42,.72) 0%, rgba(109,40,217,.60) 100%), url('<?php echo $svc_img_coaching; ?>') center/cover no-repeat;">
          <div class="pricing-service-num">Service N°3</div>
          <div class="pricing-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg></div>
          <div class="pricing-title">Coaching &amp;<br>Préparation entretien</div>
          <div class="pricing-price"><span class="price-from">À partir de</span><span class="price-amount"><?php echo esc_html($price_coaching); ?></span><span class="price-currency">€</span></div>
        </div>
        <div class="pricing-body">
          <p class="pricing-desc">Des sessions de coaching personnalisées pour maîtriser vos entretiens, gagner en confiance et décrocher le poste que vous visez.</p>
          <ul class="pricing-features">
            <?php foreach (["Simulation d'entretien réel", 'Méthode STAR appliquée', 'Débriefing personnalisé', 'Rapport de coaching PDF', 'Suivi post-session inclus', 'Visioconférence ou présentiel'] as $f) : ?>
            <li class="feat-in"><span class="feat-dot-in"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><?php echo esc_html($f); ?></li>
            <?php endforeach; ?>
            <?php foreach (['Création de CV', 'Optimisation profil LinkedIn'] as $f) : ?>
            <li class="feat-out"><span class="feat-dot-out"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></span><?php echo esc_html($f); ?></li>
            <?php endforeach; ?>
          </ul>
          <a href="<?php echo $coaching_url; ?>" class="pricing-cta-outline">Découvrir le service <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
          <a href="<?php echo $contact_url; ?>" class="pricing-cta-detail">Demander un devis gratuit</a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ───────── TABLEAU COMPARATIF ───────── -->
<section class="comparison-section">
  <div class="container">
    <div class="reveal" style="text-align:center;">
      <p class="section-label">Comparatif</p>
      <h2 class="section-title">Quelle formule est faite <span class="underline-blue">pour vous ?</span></h2>
      <p class="section-subtitle" style="margin-top:16px;">Consultez le tableau comparatif pour choisir le service qui correspond le mieux à votre situation.</p>
    </div>

    <div class="comparison-wrap reveal">
      <table class="comparison-table">
        <thead>
          <tr>
            <th style="width:36%;">Fonctionnalité</th>
            <th class="th-service th-cv">CV &amp; LM</th>
            <th class="th-service th-li">LinkedIn</th>
            <th class="th-service th-coach">Coaching</th>
          </tr>
        </thead>
        <tbody>
          <tr class="cat-row"><td colspan="4">Documents &amp; contenu</td></tr>
          <tr><td>Rédaction de contenu personnalisé</td><td><?php echo $check_yes; ?></td><td><?php echo $check_yes; ?></td><td><?php echo $check_no; ?></td></tr>
          <tr><td>Design professionnel sur mesure</td><td><?php echo $check_yes; ?></td><td><?php echo $check_no; ?></td><td><?php echo $check_no; ?></td></tr>
          <tr><td>Lettre de motivation incluse</td><td><?php echo $check_yes; ?></td><td><?php echo $check_no; ?></td><td><?php echo $check_no; ?></td></tr>

          <tr class="cat-row"><td colspan="4">Optimisation &amp; visibilité</td></tr>
          <tr><td>Optimisation pour les ATS</td><td><?php echo $check_yes; ?></td><td><?php echo $check_yes; ?></td><td><?php echo $check_no; ?></td></tr>
          <tr><td>Optimisation complète du profil LinkedIn</td><td><?php echo $check_no; ?></td><td><?php echo $check_yes; ?></td><td><?php echo $check_no; ?></td></tr>
          <tr><td>Stratégie SEO &amp; mots-clés LinkedIn</td><td><?php echo $check_no; ?></td><td><?php echo $check_yes; ?></td><td><?php echo $check_no; ?></td></tr>

          <tr class="cat-row"><td colspan="4">Coaching &amp; entretiens</td></tr>
          <tr><td>Simulation d'entretien</td><td><?php echo $check_no; ?></td><td><?php echo $check_no; ?></td><td><?php echo $check_yes; ?></td></tr>
          <tr><td>Rapport de coaching PDF</td><td><?php echo $check_no; ?></td><td><?php echo $check_no; ?></td><td><?php echo $check_yes; ?></td></tr>
          <tr><td>Suivi personnalisé post-session</td><td><?php echo $check_no; ?></td><td><?php echo $check_no; ?></td><td><?php echo $check_yes; ?></td></tr>

          <tr class="cat-row"><td colspan="4">Garanties</td></tr>
          <tr><td>Révisions illimitées</td><td><?php echo $check_yes; ?></td><td><?php echo $check_yes; ?></td><td><?php echo $check_yes; ?></td></tr>
          <tr><td>Livraison sous 72h</td><td><?php echo $check_yes; ?></td><td><?php echo $check_yes; ?></td><td><?php echo $check_no; ?></td></tr>
          <tr><td>Satisfaction garantie</td><td><?php echo $check_yes; ?></td><td><?php echo $check_yes; ?></td><td><?php echo $check_yes; ?></td></tr>
        </tbody>
        <tfoot>
          <tr>
            <td>Prêt à démarrer ?</td>
            <td><a href="<?php echo $cv_url; ?>" class="pricing-cta-outline" style="max-width:160px;margin:0 auto;font-size:13px;padding:10px;">Voir le service</a></td>
            <td><a href="<?php echo $li_url; ?>" class="pricing-cta-primary" style="max-width:160px;margin:0 auto;font-size:13px;padding:10px;">Voir le service</a></td>
            <td><a href="<?php echo $coaching_url; ?>" class="pricing-cta-outline" style="max-width:160px;margin:0 auto;font-size:13px;padding:10px;">Voir le service</a></td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</section>

<!-- ───────── PROCESS (4 ÉTAPES) ───────── -->
<section class="process-section">
  <div class="container">
    <div class="reveal" style="text-align:center;">
      <p class="section-label">Comment ça marche</p>
      <h2 class="section-title">Un accompagnement en <span class="underline-blue">4 étapes</span></h2>
      <p class="section-subtitle" style="margin-top:12px;">Simple, rapide et efficace — du premier contact à la livraison finale.</p>
    </div>

    <div class="process-steps">
      <div class="process-step reveal">
        <div class="process-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
        </div>
        <div class="process-step-header">
          <div class="process-num">1</div>
          <h3 class="process-step-title">Analyse de vos besoins</h3>
        </div>
        <p class="process-step-desc">Nous échangeons sur votre parcours, vos objectifs et vos attentes.</p>
      </div>

      <div class="process-step reveal reveal-delay-1">
        <div class="process-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
        </div>
        <div class="process-step-header">
          <div class="process-num">2</div>
          <h3 class="process-step-title">Rédaction &amp; conception</h3>
        </div>
        <p class="process-step-desc">Nos experts créent des documents sur mesure et optimisés pour votre profil.</p>
      </div>

      <div class="process-step reveal reveal-delay-2">
        <div class="process-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="1 4 1 10 7 10"/><polyline points="23 20 23 14 17 14"/><path d="M20.49 9A9 9 0 005.64 5.64L1 10M23 14l-4.64 4.36A9 9 0 013.51 15"/></svg>
        </div>
        <div class="process-step-header">
          <div class="process-num">3</div>
          <h3 class="process-step-title">Révisions incluses</h3>
        </div>
        <p class="process-step-desc">Vous bénéficiez de révisions illimitées jusqu'à votre entière satisfaction.</p>
      </div>

      <div class="process-step reveal reveal-delay-3">
        <div class="process-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
        </div>
        <div class="process-step-header">
          <div class="process-num">4</div>
          <h3 class="process-step-title">Livraison rapide</h3>
        </div>
        <p class="process-step-desc">Vous recevez vos documents prêts à l'emploi sous 72h en moyenne.</p>
      </div>
    </div>
  </div>
</section>

<!-- ───────── TÉMOIGNAGES ───────── -->
<section class="testimonials-section">
  <div class="container">
    <div class="reveal" style="text-align:center;">
      <p class="section-label">Avis clients</p>
      <h2 class="section-title">Ils nous font <span class="underline-blue">confiance</span></h2>
    </div>
    <div class="testimonials-grid">
      <?php foreach ($testimonials as $i => $t) : ?>
      <div class="testimonial-card reveal<?php echo $i > 0 ? ' reveal-delay-' . min($i, 3) : ''; ?>">
        <div class="testimonial-stars">★★★★★</div>
        <p class="testimonial-text">"<?php echo esc_html($t['quote']); ?>"</p>
        <div class="testimonial-author">
          <div class="testimonial-avatar" style="<?php echo $t['bg']; ?>"><?php echo esc_html($t['initials']); ?></div>
          <div>
            <p class="testimonial-name"><?php echo esc_html($t['name']); ?></p>
            <p class="testimonial-role"><?php echo esc_html($t['role']); ?></p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ───────── FAQ ───────── -->
<section class="faq-section">
  <div class="container">
    <div class="reveal" style="text-align:center;">
      <p class="section-label">FAQ</p>
      <h2 class="section-title">Questions <span class="underline-blue">fréquentes</span></h2>
      <p class="section-subtitle" style="margin-top:16px;">Vous avez une question ? Vous trouverez probablement la réponse ici.</p>
    </div>
    <div class="faq-list reveal">
      <?php foreach ($faq_items as $faq) : ?>
      <div class="faq-item">
        <div class="faq-question">
          <?php echo esc_html($faq['question']); ?>
          <span class="faq-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></span>
        </div>
        <div class="faq-answer">
          <p><?php echo wp_kses_post($faq['answer']); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ───────── CTA ───────── -->
<section class="cta-banner" style="padding-bottom:80px;">
  <div class="container">
    <div class="cta-inner-card cta-dark reveal">
      <div class="cta-inner">
        <div class="cta-logo-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 00-2.91-.09z"/><path d="M12 15l-3-3a22 22 0 012-3.95A12.88 12.88 0 0122 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 01-4 2z"/></svg>
        </div>
        <div class="cta-text">
          <h2>Prêt à booster votre carrière ?</h2>
          <p>Discutons de votre projet et trouvons ensemble la solution adaptée à vos objectifs.</p>
        </div>
        <a href="<?php echo $contact_url; ?>" class="btn btn-white">Nous contacter <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
