<?php
if (function_exists('vc_set_shortcodes_templates_dir')) {
    $new_vc_dir = TOMOCHAIN_ADDONS_DIR . '/inc/vc-templates';
    vc_set_shortcodes_templates_dir( $new_vc_dir );
}

add_action('vc_before_init', 'tomochain_set_as_theme');
function tomochain_set_as_theme() {
    vc_set_as_theme();
}

add_action( 'vc_after_init', 'load_params' );function load_params() {
    require_once TOMOCHAIN_ADDONS_DIR . 'inc/params/datetime-picker/datetime-picker.php';
}

add_action('vc_after_init', 'tomochain_load_shortcodes');
function tomochain_load_shortcodes() {
    require_once TOMOCHAIN_ADDONS_DIR . '/inc/shortcodes/tomochain-blog.php';
    require_once TOMOCHAIN_ADDONS_DIR . '/inc/shortcodes/tomochain-event.php';
    require_once TOMOCHAIN_ADDONS_DIR . '/inc/shortcodes/tomochain-countdown.php';
    require_once TOMOCHAIN_ADDONS_DIR . '/inc/shortcodes/tomochain-dapp.php';
    require_once TOMOCHAIN_ADDONS_DIR . '/inc/shortcodes/tomochain-dapp2.php';
    require_once TOMOCHAIN_ADDONS_DIR . '/inc/shortcodes/tomochain-image-carousel-item.php';
    require_once TOMOCHAIN_ADDONS_DIR . '/inc/shortcodes/tomochain-image-carousel.php';
    require_once TOMOCHAIN_ADDONS_DIR . '/inc/shortcodes/tomochain-list.php';
    require_once TOMOCHAIN_ADDONS_DIR . '/inc/shortcodes/tomochain-lottie.php';
    require_once TOMOCHAIN_ADDONS_DIR . '/inc/shortcodes/tomochain-roadmap-item.php';
    require_once TOMOCHAIN_ADDONS_DIR . '/inc/shortcodes/tomochain-roadmap.php';
    require_once TOMOCHAIN_ADDONS_DIR . '/inc/shortcodes/tomochain-social.php';
    require_once TOMOCHAIN_ADDONS_DIR . '/inc/shortcodes/tomochain-team.php';
    require_once TOMOCHAIN_ADDONS_DIR . '/inc/shortcodes/tomochain-team-member.php';
    require_once TOMOCHAIN_ADDONS_DIR . '/inc/shortcodes/tomochain-testnet-item.php';
    require_once TOMOCHAIN_ADDONS_DIR . '/inc/shortcodes/tomochain-testnet.php';
    require_once TOMOCHAIN_ADDONS_DIR . '/inc/shortcodes/tomochain-video-item.php';
    require_once TOMOCHAIN_ADDONS_DIR . '/inc/shortcodes/tomochain-videos.php';
}

function tomochain_get_param($param_name, $group = '', $dependency = '') {
    $param = array();

    switch ( $param_name ) {
        case 'css':
            $param = array(
                'group'      => esc_html__( 'Design Options', 'tomochain-addons' ),
                'type'       => 'css_editor',
                'heading'    => esc_html__( 'CSS box', 'tomochain-addons' ),
                'param_name' => 'css',
            );
            break;
        case 'el_class':
            $param = array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Extra class name', 'tomochain-addons' ),
                'param_name'  => 'el_class',
                'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.',
                    'tomochain-addons' ),
            );
            break;
    }

    return $param;
}

add_action('vc_after_init', 'tomochain_update_shortcodes');
function tomochain_update_shortcodes() {
    /* Custom Heading */
    vc_update_shortcode_param( 'vc_custom_heading',
        array(
            'param_name' => 'use_theme_fonts',
            'std'        => 'yes',
    ) );
    vc_add_param( 'vc_custom_heading',
        array(
            'type'       => 'colorpicker',
            'heading'    => esc_html( 'Line Color', 'tomochain-addons' ),
            'param_name' => 'line_color',
            'weight'     => 1
    ) );
}
