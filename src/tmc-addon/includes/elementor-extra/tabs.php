<?php
namespace TMC_Elementor_Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Repeater;
use Elementor\Utils;

class Tabs extends Widget_Base{
    public function get_name()
    {
      return 'tmc_tabs';
    }
    public function get_icon()
    {
        return 'fa fa-info';
    }
    public function get_title()
    {
        return esc_html__('TMC Tabs', 'tmc');
    }
    public function get_categories()
    {
        return [ 'tmc-element-widgets' ];
    }
    protected function _register_controls()
    {
      // Tab Content
      $this->tmc_tabs_option();      
    }
    private function tmc_tabs_option(){
      $this->start_controls_section(
        'tmc_tab_partner',
        [
            'label' => esc_html__('Partner', 'tmc'),
            'tab'   => Controls_Manager::TAB_CONTENT,
        ]
      );
      $this->add_control(
        'p_tab',
        [
          'label'     => __( 'Tab title', 'tmc' ),
          'type'      => Controls_Manager::TEXT,
          'rows'      => 4,
          'default'     => __( 'Partner', 'tmc' ),
          'placeholder'   => __( 'Type your title', 'tmc' ),
        ]
      );
      $repeater = new Repeater();

      $repeater->add_control(
        'p_title', [
          'label' => __( 'Title', 'tmc' ),
          'type' => Controls_Manager::TEXT,
          'default' => __( 'Partner' , 'tmc' ),
          'label_block' => true,
        ]
      );
      $repeater->add_control(
        'p_image',
        [
          'type'      => Controls_Manager::MEDIA,
          'label'     => esc_html__( 'Image', 'tmc' ),
          'default'   => [
            'url'   => Utils::get_placeholder_image_src(),
          ],
        ]
      );

      $repeater->add_control(
        'p_url',
        [
          'label'     => __( 'Url', 'tmc' ),
          'type'      => Controls_Manager::URL,
          'placeholder'   => __( 'https://your-link.com', 'tmc' ),
          'show_external' => true,
          'default'     => [
            'url'     => '',
            'is_external' => true,
            'nofollow' => true,
          ],
        ]
      );

      $this->add_control(
        'p_list',
        [
          'label' => __( 'Partner List', 'tmc' ),
          'type' => Controls_Manager::REPEATER,
          'fields' => $repeater->get_controls(),
          'default' => [
            [
              'p_title' => __( 'Partner 1', 'tmc' ),
            ],
            [
              'p_title' => __( 'Partner 1', 'tmc' ),
            ],
          ],
          'title_field' => '{{{ p_title }}}',
        ]
      );

      $this->end_controls_section();

      $this->start_controls_section(
        'tmc_tab_exchange',
        [
            'label' => esc_html__('Liquidity', 'tmc'),
            'tab'   => Controls_Manager::TAB_CONTENT,
        ]
      );
      $this->add_control(
        'ex_tab',
        [
          'label'     => __( 'Tab title', 'tmc' ),
          'type'      => Controls_Manager::TEXT,
          'rows'      => 4,
          'default'     => __( 'Liquidity', 'tmc' ),
          'placeholder'   => __( 'Type your title', 'tmc' ),
        ]
      );
      $repeater = new Repeater();

      $repeater->add_control(
        'ex_title', [
          'label' => __( 'Title', 'tmc' ),
          'type' => Controls_Manager::TEXT,
          'default' => __( 'Title' , 'tmc' ),
          'label_block' => true,
        ]
      );
      $repeater->add_control(
        'image',
        [
          'type'      => Controls_Manager::MEDIA,
          'label'     => esc_html__( 'Image', 'tmc' ),
          'default'   => [
            'url'   => Utils::get_placeholder_image_src(),
          ],
        ]
      );

      $repeater->add_control(
        'url',
        [
          'label'     => __( 'Url', 'tmc' ),
          'type'      => Controls_Manager::URL,
          'placeholder'   => __( 'https://your-link.com', 'tmc' ),
          'show_external' => true,
          'default'     => [
            'url'     => '',
            'is_external' => true,
            'nofollow' => true,
          ],
        ]
      );
      

      $this->add_control(
        'ex_list',
        [
          'label' => __( 'Exchange List', 'tmc' ),
          'type' => Controls_Manager::REPEATER,
          'fields' => $repeater->get_controls(),
          'default' => [
            [
              'ex_title' => __( 'Bibox', 'tmc' ),
            ],
            [
              'ex_title' => __( 'Kucoin', 'tmc' ),
            ],
          ],
          'title_field' => '{{{ ex_title }}}',
        ]
      );

      $this->end_controls_section();
      $this->start_controls_section(
        'tmc_tab_wallet',
        [
            'label' => esc_html__('Wallet', 'tmc'),
            'tab'   => Controls_Manager::TAB_CONTENT,
        ]
      );
      $this->add_control(
        'w_tab',
        [
          'label'     => __( 'Tab title', 'tmc' ),
          'type'      => Controls_Manager::TEXT,
          'rows'      => 4,
          'default'     => __( 'Wallet', 'tmc' ),
          'placeholder'   => __( 'Type your title', 'tmc' ),
        ]
      );
      $repeater = new Repeater();

      $repeater->add_control(
        'w_title', [
          'label' => __( 'Title', 'tmc' ),
          'type' => Controls_Manager::TEXT,
          'default' => __( 'Wallet' , 'tmc' ),
          'label_block' => true,
        ]
      );

      $repeater->add_control(
        'w_url',
        [
          'label'     => __( 'Url', 'tmc' ),
          'type'      => Controls_Manager::URL,
          'placeholder'   => __( 'https://your-link.com', 'tmc' ),
          'show_external' => true,
          'default'     => [
            'url'     => '',
            'is_external' => true,
            'nofollow' => true,
          ],
        ]
      );
      

      $this->add_control(
        'w_list',
        [
          'label' => __( 'Wallet', 'tmc' ),
          'type' => Controls_Manager::REPEATER,
          'fields' => $repeater->get_controls(),
          'default' => [
            [
              'w_title' => __( 'Wallet 1', 'tmc' ),
            ],
            [
              'w_title' => __( 'Wallet 2', 'tmc' ),
            ],
          ],
          'title_field' => '{{{ w_title }}}',
        ]
      );

      $this->end_controls_section();
      $this->start_controls_section(
        'tmc_tab_channels',
        [
            'label' => esc_html__('Dapp Channels', 'tmc'),
            'tab'   => Controls_Manager::TAB_CONTENT,
        ]
      );
      $this->add_control(
        'c_tab',
        [
          'label'     => __( 'Tab title', 'tmc' ),
          'type'      => Controls_Manager::TEXT,
          'rows'      => 4,
          'default'     => __( 'Tab title', 'tmc' ),
        ]
      );
      $repeater = new Repeater();

      $repeater->add_control(
        'c_title',
        [
          'label' => __( 'Title', 'tmc' ),
          'type' => Controls_Manager::TEXT,
          'default' => __( 'Add Social' , 'tmc' ),
          'label_block' => true,
        ]
      );
      $repeater->add_control(
        'icon',
        [
          'label'   => esc_html__( 'Icons', 'tmc' ),
          'type'    => Controls_Manager::ICON,
        ]
      );

      $repeater->add_control(
        'c_url',
        [
          'label'     => __( 'Url', 'tmc' ),
          'type'      => Controls_Manager::URL,
          'placeholder'   => __( 'https://your-link.com', 'tmc' ),
          'show_external' => true,
          'default'     => [
            'url'     => '',
            'is_external' => true,
            'nofollow' => true,
          ],
        ]
      );
      

      $this->add_control(
        'c_list',
        [
          'label' => __( 'Channels', 'tmc' ),
          'type' => Controls_Manager::REPEATER,
          'fields' => $repeater->get_controls(),
          'default' => [
            [
              'c_title' => __( 'Social 1', 'tmc' ),
            ],
            [
              'c_title' => __( 'Social 2', 'tmc' ),
            ],
          ],
          'title_field' => '{{{ c_title }}}',
        ]
      );

      $this->end_controls_section();      
    }
    protected function render()
    {
       $settings = $this->get_settings();
       $ex_title = $settings['ex_tab'];
       $w_title = $settings['w_tab'];
       $c_title = $settings['c_tab'];
       $p_title = $settings['p_tab'];

       $ex_list = $settings['ex_list'];
       $w_list = $settings['w_list'];
       $c_list = $settings['c_list'];
       $p_list = $settings['p_list'];

        ?>
        <div class="tmc-tabs-widget">
            <ul class="tmc-tab-title">
              <?php if(!empty($p_title)):?>
                <li class="tab-title p-tab active"><a href="#p-tab"><?php echo esc_html($p_title);?></a></li>
              <?php endif;?>
              <?php if(!empty($ex_title)):?>
                <li class="tab-title ex-tab"><a href="#ex-tab"><?php echo esc_html($ex_title);?></a></li>
              <?php endif;?>
              <?php if(!empty($w_title)):?>
                <li class="tab-title w-tab"><a href="#w-tab"><?php echo esc_html($w_title);?></a></li>
              <?php endif;?>
              <?php if(!empty($c_title)):?>
                <li class="tab-title c-tab"><a href="#c-tab"><?php echo esc_html($c_title);?></a></li>
              <?php endif;?>              
            </ul>
            <?php if(!empty($p_list) && is_array($p_list)):?>
              <div id="p-tab" class="tab-content">
                <div class="row">
                  <?php
                    foreach ( $p_list as $p ) {
                      $pt = isset($p['p_title']) ? $p['p_title'] : '';
                      $pi = isset($p['p_image']['url']) ? $p['p_image']['url'] : '';
                      $p_url = !empty($p['url']['url']) ? $p['url']['url'] : '#';
                      $p_link_props = ' href="' . esc_url( $p_url ) . '" ';
                      if ( isset($p['url']['is_external']) && $p['url']['is_external'] === 'on' ) {
                        $p_link_props .= ' target="_blank" ';
                      }
                      if ( isset($p['url']['nofollow']) && $p['url']['nofollow'] === 'on' ) {
                        $link_props .= ' rel="nofollow" ';
                      }
                      ?>
                      <div class="p-item col-md-4 col-sm-6">
                        <a class="link" <?php echo esc_attr($p_link_props);?>>
                          <img src="<?php echo esc_url($pi);?>" alt="<?php echo esc_attr($pt);?>">
                        </a>
                      </div>
                  <?php }?>
                </div>
              </div>
            <?php endif;?>
            <?php if(!empty($ex_list) && is_array($ex_list)):?>
              <div id="ex-tab" class="tab-content">
                <div class="row">
                  <?php
                    foreach ( $ex_list as $ex ) {
                      $et = isset($ex['ex_title']) ? $ex['ex_title'] : '';
                      $ei = isset($ex['image']['url']) ? $ex['image']['url'] : '';
                      $e_url = !empty($ex['url']['url']) ? $ex['url']['url'] : '#';
                      $link_props = ' href="' . esc_url( $e_url ) . '" ';
                      if ( isset($ex['url']['nofollow']) && $ex['url']['is_external'] === 'on' ) {
                        $link_props .= ' target="_blank" ';
                      }
                      if ( isset($ex['url']['nofollow']) && $ex['url']['nofollow'] === 'on' ) {
                        $link_props .= ' rel="nofollow" ';
                      }
                      ?>
                      <div class="ex-item col-md-4 col-sm-6">
                        <a class="link" <?php echo esc_attr($link_props);?>>
                          <img src="<?php echo esc_url($ei);?>" alt="<?php echo esc_attr($et);?>">
                        </a>
                      </div>
                  <?php }?>
                </div>
              </div>
            <?php endif;?>
            <?php if(!empty($w_list) && is_array($w_list)):?>
              <div id="w-tab" class="tab-content">
                <div class="row">
                  <?php
                    foreach ( $w_list as $w ) {
                      $wt = $w['w_title'];
                      $w_url = isset($w['url']['url']) && !empty($w['url']['url']) ? $w['url']['url'] : '#';
                      $w_link_props = ' href="' . esc_url( $w_url ) . '" ';
                      if ( isset($w['url']['is_external']) && $w['url']['is_external'] === 'on' ) {
                        $w_link_props .= ' target="_blank" ';
                      }
                      if ( isset($w['url']['nofollow']) && $w['url']['nofollow'] === 'on' ) {
                        $w_link_props .= ' rel="nofollow" ';
                      }
                      ?>
                      <div class="w-item col-md-4 col-sm-6">
                        <a class="link" <?php echo esc_attr($w_link_props);?>>
                          <?php echo esc_html($wt);?>
                        </a>
                      </div>
                  <?php }?>
                </div>
              </div>
            <?php endif;?>
            <?php if(!empty($c_list) && is_array($c_list)):?>
              <div id="c-tab" class="tab-content">
                <div class="row">
                  <?php
                    foreach ( $c_list as $c ) {
                      $ct = isset($c['c_title']) ? $c['c_title'] : '';
                      $ci = isset($c['icon']) ? $c['icon'] : '';
                      $c_url = !empty($c['url']['url']) ? $c['url']['url'] : '#';
                      $c_link_props = ' href="' . esc_url( $c_url ) . '" ';
                      if ( isset($c['url']['is_external']) && $c['url']['is_external'] === 'on' ) {
                        $c_link_props .= ' target="_blank" ';
                      }
                      if ( isset($c['url']['nofollow']) && $c['url']['nofollow'] === 'on' ) {
                        $c_link_props .= ' rel="nofollow" ';
                      }
                      ?>
                      <div class="c-item col-md-3 col-sm-4">
                        <a class="link" <?php echo esc_attr($c_link_props);?>>
                          <i class="<?php echo esc_attr($ci);?>"></i>
                          <?php echo esc_html($ct);?>
                        </a>
                      </div>
                  <?php }?>
                </div>
              </div>
            <?php endif;?>            
        </div>
        <?php
    }
}