<?php

/**
 * The Template for displaying Archive pages.
 */

get_header();

include_once('nav-features.php');

if (have_posts()) : ?>

	<!-- taxonomy-cac_feature_type.php -->
	<div class="container">
		<div class="row feature-items">
			<?php
			while (have_posts()) : the_post();
				$feature_type = get_the_terms(get_the_ID(), 'cac_feature_type')[0]->slug;
				$clean_title = get_field('cac_feature_clean_title');
				if (empty(get_field('cac_feature_clean_title'))) {
					$clean_title = get_the_title();
				}
				$link = get_permalink();
				$link_target = '';
				if (get_field('cac_feature_url')) {
					$link = get_field('cac_feature_url');
					$link_target = '_blank';
				}
			?>

				<div class="feature-item feature-item--type-<?php echo $feature_type; ?>">
					<?php if ($feature_type == 'collections' || $feature_type == 'interiors' || $feature_type == 'videos') : // logo is the main image for the thumbnail  
					?>
						<div class="feature-item-logo feature-item-logo--tint-<?php echo get_field('cac_feature_logo_tint'); ?>" style="background-color: <?php echo get_field('cac_feature_logo_background'); ?>">
							<?php echo wp_get_attachment_image(get_field("cac_feature_logo"), "", false, ['alt' => $clean_title, 'style' => 'max-width: ' . get_field('cac_feature_logo_scale') . '%; max-height: ' . get_field('cac_feature_logo_scale') . '%;']); ?>
						</div>
					<?php else : // static image is the main image for the thumbnail  
					?>
						<div class="feature-item-image">
							<?php echo wp_get_attachment_image(get_field("cac_feature_static_image"), "", false, ['alt' => $clean_title]); ?>
						</div>
					<?php endif; ?>
					<p class="date">
						<?php
						$casual_date = get_field('cac_feature_date_casual');
						$real_date = get_field('cac_feature_date');

						echo  $casual_date ? $casual_date : date('F Y', $real_date); ?>
					</p>

					<a class="expand-clickable-area" href="<?php echo $link; ?>" target="<?php echo $link_target;?>"></a>
				</div>



		<?php endwhile;
		else :
			// 404.
			echo "No posts found.";
		endif; ?>
		</div>
	</div>

	<?php wp_reset_postdata(); // End of the loop.

	get_footer();
