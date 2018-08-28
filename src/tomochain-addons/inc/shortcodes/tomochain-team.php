<?php
/**
 * Team Shortcode
 */
class WPBakeryShortCode_TomoChain_Team extends WPBakeryShortCodesContainer {
}
vc_map( array(
    'name'                    => esc_html__( 'Team', 'tomochain-addons' ),
    'base'                    => 'tomochain_team',
    'icon'                    => TOMOCHAIN_ADDONS_URL . '/assets/images/icon.png',
    'category'                => esc_html__( 'TomoChain', 'tomochain-addons' ),
    'js_view'                 => 'VcColumnView',
	'content_element'         => true,
    'show_settings_on_create' => false,
    'as_parent'               => array( 'only' => 'tomochain_team_member' ),
    'params'                  => array(
        array(
            'type'       => 'checkbox',
            'param_name' => 'hide',
            'value'      => array( esc_html__( 'Hide by default', 'tomochain-addons' ) => 'yes' ),
        ),
        vc_map_add_css_animation(),
        tomochain_get_param('el_class'),
        tomochain_get_param('css')
    )
));
