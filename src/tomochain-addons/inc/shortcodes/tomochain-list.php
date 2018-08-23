<?php
/**
 * List Shortcode
 */
class WPBakeryShortCode_TomoChain_List extends WPBakeryShortCode {
    public function shortcode_css( $css_id ) {
        $atts  = vc_map_get_attributes( $this->getShortcode(), $this->getAtts() );
        $cssID = '#' . $css_id;
        $css   = '';

        $css = $cssID . ' .tomochain-list__item:before{background-color:' . $atts['dots_color'] . ';}';

        return tomochain_text2line( $css );
    }
}
vc_map( array(
    'name'        => esc_html__( 'List', 'tomochain-addons' ),
    'description' => esc_html__( 'Display a list', 'tomochain-addons' ),
    'base'        => 'tomochain_list',
    'icon'        => TOMOCHAIN_ADDONS_URL . '/assets/images/icon.png',
    'category'    => esc_html__( 'TomoChain', 'tomochain-addons' ),
    'params'      => array(
        array(
            'type'       => 'colorpicker',
            'heading'    => esc_html( 'Dots Color', 'tomochain-addons' ),
            'param_name' => 'dots_color'
        ),
        array(
            'type'        => 'exploded_textarea_safe',
            'heading'     => esc_html__( 'List items', 'tomochain-addons' ),
            'param_name'  => 'items',
            'description' => esc_html__( 'Enter list item ( Note: divide items with linebreaks( Enter ).', 'tomochain-addons' )
        ),
        tomochain_get_param('el_class'),
        tomochain_get_param('css')
    )
));
