<div class="feature-nav mb-2 mb-md-5">
	<h2 class="mb-1">FEATURES</h2>

	<div class="category-list mt-3 mt-md-0">
	<?php



	// get the first taxonomy term of the current post or get the term for the current taxonomy page we're on.
	$current_id = -1;
	if (is_single()) {
		$current_id = get_the_terms($post->ID, 'cac_feature_type')[0]->term_id;
	} else if (is_tax()) {
		$current_id = get_queried_object()->term_id;
	}

	// loop hrough terms and display links to term archives
	$terms = get_terms(array(
		'taxonomy' => 'cac_feature_type',
		'hide_empty' => true,
	));
	// get current term
	$current_term = get_queried_object();
	// loop through terms and display links to term archives
	foreach ($terms as $key => $term) {

		echo '<a href="' . esc_url(get_term_link($term)) . '" class="' . (($current_id == $term->term_id) ? 'active' : '') . '" >' . $term->name . '</a>';
		echo '<span class="pipe pipe-'.$key.'">|</span>';
	}
	?>
	</div>
</div>