<section class="app-block">
    <div class="container">
        <div class="app-content">
            <h4><?php the_field('block_title'); ?></h4>
            <p><?php the_field('block_description'); ?></p>
            <span><?php the_field('links_subtitle'); ?></span>
            <ul class="app-links">
                <?php if(get_field('google_play_link')): ?>
                    <li><a href="the_field('google_play_link')"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/dist/assets/gp-icon.svg"></a></li>
                <?php endif ?>
                <?php if(get_field('app_store_link')): ?>
                    <li><a href="the_field('app_store_link')"><img loading="lazy" src="<?php bloginfo('template_url'); ?>/dist/assets/app-store-icon.svg"></a></li>
                <?php endif ?>
            </ul>
        </div>
        <div class="app-image">
            <?php $image = get_field('application_image'); ?>
            <img loading="lazy" src="<?php echo esc_url($image['url']); ?>">
        </div>
    </div>
</section>