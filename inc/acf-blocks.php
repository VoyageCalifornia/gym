<?php 

acf_register_block_type(
    array(
        'name' => 'benefit_block',
        'title' => __('Benefit Block'),
        'description' => __('Two images and a text block'),
        'render_template' => get_template_directory() . '/blocks/benefit-block.php',
        'icon' => 'columns',
        'keywords' => array('benefit', 'two images'),
        'category' => 'layout',
        'supports' => array(
            'align' => true,
            'anchor' => true,
            'customClassName' => true,
        ),
    )
);

acf_register_block_type(
    array(
        'name' => 'hero_slider_block',
        'title' => __('Hero Images Slider Block'),
        'description' => __('Hero slider with images as a background'),
        'render_template' => get_template_directory() . '/blocks/hero-slider-block.php',
        'icon' => 'slides',
        'keywords' => array('slider', 'images', 'hero'),
        'category' => 'layout',
        'supports' => array(
            'align' => true,
            'anchor' => true,
            'customClassName' => true,
        ),
    )
);

acf_register_block_type(
    array(
        'name' => 'secondary_slider_block',
        'title' => __('Secondary Images Slider Block'),
        'description' => __('Secondary slider with images as a background'),
        'render_template' => get_template_directory() . '/blocks/secondary-slider-block.php',
        'icon' => 'slides',
        'keywords' => array('slider', 'images', 'secondary'),
        'category' => 'layout',
        'supports' => array(
            'align' => true,
            'anchor' => true,
            'customClassName' => true,
        ),
    )
);

acf_register_block_type(
    array(
        'name' => 'testimonials_block',
        'title' => __('Testimonials Block'),
        'description' => __('Block for testimonials with a slider on mobile version'),
        'render_template' => get_template_directory() . '/blocks/testimonials-block.php',
        'icon' => 'testimonial',
        'keywords' => array('slider', 'testimonial', 'review'),
        'category' => 'layout',
        'supports' => array(
            'align' => true,
            'anchor' => true,
            'customClassName' => true,
        ),
    )
);

acf_register_block_type(
    array(
        'name' => 'app_block',
        'title' => __('Application Block'),
        'description' => __('Block with links to the application download'),
        'render_template' => get_template_directory() . '/blocks/app-block.php',
        'icon' => 'store',
        'keywords' => array('app', 'application', 'download'),
        'category' => 'layout',
        'supports' => array(
            'align' => true,
            'anchor' => true,
            'customClassName' => true,
        ),
    )
);

acf_register_block_type(
    array(
        'name' => 'social_links_block',
        'title' => __('Social Links Block'),
        'description' => __('Block with links to social networks'),
        'render_template' => get_template_directory() . '/blocks/social-links-block.php',
        'icon' => 'instagram',
        'keywords' => array('social', 'instagram'),
        'category' => 'layout',
        'supports' => array(
            'align' => true,
            'anchor' => true,
            'customClassName' => true,
        ),
    )
);

?>