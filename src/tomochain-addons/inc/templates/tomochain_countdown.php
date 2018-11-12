<?php
/**
 * Shortcode attributes
 *
 * @var $atts
 * @var $datetime
 * @var $time_zone
 * @var $countdown_opts
 * @var $str_second_singular
 * @var $str_second_plural
 * @var $str_minute_singular
 * @var $str_minute_plural
 * @var $str_hour_singular
 * @var $str_hour_plural
 * @var $str_day_singular
 * @var $str_day_plural
 * @var $str_week_singular
 * @var $str_week_plural
 * @var $str_month_singular
 * @var $str_month_plural
 * @var $str_year_singular
 * @var $str_year_plural
 * @var $el_class
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_Amely_Countdown
 */

wp_enqueue_style( 'kbw-countdown', AMELY_LIBS_URI . '/kbw-countdown/css/jquery.countdown.css' );

wp_enqueue_script( 'kbw-plugin',
	AMELY_LIBS_URI . '/kbw-plugin/js/jquery.plugin.min.js',
	array( 'jquery' ),
	null,
	true );

wp_enqueue_script( 'kbw-countdown',
	AMELY_LIBS_URI . '/kbw-countdown/js/jquery.countdown.min.js',
	array( 'jquery' ),
	null,
	true );

// This is needed to extract $font_container_data and $google_fonts_data.
extract( $this->getAttributes( $atts ) );

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// Get font for digit text
extract( $this->getStyles( $el_class, $css, $google_fonts_data, $atts ) );

$settings = get_option( 'wpb_js_google_fonts_subsets' );
if ( is_array( $settings ) && ! empty( $settings ) ) {
	$subsets = '&subset=' . implode( ',', $settings );
} else {
	$subsets = '';
}

if ( isset( $google_fonts_data['values']['font_family'] ) ) {
	wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_data['values']['font_family'] ),
		'//fonts.googleapis.com/css?family=' . $google_fonts_data['values']['font_family'] . $subsets );
}

// Get font for unit text
extract( $this->getAttributes( $atts, true ) );
extract( $this->getStyles( $el_class, $css, $unit_google_fonts_data, $atts, true ) );

if ( isset( $unit_google_fonts_data['values']['font_family'] ) ) {
	wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $unit_google_fonts_data['values']['font_family'] ),
		'//fonts.googleapis.com/css?family=' . $unit_google_fonts_data['values']['font_family'] . $subsets );
}

$css_id        = Amely_VC::get_amely_shortcode_id( 'amely-countdown' );
$shortcode_css = $this->shortcode_css( $css_id );

?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>"
     data-label-singular="<?php echo esc_attr( $this->get_string_translation() ); ?>"
     data-label-plural="<?php echo esc_attr( $this->get_string_translation( false ) ); ?>"
     data-date="<?php echo esc_attr( $datetime ); ?>"
     data-server-date="<?php str_replace( '-', '/', current_time( 'mysql' ) ); ?>"
     data-countdown-format="<?php echo esc_attr( $this->get_countdown_format() ); ?>"
>
	<?php echo esc_attr( $datetime ); ?>
</div>
