<?php

// Add Shortcode
function button_shortcode($atts, $content = null)
{

	// Attributes
	$atts = shortcode_atts(
		[
			'id' => '',
			'class' => 'btn btn-primary',
			'link' => '',
			'blank' => null
		],
		$atts
	);


	return '<a class="' . $atts['class']
		   . '" href="' . $atts['link'] . '"'
		   . (!is_null($atts['blank']) ? ' target="_blank"' : '') .'>'
		   . $content
		   . '</a>';

}

add_shortcode('button', 'button_shortcode');