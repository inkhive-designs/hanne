<?php
//Settings for Header Image
function hanne_customize_register_header( $wp_customize ) {
$wp_customize->add_setting( 'hanne_himg_style' , array(
    'default'     => 'cover',
    'sanitize_callback' => 'hanne_sanitize_himg_style'
) );

/* Sanitization Function */
function hanne_sanitize_himg_style( $input ) {
    if (in_array( $input, array('contain','cover') ) )
        return $input;
    else
        return '';
}

$wp_customize->add_control(
    'hanne_himg_style', array(
    'label' => __('Header Image Arrangement','hanne'),
    'section' => 'header_image',
    'settings' => 'hanne_himg_style',
    'type' => 'select',
    'choices' => array(
        'contain' => __('Contain','hanne'),
        'cover' => __('Cover Completely (Recommended)','hanne'),
    )
) );

$wp_customize->add_setting( 'hanne_himg_align' , array(
    'default'     => 'center',
    'sanitize_callback' => 'hanne_sanitize_himg_align'
) );

/* Sanitization Function */
function hanne_sanitize_himg_align( $input ) {
    if (in_array( $input, array('center','left','right') ) )
        return $input;
    else
        return '';
}

$wp_customize->add_control(
    'hanne_himg_align', array(
    'label' => __('Header Image Alignment','hanne'),
    'section' => 'header_image',
    'settings' => 'hanne_himg_align',
    'type' => 'select',
    'choices' => array(
        'center' => __('Center','hanne'),
        'left' => __('Left','hanne'),
        'right' => __('Right','hanne'),
    )
) );

$wp_customize->add_setting( 'hanne_himg_repeat' , array(
    'default'     => true,
    'sanitize_callback' => 'hanne_sanitize_checkbox'
) );

$wp_customize->add_control(
    'hanne_himg_repeat', array(
    'label' => __('Repeat Header Image','hanne'),
    'section' => 'header_image',
    'settings' => 'hanne_himg_repeat',
    'type' => 'checkbox',
) );
}
add_action( 'customize_register', 'hanne_customize_register_header' );