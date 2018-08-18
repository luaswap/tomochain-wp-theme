<?php
/**
 * TomoChain Address Widget
 */
if ( ! class_exists( 'TomoChain_Address_Widget' ) ) {

    add_action( 'widgets_init', 'load_tomochain_address_widget' );

    function load_tomochain_address_widget() {
		register_widget( 'TomoChain_Address_Widget', 1 );
    }

    class TomoChain_Address_Widget extends WPH_Widget {

        function __construct() {
            $args = array(
                'slug'  => 'tomo_address',
                'label' => '📮 &nbsp;' . esc_html__( 'TOMOCHAIN Address', 'tomochain' ),
                'description' => esc_html__( 'Display contact information on footer.', 'tomochain' )
            );

            $args['fields'] = array(
                array(
                    'name'   => esc_html__( 'Title', 'tomochain' ),
                    'id'     => 'title',
                    'type'   => 'text',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => 'strip_tags|esc_attr'
                ),
                array(
                    'name'   => esc_html__( 'Address', 'tomochain' ),
                    'id'     => 'address',
                    'type'   => 'textarea',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => 'strip_tags|esc_attr'
                ),
            );

            // create widget
            $this->create_widget( $args );
        }

        function widget( $args, $instance ) {
            $title   = isset( $instance['title'] ) ? $instance['title'] : '';
            $address = isset( $instance['address'] ) ? $instance['address'] : '';

            echo '' . $args['before_widget'];

            $output = $title ? $args['before_title'] . $title . $args['after_title'] : '';
            if ( $address ) {
                $output .= '<p class="address">';
                $output .= '<span>' . $address . '</span>';
                $output .= '</p>';
            }

            echo '' . $output;
            echo '' . $args['after_widget'];
        }
    }
}
