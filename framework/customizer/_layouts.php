<?php
// Layout and Design
function hanne_customize_register_layouts( $wp_customize ) {
$wp_customize->add_panel( 'hanne_design_panel', array(
    'priority'       => 40,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Design & Layout','hanne'),
) );

//Blog Layout
$wp_customize->add_section(
    'hanne_design_options',
    array(
        'title'     => __('Blog Layout','hanne'),
        'priority'  => 0,
        'panel'     => 'hanne_design_panel'
    )
);

$wp_customize->add_setting(
    'hanne_blog_layout',
    array( 'sanitize_callback' => 'hanne_sanitize_blog_layout' )
);

function hanne_sanitize_blog_layout( $input ) {
    if ( in_array($input, array('grid','grid_2_column','grid_3_column','hanne') ) )
        return $input;
    else
        return '';
}

$wp_customize->add_control(
    'hanne_blog_layout',array(
        'label' => __('Select Layout','hanne'),
        'settings' => 'hanne_blog_layout',
        'section'  => 'hanne_design_options',
        'type' => 'select',
        'choices' => array(
            'hanne' => __('Hanne Theme Layout','hanne'),
            'grid' => __('Basic Blog Layout','hanne'),
            'grid_2_column' => __('Grid - 2 Column','hanne'),
            'grid_3_column' => __('Grid - 3 Column','hanne'),

        )
    )
);

//Sidebar Layout
$wp_customize->add_section(
    'hanne_sidebar_options',
    array(
        'title'     => __('Sidebar Layout','hanne'),
        'priority'  => 0,
        'panel'     => 'hanne_design_panel'
    )
);

$wp_customize->add_setting(
    'hanne_sidebar_style',
    array(
        'default' => 'default',
    )
);

$wp_customize->add_control(
    'hanne_sidebar_style',
    array(
        'setting' => 'hanne_sidebar_style',
        'section' => 'hanne_sidebar_options',
        'label' => __('Sidebar Style', 'hanne'),
        'type' => 'select',
        'choices' => array(
            'default' => __('Default', 'hanne'),
            'sticky-sidebar' => __('Sticky', 'hanne'),
        )
    )
);

$wp_customize->add_setting(
    'hanne_disable_sidebar',
    array( 'sanitize_callback' => 'hanne_sanitize_checkbox', 'default'  => true )
);

$wp_customize->add_control(
    'hanne_disable_sidebar', array(
        'settings' => 'hanne_disable_sidebar',
        'label'    => __( 'Disable Sidebar Everywhere.','hanne' ),
        'section'  => 'hanne_sidebar_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'hanne_disable_sidebar_home',
    array( 'sanitize_callback' => 'hanne_sanitize_checkbox', 'default'  => true )
);

$wp_customize->add_control(
    'hanne_disable_sidebar_home', array(
        'settings' => 'hanne_disable_sidebar_home',
        'label'    => __( 'Disable Sidebar on Home/Blog.','hanne' ),
        'section'  => 'hanne_sidebar_options',
        'type'     => 'checkbox',
        'active_callback' => 'hanne_show_sidebar_options',
    )
);

$wp_customize->add_setting(
    'hanne_disable_sidebar_front',
    array( 'sanitize_callback' => 'hanne_sanitize_checkbox', 'default'  => true )
);

$wp_customize->add_control(
    'hanne_disable_sidebar_front', array(
        'settings' => 'hanne_disable_sidebar_front',
        'label'    => __( 'Disable Sidebar on Front Page.','hanne' ),
        'section'  => 'hanne_sidebar_options',
        'type'     => 'checkbox',
        'active_callback' => 'hanne_show_sidebar_options',
    )
);


$wp_customize->add_setting(
    'hanne_sidebar_width',
    array(
        'default' => 4,
        'sanitize_callback' => 'hanne_sanitize_positive_number' )
);

$wp_customize->add_control(
    'hanne_sidebar_width', array(
        'settings' => 'hanne_sidebar_width',
        'label'    => __( 'Sidebar Width','hanne' ),
        'description' => __('Min: 25%, Default: 33%, Max: 40%','hanne'),
        'section'  => 'hanne_sidebar_options',
        'type'     => 'range',
        'active_callback' => 'hanne_show_sidebar_options',
        'input_attrs' => array(
            'min'   => 3,
            'max'   => 5,
            'step'  => 1,
            'class' => 'sidebar-width-range',
            'style' => 'color: #0a0',
        ),
    )
);

/* Active Callback Function */
function hanne_show_sidebar_options($control) {

    $option = $control->manager->get_setting('hanne_disable_sidebar');
    return $option->value() == false ;

}

function hanne_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

//Custom Footer Text
$wp_customize-> add_section(
    'hanne_custom_footer',
    array(
        'title'			=> __('Custom Footer Text','hanne'),
        'description'	=> __('Enter your Own Copyright Text.','hanne'),
        'priority'		=> 11,
        'panel'			=> 'hanne_design_panel'
    )
);

$wp_customize->add_setting(
    'hanne_footer_text',
    array(
        'default'		=> '',
        'sanitize_callback'	=> 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    'hanne_footer_text',
    array(
        'section' => 'hanne_custom_footer',
        'settings' => 'hanne_footer_text',
        'type' => 'text'
    )
);

//Post Layout
    $wp_customize->add_section(
        'hanne_post_layout',
        array(
            'title'     => __('Post Layout','hanne'),
            'priority'  => 0,
            'panel'     => 'hanne_design_panel'
        )
    );

    $wp_customize->add_setting(
        'hanne_post_layout_style',
        array(
            'default'		=> 'default',
        )
    );

    $wp_customize->add_control(
        'hanne_post_layout_style',
        array(
            'section' => 'hanne_post_layout',
            'settings' => 'hanne_post_layout_style',
            'label' => __('Select an style', 'hanne'),
            'type' => 'select',
            'choices' => array(
                'default' => __('Default', 'hanne'),
                'style1' => __('Style 1', 'hanne'),
            )
        )
    );

}
add_action( 'customize_register', 'hanne_customize_register_layouts' );