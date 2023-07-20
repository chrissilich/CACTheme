<?php



/**
 * Test if a page is a blog page.
 * if ( is_blog() ) { ... }
 *
 * @since v1.0
 *
 * @return bool
 */
function is_blog()
{
	global $post;
	$posttype = get_post_type($post);

	return ((is_archive() || is_author() || is_category() || is_home() || is_single() || (is_tag() && ('post' === $posttype))) ? true : false);
}



//get attachment meta
if (!function_exists('wp_get_attachment')) {
	function wp_get_attachment($attachment_id)
	{
		$attachment = get_post($attachment_id);
		return array(
			'alt' => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true),
			'caption' => $attachment->post_excerpt,
			'description' => $attachment->post_content,
			'href' => get_permalink($attachment->ID),
			'src' => $attachment->guid,
			'title' => $attachment->post_title
		);
	}
}


function removeParagraphTags($content)
{
	$content = str_replace('<p>', '', $content);
	$content = str_replace('</p>', '', $content);
	return $content;
}
