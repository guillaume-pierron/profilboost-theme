<?php get_header(); ?>
<div class="pb-grad">
<?php
$tpl         = get_template_directory_uri();
$formules_url = esc_url(home_url('/formules'));
$contact_url  = esc_url(home_url('/contact'));

/* Article vedette = post épinglé ou le plus récent */
$sticky_ids = get_option('sticky_posts');
$featured_post = null;
if (!empty($sticky_ids)) {
    $featured_post = get_post($sticky_ids[0]);
} else {
    $latest = get_posts(['numberposts' => 1, 'post_status' => 'publish']);
    if (!empty($latest)) $featured_post = $latest[0];
}

/* Tous les articles (sauf le vedette) */
$exclude_id = $featured_post ? $featured_post->ID : 0;
$all_posts  = get_posts([
    'numberposts' => 9,
    'post_status' => 'publish',
    'exclude'     => [$exclude_id],
]);

/* Correspondance catégorie WP → classe CSS couleur */
$cat_css = [
    'cv'       => ['class' => 'cat-cv',       'cover' => 'ac-cv',       'label' => 'CV & LM'],
    'li'       => ['class' => 'cat-li',       'cover' => 'ac-li',       'label' => 'LinkedIn'],
    'coach'    => ['class' => 'cat-coach',    'cover' => 'ac-coach',    'label' => 'Coaching'],
    'carriere' => ['class' => 'cat-carriere', 'cover' => 'ac-carriere', 'label' => 'Carrière'],
];
$default_cat = ['class' => 'cat-cv', 'cover' => 'ac-cv', 'label' => 'Blog'];

function get_cat_info($post_id, $cat_css, $default) {
    $cats = get_the_category($post_id);
    if (empty($cats)) return $default;
    foreach ($cats as $c) {
        if (isset($cat_css[$c->slug])) return $cat_css[$c->slug];
    }
    return ['class' => 'cat-cv', 'cover' => 'ac-cv', 'label' => $cats[0]->name];
}
?>

<!-- ───────── HERO ───────── -->
<section class="hero hero-inner-page">
  <div class="container">
    <div class="hero-inner" style="text-align:center; position:relative; z-index:1;">
      <h1 class="hero-title fade-up-2" style="white-space:normal; font-size:clamp(30px,4.5vw,52px); margin-bottom:14px;">
        Conseils, guides &amp; <span style="color:#60a5fa;">astuces carrière</span>
      </h1>
      <p class="hero-subtitle fade-up-3" style="margin:0 auto 20px; max-width:520px;">
        Des articles rédigés par nos experts RH pour vous aider à valoriser votre profil, préparer vos entretiens et booster votre carrière. Gratuitement.
      </p>

      <!-- Barre de recherche -->
      <div class="hero-search fade-up-3">
        <input type="text" placeholder="Rechercher un article, un sujet…" id="searchInput" />
        <button type="button" id="searchBtn">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
          <span class="search-btn-label">Rechercher</span>
        </button>
      </div>

      <!-- Topics suggérés -->
      <div class="hero-topics fade-up-3">
        <span class="hero-topic" data-filter="cv">CV</span>
        <span class="hero-topic" data-filter="li">LinkedIn</span>
        <span class="hero-topic" data-filter="coach">Entretien</span>
        <span class="hero-topic" data-filter="carriere">Reconversion</span>
        <span class="hero-topic" data-filter="carriere">Négociation salaire</span>
        <span class="hero-topic" data-filter="cv">ATS</span>
      </div>
    </div>
  </div>
</section>

<!-- ───────── ARTICLE VEDETTE ───────── -->
<?php if ($featured_post) :
    setup_postdata($featured_post);
    $ft_thumb = get_the_post_thumbnail_url($featured_post->ID, 'large');
    $ft_cats  = get_the_category($featured_post->ID);
    $ft_cat   = !empty($ft_cats) ? $ft_cats[0]->name : 'Article';
    $ft_excerpt = wp_trim_words(get_the_excerpt($featured_post->ID), 30);
    $ft_author  = get_the_author_meta('display_name', $featured_post->post_author);
    $ft_initials = strtoupper(mb_substr($ft_author, 0, 1));
    $ft_date    = get_the_date('j M Y', $featured_post->ID);
?>
<section class="featured-section">
  <div class="container">
    <div class="reveal"><p class="section-label">À la une</p></div>
    <a href="<?php echo esc_url(get_permalink($featured_post->ID)); ?>" class="featured-card reveal" style="text-decoration:none;color:inherit;display:grid;">
      <div class="featured-cover"
        <?php if ($ft_thumb): ?>style="background: linear-gradient(145deg, rgba(10,22,40,.55), rgba(37,99,235,.40)), url('<?php echo esc_url($ft_thumb); ?>') center/cover no-repeat;"<?php endif; ?>>
        <span class="featured-cover-label"><?php echo esc_html($ft_cat); ?></span>
        <div class="featured-cover-icon">
          <div class="cover-big-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
          </div>
        </div>
      </div>
      <div class="featured-body">
        <div class="featured-meta">
          <span class="featured-tag"><?php echo esc_html($ft_cat); ?></span>
        </div>
        <h2 class="featured-title"><?php echo get_the_title($featured_post->ID); ?></h2>
        <p class="featured-excerpt"><?php echo esc_html($ft_excerpt); ?></p>
        <div class="featured-author">
          <div class="author-avatar" style="background:linear-gradient(135deg,#1e40af,#2563eb);"><?php echo esc_html($ft_initials); ?></div>
          <div>
            <div class="author-name"><?php echo esc_html($ft_author); ?></div>
            <div class="author-date"><?php echo esc_html($ft_date); ?></div>
          </div>
        </div>
        <span class="featured-link">
          Lire l'article
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </span>
      </div>
    </a>
  </div>
</section>
<?php wp_reset_postdata(); endif; ?>

<!-- ───────── ARTICLES ───────── -->
<section class="articles-section">
  <div class="container">
    <div class="articles-header reveal">
      <div class="articles-header-left">
        <p class="section-label">Tous les articles</p>
        <h2 class="section-title">Conseils de nos <span class="underline-blue">experts</span></h2>
      </div>
      <div class="filter-tabs" id="filterTabs">
        <div class="filter-tab active" data-filter="all">Tous</div>
        <div class="filter-tab" data-filter="cv">CV &amp; LM</div>
        <div class="filter-tab" data-filter="li">LinkedIn</div>
        <div class="filter-tab" data-filter="coach">Coaching</div>
        <div class="filter-tab" data-filter="carriere">Carrière</div>
      </div>
    </div>

    <?php if (!empty($all_posts)) : ?>
    <div class="articles-grid" id="articlesGrid">
      <?php
      $delays = ['', ' reveal-delay-1', ' reveal-delay-2'];
      foreach ($all_posts as $i => $post) :
        setup_postdata($post);
        $thumb    = get_the_post_thumbnail_url($post->ID, 'medium');
        $cat_info = get_cat_info($post->ID, $cat_css, $default_cat);
        $cats_obj = get_the_category($post->ID);
        $cat_slug = !empty($cats_obj) ? $cats_obj[0]->slug : 'cv';
        $author   = get_the_author_meta('display_name', $post->post_author);
        $initials = strtoupper(mb_substr($author, 0, 1));
        $excerpt  = wp_trim_words(get_the_excerpt($post->ID), 18);
        $date     = get_the_date('j M Y', $post->ID);
      ?>
      <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"
         class="article-card reveal<?php echo $delays[$i % 3]; ?>"
         data-cat="<?php echo esc_attr($cat_slug); ?>"
         data-title="<?php echo esc_attr(strtolower(get_the_title($post->ID))); ?>"
         data-excerpt="<?php echo esc_attr(strtolower($excerpt)); ?>">
        <div class="article-cover <?php echo esc_attr($cat_info['cover']); ?>"
          <?php if ($thumb) : ?>style="background: linear-gradient(145deg, rgba(10,22,40,.50), rgba(30,64,175,.40)), url('<?php echo esc_url($thumb); ?>') center/cover no-repeat;"<?php endif; ?>>
          <div class="cover-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
          </div>
        </div>
        <div class="article-body">
          <div class="article-cat">
            <span class="cat-badge <?php echo esc_attr($cat_info['class']); ?>"><?php echo esc_html($cat_info['label']); ?></span>
          </div>
          <h3 class="article-title"><?php echo get_the_title($post->ID); ?></h3>
          <p class="article-excerpt"><?php echo esc_html($excerpt); ?></p>
          <div class="article-footer">
            <div class="article-author">
              <div class="article-author-avatar" style="background:linear-gradient(135deg,#1e40af,#2563eb);"><?php echo esc_html($initials); ?></div>
              <span class="article-author-name"><?php echo esc_html($author); ?></span>
            </div>
            <span class="article-date"><?php echo esc_html($date); ?></span>
          </div>
        </div>
      </a>
      <?php endforeach; wp_reset_postdata(); ?>
    </div>

    <?php else : /* Fallback statique si aucun article publié */ ?>
    <div class="articles-grid" id="articlesGrid">
      <?php
      $static_articles = [
        ['cat_slug' => 'cv',       'cat_info' => $cat_css['cv'],       'img' => '5_erreur.jpg',  'title' => '5 erreurs qui font rejeter votre CV en moins de 10 secondes', 'excerpt' => "Un recruteur passe en moyenne 7 secondes sur un CV. Découvrez les pièges les plus courants et comment les éviter.", 'author' => 'Marc Lefebvre', 'date' => '12 jan. 2024'],
        ['cat_slug' => 'li',       'cat_info' => $cat_css['li'],       'img' => 'keywords.jpg',  'title' => "LinkedIn 2024 : comment l'algorithme fonctionne et comment en tirer parti", 'excerpt' => "Comprendre la logique de l'algorithme LinkedIn est la clé pour apparaître dans les recherches des recruteurs.", 'author' => 'Amelia Chen',  'date' => '28 fév. 2024'],
        ['cat_slug' => 'carriere', 'cat_info' => $cat_css['carriere'], 'img' => 'nego.jpg',      'title' => 'Comment négocier son salaire sans se brûler les ailes', 'excerpt' => "La négociation salariale est un art qui s'apprend. Découvrez les techniques concrètes pour défendre votre valeur.", 'author' => 'Sophie Renard', 'date' => '14 mai 2024'],
      ];
      foreach ($static_articles as $i => $a) :
        $initials = implode('', array_map(fn($w) => strtoupper($w[0]), array_slice(explode(' ', $a['author']), 0, 2)));
      ?>
      <div class="article-card reveal<?php echo $i > 0 ? ' reveal-delay-' . $i : ''; ?>"
           data-cat="<?php echo esc_attr($a['cat_slug']); ?>"
           data-title="<?php echo esc_attr(strtolower($a['title'])); ?>"
           data-excerpt="<?php echo esc_attr(strtolower($a['excerpt'])); ?>">
        <div class="article-cover <?php echo esc_attr($a['cat_info']['cover']); ?>"
          style="background: linear-gradient(145deg, rgba(10,22,40,.50), rgba(30,64,175,.40)), url('<?php echo esc_url($tpl . '/assets/images/' . $a['img']); ?>') center/cover no-repeat;">
          <div class="cover-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
          </div>
        </div>
        <div class="article-body">
          <div class="article-cat">
            <span class="cat-badge <?php echo esc_attr($a['cat_info']['class']); ?>"><?php echo esc_html($a['cat_info']['label']); ?></span>
          </div>
          <h3 class="article-title"><?php echo esc_html($a['title']); ?></h3>
          <p class="article-excerpt"><?php echo esc_html($a['excerpt']); ?></p>
          <div class="article-footer">
            <div class="article-author">
              <div class="article-author-avatar" style="background:linear-gradient(135deg,#1e40af,#2563eb);"><?php echo esc_html($initials); ?></div>
              <span class="article-author-name"><?php echo esc_html($a['author']); ?></span>
            </div>
            <span class="article-date"><?php echo esc_html($a['date']); ?></span>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

  </div>
</section>

<!-- ───────── GUIDES ───────── -->
<section class="guides-section">
  <div class="container">
    <div class="guides-header reveal">
      <p class="section-label">Guides gratuits</p>
      <h2 class="section-title">Téléchargez nos <span class="underline-blue">ressources</span></h2>
      <p style="font-size:15px;color:var(--gray-500);max-width:480px;margin:16px auto 0;line-height:1.65;text-align:center;">
        Des guides pratiques rédigés par nos experts, offerts gratuitement.
      </p>
    </div>
    <div class="guides-grid">
      <?php
      $guides = [
        ['cover_class' => 'gc-blue',   'cover_img' => 'guide.jpg',     'badge' => 'PDF · 24 pages', 'cat_class' => 'cat-cv',    'cat_label' => 'CV & LM',  'title' => 'Le Guide Ultime du CV 2024',             'desc' => "Tout ce qu'il faut savoir pour rédiger un CV percutant : structure, mise en page, mots-clés ATS, erreurs à éviter et exemples commentés.",      'pages' => '24', 'exemples' => '12',   'dls' => '4 800'],
        ['cover_class' => 'gc-li',     'cover_img' => 'checklist.jpg', 'badge' => 'PDF · 16 pages', 'cat_class' => 'cat-li',    'cat_label' => 'LinkedIn', 'title' => 'Checklist LinkedIn : 30 Points à Optimiser', 'desc' => "Une checklist complète pour auditer et optimiser chaque section de votre profil LinkedIn, avec les critères utilisés par les recruteurs.",   'pages' => '30', 'exemples' => '16',   'dls' => '3 200'],
        ['cover_class' => 'gc-purple', 'cover_img' => 'questions.jpg', 'badge' => 'PDF · 32 pages', 'cat_class' => 'cat-coach', 'cat_label' => 'Coaching', 'title' => "50 Questions d'Entretien & Leurs Réponses",   'desc' => "Les 50 questions les plus fréquentes en entretien d'embauche, avec pour chacune une analyse des attentes du recruteur et un exemple de réponse.", 'pages' => '50', 'exemples' => '32',   'dls' => '6 100'],
      ];
      foreach ($guides as $i => $g) : ?>
      <div class="guide-card reveal<?php echo $i > 0 ? ' reveal-delay-' . $i : ''; ?>">
        <div class="guide-cover <?php echo esc_attr($g['cover_class']); ?>" style="background: linear-gradient(145deg, rgba(10,22,40,.45), rgba(37,99,235,.35)), url('<?php echo esc_url($tpl . '/assets/images/' . $g['cover_img']); ?>') center/cover no-repeat;">
          <span class="guide-badge"><?php echo esc_html($g['badge']); ?></span>
        </div>
        <div class="guide-body">
          <div class="guide-tag"><span class="cat-badge <?php echo esc_attr($g['cat_class']); ?>"><?php echo esc_html($g['cat_label']); ?></span></div>
          <h3 class="guide-title"><?php echo esc_html($g['title']); ?></h3>
          <p class="guide-desc"><?php echo esc_html($g['desc']); ?></p>
          <div class="guide-includes">
            <div class="guide-stat"><span class="guide-stat-num"><?php echo esc_html($g['pages']); ?></span><span class="guide-stat-label">pages</span></div>
            <div class="guide-stat"><span class="guide-stat-num"><?php echo esc_html($g['exemples']); ?></span><span class="guide-stat-label">exemples</span></div>
            <div class="guide-stat"><span class="guide-stat-num">5★</span><span class="guide-stat-label"><?php echo esc_html($g['dls']); ?> téléch.</span></div>
          </div>
          <div class="guide-cta">
            <div class="guide-form">
              <input type="email" class="guide-input" placeholder="Votre adresse email" />
              <button class="guide-btn" type="button">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                Télécharger
              </button>
            </div>
            <p class="guide-note">Gratuit · Sans spam · Désabonnement en 1 clic</p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ───────── NEWSLETTER ───────── -->
<section class="newsletter-section">
  <div class="container">
    <div class="newsletter-card reveal">
      <div class="newsletter-text">
        <p class="newsletter-label">Newsletter hebdomadaire</p>
        <h2 class="newsletter-title">Recevez chaque semaine les meilleurs conseils carrière</h2>
        <p class="newsletter-subtitle">Rejoignez 8 400 professionnels qui reçoivent chaque lundi nos conseils, nos ressources exclusives et nos offres en avant-première.</p>
        <div class="newsletter-perks">
          <div class="newsletter-perk"><div class="perk-dot"></div>1 article de fond par semaine</div>
          <div class="newsletter-perk"><div class="perk-dot"></div>Des astuces CV &amp; LinkedIn actionnables</div>
          <div class="newsletter-perk"><div class="perk-dot"></div>Des offres exclusives réservées aux abonnés</div>
          <div class="newsletter-perk"><div class="perk-dot"></div>Désabonnement en un clic, à tout moment</div>
        </div>
      </div>
      <div class="newsletter-form-wrap">
        <p class="newsletter-form-title">Rejoindre la newsletter</p>
        <div class="newsletter-field">
          <label>Prénom</label>
          <input type="text" class="newsletter-input" placeholder="Jean" />
        </div>
        <div class="newsletter-field">
          <label>Adresse email</label>
          <input type="email" class="newsletter-input" placeholder="jean@email.com" />
        </div>
        <button class="newsletter-submit" type="button">Je m'abonne gratuitement</button>
        <p class="newsletter-privacy">Aucun spam. Vos données sont sécurisées.</p>
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
      <h2>Prêt à passer à l'action ?</h2>
      <p>Les conseils c'est bien — être accompagné par un expert, c'est encore mieux.</p>
    </div>
    <a href="<?php echo $formules_url; ?>" class="btn btn-white">Voir nos formules <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {

  /* ── Filtres par catégorie ── */
  const filterTabs = document.getElementById('filterTabs');
  if (filterTabs) {
    filterTabs.addEventListener('click', function (e) {
      const tab = e.target.closest('.filter-tab');
      if (!tab) return;
      document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
      tab.classList.add('active');
      const filter = tab.dataset.filter;
      document.querySelectorAll('.article-card').forEach(card => {
        const match = filter === 'all' || card.dataset.cat === filter;
        card.classList.toggle('hidden', !match);
      });
    });
  }

  /* ── Topics dans le hero → déclenchent un filtre ── */
  document.querySelectorAll('.hero-topic').forEach(topic => {
    topic.addEventListener('click', function () {
      const filter = this.dataset.filter;
      document.querySelectorAll('.filter-tab').forEach(t => {
        t.classList.toggle('active', t.dataset.filter === filter || (filter === undefined && t.dataset.filter === 'all'));
      });
      document.querySelectorAll('.article-card').forEach(card => {
        card.classList.toggle('hidden', filter && card.dataset.cat !== filter);
      });
      document.querySelector('.articles-section')?.scrollIntoView({ behavior: 'smooth' });
    });
  });

  /* ── Recherche en temps réel ── */
  const searchInput = document.getElementById('searchInput');
  if (searchInput) {
    searchInput.addEventListener('input', function () {
      const q = this.value.toLowerCase().trim();
      document.querySelectorAll('.article-card').forEach(card => {
        if (!q) { card.classList.remove('hidden'); return; }
        const text = (card.dataset.title || '') + ' ' + (card.dataset.excerpt || '');
        card.classList.toggle('hidden', !text.includes(q));
      });
      /* Reset les onglets de filtre */
      if (!q) {
        document.querySelectorAll('.filter-tab').forEach((t, i) => t.classList.toggle('active', i === 0));
      }
    });
    document.getElementById('searchBtn')?.addEventListener('click', () => searchInput.dispatchEvent(new Event('input')));
  }

});
</script>

</div>
<?php get_footer(); ?>
