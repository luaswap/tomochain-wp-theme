<?php
/**
 * Import Post Type
 */

if( ! class_exists( 'Tomochain_Add_Posttypes' ) ) {

	class Tomochain_Add_Posttypes {

		public function __construct() {
            $this->includes();
		}

		public function includes() {
			require_once( TOMOCHAIN_ADDONS_DIR . '/inc/post-types/event.php');
			require_once( TOMOCHAIN_ADDONS_DIR . '/inc/post-types/dapp.php');
			require_once( TOMOCHAIN_ADDONS_DIR . '/inc/post-types/road-map.php');
			require_once( TOMOCHAIN_ADDONS_DIR . '/inc/post-types/r-activity.php');
		}
    }

	new Tomochain_Add_Posttypes;
}
