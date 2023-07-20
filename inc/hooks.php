<?php



// make it show more posts per page in features section
add_action('pre_get_posts', function ($query) {
	if (
		!is_admin()
		&& $query->is_main_query()
		&& $query->is_tax('cac_feature_type')
	) {
		$query->set('posts_per_page', '2000');
		// $query->set('orderby',        'rand');
	}
});



// add class to menu item when looking at a child item in that post type
function cac_menu_class_filter($classes, $item)
{
	global $post;
	if (strtolower($item->title) === "performance" && $post->post_type === 'xm-performance') {
		$classes[] = 'current-menu-item';
		$classes[] = 'current-menu-parent';
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'cac_menu_class_filter', 10, 2);




// TinyMCE inserts underline styling with the shorthand css rule text-decoration in an inline style, but that's hard to overrule with CSS.
// This function replaces the shorthand with just the specific rule, text-decoration-line so you can still use text-decoration-color and other
// related rules.
function cac_replace_underline_inline_style($text_content)
{
	if (!is_admin()) {
		$text = array(
			'text-decoration: underline;' => 'text-decoration-line: underline;',
		);

		$text_content = str_ireplace(array_keys($text), $text, $text_content);
	}

	return $text_content;
}
add_filter('the_content', 'cac_replace_underline_inline_style');




// Set the number of a custom post type posts per page
add_filter('pre_get_posts', 'cac_max_posts_per_page');
// @link http://www.billerickson.net/customize-the-wordpress-query/
function cac_max_posts_per_page($query)
{
	if ($query->is_main_query() && $query->is_post_type_archive('cac-news')) {
		$query->set('posts_per_page', 1000000);
	}
}




//Page Slug Body Class
function add_slug_body_class($classes)
{
	global $post;
	if (isset($post)) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}
add_filter('body_class', 'add_slug_body_class');





if (!function_exists('wp_body_open')) {
	/**
	 * Fire the wp_body_open action.
	 *
	 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
	 *
	 * @since v2.2
	 *
	 * @return void
	 */
	function wp_body_open()
	{
		do_action('wp_body_open');
	}
}

/**
 * Disable comments for Media (Image-Post, Jetpack-Carousel, etc.)
 *
 * @since v1.0
 *
 * @param bool $open    Comments open/closed.
 * @param int  $post_id Post ID.
 *
 * @return bool
 */
function cac_filter_media_comment_status($open, $post_id = null)
{
	$media_post = get_post($post_id);

	if ('attachment' === $media_post->post_type) {
		return false;
	}

	return $open;
}
add_filter('comments_open', 'cac_filter_media_comment_status', 10, 2);

/**
 * Style Edit buttons as badges: https://getbootstrap.com/docs/5.0/components/badge
 *
 * @since v1.0
 *
 * @param string $link Post Edit Link.
 *
 * @return string
 */
function cac_custom_edit_post_link($link)
{
	return str_replace('class="post-edit-link"', 'class="post-edit-link"', $link);
}
add_filter('edit_post_link', 'cac_custom_edit_post_link');

/**
 * Style Edit buttons as badges: https://getbootstrap.com/docs/5.0/components/badge
 *
 * @since v1.0
 *
 * @param string $link Comment Edit Link.
 */
function cac_custom_edit_comment_link($link)
{
	return str_replace('class="comment-edit-link"', 'class="comment-edit-link badge bg-secondary"', $link);
}
add_filter('edit_comment_link', 'cac_custom_edit_comment_link');

/**
 * Responsive oEmbed filter: https://getbootstrap.com/docs/5.0/helpers/ratio
 *
 * @since v1.0
 *
 * @param string $html Inner HTML.
 *
 * @return string
 */
function cac_oembed_filter($html)
{
	return '<div class="ratio ratio-16x9">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'cac_oembed_filter', 10);

if (!function_exists('cac_content_nav')) {
	/**
	 * Display a navigation to next/previous pages when applicable.
	 *
	 * @since v1.0
	 *
	 * @param string $nav_id Navigation ID.
	 */
	function cac_content_nav($nav_id)
	{
		global $wp_query;

		if ($wp_query->max_num_pages > 1) {
?>
			<div id="<?php echo esc_attr($nav_id); ?>" class="d-flex mb-4 justify-content-between">
				<div><?php next_posts_link('<span aria-hidden="true">&larr;</span> ' . esc_html__('Older posts', 'cac')); ?></div>
				<div><?php previous_posts_link(esc_html__('Newer posts', 'cac') . ' <span aria-hidden="true">&rarr;</span>'); ?></div>
			</div><!-- /.d-flex -->
<?php
		} else {
			echo '<div class="clearfix"></div>';
		}
	}

	/**
	 * Add Class.
	 *
	 * @since v1.0
	 *
	 * @return string
	 */
	function posts_link_attributes()
	{
		return 'class="btn btn-secondary btn-lg"';
	}
	add_filter('next_posts_link_attributes', 'posts_link_attributes');
	add_filter('previous_posts_link_attributes', 'posts_link_attributes');
}
