<?php
namespace BdevsElementor\Widget;
use \Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
Use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Background;

/**
 * Bdevs Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class BdevsBlogLayout extends \Elementor\Widget_Base {

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
		return 'bdevs-blog-post-layout-widget';
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
		return __( 'Blog Post Layout', 'bdevs-elementor' );
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


    // register_content_controls
    protected function register_controls () {
  
        //Settings
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __( 'Settings', 'bdevs-element' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'design_style',
            [
                'label' => __( 'Design Style', 'bdevs-element' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __( 'Style 1 : Blog Grid', 'bdevs-element' ),
                    'style_2' => __( 'Style 2 : Sidebar / No Sidebar ', 'bdevs-element' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => __('Content', 'bdevs-element'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevs-element'),
                'label_off' => __('Hide', 'bdevs-element'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'title_limit',
            [
                'label' => __('Title Limit', 'bdevs-element'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '9',
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'content' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'content_limit',
            [
                'label' => __('Content Limit', 'bdevs-element'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '16',
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'content' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_button_settings',
            [
                'label' => __( 'Settings', 'bdevs-element' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_3'],
                ]
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'bdevs-element'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Make Donation', 'bdevs-element' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_post_tab_query',
            [
                'label' => __( 'Query', 'bdevs-element' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'item_limit',
            [
                'label' => __( 'Item View', 'bdevs-element' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 6,
                'dynamic' => [ 'active' => true ],
            ]
        );

		$this->add_control(
			'orderby',
			[
				'label'     => esc_html__( 'Order By', 'bdevs-element' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'ID'  => esc_html__( 'Post ID', 'bdevs-element' ),
					'title'  => esc_html__( 'Title', 'bdevs-element' ),
					'date' => esc_html__( 'Date', 'bdevs-element' ),
					'modified' => esc_html__( 'Last Modified Date', 'bdevs-element' ),
					'rand' => esc_html__( 'Random Order', 'bdevs-element' ),
					'comment_count' => esc_html__( 'Popular Post', 'bdevs-element' ),
				],
				'default'   => 'ID',
			]
		);

		$this->add_control(
			'post_order',
			[
				'label'     => esc_html__( 'Post Order', 'bdevs-element' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'asc'  => esc_html__( 'ASC', 'bdevs-element' ),
					'desc' => esc_html__( 'DESC', 'bdevs-element' ),
				],
				'default'   => 'desc',
			]
		);

        $this->add_control(
            'pagination_switch',
            [
                'label' => __('Pagination on/off', 'bdevs-element'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevs-element'),
                'label_off' => __('Hide', 'bdevs-element'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'blog_no_sidebar',
            [
                'label' => __('Blog Sidebar on/off', 'bdevs-element'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevs-element'),
                'label_off' => __('Hide', 'bdevs-element'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'design_style' => ['style_2'],
                ]
            ]
        );

        $this->add_control(
            'post_column',
            [
                'label' => __( 'Design Style', 'bdevs-element' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '6' => __( '2 Column', 'bdevs-element' ),
                    '4' => __( '3 Column', 'bdevs-element' ),
                ],
                'default' => '4',
                'frontend_available' => true,
                'style_transfer' => true,
                'condition' => [
                    'design_style' => ['style_1'],
                ]
            ]
        );

        $this->end_controls_section();

    }

	protected function _register_style_controls() {

        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __( 'Title / Content', 'bdevs-element' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __( 'Content Padding', 'bdevs-element' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Background::get_type(),
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
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Title', 'bdevs-element' ),
                'separator' => 'before'
            ]
        );
        
        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevs-element' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'bdevs-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .bdevs-el-title',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );
        
        // Subtitle    
        $this->add_control(
            '_heading_subtitle',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Subtitle', 'bdevs-element' ),
                'separator' => 'before'
            ]
        );
        
        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevs-element' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Text Color', 'bdevs-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .bdevs-el-subtitle',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );
        
        // description
        $this->add_control(
            '_content_description',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Description', 'bdevs-element' ),
                'separator' => 'before'
            ]
        );
        
        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevs-element' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
            'description_color',
            [
                'label' => __( 'Text Color', 'bdevs-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description',
                'selector' => '{{WRAPPER}} .bdevs-el-content p',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );
        
        
        $this->end_controls_section();
        
        // Tab 
        $this->start_controls_section(
            '_section_post_tab_filter',
            [
                'label' => __( 'Tab', 'bdevs-element' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'tab_line_color',
            [
                'label' => __( 'Tab Line BG', 'bdevs-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-filter-box::before' => 'background: {{VALUE}}',
                ],
            ]
        );      

        $this->add_control(
            'tab_box_color',
            [
                'label' => __( 'Tab Box BG', 'bdevs-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-filter-box' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'tab_margin_btm',
            [
                'label' => __( 'Margin Bottom', 'bdevs-element' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => 'px',
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .project-filter-box' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'filter_pos' => 'top',
                ],
            ]
        );

        $this->add_responsive_control(
            'tab_padding',
            [
                'label' => __( 'Padding', 'bdevs-element' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .project-filter-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'tab_shadow',
                'label' => __( 'Box Shadow', 'bdevs-element' ),
                'selector' => '{{WRAPPER}} .project-filter-box',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'tab_border',
                'label' => __( 'Border', 'bdevs-element' ),
                'selector' => '{{WRAPPER}} .project-filter-box',
            ]
        );

        $this->add_responsive_control(
            'tab_item',
            [
                'label' => __( 'Tab Item', 'bdevs-element' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'tab_item_margin',
            [
                'label' => __( 'Margin', 'bdevs-element' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .project-filter-box button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'tab_item_padding',
            [
                'label' => __( 'Padding', 'bdevs-element' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .project-filter-box button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->start_controls_tabs( 'tab_item_tabs' );
        $this->start_controls_tab(
            'tab_item_normal_tab',
            [
                'label' => __( 'Normal', 'bdevs-element' ),
            ]
        );

        $this->add_control(
            'tab_item_color',
            [
                'label' => __( 'Color', 'bdevs-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-filter-box button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'tab_item_background',
                'label' => __( 'Background', 'bdevs-element' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .project-filter-box button',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_item_hover_tab',
            [
                'label' => __( 'Hover', 'bdevs-element' ),
            ]
        );

        $this->add_control(
            'tab_item_hvr_color',
            [
                'label' => __( 'Color', 'bdevs-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-filter-box button.active' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .project-filter-box button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'tab_item_hvr_background',
                'label' => __( 'Background', 'bdevs-element' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .project-filter-box button.active,{{WRAPPER}} .project-filter-box button:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tab_item_typography',
                'label' => __( 'Typography', 'bdevs-element' ),
                'scheme' => Typography::TYPOGRAPHY_2,
                'selector' => '{{WRAPPER}} .project-filter-box button',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'tab_item_border',
                'label' => __( 'Border', 'bdevs-element' ),
                'selector' => '{{WRAPPER}} .project-filter-box button',
            ]
        );

        $this->add_responsive_control(
            'tab_item_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevs-element' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .project-filter-box button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();

	}



	public function render() {
        $settings = $this->get_settings_for_display();

		$pg_num        = max(1, (int) filter_input(INPUT_GET, 'pageid'));
        $posts_per_page =  $settings['item_limit'];
        $order =  $settings['post_order'];
        $order_by =  $settings['orderby'];
		$blog_post_args = array(
			'post_type'      => 'post',
			'post_status'    => array('publish'),
			// 'nopaging' => false,
			'paged'          => $pg_num,
			'posts_per_page' => $posts_per_page,
			'orderby' => $order_by,
			'order' => $order,
		);
		$blog_post_query = new \WP_Query($blog_post_args);

	?>		

		<?php if( $settings['design_style'] == 'style_1' ) : ?>

		<?php if ($blog_post_query->have_posts()) : ?>   

        <!-- blog-area start -->
        <section class="blog-area pt-100 pb-60">
            <div class="container">
                <div class="row">
                    <?php
                        while ($blog_post_query->have_posts()) :
                            $blog_post_query->the_post();
                            $blog_post_id   = get_the_ID();
                            $medidove_blog_comments = get_theme_mod( 'medidove_blog_comments', true );
                            $medidove_blog_author = get_theme_mod( 'medidove_blog_author', true );
                    ?>

                    <div class="col-xl-<?php echo esc_attr($settings['post_column']); ?> col-lg-4 col-md-6">
                        <article class="postbox post format-image mb-40">
                        	<?php if ( has_post_thumbnail() ): ?>
                            <div class="postbox__thumb">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                            </div>
                            <?php endif; ?>
                            <div class="postbox__text p-30">
                                <div class="post-meta mb-15">
                                	<?php if ( !empty($medidove_blog_author) ): ?>
                                    <span><a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )?>"><i class="far fa-user"></i>  <?php echo get_the_author_meta('display_name', get_the_author_meta('ID')); ?>   </a>
                                    </span>
                                    <?php endif; ?>

                                    <?php if ( !empty($medidove_blog_comments) ): ?>
                                    <span><a href="<?php comments_link();?>"><i class="far fa-comments"></i> <?php comments_number();?></a></span>
                                    <?php endif; ?>
                                </div>

                                <?php if (!empty($settings['title_limit'])):
                                    $title_limit = (!empty($settings['title_limit'])) ? $settings['title_limit'] : '';
                                ?>
                                <h3 class="blog-title blog-title-sm">
									<a href="<?php the_permalink();?>"><?php print wp_trim_words(get_the_title(get_the_ID()), $title_limit, ''); ?></a>
                                </h3>

                               	<?php else : ?>

                                <h3 class="blog-title blog-title-sm">
									<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
                                </h3>

                                <?php endif; ?>

                                <?php if (!empty($settings['content'])):
                                    $content_limit = (!empty($settings['content_limit'])) ? $settings['content_limit'] : '';
                                ?>
                                <div class="post-text">
                                	<p><?php print wp_trim_words(get_the_excerpt(get_the_ID()), $content_limit, ''); ?></p>
                                </div>
                                <?php endif; ?>

                                <div class="read-more">
                                    <a href="<?php the_permalink();?>" class="read-more">read more <i class=" fas fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <?php endwhile; wp_reset_query(); ?>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="basic-pagination basic-pagination-2 text-center mb-40">
                            <?php
                            $current = max(1, (int) filter_input(INPUT_GET, 'pageid'));
                            echo paginate_links(
                                array(
                                    'base'     => add_query_arg('pageid', '%#%'),
                                    'format'   => '?pageid=%#%',
                                    'total'    => $blog_post_query->max_num_pages,
                                    'current'  => $current,
                                    'show_all' => false,
                                    'end_size' => 1,
                                    'mid_size' => 2,
                                    'prev_text' => '<i class="fas fa-angle-double-left"></i>',
                                    'next_text' => '<i class="fas fa-angle-double-right"></i>',
                                    'type'     => 'plain',
                                    'add_args' => false,
                                    'add_fragment' => '',
                                )
                            );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-area end -->


        <?php endif; wp_reset_query(); ?>

        <?php elseif($settings['design_style'] == 'style_2' ): ?>
            <div class="service8-item-wrapper service8-item2 pt-90 mb-40" >
                <div class="service8-item-img pos-rel pb-30">
                	<?php if (( ! empty( $settings['button_link']['url'] )) ): ?>
                    <div class="service8-link-bth">
                        <a <?php echo $this->get_render_attribute_string( 'button_link' ); ?> class="arrow-link-btn"><i class="fal fa-long-arrow-right"></i></a>
                    </div>
                    <?php endif; ?>

                    <?php if (( ! empty( $image )) ): ?>
                    	<img src="<?php print esc_url($image); ?>" alt="img">
                    <?php endif; ?>

                </div>

                <div class="service8-item-content">
                	<?php if (( ! empty( $settings['heading'] )) ): ?>
                    	<h4 class="mb-20"><a <?php echo $this->get_render_attribute_string( 'heading_link' ); ?>><?php echo wp_kses_post($settings['heading']); ?></a></h4>
                    <?php endif; ?>

	                <?php if (( ! empty( $settings['desc'] )) ): ?>
	                	<p class="mb-35"><?php echo esc_html($settings['desc']); ?></p>
	                <?php endif; ?>
                </div>
            </div>

        <?php elseif($settings['design_style'] == 'style_3' ): ?>
            <div class="service8-item-wrapper skin-treat-service skin-treat-service1 mb-40 pt-70">
                <div class="service8-item-content skin-treat-service-content">
                	<?php if (( ! empty( $settings['heading'] )) ): ?>
                    	<h4 class="mb-15"><a <?php echo $this->get_render_attribute_string( 'heading_link' ); ?>><?php echo wp_kses_post($settings['heading']); ?></a></h4>
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

        <?php elseif($settings['design_style'] == 'style_4' ): ?>
            <div class="service8-item-wrapper skin-treat-service skin-treat-service2 mb-40">
            	<?php if (( ! empty( $image )) ): ?>
                <div class="service8-item-img skin-treat-service-img pos-rel mb-30">
                    <div class="skin-treat-service-img-line"></div>
                    <img src="<?php print esc_url($image); ?>" alt="img">
                </div>
                <?php endif; ?>

                <div class="service8-item-content skin-treat-service-content">
                	<?php if (( ! empty( $settings['heading'] )) ): ?>
                    <h4 class="mb-15"><a <?php echo $this->get_render_attribute_string( 'heading_link' ); ?>><?php echo wp_kses_post($settings['heading']); ?></a></h4>
                    <?php endif; ?>

                    <?php if (( ! empty( $settings['desc'] )) ): ?>
                    	<p class="mb-65"><?php echo esc_html($settings['desc']); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php elseif($settings['design_style'] == 'style_5' ): ?>
            <div class="service8-item-wrapper skin-treat-service skin-treat-service3 mb-40 pt-70">
                <div class="service8-item-content skin-treat-service-content">
                	<?php if (( ! empty( $settings['heading'] )) ): ?>
                    	<h4 class="mb-15"><a <?php echo $this->get_render_attribute_string( 'heading_link' ); ?>><?php echo wp_kses_post($settings['heading']); ?></a></h4>
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