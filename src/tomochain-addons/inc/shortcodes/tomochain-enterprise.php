<?php
/**
 * TomoChain Enterprise
 */
class WPBakeryShortCode_TomoChain_Enterprise extends WPBakeryShortCode {
}

vc_map( array(
    'name'        => esc_html__( 'Enterprise', 'tomochain-addons' ),
    'base'        => 'tomochain_enterprise',
    'icon'        => TOMOCHAIN_ADDONS_URI . '/assets/images/icon.png',
    'category'    => esc_html__( 'TomoChain', 'tomochain-addons' ),
    'params'      => array(
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Enterprise Layout', 'tomochain-addons' ),
            'param_name'  => 'enterprise_layout',
            'admin_label' => true,
            'value'       => array(
                esc_html__( 'Slide', 'tomochain-addons' ) => 'slide',
                esc_html__( 'Grid', 'tomochain-addons' )  => 'grid',
            ),
            'std'        => 'grid'
        ),
        array(
            'type'        => 'enter_cat',
            'heading'     => esc_html__( 'Categories', 'tomochain-addons' ),
            'param_name'  => 'enter_categories',
            'description' => esc_html__( 'Enter Enterprise Categories', 'tomochain-addons' ),
            'admin_label' => true,

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
            'param_name'  => 'columns',
            'admin_label' => true,
            'value'       => array(
                esc_html__( '2 Item', 'tomochain-addons' ) => '6',
                esc_html__( '3 Item', 'tomochain-addons' ) => '4',
                esc_html__( '4 Item', 'tomochain-addons' ) => '3',
                esc_html__( '5 Item', 'tomochain-addons' ) => '2',
            ),
            'std'        => '4',
            'dependency' => array(
                'element' => 'enterprise_layout',
                'value'   => 'grid',
            ),
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Slide Item', 'tomochain-addons' ),
            'param_name'  => 'slide_item',
            'admin_label' => true,
            'value'       => array(
                esc_html__( '2 Item', 'tomochain-addons' ) => '2',
                esc_html__( '3 Item', 'tomochain-addons' ) => '3',
                esc_html__( '4 Item', 'tomochain-addons' ) => '4',
                esc_html__( '5 Item', 'tomochain-addons' ) => '5',
            ),
            'std'        => '3',
            'dependency' => array(
                'element' => 'enterprise_layout',
                'value'   => 'slide',
            ),
        ),
        array(
            'type'        => 'textfield',
            'heading'     => esc_html__( 'Excerpt Length', 'tomochain-addons' ),
            'param_name'  => 'excerpt_length',
            'admin_label' => true,
            'std'        => '20',
        ),
        array(
            'type'       => 'checkbox',
            'param_name' => 'loop',
            'value'      => array( esc_html__( 'Enable carousel loop mode', 'tomochain-addons' ) => 'yes' ),
            'std'        => 'yes',
            'dependency' => array(
                'element' => 'enterprise_layout',
                'value'   => 'slide',
            ),
        ),
        array(
            'type'       => 'checkbox',
            'param_name' => 'auto_play',
            'value'      => array( esc_html__( 'Enable carousel autolay', 'tomochain-addons' ) => 'yes' ),
            'std'        => 'yes',
            'dependency' => array(
                'element' => 'enterprise_layout',
                'value'   => 'slide',
            ),
        ),
        array(
            'type'       => 'textfield',
            'param_name' => 'duration',
            'heading'    => esc_html__( 'Duration', 'tomochain-addons' ),
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
