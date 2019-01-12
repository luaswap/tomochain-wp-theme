<?php
/**
 * Archive pages
 */
get_header();

$class = '';

?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php do_action( 'tomochain_page_title' );?>

        <div class="container">
            <?php
                if ( get_field( 'blog_filter','options' ) ) {
                    tomochain_category_filter( get_post_type() );
                }
            ?>
            <div class="tomo-archive-wrapper">
                <div class="archive-posts">
                    <div class="row">
                    <?php if ( have_posts() ) :
                            /* Start the Loop */
                            while ( have_posts() ) :
                                the_post();
                                get_template_part( 'template-parts/content', get_post_type() );
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
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
