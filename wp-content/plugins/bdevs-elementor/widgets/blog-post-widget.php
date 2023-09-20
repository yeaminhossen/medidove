<?php
namespace BdevsElementor\Widget;

use Elementor\Controls_Manager;
use \Elementor\Core\Schemes;
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
class BdevsBlogPost extends \Elementor\Widget_Base {

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
		return 'bdevs-blog-post';
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
		return __( 'Latest Blog', 'bdevs-elementor' );
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
		return [ 'blog-post' ];
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
			'sub_title',
			[
				'label'       => __( 'Sub Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'It is sub heading', 'bdevs-elementor' ),
				'placeholder' => __( 'Enter your subheading here...', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'It is heading', 'bdevs-elementor' ),
				'placeholder' => __( 'Enter your heading here...', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'link_text',
			[
				'label'       => esc_html__( 'Button Text', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'our blog', 'bdevs-elementor' ),
				'placeholder' => esc_html__( 'Link Text', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'bdevs-elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'bdevs-elementor' ),
				'show_external' => true,
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_service_post',
			[
				'label' => esc_html__( 'Blog Post', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'blog-style-1'  => esc_html__( 'Latest Blog Style 1', 'bdevs-elementor' ),
					'blog-style-2' => esc_html__( 'Latest Blog Style 2', 'bdevs-elementor' ),
					'blog-style-3' => esc_html__( 'Latest Blog Style 3', 'bdevs-elementor' ),
					'blog-style-4' => esc_html__( 'Latest Blog Style 4', 'bdevs-elementor' ),
					'blog-style-5' => esc_html__( 'Latest Blog Style 5', 'bdevs-elementor' ),
					'blog-style-6' => esc_html__( 'Latest Blog Style 6', 'bdevs-elementor' ),
				],
				'default'   => 'blog-style-1',
			]
		);

		$this->add_control(
            'shape_switch',
            [
                'label' => __('Shape Show/Hide', 'bdevs-elementor'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevs-elementor'),
                'label_off' => __('Hide', 'bdevs-elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
                'style_transfer' => true,
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
			'order',
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

		$this->add_control(
			'number',
			[
				'label'     => esc_html__( 'Post Count', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'3'  => esc_html__( '3', 'bdevs-elementor' ),
					'6' => esc_html__( '6', 'bdevs-elementor' ),
					'9' => esc_html__( '9', 'bdevs-elementor' ),
					'12' => esc_html__( '12', 'bdevs-elementor' ),
				],
				'default'   => '3',
			]
		);

		$this->add_control(
			'read_more',
			[
				'label'       => esc_html__( 'Link text', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Read More', 'bdevs-elementor' ),
				'placeholder' => esc_html__( 'Link Text', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'cat',
			[
				'label'       => __( 'Category Slug', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter category slug here...', 'bdevs-elementor' ),
				'label_block' => true,
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
        $this->post_list_style_controls();
        $this->title_desc_style_controls();
        $this->post_list_date_meta_style_controls();
        $this->blog_button_style_controls();
    }

    // post_list_style_controls
    public function post_list_style_controls()
    {
        $this->start_controls_section(
            '_section_post_list_style',
            [
                'label' => esc_html__('List', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'list_item_common',
            [
                'label' => esc_html__('Common', 'bdevs-elementor'),
                'type'  => \Elementor\Controls_Manager::HEADING,
            ]
        );

        $this->add_responsive_control(
            'list_item_padding',
            [
                'label' => esc_html__('Padding', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-blog-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'list_item_background',
                'label' => esc_html__('Background', 'bdevs-elementor'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .bdevs-blog-item,
                {{WRAPPER}} .bdevs-blog-item:before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'list_item_box_shadow',
                'label' => esc_html__('Box Shadow', 'bdevs-elementor'),
                'selector' => '{{WRAPPER}} .bdevs-blog-item',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'list_item_border',
                'label' => esc_html__('Border', 'bdevs-elementor'),
                'selector' => '{{WRAPPER}} .bdevs-blog-item',
            ]
        );

        $this->add_responsive_control(
            'list_item_border_radius',
            [
                'label' => esc_html__('Border Radius', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-blog-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();
    }

    // title_desc_style_controls
    public function title_desc_style_controls()
    {
        //Title Style
        $this->start_controls_section(
            '_section_post_list_title_style',
            [
                'label' => esc_html__('Title & Description', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Typography', 'bdevs-elementor'),
                'selector' => '{{WRAPPER}} .bdevs-el-title',
            ]
        );

        $this->add_responsive_control(
            'blog_title_spacing',
            [
                'label' => __('Title Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('title_tabs');
        $this->start_controls_tab(
            'title_normal_tab',
            [
                'label' => esc_html__('Normal', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'title_hover_tab',
            [
                'label' => esc_html__('Hover', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'title_hvr_color',
            [
                'label' => esc_html__('Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();


        // description
        $this->add_control(
            '_content_description',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Description', 'bdevs-elementor'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-desc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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

    // post_list_date_meta_style_controls
    public function post_list_date_meta_style_controls()
    {
        $this->start_controls_section(
            '_section_blog_date_meta_style',
            [
                'label' => esc_html__('Blog Date Meta', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'meta_typography',
				'label' => __('Typography', 'bdevs-elementor'),
				'scheme' => Schemes\Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .bdevs-elementor-post-list-meta-wrap span,
				{{WRAPPER}} .bdevs-elementor-post-list-meta-wrap span a',
			]
		);

		$this->add_control(
			'meta_color',
			[
				'label' => __('Color', 'bdevs-elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bdevs-elementor-post-list-meta-wrap span,
					{{WRAPPER}} .bdevs-elementor-post-list-meta-wrap span a' => 'color: {{VALUE}};',
				],
			]
		);


		$this->add_responsive_control(
			'meta_space',
			[
				'label' => __('Meta Space', 'bdevs-elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .bdevs-elementor-post-list-meta-wrap span,
					{{WRAPPER}} .bdevs-elementor-post-list-meta-wrap span a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'meta_icon_heading',
			[
				'label' => __('Meta Icon', 'bdevs-elementor'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'meta_icon_color',
			[
				'label' => __('Color', 'bdevs-elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bdevs-elementor-post-list-meta-wrap span i,
					{{WRAPPER}} .bdevs-elementor-post-list-meta-wrap span a i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'meta_icon_space',
			[
				'label' => __('Space Between', 'bdevs-elementor'),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .bdevs-elementor-post-list-meta-wrap span i,
					{{WRAPPER}} .bdevs-elementor-post-list-meta-wrap span a i'  => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();
    }

    // Blog Button Style Controls
    public function blog_button_style_controls()
    {
        // Button style
        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => esc_html__('Button', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__('Padding', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdvevs-blog-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .bdvevs-blog-btn'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .bdvevs-blog-btn',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdvevs-blog-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .bdvevs-blog-btn',
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs('_tabs_button');

        $this->start_controls_tab(
            '_tab_button_normal',
            [
                'label' => esc_html__('Normal', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => esc_html__('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdvevs-blog-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => esc_html__('Background Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdvevs-blog-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_service_button_hover',
            [
                'label' => esc_html__('Hover', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => esc_html__('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdvevs-blog-btn:hover, {{WRAPPER}} .bdvevs-blog-btn:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => esc_html__('Background Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdvevs-blog-btn:hover, {{WRAPPER}} .bdvevs-blog-btn:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label' => esc_html__('Border Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdvevs-blog-btn:hover, {{WRAPPER}} .bdvevs-blog-btn:focus' => 'border-color: {{VALUE}};',
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

		$this->add_render_attribute(
			[
				'link' => [
					'href'   => $settings['link']['url'] ? esc_url($settings['link']['url']) : '#',
					'target' => $settings['link']['is_external'] ? '_blank' : '_self'
				]
			], '', '', true
		);

	    $cat = get_term_by('slug', $cat, 'category');

	    if( !empty($cat->term_id) ){
	        $term_id = $cat->term_id;
	    }else{
	        $term_id = 1;
	    }

		if( $chose_style == 'blog-style-1' ): ?>

        <section class="latest-news-area">
            <div class="container">
                <div class="row">

                	<?php 
	                $q = new \WP_Query(array(
	                    'post_type'     => 'post',
	                    'posts_per_page'=> $number,
	                    'orderby' 		=> 'menu_order '.$orderby,
	                    'order'         => $order,
	                    'tax_query' => array(
	                        array(
	                            'taxonomy' => 'post_format',
	                            'field'    => 'slug',
								'terms' => array( 
					                'post-format-image', 
					            ),
	                            'operator' => 'IN',
	                        ),
	                    ),
	                ));

	                if($q->have_posts()):
	                    while($q->have_posts()): $q->the_post();  ?>
		                    <div class="col-xl-4 col-lg-6 col-md-6">
		                        <div class="latest-news-box mb-30">
		                            <div class="latest-news-thumb mb-30">
		                                <?php the_post_thumbnail(array(370, 270)); ?>
		                            </div>
		                            <div class="latest-news-content bdevs-blog-item">
							            <div class="news-meta bdevs-elementor-post-list-meta-wrap mb-15">
							                <span>
							                    <a class="bdevs-blog-author" href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
							                        <i class="far fa-user"></i> <?php print get_the_author(); ?>
							                    </a>
							                </span>
							                <span><i class="far fa-calendar-check"></i> <?php the_time(get_option('date_format')); ?> </span>
							            </div>
		                                <h3 class="bdevs-el-title"><a href="<?php the_permalink(); ?>"><?php print wp_trim_words(get_the_title(), 10, ''); ?></a></h3>
		                                <p class="bdevs-el-desc"><?php print wp_trim_words(get_the_content(), 24, ''); ?></p>
		                            </div>
		                        </div>
		                    </div>
	                    <?php 
	                    endwhile;  
	                    wp_reset_postdata();
	                endif; 
	                ?>
                </div>
            </div>
        </section>
		<?php elseif ($chose_style == 'blog-style-2') : ?>
		<section class="latest-news-area">
            <div class="container">
                <div class="row">
            	<?php 
                $q = new \WP_Query(array(
                    'post_type'     => 'post',
                    'posts_per_page'=> $number,
                    'orderby' 		=> 'menu_order '.$orderby,
                    'order'         => $order,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'term_id',
                            'terms'    => array( $term_id ),
                            'operator' => 'IN',
                        ),
                    ),
                ));
                if($q->have_posts()):
                    while($q->have_posts()): $q->the_post();  ?>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="latest-news-box latest-news-box-2 mb-30">
                            <div class="latest-news-thumb">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                            </div>
                            <div class="latest-news-content-box ">
                                <div class="latest-news-content bdevs-blog-item">
						            <div class="news-meta mb-15 bdevs-elementor-post-list-meta-wrap">
						                <span>
						                    <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
						                        <i class="far fa-user"></i> <?php print get_the_author(); ?>
						                    </a>
						                </span>
						                <span><i class="far fa-calendar-check"></i> <?php the_time(get_option('date_format')); ?> </span>
						            </div>
                                    <h3 class="bdevs-el-title"><a href="<?php the_permalink(); ?>"><?php print wp_trim_words(get_the_title(), 7, ''); ?></a></h3>
                                    <p class="bdevs-el-desc"><?php print wp_trim_words(get_the_content(), 14, ''); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
	           		 <?php 
					endwhile; 
					wp_reset_postdata(); 
				endif; 
				?>  
                </div>
            </div>
        </section>
        <?php elseif ($chose_style == 'blog-style-3') : ?>
	        <section class="latest-news-area">
	            <div class="container">
	                <div class="row">
	            	<?php 
	                $q = new \WP_Query(array(
	                    'post_type'     => 'post',
	                    'posts_per_page'=> $number,
	                    'orderby' 		=> 'menu_order '.$orderby,
	                    'order'         => $order,
	                    'tax_query' => array(
	                        array(
	                            'taxonomy' => 'category',
	                            'field'    => 'term_id',
	                            'terms'    => array( $term_id ),
	                            'operator' => 'IN',
	                        ),
	                    ),
	                ));
	                if($q->have_posts()):
	                    while($q->have_posts()): $q->the_post();  ?>	                	
	                    <div class="col-xl-4 col-lg-4 col-md-6">
	                        <div class="latest-news-box latest-news-box-2 latest-news-box-3 mb-30">
	                            <div class="latest-news-thumb">
	                               <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
	                            </div>
	                            <div class="latest-news-content-box  pl-0 pr-0">
	                                <div class="latest-news-content bdevs-blog-item">
							            <div class="news-meta mb-15 bdevs-elementor-post-list-meta-wrap">
							                <span>
							                    <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
							                        <i class="far fa-user"></i> <?php print get_the_author(); ?>
							                    </a>
							                </span>
							                <span><i class="far fa-calendar-check"></i> <?php the_time(get_option('date_format')); ?> </span>
							            </div>
	                                    <h3 class="bdevs-el-title"><a href="<?php the_permalink(); ?>"><?php print wp_trim_words(get_the_title(), 7, ''); ?></a></h3>
                                    	<p class="bdevs-el-desc"><?php print wp_trim_words(get_the_content(), 24, ''); ?></p>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
		           		 <?php 
						endwhile; 
						wp_reset_postdata(); 
					endif; 
					?>
	                </div>
	            </div>
	        </section>
	    <?php elseif ($chose_style == 'blog-style-4') : ?>
	    <!-- latest-news-area start -->
        <section class="latest-news-area">
            <div class="container">
                <div class="row">
	            	<?php 
	                $q = new \WP_Query(array(
	                    'post_type'     => 'post',
	                    'posts_per_page'=> $number,
	                    'orderby' 		=> 'menu_order '.$orderby,
	                    'order'         => $order,
	                    'tax_query' => array(
	                        array(
	                            'taxonomy' => 'category',
	                            'field'    => 'term_id',
	                            'terms'    => array( $term_id ),
	                            'operator' => 'IN',
	                        ),
	                    ),
	                ));
	                $author_bio_avatar_size = 40;
	                if($q->have_posts()):
	                    while($q->have_posts()): $q->the_post();  ?>                	
		                    <div class="col-xl-4 col-lg-6 col-md-6">
		                        <div class="h4latestnews-box pos-rel fix mb-30 bdevs-blog-item">
		                            <div class="h4latestnews-wrapper pos-rel">
		                                <div class="h4news-tag mb-10">
		                                    <?php print medidove_get_category(); ?>
		                                </div>
		                                <div class="h4news-content">
		                                    <h4 class="theme-color bdevs-el-title f-600"><a href="<?php the_permalink(); ?>"><?php print wp_trim_words(get_the_title(), 7, ''); ?></a></h4>
		                                    <p class="bdevs-el-desc"><?php print wp_trim_words(get_the_content(), 15, ''); ?></p>
		                                </div>
		                                <div class="h4news-admin d-flex align-items-center mb-40">
		                                    <div class="h4adminnews-thumb">
												<span><?php print get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size,'','',array('class'=>'media-object img-circle') ); ?><span class="theme-color f-600"><?php print get_the_author(); ?></span></span>
		                                    </div>
		                                    <div class="h4adminnews-date bdevs-elementor-post-list-meta-wrap">
		                                        <span><i class="far fa-calendar-alt"></i><?php the_time(get_option('date_format')); ?></span>
		                                    </div>
		                                </div>
		                                <div class="h4news-button">
		                                    <a data-animation="fadeInLeft" data-delay=".6s" href="<?php the_permalink(); ?>"
		                                        class="btn bdvevs-blog-btn btn-icon btn-icon-gray ml-0"><span>+</span><?php echo wp_kses_post($settings['read_more']); ?></a>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		           		 <?php 
						endwhile; 
						wp_reset_postdata(); 
					endif; 
					?>
                </div>
            </div>
        </section>
        <!-- latest-news-area end -->
        <?php elseif ($chose_style == 'blog-style-5') : ?>

		<section class="latest-news-area">
            <div class="container">
                <div class="row">
            	<?php 
                $q = new \WP_Query(array(
                    'post_type'     => 'post',
                    'posts_per_page'=> $number,
                    'orderby' 		=> 'menu_order '.$orderby,
                    'order'         => $order,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'term_id',
                            'terms'    => array( $term_id ),
                            'operator' => 'IN',
                        ),
                    ),
                ));
                if($q->have_posts()):
                	$number = 1;
                    while($q->have_posts()): $q->the_post(); 
                    ?>
	                    <div class="col-xl-4 col-lg-6 col-md-6">
	                        <div class="latest-news-box latest-news-box-2 latest-news-box-5 mb-30" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
	                            <div class="latest-news-content-box bdevs-blog-item">
	                                <div class="latest-news-content">
							            <div class="news-meta mb-15 bdevs-elementor-post-list-meta-wrap">
							                <span><i class="far fa-calendar-check"></i> <?php the_time(get_option('date_format')); ?> </span>
							            </div>
	                                    <h3 class="bdevs-el-title"><a href="<?php the_permalink(); ?>"><?php print wp_trim_words(get_the_title(), 7, ''); ?></a></h3>
	                                    <p class="bdevs-el-desc"><?php print wp_trim_words(get_the_content(), 14, ''); ?></p>
	                                    <div class="h4news-button">
		                                    <a data-animation="fadeInLeft" data-delay=".6s" href="<?php the_permalink(); ?>"
		                                        class="button-border bdvevs-blog-btn"><?php echo wp_kses_post($settings['read_more']); ?> <span>+</span></a>
		                                </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	           		<?php
	           		$number++;
					endwhile; 
					wp_reset_postdata(); 
				endif; 
				?>  
                </div>
            </div>
        </section>

        <?php elseif ($chose_style == 'blog-style-6') : ?>
		    <section class="news8-area pt-120 pb-100 pos-rel">
		        <div class="container pos-rel">
		        	<?php if ( !empty($settings['shape_switch']) ): ?>
		            <div class="position-element">
		                <div class="n8-p1">
		                    <img src="<?php print get_template_directory_uri() ?>/img/home8/bg/health-insurance.png" alt="img">
		                </div>
		                <div class="n8-p2">
		                    <img src="<?php print get_template_directory_uri() ?>/img/home8/bg/tr-shape1.png" alt="img">
		                </div>
		            </div>
		        	<?php endif; ?>

		            <div class="row">
		                <div class="col-lg-12">
		                    <div class="section-title text-center">
		                        <div class="section-text">
		                        	<?php if (!empty($sub_title)) : ?>
		                            <span class="section8-subtitle mb-20"><?php print wp_kses_post( $sub_title ); ?></span>
		                            <?php endif; ?>
		                            <?php if ( !empty($title) ) : ?>
		                            <h2 class="section8-title mb-80"><?php print wp_kses_post( $title ); ?></h2>
		                            <?php endif; ?>
		                        </div>
		                    </div>
		                </div>
		            </div>
		            <div class="row">
				    	<?php 
		                $q = new \WP_Query(array(
		                    'post_type'     => 'post',
		                    'posts_per_page'=> $number,
		                    'orderby' 		=> 'menu_order '.$orderby,
		                    'order'         => $order,
		                    'tax_query' => array(
		                        array(
		                            'taxonomy' => 'category',
		                            'field'    => 'term_id',
		                            'terms'    => array( $term_id ),
		                            'operator' => 'IN',
		                        ),
		                    ),
		                ));
		                if($q->have_posts()):
		                	$number = 1;
		                    while($q->have_posts()): $q->the_post(); 
		                ?>
		                <div class="col-xl-4 col-lg-6 col-md-6">
		                    <div class="latest-news-box latest-news-box-2 latest-news-box-5 grad-ov1 mb-30" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
		                        <div class="latest-news-content-box bdevs-blog-item">
		                            <div class="latest-news-content">
		                                <div class="news-meta mb-15 bdevs-elementor-post-list-meta-wrap"> 
		                                	<span><i class="far fa-calendar-check"></i> <?php the_time(get_option('date_format')); ?> </span> 
		                                </div>
		                                <h3 class="bdevs-el-title"><a href="<?php the_permalink(); ?>"><?php print wp_trim_words(get_the_title(), 6, ''); ?> </a></h3>
		                                <p class="bdevs-el-desc"><?php print wp_trim_words(get_the_content(), 12, ''); ?></p>
		                                <div class="h4news-button"> 
		                                	<a href="<?php the_permalink(); ?>" class="button-border bdvevs-blog-btn"><?php echo wp_kses_post($settings['read_more']); ?> <span>+</span></a>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
				       	<?php
			           		$number++;
							endwhile; 
							wp_reset_postdata(); 
						endif; 
						?> 
		            </div>
		        </div>
		    </section>
		<?php endif; ?>
	<?php
	}
}