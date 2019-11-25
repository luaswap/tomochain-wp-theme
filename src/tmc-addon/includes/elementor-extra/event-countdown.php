<?php
/**
 * TMC team.
 *
 * @since 1.0.0
 */
namespace TMC_Elementor_Widgets;

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Scheme_Color;

class Event_Countdown extends Widget_Base {
	/**
	 * Get widget name.
	 */
	public function get_name() {
		return 'tmc-event-countdown';
	}

	/**
	 * Get widget title.
	 */
	public function get_title() {
		return esc_html__( 'TMC Event Countdown', 'tmc' );
	}

	/**
	 * Get widget icon.
	 */
	public function get_icon() {
		return 'fa fa-calendar';
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
	public function get_style_depends()
    {
       return [
           'owl-carousel',
       ];
    }
	/*
	* Depend Script
	*/
	public function get_script_depends() {
        return [
        	'jquery-countdown',
            'owl-carousel',
            'tmc-elementor',
        ];
    }
    /**
	 * Register Widget controls.
	 */
	protected function _register_controls() {
		// Tab Content
		$this->tmc_event_countdown_option();
		$this->tmc_event_countdown_style();
	}
	/*
	* Config
	*/
	private function tmc_event_countdown_option(){
		$this->start_controls_section(
			'tmc_event_countdown_option',
			[
				'label' => esc_html__( 'Event Options', 'tmc' )
			]
		);
		$this->add_control(
			'style',
			[
				'type' 			=> Controls_Manager::SELECT,
				'label'   		=> esc_html__( 'Style', 'tmc' ),
				'default' 		=> 'style-1',
				'options' 		=> [
					'style-1'  	=> esc_html__( 'Style 1', 'tmc' ),
					'style-2' 	=> esc_html__( 'Style 2', 'tmc' ),
				]
			]
		);
		$this->add_control(
			'tmc_event_countdown',
			[
				'label'       => esc_html__( 'Event Item', 'tmc' ),
				'show_label'  => false,
				'type'        => Controls_Manager::REPEATER,
				'default'	  => [
					[
						'title'		=> 'Chicago Fitness Job Fair',
						'desc'		=> 'Discover your dream jobs regarding Yoga & Fitness at Tomochain',
						'date'		=> 'Sunday, June 2nd, 2021',
						'location'	=> 'Ground Floor, Building 1, MUI College Slaya Campus'
					],
				],
				'fields'      => [
					
					[
						'type' 			=> Controls_Manager::DATE_TIME,
						'name'			=> 'due_date',
						'label' 		=> __( 'Time Countdown', 'tmc' ),
						'description' 	=> __('Set the event end time','tmc')
					],
					[
						'type' 			=> Controls_Manager::MEDIA,
						'name'  		=> 'image',
						'label' 		=> esc_html__( 'Background Image', 'tmc' ),
						'dynamic' 		=> [
							'active' 	=> true,
						],
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						]
					],
					[
						'type' 			=> Controls_Manager::MEDIA,
						'name'  		=> 'banner',
						'label' 		=> esc_html__( 'Banner', 'tmc' ),
						'dynamic' 		=> [
							'active' 	=> true,
						],
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
						'condition' 	=> [
							'style' 	=> 'style-2'
						]	
					],
					[
						'type' 			=> Controls_Manager::TEXT,
						'name'  		=> 'title',
						'label' 		=> esc_html__( 'Event name', 'tmc' ),
					],
					[
						'type' 			=> Controls_Manager::TEXT,
						'name'  		=> 'date',
						'label' 		=> esc_html__( 'Date', 'tmc' ),
					],
					[
						'type' 			=> Controls_Manager::TEXT,
						'name'  		=> 'time',
						'label' 		=> esc_html__( 'Time', 'tmc' ),
						'condition'		=> [
							'style'     => 'style-2'
						]
					],
					[
						'type' 			=> Controls_Manager::TEXTAREA,
						'name'  		=> 'desc',
						'label' 		=> esc_html__( 'Description', 'tmc' ),
					],
					
					[
						'label' 	=> esc_html__( 'Location', 'tmc' ),
						'type' 		=> Controls_Manager::TEXT,
						'name' 		=> 'location',
					],
					[
						'label' 		=> esc_html__( 'Button Text', 'tmc' ),
						'type' 			=> Controls_Manager::TEXT,
						'name' 			=> 'button_text',
						'default' 		=> esc_html__( 'JOIN NOW', 'tmc' ),
					],
					[
						'label' 		=> esc_html__( 'Button Link', 'tmc' ),
						'type' 			=> Controls_Manager::URL,
						'name' 			=> 'button_link',
						'placeholder' 	=> esc_html__( 'https://your-link.com', 'tmc' ),
					],
				],
				'title_field' 	=> '{{title}}',
			]
		);
		$this->add_control(
			'loop',
			[
				'label' 	=> esc_html__( 'Loop', 'tmc' ),
				'type' 		=> Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'Off', 'tmc' ),
				'label_on' 	=> esc_html__( 'On', 'tmc' ),
				'separator' => 'before'
			]
		);
		$this->add_control(
			'auto_play',
			[
				'label' 	=> esc_html__( 'Auto Play', 'tmc' ),
				'type' 		=> Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'Off', 'tmc' ),
				'label_on' 	=> esc_html__( 'On', 'tmc' ),
				'separator' => 'before'
			]
		);

		 $this->add_control(
            'auto_height',
            [
                'label' => esc_html__('Auto Height', 'tmc'),
                'type'     => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'tmc'),
                'label_of' => esc_html__('No', 'tmc'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

		$this->add_control(
			'show_nav',
			[
				'label' 	=> esc_html__( 'Show Navigation', 'tmc' ),
				'type' 		=> Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'Off', 'tmc' ),
				'label_on' 	=> esc_html__( 'On', 'tmc' ),
				'separator' => 'before'
			]
		);
		$this->add_control(
			'show_pagination',
			[
				'label' 	=> esc_html__( 'Show Pagination', 'tmc' ),
				'type' 		=> Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'Off', 'tmc' ),
				'label_on' 	=> esc_html__( 'On', 'tmc' ),
				'separator' => 'before'
			]
		);
		$this->end_controls_section();
	}
	private function tmc_event_countdown_style(){
        $this->start_controls_section(

            'tmc_event_countdown_style',
            [
                'label' => esc_html__('Style', 'tmc'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'heigh_item',
            [
                'label'     => esc_html__( 'Height', 'tmc' ),
                'type'      => Controls_Manager::SLIDER,
                'default'   => [
                    'size' => 400,
                ],
                'range'     => [
                    'px' => [
                        'min' => 200,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tmc-event-item'   => 'min-height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'tmc' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .style-2 .tmc-event-title' => 'color: {{VALUE}}',
                ],
                'condition'	=> [
                	'tmc_event_countdown_option.style' => 'style-2'
                ]
            ]
        );
        $this->add_control(
            'content_color',
            [
                'label' => esc_html__( 'Content Color', 'tmc' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .style-2 .tmc-event-info' => 'color: {{VALUE}}',
                ],
                'condition'	=> [
                	'tmc_event_countdown_option.style' => 'style-2'
                ]
            ]
        );
        $this->add_control(
            'button_bg',
            [
                'label' => esc_html__( 'Button Background Color', 'tmc' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tmc-event-countdown-widget .style-2 .tmc-event-info-wrap .tmc-event-button' => 'background-color: {{VALUE}}',
                ],
                'condition'	=> [
                	'tmc_event_countdown_option.style' => 'style-2'
                ]
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(

            'tmc_countdown_style',
            [
                'label' => esc_html__('Countdown', 'tmc'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'c_color',
            [
                'label' => esc_html__( 'Color', 'tmc' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tmc-event-countdown-widget .tmc-countdown ul li' => 'color: {{VALUE}}',
                ]
            ]
        );
        $this->add_control(
            'b_color',
            [
                'label' => esc_html__( 'Background Color', 'tmc' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tmc-event-countdown-widget .tmc-countdown ul li' => 'background-color: {{VALUE}}',
                ]
            ]
        );
        $this->end_controls_section();
    }
	/*
	* Render Widget
	*/
	protected function render() {
		// Get settings.
		$settings 	= $this->get_settings();		
		$style 		= $settings['style'];
		$auto_play 	= $settings['auto_play'] == 'yes' ? true : false;
		$loop 		= $settings['loop'] == 'yes' ? true : false;
		$auto_height = $settings['auto_height'] == 'yes' ? true : false;
		$show_nav 	= $settings['show_nav'] == 'yes' ? true : false;
		$dot 		= $settings['show_pagination'] == 'yes' ? true : false;
		$data_slide = array(
            'items' 	        => 1,
            'loop'				=> $loop,
            'autoplay'        	=> $auto_play,
            'auto_height'       => $auto_height,
            'show_nav'          => $show_nav ,
            'dot'  		        => $dot,
            'mobilecol'			=> 1,
            'tabletcol'			=> 1,
            'items'				=> 1,
        );
	    $time_data = array(
	    	'day' 	=> esc_html__('Day','tmc'),
	    	'hr' 	=> esc_html__('Hour','tmc'),
	    	'min' 	=> esc_html__('Min','tmc'),
	    	'sec' 	=> esc_html__('Sec','tmc')
	    );
	    ?>
	    <div class="tmc-event-countdown-widget">
	    	<div class="tmc-event-countdown owl-carousel<?php echo ' '.esc_attr($style);?>" data-slide="<?php esc_attr_e(json_encode($data_slide));?>">
		    <?php foreach ( $settings['tmc_event_countdown'] as $value ) {
		    	$time_countdown = $value['due_date'];
		    	$check_time = strtotime($time_countdown) > time();
		    	$image = isset($value['image']['url']) && !empty($value['image']['url']) ? $value['image']['url'] : '';
		    	$title = $value['title'];
		    	$date = $value['date'];
		    	$time = $value['time'];
		    	$desc = $value['desc'];
		    	$location = $value['location'];
		    	$button_text = $value['button_text'];
		    	$button_link = $value['button_link']['url'];?>
		    	<div class="tmc-event-item"<?php if('style-2' == $style):?> style="background: url(<?php echo esc_url($image)?>) no-repeat;background-size: cover;"<?php endif;?>>
		    		<div class="tmc-countdown"<?php if('style-1' == $style):?> style="background: url(<?php echo esc_url($image)?>) no-repeat;background-size: cover;"<?php endif;?>>
		    			<?php if('style-2' == $style):
		    				$banner = isset($value['banner']['url']) && !empty($value['banner']['url']) ? $value['banner']['url'] : '';
		    				if($banner):?>
				    			<div class="tmc-event-banner pt25 pb25">
				    				<img src="<?php echo esc_url($banner);?>" alt="<?php echo esc_attr($title);?>">
				    			</div>
				    		<?php endif;?>
			    		<?php endif;?>
		    			<div class="countdown" data-time="<?php esc_attr_e($time_countdown);?>" data-check="<?php echo esc_attr($check_time);?>" data-option="<?php esc_attr_e(json_encode($time_data));?>"></div>
		    		</div>
		    		
		    		<div class="tmc-event-info-wrap">
		    			<div class="tmc-event-info">
			    			<h2 class="tmc-event-title mb25 mt0"><?php esc_html_e($title);?></h2>
			    			<?php if('style-1' == $style):?>
			    				<div class="tmc-event-desc mb15">
				    				<span class="desc"><?php esc_html_e($desc);?></span>
				    			</div>
				    			<div class="tmc-event-location mb15">
				    				<i class="linearicons-location mr10" aria-hidden="true"></i>
				    				<span class="location"><?php esc_html_e($location);?></span>
				    			</div>
				    			<div class="tmc-event-date mb15">
				    				<i class="icon_calendar mr10" aria-hidden="true"></i>
				    				<span class="date"><?php esc_html_e($date);?></span>
				    			</div>
			    			
				    		<?php endif;?>
			    			
			    			<?php if('style-2' == $style):?>
			    				<div class="tmc-event-date mb15">
				    				<i class="icon_calendar mr10" aria-hidden="true"></i>
				    				<span class="date"><?php esc_html_e($date);?></span>
				    			</div>
			    				<div class="tmc-event-time mb15">
				    				<i class="icon_clock_alt mr10" aria-hidden="true"></i>
				    				<span class="time"><?php esc_html_e($time);?></span>
				    			</div>
				    			<div class="tmc-event-desc mb15">
				    				<i class="icon_ribbon_alt mr10" aria-hidden="true"></i>
				    				<span class="desc"><?php esc_html_e($desc);?></span>
				    			</div>
				    			<div class="tmc-event-location mb15">
				    				<i class="icon_map_alt mr10" aria-hidden="true"></i>
				    				<span class="location"><?php esc_html_e($location);?></span>
				    			</div>
				    		<?php endif;?>
			    			<div class="tmc-event-button btn btn-hover-effect-2 mb30">
			    				<?php
			    					$link_props = ' href="' . esc_url($button_link) . '" ';
									if ( $value['button_link']['is_external'] === 'on' ) {
										$link_props .= ' target="_blank" ';
									}
									if ( $value['button_link']['nofollow'] === 'on' ) {
										$link_props .= ' rel="nofollow" ';
									}
								echo '<a '. $link_props . ' class="event-link">' . $button_text . '</a>';
			    				?>
			    				
			    			</div>
			    		</div>
		    		</div>
		    	</div>
		    	
		    <?php }?>
		    	
			</div>
	    </div>
	<?php
	}
}