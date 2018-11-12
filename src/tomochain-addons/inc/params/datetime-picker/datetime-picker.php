<?php
/**
 * Class TomoChain_Datetime_Picker
 *
 * @package TomoChain
 */
if ( ! class_exists( 'TomoChain_Datetime_Picker' ) ) {
	class TomoChain_Datetime_Picker {

		public function __construct() {

			if ( class_exists( 'WpbakeryShortcodeParams' ) ) {
				WpbakeryShortcodeParams::addField( 'datetimepicker', array(
					$this,
					'render'
				), TOMOCHAIN_ADDONS_URL . '/inc/params/datetime-picker/bootstrap-datetimepicker.min.js' );
			}

			add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
		}

		function admin_scripts() {
			wp_enqueue_style( 'TomoChain-datetimepicker', TOMOCHAIN_ADDONS_URL . '/inc/params/datetime-picker/bootstrap-datetimepicker.min.css' );
		}

		public function render( $settings, $value ) {
			$param_name = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
			$id         = uniqid( 'datetime-picker-' );
			$output     = '<div id="' . $id . '" class="tm-datetime-picker">';
			$output .= '<input data-format="yyyy/MM/dd hh:mm:ss" class="wpb_vc_param_value ' . $param_name . '" name="' . $param_name . '" style="width:258px;" value="' . esc_attr( $value ) . '" />';
			$output .= '<div class="add-on" ><i class="fa fa-calendar"></i></div>';
			$output .= '</div>';

			return $output;
		}
	}

	new TomoChain_Datetime_Picker();
}
