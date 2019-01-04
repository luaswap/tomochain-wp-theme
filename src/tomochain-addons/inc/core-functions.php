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
