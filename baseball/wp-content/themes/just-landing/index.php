<?php get_header(); ?>   



<div class="block1">
		<div class="block1-center">
			<div class="block1-center1">
				<div class="sidebar-user2 span2">
						<br/><br/><br/><br/>
						<center><h1>Just Landing</h1></center>
						<br/><br/><p style="text-align: justify;">
						<?php _e( 'This template will help you create a Landing Page or One Page.', 'just-landing' ); ?><br/><br/><br/>
						<?php _e( 'To set it up, go to the administration panel, create a page, select the number of required blocks, assign a static page and using widgets fill it with necessary content.', 'just-landing' ); ?><br/><br/>
						<?php _e( 'A detailed description with screenshots can be found on the page Theme Options. Go to the administration panel and then click on Apperance -> Theme Options', 'just-landing' ); ?><br/><br/><br/>	
						</p>
						<br/>
						<h3><?php _e( '+ 22 Sidebar', 'just-landing' ); ?></h3>
						<h3><?php _e( '+ Responsive web design', 'just-landing' ); ?></h3>
						<br/><br/>
						
				</div>
				<div class="sidebar-user3 span2">
					<center><br/><br/><br/><img src="<?php echo get_template_directory_uri(); ?>/images/imglpfree.png"/>
								

					</center><br/><br/><br/>
				</div>
			</div>
		</div>
</div>	
<div class="main-tag">
	<div class="main">
			<div class="content">
				<?php if(have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
				<div <?php post_class(); ?>><?php comments_template(); ?>
				<div class="post-main">
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span><a href="<?php the_permalink(); ?>"><?php the_date(); ?></a></span></h1>
					<div class="post">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
					<?php the_content( '' ); ?><div class="more-link"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php _e( 'Read more...', 'just-landing' ); ?><span class="screen-reader-text"><?php the_title();?></span></a></div>
					<span class="entry-comments"><?php comments_popup_link( ) ?></span>
						<div class="categories"><div class="tagi"><?php the_tags(); ?></div>	<?php _e( 'Categories:', 'just-landing' ); ?> <?php the_category(' '); ?></div>
					</div>
				</div> 
				</div> 
				<?php endwhile; ?>

			<?php if(function_exists('wp_pagenavi')) : ?>
			<div class="navigation"><?php wp_pagenavi(); ?></div>
			<?php else : ?>
	<div class="navigation">
			<div class="alignleft"><?php previous_posts_link(__('&laquo; Newer', 'just-landing')) ?></div>
			<div class="alignright"><?php next_posts_link(__('Older &raquo;', 'just-landing')) ?></div>
	</div>	
	<?php endif; ?>
				<?php endif; ?>
			</div>

	</div>	
</div>	



<?php get_footer(); ?>