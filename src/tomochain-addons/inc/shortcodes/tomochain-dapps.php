<?php
/**
 * TomoChain Dapp
 */
class WPBakeryShortCode_TomoChain_Dapps extends WPBakeryShortCode {
}

vc_map( array(
    'name'        => esc_html__( 'Dapps', 'tomochain-addons' ),
    'base'        => 'tomochain_dapps',
    'icon'        => TOMOCHAIN_ADDONS_URI . '/assets/images/icon.png',
    'category'    => esc_html__( 'TomoChain', 'tomochain-addons' ),
    'params'      => array(
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Dapp Layout', 'tomochain-addons' ),
            'param_name'  => 'dapp_layout',
            'admin_label' => true,
            'value'       => array(
                esc_html__( 'Slide', 'tomochain-addons' ) => 'slide',
                esc_html__( 'List', 'tomochain-addons' )  => 'list',
            ),
            'std'        => 'list'
        ),
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
                esc_html__( '5 Item', 'tomochain-addons' ) => '4',
            ),
            'std'        => 4,
            'dependency' => array(
                'element' => 'dapp_layout',
                'value'   => 'slide',
            ),
        ),
        array(
            'type'       => 'checkbox',
            'param_name' => 'loop',
            'value'      => array( esc_html__( 'Enable carousel loop mode', 'tomochain-addons' ) => 'yes' ),
            'std'        => 'yes',
            'dependency' => array(
                'element' => 'dapp_layout',
                'value'   => 'slide',
            ),
        ),
        array(
            'type'       => 'checkbox',
            'param_name' => 'auto_play',
            'value'      => array( esc_html__( 'Enable carousel autolay', 'tomochain-addons' ) => 'yes' ),
            'std'        => 'yes',
            'dependency' => array(
                'element' => 'dapp_layout',
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
