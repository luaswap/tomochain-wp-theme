<?php
/**
 * Dapp & Media post type
 */

if ( !class_exists( 'Tomochain_Dapp_Post_Type' ) ) {

    class Tomochain_Dapp_Post_Type {

        protected $prefix;

        public function __construct() {

            $this->prefix = 'tomochain';

            add_action('init', array( $this, 'tomochain_dapp'));
            add_filter( 'template_include', array( $this, 'template_loader' ) );

            if( is_admin() ) {
                add_filter( 'manage_dapps_posts_columns', array( $this, 'add_columns' ) );
                add_action( 'manage_dapps_posts_custom_column', array( $this, 'set_columns_value'), 10, 2);
            }
        }

        function tomochain_dapp() {
            $labels = array(
                'name'               => esc_html__( 'Dapps', 'tomochain-addons' ),
                'singular_name'      => esc_html__( 'Dapp', 'tomochain-addons' ),
                'menu_name'          => esc_html__( 'Dapps', 'tomochain-addons' ),
                'add_new'            => esc_html__( 'Add New', 'tomochain-addons' ) ,
                'add_new_item'       => esc_html__( 'Add New Dapp', 'tomochain-addons' ) ,
                'edit_item'          => esc_html__( 'Edit Dapp', 'tomochain-addons' ) ,
                'new_item'           => esc_html__( 'Add New Dapp', 'tomochain-addons' ) ,
                'search_items'       => esc_html__( 'Search Dapp', 'tomochain-addons' ) ,
                'all_items'          => esc_html__( 'All Dapps', 'tomochain-addons' ) ,
                'not_found'          => esc_html__( 'No Dapp items found', 'tomochain-addons' ) ,
                'not_found_in_trash' => esc_html__( 'No Dapp items found in trash', 'tomochain-addons' ) ,
                'parent_item_colon'  => '',
            );

            $args = array(
                'labels'              => $labels,
                'public'              => true,
                'description'         => esc_html__( 'Display Dapp', 'tomochain-addons' ),
                'exclude_from_search' => false,
                'menu_icon'           => 'dashicons-networking',
                'has_archive'         => true,
                'show_in_admin_bar'   => true,
                'show_in_nav_menus'   => true,
                'publicly_queryable'  => true,
                'capability_type'     => 'post',
                'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
                'rewrite'           => array(
                    'slug'          => 'dapps',
                    'with_front'    => false
                )
            );

            register_post_type( 'dapp', $args );

            // Register a taxonomy for Dapps Categories.
            $category_labels = array(
                'name'                          => esc_html__( 'Dapp Categories', 'tomochain-addons' ) ,
                'singular_name'                 => esc_html__( 'Dapp Category', 'tomochain-addons') ,
                'menu_name'                     => esc_html__( 'Dapp Category', 'tomochain-addons' ) ,
                'all_items'                     => esc_html__( 'All Dapp Categories', 'tomochain-addons' ) ,
                'edit_item'                     => esc_html__( 'Edit Dapp Category', 'tomochain-addons' ) ,
                'view_item'                     => esc_html__( 'View Dapp Category', 'tomochain-addons' ) ,
                'update_item'                   => esc_html__( 'Update Dapp Category', 'tomochain-addons' ) ,
                'add_new_item'                  => esc_html__( 'Add New Dapp Category', 'tomochain-addons' ) ,
                'new_item_name'                 => esc_html__( 'New Dapp Category Name', 'tomochain-addons' ) ,
                'parent_item'                   => esc_html__( 'Parent Dapp Category', 'tomochain-addons' ) ,
                'parent_item_colon'             => esc_html__( 'Parent Dapp Category:', 'tomochain-addons' ) ,
                'search_items'                  => esc_html__( 'Search Dapp Category', 'tomochain-addons' ) ,
                'popular_items'                 => esc_html__( 'Popular Dapp Category', 'tomochain-addons') ,
                'separate_items_with_commas'    => esc_html__( 'Separate Dapp Category with commas', 'tomochain-addons' ) ,
                'add_or_remove_items'           => esc_html__( 'Add or remove Dapp Category', 'tomochain-addons' ) ,
                'choose_from_most_used'         => esc_html__( 'Choose from the most used Dapp Categories', 'tomochain-addons' ) ,
                'not_found'                     => esc_html__( 'No Dapp Category found', 'tomochain-addons' ) ,
            );

            $category_args = array(
                'labels'            => $category_labels,
                'public'            => true,
                'show_ui'           => true,
                'show_in_nav_menus' => true,
                'show_tagcloud'     => true,
                'show_admin_column' => true,
                'hierarchical'      => true,
                'query_var'         => true,
                'rewrite'           => array(
                    'slug'          => 'dapp-category',
                    'with_front'    => false
                ) ,
            );
            register_taxonomy('dapp_category', array(
                'dapp'
            ) , $category_args);

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
            if ( is_post_type_archive( 'dapp' ) || is_tax( 'dapp_category' ) ) {
                $default_file = 'archive-dapp.php';
            } else {
                $default_file = '';
            }
            return $default_file;
        }

        // Add columns to Dapp
        function add_columns($columns) {
            $columns['title'] = esc_html__( 'Title', 'tomochain-addons');
            $columns['thumbnail'] = esc_html__( 'Thumbnail', 'tomochain-addons' );
            $columns['start_dapp'] = esc_html__( 'Start Dapp', 'tomochain-addons' );
            $columns['close_dapp'] = esc_html__( 'Close Dapp', 'tomochain-addons' );

            return $columns;
        }

        // Set values for columns
        function set_columns_value($column, $post_id) {
            switch ($column) {
                case 'id': {
                    echo wp_kses_post($post_id);
                    break;
                }
                case 'start_dapp': {
                    echo get_post_meta($post_id, 'start_dapp', true);
                    break;
                }
                case 'close_dapp': {
                    echo get_post_meta($post_id, 'close_dapp', true);
                    break;
                }
                case 'thumbnail': {
                    echo get_the_post_thumbnail($post_id, array(80,80));
                    break;
                }
            }
        }
    }

    new Tomochain_Dapp_Post_Type;
}
