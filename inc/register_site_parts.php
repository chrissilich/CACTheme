<?php

// We dont need to register post types or taxonomies here anymore,
// ACF can handle those now.

// but we do need to increase the number of posts per page for the archive pages
function increase_posts_per_page($query)
{
	if (!is_admin() && $query->is_main_query()) {
		if (is_post_type_archive('cac_interior') || is_post_type_archive('cac_feature') || is_post_type_archive('cac_book') || is_post_type_archive('cac_collection')) {
			$query->set('posts_per_page', '1000');
		}
	}
}
add_action('pre_get_posts', 'increase_posts_per_page');

add_action('acf/init', 'cac_acf_op_init');
function cac_acf_op_init()
{

	acf_add_options_page(array(
		'page_title'  => __('Home Options'),
		'menu_title'  => __('Home Options'),
		'redirect'    => true,
		'position'	  => '4.1',
		'icon_url'	  => 'dashicons-admin-home',
	));

	acf_add_options_page(array(
		'page_title'  => __('Social Options'),
		'menu_title'  => __('Social Options'),
		'redirect'    => true,
		'position'	  => '4.9',
		'icon_url'	  => 'dashicons-share',
	));

	// acf_add_options_page(array(
	// 	'page_title'  => __('Navigation Options'),
	// 	'menu_title'  => __('Navigation Options'),
	// 	'redirect'    => true,
	// 	'position'	  => 4.2,
	// 	'icon_url'	  => 'dashicons-menu',
	// ));

	// Check function exists.
	if (function_exists('acf_add_options_sub_page')) {

		// Add parent.
		// $parent = acf_add_options_page(array(
		// 	'page_title'  => __('Home Page'),
		// 	'menu_title'  => __('Home Page'),
		// 	'redirect'    => true,
		// 	'position'	  => 4.0,
		// 	'icon_url'	  => 'dashicons-admin-home',
		// ));

		// Add sub page.
		// acf_add_options_sub_page(array(
		// 	'page_title'  => __('Quotes'),
		// 	'menu_title'  => __('Quotes'),
		// 	'parent_slug' => $parent['menu_slug'],
		// ));
	}
}







if (function_exists('register_nav_menus')) {
	/**
	 * Nav menus.
	 *
	 * @since v1.0
	 *
	 * @return void
	 */
	register_nav_menus(
		array(
			'main-menu'   => 'Main Menu',
			// 'social-menu' => 'Social Menu',
		)
	);
}



if (!function_exists('cac_add_user_fields')) {
	/**
	 * Add new User fields to Userprofile:
	 * get_user_meta( $user->ID, 'facebook_profile', true );
	 *
	 * @since v1.0
	 *
	 * @param array $fields User fields.
	 *
	 * @return array
	 */
	function cac_add_user_fields($fields)
	{
		// Add new fields.
		$fields['facebook_profile'] = 'Facebook URL';
		$fields['twitter_profile']  = 'Twitter URL';
		$fields['linkedin_profile'] = 'LinkedIn URL';
		$fields['xing_profile']     = 'Xing URL';
		$fields['github_profile']   = 'GitHub URL';

		return $fields;
	}
	// add_filter('user_contactmethods', 'cac_add_user_fields');
}

/**
 * Init Widget areas in Sidebar.
 *
 * @since v1.0
 *
 * @return void
 */
function cac_widgets_init()
{
	// Area 1.
	register_sidebar(
		array(
			'name'          => 'Primary Widget Area (Sidebar)',
			'id'            => 'primary_widget_area',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	// Area 2.
	register_sidebar(
		array(
			'name'          => 'Secondary Widget Area (Header Navigation)',
			'id'            => 'secondary_widget_area',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	// Area 3.
	register_sidebar(
		array(
			'name'          => 'Third Widget Area (Footer)',
			'id'            => 'third_widget_area',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
// add_action('widgets_init', 'cac_widgets_init');
