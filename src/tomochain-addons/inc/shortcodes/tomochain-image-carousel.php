<?php
/**
 * TomoChain Image Carousel
 */
class WPBakeryShortCode_TomoChain_Image_Carousel extends WPBakeryShortCode {
}

vc_map( array(
    'name'        => esc_html__( 'Image Carousel', 'tomochain-addons' ),
    'base'        => 'tomochain_image_carousel',
    'icon'        => TOMOCHAIN_ADDONS_URL . '/assets/images/icon.png',
    'description' => esc_html__( 'Animated carousel with images', 'tomochain-addons' ),
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
            'type'        => 'textfield',
            'heading'     => esc_html__( 'Carousel image size', 'tomochain-addons' ),
            'param_name'  => 'img_size',
            'value'       => 'full',
            'description' => esc_html__( 'Enter image size . Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme . Alternatively enter image size in pixels: 200x100( Width x Height). Leave empty to use "thumbnail" size . ', 'tomochain-addons' ),
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'On click action', 'tomochain-addons' ),
            'param_name'  => 'onclick',
            'value'       => array(
                esc_html__( 'None', 'tomochain-addons' )              => 'link_no',
                esc_html__( 'Open lightbox', 'tomochain-addons' )     => 'link_image',
                esc_html__( 'Open custom links', 'tomochain-addons' ) => 'custom_link',
            ),
            'description' => esc_html__( 'Select action for click event. ', 'tomochain-addons' ),
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Custom link target', 'tomochain-addons' ),
            'param_name'  => 'custom_links_target',
            'description' => esc_html__( 'Select how to open custom links . ', 'tomochain-addons' ),
            'dependency'  => array(
                'element' => 'onclick',
                'value'   => array( 'custom_link' ),
            ),
            'value'       => vc_target_param_list(),
        ),
        array(
            'type'        => 'exploded_textarea_safe',
            'heading'     => esc_html__( 'Custom links', 'tomochain-addons' ),
            'param_name'  => 'custom_links',
            'description' => esc_html__( 'Enter links for each slide( Note: divide links with linebreaks( Enter ).', 'tomochain-addons' ),
            'dependency'  => array(
                'element' => 'onclick',
                'value'   => array( 'custom_link' ),
            ),
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
            'heading'    => esc_html__( 'Auto play speed (second)', 'tomochain-addons' ),
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
