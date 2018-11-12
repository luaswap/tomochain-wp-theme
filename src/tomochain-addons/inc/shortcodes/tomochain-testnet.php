<?php
/**
 * Testnet Shortcode
 */
class WPBakeryShortCode_TomoChain_Testnet extends WPBakeryShortCodesContainer {
}
vc_map( array(
    'name'                    => esc_html__( 'Testnet', 'tomochain-addons' ),
    'base'                    => 'tomochain_testnet',
    'icon'                    => TOMOCHAIN_ADDONS_URI . '/assets/images/icon.png',
    'category'                => esc_html__( 'TomoChain', 'tomochain-addons' ),
    'js_view'                 => 'VcColumnView',
	'content_element'         => true,
    'show_settings_on_create' => false,
    'as_parent'               => array( 'only' => 'tomochain_testnet_item' ),
    'params'                  => array(
        tomochain_get_param('el_class'),
        tomochain_get_param('css')
    )
));
