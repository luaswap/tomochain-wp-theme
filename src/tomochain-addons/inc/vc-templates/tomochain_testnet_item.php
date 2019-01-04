<?php
/**
 * Shortcode attributes
 *
 * @var $atts
 * @var $title
 * @var $status
 * @var $url
 * @var $sourcecode_url
 * @var $el_class
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_TomoChain_Testnet_Item
 */
wp_enqueue_style( 'hint-css' );
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

$css_class = array(
    'tomochain-shortcode',
    'tomochain-testnet-item',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    implode( ' ', $css_class ),
    $this->settings['base'],
    $atts );

if ( ! empty( $url ) && "||" !== $url && "|||" !== $url ) {
    $url = vc_build_link( $url );
}

if ( ! empty( $sourcecode_url ) && "||" !== $sourcecode_url && "|||" !== $sourcecode_url ) {
    $sourcecode_url = vc_build_link( $sourcecode_url );
}
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>">
    <span class="tomochain-testnet-item__status tomochain-testnet-item__status--<?php echo $status; ?>"><?php echo $status; ?></span>
    <span class="tomochain-testnet-item__title"><?php echo $title; ?></span>
    <div class="tomochain-testnet-item__links">
        <?php if ( is_array($url) ) : ?>
            <div class="tomochain-testnet-item__run hint--top hint--bounce" aria-label="<?php esc_html_e ( 'More Info', 'tomochain-addons'); ?>">
                <a href="<?php echo esc_url($url['url']) ?>" target="<?php echo esc_attr($url['target']); ?>"><?php esc_html_e('More Info', 'tomochain-addons')?></a>
            </div>
        <?php endif; ?>
        <?php if ( is_array($sourcecode_url) ) : ?>
            <div class="tomochain-testnet-item__source hint--top-left hint--bounce" aria-label="<?php esc_html_e ( 'Source Code', 'tomochain-addons'); ?>">
                <a href="<?php echo esc_url($sourcecode_url['url']) ?>" target="<?php echo esc_attr($sourcecode_url['target']); ?>"><?php esc_html_e('Source Code', 'tomochain-addons')?></a>
            </div>
        <?php endif; ?>
    </div>
</div>
