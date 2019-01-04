<?php
/**
 * Shortcode attributes
 *
 * @var $images
 * @var $json_code
 * @var $el_class
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_TomoChain_Lottie
 */
wp_enqueue_script('lottie');

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

$css_class = array(
    'tomochain-shortcode',
    'tomochain-lottie',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    implode( ' ', $css_class ),
    $this->settings['base'],
    $atts );

$css_id = tomochain_get_shortcode_id('tomochain-lottie');

$images = explode(',', $images);
$paths = explode('/', wp_get_attachment_image_src($images[0])[0]);
array_pop($paths);
$path_str = implode('/', $paths);

$json_code = urldecode(base64_decode($json_code));
$json_code = str_replace('images/', $path_str . '/', $json_code);

?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr(  $css_id ); ?>" data-animation="<?php echo esc_attr($json_code); ?>"></div>
