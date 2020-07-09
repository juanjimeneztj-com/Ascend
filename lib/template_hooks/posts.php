<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
add_action( 'juanjimeneztj_post_header', 'juanjimeneztj_single_post_header', 20 );
function juanjimeneztj_single_post_header() {
	if(juanjimeneztj_display_pagetitle()) {
		get_template_part('templates/post', 'header');
	} else {
		if(is_attachment()){
			if(apply_filters('juanjimeneztj_attachment_breadcrumbs', false)) {
				echo '<div class="kt_bc_nomargin">';
				juanjimeneztj_breadcrumbs(); 
				echo '</div>';
			}
		} elseif(get_post_type() != 'post') {
			if( apply_filters('juanjimeneztj_custom_post_type_breadcrumbs', false, $post) ) {
				echo '<div class="kt_bc_nomargin">';
				juanjimeneztj_breadcrumbs(); 
				echo '</div>';
			}
		} else {
			if( juanjimeneztj_display_post_breadcrumbs()) { 
				echo '<div class="kt_bc_nomargin">';
				juanjimeneztj_breadcrumbs(); 
				echo '</div>';
			}
		}
	}
}

add_filter( 'juanjimeneztj_single_post_image_height', 'juanjimeneztj_post_header_single_image_height', 10 );
function juanjimeneztj_post_header_single_image_height() {
	$juanjimeneztj = juanjimeneztj_get_options();
	if(isset($juanjimeneztj['post_header_single_image_height']) && $juanjimeneztj['post_header_single_image_height'] == 1 ) {
		return null;
	} else {
		return 400;
	}
}
function juanjimeneztj_get_post_head_content() {
	global $post;
	$juanjimeneztj = juanjimeneztj_get_options();
	if ( has_post_format( 'video' )) {
      	$headcontent = get_post_meta( $post->ID, '_kad_video_blog_head', true );
      	if(empty($headcontent) || $headcontent == 'default') {
          	if(!empty($juanjimeneztj['video_post_blog_default'])) {
                $headcontent = $juanjimeneztj['video_post_blog_default'];
            } else {
                $headcontent = 'video';
            }
      	}
    } else if (has_post_format( 'gallery' )) {
        $headcontent = get_post_meta( $post->ID, '_kad_gallery_blog_head', true );
        if(empty($headcontent) || $headcontent == 'default') {
            if(!empty($juanjimeneztj['gallery_post_blog_default'])) {
                $headcontent = $juanjimeneztj['gallery_post_blog_default'];
            } else {
                $headcontent = 'carouselslider';
            }
        }
	 } elseif (has_post_format( 'image' )) {
        $headcontent = get_post_meta( $post->ID, '_kad_image_blog_head', true );
        if(empty($headcontent) || $headcontent == 'default') {
            if(!empty($juanjimeneztj['image_post_blog_default'])) {
                $headcontent = $juanjimeneztj['image_post_blog_default'];
            } else {
                $headcontent = 'image';
            }
        }
	} else {
        $headcontent = 'none';
    }
    return $headcontent;
}
/* Single Post Layout */
add_action( 'juanjimeneztj_single_post_begin', 'juanjimeneztj_single_post_upper_headcontent', 10 );
function juanjimeneztj_single_post_upper_headcontent() {
	get_template_part('templates/post', 'head-upper-content');
}

add_action( 'juanjimeneztj_single_post_before_header', 'juanjimeneztj_single_post_headcontent', 10 );
function juanjimeneztj_single_post_headcontent() {
	get_template_part('templates/post', 'head-content');
}
add_action( 'juanjimeneztj_single_attachment_header', 'juanjimeneztj_single_post_meta_date_author', 30 );
add_action( 'juanjimeneztj_post_excerpt_header', 'juanjimeneztj_single_post_meta_date_author', 30 );
add_action( 'juanjimeneztj_single_loop_post_header', 'juanjimeneztj_single_post_meta_date_author', 30 );
add_action( 'juanjimeneztj_single_post_header', 'juanjimeneztj_single_post_meta_date_author', 30 );
function juanjimeneztj_single_post_meta_date_author() {
	get_template_part('templates/entry', 'meta-date-author');
}
add_action( 'juanjimeneztj_single_attachment_header', 'juanjimeneztj_post_header_title', 20 );
add_action( 'juanjimeneztj_single_post_header', 'juanjimeneztj_post_header_title', 20 );
function juanjimeneztj_post_header_title() {
	$juanjimeneztj = juanjimeneztj_get_options();
	if(isset($juanjimeneztj['blog_post_title_inpost']) && $juanjimeneztj['blog_post_title_inpost'] == 0) {
		// do nothing
	} else {
		echo '<h1 class="entry-title" itemprop="name headline">';
			the_title();
		echo '</h1>';
	}
}

add_action( 'juanjimeneztj_single_attachment_before_header', 'juanjimeneztj_single_attachment_image', 20 );
function juanjimeneztj_single_attachment_image() {
	 echo wp_get_attachment_image( get_the_ID(), 'full' );
}

// CATEGORY OUTPUT
add_action( 'juanjimeneztj_post_photo_grid_excerpt_after_header', 'juanjimeneztj_post_header_meta_categories', 20 );
add_action( 'juanjimeneztj_post_grid_excerpt_before_header', 'juanjimeneztj_post_header_meta_categories', 20 );
add_action( 'juanjimeneztj_post_excerpt_before_header', 'juanjimeneztj_post_header_meta_categories', 20 );
add_action( 'juanjimeneztj_single_loop_post_before_header', 'juanjimeneztj_post_header_meta_categories', 20 );
add_action( 'juanjimeneztj_single_post_before_header', 'juanjimeneztj_post_header_meta_categories', 20 );
function juanjimeneztj_post_header_meta_categories() {
	echo '<div class="kt_post_category kt-post-cats">';
		the_category(' | ');
	echo '</div>';
}

add_action( 'juanjimeneztj_single_attachment_footer', 'juanjimeneztj_post_footer_pagination', 10 );
add_action( 'juanjimeneztj_single_post_footer', 'juanjimeneztj_post_footer_pagination', 10 );
function juanjimeneztj_post_footer_pagination() {
	wp_link_pages(array('before' => '<nav class="pagination kt-pagination">', 'after' => '</nav>', 'link_before'=> '<span>','link_after'=> '</span>'));
}

add_action( 'juanjimeneztj_single_post_footer', 'juanjimeneztj_post_footer_tags', 20 );
function juanjimeneztj_post_footer_tags() {
	$tags = get_the_tags();
	if ($tags) {  
		echo '<div class="posttags post-footer-section">';
		the_tags(__('Tags:', 'juanjimeneztj'), ' ', '');
		echo '</div>';
	}
}
add_action( 'juanjimeneztj_post_grid_excerpt_footer', 'juanjimeneztj_post_footer_meta', 30 );
add_action( 'juanjimeneztj_post_excerpt_footer', 'juanjimeneztj_post_footer_meta', 30 );
add_action( 'juanjimeneztj_single_loop_post_footer', 'juanjimeneztj_post_footer_meta', 30 );
add_action( 'juanjimeneztj_single_post_footer', 'juanjimeneztj_post_footer_meta', 30 );
function juanjimeneztj_post_footer_meta() {
	get_template_part('templates/entry', 'footer-meta');
}
add_action( 'juanjimeneztj_single_loop_post_footer', 'juanjimeneztj_post_footer_image_meta', 35 );
add_action( 'juanjimeneztj_single_post_footer', 'juanjimeneztj_post_footer_image_meta', 35 );
function juanjimeneztj_post_footer_image_meta() {
	get_template_part('templates/entry', 'footer-image-meta');
}

add_action( 'juanjimeneztj_single_post_footer', 'juanjimeneztj_post_nav', 40 );
function juanjimeneztj_post_nav() {
 	$juanjimeneztj = juanjimeneztj_get_options();
 	if(!isset($juanjimeneztj['show_postlinks']) || $juanjimeneztj['show_postlinks'] != 0) {
 		get_template_part('templates/entry', 'post-links');
 	}
}

add_action( 'juanjimeneztj_single_post_after', 'juanjimeneztj_post_authorbox', 20 );
function juanjimeneztj_post_authorbox() {
 global $post;
 	$juanjimeneztj = juanjimeneztj_get_options();
	 $authorbox = get_post_meta( $post->ID, '_kad_blog_author', true );
	 if(empty($authorbox) || $authorbox == 'default') { 
	 	if(isset($juanjimeneztj['post_author_default']) && ($juanjimeneztj['post_author_default'] == 'yes')) {
	 	 	juanjimeneztj_author_box(); 
	 	}
	 } else if($authorbox == 'yes'){ 
	 	juanjimeneztj_author_box(); 
	 } 
}
add_action( 'juanjimeneztj_single_post_after', 'juanjimeneztj_post_bottom_carousel', 30 );
function juanjimeneztj_post_bottom_carousel() {
 	global $post, $juanjimeneztj_bottom_carousel;
 	$juanjimeneztj = juanjimeneztj_get_options();
		$juanjimeneztj_bottom_carousel = get_post_meta( $post->ID, '_kad_blog_carousel_similar', true ); 
      	if(empty($juanjimeneztj_bottom_carousel) || $juanjimeneztj_bottom_carousel == 'default' ) { 
      		if(isset($juanjimeneztj['post_carousel_default'])) {
      			$juanjimeneztj_bottom_carousel = $juanjimeneztj['post_carousel_default']; 
      		}
      	}
	      
	    if ($juanjimeneztj_bottom_carousel == 'similar' || $juanjimeneztj_bottom_carousel == 'recent') { 
	      	get_template_part('templates/bottom', 'post-carousel');
	    }
}

add_action( 'juanjimeneztj_single_attachment_after', 'juanjimeneztj_post_comments', 40 );
add_action( 'juanjimeneztj_single_post_after', 'juanjimeneztj_post_comments', 40 );
function juanjimeneztj_post_comments() {
	comments_template('/templates/comments.php');
}



// POST GRID 
add_action( 'juanjimeneztj_post_photo_grid_excerpt_header', 'juanjimeneztj_post_grid_excerpt_header_title', 10 );
add_action( 'juanjimeneztj_post_grid_excerpt_header', 'juanjimeneztj_post_grid_excerpt_header_title', 10 );
function juanjimeneztj_post_grid_excerpt_header_title() {
	echo '<a href="'.esc_url( get_the_permalink() ).'">';
    	echo '<h5 class="entry-title" itemprop="name headline">';
          		the_title();
    	echo '</h5>';
    echo '</a>';
}

add_action( 'juanjimeneztj_post_grid_excerpt_footer', 'juanjimeneztj_post_grid_footer_meta', 20 );
function juanjimeneztj_post_grid_footer_meta() {
	get_template_part('templates/entry', 'meta-grid-footer');
}
