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
 * @var $this WPBakeryShortCode_TomoChain_Blog
 */
wp_enqueue_script( 'slick-carousel' );

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

$css_class = array(
    'tomochain-shortcode',
    'tomochain-blog',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    implode( ' ', $css_class ),
    $this->settings['base'],
    $atts );

$posts = get_posts(
    array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => -1
    )
);

?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>">
    <div class="row blog-carousel" data-atts="<?php echo esc_attr( json_encode( $atts ) ); ?>">
        <?php foreach($posts as $post):
            $custom_url = get_field('custom_url', $post);
            $open_new_tab = get_field('open_in_new_tab', $post) ? '__blank' : '';
            ?>
            <div class="col-sm-6 col-lg-3 tomochain-blog-item">
                <div class="blog-thumbnail">
                    <a href="<?php echo $custom_url ? esc_url($custom_url) : '#'; ?>" target="<?php echo esc_attr($open_new_tab); ?>">
                        <?php
                        if (get_field('image', $post)) {
                            echo wp_get_attachment_image(get_field('image', $post), 'tomo-post-small-thumbnail');
                        } else {
                            echo get_the_post_thumbnail($post, 'tomo-post-small-thumbnail');
                        } ?>
                    </a>
                    <div class="blog-date">
                        <?php
                        $format = 'd M';

                        if ( function_exists('pll__') ) {
                            $format = pll__('d M');
                        }

                        if (function_exists('pll_get_term') && in_category(pll_get_term(11), $post)) {
                            $start_date = date($format, strtotime(get_field('start_date', $post)));
                            $end_date   = date($format, strtotime(get_field('end_date', $post)));

                            echo $start_date . (strcmp($start_date, $end_date) ? ' - ' . $end_date : '');
                        } else {
                            echo get_the_date($format);
                        } ?>
                    </div>
                </div>
                <div class="blog-info">
                    <h4 class="blog-title text-truncate">
                        <a href="<?php echo $custom_url ? esc_url($custom_url) : '#'; ?>" target="<?php echo esc_attr($open_new_tab); ?>">
                            <?php echo get_the_title($post); ?>
                        </a>
                    </h4>
                    <?php if (function_exists('pll_get_term') && in_category(pll_get_term(11), $post)) : ?>
                        <p class="event-venue"><?php the_field('venue', $post); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="row">
        <div class="col-12">
            <p class="see-all-blog">
                <a href="<?php echo esc_url(get_permalink(get_option( 'page_for_posts' )))?>"><?php esc_html_e('See all our news', 'tomochain-addons'); ?></a>
            </p>
        </div>
    </div>
</div>
