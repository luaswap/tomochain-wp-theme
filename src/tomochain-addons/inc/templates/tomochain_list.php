<?php
/**
 * Shortcode attributes
 *
 * @var $dots_color
 * @var $text_color
 * @var $items
 * @var $el_class
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_TomoChain_List
 */
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

$css_class = array(
    'tomochain-shortcode',
    'tomochain-list',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    implode( ' ', $css_class ),
    $this->settings['base'],
    $atts );

$css_id = tomochain_get_shortcode_id('tomochain-list');

$items = vc_value_from_safe( $items );
$items = explode( ',', $items );
?>
<style><?php echo $this->shortcode_css( $css_id ); ?></style>
<ul class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr(  $css_id ); ?>">
    <?php foreach($items as $item): ?>
        <li class="tomochain-list__item"><?php echo '' . wpb_js_remove_wpautop($item); ?></li>
    <?php endforeach; ?>
</ul>
