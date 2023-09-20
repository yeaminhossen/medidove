<?php

namespace BdevsElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use \Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

/**
 * Bdevs Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class BdevsMemberPost extends \Elementor\Widget_Base
{

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
	public function get_name()
	{
		return 'bdevs-member-post';
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
	public function get_title()
	{
		return __('Member Posts', 'bdevs-elementor');
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
	public function get_icon()
	{
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
	public function get_categories()
	{
		return ['bdevs-elementor'];
	}

	public function get_keywords()
	{
		return ['member-post'];
	}

	public function get_script_depends()
	{
		return ['bdevs-elementor'];
	}

	// register_controls
	protected function register_controls()
	{
		$this->register_content_controls();
		$this->register_style_controls();
	}

	// register_content_controls
	protected function register_content_controls()
	{

		$this->start_controls_section(
			'heading_section',
			[
				'label' => esc_html__('Heading Section', 'bdevs-elementor'),
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label'       => __('Sub Heading', 'bdevs-elementor'),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __('Enter your heading', 'bdevs-elementor'),
				'label_block' => true,
				'default'     => __('Its Sub Title', 'bdevs-elementor'),
				'default'     => __('It is sub heading', 'bdevs-elementor'),
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __('Heading', 'bdevs-elementor'),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __('Type section title here', 'bdevs-elementor'),
				'label_block' => true,
				'default'     => __('Its Title', 'bdevs-elementor'),
				'default'     => __('It is Heading', 'bdevs-elementor'),
			]
		);

		$this->add_control(
			'link_text',
			[
				'label'       => __('Link Text', 'bdevs-elementor'),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __('Type Link Text Here...', 'bdevs-elementor'),
				'default'     => __('Make Appointment', 'bdevs-elementor'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'appointment_link',
			[
				'label' => __('Link', 'plugin-domain'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'plugin-domain'),
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
			'section_content_service_post',
			[
				'label' => esc_html__('Member Post', 'bdevs-elementor'),
			]
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__('Chose Style', 'bdevs-elementor'),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'member-style-1'  => esc_html__('Member Style 1', 'bdevs-elementor'),
					'member-style-2' => esc_html__('Member Style 2', 'bdevs-elementor'),
					'member-style-3' => esc_html__('Member Style 3', 'bdevs-elementor'),
					'member-style-4' => esc_html__('Member Style 4', 'bdevs-elementor'),
					'member-style-5' => esc_html__('Member Style 5', 'bdevs-elementor'),
					'member-style-6' => esc_html__('Member Style 6', 'bdevs-elementor'),
				],
				'default'   => 'member-style-1',
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'     => esc_html__('Order By', 'bdevs-elementor'),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'ID'  => esc_html__('Post ID', 'bdevs-elementor'),
					'title'  => esc_html__('Title', 'bdevs-elementor'),
					'date' => esc_html__('Date', 'bdevs-elementor'),
					'modified' => esc_html__('Last Modified Date', 'bdevs-elementor'),
					'rand' => esc_html__('Random Order', 'bdevs-elementor'),
					'comment_count' => esc_html__('Popular Post', 'bdevs-elementor'),
				],
				'default'   => 'ID',
			]
		);

		$this->add_control(
			'order',
			[
				'label'     => esc_html__('Post Order', 'bdevs-elementor'),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'asc'  => esc_html__('ASC', 'bdevs-elementor'),
					'desc' => esc_html__('DESC', 'bdevs-elementor'),
				],
				'default'   => 'desc',
			]
		);

		$this->add_control(
			'post_number',
			[
				'label'     => esc_html__('Post Count', 'bdevs-elementor'),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'3'  => esc_html__('3', 'bdevs-elementor'),
					'4'  => esc_html__('4', 'bdevs-elementor'),
					'6' => esc_html__('6', 'bdevs-elementor'),
					'9' => esc_html__('9', 'bdevs-elementor'),
					'12' => esc_html__('12', 'bdevs-elementor'),
					'15' => esc_html__('15', 'bdevs-elementor'),
					'-1' => esc_html__('All', 'bdevs-elementor'),
				],
				'default'   => '3',
			]
		);

		$member_cats = get_terms('member_categories', array('order' => 'DESC'));
		$cat_array = array('' => 'Select One');
		foreach ($member_cats as $cat) {
			$cat_array[$cat->slug] = $cat->name;
		}


		$this->add_control(
			'member_cat',
			[
				'label'     => esc_html__('Category Slug', 'bdevs-elementor'),
				'type'      => Controls_Manager::SELECT,
				'options'   => $cat_array,
				'default'   => '',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_layout',
			[
				'label' => esc_html__('Layout', 'bdevs-elementor'),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'   => esc_html__('Alignment', 'bdevs-elementor'),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'bdevs-elementor'),
						'icon'  => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'bdevs-elementor'),
						'icon'  => 'eicon-h-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'bdevs-elementor'),
						'icon'  => 'eicon-h-align-right',
					],
					'justify' => [
						'title' => esc_html__('Justified', 'bdevs-elementor'),
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
		$this->button_style_controls();
	}

	// title_style_controls
	protected function title_style_controls()
	{
		$this->start_controls_section(
			'_section_style_content',
			[
				'label' => __('Title / Content', 'bdevs-elementor'),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'content_padding',
			[
				'label' => __('Content Padding', 'bdevs-elementor'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .bdevs-el-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'content_border-radius',
			[
				'label' => __('Content Border Radius', 'bdevs-elementor'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
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
				'label' => __('Title', 'bdevs-elementor'),
				'separator' => 'before'
			]
		);

		$this->add_responsive_control(
			'title_spacing',
			[
				'label' => __('Bottom Spacing', 'bdevs-elementor'),
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
				'label' => __('Text Color', 'bdevs-elementor'),
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
				'label' => __('Subtitle', 'bdevs-elementor'),
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'subtitle_spacing',
			[
				'label' => __('Bottom Spacing', 'bdevs-elementor'),
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
				'label' => __('Text Color', 'bdevs-elementor'),
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
	protected function social_icon_style_controls()
	{
		$this->start_controls_section(
			'_section_style_social',
			[
				'label' => __('Social Icons', 'bdevs-elementor'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'links_spacing',
			[
				'label' => __('Right Spacing', 'bdevs-elementor'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .bdevs-member-links > li a:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'links_padding',
			[
				'label' => __('Padding', 'bdevs-elementor'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .bdevs-member-links > li a' => 'padding: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'links_icon_size',
			[
				'label' => __('Icon Size', 'bdevs-elementor'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .bdevs-member-links > li a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'links_border',
				'selector' => '{{WRAPPER}} .bdevs-member-links > li a'
			]
		);

		$this->add_responsive_control(
			'links_border_radius',
			[
				'label' => __('Border Radius', 'bdevs-elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .bdevs-member-links > li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs('_tab_links_colors');
		$this->start_controls_tab(
			'_tab_links_normal',
			[
				'label' => __('Normal', 'bdevs-elementor'),
			]
		);

		$this->add_control(
			'links_color',
			[
				'label' => __('Text Color', 'bdevs-elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdevs-member-links > li a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'links_bg_color',
			[
				'label' => __('Background Color', 'bdevs-elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdevs-member-links > li a' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->start_controls_tab(
			'_tab_links_hover',
			[
				'label' => __('Hover', 'bdevs-elementor'),
			]
		);

		$this->add_control(
			'links_hover_color',
			[
				'label' => __('Text Color', 'bdevs-elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdevs-member-links > li a:hover, {{WRAPPER}} .bdevs-member-links > li a:focus' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'links_hover_bg_color',
			[
				'label' => __('Background Color', 'bdevs-elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdevs-member-links > li a:hover, {{WRAPPER}} .bdevs-member-links > li a:focus' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'links_hover_border_color',
			[
				'label' => __('Border Color', 'bdevs-elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdevs-member-links > li a:hover, {{WRAPPER}} .bdevs-member-links > li a:focus' => 'border-color: {{VALUE}};',
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

	// button_style_controls
	protected function button_style_controls()
	{
		$this->start_controls_section(
			'_section_style_button',
			[
				'label' => __('Button', 'bdevs-elementor'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'button_width',
			[
				'label' => __('Width', 'bdevs-elementor'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tp-el-btn' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_height',
			[
				'label' => __('Height', 'bdevs-elementor'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tp-el-btn' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_line_height',
			[
				'label' => __('Line Height', 'bdevs-elementor'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tp-el-btn' => 'line-height: {{SIZE}}{{UNIT}};',
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
				'label' => __('Border Radius', 'bdevs-elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
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

		$this->start_controls_tabs('_tabs_button');

		$this->start_controls_tab(
			'_tab_button_normal',
			[
				'label' => __('Normal', 'bdevs-elementor'),
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' => __('Text Color', 'bdevs-elementor'),
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
				'label' => __('Background Color', 'bdevs-elementor'),
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
				'label' => __('Hover', 'bdevs-elementor'),
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'label' => __('Text Color', 'bdevs-elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-el-btn:hover, {{WRAPPER}} .tp-el-btn:focus' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_bg_color',
			[
				'label' => __('Background Color', 'bdevs-elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-el-btn:hover, {{WRAPPER}} .tp-el-btn:focus' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label' => __('Border Color', 'bdevs-elementor'),
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

	public function render()
	{
		$settings  = $this->get_settings_for_display();
		extract($settings);

		$target = $appointment_link['is_external'] ? ' target="_blank"' : '';
		$nofollow = $appointment_link['nofollow'] ? ' rel="nofollow"' : '';

		$this->add_render_attribute(
			[
				'appointment_link' => [
					'class' => [
						'btn btn-icon ml-0',
					],
					'href'   => $settings['appointment_link']['url'] ? esc_url($settings['appointment_link']['url']) : '#',
					'target' => $settings['appointment_link']['is_external'] ? '_blank' : '_self'
				]
			],
			'',
			'',
			true
		);

		if ($chose_style == 'member-style-1') : ?>
			<section class="team-area">
				<div class="container">
					<div class="row">
						<?php
						if (!empty($member_cat)) {
							$q = new \WP_Query(array(
								'posts_per_page' => $post_number,
								'post_type' => 'bdevs-member',
								'orderby' 		=> 'menu_order ' . $orderby,
								'order'         => $order,
								'tax_query' => array(
									array(
										'taxonomy' => 'member_categories',
										'field' => 'slug',
										'terms' => $member_cat
									)
								)
							));
						} else {
							$q = new \WP_Query(array(
								'post_type'     => 'bdevs-member',
								'posts_per_page' => $number,
								'orderby' 		=> 'menu_order ' . $orderby,
								'order'			=> $order,
							));
						}

						if ($q->have_posts()) :
							while ($q->have_posts()) : $q->the_post();
								$designation = function_exists('get_field') ? get_field('member_designation') : NULL;
						?>
								<div class="col-xl-4 col-lg-4 col-md-6">
									<div class="team-box text-center bdevs-el-content  mb-60">
										<div class="team-thumb thumb-circle mb-45 pos-rel">
											<?php the_post_thumbnail('medidove-team-circle'); ?>
											<a class="team-link tp-el-btn" href="<?php the_permalink(); ?>"><?php print esc_html_e('+', 'bdevs-elementor'); ?></a>
										</div>
										<div class="team-content">
											<h3 class="bdevs-el-title"><?php the_title(); ?></h3>
											<h6 class="bdevs-el-subtitle"><?php echo wp_kses_post($designation); ?></h6>
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
		<?php elseif ($chose_style == 'member-style-2') : ?>
			<section class="team-area">
				<div class="container">
					<div class="row team-activation">
						<?php
						if (!empty($member_cat)) {
							$q = new \WP_Query(array(
								'posts_per_page' => $post_number,
								'post_type' => 'bdevs-member',
								'orderby' 		=> 'menu_order ' . $orderby,
								'order'         => $order,
								'tax_query' => array(
									array(
										'taxonomy' => 'member_categories',
										'field' => 'slug',
										'terms' => $member_cat
									)
								)
							));
						} else {
							$q = new \WP_Query(array(
								'post_type'     => 'bdevs-member',
								'posts_per_page' => $number,
								'orderby' 		=> 'menu_order ' . $orderby,
								'order'			=> $order,
							));
						}
						if ($q->have_posts()) :
							while ($q->have_posts()) : $q->the_post();
								$designation = function_exists('get_field') ? get_field('member_designation') : NULL;
						?>
								<div class="col-xl-12">
									<div class="team-box pos-rel mb-50">
										<div class="team-thumb">
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
										</div>
										<div class="team-author-info bdevs-el-content">
											<span class="bdevs-el-subtitle"><?php echo wp_kses_post($designation); ?></span>
											<h6 class="bdevs-el-title"><?php the_title(); ?></h6>
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

		<?php elseif ($chose_style == 'member-style-3') : ?>
			<section class="team-area">
				<div class="container">
					<div class="row">
						<?php
						if (!empty($member_cat)) {
							$q = new \WP_Query(array(
								'posts_per_page' => $post_number,
								'post_type' => 'bdevs-member',
								'orderby' 		=> 'menu_order ' . $orderby,
								'order'         => $order,
								'tax_query' => array(
									array(
										'taxonomy' => 'member_categories',
										'field' => 'slug',
										'terms' => $member_cat
									)
								)
							));
						} else {
							$q = new \WP_Query(array(
								'post_type'     => 'bdevs-member',
								'posts_per_page' => $number,
								'orderby' 		=> 'menu_order ' . $orderby,
								'order'			=> $order,
							));
						}
						if ($q->have_posts()) :
							while ($q->have_posts()) : $q->the_post();
								$designation = function_exists('get_field') ? get_field('member_designation') : NULL;
								$facebook = function_exists('get_field') ? get_field('profile_fb_url') : NULL;
								$twitter = function_exists('get_field') ? get_field('profile_twitter_url') : NULL;
								$instagram = function_exists('get_field') ? get_field('profile_instagram_url') : NULL;
								$youtube = function_exists('get_field') ? get_field('profile_youtube_url') : NULL;
								$linkedin = function_exists('get_field') ? get_field('profile_linkedin_url') : NULL;
						?>
								<div class="col-xl-4 col-lg-4 col-md-6">
									<div class="team-wrapper team-box-2 bdevs-el-content  text-center mb-30">
										<div class="team-thumb">
											<?php the_post_thumbnail(); ?>
										</div>
										<div class="team-member-info mt-35 mb-20">
											<h3 class="bdevs-el-title"><a class="bdevs-el-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<h6 class="f-500 text-up-case letter-spacing pink-color bdevs-el-subtitle"><?php print wp_kses_post($designation); ?></h6>
										</div>
										<div class="team-social-profile mb-15">
											<ul class="bdevs-member-links">
												<?php if (!empty($facebook)) : ?>
													<li><a href="<?php print esc_url($facebook); ?>"><i class="fa fa-facebook-f"></i></a></li>
												<?php endif; ?>

												<?php if (!empty($twitter)) : ?>
													<li><a href="<?php print esc_url($twitter); ?>"><i class="fab fa-twitter"></i></a></li>
												<?php endif; ?>

												<?php if (!empty($instagram)) : ?>
													<li><a href="<?php print esc_url($instagram); ?>"><i class="fab fa-instagram"></i></a></li>
												<?php endif; ?>

												<?php if (!empty($youtube)) : ?>
													<li><a href="<?php print esc_url($youtube); ?>"><i class="fab fa-youtube"></i></a></li>
												<?php endif; ?>

												<?php if (!empty($linkedin)) : ?>
													<li><a href="<?php print esc_url($linkedin); ?>"><i class="fab fa-linkedin"></i></a></li>
												<?php endif; ?>
											</ul>
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
		<?php elseif ($chose_style == 'member-style-4') : ?>

			<!-- team-area start -->
			<section class="team-area">
				<div class="container">
					<div class="row">
						<?php
						if (!empty($member_cat)) {
							$q = new \WP_Query(array(
								'posts_per_page' => $post_number,
								'post_type' => 'bdevs-member',
								'orderby' 		=> 'menu_order ' . $orderby,
								'order'         => $order,
								'tax_query' => array(
									array(
										'taxonomy' => 'member_categories',
										'field' => 'slug',
										'terms' => $member_cat
									)
								)
							));
						} else {
							$q = new \WP_Query(array(
								'post_type'     => 'bdevs-member',
								'posts_per_page' => $number,
								'orderby' 		=> 'menu_order ' . $orderby,
								'order'			=> $order,
							));
						}
						if ($q->have_posts()) :
							$counter = 1;
							while ($q->have_posts()) : $q->the_post();
								$designation = function_exists('get_field') ? get_field('member_designation') : NULL;
								$facebook = function_exists('get_field') ? get_field('profile_fb_url') : NULL;
								$twitter = function_exists('get_field') ? get_field('profile_twitter_url') : NULL;
								$instagram = function_exists('get_field') ? get_field('profile_instagram_url') : NULL;
								$youtube = function_exists('get_field') ? get_field('profile_youtube_url') : NULL;
								$linkedin = function_exists('get_field') ? get_field('profile_linkedin_url') : NULL;
						?>
								<div class="col-xl-3 col-lg-4 col-md-6">
									<div class="team-box text-center mb-60">
										<div class="team-thumb h4team-thumb mb-25 pos-rel">
											<?php the_post_thumbnail(); ?>
											<a class="team-link" href="<?php the_permalink(); ?>">0<?php print wp_kses_post($counter); ?></a>
										</div>
										<div class="team-content h4team-content mb-15">
											<h3 class="bdevs-el-title"><a class="bdevs-el-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<h6 class="bdevs-el-subtitle"><?php print wp_kses_post($designation); ?></h6>
										</div>
										<div class="h4team-social">
											<ul class="list-inline bdevs-member-links">
												<?php if (!empty($facebook)) : ?>
													<li><a href="<?php print esc_url($facebook); ?>"><i class="fa fa-facebook-f"></i></a></li>
												<?php endif; ?>

												<?php if (!empty($twitter)) : ?>
													<li><a href="<?php print esc_url($twitter); ?>"><i class="fab fa-twitter"></i></a></li>
												<?php endif; ?>

												<?php if (!empty($instagram)) : ?>
													<li><a href="<?php print esc_url($instagram); ?>"><i class="fab fa-instagram"></i></a></li>
												<?php endif; ?>

												<?php if (!empty($youtube)) : ?>
													<li><a href="<?php print esc_url($youtube); ?>"><i class="fab fa-youtube"></i></a></li>
												<?php endif; ?>

												<?php if (!empty($linkedin)) : ?>
													<li><a href="<?php print esc_url($linkedin); ?>"><i class="fab fa-linkedin"></i></a></li>
												<?php endif; ?>
											</ul>
										</div>
									</div>
								</div>
						<?php
								$counter++;
							endwhile;
							wp_reset_postdata();
						endif;
						?>
					</div>
				</div>
			</section>
			<!-- team-area end -->

		<?php elseif ($chose_style == 'member-style-5') : ?>

			<section class="team-area">
				<div class="container">
					<div class="row">
						<?php
						if (!empty($member_cat)) {
							$q = new \WP_Query(array(
								'posts_per_page' => $post_number,
								'post_type' => 'bdevs-member',
								'orderby' 		=> 'menu_order ' . $orderby,
								'order'         => $order,
								'tax_query' => array(
									array(
										'taxonomy' => 'member_categories',
										'field' => 'slug',
										'terms' => $member_cat
									)
								)
							));
						} else {
							$q = new \WP_Query(array(
								'post_type'     => 'bdevs-member',
								'posts_per_page' => $number,
								'orderby' 		=> 'menu_order ' . $orderby,
								'order'			=> $order,
							));
						}
						if ($q->have_posts()) :
							while ($q->have_posts()) : $q->the_post();
								$designation = function_exists('get_field') ? get_field('member_designation') : NULL;
								$facebook = function_exists('get_field') ? get_field('profile_fb_url') : NULL;
								$twitter = function_exists('get_field') ? get_field('profile_twitter_url') : NULL;
								$instagram = function_exists('get_field') ? get_field('profile_instagram_url') : NULL;
								$youtube = function_exists('get_field') ? get_field('profile_youtube_url') : NULL;
								$linkedin = function_exists('get_field') ? get_field('profile_linkedin_url') : NULL;
						?>
								<div class="col-xl-3 col-lg-3 col-md-6">
									<div class="team-wrapper team-box-2  bdevs-el-content  text-center mb-30">
										<div class="team-thumb">
											<?php the_post_thumbnail(); ?>
										</div>
										<div class="team-member-info mt-35 mb-20">
											<h3 class="bdevs-el-title "><a class="bdevs-el-title " href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<h6 class="f-500 text-up-case letter-spacing pink-color bdevs-el-subtitle"><?php print wp_kses_post($designation); ?></h6>
										</div>
										<div class="team-social-profile mb-15">
											<ul class="bdevs-member-links">
												<?php if (!empty($facebook)) : ?>
													<li><a href="<?php print esc_url($facebook); ?>"><i class="fa fa-facebook-f"></i></a></li>
												<?php endif; ?>

												<?php if (!empty($twitter)) : ?>
													<li><a href="<?php print esc_url($twitter); ?>"><i class="fab fa-twitter"></i></a></li>
												<?php endif; ?>

												<?php if (!empty($instagram)) : ?>
													<li><a href="<?php print esc_url($instagram); ?>"><i class="fab fa-instagram"></i></a></li>
												<?php endif; ?>

												<?php if (!empty($youtube)) : ?>
													<li><a href="<?php print esc_url($youtube); ?>"><i class="fab fa-youtube"></i></a></li>
												<?php endif; ?>

												<?php if (!empty($linkedin)) : ?>
													<li><a href="<?php print esc_url($linkedin); ?>"><i class="fab fa-linkedin"></i></a></li>
												<?php endif; ?>
											</ul>
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

		<?php elseif ($chose_style == 'member-style-6') : ?>
			<section class="team-area style-6">
				<div class="container">
					<div class="row">
						<div class="col-xl-12 col-lg-12">
							<div class="section-title text-center pos-rel mb-70">
								<div class="section-text pos-rel">
									<?php
									if (!empty($sub_title)) : ?>
										<h5><?php echo wp_kses_post($sub_title); ?></h5>
									<?php
									endif; ?>

									<?php
									if (!empty($title)) : ?>
										<h1><?php echo wp_kses_post($title); ?></h1>
									<?php
									endif; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<?php
						if (!empty($member_cat)) {
							$q = new \WP_Query(array(
								'posts_per_page' => $post_number,
								'post_type' => 'bdevs-member',
								'orderby' 		=> 'menu_order ' . $orderby,
								'order'         => $order,
								'tax_query' => array(
									array(
										'taxonomy' => 'member_categories',
										'field' => 'slug',
										'terms' => $member_cat
									)
								)
							));
						} else {
							$q = new \WP_Query(array(
								'post_type'     => 'bdevs-member',
								'posts_per_page' => $number,
								'orderby' 		=> 'menu_order ' . $orderby,
								'order'			=> $order,
							));
						}
						if ($q->have_posts()) :
							while ($q->have_posts()) : $q->the_post();
								$designation = function_exists('get_field') ? get_field('member_designation') : NULL;
								$facebook = function_exists('get_field') ? get_field('profile_fb_url') : NULL;
								$twitter = function_exists('get_field') ? get_field('profile_twitter_url') : NULL;
								$instagram = function_exists('get_field') ? get_field('profile_instagram_url') : NULL;
								$youtube = function_exists('get_field') ? get_field('profile_youtube_url') : NULL;
								$linkedin = function_exists('get_field') ? get_field('profile_linkedin_url') : NULL;
						?>
								<div class="col-xl-3 col-lg-3 col-md-6">
									<div class="single-team-item bdevs-el-content text-center mb-30">
										<div class="team-thumb">
											<?php the_post_thumbnail(); ?>
										</div>
										<div class="team-member-info mt-35 mb-20">
											<h3 class="bdevs-el-title"><a class="bdevs-el-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<h6 class="f-500 text-up-case letter-spacing pink-color bdevs-el-subtitle"><?php print wp_kses_post($designation); ?></h6>
											<div class="team-social-profile mb-15">
												<ul class="bdevs-member-links">
													<?php if (!empty($facebook)) : ?>
														<li><a href="<?php print esc_url($facebook); ?>"><i class="fa fa-facebook-f"></i></a></li>
													<?php endif; ?>

													<?php if (!empty($twitter)) : ?>
														<li><a href="<?php print esc_url($twitter); ?>"><i class="fab fa-twitter"></i></a></li>
													<?php endif; ?>

													<?php if (!empty($instagram)) : ?>
														<li><a href="<?php print esc_url($instagram); ?>"><i class="fab fa-instagram"></i></a></li>
													<?php endif; ?>

													<?php if (!empty($youtube)) : ?>
														<li><a href="<?php print esc_url($youtube); ?>"><i class="fab fa-youtube"></i></a></li>
													<?php endif; ?>

													<?php if (!empty($linkedin)) : ?>
														<li><a href="<?php print esc_url($linkedin); ?>"><i class="fab fa-linkedin"></i></a></li>
													<?php endif; ?>
												</ul>
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


		<?php endif; ?>

<?php
	}
}
