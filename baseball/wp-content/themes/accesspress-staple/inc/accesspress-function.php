<?php
/**
 * Custome Function for theme template
 * 
 * 
 */
    function accesspress_web_layout($classes){
	    if(of_get_option('webpage_layout') == 'boxed'){
	        $classes[]= 'boxed-layout';
	    }elseif(of_get_option('webpage_layout') == 'fullwidth'){
            $classes[]='fullwidth';
        }

        if(of_get_option('header_bg') == 'white'){
        	$classes[]='header-white';
        }elseif(of_get_option('header_bg') == 'black'){
        	$classes[]='header-black';
        }
        
	    return $classes;
   }
   add_filter( 'body_class', 'accesspress_web_layout' );
   
   function accesspress_sidebar_layout($classes){
    global $post;
        if( is_404()){
		$classes[] = ' ';
		}elseif(is_singular()){
	    $post_class = get_post_meta( $post -> ID, 'accesspress_staple_sidebar_layout', true );
	    if(empty($post_class)){
        $post_class = 'right-sidebar';
        $classes[] = $post_class;}
        else{
        $post_class = get_post_meta( $post -> ID, 'accesspress_staple_sidebar_layout', true );
        $classes[] = $post_class;}
		}else{
		$classes[] = 'right-sidebar';	
		}
        return $classes;
   }
   add_filter('body_class', 'accesspress_sidebar_layout');

   
    function accesspress_bxslidercb(){
        $accesspress_slider_category = of_get_option('cagegory_as_slider');
		$accesspress_show_pager = (!of_get_option('show_pager') || of_get_option('show_pager') == "yes") ? "true" : "false";
		$accesspress_show_controls = (!of_get_option('show_controls') || of_get_option('show_controls') == "yes") ? "true" : "false";
		$accesspress_auto_transition = (!of_get_option('slider_auto_transition') || of_get_option('slider_auto_transition') == "yes") ? "true" : "false";
		$accesspress_slider_transition = (!of_get_option('slider_transition')) ? "fade" : of_get_option('slider_transition');
		$accesspress_slider_speed = (!of_get_option('slider_speed')) ? "5000" : of_get_option('slider_speed');
		$accesspress_slider_pause = (!of_get_option('slider_pause')) ? "5000" : of_get_option('slider_pause');
		$accesspress_show_caption = of_get_option('show_slider_caption');       
        ?>
        <section id="main-slider" class="slider">
       <script type="text/javascript">
            jQuery(function($){
				$('#main-slider .bx-slider').bxSlider({
					pager: <?php echo esc_attr($accesspress_show_pager); ?>,
					controls: <?php echo esc_attr($accesspress_show_controls); ?>,
					mode: '<?php echo esc_attr($accesspress_slider_transition); ?>',
					auto : '<?php echo esc_attr($accesspress_auto_transition); ?>',
					pause: '<?php echo esc_attr($accesspress_slider_pause); ?>',
					speed: '<?php echo esc_attr($accesspress_slider_speed); ?>'
				});
			});
        </script>
        <?php
		if( !empty($accesspress_slider_category)) :

				$loop = new WP_Query(array(
					'cat' => $accesspress_slider_category,
					'posts_per_page' => -1    
				));
                ?>
                <div class="bx-slider">
                <?php
				if($loop->have_posts()) : 
				while($loop->have_posts()) : $loop-> the_post();
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full', false );
            	?>
                <div class="slides">
					<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" />
                    <?php if($accesspress_show_caption == 'show'): ?>
						<div class="caption-wrapper">  
						<div class="ak-container">
							<div class="slider-caption">
								<div class="mid-content">
									<div class="small-caption"> <?php the_title(); ?> </div>
		                            <div class="slider-content">
			                            <?php the_content(); ?>
		                        	</div>
									
								</div>
							</div>
						</div>
						</div>
                    <?php endif; ?>
				</div>
				<?php 
				endwhile; 
				endif;
				?>
                </div>
                <?php
               	else:
               	?>
                <div class="bx-slider">
	                <div class="slides">
	                <div class="staple-overlay"></div>
	               	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/banner.jpg">
	               	</div>
               	</div>
               	<?php
                endif; ?>
		</section>
<?php
}
add_action('accesspress_bxslider','accesspress_bxslidercb', 10);

function accesspress_social_cb(){
	$facebooklink = of_get_option('facebook');
	$twitterlink = of_get_option('twitter');
	$google_pluslink = of_get_option('google_plus');
	$youtubelink = of_get_option('youtube');
	$pinterestlink = of_get_option('pinterest');
	$linkedinlink = of_get_option('linkedin');
	$flickrlink = of_get_option('flicker');
	$vimeolink = of_get_option('vimeo');
	$instagramlink = of_get_option('instagram');
	$tumblrlink = of_get_option('tumbler');
	$rsslink = of_get_option('rss');
	$deliciouslink = of_get_option('delicious');
	$githublink = of_get_option('github');
	$stumbleuponlink = of_get_option('stumbleupon');
	$skypelink = of_get_option('skype'); 
    ?>
	<div class="social-icons">
		<?php if(!empty($facebooklink)){ ?>
		<a href="<?php echo esc_url(of_get_option('facebook')); ?>" class="facebook" data-title="Facebook" target="_blank"><i class="fa fa-facebook"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($twitterlink)){ ?>
		<a href="<?php echo esc_url(of_get_option('twitter')); ?>" class="twitter" data-title="Twitter" target="_blank"><i class="fa fa-twitter"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($google_pluslink)){ ?>
		<a href="<?php echo esc_url(of_get_option('google_plus')); ?>" class="gplus" data-title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($youtubelink)){ ?>
		<a href="<?php echo esc_url(of_get_option('youtube')); ?>" class="youtube" data-title="Youtube" target="_blank"><i class="fa fa-youtube"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($pinterestlink)){ ?>
		<a href="<?php echo esc_url(of_get_option('pinterest')); ?>" class="pinterest" data-title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($linkedinlink)){ ?>
		<a href="<?php echo esc_url(of_get_option('linkedin')); ?>" class="linkedin" data-title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($flickrlink)){ ?>
		<a href="<?php echo esc_url(of_get_option('flicker')); ?>" class="flickr" data-title="Flickr" target="_blank"><i class="fa fa-flickr"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($vimeolink)){ ?>
		<a href="<?php echo esc_url(of_get_option('vimeo')); ?>" class="vimeo" data-title="Vimeo" target="_blank"><i class="fa fa-vimeo-square"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($instagramlink)){ ?>
		<a href="<?php echo esc_url(of_get_option('instagram')); ?>" class="instagram" data-title="instagram" target="_blank"><i class="fa fa-instagram"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($tumblrlink)){ ?>
		<a href="<?php echo esc_url(of_get_option('tumblr')); ?>" class="tumblr" data-title="tumblr" target="_blank"><i class="fa fa-tumblr"></i><span></span></a>
		<?php } ?>
		
		<?php if(!empty($deliciouslink)){ ?>
		<a href="<?php echo esc_url(of_get_option('delicious')); ?>" class="delicious" data-title="delicious" target="_blank"><i class="fa fa-delicious"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($rsslink)){ ?>
		<a href="<?php echo esc_url(of_get_option('rss')); ?>" class="rss" data-title="rss" target="_blank"><i class="fa fa-rss"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($githublink)){ ?>
		<a href="<?php echo esc_url(of_get_option('github')); ?>" class="github" data-title="github" target="_blank"><i class="fa fa-github"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($stumbleuponlink)){ ?>
		<a href="<?php echo esc_url(of_get_option('stumbleupon')); ?>" class="stumbleupon" data-title="stumbleupon" target="_blank"><i class="fa fa-stumbleupon"></i><span></span></a>
		<?php } ?>
		
		<?php if(!empty($skypelink)){ ?>
		<a href="<?php echo esc_html__('skype:', 'accesspress-staple').esc_url(of_get_option('skype')); ?>" class="skype" data-title="Skype"><i class="fa fa-skype"></i><span></span></a>
		<?php } ?>
    </div>
<?php
}
add_action('accesspress_social','accesspress_social_cb', 10);

function accesspress_footer_count(){
	$count = 0;
	if(is_active_sidebar('footer-1'))
	$count++;

	if(is_active_sidebar('footer-2'))
	$count++;

	if(is_active_sidebar('footer-3'))
	$count++;

	if(is_active_sidebar('footer-4'))
	$count++;

	return $count;
}

function accesspress_excerpt( $accesspress_content , $accesspress_letter_count){
		$accesspress_letter_count = !empty($accesspress_letter_count) ? $accesspress_letter_count : 100 ;
		$accesspress_striped_content = strip_tags($accesspress_content);
		$accesspress_excerpt = mb_substr($accesspress_striped_content, 0 , $accesspress_letter_count);
		if(strlen($accesspress_striped_content) > strlen($accesspress_excerpt)){
			$accesspress_excerpt.= "...";
		}
		return $accesspress_excerpt;
	}

function accesspress_add_search($items, $args){
	 $ak_nav = of_get_option('logo_alignment');
	 if(of_get_option('show_search') == 1){   
		if( $args->theme_location == 'primary' ){
			$items = $items.get_search_form(false) ;
		}
	}
	return $items;
}

add_filter('wp_nav_menu_items','accesspress_add_search', 10, 2);

function accesspress_wp_page_menu(){
	$args = array(
	'menu_class'  => 'staple-menu',
	);
	wp_page_menu( $args );
}

/**
 * Registers an editor stylesheet for the theme.
 */
function accesspress_staple_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'accesspress_staple_add_editor_styles' );