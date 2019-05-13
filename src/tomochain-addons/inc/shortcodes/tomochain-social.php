<?php
/**
 * Social Links Shortcode
 */
class WPBakeryShortCode_TomoChain_Social extends WPBakeryShortCode {
}
vc_map(
    array(
        'name'        => esc_html__( 'Social', 'tomochain-addons' ),
        'base'        => 'tomochain_social',
        'icon'        => TOMOCHAIN_ADDONS_URI . '/assets/images/icon.png',
        'category'    => esc_html__( 'TomoChain', 'tomochain-addons' ),
        'params'      => array(
            array(
                'type'        => 'param_group',
                'heading'     => esc_html__( 'Social', 'tomochain-addons' ),
                'param_name'  => 'social',
                'description' => esc_html__( 'Enter link - icon for social.', 'tomochain-addons' ),
                'value'       => urlencode( json_encode( array(
                    array(
                        'name' => esc_html__( 'Facebook', 'tomochain-addons' ),
                        'icon' => 'facebook-f',
                        'url'  => 'https://www.facebook.com/tomochainofficial',
                    ),
                    array(
                        'name' => esc_html__( 'Twitter', 'tomochain-addons' ),
                        'icon' => 'twitter',
                        'url'  => 'https://twitter.com/TomoChainANN',
                    ),
                    array(
                        'name' => esc_html__( 'Linkedin', 'tomochain-addons' ),
                        'icon' => 'linkedin-in',
                        'url'  => 'https://www.linkedin.com/company/tomochain/',
                    ),
                    array(
                        'name' => esc_html__( 'Telegram', 'tomochain-addons' ),
                        'icon' => 'telegram-plane',
                        'url'  => 'https://t.me/tomochain',
                    ),
                    array(
                        'name' => esc_html__( 'Weixin', 'tomochain-addons' ),
                        'icon' => 'weixin',
                        'url'  => 'http://localhost/local.tomochain.com.4.9/file/2018/09/wechat-qrcode.jpg',
                    ),
                    array(
                        'name' => esc_html__( 'Reddit', 'tomochain-addons' ),
                        'icon' => 'reddit-alien',
                        'url'  => 'https://www.reddit.com/r/Tomochain/',
                    ),
                    array(
                        'name' => esc_html__( 'Github', 'tomochain-addons' ),
                        'icon' => 'github',
                        'url'  => 'https://github.com/tomochain',
                    ),
                    array(
                        'name' => esc_html__( 'Gitter', 'tomochain-addons' ),
                        'icon' => 'gitter',
                        'url'  => 'https://gitter.im/tomochain/tomochain',
                    ),
                ) ) ),
                'params' => array(
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Name', 'tomochain-addons' ),
                        'param_name'  => 'name',
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Icon', 'tomochain-addons' ),
                        'param_name'  => 'icon',
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Url', 'tomochain-addons' ),
                        'param_name'  => 'url',
                    ),
                ),
            ),
            tomochain_get_param('el_class'),
        	tomochain_get_param('css')
        ),
    )
);