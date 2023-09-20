<?php
namespace BdevsElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;


/**
 * Bdevs Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class BdevsHeading extends \Elementor\Widget_Base {

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
		return 'bdevs-heading';
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
		return __( 'Heading Text', 'bdevs-elementor' );
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
		return 'eicon-post-title';
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
		return [ 'heading', 'title' ];
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

	protected function register_controls() {

		$this->start_controls_section(
			'design_style_section',
			[
				'label' => esc_html__( 'Design Style', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'style-1' => esc_html__( 'Style 1', 'bdevs-elementor' ),
					'style-2' => esc_html__( 'Style 2', 'bdevs-elementor' ),
					'style-3' => esc_html__( 'Style 3', 'bdevs-elementor' ),
					'style-4' => esc_html__( 'Style 4', 'bdevs-elementor' ),
					'style-5' => esc_html__( 'Style 5', 'bdevs-elementor' ),
					'style-6' => esc_html__( 'Style 6', 'bdevs-elementor' ),
				],
				'default'   => 'style-1',
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_content_heading',
			[
				'label' => esc_html__( 'Section Heading', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'sub_heading',
			[
				'label'       => __( 'Sub Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your prefix Heading', 'bdevs-elementor' ),
				'default'     => __( 'Awesome Features', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'It is Heading', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'sec_text',
			[
				'label'       => __( 'Heading Description', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your info text', 'bdevs-elementor' ),
				'default'     => __( 'It is service description', 'bdevs-elementor' ),
			]
		);


		$this->add_control(
			'btn_text',
			[
				'label'       => __( 'Button Text', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type Link Text Here...', 'bdevs-elementor' ),
				'default'     => __( 'Learn More', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['style-4']
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'btn_link',
			[
				'label' => __( 'Button Link', 'bdevs-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'condition' => [
					'chose_style' => ['style-4']
				],
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'dot_image',
			[
				'label'   => esc_html__( 'Dot Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Add Dot Image', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['style-3']
				],
			]
		);

		$this->end_controls_section();

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
				'default'      => 'center',
			]
		);

		$this->add_control(
			'show_image',
			[
				'label'   => esc_html__( 'Show Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'section_title_icon',
			[
				'label'   => esc_html__( 'Section Title Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);


		$this->add_control(
			'section_title_line',
			[
				'label'   => esc_html__( 'Section Title Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();	


		// style tab section
		$this->start_controls_section(
		    '_section_style_content',
		    [
		        'label' => __( 'Title / Content', 'bdevs-elementor' ),
		        'tab'   => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->add_responsive_control(
		    'content_padding',
		    [
		        'label' => __( 'Content Padding', 'bdevs-elementor' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Background::get_type(),
		    [
		        'name' => 'content_background',
		        'selector' => '{{WRAPPER}} .tp-el-content',
		        'exclude' => [
		            'image'
		        ]
		    ]
		);

		// Title
		$this->add_control(
		    '_heading_title',
		    [
		        'type' => Controls_Manager::HEADING,
		        'label' => __( 'Title', 'bdevs-elementor' ),
		        'separator' => 'before'
		    ]
		);

		$this->add_responsive_control(
		    'title_spacing',
		    [
		        'label' => __( 'Bottom Spacing', 'bdevs-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'size_units' => ['px'],
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_control(
		    'title_color',
		    [
		        'label' => __( 'Text Color', 'bdevs-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-title' => 'color: {{VALUE}}',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'title',
		        'selector' => '{{WRAPPER}} .tp-el-title',
		        'scheme' => Typography::TYPOGRAPHY_2,
		    ]
		);

		// Subtitle    
		$this->add_control(
		    '_heading_subtitle',
		    [
		        'type' => Controls_Manager::HEADING,
		        'label' => __( 'Subtitle', 'bdevs-elementor' ),
		        'separator' => 'before'
		    ]
		);

		$this->add_responsive_control(
		    'subtitle_spacing',
		    [
		        'label' => __( 'Bottom Spacing', 'bdevs-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'size_units' => ['px'],
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_control(
		    'subtitle_color',
		    [
		        'label' => __( 'Text Color', 'bdevs-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-subtitle' => 'color: {{VALUE}}',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'subtitle',
		        'selector' => '{{WRAPPER}} .tp-el-subtitle',
		        'scheme' => Typography::TYPOGRAPHY_3,
		    ]
		);

		// description
		$this->add_control(
		    '_content_description',
		    [
		        'type' => Controls_Manager::HEADING,
		        'label' => __( 'Description', 'bdevs-elementor' ),
		        'separator' => 'before'
		    ]
		);

		$this->add_responsive_control(
		    'description_spacing',
		    [
		        'label' => __( 'Bottom Spacing', 'bdevs-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'size_units' => ['px'],
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_control(
		    'description_color',
		    [
		        'label' => __( 'Text Color', 'bdevs-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .tp-el-content p' => 'color: {{VALUE}}',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'description',
		        'selector' => '{{WRAPPER}} .tp-el-content p',
		        'scheme' => Typography::TYPOGRAPHY_4,
		    ]
		);
		$this->end_controls_section();

	}

	public function render() {

		$settings  = $this->get_settings_for_display(); 
		extract( $settings );

		if( $chose_style == 'style-1' ): ?>
        <div class="section-title tp-el-content">
            <div class="section-text">
                <?php 
                if (!empty($settings['sub_heading'])) : ?>
					<h5 class="tp-el-subtitle"><?php echo wp_kses_post($settings['sub_heading']); ?></h5>
				<?php 
				endif; ?>	

                <?php 
                if (!empty($settings['heading'])) : ?>
					<h2 class="sec-title tp-el-title"><?php echo wp_kses_post($settings['heading']); ?></h2>
				<?php 
				endif; ?>

			<?php 
        	if (!empty($settings['sec_text'])) : ?>
				<p><?php echo wp_kses_post($settings['sec_text']); ?></p>
			<?php 
			endif; ?>
            </div>
        </div>


        <?php elseif( $chose_style == 'style-2' ): ?>
        <section class="about-area">
            <div class="container">
                <div class="row ">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="section-title section-title-m-0 mb-30 pos-rel text-right tp-el-content">
                            <div class="section-icon">
                                <img class="section-back-icon back-icon-right" src="<?php print get_template_directory_uri(); ?>/img/section/section-back-icon.png" alt="">
                            </div>
                            <div class="section-text section-text-small pos-rel">
                                <?php 
                                if ( $settings['sub_heading']) : ?>
									<h5 class="tp-el-subtitle"><?php echo wp_kses_post($settings['sub_heading']); ?></h5>
								<?php 
								endif; ?>	

                                <?php 
                                if ($settings['heading']) : ?>
									<h2 class="sec-title tp-el-title"><?php echo wp_kses_post($settings['heading']); ?></h2>
								<?php 
								endif; ?>	
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="facalty-text mb-30">
                        	<?php if (!empty($settings['sec_text'])) : ?>
								<p><?php echo wp_kses_post($settings['sec_text']); ?></p>
							<?php endif; ?>	
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php elseif( $chose_style == 'style-3' ): ?>
            <div class="section-title pos-rel tp-el-content">

            	<?php if ( $settings['section_title_icon'] ) : ?>
                <div class="section-icon">
                    <img class="section-back-icon back-icon-left" src="<?php print get_template_directory_uri(); ?>/img/section/section-back-icon.png" alt="img">
                </div>
                <?php endif; ?>	

                <div class="section-text pos-rel">
					<?php if (!empty( $settings['sub_heading'])) : ?>
					<h5 class="tp-el-subtitle"><?php echo wp_kses_post($settings['sub_heading']); ?></h5>
					<?php endif; ?>	

                    <?php if (!empty($settings['heading'])) : ?>
					<h2 class="sec-title tp-el-title"><?php echo wp_kses_post($settings['heading']); ?></h2>
					<?php endif; ?>

					<?php if (!empty($settings['sec_text'])) : ?>
						<p><?php echo wp_kses_post($settings['sec_text']); ?></p>
					<?php endif; ?>		
                </div>

				<?php if ( $settings['section_title_line'] ) : ?>
				<?php if ( '' !== $settings['dot_image'] )  : 
					$image_src = wp_get_attachment_image_src( $settings['dot_image']['id'], 'full' );
					$dot_image = $image_src ? $image_src[0] : ''; 
		   		?>
				<?php if (!empty($dot_image)) : ?>
					<div class="section-line pos-rel">
						<img src="<?php print esc_url($dot_image); ?>" alt="img">
					</div>
				<?php endif; ?>

                <?php endif; ?>
                <?php endif; ?>
            </div>

        <?php elseif( $chose_style == 'style-4' ): ?>

        	<div class="container">
	        	<div class="row">
	        	    <div class="col-lg-8 col-md-8">
		    			<?php if (!empty($settings['heading'])) : ?>
		    			<h4 class="section-title7 mb-0 tp-el-title"><?php echo wp_kses_post($settings['heading']); ?></h4>
		    			<?php endif; ?>
		    			<?php if (!empty($settings['sec_text'])) : ?>
		                <p><?php echo wp_kses_post($settings['sec_text']); ?></p>
		                <?php endif; ?>
	                </div>

	                <div class="col-lg-4 col-md-4">
	                    <div class="product-available-btn text-right">
	                        <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="r-btn-b"><?php echo esc_html($settings['btn_text']); ?><i class="far fa-long-arrow-right" aria-hidden="true"></i></a>
	                    </div>
	                </div>
	    	    </div>	
        	</div>

    	<?php elseif( $chose_style == 'style-5' ): ?>
	        <div class="section-title">
                <div class="section-text">
                	<?php if (!empty( $settings['sub_heading'])) : ?>
                    	<span class="section8-subtitle mb-20 tp-el-subtitle"><?php echo wp_kses_post($settings['sub_heading']); ?></span>
                    <?php endif; ?>

                    <?php if (!empty($settings['heading'])) : ?>
                    	<h2 class="section8-title tp-el-title"><?php echo wp_kses_post($settings['heading']); ?></h2>
                    <?php endif; ?>

                	<?php if (!empty($settings['sec_text'])) : ?>
	                	<p><?php echo wp_kses_post($settings['sec_text']); ?></p>
	                <?php endif; ?>
                </div>
            </div>
        <?php elseif( $chose_style == 'style-6' ): ?>
	   	<section class="team8-area pt-120 pos-rel">
	        <div class="team8-area-bg"></div>
	        <div class="team-dot-img">
	            <img src="<?php print get_template_directory_uri() ?>/img/home8/bg/dot-img1.png" alt="img">
	        </div>
	        <div class="container pos-rel">
	            <div class="position-element">
	                <div class="t8-pos1">
	                    <img src="<?php print get_template_directory_uri() ?>/img/home8/bg/skin-icon.png" alt="img">
	                </div>
	                <div class="t8-pos2"></div>
	            </div>
	            <div class="row">
	                <div class="col-lg-12">
	                    <div class="section-title text-center">
	                        <div class="section-text">
	                        	<?php if (!empty( $settings['sub_heading'])) : ?>
	                            	<span class="section8-subtitle mb-20 tp-el-subtitle"><?php echo wp_kses_post($settings['sub_heading']); ?></span>
	                            <?php endif; ?>
	                            <?php if (!empty($settings['heading'])) : ?>
	                            	<h2 class="section8-title mb-85 tp-el-title"><?php echo wp_kses_post($settings['heading']); ?></h2>
	                            <?php endif; ?>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
        <?php endif; ?>		
	<?php
	}
}