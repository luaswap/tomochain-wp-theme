<?php
namespace TMC_Elementor_Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
class Title extends Widget_Base{
    public function get_name()
    {
        return 'tmc_title';
    }
    public function get_title()
    {
       return esc_html__('TMC Title', 'tmc');
    }
    public function get_icon()
    {
      return 'fa fa-text-width';
    }
    public function get_categories()
    {
        return [ 'tmc-element-widgets' ];
    }

    protected function _register_controls()
    {
       $this->start_controls_section(
           'tmc_title',
           [
            'label' => esc_html__('TMC Title', 'tmc'),
            'tab'   => Controls_Manager::TAB_CONTENT,
           ]
       );
       $this->add_control(
               'style',
               [
                   'label' => esc_html__('Select Style', 'tmc'),
                   'type' => Controls_Manager::SELECT,
                   'options' => [
                       'style-1' => esc_html__('Style 1', 'tmc'),
                       'style-2' => esc_html__('Style 2', 'tmc'),
                   ],
                   'default' => 'style-1',
               ]
       );
       $this->add_control(
           'title',
           [
               'label'  => esc_html__('Title', 'tmc'),
               'type'   => Controls_Manager::TEXT,
               'default'=> esc_html__('TMC Title', 'tmc'),
               'placeholder' => esc_html__('Type your title here', 'tmc'),
           ]
       );
       $this->add_control(
           'sub_title',
           [
               'label'  => esc_html__('Sub title', 'tmc'),
               'type'   => Controls_Manager::TEXTAREA,
               'rows'   => 10,
               'placeholder' => esc_html__('Type your description here', 'tmc'),
           ]
       );

        $this->add_control(
           'label',
           [
               'label'  => esc_html__('Label', 'tmc'),
               'type'   => Controls_Manager::TEXT,
               'placeholder' => esc_html__('Type your label', 'tmc'),
           ]
       );

        $this->add_control(
           'top_image',
            [
                'label' => esc_html__('Top Image', 'tmc'),
                'type'  => Controls_Manager::MEDIA,
            ]
       );
       $this->add_control(
           'position_sub_title',
           [
                   'label' => esc_html__('Position Sub Title', 'tmc'),
                   'type' => Controls_Manager::SLIDER,
                    'size_unit' => ['px'],
                    'range' => [
                            'px'    => [
                                    'min' => -500,
                                    'max' => 500,
                                    'step'=> 10,
                            ],
                    ],
               'default' => [
                       'unit' => 'px',
                        'size' => 0,
               ]
           ]
       );
       $this->add_control(
           'color_title',
           [
               'label'  => esc_html__('Title Color', 'tmc'),
               'type'   => Controls_Manager::COLOR,
               'scheme' => [
                   'type' =>Scheme_Color::get_type(),
                   'value' => Scheme_Color::COLOR_2,
               ],
               'selectors' => [
                   '{{WRAPPER}} .tmc-title-sc' => 'color: {{VALUE}}',
               ],
           ]
       );
       $this->add_control(
           'color_description',
           [
               'label' => esc_html__('Description Color', 'tmc'),
               'type'  => Controls_Manager::COLOR,
               'scheme' => [
                   'type' =>Scheme_Color::get_type(),
                   'value' => Scheme_Color::COLOR_3,
               ],
               'selectors' => [
                   '{{WRAPPER}} .tmc-subtitle-sc' => 'color: {{VALUE}}',
               ],
           ]
       );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => esc_html__( 'Typography for Title', 'tmc' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .tmc-title-sc',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_typography',
                'label' => esc_html__( 'Typography for SubTitle', 'tmc' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .tmc-subtitle-sc',
            ]
        );
       $this->add_control(
           'align',
           [
               'label'  => esc_html__('Align', 'tmc'),
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
                'toggle' => true,
                'selectors'      => [
                  '{{WRAPPER}} .tmc-heading-sc' => 'text-align: {{VALUE}};',
                ],
           ]

       );
       $this->end_controls_section();
    }
    protected function render()
    {
      $settings = $this->get_settings();
      ?>
        <div class="tmc-title-widget tmc-heading-sc <?php echo esc_attr($settings['style']); ?>">
          <?php if ( !empty( $settings['top_image'] ) && $settings['top_image']['url']!= '' ) : ?>
                <img src="<?php echo esc_url($settings['top_image']['url'])?>" alt="<?php esc_attr_e('heading-title-image', 'tmc')?>">
          <?php endif; ?>

          <?php if ( !empty( $settings['label'] ) ) : ?>
                <span class="count br5 count-label mb0"><?php echo $settings['label'] ?></span>
          <?php endif; ?>
          
          <?php if ( !empty( $settings['title'] ) ) : ?>
                <h3 class="tmc-title-sc">
                    <?php echo $settings['title'] ?>
                </h3>
          <?php endif; ?>

          <?php if ( !empty( $settings['sub_title'] ) ) : ?>
                <p class="tmc-subtitle-sc" <?php echo (!empty($settings['position_sub_title']['size'])) ? 'style="margin-top:'.$settings['position_sub_title']['size'].'px"' : '' ?>>
                    <?php echo ( $settings['sub_title'] );?>
                </p>
          <?php endif; ?>
        </div>
    <?php
    }

}