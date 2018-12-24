<?php
/**
 * TomoChain Event
 */
class WPBakeryShortCode_TomoChain_Event extends WPBakeryShortCode {
}

vc_map( array(
    'name'        => esc_html__( 'Event', 'tomochain-addons' ),
    'base'        => 'tomochain_event',
    'icon'        => TOMOCHAIN_ADDONS_URI . '/assets/images/icon.png',
    'category'    => esc_html__( 'TomoChain', 'tomochain-addons' ),
    'params'      => array(
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Data Source', 'tomochain-addons' ),
            'description' => esc_html__('Choose the source which event will be displayed.', 'tomochain-addons'),
            'param_name'  => 'data_source',
            'admin_label' => true,
            'value'       => array(
                esc_html__( 'All', 'tomochain-addons' )             => '',
                esc_html__( 'Ongoing Events', 'tomochain-addons' )  => 'current',
                esc_html__( 'Upcoming Event', 'tomochain-addons' )  => 'upcoming',
                esc_html__( 'Past Event', 'tomochain-addons' )      => 'past',
            )
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Event Layout', 'tomochain-addons' ),
            'param_name'  => 'event_layout',
            'admin_label' => true,
            'value'       => array(
                esc_html__( 'Grid', 'tomochain-addons' ) => 'grid',
                esc_html__( 'Slide', 'tomochain-addons' ) => 'slide'
            ),
            'std'        => 'slide'
        ),
        array(
            'type'       => 'textfield',
            'param_name' => 'per_page',
            'heading'    => esc_html__( 'Per Page', 'tomochain-addons' ),
            'value'      => 6,
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Columns', 'tomochain-addons' ),
            'description' => esc_html__('Enter columns number', 'tomochain-addons'),
            'param_name'  => 'columns',
            'admin_label' => true,
            'value'       => array(
                esc_html__( '2 Columns', 'tomochain-addons' ) => '6',
                esc_html__( '3 Columns', 'tomochain-addons' ) => '4',
                esc_html__( '4 Columns', 'tomochain-addons' ) => '3',
            ),
            'std'         => '4',
            'dependency' => array(
                'element' => 'event_layout',
                'value'   => 'grid',
            ),
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Slides To Show', 'tomochain-addons' ),
            'param_name'  => 'slide_item',
            'admin_label' => true,
            'value'       => array(
                esc_html__( '2 Item', 'tomochain-addons' ) => '2',
                esc_html__( '3 Item', 'tomochain-addons' ) => '3',
                esc_html__( '4 Item', 'tomochain-addons' ) => '4',
                esc_html__( '5 Item', 'tomochain-addons' ) => '4',
            ),
            'std'        => 4,
            'dependency' => array(
                'element' => 'event_layout',
                'value'   => 'slide',
            ),
        ),
        array(
            'type'       => 'checkbox',
            'param_name' => 'loop',
            'value'      => array( esc_html__( 'Enable carousel loop mode', 'tomochain-addons' ) => 'yes' ),
            'std'        => 'yes',
            'dependency' => array(
                'element' => 'event_layout',
                'value'   => 'slide',
            ),
        ),
        array(
            'type'       => 'checkbox',
            'param_name' => 'auto_play',
            'value'      => array( esc_html__( 'Enable carousel autolay', 'tomochain-addons' ) => 'yes' ),
            'std'        => 'yes',
            'dependency' => array(
                'element' => 'event_layout',
                'value'   => 'slide',
            ),
        ),
        array(
            'type'       => 'textfield',
            'param_name' => 'auto_play_speed',
            'heading'    => esc_html__( 'Auto play speed (in seconds)', 'tomochain-addons' ),
            'value'      => 3,
            'dependency' => array(
                'element' => 'auto_play',
                'value'   => 'yes',
            ),
        ),
        tomochain_get_param('el_class'),
        tomochain_get_param('css')
    )
));
