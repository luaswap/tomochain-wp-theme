<?php

/**
 * TomoChain Testnet Item shortcode
 */
class WPBakeryShortCode_TomoChain_Testnet_Item extends WPBakeryShortCode {
}

vc_map( array(
    'name'        => esc_html__( 'Testnet Item', 'tomochain-addons' ),
    'base'        => 'tomochain_testnet_item',
    'icon'        => TOMOCHAIN_ADDONS_URL . '/assets/images/icon.png',
    'category'    => esc_html__( 'TomoChain', 'tomochain-addons' ),
    'params'      => array(
        array(
            'type'        => 'textfield',
            'heading'     => esc_html__( 'Title', 'tomochain-addons' ),
            'admin_label' => true,
            'param_name'  => 'title',
            'value'       => '',
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Status', 'tomochain-addons' ),
            'admin_label' => true,
            'param_name'  => 'status',
            'value'       => array(
                'Soon' => 'soon',
                'Live' => 'live',
            ),
        ),
        array(
            'type'        => 'vc_link',
            'heading'     => esc_html__( 'URL', 'tomochain-addons' ),
            'param_name'  => 'url',
            'value'       => '',
        ),
        array(
            'type'        => 'vc_link',
            'heading'     => esc_html__( 'Source code URL', 'tomochain-addons' ),
            'param_name'  => 'sourcecode_url',
            'value'       => '',
        ),
        tomochain_get_param('el_class'),
        tomochain_get_param('css')
    )
));
