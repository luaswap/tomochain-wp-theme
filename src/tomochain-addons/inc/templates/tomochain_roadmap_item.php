<?php
/**
 * Shortcode attributes
 *
 * @var $atts
 * @var $year
 * @var $quarter
 * @var $description
 * @var $el_class
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_TomoChain_Roadmap_Item
 */
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );
$current_quarter = ceil(intval(date('m')) / 3);

$css_class = array(
    'tomochain-shortcode',
    'tomochain-roadmap-item',
    (floatval($quarter) == $current_quarter && date("Y") == $year) ? 'tomochain-roadmap-item--current' : '',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    implode( ' ', $css_class ),
    $this->settings['base'],
    $atts );

// $year_str = 'Q' . $quarter . ' / ' . $year;
$year_str = $year;
if (function_exists('pll__') && is_user_logged_in()) {
    // $pll_year   = pll__('%%quarter%% / %%year%%');
    $pll_year   = pll__('%%year%%');
    // $pll_quater = pll__( 'Q'.$quarter );
    $year_str   = str_replace( '%%year%%', $year, $pll_year );
    $year_str   = str_replace( '%%quarter%%', $pll_quater, $year_str );
}

?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>">
    <div class="roadmap-deco">
        <span class="roadmap-dot"><i>&nbsp;</i></span>
    </div>
    <h5 class="roadmap-title"><?php echo wp_kses_post($year_str); ?></h5>
    <div class="roadmap-description"><?php echo '' . $description; ?></div>
</div>
