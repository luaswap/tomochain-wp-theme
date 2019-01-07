<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tomochain
 */
get_header();
$class = '';
if('post' == get_post_type()){
    $class = 'blog-content-tomo'; // Get style for Blog
}else{
    $class = 'archive-content-'.get_post_type();
}
?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="<?php echo esc_attr($class);?>">
                <?php do_action('tomochain_page_title');?>
                <div class="container">
                    <?php
                    $blog_filter = get_field('blog_filter','options');
                    if($blog_filter)
                        tomochain_category_filter(get_post_type());
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
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
