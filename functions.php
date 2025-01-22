<?php

add_action('wp_enqueue_scripts', 'main_scripts');

function main_scripts() {
    wp_enqueue_style('main', get_template_directory_uri() . '/dist/bundle.css');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Manrope:wght@400;500&display=swap');

    wp_enqueue_script('index', get_template_directory_uri() . '/dist/bundle.js', array(), '1.0', ['strategy' => 'defer']);
    wp_localize_script( 'index', 'customData', [
        'themePath' => get_template_directory_uri(),
    ]);?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <?php
}

add_theme_support('title-tag');