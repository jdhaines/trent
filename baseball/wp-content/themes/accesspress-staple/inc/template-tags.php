<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package AccessPress Staple
 */

if ( ! function_exists( 'accesspress_staple_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function accesspress_staple_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation clearfix" role="navigation">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', 'accesspress-staple' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'accesspress-staple' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'accesspress-staple' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'accesspress_staple_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function accesspress_staple_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation clearfix" role="navigation">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'accesspress-staple' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'accesspress-staple' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link',     'accesspress-staple' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'accesspress_staple_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function accesspress_staple_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	/* translators: posted on date */
	$posted_on = sprintf(
		'%s',
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	/* translators: %s : author name */
	$byline = sprintf(
		'%s',
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . wp_kses( $posted_on, array( 'a' => array( 'href' => array(), 'rel' => array() ), 'time' => array( 'class' => array(), 'datetime' => array() ) ) ) . '</span><span class="byline">' .  wp_kses( $byline, array( 'span' => array( 'class' => array() ),'a' => array( 'class' => array(), 'href' => array() ) ) ) . '</span>';

}
endif;

if ( ! function_exists( 'accesspress_staple_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function accesspress_staple_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'accesspress-staple' ) );
		if ( $categories_list && accesspress_staple_categorized_blog() ) {
			/* translators: %1$s : category list */
			printf( '<span class="cat-links">' . wp_kses(__( 'Posted in %1$s', 'accesspress-staple' ), array( 'a' => array( 'href' => array(), 'rel' => array() ) ) ) . '</span>', wp_kses( $categories_list, array( 'a' => array( 'href' => array(), 'rel' => array() ) ) ) );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'accesspress-staple' ) );
		if ( $tags_list ) {
			/* translators: %1$s : tag list */
			printf( '<span class="tags-links">' . wp_kses( __( 'Tagged %1$s', 'accesspress-staple' ), array( 'a' => array( 'href' => array(), 'rel' => array() ) ) ) . '</span>', wp_kses( $tags_list, array( 'a' => array( 'href' => array(), 'rel' => array() ) ) ) );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'accesspress-staple' ), __( '1 Comment', 'accesspress-staple' ), __( '% Comments', 'accesspress-staple' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'accesspress-staple' ), '<span class="edit-link">', '</span>' );
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function accesspress_staple_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'accesspress_staple_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'accesspress_staple_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so accesspress_staple_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so accesspress_staple_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in accesspress_staple_categorized_blog.
 */
function accesspress_staple_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'accesspress_staple_categories' );
}
add_action( 'edit_category', 'accesspress_staple_category_transient_flusher' );
add_action( 'save_post',     'accesspress_staple_category_transient_flusher' );