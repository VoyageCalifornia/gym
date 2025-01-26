<section class="testimonials">
    <div class="container">
        <div class="testimonials-intro">
            <h3><?php the_field('block_title');?></h3>
            <p><?php the_field('block_subtitle');?></p>
        </div>
    </div>
    <div class="swiper swiper-testimonials">
        <div class="swiper-wrapper testimonials-slider">
            <?php if(have_rows('testimonial_items')): ?>
                <?php while(have_rows('testimonial_items')): the_row(); ?>
                    <div class="swiper-slide testimonials-slider-item">
                        <h4><?php the_sub_field('slide_title'); ?></h4>
                        <div class="testimonial-content">
                            <div class="testimonial-text">
                                <p><?php the_sub_field('testimonial_content'); ?></p>
                                <div class="author">
                                    <?php $image = get_sub_field('testimonial_author_image'); ?>
                                    <img loading="lazy" src="<?php echo esc_url($image['url']); ?>">
                                    <div class="author-info">
                                        <p class="name"><?php the_sub_field('testimonial_author_name'); ?></p>
                                        <p class="status"><?php the_sub_field('testimonial_author_status'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>            
        </div>
    </div>
</section>