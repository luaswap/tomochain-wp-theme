<?php
/**
 * Shortcode attributes
 *
 * @var $image
 * @var $name
 * @var $url
 * @var $sourcecode_url
 * @var $textarea_html
 * @var $el_class
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_TomoChain_DApp
 */
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

$css_class = array(
    'tomochain-shortcode',
    'tomochain-dapp',
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
    <?php if ($image > 0) : ?>
        <div class="tomochain-dapp__image">
            <?php
                $post_thumbnail = wpb_getImageBySize( array(
                    'attach_id'  => $image,
                    'thumb_size' => 'full'
                ) );
                $thumbnail = $post_thumbnail['thumbnail'];
                echo $thumbnail;
            ?>
        </div>
        <p class="tomochain-dapp__name"><?php echo $name; ?></p>
        <p class="tomochain-dapp__description"><?php echo $description; ?></p>
        <div class="tomochain-dapp__links">
            <?php if ( is_array($url) ) : ?>
            <a href="<?php echo esc_url($url['url']) ?>" class="tomochain-dapp__url" target="<?php echo esc_attr($url['target']); ?>"><?php esc_html_e('Run App', 'tomochain-addons')?></a>
            <?php endif; ?>
            <?php if ( is_array($sourcecode_url) ) : ?>
            <a href="<?php echo esc_url($sourcecode_url['url']) ?>" class="tomochain-dapp__source-url" target="<?php echo esc_attr($sourcecode_url['target']); ?>"><?php esc_html_e('Source Code', 'tomochain-addons')?></a>
            <?php endif; ?>
        </div>
        <?php endif; ?>
</div>
