<?php
/*
 * Applay functions
 */
if ( ! isset( $content_width ) ) $content_width = 900;
/**
 * Load core
 */
require_once get_template_directory().'/inc/starter/leaf-core.php';
require_once get_template_directory().'/inc/option-tree-hook.php';
require_once get_template_directory().'/inc/starter/twenty-core.php';
require_once get_template_directory().'/inc/starter/widget_param.php';

/* Define list of recommended and required plugins */
global $__required_plugins;
$__required_plugins = array(
		array(
            'name'      => esc_html__('Option Tree','sportcenter'),
            'slug'      => 'option-tree',
            'required'  => false
        ),
		array(
            'name'      => esc_html__('The Event Calendar','sportcenter'),
            'slug'      => 'the-events-calendar',
            'required'  => false
        ),
		array(
            'name'      => esc_html__('WooCommerce','sportcenter'),
            'slug'      => 'woocommerce',
            'required'  => false
        ),
		array(
            'name'      => esc_html__('Black Studio TinyMCE Widget','sportcenter'),
            'slug'      => 'black-studio-tinymce-widget',
            'required'  => false
        ),
		array(
            'name'      => esc_html__('Contact Form 7','sportcenter'),
            'slug'      => 'contact-form-7',
            'required'  => false
        ),
		array(
            'name'      => esc_html__('WP Pagenavi','sportcenter'),
            'slug'      => 'wp-pagenavi',
            'required'  => false
        ),
    );
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); //for checking plugin
require_once get_template_directory().'/inc/tgm/class-tgm-plugin-activation.php';

function leafcolor_excerpt_length( $length ) {
	return leaf_get_option('custom_excerpt_length',22);
}
add_filter( 'excerpt_length', 'leafcolor_excerpt_length', 999 );

/**
 * Registers the WordPress features
 */
function leafcolor_setup() {
	/*
	 * Makes theme available for translation.
	 */
	load_theme_textdomain( 'sportcenter', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Post formats.
	add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );

	// Register menus.
	register_nav_menu( 'primary-menus', esc_html__( 'Primary Menus', 'sportcenter' ) );
	register_nav_menu( 'off-canvas-menus', esc_html__( 'Off Canvas Menus', 'sportcenter' ) );

	// Featured images.
	add_theme_support( 'post-thumbnails' );
	
	// Supports woocommerce.
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'leafcolor_setup' );

/**
 * Enqueues scripts and styles
 */
function leafcolor_scripts_styles() {
	/*
	 * Loads js.
	 */	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'template', get_template_directory_uri() . '/js/leaf.js', array('jquery'), '', true );
	/*
	 * Loads css
	 */
	$all_font = array();
	if(leaf_get_option('main_font','Montserrat') || leaf_get_option( 'heading_font','Russo One' )){
		if(leaf_get_option('main_font','Montserrat') && leaf_get_option('main_font')!='custom-font-1' && leaf_get_option('main_font')!='custom-font-2'){
			$all_font[] = leaf_get_option( 'main_font','Montserrat' );
		}
		if(leaf_get_option('heading_font','Russo One') && leaf_get_option('heading_font')!='custom-font-1' && leaf_get_option('heading_font')!='custom-font-2'){
			$all_font[] = leaf_get_option( 'heading_font','Russo One' );
		}
		$all_font = implode('|',$all_font);
		if((leaf_get_option('main_font','Montserrat') && leaf_get_option('main_font')!='custom-font-1' && leaf_get_option('main_font')!='custom-font-2') || (leaf_get_option('heading_font','Russo One') && leaf_get_option('heading_font')!='custom-font-1' && leaf_get_option('heading_font')!='custom-font-2')){
			$font_url = add_query_arg( 'family', urlencode( $all_font ), "//fonts.googleapis.com/css" );
			wp_enqueue_style( 'google-font', $font_url, array(), '1.0.0' );
		}
	}
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/fa/css/font-awesome.min.css');
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() .'/js/owl-carousel/owl.carousel.css');
	wp_enqueue_style( 'owl-carousel-theme', get_template_directory_uri() .'/js/owl-carousel/owl.theme.css');
	wp_enqueue_style( 'lightbox2', get_template_directory_uri() . '/js/colorbox/colorbox.css');
	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css');
    wp_enqueue_style( 'style-cmc', get_stylesheet_directory_uri() . '/style-cmc.css');

    if (!is_admin()) {
        wp_register_style('Archivo', 'https://fonts.googleapis.com/css?family=Archivo:Archivo:400,600,700&display=swap', array(), null, 'all');
        wp_enqueue_style('Archivo');
    }


	
	if(is_plugin_active( 'bbpress/bbpress.php' )){
		wp_enqueue_style( 'leaf-bbpress', get_template_directory_uri() . '/css/leaf-bbpress.css');
	}
	
	ob_start();
		require get_template_directory() . '/css/dynamic_css.php';
	$custom_css = ob_get_clean();
	wp_add_inline_style( 'style', $custom_css );
	
	if(leaf_get_option( 'right_to_left', 0)){
		wp_enqueue_style( 'rtl', get_template_directory_uri() . '/rtl.css');
	}
	
	if(is_singular() ) wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'leafcolor_scripts_styles' );

/* Enqueues for Admin */
function leafcolor_admin_scripts_styles() {
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/fa/css/font-awesome.min.css');
}
add_action( 'admin_enqueue_scripts', 'leafcolor_admin_scripts_styles' );

/**
 * Registers our main widget area and the front page widget areas.
 *
 * @since Twenty Twelve 1.0
 */
function leafcolor_widgets_init() {
	$rtl = leaf_get_option( 'righttoleft', 0);

	register_sidebar( array(
		'name' => esc_html__( 'Main Sidebar', 'sportcenter' ),
		'id' => 'main_sidebar',
		'description' => esc_html__( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'sportcenter' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-inner">',
		'after_widget' => '</div></div>',
		'before_title' => $rtl ? '<h2 class="widget-title maincolor2">' : '<h2 class="widget-title maincolor2">',
		'after_title' => $rtl ? '</h2>' : '</h2>',
	));
	register_sidebar( array(
		'name' => esc_html__( 'Pathway Sidebar', 'sportcenter' ),
		'id' => 'pathway_sidebar',
		'description' => esc_html__( 'Replace Pathway (Breadcrumbs) with your widgets', 'sportcenter' ),
		'before_widget' => '<div id="%1$s" class="pathway-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar( array(
		'name' => esc_html__( 'Front Page Sidebar ', 'sportcenter' ),
		'id' => 'frontpage_sidebar',
		'description' => esc_html__( 'Used in Front Page templates only', 'sportcenter' ),
		'before_widget' => '<div id="%1$s" class="widget frontpage-widget %2$s"><div class="widget-inner">',
		'after_widget' => '</div></div>',
		'before_title' => $rtl ? '<h2 class="widget-title maincolor2">' : '<h2 class="widget-title maincolor2">',
		'after_title' => $rtl ? '</h2>' : '</h2>',
	));
	register_sidebar( array(
		'name' => esc_html__( 'Bottom Sidebar', 'sportcenter' ),
		'id' => 'bottom_sidebar',
		'description' => esc_html__( 'Bottom of page (above Footer)', 'sportcenter' ),
		'before_widget' => '<div id="%1$s" class="col-md-3 widget %2$s"><div class="widget-inner">',
		'after_widget' => '</div></div>',
		'before_title' => '<h2 class="widget-title maincolor1">',
		'after_title' => '</h2>',
	));
	register_sidebar( array(
		'name' => esc_html__( 'Footer Sidebar', 'sportcenter' ),
		'id' => 'footer_sidebar',
		'description' => esc_html__( '', 'sportcenter' ),
		'before_widget' => '<div id="%1$s" class="col-md-3 widget %2$s"><div class="widget-inner">',
		'after_widget' => '</div></div>',
		'before_title' => '<h2 class="widget-title main-color-1">',
		'after_title' => '</h2>',
	));
	if (class_exists('Woocommerce')) {
	register_sidebar( array(
		'name' => esc_html__( 'Woocommerce Sidebar', 'sportcenter' ),
		'id' => 'woocommerce_sidebar',
		'description' => esc_html__( 'Appears on Woocommerce pages', 'sportcenter' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-inner">',
		'after_widget' => '</div></div>',
		'before_title' => $rtl ? '<h2 class="widget-title maincolor2">' : '<h2 class="widget-title maincolor2">',
		'after_title' => $rtl ? '</h2>' : '</h2>',
	));
	}
}
add_action( 'widgets_init', 'leafcolor_widgets_init' );

add_image_size('leaf_thumb_80x80',80, 80, true); //widget
add_image_size('leaf_thumb_409x258',409,258, true); //blog archiver
add_image_size('leaf_thumb_262x183',262,183, true); //carousel, event
add_image_size('leaf_thumb_524x366',524,366, true); //2x

//Hook widget 'SEARCH'
add_filter('get_search_form', 'leaf_search_form'); 
function leaf_search_form($text) {
	$text = str_replace('value=""', 'placeholder="'.esc_html__("SEARCH",'sportcenter').'"', $text);
    return $text;
}
function leaf_global_title(){
	global $page_title;
	if(is_search()){
		$page_title = esc_html__('Search Result: ','sportcenter').(isset($_GET['s'])?$_GET['s']:'');
	}elseif(is_category()){
		$page_title = single_cat_title('',false);
	}elseif(is_tag()){
		$page_title = single_tag_title('',false);
	}elseif(is_tax()){
		$page_title = single_term_title('',false);
	}elseif(is_author()){
		$page_title = esc_html__("Author: ",'sportcenter') . get_the_author();
	}elseif(is_day()){
		$page_title = esc_html__("Archives for ",'sportcenter') . date_i18n(get_option('date_format') ,strtotime(get_the_date()));
	}elseif(is_month()){
		$page_title = esc_html__("Archives for ",'sportcenter') . get_the_date('F, Y');
	}elseif(is_year()){
		$page_title = esc_html__("Archives for ",'sportcenter') . get_the_date('Y');
	}elseif(is_home()){
		if(get_option('page_for_posts')){ $page_title = get_the_title(get_option('page_for_posts'));
		}else{
			$page_title = get_bloginfo('name');
		}
	}elseif(is_404()){
		$page_title = ot_get_option('page404_title','Page Not Found');
	}else if(  function_exists ( "is_shop" ) && is_shop()){
			$page_title = woocommerce_page_title($echo = false);
    }elseif(is_post_type_archive('tribe_events')){
		if(function_exists('tribe_get_event_label_plural')){
			$page_title = tribe_get_event_label_plural();
		}else{
			$post_type = get_post_type_object('tribe_events');
			$page_title = @$post_type->labels->singular_name;
		}
	}elseif(is_post_type_archive('sp_member')){
		$page_title = leaf_get_option('member_label','Trainers');
	}elseif(is_post_type_archive()) {
		$page_title = post_type_archive_title( '', false );
	}else{
		global $post;
		if($post){$page_title = $post->post_title;}
	}
	return $page_title;
}
if(!function_exists('leaf_breadcrumbs')){
	function leaf_breadcrumbs(){
		/* === OPTIONS === */
		$text['home']     = '<i class="fa fa-home"></i>';//__('Home','sportcenter'); // text for the 'Home' link
		$text['category'] = '%s'; // text for a category page
		$text['search']   = esc_html__('Search Results for','sportcenter').' "%s"'; // text for a search results page
		$text['tag']      = esc_html__('Tag','sportcenter').' "%s"'; // text for a tag page
		$text['author']   = esc_html__('Author','sportcenter').' %s'; // text for an author page
		$text['404']      = esc_html__('404','sportcenter'); // text for the 404 page

		$show_current   = 0; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show
		$show_on_home   = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
		$show_title     = 1; // 1 - show the title for the links, 0 - don't show
		$delimiter      = ' / '; // delimiter between crumbs
		$before         = '<span class="current">'; // tag before the current crumb
		$after          = '</span>'; // tag after the current crumb
		/* === END OF OPTIONS === */

		global $post;
		$home_link    = home_url('/');
		$link_before  = '<span typeof="v:Breadcrumb">';
		$link_after   = '</span>';
		$link_attr    = ' rel="v:url" property="v:title"';
		$link         = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
		$parent_id    = $parent_id_2 = ($post) ? $post->post_parent : 0;
		$frontpage_id = get_option('page_on_front');

		if (is_front_page()) {

			if ($show_on_home == 1) echo '<div class="breadcrumbs"><a href="' . esc_url($home_link) . '">' . $text['home'] . '</a></div>';

		}elseif(is_home()){
			$title = get_option('page_for_posts')?get_the_title(get_option('page_for_posts')):esc_html__('Blog','sportcenter');
			echo '<div class="breadcrumbs"><a href="' . esc_url($home_link) . '">' . $text['home'] . '</a> / '.$title.'</div>';
		} else {

			echo '<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">';
			if ($show_home_link == 1) {
				if(function_exists ( "is_shop" ) && is_shop()){
					
				}else{
					echo '<a href="' . esc_url($home_link) . '" rel="v:url" property="v:title">' . $text['home'] . '</a>';
					if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo esc_html($delimiter);
				}
			}

			if ( is_category() ) {
				$this_cat = get_category(get_query_var('cat'), false);
				if ($this_cat->parent != 0) {
					$cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
					if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
					$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
					$cats = str_replace('</a>', '</a>' . $link_after, $cats);
					if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
					echo wp_kses_post($cats);
				}
				if ($show_current == 1) echo wp_kses_post($before . sprintf($text['category'], single_cat_title('', false)) . $after);

			} elseif ( is_search() ) {
				echo wp_kses_post($before . sprintf($text['search'], get_search_query()) . $after);

			} elseif ( is_day() ) {
				echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
				echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
				echo wp_kses_post($before . get_the_time('d') . $after);

			} elseif ( is_month() ) {
				echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
				echo wp_kses_post($before . get_the_time('F') . $after);

			} elseif ( is_year() ) {
				echo wp_kses_post($before . get_the_time('Y') . $after);

			} elseif ( is_single() && !is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					
					if( get_post_type() == 'sp_member' ){
						printf($link, $home_link . $slug['slug'] . '/', leaf_get_option('member_label','Trainers'));
					}else{
						printf($link, $home_link . $slug['slug'] . '/', $post_type->labels->singular_name);
					}
					if ($show_current == 1) echo wp_kses_post($delimiter . $before . get_the_title() . $after);
				} else {
					$cat = get_the_category(); $cat = $cat[0];
					$cats = get_category_parents($cat, TRUE, $delimiter);
					if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
					$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
					$cats = str_replace('</a>', '</a>' . $link_after, $cats);
					if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
					echo wp_kses_post($cats);
					if ($show_current == 1) echo wp_kses_post($before . get_the_title() . $after);
				}

			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
				if(function_exists ( "is_shop" ) && is_shop()){
					do_action( 'woocommerce_before_main_content' );
					do_action( 'woocommerce_after_main_content' );
				}else{
					$post_type = get_post_type_object(get_post_type());
					if( get_post_type() == 'sp_member' ){
						echo wp_kses_post($before . leaf_get_option('member_label','Trainers') . $after);
					}else{
						echo wp_kses_post($before . @$post_type->labels->singular_name . $after);
					}
				}

			} elseif ( is_attachment() ) {
				$parent = get_post($parent_id);
				$cat = get_the_category($parent->ID); $cat = isset($cat[0])?$cat[0]:'';
				if($cat){
					$cats = get_category_parents($cat, TRUE, $delimiter);
					$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
					$cats = str_replace('</a>', '</a>' . $link_after, $cats);
					if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
					echo wp_kses_post($cats);
				}
				printf($link, get_permalink($parent), $parent->post_title);
				if ($show_current == 1) echo wp_kses_post($delimiter . $before . get_the_title() . $after);

			} elseif ( is_page() && !$parent_id ) {
				if ($show_current == 1) echo wp_kses_post($before . get_the_title() . $after);

			} elseif ( is_page() && $parent_id ) {
				if ($parent_id != $frontpage_id) {
					$breadcrumbs = array();
					while ($parent_id) {
						$page = get_page($parent_id);
						if ($parent_id != $frontpage_id) {
							$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
						}
						$parent_id = $page->post_parent;
					}
					$breadcrumbs = array_reverse($breadcrumbs);
					for ($i = 0; $i < count($breadcrumbs); $i++) {
						echo wp_kses_post($breadcrumbs[$i]);
						if ($i != count($breadcrumbs)-1) echo wp_kses_post($delimiter);
					}
				}
				if ($show_current == 1) {
					if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo wp_kses_post($delimiter);
					echo wp_kses_post($before . get_the_title() . $after);
				}

			} elseif ( is_tag() ) {
				echo wp_kses_post($before . sprintf($text['tag'], single_tag_title('', false)) . $after);

			} elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata($author);
				echo wp_kses_post($before . sprintf($text['author'], $userdata->display_name) . $after);

			} elseif ( is_404() ) {
				echo wp_kses_post($before . $text['404'] . $after);
			}

			if ( get_query_var('paged') ) {
				if(function_exists ( "is_shop" ) && is_shop()){
				}else{
					if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_home() ) echo ' (';
					echo esc_html__('Page','sportcenter') . ' ' . get_query_var('paged');
					if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_home() ) echo ')';
				}
			}

			echo '</div>';

		}
	}
}

/* Display Icon Links to some social networks */
if(!function_exists('leafcolor_social_share')){
function leafcolor_social_share($id=false){
	if(!$id){ $id = get_the_ID(); }
	?>
	<?php if(leaf_get_option('share_facebook','on')!='off'){ ?>
	<li><a class="btn btn-default btn-lighter social-icon" title="<?php _e('Share on Facebook','sportcenter');?>" href="#" target="_blank" rel="nofollow" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+'<?php echo urlencode(get_permalink($id)); ?>','facebook-share-dialog','width=626,height=436');return false;"><i class="fa fa-facebook"></i></a></li>
    <?php } ?>
    <?php if(leaf_get_option('share_twitter','on')!='off'){ ?>
    <li><a class="btn btn-default btn-lighter social-icon" href="#" title="<?php _e('Share on Twitter','sportcenter');?>" rel="nofollow" target="_blank" onclick="window.open('http://twitter.com/share?text=<?php echo urlencode(get_the_title($id)); ?>&url=<?php echo urlencode(get_permalink($id)); ?>','twitter-share-dialog','width=626,height=436');return false;"><i class="fa fa-twitter"></i></a></li>
    <?php } ?>
    <?php if(leaf_get_option('share_linkedin','off')!='off'){ ?>
    <li><a class="btn btn-default btn-lighter social-icon" href="#" title="<?php _e('Share on LinkedIn','sportcenter');?>" rel="nofollow" target="_blank" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink($id)); ?>&title=<?php echo urlencode(get_the_title($id)); ?>&source=<?php echo urlencode(get_bloginfo('name')); ?>','linkedin-share-dialog','width=626,height=436');return false;"><i class="fa fa-linkedin"></i></a></li>
    <?php } ?>
    <?php if(leaf_get_option('share_tumblr','off')!='off'){ ?>
    <li><a class="btn btn-default btn-lighter social-icon" href="#" title="<?php _e('Share on Tumblr','sportcenter');?>" rel="nofollow" target="_blank" onclick="window.open('http://www.tumblr.com/share/link?url=<?php echo urlencode(get_permalink($id)); ?>&name=<?php echo urlencode(get_the_title($id)); ?>','tumblr-share-dialog','width=626,height=436');return false;"><i class="fa fa-tumblr"></i></a></li>
    <?php } ?>
    <?php if(leaf_get_option('share_google_plus','on')!='off'){ ?>
    <li><a class="btn btn-default btn-lighter social-icon" href="#" title="<?php _e('Share on Google Plus','sportcenter');?>" rel="nofollow" target="_blank" onclick="window.open('https://plus.google.com/share?url=<?php echo urlencode(get_permalink($id)); ?>','googleplus-share-dialog','width=626,height=436');return false;"><i class="fa fa-google-plus"></i></a></li>
    <?php } ?>
    <?php if(leaf_get_option('share_pinterest','off')!='off'){ ?>
    <li><a class="btn btn-default btn-lighter social-icon" href="#" title="<?php _e('Pin this','sportcenter');?>" rel="nofollow" target="_blank" onclick="window.open('//pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($id)) ?>&media=<?php echo urlencode(wp_get_attachment_url( get_post_thumbnail_id($id))); ?>&description=<?php echo urlencode(get_the_title($id)) ?>','pin-share-dialog','width=626,height=436');return false;"><i class="fa fa-pinterest"></i></a></li>
    <?php } ?>
    <?php if(leaf_get_option('share_email','on')!='off'){ ?>
    <li><a class="btn btn-default btn-lighter social-icon" href="mailto:?subject=<?php echo esc_attr(get_the_title($id)) ?>&body=<?php echo urlencode(get_permalink($id)) ?>" title="<?php _e('Email this','sportcenter');?>"><i class="fa fa-envelope"></i></a></li>
    <?php } ?>
<?php }
}

/*Default image*/
if(!function_exists('leaf_print_default_thumbnail')){
	function leaf_print_default_thumbnail($thumb = ''){
		return array(get_template_directory_uri().'/images/default_thumbnail.jpg',500,500);
	}
}

/*Hook Row Visual Composer*/
function vc_theme_before_vc_row($atts, $content = null) {
	$scheme = isset($atts['leaf_row_scheme'])?$atts['leaf_row_scheme']:0;
	ob_start(); 
	?>
		<div class="leaf_row<?php if($scheme){?> dark-div <?php } ?>">
	<?php
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;
}
function vc_theme_after_vc_row($atts, $content = null) {
	ob_start(); ?>
		</div><!--/leaf_row-->
	<?php
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;
}


add_action( 'after_setup_theme', 'leaf_extend_vc_row_param', 10, 15 );
function leaf_extend_vc_row_param(){
	$attributes = array(
		'type' => 'dropdown',
		'heading' => esc_html__("Row Schema (Theme's style)",'sportcenter'),
		'param_name' => 'leaf_row_scheme',
		'value' => array(
			esc_html__('Default', 'sportcenter') => 0,
			esc_html__('Dark', 'sportcenter') => 1,
		 ),
		'description' => esc_html__("Choose row scheme (in Dark, default text, buttons will have white color)",'sportcenter')
	);
	if(function_exists('vc_add_param')){
		vc_add_param('vc_row', $attributes);
	}
}

//image url to id
function leafcolor_get_attachment_id_from_url( $attachment_url = '' ) {
	global $wpdb;
	$attachment_id = false;
	// If there is no url, return.
	if ( '' == $attachment_url )
		return;
	// Get the upload directory paths
	$upload_dir_paths = wp_upload_dir();
	// Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
	if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
		// If this is the URL of an auto-generated thumbnail, get the URL of the original image
		$attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
		// Remove the upload path base directory from the attachment URL
		$attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );
		// Finally, run a custom database query to get the attachment ID from the modified attachment URL
		$attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
	}
	return $attachment_id;
}


function leaf_woo_related_products() {
	global $product;
	$args['posts_per_page'] = 3;
	$args['columns'] = 3;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'leaf_woo_related_products' );

function leaf_loop_columns() {
	return 3; // 3 products per row
}
add_filter('loop_shop_columns', 'leaf_loop_columns', 999);


/* Functions, Hooks, Filters and Registers in Admin */
require_once get_template_directory().'/inc/starter/functions-admin.php';

if(!function_exists('leaf_add_query_ct')) {
	add_action( 'pre_get_posts', 'leaf_add_query_ct' );
	/**
	 * add custom post type to main cat query
	 */
	function leaf_add_query_ct( $query ) {
		if ($query->is_main_query() && is_category()) {
			$query->set( 'post_type', array( 'post', 'sp_member' ) );
		}
		return $query;
	}
}