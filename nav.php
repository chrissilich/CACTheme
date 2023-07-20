<nav class="site-nav min-vh-100 ">
	<div class="min-vh-100 nav-menu-column">

		<?php include_once('logo.php'); logo('nav'); ?>

		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'main-menu',
				'menu_id'        => 'main-menu',
				'container'      => false,
				'menu_class'     => 'main-menu',
				'fallback_cb'    => false,
			)
		);
		?>
		<?php /*
		<div class="social-icons">
			<?php
			$instagram_icon = get_field('cac_social_instagram_icon', 'option');
			$instagram_url = get_field('cac_social_instagram_url', 'option');
			$pinterest_icon = get_field('cac_social_pinterest_icon', 'option');
			$pinterest_url = get_field('cac_social_pinterest_url', 'option');
			if ($instagram_icon && $instagram_url) : ?>
				<a href="<?php echo esc_url($instagram_url); ?>" target="_blank" rel="noopener noreferrer">
					<?php echo wp_get_attachment_image($instagram_icon, 'thumbnail', false, []); ?>
				</a>
			<?php endif;
			if ($pinterest_icon && $pinterest_url) : ?>
				<a href="<?php echo esc_url($pinterest_url); ?>" target="_blank" rel="noopener noreferrer">
					<?php echo wp_get_attachment_image($pinterest_icon, 'thumbnail', false, []); ?>
				</a>
			<?php endif; ?>
		</div>
		*/ ?>
	</div>
</nav>
