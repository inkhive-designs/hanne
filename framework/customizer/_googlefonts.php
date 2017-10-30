<?php
//Google Fonts
function hanne_customize_register_fonts( $wp_customize ) {
$wp_customize->add_section(
    'hanne_typo_options',
    array(
        'title'     => __('Google Web Fonts','hanne'),
        'priority'  => 41,
    )
);

$font_array = array('HIND','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','Arimo','Bitter','Noto Sans');
$fonts = array_combine($font_array, $font_array);

$wp_customize->add_setting(
    'hanne_title_font',
    array(
        'default'=> 'HIND',
        'sanitize_callback' => 'hanne_sanitize_gfont'
    )
);

function hanne_sanitize_gfont( $input ) {
    if ( in_array($input, array('HIND','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','Arimo','Bitter','Noto Sans') ) )
        return $input;
    else
        return '';
}

$wp_customize->add_control(
    'hanne_title_font',array(
        'label' => __('Title','hanne'),
        'settings' => 'hanne_title_font',
        'section'  => 'hanne_typo_options',
        'type' => 'select',
        'choices' => $fonts,
    )
);

$wp_customize->add_setting(
    'hanne_body_font',
    array(	'default'=> 'Open Sans',
        'sanitize_callback' => 'hanne_sanitize_gfont' )
);

$wp_customize->add_control(
    'hanne_body_font',array(
        'label' => __('Body','hanne'),
        'settings' => 'hanne_body_font',
        'section'  => 'hanne_typo_options',
        'type' => 'select',
        'choices' => $fonts
    )
);
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

    function hanne_sanitize_fontsize( $input ) {
        if ( in_array($input, array('14px','initial','small','medium','large','larger','x-large') ) )
            return $input;
        else
            return '';
    }



    $wp_customize->add_control(
        'hanne_content_font_size', array(
            'settings' => 'hanne_content_font_size',
            'label' => __( 'Content Font Size','hanne' ),
            'description' => __('Select Font Size. This is only for the content on Static Page area. Not for Blog Posts, Pages or Archives.', 'hanne'),
            'section'  => 'hanne_basic_settings_section',
            'type'     => 'select',
            'choices' => $font_size
        )
    );

    //Page and Post content Font size start
    $wp_customize->add_setting(
        'hanne_content_page_post_fontsize_set',
        array(
            'default' => 'default',
            'sanitize_callback' => 'hanne_sanitize_content_size'
        )
    );
    function hanne_sanitize_content_size( $input ) {
        if ( in_array($input, array('default','small','medium','large','extra-large') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'hanne_content_page_post_fontsize_set', array(
            'settings' => 'hanne_content_page_post_fontsize_set',
            'label'    => __( 'Page/Post Font Size','hanne' ),
            'description' => __('Choose your font size. This is only for Posts and Pages. It wont affect your blog page.','hanne'),
            'section'  => 'hanne_typo_options',
            'type'     => 'select',
            'choices' => array(
                'default'   => 'Default',
                'small' => 'Small',
                'medium'   => 'Medium',
                'large'  => 'Large',
                'extra-large' => 'Extra Large',
            ),
        )
    );

    //Page and Post content Font size end


}
add_action( 'customize_register', 'hanne_customize_register_fonts' );