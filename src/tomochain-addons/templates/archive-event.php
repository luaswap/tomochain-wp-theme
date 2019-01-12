<?php
/**
 * Event Achive page
 */
get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php do_action( 'tomochain_page_title' );?>

        <div class="container">
            <?php
            if ( get_field( 'event_filter', 'options') ) {
                tomochain_category_filter( 'event' );
            }
            ?>
            <div class="tomo-archive-wrapper">
                <div class="archive-posts">
                    <div class="row">
                        <?php
                        if ( have_posts() ) :
                            /* Start the Loop */
                            while ( have_posts() ) :
                                the_post();
                                tomochain_get_template( 'content-event.php' );
                            endwhile;
                        else :
                            tomochain_get_template( 'no-events-found.php' );
                        endif;
                    ?>
                    </div>

                    <?php tomochain_pagination(); ?>

                </div>
            </div>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
