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
class BdevsServicesList extends \Elementor\Widget_Base {

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
		return 'bdevs-services-list';
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
		return __( 'Services List', 'bdevs-elementor' );
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
		return [ 'services' ];
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

		// Services List
		$this->start_controls_section(
			'section_content_features',
			[
				'label' => esc_html__( 'Services List', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'style-1'  => esc_html__( 'Style 1', 'bdevs-elementor' ),
					// 'style-2' => esc_html__( 'Style 2', 'bdevs-elementor' ),
				],
				'default'   => 'style-1',
			]
		);

		$this->add_control(

			'tabs',
			[
				'label' => esc_html__( 'Services List Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Services List #1', 'bdevs-elementor' ),
					]
				],
				'fields' => [
                    [
                        'name' => 'field_conditiond',
                        'label' => __( 'Field condition', 'bdves-elementor' ),
                        'type' => Controls_Manager::SELECT,
                        'options' => [
                            'style_1' => __( 'Style 1', 'bdves-elementor' ),
                        ],
                        'default' => 'style_1',
                        'dynamic'     => [ 'active' => true ],      
                    ],	
					    
					[
						'name'    => 'test_bg_icon',
						'label'   => esc_html__( 'Services Back Icon', 'bdevs-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'dynamic' => [ 'active' => true ],
						'default' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
					],
					[
						'name'        => 'tab_title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Jon Haris' , 'bdevs-elementor' ),
						'label_block' => true,
					],		
					[
						'name'       => 'tab_desc',
						'label'      => esc_html__( 'Description', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Description here....', 'bdevs-elementor' ),
						'placeholder'    => esc_html__( 'Enter Description here....', 'bdevs-elementor' ),
						'show_label' => true,
					],										
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
				'default'      => 'left',
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
	

		$this->add_control(
			'test_bg_icon_show',
			[
				'label'   => esc_html__( 'Testimonial BG Icon on/off', 'bdevs-elementor' ),
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

		<div class="features-area">
	        <div class="container">
	            <div class="row wow fadeInUp2">
	                <div class="col-lg-12">
	                    <div class="features-wrapper">
							<?php 
							foreach ( $settings['tabs'] as $item ) : 
								extract($item);

							?>

							<?php 
						   	if ( '' !== $item['test_bg_icon'] )  : 
						   		$test_bg_icon_src = wp_get_attachment_image_src( $item['test_bg_icon']['id'], 'full' );
								$test_bg_icon = $test_bg_icon_src ? $test_bg_icon_src[0] : ''; 
						   	?>
							<?php endif; ?>
	                        <div class="single-feature mb-30">
	                            <div class="features-icon">
	                                <img src="<?php echo esc_url($test_bg_icon); ?>" alt="img">
	                            </div>
	                            <div class="features-text">

	                                <h5 class="features-text-title"><?php print wp_kses_post( $tab_title ); ?></h5>

	                                <p><?php print wp_kses_post( $tab_desc ); ?></p>

	                            </div>
	                        </div>
							<?php 
							endforeach; ?>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>

		<?php elseif( $chose_style == 'testimonial-style-2' ): ?>
        <div class="testimonials-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                        <div class="section-title text-center pos-rel mb-40 tp-el-content">
                        	<?php if ( $settings['section_title_icon'] ) : ?>
                            <div class="section-icon">
                                <img class="section-back-icon" src="<?php print get_template_directory_uri(); ?>/img/section/section-back-icon.png" alt="">
                            </div>
                            <?php endif; ?>
                            <div class="section-text pos-rel">
                            	<?php if (!empty($sub_title)) : ?>
					                <h5 class="tp-el-subtitle"><?php print wp_kses_post( $sub_title ); ?></h5>
					            <?php endif; ?> 

					            <?php if (!empty($title)) : ?>
					                <h2 class="sec-title tp-el-title"><?php print wp_kses_post( $title ); ?></h2>
					            <?php endif; ?>
                            </div>
                            <?php if ( $settings['section_title_line'] ) : ?>
                            <div class="section-line pos-rel">
                                <img src="<?php print get_template_directory_uri(); ?>/img/shape/section-title-line.png" alt="">
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="single-testi">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1 col-lg-12 col-md-12">
	                        <div class="testimonials-activation-2">
								<?php foreach ( $settings['tabs'] as $item ) : 
									extract($item);
									$author_image_src = wp_get_attachment_image_src( $tab_image['id'], 'full' );
									$author_image_url = $author_image_src ? $author_image_src[0] : ''; 
								?>

								<?php 
							   	if ( '' !== $item['test_bg_icon'] )  : 
							   		$test_bg_icon_src = wp_get_attachment_image_src( $item['test_bg_icon']['id'], 'full' );
									$test_bg_icon = $test_bg_icon_src ? $test_bg_icon_src[0] : ''; 
							   	?>
								<?php endif; ?>
	                            <div class="testi-box text-center pos-rel">
	                                <div class="testi-content pos-rel">
	                                	<?php if ( $settings['test_bg_icon_show'] ) : ?>
	                                    <div class="testi-bg-icon">
	                                        <img src="<?php echo esc_url($test_bg_icon); ?>" alt="">
	                                    </div>
	                                    <?php endif; ?>
	                                    <div class="testi-quato-icon">
	                                        <img src="<?php print get_template_directory_uri(); ?>/img/shape/testi-quato-icon.png" alt="">
	                                    </div>
	                                    <div class="text-text-boxx">
	                                       <p><?php print wp_kses_post( $tab_desc ); ?></p>
	                                    </div>
	                                    <span></span>
	                                </div>
	                                <div class="testi-author">
	                                    <h2 class="testi-author-title"><?php print wp_kses_post( $tab_name ); ?></h2>
	                                    <span class="testi-author-desination"><?php print wp_kses_post( $tab_designation ); ?></span>
	                                </div>
	                                <div class="test-author-icon">
	                                    <img src="<?php echo esc_url($author_image_url); ?>" alt="Author Image">
	                                </div>
	                            </div>
	                            <?php endforeach; ?>
	                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

		<?php endif; ?>
	<?php
	}

}