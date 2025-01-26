<?php /* Template Name: Thank You Page */ ?>

<?php get_header(null, ['page_type' => 'thank-you-page']); ?>

<main>
    <section class="hero-block container">
        <div class="swiper hero-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <?php the_content(); ?>
                    <a class="cta-button" href="/">Back to the homepage</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>