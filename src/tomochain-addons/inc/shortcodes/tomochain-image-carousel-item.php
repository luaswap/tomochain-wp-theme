<?php

/**
 * TomoChain Roadmap Item shortcode
 */
class WPBakeryShortCode_TomoChain_Image_Carousel_Item extends WPBakeryShortCode {
}
vc_map( array(
    'name'        => esc_html__( 'Image Carousel Item', 'tomochain-addons' ),
    'base'        => 'tomochain_image_carousel_item',
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
            'heading'     => esc_html__( 'Carousel image size', 'tomochain-addons' ),
            'param_name'  => 'img_size',
            'value'       => 'full',
            'description' => esc_html__( 'Enter image size . Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme . Alternatively enter image size in pixels: 200x100( Width x Height). Leave empty to use "thumbnail" size . ', 'tomochain-addons' ),
        ),
        array(
            'type'        => 'vc_link',
            'heading'     => esc_html__( 'URL', 'tomochain-addons' ),
            'param_name'  => 'url'
        ),
        array(
            'type'        => 'textfield',
            'heading'     => esc_html__( 'Note', 'tomochain-addons' ),
            'param_name'  => 'note',
            'admin_label' => true
        ),
    )
));
