<?php
namespace BdevsElementor\Widget;
use \Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
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
class BdevsMemberlist extends \Elementor\Widget_Base {

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
		return 'bdevs-member-list';
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
		return __( 'Member List', 'bdevs-elementor' );
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
		return [ 'Member List' ];
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
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'member_list_info',
			[
				'label' => esc_html__( 'Member Item', 'bdevs-elementor' ),
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
			'designation',
			[
				'label'       => __( 'Designation', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your designation', 'bdevs-elementor' ),
				'default'     => __( 'Designation', 'bdevs-elementor' ),
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

		$this->start_controls_section(
			'member_social_info',
			[
				'label' => esc_html__( 'Member Social', 'bdevs-elementor' ),
			]	
		);

		$this->add_control(
            'facebook_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Facebook', 'bdevs-elementor' ),
                'default' => __( '#', 'bdevs-elementor' ),
                'placeholder' => __( 'Add your facebook link', 'bdevs-elementor' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );                

        $this->add_control(
            'twitter_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Twitter', 'bdevs-elementor' ),
                'default' => __( '#', 'bdevs-elementor' ),
                'placeholder' => __( 'Add your twitter link', 'bdevs-elementor' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'instagram_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Instagram', 'bdevs-elementor' ),
                'default' => __( '#', 'bdevs-elementor' ),
                'placeholder' => __( 'Add your instagram link', 'bdevs-elementor' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );       

        $this->add_control(
            'linkedin_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'LinkedIn', 'bdevs-elementor' ),
                'default' => __( '#', 'bdevs-elementor' ),
                'placeholder' => __( 'Add your linkedin link', 'bdevs-elementor' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $this->add_control(
            'youtube_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Youtube', 'bdevs-elementor' ),
                'placeholder' => __( 'Add your youtube link', 'bdevs-elementor' ),
                'dynamic' => [
                    'active' => true,
                ]
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
		$this->social_icon_style_controls();
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
                'selector' => '{{WRAPPER}} .bdevs-el-content:before',
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

        $this->end_controls_section();
    }

	// social_icon_style_controls
	protected function social_icon_style_controls() {
		$this->start_controls_section(
            '_section_style_social',
            [
                'label' => __( 'Social Icons', 'bdevs-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'links_spacing',
            [
                'label' => __( 'Right Spacing', 'bdevs-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-member-links > a:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'links_padding',
            [
                'label' => __( 'Padding', 'bdevs-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-member-links > a' => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'links_icon_size',
            [
                'label' => __( 'Icon Size', 'bdevs-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-member-links > a' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'links_border',
                'selector' => '{{WRAPPER}} .bdevs-member-links > a'
            ]
        );

        $this->add_responsive_control(
            'links_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevs-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-member-links > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs( '_tab_links_colors' );
        $this->start_controls_tab(
            '_tab_links_normal',
            [
                'label' => __( 'Normal', 'bdevs-elementor' ),
            ]
        );

        $this->add_control(
            'links_color',
            [
                'label' => __( 'Text Color', 'bdevs-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-member-links > a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'links_bg_color',
            [
                'label' => __( 'Background Color', 'bdevs-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-member-links > a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->start_controls_tab(
            '_tab_links_hover',
            [
                'label' => __( 'Hover', 'bdevs-elementor' ),
            ]
        );

        $this->add_control(
            'links_hover_color',
            [
                'label' => __( 'Text Color', 'bdevs-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-member-links > a:hover, {{WRAPPER}} .bdevs-member-links > a:focus' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'links_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevs-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-member-links > a:hover, {{WRAPPER}} .bdevs-member-links > a:focus' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'links_hover_border_color',
            [
                'label' => __( 'Border Color', 'bdevs-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-member-links > a:hover, {{WRAPPER}} .bdevs-member-links > a:focus' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'links_border_border!' => '',
                ]
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
						'button-border',
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
						'heading-link',
					],
					'href'   => $settings['button_link']['url'] ? esc_url($settings['button_link']['url']) : '#',
					'target' => $settings['button_link']['is_external'] ? '_blank' : '_self'
				]
			], '', '', true
		);

	?>		

	<?php if( $settings['chose_style'] == 'style_1' ): ?>
		<div class="team-overlay bdevs-el-content">
			<?php if (( ! empty( $image )) ): ?>
            <div class="team-thumb">
                <img src="<?php print esc_url($image); ?>" alt="">
            </div>
            <?php endif; ?>
            <div class="team-overlay-info fix">
				<div class="team-inner-content">
					<?php if (( ! empty( $settings['heading'] )) ): ?>
	                <h3 class="memeber-title bdevs-el-title"><a <?php echo $this->get_render_attribute_string( 'heading_link' ); ?>><?php echo wp_kses_post($settings['heading']); ?></a></h3>
	                <?php endif; ?>
	                <?php if (( ! empty( $settings['designation'] )) ): ?>
	                <span class="m-designation bdevs-el-subtitle"><?php echo esc_html($settings['designation']); ?></span>
	                <?php endif; ?>
	                <?php if (( ! empty( $settings['desc'] )) ): ?>
	                <p><?php echo esc_html($settings['desc']); ?></p>
	                <?php endif; ?>
	                
	                <div class="m-line mt-20 mb-30"></div>

		            <div class="m-social bdevs-member-links">
		            	<?php if (( ! empty( $settings['facebook_url'] )) ): ?>	
		                <a class="facebook" href="<?php echo esc_html($settings['facebook_url']); ?>"><i class="fab fa-facebook-f"></i></a>
		                <?php endif; ?>

		                <?php if (( ! empty( $settings['twitter_url'] )) ): ?>
		                <a class="twitter" href="<?php echo esc_html($settings['twitter_url']); ?>"><i class="fab fa-twitter"></i></a>
		                <?php endif; ?>

		                <?php if (( ! empty( $settings['instagram_url'] )) ): ?>
		                <a class="instagram" href="<?php echo esc_html($settings['instagram_url']); ?>"><i class="fab fa-instagram"></i></a>
		                <?php endif; ?>

		                <?php if (( ! empty( $settings['youtube_url'] )) ): ?>
		                <a class="youtube" href="<?php echo esc_html($settings['youtube_url']); ?>"><i class="fab fa-youtube"></i></a>
		                <?php endif; ?>

		                <?php if (( ! empty( $settings['linkedin_url'] )) ): ?>
		                <a href="<?php echo esc_html($settings['linkedin_url']); ?>"><i class="fab fa-linkedin"></i></a>
		                <?php endif; ?>
		            </div>
				</div>
            </div>
        </div>

        <?php elseif( $settings['chose_style'] == 'style_2' ): ?>
	        <div class="team-overlay s-team-overlay bdevs-el-content"> 
	        	<?php if (( ! empty( $image )) ): ?>
	        		<img src="<?php print esc_url($image); ?>" alt="img">
	        	<?php endif; ?>

	            <div class="team-thumb"> </div>

	            <div class="team-overlay-info fix">
	                <div class="team-inner-content">
	                    <h3 class="memeber-title bdevs-el-title">
	                    	<a class="heading-link" <?php echo $this->get_render_attribute_string( 'heading_link' ); ?> target="_blank"><?php echo wp_kses_post($settings['heading']); ?></a>
	                    </h3> 

	                    <?php if (( ! empty( $settings['designation'] )) ): ?>
	                    	<span class="m-designation bdevs-el-subtitle"><?php echo esc_html($settings['designation']); ?></span>
	                	<?php endif; ?>
	                    <div class="m-line mt-20 mb-30"></div>

	                    <div class="m-social s-social bdevs-member-links"> 
			            	<?php if (( ! empty( $settings['facebook_url'] )) ): ?>	
			                <a class="facebook" href="<?php echo esc_html($settings['facebook_url']); ?>"><i class="fab fa-facebook-f"></i></a>
			                <?php endif; ?>

			                <?php if (( ! empty( $settings['twitter_url'] )) ): ?>
			                <a class="twitter" href="<?php echo esc_html($settings['twitter_url']); ?>"><i class="fab fa-twitter"></i></a>
			                <?php endif; ?>

			                <?php if (( ! empty( $settings['instagram_url'] )) ): ?>
			                <a class="instagram" href="<?php echo esc_html($settings['instagram_url']); ?>"><i class="fab fa-instagram"></i></a>
			                <?php endif; ?>

			                <?php if (( ! empty( $settings['youtube_url'] )) ): ?>
			                <a class="youtube" href="<?php echo esc_html($settings['youtube_url']); ?>"><i class="fab fa-youtube"></i></a>
			                <?php endif; ?>

			                <?php if (( ! empty( $settings['linkedin_url'] )) ): ?>
			                <a class="linkedin" href="<?php echo esc_html($settings['linkedin_url']); ?>"><i class="fab fa-linkedin"></i></a>
			                <?php endif; ?>
	                    </div>
	                </div>
	            </div>
	        </div>
		<?php endif; ?>	
	<?php
	}

}