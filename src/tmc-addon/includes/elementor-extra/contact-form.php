<?php
/**
 * TMC Elementor Base Widget.
 *
 * @since 1.0.0
 */
namespace TMC_Elementor_Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

class Contact_Form extends Widget_Base {
	/**
	 * Get widget name.
	 */
	public function get_name() {
		return 'tmc-contact-form';
	}

	/**
	 * Get widget title.
	 */
	public function get_title() {
		return esc_html__( 'TMC Contact Form 7', 'tmc' );
	}

	/**
	 * Get widget icon.
	 */
	public function get_icon() {
		return 'eicon-align-left';
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
		$this->tmc_contact_form_option();
	}
		/**
	 * Get ID Contact Form 7.
	 */
	private function get_wpcf7_id() {
		$options = array();
		if(class_exists('WPCF7')){
			$args = array(
				'post_type' => 'wpcf7_contact_form', 
				'posts_per_page' => -1
			); 
			$cf7Forms = get_posts( $args );
			foreach ($cf7Forms as $value) {
				$options[$value->ID] = $value->post_title;
			}
		}
		return $options;
	}
	/*
	* Config
	*/
	private function tmc_contact_form_option(){
		$this->start_controls_section(
			'tmc_contact_form_section',
			[
				'label' => esc_html__( 'General Options', 'tmc' )
			]
		);
		$this->add_control(
			'title',
			[
				'type'        => Controls_Manager::TEXT,
				'label'       => esc_html__( 'Title', 'tmc' ),
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter text heading', 'tmc' ),
				'default'     => esc_html__( 'Don\'t miss', 'tmc' ),
			]
		);
        $this->add_control(
            'desc',
            [
                'type'        => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__( 'Enter description', 'jobica' ),
                'default'     => esc_html__( 'the latest tech news from us!', 'jobica' ),
            ]
        );

		$this->add_control(
           'align_title',
           [
               'label'  => esc_html__('Tittle Align', 'tmc'),
               'type' => Controls_Manager::CHOOSE,
               'options' => [
                   'left' => [
                       'title' => esc_html__( 'Left', 'tmc' ),
                       'icon' => 'fa fa-align-left',
                   ],
                   'center' => [
                       'title' => esc_html__( 'Center', 'tmc' ),
                       'icon' => 'fa fa-align-center',
                   ],
                   'right' => [
                       'title' => esc_html__( 'Right', 'tmc' ),
                       'icon' => 'fa fa-align-right',
                   ],
               ],
                'default' => 'center',
           ]

       );
		$this->add_control(
			'tmc_wpcf7',
			[
				'label' 	=> esc_html__( 'Select Form', 'tmc' ),
				'type' 		=> Controls_Manager::SELECT,
				'multiple' 	=> true,
				'options' 	=> $this->get_wpcf7_id(),
			]
		);
		$this->add_control(
			'on_mailchimp',
			[
				'label' => esc_html__( 'Form for MailChimp', 'tmc' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'tmc' ),
				'label_off' => esc_html__( 'Off', 'tmc' ),
			]
		);
		$this->add_control(
			'mailchimp_style',
			[
				'label' 	=> esc_html__( 'Style', 'tmc' ),
				'type' 		=> Controls_Manager::SELECT,
				'default'	=> 'style-1',
				'options' 	=> [
					'style-1'	=> __('Style 1','tmc'),
					'style-2'	=> __('Style 2','tmc'),
                    'style-3'   => __('Style 3','tmc'),
				],
				'condition'	=> [
					'on_mailchimp' => 'yes',
				]
			]
		);
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Typography for Title', 'tmc' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .contact-title',
            ]
        );

		$this->add_control(
           'color_title',
           [
               'label'  => esc_html__('Text Color', 'tmc'),
               'type'   => Controls_Manager::COLOR,
               'scheme' => [
                   'type' =>Scheme_Color::get_type(),
                   'value' => Scheme_Color::COLOR_3,
               ],
               'selectors' => [
                   '{{WRAPPER}} .contact-title' => 'color: {{VALUE}}',
                   '{{WRAPPER}} .contact-desc' => 'color: {{VALUE}}',
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
		$mailchimp_style = !empty($settings['on_mailchimp']) ? ' tmc-mailchimp'.' '.$settings['mailchimp_style'] : ''; 
		if(!empty($settings['tmc_wpcf7'])){
		?>
			<div class="tmc-contact-form-widget<?php echo esc_attr($mailchimp_style);?>">
				<div class="tmc-contact-head">
					<h2 class="contact-title mt5 <?php echo $settings['align_title'] ?>"><?php echo esc_html($settings['title']);?></h2>
                    <?php if(!empty($settings['desc'])): ?>
                    <p class="contact-desc mt0 <?php echo $settings['align_title'] ?>"><?php echo esc_html($settings['desc']);?></p>
                    <?php endif; ?>
				</div>
				<div class="tmc-contact-form-content <?php echo $settings['align_title'] ?>">
					<?php echo do_shortcode('[contact-form-7 id="'.$settings['tmc_wpcf7'].'"]');?>
				</div>
			</div>
		<?php }else{?>
			<p class="tmc-warring"><?php esc_html_e('Make sure you have enabled Contact Form 7 plugin.', 'tmc');?></p>
		<?php }?>
	<?php
	}
}