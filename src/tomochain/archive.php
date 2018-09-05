<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tomochain
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

        <div class="container">
            <div class="row">
            <?php if ( have_posts() ) :
                $index = 0;
                /* Start the Loop */
                while ( have_posts() ) :
                    the_post();
                    $index++;

                    if ($index == 1) : ?>
                        <div class="col-xs-12 post-fullwidth">
                            <?php get_template_part( 'template-parts/content', 'fullwidth' ); ?>
                        </div>
                    <?php
                    else:
                        get_template_part( 'template-parts/content', get_post_type() );
                    endif;
                endwhile;
                else :
                    get_template_part( 'template-parts/content', 'none' );
                endif;
                ?>
            </div>
            <?php tomochain_pagination(); ?>
        </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
