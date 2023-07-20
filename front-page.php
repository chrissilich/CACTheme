<?php
get_header();
the_post();
?>

<!-- template: front-page.php -->

<script>
	const cac_home_collection_slide_rate = <?php echo get_field('cac_home_collection_slide_rate', 'option'); ?>;
	const cac_home_time_between_slides = <?php echo get_field('cac_home_time_between_slides', 'option'); ?>;
	<?php

	$normal_slides = get_field('cac_home_regular_slides', 'option');
	$normal_slides_array = [];
	foreach ($normal_slides as $slide) {
		$opacity_of_box_behind_logo = $slide['cac_home_regular_slides_opacity_of_box_behind_logo'];
		$acf_response = $slide['cac_home_regular_slides_image_focal_point'];
		if ($acf_response && array_key_exists('id', $acf_response )){
			$img = wp_get_attachment($acf_response['id']);
			$normal_slides_array[] = [
				'url' => $img['src'],
				'alt' => $img['alt'],
				'x' => $acf_response['left'],
				'y' => $acf_response['top'],
				'opacity_of_box_behind_logo' => $opacity_of_box_behind_logo
			];
		}
	}

	$collection_slides = get_field('cac_home_collection_slides', 'option');
	$collection_slides_array = [];
	foreach ($collection_slides as $slide) {
		$associated_collection = $slide['cac_home_collection_slides_associated_collection'];
		$slug = get_post_field( 'post_name', $associated_collection );
		$imgA_acf_response = $slide['cac_home_collection_slides_image_a_focal_point'];
		$imgB_acf_response = $slide['cac_home_collection_slides_image_b_focal_point'];
		$imgC_acf_response = $slide['cac_home_collection_slides_image_c_focal_point'];
		$imgA = wp_get_attachment($imgA_acf_response['id']);
		$imgB = wp_get_attachment($imgB_acf_response['id']);
		$imgC = wp_get_attachment($imgC_acf_response['id']);
		$collection_slides_array[] = [
			'collection' => $slug,
			'a' => [
				'url' => $imgA['src'],
				'alt' => $imgA['alt'],
				'x' => $imgA_acf_response['left'],
				'y' => $imgA_acf_response['top'],
			],
			'b' => [
				'url' => $imgB['src'],
				'alt' => $imgB['alt'],
				'x' => $imgB_acf_response['left'],
				'y' => $imgB_acf_response['top'],
			],
			'c' => [
				'url' => $imgC['src'],
				'alt' => $imgC['alt'],
				'x' => $imgC_acf_response['left'],
				'y' => $imgC_acf_response['top'],
			]
		];
	}
	?>
	const cac_home_regular_slides = <?php echo json_encode($normal_slides_array); ?>;
	const cac_home_collection_slides = <?php echo json_encode($collection_slides_array); ?>;
</script>

<div id="app"></div>

<?php
get_footer();
