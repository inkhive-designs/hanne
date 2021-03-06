<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package hanne
 */
?>
<?php get_template_part('modules/header/head'); ?>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'hanne' ); ?></a>
    <?php get_template_part('modules/header/jumbosearch'); ?>

    <?php get_template_part('modules/navigation/menu','primary'); ?>

    <?php get_template_part('modules/header/masthead'); ?>

	<?php if( class_exists('rt_slider') ) {
			 rt_slider::render('slider', 'nivo' ); 
		} ?>
	
	
	<?php get_template_part('framework/featured-components/featured', 'posts' ); ?>
    <?php get_template_part('modules/hero/hero'); ?>
    <?php get_template_part('modules/fpage'); ?>
	
	<div class="mega-container">
	
		<div id="content" class="site-content container">