<?php
/**
 * Event & Media post type
 */

if ( !class_exists( 'Tomochain_Event_Post_Type' ) ) {

    class Tomochain_Event_Post_Type {

        protected $prefix;

        public function __construct() {

            $this->prefix = 'tomochain';

            add_action('init', array($this,'tomochain_event'));
            if( is_admin() ) {
                // Add custom columns reference: http://code.tutsplus.com/articles/add-a-custom-column-in-posts-and-custom-post-types-admin-screen--wp-24934
                add_filter( 'manage_events_posts_columns', array( $this, 'add_columns' ) );
                add_action( 'manage_events_posts_custom_column', array( $this, 'set_columns_value'), 10, 2);
            }
        }

        function tomochain_event() {
            $labels = array(
                'name'               => esc_html__( 'Events', 'tomochain-addons' ),
                'singular_name'      => esc_html__( 'Event', 'tomochain-addons' ),
                'menu_name'          => esc_html__( 'Events', 'tomochain-addons' ),
                'add_new'            => esc_html__( 'Add New', 'tomochain-addons' ) ,
                'add_new_item'       => esc_html__( 'Add New Event', 'tomochain-addons' ) ,
                'edit_item'          => esc_html__( 'Edit Event', 'tomochain-addons' ) ,
                'new_item'           => esc_html__( 'Add New Event', 'tomochain-addons' ) ,
                'view_item'          => esc_html__( 'View Event', 'tomochain-addons' ) ,
                'search_items'       => esc_html__( 'Search Event', 'tomochain-addons' ) ,
                'not_found'          => esc_html__( 'No Event items found', 'tomochain-addons' ) ,
                'not_found_in_trash' => esc_html__( 'No Event items found in trash', 'tomochain-addons' ) ,
                'parent_item_colon'  => '',
            );

            $args = array(
                'labels'                => $labels,
                'description'           => esc_html__( 'Display Events', 'tomochain-addons' ),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'menu_icon'             => 'dashicons-screenoptions',
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
                    'slug'          => 'events-media',
                    'with_front'    => false
                ) ,
            );

            register_post_type( 'event', $args );

            // Register a taxonomy for Events Categories.
            $category_labels = array(
                'name'                          => esc_html__( 'Event Categories', 'tomochain-addons' ) ,
                'singular_name'                 => esc_html__( 'Event Category', 'tomochain-addons') ,
                'menu_name'                     => esc_html__( 'Event Category', 'tomochain-addons' ) ,
                'all_items'                     => esc_html__( 'All Event Category', 'tomochain-addons' ) ,
                'edit_item'                     => esc_html__( 'Edit Event Category', 'tomochain-addons' ) ,
                'view_item'                     => esc_html__( 'View Event Category', 'tomochain-addons' ) ,
                'update_item'                   => esc_html__( 'Update Event Category', 'tomochain-addons' ) ,
                'add_new_item'                  => esc_html__( 'Add New Event Category', 'tomochain-addons' ) ,
                'new_item_name'                 => esc_html__( 'New Event Category Name', 'tomochain-addons' ) ,
                'parent_item'                   => esc_html__( 'Parent Event Category', 'tomochain-addons' ) ,
                'parent_item_colon'             => esc_html__( 'Parent Event Category:', 'tomochain-addons' ) ,
                'search_items'                  => esc_html__( 'Search Event Category', 'tomochain-addons' ) ,
                'popular_items'                 => esc_html__( 'Popular Event Category', 'tomochain-addons') ,
                'separate_items_with_commas'    => esc_html__( 'Separate Event Category with commas', 'tomochain-addons' ) ,
                'add_or_remove_items'           => esc_html__( 'Add or remove Event Category', 'tomochain-addons' ) ,
                'choose_from_most_used'         => esc_html__( 'Choose from the most used Event Categories', 'tomochain-addons' ) ,
                'not_found'                     => esc_html__( 'No Event Category found', 'tomochain-addons' ) ,
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
                    'slug'          => 'event-category',
                    'with_front'    => false
                ) ,
            );
            register_taxonomy('event_category', array(
                'event'
            ) , $category_args);

        }

        // Add columns to Event
        function add_columns($columns) {
            $columns['title'] = esc_html__( 'Title', 'tomochain-addons');
            $columns['thumbnail'] = esc_html__( 'Thumbnail', 'tomochain-addons' );
            $columns['start_event'] = esc_html__( 'Start Event', 'tomochain-addons' );
            $columns['close_event'] = esc_html__( 'Close Event', 'tomochain-addons' );

            return $columns;
        }

        // Set values for columns
        function set_columns_value($column, $post_id) {
            switch ($column) {
                case 'id': {
                    echo wp_kses_post($post_id);
                    break;
                }
                case 'start_event': {
                    echo get_post_meta($post_id, 'start_event', true);
                    break;
                }
                case 'close_event': {
                    echo get_post_meta($post_id, 'close_event', true);
                    break;
                }
                case 'thumbnail': {
                    echo get_the_post_thumbnail($post_id, array(80,80));
                    break;
                }
            }
        }
    }

    new Tomochain_Event_Post_Type;
}
