<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$layout = get_post_meta(get_option('woocommerce_shop_page_id'),'page_sidebar_layout',true);
if($layout==''){
	$layout = ot_get_option('woocommerce_layout','right');
}
get_header();
?>
	<?php get_template_part( 'templates/header/header', 'heading' );?>
    <div id="body">
    	<div class="container">
        	<div class="content-pad-4x">
                <div class="row">
                    <div id="content" class="<?php if($layout != 'full'){ ?> col-md-9 <?php }else{?> col-md-12 <?php } if($layout == 'left'){ ?> revert-layout <?php }?>" role="main">
                    
                    	<?php do_action( 'woocommerce_archive_description' ); ?>
                        <?php if(class_exists('WCV_Vendor_Shop')){ WCV_Vendor_Shop::shop_description(); }?>
                        
                        <article class="single-page-content">
                        	<?php if ( have_posts() ) : ?>
								<?php do_action( 'woocommerce_before_shop_loop' ); ?>
                                <?php woocommerce_product_loop_start(); ?>
                                
                                    <?php woocommerce_product_subcategories(); ?>
                    
                                    <?php while ( have_posts() ) : the_post(); ?>
                                        <?php wc_get_template_part( 'content', 'product' ); ?>
                                    <?php endwhile; // end of the loop. ?>
                    
                                <?php woocommerce_product_loop_end(); ?>
                                <?php do_action( 'woocommerce_after_shop_loop' ); ?>
                    
                            <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
                                <?php wc_get_template( 'loop/no-products-found.php' ); ?>
                            <?php endif; ?>
                            
                        </article>
                    </div><!--/content-->
                    <?php if($layout != 'full'){do_action( 'woocommerce_sidebar' );} ?>
                </div><!--/row-->
            </div><!--/content-pad-4x-->
        </div><!--/container-->
    </div><!--/body-->
<?php get_footer(); ?>