<?php

get_header(); ?>

<!-- archive-cac_interior.php -->

<div class="container-fluid container-md gx-0 gx-md-3"><!--  px-2 px-md-5 -->
	<h2>
		<a href="<?php echo get_post_type_archive_link('cac_interior');?>">Interiors</a>
	</h2>


	<h3>
		<?php the_title(); ?>
	</h3>


	<div class="row interior-intro interior-subnav ">
		<div class="col-6 col-md-3 order-1 order-md-1 interior-intro-nav  d-flex align-items-center justify-content-start px-4 pb-1 px-md-0 py-md-2">
			<?php next_post_link('%link', '<span class="arrow">&laquo;</span> PREV'); ?>
		</div>
		<div class="col-12 col-md-6  order-3 order-md-2 interior-intro-key-image">
			<?php echo wp_get_attachment_image(get_field('cac_interiors_key_image'), 'medium', false, []) ?>
		</div>
		<div class="col-6 col-md-3  order-2 order-md-3 interior-intro-nav d-flex align-items-center justify-content-end px-4 pb-1 px-md-0 py-md-2">
			<?php previous_post_link('%link', 'NEXT <span class="arrow">&raquo;</span>'); ?>
		</div>
	</div>



	<?php
	function parse_layout_to_class($layout)
	{
		$out = $layout;
		$out = str_replace('cac_interiors_content_', 'interior-content interior-content--', $out);
		return $out;
	}
	function br_to_p($input)
	{
		$out = $input;
		$out = str_replace('<br>', '</p><p>', $out);
		$out = str_replace('<br />', '</p><p>', $out);
		return $out;
	}
	function strip_br_p($input)
	{
		$out = $input;
		$out = str_replace('<br>', '', $out);
		$out = str_replace('<br />', '', $out);
		$out = str_replace('<p>', '', $out);
		$out = str_replace('</p>', '', $out);
		return $out;
	}

	if (have_rows('cac_interiors_content')) :
		while (have_rows('cac_interiors_content')) : the_row();
			$layout = get_row_layout(); ?>

			<div class="row mt-1 mt-md-3 gx-1 gx-md-3 <?php echo parse_layout_to_class($layout); ?>">

				<?php if ($layout == 'cac_interiors_content_images_single') { ?>
					<div class="col-12">
						<?php echo wp_get_attachment_image(get_sub_field('cac_interiors_content_image'), 'large', false, ['style' => 'width: ' . get_sub_field('cac_interiors_content_image_width') . '%']); ?>
					</div>
				<?php

				} elseif ($layout == 'cac_interiors_content_images_double') { ?>
					<div class="col-6">
						<?php echo wp_get_attachment_image(get_sub_field('cac_interiors_content_image_a'), 'large'); ?>
					</div>
					<div class="col-6">
						<?php echo wp_get_attachment_image(get_sub_field('cac_interiors_content_image_b'), 'large'); ?>
					</div>

				<?php } elseif ($layout == 'cac_interiors_content_image_text') { ?>
					<div class="col-12 col-md-6 <?php echo get_sub_field('cac_interiors_content_swap_columns') ? 'order-md-2' : '' ?>"">
						<?php echo wp_get_attachment_image(get_sub_field('cac_interiors_content_image'), 'large'); ?>
					</div>
					<div class=" col-12 col-md-6 interior-content-text gx-2<?php echo get_sub_field('cac_interiors_content_swap_columns') ? 'order-md-1 text-end' : '' ?>">
						<?php echo get_sub_field('cac_interiors_content_text'); ?>
					</div>
				<?php
				} elseif ($layout == 'cac_interiors_content_fancy_text') {
				?>
					<div class="col-12 interior-content-text interior-content-fancy-text interior-content-fancy-text--<?php echo get_sub_field('cac_interiors_content_text_layout'); ?>">
						<div class="d-none d-lg-block"><!-- desktop -->
							<?php echo br_to_p(get_sub_field('cac_interiors_content_fancy_text')); ?>
						</div>
						<div class="d-block d-lg-none"><!-- mobile -->
							<p>
								<?php echo strip_br_p(get_sub_field('cac_interiors_content_fancy_text')); ?>
							</p>
						</div>
					</div>
				<?php
				} ?>
			</div>

	<?php endwhile;
	endif;
	?>


	<div class="row interior-subnav interior-bottom-nav my-3">
		<div class="col-6 col-md-3  order-1 order-md-1 interior-intro-nav px-4 p-md-0">
			<?php next_post_link('<span class="arrow">&laquo;</span> %link', 'PREV'); ?>
		</div>
		<div class="col-12 col-md-6  order-3 order-md-2 text-center  interior-share-print">
			<?php include('inc/share-print.php'); ?>
		</div>
		<div class="col-6 col-md-3  order-2 order-md-3 interior-intro-nav text-end px-4 p-md-0">
			<?php previous_post_link('%link <span class="arrow">&raquo;</span>', 'NEXT'); ?>
		</div>
	</div>

	<div class="row interior-credits my-3">
		<?php foreach (get_field('cac_interiors_credits') as $credit) : ?>
			<div class="col-12 interior-credit text-center">
				<em><?php echo $credit['cac_interiors_credits_title']; ?>: </em>
				<?php if ($credit['cac_interiors_credits_url']) : ?>
					<a href="<?php echo $credit['cac_interiors_credits_url']; ?>" target="_blank">
						<?php echo $credit['cac_interiors_credits_name']; ?>
					</a>
				<?php else : ?>
					<?php echo $credit['cac_interiors_credits_name']; ?>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	</div>

	<hr class="hr--small" />

	<div class="row interior-direct-project-links my-3 px-3">
		<div class="col">
			<p class="text-center">
				<?php
				// get all interiors and loop through them
				$all_interiors = get_posts([
					'post_type' => 'cac_interior',
					'posts_per_page' => -1,
					'orderby' => 'title',
					'order' => 'ASC'
				]);
				foreach ($all_interiors as $interior) : ?>
					<a href="<?php echo get_permalink($interior->ID); ?>" class="<?php echo get_the_id() == $interior->ID ? 'active' : ''; ?>">
						<?php echo $interior->post_title; ?>
					</a>
					<span class="pipe">|</span>
				<?php endforeach; ?>
			</p>
		</div>
	</div>


</div>


<?php get_footer();
