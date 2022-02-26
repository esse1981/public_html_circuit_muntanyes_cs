<?php
add_action( 'admin_init', 'leafcolor_page_meta_boxes' );
if ( ! function_exists( 'leafcolor_page_meta_boxes' ) ){
	function leafcolor_page_meta_boxes() {
		$theme_uri = get_template_directory_uri();
		//layout
		$page_meta_box_layout = array(
		'id'        => 'page_layout',
		'title'     => 'Layout settings',
		'pages'     => array( 'page' ),
		'context'   => 'normal',
		'priority'  => 'high',
		'fields'    => array(
			array(
			  'id'          => 'page_sidebar_layout',
			  'label'       => esc_html__('Sidebar','sportcenter'),
			  'desc'        => esc_html__('Select "Default" to use Theme Options','sportcenter'),
			  'std'         => '',
			  'type'        => 'radio-image',
			  'choices'     => array(
				  array(
					'value'       => '',
					'label'       => esc_html__('Default','sportcenter'),
					'src'         => $theme_uri.'/images/options/layout-default.png'
				  ),
				  array(
					'value'       => 'right',
					'label'       => esc_html__('Sidebar Right','sportcenter'),
					'src'         => $theme_uri.'/images/options/layout-right.png'
				  ),
				  array(
					'value'       => 'left',
					'label'       => esc_html__('Sidebar Left','sportcenter'),
					'src'         => $theme_uri.'/images/options/layout-left.png'
				  ),
				  array(
					'value'       => 'full',
					'label'       => esc_html__('Hidden','sportcenter'),
					'src'         => $theme_uri.'/images/options/layout-full.png'
				  ),
			   )
			),
            array(
              'id'          => 'header_content',
              'label'       => esc_html__('Custom Header Content','sportcenter'),
              'desc'        => esc_html__('Enter header content or shortcodes','sportcenter'),
              'std'         => '',
              'type'        => 'textarea',
            ),
		 )
		);
		ot_register_meta_box( $page_meta_box_layout );
    }
}
