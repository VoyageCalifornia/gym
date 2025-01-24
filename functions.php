<?php

// Main scripts and styles
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

// Custom admin panel page - Theme Options
add_action('admin_menu', 'custom_theme_options');

function custom_theme_options() {
    add_menu_page(
        'Theme Options',
        'Theme Options',
        'manage_options',
        'theme-options',
        'custom_theme_options_page'
    );
}

function custom_theme_options_page() {
    ?>
    <div class="wrap">
        <h1>Theme Options</h1>
        <form method="POST" action="options.php">
            <?php
            settings_fields('custom_theme_options_group');
            do_settings_sections('theme-options');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

add_action('admin_init', 'theme_settings_init');

function theme_settings_init() {
    register_setting(
        'custom_theme_options_group',
        'phone_number'
    );

    add_settings_section(
        'footer_section',
        'Footer Settings',
        null,
        'theme-options'
    );

    add_settings_field(
        'footer_phone_number',
        'Phone Number',
        'phone_number_field',
        'theme-options',
        'footer_section'
    );
}

function phone_number_field() {
    $phone_number = get_option('phone_number', '');
    echo '<input type="text" name="phone_number" value="' . esc_attr($phone_number) . '" />';
}
