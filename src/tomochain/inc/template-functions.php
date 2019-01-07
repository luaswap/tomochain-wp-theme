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

    if ( function_exists('get_field') && get_field('custom_css_class') ) {
        $classes[] = get_field('custom_css_class');
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

function tomochain_excerpt($limit) {
    $excerpt = wp_trim_words( get_the_excerpt(), $limit );
    $excerpt = preg_replace( '`\[[^\]]*\]`', '', $excerpt );

    return '<p>' . $excerpt . '</p>';
}

function tomochain_pagination() {
    global $wp_query, $wp_rewrite;

    $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
    $pagenum_link = wp_kses_post( get_pagenum_link() );
    $query_args   = array();
    $url_parts    = explode( '?', $pagenum_link );

    if ( isset( $url_parts[1] ) ) {
        wp_parse_str( $url_parts[1], $query_args );
    }

    $pagenum_link = esc_url( remove_query_arg( array_keys( $query_args ), $pagenum_link ) );
            $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

    $format = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link,
        'index.php' ) ? 'index.php/' : '';
    $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%',
        'paged' ) : '?paged=%#%';

    // Set up paginated links.
    $links                      = paginate_links( array(
        'base'      => $pagenum_link,
        'format'    => $format,
        'total'     => $wp_query->max_num_pages,
        'current'   => $paged,
        'add_args'  => array_map( 'urlencode', $query_args ),
        'prev_text' => 'prev',
        'next_text' => 'next',
        'type'      => 'list',
        'end_size'  => 3,
        'mid_size'  => 3,
    ) );

    if ( $links ) : ?>
        <div class="tomochain-pagination posts-pagination">
            <?php echo wp_kses_post( $links ); ?>
        </div><!-- .pagination -->
    <?php
    endif;
}

if(!function_exists('tomochain_page_title')){
    function tomochain_page_title(){
        get_template_part( 'template-parts/page-title' );
    }
    add_action('tomochain_page_title', 'tomochain_page_title', 5);
}

if(!function_exists('tomochain_category_filter')){
    function tomochain_category_filter($type){
        if('post' == $type){
            $categories = get_categories( array(
                'hide_empty' => true,
                'orderby' => 'name',
                'order'   => 'ASC'
            ) );
        }elseif('event' == $type){
            $categories = get_terms( array(
                'taxonomy' => 'event_category',
                'hide_empty' => true,
                'orderby' => 'name',
                'order'   => 'ASC'
            ) );
        }
        echo '<ul class="tab-filter '.$type.'-cat-filter">';
        echo '<li><a href="'. get_post_type_archive_link($type) .'">' . esc_html__( 'All', 'tomochain' ). '</a></li> ';
        foreach( $categories as $category ) {
            $category_link = sprintf(
                '<a href="%1$s" alt="%2$s">%3$s</a>',
                esc_url( get_category_link( $category->term_id ) ),
                esc_attr( sprintf( esc_html__( 'View all posts in %s', 'tomochain' ), $category->name ) ),
                esc_html( $category->name )
            );

            echo '<li>' . sprintf( esc_html__( '%s', 'tomochain' ), $category_link ) . '</li> ';
        }
        echo '</ul>';
    }
}
if(!function_exists('tomochain_event_per_page')){
    function tomochain_event_per_page( $query ) {
        $per_page = get_field('event_per_page','options') ? get_field('event_per_page','options') : 12;

        if ( !is_admin() && $query->is_main_query() && (is_post_type_archive( 'event' ) || is_tax('event_category')) ) {
           $query->set( 'posts_per_page', $per_page );
        }
    }
    add_filter( 'pre_get_posts', 'tomochain_event_per_page' );
}

