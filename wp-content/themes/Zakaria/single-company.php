<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
    <section class="elementor-section elementor-top-section elementor-element
							elementor-section-boxed content"   data-element_type="section">
        <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-row"
            <div class="elementor-column elementor-col-25 elementor-top-column elementor-element "
                 data-element_type="column">
                <div class="elementor-widget-wrap company-links text-center">
                    <?php echo the_post_thumbnail('large', array('class'=>'img-fluid'));?>
                    <?php echo '<br>'?>
                    <?php
                        $location = get_field('name');
                        $name = get_field('name');
                    if ($location !=''):
                        echo '<a href="mailto:'.$location.'" title="Location'.get_the_title().'">
                        <i class="fas fa-envelope-square fa-3x"></i></a>';
                    endif;
                    ?>
                </div>
            </div>
            <div class="elementor-column elementor-col-75 elementor-top-column elementor-element "
                 data-element_type="column">

                <div class="elementor-widget-wrap">
                    <h3><?php echo get_the_title(); ?></h3>
                    <h4><?php echo do_shortcode('[acf field="name"]'); ?></h4>
                    <?php echo the_content(); ?>
                    <?php
                        $areas = get_field('name');
                        $name = get_field('name');
                        $locatoin = get_field('activity');
                        if ($areas !=''):
                            echo '<h3 class="text-center">Location</h3>';
                            echo '<div class="company-section">'.$name.'</div>';
                            echo '<br>';
                        endif;
                    if ($areas !=''):
                        echo '<h3 class="text-center">add</h3>';
                        echo '<div class="company-section">'.$name.'</div>';
                    endif;
                    ?>
                    <h3 class="text-center">Contact</h3>
                    <p class="text-center">You can get more infos here</p>
                    <?php echo do_shortcode('[fluentform id="5"]'); ?>
                </div>
            </div>

        </div>
        </div>
    </section>
<?php endwhile; ?>
<?php get_footer(); ?>

