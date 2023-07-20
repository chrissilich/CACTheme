<?php
/**
 * Template Name: Not found
 * Description: Page template 404 Not found.
 *
 */

get_header();

$search_enabled = get_theme_mod('search_enabled', '1'); // Get custom meta-value.
?>


<!-- template: 404.php -->


<div class="container">
	<h2 class="mb-3">404 Not Found</h2>

	<div class="row">
		<div class="col">
			<p><?php esc_html_e('It looks like nothing was found at this location.', 'cac'); ?></p>
			<div>
				<?php
				if ('1' === $search_enabled) :
					get_search_form();
				endif;
				?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
?>

