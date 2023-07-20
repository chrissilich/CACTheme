<?php
get_header();
the_post();
?>

<!-- template: page-about.php -->


<div class="container">
	<h2 class="mb-3">About</h2>
	<?php
	if (have_rows('cac_about_blocks')) : $i = 0;
		while (have_rows('cac_about_blocks')) : the_row();
			if (get_row_layout() == 'cac_about_block_gallery_text') : ?>
				<div class="row block-gallery-text">
					<div class="col-12 col-md-6 <?php echo $i % 2 ? 'offset-md-6' : 'text-md-end'; ?>">
						<h3><?php echo removeParagraphTags(get_sub_field('cac_about_block_title')); ?></h3>
					</div>
					<div><!-- clear the row --></div>
					<div class="col-12 col-md-6 <?php echo $i % 2 ? 'order-2' : ''; ?>">
						<div class="cac-slideshow" data-cac-slideshow-match-ratio>
							<?php foreach (get_sub_field('cac_about_block_gallery') as $image_id) :
								echo wp_get_attachment_image($image_id, 'medium', false, []);
							endforeach; ?>
						</div>
						<?php echo wp_get_attachment_image(get_sub_field('cac_about_block_logos'), 'medium', false, ['class' => 'logos']);  ?>
					</div>
					<div class="col-12 col-md-6 my-2 my-md-0">
						<?php echo get_sub_field('cac_about_block_text'); ?>
					</div>
				</div>
			<?php else :
				echo 'no layout found';
			endif;
			$i++; ?>
			<hr />
	<?php endwhile;
	endif; ?>

	<?php if (get_field('cac_about_show_qa')):?>
		<h2 class="qa-title mt-3 mb-1"><em>The</em> Q&A <em>with</em> MARA & JESSE</h2>

		<?php $qa_intro_images = get_field('cac_about_qa_images'); ?>
		<div class="row p-0 g-0 m-0 qa-intro">
			<div class="col-6 order-0 order-md-1 col-md-4 qa-intro-space-q">
				<img alt="Q" src="<?php echo get_theme_file_uri('img/cac-about-q-white.svg'); ?>">
			</div>
			<div class="col-6 order-1 order-md-2 col-md-4 p-0 qa-intro-space-img">
				<?php echo wp_get_attachment_image($qa_intro_images[0], 'medium', false, []); ?>
			</div>
			<div class="col-6 order-4 order-md-3 col-md-4 qa-intro-space-a">
				<img alt="A" src="<?php echo get_theme_file_uri('img/cac-about-a-white.svg'); ?>">
			</div>
			<div class="col-6 order-2 order-md-4 col-md-4 p-0 qa-intro-space-img">
				<?php echo wp_get_attachment_image($qa_intro_images[1], 'medium', false, []); ?>
			</div>
			<div class="col-6 order-3 order-md-5 col-md-4 qa-intro-space-and">
				<img alt="and" src="<?php echo get_theme_file_uri('img/cac-about-and.svg'); ?>">
			</div>
			<div class="col-6 order-5 order-md-6 col-md-4 p-0 qa-intro-space-img">
				<?php echo wp_get_attachment_image($qa_intro_images[2], 'medium', false, []); ?>
			</div>
		</div>


		<div class="row qa-items mt-3">
			<?php if (have_rows('cac_about_qa')) : $i = 0;
				while (have_rows('cac_about_qa')) : the_row(); ?>

					<div class="col-12 col-md-9 offset-md-2 mt-2 mt-md-6 qa-item-question">
						<span class="letter">Q</span>
						<p>
							<?php echo get_sub_field('cac_about_qa_question'); ?>
						</p>
					</div>
					<div class="col-12 col-md-6 offset-md-4 mt-0 mt-md-4 mb-2 mb-md-5 qa-item-answer">
						<span class="letter">A</span>
						<?php echo get_sub_field('cac_about_qa_answer'); ?>

					</div>
			<?php endwhile;
			endif; ?>
		</div>

	<?php endif; // if (get_field('cac_about_show_qa')) ?>

</div>




<?php get_footer();
