<?php
/**
 * TomoChain Events
 */
class WPBakeryShortCode_TomoChain_Events extends WPBakeryShortCode {
}

vc_map( array(
    'name'        => esc_html__( 'Events', 'tomochain-addons' ),
    'base'        => 'tomochain_events',
    'icon'        => TOMOCHAIN_ADDONS_URL . '/assets/images/icon.png',
    'category'    => esc_html__( 'TomoChain', 'tomochain-addons' ),
    'params'      => array(
        tomochain_get_param('animation'),
        tomochain_get_param('el_class'),
        tomochain_get_param('css')
    )
));
