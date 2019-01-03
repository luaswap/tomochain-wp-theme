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
                'label' => '&#x1f4cc; &nbsp;' . esc_html__( 'TOMOCHAIN Address', 'tomochain-addons' ),
                'description' => esc_html__( 'Display contact information on footer.', 'tomochain-addons' )
            );

            $args['fields'] = array(
                array(
                    'name'   => esc_html__( 'Title', 'tomochain-addons' ),
                    'id'     => 'title',
                    'type'   => 'text',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => 'strip_tags|esc_attr'
                ),
                array(
                    'name'   => esc_html__( 'Address Title 1', 'tomochain-addons' ),
                    'id'     => 'address_title',
                    'type'   => 'text',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => 'strip_tags|esc_attr'
                ),
                array(
                    'name'   => esc_html__( 'Address 1', 'tomochain-addons' ),
                    'id'     => 'address',
                    'type'   => 'textarea',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => ''
                ),
                array(
                    'name'   => esc_html__( 'Address Title 2', 'tomochain-addons' ),
                    'id'     => 'address_title2',
                    'type'   => 'text',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => 'strip_tags|esc_attr'
                ),
                array(
                    'name'   => esc_html__( 'Address 2', 'tomochain-addons' ),
                    'id'     => 'address2',
                    'type'   => 'textarea',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => ''
                ),
                array(
                    'name'   => esc_html__( 'Address Title 3', 'tomochain-addons' ),
                    'id'     => 'address_title3',
                    'type'   => 'text',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => 'strip_tags|esc_attr'
                ),
                array(
                    'name'   => esc_html__( 'Address 3', 'tomochain-addons' ),
                    'id'     => 'address3',
                    'type'   => 'textarea',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => ''
                ),
                array(
                    'name'   => esc_html__( 'Address Title 4', 'tomochain-addons' ),
                    'id'     => 'address_title4',
                    'type'   => 'text',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => 'strip_tags|esc_attr'
                ),
                array(
                    'name'   => esc_html__( 'Address 4', 'tomochain-addons' ),
                    'id'     => 'address4',
                    'type'   => 'textarea',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => ''
                ),
                array(
                    'name'   => esc_html__( 'Address Title 5', 'tomochain-addons' ),
                    'id'     => 'address_title5',
                    'type'   => 'text',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => 'strip_tags|esc_attr'
                ),
                array(
                    'name'   => esc_html__( 'Address 5', 'tomochain-addons' ),
                    'id'     => 'address5',
                    'type'   => 'textarea',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => ''
                ),
                array(
                    'name'   => esc_html__( 'Address Title 6', 'tomochain-addons' ),
                    'id'     => 'address_title6',
                    'type'   => 'text',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => 'strip_tags|esc_attr'
                ),
                array(
                    'name'   => esc_html__( 'Address 6', 'tomochain-addons' ),
                    'id'     => 'address6',
                    'type'   => 'textarea',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => ''
                ),
            );

            // create widget
            $this->create_widget( $args );
        }

        function widget( $args, $instance ) {
            $title   = isset( $instance['title'] ) ? $instance['title'] : '';

            $address  = isset( $instance['address'] ) ? $instance['address'] : '';
            $address2 = isset( $instance['address2'] ) ? $instance['address2'] : '';
            $address3 = isset( $instance['address3'] ) ? $instance['address3'] : '';
            $address4 = isset( $instance['address4'] ) ? $instance['address4'] : '';
            $address5 = isset( $instance['address5'] ) ? $instance['address5'] : '';
            $address6 = isset( $instance['address6'] ) ? $instance['address6'] : '';

            $address_title  = isset( $instance['address_title'] ) ? $instance['address_title'] : '';
            $address_title2 = isset( $instance['address_title2'] ) ? $instance['address_title2'] : '';
            $address_title3 = isset( $instance['address_title3'] ) ? $instance['address_title3'] : '';
            $address_title4 = isset( $instance['address_title4'] ) ? $instance['address_title4'] : '';
            $address_title5 = isset( $instance['address_title5'] ) ? $instance['address_title5'] : '';
            $address_title6 = isset( $instance['address_title6'] ) ? $instance['address_title6'] : '';

            echo '' . $args['before_widget'];

            $output = $title ? $args['before_title'] . $title . $args['after_title'] : '';

            $output .= '<div class="addresses">';
            if ( $address ) {
                $output .= '<div class="address">';
                if ( $address_title ) {
                    $output .= '<h5 class="address-title">' . $address_title . '</h5>';
                }
                $output .= $address . '</div>';
            }

            if ( $address2 ) {
                $output .= '<div class="address">';
                if ( $address_title2 ) {
                    $output .= '<h5 class="address-title">' . $address_title2 . '</h5>';
                }
                $output .= $address2 . '</div>';
            }

            if ( $address3 ) {
                $output .= '<div class="address">';
                if ( $address_title3 ) {
                    $output .= '<h5 class="address-title">' . $address_title3 . '</h5>';
                }
                $output .= $address3 . '</div>';
            }

            if ( $address4 ) {
                $output .= '<div class="address">';
                if ( $address_title4 ) {
                    $output .= '<h5 class="address-title">' . $address_title4 . '</h5>';
                }
                $output .= $address4 . '</div>';
            }

            if ( $address5 ) {
                $output .= '<div class="address">';
                if ( $address_title5 ) {
                    $output .= '<h5 class="address-title">' . $address_title5 . '</h5>';
                }
                $output .= $address5 . '</div>';
            }

            if ( $address6 ) {
                $output .= '<div class="address">';
                if ( $address_title6 ) {
                    $output .= '<h5 class="address-title">' . $address_title6 . '</h5>';
                }
                $output .= $address6 . '</div>';
            }
            $output .= '</div>';

            echo '' . $output;
            echo '' . $args['after_widget'];
        }
    }
}
