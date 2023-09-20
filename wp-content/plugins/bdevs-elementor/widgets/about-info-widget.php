<?php
namespace BdevsElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
Use \Elementor\Core\Schemes\Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

/**
 * Bdevs Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class BdevsAboutInfo extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Bdevs Elementor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bdevs-about-info';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Bdevs Elementor widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'About Info', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs Slider widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-favorite';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Bdevs Slider widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'bdevs-elementor' ];
	}

	public function get_keywords() {
		return [ 'about info' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}

	// BDT Position
	protected function element_pack_position() {
	    $position_options = [
	        ''              => esc_html__('Default', 'bdevs-elementor'),
	        'top-left'      => esc_html__('Top Left', 'bdevs-elementor') ,
	        'top-center'    => esc_html__('Top Center', 'bdevs-elementor') ,
	        'top-right'     => esc_html__('Top Right', 'bdevs-elementor') ,
	        'center'        => esc_html__('Center', 'bdevs-elementor') ,
	        'center-left'   => esc_html__('Center Left', 'bdevs-elementor') ,
	        'center-right'  => esc_html__('Center Right', 'bdevs-elementor') ,
	        'bottom-left'   => esc_html__('Bottom Left', 'bdevs-elementor') ,
	        'bottom-center' => esc_html__('Bottom Center', 'bdevs-elementor') ,
	        'bottom-right'  => esc_html__('Bottom Right', 'bdevs-elementor') ,
	    ];

	    return $position_options;
	}

	// register_controls
	protected function register_controls()
    {
        $this->register_content_controls();
        $this->register_style_controls();
    }

	// register_content_controls
	protected function register_content_controls() {
		$this->start_controls_section(
			'info_style_about_section',
			[
				'label' => esc_html__( 'About Info Style', 'bdevs-elementor' ),
			]	
		);


		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'style_01'  => esc_html__( 'Full Width', 'bdevs-elementor' ),
					'style_02' => esc_html__( 'Blox Layout', 'bdevs-elementor' ),
				],
				'default'   => ['style_01'],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'left_about_section',
			[
				'label' => esc_html__( 'Left About', 'bdevs-elementor' ),
			]	
		);

		$this->add_control(
			'image_left',
			[
				'label'   => esc_html__( 'About Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add About Image', 'bdevs-elementor' ),
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

		$this->add_control(
			'left_sub_heading',
			[
				'label'       => __( 'Sub Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your sub heading', 'bdevs-elementor' ),
				'default'     => __( 'It is sub heading', 'bdevs-elementor' ),
				'label_block' => true,
				'condition' => [
					'chose_style' => ['style_01'],
				],
			]
		);		

		$this->add_control(
			'left_heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'It is Heading', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'left_desc',
			[
				'label'       => __( 'Description', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your about text', 'bdevs-elementor' ),
				'default'     => __( 'About Content Here', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'left_link_text',
			[
				'label'       => __( 'Link Text', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type Link Text Here...', 'bdevs-elementor' ),
				'default'     => __( 'Learn More', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'left_link',
			[
				'label' => __( 'Link', 'bdevs-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'bdevs-elementor' ),
				'show_external' => true,
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->end_controls_section();


		/** 
		*	left content list section 
		**/
		$this->start_controls_section(
			'left_content_lists_section',
			[
				'label' => esc_html__( 'Left Lists', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['style_01']
				]
			]
		);


		$this->add_control(
			'tab_left_lists',
			[
				'label' => esc_html__( 'List Item', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'List #1', 'bdevs-elementor' ),
					]
				],
				'fields' => [										
					[
						'name'        => 'title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'label_block' => true,
					],
				],
			]
		);

		$this->end_controls_section();	

		$this->start_controls_section(
			'right_about_section',
			[
				'label' => esc_html__( 'Right About', 'bdevs-elementor' ),
			]	
		);

		$this->add_control(
			'image_right',
			[
				'label'   => esc_html__( 'About Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add About Image', 'bdevs-elementor' ),
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

		$this->add_control(
			'right_sub_heading',
			[
				'label'       => __( 'Sub Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your sub heading', 'bdevs-elementor' ),
				'default'     => __( 'It is sub heading', 'bdevs-elementor' ),
				'label_block' => true,
				'condition' => [
					'chose_style' => ['style_01'],
				]
			]
		);		

		$this->add_control(
			'right_heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'It is Heading', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'right_desc',
			[
				'label'       => __( 'Description', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your about text', 'bdevs-elementor' ),
				'default'     => __( 'About Content Here', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'right_link_text',
			[
				'label'       => __( 'Link Text', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type Link Text Here...', 'bdevs-elementor' ),
				'default'     => __( 'Learn More', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'right_link',
			[
				'label' => __( 'Link', 'bdevs-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'bdevs-elementor' ),
				'show_external' => true,
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->end_controls_section();


		/** 
		*	Right content list section 
		**/
		$this->start_controls_section(
			'right_content_lists_section',
			[
				'label' => esc_html__( 'Right Lists', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['style_01'],
				]
			]
		);

		$this->add_control(
			'tab_right_lists',
			[
				'label' => esc_html__( 'List Item', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'List #1', 'bdevs-elementor' ),
					]
				],
				'fields' => [										
					[
						'name'        => 'title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'label_block' => true,
					],
				],
			]
		);

		$this->end_controls_section();	


		/** 
		*	Layout section 
		**/
		$this->start_controls_section(
			'section_content_layout',
			[
				'label' => esc_html__( 'Layout', 'bdevs-elementor' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'   => esc_html__( 'Alignment', 'bdevs-elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'bdevs-elementor' ),
						'icon'  => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'bdevs-elementor' ),
						'icon'  => 'eicon-h-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'bdevs-elementor' ),
						'icon'  => 'eicon-h-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'bdevs-elementor' ),
						'icon'  => 'eicon-text-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'description'  => 'Use align to match position',
				'default'      => 'left',
			]
		);

		$this->end_controls_section();

	}

	/**
     * Register styles related controls
    */
    protected function register_style_controls()
    {
		$this->title_style_controls();
		$this->button_style_controls();
	}

	// title_style_controls
    protected function title_style_controls() {
        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __( 'Title / Content', 'bdevs-elementor' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __( 'Content Padding', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .bdevs-el-content',
                'exclude' => [
                    'image'
                ]
            ]
        );

        // Title
        $this->add_control(
            '_heading_title',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __( 'Title', 'bdevs-elementor' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .bdevs-el-title',
            ]
        );

		$this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'color: {{VALUE}}',
                ],
            ]
        );


        // Subtitle
        $this->add_control(
            '_heading_subtitle',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __( 'Subtitle', 'bdevs-elementor' ),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Text Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-subtitle' => 'color: {{VALUE}}',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .bdevs-el-subtitle',

            ]
        );

		// description
        $this->add_control(
            '_content_description',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Description', 'bdevs-elementor'),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-desc' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-desc' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description',
                'selector' => '{{WRAPPER}} .bdevs-el-desc',
            ]
        );

		// item
        $this->add_control(
            '_content_item',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Content List', 'bdevs-elementor'),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'item_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-item' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_control(
            'item_color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-item' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_item',
                'selector' => '{{WRAPPER}} .bdevs-el-item',
            ]
        );

        $this->end_controls_section();
    }

	// button_style_controls
	protected function button_style_controls() {
		$this->start_controls_section(
		    '_section_style_button',
		    [
		        'label' => __( 'Button', 'bdevs-elementor' ),
		        'tab' => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->add_responsive_control(
		    'button_padding',
		    [
		        'label' => __( 'Padding', 'bdevs-elementor' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'button_typography',
		        'selector' => '{{WRAPPER}} .tp-el-btn',
		        'scheme' => Typography::TYPOGRAPHY_4,
		    ]
		);

		$this->add_group_control(
		    Group_Control_Border::get_type(),
		    [
		        'name' => 'button_border',
		        'selector' => '{{WRAPPER}} .tp-el-btn',
		    ]
		);

		$this->add_control(
		    'button_border_radius',
		    [
		        'label' => __( 'Border Radius', 'bdevs-elementor' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Box_Shadow::get_type(),
		    [
		        'name' => 'button_box_shadow',
		        'selector' => '{{WRAPPER}} .tp-el-btn',
		    ]
		);

		$this->add_control(
		    'hr',
		    [
		        'type' => Controls_Manager::DIVIDER,
		        'style' => 'thick',
		    ]
		);

		$this->start_controls_tabs( '_tabs_button' );

		$this->start_controls_tab(
		    '_tab_button_normal',
		    [
		        'label' => __( 'Normal', 'bdevs-elementor' ),
		    ]
		);

		$this->add_control(
		    'button_color',
		    [
		        'label' => __( 'Text Color', 'bdevs-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '',
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-btn' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
		    'button_bg_color',
		    [
		        'label' => __( 'Background Color', 'bdevs-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-btn' => 'background-color: {{VALUE}};',
		        ],
		    ]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
		    '_tab_button_hover',
		    [
		        'label' => __( 'Hover', 'bdevs-elementor' ),
		    ]
		);

		$this->add_control(
		    'button_hover_color',
		    [
		        'label' => __( 'Text Color', 'bdevs-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-btn:hover, {{WRAPPER}} .tp-el-btn:focus' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
		    'button_hover_bg_color',
		    [
		        'label' => __( 'Background Color', 'bdevs-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-btn:hover, {{WRAPPER}} .tp-el-btn:focus' => 'background-color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
		    'button_hover_border_color',
		    [
		        'label' => __( 'Border Color', 'bdevs-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'condition' => [
		            'button_border_border!' => '',
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-btn:hover, {{WRAPPER}} .tp-el-btn:focus' => 'border-color: {{VALUE}};',
		        ],
		    ]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	public function render() {
		$settings  = $this->get_settings_for_display();
		extract($settings);

		$image_left_src = wp_get_attachment_image_src( $image_left['id'], 'full' );
		$image_left_url = $image_left_src ? $image_left_src[0] : '';

		$image_right_src = wp_get_attachment_image_src( $image_right['id'], 'full' );
		$image_right_url = $image_right_src ? $image_right_src[0] : '';	

		$this->add_render_attribute(
			[
				'left_link' => [
					'class' => [
						'btn btn-icon btn-icon-green ml-0 tp-el-btn',
					],
					'href'   => $settings['left_link']['url'] ? esc_url($settings['left_link']['url']) : '#',
					'target' => $settings['left_link']['is_external'] ? '_blank' : '_self'
				]
			], '', '', true
		);

		$this->add_render_attribute(
			[
				'right_link' => [
					'class' => [
						'btn btn-icon ml-0  tp-el-btn',
					],
					'href'   => $settings['right_link']['url'] ? esc_url($settings['right_link']['url']) : '#',
					'target' => $settings['right_link']['is_external'] ? '_blank' : '_self'
				]
			], '', '', true
		);

	?>		

	<?php if( $chose_style == 'style_01' ): ?>
        <section class="hiring-area pos-rel">
            <div class="hiring-top">
                <div class="hire-left-img" style="background-image:url(<?php print esc_url($image_left_url); ?>)"></div>
                <div class="container-fluid pl-0 pr-0">
                    <div class="row no-gutters">
                        <div class="col-xl-6 offset-xl-6 offset-lg-4">
                            <div class="hire-text hire-text-2 bdevs-el-content">
                                <div class="about-title mb-20">
	                                <?php if (!empty($settings['left_sub_heading'])) : ?>
									<h5 class="bdevs-el-subtitle"><?php echo wp_kses_post($settings['left_sub_heading']); ?></h5>
									<?php endif; ?>	 

									<?php if (!empty($settings['left_heading'])) : ?>
									<h2 class="sec-title bdevs-el-title"><?php echo wp_kses_post($settings['left_heading']); ?></h2>
									<?php endif; ?>	
                                </div>
                                <div class="about-text">
                                    <p class="bdevs-el-desc"><?php echo wp_kses_post($settings['left_desc']); ?></p>
                                </div>
                                <ul class="professinals-list pt-10 pb-20">             
 									<?php foreach ( $settings['tab_left_lists'] as $item ) : 
										extract($item);
									?>
			                            <li class="bdevs-el-item"><i class="fa fa-check"></i><span><?php print wp_kses_post($title); ?></span></li>
				                    <?php endforeach; ?>
                                </ul>

                                <?php if (( ! empty( $settings['left_link']['url'] )) ): ?>
	                            <div class="hiring-button">
									<a <?php echo $this->get_render_attribute_string( 'left_link' ); ?>><span>+</span> <?php echo esc_html($settings['left_link_text']); ?></a>
	                            </div>
	                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hiring-bottom pos-rel">
                <div class="hire-right-img" style="background-image:url(<?php print esc_url($image_right_url); ?>)"></div>
                <div class="container-fulid pl-0 pr-0">
                    <div class="row no-gutters">
                        <div class="col-xl-6 col-lg-8">
                            <div class="hire-text hire-text-2 bdevs-el-content">
                                <div class="about-title mb-20">
                                    <?php if (!empty($settings['right_sub_heading'])) : ?>
									<h5 class="bdevs-el-subtitle"><?php echo wp_kses_post($settings['right_sub_heading']); ?></h5>
									<?php endif; ?>	 

									<?php if (!empty($settings['right_heading'])) : ?>
									<h2 class="sec-title bdevs-el-title"><?php echo wp_kses_post($settings['right_heading']); ?></h2>
									<?php endif; ?>
                                </div>
                                <div class="about-text">
                                    <p class="bdevs-el-desc" style="<?php print esc_attr( $desc_font_size ); ?>;  <?php print esc_attr( $desc_color ); ?>;"><?php echo wp_kses_post($settings['right_desc']); ?></p>
                                </div>
                                <ul class="professinals-list pt-10 pb-20">
                                    <?php foreach ( $settings['tab_right_lists'] as $item ) : 
										extract($item);
									?>
			                            <li class="bdevs-el-item"><i class="fa fa-check"></i><span><?php print wp_kses_post($title); ?></span></li>
				                    <?php endforeach; ?>
                                </ul>

                                <?php if (( ! empty( $settings['right_link']['url'] )) ): ?>
	                            <div class="hiring-button">
			                        <a <?php echo $this->get_render_attribute_string( 'right_link' ); ?>><span>+</span> <?php echo esc_html($settings['right_link_text']); ?></a>
	                            </div>
	                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php elseif( $chose_style == 'style_02' ): ?>
        <section class="hiring-area">
            <div class="container">
                <div class="row no-gutters hire-bg-2">
                    <div class="col-xl-6 col-lg-6">
                        <div class="hire-img">
                            <img class="img" src="<?php print esc_url($image_left_url); ?>" alt="">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="hire-text">
							<?php if (!empty($settings['left_heading'])) : ?>
							<h2 class="sec-title"><?php echo wp_kses_post($settings['left_heading']); ?></h2>
							<?php endif; ?>	
                            <p style="<?php print esc_attr( $desc_font_size ); ?>;  <?php print esc_attr( $desc_color ); ?>;"><?php echo wp_kses_post($settings['left_desc']); ?></p>

                            <a <?php echo $this->get_render_attribute_string( 'left_link' ); ?>><span>+</span> <?php echo esc_html($settings['left_link_text']); ?></a>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters hire-bg">
                    <div class="col-xl-6 col-lg-6">
                        <div class="hire-text">
                            <?php if (!empty($settings['right_heading'])) : ?>
								<h2 class="sec-title"><?php echo wp_kses_post($settings['right_heading']); ?></h2>
							<?php endif; ?>
                            <p><?php echo wp_kses_post($settings['right_desc']); ?></p>

                            <a <?php echo $this->get_render_attribute_string( 'right_link' ); ?>><span>+</span> <?php echo esc_html($settings['right_link_text']); ?></a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="hire-img">
                            <img class="img" src="<?php print esc_url($image_right_url); ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php endif; ?>	
	<?php
	}

}