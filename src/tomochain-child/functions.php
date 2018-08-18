<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue child scripts
 */
add_action( 'wp_enqueue_scripts', 'tomochain_child_enqueue_scripts' );
if ( ! function_exists( 'tomochain_child_enqueue_scripts' ) ) {

    function tomochain_child_enqueue_scripts() {
        $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

        wp_enqueue_style( 'tomochain-style', trailingslashit( TOMOCHAIN_THEME_URI ) . 'style' . $suffix . '.css' );
        wp_enqueue_style( 'tomochain-child-style', trailingslashit( TOMOCHAIN_CHILD_THEME_URI ) . 'style.css' );
        // wp_enqueue_script( 'tomochain-child-script',
        // 	trailingslashit( TOMOCHAIN_CHILD_THEME_URI ) . '/assets/js/script.js',
        // 	array( 'jquery' ),
        // 	null,
        // 	true );

        // Enqueue BS Script for Dev.
        $url = sprintf( 'http://%s:3000/browser-sync/browser-sync-client.js', $_SERVER['SERVER_NAME'] );
        $ch  = curl_init();
        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        $header = curl_exec( $ch );
        curl_close( $ch );
        if ( $header && strpos( $header[0], '400' ) === false ) {
            wp_enqueue_script( '__bs_script__', $url, array(), null, true );
        }
    }
}

/**
 * Coming soon
 */
function tomochain_get_pages_ids_from_template($name) {
    $pages = get_pages( array(
        'meta_key'   => '_wp_page_template',
        'meta_value' => $name . '.php',
    ) );

    $arr = array();

    foreach ( $pages as $page ) {
        $arr[] = $page->ID;
    }

    return $arr;
}

add_action( 'template_redirect', 'tomochain_redirect');
function tomochain_redirect() {

    if (is_user_logged_in()) {
        return;
    }

    $page_id = tomochain_get_pages_ids_from_template( 'coming-soon' );
    $page_id = current( $page_id );

    if ( ! is_page( $page_id ) && ! is_user_logged_in() && ! is_front_page() ) {
        wp_redirect( get_permalink( $page_id ) );
        exit();
    }
}
