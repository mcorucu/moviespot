<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title('|', true, 'right'); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header>
		<div class="container">
			<div class="logo">
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="MovieSpot">
				</a>
			</div>
			<nav>
				<?php
					wp_nav_menu(array(
						'theme_location' => 'primary',
						'menu_class' => 'nav-menu',
					));
				?>
			</nav>
		</div>
	</header>
