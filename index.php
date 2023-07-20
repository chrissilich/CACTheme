<?php

/**
 * Template Name: Index
 * Description: The fallback template for everything else.
 *
 */

get_header();
?>

<!-- index.php -->
<div class="container">
	<div class="row">

		<h2><?php the_title(); ?></h2>

		<div class="col-md-12">
			<?php the_content(); ?>
		</div><!-- /.col -->
	<div><!-- /.row -->
<div><!-- /.container -->

<?php get_footer();
