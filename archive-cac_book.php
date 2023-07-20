<?php

get_header(); ?>

<!-- archive-cac_book.php -->

<div class="container">
	<h2>Books</h2>

	<?php if (have_posts()) :
		while (have_posts()) : the_post();
			$order_url = get_field('cac_book_order_url');
			$order_text = get_field('cac_book_order_text') ? get_field('cac_book_order_text') : 'Order Here'; ?>

			<div class="row book mt-4 mb-8">
				<h3 class="col-12 book-title"><?php the_title(); ?></h3>
				<p class="col-12 book-order text-center mt-2 mb-3">
					<?php if ($order_url):?>
						<a class="btn" href="<?php echo $order_url; ?>" target="_blank">
							<?php echo $order_text;?>
						</a>
					<?php endif;?>
				</p>

				<?php if (get_field('cac_book_featured') == true) : ?>


					<div class="col-12 col-md-6 ">
						<?php echo wp_get_attachment_image(get_field('cac_book_cover_3d'), 'large', false, []); ?>
					</div>
					<div class="col-12 col-md-6 d-flex flex-column justify-content-center book-content">
						<?php the_field('cac_book_content'); ?>
					</div>
					<div class="col-12 col-md-6 mt-3">
						<div class="cac-slideshow" data-cac-slideshow-match-ratio>
							<?php foreach (get_field('cac_book_slideshow_a') as $image) : ?>
								<?php echo wp_get_attachment_image($image, 'medium', false, []); ?>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="col-12 col-md-6 mt-3">
						<div class="cac-slideshow" data-cac-slideshow-match-ratio>
							<?php foreach (get_field('cac_book_slideshow_b') as $image) : ?>
								<?php echo wp_get_attachment_image($image, 'medium', false, []); ?>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="col-12 col-md-6 mt-3">
						<div class="cac-slideshow" data-cac-slideshow-match-ratio>
							<?php foreach (get_field('cac_book_slideshow_c') as $image) : ?>
								<?php echo wp_get_attachment_image($image, 'medium', false, []); ?>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="col-12 col-md-6 mt-3">
						<div class="cac-slideshow" data-cac-slideshow-match-ratio>
							<?php foreach (get_field('cac_book_slideshow_d') as $image) : ?>
								<?php echo wp_get_attachment_image($image, 'medium', false, []); ?>
							<?php endforeach; ?>
						</div>
					</div>


				<?php else : ?>


					<div class="col-12 col-md-8 d-flex order-5 order-md-4 book-quote flex-column justify-content-center">
						<p class="book-quote-quote">
							<span class="decorative-quote decorative-quote--open"><span>&ldquo;</span></span>
							<?php the_field('cac_book_quote'); ?>
							<span class="decorative-quote decorative-quote--close"><span>&rdquo;</span></span>
						</p>
						<p class="book-quote-person-name mb-0">
							<?php the_field('cac_book_quote_person'); ?>
						</p>
						<p class="book-quote-person-title">
							<?php the_field('cac_book_quote_person_title'); ?>
						</p>
					</div>
					<div class="col-12 col-md-4 order-4 order-md-5 mb-3">
						<?php echo wp_get_attachment_image(get_field('cac_book_cover_flat'), 'large', false, []); ?>
					</div>

				<?php endif; ?>
			</div>

	<?php endwhile;
	endif; ?>

</div>


<?php get_footer();
