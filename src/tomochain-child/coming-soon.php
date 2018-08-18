<?php
/* Template name: Coming Soon */

get_header(); ?>
<div class="coming-soon-content">
    <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php the_content(); ?>
        </article><!-- #post -->
    <?php endwhile; ?>
</div><!-- .site-content -->

<?php
get_footer();
