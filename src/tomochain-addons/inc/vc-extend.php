<?php
add_action('vc_before_init', 'tomochain_set_as_theme');
function tomochain_set_as_theme() {
    vc_set_as_theme();
}

add_action('vc_after_init', 'tomochain_load_shortcodes');
function tomochain_load_shortcodes() {
    require TOMOCHAIN_ADDONS_DIR . '/inc/shortcodes/tomochain-social.php';
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
