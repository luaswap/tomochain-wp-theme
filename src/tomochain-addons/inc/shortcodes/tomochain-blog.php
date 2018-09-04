<?php
/**
 * TomoChain Blog
 */
class WPBakeryShortCode_TomoChain_Blog extends WPBakeryShortCode {
}

vc_map( array(
    'name'        => esc_html__( 'Blog', 'tomochain-addons' ),
    'base'        => 'tomochain_blog',
    'icon'        => TOMOCHAIN_ADDONS_URL . '/assets/images/icon.png',
    'category'    => esc_html__( 'TomoChain', 'tomochain-addons' ),
    'params'      => array(
        tomochain_get_param('el_class'),
        tomochain_get_param('css')
    )
));
