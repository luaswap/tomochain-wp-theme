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
    <footer id="colophon" class="site-footer ldp">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="site-info text-center">
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
