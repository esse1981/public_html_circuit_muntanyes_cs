<?php
$page_title = leaf_global_title();
if (function_exists('tribe_is_community_my_events_page') && tribe_is_community_my_events_page() ) {
	$page_title = esc_html__('My Events','sportcenter');
}
if (function_exists('tribe_is_community_edit_event_page') && tribe_is_community_edit_event_page() ) {
	$page_title = esc_html__('Submit Event','sportcenter');
}
if($page_title == esc_html__('WP Router Placeholder Page', 'wp-router')){
	$page_title = esc_html__('Submit Event','sportcenter');
}
$ct_hd = get_post_meta(get_the_ID(),'header_content',true);
if(function_exists('is_shop') && is_shop()){
	$ct_hd ='';
	$id_ot = get_option('woocommerce_shop_page_id');
	if($id_ot!=''){
		$ct_hd = get_post_meta($id_ot,'header_content',true);
	}
}
if( is_home()){
	$ct_hd ='';
	$id_ot = get_option('page_for_posts');
	if($id_ot!=''){
		$ct_hd = get_post_meta($id_ot,'header_content',true);
	}
}
if(!is_page_template('page-templates/front-page.php') && $ct_hd==''){
$heading_bg = leaf_get_option('heading_bg');
if($heading_bg){ ?>
<style scoped="scoped">
.page-heading{
	background-image:url(<?php echo esc_url($heading_bg['background-image']) ?>);
	background-color:<?php echo esc_attr($heading_bg['background-color']) ?>;
	background-position:<?php echo esc_attr($heading_bg['background-position']) ?>;
	background-repeat:<?php echo esc_attr($heading_bg['background-repeat']) ?>;
	background-size:<?php echo esc_attr($heading_bg['background-size']) ?>;
	background-attachment:<?php echo esc_attr($heading_bg['background-attachment']) ?>;
}
</style>
<?php } //if heading_bg
if(is_singular('tribe_events')){
	global $wp_query;
	global $post;
	$post = $wp_query->post;
	?>
    <div class="page-heading event-heading main-color-1-bg dark-div">
        <div class="container">
        	<?php if(leaf_get_option('event_show_top_category','on')!='off'){
				echo get_the_term_list( get_the_ID(), 'tribe_events_cat', '<div class="heading-event-cats"><i class="fa fa-folder-open-o"></i> ', ', ', '</div>' );
			}?>
            
        	<h1 class="main-color-1"><?php the_title(); ?></h1>
            
            <?php if(leaf_get_option('event_show_top_info','on')!='off'){ ?>
            <div class="heading-event-meta hidden-xs">
            	<div class="heading-meta-col">
                	<div class="heading-event-meta-title h2 main-color-1-border"><i class="fa fa-clock-o"></i> <?php esc_html_e('Time','sportcenter'); ?></div>
                    <div class="heading-event-meta-content">
                    	<?php echo tribe_events_event_schedule_details( get_the_ID(), '', '' ); ?>
                    </div>
                </div>
                
                <?php if ( tribe_address_exists() ) : ?>
                <div class="heading-meta-col">
                	<div class="heading-event-meta-title h2"><i class="fa fa-map-marker"></i> <?php esc_html_e('Venue','sportcenter'); ?></div>
                    <div class="heading-event-meta-content">
                    	<dd><?php echo tribe_get_venue() ?></dd>
                        <dd>
                            <address>
                                <?php echo tribe_get_full_address(); ?>
                                <?php if ( tribe_show_google_map_link() ) : ?>
                                    <div><?php echo tribe_get_map_link_html(); ?></div>
                                <?php endif; ?>
                            </address>
                        </dd>
                        
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( tribe_get_cost() ) : ?>
                <div class="heading-meta-col">
                	<div class="heading-event-meta-title h2"><i class="fa fa-ticket"></i> <?php esc_html_e('Ticket','sportcenter'); ?></div>
                    <div class="heading-event-meta-content">
                    	<span class="tribe-events-cost">
							<?php echo tribe_get_cost( null, true ) ?>
                            <?php if(get_post_meta(get_the_ID(),'product-id',true)){ ?>
                            <div><a href="#event-cart"><?php esc_html_e('Get it now','sportcenter'); ?> <i class="fa fa-angle-right"></i></a></div><?php }?>
                        </span>
                    </div>
                </div>
                <?php endif; ?>
                
            </div><!--/heading-event-meta-->
            <?php }//if show info ?>
        </div><!--/container-->
    </div><!--/page-heading-->
    <?php
    $heading_bg = get_post_meta(get_the_ID(),'app-banner',true);
    $darkness = get_post_meta(get_the_ID(),'banner-darkness',true);
    if( $heading_bg || $darkness ){ ?>
        <style scoped="scoped">
        <?php if($heading_bg){ ?>
        .page-heading{
            background-image:url(<?php echo esc_url($heading_bg) ?>);
            background-position: center center;
            background-size: cover;
            background-attachment: fixed;
        }
        <?php }
        if($darkness){ ?>
        .page-heading:before{
            background:rgba(0,0,0,<?php echo esc_attr($darkness/100); ?>);
        }
        <?php } ?>
        </style>
    <?php } //if bg
	

}elseif(is_singular('sp_member')){ ?>
<div class="page-heading main-color-1-bg dark-div">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8">
            	<?php if(has_post_thumbnail()){
					echo '<div class="member-heading-thumb">';
					the_post_thumbnail( 'thumbnail' );
					echo '</div>';
				}?>
                <div class="member-heading-info">
                    <div class="small-meta"><?php echo esc_attr(get_post_meta( get_the_ID(),'position', true ));?></div>
                    <h1><?php echo esc_attr($page_title) ?></h1>
                    <?php $social_account = array(
							'facebook',
							'instagram',
							'envelope-o',
							'twitter',
							'linkedin',
							'tumblr',
							'google-plus',
							'pinterest',
							'youtube',
							'flickr',
							'github',
							'dribbble',
							'rss',
							'stumbleupon',
							'vk',
					);?>
					<ul class="list-inline">
						<?php 
						foreach($social_account as $social){
							if($link = get_post_meta(get_the_ID(),$social,true)){
								if($social!='envelope-o'){?>
									<li><a href="<?php echo esc_url($link);?>"><i class="fa fa-<?php echo esc_attr($social);?>"></i></a></li>
								<?php }else{ ?>
									<li><a href="mailto:<?php echo esc_url($link);?>"><i class="fa fa-<?php echo esc_attr($social);?>"></i></a></li>
								<?php } ?>
							<?php }?>
						<?php }?>    
					</ul>
                </div>
            </div>
            <?php if(is_active_sidebar('pathway_sidebar')){
                    echo '<div class="pathway pathway-sidebar col-md-4 col-sm-4 hidden-xs text-right">';
                        dynamic_sidebar('pathway_sidebar');
                    echo '</div>';
                }else{?>
            <div class="pathway col-md-4 col-sm-4 hidden-xs text-right">
                <?php if(function_exists('leaf_breadcrumbs')){ leaf_breadcrumbs(); } ?>
            </div>
            <?php } ?>
        </div><!--/row-->
    </div><!--/container-->
</div><!--/page-heading-->


<?php }else{ ?>
<div class="page-heading main-color-1-bg dark-div">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <h1><?php echo esc_attr($page_title) ?></h1>
            </div>
            <?php if(is_active_sidebar('pathway_sidebar')){
                    echo '<div class="pathway pathway-sidebar col-md-4 col-sm-4 hidden-xs text-right">';
                        dynamic_sidebar('pathway_sidebar');
                    echo '</div>';
                }else{?>
            <div class="pathway col-md-4 col-sm-4 hidden-xs text-right">
                <?php if(function_exists('leaf_breadcrumbs')){ leaf_breadcrumbs(); } ?>
            </div>
            <?php } ?>
        </div><!--/row-->
    </div><!--/container-->
</div><!--/page-heading-->
<?php 
}//else product
}//if not front page ?>

<div class="top-sidebar">
    <div class="container">
        <div class="row">
            <?php
                if ( is_active_sidebar( 'top_sidebar' ) ) :
                    dynamic_sidebar( 'top_sidebar' );
                endif;
             ?>
        </div><!--/row-->
    </div><!--/container-->
</div><!--/Top sidebar-->