<?php
function pro_skills_areas(){

    $query = new WP_Query(
        array(
            'post_type' => 'pro-area',
            'post_status' => 'publish',
            'post_per_page' => -1,
            'order' => 'ASC',
            'orderby'=> 'menu_order'
        )
    );
    $i = 1;
    $str = '<div class="elementor-row">';
        while ($query->have_posts()):
         $query->the_post();
         $str .='
         <div class="elementor-column elementor-col-33 elementor-top-column elementor-element " data-element_type="column">
            <div class="pro-area-box homepage-skills">
                <div class="content">
                    <a class="icon" href="'.get_the_permalink().'"><i aria-hidden="true" class="'.do_shortcode('[acf field="icon"]').'"></i></a>
                        <h3 class="title">'.get_the_title().'</h3>
                            <p class="description">'.do_shortcode('[acf field="blurb"]').'</p>
                                </div>>
            </div>>
         </div>>
			
         ';

        if($i % 3 == 0):
            $str .= '</div>';
            $str .= '<div class="elementor-row">';
        endif;
        $i++;
    endwhile;

    /*if($i % 3 == 0):
        $str .= '</div>';
        $str .= '<div class="elementor-row">';
    endif;*/

    wp_reset_postdata();
    return $str;

    /*
     * <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-64a536c" data-id="64a536c" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-408ea8c elementor-view-stacked elementor-shape-circle elementor-position-top elementor-vertical-align-top elementor-widget elementor-widget-icon-box" data-id="408ea8c" data-element_type="widget" data-widget_type="icon-box.default">
				<div class="elementor-widget-container">
					<div class="elementor-icon-box-wrapper">
						<div class="elementor-icon-box-icon">
				<span class="elementor-icon elementor-animation-">
				<i aria-hidden="true" class="far fa-chart-bar"></i>				</span>
			</div>
						<div class="elementor-icon-box-content">
				<h3 class="elementor-icon-box-title">
					<span>
						This is the heading					</span>
				</h3>
									<p class="elementor-icon-box-description">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.					</p>
							</div>
		</div>
				</div>
				</div>
					</div>
		</div>
     */

}
add_shortcode('pro_skills_areas' ,'pro_skills_areas' );

function pro_areas_link(){
    $query = new WP_Query(
            array(
                'post_type' => 'pro-area',
                'post_status' => 'publish',
                'post_per_page' => -1,
                'order' => 'ASC',
                'orderby'=> 'menu_order'
            )
    );
        $links = '';

            while ($query->have_posts()):
                $query->the_post();
                $links .= '<a href="'.get_the_permalink().'" title="'.get_the_title().'" >' .get_the_title().'</a><br>';
            endwhile;
        wp_reset_postdata();
        return $links;
    }
add_shortcode('pro-areas_link' ,'pro_areas_link' );