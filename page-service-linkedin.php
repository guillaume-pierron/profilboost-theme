<?php get_header(); ?>
<?php $contact_url = esc_url(home_url('/contact')); ?>

<!-- ───────── HERO ───────── -->
<section class="hero" style="padding: 52px 0 80px;">
  <div class="container">
    <div class="hero-inner">
      <div class="hero-content">
        <div class="breadcrumb">
          <a href="<?php echo esc_url(home_url('/')); ?>">Accueil</a>
          <span class="breadcrumb-sep">›</span>
          <a href="<?php echo esc_url(home_url('/formules')); ?>">Formules</a>
          <span class="breadcrumb-sep">›</span>
          <span class="breadcrumb-current">LinkedIn</span>
        </div>
        <p class="hero-label fade-up">Service N°2</p>
        <h1 class="hero-title fade-up-2">Optimisation du<br>Profil <span style="color:#38bdf8;">LinkedIn</span></h1>
        <p class="hero-subtitle fade-up-3">Un profil LinkedIn optimisé pour renforcer votre e-réputation, être visible des recruteurs et attirer les bonnes opportunités.</p>

        <div class="svc-hero-badges fade-up-3">
          <span class="svc-hero-badge">
            <span class="svc-hero-badge-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></span>
            Visibilité accrue
          </span>
          <span class="svc-hero-badge">
            <span class="svc-hero-badge-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="22" y1="12" x2="18" y2="12"/><line x1="6" y1="12" x2="2" y2="12"/><line x1="12" y1="6" x2="12" y2="2"/><line x1="12" y1="22" x2="12" y2="18"/></svg></span>
            Positionnement stratégique
          </span>
          <span class="svc-hero-badge">
            <span class="svc-hero-badge-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg></span>
            SEO LinkedIn
          </span>
          <span class="svc-hero-badge">
            <span class="svc-hero-badge-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg></span>
            Résultats mesurables
          </span>
        </div>

        <div class="hero-actions fade-up-4">
          <a href="<?php echo $contact_url; ?>" class="btn btn-primary">
            Optimiser mon profil LinkedIn
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </a>
        </div>
        <div class="hero-social-proof fade-up-4">
          <div class="avatars">
            <div class="avatar"><div class="avatar-initials" style="background:linear-gradient(135deg,#60a5fa,#2563eb);">TL</div></div>
            <div class="avatar"><div class="avatar-initials" style="background:linear-gradient(135deg,#f9a8d4,#ec4899);">SM</div></div>
            <div class="avatar"><div class="avatar-initials" style="background:linear-gradient(135deg,#6ee7b7,#059669);">JR</div></div>
            <div class="avatar"><div class="avatar-initials" style="background:linear-gradient(135deg,#fcd34d,#f59e0b);">AL</div></div>
          </div>
          <p class="proof-text"><strong>+500 profils optimisés</strong> · 4,9/5 basé sur 200+ avis</p>
        </div>
      </div>

      <!-- Hero Visual — maquette LinkedIn -->
      <div class="hero-visual">
        <div class="deco-shape deco-triangle-1"></div>
        <div class="deco-shape deco-triangle-2"></div>
        <div class="deco-shape deco-circle-1"></div>
        <div class="deco-shape deco-circle-2"></div>
        <div class="deco-dots-grid"><?php for($i=0;$i<20;$i++) echo '<div class="deco-dot"></div>'; ?></div>

        <!-- Badge LinkedIn flottant -->
        <div class="li-in-badge">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
        </div>

        <div class="li-device-wrap">
          <!-- Browser -->
          <div class="li-browser">
            <div class="li-browser-bar">
              <div class="li-browser-dots"><span></span><span></span><span></span></div>
              <div class="li-browser-address">linkedin.com/in/thomas-lefevre</div>
            </div>
            <div class="li-screen">
              <div class="li-screen-banner"></div>
              <div class="li-screen-head">
                <div class="li-screen-avatar-row">
                  <div class="li-screen-avatar">TL</div>
                  <div class="li-screen-btns">
                    <button class="li-btn-blue">Mes abonnés</button>
                    <button class="li-btn-outline">Ajouter une section</button>
                    <button class="li-btn-outline">Plus…</button>
                  </div>
                </div>
                <div class="li-screen-name">Thomas Lefèvre</div>
                <div class="li-screen-headline">Responsable Marketing Digital | Stratégie de marque | Growth</div>
                <div class="li-screen-location">Paris, France · 500+ relations</div>
              </div>
              <div class="li-screen-about">
                <div class="li-screen-about-title">À propos</div>
                <div class="li-screen-about-text">J'aide les entreprises à développer leur visibilité en ligne et à générer de la croissance via des stratégies marketing innovantes et orientées résultats.</div>
              </div>
            </div>
          </div>

          <!-- Phone -->
          <div class="li-phone">
            <div class="li-phone-notch"></div>
            <div class="li-phone-screen">
              <div class="li-phone-banner"></div>
              <div class="li-phone-body">
                <div class="li-phone-avatar">TL</div>
                <div class="li-phone-name">Thomas Lefèvre</div>
                <div class="li-phone-title-sm">Responsable Marketing Digital</div>
                <div class="li-phone-loc">Paris, France · 500+</div>
                <div class="li-phone-msg"><span>Message</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ───────── FEATURES (5 cartes) ───────── -->
<section class="service-features-section">
  <div class="container">
    <div class="reveal" style="text-align:center;">
      <h2 class="section-title">Un profil LinkedIn qui <span class="underline-blue">travaille pour vous</span></h2>
      <p class="section-subtitle" style="margin-top:16px;">Nous optimisons chaque élément clé de votre profil pour maximiser votre impact et attirer l'attention des recruteurs.</p>
    </div>
    <div class="service-features-grid-5">
      <?php
      $features = [
        ['icon' => '<rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/>', 'title' => 'Photo &amp; bannière<br>professionnelles', 'desc' => 'Une image forte et cohérente qui inspire confiance dès la première impression.'],
        ['icon' => '<path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>', 'title' => 'Titre &amp; accroche<br>percutants', 'desc' => "Un positionnement clair et attractif qui capte l'attention et vous différencie."],
        ['icon' => '<circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>', 'title' => 'Résumé optimisé<br>SEO LinkedIn', 'desc' => 'Un contenu stratégique intégrant les bons mots-clés pour ressortir dans les recherches.'],
        ['icon' => '<polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>', 'title' => 'Expériences &amp; réalisations<br>valorisées', 'desc' => 'Mise en avant de vos succès avec des compétences clés et résultats concrets et mesurables.'],
        ['icon' => '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/>', 'title' => 'Compétences &amp;<br>recommandations', 'desc' => 'Sélection et mise en avant des compétences clés et obtention de recommandations ciblées.'],
      ];
      $delays = ['', ' reveal-delay-1', ' reveal-delay-2', ' reveal-delay-3', ' reveal-delay-4'];
      foreach ($features as $i => $f) : ?>
      <div class="service-feature-card reveal<?php echo $delays[$i]; ?>">
        <div class="service-feature-card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo $f['icon']; ?></svg>
        </div>
        <h3><?php echo $f['title']; ?></h3>
        <p><?php echo esc_html($f['desc']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ───────── DELIVERABLES ───────── -->
<section class="deliverables-section">
  <div class="container">
    <div class="deliverables-inner">

      <!-- Content (gauche) -->
      <div class="deliverables-content reveal">
        <p class="deliverables-label">Ce que vous recevez</p>
        <h2 class="deliverables-title">Un profil optimisé<br>pour plus de visibilité<br>et d'opportunités</h2>
        <ul class="deliverables-list">
          <?php foreach (['Audit complet de votre profil actuel', 'Optimisation de chaque section clé', 'Stratégie de mots-clés ciblés', "Contenu rédigé ou réécrit pour plus d'impact", 'Conseils personnalisés pour développer votre réseau', 'Guide d\'utilisation pour maintenir un profil performant'] as $item) : ?>
          <li>
            <div class="check-circle"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
            <?php echo esc_html($item); ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <div class="formats-box">
          <p class="formats-box-title">Formats inclus</p>
          <div class="formats-list">
            <span class="format-item pdf"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>PDF</span>
            <span class="format-item guide"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z"/><path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z"/></svg>Guide d'utilisation</span>
          </div>
        </div>
      </div>

      <!-- Visual (droite) — profil card -->
      <div class="deliverables-visual reveal reveal-delay-1">
        <div class="blob-deco blob-1" style="right:-20px;left:auto;"></div>
        <div class="blob-deco blob-2" style="left:30px;right:auto;"></div>
        <div class="li-profile-card-wrap">
          <div class="li-card-main">
            <div class="li-card-banner"></div>
            <div class="li-card-body">
              <div class="li-card-avatar-row"><div class="li-card-avatar">TL</div></div>
              <div class="li-card-name">Thomas Lefèvre</div>
              <div class="li-card-headline">Responsable Marketing Digital | Stratégie de marque | Growth</div>
              <div class="li-card-location">Paris, France · 500+ relations</div>
              <div class="li-card-about-text">J'aide les entreprises à développer leur visibilité en ligne et à générer de la croissance via des stratégies marketing innovantes.</div>
              <div class="li-card-actions">
                <button class="li-card-btn-msg">Message</button>
                <button class="li-card-btn-view">Voir le profil</button>
              </div>
            </div>
          </div>
          <div class="li-skills-panel">
            <p class="li-panel-title">Compétences clés</p>
            <span class="li-skill-tag"><span class="li-skill-dot"></span>Marketing Digital</span>
            <span class="li-skill-tag"><span class="li-skill-dot"></span>Stratégie de contenu</span>
            <span class="li-skill-tag"><span class="li-skill-dot"></span>SEO</span>
            <span class="li-skill-tag"><span class="li-skill-dot"></span>Growth Hacking</span>
            <span class="li-skill-tag"><span class="li-skill-dot"></span>Analytics</span>
          </div>
          <div class="li-strengths-panel">
            <p class="li-panel-title">Points forts</p>
            <div class="li-strength-item">
              <div class="li-strength-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg></div>
              15 recommandations
            </div>
            <div class="li-strength-item">
              <div class="li-strength-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71"/></svg></div>
              500+ relations
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ───────── PROCESS ───────── -->
<section class="process-section">
  <div class="container">
    <div class="reveal" style="text-align:center;">
      <h2 class="section-title">Notre processus en <span class="underline-blue">4 étapes</span></h2>
      <p class="section-subtitle" style="margin-top:12px;">Simple, rapide et efficace.</p>
    </div>
    <div class="process-steps">
      <?php
      $steps = [
        ['icon' => '<circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>',            'title' => 'Audit &amp; analyse',        'desc' => 'Nous analysons votre profil actuel et votre positionnement sur LinkedIn.'],
        ['icon' => '<path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>', 'title' => 'Optimisation &amp; rédaction', 'desc' => 'Nous optimisons chaque section et créons un contenu impactant et stratégique.'],
        ['icon' => '<polyline points="20 6 9 17 4 12"/>',                                                        'title' => 'Relecture &amp; validation',  'desc' => 'Vous validez les modifications et demandez les ajustements souhaités.'],
        ['icon' => '<line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/>',      'title' => 'Mise en ligne &amp; conseils','desc' => 'Nous vous accompagnons pour maximiser votre visibilité et développer votre réseau.'],
      ];
      $delays = ['', ' reveal-delay-1', ' reveal-delay-2', ' reveal-delay-3'];
      foreach ($steps as $i => $s) : ?>
      <div class="process-step reveal<?php echo $delays[$i]; ?>">
        <div class="process-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><?php echo $s['icon']; ?></svg></div>
        <div class="process-step-header">
          <div class="process-num"><?php echo $i+1; ?></div>
          <h3 class="process-step-title"><?php echo $s['title']; ?></h3>
        </div>
        <p class="process-step-desc"><?php echo esc_html($s['desc']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ───────── STATS ───────── -->
<section class="service-why-section">
  <div class="container">
    <div class="reveal" style="text-align:center;"><h2 class="section-title">Pourquoi choisir <span class="underline-blue">ProfilBoost</span> ?</h2></div>
    <div class="stats-grid">
      <?php
      $stats = [
        ['icon' => '<path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452z"/>', 'value' => "Spécialistes\nLinkedIn", 'label' => 'Experts en personal branding et stratégie de visibilité'],
        ['icon' => '<polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/>',       'value' => "Résultats\nprouvés",     'label' => "Des profils optimisés qui génèrent plus de vues et d'opportunités"],
        ['icon' => '<path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/>',         'value' => "Approche\npersonnalisée",'label' => 'Un accompagnement sur-mesure adapté à vos objectifs'],
        ['icon' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>',                                    'value' => "Confidentialité\ngarantie",  'label' => 'Vos données sont 100% sécurisées et confidentielles'],
      ];
      foreach ($stats as $i => $s) : ?>
      <div class="stat-card reveal<?php echo $i > 0 ? ' reveal-delay-' . min($i,3) : ''; ?>">
        <div class="stat-icon"><svg viewBox="0 0 24 24" fill="currentColor" style="color:var(--blue);" width="22" height="22"><?php echo $s['icon']; ?></svg></div>
        <div class="stat-text">
          <p class="stat-value"><?php echo nl2br(esc_html($s['value'])); ?></p>
          <p class="stat-label"><?php echo esc_html($s['label']); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ───────── CTA ───────── -->
<section style="padding: 0 0 90px;">
  <div class="container">
    <div class="cta-inner-card cta-dark reveal">
      <div class="cta-inner">
        <div class="cta-logo-icon">
          <svg viewBox="0 0 24 24" fill="white" width="32" height="32"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
        </div>
        <div class="cta-text">
          <h2>Prêt à booster votre visibilité sur LinkedIn ?</h2>
          <p>Optimisons votre profil pour attirer les bonnes opportunités et accélérer votre carrière.</p>
        </div>
        <a href="<?php echo $contact_url; ?>" class="btn btn-white">Optimiser mon profil LinkedIn <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
