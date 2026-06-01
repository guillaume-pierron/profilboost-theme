<?php get_header(); ?>

<div class="container" style="padding: 60px 24px;">
  <h1 class="section-title" style="text-align:left;margin-bottom:32px;">Blog</h1>
  <?php if (have_posts()) : ?>
    <div class="res-grid">
      <?php while (have_posts()) : the_post(); ?>
        <a href="<?php the_permalink(); ?>" class="res-card">
          <?php if (has_post_thumbnail()) : ?>
            <div class="res-card-cover" style="background-image: linear-gradient(145deg, rgba(10,22,40,.50), rgba(30,64,175,.40)), url('<?php echo esc_url(get_the_post_thumbnail_url(null, 'medium')); ?>'); background-size: cover; background-position: center;">
          <?php else : ?>
            <div class="res-card-cover rc-cv">
          <?php endif; ?>
            <span class="res-cat-badge"><?php the_category(', '); ?></span>
          </div>
          <div class="res-card-body">
            <h3 class="res-card-title"><?php the_title(); ?></h3>
            <p class="res-card-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
            <div class="res-card-meta">
              <span class="res-read-time"><?php echo get_the_date(); ?></span>
              <span class="res-card-link">Lire <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
            </div>
          </div>
        </a>
      <?php endwhile; ?>
    </div>
    <div style="margin-top:40px; text-align:center;">
      <?php the_posts_pagination(['mid_size' => 2]); ?>
    </div>
  <?php else : ?>
    <p style="color: var(--gray-500);">Aucun article publié pour le moment.</p>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
