<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package tomochain
 */
get_header();
?>

    <div id="primary" class="content-area tomo_detail">
        <main id="main" class="site-main">
        <?php do_action('tomochain_page_title');?>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <?php
                    while ( have_posts() ) :
                        the_post();

                        get_template_part( 'template-parts/content', 'single' );

                        the_post_navigation();

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>
                </div>
                <div class="col-12 col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
