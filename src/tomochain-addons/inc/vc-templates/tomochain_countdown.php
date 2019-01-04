<?php
/**
 * Shortcode attributes
 *
 * @var $atts
 * @var $datetime
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

wp_enqueue_style( 'kbw-countdown' );

wp_enqueue_script( 'kbw-plugin' );

wp_enqueue_script( 'kbw-countdown' );

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

$css_class = array(
    'tomochain-shortcode',
    'tomochain-countdown',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    implode( ' ', $css_class ),
    $this->settings['base'],
    $atts );

?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>"
     data-label-singular="<?php echo esc_attr( $this->get_string_translation() ); ?>"
     data-label-plural="<?php echo esc_attr( $this->get_string_translation( false ) ); ?>"
     data-date="<?php echo esc_attr( $datetime ); ?>"
     data-server-date="<?php str_replace( '-', '/', current_time( 'mysql' ) ); ?>"
     data-countdown-format="<?php echo esc_attr( $this->get_countdown_format() ); ?>"
>
	<?php echo esc_attr( $datetime ); ?>
</div>
