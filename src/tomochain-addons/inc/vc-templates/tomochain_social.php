<?php
/**
 * Shortcode attributes
 *
 * @var $el_class
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_TomoChain_Social
 */
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

$css_class = array(
    'tomochain-shortcode',
    'tomochain-social',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    implode( ' ', $css_class ),
    $this->settings['base'],
    $atts );
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>">
<?php
    if (function_exists('tomochain_social_links')):
        tomochain_social_links();
    else: ?>
        <p><?php esc_html_e('TomoChain addons plugin only works with the TomoChain theme.', 'tomochain-addons'); ?></p>
    <?php
    endif;
?>
</div>
