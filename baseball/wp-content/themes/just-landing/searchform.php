		<form class="search-main" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
			<input class="serch-txt" value="<?php esc_attr_e( 'Search', 'just-landing' ); ?>" onfocus="this.value=''" type="text" name="s" id="s" value="<?php the_search_query(); ?>" />
			<input class="serch-btn" type="image" src="<?php echo get_template_directory_uri() . '/images/search-button.jpg'; ?>" />
		</form>