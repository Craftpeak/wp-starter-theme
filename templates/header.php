<header class="banner" role="banner">
	<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php bloginfo( 'name' ); ?>
	</a>
	<nav role="navigation">
		<?php
		if ( has_nav_menu( 'primary_navigation' ) ) :
			wp_nav_menu([
				'theme_location' => 'primary_navigation',
				'menu_class' => 'nav'
			]);
		endif;
		?>
	</nav>
</header>
