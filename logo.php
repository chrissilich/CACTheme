<?php
function logo($variation = 'default', $collection_slug = null) {
?>
<div class="logo logo--<?php echo $variation;?>">
	<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
		<span class="visually-hidden"><?php bloginfo('name'); ?></span>
		<img class="logo-main" src="<?php echo get_theme_file_uri('img/cac-logo.svg'); ?>"  width="300" height="54" alt="CAC Logo" />
	</a>

	<?php if ($variation === "home" || $variation === 'collection'):?>
		<img class="logo-divider" src="<?php echo get_theme_file_uri('img/cac-logo-divider.svg'); ?>" alt="" />

		<?php
			// loop through all the Collections and get their logos
			// WP_Query arguments
			$args = array(
				'post_type'              => array( 'cac_collection' ),
				'post_status'            => array( 'publish' ),
			);

			// The Query
			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					// get slug of collection
					$slug = get_post_field( 'post_name', get_the_ID() );
					$collection_logo = get_field('cac_collection_logo');
					if ($collection_logo && !$collection_slug || $collection_slug == $slug) : ?>
							<?php echo wp_get_attachment_image($collection_logo, 'large', false, ['class' => 'collection-logo collection-logo--'.$slug]); ?>
					<?php endif;
				}
			} else {
				// no posts found
			}

			// Restore original Post Data
			wp_reset_postdata();
		?>
	<?php endif; // variation home ?>

</div>

<?php
}
