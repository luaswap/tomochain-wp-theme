<?php
/**
 * TomoChain Blog
 */
class WPBakeryShortCode_TomoChain_Blog extends WPBakeryShortCode {
}

vc_map( array(
    'name'        => esc_html__( 'Blog', 'tomochain-addons' ),
    'base'        => 'tomochain_blog',
    'icon'        => TOMOCHAIN_ADDONS_URI . '/assets/images/icon.png',
    'category'    => esc_html__( 'TomoChain', 'tomochain-addons' ),
    'params'      => array(
        array(
            'type'       => 'textfield',
            'param_name' => 'per_page',
            'heading'    => esc_html__( 'Per Page', 'tomochain-addons' ),
            'value'      => 6,
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
                esc_html__( '5 Item', 'tomochain-addons' ) => '5',
            ),
            'std'        => 4
        ),
        array(
            'type'       => 'checkbox',
            'param_name' => 'excerpt',
            'value'      => array( esc_html__( 'Enable Excerpt Length', 'tomochain-addons' ) => 'yes' ),
            'std'        => 'yes',
        ),
        array(
            'type'       => 'textfield',
            'param_name' => 'excerpt_length',
            'heading'    => esc_html__( 'Enter Excerpt Length', 'tomochain-addons' ),
            'value'      => 10,
            'dependency' => array(
                'element' => 'excerpt',
                'value'   => 'yes',
            ),
        ),
        array(
            'type'       => 'checkbox',
            'param_name' => 'loop',
            'value'      => array( esc_html__( 'Enable carousel loop mode', 'tomochain-addons' ) => 'yes' ),
            'std'        => 'yes',
        ),
        array(
            'type'       => 'checkbox',
            'param_name' => 'auto_play',
            'value'      => array( esc_html__( 'Enable carousel autolay', 'tomochain-addons' ) => 'yes' ),
            'std'        => 'yes',
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
