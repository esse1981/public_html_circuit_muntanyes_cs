<?php
add_action( 'admin_init', 'leafcolor_custom_theme_options' );
function leafcolor_custom_theme_options() {
	$saved_settings = get_option( 'option_tree_settings', array() );
	$theme_uri = get_template_directory_uri(); 
	$custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general',
        'title'       => '<i class="fa fa-cogs"></i>'.esc_html__('General','sportcenter')
      ),
      array(
        'id'          => 'color',
        'title'       => '<i class="fa fa-magic"></i>'.esc_html__('Colors & Background','sportcenter')
      ),
      array(
        'id'          => 'fonts',
        'title'       => '<i class="fa fa-font"></i>'.esc_html__('Fonts','sportcenter')
      ),
	  array(
        'id'          => 'nav',
        'title'       => '<i class="fa fa-bars"></i>'.esc_html__('Main Navigation','sportcenter')
      ),
      array(
        'id'          => 'single_post',
        'title'       => '<i class="fa fa-file-text-o"></i>'.esc_html__('Single Post','sportcenter')
      ),
      array(
        'id'          => 'single_page',
        'title'       => '<i class="fa fa-file"></i>'.esc_html__('Single Page','sportcenter')
      ),
      array(
        'id'          => 'archive',
        'title'       => '<i class="fa fa-pencil-square"></i>'.esc_html__('Archives','sportcenter')
      ),
      array(
        'id'          => '404',
        'title'       => '<i class="fa fa-exclamation-triangle"></i>'.esc_html__('404','sportcenter')
      ),
	  array(
        'id'          => 'event',
        'title'       => '<i class="fa fa-calendar "></i>'.esc_html__('Event','sportcenter')
      ),
	  array(
        'id'          => 'member',
        'title'       => '<i class="fa fa-users "></i>'.esc_html__('Member','sportcenter')
      ),
	  array(
        'id'          => 'woocommerce',
        'title'       => '<i class="fa fa-shopping-cart "></i>'.esc_html__('WooCommerce','sportcenter')
      ),
      array(
        'id'          => 'social_account',
        'title'       => '<i class="fa fa-twitter-square"></i>'.esc_html__('Social Accounts','sportcenter')
      ),
      array(
        'id'          => 'social_share',
        'title'       => '<i class="fa fa-share-square"></i>'.esc_html__('Social Sharing','sportcenter')
      ),
	  
    ),
    'settings'        => array( 
	  array(
        'id'          => 'copyright',
        'label'       => esc_html__('Copyright Text','sportcenter'),
        'desc'        => esc_html__('Appear in footer','sportcenter'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general',
      ),
      array(
        'id'          => 'right_to_left',
        'label'       => esc_html__('RTL mode','sportcenter'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'general',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => esc_html__('Enable RTL','sportcenter'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'custom_css',
        'label'       => esc_html__('Custom CSS','sportcenter'),
        'desc'        => esc_html__('Enter custom CSS. Ex: .class{ font-size: 13px; }','sportcenter'),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  array(
        'id'          => 'custom_code',
        'label'       => esc_html__('Custom Code','sportcenter'),
        'desc'        => esc_html__('Enter custom code or JS code here. For example, enter Google Analytics','sportcenter'),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'logo_image',
        'label'       => esc_html__('Logo Image','sportcenter'),
        'desc'        => esc_html__('Upload your logo image','sportcenter'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'retina_logo',
        'label'       => esc_html__('Retina Logo (optional)','sportcenter'),
        'desc'        => esc_html__('Retina logo should be two time bigger than the custom logo. Retina Logo is optional, use this setting if you want to strictly support retina devices.','sportcenter'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'footer_logo',
        'label'       => esc_html__('Footer Logo Image','sportcenter'),
        'desc'        => esc_html__('Upload Footer logo image','sportcenter'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'login_logo',
        'label'       => esc_html__('Login Logo Image','sportcenter'),
        'desc'        => esc_html__('Upload your Admin Login logo image','sportcenter'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'pre-loading',
        'label'       => esc_html__('Pre-loading Effect','sportcenter'),
        'desc'        => esc_html__('Enable Pre-loading Effect','sportcenter'),
        'std'         => '2',
        'type'        => 'select',
        'section'     => 'general',
        'rows'        => '',
		'choices'     => array( 
          array(
            'value'       => '-1',
            'label'       => esc_html__('Disable','sportcenter'),
            'src'         => ''
          ),
		  array(
            'value'       => '1',
            'label'       => esc_html__('Enable','sportcenter'),
            'src'         => ''
          ),
		  array(
            'value'       => '2',
            'label'       => esc_html__('Enable for Homepage Only','sportcenter'),
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'loading_bg',
        'label'       => esc_html__('Pre-Loading Background Color','sportcenter'),
        'desc'        => esc_html__('Default is Black','sportcenter'),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'general',
      ),
      array(
        'id'          => 'loading_spin_color',
        'label'       => esc_html__('Pre-Loading Spinners Color','sportcenter'),
        'desc'        => esc_html__('Default is Main color','sportcenter'),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'general',
      ),
	  //color
      array(
        'id'          => 'main_color_1',
        'label'       => esc_html__('Main color','sportcenter'),
        'desc'        => esc_html__('Choose Main color (Default is #39ba93)','sportcenter'),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'color',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  array(
        'id'          => 'heading_bg',
        'label'       => esc_html__('Page Heading Background','sportcenter'),
        'desc'        => esc_html__('Choose Page Heading background (Default is Main color)','sportcenter'),
        'std'         => '',
        'type'        => 'background',
        'section'     => 'color',
      ),
	  array(
        'id'          => 'footer_bg',
        'label'       => esc_html__('Footer Background Color','sportcenter'),
        'desc'        => esc_html__('Choose Footer background color (Default is Main color)','sportcenter'),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'color',
      ),
	  array(
        'id'          => 'bottom_bg',
        'label'       => esc_html__('Bottom Background Image','sportcenter'),
        'desc'        => esc_html__('Choose Bottom background image','sportcenter'),
        'std'         => '',
        'type'        => 'background',
        'section'     => 'color',
      ),
	  
	  
	  //font
      array(
        'id'          => 'main_font',
        'label'       => esc_html__('Main Font Family','sportcenter'),
        'desc'        => esc_html__('Enter font-family name here. <a href="http://www.google.com/fonts/" target="_blank">Google Fonts</a> are supported. For example, if you choose "Source Code Pro" Google Font with font-weight 400,500,600, enter <i>Source Code Pro:400,500,600</i>','sportcenter'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'fonts',
      ),
      array(
        'id'          => 'main_size',
        'label'       => esc_html__('Main Font Size','sportcenter'),
        'desc'        => esc_html__('Select base font size (px)','sportcenter'),
        'std'         => '14',
        'type'        => 'numeric-slider',
        'section'     => 'fonts',
        'min_max_step'=> '10,18,1',
      ),
	  array(
        'id'          => 'heading_font',
        'label'       => esc_html__('Heading Font Family','sportcenter'),
        'desc'        => esc_html__('Enter font-family name here. <a href="http://www.google.com/fonts/" target="_blank">Google Fonts</a> are supported. For example, if you choose "Source Code Pro" Google Font with font-weight 400,500,600, enter <i>Source Code Pro:400,500,600</i>','sportcenter'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'fonts',
      ),
	  array(
        'id'          => 'heading_font_style',
        'label'       => esc_html__('Heading Font Style','sportcenter'),
        'desc'        => esc_html__('Ex: italic','sportcenter'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'fonts',
      ),
      array(
        'id'          => 'custom_font_1',
        'label'       => esc_html__('Upload Custom Font 1','sportcenter'),
        'desc'        => esc_html__('Upload your own font and enter name "custom-font-1" in "Main Font Family" or "Heading Font Family" setting above','sportcenter'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'fonts',
      ),
	  array(
        'id'          => 'custom_font_2',
        'label'       => esc_html__('Upload Custom Font 2','sportcenter'),
        'desc'        => esc_html__('Upload your own font and enter name "custom-font-2" in "Main Font Family" or "Heading Font Family" setting above','sportcenter'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'fonts',
      ),
	  
	  //nav
	  array(
        'id'          => 'nav_style',
        'label'       => esc_html__('Main Navigation Style','sportcenter'),
        'desc'        => esc_html__('Choose Main Navigation Style','sportcenter'),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'nav',
        'min_max_step'=> '',
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => esc_html__('Default','sportcenter'),
          ),
          array(
            'value'       => '1',
            'label'       => esc_html__('Off Canvas','sportcenter'),
          ),
        ),
      ),
	  array(
        'id'          => 'nav_schema',
        'label'       => esc_html__('Main Navigation Schema','sportcenter'),
        'desc'        => esc_html__('Choose Main Navigation color schema','sportcenter'),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'nav',
        'min_max_step'=> '',
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => esc_html__('Dark','sportcenter'),
          ),
          array(
            'value'       => '1',
            'label'       => esc_html__('Light','sportcenter'),
          ),
        ),
      ),
	  array(
        'id'          => 'nav_bg',
        'label'       => esc_html__('Main Navigation Background Color','sportcenter'),
        'desc'        => esc_html__('Choose Main Navigation background color','sportcenter'),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'nav',
      ),
	  array(
        'id'          => 'nav_opacity',
        'label'       => esc_html__('Main Navigation Background Opacity','sportcenter'),
        'desc'        => esc_html__('Choose Main Navigation background opacity (%)','sportcenter'),
        'std'         => '100',
        'type'        => 'numeric-slider',
        'section'     => 'nav',
		'min_max_step'=> '0,100,5',
      ),
	  array(
        'id'          => 'nav_sticky',
        'label'       => esc_html__('Sticky Navigation','sportcenter'),
        'desc'        => esc_html__('Choose to Enable Sticky Navigation','sportcenter'),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'nav',
      ),
	  array(
        'id'          => 'sticky_logo_image',
        'label'       => esc_html__('Sticky Logo','sportcenter'),
        'desc'        => esc_html__('Upload your logo image','sportcenter'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'nav',
      ),
	  array(
        'id'          => 'enable_search',
        'label'       => esc_html__('Enable Search','sportcenter'),
        'desc'        => esc_html__('Enable or disable default search button on Navigation','sportcenter'),
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'nav',
      ),
	  
	  array(
		'label'       => esc_html__('Top Navigation Content','sportcenter'),
		'id'          => 'top_nav_content',
		'type'        => 'textarea-simple',
		'desc'        => esc_html__('Ex: <span><i class="fa fa-phone"></i> 0123-456-789</span>','sportcenter'),
		'std'         => '',
		'section'     => 'nav',
	 ),
	  array(
			'label'       => esc_html__('Top Navigation Tabs','sportcenter'),
			'id'          => 'top_tabs',
			'type'        => 'list-item',
			'section'     => 'nav',
			'desc'        => esc_html__('Add Top Navigation Tabs','sportcenter'),
			'settings'    => array(
				 array(
					'label'       => esc_html__('Icon Font Class','sportcenter'),
					'id'          => 'icon',
					'type'        => 'text',
					'desc'        => esc_html__('Enter Font Awesome class (Ex: fa-facebook)','sportcenter'),
					'std'         => '',
				 ),
				 array(
					'label'       => esc_html__('Content','sportcenter'),
					'id'          => 'content',
					'type'        => 'textarea',
					'desc'        => esc_html__('Enter Tab Content','sportcenter'),
					'std'         => '',
				 ),
				 array(
					'label'       => esc_html__('URL','sportcenter'),
					'id'          => 'link',
					'type'        => 'text',
					'desc'        => esc_html__('Enter URL for this item (will redirect instead of expand tab content)','sportcenter'),
					'std'         => '',
				 ),
				 array(
					'label'       => esc_html__('Full width content','sportcenter'),
					'id'          => 'fullwidth',
					'desc'        => esc_html__('Full width or in Container (default)?','sportcenter'),
					'std'         => 'off',
					'type'        => 'on-off',
				 ),
				 array(
					'label'       => esc_html__('Show Tab Title','sportcenter'),
					'id'          => 'show_title',
					'desc'        => esc_html__('Choose to show Title next to icon','sportcenter'),
					'std'         => 'off',
					'type'        => 'on-off',
				 ),
			)
	  ),
	  


	  //single post
      array(
        'id'          => 'post_sidebar_layout',
        'label'       => esc_html__('Sidebar Layout','sportcenter'),
        'desc'        => esc_html__('Select Sidebar Layout (Right, Left or Fullwidth)','sportcenter'),
        'std'         => '',
        'type'        => 'radio-image',
        'section'     => 'single_post',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
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
        ),
      ),
	  array(
        'id'          => 'enable_author',
        'label'       => esc_html__('Author','sportcenter'),
        'desc'        => esc_html__('Enable Author info','sportcenter'),
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'single_post',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
      array(
        'id'          => 'single_published_date',
        'label'       => esc_html__('Published Date','sportcenter'),
        'desc'        => esc_html__('Enable Published Date info','sportcenter'),
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'single_post',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),	
	  array(
        'id'          => 'single_categories',
        'label'       => esc_html__('Categories','sportcenter'),
        'desc'        => esc_html__('Enable Categories info','sportcenter'),
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'single_post',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),	
	  array(
        'id'          => 'single_tags',
        'label'       => esc_html__('Tags','sportcenter'),
        'desc'        => esc_html__('Enable Categories info','sportcenter'),
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'single_post',
        'rows'        => '',
      ),
	  array(
        'id'          => 'single_cm_count',
        'label'       => esc_html__('Comment Count','sportcenter'),
        'desc'        => esc_html__('Enable Comment Count Info','sportcenter'),
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'single_post',
        'rows'        => '',
      ),
	  array(
        'id'          => 'single_navi',
        'label'       => esc_html__('Post Navigation','sportcenter'),
        'desc'        => esc_html__('Enable Post Navigation','sportcenter'),
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'single_post',
      ),	  

      array(
        'id'          => 'page_sidebar_layout',
        'label'       => esc_html__('Sidebar Layout','sportcenter'),
        'desc'        => esc_html__('Select Sidebar Layout (Right, Left or Fullwidth)','sportcenter'),
        'std'         => '',
        'type'        => 'radio-image',
        'section'     => 'single_page',
        'choices'     => array( 
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
        ),
      ),
	  
      array(
        'id'          => 'archive_sidebar_layout',
        'label'       => esc_html__('Sidebar Layout','sportcenter'),
        'desc'        => esc_html__('Select Sidebar position for Archive pages','sportcenter'),
        'std'         => '',
        'type'        => 'radio-image',
        'section'     => 'archive',
        'choices'     => array( 
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
        ),
      ),
	  array(
        'id'          => 'listing_style',
        'label'       => esc_html__('Archive Post Listing Style','sportcenter'),
        'desc'        => esc_html__('Select Post Listing Style for Archive pages (Quick Ajax need to be installed)','sportcenter'),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'archive',
        'choices'     => array( 
          array(
            'value'       => '0',
            'label'       => esc_html__('Default','sportcenter'),
          ),
          array(
            'value'       => 'ajax',
            'label'       => esc_html__('Quick Ajax','sportcenter'),
          )
        ),
      ),
	  array(
        'id'          => 'blog_thumb_show_date',
        'label'       => esc_html__('Show datetime on Post Thumbnail','sportcenter'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'archive',
      ),
	  array(
        'id'          => 'custom_excerpt_length',
        'label'       => esc_html__('Custom default excerpt length','sportcenter'),
        'desc'        => esc_html__('Default is 22 words','sportcenter'),
        'std'         => '22',
        'type'        => 'text',
        'section'     => 'archive',
      ),
	  
      array(
        'id'          => 'page404_title',
        'label'       => esc_html__('Page Title','sportcenter'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => '404',
      ),
      array(
        'id'          => 'page404_content',
        'label'       => esc_html__('Page Content','sportcenter'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => '404',
        'rows'        => '8',
      ),
	  array(
        'id'          => 'page404_search',
        'label'       => esc_html__('Search Form','sportcenter'),
        'desc'        => esc_html__('Enable Search Form in 404 page','sportcenter'),
        'std'         => '',
        'type'        => 'on-off',
        'section'     => '404',
      ),
	  
	  
	  array(
        'id'          => 'woocommerce_layout',
        'label'       => esc_html__('Shop & Product Layout','sportcenter'),
        'desc'        => esc_html__('Select default layout of shop & product pages','sportcenter'),
        'std'         => '',
        'type'        => 'radio-image',
        'section'     => 'woocommerce',
        'choices'     => array( 
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
        ),
      ),
	  
	  
	array(
        'id'          => 'event_sidebar_layout',
        'label'       => esc_html__('Event Sidebar Layout','sportcenter'),
        'desc'        => esc_html__('Select default layout of event pages','sportcenter'),
        'std'         => '',
        'type'        => 'radio-image',
        'section'     => 'event',
        'choices'     => array( 
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
        ),
      ),
	  array(
        'id'          => 'event_show_top_info',
        'label'       => esc_html__('Show Heading Info','sportcenter'),
        'desc'        => esc_html__('in Single Event','sportcenter'),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'event',
      ),
	  array(
        'id'          => 'event_show_top_category',
        'label'       => esc_html__('Show Heading Categories','sportcenter'),
        'desc'        => esc_html__('in Single Event','sportcenter'),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'event',
      ),
	  array(
        'id'          => 'event_show_content_info',
        'label'       => esc_html__('Show Second Title, Info & All Event link in Single content','sportcenter'),
        'desc'        => esc_html__('in Single Event','sportcenter'),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'event',
      ),
	  array(
        'id'          => 'event_show_thumbnail',
        'label'       => esc_html__('Show Event Thumbnail in Single content','sportcenter'),
        'desc'        => esc_html__('in Single Event','sportcenter'),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'event',
      ),
	  array(
        'id'          => 'event_show_post_nav',
        'label'       => esc_html__('Show Next/Prev Event','sportcenter'),
        'desc'        => esc_html__('in Single Event','sportcenter'),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'event',
      ),
	  array(
        'id'          => 'event_list_sidebar_layout',
        'label'       => esc_html__('Event Listing Sidebar Layout','sportcenter'),
        'desc'        => esc_html__('Select layout of event archiver pages','sportcenter'),
        'std'         => '',
        'type'        => 'radio-image',
        'section'     => 'event',
        'choices'     => array( 
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
        ),
      ),


	
	array(
        'id'          => 'member_sidebar_layout',
        'label'       => esc_html__('Member Sidebar Layout','sportcenter'),
        'desc'        => esc_html__('Select default layout of member pages','sportcenter'),
        'std'         => '',
        'type'        => 'radio-image',
        'section'     => 'member',
        'choices'     => array( 
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
        ),
      ),
	  array(
        'id'          => 'member_list_sidebar_layout',
        'label'       => esc_html__('Member List Sidebar Layout','sportcenter'),
        'desc'        => esc_html__('Select default layout of member list pages','sportcenter'),
        'std'         => '',
        'type'        => 'radio-image',
        'section'     => 'member',
        'choices'     => array( 
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
        ),
      ),
	  array(
        'id'          => 'member_show_event',
        'label'       => esc_html__('Show Member\'s Upcomming Events','sportcenter'),
        'desc'        => esc_html__('in Single Member','sportcenter'),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'member',
      ),
	  array(
        'id'          => 'member_show_member',
        'label'       => esc_html__('Show Other Members','sportcenter'),
        'desc'        => esc_html__('in Single Member','sportcenter'),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'member',
      ),
	  array(
        'id'          => 'member_label',
        'label'       => esc_html__('Member Post Label','sportcenter'),
        'desc'        => esc_html__('Ex: Trainers, Teachers...','sportcenter'),
        'std'         => 'Trainers',
        'type'        => 'text',
        'section'     => 'member',
      ),
	  array(
        'id'          => 'member_slug',
        'label'       => esc_html__('Member Post Slug','sportcenter'),
        'desc'        => esc_html__('Need to re-save permalink options','sportcenter'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'member',
      ),



      array(
        'id'          => 'acc_facebook',
        'label'       => esc_html__('Facebook','sportcenter'),
        'desc'        => esc_html__('Enter full link to your account (including http://)','sportcenter'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_account',
      ),
      array(
        'id'          => 'acc_twitter',
        'label'       => esc_html__('Twitter','sportcenter'),
        'desc'        => esc_html__('Enter full link to your account (including http://)','sportcenter'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_account',
      ),
      array(
        'id'          => 'acc_linkedin',
        'label'       => esc_html__('LinkedIn','sportcenter'),
        'desc'        => esc_html__('Enter full link to your account (including http://)','sportcenter'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_account',
      ),
      array(
        'id'          => 'acc_tumblr',
        'label'       => esc_html__('Tumblr','sportcenter'),
        'desc'        => esc_html__('Enter full link to your account (including http://)','sportcenter'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_account',
      ),
      array(
        'id'          => 'acc_google-plus',
        'label'       => esc_html__('Google Plus','sportcenter'),
        'desc'        => esc_html__('Enter full link to your account (including http://)','sportcenter'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_account',
      ),
      array(
        'id'          => 'acc_pinterest',
        'label'       => esc_html__('Pinterest','sportcenter'),
        'desc'        => esc_html__('Enter full link to your account (including http://)','sportcenter'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_account',
      ),
      array(
        'id'          => 'acc_youtube',
        'label'       => esc_html__('Youtube','sportcenter'),
        'desc'        => esc_html__('Enter full link to your account (including http://)','sportcenter'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_account',
      ),
      array(
        'id'          => 'acc_flickr',
        'label'       => esc_html__('Flickr','sportcenter'),
        'desc'        => esc_html__('Enter full link to your account (including http://)','sportcenter'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_account',
      ),
	  array(
			'label'       => esc_html__('Custom Social Account','sportcenter'),
			'id'          => 'custom_acc',
			'type'        => 'list-item',
			'class'       => '',
			'section'     => 'social_account',
			'desc'        => esc_html__('Add Social Account','sportcenter'),
			'choices'     => array(),
			'settings'    => array(
				 array(
					'label'       => esc_html__('Icon Font Awesome','sportcenter'),
					'id'          => 'icon',
					'type'        => 'text',
					'desc'        => esc_html__('Enter Font Awesome class (Ex: fa-facebook)','sportcenter'),
				 ),
				 array(
					'label'       => esc_html__('URL','sportcenter'),
					'id'          => 'link',
					'type'        => 'text',
					'desc'        => esc_html__('Enter full link to your account (including http://)','sportcenter'),
				 ),
			)
	  ),
	  array(
        'id'          => 'social_link_open',
        'label'       => esc_html__('Open Social link in new tab?','sportcenter'),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'social_account',
      ),
      array(
        'id'          => 'share_facebook',
        'label'       => esc_html__('Facebook Share','sportcenter'),
        'desc'        => esc_html__('Enable Facebook Share button','sportcenter'),
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'social_share',
      ),
      array(
        'id'          => 'share_twitter',
        'label'       => esc_html__('Twitter Share','sportcenter'),
        'desc'        => esc_html__('Enable Twitter Tweet button','sportcenter'),
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'social_share',
      ),
      array(
        'id'          => 'share_linkedin',
        'label'       => esc_html__('LinkedIn Share','sportcenter'),
        'desc'        => esc_html__('Enable LinkedIn Share button','sportcenter'),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'social_share',
      ),
      array(
        'id'          => 'share_tumblr',
        'label'       => esc_html__('Tumblr Share','sportcenter'),
        'desc'        => esc_html__('Enable Tumblr Share button','sportcenter'),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'social_share',
      ),
      array(
        'id'          => 'share_google_plus',
        'label'       => esc_html__('Google+ Share','sportcenter'),
        'desc'        => esc_html__('Enable Google+ Share button','sportcenter'),
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'social_share',
      ),
      array(
        'id'          => 'share_pinterest',
        'label'       => esc_html__('Pinterest Share','sportcenter'),
        'desc'        => esc_html__('Enable Pinterest Pin button','sportcenter'),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'social_share',
      ),
      array(
        'id'          => 'share_email',
        'label'       => esc_html__('Email Share','sportcenter'),
        'desc'        => esc_html__('Enable Email button','sportcenter'),
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'social_share',
      ),
	  
	  
    )
  );
  
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
}