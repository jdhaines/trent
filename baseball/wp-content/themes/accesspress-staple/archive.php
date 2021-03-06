<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package AccessPress Staple
 */

get_header(); ?>
<div class="ak-container">
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="entry-header">
				<h1 class="main-title"><span>
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							/* translators: %s : author */
							printf( esc_html__( 'Author: %s', 'accesspress-staple' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							/* translators: %s : day */
							printf( esc_html__( 'Day: %s', 'accesspress-staple' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							/* translators: %s : month */
							printf( esc_html__( 'Month: %s', 'accesspress-staple' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'accesspress-staple' ) ) . '</span>' );

						elseif ( is_year() ) :
							/* translators: %s : year */
							printf( esc_html__( 'Year: %s', 'accesspress-staple' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'accesspress-staple' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							esc_html_e( 'Asides', 'accesspress-staple' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							esc_html_e( 'Galleries', 'accesspress-staple' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							esc_html_e( 'Images', 'accesspress-staple' );

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							esc_html_e( 'Videos', 'accesspress-staple' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							esc_html_e( 'Quotes', 'accesspress-staple' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							esc_html_e( 'Links', 'accesspress-staple' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							esc_html_e( 'Statuses', 'accesspress-staple' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							esc_html_e( 'Audios', 'accesspress-staple' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							esc_html_e( 'Chats', 'accesspress-staple' );

						else :
							esc_html_e( 'Archives', 'accesspress-staple' );

						endif;
					?>
				</span></h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						/* translators: %s : term description */
						printf( '<div class="taxonomy-description">%s</div>', esc_html($term_description) );
					endif;
				?>
			</header><!-- .page-header -->
            <?php
                $layout_portfolio = of_get_option('portfolio_layout');
                $layout_blog = of_get_option('blog_layout');
                $layout_team_member = of_get_option('team_member_layout');
                $cat_event = of_get_option('team_member_category');
                $cat_testimonial = of_get_option('testomonial_category');
                $cat_portfolio = of_get_option('portfolio_section');
                $cat_feature  =   of_get_option('feature_section');
                $cat_af      =   of_get_option('feature_awesome_section');
                if(is_category($cat_event)){
                    $cat =  'team-member-'.$layout_team_member; 
                }
                if(is_category($cat_portfolio)){
                    $cat =  'portfolio-'.$layout_portfolio;
                }
                    ?>
               <div class="archive-wrap <?php echo esc_attr($cat); ?>">            

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
                     
                <?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php accesspress_staple_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
    		</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar('right'); ?>
</div>
<?php get_footer(); ?>