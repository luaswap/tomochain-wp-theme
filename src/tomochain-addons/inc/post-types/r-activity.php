<?php
/**
 * Activity post type
 */

if ( !class_exists( 'Tomochain_Activity_Post_Type' ) ) {

    class Tomochain_Activity_Post_Type {

        protected $prefix;

        public function __construct() {

            $this->prefix = 'tomochain';

            add_action('init', array( $this, 'tomochain_activity'));
        }

        function tomochain_activity() {
            $labels = array(
                'name'               => esc_html__( 'Recent Activities', 'tomochain-addons' ),
                'singular_name'      => esc_html__( 'Recent Activity', 'tomochain-addons' ),
                'menu_name'          => esc_html__( 'Recent Activities', 'tomochain-addons' ),
                'add_new'            => esc_html__( 'Add New', 'tomochain-addons' ) ,
                'add_new_item'       => esc_html__( 'Add New Activity', 'tomochain-addons' ) ,
                'edit_item'          => esc_html__( 'Edit Activity', 'tomochain-addons' ) ,
                'new_item'           => esc_html__( 'Add New Activity', 'tomochain-addons' ) ,
                'search_items'       => esc_html__( 'Search Activity', 'tomochain-addons' ) ,
                'all_items'          => esc_html__( 'Recent Activities', 'tomochain-addons' ) ,
                'not_found'          => esc_html__( 'No Activity items found', 'tomochain-addons' ) ,
                'not_found_in_trash' => esc_html__( 'No Activity items found in trash', 'tomochain-addons' ) ,
                'parent_item_colon'  => '',
            );

            $args = array(
                'labels'              => $labels,
                'public'              => true,
                'exclude_from_search' => true,
                'menu_icon'           => 'dashicons-location',
                'show_in_menu'       => 'edit.php?post_type=road_map',
                'publicly_queryable'  => false,
                'supports'            => array( 'title', 'editor' ),
            );

            register_post_type( 'activity', $args );
        }

    }

    new Tomochain_Activity_Post_Type;
}
