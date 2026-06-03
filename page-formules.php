<?php get_header(); ?>
<div class="pb-grad">
<?php
$hero_title    = pb_field('hero_title',    'Choisissez votre formule de succès');
$hero_subtitle = pb_field('hero_subtitle', "Des prestations sur mesure pour valoriser votre profil, séduire les recruteurs et décrocher le poste que vous méritez.");

$price_cv       = pb_field('price_cv',       '79');
$price_li       = pb_field('price_li',       '69');
$price_coaching = pb_field('price_coaching', '99');

$cv_url       = esc_url(get_permalink(get_page_by_path('creation-cv'))   ?: home_url('/creation-cv'));
$li_url       = esc_url(get_permalink(get_page_by_path('optimisation-linkedin')) ?: home_url('/optimisation-linkedin'));
$coaching_url = esc_url(get_permalink(get_page_by_path('coaching-entretien')) ?: home_url('/coaching-entretien'));
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
    ['name' => 'Thomas L.', 'role' => 'Chef de projet IT',   'initials' => 'TL', 'quote' => "Grâce à ProfilBoost, mon CV a retenu l'attention des recruteurs et j'ai décroché 3 entretiens en une semaine !", 'bg' => 'background: linear-gradient(135deg, #4cbdfa, #058ed9);'],
    ['name' => 'Sophie M.', 'role' => 'Marketing Manager',   'initials' => 'SM', 'quote' => "Un service professionnel, rapide et à l'écoute. Mon profil LinkedIn est maintenant beaucoup plus visible.", 'bg' => 'background: linear-gradient(135deg, #4cbdfa, #058ed9);'],
    ['name' => 'Julien R.', 'role' => 'Ingénieur mécanique', 'initials' => 'JR', 'quote' => "La préparation aux entretiens m'a permis de gagner en confiance et d'obtenir le poste souhaité.", 'bg' => 'background: linear-gradient(135deg, #4cbdfa, #058ed9);'],
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
          <div class="pricing-service-num">CV &amp; Lettre de motivation</div>
          <div class="pricing-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
          </div>
          <div class="pricing-title">Création de CV &amp;<br>Lettre de Motivation</div>
          <div class="pricing-price"><span class="price-from">À partir de</span><span class="price-amount"><?php echo esc_html($price_cv); ?></span><span class="price-currency">€</span></div>
        </div>
        <div class="pricing-body">
          <p class="pricing-desc">Rédigé par un expert RH, optimisé ATS, livré en 72h avec révisions illimitées.</p>
          <div class="pricing-tiers">
            <div class="pricing-tier">
              <div class="pricing-tier-price">79€</div>
              <div class="pricing-tier-info">
                <div class="pricing-tier-name">CV Seul</div>
                <div class="pricing-tier-includes">Design pro · ATS · Révisions illimitées</div>
              </div>
            </div>
            <div class="pricing-tier pricing-tier-highlight">
              <span class="pricing-tier-badge">Recommandé</span>
              <div class="pricing-tier-price">99€</div>
              <div class="pricing-tier-info">
                <div class="pricing-tier-name">CV + Lettre de motivation</div>
                <div class="pricing-tier-includes">CV + LM · ATS · Révisions · PDF & Word</div>
              </div>
            </div>
            <div class="pricing-tier">
              <div class="pricing-tier-price">129€</div>
              <div class="pricing-tier-info">
                <div class="pricing-tier-name">CV Express</div>
                <div class="pricing-tier-includes">CV + LM · Livraison 48h · Prioritaire</div>
              </div>
            </div>
          </div>
          <a href="<?php echo $cv_url; ?>" class="pricing-cta-outline">Découvrir le service <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
          <a href="<?php echo $contact_url; ?>" class="pricing-cta-detail">Demander un devis gratuit</a>
        </div>
      </div>

      <!-- LinkedIn (featured) -->
      <div class="pricing-card featured reveal reveal-delay-1">
        <div class="featured-badge">Le plus populaire</div>
        <div class="pricing-head" style="background: linear-gradient(145deg, rgba(0,40,85,.72) 0%, rgba(10,102,194,.60) 100%), url('<?php echo $svc_img_li; ?>') center/cover no-repeat;">
          <div class="pricing-service-num">Profil LinkedIn</div>
          <div class="pricing-icon"><svg viewBox="0 0 24 24" fill="white"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg></div>
          <div class="pricing-title">Optimisation du<br>Profil LinkedIn</div>
          <div class="pricing-price"><span class="price-from">À partir de</span><span class="price-amount"><?php echo esc_html($price_li); ?></span><span class="price-currency">€</span></div>
        </div>
        <div class="pricing-body">
          <p class="pricing-desc">Audit, optimisation complète et stratégie SEO pour multiplier vos opportunités.</p>
          <div class="pricing-tiers">
            <div class="pricing-tier">
              <div class="pricing-tier-price">69€</div>
              <div class="pricing-tier-info">
                <div class="pricing-tier-name">Standard</div>
                <div class="pricing-tier-includes">Titre · Résumé · Compétences · ATS</div>
              </div>
            </div>
            <div class="pricing-tier pricing-tier-highlight">
              <span class="pricing-tier-badge">Recommandé</span>
              <div class="pricing-tier-price">99€</div>
              <div class="pricing-tier-info">
                <div class="pricing-tier-name">Premium</div>
                <div class="pricing-tier-includes">Standard + Bannière · Stratégie réseau · Suivi</div>
              </div>
            </div>
            <div class="pricing-tier">
              <div class="pricing-tier-price">149€</div>
              <div class="pricing-tier-info">
                <div class="pricing-tier-name">Expert</div>
                <div class="pricing-tier-includes">Premium + Posts rédigés · Suivi 30 jours</div>
              </div>
            </div>
          </div>
          <a href="<?php echo $li_url; ?>" class="pricing-cta-primary">Découvrir le service <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
          <a href="<?php echo $contact_url; ?>" class="pricing-cta-detail">Demander un devis gratuit</a>
        </div>
      </div>

      <!-- Coaching -->
      <div class="pricing-card reveal reveal-delay-2">
        <div class="pricing-head" style="background: linear-gradient(145deg, rgba(26,10,42,.72) 0%, rgba(109,40,217,.60) 100%), url('<?php echo $svc_img_coaching; ?>') center/cover no-repeat;">
          <div class="pricing-service-num">Coaching entretien</div>
          <div class="pricing-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg></div>
          <div class="pricing-title">Coaching &amp;<br>Préparation entretien</div>
          <div class="pricing-price"><span class="price-from">À partir de</span><span class="price-amount"><?php echo esc_html($price_coaching); ?></span><span class="price-currency">€</span></div>
        </div>
        <div class="pricing-body">
          <p class="pricing-desc">Simulation réelle, méthode STAR et débriefing pour décrocher avec confiance.</p>
          <div class="pricing-tiers">
            <div class="pricing-tier">
              <div class="pricing-tier-price">99€</div>
              <div class="pricing-tier-info">
                <div class="pricing-tier-name">Session Découverte</div>
                <div class="pricing-tier-includes">1h · Simulation + débriefing</div>
              </div>
            </div>
            <div class="pricing-tier pricing-tier-highlight">
              <span class="pricing-tier-badge">Recommandé</span>
              <div class="pricing-tier-price">179€</div>
              <div class="pricing-tier-info">
                <div class="pricing-tier-name">Pack Intensif</div>
                <div class="pricing-tier-includes">2h · 2 simulations · Rapport PDF</div>
              </div>
            </div>
            <div class="pricing-tier">
              <div class="pricing-tier-price">249€</div>
              <div class="pricing-tier-info">
                <div class="pricing-tier-name">Pack Complet</div>
                <div class="pricing-tier-includes">3h · 3 sessions · Suivi 30 jours</div>
              </div>
            </div>
          </div>
          <a href="<?php echo $coaching_url; ?>" class="pricing-cta-outline">Découvrir le service <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
          <a href="<?php echo $contact_url; ?>" class="pricing-cta-detail">Demander un devis gratuit</a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ───────── PACK COMBINÉ ───────── -->
<section style="padding: 0 0 80px;">
  <div class="container">
    <div class="reveal" style="background: linear-gradient(160deg, #0E131F 0%, #394E7F 100%); border-radius: 24px; padding: 48px 56px; position:relative; overflow:hidden;">
      <div style="position:absolute; top:-40px; right:-40px; width:200px; height:200px; border-radius:50%; background:rgba(255,255,255,.04);"></div>
      <div style="position:absolute; bottom:-60px; left:-20px; width:160px; height:160px; border-radius:50%; background:rgba(255,255,255,.03);"></div>
      <div style="position:relative; z-index:1; display:flex; align-items:center; justify-content:space-between; gap:40px; flex-wrap:wrap;">
        <div>
          <div style="display:inline-flex; align-items:center; gap:8px; background:rgba(251,191,36,.15); border:1px solid rgba(251,191,36,.3); border-radius:50px; padding:6px 16px; margin-bottom:20px;">
            <span style="color:#fbbf24; font-size:15px;">★</span>
            <span style="font-size:12px; font-weight:700; color:#fbbf24; letter-spacing:.5px; text-transform:uppercase;">Offre exclusive</span>
          </div>
          <h2 style="font-size:clamp(22px,3vw,32px); font-weight:800; color:white; margin-bottom:12px; line-height:1.2;">Pack CV + LinkedIn<br><span style="color:#60a5fa;">— 15% de réduction</span></h2>
          <p style="font-size:15px; color:rgba(255,255,255,.65); max-width:480px; line-height:1.65; margin-bottom:0;">Combinez la création de votre CV et l'optimisation de votre profil LinkedIn pour une présence professionnelle complète et cohérente.</p>
        </div>
        <div style="display:flex; flex-direction:column; align-items:center; gap:12px; flex-shrink:0;">
          <div style="text-align:center;">
            <div style="font-size:13px; color:rgba(255,255,255,.5); text-decoration:line-through; margin-bottom:4px;"><?php echo (int)$price_cv + (int)$price_li; ?>€</div>
            <div style="font-size:48px; font-weight:900; color:white; letter-spacing:-2px; line-height:1;"><?php echo round(((int)$price_cv + (int)$price_li) * 0.85); ?><span style="font-size:24px;">€</span></div>
            <div style="font-size:12px; color:rgba(255,255,255,.5); margin-top:4px;">au lieu de <?php echo (int)$price_cv + (int)$price_li; ?>€</div>
          </div>
          <a href="<?php echo $contact_url; ?>" class="btn btn-white" style="white-space:nowrap;">Profiter du pack <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ───────── QUELLE FORMULE ? ───────── -->
<section class="comparison-section">
  <div class="container">
    <div class="reveal" style="text-align:center;">
      <p class="section-label">Trouver ma formule</p>
      <h2 class="section-title">Quelle formule est faite <span class="underline-blue">pour vous ?</span></h2>
      <p class="section-subtitle" style="margin-top:16px;">Identifiez-vous dans l'un de ces profils pour trouver le service qui correspond à votre situation.</p>
    </div>

    <div class="profiles-grid reveal">

      <div class="profile-card">
        <div class="profile-icon" style="background:#e0f5fe;">
          <svg viewBox="0 0 24 24" fill="none" stroke="#4cbdfa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
        </div>
        <div class="profile-tag" style="color:#058ed9; background:#e0f5fe;">CV &amp; Lettre de motivation</div>
        <h3 class="profile-title">Vous postulez et n'obtenez pas de réponses</h3>
        <ul class="profile-symptoms">
          <li>Votre CV date de plusieurs années</li>
          <li>Vos candidatures restent sans réponse</li>
          <li>Vous ne savez pas comment mettre en valeur votre parcours</li>
        </ul>
        <a href="<?php echo $cv_url; ?>" class="profile-cta">Voir le service CV <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
      </div>

      <div class="profile-card profile-card-featured">
        <div class="profile-icon" style="background:rgba(76,189,250,.15);">
          <svg viewBox="0 0 24 24" fill="none" stroke="#4cbdfa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
        </div>
        <div class="profile-tag" style="color:#058ed9; background:rgba(76,189,250,.12);">Profil LinkedIn</div>
        <h3 class="profile-title">Vous voulez que les recruteurs viennent à vous</h3>
        <ul class="profile-symptoms">
          <li>Votre profil LinkedIn est vide ou peu attractif</li>
          <li>Vous ne recevez aucune sollicitation de recruteurs</li>
          <li>Vous souhaitez construire votre personal branding</li>
        </ul>
        <a href="<?php echo $li_url; ?>" class="profile-cta">Voir le service LinkedIn <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
      </div>

      <div class="profile-card">
        <div class="profile-icon" style="background:#e0f5fe;">
          <svg viewBox="0 0 24 24" fill="none" stroke="#4cbdfa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
        </div>
        <div class="profile-tag" style="color:#058ed9; background:#e0f5fe;">Coaching entretien</div>
        <h3 class="profile-title">Vous avez des entretiens mais ne les convertissez pas</h3>
        <ul class="profile-symptoms">
          <li>Vous bloquez sur certaines questions</li>
          <li>Vous manquez de confiance face aux recruteurs</li>
          <li>Vous avez un entretien important dans les prochains jours</li>
        </ul>
        <a href="<?php echo $coaching_url; ?>" class="profile-cta profile-cta-purple">Voir le service Coaching <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
      </div>

    </div>
  </div>
</section>

<!-- ───────── PROCESS (4 ÉTAPES) ───────── -->
<section class="process-section">
  <div class="container">
    <div class="reveal" style="text-align:center;">
      <p class="section-label">Comment ça marche</p>
      <h2 class="section-title">Un accompagnement en <span class="underline-blue">4 étapes</span></h2>
      <p class="section-subtitle" style="margin-top:12px;">Du premier échange à la livraison de vos documents, tout est pensé pour vous.</p>
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
<section class="cta-banner-fullwidth">
  <div class="cta-inner" style="max-width:1140px; margin:0 auto;">
    <div class="cta-icon">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 00-2.91-.09z"/><path d="M12 15l-3-3a22 22 0 012-3.95A12.88 12.88 0 0122 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 01-4 2z"/></svg>
    </div>
    <div class="cta-text">
      <h2>Prêt à booster votre carrière ?</h2>
      <p>Discutons de votre projet et trouvons ensemble la solution adaptée à vos objectifs.</p>
    </div>
    <a href="<?php echo $contact_url; ?>" class="btn btn-white">Nous contacter <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
  </div>
</section>

</div>
<?php get_footer(); ?>
