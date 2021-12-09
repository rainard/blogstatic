<?php
namespace Elementor;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;   
}

// Class Item Lists
class Item_Lists_Elementor_Widget extends Widget_Base {

    //Function for get the slug of the element name.
    public function get_name() {
        return 'ile-item-lists-elementor-widget';
    }

    //Function for get the name of the element.
    public function get_title() {
        return esc_html__('Item Lists', ILE_DOMAIN);
    }

    //Function for get the icon of the element.
    public function get_icon() {
        return 'eicon-bullet-list';
    }

    //Function for include element into the category.
    public function get_categories() {
        return ['item-lists'];
    }

    //Function for include element keywords.
    public function get_keywords() {
        return ['item list', 'icon list', 'bullet list'];
	}

    // Adding the controls fields for the Item Lists Element
    protected function _register_controls() {

        // Start Item Lists General Section
        $this->start_controls_section(
            'section_general', array(
                'label'         => __('General', ILE_DOMAIN),
            )
        );

        $this->add_control(
            'item_lists_style', [
                'label'         => __('List Style', ILE_DOMAIN),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'material-bullet-style'             => __('Material Bullets', ILE_DOMAIN),
                    'shape-bullet-style'                => __('Shape Bullets', ILE_DOMAIN),
                    'timeline-bullet-style'             => __('Timeline Bullets', ILE_DOMAIN),
                    'alternate-timeline-bullet-style'   => __('Alternate Timeline Bullets', ILE_DOMAIN),
                    'gradient-ordered-bullet-style'     => __('Gradient Ordered Bullets', ILE_DOMAIN),
                ],
                'default'       => 'material-bullet-style',
            ]
        );

        $this->end_controls_section();
        // End Item Lists General Section

        // Start Item Lists Items Section
        // Material Bullet Style Items
        $this->start_controls_section(
            'section_material_list_items', array(
                'label'         => __('Items', ILE_DOMAIN),
                'condition'     => [
                    'item_lists_style'  => 'material-bullet-style',
                ],
            )
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'material_list_items_title',
            [
                'label'         => __('Title', ILE_DOMAIN),
                'type'          => Controls_Manager::TEXT,
                'default'       => __('Title', ILE_DOMAIN),
            ]
        );

        $repeater->add_control(
            'material_list_items_content',
            [
                'label'         => __('Content', ILE_DOMAIN),
                'type'          => Controls_Manager::TEXTAREA,
                'default'       => __('Lorem ipsum dolor sit amet, consectetur adipisi cing elit, sed do eiusmod tempor incididunt ut abore et dolore magna', ILE_DOMAIN),
            ]
        );

        $repeater->add_control(
            'material_list_items_display_icon',
            [
                'label'         => __('Icon', ILE_DOMAIN),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'none'  => [
                        'title' => __('None', ILE_DOMAIN),
                        'icon'  => 'fa fa-ban',
                    ],
                    'icon'  => [
                        'title' => __('Icon', ILE_DOMAIN),
                        'icon'  => 'fa fa-info-circle',
                    ],
                    'image'  => [
                        'title' => __('Image', ILE_DOMAIN),
                        'icon'  => 'fas fa-image',
                    ],
                ],
                'default'       => 'icon',
            ]
        );

        $repeater->add_control(
			'material_list_items_image',
			[
				'type'          => Controls_Manager::MEDIA,
				'default'       => [
					'url'       => Utils::get_placeholder_image_src(),
				],
                'condition'     => [
                    'material_list_items_display_icon'   => 'image',
                ],
			]
		);

        $repeater->add_control(
            'material_list_items_icon',
            [
                'type'          => Controls_Manager::ICONS,
                'default'       => [
                    'value'     => 'fas fa-leaf',
                    'library'   => 'fa-solid',
                ],
                'condition'     => [
                    'material_list_items_display_icon'   => 'icon',
                ],
            ]
        );

        $repeater->add_control(
            'material_icon_color', [
                'label'         => __('Icon Color', ILE_DOMAIN),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#ffffff',
                'condition'     => [
                    'material_list_items_display_icon'   => 'icon',
                ],
            ]
        );

        $repeater->add_control(
            'material_icon_bg_color', [
                'label'         => __('Icon Background Color', ILE_DOMAIN),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#ff8181',
                'condition'     => [
                    'material_list_items_display_icon'   => 'icon',
                ],
            ]
        );

        $repeater->add_control(
            'material_title_color', [
                'label'         => __('Title Color', ILE_DOMAIN),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#ffffff',
            ]
        );

        $repeater->add_control(
            'material_content_color', [
                'label'         => __('Content Color', ILE_DOMAIN),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#ffffff',
            ]
        );

        $repeater->add_control(
            'material_content_bg_color', [
                'label'         => __('Content Background Color', ILE_DOMAIN),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#ec6161',
            ]
        );

        $this->add_control(
			'material_item_lists',
			[
				'label'         => __( 'List Items', ILE_DOMAIN ),
                'type'          => Controls_Manager::REPEATER,
                'fields'        => $repeater->get_controls(),
                'render_type'   => 'template',
                'default'       => [
                    [
                        'material_list_items_title'     => 'List One', 
                        'material_content_bg_color'     => '#ec6161'
                    ],
                    [
                        'material_list_items_title'     => 'List Two',
                        'material_content_bg_color'     => '#2DCEC6',
                        'material_icon_bg_color'        => '#32DDD4',
                        'material_list_items_icon'      => [
                            'value'     => 'fas fa-laugh',
                            'library'   => 'fa-solid',
                        ],
                    ],
                    [
                        'material_list_items_title'     => 'List Three',
                        'material_content_bg_color'     => '#C56EE3',
                        'material_icon_bg_color'        => '#DB87F7',
                        'material_list_items_icon'      => [
                            'value'     => 'fas fa-paw',
                            'library'   => 'fa-solid',
                        ],
                    ],
                    [
                        'material_list_items_title'     => 'List Four',
                        'material_content_bg_color'     => '#868BFF',
                        'material_icon_bg_color'        => '#A8ADFF',
                        'material_list_items_icon'      => [
                            'value'     => 'fas fa-magnet',
                            'library'   => 'fa-solid',
                        ],
                    ],
                ],
                'title_field'   => '{{{ material_list_items_title }}}'
			]
        );

        $this->end_controls_section();

        // Shape Bullet Style Items
        $this->start_controls_section(
            'section_shape_list_items', array(
                'label'         => __('Items', ILE_DOMAIN),
                'condition'     => [
                    'item_lists_style'      => 'shape-bullet-style',
                ],
            )
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'shape_list_items_title',
            [
                'label'         => __('Title', ILE_DOMAIN),
                'type'          => Controls_Manager::TEXT,
                'default'       => __('Title', ILE_DOMAIN),
            ]
        );

        $repeater->add_control(
            'shape_list_items_content',
            [
                'label'         => __('Content', ILE_DOMAIN),
                'type'          => Controls_Manager::TEXTAREA,
                'default'       => __('Lorem ipsum dolor sit amet, consectetur adipisi cing elit, sed do eiusmod tempor incididunt ut abore et dolore magna', ILE_DOMAIN),
            ]
        );

        $repeater->add_control(
            'shape_list_items_display_icon',
            [
                'label'         => __('Icon', ILE_DOMAIN),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'none'  => [
                        'title' => __('None', ILE_DOMAIN),
                        'icon'  => 'fa fa-ban',
                    ],
                    'icon'  => [
                        'title' => __('Icon', ILE_DOMAIN),
                        'icon'  => 'fa fa-info-circle',
                    ],
                ],
                'default'       => 'icon',
            ]
        );

        $repeater->add_control(
            'shape_list_items_icon',
            [
                'type'          => Controls_Manager::ICONS,
                'default'       => [
                    'value'     => 'fas fa-leaf',
                    'library'   => 'fa-solid',
                ],
                'condition'     => [
                    'shape_list_items_display_icon'   => 'icon',
                ],
            ]
        );

        $repeater->add_control(
            'shape_list_item_icon_style', [
                'label'         => __('Icon Box Style', ILE_DOMAIN),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'diamond-icon-style'        => __('Diamond', ILE_DOMAIN),
                    'circle-icon-style'         => __('Circle', ILE_DOMAIN),
                    'square-icon-style'         => __('Square', ILE_DOMAIN),
                ],
                'default'       => 'diamond-icon-style',
            ]
        );

        $this->add_control(
			'shape_item_lists',
			[
				'label'         => __( 'List Items', ILE_DOMAIN ),
                'type'          => Controls_Manager::REPEATER,
                'fields'        => $repeater->get_controls(),
                'render_type'   => 'template',
                'default'       => [
                    [
                        'shape_list_items_title'      => 'List One',
                    ],
                    [
                        'shape_list_items_title'      => 'List Two',
                        'shape_list_item_icon_style'  => 'circle-icon-style',
                        'shape_list_items_icon'       => [
                            'value'     => 'fas fa-laugh',
                            'library'   => 'fa-solid',
                        ],
                    ],
                    [
                        'shape_list_items_title'      => 'List Three',
                        'shape_list_item_icon_style'  => 'square-icon-style',
                        'shape_list_items_icon'       => [
                            'value'     => 'fas fa-paw',
                            'library'   => 'fa-solid',
                        ],
                    ],
                ],
                'title_field'   => '{{{ shape_list_items_title }}}'
			]
        );

        $this->end_controls_section();

        // Timeline Bullet & Alternate Timeline Bullet Style Items
        $this->start_controls_section(
            'section_timeline_list_items', array(
                'label'         => __('Items', ILE_DOMAIN),
                'condition'     => [
                    'item_lists_style'      => [ 'timeline-bullet-style', 'alternate-timeline-bullet-style' ],
                ],
            )
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'timeline_list_items_title',
            [
                'label'         => __('Title', ILE_DOMAIN),
                'type'          => Controls_Manager::TEXT,
                'default'       => __('Title', ILE_DOMAIN),
            ]
        );

        $repeater->add_control(
            'timeline_list_items_content',
            [
                'label'         => __('Content', ILE_DOMAIN),
                'type'          => Controls_Manager::TEXTAREA,
                'default'       => __('Lorem ipsum dolor sit amet, consectetur adipisi cing elit, sed do eiusmod tempor incididunt ut abore et dolore magna', ILE_DOMAIN),
            ]
        );

        $repeater->add_control(
            'timeline_list_items_display_icon',
            [
                'label'         => __('Icon', ILE_DOMAIN),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'none'  => [
                        'title' => __('None', ILE_DOMAIN),
                        'icon'  => 'fa fa-ban',
                    ],
                    'icon'  => [
                        'title' => __('Icon', ILE_DOMAIN),
                        'icon'  => 'fa fa-info-circle',
                    ],
                    'image'  => [
                        'title' => __('Image', ILE_DOMAIN),
                        'icon'  => 'fas fa-image',
                    ],
                ],
                'default'       => 'icon',
            ]
        );

        $repeater->add_control(
			'timeline_list_items_image',
			[
				'type'          => Controls_Manager::MEDIA,
				'default'       => [
					'url'       => Utils::get_placeholder_image_src(),
				],
                'condition'     => [
                    'timeline_list_items_display_icon'   => 'image',
                ],
			]
		);

        $repeater->add_control(
            'timeline_list_items_icon',
            [
                'type'          => Controls_Manager::ICONS,
                'default'       => [
                    'value'     => 'fas fa-leaf',
                    'library'   => 'fa-solid',
                ],
                'condition'     => [
                    'timeline_list_items_display_icon'   => 'icon',
                ],
            ]
        );

        $repeater->add_control(
            'timeline_icon_color', [
                'label'         => __('Icon Color', ILE_DOMAIN),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#ffffff',
                'condition'     => [
                    'timeline_list_items_display_icon'   => 'icon',
                ],
            ]
        );

        $repeater->add_control(
            'timeline_icon_bg_color', [
                'label'         => __('Icon Background Color', ILE_DOMAIN),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#ff8181',
                'condition'     => [
                    'timeline_list_items_display_icon'   => 'icon',
                ],
            ]
        );

        $this->add_control(
			'timeline_item_lists',
			[
				'label'         => __( 'List Items', ILE_DOMAIN ),
                'type'          => Controls_Manager::REPEATER,
                'fields'        => $repeater->get_controls(),
                'render_type'   => 'template',
                'default'       => [
                    [
                        'timeline_list_items_title'      => 'List One',
                    ],
                    [
                        'timeline_list_items_title'      => 'List Two',
                        'timeline_icon_bg_color'         => '#32DDD4',
                        'timeline_list_items_icon'       => [
                            'value'     => 'fas fa-laugh',
                            'library'   => 'fa-solid',
                        ],
                    ],
                    [
                        'timeline_list_items_title'      => 'List Three',
                        'timeline_icon_bg_color'         => '#DB87F7',
                        'timeline_list_items_icon'       => [
                            'value'     => 'fas fa-paw',
                            'library'   => 'fa-solid',
                        ],
                    ],
                    [
                        'timeline_list_items_title'      => 'List Four',
                        'timeline_icon_bg_color'         => '#A8ADFF',
                        'timeline_list_items_icon'       => [
                            'value'     => 'fas fa-magnet',
                            'library'   => 'fa-solid',
                        ],
                    ],
                ],
                'title_field'   => '{{{ timeline_list_items_title }}}'
			]
        );

        $this->end_controls_section();

        // Gradient Ordered Bullet Style Items
        $this->start_controls_section(
            'section_gradient_ordered_list_items', array(
                'label'         => __('Items', ILE_DOMAIN),
                'condition'     => [
                    'item_lists_style'  => 'gradient-ordered-bullet-style',
                ],
            )
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'gradient_ordered_list_items_title',
            [
                'label'         => __('Title', ILE_DOMAIN),
                'type'          => Controls_Manager::TEXT,
                'default'       => __('Title', ILE_DOMAIN),
            ]
        );

        $repeater->add_control(
            'gradient_ordered_list_items_content',
            [
                'label'         => __('Content', ILE_DOMAIN),
                'type'          => Controls_Manager::TEXTAREA,
                'default'       => __('Lorem ipsum dolor sit amet, consectetur adipisi cing elit, sed do eiusmod tempor incididunt ut abore et dolore magna', ILE_DOMAIN),
            ]
        );

        $this->add_control(
			'gradient_ordered_item_lists',
			[
				'label'         => __( 'List Items', ILE_DOMAIN ),
                'type'          => Controls_Manager::REPEATER,
                'fields'        => $repeater->get_controls(),
                'render_type'   => 'template',
                'default'       => [
                    [
                        'gradient_ordered_list_items_title'     => 'List One', 
                    ],
                    [
                        'gradient_ordered_list_items_title'     => 'List Two',
                    ],
                    [
                        'gradient_ordered_list_items_title'     => 'List Three',
                    ],
                    [
                        'gradient_ordered_list_items_title'     => 'List Four',
                    ],
                ],
                'title_field'   => '{{{ gradient_ordered_list_items_title }}}'
			]
        );

        $this->end_controls_section();
        // End Item Lists Items Section

        // Start Box Style Control       
        $this->start_controls_section(
            'list_items_box_style', [
                'label'         => __('Box', ILE_DOMAIN),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'list_items_box_column_direction', [
                'label'         => __('Direction', ILE_DOMAIN),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'ltr' => __('LTR', ILE_DOMAIN),
                    'rtl' => __('RTL', ILE_DOMAIN),
                ],
                'condition'     => [
                    'item_lists_style!' => ['alternate-timeline-bullet-style', 'gradient-ordered-bullet-style'],
                ],
                'default'       => 'ltr',
            ]
        );

        $this->add_control(
            'list_items_number_box_background_color', [
                'label'         => __('Background Color', ILE_DOMAIN),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#F0F0F0',
                'selectors'     => [
                    '{{WRAPPER}} .ile-gradient-ordered-bullet-style .ile-content-box'    => 'background: {{VALUE}};',
                ],
                'condition'     => [
                    'item_lists_style' => 'gradient-ordered-bullet-style',
                ],
            ]
        );

        $this->add_control(
            'list_items_box_margin', [
                'label'         => __('Box Margin', ILE_DOMAIN),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .ile-gradient-ordered-bullet-style .ile-content-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'     => [
                    'item_lists_style' => 'gradient-ordered-bullet-style',
                ],
            ]
        );

        $this->add_control(
            'list_items_box_padding', [
                'label'         => __('Content Padding', ILE_DOMAIN),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .ile-content-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'list_items_box_spacing', [
                'label'         => __('Space Between Box', ILE_DOMAIN),
                'type'          => Controls_Manager::SLIDER,
                'range'         => [
                    'px'    => [
                        'min'   => 0,
                        'max'   => 100,
                    ],
                ],
                'default'       => [ 'size'  => 20 ],
                'selectors'     => [
                    '{{WRAPPER}} .ile-container-row,
                     {{WRAPPER}} .ile-shape-bullet-style .ile-content-box' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .ile-timeline-bullet-style .ile-container-holder,
                     {{WRAPPER}} .ile-alternate-timeline-bullet-style .ile-container-holder' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition'     => [
                    'item_lists_style!' => 'gradient-ordered-bullet-style',
                ],
            ]
        );

        $this->add_responsive_control(
            'list_items_box_border_radius', [
                'label'         => __('Border Radius', ILE_DOMAIN),
                'type'          => Controls_Manager::SLIDER,
                'range'         => [
                    'px'    => [
                        'min'   => 0,
                        'max'   => 100,
                    ],
                ],
                'condition'     => [
                    'item_lists_style' => 'material-bullet-style',
                ],
                'selectors'     => [
                    '{{WRAPPER}} .ile-container-row' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        // End Box Style Control

        // Start Timeline Style Control
        $this->start_controls_section(
            'list_items_timeline_style', [
                'label'         => __('Timeline', ILE_DOMAIN),
                'tab'           => Controls_Manager::TAB_STYLE,
                'condition'     => [
                    'item_lists_style' => [ 'timeline-bullet-style', 'alternate-timeline-bullet-style' ],
                ],
            ]
        );

        $this->add_control(
            'list_items_timeline_color', [
                'label'         => __('Timeline Color', ILE_DOMAIN),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#d6d6d6',
                'selectors'     => [
                    '{{WRAPPER}} .ile-timeline-vertical,
                     {{WRAPPER}} .ile-timeline-horizontal'    => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'list_items_timeline_width', [
                'label'         => __('Timeline Width', ILE_DOMAIN),
                'type'          => Controls_Manager::SLIDER,
                'range'         => [
                    'px'    => [
                        'min'   => 0,
                        'max'   => 10,
                    ],
                ],
                'default'       => [ 'size'  => 2 ],
                'selectors'     => [
                    '{{WRAPPER}} .ile-timeline-vertical'   => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .ile-timeline-horizontal' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .ile-timeline-right'      => 'margin-right: calc({{SIZE}}{{UNIT}} / 2);',
                    '{{WRAPPER}} .ile-timeline-left'       => 'margin-left: calc({{SIZE}}{{UNIT}} / 2);',
                ],
            ]
        );

        $this->add_responsive_control(
            'list_items_timeline_horizontal_width', [
                'label'         => __('Timeline Horizontal Width', ILE_DOMAIN),
                'type'          => Controls_Manager::SLIDER,
                'range'         => [
                    'px'    => [
                        'min'   => 0,
                        'max'   => 100,
                    ],
                ],
                'default'       => [ 'size'  => 50 ],
                'selectors'     => [
                    '{{WRAPPER}} .ile-timeline-horizontal' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'list_items_timeline_horizontal_spacing', [
                'label'         => __('Timeline Horizontal Spacing', ILE_DOMAIN),
                'type'          => Controls_Manager::SLIDER,
                'range'         => [
                    'px'    => [
                        'min'   => 0,
                        'max'   => 100,
                    ],
                ],
                'default'       => [ 'size'  => 40 ],
                'selectors'     => [
                    '{{WRAPPER}} .ile-timeline-horizontal' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        // End Timeline Style Control       

        // Start Number Style Control
        $this->start_controls_section(
            'list_items_number_style', [
                'label'         => __('Number', ILE_DOMAIN),
                'tab'           => Controls_Manager::TAB_STYLE,
                'condition'     => [
                    'item_lists_style' => 'gradient-ordered-bullet-style',
                ],
            ]
        );

        $this->add_control(
            'list_items_number_color', [
                'label'         => __('Color', ILE_DOMAIN),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#000000',
                'selectors'     => [
                    '{{WRAPPER}} .ile-gradient-ordered-bullet-style li.ile-content-container::before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'          => 'typography_list_item_number',
                'selector'      => '{{WRAPPER}} .ile-gradient-ordered-bullet-style li.ile-content-container::before',
            ]
        );

        $this->add_responsive_control(
            'list_items_number_box_size', [
                'label'         => __('Background Size', ILE_DOMAIN),
                'type'          => Controls_Manager::SLIDER,
                'range'         => [
                    'px'    => [
                        'min'   => 0,
                        'max'   => 200,
                    ],
                ],
                'default'       => [ 'size'  => 60 ],
                'selectors'     => [
                    '{{WRAPPER}} .ile-gradient-ordered-bullet-style li.ile-content-container::before'    => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'list_items_number_box_alignment', [
                'label'         => __('Vertical Alignment', ILE_DOMAIN),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'top'          => __('Top', ILE_DOMAIN),
                    'middle'       => __('Middle', ILE_DOMAIN),
                    'bottom'       => __('Botttom', ILE_DOMAIN),
                ],
                'default'       => 'top',
            ]
        );

        $this->add_group_control(
			Group_Control_Background::get_type(), array(
				'name'          => 'list_items_number_background_color',
				'types'         => array( 'classic', 'gradient' ),
				'selector'      => '{{WRAPPER}} .ile-gradient-ordered-bullet-style li.ile-content-container::before',
			)
		);

        $this->add_control(
            'list_items_number_radius', [
                'label'         => __('Radius', ILE_DOMAIN),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .ile-gradient-ordered-bullet-style li.ile-content-container::before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        // End Number Style Control

        // Start Icon Style Control 
        $this->start_controls_section(
            'list_items_icon_style', [
                'label'         => __('Icon', ILE_DOMAIN),
                'tab'           => Controls_Manager::TAB_STYLE,
                'condition'     => [
                    'item_lists_style!' => 'gradient-ordered-bullet-style',
                ],
            ]
        );

        $this->add_responsive_control(
            'list_items_icon_size', [
                'label'         => __('Icon Size', ILE_DOMAIN),
                'type'          => Controls_Manager::SLIDER,
                'range'         => [
                    'px'    => [
                        'min'   => 0,
                        'max'   => 100,
                    ],
                ],
                'default'       => [ 'size'  => 25 ],
                'selectors'     => [
                    '{{WRAPPER}} .ile-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'list_items_icon_color', [
                'label'         => __('Icon Color', ILE_DOMAIN),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#00DAE6',
                'condition'     => [
                    'item_lists_style' => 'shape-bullet-style',
                ],
                'selectors'     => [
                    '{{WRAPPER}} .ile-icon'    => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'list_items_icon_box_material_width', [
                'label'         => __('Icon Box Width', ILE_DOMAIN),
                'type'          => Controls_Manager::SLIDER,
                'range'         => [
                    'px'    => [
                        'min'   => 0,
                        'max'   => 200,
                    ],
                ],
                'default'       => [ 'size'  => 100 ],
                'condition'     => [
                    'item_lists_style'  => 'material-bullet-style',
                ],
                'selectors'     => [
                    '{{WRAPPER}} .ile-icon'    => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'list_items_icon_box_width', [
                'label'         => __('Icon Box Size', ILE_DOMAIN),
                'type'          => Controls_Manager::SLIDER,
                'range'         => [
                    'px'    => [
                        'min'   => 0,
                        'max'   => 200,
                    ],
                ],
                'default'       => [ 'size'  => 80 ],
                'condition'     => [
                    'item_lists_style!' => 'material-bullet-style',
                ],
                'selectors'     => [
                    '{{WRAPPER}} .ile-icon-box' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'list_items_icon_bg_color', [
                'label'         => __('Icon Background Color', ILE_DOMAIN),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#ffffff',
                'condition'     => [
                    'item_lists_style' => 'shape-bullet-style',
                ],
                'selectors'     => [
                    '{{WRAPPER}} .ile-icon-box svg path'    => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'list_items_icon_border_width', [
                'label'         => __('Icon Border Width', ILE_DOMAIN),
                'type'          => Controls_Manager::SLIDER,
                'range'         => [
                    'px'    => [
                        'min'   => 0,
                        'max'   => 10,
                    ],
                ],
                'default'       => [ 'size'  => 2 ],
                'condition'     => [
                    'item_lists_style' => 'shape-bullet-style',
                ],
                'selectors'     => [
                    '{{WRAPPER}} .ile-icon-box svg path' => 'stroke-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'list_items_icon_border_color', [
                'label'         => __('Icon Border Color', ILE_DOMAIN),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#00DAE6',
                'condition'     => [
                    'item_lists_style' => 'shape-bullet-style',
                ],
                'selectors'     => [
                    '{{WRAPPER}} .ile-icon-box svg path'    => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'list_items_icon_line_width', [
                'label'         => __('Line Width', ILE_DOMAIN),
                'type'          => Controls_Manager::SLIDER,
                'range'         => [
                    'px'    => [
                        'min'   => 0,
                        'max'   => 10,
                    ],
                ],
                'default'       => [ 'size'  => 2 ],
                'condition'     => [
                    'item_lists_style' => 'shape-bullet-style',
                ],
                'selectors'     => [
                    '{{WRAPPER}} .ile-shape-bullet-style .ile-line' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'list_items_icon_line_color', [
                'label'         => __('Line Color', ILE_DOMAIN),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#000000',
                'condition'     => [
                    'item_lists_style' => 'shape-bullet-style',
                ],
                'selectors'     => [
                    '{{WRAPPER}} .ile-shape-bullet-style .ile-line' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'list_items_icon_box_radius', [
                'label'         => __('Icon Box Radius', ILE_DOMAIN),
                'type'          => Controls_Manager::SLIDER,
                'range'         => [
                    'px'    => [
                        'min'   => 0,
                        'max'   => 200,
                    ],
                ],
                'default'       => [ 'size'  => 100 ],
                'condition'     => [
                    'item_lists_style' => [ 'timeline-bullet-style', 'alternate-timeline-bullet-style' ],  
                ],
                'selectors'     => [
                    '{{WRAPPER}} .ile-timeline-bullet-style .ile-icon-box,
                     {{WRAPPER}} .ile-alternate-timeline-bullet-style .ile-icon-box' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        // End Icon Style Control

        // Start Image Style Control 
        $this->start_controls_section(
            'list_items_image_style', [
                'label'         => __('Image', ILE_DOMAIN),
                'tab'           => Controls_Manager::TAB_STYLE,
                'condition'     => [
                    'item_lists_style' => ['material-bullet-style', 'timeline-bullet-style', 'alternate-timeline-bullet-style']
                ],
            ]
        );

        $this->add_responsive_control(
            'list_items_image_box_material_width', [
                'label'         => __('Image Width', ILE_DOMAIN),
                'type'          => Controls_Manager::SLIDER,
                'range'         => [
                    'px'    => [
                        'min'   => 0,
                        'max'   => 200,
                    ],
                ],
                'selectors'     => [
                    '{{WRAPPER}} .ile-image'    => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'list_items_image_box_material_radius', [
                'label'         => __('Radius', ILE_DOMAIN),
                'type'          => Controls_Manager::SLIDER,
                'range'         => [
                    'px'    => [
                        'min'   => 0,
                        'max'   => 200,
                    ],
                ],
                'default'       => [ 'size'  => 100 ],
                'condition'     => [
                    'item_lists_style'  => ['timeline-bullet-style', 'alternate-timeline-bullet-style'],
                ],
                'selectors'     => [
                    '{{WRAPPER}} .ile-image'    => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        // End Image Style Control

        // Start Title Style Control       
        $this->start_controls_section(
            'list_items_title_style', [
                'label'         => __('Title', ILE_DOMAIN),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'list_items_title_color', [
                'label'         => __('Title Color', ILE_DOMAIN),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#000000',
                'condition'     => [
                    'item_lists_style!' => 'material-bullet-style',
                ],
                'selectors'     => [
                    '{{WRAPPER}} h2.ile-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'          => 'typography_list_item_title',
                'selector'      => '{{WRAPPER}} .ile-title',
            ]
        );

        $this->add_responsive_control(
            'list_item_title_spacing', [
                'label'         => __('Title Spacing', ILE_DOMAIN),
                'type'          => Controls_Manager::SLIDER,
                'range'         => [
                    'px'    => [
                        'min'   => 0,
                        'max'   => 100,
                    ],
                ],
                'default'       => [ 'size'  => 0 ],
                'selectors'     => [
                    '{{WRAPPER}} .ile-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        // End Title Style Control

        // Start Content Style Control       
        $this->start_controls_section(
            'list_items_content_style', [
                'label'         => __('Content', ILE_DOMAIN),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'list_items_content_color', [
                'label'         => __('Content Color', ILE_DOMAIN),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#999999',
                'condition'     => [
                    'item_lists_style!'     => 'material-bullet-style',
                ],
                'selectors'     => [
                    '{{WRAPPER}} p.ile-content'   => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'          => 'typography_list_item_content',
                'selector'      => '{{WRAPPER}} .ile-content',
            ]
        );

        $this->end_controls_section();
        // End Content Style Control

    }

    /**
     * Render Item List Elements widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings();

        switch ($settings['item_lists_style']) {
            case 'material-bullet-style':
                include ILE_PATH . 'include/item-lists-element/material-bullet-style.php'; // Material Bullets Style
                break;
            case 'shape-bullet-style':
                include ILE_PATH . 'include/item-lists-element/shape-bullet-style.php'; // Shape Bullets Style
                break;
            case 'timeline-bullet-style':
                include ILE_PATH . 'include/item-lists-element/timeline-bullet-style.php'; // Timeline Bullets Style
                break;
            case 'alternate-timeline-bullet-style':
                include ILE_PATH . 'include/item-lists-element/alternate-timeline-bullet-style.php'; // Alternate Timeline Bullets Style
                break;
            case 'gradient-ordered-bullet-style':
                include ILE_PATH . 'include/item-lists-element/gradient-ordered-bullet-style.php'; // Gradient Ordered Bullets Style
                break;
            default:
                include ILE_PATH . 'include/item-lists-element/material-bullet-style.php'; // Default
                break;
        }
    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Item_Lists_Elementor_Widget());