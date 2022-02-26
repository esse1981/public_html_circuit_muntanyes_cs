<?php
/*Dynamic CSS*/
if(leaf_get_option('retina_logo')){?>
	@media only screen and (-webkit-min-device-pixel-ratio: 2),(min-resolution: 192dpi) {
		/* Retina Logo */
		.logo{background:url(<?php echo esc_url(leaf_get_option('retina_logo')); ?>) no-repeat center; display:inline-block !important; background-size:contain;}
		.logo img{ opacity:0; visibility:hidden}
		.logo *{display:inline-block}
		.affix .logo.sticky{ background:transparent !important; display:block !important}
		.affix .logo.sticky img{ opacity:1; visibility: visible;}
	}
<?php }

if(leaf_get_option('sticky_logo_image') != '' && leaf_get_option('nav_sticky','on')=='on'):?>
    .navbar-header .logo.sticky{ display:none !important;}
    #main-nav.affix .navbar-header .logo{ display:none !important;}
    #main-nav.affix .navbar-header .logo.sticky{ display:inline-block !important;}
    #main-nav.affix .style-off-canvas .navbar-header .logo.sticky{ display:block !important; }
<?php endif;

if(!function_exists('leaf_hex2rgba')){
function leaf_hex2rgba($hex,$opacity) {
   $hex = str_replace("#", "", $hex);
   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $opacity = $opacity/100;
   $rgba = array($r, $g, $b, $opacity);
   return implode(",", $rgba);
}
}

//fonts
if($custom_font_1 = leaf_get_option( 'custom_font_1')){ ?>
	@font-face
    {
    	font-family: 'custom-font-1';
    	src: url('<?php echo esc_url($custom_font_1) ?>');
    }
<?php }
if($custom_font_2 = leaf_get_option( 'custom_font_2')){ ?>
	@font-face
    {
    	font-family: 'custom-font-2';
    	src: url('<?php echo esc_url($custom_font_2) ?>');
    }
<?php }
$main_font = leaf_get_option( 'main_font', false);
$main_font_family = explode(":", $main_font);
$main_font_family = $main_font_family[0];
$heading_font = leaf_get_option( 'heading_font', false);
$heading_font_family = explode(":", $heading_font);
$heading_font_family = $heading_font_family[0];
$heading_font_style = leaf_get_option( 'heading_font_style', false);

if($main_font){?>
    body{
        font-family: '<?php echo esc_attr($main_font_family) ?>', Arial, sans-serif;
    }
<?php }
if($main_size = leaf_get_option( 'main_size' )){ ?>
	body {
        font-size: <?php echo esc_attr($main_size) ?>px;
    }
<?php }
if($heading_font || $heading_font_style){?>
    h1, .h1, .font-2, .media-heading, h2, .h2,
    button, input[type=button], input[type=submit], .btn,
    #main-nav, header .dropdown-menu, .mobile-menu > li > a,
    .item-content .item-title, .widget-title, .widget_recent_comments ul#recentcomments li .comment-author-link,
    h4.wpb_toggle, .wpb_accordion .wpb_accordion_wrapper h3.wpb_accordion_header,
    .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,
    .woocommerce #reviews h3, .woocommerce ul.products li.product h3,
    #tribe-events .tribe-events-button, .tribe-events-button, .heading-event-meta-content .tribe-events-cost a, .heading-event-meta-content a.tribe-events-gmap,
    .tribe-events-meta-group .tribe-events-single-section-title, #tribe-bar-form label,
    table.tribe-events-calendar > thead > tr > th, .tribe-events-calendar div[id*=tribe-events-daynum-], .tribe-events-calendar div[id*=tribe-events-daynum-] a, #tribe-events-content .tribe-events-tooltip h4, .tribe-mobile-day-heading, #tribe-mobile-container .type-tribe_events h4, .tribe-events-list-widget ol li .tribe-event-title, .tribe-events-sub-nav li a,
    h3.tribe-events-related-events-title, h2.tribe-attendees-list-title,
    .tribe-events-single ul.tribe-related-events .tribe-related-events-title,
    .tribe-grid-header
    {
        font-family: "<?php echo esc_attr($heading_font_family) ?>", Times, serif;
        font-style: <?php echo esc_attr($heading_font_style) ?>;
    }
<?php }


//color
$main_color_1 = leaf_get_option('main_color_1');
if($main_color_1){ ?>
    .main-color-1, .main-color-1-hover:hover, .dark-div .main-color-1, a:hover, a:focus,
    .main-color-2, .main-color-2-hover:hover,
    .btn .btn-icon, .btn-primary, input[type=submit], .dark-div .btn-primary,
    button:hover, input[type=button]:hover, .btn:hover, .btn:focus, .btn:active, .btn.active, .open .dropdown-toggle.btn-default,
    .btn-lighter:hover .btn-icon,
    .dark-div button:hover, .dark-div input[type=button]:hover, .dark-div input[type=submit]:hover, .dark-div .btn-default:hover, .dark-div .btn-default:focus, .dark-div .btn-default:active, .dark-div .btn-default.active, .dark-div .open .dropdown-toggle.btn-default,
    #main-nav .navbar-nav>.current-menu-item>a, #main-nav .navbar-nav>.current-menu-item>a:focus, #main-nav .navbar-nav .current-menu-item>a,
    header .dropdown-menu>li>a:hover, header .dropdown-menu>li>a:focus,
    #main-nav.light-nav .dropdown-menu>li>a:hover, #main-nav.light-nav .dropdown-menu>li>a:focus,
    .ia-icon, .light .ia-icon,
    .item-meta a:not(.btn):hover,
    .widget_nav_menu ul li ul li:before, .normal-sidebar .widget_nav_menu ul li ul li:before,
    .single-post-meta:after, .single-post-navigation-item a:hover h4, .single-post-navigation-item a:hover i,
    .wpb_wrapper .wpb_accordion .wpb_accordion_wrapper .ui-accordion-header-active, .wpb_wrapper .wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header:hover, #content .wpb_wrapper h4.wpb_toggle:hover, #content .wpb_wrapper h4.wpb_toggle.wpb_toggle_title_active,
    .wpb_wrapper .wpb_content_element .wpb_tabs_nav li.ui-tabs-active, .wpb_wrapper .wpb_content_element .wpb_tabs_nav li:hover
    .woocommerce-error:after, .woocommerce-info:after, .woocommerce-message:after,
    .woocommerce div.product p.price, .woocommerce div.product span.price,
    .woocommerce ul.products li.product h3:hover, .woocommerce ul.products li.product .price,
    .heading-event-meta-content .tribe-events-cost a,
    .heading-event-meta-content a.tribe-events-gmap,
    .sc-single-event-add-to-cart .single_add_to_cart_button:before, .post-nav-item:hover .font-2, .tribe-events-notices:after,
    .tribe-events-list-separator-month span:after,
	.tribe-events-day .tribe-events-day-time-slot h5:after,
    .tribe-events-list-widget .widget-title, .tribe-events-list-widget ol li:before, .tribe-events-list-widget ol li:after,
    #tribe-events .sc-single-event-add-to-cart .single_add_to_cart_button:before, .sc-single-event-add-to-cart .single_add_to_cart_button:before,
    #tribe-events .sc-single-event-add-to-cart .single_add_to_cart_button:hover, .sc-single-event-add-to-cart .single_add_to_cart_button:hover,
    .sc-single-event-meta form.cart .tribe-events-tickets button.button:before, table.tribe-events-tickets .add-to-cart .tribe-button:before,
    .sc-single-event-meta form.cart .tribe-events-tickets button.button:hover, table.tribe-events-tickets .add-to-cart .tribe-button:hover,
    body #bbpress-forums li.bbp-body ul.topic .bbp-topic-title:hover:before, body #bbpress-forums li.bbp-body ul.forum .bbp-forum-info:hover:before,
    body li.bbp-topic-title .bbp-topic-permalink:hover, body #bbpress-forums li.bbp-body ul.topic .bbp-topic-title:hover a, body #bbpress-forums li.bbp-body ul.forum .bbp-forum-info:hover .bbp-forum-title,
    body #bbpress-forums .bbp-body li.bbp-forum-freshness .bbp-author-name, body #bbpress-forums .type-forum p.bbp-topic-meta span a, body .bbp-topic-meta .bbp-topic-started-by a, body #bbpress-forums .bbp-body li.bbp-topic-freshness .bbp-author-name, body #bbpress-forums div.bbp-reply-author .bbp-author-role
    {
        color:<?php echo esc_attr($main_color_1) ?>;
    }
    
    .ia-icon, .light .ia-icon,
    .ia-icon:hover, .leaf-icon-box:hover .ia-icon,
    .main-color-1-border,
    #tribe-bar-form input[type=text]:focus
    {
        border-color:<?php echo esc_attr($main_color_1) ?>;
    }
    .carousel-has-control.owl-theme .owl-controls .owl-prev:hover, .carousel-has-control.owl-theme .owl-controls .owl-next:hover{
    	border-left-color:<?php echo esc_attr($main_color_1) ?>;
        border-right-color:<?php echo esc_attr($main_color_1) ?>;
    }
    .leaf-member-info:after {
        border-color: transparent transparent <?php echo esc_attr($main_color_1) ?> transparent;
    }
    @media(min-width:768px){
    .leaf-member.thumb-bottom .leaf-member-info:after {
        border-color: <?php echo esc_attr($main_color_1) ?> transparent transparent transparent;
    }
    }
    .datepicker-dropdown:before, .datepicker-dropdown:after, table.tribe-events-calendar > thead > tr > th {
        border-bottom-color: <?php echo esc_attr($main_color_1) ?>;
    }
    
    .features-control-item:after,
    .main-color-1-bg, .main-color-1-bg-hover:hover,.main-color-2-bg,
    table:not(.shop_table):not(.tribe-events-calendar):not([class*='tribe-community-event'])>thead,
    table:not(.shop_table):not(.tribe-events-calendar):not([class*='tribe-community-event'])>tbody>tr:hover>td, table:not(.shop_table):not(.tribe-events-calendar):not([class*='tribe-community-event'])>tbody>tr:hover>th,
    button, input[type=button], .btn-default, .btn-primary:after,
    .navbar-inverse .navbar-nav>li:after, .navbar-inverse .navbar-nav>li:focus:after,
    header .dropdown-menu>li>a:hover:before, header .dropdown-menu>li>a:focus:before,
    #bottom-nav .social-list .social-icon:hover,
    .leaf-timeline .timeline-item:hover .timeline-item-inner:after,
    .ia-icon:hover, .leaf-icon-box:hover .ia-icon, .features-control-item:after,
    .owl-theme .owl-controls .owl-page.active span, .owl-theme .owl-controls.clickable .owl-page:hover span,
    .ia-heading h2:before, .widget-title:before,
    .wpb_accordion .wpb_accordion_wrapper .ui-state-active .ui-icon:before, .wpb_accordion .wpb_accordion_wrapper .ui-state-active .ui-icon:after, .wpb_wrapper .wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header:hover .ui-icon:before, .wpb_wrapper .wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header:hover .ui-icon:after, .wpb_wrapper .wpb_toggle:hover:before, .wpb_wrapper .wpb_toggle:hover:after, .wpb_wrapper h4.wpb_toggle.wpb_toggle_title_active:before, .wpb_wrapper h4.wpb_toggle.wpb_toggle_title_active:after,
    .woocommerce div.product form.cart .button:before,
    .woocommerce div.product .products > h2:before,
    .woocommerce ul.products li.product .button:before,
    .woocommerce span.onsale, .woocommerce ul.products li.product .onsale,
    .woocommerce ul.products li.product.product-category h3:hover,
    .woocommerce-cart .shop_table.cart thead tr,
    .cross-sells > h2:before, .cart_totals h2:before, .woocommerce-shipping-fields h3:before, .woocommerce-billing-fields h3:before,
    .woocommerce .widget_price_filter .ui-slider-horizontal .ui-slider-range,
    .loader-2 i,
    .heading-event-meta-title:before, .tribe-mobile-day-heading:before,
    #tribe-events .sc-single-event-add-to-cart .single_add_to_cart_button, .sc-single-event-add-to-cart .single_add_to_cart_button,
    .sc-single-event-meta form.cart .tribe-events-tickets button.button, table.tribe-events-tickets .add-to-cart .tribe-button,
    .tribe-events-grid .tribe-grid-header .tribe-week-today,
    body #bbpress-forums li.bbp-header, body div.bbp-submit-wrapper .button
    {
        background-color:<?php echo esc_attr($main_color_1) ?>;
    }
    
    input[type=submit]:hover, .btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open .dropdown-toggle.btn-primary, .btn-primary .btn-icon,
    .dark-div .btn-primary:hover, .dark-div .btn-primary:focus, .dark-div .btn-primary:active, .dark-div .btn-primary.active, .dark-div .open .dropdown-toggle.btn-primary,
    .post-news-big-item .btn-news,
    .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,
    .woocommerce div.product form.cart .button:hover,
    .woocommerce div.product .woocommerce-tabs ul.tabs li.active,
    .woocommerce ul.products li.product .button:hover,
    #tribe-events .tribe-events-button:hover, .tribe-events-button.tribe-active:hover, .tribe-events-button:hover,
    #tribe-bar-form .tribe-bar-submit input[type=submit]
    {
    	color:#0f0f0f;
    	background-color:<?php echo esc_attr($main_color_1) ?>;
    }
    
    .post-grid-button .btn-icon, .btn-date-blog .btn-icon,
    .wp-pagenavi a:hover, .wp-pagenavi span.current,
    .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,
    .woocommerce ul.products li.product .button,
    #tribe-events .tribe-events-button, .tribe-events-button,
    #tribe-bar-views .tribe-bar-views-list .tribe-bar-views-option a:hover, 
    #tribe-bar-views .tribe-bar-views-list .tribe-bar-views-option.tribe-bar-active a:hover,
    #tribe-bar-form .tribe-bar-submit input[type=submit]:hover,
    .tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-], .tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-]>a,
    #tribe-events-content .tribe-events-calendar td.tribe-events-present.mobile-active:hover,
    .tribe-events-calendar td.tribe-events-present.mobile-active,
    .tribe-events-calendar td.tribe-events-present.mobile-active div[id*=tribe-events-daynum-],
    .tribe-events-calendar td.tribe-events-present.mobile-active div[id*=tribe-events-daynum-] a,
    #tribe-events-content .mobile-trigger td.tribe-events-present
    {
        background:#0f0f0f;
        color:<?php echo esc_attr($main_color_1) ?>;
    }
    
    .wpb_wrapper .wpb_content_element .wpb_tabs_nav li.ui-tabs-active a, .wpb_wrapper .wpb_content_element .wpb_tabs_nav li:hover a{
        color:<?php echo esc_attr($main_color_1) ?>;
        box-shadow: inset 0 -3px 0 <?php echo esc_attr($main_color_1) ?>;
    }
    @media (min-width: 480px){
        .wpb_wrapper .wpb_tour.wpb_content_element .wpb_tabs_nav li:hover a,
        .wpb_wrapper .wpb_tour.wpb_content_element .wpb_tabs_nav li.ui-tabs-active a{box-shadow: inset -3px 0 0 <?php echo esc_attr($main_color_1) ?>;}
    }
    .sc-single-event-add-to-cart .single_add_to_cart_button:hover{
        color:<?php echo esc_attr($main_color_1) ?>;
        background:#000;
    }
    .leaf-banner-item:hover .leaf-banner-content{
    	background-color: rgba(<?php echo leaf_hex2rgba($main_color_1,80); ?>);
    }

<?php
}//main color 1

if($nav_bg = leaf_get_option('nav_bg')){
$nav_bg = leaf_hex2rgba($nav_bg,leaf_get_option('nav_opacity',100));
?>
    #main-nav .navbar, #main-nav.light-nav .navbar {
    	background: rgba(<?php echo esc_attr($nav_bg); ?>);
    }
<?php
}//footer_bg
if($footer_bg = leaf_get_option('footer_bg','#0f0f0f')){ ?>
    footer.main-color-2-bg, .main-color-2-bg.back-to-top{
        background-color:<?php echo esc_attr($footer_bg) ?>;
    }
<?php
}//footer_bg
$bottom_bg = leaf_get_option('bottom_bg');
if($bottom_bg){ ?>
#bottom-nav{
	background-image:url(<?php echo esc_url($bottom_bg['background-image']) ?>);
	background-color:<?php echo esc_attr($bottom_bg['background-color']) ?>;
	background-position:<?php echo esc_attr($bottom_bg['background-position']) ?>;
	background-repeat:<?php echo esc_attr($bottom_bg['background-repeat']) ?>;
	background-size:<?php echo esc_attr($bottom_bg['background-size']) ?>;
	background-attachment:<?php echo esc_attr($bottom_bg['background-attachment']) ?>;
}
<?php } //if bottom_bg


if($loading_spin_color = leaf_get_option( 'loading_spin_color', false)){ ?>
.loader-2 i {
	background:<?php echo esc_attr($loading_spin_color); ?>
}
<?php }

//white label event
if(is_singular('tribe_events') && get_post_meta(get_the_ID(),'white-label',true) == 'on'){ ?>
#wrap > header,
footer.main-color-2-bg,
#sidebar,
.single-tribe_events .tribe-events-back,.sc-single-event-nav,
#tribe-events-content h1.h2, .single-tribe_events .tribe-events-schedule{
	display:none;
    opacity:0;
}
#content{
	width:100%;
}
.event-heading {
    padding-top: 200px;
    padding-bottom: 200px;
}
<?php } 

//custom CSS
echo wp_kses_post(leaf_get_option('custom_css',''));