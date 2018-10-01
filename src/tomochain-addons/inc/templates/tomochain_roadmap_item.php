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

$quarters = array(
    1 => esc_html__('Q1', 'tomochain-addons' ),
    2 => esc_html__('Q2', 'tomochain-addons' ),
    3 => esc_html__('Q3', 'tomochain-addons' ),
    4 => esc_html__('Q4', 'tomochain-addons' ),
);

$year_str = $quarters[$quarter] . ' / ' . $year;

if (function_exists('pll_current_language') && pll_current_language() == 'cn') {
    $year_str = $year . '年第' . $quarters[$quarter];
}

?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>">
    <div class="roadmap-deco">
        <span class="roadmap-dot"><i>&nbsp;</i></span>
    </div>
    <h5 class="roadmap-title"><?php echo wp_kses_post($year_str); ?></h5>
    <div class="roadmap-description"><?php echo '' . $description; ?></div>
</div>
