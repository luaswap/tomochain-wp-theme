<?php
namespace TMC_Elementor_Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Background;


class Testimonial extends Widget_Base{
    public function get_name()
    {
        return 'tmc_testimonial';
    }
    public function get_title()
    {
        return esc_html__('TMC Testimonial', 'tmc');
    }
    public function get_icon()
    {
       return 'fa fa-code';
    }
    public function get_categories()
    {
        return [ 'tmc-element-widgets' ];
    }
    public function get_style_depends()
    {
       return [
           'owl-carousel',
       ];
    }
    public function get_script_depends()
    {
        return [
            'tmc-elementor',
            'owl-carousel',
        ];
    }

    protected function _register_controls()
    {
        $this->tmc_testimonial_options();
        $this->tmc_testimonial_style();
    }
    private function get_post_type_categories( $taxonomy = 'testimonial_category' ) {
        $options = array('all' => esc_html__('All', 'tmc'));
        if ( ! empty( $taxonomy ) ) {
            // Get categories for post type.
            $terms = get_terms(
                array(
                    'taxonomy'   => $taxonomy,
                    'hide_empty' => true,
                )
            );
            if ( ! empty( $terms ) ) {
                foreach ( $terms as $term ) {
                    if ( isset( $term ) ) {
                        if ( isset( $term->slug ) && isset( $term->name ) ) {
                            $options[ $term->slug ] = $term->name;
                        }
                    }
                }
            }
        }

        return $options;
    }

    private function tmc_testimonial_options(){
        $this-> start_controls_section(
          'tmc_testimonial',
            [
                'label' => esc_html__('Testimonial Option', 'tmc'),
                'tab'   => Controls_Manager::TAB_CONTENT,

            ]
        );
        $this->add_control(
            'style',
            [
                'label' 	=> esc_html__( 'Style', 'tmc' ),
                'type' 		=> Controls_Manager::SELECT,
                'options' 	=> array(
                    'style_1' => esc_html__('Style 1', 'tmc'),
                    'style_2' => esc_html__('Style 2', 'tmc'),
                    'style_3' => esc_html__('Style 3', 'tmc'),
                ),
                'default' 	=> 'style_1',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => esc_html__( 'Background', 'tmc' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .tmc-testimonial-widget',
            ]
        );
        $this->add_control(
            'testimonial_category',
            [
                'label' => esc_html__('Category', 'tmc'),
                'type'  => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'   => $this->get_post_type_categories('testimonial_category'),
                'default'   => 'all',
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
                'condition' => [
                     'style' => 'style_2',
                 ]
            ]
        );
        $this->add_control(
            'auto_play',
            [
                'label' => esc_html__('Auto Play', 'tmc'),
                'type'     => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'tmc'),
                'label_of' => esc_html__('No', 'tmc'),
                'return_value' => true,
                'default' => true,
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
            'avatar',
            [
                'label' => esc_html__('Show Avatar', 'tmc'),
                'type'     => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'tmc'),
                'label_of' => esc_html__('No', 'tmc'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'autoplay_timeout',
            [
                'label' => esc_html__('Autoplay Timeout', 'tmc'),
                'type'  => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                        'px' => [
                                'min'   => 1000,
                                'max'   => 8000,
                                'step'  => 100,

                        ]
                ],
                'default'   => [
                        'unit'  => 'px',
                        'size'  => 1000,
                ]
            ]
        );
        $this->add_control(
             'hidden_nav',
             [
                 'label'    => esc_html__('Navigation', 'tmc'),
                 'type'     => Controls_Manager::SWITCHER,
                 'label_on' => esc_html__('Show', 'tmc'),
                 'label_of' => esc_html__('Hide', 'tmc'),
                 'return_value' => true,
                 'default' => true,
                 'condition' => [
                     'style' => 'style_1',
                 ]
             ]
        );

        $this->add_control(
            'text_align',
            [
                'label' => esc_html__( 'Item Align', 'tmc' ),
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
                  '{{WRAPPER}} .tmc-testimonial-item-wrap' => 'text-align: {{VALUE}};',
                  '{{WRAPPER}} .box_testimonial' => 'text-align: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'margin',
            [
                'label' => esc_html__( 'Image Margin', 'tmc' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .box-info-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'style' => 'style_2',
                ]
            ]
        );

        $this->end_controls_section();
    }
    private function tmc_testimonial_style(){
        $this->start_controls_section(

            'tmc_testimonial_style',
            [
                'label' => esc_html__('Testimonial Style', 'tmc'),
                'tab'   => Controls_Manager::TAB_STYLE,
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
                    '{{WRAPPER}} .tmc-testimonial-item-wrap'   => 'margin: -{{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .tmc-testimonial-item-wrap'   => 'padding: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_control(
            'name_color',
            [
                'label' => esc_html__( 'Name Color', 'tmc' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .box-content .name' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .box-info-entry .name' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'text_color',
            [
                'label' => esc_html__( 'Content Color', 'tmc' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .box-content' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .box-info-entry' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'position_color',
            [
                'label' => esc_html__( 'Position Color', 'tmc' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .box-content .title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render(){
        $setting = $this->get_settings();

        $mobile_class = ( ! empty( $setting['columns_mobile'] ) ? 'tmc-mobile-' . $setting['columns_mobile'] : '' );
        $tablet_class = ( ! empty( $setting['columns_tablet'] ) ? 'tmc-tablet-' . $setting['columns_tablet'] : '' );
        $desktop_class = ( ! empty( $setting['columns'] ) ? 'tmc-desktop-' . $setting['columns'] : '' );
        
        $args = array(
            'post_type' => 'testimonial',
            'posts_per_page' => '-1',
            'post_status' => 'publish',
        );
        $this->add_render_attribute( 'style', 'class', ['tmc-testimonial-widget'] );
        $style = $this->get_render_attribute_string('style');
        $testimonial_category = $setting['testimonial_category'];
        if($testimonial_category!=='all'){
            $args['tax_query']  = array('relation'=>'AND');
            if(! in_array('all',$testimonial_category)){
                $args['tax_query'][] = array(
                    'taxonomy' => 'testimonial_category',
                    'field'    => 'slug',
                    'terms'    =>  $testimonial_category,
                );
            }
        }
        $r = new \WP_Query($args);
        $id = uniqid() . '_show_slider';
        $auto_height = $setting['auto_height'] == 'yes' ? true : false;
        $data_slide = array(
            'items' 	        => $setting['columns'],
            'mobilecol'         => !empty($setting['columns_mobile']) ? $setting['columns_mobile'] : 1,
            'center'            => true,
            'tabletcol'         => !empty($setting['columns_tablet']) ? $setting['columns_tablet'] : 2,
            'auto_play'         => $setting['auto_play'],
            'show_nav'          =>($setting['style'] == 'style_1') ? $setting['hidden_nav'] : '' ,
            'dot'  		        => true,
            'auto_height'       => $auto_height,
            'autoplayTimeout'   => $setting['autoplay_timeout']['size'],
        );
        $data_slide = 'data-slide="'.esc_attr(json_encode($data_slide) ). '"';
        if($r->have_posts()):
            ?>
            <div <?php echo $style ?>>
                <?php
                    if($setting['style'] =='style_1'): ?>
                        <div class="testimonial_st1">
                            <div class = "tmc-testimonial-style1 owl-carousel content-slide "   <?php echo $data_slide;?> >
                                <?php
                                while($r->have_posts()):$r->the_post();
                                    $name = get_post_meta( get_the_ID(), '_tmc_wp_post_name', true );
                                    $position = get_post_meta( get_the_ID(), '_tmc_wp_post_position', true );
                                    ?>
                                    <div class="box_testimonial">
                                        <div class="box-content">
                                            <?php the_content(); ?>
                                        </div>
                                        <div class="box-info-entry">
                                            <h4 class="name"><?php echo $name.' - '.$position; ?></h4>
                                        </div>
                                    </div>
                                <?php  endwhile; ?>
                            <?php echo'</div>'; ?>
                            <div class="avatar-slide owl-carousel" <?php echo $data_slide; ?>>
                                <?php while ($r->have_posts()): $r->the_post();
                                    $url      = get_post_meta( get_the_ID(), '_tmc_wp_post_image', true );
                                ?>
                                    <div class="box-testimonial">
                                        <?php if ($setting['avatar'] == 'yes'): ?>
                                            <div class="box-info">
                                                <div class="box-info-image">
                                                    <?php echo wp_get_attachment_image($url,'thumbnail');?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php elseif ($setting['style'] == 'style_2'): ?>
                        <div class="testimonial_st2">
                            <?php 
                            echo '  <div class="tmc-testimonial-style2 owl-carousel" '.$data_slide.' >';
                                while ( $r->have_posts() ): $r->the_post();
                                        $name = get_post_meta( get_the_ID(), '_tmc_wp_post_name', true );
                                        $position = get_post_meta( get_the_ID(), '_tmc_wp_post_position', true );
                                        $url      = get_post_meta( get_the_ID(), '_tmc_wp_post_image', true );
                                        ?>
                                        <div class="box_testimonial_style2 tmc-testimonial-item-wrap">
                                            <?php if ($setting['avatar'] == 'yes'): ?>
                                                <div class="box-info">
                                                    <div class=" box-info-image">
                                                        <?php echo wp_get_attachment_image($url,'jm-thumbnail-logo');?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <div class="box-content">
                                                <?php the_content(); ?>
                                                <div class="box-info-entry">
                                                    <h4 class="name mb5"><?php echo $name;?></h4>
                                                    <span class="title"><?php echo ' - '.$position ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                endwhile;
                            echo '</div>'; ?>
                        </div>
                    <?php elseif ($setting['style'] == 'style_3'): ?>
                       <div class="testimonial_st3">
                            <div class = "owl-carousel content-slide "   <?php echo $data_slide;?> >
                                <?php
                                while($r->have_posts()):$r->the_post();
                                    $name = get_post_meta( get_the_ID(), '_tmc_wp_post_name', true );
                                    $position = get_post_meta( get_the_ID(), '_tmc_wp_post_position', true );
                                    ?>
                                    <div class="box_testimonial">
                                        <div class="box-content">
                                            <?php the_content(); ?>
                                        </div>
                                        <div class="box-info-entry">
                                            <h5 class="name"><?php echo $name.' - '.$position; ?></h5>
                                        </div>
                                    </div>
                                <?php  endwhile; ?>
                            <?php echo'</div>'; ?>
                        </div>
                    <?php endif;
                wp_reset_query();
                echo '</div>';
                ?>
        <?php

        endif;
    }
}