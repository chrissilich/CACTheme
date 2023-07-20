<?php
get_header();
the_post();
?>

<!-- template: page-social.php -->

<?php
$instagram_icon = get_field('cac_social_instagram_icon', 'option');
$instagram_url = get_field('cac_social_instagram_url', 'option');
$instagram_name = get_field('cac_social_instagram_name', 'option');

$pinterest_icon = get_field('cac_social_pinterest_icon', 'option');
$pinterest_url = get_field('cac_social_pinterest_url', 'option');
$pinterest_name = get_field('cac_social_pinterest_name', 'option');
?>



<div class="container">
	<h2>Social</h2>

	<div class="row intro mt-5">
		<div class="col-12 col-md-2 order-md-2 profile-image-column">
			<?php echo wp_get_attachment_image(get_field('cac_social_profile_image'), 'thumbnail', false, ['class' => 'profile-image']); ?>
		</div>

		<?php if ($instagram_icon && $instagram_url && $instagram_name) : ?>
			<div class="col-12 col-md-5 order-md-1 align-self-center text-center text-md-end mt-3 mt-md-0">
				<a href="<?php echo $instagram_url; ?>" target="_blank" class="social-link">
					<?php echo wp_get_attachment_image($instagram_icon, 'thumbnail', false, ['class' => 'social-link-icon order-md-2']); ?>
					<div class="social-link-name order-md-1"><?php echo $instagram_name; ?></div>
				</a>
			</div>
		<?php endif; ?>
		<?php if ($pinterest_icon && $pinterest_url && $pinterest_name) : ?>
			<div class="col-12 col-md-5 order-md-3 align-self-center text-center text-md-start mt-1 mt-md-0">
				<a href="<?php echo $pinterest_url; ?>" target="_blank" class="social-link">
					<?php echo wp_get_attachment_image($pinterest_icon, 'thumbnail', false, ['class' => 'social-link-icon order-md-1']); ?>
					<div class="social-link-name order-md-2"><?php echo $pinterest_name; ?></div>
				</a>
			</div>
		<?php endif; ?>
	</div>

	<div class="row blurb my-5 social-page-content">
		<div class="col-12 col-md-8 offset-md-2 text-center">
			<?php the_content(); ?>
		</div>
	</div>

	<div class="row image-grid-plugin">
		<?php echo do_shortcode('[instagram feed="1314"]');?>
	</div>



	<?php get_footer();
