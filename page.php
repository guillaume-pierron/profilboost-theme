<?php get_header(); ?>

<div class="container" style="padding: 60px 24px; max-width: 860px;">
  <?php while (have_posts()) : the_post(); ?>
    <h1 class="section-title" style="text-align:left; margin-bottom: 24px;"><?php the_title(); ?></h1>
    <div style="font-size: 15px; color: var(--gray-500); line-height: 1.8;">
      <?php the_content(); ?>
    </div>
  <?php endwhile; ?>
</div>

<?php get_footer(); ?>
