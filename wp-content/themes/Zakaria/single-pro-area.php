<?php get_header(); ?>
<?php while (have_posts()) :
the_post(); ?>
        <section class="elementor-section elementor-top-section elementor-element
							elementor-section-boxed content" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-row"
                <div class="elementor-column elementor-col-75 elementor-top-column elementor-element "
                     data-element_type="column">

                    <div class="elementor-widget-wrap">
                        <h3><?php echo get_the_title(); ?></h3>
                        <h4><?php echo do_shortcode('[acf field="blurb"]'); ?></h4>
                        <?php echo the_content(); ?>
                        <h3 align="center">Request information</h3>
                        <p align="center"> You can complete the following form for more information.</p>
                        <?php   echo do_shortcode('[fluentform id="3"]') ?>
                    </div>
                </div>
                <div class="elementor-column elementor-col-25 elementor-top-column elementor-element "
                     data-element_type="column">
                    <div class="elementor-widget-wrap">
                        <h3>All Skills</h3>
                        <?php echo do_shortcode('[pro-areas_link]'); ?>
                    </div>
                </div>
            </div>
        </div>
        </section>
<?php endwhile; ?>
<?php get_footer(); ?>