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
 * @var $this WPBakeryShortCode_TomoChain_event
 */
wp_enqueue_script( 'slick-carousel' );

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$el_class = $this->getExtraClass( $el_class );

$css_class = array(
    'tomochain-shortcode',
    'tomochain-event',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);
$class_item = '';
if('grid' == $event_layout){
    $class_item = ' col-sm-6 col-md-'.$columns;
}
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    implode( ' ', $css_class ),
    $this->settings['base'],
    $atts );
    $args = array(
        'post_type'      => 'event',
        'post_status'    => 'publish',
        'posts_per_page' => $per_page,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );
    if('upcoming' === $data_source){
        $args['meta_query'] = array(
            array(
                'key'     => 'start_date',
                'value'   => current_time('mysql'),
                'compare' => '>',
            ),
        );
    }elseif('past' === $data_source){
        $args['meta_query'] = array(
            array(
                'key'     => 'end_date',
                'value'   => current_time('mysql'),
                'compare' => '<',
            ),
        );
    }elseif('current' === $data_source){
        $args['meta_query'] = array(
            'relation'    => 'AND',
            array(
                'key'     => 'start_date',
                'value'   => current_time('mysql'),
                'compare' => '<=',
            ),
            array(
                'key'     => 'end_date',
                'value'   => current_time('mysql'),
                'compare' => '>=',
            ),
        );
    }

    $events = new WP_Query($args);
    wp_reset_postdata();
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>">
    <div class="event-carousel" data-atts="<?php echo esc_attr( json_encode( $atts ) ); ?>">
        <?php if( $events->have_posts() ):
                while( $events->have_posts() ): $events->the_post();

                $custom_url = get_field('event_custom_url');
                $open_new_tab = get_field('event_open_in_new_tab') ? '__blank' : '';
                ?>
                <div class="tomochain-event-item<?php echo esc_attr($class_item);?>">
                    <div class="event-thumbnail">
                        <a href="<?php echo $custom_url ? esc_url($custom_url) : '#'; ?>" target="<?php echo esc_attr($open_new_tab); ?>">
                            <?php
                            if (get_field('image')) {
                                echo wp_get_attachment_image(get_field('image'), 'tomo-post-small-thumbnail');
                            } else {
                                the_post_thumbnail('tomo-post-small-thumbnail');
                            } ?>
                        </a>
                        <div class="event-date">
                            <?php
                            // $format = 'd M';

                            // if ( function_exists('pll__') ) {
                            //     $format = pll__('d M');
                            // }
                            $start_date = date_i18n(get_option('date_format') . ' ' . get_option('time_format'), strtotime(get_field('start_date')));
                            $end_date   = date_i18n(get_option('date_format') . ' ' . get_option('time_format'), strtotime(get_field('end_date')));

                            echo $start_date . (strcmp($start_date, $end_date) ? ' - ' . $end_date : '');?>
                        </div>
                    </div>
                    <div class="event-info">
                        <h4 class="event-title text-truncate">
                            <a href="<?php echo $custom_url ? esc_url($custom_url) : get_permalink(); ?>" target="<?php echo esc_attr($open_new_tab); ?>">
                                <?php echo the_title(); ?>
                            </a>
                        </h4>
                        <?php if(the_field('venue')):?>
                            <p class="event-venue"><?php the_field('venue'); ?></p>
                        <?php endif;?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif;?>
    </div>
    <div class="row">
        <div class="col-12">
            <p class="see-all-event">
                <a href="<?php echo esc_url(get_post_type_archive_link('event'))?>"><?php esc_html_e('See all our news', 'tomochain-addons'); ?></a>
            </p>
        </div>
    </div>
</div>
