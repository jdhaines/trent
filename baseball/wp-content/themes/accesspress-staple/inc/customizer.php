<?php
/**
 * AccessPress Staple Theme Customizer
 *
 * @package AccessPress Staple
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function accesspress_staple_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    require trailingslashit( get_template_directory() ) . '/inc/admin-panel/accesspress-staple-sanitize.php';

}
add_action( 'customize_register', 'accesspress_staple_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function accesspress_staple_customize_preview_js() {
	wp_enqueue_script( 'accesspress_staple_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'accesspress_staple_customize_preview_js' );

if( !function_exists('accesspress_staple_category_lists')){
    function accesspress_staple_category_lists(){
        $accesspress_staple_category   =   get_categories();
        $accesspress_staple_cat_list   =   array();
        $accesspress_staple_cat_list[0]=   esc_html__('Select Category','accesspress-staple');
        foreach ($accesspress_staple_category as $accesspress_staple_cat) {
            $accesspress_staple_cat_list[$accesspress_staple_cat->term_id]    =   $accesspress_staple_cat->name;
        }
        return $accesspress_staple_cat_list;
    }
}
if( !function_exists('accesspress_staple_post_list')){
    function accesspress_staple_post_list(){
        $allposts  =   new WP_Query( array( 'post_type' => 'post','posts_per_page' => -1 ));
        $post_list   =   array();
        $post_list[0]=   esc_html__('Select Post','accesspress-staple');
        while($allposts->have_posts()) {
            $allposts->the_post();
            $post_list[get_the_ID()]    =   get_the_title();
        }
        return $post_list;
    }
}
if( !function_exists('accesspress_staple_page_list')){
    function accesspress_staple_page_list(){
        $allpages  =   new WP_Query( array( 'post_type' => 'page','posts_per_page' => -1 ));
        $page_list   =   array();
        $page_list[0]=   esc_html__('Select Page','accesspress-staple');
        while($allpages->have_posts()) {
            $allpages->the_post();
            $page_list[get_the_ID()]    =   get_the_title();
        }
        return $page_list;
    }
}
if( !class_exists('Kirki')){
        return;
    }
    /**
     * If you need to include Kirki in your theme,
     * then you may want to consider adding the translations here
     * using your textdomain.
     * 
     * If you're using Kirki as a plugin this is not needed.
     */
    if(!function_exists('accesspress_staple_kirki_i18n')){
        function accesspress_staple_kirki_i18n( $accesspress_staple_config ) {
            $accesspress_staple_config['i18n'] = array(
                'background-color'      => esc_html__( 'Background Color', 'accesspress-staple' ),
                'background-image'      => esc_html__( 'Background Image', 'accesspress-staple' ),
                'no-repeat'             => esc_html__( 'No Repeat', 'accesspress-staple' ),
                'repeat-all'            => esc_html__( 'Repeat All', 'accesspress-staple' ),
                'repeat-x'              => esc_html__( 'Repeat Horizontally', 'accesspress-staple' ),
                'repeat-y'              => esc_html__( 'Repeat Vertically', 'accesspress-staple' ),
                'inherit'               => esc_html__( 'Inherit', 'accesspress-staple' ),
                'background-repeat'     => esc_html__( 'Background Repeat', 'accesspress-staple' ),
                'cover'                 => esc_html__( 'Cover', 'accesspress-staple' ),
                'contain'               => esc_html__( 'Contain', 'accesspress-staple' ),
                'background-size'       => esc_html__( 'Background Size', 'accesspress-staple' ),
                'fixed'                 => esc_html__( 'Fixed', 'accesspress-staple' ),
                'scroll'                => esc_html__( 'Scroll', 'accesspress-staple' ),
                'background-attachment' => esc_html__( 'Background Attachment', 'accesspress-staple' ),
                'left-top'              => esc_html__( 'Left Top', 'accesspress-staple' ),
                'left-center'           => esc_html__( 'Left Center', 'accesspress-staple' ),
                'left-bottom'           => esc_html__( 'Left Bottom', 'accesspress-staple' ),
                'right-top'             => esc_html__( 'Right Top', 'accesspress-staple' ),
                'right-center'          => esc_html__( 'Right Center', 'accesspress-staple' ),
                'right-bottom'          => esc_html__( 'Right Bottom', 'accesspress-staple' ),
                'center-top'            => esc_html__( 'Center Top', 'accesspress-staple' ),
                'center-center'         => esc_html__( 'Center Center', 'accesspress-staple' ),
                'center-bottom'         => esc_html__( 'Center Bottom', 'accesspress-staple' ),
                'background-position'   => esc_html__( 'Background Position', 'accesspress-staple' ),
                'background-opacity'    => esc_html__( 'Background Opacity', 'accesspress-staple' ),
                'ON'                    => esc_html__( 'ON', 'accesspress-staple' ),
                'OFF'                   => esc_html__( 'OFF', 'accesspress-staple' ),
                'all'                   => esc_html__( 'All', 'accesspress-staple' ),
                'cyrillic'              => esc_html__( 'Cyrillic', 'accesspress-staple' ),
                'cyrillic-ext'          => esc_html__( 'Cyrillic Extended', 'accesspress-staple' ),
                'devanagari'            => esc_html__( 'Devanagari', 'accesspress-staple' ),
                'greek'                 => esc_html__( 'Greek', 'accesspress-staple' ),
                'greek-ext'             => esc_html__( 'Greek Extended', 'accesspress-staple' ),
                'khmer'                 => esc_html__( 'Khmer', 'accesspress-staple' ),
                'latin'                 => esc_html__( 'Latin', 'accesspress-staple' ),
                'latin-ext'             => esc_html__( 'Latin Extended', 'accesspress-staple' ),
                'vietnamese'            => esc_html__( 'Vietnamese', 'accesspress-staple' ),
                'serif'                 => esc_html_x( 'Serif', 'font style', 'accesspress-staple' ),
                'sans-serif'            => esc_html_x( 'Sans Serif', 'font style', 'accesspress-staple' ),
                'monospace'             => esc_html_x( 'Monospace', 'font style', 'accesspress-staple' ),
            );
            return $accesspress_staple_config;
        }
    }
    add_filter( 'kirki/config', 'accesspress_staple_kirki_i18n' );

    if(!function_exists('accesspress_staple_kirki_fields')) {
        function accesspress_staple_kirki_fields( $wp_customize ) {    
            /** added customizer panels*/
            load_template( dirname( __FILE__ ) . '/admin-panel/accesspress-staple-customizer.php', false);        
        }
    }
    add_filter( 'kirki/fields', 'accesspress_staple_kirki_fields' );