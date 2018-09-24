<?php

/**
 * TomoChain Video Item shortcode
 */
class WPBakeryShortCode_TomoChain_Video_Item extends WPBakeryShortCode {
}

vc_map( array(
    'name'        => esc_html__( 'Video Item', 'tomochain-addons' ),
    'base'        => 'tomochain_video_item',
    'icon'        => TOMOCHAIN_ADDONS_URL . '/assets/images/icon.png',
    'category'    => esc_html__( 'TomoChain', 'tomochain-addons' ),
    'as_parent'   => array( 'only' => 'tomochain_videos' ),
    'params'      => array(
        array(
            'type'        => 'attach_image',
            'heading'     => esc_html__( 'Thumbnail image', 'tomochain-addons' ),
            'param_name'  => 'image',
            'value'       => '',
            'description' => esc_html__( 'Select image from media library . ', 'tomochain-addons' ),
            'save_always' => true,
        ),
        array(
            'type'        => 'textfield',
            'heading'     => esc_html__( 'Youtube URL', 'tomochain-addons' ),
            'param_name'  => 'url',
            'value'       => '',
        ),
        tomochain_get_param('el_class'),
        tomochain_get_param('css')
    )
));
