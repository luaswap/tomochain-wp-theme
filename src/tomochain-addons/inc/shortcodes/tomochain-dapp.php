<?php
/**
 * List Shortcode
 */
class WPBakeryShortCode_TomoChain_DApp extends WPBakeryShortCode {
}
vc_map( array(
    'name'        => esc_html__( 'DApp', 'tomochain-addons' ),
    'description' => esc_html__( 'Show information of a DApp', 'tomochain-addons' ),
    'base'        => 'tomochain_dapp',
    'icon'        => TOMOCHAIN_ADDONS_URL . '/assets/images/icon.png',
    'category'    => esc_html__( 'TomoChain', 'tomochain-addons' ),
    'params'      => array(
        array(
            'type'        => 'attach_image',
            'heading'     => esc_html__( 'Image', 'tomochain-addons' ),
            'param_name'  => 'image',
            'value'       => '',
            'description' => esc_html__( 'Select image from media library . ', 'tomochain-addons' ),
            'save_always' => true,
        ),
        array(
            'type'        => 'textfield',
            'heading'     => esc_html__( 'Name', 'tomochain-addons' ),
            'admin_label' => true,
            'param_name'  => 'name',
            'value'       => '',
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
        array(
            'type'        => 'textarea_html',
            'heading'     => esc_html__( 'Description', 'tomochain-addons' ),
            'param_name'  => 'description'
        ),
        tomochain_get_param('el_class'),
        tomochain_get_param('css')
    )
));
