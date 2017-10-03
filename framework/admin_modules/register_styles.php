<?php
/**
 * Enqueue scripts and styles.
 */
function hanne_scripts() {
    wp_enqueue_style( 'hanne-style', get_stylesheet_uri() );

    wp_enqueue_style('hanne-title-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", get_theme_mod('hanne_title_font', 'Nunito') ).':100,300,400,700' );

    wp_enqueue_style('hanne-body-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", get_theme_mod('hanne_body_font', 'Alegreya') ).':100,300,400,700' );

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );

    wp_enqueue_style( 'nivo-slider', get_template_directory_uri() . '/assets/css/nivo-slider.css' );

    wp_enqueue_style( 'nivo-skin', get_template_directory_uri() . '/assets/css/nivo-default/default.css' );

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );

    wp_enqueue_style( 'hover-style', get_template_directory_uri() . '/assets/css/hover.min.css' );

    wp_enqueue_style( 'hanne-main-theme-style', get_template_directory_uri() . '/assets/theme-styles/css/default.css');

    wp_enqueue_script( 'hanne-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

    wp_enqueue_script( 'hanne-external', get_template_directory_uri() . '/js/external.js', array('jquery'), '20120206', true );

    wp_enqueue_script('hanne-sticky-sidebar-js', get_template_directory_uri()."/js/jquery-scrolltofixed-min.js", array('jquery'));

    wp_enqueue_script( 'hanne-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'hanne-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery-masonry'), false, true );
}
add_action( 'wp_enqueue_scripts', 'hanne_scripts' );