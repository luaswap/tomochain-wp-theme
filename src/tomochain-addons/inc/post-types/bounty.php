<?php
/**
 * Bounty post type
 */

if ( !class_exists( 'Tomochain_Bounty_Post_Type' ) ) {

    class Tomochain_Bounty_Post_Type {

        protected $prefix;

        public function __construct() {

            $this->prefix = 'tomochain';

            add_action('init', array( $this, 'tomochain_bounty'));
            add_filter( 'template_include', array( $this, 'template_loader' ) );
        }

        function tomochain_bounty() {
            $labels = array(
                'name'               => esc_html__( 'Bounty', 'tomochain-addons' ),
                'singular_name'      => esc_html__( 'Bounty', 'tomochain-addons' ),
                'menu_name'          => esc_html__( 'Bounty', 'tomochain-addons' ),
                'add_new'            => esc_html__( 'Add New', 'tomochain-addons' ) ,
                'add_new_item'       => esc_html__( 'Add New Bounty', 'tomochain-addons' ) ,
                'edit_item'          => esc_html__( 'Edit Bounty', 'tomochain-addons' ) ,
                'new_item'           => esc_html__( 'Add New Bounty', 'tomochain-addons' ) ,
                'view_item'          => esc_html__( 'View Bounty', 'tomochain-addons' ) ,
                'search_items'       => esc_html__( 'Search Bounty', 'tomochain-addons' ) ,
                'all_items'          => esc_html__( 'All Bouties', 'tomochain-addons' ) ,
                'not_found'          => esc_html__( 'No Bounty items found', 'tomochain-addons' ) ,
                'not_found_in_trash' => esc_html__( 'No Bounty items found in trash', 'tomochain-addons' ) ,
                'parent_item_colon'  => '',
            );

            $args = array(
                'labels'                => $labels,
                'description'           => esc_html__( 'Display Bounty', 'tomochain-addons' ),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'menu_icon'             => 'dashicons-lightbulb',
                'menu_position'         => 5,
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
                'supports'              => array( 'title', 'editor', 'excerpt' ),
            );

            register_post_type( 'bounty', $args );

            // Register a taxonomy for Bounty.
            $project_labels = array(
                'name'                          => esc_html__( 'Project', 'tomochain-addons' ) ,
                'singular_name'                 => esc_html__( 'Project', 'tomochain-addons') ,
                'menu_name'                     => esc_html__( 'Project', 'tomochain-addons' ) ,
                'all_items'                     => esc_html__( 'All Projects', 'tomochain-addons' ) ,
                'edit_item'                     => esc_html__( 'Edit Project', 'tomochain-addons' ) ,
                'view_item'                     => esc_html__( 'View Project', 'tomochain-addons' ) ,
                'update_item'                   => esc_html__( 'Update Project', 'tomochain-addons' ) ,
                'add_new_item'                  => esc_html__( 'Add New Project', 'tomochain-addons' ) ,
                'new_item_name'                 => esc_html__( 'New Project Name', 'tomochain-addons' ) ,
                'parent_item'                   => esc_html__( 'Parent Project', 'tomochain-addons' ) ,
                'parent_item_colon'             => esc_html__( 'Parent Project:', 'tomochain-addons' ) ,
                'search_items'                  => esc_html__( 'Search Project', 'tomochain-addons' ) ,
                'popular_items'                 => esc_html__( 'Popular Project', 'tomochain-addons') ,
                'separate_items_with_commas'    => esc_html__( 'Separate Project with commas', 'tomochain-addons' ) ,
                'add_or_remove_items'           => esc_html__( 'Add or remove Project', 'tomochain-addons' ) ,
                'choose_from_most_used'         => esc_html__( 'Choose from the most used Bounty Categories', 'tomochain-addons' ) ,
                'not_found'                     => esc_html__( 'No Project found', 'tomochain-addons' ) ,
            );

            $project_args = array(
                'labels'            => $project_labels,
                'public'            => false,
                'show_ui'           => true,
                'show_in_nav_menus' => true,
                'show_tagcloud'     => true,
                'show_admin_column' => true,
                'hierarchical'      => true,
                'query_var'         => true,
            );
            register_taxonomy('project', array(
                'bounty'
            ) , $project_args);

            // Register a taxonomy for Bounty.
            $status_labels = array(
                'name'                          => esc_html__( 'Status', 'tomochain-addons' ) ,
                'singular_name'                 => esc_html__( 'Status', 'tomochain-addons') ,
                'menu_name'                     => esc_html__( 'Status', 'tomochain-addons' ) ,
                'all_items'                     => esc_html__( 'All Statuss', 'tomochain-addons' ) ,
                'edit_item'                     => esc_html__( 'Edit Status', 'tomochain-addons' ) ,
                'view_item'                     => esc_html__( 'View Status', 'tomochain-addons' ) ,
                'update_item'                   => esc_html__( 'Update Status', 'tomochain-addons' ) ,
                'add_new_item'                  => esc_html__( 'Add New Status', 'tomochain-addons' ) ,
                'new_item_name'                 => esc_html__( 'New Status Name', 'tomochain-addons' ) ,
                'parent_item'                   => esc_html__( 'Parent Status', 'tomochain-addons' ) ,
                'parent_item_colon'             => esc_html__( 'Parent Status:', 'tomochain-addons' ) ,
                'search_items'                  => esc_html__( 'Search Status', 'tomochain-addons' ) ,
                'popular_items'                 => esc_html__( 'Popular Status', 'tomochain-addons') ,
                'separate_items_with_commas'    => esc_html__( 'Separate Status with commas', 'tomochain-addons' ) ,
                'add_or_remove_items'           => esc_html__( 'Add or remove Status', 'tomochain-addons' ) ,
                'choose_from_most_used'         => esc_html__( 'Choose from the most used Bounty Categories', 'tomochain-addons' ) ,
                'not_found'                     => esc_html__( 'No Status found', 'tomochain-addons' ) ,
            );

            $status_args = array(
                'labels'            => $status_labels,
                'public'            => false,
                'show_ui'           => true,
                'show_in_nav_menus' => true,
                'show_tagcloud'     => true,
                'show_admin_column' => true,
                'hierarchical'      => true,
                'query_var'         => true,
            );
            register_taxonomy('status', array(
                'bounty'
            ) , $status_args);

        }

        public static function template_loader( $template ) {
            if ( is_embed() ) {
                return $template;
            }
            $default_file = self::get_template_loader_default_file();

            if ( $default_file ) {
                $template     = locate_template( $default_file );
                if ( ! $template ) {
                    $template = TOMOCHAIN_ADDONS_DIR . '/templates/' . $default_file;
                }
            }
            return $template;
        }

        private static function get_template_loader_default_file() {
            if ( is_singular( 'bounty' ) ) {
                $default_file = 'single-bounty.php';
            } else {
                $default_file = '';
            }
            return $default_file;
        }
    }

    new Tomochain_Bounty_Post_Type;
}
