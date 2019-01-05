<?php
/**
 * Plugin Name: TomoChain Addons
 * Description: A collection of shortcodes for WPBakery Pabe Builder. It was made for TomoChain website.
 * Author: TomoChain
 * Author URI: http://tomochain.com
 * Version: 1.1
 * Text Domain: tomochain-addons
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'TOMOCHAIN_ADDONS_DIR', plugin_dir_path( __FILE__ ) );
define( 'TOMOCHAIN_ADDONS_URI', plugin_dir_url( __FILE__ ) );
define( 'TOMOCHAIN_ADDONS_LIBS_URI', TOMOCHAIN_ADDONS_URI . 'assets/libs' );

class TomoChain_Addons {

    public function __construct() {
        $this->init();
        $this->includes();
    }

    public function init() {
        add_action( 'admin_notices', array( $this, 'check_dependencies' ) );
        add_action('init',array( $this, 'register_strings') );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_libs') , 1 );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        load_plugin_textdomain( 'tomochain-addons', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
    }

    /**
     * Check plugin dependencies
     * Check if Visual Composer plugin is installed
     */
    public function check_dependencies() {
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            $plugin_data = get_plugin_data( __FILE__ );

            printf( '<div class="notice notice-error"><p>%s</p></div>',
                sprintf( __( '<strong>%s</strong> requires <strong><a href="http://bit.ly/vcomposer" target="_blank">WPBakery Page Builder</a></strong> plugin to be installed and activated on your site.',
                    'tomochain-addons' ),
                    $plugin_data['Name'] ) );
        }

        $theme = wp_get_theme();
        if ('TomoChain' != $theme->name && 'TomoChain Child' != $theme->name) {
            printf( '<div class="notice notice-error"><p>%s</p></div>',
                sprintf( __( '<strong>%s</strong> requires <strong>TomoChain</strong> theme to be installed and activated on your site.',
                    'tomochain-addons' ),
                    $plugin_data['Name'] ) );
        }
    }

    public function enqueue_libs() {
        wp_register_style( 'kbw-countdown', TOMOCHAIN_ADDONS_LIBS_URI . '/kbw-countdown/css/jquery.countdown.css' );

        wp_enqueue_script( 'kbw-plugin',
            TOMOCHAIN_ADDONS_LIBS_URI . '/kbw-plugin/js/jquery.plugin.min.js',
            array( 'jquery' ),
            null,
            true );

        wp_enqueue_script( 'kbw-countdown',
            TOMOCHAIN_ADDONS_LIBS_URI . '/kbw-countdown/js/jquery.countdown.min.js',
            array( 'jquery' ),
            null,
            true );
    }

    public function enqueue_scripts() {

        $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

        wp_enqueue_style( 'tomochain-addons-css', TOMOCHAIN_ADDONS_URI . 'assets/css/tomochain-addons' . $suffix . '.css' );

        wp_enqueue_script( 'tomochain-addons-js',
            TOMOCHAIN_ADDONS_URI . 'assets/js/tomochain-addons' . $suffix . '.js',
            array('jquery'),
            null,
            true );
    }

    /**
     * Load files
     */
    public function includes() {

        require_once TOMOCHAIN_ADDONS_DIR . 'inc/core-functions.php';

        if ( defined( 'WPB_VC_VERSION' ) ) {
            require_once TOMOCHAIN_ADDONS_DIR . 'inc/vc-extend.php';
        }

        /**
         * Event Post Type
         */
        require_once TOMOCHAIN_ADDONS_DIR . '/inc/post-types/post-types.php';
        /**
         * Widgets
         */
        require_once TOMOCHAIN_ADDONS_DIR . '/inc/widgets/wph-widget-class.php';
        require_once TOMOCHAIN_ADDONS_DIR . '/inc/widgets/tomochain-address.php';
        require_once TOMOCHAIN_ADDONS_DIR . '/inc/widgets/tomochain-recent-posts.php';
        require_once TOMOCHAIN_ADDONS_DIR . '/inc/widgets/tomochain-event.php';

        if (defined('SENDGRID_CATEGORY')) {
            require_once TOMOCHAIN_ADDONS_DIR . '/inc/widgets/tomochain-sendgrid.php';
        }
    }

    /**
     * Register String for Polylang
     */
    public function register_strings() {
        if (function_exists('pll_register_string') ) {
            pll_register_string('tomochain_q1', 'Q1');
            pll_register_string('tomochain_q2', 'Q2');
            pll_register_string('tomochain_q3', 'Q3');
            pll_register_string('tomochain_q4', 'Q4');
            pll_register_string('tomochain_quarter_string', '%%quarter%% / %%year%%');
        }
    }
}

new TomoChain_Addons();
