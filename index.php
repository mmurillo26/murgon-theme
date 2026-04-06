<?php
/**
 * index.php — Fallback template
 * WordPress lo usa cuando no existe una plantilla más específica.
 * Para el home/landing, se usa front-page.php
 */
get_header(); ?>

<main id="main-content" style="padding: 120px 0 80px; min-height: 60vh;">
  <div class="container">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="max-width:760px;margin:0 auto;">
          <h1 style="font-family:var(--font-display);font-size:2rem;margin-bottom:24px;"><?php the_title(); ?></h1>
          <div class="entry-content" style="color:var(--muted);line-height:1.8;">
            <?php the_content(); ?>
          </div>
        </article>
      <?php endwhile; ?>
    <?php else : ?>
      <p style="color:var(--muted);text-align:center;padding:60px 0;">No se encontró contenido.</p>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
