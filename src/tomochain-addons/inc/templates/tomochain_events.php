<?php
/**
 * Shortcode attributes
 *
 * @var $animation
 * @var $el_class
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_TomoChain_Events
 */
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

$css_class = array(
    'tomochain-shortcode',
    'tomochain-events',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    implode( ' ', $css_class ),
    $this->settings['base'],
    $atts );

if (function_exists('pll_get_term')) {
    $posts = get_posts(
        array(
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => 4,
            'category'       => pll_get_term(11)
        )
    );
} else {
    $posts = array();
}
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>">
    <div class="row">
        <?php foreach($posts as $post): ?>
            <div class="col-sm-6 col-lg-3 tomochain-events-item <?php echo $this->getCSSAnimation($animation)?>">
                <div class="event-thumbnail">
                    <a href="<?php echo esc_url(get_permalink($post)); ?>">
                        <?php echo get_the_post_thumbnail($post, 'full'); ?>
                    </a>
                    <div class="event-date">
                        <?php
                        $start_date = date_i18n('d M', strtotime(get_field('start_date', $post->ID)));
                        $end_date   = date_i18n('d M', strtotime(get_field('end_date', $post->ID)));

                        echo $start_date . (strcmp($start_date, $end_date) ? ' - ' . $end_date : ''); ?>
                    </div>
                </div>
                <div class="event-info">
                    <h4 class="event-title text-truncate"><a href="<?php echo esc_url(get_permalink($post)); ?>"><?php echo get_the_title($post); ?></a></h4>
                    <p class="event-venue"><?php the_field('venue', $post); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="col-12">
            <p class="see-all-events">
                <a href="<?php echo esc_url(get_category_link(pll_get_term(11)))?>"><?php esc_html_e('See all our events', 'tomochain-addons'); ?></a>
            </p>
        </div>
    </div>
</div>
