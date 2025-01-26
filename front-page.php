<?php get_header(); ?>

<main>
    <?php the_content(); ?>

    <section class="get-in-touch">
        <div class="container">
            <div class="form-wrapper">
                <h4>Get in Touch</h4>
                <?php echo do_shortcode('[contact-form-7 id="2ea8f34" title="Contact form 1"]'); ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>