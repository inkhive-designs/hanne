<?php
//Logo Settings
function hanne_customize_register_skins( $wp_customize ) {
$wp_customize->add_section( 'title_tagline' , array(
    'title'      => __( 'Title, Tagline & Logo', 'hanne' ),
    'priority'   => 30,
) );


$wp_customize->add_setting( 'hanne_logo_resize' , array(
    'default'     => 100,
    'sanitize_callback' => 'hanne_sanitize_positive_number',
) );
$wp_customize->add_control(
    'hanne_logo_resize',
    array(
        'label' => __('Resize & Adjust Logo','hanne'),
        'section' => 'title_tagline',
        'settings' => 'hanne_logo_resize',
        'priority' => 6,
        'type' => 'range',
        'active_callback' => 'hanne_logo_enabled',
        'input_attrs' => array(
            'min'   => 30,
            'max'   => 200,
            'step'  => 5,
        ),
    )
);

function hanne_logo_enabled($control) {
    $option = $control->manager->get_setting('custom_logo');
    return $option->value() == true;
}



//Replace Header Text Color with, separate colors for Title and Description
$wp_customize->get_control('header_textcolor')->label = __('Site Title Color','hanne');
$wp_customize->add_setting('hanne_header_desccolor', array(
    'default'     => '#000',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'hanne_header_desccolor', array(
        'label' => __('Site Tagline Color','hanne'),
        'section' => 'colors',
        'settings' => 'hanne_header_desccolor',
        'type' => 'color'
    ) )
);
}
add_action( 'customize_register', 'hanne_customize_register_skins' );