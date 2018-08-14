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

/**
 * Mobile menu button
 */
function tomochain_mobile_menu_btn() {
    ob_start();
?>
    <div class="mobile-menu-btn hidden-lg-up">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 600">
            <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
            <path d="M300,320 L540,320" id="middle"></path>
            <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
        </svg>
    </div>
<?php
    echo ob_get_clean();
}

/**
 * Language Switcher
 */
function tomochain_lang_switcher() {
    ob_start();
    if (class_exists('PolyLang')) :
        if (function_exists( 'pll_languages_list' )) :
            $langs = pll_languages_list();

            if ( ! empty( $langs ) ) :
                $args = array(
                    'dropdown' => 1,
                    'raw'      => 1,
                );

                if ( function_exists( 'pll_the_languages' ) ) :
                    $langs = pll_the_languages( $args );
                    $html = '';

                    if ( ! empty ( $langs ) ) :
                        foreach ( $langs as $l ):
                            if ( $l['current_lang'] ) :
                                $html .= '<option selected="selected"';
                            else :
                                $html .= '<option';
                            endif;

                            $html .= ' value="' . esc_url( $l['url'] ) . '"';
                            $html .= '>' . $l['name'] . '</option>';
                        endforeach;
                    endif;
                    ?>
                    <div class="tomochain-lang-switcher-wrapper">
                        <select id="tomochain-lang-switcher">
                            <?php echo '' . $html; ?>
                        </select>
                    </div>
                    <?php
                endif;
            endif;
        endif;
    endif;
    echo ob_get_clean();
}
