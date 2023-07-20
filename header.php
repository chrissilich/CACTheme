<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<script>
		const SITE_URL = <?php echo json_encode(get_template_directory_uri()); ?>;
	</script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<a href="#main" class="visually-hidden-focusable"><?php esc_html_e('Skip to main content', 'cac'); ?></a>

	<div id="wrapper">
		<button class="hamburger">
			<div></div>
			<div></div>
			<div></div>
			<span class="visually-hidden">MENU</span>
		</button>

		<header class="site-header container-fluid px-0">
			<div class="row mx-0 w-100">
				<div class="col-8 offset-2 col-md-4 offset-md-4 logo-column">
					<?php include_once( 'logo.php'); logo(is_home()?'home':'default'); ?>
				</div>
			</div>
		</header>

		<?php include_once('nav.php'); ?>


		<main id="main">
