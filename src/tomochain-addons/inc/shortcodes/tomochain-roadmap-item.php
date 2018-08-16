<?php

/**
 * TomoChain Roadmap Item shortcode
 */
class WPBakeryShortCode_TomoChain_Roadmap_Item extends WPBakeryShortCode {
}
vc_map( array(
    'name'        => esc_html__( 'Roadmap Item', 'tomochain-addons' ),
    'base'        => 'tomochain_roadmap_item',
    'icon'        => TOMOCHAIN_ADDONS_URL . '/assets/images/icon.png',
    'category'    => esc_html__( 'TomoChain', 'tomochain-addons' ),
    'params'      => array(
        array(
            'type'        => 'textfield',
            'heading'     => esc_html__( 'Year', 'tomochain-addons' ),
            'description' => esc_html__( 'Enter the year (e.g. 2018)', 'tomochain-addons' ),
            'admin_label' => true,
            'param_name'  => 'year',
            'value'       => '',
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Quarter', 'tomochain-addons' ),
            'description' => esc_html__( 'Select the quarter', 'tomochain-addons' ),
            'admin_label' => true,
            'param_name'  => 'quarter',
            'value'       => array(
                '--' => 0,
                'Q1' => 1,
                'Q2' => 2,
                'Q3' => 3,
                'Q4' => 4,
            ),
        ),
        array(
            'type'        => 'textarea_html',
            'heading'     => esc_html__( 'Description', 'tomochain-addons' ),
            'param_name'  => 'description'
        ),
        tomochain_get_param('el_class'),
        tomochain_get_param('css')
    )
));
