<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tomochain
 */

?>

    </div><!-- #content -->
    <?php if (!is_404()): ?>
    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="logo-footer">
                        <?php the_custom_logo(); ?>
                        <h2 class="tomochain-name"><?php echo esc_html__('TomoChain','tomochain');?></h2>
                    </div>
                    <div class="sidebar-footer">
                        <?php dynamic_sidebar( 'sidebar-footer' ); ?>
                    </div>

                    <div class="site-info">
                        <?php
                        printf( esc_html__( 'Copyright &copy; %1$s by %2$s.', 'tomochain' ), date('Y'), 'TomoChain Pte. Ltd' );
                        ?>
                    </div><!-- .site-info -->
                </div>
            </div>
        </div>
    </footer><!-- #colophon -->
    <?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
