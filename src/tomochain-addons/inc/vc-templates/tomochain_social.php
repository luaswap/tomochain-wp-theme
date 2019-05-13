<?php
/**
 * Shortcode attributes
 *
 * @var $el_class
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_TomoChain_Social
 */
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$el_class = $this->getExtraClass( $el_class );

$css_class = array(
    'tomochain-shortcode',
    'tomochain-social',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    implode( ' ', $css_class ),
    $this->settings['base'],
    $atts );
$social = (array)vc_param_group_parse_atts( $social );
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>">
    <ul class="list-inline social-links">
        <?php foreach( $social as $s ) :  
            if(isset($s['url'])) $url = $s['url'];
            if(isset($s['icon'])) $icon = $s['icon'];
            if(isset($s['name'])) $name = $s['name'];?>
            <li class="list-inline-item social-links__items">
                <a class="social-links__link" href="<?php echo esc_url($url); ?>" title="<?php esc_attr_e($name);?>">
                    <i class="fab fa-<?php echo esc_attr($icon); ?>"></i>
                </a>
            </li>
        <?php endforeach;?>
    </ul>
</div>
