<?php
/**
 * Shortcode attributes
 *
 * @var $atts
 * @var $image
 * @var $name
 * @var $role
 * @var $twitter
 * @var $linkedin
 * @var $github
 * @var $css_animation
 * @var $el_class
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_TomoChain_Team_Member
 */
wp_enqueue_style( 'hint-css' );
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

$css_class = array(
    'tomochain-shortcode',
    'tomochain-team-member',
    'hint--top hint--bounce',
    $this->getCSSAnimation( $css_animation ),
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    implode( ' ', $css_class ),
    $this->settings['base'],
    $atts );

if ( ! empty( $twitter ) && "||" !== $twitter && "|||" !== $twitter ) {
    $url = vc_build_link( $twitter );
}

if ( ! empty( $linkedin ) && "||" !== $linkedin && "|||" !== $linkedin ) {
    $linkedin = vc_build_link( $linkedin );
}

if ( ! empty( $github ) && "||" !== $github && "|||" !== $github ) {
    $github = vc_build_link( $github );
}
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" aria-label="<?php esc_html_e ( 'Click on image to see details', 'tomochain-addons'); ?>">
    <div class="tomochain-team-member__image">
        <a href="#" class="tomochain-team-member__open-popup">
            <?php
                $post_thumbnail = wpb_getImageBySize( array(
                    'attach_id'  => $image,
                    'thumb_size' => '200x200'
                ) );
                $thumbnail = $post_thumbnail['thumbnail'];
                echo $thumbnail;
            ?>
        </a>
    </div>
    <div class="tomochain-team-member__info">
        <h4 class="tomochain-team-member__name"><?php echo $name; ?></h4>
        <p class="tomochain-team-member__role"><?php echo $role; ?></p>
    </div>
</div>
