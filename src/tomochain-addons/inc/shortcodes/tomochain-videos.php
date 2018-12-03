<?php
/**
 * Videos Shortcode
 */
class WPBakeryShortCode_TomoChain_Videos extends WPBakeryShortCodesContainer {
}
vc_map( array(
    'name'                    => esc_html__( 'Videos', 'tomochain-addons' ),
    'base'                    => 'tomochain_videos',
    'icon'                    => TOMOCHAIN_ADDONS_URI . '/assets/images/icon.png',
    'category'                => esc_html__( 'TomoChain', 'tomochain-addons' ),
    'js_view'                 => 'VcColumnView',
	'content_element'         => true,
    'show_settings_on_create' => false,
    'as_parent'               => array( 'only' => 'tomochain_video_item' ),
    'params'                  => array(
        tomochain_get_param('el_class'),
        tomochain_get_param('css')
    )
));
