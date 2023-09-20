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
class BdevsPortfolio extends \Elementor\Widget_Base {

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
		return 'bdevs-portfolio-post';
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
		return __( 'Portfolio', 'bdevs-elementor' );
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
		return [ 'portfolio' ];
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
				'label_block' => true
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

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_portfolio_post',
			[
				'label' => esc_html__( 'Portfolio Post', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'portfolio_two_collumn'  => esc_html__( 'Portfolio Two Collumn', 'bdevs-elementor' ),
					'portfolio_three_collumn' => esc_html__( 'Portfolio Three Collumn', 'bdevs-elementor' ),
					'portfolio_three_collumn_btn' => esc_html__( 'Portfolio Three Collumn Btn', 'bdevs-elementor' ),
					'portfolio_without_title' => esc_html__( 'Portfolio Without Heading', 'bdevs-elementor' ),
					'design_style_5' => esc_html__( 'Design Style 5', 'bdevs-elementor' ),
				],
				'default'   => 'portfolio_three_collumn',
				'label_block'   => 'true',
			]
		);

		$this->add_control(
			'post_number',
			[
				'label'     => esc_html__( 'Post Count', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'3'  => esc_html__( '3', 'bdevs-elementor' ),
					'4'  => esc_html__( '4', 'bdevs-elementor' ),
					'6' => esc_html__( '6', 'bdevs-elementor' ),
					'9' => esc_html__( '9', 'bdevs-elementor' ),
					'12' => esc_html__( '12', 'bdevs-elementor' ),
					'15' => esc_html__( '15', 'bdevs-elementor' ),
					'-1' => esc_html__( 'All', 'bdevs-elementor' ),
				],
				'default'   => '6',
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'     => esc_html__( 'Order By', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'ID'  => esc_html__( 'Post ID', 'bdevs-elementor' ),
					'title'  => esc_html__( 'Title', 'bdevs-elementor' ),
					'date' => esc_html__( 'Date', 'bdevs-elementor' ),
					'modified' => esc_html__( 'Last Modified Date', 'bdevs-elementor' ),
					'rand' => esc_html__( 'Random Order', 'bdevs-elementor' ),
					'comment_count' => esc_html__( 'Popular Post', 'bdevs-elementor' ),
				],
				'default'   => 'ID',
			]
		);

		$this->add_control(
			'post_order',
			[
				'label'     => esc_html__( 'Post Order', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'asc'  => esc_html__( 'ASC', 'bdevs-elementor' ),
					'desc' => esc_html__( 'DESC', 'bdevs-elementor' ),
				],
				'default'   => 'desc',
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
                'selector' => '{{WRAPPER}} .bdevs-el-content-bg:before',
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
                    '{{WRAPPER}} .bdevs-el-title' => 'color: {{VALUE}} !important',
                ],
            ]
        );

		$this->add_control(
            'title_hrv_color',
            [
                'label' => __( 'Text Hover Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title a:hover' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .bdevs-el-subtitle' => 'color: {{VALUE}} !important',
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
		extract( $settings );
		$order = $settings['post_order'];
		$post_number = $settings['post_number'];
		$chose_style = $settings['chose_style'];


	    $q = new \WP_Query(array(
	    	'posts_per_page' => $post_number,
	    	'post_type' => 'bdevs-portfolio',
	    	'orderby' 		=> 'menu_order '.$orderby,
	    	'order' => $order
	    ));
	    

	    //other style
	    $args = array(
	    	'posts_per_page' => $post_number,
	    	'post_type' => 'bdevs-portfolio',
	    	'orderby' 		=> 'menu_order '.$orderby,
	    	'order' => $order
	    );
	    $filteArr = array();
	    $postArr = new \WP_Query($args);

	    if( is_array($postArr->posts) && !empty($postArr->posts) ) {

	        foreach($postArr->posts as $item) {
	            $taxsArr = wp_get_post_terms($item->ID, 'portfolio_categories', array("fields" => "all"));
	            if(is_array($taxsArr) && !empty($taxsArr)) {
	                foreach($taxsArr as $tax) {
	                    $filteArr[$tax->slug] = $tax->name;
	                }
	            }
	        }
	    }

	    // var_dump($filteArr);
	    if( is_array($filteArr) && !empty($filteArr) ):


		?>

		<?php if( $chose_style == 'portfolio_three_collumn' ): ?>
        <section class="portfolio-area">
            <div class="container">
                <div class="row">
                    <!-- START PORTFOLIO FILTER AREA -->
                    <div class="col-12">
                        <div class="text-center">
                            <div class="portfolio-filter mb-40">
                                <button class="tp-el-btn active" data-filter="*"><?php print esc_html__('Show all','bdevs-elementor'); ?></button>
								<?php 
			                    foreach($filteArr as $tax_slug => $tax_name) { ?>
                                <button class="tp-el-btn" data-filter=".<?php print esc_attr($tax_slug); ?>"><?php print esc_html($tax_name); ?></button>
								<?php 
			                    }
			                    ?>
                            </div>
                        </div>
                    </div>
                    <!-- END PORTFOLIO FILTER AREA -->
                </div>
                <div id="portfolio-grid" class="row row-portfolio">
                    <div class="col-lg-4 col-md-6 grid-sizer"></div>
			        <?php 
			        $j = 0;
			        while($q->have_posts()) : $q->the_post(); 

			        $j++;
			        $column_num = ( $j%1 == 0 AND $j < 2 ) ? 8 : 4;    
			        $item_classes = '';
			        $item_cats = get_the_terms( get_the_id(), 'portfolio_categories' );
			        if($item_cats):
			            foreach($item_cats as $item_cat) {
			                $item_classes .= $item_cat->slug . ' ';
			            }
			        endif;//endif

			        ?>
                    <div class="col-lg-4 col-md-6 grid-item <?php print esc_attr($item_classes); ?>">
                        <div class="portfolio-item mb-30">
                            <div class="portfolio-wrapper">
                                <div class="portfolio-image bdevs-el-content-bg">
                                    <?php the_post_thumbnail('bdevs-gallery-thumb'); ?>
                                    <div class="view-icon">
                                    	<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
                                        <a class="popup-image" href="<?php print esc_url($featured_img_url); ?>">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="portfolio-caption bdevs-el-content">
                                    <h4 class="bdevs-el-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <p class="bdevs-el-subtitle">
	                                    <?php 
				                            $cats = get_the_terms(get_the_ID(), 'portfolio_categories');

				                            if( is_array($cats) ){
				                                $cats_count = count($cats); $count = 1;
				                                 foreach ( $cats as $cat ) {
				                                    $exatra = ( $cats_count > $count ) ? ', ' : '';
				                                     print esc_html($cat->slug . $exatra);

				                                    $count++;
				                                }
				                            }
				                        ?>
			                        </p>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php   
				        endwhile; 
				        wp_reset_postdata();
				    ?>
                </div>
            </div>
        </section>
        <?php elseif( $chose_style == 'portfolio_two_collumn' ): ?>
        <section class="portfolio-area">
            <div class="container">
                <div class="row">
                    <!-- START PORTFOLIO FILTER AREA -->
                    <div class="col-12">
                        <div class="text-center">
                            <div class="portfolio-filter mb-40">
                                <button class="active tp-el-btn" data-filter="*"><?php print esc_html__('Show all','bdevs-elementor'); ?></button>
								<?php 
			                    foreach($filteArr as $tax_slug => $tax_name) { ?>
                                <button class="tp-el-btn" data-filter=".<?php print esc_attr($tax_slug); ?>"><?php print esc_html($tax_name); ?></button>
								<?php 
			                    }
			                    ?>
                            </div>
                        </div>
                    </div>
                    <!-- END PORTFOLIO FILTER AREA -->
                </div>
                <div id="portfolio-grid" class="row row-portfolio">
                    <div class="col-lg-6 col-md-6 grid-sizer"></div>
			        <?php 
			        $j = 0;
			        while($q->have_posts()) : $q->the_post(); 

			        $j++;
			        $column_num = ( $j%1 == 0 AND $j < 2 ) ? 8 : 4;    
			        $item_classes = '';
			        $item_cats = get_the_terms( get_the_id(), 'portfolio_categories' );
			        if($item_cats):
			            foreach($item_cats as $item_cat) {
			                $item_classes .= $item_cat->slug . ' ';
			            }
			        endif;//endif

			        ?>
                    <div class="col-lg-6 col-md-6 grid-item <?php print esc_attr($item_classes); ?>">
                        <div class="portfolio-item mb-30">
                            <div class="portfolio-wrapper">
                                <div class="portfolio-image bdevs-el-content-bg">
                                    <?php the_post_thumbnail('bdevs-gallery-thumb'); ?>
                                    <div class="view-icon">
                                    	<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
                                        <a class="popup-image" href="<?php print esc_url($featured_img_url); ?>">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="portfolio-caption bdevs-el-content">
                                    <h4 class="bdevs-el-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <p class="bdevs-el-subtitle">
	                                    <?php 
				                            $cats = get_the_terms(get_the_ID(), 'portfolio_categories');

				                            if( is_array($cats) ){
				                                $cats_count = count($cats); $count = 1;
				                                 foreach ( $cats as $cat ) {
				                                    $exatra = ( $cats_count > $count ) ? ', ' : '';
				                                     print esc_html($cat->slug . $exatra);

				                                    $count++;
				                                }
				                            }
				                        ?>
			                        </p>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php   
				        endwhile; 
				        wp_reset_postdata();
				    ?>
                </div>
            </div>
        </section>
        <?php 
        elseif( $chose_style == 'portfolio_three_collumn_btn' ): ?>
	        <!-- Photo Gallery  -->
	        <div class="photo-gallery">
	            <div class="container">
	                <div class="row gallery-portfolio">
	                <?php 
			        $j = 0;
			        while($q->have_posts()) : $q->the_post(); 

			        $j++;
			        $column_num = ( $j%1 == 0 AND $j < 2 ) ? 8 : 4;    
			        $item_classes = '';
			        $item_cats = get_the_terms( get_the_id(), 'portfolio_categories' );
			        if($item_cats):
			            foreach($item_cats as $item_cat) {
			                $item_classes .= $item_cat->slug . ' ';
			            }
			        endif;//endif

			        ?>
	                    <div class="col-lg-4 col-md-6 grid-gallery <?php print esc_attr($item_classes); ?>">
	                        <div class="h5gallery__wrapper bdevs-el-content bdevs-el-content-bg pos-rel text-center mb-30">
	                            <div class="h5gallery-thumb">
	                                <?php the_post_thumbnail('bdevs-gallery-thumb'); ?>
	                            </div>
	                            <div class="h5gallery-content">
	                                <a class="popup-image" href="<?php the_post_thumbnail_url(); ?>"><i class="fal fa-plus"></i></a>
	                                <h4 class="white-color bdevs-el-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	                                <span>
	                                    <?php 
				                            $cats = get_the_terms(get_the_ID(), 'portfolio_categories');

				                            if( is_array($cats) ){
				                                $cats_count = count($cats); $count = 1;
				                                 foreach ( $cats as $cat ) {
				                                    $exatra = ( $cats_count > $count ) ? '. ' : ''; ?>
				                                    <a class="bdevs-el-subtitle" href="#"><?php print esc_html($cat->slug . $exatra); ?></a>
													
													<?php 
				                                    $count++;
				                                }
				                            }
				                        ?>
									</span>
	                            </div>
	                        </div>
	                    </div>
					<?php   
				        endwhile; 
				        wp_reset_postdata();
				    ?>
	                </div>
	            </div>
	        </div>
	        <!-- Photo Gallery end -->
        <?php elseif( $chose_style == 'portfolio_without_title' ): ?>
	        <!-- Photo Gallery  -->
	        <div class="photo-gallery">
	            <div class="container">
	            	<div class="row">
	                    <div class="col-sm-12">
	                        <div class="gallery-button mb-50">
	                            <div class="gallery-filter">
		                            <button class="active tp-el-btn" data-filter="*"><?php print esc_html__('Show all','bdevs-elementor'); ?></button>
									<?php 
				                    foreach($filteArr as $tax_slug => $tax_name) { ?>
	                                <button class="tp-el-btn" data-filter=".<?php print esc_attr($tax_slug); ?>"><?php print esc_html($tax_name); ?></button>
									<?php 
				                    }
				                    ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="row gallery-portfolio">
	                <?php 
			        $j = 0;
			        while($q->have_posts()) : $q->the_post(); 

			        $j++;
			        $column_num = ( $j%1 == 0 AND $j < 2 ) ? 8 : 4;    
			        $item_classes = '';
			        $item_cats = get_the_terms( get_the_id(), 'portfolio_categories' );
			        if($item_cats):
			            foreach($item_cats as $item_cat) {
			                $item_classes .= $item_cat->slug . ' ';
			            }
			        endif;//endif

			        ?>
	                    <div class="col-lg-3 col-md-3 grid-gallery <?php print esc_attr($item_classes); ?>">
	                        <div class="h5gallery__wrapper  bdevs-el-content bdevs-el-content-bg pos-rel text-center mb-30">
	                            <div class="h5gallery-thumb">
	                                <?php the_post_thumbnail('bdevs-gallery-thumb'); ?>
	                            </div>
	                            <div class="h5gallery-content">
	                                <a class="popup-image" href="<?php the_post_thumbnail_url(); ?>"><i class="fal fa-plus"></i></a>
	                                <h4 class="white-color bdevs-el-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	                                <span>
	                                    <?php 
				                            $cats = get_the_terms(get_the_ID(), 'portfolio_categories');

				                            if( is_array($cats) ){
				                                $cats_count = count($cats); $count = 1;
				                                 foreach ( $cats as $cat ) {
				                                    $exatra = ( $cats_count > $count ) ? '. ' : ''; ?>
				                                    <a class="bdevs-el-subtitle" href="#"><?php print esc_html($cat->slug . $exatra); ?></a>
													
													<?php 
				                                    $count++;
				                                }
				                            }
				                        ?>
									</span>
	                            </div>
	                        </div>
	                    </div>
					<?php   
				        endwhile; 
				        wp_reset_postdata();
				    ?>
	                </div>
	            </div>
	        </div>
	        <!-- Photo Gallery end -->

		<?php elseif( $chose_style == 'design_style_5' ): ?>
		<div class="gallery8-area">
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-12">
	                    <div class="gallery8-button mb-50">
	                        <div class="gallery8-filter">
                                <button class="active" data-filter="*"><?php print esc_html__('Show all','bdevs-elementor'); ?></button>
								<?php 
			                    foreach($filteArr as $tax_slug => $tax_name) { ?>
                                <button class="tp-el-btn" data-filter=".<?php print esc_attr($tax_slug); ?>"><?php print esc_html($tax_name); ?></button>
								<?php 
			                    }
			                    ?>
	                        </div>  
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="gallery8-container">
	            <div class="row gallery8-portfolio">
		            <?php 
				        $j = 0;
				        while($q->have_posts()) : $q->the_post(); 

				        $j++;
				        $column_num = ( $j%1 == 0 AND $j < 2 ) ? 8 : 4;    
				        $item_classes = '';
				        $item_cats = get_the_terms( get_the_id(), 'portfolio_categories' );
				        if($item_cats):
				            foreach($item_cats as $item_cat) {
				                $item_classes .= $item_cat->slug . ' ';
				            }
				        endif;//endif
				    ?>
	                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 grid-gallery treatment nurse <?php print esc_attr($item_classes); ?>">
	                    <div class="h8gallery__wrapper pos-rel text-center mb-30">
	                        <div class="h8gallery-thumb">
	                            <?php the_post_thumbnail('bdevs-gallery-thumb'); ?>
	                        </div>
	                        <div class="h8gallery-content bdevs-el-content bdevs-el-content-bg">
	                            <div class="h8gallery-content-inner text-center">
	                                <h4 class="bdevs-el-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	                                <p class="bdevs-el-subtitle"><?php print wp_trim_words(get_the_content(), 10, ''); ?></p>
	                                <div class="h8gallery-view-btn">
	                                    <a href="<?php the_permalink(); ?>" class="icon-btn-circle"><i class="fal fa-arrow-right"></i></a>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <?php   
				        endwhile; 
				        wp_reset_postdata();
				    ?>
	            </div>
	        </div>
	    </div>

        <?php endif; ?>		


		<?php endif; ?>
	<?php
	}

}