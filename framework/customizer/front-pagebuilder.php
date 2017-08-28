<?php
//front page builder start
function hanne_customize_register_front_pagebuilder($wp_customize) {
$wp_customize->add_panel('hanne_fpage_builder',
    array(
        'title' => __('Front Page Builder', 'hanne'),
        'priority' => 30,
    )
);

//Basic Settings
$wp_customize->add_section('hanne_basic_settings_section',
    array(
        'title' => __('Basic Settings', 'hanne'),
        'priority' => 20,
        'panel' => 'hanne_fpage_builder',
    )
);

//Basic Setting Info
$wp_customize->add_setting(
    'hanne_fpb',
    array( 'sanitize_callback' => 'esc_textarea' )
);

$wp_customize->add_control(
    new hanne_WP_Customize_Upgrade_Control(
        $wp_customize,
        'hanne_fpb',
        array(
            'label' => __('Note','hanne'),
            'description' => __('You need to set your homepage to a Static Front page in order to use any of these settings.','hanne'),
            'section' => 'hanne_basic_settings_section',
            'settings' => 'hanne_fpb',
        )
    )
);

$wp_customize->add_setting('hanne_page_title',
    array(
        'sanitize_callback' => 'hanne_sanitize_checkbox'
    ));
$wp_customize->add_control('hanne_page_title',
    array(
        'setting' => 'hanne_page_title',
        'section' => 'hanne_basic_settings_section',
        'label' => __('Disable Page Title', 'hanne'),
        'description' => __('Default: Enabled. Check to Disable Page Title.', 'hanne'),
        'type' => 'checkbox'
    )
);

$wp_customize->add_setting('hanne_disable_comments',
    array(
        'sanitize_callback' => 'hanne_sanitize_checkbox'
    )
);

$wp_customize->add_control('hanne_disable_comments',
    array(
        'setting' => 'hanne_disable_comments',
        'section' => 'hanne_basic_settings_section',
        'label' => __('Disable Comments Box', 'hanne'),
        'description' => __('Comment Box will be disabled from your Static Page', 'hanne'),
        'type' => 'checkbox',
        'default' => false,
    )
);



//hero 1 section start
//HERO 1
$wp_customize->add_section('hanne_hero1_section',
    array(
        'title' => __('HERO (Above Content)', 'hanne'),
        'priority' => 20,
        'panel' => 'hanne_fpage_builder',
    )
);

$wp_customize->add_setting('hanne_hero_enable',
    array(
        'sanitize_callback' => 'hanne_sanitize_checkbox'
    ));
$wp_customize->add_control('hanne_hero_enable',
    array(
        'setting' => 'hanne_hero_enable',
        'section' => 'hanne_hero1_section',
        'label' => __('Enable HERO', 'hanne'),
        'type' => 'checkbox',
        'default' => false,
    )
);

$wp_customize->add_setting('hanne_hero_background_image',
    array(
        'sanitize_callback' => 'esc_url_raw',
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize, 'hanne_hero_background_image',
        array (
            'setting' => 'hanne_hero_background_image',
            'section' => 'hanne_hero1_section',
            'label' => __('Background Image', 'hanne'),
            'description' => __('Upload an image to display in background of HERO', 'hanne'),
            'active_callback' => 'hanne_hero_active_callback'
        )
    )
);

$wp_customize->add_setting('hanne_hero1_selectpage',
    array(
        'sanitize_callback' => 'absint'
    )
);

$wp_customize->add_control('hanne_hero1_selectpage',
    array(
        'setting' => 'hanne_hero1_selectpage',
        'section' => 'hanne_hero1_section',
        'label' => __('Title', 'hanne'),
        'description' => __('Select a Page to display Title', 'hanne'),
        'type' => 'dropdown-pages',
        'active_callback' => 'hanne_hero_active_callback'
    )
);


$wp_customize->add_setting('hanne_hero1_full_content',
    array(
        'sanitize_callback' => 'hanne_sanitize_checkbox'
    )
);

$wp_customize->add_control('hanne_hero1_full_content',
    array(
        'setting' => 'hanne_hero1_full_content',
        'section' => 'hanne_hero1_section',
        'label' => __('Show Full Content insted of excerpt', 'hanne'),
        'type' => 'checkbox',
        'default' => false,
        'active_callback' => 'hanne_hero_active_callback'
    )
);

$wp_customize->add_setting('hanne_hero1_button',
    array(
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control('hanne_hero1_button',
    array(
        'setting' => 'hanne_hero1_button',
        'section' => 'hanne_hero1_section',
        'label' => __('Button Name', 'hanne'),
        'description' => __('Leave blank to disable Button.', 'hanne'),
        'type' => 'text',
        'active_callback' => 'hanne_hero_active_callback'
    )
);

function hanne_hero_active_callback( $control ) {
    $option = $control->manager->get_setting('hanne_hero_enable');
    return $option->value() == true;
}

//hero 1 section end


//front page builder end
}
add_action('customize_register', 'hanne_customize_register_front_pagebuilder');