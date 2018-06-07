<?php

if ( ! function_exists( 'kvell_edge_like' ) ) {
	/**
	 * Returns KvellEdgeLike instance
	 *
	 * @return KvellEdgeLike
	 */
	function kvell_edge_like() {
		return KvellEdgeLike::get_instance();
	}
}

function kvell_edge_get_like() {
	
	echo wp_kses( kvell_edge_like()->add_like(), array(
		'span' => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'    => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'    => array(
			'href'  => true,
			'class' => true,
			'id'    => true,
			'title' => true,
			'style' => true
		)
	) );
}