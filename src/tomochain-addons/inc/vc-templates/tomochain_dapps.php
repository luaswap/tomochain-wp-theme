<?php
/**
 * Shortcode attributes
 *
 * @var $loop
 * @var $auto_play
 * @var $auto_play_speed
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
    'tomochain-dapp',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    implode( ' ', $css_class ),
    $this->settings['base'],
    $atts );
    if (is_front_page()) {
        $paged   = get_query_var( 'page' ) ? intval( get_query_var( 'page' ) ) : 1;
    } else {
        $paged   = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
    }
    $args = array(
        'post_type'      => 'dapp',
        'post_status'    => 'publish',
        'posts_per_page' => $per_page,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'paged'          => $paged
    );
    $dapps = new WP_Query($args);
    wp_reset_postdata();
    if('slide' == $dapp_layout) wp_enqueue_script( 'slick-carousel' );
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>">
    <div class="dapp-<?php echo esc_attr($dapp_layout);?>" <?php if('slide' == $dapp_layout):?>data-atts="<?php echo esc_attr( json_encode( $atts ) ); ?>"<?php endif;?>>
        <?php if('list' == $dapp_layout):
                tomochain_dapp_filter($per_page,$paged);
        ?>
        <div class="tomochain-dapp-main">
        <?php endif;?>
            <?php if( $dapps->have_posts() ):
                while( $dapps->have_posts() ): $dapps->the_post();
                $custom_url = get_field('dapp_custom_url');
                $contract_address_url = get_field('contract_address_url');
                $open_new_tab = get_field('dapp_open_in_new_tab') ? '__blank' : '';
            ?>
            <div class="tomochain-dapp-item">
                <div class="dapp-thumbnail">
                    <?php
                    if (get_field('image') && 'slide' == $dapp_layout) {
                        echo wp_get_attachment_image(get_field('image'), 'tomo-post-small-thumbnail');
                    }elseif(has_post_thumbnail() && 'slide' != $dapp_layout) {
                        the_post_thumbnail('tomo-post-thumbnail');
                    }else{ 
                        $img_url = get_template_directory_uri() . '/assets/images/image-shortcode.jpg';
                    ?>
                        <img src="<?php echo esc_url($img_url);?>" alt="<?php echo esc_attr(get_the_title());?>">
                    <?php }?>
                </div>
                <div class="dapp-info">
                    <h3 class="dapp-title text-truncate">
                        <?php echo the_title(); ?>
                    </h3>
                    <?php if('list' == $dapp_layout):?>
                        <div class="dapp-content">
                            <?php the_content();?>
                        </div>
                    <?php endif;?>
                    <div class="tomo_btn_tmp_trans box_flexbox">
                        <?php if($custom_url):?>
                            <a class="more-info" href="<?php echo esc_url($custom_url)?>" target="<?php echo esc_attr($open_new_tab); ?>">
                                <?php echo esc_html__('More Info','nootheme')?>
                            </a>
                        <?php endif;?>
                        <?php if($contract_address_url):?>
                            <a href="<?php echo esc_url($contract_address_url)?>" target="<?php echo esc_attr($open_new_tab); ?>">
                                <?php echo esc_html__('Contract Address','nootheme')?>
                            </a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif;?>
            <?php
        if($dapps->max_num_pages > 1 && 'list' == $dapp_layout):
                tomochain_ajax_pagination($dapps,$paged);
            ?>
        </div>
    <?php endif?>
    </div>
</div>
