<?php

// Register Custom Post Type
function team_post_type()
{

	$labels = [
		'name' => _x('Команды', 'Post Type General Name', 'brain'),
		'singular_name' => _x('Команада', 'Post Type Singular Name', 'brain'),
		'menu_name' => __('Команда', 'brain'),
		'name_admin_bar' => __('Команда', 'brain'),
	];
	$args = [
		'label' => __('Команада', 'brain'),
		'labels' => $labels,
		'supports' => ['title', 'thumbnail'],
		'taxonomies' => ['members'],
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'page',
		'menu_icon' => 'dashicons-id-alt',
	];
	register_post_type('team', $args);

}

add_action('init', 'team_post_type', 0);

// Register Custom Taxonomy
function members()
{
	$labels = [
		'name' => 'Типы пользователей'
	];

	$args = [
		'labels' => $labels,
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => false,
	];
	register_taxonomy('members', ['team'], $args);
}

add_action('init', 'members', 0);