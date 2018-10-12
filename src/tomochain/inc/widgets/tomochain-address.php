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
                'label' => '&#x1f4cc; &nbsp;' . esc_html__( 'TOMOCHAIN Address', 'tomochain' ),
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
                    'name'   => esc_html__( 'Address 1', 'tomochain' ),
                    'id'     => 'address',
                    'type'   => 'textarea',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => 'strip_tags|esc_attr'
                ),
                array(
                    'name'   => esc_html__( 'Address 2', 'tomochain' ),
                    'id'     => 'address2',
                    'type'   => 'textarea',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => 'strip_tags|esc_attr'
                ),
                array(
                    'name'   => esc_html__( 'Address 3', 'tomochain' ),
                    'id'     => 'address3',
                    'type'   => 'textarea',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => 'strip_tags|esc_attr'
                ),
                array(
                    'name'   => esc_html__( 'Address 4', 'tomochain' ),
                    'id'     => 'address4',
                    'type'   => 'textarea',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => 'strip_tags|esc_attr'
                ),
                array(
                    'name'   => esc_html__( 'Address 5', 'tomochain' ),
                    'id'     => 'address5',
                    'type'   => 'textarea',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => 'strip_tags|esc_attr'
                ),
                array(
                    'name'   => esc_html__( 'Address 6', 'tomochain' ),
                    'id'     => 'address6',
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
            $address2 = isset( $instance['address2'] ) ? $instance['address2'] : '';
            $address3 = isset( $instance['address3'] ) ? $instance['address3'] : '';
            $address4 = isset( $instance['address4'] ) ? $instance['address4'] : '';
            $address5 = isset( $instance['address5'] ) ? $instance['address5'] : '';
            $address6 = isset( $instance['address6'] ) ? $instance['address6'] : '';

            echo '' . $args['before_widget'];

            $output = $title ? $args['before_title'] . $title . $args['after_title'] : '';

            $output .= '<p class="address">';
            if ( $address ) {
                $output .= '<span>' . $address . '</span>';
            }

            if ( $address2 ) {
                $output .= '<span>' . $address2 . '</span>';
            }

            if ( $address3 ) {
                $output .= '<span>' . $address3 . '</span>';
            }

            if ( $address4 ) {
                $output .= '<span>' . $address4 . '</span>';
            }

            if ( $address5 ) {
                $output .= '<span>' . $address5 . '</span>';
            }

            if ( $address6 ) {
                $output .= '<span>' . $address6 . '</span>';
            }
            $output .= '</p>';

            echo '' . $output;
            echo '' . $args['after_widget'];
        }
    }
}
