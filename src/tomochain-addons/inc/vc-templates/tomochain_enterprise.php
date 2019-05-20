<?php
/**
 * Shortcode attributes
 *
 * @var $loop
 * @var $auto_play
 * @var $duration
 * @var $el_class
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_TomoChain_dapps
 */
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$el_class = $this->getExtraClass( $el_class );

$css_class = array(
    'tomochain-shortcode',
    'tomochain-enterprise',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    implode( ' ', $css_class ),
    $this->settings['base'],
    $atts );
    $args = array(
        'post_type'      => 'enterprise',
        'post_status'    => 'publish',
        'posts_per_page' => $per_page,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );
    if(!empty($enter_categories)){
        $args['tax_query'] = array(
            'taxonomy' => 'enterprise_cat',
            'field'    => 'term_id',
            'terms'    => explode(',', $enter_categories),
        );
    }
    $enterprise = new WP_Query($args);
    wp_reset_postdata();
    if('slide' == $enterprise_layout){
        wp_enqueue_script( 'slick-carousel' );
    }
    $grid_class = '';
    if('grid' == $enterprise_layout){
        $grid_class = ' col-sm-12 col-lg-'.$columns;
    }
    $custom_url    = get_field( 'enter_custom_url' );
    $open_new_tab  = get_field( 'enter_open_in_new_tab' ) ? '__blank' : '';
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>">
    <div class="shortcode_enterprise_wrap">
        <div class="<?php echo esc_attr($enterprise_layout);?>" <?php if('slide' == $enterprise_layout):?>data-atts="<?php echo esc_attr( json_encode( $atts ) ); ?>"<?php endif;?>>
            <?php if('grid' == $enterprise_layout){?>
                <div class='row'>
            <?php }?>
                <?php if( $enterprise->have_posts() ):
                    while( $enterprise->have_posts() ): $enterprise->the_post();?>
                        <div class="enter_type_post<?php echo esc_attr($grid_class);?>">
                            <div class="enter_wpb_wrapper">
                                <div class="enter_post_img">
                                    <a href="<?php echo $custom_url ? esc_url($custom_url) : get_permalink()?>" target="<?php echo esc_attr($open_new_tab)?>" rel="bookmark">
                                        <?php the_post_thumbnail('tomo-post-thumbnail');?>
                                    </a>
                                </div>
                                <div class="enter_post_txt">
                                <div class="post_inner">
                                    <h4 class="txt_title"><a href="<?php echo $custom_url ? esc_url($custom_url) : get_permalink()?>"><?php echo get_the_title();?></a></h4>
                                    <div class="txt_meta">
                                        <?php 
                                            $terms = get_the_terms(get_the_ID(),'enterprise_cat');
                                            if(!is_wp_error( $terms ) && !empty($terms)){
                                                foreach($terms as $term):?>
                                                    <span><a href="<?php echo esc_url(get_term_link($term->term_id));?>"><?php echo esc_html($term->name);?></a></span>
                                        <?php
                                                endforeach; 
                                            }
                                        ?>
                                        
                                        <?php tomochain_post_date(); ?>
                                    </div>
                                    <?php if(get_the_excerpt()):?>
                                        <div class="entry-content">
                                            <?php
                                                echo tomochain_excerpt($excerpt_length);
                                            ?>
                                        </div>
                                    <?php endif;?>
                                </div>
                            </div>
                            </div>
                        </div><!-- /enter_type_post -->
                    <?php endwhile;?>
                <?php endif;?>
            <?php if('grid' == $enterprise_layout){?>
                </div>
            <?php }?>
        </div>
    </div>
</div>
