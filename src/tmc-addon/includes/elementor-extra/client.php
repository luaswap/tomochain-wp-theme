<?php
/**
 * TMC client.
 *
 * @since 1.0.0
 */
namespace TMC_Elementor_Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Group_Control_Background;

class Client extends Widget_Base {
	/**
	 * Get widget name.
	 */
	public function get_name() {
		return 'tmc-client';
	}

	/**
	 * Get widget title.
	 */
	public function get_title() {
		return esc_html__( 'TMC Client', 'tmc' );
	}

	/**
	 * Get widget icon.
	 */
	public function get_icon() {
		return 'fa fa-user';
	}

	/**
	 * Get widget categories.
	 *
	 */
	public function get_categories() {
		return [ 'tmc-element-widgets' ];
	}
	/*
	* Depend Style
	*/
	public function get_style_depends() {
        return [
            'owl-carousel',
        ];
    }
	/*
	* Depend Script
	*/
	public function get_script_depends() {
        return [
            'owl-carousel',
            'tmc-elementor',
        ];
    }
    /**
	 * Register Widget controls.
	 */
	protected function _register_controls() {
		// Tab Content
		$this->tmc_client_option();

	}
	/*
	* Config
	*/
	private function tmc_client_option(){
		$this->start_controls_section(
			'tmc_client_section',
			[
				'label' => esc_html__( 'General Options', 'tmc' )
			]
		);
		$this->add_control(
			'layout',
			[
				'type' 			=> Controls_Manager::SELECT,
				'label'   		=> esc_html__( 'Layout', 'tmc' ),
				'default' 		=> 'grid',
				'options' 		=> [
					'grid'  	=> esc_html__( 'Grid', 'tmc' ),
					'slider' 	=> esc_html__( 'Slider', 'tmc' ),
				],
			]
		);

		$this->add_control(
			'style',
			[
				'type' 			=> Controls_Manager::SELECT,
				'label'   		=> esc_html__( 'Style', 'tmc' ),
				'default' 		=> 'natural',
				'options' 		=> [
					'natural'  	=> esc_html__( 'Natural', 'tmc' ),
					'gray' 	=> esc_html__( 'Gray', 'tmc' ),
				],
			]
		);
		$this->add_control(
			'border',
			[
				'type' 			=> Controls_Manager::SWITCHER,
				'label'   		=> esc_html__( 'Border', 'tmc' ),
				'label_off' => esc_html__( 'Off', 'tmc' ),
				'label_on' => esc_html__( 'On', 'tmc' ),
			]
		);
		// Columns.
		$this->add_responsive_control(
			'columns',
			[
				'type'           => Controls_Manager::SELECT,
				'label'          => '<i class="fa fa-columns"></i> ' . esc_html__( 'Columns', 'tmc' ),
				'default'        => 4,
				'tablet_default' => 2,
				'mobile_default' => 1,
				'options'        => [
					1 => 1,
					2 => 2,
					3 => 3,
					4 => 4,
					5 => 5,
					6 => 6,
				],
			]
		);
		$this->add_control(
			'loop',
			[
				'label' => esc_html__( 'Loop', 'tmc' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'Off', 'tmc' ),
				'label_on' => esc_html__( 'On', 'tmc' ),
				'default'   => 'no',
				'condition' => [
					'layout' => 'slider',
				]
			]
		);
		$this->add_control(
			'auto_play',
			[
				'label' => esc_html__( 'Auto Play', 'tmc' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'Off', 'tmc' ),
				'label_on' => esc_html__( 'On', 'tmc' ),
				'default'   => 'no',
				'condition' => [
					'layout' => 'slider',
				]
			]
		);
		$this->add_control(
			'show_nav',
			[
				'label' => esc_html__( 'Show Navigation', 'tmc' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'Off', 'tmc' ),
				'label_on' => esc_html__( 'On', 'tmc' ),
				'default'   => 'yes',
				'condition' => [
					'layout' => 'slider',
				]
			]
		);
		$this->add_control(
			'show_pagination',
			[
				'label' => esc_html__( 'Show Pagination', 'tmc' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'Off', 'tmc' ),
				'label_on' => esc_html__( 'On', 'tmc' ),
				'separator' => 'before',
				'condition' => [
					'layout' => 'slider',
				]
			]
		);
		$this->add_control(
			'tmc_client',
			[
				'label'       => esc_html__( 'Client Item', 'tmc' ),
				'type'        => Controls_Manager::REPEATER,
				'default'	  => [
					[
						'client_url'	=> ''
					],
					[
						'client_url'	=> ''
					],
					[
						'client_url'	=> ''
					],
					[
						'client_url'	=> ''
					],
				],
				'fields'      => [
					[
						'label' 		=> esc_html__( 'Title', 'tmc' ),
						'type' 			=> Controls_Manager::TEXT,
						'name' 			=> 'client_title',
						'placeholder' 	=> esc_html__( 'Client', 'tmc' ),
						'default'		=> esc_html__( 'Client', 'tmc' ),
					],
					[
						'label' 		=> esc_html__( 'Url', 'tmc' ),
						'type' 			=> Controls_Manager::URL,
						'name' 			=> 'client_url',
						'placeholder' 	=> esc_html__( 'https://your-link.com', 'tmc' ),
						'default'		=> [
							'url' 		=> 'https://example.com'
						]
					],
					[
						'type' 			=> Controls_Manager::MEDIA,
						'name'  		=> 'image',
						'label' 		=> esc_html__( 'Choose Image', 'tmc' ),
						'dynamic' 		=> [
							'active' 	=> true,
						],
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					]			
				],
				'title_field' 	=> esc_html__( 'Client Item', 'tmc' ),
			]
		);
		

		$this->end_controls_section();
	}
	/*
	* Base Widget Style
	*/
	private function tmc_client_style(){
		$this->start_controls_section(
			'tmc_client_style_section',
			[
				'label' => esc_html__( 'Client', 'tmc' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->end_controls_section();

	}
	/*
	* Render Widget
	*/
	protected function render() {
		// Get settings.
		$settings = $this->get_settings();
		$layout = $settings['layout'];
		$style = $settings['style'];
		$border = ($settings['border']) ? ' b-r' : '';
		$data_slide = $client_class = '';
		if('grid' == $layout){
			$mobile_class = ( ! empty( $settings['columns_mobile'] ) ? ' tmc-mobile-' . $settings['columns_mobile'] : '' );
			$tablet_class = ( ! empty( $settings['columns_tablet'] ) ? ' tmc-tablet-' . $settings['columns_tablet'] : '' );
			$desktop_class = ( ! empty( $settings['columns'] ) ? ' tmc-desktop-' . $settings['columns'] : '' );
			$client_class = ' tmc-grid-col' . $desktop_class . $tablet_class . $mobile_class;
		}elseif('slider' == $layout){
			$client_class = ' owl-carousel';
			$auto_play = $settings['auto_play'] == 'yes' ? true : false;
			$loop 	= $settings['loop'] == 'yes' ? true : false;
			$show_nav = $settings['show_nav'] == 'yes' ? true : false;
			$show_pagination = $settings['show_pagination'] == 'yes' ? true : false;
			$data_slide = array(
				'items' 	=> $settings['columns'],
				'margin'  	=> 0,
				'loop'		=> $loop,
				'autoplay'  => $auto_play,
				'show_nav'  => $show_nav,
				'dot'  		=> $show_pagination,
				'next'      => sprintf(__('%s <i class="fa fa-angle-right" aria-hidden="true"></i>', 'tmc'),esc_html__('Next', 'tmc')),
				'prev'      => sprintf(__('<i class="fa fa-angle-left" aria-hidden="true"></i> %s', 'tmc'),esc_html__('Previous', 'tmc'))
			);
			$data_slide = 'data-slide="'.esc_attr(json_encode($data_slide) ). '"';
		}
		
		echo '<div class="tmc-client-widget">';
			echo '<div class="' . $layout . $client_class . ' ' . $style . '" ' . $data_slide . '>';
				foreach ( $settings['tmc_client'] as $value ) {
					$image = $value['image'];
					$tooltip = '';
					if(!empty($value['client_title'])){
						$tooltip = 'data-toggle="tooltip" title="'. $value['client_title'] .'"';
					}
					echo '<div class="tmc-client-item tmc-grid-item'. $border .'" '. $tooltip .'">';
							$link_props = ' href="' . esc_url($value['client_url']['url']) . '" ';
							if ( $value['client_url']['is_external'] === 'on' ) {
								$link_props .= ' target="_blank" ';
							}
							if ( $value['client_url']['nofollow'] === 'on' ) {
								$link_props .= ' rel="nofollow" ';
							}
						
						echo '<a class="client-url" ' . $link_props . '>';
						echo '<img class="client-image transition300" src="'. $image['url'] . '" alt="'. esc_attr($value['client_title']) .'">';
						echo '</a>';
					echo '</div><!-- .tmc-client-item -->';
				}
			echo '</div><!-- . tmc-client-wrap -->';
		echo '</div><!-- .tmc-client-widget -->';
	}
}