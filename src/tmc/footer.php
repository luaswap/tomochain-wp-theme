<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package st
 */

?>

    </div><!-- #content -->
    <?php if (!is_404()): ?>
    <footer id="colophon" class="site-footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                        <div class="sidebar-footer">
                            <?php 
                            $i = 0; 
                            while ( $i < 4 ) : $i ++;
                                echo '<div class="col-3">';
                                dynamic_sidebar( 'tmc-footer-' . $i );
                                echo '</div>';
                            endwhile;
                             ?>
                        </div>
                </div>
            </div>
        </div>
        <div class="site-info">
            <div class="container">
                <?php
                printf( esc_html__( 'Copyright &copy; %1$s by %2$s.', 'tmc' ), date('Y'), 'Tomochain' );
                ?>
            </div>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
    <?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
