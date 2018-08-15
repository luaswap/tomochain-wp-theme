<?php
/**
 * Social Links Shortcode
 */
vc_map( array(
    'name'        => esc_html__( 'Social Links', 'tomochain-addons' ),
    'description' => esc_html__( 'Social links of TomoChain', 'tomochain-addons' ),
    'base'        => 'tomochain_social',
    'icon'        => TOMOCHAIN_ADDONS_URL . '/assets/images/icon.png',
    'category'    => esc_html__( 'TomoChain', 'tomochain-addons' ),
    'params'      => array(
        tomochain_get_param('el_class'),
        tomochain_get_param('css')
    )
));
