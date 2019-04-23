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
    <footer id="colophon" class="site-footer not-bg ldp">
        <div class="container">
            <div class="footer-bounty">
                <div class="logo-tomo-bounty site-info">
                    <a href="<?php echo esc_url($home_url); ?>">
                        <img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/logo-roadmap.png'); ?>" alt="Logo">
                    </a>
                </div>
                <div class="site-info">
                    <nav class="main-menu">
                        <?php
                            wp_nav_menu( array(
                                'theme_location' => 'footer-menu-bounty',
                                'container_class' => 'menu-bounty',
                                'link_before'    => '<span class="menu-item-text">',
                                'link_after'     => '</span>'
                            ));
                        ?>
                    </nav>
                </div>
            </div>
        </div>
    </footer><!-- #colophon -->
    <?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
