<?php

use Craftpeak\WPST\Config;
use Craftpeak\WPST\Wrapper;

?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
	<?php get_template_part( 'templates/head' ); ?>
	<body <?php body_class(); ?>>
		<!--[if lt IE 9]>
			<div class="alert">
				<?php _e( 'You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'cpwpst' ); ?>
			</div>
		<![endif]-->
		<?php
			do_action( 'get_header' );
			get_template_part( 'templates/header' );
		?>
		<div class="wrap" role="document">
			<div class="content">
				<main class="main" role="main">
					<?php include Wrapper\template_path(); ?>
				</main><!-- /.main -->
				<?php if ( Config\display_sidebar() ) : ?>
					<?php include Wrapper\sidebar_path(); ?>
				<?php endif; ?>
			</div><!-- /.content -->
		</div><!-- /.wrap -->
		<?php
			get_template_part( 'templates/footer' );
			wp_footer();
		?>
	</body>
</html>
