<?php
/**
 * Shortcode attributes
 *
 * @var $atts
 * @var $content
 * @var $hide
 * @var $css_animation
 * @var $el_class
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_TomoChain_Team
 */
wp_enqueue_script( 'animejs' );

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

$hide = isset($hide) && $hide == 'yes';

$css_class = array(
    'tomochain-shortcode',
    'tomochain-team',
    $hide ? 'tomochain-team--hide' : '',
    $this->getCSSAnimation( $css_animation ),
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    implode( ' ', $css_class ),
    $this->settings['base'],
    $atts );
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>">
    <div class="tomochain-team__wrapper">
        <?php echo do_shortcode( $content ); ?>
    </div>
    <?php if ( $hide ) : ?>
        <div class="tomochain-team__see-all-wrapper">
            <a href="#" class="tomochain-team__see-all"><span><?php esc_html_e ( 'See all of our team', 'tomochain-addons'); ?></span></a>
        </div>
    <?php endif; ?>
    <?php if ( !$hide ) : ?>
    <div id="team-member-info">
        <a href="#" class="team-member-info__close">Close</a>
        <div class="team-member-info__wrapper">
            <div class="team-member-info__image">
                <img src="" alt="">
            </div>
            <div class="team-member-info__basic-info">
                <p class="team-member-info__name"></p>
                <p class="team-member-info__role"></p>
            </div>
            <div class="team-member-info__description"></div>
            <div class="team-member-info__social"></div>
        </div>
    </div>
    <?php
        endif; ?>
</div>
