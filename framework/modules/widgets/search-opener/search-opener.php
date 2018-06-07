<?php

class KvellEdgeSearchOpener extends KvellEdgeWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_search_opener',
			esc_html__( 'Edge Search Opener', 'kvell' ),
			array( 'description' => esc_html__( 'Display a "search" icon that opens the search form', 'kvell' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {

		$search_icon_params = array(
			array(
				'type'        => 'colorpicker',
				'name'        => 'search_icon_color',
				'title'       => esc_html__( 'Icon Color', 'kvell' ),
				'description' => esc_html__( 'Define color for search icon', 'kvell' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'search_icon_hover_color',
				'title'       => esc_html__( 'Icon Hover Color', 'kvell' ),
				'description' => esc_html__( 'Define hover color for search icon', 'kvell' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'search_icon_margin',
				'title'       => esc_html__( 'Icon Margin', 'kvell' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'kvell' )
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'show_label',
				'title'       => esc_html__( 'Enable Search Icon Text', 'kvell' ),
				'description' => esc_html__( 'Enable this option to show search text next to search icon in header', 'kvell' ),
				'options'     => kvell_edge_get_yes_no_select_array()
			)
		);

		$search_icon_pack_params = array(
			array(
				'type'        => 'textfield',
				'name'        => 'search_icon_size',
				'title'       => esc_html__( 'Icon Size (px)', 'kvell' ),
				'description' => esc_html__( 'Define size for search icon', 'kvell' )
			)
		);

		if ( kvell_edge_options()->getOptionValue( 'search_icon_pack' ) == 'icon_pack' ) {
			$this->params = array_merge( $search_icon_pack_params, $search_icon_params );
		} else {
			$this->params = $search_icon_params;
		}

	}
	
	public function widget( $args, $instance ) {
		global $kvell_php_global_IconCollections;

		$search_icon_source 		= kvell_edge_options()->getOptionValue( 'search_icon_source' );
		$search_icon_pack 			= kvell_edge_options()->getOptionValue( 'search_icon_pack' );
		$search_icon_svg_path 		= kvell_edge_options()->getOptionValue( 'search_icon_svg_path' );
		$enable_search_icon_text	= kvell_edge_options()->getOptionValue( 'enable_search_icon_text' );

		$search_icon_class_array = array(
			'edgtf-search-opener',
			'edgtf-icon-has-hover'
		);
	
		$search_icon_class_array[]  = $search_icon_source == 'icon_pack' ? 'edgtf-search-opener-icon-pack' : 'edgtf-search-opener-svg-path';

		$styles            = array();
		$show_search_text  = $instance['show_label'] == 'yes' || $enable_search_icon_text == 'yes' ? true : false;
		
		if ( ! empty( $instance['search_icon_size'] ) ) {
			$styles[] = 'font-size: ' . intval( $instance['search_icon_size'] ) . 'px';
		}
		
		if ( ! empty( $instance['search_icon_color'] ) ) {
			$styles[] = 'color: ' . $instance['search_icon_color'] . ';';
		}
		
		if ( ! empty( $instance['search_icon_margin'] ) ) {
			$styles[] = 'margin: ' . $instance['search_icon_margin'] . ';';
		}
		?>
		
		<a <?php kvell_edge_inline_attr( $instance['search_icon_hover_color'], 'data-hover-color' ); ?> <?php kvell_edge_inline_style( $styles ); ?> <?php kvell_edge_class_attribute( $search_icon_class_array ); ?> href="javascript:void(0)">
            <span class="edgtf-search-opener-wrapper">
                <?php if ( ( $search_icon_source == 'icon_pack' ) && isset( $search_icon_pack ) ) {
	                $kvell_php_global_IconCollections->getSearchIcon( $search_icon_pack, false );
                } else if ( ( $search_icon_source == 'svg_path' ) && isset( $search_icon_svg_path ) ) {
                	print $search_icon_svg_path; 
                }?>
	            <?php if ( $show_search_text ) { ?>
		            <span class="edgtf-search-icon-text"><?php esc_html_e( 'Search', 'kvell' ); ?></span>
	            <?php } ?>
            </span>
		</a>
	<?php }
}