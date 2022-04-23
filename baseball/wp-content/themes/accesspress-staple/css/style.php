<?php
	/** Dynamic Styles **/
	function accesspress_staple_header_styles_scripts(){
		$custom_css = of_get_option('custom_code_css');
	    $cta_bg_v = of_get_option('call_to_action_bg');
	    $tpl_color = of_get_option('template_color');

	    $custom_css = ($custom_css) ? $custom_css : '';

	    if(!empty($cta_bg_v)){

	    	$custom_css .= "
                .call-to-action,
                .btn-wrapper .btn:hover,
                .btn-wrapper a:hover{
				background-image: url({$cta_bg_v});
	    	}";

	    }

	    if( $tpl_color ) {
	       
           $tpl_color_rgb = accesspress_staple_hex2rgb($tpl_color);
           
           $dark_tpl_color = accesspress_staple_colour_brightness($tpl_color, -0.9);
           
           $light_tpl_color = accesspress_staple_colour_brightness($tpl_color, 0.8);

            /** Background Color **/
	    	$custom_css .= "
                .header-white .header-social,
                #site-navigation .staple-menu > ul > li:hover > a:after,
                #site-navigation .staple-menu > ul > li.current-menu-item > a:after,
                #site-navigation .staple-menu > ul > li.current-menu-ancestor > a:after,
                #site-navigation .staple-menu > ul > li.current-menu-parent > a:after,
                .btn-wrapper .btn:hover, .btn-wrapper a:hover,
                .cta-link > a,
                .stat-counter,
                .blog-date,
                .testimonial .bx-pager-item a:hover,
                .testimonial .bx-pager-item a.active,
                #ak-top:hover,
                .team-hover-icon,
                #comments h3,
                .navigation .nav-links a,
                .bttn, button, input[type=\"button\"],
                input[type=\"reset\"], input[type=\"submit\"],
                .number404,
                .woocommerce span.onsale, .woocommerce-page span.onsale,
                .woocommerce a.button.alt, .woocommerce button.button.alt,
                .woocommerce input.button.alt,
                .woocommerce #respond input#submit.alt,
                .woocommerce #content input.button.alt,
                .woocommerce-page a.button.alt, .woocommerce-page button.button.alt,
                .woocommerce-page input.button.alt,
                .woocommerce-page #respond input#submit.alt,
                .woocommerce-page #content input.button.alt, .woocommerce a.button,
                .woocommerce button.button, .woocommerce input.button,
                .woocommerce #respond input#submit, .woocommerce #content input.button,
                .woocommerce-page a.button, .woocommerce-page button.button,
                .woocommerce-page input.button, .woocommerce-page #respond input#submit,
                .woocommerce-page #content input.button{
                    background: {$tpl_color};
                }";
                
            /** Dark Background Color **/
            $custom_css .= "
                .cta-link > a:hover,
                .team-hover-icon:hover,
                .woocommerce a.button:hover,
                .woocommerce button.button:hover,
                .woocommerce input.button:hover,
                .woocommerce #respond input#submit:hover,
                .woocommerce #content input.button:hover,
                .woocommerce-page a.button:hover, .woocommerce-page button.button:hover,
                .woocommerce-page input.button:hover, .woocommerce-page #respond input#submit:hover,
                .woocommerce-page #content input.button:hover,
                .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover,
                .woocommerce input.button.alt:hover, .woocommerce #respond input#submit.alt:hover,
                .woocommerce #content input.button.alt:hover, .woocommerce-page a.button.alt:hover,
                .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover,
                .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page #content input.button.alt:hover,
                nav.woocommerce-MyAccount-navigation ul li{
                    background: {$dark_tpl_color};   
                }";
                
            /** 0.8 Opaciity Background Color **/
            $custom_css .= "
                #portfolio-grid .port-wrap:hover .portfolio-content,
                .portfolio-grid .cat-portfolio-image:hover .portofolio-layout-wrap{
                    background: rgba( {$tpl_color_rgb[0]}, {$tpl_color_rgb[1]}, {$tpl_color_rgb[2]}, 0.8);                    
                }";
                
            /** Color **/
            $custom_css .= "
                .site-branding h1,
                .header-white .search-icon,
                #main-slider .caption-title span,
                .home-title,
                .portfolio-content-wrapper .read-more i,
                .inner-circle > h2,
                .blog-title-comment a, .blog-content a,
                .sidebar a:hover,
                .woocommerce .star-rating, .woocommerce-page .star-rating,
                .woocommerce ul.products li.product .price,
                .woocommerce-page ul.products li.product .price,
                .woocommerce ul.products li.product .price ins,
                .woocommerce-page ul.products li.product .price ins,
                .woocommerce-product-rating a,
                .woocommerce div.product span.price ins,
                .woocommerce div.product p.price ins,
                .woocommerce #content div.product span.price ins,
                .woocommerce #content div.product p.price ins,
                .woocommerce-page div.product span.price ins,
                .woocommerce-page div.product p.price ins,
                .woocommerce-page #content div.product span.price ins,
                .woocommerce-page #content div.product p.price ins,
                .woocommerce div.product span.price, .woocommerce div.product p.price,
                .woocommerce #content div.product span.price,
                .woocommerce #content div.product p.price,
                .woocommerce-page div.product span.price,
                .woocommerce-page div.product p.price,
                .woocommerce-page #content div.product span.price,
                .woocommerce-page #content div.product p.price,
                .product_meta a, .comment-form-rating .stars a,
                .woocommerce-LostPassword a,
                .woocommerce-MyAccount-content a,
                .woocommerce .woocommerce-info:before,
                .woocommerce-cart-form__contents a,
                .portfolio-grid .portofolio-layout-wrap .read-more:hover,
                .posted-on a,
                .business-hours a{
                    color: {$tpl_color};
                }";
                
            /** Border Color **/
            $custom_css .= "
                .btn-wrapper .btn, .btn-wrapper a,
                .sidebar .widget-title span,
                .main-title span,
                nav.woocommerce-MyAccount-navigation,
                .woocommerce .woocommerce-message,
                .woocommerce .woocommerce-error,
                .woocommerce .woocommerce-info,
                .woocommerce-page .woocommerce-message,
                .woocommerce-page .woocommerce-error,
                .woocommerce-page .woocommerce-info{
                    border-color: {$tpl_color};
                }";
            
            /** Dark Border Color **/
            $custom_css .= "
                .cta-link > a{
                    border-color: {$dark_tpl_color}
                }";
                
            /** Light Border Color **/
            $custom_css .= "
                .inner-circle{
                    border-color: {$light_tpl_color}; 
                }";

            /** Media Query **/
            $custom_css .= "@media (max-width: 1180px){
                .header-white #nav-open-btn.nav-btn span,
                #nav .close-btn{
                    background: {$tpl_color} !important;
                }
            }";

	    }

		wp_add_inline_style( 'accesspress-staple-style', $custom_css );
	}

	add_action( 'wp_enqueue_scripts', 'accesspress_staple_header_styles_scripts' );

    function accesspress_staple_colour_brightness($hex, $percent) {
        // Work out if hash given
        $hash = '';
        if (stristr($hex, '#')) {
            $hex = str_replace('#', '', $hex);
            $hash = '#';
        }
        /// HEX TO RGB
        $rgb = array(hexdec(substr($hex, 0, 2)), hexdec(substr($hex, 2, 2)), hexdec(substr($hex, 4, 2)));
        //// CALCULATE 
        for ($i = 0; $i < 3; $i++) {
            // See if brighter or darker
            if ($percent > 0) {
                // Lighter
                $rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1 - $percent));
            } else {
                // Darker
                $positivePercent = $percent - ($percent * 2);
                $rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1 - $positivePercent));
            }
            // In case rounding up causes us to go to 256
            if ($rgb[$i] > 255) {
                $rgb[$i] = 255;
            }
        }
        //// RBG to Hex
        $hex = '';
        for ($i = 0; $i < 3; $i++) {
            // Convert the decimal digit to hex
            $hexDigit = dechex($rgb[$i]);
            // Add a leading zero if necessary
            if (strlen($hexDigit) == 1) {
                $hexDigit = "0" . $hexDigit;
            }
            // Append to the hex string
            $hex .= $hexDigit;
        }
        return $hash . $hex;
    }

    function accesspress_staple_hex2rgb($hex) {
        $hex = str_replace("#", "", $hex);

        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = array($r, $g, $b);
        //return implode(",", $rgb); // returns the rgb values separated by commas
        return $rgb; // returns an array with the rgb values
    }