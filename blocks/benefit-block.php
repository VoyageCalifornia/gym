<?php 
    // not good (need to change ids to RTL classes)
    $section_id = get_field('image_on_the_rigth') ? 'facilities' : 'new-body'; 
?>

<section class="benefit-block container" id="<?php echo esc_attr($section_id); ?>">
    <div class="benefit-images">
    
    <?php if( get_field('image_1') ): ?>
    <img class="back-image" src="<?php the_field('image_1'); ?>" />
    <?php endif; ?>

    <?php if( get_field('image_2') ): ?>
    <img class="front-image" src="<?php the_field('image_2'); ?>" />
    <?php endif; ?>

    </div>

    <div class="benefit-content">
        <h4><?php the_field('benefit_heading'); ?></h4>
        <p><?php the_field('benefit_description'); ?></p>
        
        <?php $cta_button = get_field('cta_button');

        if ($cta_button):
            $cta_button_url = $cta_button['url'];
            $cta_button_text = $cta_button['title']; ?>

            <a class="cta-button white-bg" href="<?php echo esc_url($cta_button_url); ?>"><?php echo esc_html($cta_button_text); ?></a>
        <?php endif; ?>
        
    </div>
</section>