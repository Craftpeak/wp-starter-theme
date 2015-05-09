<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
	<label class="sr-only"><?php _e( 'Search for:', 'cpwpst' ); ?></label>
	<input type="search" value="<?php echo get_search_query(); ?>" name="s" class="search-field" placeholder="<?php _e( 'Search', 'cpwpst' ); ?> <?php bloginfo( 'name' ); ?>" required>
	<button type="submit" class="search-submit"><?php _e( 'Search', 'cpwpst' ); ?></button>
</form>
