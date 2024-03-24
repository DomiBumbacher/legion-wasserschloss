<?php

if ( ! class_exists( 'Custom_Navwalker' ) ) {

    class Custom_Navwalker extends Walker_Nav_Menu{
        
        public function start_lvl( &$output, $depth = 0, $args = null ) {
            $indent  = str_repeat( "\t", $depth );
            if($depth == 0){
                $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
            }
            else{
                $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
            }
		}

        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

            /* var_dump($args); */
			$indent = str_repeat( "\t", $depth );

            $classes     = empty( $item->classes ) ? array() : (array) $item->classes;

			$class_names = 'nav-item';
            $class_names .= ' nav-item-' . ($depth + 1);

            if ( $args->has_children ) {
                $class_names .= ' nav-accordion';
            }

            if ( in_array( 'current-menu-item', $classes, true ) ) {
                $class_names .= ' active';
            }

            $href = !empty( $item->url) ? esc_url($item->url) : '';

            if($depth == 0){
                if ( $args->has_children ) {
                    $output .= "\n$indent<li class=\"" . $class_names ."\"><a href=\"" . $href . "\">" . $item->title . "</a>\n<span class=\"accordion-toggle\"></span>\n";
                }else{
                    $output .= "\n$indent<li class=\"" . $class_names ."\"><a href=\"" . $href . "\">" . $item->title . "</a>\n";
                }
            }
            else{
                $output .= "\n$indent<li class=\"" . $class_names ."\"><a href=\"" . $href . "\">" . $item->title ." </a>\n";
            }
		}

        public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
			if ( ! $element ) { return; }
				
			$id_field = $this->db_fields['id'];
			// Display this element.
			if ( is_object( $args[0] ) ) {
                $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
            }
			parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}
    }
}