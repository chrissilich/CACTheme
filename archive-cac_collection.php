<?php


get_header(); ?>

<!-- archive-cac_collection.php -->

<div class="container">
	<h2>Collections</h2>

	<?php if (have_posts()) :
		while (have_posts()) : the_post();
			$slug = get_post_field( 'post_name', get_the_ID() ); ?>

			<div class="row collection">
				<div class="col-12 col-md-6 collection-content">

					<div class="collection-logo">
						<?php include_once( 'logo.php'); logo('collection', $slug); ?>
					</div>

					<div class="collection-content-wysiwyg">
						<?php echo strip_tags(get_field('cac_collection_blurb'), '<strong>'); ?>
					</div>

					<p class="collection-cta">
						<a href="<?php echo get_field('cac_collection_url'); ?>" target="_blank" class="btn">View Here</a>

					</p>
				</div>
				<div class="col-12 col-md-6 collection-slideshow cac-slideshow" data-cac-slideshow-match-ratio>
					<?php foreach (get_field('cac_collection_slideshow') as $image) : ?>
						<?php echo wp_get_attachment_image($image, 'large', false, []); ?>
					<?php endforeach; ?>
				</div>
			</div>


	<?php endwhile;
	endif; ?>

</div>


<?php get_footer();
