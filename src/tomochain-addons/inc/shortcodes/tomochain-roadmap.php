<?php
/**
 * Roadmap Shortcode
 */
class WPBakeryShortCode_TomoChain_Roadmap extends WPBakeryShortCodesContainer {
}
vc_map( array(
    'name'                    => esc_html__( 'Roadmap', 'tomochain-addons' ),
    'description'             => __( 'TomoChain\'s Roadmap', 'tomochain-addons' ),
    'base'                    => 'tomochain_roadmap',
    'icon'                    => TOMOCHAIN_ADDONS_URI . '/assets/images/icon.png',
    'category'                => esc_html__( 'TomoChain', 'tomochain-addons' ),
    'js_view'                 => 'VcColumnView',
	'content_element'         => true,
    'show_settings_on_create' => false,
    'as_parent'               => array( 'only' => 'tomochain_roadmap_item' ),
    'params'                  => array(
        tomochain_get_param('el_class'),
        tomochain_get_param('css')
    )
));
