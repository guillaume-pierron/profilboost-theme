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
          <span class="breadcrumb-current">Coaching</span>
        </div>
        <p class="hero-label fade-up">Service N°3</p>
        <h1 class="hero-title fade-up-2">Coaching &amp;<br>Préparation <span style="color:var(--blue-light);">entretien</span></h1>
        <p class="hero-subtitle fade-up-3">Entraînez-vous en conditions réelles avec un coach expert et abordez vos entretiens avec la confiance et les techniques qui font la différence.</p>

        <div class="svc-hero-badges fade-up-3">
          <span class="svc-hero-badge">
            <span class="svc-hero-badge-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg></span>
            Simulations réelles
          </span>
          <span class="svc-hero-badge">
            <span class="svc-hero-badge-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/></svg></span>
            Techniques éprouvées
          </span>
          <span class="svc-hero-badge">
            <span class="svc-hero-badge-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg></span>
            Feedback personnalisé
          </span>
          <span class="svc-hero-badge">
            <span class="svc-hero-badge-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg></span>
            Confiance retrouvée
          </span>
        </div>

        <div class="hero-actions fade-up-4">
          <a href="<?php echo $contact_url; ?>" class="btn btn-primary">
            Réserver mon coaching
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
          <p class="proof-text"><strong>+300 candidats coachés</strong> · 4,9/5 basé sur 150+ avis</p>
        </div>
      </div>

      <!-- Hero Visual — maquette appel vidéo -->
      <div class="hero-visual">
        <div class="deco-shape deco-triangle-1"></div>
        <div class="deco-shape deco-triangle-2"></div>
        <div class="deco-shape deco-circle-1"></div>
        <div class="deco-shape deco-circle-2"></div>
        <div class="deco-dots-grid"><?php for($i=0;$i<20;$i++) echo '<div class="deco-dot"></div>'; ?></div>

        <div class="vc-wrap">
          <div class="vc-screen">
            <div class="vc-topbar">
              <div class="vc-topbar-left">
                <div class="vc-logo-dot"></div>
                <span class="vc-title">ProfilBoost Coaching · Séance en cours</span>
              </div>
              <div style="display:flex;gap:6px;align-items:center;">
                <span class="vc-live">LIVE</span>
                <span class="vc-duration">24:37</span>
              </div>
            </div>
            <div class="vc-videos">
              <div class="vc-tile vc-tile-coach">
                <div class="vc-tile-avatar">CB</div>
                <div class="vc-tile-name">Coach Bertrand</div>
                <div class="vc-tile-mic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1a3 3 0 00-3 3v8a3 3 0 006 0V4a3 3 0 00-3-3z"/><path d="M19 10v2a7 7 0 01-14 0v-2"/></svg></div>
              </div>
              <div class="vc-tile vc-tile-client">
                <div class="vc-tile-avatar">TL</div>
                <div class="vc-tile-name">Thomas L.</div>
                <div class="vc-tile-mic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1a3 3 0 00-3 3v8a3 3 0 006 0V4a3 3 0 00-3-3z"/><path d="M19 10v2a7 7 0 01-14 0v-2"/></svg></div>
              </div>
            </div>
            <div class="vc-agenda">
              <div class="vc-agenda-title">Programme de séance</div>
              <div class="vc-agenda-item">
                <div class="vc-agenda-check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
                Présentation &amp; pitch personnel
              </div>
              <div class="vc-agenda-item active">
                <div class="vc-agenda-dot"></div>
                Questions comportementales (STAR)
              </div>
              <div class="vc-agenda-item">
                <div class="vc-agenda-dot" style="background:rgba(255,255,255,.15)"></div>
                Gestion du stress &amp; mises en situation
              </div>
            </div>
            <div class="vc-controls">
              <div class="vc-ctrl vc-ctrl-gray"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1a3 3 0 00-3 3v8a3 3 0 006 0V4a3 3 0 00-3-3z"/></svg></div>
              <div class="vc-ctrl vc-ctrl-gray"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg></div>
              <div class="vc-ctrl vc-ctrl-red"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="23" y1="1" x2="1" y2="23"/></svg></div>
              <div class="vc-ctrl vc-ctrl-gray"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/></svg></div>
            </div>
          </div>

          <div class="vc-score-card">
            <div class="vc-score-title">Score en direct</div>
            <div class="vc-score-row">
              <div class="vc-score-label"><span>Communication</span><span>87%</span></div>
              <div class="vc-progress-bar"><div class="vc-progress-fill" style="width:87%"></div></div>
            </div>
            <div class="vc-score-row">
              <div class="vc-score-label"><span>Structure STAR</span><span>74%</span></div>
              <div class="vc-progress-bar"><div class="vc-progress-fill" style="width:74%"></div></div>
            </div>
            <div class="vc-score-row">
              <div class="vc-score-label"><span>Confiance</span><span>81%</span></div>
              <div class="vc-progress-bar"><div class="vc-progress-fill" style="width:81%"></div></div>
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
      <h2 class="section-title">Un coaching complet pour <span class="underline-blue">réussir vos entretiens</span></h2>
      <p class="section-subtitle" style="margin-top:16px;">Nous vous préparons sur tous les aspects de l'entretien pour que vous vous présentiez avec assurance et un discours percutant.</p>
    </div>
    <div class="service-features-grid">
      <?php
      $features = [
        ['icon' => '<polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/>',                     'title' => "Simulation<br>d'entretien",             'desc' => "Mise en situation réelle avec un coach expérimenté pour vous entraîner dans les conditions du jour J."],
        ['icon' => '<path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>',                                         'title' => 'Méthode STAR &amp;<br>réponses structurées','desc' => 'Apprenez à structurer vos réponses aux questions comportementales de façon claire et mémorable.'],
        ['icon' => '<path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>', 'title' => 'Communication<br>verbale &amp; non-verbale','desc' => 'Maîtrisez votre posture, votre gestuelle et votre intonation pour donner une image forte et assurée.'],
        ['icon' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>',                                                      'title' => 'Gestion du stress<br>&amp; confiance en soi', 'desc' => 'Techniques concrètes pour neutraliser le trac et aborder chaque entretien avec sérénité et conviction.'],
      ];
      $delays = ['', ' reveal-delay-1', ' reveal-delay-2', ' reveal-delay-3'];
      foreach ($features as $i => $f) : ?>
      <div class="service-feature-card reveal<?php echo $delays[$i]; ?>">
        <div class="service-feature-card-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo $f['icon']; ?></svg></div>
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

      <!-- Visual (gauche) — rapport coaching -->
      <div class="deliverables-visual reveal">
        <div class="blob-deco blob-1"></div>
        <div class="blob-deco blob-2"></div>
        <div class="coaching-visual-wrap">

          <div class="coaching-session-badge">
            <div class="session-badge-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div>
            <div>
              <div class="session-badge-text">Prochaine séance</div>
              <div class="session-badge-value">Demain, 14h00</div>
            </div>
          </div>

          <div class="coaching-rapport-card">
            <div class="rapport-header">
              <div class="rapport-header-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg></div>
              <div>
                <div class="rapport-header-title">Rapport de coaching</div>
                <div class="rapport-header-sub">Thomas L. · Séance du 12 mai 2025</div>
              </div>
            </div>
            <div class="rapport-body">
              <div class="rapport-section-title">Évaluation par critère</div>
              <div class="rapport-criteria">
                <?php foreach ([['Présentation personnelle','90%','rc-bar-green'],['Réponses structurées (STAR)','80%','rc-bar-blue'],['Communication non-verbale','75%','rc-bar-blue'],['Gestion du stress','70%','rc-bar-yellow'],["Questions au recruteur",'85%','rc-bar-green']] as $c) : ?>
                <div class="rapport-criterion">
                  <span class="rc-label"><?php echo esc_html($c[0]); ?></span>
                  <div class="rc-bar-wrap"><div class="rc-bar <?php echo $c[2]; ?>" style="width:<?php echo $c[1]; ?>"></div></div>
                  <span class="rc-score"><?php echo str_replace('%','',esc_html($c[1])).'/10'; ?></span>
                </div>
                <?php endforeach; ?>
              </div>
              <div class="rapport-divider"></div>
              <div class="rapport-section-title">Points forts identifiés</div>
              <div class="rapport-points">
                <div class="rapport-point"><div class="rapport-point-dot"></div>Écoute active et capacité de reformulation excellente</div>
                <div class="rapport-point"><div class="rapport-point-dot"></div>Maîtrise solide des questions sur les réalisations passées</div>
                <div class="rapport-point"><div class="rapport-point-dot"></div>Pitch de présentation convaincant et bien rythmé</div>
              </div>
            </div>
          </div>

          <div class="coaching-axes-card">
            <div class="axes-title">Axes d'amélioration</div>
            <div class="axes-item">
              <div class="axes-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg></div>
              Réduire les silences prolongés
            </div>
            <div class="axes-item">
              <div class="axes-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg></div>
              Renforcer le contact visuel caméra
            </div>
          </div>

        </div>
      </div>

      <!-- Content (droite) -->
      <div class="deliverables-content reveal reveal-delay-1">
        <p class="deliverables-label">Ce que vous recevez</p>
        <h2 class="deliverables-title">Tout pour décrocher<br>votre prochain poste</h2>
        <ul class="deliverables-list">
          <?php foreach (['Séance de coaching personnalisée (visio ou présentiel)', 'Rapport détaillé avec évaluation et axes d\'amélioration', 'Fiches de réponses aux questions clés du poste visé', 'Guide de préparation et check-list pré-entretien', 'Techniques de gestion du stress actionnables immédiatement', 'Suivi post-coaching pour ajustements avant l\'entretien réel'] as $item) : ?>
          <li>
            <div class="check-circle"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
            <?php echo esc_html($item); ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <div class="formats-box">
          <p class="formats-box-title">Formats disponibles</p>
          <div class="formats-list">
            <span class="format-item visio"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg>Visioconférence</span>
            <span class="format-item presentiel"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>Présentiel</span>
            <span class="format-item pdf"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>Rapport PDF</span>
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
        ['icon' => '<path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>',               'title' => 'Échange &amp; diagnostic',   'desc' => 'Nous identifions vos besoins, le poste ciblé et les points à renforcer.'],
        ['icon' => '<polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/>', 'title' => "Simulation d'entretien",   'desc' => 'Mise en situation en conditions réelles avec votre coach expert.'],
        ['icon' => '<path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>', 'title' => 'Débriefing &amp; rapport',    'desc' => "Analyse détaillée de vos forces et axes d'amélioration concrets."],
        ['icon' => '<polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/>','title' => 'Entraînement ciblé',        'desc' => 'Travail sur les points spécifiques jusqu\'à maîtriser totalement votre discours.'],
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
        ['icon' => '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/>',           'value' => "Coachs\ncertifiés",      'label' => 'Experts en recrutement, RH et développement personnel'],
        ['icon' => '<polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/>',        'value' => "×3 plus\nde succès",     'label' => 'Nos clients décrochent 3x plus d\'offres après coaching'],
        ['icon' => '<rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>', 'value' => "Flexibilité\ntotale",    'label' => 'Séances en visio ou présentiel, aux horaires qui vous conviennent'],
        ['icon' => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',                         'value' => "Résultats\ndès J+1",      'label' => 'Des progrès visibles et actionnables dès la première séance'],
      ];
      foreach ($stats as $i => $s) : ?>
      <div class="stat-card reveal<?php echo $i > 0 ? ' reveal-delay-' . min($i,3) : ''; ?>">
        <div class="stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo $s['icon']; ?></svg></div>
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
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg>
        </div>
        <div class="cta-text">
          <h2>Prêt à décrocher votre prochain poste ?</h2>
          <p>Entraînez-vous avec nos coachs experts et présentez-vous à vos entretiens avec la confiance et les techniques qui font la différence.</p>
        </div>
        <a href="<?php echo $contact_url; ?>" class="btn btn-white">Réserver mon coaching <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
