<?php
//Logo Settings
function hanne_customize_register_skins( $wp_customize ) {
$wp_customize->add_section( 'title_tagline' , array(
    'title'      => __( 'Title, Tagline & Logo', 'hanne' ),
    'priority'   => 30,
) );
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