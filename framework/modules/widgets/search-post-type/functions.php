<?php

if ( ! function_exists( 'kvell_edge_register_search_post_type_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function kvell_edge_register_search_post_type_widget( $widgets ) {
		$widgets[] = 'KvellEdgeSearchPostType';
		
		return $widgets;
	}
	
	add_filter( 'kvell_edge_register_widgets', 'kvell_edge_register_search_post_type_widget' );
}

if ( ! function_exists( 'kvell_edge_search_post_types' ) ) {
	function kvell_edge_search_post_types() {
		$user_id = get_current_user_id();
		
		if ( empty( $_POST ) || ! isset( $_POST ) ) {
			kvell_edge_ajax_status( 'error', esc_html__( 'All fields are empty', 'kvell' ) );
		} else {
			$args = array(
				'post_type'      => $_POST['postType'],
				'post_status'    => 'publish',
				'order'          => 'DESC',
				'orderby'        => 'date',
				's'              => $_POST['term'],
				'posts_per_page' => 5
			);
			
			$html  = '';
			$query = new WP_Query( $args );
			
			if ( $query->have_posts() ) {
				$html .= '<ul>';
					while ( $query->have_posts() ) {
						$query->the_post();
						$html .= '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
					}
				$html              .= '</ul>';
				$json_data['html'] = $html;
				kvell_edge_ajax_status( 'success', '', $json_data );
			} else {
				$html              .= '<ul>';
					$html              .= '<li>' . esc_html__( 'No posts found.', 'kvell' ) . '</li>';
				$html              .= '</ul>';
				$json_data['html'] = $html;
				kvell_edge_ajax_status( 'success', '', $json_data );
			}
		}
		
		wp_die();
	}
	
	add_action( 'wp_ajax_kvell_edge_search_post_types', 'kvell_edge_search_post_types' );
    add_action( 'wp_ajax_nopriv_kvell_edge_search_post_types', 'kvell_edge_search_post_types' );
}