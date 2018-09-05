<?php
/**
 * Shortcode attributes
 *
 * @var $atts
 * @var $image
 * @var $img_size
 * Shortcode class
 * @var $this WPBakeryShortCode_TomoChain_Image_Carousel_Item
 */

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class = array(
    'tomochain-shortcode',
    'tomochain-image-carousel-item',
);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    implode( ' ', $css_class ),
    $this->settings['base'],
    $atts );

if ( ! empty( $url ) && "||" !== $url && "|||" !== $url ) {
    $url = vc_build_link( $url );
}
?>

<div class="<?php echo esc_attr( trim( $css_class ) ); ?>">
    <?php if ( is_array($url) ) : ?>
        <a href="<?php echo esc_url($url['url']) ?>" target="<?php echo esc_attr($url['target']); ?>">
    <?php endif; ?>
    <?php
        if ( $image > 0 ) {
            $post_thumbnail = wpb_getImageBySize( array(
                'attach_id'  => $image,
                'thumb_size' => $img_size,
            ) );
        }
        $thumbnail = $post_thumbnail['thumbnail'];
        echo '' . $thumbnail;
    ?>
    <?php if ( is_array($url) ) : ?>
        </a>
    <?php endif; ?>
</div>
