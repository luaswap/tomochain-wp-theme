<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package st
 */
get_header();
?>
<main id="main" class="site-main">

    <div class="container">
        <div class="row">
            <div class="site-content">
                <div class="post-content">
                    <?php
                    while ( have_posts() ) :
                        the_post();

                        get_template_part( 'template-parts/content', 'single' );

                        the_post_navigation();

                        get_template_part( 'template-parts/content', 'related' );
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</main><!-- #main -->

<?php
get_footer();
