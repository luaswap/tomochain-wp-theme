<?php
/**
 * TomoChain Dapp
 */
class WPBakeryShortCode_TomoChain_Roadmap_New extends WPBakeryShortCode {
}

vc_map( array(
    'name'        => esc_html__( 'Road Map New', 'tomochain-addons' ),
    'base'        => 'tomochain_roadmap_new',
    'icon'        => TOMOCHAIN_ADDONS_URI . '/assets/images/icon.png',
    'category'    => esc_html__( 'TomoChain', 'tomochain-addons' ),
    'params'      => array(
        array(
            'type'       => 'textarea_raw_html',
            'param_name' => 'desc_for_all',
            'heading'    => esc_html__( 'Add Description', 'tomochain-addons' ),
            'value'      => '',
            'description'=> esc_html__('Add description for Roadmap', 'tomochain-addons'),
        ),
        tomochain_get_param('el_class'),
        tomochain_get_param('css'),
        array(
            'type'       => 'textfield',
            'param_name' => 'time_update',
            'heading'    => esc_html__( 'Time Roadmap Update', 'tomochain-addons' ),
            'value'      => '',
            'description'=> esc_html__('Enter date format: 5/5/2019 15:37:25', 'tomochain-addons'),
            'group'      => esc_html__( 'Sidebar', 'tomochain-addons' ),
        ),
        
        array(
            'type'        => 'param_group',
            'heading'     => esc_html__( 'Discuss with our Team', 'tomochain-addons' ),
            'param_name'  => 'discuss',
            'value'       => '',
            'params' => array(
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Name', 'tomochain-addons' ),
                    'param_name'  => 'name',
                    'description' => esc_html__( 'Enter name', 'tomochain-addons' ),
                    'admin_label' => true,

                ),
                array(
                    'type'       => 'textfield',
                    'param_name' => 'url',
                    'heading'    => esc_html__( 'Url', 'tomochain-addons' ),
                    'value'      => '',
                    'description'=> esc_html__('Enter Url', 'tomochain-addons'),
                    'group'      => esc_html__( 'Sidebar', 'tomochain-addons' ),
                ),
            ),
            'group' => esc_html__( 'Sidebar', 'tomochain-addons' ),
        ),
        array(
            'type'       => 'textfield',
            'param_name' => 'see_more',
            'heading'    => esc_html__( 'See all recent activities', 'tomochain-addons' ),
            'value'      => '',
            'description'=> esc_html__('Enter Url', 'tomochain-addons'),
            'group'      => esc_html__( 'Sidebar', 'tomochain-addons' ),
        ),
        array(
            'type'       => 'textfield',
            'param_name' => 'resource',
            'heading'    => esc_html__( 'Resource', 'tomochain-addons' ),
            'value'      => '',
            'description'=> esc_html__('Enter Url', 'tomochain-addons'),
            'group'      => esc_html__( 'Sidebar', 'tomochain-addons' ),
        ),
    )
));
