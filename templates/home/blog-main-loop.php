<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $juanjimeneztj_has_sidebar, $juanjimeneztj_grid_columns, $juanjimeneztj_blog_loop;
$juanjimeneztj = juanjimeneztj_get_options(); 

    $juanjimeneztj_blog_loop['loop'] = 1;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    if(isset($juanjimeneztj['home_main_post_style'])) {
    	$layout = $juanjimeneztj['home_main_post_style'];
    } else {
    	$layout = 'normal';
    }
    $lay = juanjimeneztj_get_postlayout($layout);
    if(isset($juanjimeneztj['home_main_columns'])) {
        $juanjimeneztj_grid_columns = $juanjimeneztj['home_main_columns'];
    } else {
        $juanjimeneztj_grid_columns = '3';
    } 
    if(juanjimeneztj_display_sidebar()) {
        $fullclass 		= '';
        $juanjimeneztj_has_sidebar = true;
    } else {
        $fullclass 		= 'fullwidth';
        $juanjimeneztj_has_sidebar = false;
    }
    $itemsize = juanjimeneztj_get_post_grid_item_size($juanjimeneztj_grid_columns, $juanjimeneztj_has_sidebar);

		if (!have_posts()) : ?>
            <div class="error-not-found">
                <?php _e('Sorry, no results were found.', 'juanjimeneztj'); ?>
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
        <div class="<?php echo esc_attr($lay['pclass']); ?>">
            <div class="kt_archivecontent <?php echo esc_attr($lay['tclass']); ?>" data-masonry-selector="<?php echo esc_attr($lay['data_selector']);?>" data-masonry-style="<?php echo esc_attr($lay['data_style']);?>"> 
                <?php 
                $juanjimeneztj_blog_loop['count'] = $wp_query->post_count;
                while (have_posts()) : the_post();
	                if($lay['sum'] == 'full'){ 
	                    if (has_post_format( 'quote' )) {
	                        get_template_part('templates/content', 'post-full-quote'); 
	                    } else {
	                        get_template_part('templates/content', 'post-full'); 
	                    }
	                } else if($lay['sum'] == 'grid') { 
	                    if($lay['highlight'] == 'true' && $juanjimeneztj_blog_loop['loop'] == 1 && $paged == 1) {
	                        get_template_part('templates/content', get_post_format());
	                    } else { ?>
	                        <div class="<?php echo esc_attr($itemsize);?> b_item kad_blog_item">
	                            <?php get_template_part('templates/content', 'post-grid'); ?>
	                        </div>
	                   <?php }
	                } else if($lay['sum'] == 'photo') { ?>
	                    <div class="<?php echo esc_attr($itemsize);?> b_item kad_blog_item">
	                        <?php get_template_part('templates/content', 'post-photo-grid'); ?>
	                    </div>
	                <?php
	                } else if($lay['sum'] == 'below_title') {
	                    get_template_part('templates/content', 'post-title-above');
	                } else { 
	                    get_template_part('templates/content', get_post_format());
	                }
	                $juanjimeneztj_blog_loop['loop'] ++;
	            endwhile;

                ?>
            </div><!-- /.archive content -->
            <?php 
            /**
            * @hooked juanjimeneztj_pagination - 20
            */
            do_action('juanjimeneztj_pagination'); ?>
                </div>