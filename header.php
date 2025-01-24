<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Goodlyfe Gym</title>

    <?php wp_head(); ?>
</head>
<body>

<header>
    <nav>
        <a class="logo" href="/">Good<span>lyfe</span></a>
        <div class="menu-items">
            <ul>
                <li><a href="#">Classes</a></li>
                <li><a href="#">Timetable</a></li>
                <li><a href="#">Clubs</a></li>
                <li><a href="#">Nutrition</a></li>
                <li><a href="#">Free Trial</a></li>
                <li><a class="search" href="#">Search<img src="<?php bloginfo('template_url'); ?>/dist/assets/search-icon.svg"></a></li>
            </ul>
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