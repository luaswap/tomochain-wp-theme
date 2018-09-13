<?php
/**
 * Shortcode attributes
 *
 * @var $atts
 * @var $is_advisor
 * @var $hide_info
 * @var $image
 * @var $name
 * @var $role
 * @var $twitter
 * @var $linkedin
 * @var $github
 * @var $description
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

$image_url = wp_get_attachment_url($image);
$atts['image_url'] = $image_url;

$css_class = array(
    'tomochain-shortcode',
    'tomochain-team-member',
    $is_advisor == 'yes' ? 'tomochain-team-member--is-advisor' : '',
    $hide_info == 'yes' ? 'tomochain-team-member--hide-info' : '',
    $this->getCSSAnimation( $css_animation ),
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    implode( ' ', $css_class ),
    $this->settings['base'],
    $atts );
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>"
    atts="<?php echo esc_attr(json_encode($atts)); ?>">
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
