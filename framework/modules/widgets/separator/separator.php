<?php

class KvellEdgeSeparatorWidget extends KvellEdgeWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_separator_widget',
			esc_html__( 'Edge Separator Widget', 'kvell' ),
			array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'kvell' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Type', 'kvell' ),
				'options' => array(
					'normal'     => esc_html__( 'Normal', 'kvell' ),
					'full-width' => esc_html__( 'Full Width', 'kvell' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'position',
				'title'   => esc_html__( 'Position', 'kvell' ),
				'options' => array(
					'center' => esc_html__( 'Center', 'kvell' ),
					'left'   => esc_html__( 'Left', 'kvell' ),
					'right'  => esc_html__( 'Right', 'kvell' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'border_style',
				'title'   => esc_html__( 'Style', 'kvell' ),
				'options' => array(
					'solid'  => esc_html__( 'Solid', 'kvell' ),
					'dashed' => esc_html__( 'Dashed', 'kvell' ),
					'dotted' => esc_html__( 'Dotted', 'kvell' )
				)
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'kvell' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'width',
				'title' => esc_html__( 'Width (px or %)', 'kvell' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'thickness',
				'title' => esc_html__( 'Thickness (px)', 'kvell' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'top_margin',
				'title' => esc_html__( 'Top Margin (px or %)', 'kvell' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'bottom_margin',
				'title' => esc_html__( 'Bottom Margin (px or %)', 'kvell' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		//prepare variables
		$params = '';
		
		//is instance empty?
		if ( is_array( $instance ) && count( $instance ) ) {
			//generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}
		}
		
		echo '<div class="widget edgtf-separator-widget">';
			echo do_shortcode( "[edgtf_separator $params]" ); // XSS OK
		echo '</div>';
	}
}