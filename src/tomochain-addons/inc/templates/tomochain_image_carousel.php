<?php
/**
 * Shortcode attributes
 *
 * @var $atts
 * @var $images
 * @var $img_size
 * @var $custom_links
 * @var $custom_links_target
 * @var $loop
 * @var $auto_play
 * @var $auto_play_speed
 * @var $number_of_images_to_show
 * @var $el_class
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_TomoChain_Image_Carousel
 */

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

if ( $images == '' ) {
    return;
}

$images = explode( ',', $images );
$i      = - 1;

?>

<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" data-atts="<?php echo esc_attr( json_encode( $atts ) ); ?>">
<?php
    foreach ( $images as $attach_id ):
        $i++;

        if ( $attach_id > 0 ) {
            $post_thumbnail = wpb_getImageBySize( array(
                'attach_id'  => $attach_id,
                'thumb_size' => $img_size,
            ) );
        }
        $thumbnail = $post_thumbnail['thumbnail'];
    ?>
        <div class="carousel-item">
            <?php echo '' . $thumbnail; ?>
        </div>
    <?php
    endforeach;
?>
</div>
