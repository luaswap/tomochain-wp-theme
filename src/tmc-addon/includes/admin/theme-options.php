<?php
/**
 * TMC Theme Options with CMB2
 * @version 0.1.0
 */
class TMC_Theme_Options {
	/**
	 * Holds an instance of the project
	 *
	 * @TMC_Theme_Options
	 **/
	protected static $instance = null;
	/**
	 * Constructor
	 * @since 0.1.0
	 */
	protected function __construct() {}
	/**
	 * Get the running object
	 *
	 * @return TMC_Theme_Options
	 **/
	public static function get_instance() {
		if( is_null( self::$instance ) ) {
			self::$instance = new self();
			self::$instance->hooks();
		}
		return self::$instance;
	}
	/**
	 * Initiate our hooks
	 * @since 0.1.0
	 */
	public function hooks() {
		add_action( 'cmb2_admin_init', array( $this, 'theme_options_metabox' ) );
		// add_action( 'current_screen', array( $this, 'maybe_save' ) );
		// add_filter( 'admin_footer' , array( $this , 'maybe_hookup_fields' ), 2 ); /* Early before all scripts are output. */
	}
	public function theme_options_metabox() {
		/**
		 * Registers options page menu item and form.
		 */
		$cmb_options = new_cmb2_box( array(
			'id'           => 'tmc_option_metabox',
			'title'        => esc_html__( 'Theme Options', 'tmc' ),
			'object_types' => array( 'options-page' ),
			/*
			 * The following parameters are specific to the options-page box
			 * Several of these parameters are passed along to add_menu_page()/add_submenu_page().
			 */
			'option_key'      => 'tmc_options', // The option key and admin menu page slug.
			// 'icon_url'        => 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
			// 'menu_title'      => esc_html__( 'Options', 'tmc' ), // Falls back to 'title' (above).
			// 'parent_slug'     => 'themes.php', // Make options page a submenu item of the themes menu.
			// 'capability'      => 'manage_options', // Cap required to view options-page.
			// 'position'        => 1, // Menu position. Only applicable if 'parent_slug' is left empty.
			// 'admin_menu_hook' => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
			// 'display_cb'      => false, // Override the options-page form output (CMB2_Hookup::options_page_output()).
			// 'save_button'     => esc_html__( 'Save Theme Options', 'tmc' ), // The text for the options-page save button. Defaults to 'Save'.
		) );
		/*
		 * Options fields ids only need
		 * to be unique within this box.
		 * Prefix is not needed.
		 */
		$cmb_options->add_field( array(
			'name' => __( 'Test Text', 'tmc' ),
			'desc' => __( 'field description (optional)', 'tmc' ),
			'id'   => 'test_text',
			'type' => 'text',
			'default' => 'Default Text',
		) );
		$cmb_options->add_field( array(
			'name'    => __( 'Test Color Picker', 'tmc' ),
			'desc'    => __( 'field description (optional)', 'tmc' ),
			'id'      => 'test_colorpicker',
			'type'    => 'colorpicker',
			'default' => '#bada55',
		) );
	}

}
/**
 * Helper function to get/return the TMC_Theme_Options object
 * @since  0.1.0
 * @return TMC_Theme_Options object
 */
function tmc_settings() {
	return TMC_Theme_Options::get_instance();
}
/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string $key     Options array key
 * @param  mixed  $default Optional default value
 * @return mixed           Option value
 */
function tmc_get_option( $key = '', $default = false ) {
	if ( function_exists( 'cmb2_get_option' ) ) {
		// Use cmb2_get_option as it passes through some key filters.
		return cmb2_get_option( tmc_settings()->key, $key, $default );
	}
	// Fallback to get_option if CMB2 is not loaded yet.
	$opts = get_option( tmc_settings()->key, $default );
	$val = $default;
	if ( 'all' == $key ) {
		$val = $opts;
	} elseif ( is_array( $opts ) && array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
		$val = $opts[ $key ];
	}
	return $val;
}
// Get it started
tmc_settings();