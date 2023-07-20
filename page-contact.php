<?php
get_header();
the_post();
?>

<!-- template: page-contact.php -->



<div class="container">
	<h2>Contact</h2>

	<div class="row">
		<div class="col-12 col-md-6 order-2 order-md-1 contact-content ">
			<?php the_content(); ?>
		</div>
		<div class="col-12 col-md-6  order-1 order-md-2 mb-3 contact-slideshow cac-slideshow">
			<?php foreach (get_field('cac_contact_slideshow') as $image) : ?>
				<?php echo wp_get_attachment_image($image, 'large', false, []); ?>
			<?php endforeach; ?>
		</div>
	</div>


</div>




<?php get_footer();
