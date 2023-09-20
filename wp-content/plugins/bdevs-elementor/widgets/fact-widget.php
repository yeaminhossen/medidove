<?php
namespace BdevsElementor\Widget;

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
class BdevsFact extends \Elementor\Widget_Base {

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
		return 'bdevs-fact';
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
		return __( 'Fact', 'bdevs-elementor' );
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
		return 'eicon-post-content';
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
		return [ 'fact' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
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
			'section_content_features',
			[
				'label' => esc_html__( 'Chose Style', 'bdevs-elementor' ),
			]	
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'chose_style_1'  => esc_html__( 'Chose Style 1', 'bdevs-elementor' ),
					'chose_style_2' => esc_html__( 'Chose Style 2', 'bdevs-elementor' ),
				],
				'default'   => 'chose_style_1',
			]
		);

		$this->end_controls_section();

		// Heading Section
		$this->start_controls_section(
			'heading_section',
			[
				'label' => esc_html__( 'Heading Section', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Type section title here', 'bdevs-elementor' ),
				'default'     => __( 'This is Title', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label'       => __( 'Sub Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'This is Subtitle', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'appointment_link',
			[
				'label' => __( 'Link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'condition' => [
					'chose_style' => ['chose_style_1'],
				],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->end_controls_section();

		// Facts
		$this->start_controls_section(
			'section_content_sliders',
			[
				'label' => esc_html__( 'Facts', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Fact Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Fact #1', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					],
					[
						'tab_title'   => esc_html__( 'Fact #2', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					],
				],
				'fields' => [
					[
						'name'        => 'fact_number',
						'label'       => esc_html__( 'Number', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'label_block' => true,
					],					
					[
						'name'        => 'fact_icon',
						'label'       => esc_html__( 'Icon', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'label_block' => true,
					],					
					[
						'name'        => 'fact_title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'label_block' => true,
					],
					[
						'name'       => 'tab_content',
						'label'      => esc_html__( 'Content', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'show_label' => false,
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
				'default'      => 'center',
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
		$this->counter_box_style_controls();
	}


	// title_style_controls
    protected function title_style_controls() {
        $this->start_controls_section(
            '_section_styles_content',
            [
                'label' => __( 'Title / Content', 'bdevs-elementor' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_paddingds',
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
                'name' => 'content_backgroundsd',
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

        $this->end_controls_section();
    }

	// counter_box_style_controls
    protected function counter_box_style_controls()
    {
        $this->start_controls_section(
            '_section_style_counter_box',
            [
                'label' => __('Counter Box', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_responsive_control(
            'content_padding',
            [
                'label' => __( 'Content Padding', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-counter-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .bdevs-el-counter-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		$this->add_group_control(
		    Group_Control_Border::get_type(),
		    [
		        'name' => 'content_border',
		        'selector' => '{{WRAPPER}} .bdevs-el-counter-content',
		    ]
		);

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .bdevs-el-counter-content',
                'exclude' => [
                    'image'
                ]
            ]
        );

	    // Number
        $this->add_control(
            '_heading_number_title',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Number', 'bdevs-elementor'),
                'separator' => 'before'
            ]
        );

		$this->add_control(
            'number_title_spacing',
            [
                'label' => __('Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-fact-number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'number_title_color',
            [
                'label' => __('Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-fact-number' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'number_title',
                'selector' => '{{WRAPPER}} div.bdevs-el-fact-number',
            ]
        );

	    // Number Title
        $this->add_control(
            '_heading_number_titles',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Number Title', 'bdevs-elementor'),
                'separator' => 'before'
            ]
        );

		$this->add_control(
            'number_titles_spacing',
            [
                'label' => __('Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-fact-number-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'number_title_colors',
            [
                'label' => __('Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-fact-number-title' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'number_titles',
                'selector' => '{{WRAPPER}} .bdevs-el-fact-number-title',
            ]
        );

        // description
        $this->add_control(
            '_content_number_description',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Description', 'bdevs-elementor'),
                'separator' => 'before',

            ]
        );

        $this->add_responsive_control(
            'number_description_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-fact-number-des' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
                ],

            ]
        );

        $this->add_control(
            'number_description_color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-fact-number-des' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'number_description',
                'selector' => '{{WRAPPER}} .bdevs-el-fact-number-des',

            ]
        );

        $this->end_controls_section();
    }


	public function render() {
	$settings  = $this->get_settings_for_display(); 
	extract($settings);


	?>

	<?php if( $chose_style == 'chose_style_1' ): 

    $target = $appointment_link['is_external'] ? ' target="_blank"' : '';
	$nofollow = $appointment_link['nofollow'] ? ' rel="nofollow"' : '';

	?>
    <section class="fact-area fact-map primary-bg pos-rel pt-115 pb-60 bdevs-el-content">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-10">
                    <div class="section-title pos-rel mb-45">
                        <div class="section-text section-text-white pos-rel">
                            <?php 
                            if (!empty($title)) : ?>
                                <h5 class="bdevs-el-title"><?php print wp_kses_post( $title ); ?></h5>
                            <?php 
                        	endif; ?> 

                            <?php 
                            if (!empty($sub_title)) : ?>
                                <h2 class="sec-title bdevs-el-subtitle"><?php print wp_kses_post( $sub_title ); ?></h2>
                            <?php 
                        	endif; ?> 
                        </div>
                    </div>
                    <?php 
                    if (!empty($appointment_link['url'])) : ?>
	                    <div class="section-button section-button-left mb-30">
	                        <a data-animation="fadeInLeft" data-delay=".6s" href="<?php print esc_url( $appointment_link['url'] ); ?>" <?php print esc_attr($target).' '.esc_attr($nofollow); ?> class="btn btn-icon ml-0"><span><?php print esc_html_e('+', 'bdevs-elementor'); ?></span><?php print esc_html_e('Make Appointment', 'bdevs-elementor'); ?></a>
	                    </div>
                    <?php 
                	endif; ?>
                </div>
                <div class="col-lg-6 col-lg-6 col-md-8">
                    <div class="cta-satisfied">
					<?php 
					foreach ( $settings['tabs'] as $item ) : 
						extract($item);
					?>
                        <div class="single-satisfied mb-50">
                            <h1 class="bdevs-el-fact-number"><?php print $fact_number; ?></h1>
                            <h5 class="bdevs-el-fact-number-title"> <i class="fas fa-<?php print esc_attr( $fact_icon ); ?>"></i> <?php print wp_kses_post($fact_title); ?></h5>
                			<?php if ( !empty($item['tab_content'])  ) : ?>
								<p><?php print wp_kses_post($this->parse_text_editor( $tab_content )); ?></p>
							<?php endif; ?>
                        </div>
                    <?php
					endforeach;
					?>
                    </div>
                </div>
            </div>
        </div>
    </section>

   	<?php elseif( $chose_style == 'chose_style_2' ): ?>

   	<section class="counter8-area bdevs-el-content">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="section-title">
                        <div class="section-text">
                        	<?php if (!empty($sub_title)) : ?>
                            	<span class="section8-subtitle bdevs-el-subtitle mb-20 line-r-n"><?php print wp_kses_post( $sub_title ); ?></span>
                        	<?php endif; ?>

                            <?php if ( !empty($title) ) : ?>
                            	<h2 class="section8-title bdevs-el-title mb-65 tp-el-title"><?php print wp_kses_post( $title ); ?></h2>
                        	<?php endif; ?>

                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="counter8-wrapper pl-70">
                        <div class="row">
		                    <?php 
							foreach ( $settings['tabs'] as $item ) : 
								extract($item);
							?>
                            <div class="col-lg-6 col-md-6">
                                <div class="fact-6-wrapper mb-55 bdevs-el-counter-content">

                                    <h5 class="bdevs-el-fact-number-title"><?php print wp_kses_post($fact_title); ?></h5>

                                    <div class="fact-num bdevs-el-fact-number"><span class="plus">+</span><span class="counter bdevs-el-fact-number"><?php print $fact_number; ?></span></div>

                                </div>
                            </div>
		                    <?php
							endforeach;
							?>
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