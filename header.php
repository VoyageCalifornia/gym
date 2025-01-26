<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Goodlyfe Gym</title>

    <?php wp_head(); ?>
</head>
<body <?php if (isset($args['page_type'])): ?>
    id="<?php echo esc_attr($args['page_type']); ?>"
<?php endif; ?>>

<header>
    <nav>
        <a class="logo" href="/">Good<span>lyfe</span></a>
        <div class="menu-items">
            <?php
                wp_nav_menu( [
                    'theme_location'  => 'header_menu',
                    'menu'            => '',
                    'container'       => false,
                    'menu_class'      => 'menu',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'items_wrap'      => '<ul>%3$s</ul>',
                    'depth'           => 0,
                ] );
            ?>
            <a class="login" href="#">Login</a>
        </div>
        <div class="menu-mobile">
            <ul>
                <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/dist/assets/search-icon.svg"></a></li>
                <li><button id="menu-button"><img src="<?php bloginfo('template_url'); ?>/dist/assets/menu-mobile.svg"></button></li>
            </ul>
        </div>
    </nav>
</header>