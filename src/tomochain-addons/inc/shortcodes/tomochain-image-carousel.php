<?php
/**
 * Image Carousel Shortcode
 */
class WPBakeryShortCode_TomoChain_Image_Carousel extends WPBakeryShortCodesContainer {
}
vc_map( array(
    'name'            => esc_html__( 'Image Carousel', 'tomochain-addons' ),
    'base'            => 'tomochain_image_carousel',
    'icon'            => TOMOCHAIN_ADDONS_URI . '/assets/images/icon.png',
    'description'     => esc_html__( 'Animated carousel with images', 'tomochain-addons' ),
    'category'        => esc_html__( 'TomoChain', 'tomochain-addons' ),
    'js_view'         => 'VcColumnView',
	'content_element' => true,
    'as_parent'       => array( 'only' => 'tomochain_image_carousel_item' ),
    'params'          => array(
        array(
            'type'        => 'textfield',
            'heading'     => esc_html__( 'Carousel image size', 'tomochain-addons' ),
            'param_name'  => 'img_size',
            'value'       => 'full',
            'description' => esc_html__( 'Enter image size . Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme . Alternatively enter image size in pixels: 200x100( Width x Height). Leave empty to use "thumbnail" size . ', 'tomochain-addons' ),
        ),
        array(
            'type'       => 'dropdown',
            'heading'    => esc_html__( 'Number of images to show', 'tomochain-addons' ),
            'param_name' => 'number_of_images_to_show',
            'value'      => array(
                1,
                2,
                3,
                4,
                5,
                6,
            ),
            'std'       => 6
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
