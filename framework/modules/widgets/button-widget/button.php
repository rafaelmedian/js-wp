<?php

class KvellEdgeButtonWidget extends KvellEdgeWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_button_widget',
			esc_html__( 'Edge Button Widget', 'kvell' ),
			array( 'description' => esc_html__( 'Add button element to widget areas', 'kvell' ) )
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
					'solid'   => esc_html__( 'Solid', 'kvell' ),
					'outline' => esc_html__( 'Outline', 'kvell' ),
					'simple'  => esc_html__( 'Simple', 'kvell' )
				)
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'size',
				'title'       => esc_html__( 'Size', 'kvell' ),
				'options'     => array(
					'small'  => esc_html__( 'Small', 'kvell' ),
					'medium' => esc_html__( 'Medium', 'kvell' ),
					'large'  => esc_html__( 'Large', 'kvell' ),
					'huge'   => esc_html__( 'Huge', 'kvell' )
				),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'kvell' )
			),
			array(
				'type'    => 'textfield',
				'name'    => 'text',
				'title'   => esc_html__( 'Text', 'kvell' ),
				'default' => esc_html__( 'Button Text', 'kvell' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'link',
				'title' => esc_html__( 'Link', 'kvell' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'target',
				'title'   => esc_html__( 'Link Target', 'kvell' ),
				'options' => kvell_edge_get_link_target_array()
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'kvell' )
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'hover_color',
				'title' => esc_html__( 'Hover Color', 'kvell' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'background_color',
				'title'       => esc_html__( 'Background Color', 'kvell' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'kvell' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'hover_background_color',
				'title'       => esc_html__( 'Hover Background Color', 'kvell' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'kvell' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'border_color',
				'title'       => esc_html__( 'Border Color', 'kvell' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'kvell' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'hover_border_color',
				'title'       => esc_html__( 'Hover Border Color', 'kvell' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'kvell' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'margin',
				'title'       => esc_html__( 'Margin', 'kvell' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'kvell' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$params = '';
		
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		// Filter out all empty params
		$instance = array_filter( $instance, function ( $array_value ) {
			return trim( $array_value ) != '';
		} );
		
		// Default values
		if ( ! isset( $instance['text'] ) ) {
			$instance['text'] = 'Button Text';
		}
		
		// Generate shortcode params
		foreach ( $instance as $key => $value ) {
			$params .= " $key='$value' ";
		}
		
		echo '<div class="widget edgtf-button-widget">';
			echo do_shortcode( "[edgtf_button $params]" ); // XSS OK
		echo '</div>';
	}
}