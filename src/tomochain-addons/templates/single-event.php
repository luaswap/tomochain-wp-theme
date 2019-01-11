<?php

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

                        tomochain_get_template( 'content-single-event.php' );

                    endwhile;
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
