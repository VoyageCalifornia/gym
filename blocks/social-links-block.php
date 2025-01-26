<section class="social-block">
        <div class="container">
            <h4><?php the_field('block_title'); ?></h4>
            <?php if(have_rows('social_links')): ?>
                <ul>
                <?php while(have_rows('social_links')): the_row(); 
                    $image = get_sub_field('logo');
                    ?>
                    <li><a href="<?php the_sub_field('url'); ?>"><img loading="lazy" src="<?php the_sub_field('logo'); ?>"></a></li>
                <?php endwhile; ?>
                </ul>
            <?php endif; ?>
        </div>
    </section>