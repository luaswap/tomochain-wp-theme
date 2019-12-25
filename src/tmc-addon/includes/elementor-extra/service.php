<?php
namespace TMC_Elementor_Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

class Service extends Widget_Base{
    public function get_name()
    {
      return 'tmc_service';
    }
    public function get_icon()
    {
        return 'fa fa-info';
    }
    public function get_title()
    {
        return esc_html__('TMC Service', 'tmc');
    }
    public function get_categories()
    {
        return [ 'tmc-element-widgets' ];
    }
    protected function _register_controls()
    {
      // Tab Content
      $this->tmc_text_info_option();      
    }
    private function tmc_text_info_option(){
      $this->start_controls_section(
        'tmc_text_info',
        [
            'label' => esc_html__('TMC Service', 'tmc'),
            'tab'   => Controls_Manager::TAB_CONTENT,
        ]
      );
      $this->add_control(
        'image',
        [
          'label'   => __( 'Choose Image', 'tmc' ),
          'type'    => Controls_Manager::MEDIA,
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
      $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings();
        $image = $settings['image'];
        ?>
        <div class="tmc-service-widget">
          <div class="tmc-text-icon">
            <?php if(isset($image['url']) && !empty($image['url'])):?>
              <img src="<?php echo esc_url($image['url']);?>" alt="<?php echo esc_attr($settings['title']);?>">
            <?php endif;?>
          </div>
          <div class="tmc-service-content">
            <?php if ( !empty( $settings['title'] ) ) : ?>
                <h3 class="tmc-title-sc">
                    <?php echo $settings['title'] ?>
                </h3>
            <?php endif; ?>
            <?php if ( !empty( $settings['text_editor'] ) ) : ?>
                <div class="tmc-subtitle-sc" >
                    <?php echo  $settings['text_editor'];?>
                </div>
            <?php endif; ?>
          </div>
        </div>
        <?php
    }
}