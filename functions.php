<?php

// Main scripts and styles
add_action('wp_enqueue_scripts', 'main_scripts');

function main_scripts() {
    wp_enqueue_style('main', get_template_directory_uri() . '/dist/bundle.css');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Manrope:wght@400;500&display=swap');

    wp_enqueue_script('index', get_template_directory_uri() . '/dist/bundle.js', array(), '1.0', ['strategy' => 'defer']);
    wp_localize_script( 'index', 'customData', [
        'themePath' => get_template_directory_uri(),
    ]);
}

add_action('wp_head', function() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
});

// Theme support
add_theme_support('title-tag');
add_theme_support('menus');

// Custom admin panel page - Theme Options
require_once get_template_directory() . '/inc/admin-options.php';

// Menus
add_action('after_setup_theme', function(){
	register_nav_menus([
		'header_menu' => 'Header Menu',
		'footer_main_1' => 'Footer Column 1',
        'footer_main_2' => 'Footer Column 2',
        'footer_secondary' => 'Footer Secondary'
	]);
});