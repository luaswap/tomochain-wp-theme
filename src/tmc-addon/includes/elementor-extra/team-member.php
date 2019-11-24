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

class Team_Member extends Widget_Base {
	/**
	 * Get widget name.
	 */
	public function get_name() {
		return 'tmc-team-member';
	}

	/**
	 * Get widget title.
	 */
	public function get_title() {
		return esc_html__( 'TMC Team Member', 'tmc' );
	}

	/**
	 * Get widget icon.
	 */
	public function get_icon() {
		return 'fa fa-users';
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
            'tmc-elementor',
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
		$this->tmc_team_option();
	}
	/*
	* Config
	*/
	private function tmc_team_option(){
		$this->start_controls_section(
			'tmc_team_section',
			[
				'label' => esc_html__( 'General Options', 'tmc' )
			]
		);
		$this->add_control(
			'style',
			[
				'type' 			=> Controls_Manager::SELECT,
				'label'   		=> esc_html__( 'Style', 'tmc' ),
				'default' 		=> 'slider',
				'options' 		=> [
					'grid'  	=> esc_html__( 'Grid', 'tmc' ),
					'slider' 	=> esc_html__( 'Slider', 'tmc' ),
				],
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
					5 => 5,
					6 => 6,
				],
			]
		);
		$this->add_control(
			'loop',
			[
				'label' 	=> esc_html__( 'Loop', 'tmc' ),
				'type' 		=> Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'Off', 'tmc' ),
				'label_on' 	=> esc_html__( 'On', 'tmc' ),
				'separator' => 'before',
				'default'   => 'yes',
				'condition' => [
					'style' => 'slider',
				]
			]
		);
		$this->add_control(
			'auto_play',
			[
				'label' 	=> esc_html__( 'Auto Play', 'tmc' ),
				'type' 		=> Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'Off', 'tmc' ),
				'label_on' 	=> esc_html__( 'On', 'tmc' ),
				'separator' => 'before',
				'default'   => 'no',
				'condition' => [
					'style' => 'slider',
				]
			]
		);
		$this->add_control(
			'show_nav',
			[
				'label' 	=> esc_html__( 'Show Navigation', 'tmc' ),
				'type' 		=> Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'Off', 'tmc' ),
				'label_on' 	=> esc_html__( 'On', 'tmc' ),
				'separator' => 'before',
				'condition' => [
					'style' => 'slider',
				]
			]
		);
		$this->add_control(
			'show_pagination',
			[
				'label' 	=> esc_html__( 'Show Pagination', 'tmc' ),
				'type' 		=> Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'Off', 'tmc' ),
				'label_on' 	=> esc_html__( 'On', 'tmc' ),
				'separator' => 'before',
				'default'	=> 'yes',
				'condition' => [
					'style' => 'slider',
				]
			]
		);
		$this->add_control(
			'tmc_team',
			[
				'label'       => esc_html__( 'Team Item', 'tmc' ),
				'type'        => Controls_Manager::REPEATER,
				'default'	  => [
					[
						'title'		=> 'Mac Athony',
						'position'	=> 'Back-end Developer'
					],
					[
						'title'		=> 'Tony Jaz',
						'position'	=> 'Designer'
					],
					[
						'title'		=> 'Jaden Horo',
						'position'	=> 'Frond-end'
					],
				],
				'fields'      => [
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
					],
					[
						'type' 			=> Controls_Manager::TEXT,
						'name'  		=> 'title',
						'label' 		=> esc_html__( 'Name', 'tmc' ),
					],
					[
						'type' 			=> Controls_Manager::TEXT,
						'name'  		=> 'position',
						'label' 		=> esc_html__( 'Position', 'tmc' ),
					],
					[
						'label' 	=> esc_html__( 'Social 1', 'tmc' ),
						'type' 		=> Controls_Manager::HEADING,
						'name' 		=> 'social1',
						'separator' => 'before',
					],
					[
						'label' 	=> esc_html__( 'Select icon', 'tmc' ),
						'type' 		=> Controls_Manager::ICON,
						'name'		=> 'icon1',
						'default' 	=> 'fa fa-facebook',
					],
					[
						'label' 		=> esc_html__( 'Link', 'tmc' ),
						'type' 			=> Controls_Manager::URL,
						'name' 			=> 'link1',
						'placeholder' 	=> esc_html__( 'https://your-link.com', 'tmc' ),
					],
					[
						'label' 	=> esc_html__( 'Social 2', 'tmc' ),
						'type' 		=> Controls_Manager::HEADING,
						'name' 		=> 'social2',
						'separator' => 'before',
					],
					[
						'label' 	=> esc_html__( 'Select icon', 'tmc' ),
						'type' 		=> Controls_Manager::ICON,
						'name'		=> 'icon2',
						'default' 	=> 'fa fa-google-plus',
					],
					[
						'label' 		=> esc_html__( 'Link', 'tmc' ),
						'type' 			=> Controls_Manager::URL,
						'name' 			=> 'link2',
						'placeholder' 	=> esc_html__( 'https://your-link.com', 'tmc' ),
					],
					[
						'label' 	=> esc_html__( 'Social 3', 'tmc' ),
						'type' 		=> Controls_Manager::HEADING,
						'name' 		=> 'social3',
						'separator' => 'before',
					],
					[
						'label' 	=> esc_html__( 'Select icon', 'tmc' ),
						'type' 		=> Controls_Manager::ICON,
						'name'		=> 'icon3',
						'default' 	=> 'fa fa-twitter',
					],
					[
						'label' 		=> esc_html__( 'Link', 'tmc' ),
						'type' 			=> Controls_Manager::URL,
						'name' 			=> 'link3',
						'placeholder' 	=> esc_html__( 'https://your-link.com', 'tmc' ),
					],
					[
						'label' 	=> esc_html__( 'Social 4', 'tmc' ),
						'type' 		=> Controls_Manager::HEADING,
						'name' 		=> 'social4',
						'separator' => 'before',
					],
					[
						'label' 	=> esc_html__( 'Select icon', 'tmc' ),
						'type' 		=> Controls_Manager::ICON,
						'name'		=> 'icon4',
						'default' 	=> 'fa fa-linkedin',
					],
					[
						'label' 		=> esc_html__( 'Link', 'tmc' ),
						'type' 			=> Controls_Manager::URL,
						'name' 			=> 'link4',
						'placeholder' 	=> esc_html__( 'https://your-link.com', 'tmc' ),
					],
				],
				'title_field' 	=> '{{title}}',
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
					'{{WRAPPER}} .tmc-team-widget'   => 'margin: -{{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .tmc-team-widget .tmc-team-item'   => 'padding: {{SIZE}}{{UNIT}}',
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
		$style = $settings['style'];
		
		$data_slide = $team_class = '';
		if('grid' == $style){
			$mobile_class = ( ! empty( $settings['columns_mobile'] ) ? ' tmc-mobile-' . $settings['columns_mobile'] : '' );
			$tablet_class = ( ! empty( $settings['columns_tablet'] ) ? ' tmc-tablet-' . $settings['columns_tablet'] : '' );
			$desktop_class = ( ! empty( $settings['columns'] ) ? ' tmc-desktop-' . $settings['columns'] : '' );
			$team_class = ' tmc-grid-col' . $desktop_class . $tablet_class . $mobile_class;
		}elseif('slider' == $style){
			$team_class = ' owl-carousel';
			$loop 	= $settings['loop'] == 'yes' ? true : false;
			$auto_play = $settings['auto_play'] == 'yes' ? true : false;
			$show_nav = $settings['show_nav'] == 'yes' ? true : false;
			$show_pagination = $settings['show_pagination'] == 'yes' ? true : false;
			$data_slide = array(
				'items' 	=> $settings['columns'],
				'margin'  	=> 0,
				'loop'  	=> $loop,
				'center'	=> true,
				'autoplay'  => $auto_play,
				'show_nav'  => $show_nav,
				'dot'  		=> $show_pagination,
				'next'      => sprintf(__('%s <i class="fa fa-angle-right" aria-hidden="true"></i>', 'tmc'),esc_html__('Next', 'tmc')),
				'prev'      => sprintf(__('<i class="fa fa-angle-left" aria-hidden="true"></i> %s', 'tmc'),esc_html__('Previous', 'tmc'))
			);
			$data_slide = 'data-slide="'.esc_attr(json_encode($data_slide) ). '"';
		}
		
		echo '<div class="tmc-team-widget tmc-team-member-widget">';
			echo '<div class="' . $style . $team_class . '" ' . $data_slide . '>';
				foreach ( $settings['tmc_team'] as $value ) {
					$image = $value['image'];
					?>
					
					<div class="tmc-team-item tmc-grid-item transition300">
						<div class="tmc-team-box">
							<img src="<?php echo esc_url($image['url'])?>" alt="<?php echo esc_attr($value['title']);?>">
							<div class="team-info transition400">
								<h4 class="team-name mb0"><?php echo esc_html($value['title']);?></h4>
								<p class="team-position"><?php echo esc_html($value['position']);?></p>
								<ul class="social">
									<?php
									if($value['link1']['url']){
										$link_props1 = ' href="' . esc_url($value['link1']['url']) . '" ';
										if ( $value['link1']['is_external'] === 'on' ) {
											$link_props1 .= ' target="_blank" ';
										}
										if ( $value['link1']['nofollow'] === 'on' ) {
											$link_props1 .= ' rel="nofollow" ';
										}
									}
									if($value['link2']['url']){

										$link_props2 = ' href="' . esc_url($value['link2']['url']) . '" ';
										if ( $value['link2']['is_external'] === 'on' ) {
											$link_props2 .= ' target="_blank" ';
										}
										if ( $value['link2']['nofollow'] === 'on' ) {
											$link_props2 .= ' rel="nofollow" ';
										}
									}
									if($value['link3']['url']){

										$link_props3 = ' href="' . esc_url($value['link3']['url']) . '" ';
										if ( $value['link3']['is_external'] === 'on' ) {
											$link_props3 .= ' target="_blank" ';
										}
										if ( $value['link3']['nofollow'] === 'on' ) {
											$link_props3 .= ' rel="nofollow" ';
										}
									}
									if($value['link4']['url']){
										$link_props4 = ' href="' . esc_url($value['link4']['url']) . '" ';
										if ( $value['link4']['is_external'] === 'on' ) {
											$link_props4 .= ' target="_blank" ';
										}
										if ( $value['link4']['nofollow'] === 'on' ) {
											$link_props4 .= ' rel="nofollow" ';
										}
									}
									if(!empty($value['link1']['url']))
										echo '<li><a class="b-all br4" '. $link_props1 .'><i class="'. esc_attr($value['icon1']) .'"></i></a></li>';
									if(!empty($value['link2']['url']))
										echo '<li><a class="b-all br4" '. $link_props2 .'><i class="'. esc_attr($value['icon2']) .'"></i></a></li>';
									if(!empty($value['link3']['url']))
										echo '<li><a class="b-all br4" '. $link_props3 .'><i class="'. esc_attr($value['icon3']) .'"></i></a></li>';
									if(!empty($value['link4']['url']))
										echo '<li><a class="b-all br4" '. $link_props4 .'><i class="'. esc_attr($value['icon4']) .'"></i></a></li>';

									?>
								</ul>
							</div>
						</div>
					</div><!-- .tmc-team-item -->
				<?php }
			echo '</div><!-- . tmc-team-wrap -->';
		echo '</div><!-- .tmc-team-widget -->';
	}
}