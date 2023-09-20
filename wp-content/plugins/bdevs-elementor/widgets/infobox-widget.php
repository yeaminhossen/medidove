<?php
namespace BdevsElementor\Widget;
use \Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
Use \Elementor\Core\Schemes\Typography;

/**
 * Bdevs Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class BdevsInfobox extends \Elementor\Widget_Base {

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
		return 'bdevs-info-box';
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
		return __( 'Info Box', 'bdevs-elementor' );
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
		return [ 'Info Box' ];
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
			'info_style_section',
			[
				'label' => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]	
		);


        $this->add_control(
            'chose_style',
            [
                'label' => __( 'Design Style', 'bdevs-elementor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __( 'Style 1', 'bdevs-elementor' ),
                    'style_2' => __( 'Style 2', 'bdevs-elementor' ),
                    'style_3' => __( 'Style 3', 'bdevs-elementor' ),
                    'style_4' => __( 'Style 4', 'bdevs-elementor' ),
                    'style_5' => __( 'Style 5', 'bdevs-elementor' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'iconbox_info',
			[
				'label' => esc_html__( 'Icon Box', 'bdevs-elementor' ),
			]	
		);

		$this->add_control(
			'image',
			[
				'label'   => esc_html__( 'Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Image', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'bg_image',
			[
				'label'   => esc_html__( 'BG Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add BG Image', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['style_10'],
				],
			]
		);		

		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'It is Heading', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'desc',
			[
				'label'       => __( 'Description', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your about text', 'bdevs-elementor' ),
				'default'     => __( 'About Content Here', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'button_text',
			[
				'label'       => __( 'Link Text', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type Link Text Here...', 'bdevs-elementor' ),
				'default'     => __( 'Learn More', 'bdevs-elementor' ),
				'label_block' => true,
				'condition' => [
					'chose_style' => ['style_10'],
				],
			]
		);

		$this->add_control(
			'button_link',
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

        $this->add_responsive_control(
            'content_border-radius',
            [
                'label' => __( 'Content Border Radius', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		$this->add_group_control(
		    Group_Control_Border::get_type(),
		    [
		        'name' => 'content_border',
		        'selector' => '{{WRAPPER}} .bdevs-el-content',
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

		$this->add_control(
            'title_hvr_color',
            [
                'label' => __( 'Text Hover Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title a:hover' => 'color: {{VALUE}}',
                ],
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
                    '{{WRAPPER}} .bdevs-el-content p' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description',
                'selector' => '{{WRAPPER}} .bdevs-el-content p',
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

		if (!empty($image['id'])) {
			$image = wp_get_attachment_image_url( $image['id'], 'full' );
		}

		if (!empty($bg_image['id'])) {
			$bg_image = wp_get_attachment_image_url( $bg_image['id'], 'full' );
		}

		

		$this->add_render_attribute(
			[
				'button_link' => [
					'class' => [
						'button-border arrow-link-btn tp-el-btn',
					],
					'href'   => $settings['button_link']['url'] ? esc_url($settings['button_link']['url']) : '#',
					'target' => $settings['button_link']['is_external'] ? '_blank' : '_self'
				]
			], '', '', true
		);

		$this->add_render_attribute(
			[
				'heading_link' => [
					'class' => [
						'heading-link ',
					],
					'href'   => $settings['button_link']['url'] ? esc_url($settings['button_link']['url']) : '#',
					'target' => $settings['button_link']['is_external'] ? '_blank' : '_self'
				]
			], '', '', true
		);
	?>		

		<?php if( $settings['chose_style'] == 'style_1' ) : ?>

		<div class="service8-item-wrapper bdevs-el-content mb-40">
		    <div class="service8-item-content">
		    	<?php if (( ! empty( $settings['heading'] )) ): ?>
		        	<h4 class="mb-20 bdevs-el-title"><a <?php echo $this->get_render_attribute_string( 'heading_link' ); ?>><?php echo wp_kses_post($settings['heading']); ?></a></h4>
		        <?php endif; ?>

		        <?php if (( ! empty( $settings['desc'] )) ): ?>
                	<p class="mb-35"><?php echo esc_html($settings['desc']); ?></p>
                <?php endif; ?>
		    </div>
		    <div class="service8-item-img pos-rel pb-30">
		    	<?php if (( ! empty( $settings['button_link']['url'] )) ): ?>
		        <div class="service8-link-bth">
		            <a <?php echo $this->get_render_attribute_string( 'button_link' ); ?> class="arrow-link-btn tp-el-btn"><i class="fal fa-long-arrow-right"></i></a>
		        </div>
		        <?php endif; ?>

		        <?php if (( ! empty( $image )) ): ?>
		        <img src="<?php print esc_url($image); ?>" alt="img">
		        <?php endif; ?>
		    </div>
		</div>

        <?php elseif($settings['chose_style'] == 'style_2' ): ?>
            <div class="service8-item-wrapper service8-item2 bdevs-el-content pt-90 mb-40" >
                <div class="service8-item-img pos-rel pb-30">
                	<?php if (( ! empty( $settings['button_link']['url'] )) ): ?>
                    <div class="service8-link-bth">
                        <a <?php echo $this->get_render_attribute_string( 'button_link' ); ?> class="arrow-link-btn tp-el-btn"><i class="fal fa-long-arrow-right"></i></a>
                    </div>
                    <?php endif; ?>

                    <?php if (( ! empty( $image )) ): ?>
                    	<img src="<?php print esc_url($image); ?>" alt="img">
                    <?php endif; ?>

                </div>

                <div class="service8-item-content">
                	<?php if (( ! empty( $settings['heading'] )) ): ?>
                    	<h4 class="mb-20 bdevs-el-title"><a <?php echo $this->get_render_attribute_string( 'heading_link' ); ?>><?php echo wp_kses_post($settings['heading']); ?></a></h4>
                    <?php endif; ?>

	                <?php if (( ! empty( $settings['desc'] )) ): ?>
	                	<p class="mb-35"><?php echo esc_html($settings['desc']); ?></p>
	                <?php endif; ?>
                </div>
            </div>

        <?php elseif($settings['chose_style'] == 'style_3' ): ?>
            <div class="service8-item-wrapper bdevs-el-content skin-treat-service skin-treat-service1 mb-40 pt-70">
                <div class="service8-item-content skin-treat-service-content">
                	<?php if (( ! empty( $settings['heading'] )) ): ?>
                    	<h4 class="mb-15 bdevs-el-title"><a <?php echo $this->get_render_attribute_string( 'heading_link' ); ?>><?php echo wp_kses_post($settings['heading']); ?></a></h4>
                    <?php endif; ?>

                    <?php if (( ! empty( $settings['desc'] )) ): ?>
                    	<p class="mb-65"><?php echo esc_html($settings['desc']); ?></p>
                	<?php endif; ?>
                </div>

                <?php if (( ! empty( $image )) ): ?>
                <div class="service8-item-img skin-treat-service-img pos-rel mb-30">
                    <div class="skin-treat-service-img-line"></div>
                    <img src="<?php print esc_url($image); ?>" alt="img">
                </div>
                <?php endif; ?>
            </div>

        <?php elseif($settings['chose_style'] == 'style_4' ): ?>
            <div class="service8-item-wrapper skin-treat-service bdevs-el-content skin-treat-service2 mb-40">
            	<?php if (( ! empty( $image )) ): ?>
                <div class="service8-item-img skin-treat-service-img pos-rel mb-30">
                    <div class="skin-treat-service-img-line"></div>
                    <img src="<?php print esc_url($image); ?>" alt="img">
                </div>
                <?php endif; ?>

                <div class="service8-item-content skin-treat-service-content">
                	<?php if (( ! empty( $settings['heading'] )) ): ?>
                    <h4 class="mb-15 bdevs-el-title"><a <?php echo $this->get_render_attribute_string( 'heading_link' ); ?>><?php echo wp_kses_post($settings['heading']); ?></a></h4>
                    <?php endif; ?>

                    <?php if (( ! empty( $settings['desc'] )) ): ?>
                    	<p class="mb-65"><?php echo esc_html($settings['desc']); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php elseif($settings['chose_style'] == 'style_5' ): ?>
            <div class="service8-item-wrapper bdevs-el-content skin-treat-service skin-treat-service3 mb-40 pt-70">
                <div class="service8-item-content skin-treat-service-content">
                	<?php if (( ! empty( $settings['heading'] )) ): ?>
                    	<h4 class="mb-15 bdevs-el-title"><a <?php echo $this->get_render_attribute_string( 'heading_link' ); ?>><?php echo wp_kses_post($settings['heading']); ?></a></h4>
                    <?php endif; ?>

                    <?php if (( ! empty( $settings['desc'] )) ): ?>
                    	<p class="mb-65"><?php echo esc_html($settings['desc']); ?></p>
                    <?php endif; ?>
                </div>
                <?php if (( ! empty( $image )) ): ?>
                <div class="service8-item-img skin-treat-service-img pos-rel mb-30">
                    <div class="skin-treat-service-img-line"></div>
                    <img src="<?php print esc_url($image); ?>" alt="img">
                </div>
                <?php endif; ?>
            </div>
		<?php endif; ?>
	<?php
	}

}