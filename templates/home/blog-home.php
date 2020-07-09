<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$juanjimeneztj = juanjimeneztj_get_options();
	// Check for Sidebar
	if(isset($juanjimeneztj['home_post_column'])) {
	} 

	if(!empty($juanjimeneztj['home_blog_title'])) {
		$btitle = $juanjimeneztj['home_blog_title'];
	} else { 
		$btitle = '';
	}
	if(isset($juanjimeneztj['home_blog_style'])) {
		$type = $juanjimeneztj['home_blog_style'];
	} else {
		$type = 'grid'; 
	}
	if(isset($juanjimeneztj['home_post_count'])) {
		$blogcount = $juanjimeneztj['home_post_count'];
	} else {
		$blogcount = '4'; 
	}
	if(isset($juanjimeneztj['home_post_column'])) {
		$blogcolumns = $juanjimeneztj['home_post_column'];
	} else {
		$blogcolumns = '3'; 
	}
	if(!empty($juanjimeneztj['home_post_type'])) { 
		$blog_cat = get_term_by ('id',$juanjimeneztj['home_post_type'],'category');
		$blog_cat_slug = $blog_cat -> slug;
	} else {
		$blog_cat_slug = '';
	}

echo '<div class="home_blog home-margin clearfix home-padding">';
	if(!empty($btitle)) {
		echo '<div class="clearfix">';
			echo '<h3 class="hometitle">';
				echo '<span>'.esc_html($btitle).'</span>';
			echo '</h3>';
		echo '</div>';
	}
	$lay = juanjimeneztj_get_postlayout($type);
	global $juanjimeneztj_grid_columns, $juanjimeneztj_blog_loop, $juanjimeneztj_grid_carousel;
	$juanjimeneztj_blog_loop['loop'] = 1;
	$juanjimeneztj_grid_columns = $blogcolumns;
	$juanjimeneztj_grid_carousel = false;
	$itemsize = juanjimeneztj_get_post_grid_item_size($blogcolumns, false);
	 ?>
   	<div class="kt_blog_home <?php echo esc_attr($lay['pclass']); ?>">
	   	<div class="kt_archivecontent <?php echo esc_attr($lay['tclass']);?>" data-masonry-selector="<?php echo esc_attr($lay['data_selector']);?>" data-masonry-style="<?php echo esc_attr($lay['data_style']);?>"> 
		   	<?php 
			$loop = new WP_Query(array(
				'orderby' 				=> 'date',
				'order' 				=> 'DESC',
				'category_name'	 		=> $blog_cat_slug,
				'post_type' 			=> 'post',
				'ignore_sticky_posts' 	=> false,
				'posts_per_page' 		=> $blogcount
				));
		if ( $loop ) : 
			$juanjimeneztj_blog_loop['count'] = $loop->post_count;

			while ( $loop->have_posts() ) : $loop->the_post();
			if($lay['sum'] == 'full'){ 
                if (has_post_format( 'quote' )) {
                    get_template_part('templates/content', 'post-full-quote'); 
                } else {
                    get_template_part('templates/content', 'post-full'); 
                }
	        } else if($lay['sum'] == 'grid') { 
	        	if($lay['highlight'] == 'true' && $juanjimeneztj_blog_loop['loop'] == 1) {
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
        endwhile; else: ?>
			<div class="error-not-found"><?php _e('Sorry, no blog entries found.', 'juanjimeneztj'); ?></div>
		<?php 
		endif; 

		wp_reset_postdata(); ?>
		</div>
	</div>
	<?php  	
	if(isset($juanjimeneztj['home_post_readmore']) && $juanjimeneztj['home_post_readmore'] == 1) {
		if(isset($juanjimeneztj['home_post_readmore_text'])) {
			$readmore = $juanjimeneztj['home_post_readmore_text'];
		} else {
			$readmore = __('Read More', 'juanjimeneztj'); 
		}
		if(isset($juanjimeneztj['home_post_readmore_link'])) {
			$link = $juanjimeneztj['home_post_readmore_link'];
		} else {
			$link = ''; 
		}
		echo '<div class="home_blog_readmore">';
			echo '<a href="'.esc_url(get_permalink($link)).'" class="btn btn-primary">'.esc_html($readmore).'</a>';
		echo '</div>';
	}
echo '</div>';