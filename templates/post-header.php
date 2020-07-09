<?php
	// Post Header
	global $post; 
			$juanjimeneztj = juanjimeneztj_get_options();
			if(isset($juanjimeneztj['single_header_title_size'])){
				$title_data = $juanjimeneztj['single_header_title_size'];
			} else {
				$title_data = '70';
			}

			if(isset($juanjimeneztj['single_header_title_size_small'])){
				$title_small_data = $juanjimeneztj['single_header_title_size_small'];
			} else {
				$title_small_data = '30';
			}

			if(isset($juanjimeneztj['single_header_subtitle_size'])){
				$subtitle_data = $juanjimeneztj['single_header_subtitle_size'];
			} else {
				$subtitle_data = '40';
			}

			if(isset($juanjimeneztj['single_header_subtitle_size_small'])){
				$subtitle_small_data = $juanjimeneztj['single_header_subtitle_size_small'];
			} else {
				$subtitle_small_data = '20';
			}


	// Sinlge Product
	if(is_singular('product')){
		if(!empty($post_header_title)) {
			$page_title_title = $post_header_title;
		} else if(isset($juanjimeneztj['product_post_title_content']) && $juanjimeneztj['product_post_title_content'] == 'custom') {
			if(isset($juanjimeneztj['product_header_title_text'])) {
				$page_title_title = $juanjimeneztj['product_header_title_text']; 
			} else { 
				$page_title_title = '';
			}
			if(!empty($juanjimeneztj['product_header_subtitle_text'])) {
				$bsub = $juanjimeneztj['product_header_subtitle_text'];
			}
		} else if (isset($juanjimeneztj['product_post_title_content']) && $juanjimeneztj['product_post_title_content'] == 'category') {
			$terms = wp_get_post_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) );
			if ( !empty($terms) ) {
	            $cat = $terms[0];
	            $page_title_title = $cat->name;
	        } else {
	            $page_title_title = '';
	        }
		} else {
			$page_title_title =  get_the_title();
		}
		if( juanjimeneztj_display_product_breadcrumbs()) {
		 	$breadcrumb = true;
		 	$breadclass = "kt_bc_active";
		} else {
		 	$breadcrumb = false;
		 	$breadclass = "kt_bc_not_active";
		}
	} else if(is_singular('portfolio')){
		// Sinlge Portfolio
		if(!empty($post_header_title)) {
			$page_title_title = $post_header_title;
		} else if(isset($juanjimeneztj['portfolio_post_title_content']) && $juanjimeneztj['portfolio_post_title_content'] == 'custom') {
			if(isset($juanjimeneztj['portfolio_header_title_text'])) {
				$page_title_title = $juanjimeneztj['portfolio_header_title_text']; 
			} else { 
				$page_title_title = '';
			}
			if(!empty($juanjimeneztj['portfolio_header_subtitle_text'])) {
				$bsub = $juanjimeneztj['portfolio_header_subtitle_text'];
			}
		} else if (isset($juanjimeneztj['portfolio_post_title_content']) && $juanjimeneztj['portfolio_post_title_content'] == 'portfolio-type') {
			$terms = wp_get_post_terms( $post->ID, 'portfolio-type', array( 'orderby' => 'parent', 'order' => 'DESC' ) );
			if ( !empty($terms) ) {
	            $cat = $terms[0];
	            $page_title_title = $cat->name;
	        } else {
	            $page_title_title = '';
	        }
		} else {
			$page_title_title =  get_the_title();
		}
		if( juanjimeneztj_display_portfolio_breadcrumbs()) {
		 	$breadcrumb = true;
		 	$breadclass = "kt_bc_active";
		} else {
		 	$breadcrumb = false;
		 	$breadclass = "kt_bc_not_active";
		}
	} else if(is_singular('post')){
		// Blog Post
		if(!empty($post_header_title)) {
			$page_title_title = $post_header_title;
		} else if ( isset( $juanjimeneztj['blog_post_title_content'] ) && 'custom' == $juanjimeneztj['blog_post_title_content'] ) {
			if ( isset( $juanjimeneztj['blog_header_title_text'] ) ) {
				$page_title_title = $juanjimeneztj['blog_header_title_text'];
			} else {
				$page_title_title = '';
			}
			if ( ! empty( $juanjimeneztj['blog_header_subtitle_text'] ) ) {
				$bsub = $juanjimeneztj['blog_header_subtitle_text'];
			}
		} else if (isset($juanjimeneztj['blog_post_title_content']) && $juanjimeneztj['blog_post_title_content'] == 'posttitle') {
			$page_title_title =  get_the_title();
		} else {
			$terms = wp_get_post_terms( $post->ID, 'category', array( 'orderby' => 'parent', 'order' => 'DESC' ) );
			if ( !empty($terms) ) {
	            $cat = $terms[0];
	            $page_title_title = $cat->name;
	        } else {
	            $page_title_title = '';
	        }
		}
		if( juanjimeneztj_display_post_breadcrumbs()) {
		 	$breadcrumb = true;
		 	$breadclass = "kt_bc_active";
		} else {
		 	$breadcrumb = false;
		 	$breadclass = "kt_bc_not_active";
		}
	} else if(is_singular('event')){
		// Events
		if(!empty($post_header_title)) {
			$page_title_title = $post_header_title;
		} else if (isset($juanjimeneztj['blog_post_title_content']) && $juanjimeneztj['blog_post_title_content'] == 'posttitle') {
			$page_title_title =  get_the_title();
		} else {
			$main_term = '';
            if(class_exists('WPSEO_Primary_Term')) {
          		$WPSEO_term = new WPSEO_Primary_Term('event-category', $post->ID);
				$WPSEO_term = $WPSEO_term->get_primary_term();
				$WPSEO_term = get_term($WPSEO_term);
				if (is_wp_error($WPSEO_term)) { 
					if ( $terms = wp_get_post_terms( $post->ID, 'event-category', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ) {
						if( is_array($terms) ) {
							$main_term = $terms[0];
						}
					}
				} else {
					$main_term = $WPSEO_term;
				}
          	} elseif ( $terms = wp_get_post_terms( $post->ID, 'event-category', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ) {
          		if( is_array($terms) ) {
					$main_term = $terms[0];
				}
            }
        	if($main_term){
	            $page_title_title = $main_term->name;
	        } else {
	            $page_title_title = '';
	        }
	    }
	    if( juanjimeneztj_display_post_breadcrumbs()) {
		 	$breadcrumb = true;
		 	$breadclass = "kt_bc_active";
		} else {
		 	$breadcrumb = false;
		 	$breadclass = "kt_bc_not_active";
		}
	} else if(is_singular('tribe_events')){
		// Blog Post
		if(!empty($post_header_title)) {
			$page_title_title = $post_header_title;
		} else {
			$page_title_title = tribe_get_event_label_singular();
		} 
		if( juanjimeneztj_display_post_breadcrumbs()) {
		 	$breadcrumb = true;
		 	$breadclass = "kt_bc_active";
		} else {
		 	$breadcrumb = false;
		 	$breadclass = "kt_bc_not_active";
		}
	} else if(is_attachment()){
		$page_title_title = get_the_title();
		if( apply_filters('juanjimeneztj_attachment_breadcrumbs', false) ) {
		 	$breadcrumb = true;
		 	$breadclass = "kt_bc_active";
		} else {
		 	$breadcrumb = false;
		 	$breadclass = "kt_bc_not_active";
		}
	} else {
		// Other singe post.
		if(!empty($post_header_title)) {
			$page_title_title = $post_header_title;
		} else  {
			$page_title_title =  get_the_title();
		} 
		if( apply_filters('juanjimeneztj_custom_post_type_breadcrumbs', false, $post) ) {
		 	$breadcrumb = true;
		 	$breadclass = "kt_bc_active";
		} else {
		 	$breadcrumb = false;
		 	$breadclass = "kt_bc_not_active";
		}
	}

?>
	<div id="pageheader" class="titleclass post-header-area <?php echo esc_attr($breadclass);?>">
	<div class="header-color-overlay"></div>
	<?php do_action('juanjimeneztj_header_overlay'); ?>
		<div class="container">
			<div class="page-header">
				<div class="page-header-inner">
					<h1 class="post_head_title entry-title" itemprop="name" <?php echo 'data-max-size="'.esc_attr($title_data).'" data-min-size="'.esc_attr($title_small_data).'"'; ?>><?php echo wp_kses_post( $page_title_title ); ?></h1>
					<?php if(!empty($bsub)) { echo '<p class="subtitle" data-max-size="'.esc_attr($subtitle_data).'" data-min-size="'.esc_attr($subtitle_small_data).'"> '.do_shortcode($bsub).' </p>'; } ?>
				</div>
			</div>
		</div><!--container-->
		<?php if($breadcrumb) { juanjimeneztj_breadcrumbs(); } ?>
	</div><!--titleclass-->
