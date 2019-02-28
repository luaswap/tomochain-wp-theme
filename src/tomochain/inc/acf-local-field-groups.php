<?php
if( function_exists('acf_add_local_field_group') ) {

    acf_add_local_field_group(array (
        'key' => 'group_5b6d6f78c80c8',
        'title' => 'Theme Options',
        'fields' => array (
            array (
                'key' => 'field_5b6d7177ad969',
                'label' => 'General',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array (
                'key' => 'field_5b6d71e44b8bc',
                'label' => 'Social',
                'name' => 'social',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'button_label' => '',
                'sub_fields' => array (
                    array (
                        'key' => 'field_5b6d71fb4b8bd',
                        'label' => 'Icon Class',
                        'name' => 'icon-class',
                        'type' => 'text',
                        'instructions' => 'You can find the icon <a href="https://fontawesome.com/icons?d=gallery&s=brands" target="_blank">here</a> and copy the name of it, then paste here',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_5b6d722bfd127',
                        'label' => 'URL',
                        'name' => 'url',
                        'type' => 'url',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                    ),
                ),
            ),
            array (
                'key' => 'field_5b765a1170f8a',
                'label' => 'Google Maps API Key',
                'name' => 'google_maps_api_key',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5b6d7177a9696',
                'label' => 'Blog',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array (
                'key' => 'field_5c1db3609eb10',
                'label' => 'Blog Filter',
                'name' => 'blog_filter',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array (
                'key' => 'field_5c1db30e9eb0f',
                'label' => 'Header Image',
                'name' => 'blog_header_image',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'tomo-post-thumbnail',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array (
                'key' => 'field_5c1db3969eb11',
                'label' => 'Blog Columns',
                'name' => 'blog_columns',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array (
                    6 => '2',
                    4 => '3',
                    3 => '4',
                ),
                'default_value' => array (
                    0 => 3,
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'ajax' => 0,
                'return_format' => 'value',
                'placeholder' => '',
            ),
            array (
                'key' => 'field_5c1de456d5648',
                'label' => 'Enable Blog Excerpt',
                'name' => 'blog_enable_excerpt',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array (
                'key' => 'field_5c1db6911ta73',
                'label' => 'Excerpt Length',
                'name' => 'blog_excerpt_length',
                'type' => 'number',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array (
                    array (
                        array (
                            'field' => 'field_5c1de456d5648',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 20,
                'placeholder' => 'Enter number',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array (
                'key' => 'field_5b6d7177a2395',
                'label' => 'Event',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array (
                'key' => 'field_5c1db3609f375',
                'label' => 'Event Filter',
                'name' => 'event_filter',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array (
                'key' => 'field_5c1db30e9ef34',
                'label' => 'Header Image',
                'name' => 'event_header_image',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'tomo-post-thumbnail',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array (
                'key' => 'field_5c1db3969cs74',
                'label' => 'Event Columns',
                'name' => 'event_columns',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array (
                    6 => '2',
                    4 => '3',
                    3 => '4',
                ),
                'default_value' => array (
                    0 => 3,
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'ajax' => 0,
                'return_format' => 'value',
                'placeholder' => '',
            ),
            array (
                'key' => 'field_5c1db6911cadf',
                'label' => 'Event Per Page',
                'name' => 'event_per_page',
                'type' => 'number',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 12,
                'placeholder' => 'Enter number',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array (
                'key' => 'field_5c1de456d3275',
                'label' => 'Enable Event Excerpt',
                'name' => 'event_enable_excerpt',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array (
                'key' => 'field_5c1db6911ad58',
                'label' => 'Excerpt Length',
                'name' => 'event_excerpt_length',
                'type' => 'number',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array (
                    array (
                        array (
                            'field' => 'field_5c1de456d3275',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 20,
                'placeholder' => 'Enter number',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-options',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));
    /* Event Option */
    acf_add_local_field_group(array (
        'key' => 'group_5b76556a2369f',
        'title' => 'Event Option',
        'fields' => array (
            array (
                'key' => 'field_5b8f4c47bac34',
                'label' => 'Image',
                'name' => 'event_image',
                'type' => 'image',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'id',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array (
                'key' => 'field_5b962d6b93h57',
                'label' => 'Custom URL',
                'name' => 'event_custom_url',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
            array (
                'key' => 'field_5b96308b8rf56',
                'label' => '',
                'name' => 'event_open_in_new_tab',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => 'Open in new tab',
                'default_value' => 1,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array (
                'key' => 'field_5b767a4a40a00',
                'label' => 'Start Date',
                'name' => 'start_date',
                'type' => 'date_time_picker',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '33.33',
                    'class' => '',
                    'id' => '',
                ),
                'display_format' => 'd/m/Y g:i a',
                'return_format' => 'd-m-Y G:i',
                'first_day' => 1,
            ),
            array (
                'key' => 'field_5b767b2f1736d',
                'label' => 'End Date',
                'name' => 'end_date',
                'type' => 'date_time_picker',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '33.33',
                    'class' => '',
                    'id' => '',
                ),
                'display_format' => 'd/m/Y g:i a',
                'return_format' => 'd-m-Y G:i',
                'first_day' => 1,
            ),
            array (
                'key' => 'field_5b767a3b21e66',
                'label' => 'Venue',
                'name' => 'venue',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '33.33',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5b765927a4179',
                'label' => 'Location',
                'name' => 'location',
                'type' => 'google_map',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'center_lat' => '21.020592',
                'center_lng' => '105.7893313',
                'zoom' => '',
                'height' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'event',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));
    /* Dapp Option */
    acf_add_local_field_group(array (
        'key' => 'group_5b76556a2568j',
        'title' => 'Dapp Options',
        'fields' => array (
            array (
                'key' => 'field_5b8f4c47bhf83',
                'label' => 'Image',
                'instructions' => 'Size: 200x200. Use this option for Dapp Slider on Home Page',
                'name' => 'dapp_image',
                'type' => 'image',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'id',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array (
                'key' => 'field_5b962d6b9ahe3',
                'label' => 'Custom URL',
                'name' => 'dapp_custom_url',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
            array (
                'key' => 'field_5b862d6b9kr54',
                'label' => 'Contract Address',
                'name' => 'contract_address_url',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
            array (
                'key' => 'field_5b96308b8au76',
                'label' => '',
                'name' => 'dapp_open_in_new_tab',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => 'Open in new tab',
                'default_value' => 0,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'dapp',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));
    /* Post Option */
    acf_add_local_field_group(array (
        'key' => 'group_5b8f4b25f3bcd',
        'title' => 'Post Options',
        'fields' => array (
            array (
                'key' => 'field_5b8f4c47bca4e',
                'label' => 'Image',
                'name' => 'image',
                'type' => 'image',
                'instructions' => 'Size: 200x200',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'id',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array (
                'key' => 'field_5b962d6b92b51',
                'label' => 'Custom URL',
                'name' => 'custom_url',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
            array (
                'key' => 'field_5b96308b8bdc0',
                'label' => '',
                'name' => 'open_in_new_tab',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => 'Open in new tab',
                'default_value' => 0,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array (
                'key' => 'field_5ba363862b121',
                'label' => 'Custom CSS Class',
                'name' => 'custom_css_class',
                'type' => 'text',
                'instructions' => 'Add custom CSS class for the &lt;body&gt; tag',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));
    /* Page Option */
    acf_add_local_field_group(array (
        'key' => 'group_5ba36353d61e8',
        'title' => 'Page Options',
        'fields' => array (
            array (
                'key' => 'field_5b96308b9bdc1',
                'label' => '',
                'name' => 'hide_menu',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => 'Hide the main menu',
                'default_value' => 0,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array (
                'key' => 'field_5b96308b9bdc2',
                'label' => '',
                'name' => 'hide_language_switcher',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => 'Hide the language switcher',
                'default_value' => 0,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array (
                'key' => 'field_5ba363862b121',
                'label' => 'Custom CSS Class',
                'name' => 'custom_css_class',
                'type' => 'text',
                'instructions' => 'Add custom CSS class for the &lt;body&gt; tag',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

    /* Road Map Option */
    acf_add_local_field_group(array (
        'key' => 'group_5c7404d420427',
        'title' => 'Road Map Option',
        'fields' => array (
            array (
                'key' => 'field_5b932d9b43b39',
                'label' => 'Add Url',
                'name' => 'roadmap_url',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'https://example.com',
            ),
            array (
                'key' => 'field_5c3db34e9eb1f',
                'label' => 'Image',
                'name' => 'item_image',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'tomo-post-thumbnail',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array (
                'key' => 'field_5c7404fcd1288',
                'label' => 'Process',
                'name' => 'process',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array (
                    'completed' => 'Completed',
                    'in-progress' => 'In Progress',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
                'return_format' => 'value',
            ),
            array (
                'key' => 'field_5c740617d1289',
                'label' => 'Released date',
                'name' => 'release_date',
                'type' => 'date_picker',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array (
                    array (
                        array (
                            'field' => 'field_5c7404fcd1288',
                            'operator' => '==',
                            'value' => 'completed',
                        ),
                    ),
                ),
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'display_format' => 'd/m/Y',
                'return_format' => 'M d, Y',
                'first_day' => 1,
            ),
            array (
                'key' => 'field_5c7406d7d128a',
                'label' => 'Due date',
                'name' => 'due_date',
                'type' => 'date_picker',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array (
                    array (
                        array (
                            'field' => 'field_5c7404fcd1288',
                            'operator' => '==',
                            'value' => 'in-progress',
                        ),
                    ),
                ),
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'display_format' => 'd/m/Y',
                'return_format' => 'M d, Y',
                'first_day' => 1,
            ),
            array (
                'key' => 'field_5c74079cd128b',
                'label' => 'Progress',
                'name' => 'progress',
                'type' => 'number',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array (
                    array (
                        array (
                            'field' => 'field_5c7404fcd1288',
                            'operator' => '==',
                            'value' => 'in-progress',
                        ),
                    ),
                ),
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 80,
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array (
                'key' => 'field_5b762d6b42b59',
                'label' => 'Github Url',
                'name' => 'github_url',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'https://github.com',
            ),
            array (
                'key' => 'field_5b162d4b42b59',
                'label' => 'Document Url',
                'name' => 'doc_url',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'https://document.com',
            ),
            array (
                'key' => 'field_5b28358b8bdc5',
                'label' => '',
                'name' => 'r_open_in_new_tab',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => 'Open in new tab',
                'default_value' => 0,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'road_map',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));
    /* Activity Option */
    acf_add_local_field_group(array (
        'key' => 'group_5c8404d421424',
        'title' => 'Activity Option',
        'fields' => array (
            array (
                'key' => 'field_5b732d7b42b39',
                'label' => 'Activity Url',
                'name' => 'activity_url',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'https://example.com',
            ),
            array (
                'key' => 'field_5c76c50434021',
                'label' => 'Activity date',
                'name' => 'activity_date',
                'type' => 'date_picker',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'display_format' => 'd/m/Y',
                'return_format' => 'M d, Y',
                'first_day' => 1,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'activity',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

}
