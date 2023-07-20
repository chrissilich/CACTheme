<?php
// get the type of the current post
$post_type = get_post_type();
$print_url = false;

// echo $post_type;
if ($post_type === 'cac_interior') {
	$print_url = get_field('cac_interior_pdf');
	$subject = "Take a look at the " . get_the_title(). " interior on the Codename CAC website!";
	$body = "Here's the link to '" . get_the_title() . "' at Codename CAC%0D%0A%0D%0A" . get_permalink();

} else if ($post_type === 'cac_feature') {
	$print_url = get_field('cac_feature_pdf');
	$casual_date = get_field('cac_feature_date_casual');
	$real_date = get_field('cac_feature_date');
	$date =   $casual_date ? $casual_date : date('F Y', $real_date);

	$subject = "Take a look at the '" . get_the_title(). ", " . $date . "'  article on the Codename CAC website!";
	$body = "Here's the link to the '" . get_the_title() . ", " . $date . "' article at Codename CAC%0D%0A%0D%0A" . get_permalink();
}
else {
	$subject = "Take a look at this link from Codename CAC!";
	$body = "Here's the link on the Codename CAC website -- " . get_permalink();
}
?>


<a href="mailto:?subject=<?php echo $subject;?>&body=<?php echo $body;?>" target="_blank" class=share-button>
	SHARE
</a>
|
<a href="<?php echo $print_url?$print_url:'#'?>" target="<?php echo $print_url?'_blank':''?>" class="print-button">
	<?php echo $print_url?'PDF':'PRINT'?>
</a>
