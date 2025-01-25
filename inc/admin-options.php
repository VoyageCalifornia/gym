<?php

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

    register_setting(
        'custom_theme_options_group',
        'footer_address'
    );

    register_setting(
        'custom_theme_options_group',
        'email_address'
    );

    register_setting(
        'custom_theme_options_group',
        'website_description'
    );

    register_setting(
        'custom_theme_options_group',
        'footer_main_1_title'
    );

    register_setting(
        'custom_theme_options_group',
        'footer_main_2_title'
    );

    register_setting(
        'custom_theme_options_group',
        'footer_main_3_title'
    );

    add_settings_section(
        'footer_section',
        'Footer Settings',
        null,
        'theme-options'
    );

    add_settings_field(
        'footer_phone_number', // id
        'Phone Number',        // title (field label)
        'phone_number_field',  // callback function
        'theme-options',       // settings slug
        'footer_section'       // section
    );

    add_settings_field(
        'footer_email_address',
        'Email',
        'footer_email_address_field',
        'theme-options',
        'footer_section'
    );

    add_settings_field(
        'footer_address',
        'Address',
        'footer_address_field',
        'theme-options',
        'footer_section'
    );

    add_settings_field(
        'footer_website_description',
        'Website Description',
        'website_description_field',
        'theme-options',
        'footer_section'
    );

    add_settings_field(
        'footer_main_1_title',
        'Footer Column 1 Title',
        'footer_main_1_title_field',
        'theme-options',
        'footer_section'
    );

    add_settings_field(
        'footer_main_2_title',
        'Footer Column 2 Title',
        'footer_main_2_title_field',
        'theme-options',
        'footer_section'
    );

    add_settings_field(
        'footer_main_3_title',
        'Footer Column 3 Title',
        'footer_main_3_title_field',
        'theme-options',
        'footer_section'
    );
}

function phone_number_field() {
    $phone_number = get_option('phone_number', '');
    echo '<input type="text" class="regular-text" name="phone_number" value="' . esc_attr($phone_number) . '" />';
    echo '<p class="description">Expected format: +1 555-123-4567</p>';
}

function footer_email_address_field() {
    $email_address = get_option('email_address', '');
    echo '<input type="text" class="regular-text" name="email_address" value="' . esc_attr($email_address) . '" />';
}

function footer_address_field() {
    $footer_address = get_option('footer_address', '');
    echo '<textarea name="footer_address" rows="2" cols="50">' . esc_textarea($footer_address) . '</textarea>';
    echo '<p class="description">Use br for line breaks</p>';
}

function website_description_field() {
    $website_description = get_option('website_description', '');
    echo '<textarea name="website_description" rows="5" cols="50">' . esc_textarea($website_description) . '</textarea>';
}

function footer_main_1_title_field() {
    $footer_main_1_title = get_option('footer_main_1_title', '');
    echo '<input type="text" class="regular-text" name="footer_main_1_title" value="' . esc_attr($footer_main_1_title) . '" />';
}

function footer_main_2_title_field() {
    $footer_main_2_title = get_option('footer_main_2_title', '');
    echo '<input type="text" class="regular-text" name="footer_main_2_title" value="' . esc_attr($footer_main_2_title) . '" />';
}

function footer_main_3_title_field() {
    $footer_main_3_title = get_option('footer_main_3_title', '');
    echo '<input type="text" class="regular-text" name="footer_main_3_title" value="' . esc_attr($footer_main_3_title) . '" />';
}