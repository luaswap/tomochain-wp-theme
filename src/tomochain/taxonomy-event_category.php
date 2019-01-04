<?php
/**
 * Event Achive page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tomochain
 */
get_header();
?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="event-content-tomo">
                <?php do_action('tomochain_heading');?>
                <div class="container">
                    <?php
                    $event_filter = get_field('event_filter','options');
                    if($event_filter)
                        tomochain_category_filter('event');
                    ?>
                    <div class="tomo-main-archive">
                        <div class="spinner">
                            <div class="rect1"></div>
                            <div class="rect2"></div>
                            <div class="rect3"></div>
                            <div class="rect4"></div>
                            <div class="rect5"></div>
                        </div>
                        <div class="archive-posts">
                            <div class="row">
                                <?php
                                if ( have_posts() ) :
                                    /* Start the Loop */
                                    while ( have_posts() ) :
                                        the_post();
                                            get_template_part( 'template-parts/content', 'event' );
                                    endwhile;
                                else :
                                    get_template_part( 'template-parts/content', 'none' );
                                endif;
                            ?>
                            </div>
                            <?php tomochain_pagination(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();