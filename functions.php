<?php

/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define('CHILD_THEME_ASTRA_CHILD_VERSION', '1.0.0');

/**
 * Enqueue styles
 */
function child_enqueue_styles()
{
	wp_enqueue_style('astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all');
	wp_enqueue_style('base-css', get_stylesheet_directory_uri() . '/css/base.min.css', array(), false, true);
	wp_enqueue_style('header-css', get_stylesheet_directory_uri() . '/css/header-style.min.css', array(), '1.0.3', 'all');

	wp_enqueue_script('jquery_script', get_stylesheet_directory_uri() . '/js/jquery-3.4.1.min.js', array(), false, true);
	wp_enqueue_script('site_script', get_stylesheet_directory_uri() . '/js/scripts.min.js', array(), false, true);

	/* Tailwind CSS v4 ---------------------- */
	wp_enqueue_style(
		'astra-child-tailwind',
		get_stylesheet_directory_uri() . '/css/tailwind.css',              // ビルド後のファイル
		array('astra-child-theme-css', 'header-css'),
		filemtime(get_stylesheet_directory() . '/css/tailwind.css')      // 更新日時でキャッシュバスト
	);
}
add_action('wp_enqueue_scripts', 'child_enqueue_styles', 15);
