<?php

class KvellEdgeSideAreaOpener extends KvellEdgeWidget
{
    public function __construct() {
        parent::__construct(
            'edgtf_side_area_opener',
            esc_html__('Edge Side Area Opener', 'kvell'),
            array('description' => esc_html__('Display a "hamburger" icon that opens the side area', 'kvell'))
        );

        $this->setParams();
    }

    protected function setParams() {
        $this->params = array(
            array(
                'type'        => 'colorpicker',
                'name'        => 'icon_color',
                'title'       => esc_html__('Side Area Opener Color', 'kvell'),
                'description' => esc_html__('Define color for side area opener', 'kvell')
            ),
            array(
                'type'        => 'colorpicker',
                'name'        => 'icon_hover_color',
                'title'       => esc_html__('Side Area Opener Hover Color', 'kvell'),
                'description' => esc_html__('Define hover color for side area opener', 'kvell')
            ),
            array(
                'type'        => 'textfield',
                'name'        => 'widget_margin',
                'title'       => esc_html__('Side Area Opener Margin', 'kvell'),
                'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'kvell')
            )
        );
    }

    public function widget($args, $instance) {
        $holder_styles = array();

        if (!empty($instance['icon_color'])) {
            $holder_styles[] = 'color: ' . $instance['icon_color'] . ';';
        }
        if (!empty($instance['widget_margin'])) {
            $holder_styles[] = 'margin: ' . $instance['widget_margin'];
        }
        ?>

        <a class="edgtf-side-menu-button-opener edgtf-icon-has-hover" <?php echo kvell_edge_get_inline_attr($instance['icon_hover_color'], 'data-hover-color'); ?>
           href="javascript:void(0)" <?php kvell_edge_inline_style($holder_styles); ?>>
            <span class="edgtf-sm-lines">
                <span class="edgtf-sm-line edgtf-line-1"></span>
                <span class="edgtf-sm-line edgtf-line-2"></span>
                <span class="edgtf-sm-line edgtf-line-3"></span>
                <span class="edgtf-sm-line edgtf-line-4"></span>
                <span class="edgtf-sm-line edgtf-line-5"></span>
                <span class="edgtf-sm-line edgtf-line-6"></span>
                <span class="edgtf-sm-line edgtf-line-7"></span>
                <span class="edgtf-sm-line edgtf-line-8"></span>
                <span class="edgtf-sm-line edgtf-line-9"></span>
            </span>
        </a>
    <?php }
}