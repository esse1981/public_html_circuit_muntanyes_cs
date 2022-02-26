<?php
$layout = leaf_get_option('post_sidebar_layout','right');
get_header();
?>
	<?php get_template_part( 'templates/header/header', 'heading' ); ?>   
    <div id="body">
    	<div class="container">
        	<div class="content-pad-4x">
                <div class="row">
                    <div id="content" class="<?php if($layout!='full'){ ?> col-md-9 <?php }else{ ?> col-md-12 <?php } if($layout == 'left'){ ?> revert-layout <?php }?>" role="main">
                        <article class="single-post-content single-content">
                        	<?php
							// The Loop
							while ( have_posts() ) : the_post();
								get_template_part('templates/single/content','featured-image');
								get_template_part('templates/single/content','single');
							endwhile;
							?>
                        </article>
                        <?php if(ot_get_option('enable_author')!='off' && get_the_author_meta('description')){ ?>
                        <div class="about-author">
							<div class="author-avatar">
								<?php 
								if(isset($__check_retina)&&$__check_retina){
										echo get_avatar( get_the_author_meta('email'), 100); 
								}else{
										echo get_avatar( get_the_author_meta('email'), 100); 
								}?>
							</div>
							<div class="author-info">
								<h4 class="font-2"><?php the_author_posts_link(); ?></h4>
								<?php the_author_meta('description'); ?>
							</div>
							<div class="clearfix"></div>
						</div><!--/about-author-->
                        <?php }?>
                        
                        
                        <?php if(ot_get_option('single_navi')!='off'){ ?>
                        <div class="sc-single-event-nav single-post-navigation-new">
                            <div class="row">
                                <?php 
                                if($p = get_adjacent_post(true, '', true)){ ?>
                                <div class="col-sm-6">
                                    <a class="post-nav-item dark-div" href="<?php echo get_permalink($p->ID); ?>">
                                        <?php if(has_post_thumbnail($p->ID)){
                                            $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($p->ID),'sportcenter_thumb_500x500', true);
                                        }else{
                                            $thumbnail = leaf_print_default_thumbnail();
                                        }?>
                                        <img src="<?php echo esc_url($thumbnail[0]) ?>">
                                        <div class="post-nav-item-content">
                                            <div class="small"><i class="fa fa-angle-left"></i> <?php esc_html_e('Previous','sportcenter'); ?></div>
                                            <h4 class="font-2"><?php echo get_the_title($p->ID); ?></h4>
                                        </div>
                                    </a>
                                </div>
                                <?php }else{//if prev
                                    //sc_print_nav_blog('prev');
                                }
                                
                                if($n = get_adjacent_post(true, '', false)){ ?>
                                <div class="col-sm-6 col-nav-next">
                                    <a class="post-nav-item dark-div" href="<?php echo get_permalink($n->ID); ?>">
                                        <?php if(has_post_thumbnail($n->ID)){
                                            $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($n->ID),'sportcenter_thumb_500x500', true);
                                        }else{
                                            $thumbnail = leaf_print_default_thumbnail();
                                        }?>
                                        <img src="<?php echo esc_url($thumbnail[0]) ?>">
                                        <div class="post-nav-item-content">
                                            <div class="small"><?php esc_html_e('Next','sportcenter'); ?> <i class="fa fa-angle-right"></i></div>
                                            <h4 class="font-2"><?php echo get_the_title($n->ID); ?></h4>
                                        </div>
                                    </a>
                                </div>
                                <?php }else{//if next
                                    //sc_print_nav_blog('next');
                                }?>
                            </div>
                        </div><!--/single-nav-->
                        <?php }?>
                        <?php comments_template( '', true ); ?>
                    </div><!--/content-->
                    <?php if($layout != 'full'){get_sidebar();} ?>
                </div><!--/row-->
            </div><!--/content-pad-4x-->
        </div><!--/container-->
    </div><!--/body-->
<?php get_footer(); ?>