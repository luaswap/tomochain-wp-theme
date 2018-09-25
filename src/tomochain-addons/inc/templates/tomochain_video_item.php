<?php
/**
 * Shortcode attributes
 *
 * @var $atts
 * @var $image
 * @var $url
 * Shortcode class
 * @var $this WPBakeryShortCode_TomoChain_Video_Item
 */
wp_enqueue_style( 'magnific-popup' );
wp_enqueue_script( 'magnific-popup' );

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class = array(
    'tomochain-shortcode',
    'tomochain-video-item',
);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    implode( ' ', $css_class ),
    $this->settings['base'],
    $atts );
?>

<li class="<?php echo esc_attr( trim( $css_class ) ); ?>">
    <?php
        if ( $image > 0 ) {
            $post_thumbnail = wpb_getImageBySize( array(
                'attach_id'  => $image,
                'thumb_size' => array(600, 350),
            ) );
        }
        $thumbnail = $post_thumbnail['thumbnail'];
        echo '' . $thumbnail;

        if ($url) {
            echo '<a class="video-link" href="' . esc_url($url) . '"><i class="fa fa-play"></i>' . esc_html__('Play', 'tomochain-addons') . '</a>';
        }
    ?>
</li>
