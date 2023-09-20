<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class OCDI_Demo_Importer {

    public function __construct() {
        add_filter( 'pt-ocdi/import_files', array( $this, 'import_files_config' ) );
        add_filter( 'pt-ocdi/after_import', array( $this, 'ocdi_after_import_setup' ) );
        add_filter( 'pt-ocdi/disable_pt_branding',  '__return_true' );
        add_action( 'init', array( $this, 'bdevs_toolkit_rewrite_flush' ) );
    }


    public function import_files_config() {

        $home_prevs = array(
            'medidove_home_1' => array(
                'title' => __( 'Home', 'bdevs-toolkit' ),
                'page'  => __( 'home', 'bdevs-toolkit' ),
                'screenshot' => plugins_url( 'assets/preview/home1.jpg', dirname(__FILE__) ),
                'preview_link' => 'https://bdevs.net/wp/medidove',
            ),
            'medidove_home_2' => array(
                'title' => __( 'Home 2', 'bdevs-toolkit' ),
                'page'  => __( 'home-2', 'bdevs-toolkit' ),
                'screenshot' => plugins_url( 'assets/preview/home2.jpg', dirname(__FILE__) ),
                'preview_link' => 'https://bdevs.net/wp/medidove/home-2/',
            ),
            'medidove_home_3' => array(
                'title' => __( 'Home 3', 'bdevs-toolkit' ),
                'page'  => __( 'home-3', 'bdevs-toolkit' ),
                'screenshot' => plugins_url( 'assets/preview/home3.jpg', dirname(__FILE__) ),
                'preview_link' => 'https://bdevs.net/wp/medidove/home-3/',
            ),
            'medidove_home_4' => array(
                'title' => __( 'Home 4', 'bdevs-toolkit' ),
                'page'  => __( 'home-4', 'bdevs-toolkit' ),
                'screenshot' => plugins_url( 'assets/preview/home4.jpg', dirname(__FILE__) ),
                'preview_link' => 'https://bdevs.net/wp/medidove/home-4/',
            ),
            'medidove_home_5' => array(
                'title' => __( 'Home 5', 'bdevs-toolkit' ),
                'page'  => __( 'home-5', 'bdevs-toolkit' ),
                'screenshot' => plugins_url( 'assets/preview/home5.jpg', dirname(__FILE__) ),
                'preview_link' => 'https://bdevs.net/wp/medidove/home-5/',
            ),
            'medidove_home_6' => array(
                'title' => __( 'Home 6', 'bdevs-toolkit' ),
                'page'  => __( 'home-6', 'bdevs-toolkit' ),
                'screenshot' => plugins_url( 'assets/preview/home6.jpg', dirname(__FILE__) ),
                'preview_link' => 'https://bdevs.net/wp/medidove/home-6/',
            ),            
            'medidove_home_7' => array(
                'title' => __( 'Home 7', 'bdevs-toolkit' ),
                'page'  => __( 'home-7', 'bdevs-toolkit' ),
                'screenshot' => plugins_url( 'assets/preview/home7.jpg', dirname(__FILE__) ),
                'preview_link' => 'https://bdevs.net/wp/medidove/home-7/',
            ),
        );

        $config = array();

        $import_path  = trailingslashit( get_template_directory() ) . 'sample-data/';

        foreach ( $home_prevs as $key => $prev ) {

            $contents_demo = $import_path . 'contents-demo.xml';
            $widget_settings = $import_path . 'widget-settings.json';
            $customizer_data = $import_path . 'customizer-data.dat';
            
            $config[] = array(
                'import_file_id'               => $key,
                'import_page_name'             => $prev['page'],
                'import_file_name'             => $prev['title'],
                'local_import_file'            => $contents_demo,
                'local_import_widget_file'     => $widget_settings,
                'local_import_customizer_file' => $customizer_data,
                'import_preview_image_url'   => $prev['screenshot'],
                'preview_url'                => $prev['preview_link'],
                'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'bdevs-element' ),
            );
        }

        return $config;
    }

    public function ocdi_after_import_setup( $selected_file ) {

        $this->assign_menu_to_location();
        $this->assign_frontpage_id( $selected_file );
        $this->update_permalinks();
        update_option( 'basa_ocdi_importer_flash', true );
    }

    private function assign_menu_to_location() {

        $main_menu  = get_term_by( 'name', 'Main Menu', 'nav_menu' );

        set_theme_mod( 'nav_menu_locations', array(
            'main-menu'  => $main_menu->term_id,
        ));
    }

    private function assign_frontpage_id( $selected_import ) {
		
		$front_page = get_page_by_title( $selected_import['import_page_name'] );
		$blog_page  = get_page_by_title( 'Blog' );

		if($selected_import['import_page_name'] == "home-7")
		{
			 $front_page = get_page_by_title('Home 7');
		}
		elseif($selected_import['import_page_name'] == "home-6")
		{
			 $front_page = get_page_by_title('Home 6');
		}
		elseif($selected_import['import_page_name'] == "home-5")
		{
			$front_page = get_page_by_title('Home 5');
		}
		elseif($selected_import['import_page_name'] == "home-4")
		{
			$front_page = get_page_by_title('Home 4');
		}
		elseif($selected_import['import_page_name'] == "home-3")
		{
			$front_page = get_page_by_title('Home 3');
		}
		elseif($selected_import['import_page_name'] == "home-2")
		{
			$front_page = get_page_by_title('Home 2');
		}
		else 
		{
			$front_page = get_page_by_title('Home');
		}

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front',  $front_page->ID );
		update_option( 'page_for_posts', $blog_page->ID );

		// woocommerce default settings reset
	    if ( class_exists( 'woocommerce' ) ) {
	        update_option( 'woocommerce_shop_page_id', '461' );
	        update_option( 'woocommerce_cart_page_id', '462' );
	        update_option( 'woocommerce_checkout_page_id', '463' );
	        update_option( 'woocommerce_myaccount_page_id', '464' );
	    }
	}

    private function update_permalinks() {
        update_option( 'permalink_structure', '/%postname%/' );
    }

    public function bdevs_toolkit_rewrite_flush() {
        
        if ( get_option( 'basa_ocdi_importer_flash' ) == true  ) {
            flush_rewrite_rules();
            delete_option( 'basa_ocdi_importer_flash' );
        }
    }
}

new OCDI_Demo_Importer;