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
    <?php if ( $hide ) : ?>
        <a href="#" class="tomochain-team__see-all"><span><?php esc_html_e ( 'See all our team', 'tomochain-addons'); ?></span></a>
    <?php
        else :
            echo do_shortcode( $content );
        endif; ?>
</div>
