<section class="hero-block">
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper">
            <?php if(have_rows('slider_items')): ?>
                <?php while(have_rows('slider_items')): the_row(); ?>
                    <?php $image = get_sub_field('background_image'); ?>
                    <div class="swiper-slide" style="background-image:url(<?php echo esc_url($image['url']); ?>);">
                        <<?php the_sub_field('slide_title_tag'); ?>><?php echo get_sub_field('slide_title'); ?></<?php the_sub_field('slide_title_tag'); ?>>

                        <?php if (get_sub_field('slide_description')): ?>
                            <p><?php the_sub_field('slide_description'); ?></p>
                        <?php endif; ?>

                        <?php
                            $cta_button = get_sub_field('cta_button');
                            if ($cta_button):
                                $cta_button_url = $cta_button['url'];
                                $cta_button_title = $cta_button['title'];
                                ?>
                                <a class="cta-button" href="<?php echo esc_url($cta_button_url); ?>"><?php echo $cta_button_title; ?></a>
                            <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>