<?php
/**
 * @package AccessPress Staple
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="main-title"><span>', '</span></h1>' ); ?>
		<?php
        $show_meta = of_get_option('enable_sg_metadata',1);
		if ($show_meta) {
		 ?>
		<div class="entry-meta">
			<?php accesspress_staple_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php } ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
        $show_img = of_get_option('enable_sg_feature_img',1);

		if ($show_img) {
         	the_post_thumbnail(); 
         }?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'accesspress-staple' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php accesspress_staple_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->