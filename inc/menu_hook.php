<?php
add_filter('wp_nav_menu_objects', 'cac_wp_nav_menu_objects', 10, 2);

function cac_wp_nav_menu_objects($items, $args)
{

	// loop
	foreach ($items as &$item) {

		// vars
		$icon = get_field('social_menu_icon', $item);

		// append icon
		if ($icon) {
			$icon = wp_get_attachment($icon);

			$item->title = '<img class="menu-item-icon" src="' . $icon['src'] . '" alt="' . $icon['alt'] . '">';
		}
	}


	// return
	return $items;
}
