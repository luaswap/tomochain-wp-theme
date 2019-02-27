<?php
/**
 * Road Map post type
 */

if ( !class_exists( 'Tomochain_RoadMap_Post_Type' ) ) {

    class Tomochain_RoadMap_Post_Type {

        protected $prefix;

        public function __construct() {

            $this->prefix = 'tomochain';

            add_action('init', array( $this, 'tomochain_roadmap'));
        }

        function tomochain_roadmap() {
            $labels = array(
                'name'               => esc_html__( 'Road Maps', 'tomochain-addons' ),
                'singular_name'      => esc_html__( 'Road Map', 'tomochain-addons' ),
                'menu_name'          => esc_html__( 'Road Maps', 'tomochain-addons' ),
                'add_new'            => esc_html__( 'Add New', 'tomochain-addons' ) ,
                'add_new_item'       => esc_html__( 'Add New Road Map', 'tomochain-addons' ) ,
                'edit_item'          => esc_html__( 'Edit Road Map', 'tomochain-addons' ) ,
                'new_item'           => esc_html__( 'Add New Road Map', 'tomochain-addons' ) ,
                'search_items'       => esc_html__( 'Search Road Map', 'tomochain-addons' ) ,
                'all_items'          => esc_html__( 'All Road Maps', 'tomochain-addons' ) ,
                'not_found'          => esc_html__( 'No Road Map items found', 'tomochain-addons' ) ,
                'not_found_in_trash' => esc_html__( 'No Road Map items found in trash', 'tomochain-addons' ) ,
                'parent_item_colon'  => '',
            );

            $args = array(
                'labels'              => $labels,
                'public'              => true,
                'exclude_from_search' => true,
                'menu_icon'           => 'dashicons-location',
                'show_in_admin_bar'   => false,
                'show_in_nav_menus'   => false,
                'publicly_queryable'  => false,
                'supports'            => array( 'title', 'editor' ),
                'rewrite'           => array(
                    'slug'          => 'road-map',
                    'with_front'    => false
                ) ,
            );

            register_post_type( 'road_map', $args );

            // Register a taxonomy for Road Maps Categories.
            $category_labels = array(
                'name'                          => esc_html__( 'Road Map Categories', 'tomochain-addons' ) ,
                'singular_name'                 => esc_html__( 'Road Map Category', 'tomochain-addons') ,
                'menu_name'                     => esc_html__( 'Road Map Category', 'tomochain-addons' ) ,
                'all_items'                     => esc_html__( 'All Road Map Categories', 'tomochain-addons' ) ,
                'edit_item'                     => esc_html__( 'Edit Road Map Category', 'tomochain-addons' ) ,
                'view_item'                     => esc_html__( 'View Road Map Category', 'tomochain-addons' ) ,
                'update_item'                   => esc_html__( 'Update Road Map Category', 'tomochain-addons' ) ,
                'add_new_item'                  => esc_html__( 'Add New Road Map Category', 'tomochain-addons' ) ,
                'new_item_name'                 => esc_html__( 'New Road Map Category Name', 'tomochain-addons' ) ,
                'parent_item'                   => esc_html__( 'Parent Road Map Category', 'tomochain-addons' ) ,
                'parent_item_colon'             => esc_html__( 'Parent Road Map Category:', 'tomochain-addons' ) ,
                'search_items'                  => esc_html__( 'Search Road Map Category', 'tomochain-addons' ) ,
                'popular_items'                 => esc_html__( 'Popular Road Map Category', 'tomochain-addons') ,
                'separate_items_with_commas'    => esc_html__( 'Separate Road Map Category with commas', 'tomochain-addons' ) ,
                'add_or_remove_items'           => esc_html__( 'Add or remove Road Map Category', 'tomochain-addons' ) ,
                'choose_from_most_used'         => esc_html__( 'Choose from the most used Road Map Categories', 'tomochain-addons' ) ,
                'not_found'                     => esc_html__( 'No Road Map Category found', 'tomochain-addons' ) ,
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
                    'slug'          => 'roadmap-category',
                    'with_front'    => false
                ) ,
            );
            register_taxonomy('roadmap_category', array(
                'road_map'
            ) , $category_args);

        }

    }

    new Tomochain_RoadMap_Post_Type;
}
