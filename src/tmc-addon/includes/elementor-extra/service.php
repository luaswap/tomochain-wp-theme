<?php
/**
 * TMC Service.
 *
 * @since 1.0.0
 */
namespace TMC_Elementor_Widgets;

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Scheme_Color;
use \Elementor\Utils;
use \Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

class Service extends Widget_Base {
	/**
	 * Get widget name.
	 */
	public function get_name() {
		return 'tmc-service';
	}

	/**
	 * Get widget title.
	 */
	public function get_title() {
		return esc_html__( 'TMC Service', 'tmc' );
	}

	/**
	 * Get widget icon.
	 */
	public function get_icon() {
		return 'fa fa-server';
	}

	/**
	 * Get widget categories.
	 *
	 */
	public function get_categories() {
		return [ 'tmc-element-widgets' ];
	}
    /**
	 * Register Widget controls.
	 */
	protected function _register_controls() {
		// Tab Content
		$this->tmc_service_option();

		// Tab Style
		$this->tmc_service_style();
	}
	/*
	* Config
	*/
	private function tmc_service_option(){
		$this->start_controls_section(
			'tmc_service_section',
			[
				'label' => esc_html__( 'General Options', 'tmc' )
			]
		);
		$this->add_control(
			'tmc_services',
			[
				'label'       => esc_html__( 'Services', 'tmc' ),
				'type'        => Controls_Manager::REPEATER,
				'default'     => [
					[
						'title' => esc_html__( 'Award-Winning​', 'tmc' ),
						'text'  => esc_html__( 'Add some text here to describe your services to the page visitors.​', 'tmc' ),
						'alphabet'  => 'A',
						'type' => 'alphabet',
					],
					[
						'title' => esc_html__( 'Professional​', 'tmc' ),
						'text'  => esc_html__( 'Add some text here to describe your services to the page visitors.​', 'tmc' ),
						'alphabet'  => 'P',
						'type' => 'alphabet',
					],
					[
						'title' => esc_html__( 'Consulting​', 'tmc' ),
						'text'  => esc_html__( 'Add some text here to describe your services to the page visitors.​', 'tmc' ),
						'alphabet'  => 'C',
						'type' => 'alphabet',
					],

				],
				
				'fields'      => [
					[
						'type'    => Controls_Manager::CHOOSE,
						'name'    => 'type',
						'label_block' => true,
						'label'   => esc_html__( 'Type', 'tmc' ),
						'default' => 'alphabet',
						'options'   => [
							'alphabet'   => [
								'title' => esc_html__( 'Alphabet', 'tmc' ),
								'icon'  => 'fa fa-sort-alpha-asc'
							],
							'number' => [
								'title' => esc_html__( 'Number', 'tmc' ),
								'icon'	=> 'fa fa-sort-numeric-asc'
							],
							'image-icon'   => [
								'title' => esc_html__( 'Icon', 'tmc' ),
								'icon'  => 'fa fa-font-awesome'
							],
						],
					],
					[
						'type'           => Controls_Manager::SELECT,
						'name'			 => 'select_type',
						'label'          => esc_html__( 'Icon Type', 'tmc' ),
						'default'		 => 'icon',
						'options'        => [
							'icon' 	=> esc_html__('Icon', 'tmc'),
							'image' => esc_html__('Image', 'tmc'),
						],
						'condition' => [
							'type' 			=> 'image-icon',
						],
					],
					[
						'label' 	=> esc_html__( 'Icons', 'tmc' ),
						'name'		=> 'set_icon',
						'type' 		=> Controls_Manager::ICON,
						'condition' => [
							'type' 			=> 'image-icon',
							'select_type' 	=> 'icon'
						],
					],
					[
					    'label'         => esc_html__('Layout','tmc'),
                        'name'          => 'set_layout',
                        'type'          => Controls_Manager::SELECT,
                        'default'		=> 'default',
                        'options'       =>[
                        		'default'	=> esc_html__('Default','tmc'),
                                'style-1' 	=> esc_html__('Style 1','tmc'),
                                'style-2'   => esc_html__('Style 2','tmc'),
                        ],
                        'default'       => 'style-1',
                        'condition' 	=> [
                            'type' 		=> 'image-icon',
                        ],
                    ],
					[
						'type' 			=> Controls_Manager::MEDIA,
						'name'  		=> 'set_image',
						'label' 		=> esc_html__( 'Image', 'tmc' ),
						'description'	=> esc_html__('Recommended size: 60x60 (px)'),
						'dynamic' 		=> [
							'active' 	=> true,
						],
						'default' 	=> [
							'url' 	=> Utils::get_placeholder_image_src(),
						],
						'condition' => [
							'type' 			=> 'image-icon',
							'select_type' 	=> 'image'
						],
					],
					[
						'label' 	=> esc_html__( 'Icon Background', 'tmc' ),
						'name'		=> 'i_bg',
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .image-icon .tmc-service-box .tmc-type' 		=> 'background-color: {{VALUE}};',
						],
						'condition'	=> [
							'type' 			=> 'image-icon',
						]
					],
					[
						'type'    		=> Controls_Manager::TEXT,
						'name'    		=> 'alphabet',
						'label'   		=> esc_html__( 'Alphabet', 'tmc' ),
						'label_block' 	=> true,
						'default' 		=> 'A',
						'condition' 	=> [
							'type' => 'alphabet',
						],
					],
					[	
						'type' 		=> Controls_Manager::NUMBER,
						'name' 		=> 'number',
						'label' 	=> esc_html__( 'Number', 'tmc' ),
						'min' 		=> 1,
						'max' 		=> 50,
						'step' 		=> 1,
						'default' 	=> 1,
						'condition' => [
							'type' 	=> 'number',
						],
					],
					[
						'type'    => Controls_Manager::TEXT,
						'name'    => 'title',
						'label_block' => true,
						'label'   => esc_html__( 'Title & Description', 'tmc' ),
						'default' => esc_html__( 'Service Title', 'tmc' ),
					],
					[
						'type'        => Controls_Manager::TEXTAREA,
						'name'        => 'text',
						'placeholder' => esc_html__( 'Plan Features', 'tmc' ),
						'default'     => esc_html__( 'Feature', 'tmc' ),
					],
					[
						'type' 			=> Controls_Manager::MEDIA,
						'name'  		=> 'bg_image',
						'label' 		=> esc_html__( 'Background Image', 'tmc' ),
						'dynamic' 		=> [
							'active' 	=> true,
						],
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
						'condition' => [
							'type' => 'alphabet',
						],
					],
					[
						'label'     => esc_html__( 'Button', 'tmc' ),
						'type'      => Controls_Manager::HEADING,
						'name' 		=> 'button_heading',
						'separator' => 'before',
					],
					[
						'label'   => '<i class="fa fa-minus-circle"></i> ' . esc_html__( 'Hide', 'tmc' ),
						'type'    => Controls_Manager::SWITCHER,
						'name'	  => 'button_hide',
						'default' => false,
					],
					[
						'type'        => Controls_Manager::TEXT,
						'name'		  => 'button_text',
						'label'       => esc_html__( 'Button text', 'tmc' ),
						'placeholder' => esc_html__( 'Enter text', 'tmc' ),
						'default'     => esc_html__( 'Add text', 'tmc' ),
						'condition'   => [
							'button_hide'    => '',
						],
					],
					[
						'label' => esc_html__( 'Button Link', 'tmc' ),
						'type' 	=> Controls_Manager::URL,
						'name' 	=> 'button_link',
						'placeholder' => esc_html__( 'https://your-link.com', 'tmc' ),
						'condition'   => [
							'button_hide' => '',
						]
					],
					[
						'label'   =>  esc_html__( 'Hover Active', 'tmc' ),
						'type'    => Controls_Manager::SWITCHER,
						'name'	  => 'hover_active',
						'default' => false,
					],
				],
				'title_field' => '{{title}}',
			]
		);
		// Columns.
		$this->add_responsive_control(
			'columns',
			[
				'type'           => Controls_Manager::SELECT,
				'label'          => '<i class="fa fa-columns"></i> ' . esc_html__( 'Columns', 'tmc' ),
				'default'        => 3,
				'tablet_default' => 2,
				'mobile_default' => 1,
				'options'        => [
				    1 => 1,
					2 => 2,
					3 => 3,
					4 => 4,
				],
			]
		);


		$this->add_responsive_control(
			'item_spacing',
			[
				'label'     => esc_html__( 'Item Spacing', 'tmc' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'size' => 15,
				],
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tmc-service-widget'   => 'margin: -{{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .tmc-service-widget .tmc-service-item-wrap'   => 'padding: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();
	}
	/*
	* Service Widget Style
	*/
	private function tmc_service_style(){
		/*------------ Default style -----------------------*/

		$this->start_controls_section(
			'tmc_image_icon_style_section',
			[
				'label' => esc_html__( 'For Image | Icon style', 'tmc' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'image_icon_heading',
			[
				'label' => esc_html__( 'Service Box', 'tmc' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		// Service Box
		$this->start_controls_tabs( 'image_icon_options' );

		$this->start_controls_tab(
			'i_box',
			[
				'label' => esc_html__( 'Normal', 'tmc' ),
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'i_box_hover',
			[
				'label' => esc_html__( 'Hover', 'tmc' ),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background Color', 'tmc' ),
				'types' => [ 'classic','gradient' ],
				'selector' => '{{WRAPPER}} .image-icon .tmc-service-box:hover .tmc-type',
				
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		// Text Content
		$this->add_control(
			'i_content_heading',
			[
				'label' => esc_html__( 'Text Content', 'tmc' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'i_size',
			[
				'label' => esc_html__( 'Icon Size', 'tmc' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 15,
						'max' => 300,
					],
				],
				'default' => [
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .tmc-service-widget .image-icon .tmc-service-box .icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'i_content_options' );

		$this->start_controls_tab(
			'i_content_normal',
			[
				'label' => esc_html__( 'Normal', 'tmc' ),
			]
		);
		$this->add_control(
			'i_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'tmc' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .image-icon .tmc-type .icon' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'i_title_color',
			[
				'label' => esc_html__( 'Title Color', 'tmc' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .image-icon .tmc-service-box-content h3' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'i_content_color',
			[
				'label' => esc_html__( 'Content Color', 'tmc' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .image-icon .tmc-service-box-content p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
		     'tmc_box_service_content_margin_top',
             [
                 'label' => esc_html__('Content margin top','tmc'),
                 'type' => Controls_Manager::SLIDER,
                 'range' => [
                     'px' => [
                         'min' => 0,
                         'max' => 300,
                     ],
                 ],
                 'default' => [
                     'size' => 0,
                 ],
                 'selectors' => [
                     '{{WRAPPER}} .tmc-service-widget .image-icon .tmc-service-box .tmc-service-box-content' => 'margin-top: {{SIZE}}{{UNIT}};',
                 ],
             ]
        );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'i_content_hover',
			[
				'label' => esc_html__( 'Hover', 'tmc' ),
			]
		);
		$this->add_control(
			'i_icon_color_hover',
			[
				'label' => esc_html__( 'Icon Color', 'tmc' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .image-icon .tmc-service-box:hover .tmc-type .icon' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'i_content_color_hover',
			[
				'label' => esc_html__( 'Color', 'tmc' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .image-icon .tmc-service-box:hover .tmc-service-box-content h3' => 'color: {{VALUE}};',
					'{{WRAPPER}} .image-icon .tmc-service-box:hover .tmc-service-box-content p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		// Anphabet
		$this->start_controls_section(
			'tmc_alphabet_style_section',
			[
				'label' => esc_html__( 'For Alphabet style', 'tmc' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'service_heading',
			[
				'label' => esc_html__( 'Service Box', 'tmc' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		// Service Box
		$this->start_controls_tabs( 'service_box_options' );

		$this->start_controls_tab(
			'box_normal',
			[
				'label' => esc_html__( 'Normal', 'tmc' ),
			]
		);

		$this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'tmc' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .alphabet .tmc-service-box' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'box_hover',
			[
				'label' => esc_html__( 'Hover', 'tmc' ),
			]
		);

		$this->add_control(
			'bg_overlay',
			[
				'label' => esc_html__( 'Overlay Color', 'tmc' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(56, 42, 97, 0.85)',
				'selectors' => [
					'{{WRAPPER}} .alphabet .tmc-service-box:hover:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .alphabet .tmc-service-box.hover_active:before' => 'background-color: {{VALUE}};',
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		// Text Blur

		$this->add_control(
			'blur_heading',
			[
				'label' => esc_html__( 'Text Blur', 'tmc' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'text_blur_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__( 'Color', 'tmc' ),
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'default' => 'rgba(58,58,58,0.15)',
				'selectors' => [
					'{{WRAPPER}} .alphabet .tmc-type span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => esc_html__( 'Typography for Alphabet', 'tmc' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .tmc-type',
            ]
        );

		// Text Content

		$this->add_control(
			'content_heading',
			[
				'label' => esc_html__( 'Text Content', 'tmc' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs( 'content_options' );

		$this->start_controls_tab(
			'content_normal',
			[
				'label' => esc_html__( 'Normal', 'tmc' ),
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color Text', 'tmc' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .alphabet .tmc-service-box-content .title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Content Color', 'tmc' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .alphabet .tmc-service-box-content p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'link_color',
			[
				'label' => esc_html__( 'Link Color', 'tmc' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .alphabet .tmc-service-box-content .link' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'content_hover',
			[
				'label' => esc_html__( 'Hover', 'tmc' ),
			]
		);

		$this->add_control(
			'content_color_hover',
			[
				'label' => esc_html__( 'Color', 'tmc' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .alphabet .tmc-service-box:hover .tmc-service-box-content .title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .alphabet .tmc-service-box:hover .tmc-service-box-content p' => 'color: {{VALUE}};',
					'{{WRAPPER}} .alphabet .tmc-service-box.hover_active .tmc-service-box-content .title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .alphabet .tmc-service-box.hover_active .tmc-service-box-content p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'line_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__( 'Line Color', 'tmc' ),
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .alphabet .tmc-service-box-content:after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();

		// Number Sytle

		$this->start_controls_section(
			'tmc_number_style_section',
			[
				'label' => esc_html__( 'For Number style', 'tmc' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'number_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__( 'Text-Border Color', 'tmc' ),
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .number .icon' => 'color: {{VALUE}};border-color:{{VALUE}};',
				],
			]
		);
		$this->add_control(
			'number_size',
			[
				'label' => esc_html__( 'Size', 'tmc' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 15,
						'max' => 300,
					],
				],
				'default' => [
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .number .icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
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
		$mobile_class = ( ! empty( $settings['columns_mobile'] ) ? 'tmc-mobile-' . $settings['columns_mobile'] : '' );
		$tablet_class = ( ! empty( $settings['columns_tablet'] ) ? 'tmc-tablet-' . $settings['columns_tablet'] : '' );
		$desktop_class = ( ! empty( $settings['columns'] ) ? 'tmc-desktop-' . $settings['columns'] : '' );
		$this->add_render_attribute( 'service-grid', 'class', ['tmc-grid-col',$desktop_class,$tablet_class,$mobile_class] );
		$service_grid_class = $this->get_render_attribute_string( 'service-grid' );
		?>
		<div class="tmc-service-widget">
			<div <?php echo implode('',[$service_grid_class]);?>>
				<?php 
					foreach ( $settings['tmc_services'] as $service ) {
						$bg_img = $service['bg_image'];
						$layout = (!empty($service['set_layout'])) ? $service['set_layout'] : '';
						echo '<div class="tmc-service-item-wrap tmc-grid-item '. $service['type'] . ' ' . $layout .'">'
						?>
							<div class="tmc-service-box br4 <?php echo ($service['hover_active'])? 'hover_active': ''; ?>">
								<?php
								// Background image for anphabet type
									if('alphabet' == $service['type'] && !empty($bg_img['url'])){?>
										<div class="tmc-service-bg-img" style="background-image: url(<?php echo esc_url($bg_img['url']);?>)"></div>
								<?php }
								?>
                                <?php
                                     $class_column_icon = $class_column_box_content = '';
                                if($service['set_layout'] =='vertical'){
                                    $class_column_icon = 'col-md-4 col-sm-12';
                                    $class_column_box_content = 'col-md-8 col-sm-12';
                                }
                                    ?>
								<div class="tmc-type <?php echo esc_attr($class_column_icon); ?>" <?php if($service['i_bg']): echo 'style="background-color:'.$service['i_bg'].'"'; endif;?>>
									<div class="icon">
										<span>
											<?php
											if('alphabet' == $service['type'] && !empty($service['alphabet'])){
												echo esc_html($service['alphabet']);
											}elseif('number' == $service['type']){
												echo esc_html($service['number']);
											}else{
												if('icon' == $service['select_type'] && !empty($service['set_icon'])){
													echo '<i class="'. $service['set_icon'] .'"></i>';
												}elseif('image' == $service['select_type']){
													if(!empty($service['set_image'])){
														$set_image = $service['set_image'];
														echo '<img src="'. $set_image['url'].'" alt="'. $service['title'].'">';
													}
												}
											}?>
										</span>
									</div>
								</div>
								<?php
								if ( ! empty( $service['title'] ) || ! empty( $service['text'] ) ) { ?>
									<div class="tmc-service-box-content <?php echo esc_attr($class_column_box_content) ?>">
										<?php if ( ! empty( $service['title'] ) ) { ?>
											<h3 class="title"><?php echo esc_attr( $service['title'] ); ?></h3>
											<h2 class="title-hover"><?php echo esc_attr( $service['title'] ); ?></h2>
											<?php
										}
										if ( ! empty( $service['text'] ) ) { ?>
											<p class="desc"><?php echo ( $service['text'] ); ?></p>
										<?php } ?>

										<?php 
											if ( '' === $service['button_hide']) {
												$link_props = ' href="' . esc_url( $service['button_link']['url'] ) . '" ';
												if ( $service['button_link']['is_external'] === 'on' ) {
													$link_props .= ' target="_blank" ';
												}
												if ( $service['button_link']['nofollow'] === 'on' ) {
													$link_props .= ' rel="nofollow" ';
												} ?>
												<a class="link" <?php echo esc_attr($link_props);?>><?php echo esc_html($service['button_text']);?></a>
										<?php } ?>
										
									</div><!-- /.obfx-service-box-content -->
								<?php } ?>
							</div><!-- /.obfx-service-box -->
							<?php
							if ( ! empty( $service['link']['url'] ) ) {
								echo '</a>';
							} ?>
						</div><!-- /.obfx-grid-wrapper -->
						<?php
					}// End foreach().
				?>
			</div>
		</div>
	<?php	
	}
}