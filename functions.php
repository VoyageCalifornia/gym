<?php

// main scripts and styles
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

// add scripts to the admin editor
add_action('enqueue_block_editor_assets', 'enqueue_block_editor_styles');

function enqueue_block_editor_styles() {
    wp_enqueue_style(
        'custom-block-editor-styles',
        get_template_directory_uri() . '/dist/bundle.css',
        array(),
        '1.0',
        'all'
    );
}

// theme support
add_theme_support('title-tag');
add_theme_support('menus');

// custom admin panel page - Theme Options
require_once get_template_directory() . '/inc/admin-options.php';
// ACF 
require_once get_template_directory() . '/inc/acf-blocks.php';

// menus
add_action('after_setup_theme', function(){
	register_nav_menus([
		'header_menu' => 'Header Menu',
		'footer_main_1' => 'Footer Column 1',
        'footer_main_2' => 'Footer Column 2',
        'footer_secondary' => 'Footer Secondary'
	]);
});

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
  
    $filetype = wp_check_filetype( $filename, $mimes );
  
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
  
  }, 10, 4 );
  
  function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter( 'upload_mimes', 'cc_mime_types' );
  
  function fix_svg() {
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
  }
  add_action( 'admin_head', 'fix_svg' );

  add_filter('wpcf7_autop_or_not', '__return_false');
  add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});