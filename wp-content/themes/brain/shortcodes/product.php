<?php

if (!function_exists('product_shortcode')) {
	function product_shortcode($atts)
	{

		$atts = shortcode_atts(
			['ids' => ''],
			$atts
		);

		$ids = explode(',', $atts['ids']);

		if (count($ids)) {
			$products = [];

			foreach ($ids as $id) {
				$post = get_post((int)$id);

				if (!is_null($post)) {
					array_push($products, "<p>{$post->post_title}</p>");
				}
			}
		}

		return implode("\n", $products);
	}

	add_shortcode('product', 'product_shortcode');
}