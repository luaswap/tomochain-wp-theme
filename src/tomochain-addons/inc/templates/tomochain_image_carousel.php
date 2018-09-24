<?php
/**
 * Shortcode attributes
 *
 * @var $atts
 * @var $img_size
 * @var $loop
 * @var $auto_play
 * @var $auto_play_speed
 * @var $number_of_images_to_show
 * @var $el_class
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_TomoChain_Image_Carousel
 */
wp_enqueue_script( 'slick-carousel' );

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

$css_class = array(
    'tomochain-shortcode',
    'tomochain-image-carousel',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    implode( ' ', $css_class ),
    $this->settings['base'],
    $atts );
?>

<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" data-atts="<?php echo esc_attr( json_encode( $atts ) ); ?>">
    <?php echo do_shortcode( $content ); ?>
</div>
