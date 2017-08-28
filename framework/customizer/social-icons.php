<?php
// Social Icons
function hanne_customize_register_social( $wp_customize ) {
$wp_customize->add_section('hanne_social_section', array(
    'title' => __('Social Icons','hanne'),
    'priority' => 44 ,
));

$social_networks = array( //Redefinied in Sanitization Function.
    'none' => __('-','hanne'),
    'facebook' => __('Facebook','hanne'),
    'twitter' => __('Twitter','hanne'),
    'google-plus' => __('Google Plus','hanne'),
    'instagram' => __('Instagram','hanne'),
    'rss' => __('RSS Feeds','hanne'),
    'vine' => __('Vine','hanne'),
    'vimeo-square' => __('Vimeo','hanne'),
    'youtube' => __('Youtube','hanne'),
    'flickr' => __('Flickr','hanne'),
);

$social_count = count($social_networks);

for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :

    $wp_customize->add_setting(
        'hanne_social_'.$x, array(
        'sanitize_callback' => 'hanne_sanitize_social',
        'default' => 'none'
    ));

    $wp_customize->add_control( 'hanne_social_'.$x, array(
        'settings' => 'hanne_social_'.$x,
        'label' => __('Icon ','hanne').$x,
        'section' => 'hanne_social_section',
        'type' => 'select',
        'choices' => $social_networks,
    ));

    $wp_customize->add_setting(
        'hanne_social_url'.$x, array(
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( 'hanne_social_url'.$x, array(
        'settings' => 'hanne_social_url'.$x,
        'description' => __('Icon ','hanne').$x.__(' Url','hanne'),
        'section' => 'hanne_social_section',
        'type' => 'url',
        'choices' => $social_networks,
    ));

endfor;

function hanne_sanitize_social( $input ) {
    $social_networks = array(
        'none' ,
        'facebook',
        'twitter',
        'google-plus',
        'instagram',
        'rss',
        'vine',
        'vimeo-square',
        'youtube',
        'flickr'
    );
    if ( in_array($input, $social_networks) )
        return $input;
    else
        return '';
}
}
add_action( 'customize_register', 'hanne_customize_register_social' );