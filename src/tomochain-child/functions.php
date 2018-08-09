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
        wp_enqueue_style( 'tomochain-main-style', trailingslashit( TOMOCHAIN_THEME_URI ) . 'style.css' );
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
