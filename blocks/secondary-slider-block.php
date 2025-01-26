<section class="secondary-slider-block">
    <div class="swiper secondary-slider">
        <div class="swiper-wrapper">
            <?php if(have_rows('slider_items')): ?>
                <?php $loop_counter = 0; ?>
                <?php while(have_rows('slider_items')): the_row(); ?>
                    <?php $image = get_sub_field('background_image'); ?>
                    <div class="swiper-slide" style="background-image:url(<?php echo esc_url($image['url']); ?>);">
                        <h2><?php echo get_sub_field('slide_title'); ?></h2>

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