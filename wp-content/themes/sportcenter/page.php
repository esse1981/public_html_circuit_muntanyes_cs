<?php
$layout = leaf_get_option('page_sidebar_layout','right');
get_header();
?>
	<?php if(!is_page_template('page-templates/front-page.php')){
		get_template_part( 'templates/header/header', 'heading' );
	}?>
    <div id="body">
    	<div class="container">
        	<?php if(!is_page_template('page-templates/front-page.php')){ ?>
        	<div class="content-pad-4x">
			<?php } ?>
                <div class="row">
                    <div id="content" class="<?php if($layout != 'full'){ ?> col-md-9 <?php }else{?> col-md-12 <?php } if($layout == 'left'){ ?> revert-layout <?php }?>" role="main">
                        <article class="single-page-content">
                        	<?php while ( have_posts() ) : the_post();
								the_content();
							endwhile;
							
							if(!is_page_template('page-templates/front-page.php')){
								echo '<div class="page-comment">';
									comments_template();
								echo '</div>';
							}
							
							wp_reset_query();
							?>
                        </article>
                    </div><!--/content-->
                    <?php if($layout != 'full' && $layout != 'true-full'){get_sidebar();} ?>
                </div><!--/row-->
            <?php if(!is_page_template('page-templates/front-page.php')){ ?>
            </div><!--/content-pad-4x-->
			<?php }?>
        </div><!--/container-->
    </div><!--/body-->
<?php get_footer(); ?>