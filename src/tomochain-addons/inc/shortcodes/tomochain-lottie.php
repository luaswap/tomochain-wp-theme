<?php
/**
 * List Shortcode
 */
class WPBakeryShortCode_TomoChain_Lottie extends WPBakeryShortCode {
}
vc_map( array(
    'name'        => esc_html__( 'Lottie', 'tomochain-addons' ),
    'description' => esc_html__( 'Display a list', 'tomochain-addons' ),
    'base'        => 'tomochain_lottie',
    'icon'        => TOMOCHAIN_ADDONS_URL . '/assets/images/icon.png',
    'category'    => esc_html__( 'TomoChain', 'tomochain-addons' ),
    'params'      => array(
        array(
            'type'        => 'attach_images',
            'heading'     => esc_html__( 'Images', 'tomochain-addons' ),
            'param_name'  => 'images',
            'value'       => '',
            'description' => esc_html__( 'Select images from media library . ', 'tomochain-addons' ),
            'save_always' => true,
        ),
        array(
            'type'        => 'textarea_raw_html',
            'heading'     => esc_html__( 'JSON code', 'tomochain-addons' ),
            'param_name'  => 'json_code'
        ),
        tomochain_get_param('el_class'),
        tomochain_get_param('css')
    )
));
