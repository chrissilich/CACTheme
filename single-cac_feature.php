<?php

get_header();


// wp loop
if (have_posts()) :
	the_post();

	include_once('nav-features.php');

	$clean_title = get_field('cac_feature_clean_title');
	if (empty(get_field('cac_feature_clean_title'))) {
		$clean_title = get_the_title();
	}

	$casual_date = get_field('cac_feature_date_casual');
	$real_date = get_field('cac_feature_date');
	$date =   $casual_date ? $casual_date : date('F Y', $real_date);
?>

	<!-- single-cac_feature.php -->

	<div class="container">
		<div class="row">
			<div class="col-6 col-md-4 order-md-1 next-prev-buttons">
				<?php next_post_link('<span class="arrow">&laquo;</span> %link', 'PREV', true, '', 'cac_feature_type'); ?>
			</div>
			<div class="col-6 col-md-4 order-md-3 text-end  next-prev-buttons">
				<?php previous_post_link('%link <span class="arrow">&raquo;</span>', 'NEXT', true, '', 'cac_feature_type'); ?>
			</div>
			<div class="col-12 col-md-4 order-md-2 text-center">
				<h1 class="visually-hidden"><?php $clean_title; ?> - <?php echo $date ?></h1>
				<p class="date"><?php echo $date; ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-4 offset-md-4">
				<div class="feature-logo">
					<?php echo wp_get_attachment_image(get_field("cac_feature_logo"), "", false, ['style' => 'width: ' . get_field('cac_feature_logo_scale') . '%;']); ?>
				</div>
			</div>
			<div class="col-12 col-md-6 offset-md-3">
				<?php
				//echo wp_get_attachment_image(get_field("cac_feature_logo"), "medium", false); 
				?>
			</div>

			<div class="col-12">
				<?php
				if (get_field('cac_feature_url')):
					$link = get_field('cac_feature_url');
					$link_target = '_blank';
					?>
					
					<p class="text-center">
						Click here to view 
						<a href="<?php echo $link;?>" target="<?php echo $link_target;?>">
							<?php echo $clean_title; ?>
						</a>
					</p>
					


				<?php else: 

					$spreads = get_field('cac_feature_spreads');
					foreach ($spreads as $spread):
						$imageData = wp_get_attachment_metadata($spread);
						$ratio = $imageData['width'] / $imageData['height']; ?>
						<div class="feature-spread">
							<?php echo wp_get_attachment_image($spread, "large", false, ['class' => 'feature-spread-image feature-spread-image--' . ($ratio < 1 ? 'portrait' : 'landscape')]); ?>
						</div>
					<?php endforeach;

				endif; ?>

			</div>
		</div>

		<div class="row feature-bottom-nav my-3">
			<div class="col-12 col-md-4 order-md-2 text-center feature-share-print">
				<?php include('inc/share-print.php'); ?>
			</div>

			<div class="col-6 col-md-4 order-md-1 next-prev-buttons">
				<?php next_post_link('<span class="arrow">&laquo;</span> %link', 'PREV', true, '', 'cac_feature_type'); ?>
			</div>
			
			<div class="col-6 col-md-4 order-md-3 text-end  next-prev-buttons">
				<?php previous_post_link('%link <span class="arrow">&raquo;</span>', 'NEXT', true, '', 'cac_feature_type'); ?>
			</div>		
		</div>

	</div>

<?php
else :

endif;
get_footer();
