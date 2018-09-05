<?php
/**
 * Shortcode attributes
 *
 * @var $el_class
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_TomoChain_Blog
 */
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
        'posts_per_page' => 4
    )
);
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>">
    <div class="row">
        <?php foreach($posts as $post): ?>
            <div class="col-sm-6 col-lg-3 tomochain-blog-item">
                <div class="blog-thumbnail">
                    <a href="<?php echo esc_url(get_permalink($post)); ?>">
                        <?php
                        if (get_field('image', $post)) {
                            echo wp_get_attachment_image(get_field('image', $post), 'tomo-post-small-thumbnail');
                        } else {
                            echo get_the_post_thumbnail($post, 'tomo-post-small-thumbnail');
                        } ?>
                    </a>
                    <div class="blog-date">
                        <?php
                        $start_date = date_i18n('d M', strtotime(get_field('start_date', $post->ID)));
                        $end_date   = date_i18n('d M', strtotime(get_field('end_date', $post->ID)));

                        echo $start_date . (strcmp($start_date, $end_date) ? ' - ' . $end_date : ''); ?>
                    </div>
                </div>
                <div class="blog-info">
                    <h4 class="blog-title text-truncate"><a href="<?php echo esc_url(get_permalink($post)); ?>"><?php echo get_the_title($post); ?></a></h4>
                    <?php if (function_exists('pll_get_term') && in_category(pll_get_term(11), $post)) : ?>
                        <p class="event-venue"><?php the_field('venue', $post); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="col-12">
            <p class="see-all-blog">
                <a href="<?php echo esc_url(get_permalink(get_option( 'page_for_posts' )))?>"><?php esc_html_e('See all our news', 'tomochain-addons'); ?></a>
            </p>
        </div>
    </div>
</div>
