<?php
add_action( 'after_setup_theme', 'just_landing_setup' );
function just_landing_setup() {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(166, 124, TRUE);
	global $content_width;
	if ( ! isset( $content_width ) )
	$content_width = 960;
	add_theme_support( 'automatic-feed-links' ); add_theme_support( 'title-tag' ); 
	add_image_size( 'my-theme-logo-size', 500, 200, true );
    add_theme_support( 'site-logo', array( 'size' => 'my-theme-logo-size' ) );
}
function just_landing_widgets() {
	register_sidebar(		
	array(
		'id' => 'sidebar-header',
		'name' => __( 'sidebar-header', 'just-landing' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block1-user1',
		'name' => __( 'sidebar-block1-user1', 'just-landing' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block1-user2',
		'name' => __( 'sidebar-block1-user2', 'just-landing' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block1-user3',
		'name' => __( 'sidebar-block1-user3', 'just-landing' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block1-user4',
		'name' => __( 'sidebar-block1-user4', 'just-landing' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block2-user1',
		'name' => __( 'sidebar-block2-user1', 'just-landing' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block2-user2',
		'name' => __( 'sidebar-block2-user2', 'just-landing' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block2-user3',
		'name' => __( 'sidebar-block2-user3', 'just-landing' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block2-user4',
		'name' => __( 'sidebar-block2-user4', 'just-landing' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block3-user1',
		'name' => __( 'sidebar-block3-user1', 'just-landing' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block3-user2',
		'name' => __( 'sidebar-block3-user2', 'just-landing' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block3-user3',
		'name' => __( 'sidebar-block3-user3', 'just-landing' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block3-user4',
		'name' => __( 'sidebar-block3-user4', 'just-landing' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block4-user1',
		'name' => __( 'sidebar-block4-user1', 'just-landing' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block4-user2',
		'name' => __( 'sidebar-block4-user2', 'just-landing' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block4-user3',
		'name' => __( 'sidebar-block4-user3', 'just-landing' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block4-user4',
		'name' => __( 'sidebar-block4-user4', 'just-landing' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block5-user1',
		'name' => __( 'sidebar-block5-user1', 'just-landing' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block5-user2',
		'name' => __( 'sidebar-block5-user2', 'just-landing' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block5-user3',
		'name' => __( 'sidebar-block5-user3', 'just-landing' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block5-user4',
		'name' => __( 'sidebar-block5-user4', 'just-landing' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-footer1',
		'name' => __( 'sidebar-footer1', 'just-landing' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-header',
		'name' => __( 'sidebar-header', 'just-landing' ),
	)		
	);
}
add_action( 'widgets_init', 'just_landing_widgets' );
function just_landing_frontend() {
 	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'just_landing_frontend' );
function just_landing_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() )
		return $title;
	$title .= get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'just-landing' ), max( $paged, $page ) );
	return $title;
}
add_filter( 'wp_title', 'just_landing_wp_title', 10, 2 );
?>