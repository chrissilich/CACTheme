<?php


/**
 * Loading All CSS Stylesheets and Javascript Files.
 *
 * @since v1.0
 *
 * @return void
 */
function cac_scripts_loader()
{
	$theme_version = wp_get_theme()->get('Version') . '.2023-07-20';

	// 1. Styles.
	wp_enqueue_style('style', get_theme_file_uri('style.css'), array(), $theme_version, 'all');
	wp_enqueue_style('sitewide-style', get_theme_file_uri('dist/style.css'), array(), $theme_version, 'all');

	if (is_rtl()) {
		wp_enqueue_style('rtl', get_theme_file_uri('dist/rtl.css'), array(), $theme_version, 'all');
	}

	// 2. Scripts.
	wp_enqueue_script('sitewide-js', get_theme_file_uri('dist/js/index.js'), array(), $theme_version, true);
	// wp_enqueue_script('fonts', '//fast.fonts.net/jsapi/ce10106b-ed5d-466c-b84e-c29c83c227c4.js', array(), $theme_version, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'cac_scripts_loader');


function cac_add_type_attribute($tag, $handle, $src)
{
	// if not your script, do nothing and return original $tag
	if ('sitewide-js' !== $handle) {
		return $tag;
	}
	// change the script tag by adding type="module" and return it.
	$tag = '<script type="module" src="' . esc_url($src) . '"></script>';
	return $tag;
}
add_filter('script_loader_tag', 'cac_add_type_attribute', 10, 3);
