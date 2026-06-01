<?php get_header(); ?>

<?php while (have_posts()) : the_post();
  $tpl         = get_template_directory_uri();
  $thumb       = get_the_post_thumbnail_url(null, 'large') ?: $tpl . '/assets/images/find_work.jpg';
  $cats        = get_the_category();
  $cat_name    = !empty($cats) ? $cats[0]->name : 'Stratégie carrière';
  $author_id   = get_post_field('post_author', get_the_ID());
  $author_name = get_the_author_meta('display_name', $author_id);
  $author_bio  = get_the_author_meta('description', $author_id);
  $initials    = implode('', array_map(fn($w) => strtoupper($w[0]), array_slice(explode(' ', $author_name), 0, 2)));
  $read_time   = ceil(str_word_count(strip_tags(get_the_content())) / 200); /* ~200 mots/min */
  $formules_url = esc_url(home_url('/formules'));
  $ressources_url = esc_url(home_url('/ressources'));

  /* Générer le sommaire depuis les balises H2 du contenu */
  $content_raw = get_the_content();
  preg_match_all('/<h2[^>]*id="([^"]*)"[^>]*>(.*?)<\/h2>/i', $content_raw, $toc_matches);
  /* Si pas d'id sur les H2, on cherche quand même les titres */
  if (empty($toc_matches[1])) {
    preg_match_all('/<h2[^>]*>(.*?)<\/h2>/i', $content_raw, $h2_matches);
    $toc_titles = $h2_matches[1] ?? [];
    $toc_ids    = [];
    foreach ($toc_titles as $title) {
      $toc_ids[] = sanitize_title(strip_tags($title));
    }
  } else {
    $toc_ids    = $toc_matches[1];
    $toc_titles = $toc_matches[2];
  }

  /* Articles liés dans la même catégorie */
  $related_posts = [];
  if (!empty($cats)) {
    $related_posts = get_posts([
      'category__in'   => [$cats[0]->term_id],
      'exclude'        => [get_the_ID()],
      'numberposts'    => 3,
      'post_status'    => 'publish',
    ]);
  }
  if (empty($related_posts)) {
    $related_posts = get_posts(['numberposts' => 3, 'exclude' => [get_the_ID()], 'post_status' => 'publish']);
  }

  $rc_classes = ['rc-cv', 'rc-li', 'rc-carr'];
?>

<!-- Barre de progression de lecture -->
<div class="reading-progress"><div class="reading-progress-bar" id="progressBar"></div></div>

<!-- ───────── HERO ARTICLE ───────── -->
<section class="article-hero" style="background: linear-gradient(160deg, rgba(5,13,32,.92), rgba(13,27,62,.88), rgba(10,36,96,.85)), url('<?php echo esc_url($thumb); ?>') center/cover no-repeat;">
  <div class="container">
    <div class="article-hero-inner">
      <nav class="article-breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>">Accueil</a>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
        <a href="<?php echo $ressources_url; ?>">Ressources</a>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
        <span><?php echo esc_html($cat_name); ?></span>
      </nav>

      <div class="article-cat-pill">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg>
        <?php echo esc_html($cat_name); ?>
      </div>

      <h1 class="article-hero-title"><?php the_title(); ?></h1>
      <p class="article-hero-excerpt"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 40)); ?></p>

      <div class="article-meta-bar">
        <div class="article-author-info">
          <?php $avatar = get_avatar_url($author_id, ['size' => 42]); ?>
          <?php if ($avatar && !str_contains($avatar, 'gravatar.com/avatar/0')) : ?>
            <img src="<?php echo esc_url($avatar); ?>" alt="<?php echo esc_attr($author_name); ?>" class="article-author-avatar" style="object-fit:cover;" />
          <?php else : ?>
            <div class="article-author-avatar"><?php echo esc_html($initials); ?></div>
          <?php endif; ?>
          <div>
            <div class="article-author-name"><?php echo esc_html($author_name); ?></div>
            <div class="article-author-role"><?php echo esc_html(get_the_author_meta('user_description_short', $author_id) ?: get_the_author_meta('job_title', $author_id)); ?></div>
          </div>
        </div>
        <div class="meta-sep"></div>
        <div class="meta-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
          <?php echo get_the_date('j M Y'); ?>
        </div>
        <div class="meta-sep"></div>
        <div class="meta-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          <?php echo $read_time; ?> min de lecture
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ───────── LAYOUT 2 COLONNES ───────── -->
<div class="article-layout">

  <!-- ── CONTENU ── -->
  <article class="article-content">
    <?php the_content(); ?>
  </article>

  <!-- ── SIDEBAR ── -->
  <aside class="article-sidebar">

    <!-- Sommaire -->
    <?php if (!empty($toc_titles)) : ?>
    <div class="sidebar-widget">
      <p class="sidebar-title">Sommaire</p>
      <ul class="toc-list">
        <?php foreach ($toc_titles as $i => $title) :
          $id = $toc_ids[$i] ?? sanitize_title(strip_tags($title));
        ?>
        <li><a href="#<?php echo esc_attr($id); ?>" class="toc-link"><?php echo wp_strip_all_tags($title); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <?php endif; ?>

    <!-- Auteur -->
    <div class="sidebar-widget">
      <p class="sidebar-title">L'auteur·e</p>
      <div class="sidebar-author-row">
        <div class="sidebar-avatar"><?php echo esc_html($initials); ?></div>
        <div>
          <div class="sidebar-author-name"><?php echo esc_html($author_name); ?></div>
          <div class="sidebar-author-role">ProfilBoost</div>
        </div>
      </div>
      <?php if ($author_bio) : ?>
        <p class="sidebar-bio"><?php echo esc_html($author_bio); ?></p>
      <?php else : ?>
        <p class="sidebar-bio">Expert en optimisation de profil et accompagnement de carrière chez ProfilBoost.</p>
      <?php endif; ?>
    </div>

    <!-- Newsletter -->
    <div class="sidebar-widget sidebar-newsletter">
      <p class="sidebar-title">Newsletter carrière</p>
      <p>Chaque semaine, les meilleurs conseils pour votre recherche d'emploi — directement dans votre boîte.</p>
      <input type="email" class="snl-input" placeholder="Votre adresse email" />
      <button class="snl-btn" type="button">S'inscrire gratuitement</button>
    </div>

    <!-- Articles liés -->
    <?php if (!empty($related_posts)) : ?>
    <div class="sidebar-widget">
      <p class="sidebar-title">À lire aussi</p>
      <div class="related-list">
        <?php foreach ($related_posts as $i => $rp) :
          $rp_thumb = get_the_post_thumbnail_url($rp->ID, 'thumbnail');
          $rt_class = ['rt-cv', 'rt-li', 'rt-coach', 'rt-carr'][$i % 4];
        ?>
        <a href="<?php echo esc_url(get_permalink($rp->ID)); ?>" class="related-item">
          <div class="related-thumb <?php echo $rt_class; ?>"
            <?php if ($rp_thumb) : ?>style="background: url('<?php echo esc_url($rp_thumb); ?>') center/cover no-repeat;"<?php endif; ?>></div>
          <div>
            <div class="related-item-title"><?php echo get_the_title($rp->ID); ?></div>
            <div class="related-item-time"><?php echo get_the_date('j M Y', $rp->ID); ?></div>
          </div>
        </a>
        <?php endforeach; wp_reset_postdata(); ?>
      </div>
    </div>
    <?php endif; ?>

  </aside>
</div>

<!-- ───────── ARTICLES LIÉS (bas de page) ───────── -->
<?php if (!empty($related_posts)) : ?>
<section class="related-section">
  <div class="container">
    <p class="section-label reveal">Continuer à lire</p>
    <h2 class="section-title reveal">Articles similaires</h2>
    <div class="related-grid">
      <?php foreach ($related_posts as $i => $rp) :
        $rp_thumb = get_the_post_thumbnail_url($rp->ID, 'medium');
        $rc       = $rc_classes[$i % 3];
        $rp_excerpt = wp_trim_words(get_the_excerpt($rp->ID), 18);
        $rp_cats  = get_the_category($rp->ID);
        $rp_cat   = !empty($rp_cats) ? $rp_cats[0]->name : 'Blog';
      ?>
      <a href="<?php echo esc_url(get_permalink($rp->ID)); ?>" class="related-card reveal<?php echo $i > 0 ? ' reveal-delay-' . $i : ''; ?>">
        <div class="related-cover <?php echo $rc; ?>"
          <?php if ($rp_thumb) : ?>style="background: linear-gradient(145deg, rgba(10,22,40,.50), rgba(30,64,175,.40)), url('<?php echo esc_url($rp_thumb); ?>') center/cover no-repeat;"<?php endif; ?>>
          <span class="related-cat"><?php echo esc_html($rp_cat); ?></span>
        </div>
        <div class="related-body">
          <h3 class="related-title"><?php echo get_the_title($rp->ID); ?></h3>
          <p class="related-excerpt"><?php echo esc_html($rp_excerpt); ?></p>
          <span class="related-time"><?php echo get_the_date('j M Y', $rp->ID); ?></span>
          <span class="related-btn">Lire l'article <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
        </div>
      </a>
      <?php endforeach; wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ───────── CTA ───────── -->
<section style="padding: 0 24px 80px;">
  <div class="container">
    <div class="cta-inner-card">
      <div class="cta-inner">
        <div class="cta-text">
          <h2>Prêt à accélérer votre recherche ?</h2>
          <p>Nos experts prennent en charge votre CV, LinkedIn et la préparation aux entretiens pour décrocher votre prochain poste plus vite.</p>
        </div>
        <a href="<?php echo $formules_url; ?>" class="btn btn-white">
          Voir nos formules
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
  /* Barre de progression */
  const bar = document.getElementById('progressBar');
  if (bar) {
    window.addEventListener('scroll', () => {
      const scrollTop = window.scrollY;
      const docHeight = document.documentElement.scrollHeight - window.innerHeight;
      bar.style.width = (scrollTop / docHeight * 100) + '%';
    });
  }

  /* Sommaire — lien actif au scroll */
  const sections  = document.querySelectorAll('.article-content h2[id]');
  const tocLinks  = document.querySelectorAll('.toc-link');
  if (sections.length && tocLinks.length) {
    const tocIO = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          tocLinks.forEach(l => l.classList.remove('active'));
          const a = document.querySelector(`.toc-link[href="#${e.target.id}"]`);
          if (a) a.classList.add('active');
        }
      });
    }, { rootMargin: '-15% 0px -70% 0px' });
    sections.forEach(s => tocIO.observe(s));
  }
});
</script>

<?php endwhile; ?>

<?php get_footer(); ?>
