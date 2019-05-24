<?php
/**
 * Event & Media post type
 */

if ( !class_exists( 'Tomochain_Enterprise_Post_Type' ) ) {

    class Tomochain_Enterprise_Post_Type {

        protected $prefix;

        public function __construct() {

            $this->prefix = 'tomochain';

            add_action('init', array( $this, 'tomochain_enterprise'));
            add_filter( 'template_include', array( $this, 'template_loader' ) );
        }

        function tomochain_enterprise() {
            $labels = array(
                'name'               => esc_html__( 'Enterprise', 'tomochain-addons' ),
                'singular_name'      => esc_html__( 'Publication', 'tomochain-addons' ),
                'menu_name'          => esc_html__( 'Enterprise', 'tomochain-addons' ),
                'add_new'            => esc_html__( 'Add New', 'tomochain-addons' ) ,
                'add_new_item'       => esc_html__( 'Add New Post', 'tomochain-addons' ) ,
                'edit_item'          => esc_html__( 'Edit Post', 'tomochain-addons' ) ,
                'new_item'           => esc_html__( 'Add New Post', 'tomochain-addons' ) ,
                'view_item'          => esc_html__( 'View Post', 'tomochain-addons' ) ,
                'search_items'       => esc_html__( 'Search Post', 'tomochain-addons' ) ,
                'all_items'          => esc_html__( 'All Post', 'tomochain-addons' ) ,
                'not_found'          => esc_html__( 'No Post items found', 'tomochain-addons' ) ,
                'not_found_in_trash' => esc_html__( 'No Post items found in trash', 'tomochain-addons' ) ,
                'parent_item_colon'  => '',
            );

            $args = array(
                'labels'                => $labels,
                'description'           => esc_html__( 'Display Post', 'tomochain-addons' ),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'menu_icon'             => 'dashicons-groups',
                'menu_position'         => 5,
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
                'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
                'rewrite'           => array(
                    'slug'          => 'publication',
                    'with_front'    => false
                ) ,
            );

            register_post_type( 'enterprise', $args );

            // Register a taxonomy for Events Categories.
            $category_labels = array(
                'name'                          => esc_html__( 'Post Categories', 'tomochain-addons' ) ,
                'singular_name'                 => esc_html__( 'Post Category', 'tomochain-addons') ,
                'menu_name'                     => esc_html__( 'Post Category', 'tomochain-addons' ) ,
                'all_items'                     => esc_html__( 'All Post Categories', 'tomochain-addons' ) ,
                'edit_item'                     => esc_html__( 'Edit Post Category', 'tomochain-addons' ) ,
                'view_item'                     => esc_html__( 'View Post Category', 'tomochain-addons' ) ,
                'update_item'                   => esc_html__( 'Update Post Category', 'tomochain-addons' ) ,
                'add_new_item'                  => esc_html__( 'Add New Post Category', 'tomochain-addons' ) ,
                'new_item_name'                 => esc_html__( 'New Post Category Name', 'tomochain-addons' ) ,
                'parent_item'                   => esc_html__( 'Parent Post Category', 'tomochain-addons' ) ,
                'parent_item_colon'             => esc_html__( 'Parent Post Category:', 'tomochain-addons' ) ,
                'search_items'                  => esc_html__( 'Search Post Category', 'tomochain-addons' ) ,
                'popular_items'                 => esc_html__( 'Popular Post Category', 'tomochain-addons') ,
                'separate_items_with_commas'    => esc_html__( 'Separate Post Category with commas', 'tomochain-addons' ) ,
                'add_or_remove_items'           => esc_html__( 'Add or remove Post Category', 'tomochain-addons' ) ,
                'choose_from_most_used'         => esc_html__( 'Choose from the most used Post Categories', 'tomochain-addons' ) ,
                'not_found'                     => esc_html__( 'No Post Category found', 'tomochain-addons' ) ,
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
                    'slug'          => 'publications',
                    'with_front'    => false
                ) ,
            );
            register_taxonomy('enterprise_cat', array(
                'enterprise'
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
            if ( is_singular( 'enterprise' ) ) {
                $default_file = 'single-enterprise.php';
            } elseif ( is_tax( get_object_taxonomies( 'enterprise' )) || is_post_type_archive( 'enterprise' )) {
                    $default_file = 'archive-enterprise.php';
            } else {
                $default_file = '';
            }
            return $default_file;
        }

    }

    new Tomochain_Enterprise_Post_Type;
}
