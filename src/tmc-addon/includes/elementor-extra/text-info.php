<?php
namespace TMC_Elementor_Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

class Text_Info extends Widget_Base{
    public function get_name()
    {
      return 'tmc_text_info';
    }
    public function get_icon()
    {
        return 'fa fa-info';
    }
    public function get_title()
    {
        return esc_html__('TMC Text Info', 'tmc');
    }
    public function get_categories()
    {
        return [ 'tmc-element-widgets' ];
    }
    protected function _register_controls()
    {
      // Tab Content
      $this->tmc_text_info_option();

      // Tab Style
      $this->tmc_text_info_style();       
    }
    private function tmc_text_info_option(){
      $this->start_controls_section(
        'tmc_text_info',
        [
            'label' => esc_html__('TMC Text Info', 'tmc'),
            'tab'   => Controls_Manager::TAB_CONTENT,
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
            'default' => 'left',
            'toggle' => true,
            'selectors'      => [
              '{{WRAPPER}} .tmc_text_info' => 'text-align: {{VALUE}};',
            ],
        ]

      );

      $this ->add_control(
        'title',
        [
          'label' => esc_html__('Title', 'tmc'),
          'type'   => Controls_Manager::TEXT,
          'default' => esc_html__('TMC Title', 'tmc'),
          'placeholder' => esc_html__('Type your title here', 'tmc'),
        ]
      );
      $this->add_control(
         'text_editor',
         [
            'label' => esc_html__('Description', 'tmc'),
            'type'  => Controls_Manager::WYSIWYG,
            'default'  => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'tmc'),
            'placeholder' => esc_html__('type your description here', 'tmc'),
         ]
      );

      

      $this->add_control(
            'bottom_border',
            [
                'label' => esc_html__('Bottom Border', 'tmc'),
                'type'     => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'tmc'),
                'label_of' => esc_html__('Hide', 'tmc'),
                'default' => false,
            ]
        );
      $this->end_controls_section();
    }

    private function tmc_text_info_style(){
      $this->start_controls_section(
        'tmc_general_text_info',
        [
            'label' => esc_html__('General', 'tmc'),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
      );
      $this->add_control(
        'padding',
        [
          'label' => esc_html__( 'Padding', 'tmc' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%', 'em' ],
          'selectors' => [
            '{{WRAPPER}} .tmc-heading-sc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
        ]
      );
      $this->end_controls_section();

      $this->start_controls_section(
        'tmc_title_text_info',
        [
            'label' => esc_html__('Title', 'tmc'),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
      );
      $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'title_typography',
            'label' => esc_html__( 'Typography for Title', 'tmc' ),
            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .tmc-heading-sc .tmc-title-sc',
        ]
      );
      $this->add_control(
        'title_color',
        [
          'label'  => esc_html__('Title Color', 'tmc'),
            'type'   => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tmc-title-sc' => 'color: {{VALUE}}',
            ],
        ]
      );
      $this->add_control(
        'title_space',
        [
          'label' => esc_html__( 'Space', 'tmc' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%', 'em' ],
          'selectors' => [
            '{{WRAPPER}} .tmc-title-sc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
        ]
      );

      $this->end_controls_section();

      $this->start_controls_section(
        'tmc_desc_text_info',
        [
            'label' => esc_html__('Description', 'tmc'),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
      );
      $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'desc_typography',
            'label' => esc_html__( 'Typography for Title', 'tmc' ),
            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .tmc-subtitle-sc',
        ]
      );

      $this->add_control(
        'description_color',
        [
          'label'  => esc_html__('Description Color', 'tmc'),
            'type'   => Controls_Manager::COLOR,
            'scheme' => [
                   'type' =>Scheme_Color::get_type(),
                   'value' => Scheme_Color::COLOR_3,
               ],
            'selectors' => [
                '{{WRAPPER}} .tmc-subtitle-sc' => 'color: {{VALUE}}',
            ],
        ]
      );
    }

    protected function render()
    {
       $settings = $this->get_settings();
        ?>
        <div class="tmc-heading-sc tmc_text_info tmc-text-info-widget">
            <?php if ( !empty( $settings['title'] ) ) : ?>
                <h3 class="tmc-title-sc">
                    <?php echo $settings['title'] ?>
                </h3>
            <?php endif; ?>

            <?php if ( !empty( $settings['text_editor'] ) ) : ?>
                <div class="tmc-subtitle-sc <?php echo !empty( $settings['bottom_border'] )? 'border-left' : '' ?>" >
                    <?php echo  $settings['text_editor'];?>
                    <?php if ( !empty( $settings['bottom_border'] ) ) : ?>
                      <div class="bottom_border <?php echo esc_attr( $settings['align'] ) ?>"></div>
                  <?php endif; ?>
                </div>
            <?php endif; ?>
            
        </div>
        <?php
    }
}