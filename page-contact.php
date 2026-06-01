<?php get_header(); ?>

<?php
$hero_title    = pb_field('hero_title',    'Parlons de votre projet');
$hero_subtitle = pb_field('hero_subtitle', "Une question, un devis ou simplement envie d'en savoir plus ? Notre équipe vous répond sous 24h, du lundi au vendredi.");

$email   = pb_field('contact_email',   '', 'option') ?: 'contact@profilboost.fr';
$phone   = pb_field('contact_phone',   '', 'option') ?: '+33 1 23 45 67 89';
$address = pb_field('contact_address', '', 'option') ?: 'Paris, France';
$hours   = pb_field('contact_hours',   '', 'option') ?: 'Lun – Ven · 9h00 – 18h00';

$cta_title = pb_field('cta_title', 'Prêt à passer à l\'action ?');
$cta_text  = pb_field('cta_text',  'Découvrez nos formules et choisissez le service adapté à votre situation.');
$formules_url = esc_url(get_permalink(get_page_by_path('formules')) ?: home_url('/formules'));
?>

<!-- ───────── HERO ───────── -->
<section class="hero hero-inner-page">
  <div class="container">
    <div style="text-align:center; position:relative; z-index:1;">
      <div class="breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>">Accueil</a>
        <span class="breadcrumb-sep">›</span>
        <span class="breadcrumb-current">Contact</span>
      </div>
      <h1 class="hero-title fade-up-2" style="white-space:normal;"><?php echo esc_html($hero_title); ?></h1>
      <p class="hero-subtitle fade-up-3" style="margin:0 auto 32px; max-width:520px;"><?php echo esc_html($hero_subtitle); ?></p>
      <div class="hero-badges fade-up-4">
        <div class="hero-badge">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          <?php echo esc_html($email); ?>
        </div>
        <div class="hero-badge">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 9.91a16 16 0 006.18 6.18l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
          <?php echo esc_html($phone); ?>
        </div>
        <div class="hero-badge">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          Réponse sous 24h
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ───────── FORMULAIRE ───────── -->
<section class="contact-section">
  <div class="container">
    <div class="contact-grid">

      <!-- FORM -->
      <div class="form-card reveal" id="formCard">
        <div class="form-header">
          <p class="section-label">Formulaire de contact</p>
          <h2 class="section-title">Envoyez-nous un <span class="underline-blue">message</span></h2>
          <p style="margin-top:14px;">Remplissez le formulaire ci-dessous et nous vous recontactons dans les plus brefs délais.</p>
        </div>

        <?php
        /* Si un shortcode de formulaire de contact est renseigné (ex: Contact Form 7) */
        $cf_shortcode = pb_field('contact_form_shortcode', '', 'option');
        if ($cf_shortcode) :
          echo do_shortcode($cf_shortcode);
        else : ?>

        <form id="contactForm" novalidate>
          <div class="form-row">
            <div class="form-group">
              <label for="prenom">Prénom</label>
              <input type="text" id="prenom" class="form-input" placeholder="Jean" required />
            </div>
            <div class="form-group">
              <label for="nom">Nom</label>
              <input type="text" id="nom" class="form-input" placeholder="Dupont" required />
            </div>
          </div>
          <div class="form-group">
            <label for="email">Adresse email</label>
            <input type="email" id="email" class="form-input" placeholder="jean.dupont@email.com" required />
          </div>
          <div class="form-group">
            <label for="phone">Téléphone <span class="optional">(facultatif)</span></label>
            <input type="tel" id="phone" class="form-input" placeholder="+33 6 12 34 56 78" />
          </div>
          <div class="form-group">
            <label for="service">Service concerné</label>
            <select id="service" class="form-input" required>
              <option value="" disabled selected>Sélectionnez un service…</option>
              <option value="cv-lm">Création de CV &amp; Lettre de Motivation</option>
              <option value="linkedin">Optimisation du Profil LinkedIn</option>
              <option value="coaching">Coaching &amp; Préparation entretien</option>
              <option value="pack">Pack combiné (plusieurs services)</option>
              <option value="autre">Autre / Renseignement général</option>
            </select>
          </div>
          <div class="form-group">
            <label for="message">Votre message</label>
            <textarea id="message" class="form-input" placeholder="Décrivez brièvement votre situation, vos objectifs ou vos questions…" required></textarea>
          </div>
          <div class="form-consent">
            <input type="checkbox" id="consent" required />
            <label for="consent">J'accepte que mes données soient utilisées pour traiter ma demande, conformément à la <a href="#">politique de confidentialité</a> de ProfilBoost.</label>
          </div>
          <button type="submit" class="form-submit">
            Envoyer ma demande
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
          </button>
          <p class="form-note">Vos données sont sécurisées et ne seront jamais revendues.</p>
        </form>

        <!-- SUCCESS STATE -->
        <div class="form-success" id="formSuccess">
          <div class="success-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
          <h3 class="success-title">Message envoyé !</h3>
          <p class="success-text">Merci pour votre message. Notre équipe vous répondra dans les 24h ouvrées. À très bientôt !</p>
        </div>

        <?php endif; ?>
      </div>

      <!-- INFO SIDEBAR -->
      <div class="contact-info">

        <div class="response-badge reveal">
          <div class="response-dot"></div>
          <div class="response-text">
            Équipe disponible
            <span><?php echo esc_html($hours); ?></span>
          </div>
        </div>

        <div class="info-card reveal">
          <div class="info-card-head">
            <div class="info-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>
            <div>
              <div class="info-card-title">Email</div>
              <div class="info-card-sub">Réponse garantie sous 24h</div>
            </div>
          </div>
          <a href="mailto:<?php echo esc_attr($email); ?>" class="info-value"><?php echo esc_html($email); ?></a>
        </div>

        <div class="info-card reveal">
          <div class="info-card-head">
            <div class="info-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 9.91a16 16 0 006.18 6.18l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg></div>
            <div>
              <div class="info-card-title">Téléphone</div>
              <div class="info-card-sub">Disponible en semaine</div>
            </div>
          </div>
          <a href="tel:<?php echo esc_attr(preg_replace('/[^+\d]/', '', $phone)); ?>" class="info-value"><?php echo esc_html($phone); ?></a>
        </div>

        <div class="info-card reveal">
          <div class="info-card-head">
            <div class="info-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
            <div>
              <div class="info-card-title">Localisation</div>
              <div class="info-card-sub">Prestations 100% en ligne</div>
            </div>
          </div>
          <p class="info-value-text"><?php echo nl2br(esc_html($address)); ?></p>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- ───────── ENGAGEMENTS ───────── -->
<section class="engagements-section">
  <div class="container">
    <div class="reveal" style="text-align:center;">
      <p class="section-label" style="text-align:center;">Nos engagements</p>
      <h2 class="section-title" style="text-align:center;">Pourquoi nous <span class="underline-blue">faire confiance ?</span></h2>
    </div>
    <div class="engagements-grid">
      <?php
      $engagements = [
        ['icon' => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',                                                          'title' => 'Réponse sous 24h',       'desc' => 'Nous nous engageons à répondre à toutes les demandes en moins de 24h ouvrées.'],
        ['icon' => '<line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>',                              'title' => 'Devis gratuit',           'desc' => 'Chaque devis est gratuit, personnalisé et sans engagement de votre part.'],
        ['icon' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>',                                                                       'title' => 'Confidentialité totale', 'desc' => 'Vos informations personnelles restent strictement confidentielles et sécurisées.'],
        ['icon' => '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>',            'title' => 'Satisfaction garantie', 'desc' => "Si vous n'êtes pas satisfait après toutes les révisions, nous vous remboursons."],
      ];
      foreach ($engagements as $i => $eng) : ?>
      <div class="engagement-card reveal<?php echo $i > 0 ? ' reveal-delay-' . min($i, 3) : ''; ?>">
        <div class="engagement-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo $eng['icon']; ?></svg>
        </div>
        <h4 class="engagement-title"><?php echo esc_html($eng['title']); ?></h4>
        <p class="engagement-desc"><?php echo esc_html($eng['desc']); ?></p>
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
          <h2><?php echo esc_html($cta_title); ?></h2>
          <p><?php echo esc_html($cta_text); ?></p>
        </div>
        <a href="<?php echo $formules_url; ?>" class="btn btn-white">Voir les formules<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
