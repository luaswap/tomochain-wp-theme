<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package tomochain
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function tomochain_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'tomochain_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function tomochain_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'tomochain_pingback_header' );

/**
 * Social links
 *
*/
function tomochain_social_links() {
    ob_start();

    if (have_rows('social', 'option')) : ?>
        <ul class="list-inline social-links">
            <?php while (have_rows('social', 'option')) : the_row(); ?>
                <li class="list-inline-item social-links__items">
                    <a class="social-links__link" href="<?php echo esc_url(the_sub_field('url')); ?>">
                        <span><?php echo the_sub_field('icon-class'); ?></span>
                        <i class="fab fa-<?php echo esc_attr(the_sub_field('icon-class')); ?>"></i>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif;

    echo ob_get_clean();
}
