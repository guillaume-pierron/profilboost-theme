<?php get_header(); ?>
<div class="pb-grad">
<?php
$tpl         = get_template_directory_uri();
$contact_url = esc_url(home_url('/contact'));
$cv1 = pb_img('hero_cv_1', 'cv_1.png');
$cv2 = pb_img('hero_cv_2', 'CV_2.png');
$cv3 = pb_img('hero_cv_3', 'CV_3.png');
$price = pb_field('service_price', '79');
?>

<!-- ───────── HERO ───────── -->
<section class="hero" style="padding: 140px 0 80px;">
  <div class="container">
    <div class="hero-inner">

      <div class="hero-content">
        <p class="hero-label fade-up">Notre service le plus demandé</p>
        <h1 class="hero-title fade-up-2">Création de CV &amp;<br>Lettre de Motivation</h1>
        <p class="hero-subtitle fade-up-3">
          Des documents percutants, modernes et optimisés ATS pour valoriser votre parcours et décrocher plus d'entretiens.
        </p>

        <div class="svc-hero-badges fade-up-3">
          <span class="svc-hero-badge">
            <span class="svc-hero-badge-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
            </span>
            Design professionnel et sur-mesure
          </span>
          <span class="svc-hero-badge">
            <span class="svc-hero-badge-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </span>
            Optimisation ATS garantie
          </span>
          <span class="svc-hero-badge">
            <span class="svc-hero-badge-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </span>
            Contenu convaincant et personnalisé
          </span>
        </div>

        <div class="hero-actions fade-up-4">
          <a href="<?php echo $contact_url; ?>" class="btn btn-primary">
            Commander mon CV
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </a>
          <span class="hero-price-hint">À partir de <?php echo esc_html($price); ?>€</span>
        </div>

        <div class="hero-social-proof fade-up-4">
          <div class="avatars">
            <div class="avatar"><div class="avatar-initials" style="background:linear-gradient(135deg,#60a5fa,#2563eb);">TL</div></div>
            <div class="avatar"><div class="avatar-initials" style="background:linear-gradient(135deg,#f9a8d4,#ec4899);">SM</div></div>
            <div class="avatar"><div class="avatar-initials" style="background:linear-gradient(135deg,#6ee7b7,#059669);">JR</div></div>
            <div class="avatar"><div class="avatar-initials" style="background:linear-gradient(135deg,#fcd34d,#f59e0b);">AL</div></div>
          </div>
          <p class="proof-text"><strong>+500 clients</strong> satisfaits</p>
        </div>
      </div>

      <div class="hero-visual">
        <div class="cv-mockup-wrap">
          <div class="cv-mockup-glow"></div>
          <img src="<?php echo $cv2; ?>" alt="Exemple de CV ProfilBoost" class="cv-mockup-doc" />

          <div class="cv-badge-wrapper cv-badge-ats-wrap">
            <div class="cv-mockup-badge">
              <span class="cv-badge-dot cv-badge-dot--blue"></span>
              ATS optimisé
            </div>
          </div>

          <div class="cv-badge-wrapper cv-badge-design-wrap">
            <div class="cv-mockup-badge">
              <span class="cv-badge-dot cv-badge-dot--green"></span>
              Design sur-mesure
            </div>
          </div>

          <div class="cv-badge-wrapper cv-badge-livraison-wrap">
            <div class="cv-mockup-badge">
              <span class="cv-badge-dot cv-badge-dot--amber"></span>
              Livraison en 72h
            </div>
          </div>

          <div class="cv-badge-wrapper cv-badge-rating-wrap">
            <div class="cv-mockup-badge">
              <span class="cv-badge-star">★★★★★</span>
              4,9/5
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ───────── FEATURES (4 cartes) ───────── -->
<section class="service-features-section">
  <div class="container">
    <div class="reveal" style="text-align:center;">
      <h2 class="section-title">Un service complet pour des <span class="underline-blue">documents efficaces</span></h2>
      <p class="section-subtitle" style="margin-top:16px;">Nous créons des CV et lettres de motivation qui vous démarquent et captent l'attention des recruteurs.</p>
    </div>
    <div class="service-features-grid">

      <div class="service-feature-card reveal">
        <div class="service-feature-card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/></svg>
        </div>
        <h3>Rédacteurs RH certifiés</h3>
        <p>Chaque CV est rédigé par un expert RH maîtrisant les codes de votre secteur.</p>
      </div>

      <div class="service-feature-card reveal reveal-delay-1">
        <div class="service-feature-card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="1 4 1 10 7 10"/><polyline points="23 20 23 14 17 14"/><path d="M20.49 9A9 9 0 005.64 5.64L1 10M23 14l-4.64 4.36A9 9 0 013.51 15"/></svg>
        </div>
        <h3>Révisions illimitées</h3>
        <p>On affine ensemble jusqu'à ce que le résultat vous convienne parfaitement.</p>
      </div>

      <div class="service-feature-card reveal reveal-delay-2">
        <div class="service-feature-card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        </div>
        <h3>Adapté à votre secteur</h3>
        <p>Vocabulaire, mise en page et axes valorisés selon votre domaine d'activité.</p>
      </div>

      <div class="service-feature-card reveal reveal-delay-3">
        <div class="service-feature-card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
        </div>
        <h3>Satisfait ou remboursé</h3>
        <p>Votre satisfaction est notre priorité. Si vous n'êtes pas satisfait, on vous rembourse.</p>
      </div>

    </div>
  </div>
</section>

<!-- ───────── STATS / POURQUOI ───────── -->
<section class="service-why-section">
  <div class="container">
    <div class="reveal" style="text-align:center;">
      <h2 class="section-title">Ce qui rend nos CV <span class="underline-blue">uniques</span></h2>
    </div>
    <div class="stats-grid">
      <?php
      $stats = [
        ['icon' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>',
         'value' => '100%', 'label' => 'Optimisation ATS garantie'],
        ['icon' => '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>',
         'value' => '4,9/5', 'label' => 'Note moyenne sur 200+ avis'],
        ['icon' => '<path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>',
         'value' => '+2 000', 'label' => 'CV créés depuis 2020'],
        ['icon' => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
         'value' => '72h', 'label' => 'Livraison garantie'],
      ];
      foreach ($stats as $i => $s) : ?>
      <div class="stat-card reveal<?php echo $i > 0 ? ' reveal-delay-' . min($i, 3) : ''; ?>">
        <div class="stat-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo $s['icon']; ?></svg>
        </div>
        <div class="stat-text">
          <p class="stat-value"><?php echo esc_html($s['value']); ?></p>
          <p class="stat-label"><?php echo esc_html($s['label']); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ───────── DELIVERABLES ───────── -->
<section class="deliverables-section">
  <div class="container">
    <div class="deliverables-inner">

      <div class="deliverables-visual reveal">
        <div class="blob-deco blob-1"></div>
        <div class="blob-deco blob-2"></div>
        <div class="cv-stack">
          <img src="<?php echo $cv1; ?>" alt="Exemple CV sombre" class="cv-stack-img" />
          <img src="<?php echo $cv2; ?>" alt="Exemple CV clair"  class="cv-stack-img" />
        </div>
      </div>

      <div class="deliverables-content reveal reveal-delay-1">
        <p class="deliverables-label">Ce que vous recevez</p>
        <h2 class="deliverables-title">Un CV et une lettre qui<br>ouvrent des portes</h2>
        <ul class="deliverables-list">
          <?php
          $items = ['Un CV clair, structuré et orienté résultats', 'Une lettre de motivation persuasive et ciblée', 'Mise en avant de vos compétences clés', 'Adaptation à votre secteur et au poste visé', 'Fichiers prêts à l\'emploi (PDF & Word)', 'Relectures et modifications incluses'];
          foreach ($items as $item) : ?>
          <li>
            <div class="check-circle"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
            <?php echo esc_html($item); ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <div class="formats-box">
          <p class="formats-box-title">Formats inclus</p>
          <div class="formats-list">
            <span class="format-item pdf">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
              PDF
            </span>
            <span class="format-item word">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
              Word
            </span>
            <span class="format-item gdocs">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
              Google Docs
            </span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ───────── PROCESS (4 étapes) ───────── -->
<section class="process-section">
  <div class="container">
    <div class="reveal" style="text-align:center;">
      <h2 class="section-title">Notre processus en <span class="underline-blue">4 étapes</span></h2>
      <p class="section-subtitle" style="margin-top:12px;">De l'échange initial à la livraison de vos fichiers, tout est pensé pour vous.</p>
    </div>
    <div class="process-steps">
      <?php
      $steps = [
        ['icon' => '<path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>',
         'title' => 'Échange &amp; brief', 'desc' => 'Nous échangeons sur votre parcours, vos objectifs et le poste visé.'],
        ['icon' => '<path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>',
         'title' => 'Rédaction &amp; conception', 'desc' => 'Nos experts rédigent et conçoivent vos documents personnalisés.'],
        ['icon' => '<polyline points="1 4 1 10 7 10"/><polyline points="23 20 23 14 17 14"/><path d="M20.49 9A9 9 0 005.64 5.64L1 10M23 14l-4.64 4.36A9 9 0 013.51 15"/>',
         'title' => 'Révisions &amp; ajustements', 'desc' => 'Vous recevez vos documents et nous les ajustons selon vos retours.'],
        ['icon' => '<line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/>',
         'title' => 'Livraison finale', 'desc' => 'Réception de vos fichiers prêts à l\'emploi (PDF & Word).'],
      ];
      $delays = ['', ' reveal-delay-1', ' reveal-delay-2', ' reveal-delay-3'];
      foreach ($steps as $i => $s) : ?>
      <div class="process-step reveal<?php echo $delays[$i]; ?>">
        <div class="process-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><?php echo $s['icon']; ?></svg>
        </div>
        <div class="process-step-header">
          <div class="process-num"><?php echo $i + 1; ?></div>
          <h3 class="process-step-title"><?php echo $s['title']; ?></h3>
        </div>
        <p class="process-step-desc"><?php echo esc_html($s['desc']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ───────── TÉMOIGNAGE ───────── -->
<section style="padding: 80px 0; background: #ffffff;">
  <div class="container">
    <div class="reveal" style="text-align:center; margin-bottom:48px;">
      <p class="section-label">Témoignage client</p>
      <h2 class="section-title">Ce qu'ils disent <span class="underline-blue">après leur CV</span></h2>
    </div>
    <div class="reveal" style="max-width:720px; margin:0 auto; background:white; border-radius:20px; padding:40px 48px; box-shadow:0 4px 32px rgba(37,99,235,.08); border:1.5px solid rgba(37,99,235,.12);">
      <div style="color:#f59e0b; font-size:20px; letter-spacing:2px; margin-bottom:20px;">★★★★★</div>
      <p style="font-size:18px; font-style:italic; color:#1e293b; line-height:1.7; margin-bottom:28px;">"Mon CV a été entièrement repensé en 48h. Après des mois sans réponse, j'ai décroché <strong>3 entretiens en une semaine</strong>. ProfilBoost a transformé ma recherche d'emploi."</p>
      <div style="display:flex; align-items:center; gap:14px;">
        <div style="width:44px; height:44px; border-radius:50%; background:linear-gradient(135deg,#4cbdfa,#058ed9); display:flex; align-items:center; justify-content:center; font-size:14px; font-weight:700; color:white; flex-shrink:0;">MC</div>
        <div>
          <p style="font-size:15px; font-weight:700; color:#0f172a; margin:0;">Marie-Claire Dupont</p>
          <p style="font-size:13px; color:#64748b; margin:0;">Responsable Marketing · Paris</p>
        </div>
      </div>
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
      <h2>Prêt à booster votre candidature ?</h2>
      <p>Confiez-nous la création de vos documents et augmentez vos chances de décrocher le poste que vous visez.</p>
    </div>
    <div style="display:flex; flex-direction:column; align-items:flex-start; gap:10px; flex-shrink:0;">
      <a href="<?php echo $contact_url; ?>" class="btn btn-white">
        Commander mon CV
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
      <a href="<?php echo esc_url(home_url('/formules')); ?>" style="font-size:13px; color:rgba(255,255,255,.65); text-decoration:none; text-align:center; width:100%;">Voir toutes les formules →</a>
    </div>
  </div>
</section>

</div>
<?php get_footer(); ?>
