<?php

get_header(); ?>

<!-- archive-cac_interior.php -->

<div class="container">
	<h2>Interiors</h2>


	<div class="row">
		<?php if (have_posts()) :
			while (have_posts()) : the_post(); ?>

				<div class="col-12 col-md-4 mb-3 interior">
					<a href="<?php the_permalink(); ?>">
						<?php echo wp_get_attachment_image(get_field('cac_interiors_key_image'), 'medium', false, []) ?>
						<h3>
							<?php the_title(); ?>
						</h3>
					</a>
				</div>

		<?php endwhile;
		endif; ?>
	</div>

</div>


<?php get_footer();
