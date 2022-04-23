<?php
/**
 * The template for displaying all single posts.
 *
 * @package AccessPress Staple
 */

get_header(); ?>
    <div class="ak-container">
<?php 
	global $post;
	$both_sidebar = get_post_meta($post->ID, 'accesspress_staple_sidebar_layout', true);
	if($both_sidebar=='both-sidebar'){
?>
        <div class="left-sidbar-right">
<?php
	}
 ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php accesspress_staple_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
get_sidebar('left');
if($both_sidebar=='both-sidebar'){
    ?>
        </div>
    <?php
} 
 get_sidebar('right');
?>
</div>
<?php get_footer(); ?>
