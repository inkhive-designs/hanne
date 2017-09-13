<?php
//front page builder start
function hanne_customize_register_front_pagebuilder($wp_customize) {
$wp_customize->add_panel('hanne_fpage_builder',
    array(
        'title' => __('Front Page Builder', 'hanne'),
        'priority' => 40,
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

    $wp_customize-> add_control(
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
//
    //font size
    $font_size = array(
        '14px' => 'Default',
        'initial' => 'Initial',
        'small' => 'Small',
        'medium' => 'Medium',
        'large' => 'Large',
        'larger' => 'Larger',
        'x-large' => 'Extra Large',
    );

    $wp_customize->add_setting(
        'hanne_content_font_size', array(
            'default' => '14px',
            'sanitize_callback' => 'hanne_sanitize_fontsize'
        )
    );


    $wp_customize->add_control(
        'hanne_content_font_size', array(
            'settings' => 'hanne_content_font_size',
            'label' => __( 'Content Font Size','hanne' ),
            'section'  => 'hanne_basic_settings_section',
            'type'     => 'select',
            'choices' => $font_size
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
            'description' => __('Upl    oad an image to display in background of HERO', 'hanne'),
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
        'description' => __('Select a Page to display Title. Make sure page should contain feature image.', 'hanne'),
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

//featured page1 start

    $wp_customize->add_section(
        'hanne_a_fpages_boxes',
        array(
            'title'     => __('Featured Pages','hanne'),
            'priority'  => 35,
            'panel'     => 'hanne_fpage_builder',
        )
    );

    $wp_customize->add_setting(
        'hanne_fpages_enable',
        array( 'sanitize_callback' => 'hanne_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'hanne_fpages_enable', array(
            'settings' => 'hanne_fpages_enable',
            'label'    => __( 'Enable this section', 'hanne' ),
            'description'    => __( 'Show one or two of your Featured Content. This can be used to display a information about an Agent, or the company itself. The Featured Pages you choose below, must have a Featured Image, Title & Content. Content Should be less than 150 words for best results.', 'hanne' ),
            'section'  => 'hanne_a_fpages_boxes',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'hanne_fpages_page1',
        array( 'sanitize_callback' => 'absint' )
    );

    $wp_customize->add_control(
        'hanne_fpages_page1', array(
            'settings' => 'hanne_fpages_page1',
            'label'    => __( 'Page 1','hanne' ),
            'description'    => __( 'Make sure page should contain featured image.','hanne' ),
            'section'  => 'hanne_a_fpages_boxes',
            'type'     => 'dropdown-pages',
            'allow_addition' => true,
        )
    );

    $wp_customize->add_setting(
        'hanne_fpages_page1_url',
        array( 'sanitize_callback' => 'esc_url_raw' )
    );

    $wp_customize->add_control(
        'hanne_fpages_page1_url', array(
            'settings' => 'hanne_fpages_page1_url',
            'label'    => __( 'Custom URL','hanne' ),
            'description'    => __( 'Enter URL to link the Learn More button to some other page. Leave Blank to link to the page selected above or any external url. ','hanne' ),
            'section'  => 'hanne_a_fpages_boxes',
            'type'     => 'url',
        )
    );

//featured page1 end.
//featured page2 start.
    $wp_customize->add_setting(
        'hanne_fpages_page2',
        array( 'sanitize_callback' => 'absint' )
    );

    $wp_customize->add_control(
        'hanne_fpages_page2', array(
            'settings' => 'hanne_fpages_page2',
            'label'    => __( 'Page 2','hanne' ),
            'description'    => __( 'Make sure page should contain featured image.','hanne' ),
            'section'  => 'hanne_a_fpages_boxes',
            'type'     => 'dropdown-pages',
            'allow_addition' => true,
        )
    );

    $wp_customize->add_setting(
        'hanne_fpages_page2_url',
        array( 'sanitize_callback' => 'esc_url_raw' )
    );

    $wp_customize->add_control(
        'hanne_fpages_page2_url', array(
            'settings' => 'hanne_fpages_page2_url',
            'label'    => __( 'Custom URL','hanne' ),
            'description'    => __( 'Enter URL to link the Learn More button to some other page or external URL. Leave Blank to link to the page selected above. ','hanne' ),
            'section'  => 'hanne_a_fpages_boxes',
            'type'     => 'url',
        )
    );
//featured page end.
//front page builder end
}
add_action('customize_register', 'hanne_customize_register_front_pagebuilder');