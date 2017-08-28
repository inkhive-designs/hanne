<?php
//FEATURED POSTS
// CREATE THE FCA PANEL
function hanne_customize_register_fp( $wp_customize ) {
$wp_customize->add_section(
    'hanne_featposts',
    array(
        'title'     => __('Featured Posts','hanne'),
        'priority'  => 35,
    )
);

$wp_customize->add_setting(
    'hanne_featposts_enable',
    array( 'sanitize_callback' => 'hanne_sanitize_checkbox' )
);

$wp_customize->add_control(
    'hanne_featposts_enable', array(
        'settings' => 'hanne_featposts_enable',
        'label'    => __( 'Enable', 'hanne' ),
        'section'  => 'hanne_featposts',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'hanne_featposts_cat',
    array( 'sanitize_callback' => 'hanne_sanitize_category' )
);


$wp_customize->add_control(
    new Hanne_WP_Customize_Category_Control(
        $wp_customize,
        'hanne_featposts_cat',
        array(
            'label'    => __('Category For Featured Posts','hanne'),
            'settings' => 'hanne_featposts_cat',
            'section'  => 'hanne_featposts'
        )
    )
);
}
add_action( 'customize_register', 'hanne_customize_register_fp' );