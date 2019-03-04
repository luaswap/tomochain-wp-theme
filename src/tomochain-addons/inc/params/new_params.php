<?php
/**
 * New shortcode params to use on Tomochain Addons's shortcode
 *
 * @package     Tomochain Addons/Shortcodes
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
 * Create field event category
 */

if ( ! function_exists( 'tomochain_roadmap_category_param' ) ) :
	function tomochain_roadmap_category_param( $settings, $value ) {
		$categories      = get_categories( array(
			'taxonomy' => 'roadmap_category',
		) );
		$class           = 'wpb-input wpb-select ' . $settings['param_name'] . ' ' . $settings['type'] . '_field';
		$selected_values = explode( ',', $value );
		$html            = array( '<div class="vc_custom_param post_categories">' );
		$html[]          = '  <input type="hidden" name="' . $settings['param_name'] . '" value="'.$value.'" class="wpb_vc_param_value" />';
		if ( isset( $categories ) && ! empty( $categories ) && taxonomy_exists( 'event_category' ) ) :
			$html[] = '  <select name="' . $settings['param_name'] . '-select" multiple="true" class="' . $class . '">';
			foreach ( $categories as $category ) {
				$html[] = '    <option value="' . intval( $category->term_id ) . '" ' . ( in_array( $category->term_id,
						$selected_values ) ? 'selected="true"' : '' ) . '>';
				$html[] = '      ' . $category->name;
				$html[] = '    </option>';
			}

			$html[] = '  </select>';
		endif;
		$html[] = '</div>';
		$html[] = '<script>';
		$html[] = '  jQuery("document").ready( function($) {';
		$html[] = '    $( "select[name=\'' . $settings['param_name'] . '-select\']" ).chosen({';
		$html[] = '      width: "100%",';
		$html[] = '    });';
		if(esc_attr( $value ) == '') {
			$html[] = '    var order = $( "select[name=\'' . $settings['param_name'] . '-select\']" ).getSelectionOrder();';
		} else {
			$html[] = '    var order = \''.esc_attr( $value ).'\';';
			$html[] = '    order = order.split(",");';
		}
		$html[] = '    $( "select[name=\'' . $settings['param_name'] . '-select\']" ).setSelectionOrder(order);';
		$html[] = '    $( "select[name=\'' . $settings['param_name'] . '-select\']" ).unbind("change").bind( "change", function(e, params) {';
		$html[] = '      var input_val = $( "input[name=\'' . $settings['param_name'] . '\']" ).val();';
		$html[] = '      var check_selected = "selected" in params;';
		$html[] = '      var input_val_arr = input_val.split(",");';
		$html[] = '      var new_val = "";';
		$html[] = '      if(check_selected) {';
		$html[] = '        if(input_val == "") {';
		$html[] = '          new_val = input_val + params.selected;';
		$html[] = '        } else {';
		$html[] = '          new_val = input_val +","+ params.selected;';
		$html[] = '        }';
		$html[] = '      } else {';
		$html[] = '        new_val = input_val_arr.filter( function(ele) {';
		$html[] = '          return ele != params.deselected;';
		$html[] = '        });';
		$html[] = '        new_val = new_val.join(",");';
		$html[] = '      }';
		$html[] = '      $( "input[name=\'' . $settings['param_name'] . '\']" ).val( new_val );';
		$html[] = '    });';
		$html[] = '  });';
		$html[] = '</script>';

		return implode( "\n", $html );
	}

	vc_add_shortcode_param( 'roadmap_cat', 'tomochain_roadmap_category_param');

endif;