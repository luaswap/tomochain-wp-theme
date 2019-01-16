<?php

function tomochain_get_shortcode_id($name) {
    global $tomochain_shortcode_id;

    if ( ! $tomochain_shortcode_id ) {
        $tomochain_shortcode_id = 1;
    }

    return $name . '-' . ( $tomochain_shortcode_id ++ );
}

function tomochain_text2line( $str ) {
    return trim( preg_replace( "/[\r\v\n\t]*/", '', $str ) );
}

function tomochain_locate_template( $template_name, $template_path = '', $default_path = '' ) {
    if ( ! $template_path ) {
        $template_path = TOMOCHAIN_ADDONS_DIR . '/templates/';
    }

    if ( ! $default_path ) {
        $default_path = TOMOCHAIN_ADDONS_DIR . '/templates/';
    }

    // Look within passed path within the theme - this is priority.
    $template = locate_template(
        array(
            trailingslashit( $template_path ) . $template_name,
            $template_name,
        )
    );

    if ( ! $template ) {
        $template = $default_path . $template_name;
    }

    return apply_filters( 'tomochain_locate_template', $template, $template_name, $template_path );
}

function tomochain_get_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
    if ( ! empty( $args ) && is_array( $args ) ) {
        extract( $args );
    }

    $located = tomochain_locate_template( $template_name, $template_path, $default_path );

    if ( ! file_exists( $located ) ) {
       return;
    }

    $located = apply_filters( 'tomochain_get_template', $located, $template_name, $args, $template_path, $default_path );

    include $located;
}
function tomochain_dapp_pagination($object) {
    global $wp_rewrite;
    // Don't print empty markup if there's only one page.
    if ( $object->max_num_pages < 2 ) {
        return;
    }
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
        'total'     => $object->max_num_pages,
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