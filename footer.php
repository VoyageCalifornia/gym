<footer>
    <div class="container">
        <div class="footer-main">
            <div class="footer-col footer-social">
                <p class="footer-logo">Good<span>lyfe</span></p>
                <p class="footer-description"><?php echo get_option('website_description')?></p>
                <ul class="social-links">
                    <?php 
                        if (get_option('instagram_link')) {
                            echo '<li><a href="' . esc_url(get_option('instagram_link')) . '">
                                <img loading="lazy" src="' . esc_url(get_template_directory_uri() . '/dist/assets/ig-icon.svg') . '">
                            </a></li>';
                        }
                    ?>
                    <?php 
                        if (get_option('dribbble_link')) {
                            echo '<li><a href="' . esc_url(get_option('dribbble_link')) . '">
                                <img loading="lazy" src="' . esc_url(get_template_directory_uri() . '/dist/assets/dribbble-icon.svg') . '">
                            </a></li>';
                        }
                    ?>
                    <?php 
                        if (get_option('twitter_link')) {
                            echo '<li><a href="' . esc_url(get_option('twitter_link')) . '">
                                <img loading="lazy" src="' . esc_url(get_template_directory_uri() . '/dist/assets/twitter-icon.svg') . '">
                            </a></li>';
                        }
                    ?>
                    <?php 
                        if (get_option('youtube_link')) {
                            echo '<li><a href="' . esc_url(get_option('youtube_link')) . '">
                                <img loading="lazy" src="' . esc_url(get_template_directory_uri() . '/dist/assets/yt-icon.svg') . '">
                            </a></li>';
                        }
                    ?>                
                </ul>
            </div>
            <div class="footer-col footer-links">
                <p class="footer-col-title"><?php echo get_option('footer_main_1_title')?></p>
                <?php
                    wp_nav_menu( [
                        'theme_location'  => 'footer_main_1',
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
            </div>
            <div class="footer-col footer-links">
                <p class="footer-col-title"><?php echo get_option('footer_main_2_title')?></p>
                <?php
                    wp_nav_menu( [
                        'theme_location'  => 'footer_main_2',
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
            </div>
            <div class="footer-col footer-contacts">
                <p class="footer-col-title"><?php echo get_option('footer_main_3_title')?></p>
                <ul>
                    <li><a href="mailto:<?php echo get_option('email_address')?>"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/dist/assets/email-icon.svg"><?php echo get_option('email_address')?></a></li>
                    <li><a href="tel:<?php echo preg_replace('/[()\s]/', '', get_option('phone_number'))?>"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/dist/assets/phone-icon.svg"><?php echo get_option('phone_number')?></a></li>
                    <li><a href="#"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/dist/assets/location-icon.svg"><?php echo wp_kses_post(get_option('footer_address')); ?></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-secondary">
            <span>© <?php echo date('Y'); ?> Goodlyfe. All rights reserved</span>
            <?php
                wp_nav_menu( [
                    'theme_location'  => 'footer_secondary',
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
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>