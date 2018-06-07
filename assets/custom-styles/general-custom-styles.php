<?php

if(!function_exists('kvell_edge_design_styles')) {
    /**
     * Generates general custom styles
     */
    function kvell_edge_design_styles() {
	    $font_family = kvell_edge_options()->getOptionValue( 'google_fonts' );
	    if ( ! empty( $font_family ) && kvell_edge_is_font_option_valid( $font_family ) ) {
		    $font_family_selector = array(
			    'body'
		    );
		    echo kvell_edge_dynamic_css( $font_family_selector, array( 'font-family' => kvell_edge_get_font_option_val( $font_family ) ) );
	    }

		$first_main_color = kvell_edge_options()->getOptionValue('first_color');
        if(!empty($first_main_color)) {
            $color_selector = array(
                'a:hover',
                'h1 a:hover',
                'h2 a:hover',
                'h3 a:hover',
                'h4 a:hover',
                'h5 a:hover',
                'h6 a:hover',
                'p a:hover',
                '.edgtf-comment-holder .edgtf-comment-text .comment-edit-link:hover',
                '.edgtf-comment-holder .edgtf-comment-text .comment-reply-link:hover',
                '.edgtf-comment-holder .edgtf-comment-text .replay:hover',
                '.edgtf-comment-holder .edgtf-comment-text #cancel-comment-reply-link',
                '.edgtf-owl-slider .owl-nav .owl-next:hover',
                '.edgtf-owl-slider .owl-nav .owl-prev:hover',
                '.widget.widget_rss .edgtf-widget-title .rsswidget:hover',
                '.widget.widget_search button:hover',
                '.widget.widget_archive ul li a:hover',
                '.widget.widget_categories ul li a:hover',
                '.widget.widget_meta ul li a:hover',
                '.widget.widget_nav_menu ul li a:hover',
                '.widget.widget_pages ul li a:hover',
                '.widget.widget_recent_comments ul li a:hover',
                '.widget.widget_recent_entries ul li a:hover',
                '.widget.widget_tag_cloud a:hover',
                '.edgtf-side-menu .widget a:hover',
                '.edgtf-side-menu .widget.widget_rss .edgtf-footer-widget-title .rsswidget:hover',
                '.edgtf-side-menu .widget.widget_search button:hover',
                '.edgtf-side-menu .widget.widget_tag_cloud a:hover',
                '.edgtf-page-footer .widget a:hover',
                '.edgtf-page-footer .widget.widget_rss .edgtf-footer-widget-title .rsswidget:hover',
                '.edgtf-page-footer .widget.widget_search button:hover',
                '.edgtf-page-footer .widget.widget_tag_cloud a:hover',
                '.edgtf-page-footer .widget .footer-custom-menu ul li a:hover',
                '.edgtf-page-footer .edgtf-icon-widget-holder:hover',
                '.edgtf-top-bar a:hover',
                '.widget.widget_edgtf_twitter_widget .edgtf-twitter-widget.edgtf-twitter-standard li .edgtf-twitter-icon',
                '.widget.widget_edgtf_twitter_widget .edgtf-twitter-widget.edgtf-twitter-slider li .edgtf-tweet-text a',
                '.widget.widget_edgtf_twitter_widget .edgtf-twitter-widget.edgtf-twitter-slider li .edgtf-tweet-text span',
                '.widget.widget_edgtf_twitter_widget .edgtf-twitter-widget.edgtf-twitter-standard li .edgtf-tweet-text a:hover',
                '.widget.widget_edgtf_twitter_widget .edgtf-twitter-widget.edgtf-twitter-slider li .edgtf-twitter-icon i',
                '.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown .wpml-ls-item-toggle:hover',
                '.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown-click .wpml-ls-item-toggle:hover',
                '.edgtf-blog-holder article.sticky .edgtf-post-title a',
                '.edgtf-blog-holder article .edgtf-post-info-top>div a:hover',
                '.edgtf-blog-holder article .edgtf-post-info-bottom .edgtf-post-info-bottom-left>div a:hover',
                '.edgtf-blog-holder article .edgtf-post-info-bottom .edgtf-post-info-bottom-right>div a:hover',
                '.edgtf-bl-standard-pagination ul li.edgtf-bl-pag-active a',
                '.edgtf-blog-pagination ul li a.edgtf-pag-active',
                '.edgtf-author-description .edgtf-author-description-text-holder .edgtf-author-name a:hover',
                '.edgtf-author-description .edgtf-author-description-text-holder .edgtf-author-social-icons a:hover',
                '.edgtf-blog-single-navigation .edgtf-blog-single-next:hover',
                '.edgtf-blog-single-navigation .edgtf-blog-single-prev:hover',
                '.edgtf-blog-list-holder .edgtf-bli-info>div a:hover',
                '.edgtf-main-menu ul li a:hover',
                '.edgtf-main-menu>ul>li.edgtf-active-item>a',
                '.edgtf-light-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-main-menu>ul>li.edgtf-active-item>a',
                '.edgtf-light-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-main-menu>ul>li>a:hover',
                '.edgtf-drop-down .second .inner ul li.current-menu-ancestor>a',
                '.edgtf-drop-down .second .inner ul li.current-menu-item>a',
                '.edgtf-drop-down .wide .second .inner>ul>li>a',
                '.edgtf-drop-down .wide .second .inner>ul>li.current-menu-ancestor>a',
                '.edgtf-drop-down .wide .second .inner>ul>li.current-menu-item>a',
                '.edgtf-dark-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-fullscreen-menu-opener.edgtf-fm-opened',
                '.edgtf-dark-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-fullscreen-menu-opener:hover',
                '.edgtf-light-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-fullscreen-menu-opener.edgtf-fm-opened',
                '.edgtf-light-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-fullscreen-menu-opener:hover',
                'nav.edgtf-fullscreen-menu ul li a:hover',
                'nav.edgtf-fullscreen-menu ul li ul li.current-menu-ancestor>a',
                'nav.edgtf-fullscreen-menu ul li ul li.current-menu-item>a',
                'nav.edgtf-fullscreen-menu>ul>li.edgtf-active-item>a',
                '.edgtf-fullscreen-below-menu-widget-holder .edgtf-social-icons-group-widget .edgtf-social-icon-widget-holder:hover',
                '.edgtf-header-vertical .edgtf-vertical-menu ul li a:hover',
                '.edgtf-header-vertical .edgtf-vertical-menu ul li.current-menu-ancestor>a',
                '.edgtf-header-vertical .edgtf-vertical-menu ul li.current-menu-item>a',
                '.edgtf-header-vertical .edgtf-vertical-menu ul li.current_page_item>a',
                '.edgtf-header-vertical .edgtf-vertical-menu ul li.edgtf-active-item>a',
                '.edgtf-header-vertical.edgtf-light-header .edgtf-social-icons-group-widget .edgtf-social-icon-widget-holder:hover',
                '.edgtf-mobile-header .edgtf-mobile-menu-opener.edgtf-mobile-menu-opened a',
                '.edgtf-mobile-header .edgtf-mobile-nav .edgtf-grid>ul>li.edgtf-active-item>a',
                '.edgtf-mobile-header .edgtf-mobile-nav .edgtf-grid>ul>li.edgtf-active-item>h6',
                '.edgtf-mobile-header .edgtf-mobile-nav ul li a:hover',
                '.edgtf-mobile-header .edgtf-mobile-nav ul li h6:hover',
                '.edgtf-mobile-header .edgtf-mobile-nav ul ul li.current-menu-ancestor>a',
                '.edgtf-mobile-header .edgtf-mobile-nav ul ul li.current-menu-ancestor>h6',
                '.edgtf-mobile-header .edgtf-mobile-nav ul ul li.current-menu-item>a',
                '.edgtf-mobile-header .edgtf-mobile-nav ul ul li.current-menu-item>h6',
                '.edgtf-sticky-header .edgtf-sticky-holder ul>li>a:hover',
                '.edgtf-search-opener:hover',
                '.edgtf-search-page-holder article.sticky .edgtf-post-title a',
                '.edgtf-search-cover .edgtf-search-close:hover',
                '.edgtf-pl-filter-holder ul li.edgtf-pl-current span',
                '.edgtf-pl-filter-holder ul li:hover span',
                '.edgtf-pl-standard-pagination ul li.edgtf-pl-pag-active a',
                '.edgtf-portfolio-slider-holder .edgtf-portfolio-list-holder.edgtf-nav-light-skin .owl-nav .owl-next:hover',
                '.edgtf-portfolio-slider-holder .edgtf-portfolio-list-holder.edgtf-nav-light-skin .owl-nav .owl-prev:hover',
                '.edgtf-testimonials-holder.edgtf-testimonials-large-image.edgtf-testimonials-light .owl-nav .owl-next:hover',
                '.edgtf-testimonials-holder.edgtf-testimonials-large-image.edgtf-testimonials-light .owl-nav .owl-prev:hover',
                '.edgtf-testimonials-holder.edgtf-testimonials-standard.edgtf-testimonials-light .owl-nav .owl-next:hover',
                '.edgtf-testimonials-holder.edgtf-testimonials-standard.edgtf-testimonials-light .owl-nav .owl-prev:hover',
                '.edgtf-banner-holder .edgtf-banner-link-text .edgtf-banner-link-hover span',
                '.edgtf-social-share-holder.edgtf-dropdown .edgtf-social-share-dropdown-opener:hover',
                '.edgtf-team-holder .edgtf-team-social-holder .edgtf-team-icon .edgtf-icon-shortcode a:hover',
                '.edgtf-twitter-list-holder .edgtf-twitter-icon',
                '.edgtf-twitter-list-holder .edgtf-tweet-text a:hover',
                '.edgtf-twitter-list-holder .edgtf-twitter-profile a:hover',
            );

            $woo_color_selector = array();
            if(kvell_edge_is_woocommerce_installed()) {
                $woo_color_selector = array(
                    '.edgtf-pl-holder .edgtf-pli .edgtf-pli-rating',
                    '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-rating',
                    '.edgtf-pls-holder .edgtf-pls-text .edgtf-pls-rating',
                    '.edgtf-product-info .edgtf-pi-rating',
                    '.edgtf-woo-single-page .woocommerce-tabs #reviews .comment-respond .stars a.active:after',
                    '.edgtf-woo-single-page .woocommerce-tabs #reviews .comment-respond .stars a:before',
                    '.woocommerce .star-rating',
                    '.woocommerce-page .edgtf-content .edgtf-quantity-buttons .edgtf-quantity-minus:hover',
                    '.woocommerce-page .edgtf-content .edgtf-quantity-buttons .edgtf-quantity-plus:hover',
                    'div.woocommerce .edgtf-quantity-buttons .edgtf-quantity-minus:hover',
                    'div.woocommerce .edgtf-quantity-buttons .edgtf-quantity-plus:hover',
                    'ul.products>.product .edgtf-pl-category a:hover',
                    '.edgtf-woo-single-page .edgtf-single-product-summary .product_meta>span a:hover',
                    '.edgtf-shopping-cart-holder .edgtf-header-cart.edgtf-header-cart-icon-pack:hover',
                    '.edgtf-light-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-shopping-cart-holder .edgtf-header-cart:hover',
                    '.widget.woocommerce.widget_layered_nav ul li.chosen a',
                    '.edgtf-plc-holder.edgtf-plc-nav-light-skin .owl-nav .owl-next:hover',
                    '.edgtf-plc-holder.edgtf-plc-nav-light-skin .owl-nav .owl-prev:hover',
                    '.edgtf-pl-holder .edgtf-pli .edgtf-pli-category a:hover',
                    '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-text-inner .edgtf-pli-price',
                );
            }

            $color_selector = array_merge($color_selector, $woo_color_selector);

	        $color_important_selector = array(
                '.edgtf-light-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-icon-widget-holder:hover',
                '.edgtf-light-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-social-icon-widget-holder:hover',
                '.edgtf-light-header .edgtf-page-header>div:not(.fixed):not(.edgtf-sticky-header) .edgtf-menu-area .widget a:hover',
                '.edgtf-light-header .edgtf-page-header>div:not(.fixed):not(.edgtf-sticky-header).edgtf-menu-area .widget a:hover',
                '.edgtf-light-header.edgtf-header-vertical .edgtf-vertical-menu ul li a:hover',
                '.edgtf-light-header.edgtf-header-vertical .edgtf-vertical-menu ul li ul li.current-menu-ancestor>a',
                '.edgtf-light-header.edgtf-header-vertical .edgtf-vertical-menu ul li ul li.current-menu-item>a',
                '.edgtf-light-header.edgtf-header-vertical .edgtf-vertical-menu ul li ul li.current_page_item>a',
                '.edgtf-light-header.edgtf-header-vertical .edgtf-vertical-menu>ul>li.current-menu-ancestor>a',
                '.edgtf-light-header.edgtf-header-vertical .edgtf-vertical-menu>ul>li.edgtf-active-item>a',
                '.edgtf-light-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-search-opener:hover',
                '.edgtf-light-header .edgtf-top-bar .edgtf-search-opener:hover',
                '.edgtf-light-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-side-menu-button-opener.opened',
                '.edgtf-light-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-side-menu-button-opener:hover',
                '.edgtf-light-header .edgtf-top-bar .edgtf-side-menu-button-opener.opened',
                '.edgtf-light-header .edgtf-top-bar .edgtf-side-menu-button-opener:hover',
	        );

            $background_color_selector = array(
                '::selection',
                '::-moz-selection',
                '.edgtf-st-loader .pulse',
                '.edgtf-st-loader .double_pulse .double-bounce1',
                '.edgtf-st-loader .double_pulse .double-bounce2',
                '.edgtf-st-loader .cube',
                '.edgtf-st-loader .rotating_cubes .cube1',
                '.edgtf-st-loader .rotating_cubes .cube2',
                '.edgtf-st-loader .stripes>div',
                '.edgtf-st-loader .wave>div',
                '.edgtf-st-loader .two_rotating_circles .dot1',
                '.edgtf-st-loader .two_rotating_circles .dot2',
                '.edgtf-st-loader .five_rotating_circles .container1>div',
                '.edgtf-st-loader .five_rotating_circles .container2>div',
                '.edgtf-st-loader .five_rotating_circles .container3>div',
                '.edgtf-st-loader .atom .ball-1:before',
                '.edgtf-st-loader .atom .ball-2:before',
                '.edgtf-st-loader .atom .ball-3:before',
                '.edgtf-st-loader .atom .ball-4:before',
                '.edgtf-st-loader .clock .ball:before',
                '.edgtf-st-loader .mitosis .ball',
                '.edgtf-st-loader .lines .line1',
                '.edgtf-st-loader .lines .line2',
                '.edgtf-st-loader .lines .line3',
                '.edgtf-st-loader .lines .line4',
                '.edgtf-st-loader .fussion .ball',
                '.edgtf-st-loader .fussion .ball-1',
                '.edgtf-st-loader .fussion .ball-2',
                '.edgtf-st-loader .fussion .ball-3',
                '.edgtf-st-loader .fussion .ball-4',
                '.edgtf-st-loader .wave_circles .ball',
                '.edgtf-st-loader .pulse_circles .ball',
                '#edgtf-back-to-top .edgtf-icon-stack',
                '.widget #wp-calendar td#today',
                '.edgtf-social-icons-group-widget.edgtf-square-icons .edgtf-social-icon-widget-holder:hover',
                '.edgtf-social-icons-group-widget.edgtf-square-icons.edgtf-light-skin .edgtf-social-icon-widget-holder:hover',
                '.edgtf-blog-holder article.edgtf-category-boxed.edgtf-category-background-first-color .edgtf-post-info-category a',
                '.edgtf-blog-holder article.format-link .edgtf-post-text',
                '.edgtf-blog-holder article.format-audio .edgtf-blog-audio-holder .mejs-container .mejs-controls>.mejs-time-rail .mejs-time-total .mejs-time-current',
                '.edgtf-blog-holder article.format-audio .edgtf-blog-audio-holder .mejs-container .mejs-controls>a.mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
                '.edgtf-blog-holder.edgtf-blog-single article.format-link .edgtf-post-text',
                '.edgtf-blog-list-holder .edgtf-bl-item.edgtf-category-background-first-color .edgtf-bli-image-category-holder .edgtf-bli-info-category-boxed .edgtf-post-info-category a',
                '.edgtf-drop-down .second .inner ul li a:hover .item_outer .item_plus_mark',
                '.edgtf-drop-down .second .inner ul li a:hover .item_outer .item_plus_mark:before',
                '.edgtf-drop-down .second .inner ul li.current-menu-ancestor>a .item_outer .item_plus_mark',
                '.edgtf-drop-down .second .inner ul li.current-menu-item>a .item_outer .item_plus_mark',
                '.edgtf-drop-down .second .inner ul li.current-menu-ancestor>a .item_outer .item_plus_mark:before',
                '.edgtf-drop-down .second .inner ul li.current-menu-item>a .item_outer .item_plus_mark:before',
                '.edgtf-fullscreen-menu-opener:hover .edgtf-fm-lines .edgtf-fm-line',
                '.edgtf-search-fade .edgtf-fullscreen-with-sidebar-search-holder .edgtf-fullscreen-search-table',
                '.edgtf-side-menu-button-opener:hover .edgtf-sm-lines .edgtf-sm-line',
                '.edgtf-portfolio-list-holder.edgtf-pl-gallery-overlay .edgtf-pli-text-holder.edgtf-overlay-first-color',
                '.edgtf-portfolio-slider-holder .edgtf-portfolio-list-holder.edgtf-pag-light-skin .owl-dots .owl-dot.active span',
                '.edgtf-portfolio-slider-holder .edgtf-portfolio-list-holder.edgtf-pag-light-skin .owl-dots .owl-dot:hover span',
                '.edgtf-accordion-holder.edgtf-ac-boxed .edgtf-accordion-title.ui-state-active',
                '.edgtf-accordion-holder.edgtf-ac-boxed .edgtf-accordion-title.ui-state-hover',
                '.edgtf-btn.edgtf-dir-aware-hover .edgtf-button-overlay-holder .edgtf-button-overlay',
                '.edgtf-icon-shortcode.edgtf-circle',
                '.edgtf-icon-shortcode.edgtf-dropcaps.edgtf-circle',
                '.edgtf-icon-shortcode.edgtf-square',
                '.edgtf-image-marquee-holder.edgtf-im-with-content .edgtf-im-btn',
                '.edgtf-process-holder .edgtf-process-circle',
                '.edgtf-process-holder .edgtf-process-line',
            );

            $woo_background_color_selector = array();
            if(kvell_edge_is_woocommerce_installed()) {
                $woo_background_color_selector = array(
                    '.woocommerce .edgtf-out-of-stock',
                    '.edgtf-shopping-cart-dropdown .edgtf-cart-bottom .edgtf-view-cart',
                    '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-image-outer .edgtf-plc-image .edgtf-plc-out-of-stock',
                    '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-light-skin .added_to_cart:hover',
                    '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-light-skin .button:hover',
                    '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-dark-skin .added_to_cart:hover',
                    '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-dark-skin .button:hover',
                    '.edgtf-plc-holder.edgtf-plc-pag-light-skin .owl-dots .owl-dot span',
                    '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-image .edgtf-pli-out-of-stock',
                );
            }

            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);

            $background_color_important_selector = array(
                '.edgtf-btn.edgtf-btn-solid:not(.edgtf-btn-custom-hover-bg):not(.edgtf-dir-aware-hover):hover',
            );

            $border_color_selector = array(
                '.edgtf-st-loader .pulse_circles .ball',
                '.edgtf-owl-slider+.edgtf-slider-thumbnail>.edgtf-slider-thumbnail-item.active img',
            );

            echo kvell_edge_dynamic_css($color_selector, array('color' => $first_main_color));
	        echo kvell_edge_dynamic_css($color_important_selector, array('color' => $first_main_color.'!important'));
	        echo kvell_edge_dynamic_css($background_color_selector, array('background-color' => $first_main_color));
            echo kvell_edge_dynamic_css($background_color_important_selector, array('background-color' => $first_main_color.'!important'));
	        echo kvell_edge_dynamic_css($border_color_selector, array('border-color' => $first_main_color));
        }
	
	    $page_background_color = kvell_edge_options()->getOptionValue( 'page_background_color' );
	    if ( ! empty( $page_background_color ) ) {
		    $background_color_selector = array(
			    'body',
			    '.edgtf-content'
		    );
		    echo kvell_edge_dynamic_css( $background_color_selector, array( 'background-color' => $page_background_color ) );
	    }
	
	    $selection_color = kvell_edge_options()->getOptionValue( 'selection_color' );
	    if ( ! empty( $selection_color ) ) {
		    echo kvell_edge_dynamic_css( '::selection', array( 'background' => $selection_color ) );
		    echo kvell_edge_dynamic_css( '::-moz-selection', array( 'background' => $selection_color ) );
	    }
	
	    $preload_background_styles = array();
	
	    if ( kvell_edge_options()->getOptionValue( 'preload_pattern_image' ) !== "" ) {
		    $preload_background_styles['background-image'] = 'url(' . kvell_edge_options()->getOptionValue( 'preload_pattern_image' ) . ') !important';
	    }
	
	    echo kvell_edge_dynamic_css( '.edgtf-preload-background', $preload_background_styles );
    }

    add_action('kvell_edge_style_dynamic', 'kvell_edge_design_styles');
}

if ( ! function_exists( 'kvell_edge_content_styles' ) ) {
	function kvell_edge_content_styles() {
		$content_style = array();
		
		$padding = kvell_edge_options()->getOptionValue( 'content_padding' );
		if ( $padding !== '' ) {
			$content_style['padding'] = $padding;
		}
		
		$content_selector = array(
			'.edgtf-content .edgtf-content-inner > .edgtf-full-width > .edgtf-full-width-inner',
		);
		
		echo kvell_edge_dynamic_css( $content_selector, $content_style );
		
		$content_style_in_grid = array();
		
		$padding_in_grid = kvell_edge_options()->getOptionValue( 'content_padding_in_grid' );
		if ( $padding_in_grid !== '' ) {
			$content_style_in_grid['padding'] = $padding_in_grid;
		}
		
		$content_selector_in_grid = array(
			'.edgtf-content .edgtf-content-inner > .edgtf-container > .edgtf-container-inner',
		);
		
		echo kvell_edge_dynamic_css( $content_selector_in_grid, $content_style_in_grid );
	}
	
	add_action( 'kvell_edge_style_dynamic', 'kvell_edge_content_styles' );
}

if ( ! function_exists( 'kvell_edge_h1_styles' ) ) {
	function kvell_edge_h1_styles() {
		$margin_top    = kvell_edge_options()->getOptionValue( 'h1_margin_top' );
		$margin_bottom = kvell_edge_options()->getOptionValue( 'h1_margin_bottom' );
		
		$item_styles = kvell_edge_get_typography_styles( 'h1' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = kvell_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = kvell_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h1'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo kvell_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'kvell_edge_style_dynamic', 'kvell_edge_h1_styles' );
}

if ( ! function_exists( 'kvell_edge_h2_styles' ) ) {
	function kvell_edge_h2_styles() {
		$margin_top    = kvell_edge_options()->getOptionValue( 'h2_margin_top' );
		$margin_bottom = kvell_edge_options()->getOptionValue( 'h2_margin_bottom' );
		
		$item_styles = kvell_edge_get_typography_styles( 'h2' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = kvell_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = kvell_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h2'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo kvell_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'kvell_edge_style_dynamic', 'kvell_edge_h2_styles' );
}

if ( ! function_exists( 'kvell_edge_h3_styles' ) ) {
	function kvell_edge_h3_styles() {
		$margin_top    = kvell_edge_options()->getOptionValue( 'h3_margin_top' );
		$margin_bottom = kvell_edge_options()->getOptionValue( 'h3_margin_bottom' );
		
		$item_styles = kvell_edge_get_typography_styles( 'h3' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = kvell_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = kvell_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h3'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo kvell_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'kvell_edge_style_dynamic', 'kvell_edge_h3_styles' );
}

if ( ! function_exists( 'kvell_edge_h4_styles' ) ) {
	function kvell_edge_h4_styles() {
		$margin_top    = kvell_edge_options()->getOptionValue( 'h4_margin_top' );
		$margin_bottom = kvell_edge_options()->getOptionValue( 'h4_margin_bottom' );
		
		$item_styles = kvell_edge_get_typography_styles( 'h4' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = kvell_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = kvell_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h4'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo kvell_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'kvell_edge_style_dynamic', 'kvell_edge_h4_styles' );
}

if ( ! function_exists( 'kvell_edge_h5_styles' ) ) {
	function kvell_edge_h5_styles() {
		$margin_top    = kvell_edge_options()->getOptionValue( 'h5_margin_top' );
		$margin_bottom = kvell_edge_options()->getOptionValue( 'h5_margin_bottom' );
		
		$item_styles = kvell_edge_get_typography_styles( 'h5' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = kvell_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = kvell_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h5'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo kvell_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'kvell_edge_style_dynamic', 'kvell_edge_h5_styles' );
}

if ( ! function_exists( 'kvell_edge_h6_styles' ) ) {
	function kvell_edge_h6_styles() {
		$margin_top    = kvell_edge_options()->getOptionValue( 'h6_margin_top' );
		$margin_bottom = kvell_edge_options()->getOptionValue( 'h6_margin_bottom' );
		
		$item_styles = kvell_edge_get_typography_styles( 'h6' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = kvell_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = kvell_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h6'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo kvell_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'kvell_edge_style_dynamic', 'kvell_edge_h6_styles' );
}

if ( ! function_exists( 'kvell_edge_text_styles' ) ) {
	function kvell_edge_text_styles() {
		$item_styles = kvell_edge_get_typography_styles( 'text' );
		
		$item_selector = array(
			'p'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo kvell_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'kvell_edge_style_dynamic', 'kvell_edge_text_styles' );
}

if ( ! function_exists( 'kvell_edge_link_styles' ) ) {
	function kvell_edge_link_styles() {
		$link_styles      = array();
		$link_color       = kvell_edge_options()->getOptionValue( 'link_color' );
		$link_font_style  = kvell_edge_options()->getOptionValue( 'link_fontstyle' );
		$link_font_weight = kvell_edge_options()->getOptionValue( 'link_fontweight' );
		$link_decoration  = kvell_edge_options()->getOptionValue( 'link_fontdecoration' );
		
		if ( ! empty( $link_color ) ) {
			$link_styles['color'] = $link_color;
		}
		if ( ! empty( $link_font_style ) ) {
			$link_styles['font-style'] = $link_font_style;
		}
		if ( ! empty( $link_font_weight ) ) {
			$link_styles['font-weight'] = $link_font_weight;
		}
		if ( ! empty( $link_decoration ) ) {
			$link_styles['text-decoration'] = $link_decoration;
		}
		
		$link_selector = array(
			'a',
			'p a'
		);
		
		if ( ! empty( $link_styles ) ) {
			echo kvell_edge_dynamic_css( $link_selector, $link_styles );
		}
	}
	
	add_action( 'kvell_edge_style_dynamic', 'kvell_edge_link_styles' );
}

if ( ! function_exists( 'kvell_edge_link_hover_styles' ) ) {
	function kvell_edge_link_hover_styles() {
		$link_hover_styles     = array();
		$link_hover_color      = kvell_edge_options()->getOptionValue( 'link_hovercolor' );
		$link_hover_decoration = kvell_edge_options()->getOptionValue( 'link_hover_fontdecoration' );
		
		if ( ! empty( $link_hover_color ) ) {
			$link_hover_styles['color'] = $link_hover_color;
		}
		if ( ! empty( $link_hover_decoration ) ) {
			$link_hover_styles['text-decoration'] = $link_hover_decoration;
		}
		
		$link_hover_selector = array(
			'a:hover',
			'p a:hover'
		);
		
		if ( ! empty( $link_hover_styles ) ) {
			echo kvell_edge_dynamic_css( $link_hover_selector, $link_hover_styles );
		}
		
		$link_heading_hover_styles = array();
		
		if ( ! empty( $link_hover_color ) ) {
			$link_heading_hover_styles['color'] = $link_hover_color;
		}
		
		$link_heading_hover_selector = array(
			'h1 a:hover',
			'h2 a:hover',
			'h3 a:hover',
			'h4 a:hover',
			'h5 a:hover',
			'h6 a:hover'
		);
		
		if ( ! empty( $link_heading_hover_styles ) ) {
			echo kvell_edge_dynamic_css( $link_heading_hover_selector, $link_heading_hover_styles );
		}
	}
	
	add_action( 'kvell_edge_style_dynamic', 'kvell_edge_link_hover_styles' );
}

if ( ! function_exists( 'kvell_edge_button_styles' ) ) {
    function kvell_edge_button_styles() {

        $button_styles = kvell_edge_get_typography_styles( 'button' );

        $button_padding  = kvell_edge_options()->getOptionValue( 'button_padding' );

        if ( $button_padding !== '' ) {
            $button_styles['padding'] = $button_padding;
        }

        $button_selector = array(
            '.edgtf-btn',
        );

        if ( ! empty( $button_styles ) ) {
            echo kvell_edge_dynamic_css( $button_selector, $button_styles );
        }
    }

    add_action( 'kvell_edge_style_dynamic', 'kvell_edge_button_styles' );
}

if ( ! function_exists( 'kvell_edge_smooth_page_transition_styles' ) ) {
	function kvell_edge_smooth_page_transition_styles( $style ) {
		$id            = kvell_edge_get_page_id();
		$loader_style  = array();
		$current_style = '';
		
		$background_color = kvell_edge_get_meta_field_intersect( 'smooth_pt_bgnd_color', $id );
		if ( ! empty( $background_color ) ) {
			$loader_style['background-color'] = $background_color;
		}
		
		$loader_selector = array(
			'.edgtf-smooth-transition-loader'
		);
		
		if ( ! empty( $loader_style ) ) {
			$current_style .= kvell_edge_dynamic_css( $loader_selector, $loader_style );
		}
		
		$spinner_style = array();
		$spinner_color = kvell_edge_get_meta_field_intersect( 'smooth_pt_spinner_color', $id );
		if ( ! empty( $spinner_color ) ) {
			$spinner_style['background-color'] = $spinner_color;
		}
		
		$spinner_selectors = array(
			'.edgtf-st-loader .edgtf-rotate-circles > div',
			'.edgtf-st-loader .pulse',
			'.edgtf-st-loader .double_pulse .double-bounce1',
			'.edgtf-st-loader .double_pulse .double-bounce2',
			'.edgtf-st-loader .cube',
			'.edgtf-st-loader .rotating_cubes .cube1',
			'.edgtf-st-loader .rotating_cubes .cube2',
			'.edgtf-st-loader .stripes > div',
			'.edgtf-st-loader .wave > div',
			'.edgtf-st-loader .two_rotating_circles .dot1',
			'.edgtf-st-loader .two_rotating_circles .dot2',
			'.edgtf-st-loader .five_rotating_circles .container1 > div',
			'.edgtf-st-loader .five_rotating_circles .container2 > div',
			'.edgtf-st-loader .five_rotating_circles .container3 > div',
			'.edgtf-st-loader .atom .ball-1:before',
			'.edgtf-st-loader .atom .ball-2:before',
			'.edgtf-st-loader .atom .ball-3:before',
			'.edgtf-st-loader .atom .ball-4:before',
			'.edgtf-st-loader .clock .ball:before',
			'.edgtf-st-loader .mitosis .ball',
			'.edgtf-st-loader .lines .line1',
			'.edgtf-st-loader .lines .line2',
			'.edgtf-st-loader .lines .line3',
			'.edgtf-st-loader .lines .line4',
			'.edgtf-st-loader .fussion .ball',
			'.edgtf-st-loader .fussion .ball-1',
			'.edgtf-st-loader .fussion .ball-2',
			'.edgtf-st-loader .fussion .ball-3',
			'.edgtf-st-loader .fussion .ball-4',
			'.edgtf-st-loader .wave_circles .ball',
			'.edgtf-st-loader .pulse_circles .ball'
		);
		
		if ( ! empty( $spinner_style ) ) {
			$current_style .= kvell_edge_dynamic_css( $spinner_selectors, $spinner_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'kvell_edge_add_page_custom_style', 'kvell_edge_smooth_page_transition_styles' );
}