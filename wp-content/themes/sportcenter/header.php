<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-156121179-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-156121179-1');
        </script>

        
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0">
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        
        <?php wp_head(); ?>
    </head>

    <body <?php body_class() ?>>
    	<a id="top"></a>
    	<?php if(ot_get_option('pre-loading',2)==1||(ot_get_option('pre-loading',2)==2&&(is_front_page()||is_page_template('page-templates/front-page.php')))){ ?>
            <div id="pageloader" class="dark-div" style="position:fixed; top:0; left:0; width:100%; height:100%; z-index:99999; background:<?php echo esc_attr(ot_get_option('loading_bg','#111')) ?>;">
                <div class="loader loader-2"><i></i><i></i><i></i><i></i></div>
            </div>
    	<?php }
    
        $page_title = leaf_global_title();
    ?>
    <div id="body-wrap">
        <div id="wrap">
            <header>
                <?php
                $content_head = get_post_meta(get_the_ID(),'header_content',true);
                if(function_exists('is_shop') && is_shop()){
                    $content_head ='';
                    $id_ot = get_option('woocommerce_shop_page_id');
                    if($id_ot!=''){
                        $content_head = get_post_meta($id_ot,'header_content',true);
                    }
                }
                if( is_home()){
                    $content_head ='';
                    $id_ot = get_option('page_for_posts');
                    if($id_ot!=''){
                        $content_head = get_post_meta($id_ot,'header_content',true);
                    }
                }
                get_template_part( 'templates/header/header', 'navigation' );
                if($content_head !=''){
                   get_template_part( 'templates/header/header', 'frontpage' );
                }
                ?>
            </header>