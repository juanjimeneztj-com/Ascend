<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Add class to walker ul
 */
class juanjimeneztj_Nav_Walker extends Walker_Nav_Menu {

	function start_lvl(&$output, $depth = 0, $args = array()) {
		$output .= "\n<ul class=\"sub-menu sf-dropdown-menu dropdown\">\n";
	}

}

/**
 * Remove the id="" on nav menu items
 */
add_filter('nav_menu_item_id', '__return_null');

/**
 * add span around text in links, add icon, add description.
 */
function juanjimeneztj_menu_nav_args($args, $item, $depth) {
	$juanjimeneztj_iconmenu = get_post_meta($item->ID, '_menu_item_kticonmenu', true);
	$args->link_before = ! empty( $juanjimeneztj_iconmenu) ? '<i class="'.esc_attr( $juanjimeneztj_iconmenu).'"></i>' : '';
	if($depth == 0) {
		$args->after = ! empty( $item->description ) ? '<span class="sf-description">'.esc_attr( $item->description ).'</span>' : '';
	}
	return $args;
}
add_filter('nav_menu_item_args', 'juanjimeneztj_menu_nav_args', 20, 3);

/**
* add classes
*/
function juanjimeneztj_menu_nav_li_css_classes($classes, $item, $args, $depth) {
	if ($juanjimeneztj_lgmenu = get_post_meta($item->ID, '_menu_item_ktlgmenu', true)) {
        $classes[] = 'kt-lgmenu';
        if ($juanjimeneztj_columnmenu = get_post_meta($item->ID, '_menu_item_ktcolumnmenu', true)) {
          $classes[] = 'kt-menu-column-'.$juanjimeneztj_columnmenu;
        }
    }
    if(in_array('menu-item-has-children', $classes)) {
		if ($depth === 0) {
		    $classes[] = 'sf-dropdown';
		} elseif ($depth === 1) {
		    $classes[] = 'sf-dropdown-submenu';
		} elseif ($depth === 2) {
		    $classes[] = 'sf-dropdown-submenu';
		} elseif ($depth === 3) {
		    $classes[] = 'sf-dropdown-submenu';
		}
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'juanjimeneztj_menu_nav_li_css_classes', 20, 4);
/**
 * Clean up wp_nav_menu_args
 *
 * Remove the container
 */
function juanjimeneztj_nav_menu_args($args = '') {
	$juanjimeneztj_args['container'] = false;
  	if (!$args['items_wrap']) {
    	$juanjimeneztj_args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
  	}

  	if ((!$args['walker'])) {
    	$juanjimeneztj_args['walker'] = new juanjimeneztj_Nav_Walker();
  	}

  	return array_merge($args, $juanjimeneztj_args);
}
add_filter('wp_nav_menu_args', 'juanjimeneztj_nav_menu_args', '10');

/**
 * Custom Menu Walker
 */
class juanjimeneztj_mobile_walker extends Walker_Nav_Menu {

  function start_lvl(&$output, $depth = 0, $args = array()) {
    $output .= "\n<ul class=\"sub-menu sf-dropdown-menu collapse\">\n";
  }
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    global $wp_query;

    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $slug = sanitize_key($item->title);

    $class_names = $value = '';
    $li_attributes = '';
    $classes = empty($item->classes) ? array() : (array) $item->classes;

    $id = 'menu-' . $slug;

    $classes[] = 'menu-item-'. $item->ID;

    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
    $class_names = $class_names ? ' class="' . $id . ' ' . esc_attr($class_names) . '"' : ' class="' . $id . '"';

    $output .= $indent . '<li '. $class_names . '>';

    $attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
    $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target    ) .'"' : '';
    $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn       ) .'"' : '';
    $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url       ) .'"' : '';
  
    //Submenus
    $has_sub = false;
    if( in_array( 'menu-item-has-children' , $classes ) ) {
      $has_sub = true;
    }
    $item_output  = $args->before;
    $item_output .= '<a'. $attributes . '>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</a>';
    if( $has_sub ){
      $item_output.= '<span class="kad-submenu-accordion collapse-next kad-submenu-accordion-open" data-parent=".kad-nav-collapse" data-toggle="collapse" data-target=""><i class="kt-icon-chevron-down"></i><i class="kt-icon-chevron-up"></i></span>';
    }
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }

  function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
    $element->is_dropdown = ((!empty($children_elements[$element->ID]) && (($depth + 1) < $max_depth || ($max_depth === 0))));

    if ($element->is_dropdown) {
      if ($depth === 0) {
        $element->classes[] = 'sf-dropdown';
        $element->classes[] = 'sf-dropdown-toggle';
      } elseif ($depth === 1) {
        $element->classes[] = 'sf-dropdown-submenu';
        $element->classes[] = 'sf-dropdown-toggle';
      } elseif ($depth === 2) {
        $element->classes[] = 'sf-dropdown-submenu';
        $element->classes[] = 'sf-dropdown-toggle';
      } elseif ($depth === 3) {
        $element->classes[] = 'sf-dropdown-submenu';
        $element->classes[] = 'sf-dropdown-toggle';
      }
    }


    parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
  }
}


