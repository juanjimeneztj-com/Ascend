<?php
	// Front Page Header
	$juanjimeneztj = juanjimeneztj_get_options();
	if(isset($juanjimeneztj['home_page_title_typed_text']) && $juanjimeneztj['home_page_title_typed_text'] == '1') {
		if(isset($juanjimeneztj['home_page_title_typed_text_loop']) && $juanjimeneztj['home_page_title_typed_text_loop'] == '1') {
			$loop = 'true';
		} else {
			$loop = 'false';
		}
		if(isset($juanjimeneztj['home_page_title_typed_text_delay']) && !empty($juanjimeneztj['home_page_title_typed_text_delay']) ) {
			$delay = $juanjimeneztj['home_page_title_typed_text_delay'];
		} else {
			$delay = '500';
		}
		$home_page_title = '<span class="kt_typed_element"';
		$i = 0;
		foreach ($juanjimeneztj['home_page_title_typed'] as $text) {
			$i ++;
			if($i == 1) {
				$data = 'first';
			} else if($i == 2) {
				$data = 'second';
			} else if($i == 3) {
				$data = 'third';
			} else if($i == 4) {
				$data = 'fourth';
			}
			$home_page_title .= 'data-'.esc_attr($data).'-sentence="'.esc_attr($text).'"';
			if($i == 4) {
				break;
			}
		}
		$home_page_title  .= 'data-sentence-count="'.esc_attr($i).'" data-loop="'.esc_attr($loop).'" data-speed="40" data-start-delay="500" data-back-delay="'.esc_attr($delay).'"></span>';
	} else {
		if(isset($juanjimeneztj['home_page_title'])) {
			$home_page_title = $juanjimeneztj['home_page_title'];
		} else {
			$home_page_title = 'Welcome to [site-name]';
		}
		if(!empty($home_page_title)) {
	        $home_page_title = str_replace('[site-name]',get_bloginfo('name'),$home_page_title);
	    }
	}
	if(isset($juanjimeneztj['home_page_sub_title'])) {
		$bsub = $juanjimeneztj['home_page_sub_title'];
	} else {
		$bsub = '[site-tagline]';
	} 
	if(!empty($bsub)) {
        $bsub = str_replace('[site-tagline]',get_bloginfo('description'),$bsub);
    }
	if(isset($juanjimeneztj['home_page_title_parallax']) && $juanjimeneztj['home_page_title_parallax'] == '1') {
		$b_parallax = 'kad-juanjimeneztj-parallax';
	} else {
		$b_parallax = '';
	} 
	if(isset($juanjimeneztj['home_page_title_align']) && !empty($juanjimeneztj['home_page_title_align'])) {
		$talign = 'text-align:'.$juanjimeneztj['home_page_title_align'];
	} else {
		$talign = '';
	}
	if(isset($juanjimeneztj['home_page_title_height'])) {
		$titleheight = 'height:'.$juanjimeneztj['home_page_title_height'].'px;';
	} else {
		$titleheight = '';
	}
	if(!empty($juanjimeneztj['home_page_title_color'])) {
		$tcolor = 'color:'.$juanjimeneztj['home_page_title_color'].';';
	} else {
		$tcolor = '';
	}
	if(!empty($juanjimeneztj['home_page_subtitle_color'])) {
		$scolor = 'color:'.$juanjimeneztj['home_page_subtitle_color'].';';
	} else {
		$scolor = '';
	}
	if(!empty($juanjimeneztj['home_page_title_max_size'])) {
			$title_data = $juanjimeneztj['home_page_title_max_size'];
	} else {
		if(isset($juanjimeneztj['single_header_title_size'])){
			$title_data = $juanjimeneztj['single_header_title_size'];
		} else {
			$title_data = '70';
		}
	}
	if(!empty($juanjimeneztj['home_page_title_min_size'])) {
		$title_small_data = $juanjimeneztj['home_page_title_min_size'];
	} else {
		if(isset($juanjimeneztj['single_header_title_size_small'])){
			$title_small_data = $juanjimeneztj['single_header_title_size_small'];
		} else {
			$title_small_data = '30';
		}
	}
	if(!empty($juanjimeneztj['home_page_subtitle_max_size'])) {
		$subtitle_data = $juanjimeneztj['home_page_subtitle_max_size'];
	} else {
		if(isset($juanjimeneztj['single_header_subtitle_size'])){
			$subtitle_data = $juanjimeneztj['single_header_subtitle_size'];
		} else {
			$subtitle_data = '40';
		}
	}
	if(!empty($juanjimeneztj['home_page_subtitle_min_size'])) {
		$subtitle_small_data = $juanjimeneztj['home_page_subtitle_min_size'];
	} else {
		if(isset($juanjimeneztj['single_header_subtitle_size_small'])){
			$subtitle_small_data = $juanjimeneztj['single_header_subtitle_size_small'];
		} else {
			$subtitle_small_data = '20';
		}
	}
	if(!empty($juanjimeneztj['home_pagetitle_background']['background-image'])) {
		$bg_img = 'url('.$juanjimeneztj['home_pagetitle_background']['background-image'].')';
		$bg_repeat = 'background-repeat: ' . $juanjimeneztj['home_pagetitle_background']['background-repeat'].';';
		$bg_size = 'background-size: ' .$juanjimeneztj['home_pagetitle_background']['background-size'].';';
		$bg_position = 'background-position: ' .$juanjimeneztj['home_pagetitle_background']['background-position'].';';
		$bg_attachment = 'background-attachment: ' .$juanjimeneztj['home_pagetitle_background']['background-attachment'].';';
	} else {
		$bg_img = '';
		$bg_repeat = '';
		$bg_size = '';
		$bg_position = '';
		$bg_attachment = '';
	}
	if(!empty($juanjimeneztj['home_pagetitle_background']['background-color'])) {
		$bgcolor = $juanjimeneztj['home_pagetitle_background']['background-color'];
	} else {
		$bgcolor = '';
	}
	if(!empty($bgcolor) || !empty($bg_img)) {
		$bg_style = 'background:'.$bgcolor.' '.$bg_img.';';
	} else {
		$bg_style = '';
	}
	?>
	<div id="pageheader" class="titleclass kt_desktop_slider post-header-area kt_bc_not_active <?php echo esc_attr($b_parallax);?>" style="<?php echo esc_attr($bg_style).' '.esc_attr($bg_position).' '.esc_attr($bg_size).' '.esc_attr($bg_repeat).' '.esc_attr($bg_attachment);?>">
	<div class="header-color-overlay"></div>
	<?php do_action('juanjimeneztj_header_overlay'); ?>
		<div class="container">
			<div class="page-header" style="<?php echo esc_attr($talign);?>">
				<div class="page-header-inner">
					<h1 class="page_head_title home_head_title entry-title" itemprop="name" <?php echo 'data-max-size="'.esc_attr($title_data).'" data-min-size="'.esc_attr($title_small_data).'"'; ?>>
						<?php echo do_shortcode($home_page_title); ?>
					</h1>
					<?php if(!empty($bsub)) { echo '<p class="subtitle" data-max-size="'.esc_attr($subtitle_data).'" data-min-size="'.esc_attr($subtitle_small_data).'"  style="'.esc_attr($scolor).'"> '.do_shortcode($bsub).' </p>'; } ?>
				</div>
			</div>
		</div><!--container-->
	</div><!--titleclass-->