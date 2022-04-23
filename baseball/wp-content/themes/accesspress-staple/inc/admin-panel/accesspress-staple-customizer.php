<?php 
	Kirki::add_config( 'accesspress_staple_config', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'option',
		'option_name'	=> 'accesspress-staple'
	) );
		Kirki::add_section( 'accesspress_staple_basic_settings', array(
		    'priority'    => 20,
		    'title'       => esc_html__( 'Basic Settings', 'accesspress-staple' ),
		    'description' => esc_html__( 'Setup Basic Settings.', 'accesspress-staple' ),
		) );
			
			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'radio',
					'settings'    => 'webpage_layout',
					'label'       => esc_html__( 'Web Layout', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_basic_settings',
					'default'     => 'fullwidth',
					'priority'    => 10,
					'choices'     => 
					array(
						'fullwidth'   => esc_html__( 'Full Width', 'accesspress-staple' ),
						'boxed' 	  => esc_html__( 'Boxed', 'accesspress-staple' ),
						),					
					'sanitize_callback'	=> 'accesspress_staple_sanitize_weblayout'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'color',
					'settings'    => 'template_color',
					'label'       => esc_html__( 'Template Color', 'accesspress-staple' ),
					'description' => esc_html__( 'Choose template color of the theme.', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_basic_settings',
					'default'     => '#f0563d',
					'priority'    => 20,
	            	'sanitize_callback'	=> 'sanitize_hex_color',
					)
				);

			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'image',
				'settings'    => 'logo',
				'label'       => esc_html__( 'Upload Logo', 'accesspress-staple' ),
				'section'     => 'accesspress_staple_basic_settings',
				'default'     => '',
				'priority'    => 30,
			] );

			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'textarea',
				'settings'    => 'copyright',
				'label'       => esc_html__( 'Copyright Footer Text', 'accesspress-staple' ),
				'section'     => 'accesspress_staple_basic_settings',
				'priority'    => 30,
				'sanitize_callback' => 'accesspress_staple_sanitize_textarea',
            	'default'	=> ''
			] );

		Kirki::add_section( 'accesspress_staple_header', array(
		    'priority'    => 30,
		    'title'       => esc_html__( 'Header Settings', 'accesspress-staple' ),
		    'description' => esc_html__( 'Setup Header Settings.', 'accesspress-staple' ),
		) );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'radio',
					'settings'    => 'header_type',
					'label'       => esc_html__( 'Header Layout', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_header',
					'default'     => 'transparent',
					'priority'    => 10,
					'choices'     => 
					array(
						'transparent'   => esc_html__( 'Transparent', 'accesspress-staple' ),
						'classic' 	  => esc_html__( 'Classic', 'accesspress-staple' ),
						),					
					'sanitize_callback'	=> 'accesspress_staple_sanitize_headlayout'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'radio',
					'settings'    => 'header_bg',
					'label'       => esc_html__( 'Header Background', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_header',
					'default'     => 'White',
					'priority'    => 20,
					'choices'     => 
					array(
						'white'   => esc_html__( 'White', 'accesspress-staple' ),
						'black' 	  => esc_html__( 'Black', 'accesspress-staple' ),
						),					
					'sanitize_callback'	=> 'accesspress_staple_sanitize_hdback'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'show_search',
					'label'       => esc_html__( 'Show Search in header', 'accesspress-staple' ),
					'description' => esc_html__( 'Click here to Show or Hide Search in Header.', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_header',
					'default'     => true,
					'priority'    => 30,
					'choices'     => array(
							true   => esc_html__( 'Show', 'accesspress-staple' ),
							false => esc_html__( 'Hide', 'accesspress-staple' ),
						),					
					'sanitize_callback'	=> 'accesspress_staple_sanitize_checkbox'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'text',
				'settings'    => 'search_placeholder',
				'label'       => esc_html__( 'Search PlaceHolder Text', 'accesspress-staple' ),
				'section'     => 'accesspress_staple_header',
				'priority'    => 40,
				'sanitize_callback' => 'sanitize_text_field',
            	'default'	=> ''
			] );

			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'text',
				'settings'    => 'search_button',
				'label'       => esc_html__( 'Search Button Text', 'accesspress-staple' ),
				'section'     => 'accesspress_staple_header',
				'priority'    => 50,
				'sanitize_callback' => 'sanitize_text_field',
            	'default'	=> ''
			] );

			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'select',
				'settings'    => 'logo_alignment',
				'label'       => esc_html__( 'Logo Alignment', 'accesspress-staple' ),
				'section'     => 'accesspress_staple_header',
				'default'     => 'left',
				'priority'    => 60,
				'choices'     => array(
					'left'   => esc_html__( 'Left', 'accesspress-staple' ),
					'right' => esc_html__( 'Right', 'accesspress-staple' ),
					'center' => esc_html__( 'Center', 'accesspress-staple' ),
				),		
				'sanitize_callback'	=> 'accesspress_staple_sanitize_log_alg'

			] );

	Kirki::add_panel( 'accesspress_staple_hm_settings', array(
	    'priority'    => 50,
	    'title'       => esc_html__( 'Home Page Settings', 'accesspress-staple' ),
	    'description' => esc_html__( 'Setup home page Settings.', 'accesspress-staple' ),
	) );

		Kirki::add_section( 'accesspress_staple_about_sec', array(
		    'priority'    => 10,
		    'title'       => esc_html__( 'About Section', 'accesspress-staple' ),
			'panel'          => 'accesspress_staple_hm_settings',
		) );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'enable_about',
					'label'       => esc_html__( 'Enable About Section', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_about_sec',
					'description' => esc_html__( 'Click here to enable.', 'accesspress-staple' ),
					'default'     => true,
					'priority'    => 10,
					'choices'     => array(
							true   => esc_html__( 'Enable', 'accesspress-staple' ),
							false  => esc_html__( 'Disable', 'accesspress-staple' ),
						),
					'sanitize_callback'	=> 'accesspress_staple_sanitize_checkbox'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'select',
					'settings'    => 'about_section',
					'label'       => esc_html__( 'Select the Post to show About Section', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_about_sec',
					'priority'    => 20,
	            	'choices' => accesspress_staple_post_list(),
	            	'sanitize_callback'	=> 'accesspress_staple_sanitize_post_lists',
	            	'default'	=> '',
					)
			);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'about_view_more',
					'label'       => esc_html__( 'About View More Text', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_about_sec',
					'default'     => esc_html('Details'),
					'priority'    => 30,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

		Kirki::add_section( 'accesspress_staple_feature_sec', array(
		    'priority'    => 20,
		    'title'       => esc_html__( 'Feature Section', 'accesspress-staple' ),
			'panel'          => 'accesspress_staple_hm_settings',
		) );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'enable_feature',
					'label'       => esc_html__( 'Enable Feature Section', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_feature_sec',
					'description' => esc_html__( 'Click here to enable or disable feature section.', 'accesspress-staple' ),
					'default'     => true,
					'priority'    => 10,
					'choices'     => array(
							true   => esc_html__( 'Enable', 'accesspress-staple' ),
							false  => esc_html__( 'Disable', 'accesspress-staple' ),
						),
					'sanitize_callback'	=> 'accesspress_staple_sanitize_checkbox'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'feature_title',
					'label'       => esc_html__( 'Feature Section Title', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_feature_sec',
					'default'     => '',
					'priority'    => 20,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);


			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'textarea',
				'settings'    => 'feature_desc',
				'label'       => esc_html__( 'Feature Section Description', 'accesspress-staple' ),
				'section'     => 'accesspress_staple_feature_sec',
				'priority'    => 30,
				'sanitize_callback' => 'accesspress_staple_sanitize_textarea',
            	'default'	=> ''
			] );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'select',
					'settings'    => 'feature_section',
					'label'       => esc_html__( 'Select the Category to show Feature Section', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_feature_sec',
					'priority'    => 40,
	            	'choices' => accesspress_staple_category_lists(),
	            	'sanitize_callback'	=> 'accesspress_staple_sanitize_cat_lists',
	            	'default'	=> '',
					)
			);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'feature_more',
					'label'       => esc_html__( 'Display View All Button', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_feature_sec',
					'description' => esc_html__( 'Click here to enable.', 'accesspress-staple' ),
					'default'     => true,
					'priority'    => 50,
					'choices'     => array(
							true   => esc_html__( 'Enable', 'accesspress-staple' ),
							false  => esc_html__( 'Disable', 'accesspress-staple' ),
						),
					'sanitize_callback'	=> 'accesspress_staple_sanitize_checkbox'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'feature_more_text',
					'label'       => esc_html__( 'View All Button Text', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_feature_sec',
					'default'     => esc_html('View More'),
					'priority'    => 60,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

		Kirki::add_section( 'accesspress_staple_pr_tab_sec', array(
		    'priority'    => 30,
		    'title'       => esc_html__( 'Pricing Table Section', 'accesspress-staple' ),
			'panel'          => 'accesspress_staple_hm_settings',
		) );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'enable_pricing',
					'label'       => esc_html__( 'Enable Pricing Table', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_pr_tab_sec',
					'description' => esc_html__( 'Go to Pricing Table Setting tab to add the table.', 'accesspress-staple' ),
					'default'     => true,
					'priority'    => 10,
					'choices'     => array(
							true   => esc_html__( 'Enable', 'accesspress-staple' ),
							false  => esc_html__( 'Disable', 'accesspress-staple' ),
						),
					'sanitize_callback'	=> 'accesspress_staple_sanitize_checkbox'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'pricing_table_title',
					'label'       => esc_html__( 'Pricing Table Title', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_pr_tab_sec',
					'default'     => esc_html('Pricing Table'),
					'priority'    => 20,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'textarea',
				'settings'    => 'pricing_table_desc',
				'label'       => esc_html__( 'Pricing Table Description', 'accesspress-staple' ),
				'section'     => 'accesspress_staple_pr_tab_sec',
				'priority'    => 30,
				'sanitize_callback' => 'accesspress_staple_sanitize_textarea',
            	'default'	=> ''
			] );

			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'custom',
				'settings'    => 'accesspress_staple_tab1',
				'section'     => 'accesspress_staple_pr_tab_sec',
				'default'     => '<div style="padding: 10px;background-color: #ddd; color: #000; border-radius: 5px;">' . esc_html__( 'Table 1', 'accesspress-staple' ) . '</div>',
				'priority'    => 40,
			] );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'select',
					'settings'    => 'table1_desc',
					'label'       => esc_html__( 'Table Content and Title', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_pr_tab_sec',
					'priority'    => 40,
	            	'choices' => accesspress_staple_page_list(),
	            	'sanitize_callback'	=> 'accesspress_staple_sanitize_page_lists',
	            	'default'	=> '',
					)
			);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'table1_price_unit',
					'label'       => esc_html__( 'Currency Unit', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_pr_tab_sec',
					'default'     => '',
					'priority'    => 40,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'table1_price',
					'label'       => esc_html__( 'Price', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_pr_tab_sec',
					'default'     => '',
					'priority'    => 40,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'table1_more_text',
					'label'       => esc_html__( 'More Link Text', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_pr_tab_sec',
					'default'     => '',
					'priority'    => 40,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);


			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'table1_more_link',
					'label'       => esc_html__( 'More Link (URL)', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_pr_tab_sec',
					'default'     => '',
					'priority'    => 40,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'custom',
				'settings'    => 'accesspress_staple_tab2',
				'section'     => 'accesspress_staple_pr_tab_sec',
				'default'     => '<div style="padding: 10px;background-color: #ddd; color: #000; border-radius: 5px;">' . esc_html__( 'Table 2', 'accesspress-staple' ) . '</div>',
				'priority'    => 50,
			] );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'select',
					'settings'    => 'table2_desc',
					'label'       => esc_html__( 'Table Content and Title', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_pr_tab_sec',
					'priority'    => 50,
	            	'choices' => accesspress_staple_page_list(),
	            	'sanitize_callback'	=> 'accesspress_staple_sanitize_page_lists',
	            	'default'	=> '',
					)
			);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'table2_price_unit',
					'label'       => esc_html__( 'Currency Unit', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_pr_tab_sec',
					'default'     => '',
					'priority'    => 50,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'table2_price',
					'label'       => esc_html__( 'Price', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_pr_tab_sec',
					'default'     => '',
					'priority'    => 50,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'table2_more_text',
					'label'       => esc_html__( 'More Link Text', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_pr_tab_sec',
					'default'     => '',
					'priority'    => 50,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);


			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'table2_more_link',
					'label'       => esc_html__( 'More Link (URL)', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_pr_tab_sec',
					'default'     => '',
					'priority'    => 50,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'custom',
				'settings'    => 'accesspress_staple_tab3',
				'section'     => 'accesspress_staple_pr_tab_sec',
				'default'     => '<div style="padding: 10px;background-color: #ddd; color: #000; border-radius: 5px;">' . esc_html__( 'Table 3', 'accesspress-staple' ) . '</div>',
				'priority'    => 60,
			] );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'select',
					'settings'    => 'table3_desc',
					'label'       => esc_html__( 'Table Content and Title', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_pr_tab_sec',
					'priority'    => 60,
	            	'choices' => accesspress_staple_page_list(),
	            	'sanitize_callback'	=> 'accesspress_staple_sanitize_page_lists',
	            	'default'	=> '',
					)
			);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'table3_price_unit',
					'label'       => esc_html__( 'Currency Unit', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_pr_tab_sec',
					'default'     => '',
					'priority'    => 60,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'table3_price',
					'label'       => esc_html__( 'Price', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_pr_tab_sec',
					'default'     => '',
					'priority'    => 60,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'table3_more_text',
					'label'       => esc_html__( 'More Link Text', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_pr_tab_sec',
					'default'     => '',
					'priority'    => 60,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);


			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'table3_more_link',
					'label'       => esc_html__( 'More Link (URL)', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_pr_tab_sec',
					'default'     => '',
					'priority'    => 60,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

		Kirki::add_section( 'accesspress_staple_aws_feature_sec', array(
		    'priority'    => 40,
		    'title'       => esc_html__( 'Awesome Features Section', 'accesspress-staple' ),
			'panel'          => 'accesspress_staple_hm_settings',
		) );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'enable_awesome_feature',
					'label'       => esc_html__( 'Enable Awesome Feature Section', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_aws_feature_sec',
					'description' => esc_html__( 'Click here to enable.', 'accesspress-staple' ),
					'default'     => true,
					'priority'    => 10,
					'choices'     => array(
							true   => esc_html__( 'Enable', 'accesspress-staple' ),
							false  => esc_html__( 'Disable', 'accesspress-staple' ),
						),
					'sanitize_callback'	=> 'accesspress_staple_sanitize_checkbox'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'feature_awesome_title',
					'label'       => esc_html__( 'Feature Section Title', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_aws_feature_sec',
					'default'     => '',
					'priority'    => 20,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);


			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'textarea',
				'settings'    => 'feature_awesome_desc',
				'label'       => esc_html__( 'Feature Section Description', 'accesspress-staple' ),
				'section'     => 'accesspress_staple_aws_feature_sec',
				'priority'    => 30,
				'sanitize_callback' => 'accesspress_staple_sanitize_textarea',
            	'default'	=> ''
			] );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'select',
					'settings'    => 'feature_awesome_section',
					'label'       => esc_html__( 'Select the Category to show Awesome Feature Section', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_aws_feature_sec',
					'priority'    => 40,
	            	'choices' => accesspress_staple_category_lists(),
	            	'sanitize_callback'	=> 'accesspress_staple_sanitize_cat_lists',
	            	'default'	=> '',
					)
			);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'awesome_feature_more',
					'label'       => esc_html__( 'Display View All Button', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_aws_feature_sec',
					'description' => esc_html__( 'Click here to enable.', 'accesspress-staple' ),
					'default'     => true,
					'priority'    => 50,
					'choices'     => array(
							true   => esc_html__( 'Enable', 'accesspress-staple' ),
							false  => esc_html__( 'Disable', 'accesspress-staple' ),
						),
					'sanitize_callback'	=> 'accesspress_staple_sanitize_checkbox'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'awesome_feature_more_text',
					'label'       => esc_html__( 'View All Button Text', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_aws_feature_sec',
					'default'     => esc_html('View More'),
					'priority'    => 60,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

		Kirki::add_section( 'accesspress_staple_portfolio_sec', array(
		    'priority'    => 50,
		    'title'       => esc_html__( 'Portfolio Section', 'accesspress-staple' ),
			'panel'          => 'accesspress_staple_hm_settings',
		) );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'enable_portfolio',
					'label'       => esc_html__( 'Enable Portfolio Section', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_portfolio_sec',
					'description' => esc_html__( 'Click here to enable.', 'accesspress-staple' ),
					'default'     => true,
					'priority'    => 10,
					'choices'     => array(
							true   => esc_html__( 'Enable', 'accesspress-staple' ),
							false  => esc_html__( 'Disable', 'accesspress-staple' ),
						),
					'sanitize_callback'	=> 'accesspress_staple_sanitize_checkbox'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'portfolio_title',
					'label'       => esc_html__( 'Portfolio Section Title', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_portfolio_sec',
					'default'     => '',
					'priority'    => 20,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);


			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'textarea',
				'settings'    => 'portfolio_desc',
				'label'       => esc_html__( 'Portfolio Section Description', 'accesspress-staple' ),
				'section'     => 'accesspress_staple_portfolio_sec',
				'priority'    => 30,
				'sanitize_callback' => 'accesspress_staple_sanitize_textarea',
            	'default'	=> ''
			] );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'select',
					'settings'    => 'portfolio_section',
					'label'       => esc_html__( 'Select the Category to show Portfolio Section', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_portfolio_sec',
					'priority'    => 40,
	            	'choices' => accesspress_staple_category_lists(),
	            	'sanitize_callback'	=> 'accesspress_staple_sanitize_cat_lists',
	            	'default'	=> '',
					)
			);

		Kirki::add_section( 'accesspress_staple_client_logo_sec', array(
		    'priority'    => 50,
		    'title'       => esc_html__( 'Client Logo Section', 'accesspress-staple' ),
			'panel'          => 'accesspress_staple_hm_settings',
		) );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'enable_client',
					'label'       => esc_html__( 'Enable Client Logo Section', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_client_logo_sec',
					'description' => esc_html__( 'Go to Upload Client Logo tab to upload logo.', 'accesspress-staple' ),
					'default'     => true,
					'priority'    => 10,
					'choices'     => array(
							true   => esc_html__( 'Enable', 'accesspress-staple' ),
							false  => esc_html__( 'Disable', 'accesspress-staple' ),
						),
					'sanitize_callback'	=> 'accesspress_staple_sanitize_checkbox'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'radio',
					'settings'    => 'view_type_clients',
					'label'       => esc_html__( 'View Type', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_client_logo_sec',
					'default'     => 'static',
					'priority'    => 20,
					'choices'     => 
					array(
						'scroll'   => esc_html__( 'Logo Slider', 'accesspress-staple' ),
						'static'   => esc_html__( 'Static Images', 'accesspress-staple' ),
						),					
					'sanitize_callback'	=> 'accesspress_mag_sanitize_view_type'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'client_title',
					'label'       => esc_html__( 'Clients Title', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_client_logo_sec',
					'default'     => '',
					'priority'    => 30,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);


			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'textarea',
				'settings'    => 'client_desc',
				'label'       => esc_html__( 'Clients Description', 'accesspress-staple' ),
				'section'     => 'accesspress_staple_client_logo_sec',
				'priority'    => 40,
				'sanitize_callback' => 'accesspress_staple_sanitize_textarea',
            	'default'	=> ''
			] );

			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'repeater',
				'settings'    => 'partner_logo',
				'label'       => esc_html__( 'Associate Logo', 'accesspress-staple' ),
				'section'     => 'accesspress_staple_client_logo_sec',
				'priority'    => 50,
				'row_label' => [
					'type'  => 'text',
					'value' => esc_html__( 'Add Logo', 'accesspress-staple' ),
				],
				'button_label' => esc_html__('Add Logo ', 'accesspress-staple' ),
				//'settings'     => 'repeater_logo_upload',
				'fields' => [
					'link' => [
						'type'        => 'text',
						'label'       => esc_html__( 'Image Text', 'accesspress-staple' ),
						'default'     => '',
					],
					'image'  => [
						'type'        => 'image',
						'label'       => esc_html__( 'Choose Image', 'accesspress-staple' ),
						'default'     => '',
					],
				]
			] );


		Kirki::add_section( 'accesspress_staple_call_to_acn_sec', array(
		    'priority'    => 60,
		    'title'       => esc_html__( 'Call to Action Section', 'accesspress-staple' ),
			'panel'          => 'accesspress_staple_hm_settings',
		) );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'enable_call_to_action',
					'label'       => esc_html__( 'Enable Call to Action Section', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_call_to_acn_sec',
					'description' => esc_html__( 'Click here to enable', 'accesspress-staple' ),
					'default'     => true,
					'priority'    => 10,
					'choices'     => array(
							true   => esc_html__( 'Enable', 'accesspress-staple' ),
							false  => esc_html__( 'Disable', 'accesspress-staple' ),
						),
					'sanitize_callback'	=> 'accesspress_staple_sanitize_checkbox'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'call_to_action_title',
					'label'       => esc_html__( 'Call to Action Title', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_call_to_acn_sec',
					'default'     => '',
					'priority'    => 20,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'textarea',
				'settings'    => 'call_to_action_desc',
				'label'       => esc_html__( 'Call to Action Description', 'accesspress-staple' ),
				'section'     => 'accesspress_staple_call_to_acn_sec',
				'priority'    => 30,
				'sanitize_callback' => 'accesspress_staple_sanitize_textarea',
            	'default'	=> ''
			] );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'call_to_action_more_text',
					'label'       => esc_html__( 'Read More Text', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_call_to_acn_sec',
					'default'     => '',
					'priority'    => 40,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'call_to_action_more_link',
					'label'       => esc_html__( 'Read More Link', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_call_to_acn_sec',
					'default'     => '',
					'priority'    => 50,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'image',
				'settings'    => 'call_to_action_bg',
				'label'       => esc_html__( 'Background Image for Call to Action', 'accesspress-staple' ),
				'section'     => 'accesspress_staple_call_to_acn_sec',
				'default'     => '',
				'priority'    => 60,
			] );

		Kirki::add_section( 'accesspress_staple_team_mem_sec', array(
		    'priority'    => 70,
		    'title'       => esc_html__( 'Team Member Section', 'accesspress-staple' ),
			'panel'          => 'accesspress_staple_hm_settings',
		) );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'enable_team_member',
					'label'       => esc_html__( 'Enable Team Member Section', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_team_mem_sec',
					'description' => esc_html__( 'Click here to enable.', 'accesspress-staple' ),
					'default'     => true,
					'priority'    => 10,
					'choices'     => array(
							true   => esc_html__( 'Enable', 'accesspress-staple' ),
							false  => esc_html__( 'Disable', 'accesspress-staple' ),
						),
					'sanitize_callback'	=> 'accesspress_staple_sanitize_checkbox'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'team_member_title',
					'label'       => esc_html__( 'Team Member Title', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_team_mem_sec',
					'default'     => '',
					'priority'    => 20,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'select',
					'settings'    => 'team_member_category',
					'label'       => esc_html__( 'Category for Team Member Section', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_team_mem_sec',
					'priority'    => 30,
	            	'choices' => accesspress_staple_category_lists(),
	            	'sanitize_callback'	=> 'accesspress_staple_sanitize_cat_lists',
	            	'default'	=> '',
					)
			);

		Kirki::add_section( 'accesspress_staple_stat_count_sec', array(
		    'priority'    => 80,
		    'title'       => esc_html__( 'Stat Counter Section', 'accesspress-staple' ),
			'panel'          => 'accesspress_staple_hm_settings',
		) );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'enable_stat_counter',
					'label'       => esc_html__( 'Enable Stat Counter Section', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_stat_count_sec',
					'description' => esc_html__( 'Click here to enable.', 'accesspress-staple' ),
					'default'     => true,
					'priority'    => 10,
					'choices'     => array(
							true   => esc_html__( 'Enable', 'accesspress-staple' ),
							false  => esc_html__( 'Disable', 'accesspress-staple' ),
						),
					'sanitize_callback'	=> 'accesspress_staple_sanitize_checkbox'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'stat_counter_title',
					'label'       => esc_html__( 'Stat Counter Title', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_stat_count_sec',
					'default'     => '',
					'priority'    => 20,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'textarea',
				'settings'    => 'stat_counter_desc',
				'label'       => esc_html__( 'Stat Counter Description', 'accesspress-staple' ),
				'section'     => 'accesspress_staple_stat_count_sec',
				'priority'    => 30,
				'sanitize_callback' => 'accesspress_staple_sanitize_textarea',
            	'default'	=> ''
			] );

			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'custom',
				'settings'    => 'accesspress_staple_counter1',
				'section'     => 'accesspress_staple_stat_count_sec',
				'default'     => '<div style="padding: 10px;background-color: #ddd; color: #000; border-radius: 5px;">' . esc_html__( 'Counter 1', 'accesspress-staple' ) . '</div>',
				'priority'    => 40,
			] );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'counter1_text',
					'label'       => esc_html__( 'Title', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_stat_count_sec',
					'default'     => '',
					'priority'    => 50,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'counter1_numeric',
					'label'       => esc_html__( 'Number', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_stat_count_sec',
					'default'     => '',
					'priority'    => 60,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'counter1_font_awesome',
					'label'       => esc_html__( 'Font Awesome text', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_stat_count_sec',
					'description' => esc_html__( 'Add Font Aawesome Code example:fa-bell, Please go to Font Awesome Website.', 'accesspress-staple' ),
					'default'     => '',
					'priority'    => 70,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'custom',
				'settings'    => 'accesspress_staple_counter2',
				'section'     => 'accesspress_staple_stat_count_sec',
				'default'     => '<div style="padding: 10px;background-color: #ddd; color: #000; border-radius: 5px;">' . esc_html__( 'Counter 2', 'accesspress-staple' ) . '</div>',
				'priority'    => 80,
			] );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'counter2_text',
					'label'       => esc_html__( 'Title', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_stat_count_sec',
					'default'     => '',
					'priority'    => 80,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'counter2_numeric',
					'label'       => esc_html__( 'Number', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_stat_count_sec',
					'default'     => '',
					'priority'    => 80,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'counter2_font_awesome',
					'label'       => esc_html__( 'Font Awesome text', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_stat_count_sec',
					'description' => esc_html__( 'Add Font Aawesome Code example:fa-bell, Please go to Font Awesome Website.', 'accesspress-staple' ),
					'default'     => '',
					'priority'    => 80,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'custom',
				'settings'    => 'accesspress_staple_counter3',
				'section'     => 'accesspress_staple_stat_count_sec',
				'default'     => '<div style="padding: 10px;background-color: #ddd; color: #000; border-radius: 5px;">' . esc_html__( 'Counter 3', 'accesspress-staple' ) . '</div>',
				'priority'    => 90,
			] );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'counter3_text',
					'label'       => esc_html__( 'Title', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_stat_count_sec',
					'default'     => '',
					'priority'    => 90,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'counter3_numeric',
					'label'       => esc_html__( 'Number', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_stat_count_sec',
					'default'     => '',
					'priority'    => 90,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'counter3_font_awesome',
					'label'       => esc_html__( 'Font Awesome text', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_stat_count_sec',
					'description' => esc_html__( 'Add Font Aawesome Code example:fa-bell, Please go to Font Awesome Website.', 'accesspress-staple' ),
					'default'     => '',
					'priority'    => 90,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'custom',
				'settings'    => 'accesspress_staple_counter4',
				'section'     => 'accesspress_staple_stat_count_sec',
				'default'     => '<div style="padding: 10px;background-color: #ddd; color: #000; border-radius: 5px;">' . esc_html__( 'Counter 4', 'accesspress-staple' ) . '</div>',
				'priority'    => 100,
			] );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'counter4_text',
					'label'       => esc_html__( 'Title', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_stat_count_sec',
					'default'     => '',
					'priority'    => 100,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'counter4_numeric',
					'label'       => esc_html__( 'Number', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_stat_count_sec',
					'default'     => '',
					'priority'    => 100,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'counter4_font_awesome',
					'label'       => esc_html__( 'Font Awesome text', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_stat_count_sec',
					'description' => esc_html__( 'Add Font Aawesome Code example:fa-bell, Please go to Font Awesome Website.', 'accesspress-staple' ),
					'default'     => '',
					'priority'    => 100,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

		Kirki::add_section( 'accesspress_staple_blog_sec', array(
		    'priority'    => 90,
		    'title'       => esc_html__( 'Blog Section', 'accesspress-staple' ),
			'panel'          => 'accesspress_staple_hm_settings',
		) );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'enable_blog',
					'label'       => esc_html__( 'Enable Blog Section', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_blog_sec',
					'description' => esc_html__( 'Click here to enable.', 'accesspress-staple' ),
					'default'     => true,
					'priority'    => 10,
					'choices'     => array(
							true   => esc_html__( 'Enable', 'accesspress-staple' ),
							false  => esc_html__( 'Disable', 'accesspress-staple' ),
						),
					'sanitize_callback'	=> 'accesspress_staple_sanitize_checkbox'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'blog_title',
					'label'       => esc_html__( 'Blog Title', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_blog_sec',
					'default'     => '',
					'priority'    => 20,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'textarea',
				'settings'    => 'blog_desc',
				'label'       => esc_html__( 'Blog Description', 'accesspress-staple' ),
				'section'     => 'accesspress_staple_blog_sec',
				'priority'    => 30,
				'sanitize_callback' => 'accesspress_staple_sanitize_textarea',
            	'default'	=> ''
			] );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'blog_more_text_single',
					'label'       => esc_html__( 'Read More Text for Single Page', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_blog_sec',
					'default'     => '',
					'priority'    => 40,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'select',
					'settings'    => 'blog',
					'label'       => esc_html__( 'Select Category to show Blog Section', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_blog_sec',
					'priority'    => 50,
	            	'choices' => accesspress_staple_category_lists(),
	            	'sanitize_callback'	=> 'accesspress_staple_sanitize_cat_lists',
	            	'default'	=> '',
					)
			);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'enable_blog_more',
					'label'       => esc_html__( 'Display View All Button', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_blog_sec',
					'description' => esc_html__( 'Click here to enable.', 'accesspress-staple' ),
					'default'     => true,
					'priority'    => 60,
					'choices'     => array(
							true   => esc_html__( 'Enable', 'accesspress-staple' ),
							false  => esc_html__( 'Disable', 'accesspress-staple' ),
						),
					'sanitize_callback'	=> 'accesspress_staple_sanitize_checkbox'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'blog_more_text',
					'label'       => esc_html__( 'View All Button Text', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_blog_sec',
					'default'     => '',
					'priority'    => 60,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

		Kirki::add_section( 'accesspress_staple_testimonial_sec', array(
		    'priority'    => 100,
		    'title'       => esc_html__( 'Testimonial Section', 'accesspress-staple' ),
			'panel'          => 'accesspress_staple_hm_settings',
		) );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'enable_testomonial',
					'label'       => esc_html__( 'Enable Testimonial Section', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_testimonial_sec',
					'description' => esc_html__( 'Click here to enable.', 'accesspress-staple' ),
					'default'     => true,
					'priority'    => 10,
					'choices'     => array(
							true   => esc_html__( 'Enable', 'accesspress-staple' ),
							false  => esc_html__( 'Disable', 'accesspress-staple' ),
						),
					'sanitize_callback'	=> 'accesspress_staple_sanitize_checkbox'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'testomonial_title',
					'label'       => esc_html__( 'Testimonial Title', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_testimonial_sec',
					'default'     => '',
					'priority'    => 20,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'select',
					'settings'    => 'testomonial_category',
					'label'       => esc_html__( 'Category for Testimonial Section', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_testimonial_sec',
					'priority'    => 30,
	            	'choices' 	  => accesspress_staple_category_lists(),
	            	'sanitize_callback'	=> 'accesspress_staple_sanitize_cat_lists',
	            	'default'	=> '',
					)
			);

		Kirki::add_section( 'accesspress_staple_lat_post_sec', array(
		    'priority'    => 100,
		    'title'       => esc_html__( 'Latest Post Section', 'accesspress-staple' ),
			'panel'          => 'accesspress_staple_hm_settings',
		) );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'enable_posts',
					'label'       => esc_html__( 'Enable Latest Post Section', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_lat_post_sec',
					'description' => esc_html__( 'Click here to enable.', 'accesspress-staple' ),
					'default'     => true,
					'priority'    => 10,
					'choices'     => array(
							true   => esc_html__( 'Enable', 'accesspress-staple' ),
							false  => esc_html__( 'Disable', 'accesspress-staple' ),
						),
					'sanitize_callback'	=> 'accesspress_staple_sanitize_checkbox'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'rm_lp',
					'label'       => esc_html__( 'ReadMore text for Latest Post', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_lat_post_sec',
					'default'     => '',
					'priority'    => 20,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

		Kirki::add_section( 'accesspress_staple_slider_setting', array(
		    'priority'    => 30,
		    'title'       => esc_html__( 'Slider Settings', 'accesspress-staple' ),
		) );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'enable_slider',
					'label'       => esc_html__( 'Enable Slider', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_slider_setting',
					'description' => esc_html__( 'The Best Size of the image is 1800 X 660px.', 'accesspress-staple' ),
					'default'     => true,
					'priority'    => 10,
					'choices'     => array(
							true   => esc_html__( 'Enable', 'accesspress-staple' ),
							false  => esc_html__( 'Disable', 'accesspress-staple' ),
						),
					'sanitize_callback'	=> 'accesspress_staple_sanitize_checkbox'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'select',
					'settings'    => 'cagegory_as_slider',
					'label'       => esc_html__( 'Choose the category to show in Slider', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_slider_setting',
					'priority'    => 20,
	            	'choices' 	  => accesspress_staple_category_lists(),
	            	'sanitize_callback'	=> 'accesspress_staple_sanitize_cat_lists',
	            	'default'	=> '',
					)
			);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'slider_button_text',
					'label'       => esc_html__( 'Slider Button Text', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_slider_setting',
					'default'     => '',
					'priority'    => 30,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'radio',
					'settings'    => 'show_pager',
					'label'       => esc_html__( 'Show Pager (Navigation Dot)', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_slider_setting',
					'default'     => 'yes',
					'priority'    => 40,
					'choices'     => 
					array(
						'yes'   => esc_html__( 'Yes', 'accesspress-staple' ),
						'no' 	  => esc_html__( 'No', 'accesspress-staple' ),
						),					
					'sanitize_callback'	=> 'accesspress_staple_sanitize_yes_no'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'radio',
					'settings'    => 'show_controls',
					'label'       => esc_html__( 'Show Controls', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_slider_setting',
					'default'     => 'yes',
					'priority'    => 50,
					'choices'     => 
					array(
						'yes'   => esc_html__( 'Yes', 'accesspress-staple' ),
						'no' 	  => esc_html__( 'No', 'accesspress-staple' ),
						),					
					'sanitize_callback'	=> 'accesspress_staple_sanitize_yes_no'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'select',
				'settings'    => 'slider_transition',
				'label'       => esc_html__( 'Slider Transition (Fade/Slide)', 'accesspress-staple' ),
				'section'     => 'accesspress_staple_slider_setting',
				'default'     => 'fade',
				'priority'    => 50,
				'choices'     => array(
					'fade' => esc_html__('Fade', 'accesspress-staple'),
					'horizontal' => esc_html__('Slide Horizontal', 'accesspress-staple'),
					'vertical' => esc_html__('Slide Vertical', 'accesspress-staple'),
				),		
				'sanitize_callback'	=> 'accesspress_staple_sanitize_slider_trans'

			] );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'radio',
					'settings'    => 'slider_auto_transaction',
					'label'       => esc_html__( 'Show auto Transaction', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_slider_setting',
					'default'     => 'yes',
					'priority'    => 50,
					'choices'     => 
					array(
						'yes'   => esc_html__( 'Yes', 'accesspress-staple' ),
						'no' 	  => esc_html__( 'No', 'accesspress-staple' ),
						),					
					'sanitize_callback'	=> 'accesspress_staple_sanitize_yes_no'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'slider_speed',
					'label'       => esc_html__( 'Slider Speed', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_slider_setting',
					'default'     => '',
					'priority'    => 50,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'slider_pause',
					'label'       => esc_html__( 'Slider Speed', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_slider_setting',
					'default'     => '',
					'priority'    => 50,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'radio',
					'settings'    => 'show_slider_caption',
					'label'       => esc_html__( 'Show Slider Caption', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_slider_setting',
					'default'     => 'show',
					'priority'    => 50,
					'choices'     => 
					array(
						'show'   => esc_html__( 'Show', 'accesspress-staple' ),
						'hide' 	  => esc_html__( 'Hide', 'accesspress-staple' ),
						),					
					'sanitize_callback'	=> 'accesspress_staple_sanitize_show_hide'
					)
				);

		Kirki::add_section( 'accesspress_staple_social_setting', array(
		    'priority'    => 70,
		    'title'       => esc_html__( 'Social Settings', 'accesspress-staple' ),
		) );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'social_footer_header',
					'label'       => esc_html__( 'Social Icon in header', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_social_setting',
					'description' => esc_html__( 'Click here to enable', 'accesspress-staple' ),
					'default'     => true,
					'priority'    => 10,
					'choices'     => array(
							true   => esc_html__( 'Enable', 'accesspress-staple' ),
							false  => esc_html__( 'Disable', 'accesspress-staple' ),
						),
					'sanitize_callback'	=> 'accesspress_staple_sanitize_checkbox'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'social_footer',
					'label'       => esc_html__( 'Social Icon in Footer', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_social_setting',
					'description' => esc_html__( 'Click here to enable', 'accesspress-staple' ),
					'default'     => true,
					'priority'    => 10,
					'choices'     => array(
							true   => esc_html__( 'Enable', 'accesspress-staple' ),
							false  => esc_html__( 'Disable', 'accesspress-staple' ),
						),
					'sanitize_callback'	=> 'accesspress_staple_sanitize_checkbox'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'     => 'link',
					'settings' => 'facebook',
					'label'    => esc_html__( 'Facebook', 'accesspress-staple' ),
					'section'  => 'accesspress_staple_social_setting',
					'default'  => 'https://www.facebook.com/',
					'priority' => 10,
					'sanitize_callback' => 'esc_url_raw',
				)
		 	);

		 	Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'     => 'link',
					'settings' => 'twitter',
					'label'    => esc_html__( 'Twitter', 'accesspress-staple' ),
					'section'  => 'accesspress_staple_social_setting',
					'default'  => 'https://www.twitter.com/',
					'priority' => 10,
					'sanitize_callback' => 'esc_url_raw',
				)
		 	);

		 	Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'     => 'link',
					'settings' => 'google_plus',
					'label'    => esc_html__( 'Google Plus', 'accesspress-staple' ),
					'section'  => 'accesspress_staple_social_setting',
					'default'  => 'https://www.plus.google.com/',
					'priority' => 10,
					'sanitize_callback' => 'esc_url_raw',
				)
		 	);

		 	Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'     => 'link',
					'settings' => 'youtube',
					'label'    => esc_html__( 'Youtube', 'accesspress-staple' ),
					'section'  => 'accesspress_staple_social_setting',
					'default'  => 'https://www.youtube.com/',
					'priority' => 10,
					'sanitize_callback' => 'esc_url_raw',
				)
		 	);

		 	Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'     => 'link',
					'settings' => 'pinterest',
					'label'    => esc_html__( 'Pinterest', 'accesspress-staple' ),
					'section'  => 'accesspress_staple_social_setting',
					'default'  => 'https://www.pinterest.com/',
					'priority' => 10,
					'sanitize_callback' => 'esc_url_raw',
				)
		 	);

		 	Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'     => 'link',
					'settings' => 'linkedin',
					'label'    => esc_html__( 'Linkedin', 'accesspress-staple' ),
					'section'  => 'accesspress_staple_social_setting',
					'default'  => 'https://www.linkedin.com/',
					'priority' => 10,
					'sanitize_callback' => 'esc_url_raw',
				)
		 	);

		 	Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'     => 'link',
					'settings' => 'flicker',
					'label'    => esc_html__( 'Flicker', 'accesspress-staple' ),
					'section'  => 'accesspress_staple_social_setting',
					'default'  => 'https://www.flicker.com/',
					'priority' => 10,
					'sanitize_callback' => 'esc_url_raw',
				)
		 	);

		 	Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'     => 'link',
					'settings' => 'vimeo',
					'label'    => esc_html__( 'Vimeo', 'accesspress-staple' ),
					'section'  => 'accesspress_staple_social_setting',
					'default'  => 'https://www.vimeo.com/',
					'priority' => 10,
					'sanitize_callback' => 'esc_url_raw',
				)
		 	);

		 	Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'     => 'link',
					'settings' => 'stumbleupon',
					'label'    => esc_html__( 'Stumbleupon', 'accesspress-staple' ),
					'section'  => 'accesspress_staple_social_setting',
					'default'  => 'https://www.stumbleupon.com/',
					'priority' => 10,
					'sanitize_callback' => 'esc_url_raw',
				)
		 	);

		 	Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'     => 'link',
					'settings' => 'instagram',
					'label'    => esc_html__( 'Instagram', 'accesspress-staple' ),
					'section'  => 'accesspress_staple_social_setting',
					'default'  => 'https://www.instagram.com/',
					'priority' => 10,
					'sanitize_callback' => 'esc_url_raw',
				)
		 	);

		 	Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'     => 'link',
					'settings' => 'sound_cloud',
					'label'    => esc_html__( 'Sound Cloud', 'accesspress-staple' ),
					'section'  => 'accesspress_staple_social_setting',
					'default'  => 'https://www.soundcloud.com/',
					'priority' => 10,
					'sanitize_callback' => 'esc_url_raw',
				)
		 	);

		 	Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'     => 'link',
					'settings' => 'github',
					'label'    => esc_html__( 'GitHub', 'accesspress-staple' ),
					'section'  => 'accesspress_staple_social_setting',
					'default'  => 'https://www.github.com/',
					'priority' => 10,
					'sanitize_callback' => 'esc_url_raw',
				)
		 	);

		 	Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'     => 'link',
					'settings' => 'skype',
					'label'    => esc_html__( 'Skype', 'accesspress-staple' ),
					'section'  => 'accesspress_staple_social_setting',
					'default'  => 'https://www.skype.com/',
					'priority' => 10,
					'sanitize_callback' => 'esc_url_raw',
				)
		 	);

		 	Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'     => 'link',
					'settings' => 'tumbler',
					'label'    => esc_html__( 'Tumbler', 'accesspress-staple' ),
					'section'  => 'accesspress_staple_social_setting',
					'default'  => 'https://www.tumbler.com/',
					'priority' => 10,
					'sanitize_callback' => 'esc_url_raw',
				)
		 	);


		 	Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'     => 'link',
					'settings' => 'tumbler',
					'label'    => esc_html__( 'RSS', 'accesspress-staple' ),
					'section'  => 'accesspress_staple_social_setting',
					'default'  => '',
					'priority' => 10,
					'sanitize_callback' => 'esc_url_raw',
				)
		 	);

		Kirki::add_section( 'accesspress_staple_archive_page_setting', array(
		    'priority'    => 80,
		    'title'       => esc_html__( 'Archive Page Settings', 'accesspress-staple' ),
		) );

			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'custom',
				'settings'    => 'accesspress_staple_portfolio_cus',
				'section'     => 'accesspress_staple_archive_page_setting',
				'default'     => '<div style="padding: 10px;background-color: #ddd; color: #000; border-radius: 5px;">' . esc_html__( 'Portfolio', 'accesspress-staple' ) . '</div>',
				'priority'    => 10,
			] );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'radio',
					'settings'    => 'portfolio_layout',
					'label'       => esc_html__( 'Portfolio Layout', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_archive_page_setting',
					'default'     => 'grid',
					'priority'    => 10,
					'choices'     => 
					array(
						'grid'   => esc_html__( 'Grid', 'accesspress-staple' ),
						'list' 	  => esc_html__( 'List', 'accesspress-staple' ),
						),					
					'sanitize_callback'	=> 'accesspress_staple_sanitize_grid_list'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'read_more_portfolio',
					'label'       => esc_html__( 'Read More Text for Portfolio list', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_archive_page_setting',
					'default'     => '',
					'priority'    => 10,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'custom',
				'settings'    => 'accesspress_staple_team_cus',
				'section'     => 'accesspress_staple_archive_page_setting',
				'default'     => '<div style="padding: 10px;background-color: #ddd; color: #000; border-radius: 5px;">' . esc_html__( 'Team Member', 'accesspress-staple' ) . '</div>',
				'priority'    => 10,
			] );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'radio',
					'settings'    => 'team_member_layout',
					'label'       => esc_html__( 'Team Member Layout', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_archive_page_setting',
					'default'     => 'grid',
					'priority'    => 10,
					'choices'     => 
					array(
						'grid'   => esc_html__( 'Grid', 'accesspress-staple' ),
						'list' 	  => esc_html__( 'List', 'accesspress-staple' ),
						),					
					'sanitize_callback'	=> 'accesspress_staple_sanitize_grid_list'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'read_more_team',
					'label'       => esc_html__( 'Read More Text for Team Member list', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_archive_page_setting',
					'default'     => '',
					'priority'    => 10,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', [
				'type'        => 'custom',
				'settings'    => 'accesspress_staple_archive_cus',
				'section'     => 'accesspress_staple_archive_page_setting',
				'default'     => '<div style="padding: 10px;background-color: #ddd; color: #000; border-radius: 5px;">' . esc_html__( 'Archive', 'accesspress-staple' ) . '</div>',
				'priority'    => 10,
			] );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'text',
					'settings'    => 'read_more_archive',
					'label'       => esc_html__( 'Read More Text for Archive', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_archive_page_setting',
					'default'     => '',
					'priority'    => 10,			
					'sanitize_callback'	=> 'sanitize_text_field'
					)
				);
		Kirki::add_section( 'accesspress_staple_single_post_setting', array(
		    'priority'    => 80,
		    'title'       => esc_html__( 'Single Post Settings', 'accesspress-staple' ),
		) );

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'enable_sg_feature_img',
					'label'       => esc_html__( 'Enable Feature Image', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_single_post_setting',
					'description' => esc_html__( 'Click here to enable.', 'accesspress-staple' ),
					'default'     => true,
					'priority'    => 10,
					'choices'     => array(
							true   => esc_html__( 'Enable', 'accesspress-staple' ),
							false  => esc_html__( 'Disable', 'accesspress-staple' ),
						),
					'sanitize_callback'	=> 'accesspress_staple_sanitize_checkbox'
					)
				);

			Kirki::add_field( 'accesspress_staple_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'enable_sg_metadata',
					'label'       => esc_html__( 'Enable MetaData', 'accesspress-staple' ),
					'section'     => 'accesspress_staple_single_post_setting',
					'description' => esc_html__( 'Click here to enable.', 'accesspress-staple' ),
					'default'     => true,
					'priority'    => 10,
					'choices'     => array(
							true   => esc_html__( 'Enable', 'accesspress-staple' ),
							false  => esc_html__( 'Disable', 'accesspress-staple' ),
						),
					'sanitize_callback'	=> 'accesspress_staple_sanitize_checkbox'
					)
				);






