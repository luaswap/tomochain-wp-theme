<?php
/*
* Import Post Type
 * @package    Tomochain
 * @version    1.0.0
 * @author     Administrator
 * @copyright  Copyright (c) 2018, Tomochain
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://tomochain.com
*/

if( ! class_exists( 'Tomochain_Add_Posttypes' ) ) {

	class Tomochain_Add_Posttypes {

		public function __construct() {
            $this->includes();
		}

		public function includes() {
			require_once( TOMOCHAIN_ADDONS_DIR . '/inc/post-types/event.php');
		}
    }

	new Tomochain_Add_Posttypes;
}
