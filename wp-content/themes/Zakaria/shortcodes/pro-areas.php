<?php
function pro_skills_areas()
{

    $query = new WP_Query(
        array(
            'post_type' => 'pro-area',
            'post_status' => 'publish',
            'post_per_page' => -1,
            'order' => 'ASC',
            'orderby' => 'menu_order'
        )
    );
    $i = 1;
    $str = '<div class="elementor-row">';
    while ($query->have_posts()):
        $query->the_post();
        $str .= '
         <div class="elementor-column elementor-col-33 elementor-top-column elementor-element " data-element_type="column">
            <div class="pro-area-box homepage-skills">
                <div class="content">
                    <a class="icon" href="' . get_the_permalink() . '">
                    <i aria-hidden="true" class="' . do_shortcode('[acf field="Icon"]') . '"></i></a>
                        <h3 class="title">' . get_the_title() . '</h3>
                            <p class="description">'. do_shortcode('[acf field="blurb"]') . '</p>
               </div>                             
            </div>
         </div>        
         ';

        if ($i % 3 == 0):
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


}

add_shortcode('pro_skills_areas', 'pro_skills_areas');

function pro_areas_link()
{
    $query = new WP_Query(
        array(
            'post_type' => 'pro-area',
            'post_status' => 'publish',
            'post_per_page' => -1,
            'order' => 'ASC',
            'orderby' => 'menu_order'
        )
    );
    $links = '';

    while ($query->have_posts()):
        $query->the_post();
        $links .= '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '" >' . get_the_title() . '</a><br>';
    endwhile;
    wp_reset_postdata();
    return $links;
}

add_shortcode('pro-areas_link', 'pro_areas_link');
add_filter('manage_pro-area_posts_columns', 'pro_area_columns');
function pro_area_columns($columns)
{

    $columns = array(
        'cb' => 'cb',
        'title' => 'title',
        'order' => 'order',
        'date' => 'date'
    );
    return $columns;
}

add_filter('manage_edit-pro-area_sortable_columns', 'pro_area_sortable_columns');

function pro_area_sortable_columns($columns)
{
    $columns['order'] = 'order';
    return $columns;

}

add_action('manage_pro-area_posts_custom_column', 'pro_area_show_columns');

function pro_area_show_columns($column_name)
{
    global $post;
    if ($column_name == 'order'):
        echo $post->menu_order;
    endif;
}