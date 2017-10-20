<?php
/**
 * @package hanne
 */
?>
<?php $sidebar_style = get_theme_mod('hanne_post_layout_style', 'default'); ?>

<article id="post-<?php the_ID(); ?>" <?php echo post_class($sidebar_style) ; ?>>


	<div id="featured-image">
			<?php the_post_thumbnail('full'); ?>
	</div>

    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title title-font">', '</h1>' ); ?>


        <div class="entry-meta">
            <?php hanne_posted_on(); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->
			
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'hanne' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php hanne_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
