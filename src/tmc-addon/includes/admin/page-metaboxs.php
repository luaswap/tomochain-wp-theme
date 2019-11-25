<?php
if(!class_exists('TMC_Add_Metabox')):
	class TMC_Add_Metabox {
		/*
		 * Render metabox for Page
		*/
		public function __construct() {
			add_action( 'cmb2_admin_init', array( $this,'tmc_add_metaboxes' ));
		}
		
		/**
		 * Define the metabox and field configurations.
		 */
		public function tmc_add_metaboxes() {

			/**
			 * Initiate the metabox
			 */
			$prefix = 'tmc_';
			$cmb = new_cmb2_box( array(
				'id'            => $prefix . 'metabox',
				'title'         => esc_html__( 'Page Options', 'tmc' ),
				'object_types'  => array( 'page' ), // Post type
				'context'       => 'normal',
				'priority'      => 'high',
				'show_names'    => true, // Show field names on the left
				// 'hookup'       => false, // Only display on frontend
		        // 'save_fields'  => false, // Not Save field
				// 'cmb_styles' => false, // false to disable the CMB stylesheet
				// 'closed'     => true, // Keep the metabox closed by default
			) );
			

			$cmb->add_field( array(
				'name'    => __( 'Hide Page Heading','tmc'),
				'id'      => 'hide_page_heading',
				'type'    => 'checkbox',
			) );
		}
	}
	new TMC_Add_Metabox();
endif;