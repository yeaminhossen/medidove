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
class BdevsBanner extends \Elementor\Widget_Base {

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
		return 'bdevs-banner';
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
		return __( 'Banner', 'bdevs-elementor' );
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
		return [ 'banner', 'title' ];
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
					'style-1'  => esc_html__( 'Style 1', 'bdevs-elementor' ),
					'style-2' => esc_html__( 'Style 2', 'bdevs-elementor' ),
					'style-3' => esc_html__( 'Style 3', 'bdevs-elementor' ),
				],
				'default'   => 'style-1',
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'iconbox_info',
			[
				'label' => esc_html__( 'Banner Content', 'bdevs-elementor' ),
			]	
		);

		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Subtitle', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Subtitle text', 'bdevs-elementor' ),
				'default'     => __( 'Banner subtitle Here', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label'       => __( 'Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( 'Banner title', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'banner_offer_price',
			[
				'label'       => __( 'Banner offer Price', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your banner price', 'bdevs-elementor' ),
				'default'     => __( '$56', 'bdevs-elementor' ),
			]
		);		

		$this->add_control(
			'banner_old_price',
			[
				'label'       => __( 'Banner Old Price', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your banner price', 'bdevs-elementor' ),
				'default'     => __( '$90', 'bdevs-elementor' ),
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
			'dot_image',
			[
				'label'   => esc_html__( 'Dot Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Dot Image', 'bdevs-elementor' ),
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'chose_style' => ['style-3']
				],
			]
		);
		
		$this->end_controls_section();

		// Button
		$this->start_controls_section(
			'section_content_heading',
			[
				'label' => esc_html__( 'Button', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'link_text',
			[
				'label'       => esc_html__( 'Button Text', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Make Appointment', 'bdevs-elementor' ),
				'placeholder' => esc_html__( 'Link Text', 'bdevs-elementor' ),
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

	public function render() {

		$settings  = $this->get_settings_for_display(); 
		extract( $settings );

		if (!empty($image['id'])) {
			$image = wp_get_attachment_image_url( $image['id'], 'full' );
		}

		$this->add_render_attribute(
			[
				'link' => [
					'class' => [
						'p_banner_btn',
					],
					'href'   => $settings['link']['url'] ? esc_url($settings['link']['url']) : '#',
					'target' => $settings['link']['is_external'] ? '_blank' : '_self'
				]
			], '', '', true
		);

		if( $chose_style == 'style-1' ): ?>

		<div class="product-banner product-banner-bg1 banner-h-100 pos-rel ctrl-width">
		    <div class="product-banner-content">

		        <span class="p-category"><?php echo esc_html($settings['subtitle']); ?></span>

		        <h4 class="p-name"><a <?php echo $this->get_render_attribute_string( 'heading_link' ); ?>><?php echo wp_kses_post($settings['heading']); ?></a></h4>

		        <h5 class="pro-price banner-p-price mb-30">
		            <ins><span class=" amount"><bdi><?php echo esc_html($settings['banner_offer_price']); ?></bdi></span></ins>
		            <del aria-hidden="true"><span class=""><bdi><?php echo esc_html($settings['banner_old_price']); ?></bdi></span></del>
		        </h5>
		        <?php if (( ! empty( $settings['link']['url'] )) ): ?>
		        <a <?php echo $this->get_render_attribute_string( 'link' ); ?> ><?php echo esc_html($settings['link_text']); ?><i class="far fa-long-arrow-right" aria-hidden="true"></i></a>
		        <?php endif; ?>
		    </div>

		    <?php if (( ! empty( $image )) ): ?>
		    <div class="product-banner-img">
		        <img src="<?php print esc_url($image); ?>" alt="img">
		    </div>
		    <?php endif; ?>

		</div>

        <?php elseif( $chose_style == 'style-2' ): ?>

        <div class="product-banner product-banner-bg2 pos-rel mb-30">
            <div class="product-banner-content">
                <span class="p-category"><?php echo esc_html($settings['subtitle']); ?></span>
                <h4 class="p-name"><a <?php echo $this->get_render_attribute_string( 'heading_link' ); ?>><?php echo wp_kses_post($settings['heading']); ?></a></h4>
                <h5 class="pro-price banner-p-price mb-30">
                    <ins><span class=" amount"><bdi><?php echo esc_html($settings['banner_offer_price']); ?></bdi></span></ins>
                    <del aria-hidden="true"><span class=""><bdi><?php echo esc_html($settings['banner_old_price']); ?></bdi></span></del> 
                    </h5>
                <a <?php echo $this->get_render_attribute_string( 'link' ); ?> class="p_banner_btn"><?php echo esc_html($settings['link_text']); ?><i class="far fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
            <?php if (( ! empty( $image )) ): ?>
            <div class="product-banner-img">
                <img src="<?php print esc_url($image); ?>" alt="img">
            </div>
            <?php endif; ?>
        </div>

        <?php elseif( $chose_style == 'style-3' ): ?>
            <div class="section-title pos-rel">

            	<?php if ( $settings['section_title_icon'] ) : ?>
                <div class="section-icon">
                    <img class="section-back-icon back-icon-left" src="<?php print get_template_directory_uri(); ?>/img/section/section-back-icon.png" alt="">
                </div>
                <?php endif; ?>	
            	

                <div class="section-text pos-rel">
					<?php if (!empty( $settings['sub_heading'])) : ?>
					<h5><?php echo wp_kses_post($settings['sub_heading']); ?></h5>
					<?php endif; ?>	

                    <?php if (!empty($settings['heading'])) : ?>
					<h2 class="sec-title"><?php echo wp_kses_post($settings['heading']); ?></h2>
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
                <div class="section-line pos-rel">
                    <img src="<?php print esc_url($dot_image); ?>" alt="img">
                </div>
                <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>		

	<?php
	}

}