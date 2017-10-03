<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package hanne
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
$sidebar_style = get_theme_mod('hanne_sidebar_style', 'default');
if ( hanne_load_sidebar() ) : ?>
<div id="secondary" class="widget-area <?php echo $sidebar_style; ?> <?php do_action('hanne_secondary-width') ?>" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
<?php endif; ?>
