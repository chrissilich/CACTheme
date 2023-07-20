<?php

/**
 * The Template for displaying Search Results pages.
 */

get_header();

if (have_posts()) : ?>

	<!-- search.php -->

	<div class="container">
		<div class="row">

			<h2>Search results for: <?php the_title(); ?></h2>

			<div class="col-md-12">

				<?php
				while (have_posts()) : the_post();?>
					<article>
						<h3 class="h5 text-start">
							<?php the_title(); ?>
						</h3>
						<?php if (has_excerpt()) {
							the_excerpt();
						} else {
							echo '<p>No excerpt available</p>';
						} ?>
						<a href="<?php the_permalink(); ?>">Read More &rarr;</a>
					</article>

					<hr />

				<?php endwhile;
				?>

			</div><!-- /.col -->
		<div><!-- /.row -->

		<div class="row my-4">
			<div class="col">
				<?php get_search_form(); ?>
			<div><!-- /.col -->
		<div><!-- /.row -->
	<div><!-- /.container -->


<?php endif;
wp_reset_postdata();

get_footer();
