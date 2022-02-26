<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 */
?>
		<div id="bottom-sidebar">
            <div class="container">
                <div class="row normal-sidebar">
                    <?php
                    if ( is_active_sidebar( 'bottom_sidebar' ) ) :
                        dynamic_sidebar( 'bottom_sidebar' );
                    endif;
                    ?>
                </div>
            </div>
        </div>
        <footer class="dark-div main-color-2-bg">
        	<div class="footer-inner">
        	<section id="footer-sidebar">
            	<div class="section-inner">
                	<div class="container">
                    	<div class="row normal-sidebar">
							<?php
                            if ( is_active_sidebar( 'footer_sidebar' ) ) :
                                dynamic_sidebar( 'footer_sidebar' );
                            endif;
                            ?>
                		</div>
                    </div>
                </div>
            </section>
            <div id="bottom-nav">
                <div class="container">
                	<?php if(leaf_get_option('footer_logo')!=' '){?>
                    <div class="text-center footer-logo-wrap">
                        <?php if(leaf_get_option('footer_logo') == ''):?>
                        <a class="footer-logo main-color-1-bg" href="#top"><img src="<?php echo get_template_directory_uri() ?>/images/web-logo-footer.png" alt="Logo"></a>
                        <?php else:?>
                        <a class="footer-logo main-color-1-bg" href="#top" title="<?php esc_attr_e('Go to top','sportcenter'); ?>"><img src="<?php echo esc_url(leaf_get_option('footer_logo')); ?>" alt="Logo"/></a>
                        <?php endif;?>
                    </div>
                    <?php }?>
                    <div class="footer-content text-center">
                        <div class="footer-social">
                        	<?php 
							$social_account = array(
								'facebook',
								'twitter',
								'linkedin',
								'tumblr',
								'google-plus',
								'pinterest',
								'youtube',
								'flickr',
							);
							?>
                            <ul class="list-inline social-list">
                            	<?php 
								$social_link_open = ot_get_option('social_link_open','on');
								foreach($social_account as $social){
									if($link = ot_get_option('acc_'.$social,false)){ ?>
                                            <li><a href="<?php echo esc_url($link) ?>" <?php if($social_link_open=='on'){?>target="_blank" <?php }?> class="btn btn-lighter social-icon"><i class="fa fa-<?php echo esc_attr($social) ?>"></i></a></li>
								<?php }
								}//foreach
								if($custom_acc = ot_get_option('custom_acc')){
									foreach($custom_acc as $a_social){ ?>
										<li><a href="<?php echo esc_url($a_social['link']) ?>" <?php if($social_link_open=='on'){?>target="_blank" <?php }?> class="btn btn-lighter social-icon"><i class="fa <?php echo esc_attr($a_social['icon']) ?>"></i></a></li>
									<?php }
								}
								?>
                            </ul>
                        </div>
                        <div class="copyright">
							<?php echo wp_kses_post( leaf_get_option('copyright', esc_html__('Sport Center WordPress Theme by Leafcolor &copy;','sportcenter')) );?>
                        </div>
                    </div><!--/footer-content-->
                </div><!--/container-->
            </div>
            </div>
        </footer><!--/footer-inner-->
        </div><!--wrap-->
    </div><!--/body-wrap-->
    <div class="mobile-menu-wrap dark-div <?php if(leaf_get_option('nav_style',false)){?> <?php }else{?> visible-xs <?php }?>">
        <a href="#" class="mobile-menu-toggle"><i class="fa fa-times"></i></a>
        <ul class="mobile-menu">
            <?php
				if(has_nav_menu( 'off-canvas-menus' )){
					  wp_nav_menu(array(
						  'theme_location'  => 'off-canvas-menus',
						  'container' => false,
						  'items_wrap' => '%3$s',
					  ));
				}elseif(has_nav_menu( 'primary-menus' )){
                    wp_nav_menu(array(
                        'theme_location'  => 'primary-menus',
                        'container' => false,
                        'items_wrap' => '%3$s',
                    ));	
                }else{?>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home','sportcenter') ?></a></li>
                    <?php wp_list_pages('depth=1&number=4&title_li=' ); ?>
            <?php } ?>
            <?php if(ot_get_option('enable_search')!='off'){ ?>
            <li><a href="#" class="search-toggle"><i class="fa fa-search"></i></a></li>
            <?php } ?>
        </ul>
    </div>
	<?php if(ot_get_option('enable_search')!='off'){ ?>
    <div id="off-canvas-search" class="dark-div">
    	<div class="search-inner">
        <div class="container">
            <form action="<?php echo esc_url(home_url('/')) ?>">
                <input type="text" name="s" id="s" class="form-control search-field font-2" placeholder="<?php esc_attr_e('TYPE AND HIT ENTER...','sportcenter') ?>" autocomplete="off">
                <a href="#" class="search-toggle"><i class="fa fa-times"></i></a>
            </form>
        </div>
        </div>
    </div>
	<?php } //if search ?>

<?php wp_footer(); ?>
</body>
</html>
