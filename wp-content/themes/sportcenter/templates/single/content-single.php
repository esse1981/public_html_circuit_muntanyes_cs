<div class="single-post-content-text">
	<?php 
	if(get_post_format()=='video' || get_post_format()=='audio'){
		$content =  preg_replace ('#<embed(.*?)>(.*)#is', ' ', get_the_content());
		$content =  preg_replace ('@<iframe[^>]*?>.*?</iframe>@siu', ' ', $content);
		preg_match_all('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', $content, $match);
		foreach ($match[0] as $amatch) {
			if(strpos($amatch,'youtube.com') !== false || strpos($amatch,'vimeo.com') !== false || strpos($amatch,'soundcloud.com') !== false){
				$content = str_replace($amatch, '', $content);
			}
		}
		echo wp_kses_post($content = preg_replace('%<object.+?</object>%is', '', $content));
	}else{ the_content(); }?>
</div>
<?php
$pagiarg = array(
	'before'           => '<div class="single-post-pagi">'.__( 'Pages:','sportcenter'),
	'after'            => '</div>',
	'link_before'      => '<span type="button" class="btn btn-default">',
	'link_after'       => '</span>',
	'next_or_number'   => 'number',
	'separator'        => ' ',
	'nextpagelink'     => esc_html__( 'Next page','sportcenter'),
	'previouspagelink' => esc_html__( 'Previous page','sportcenter'),
	'pagelink'         => '%',
	'echo'             => 1
);
wp_link_pages($pagiarg); ?>
<div class="clearfix"></div>
<div class="item-meta single-post-meta content-pad">
	<div class="single-post-meta-inner">
    <?php if(ot_get_option('single_published_date')!='off'){ ?>
    <div class="media">
        <div class="pull-left"><i class="fa fa-calendar"></i></div>
        <div class="media-body">
            <?php _e('Published','sportcenter') ?>
            <div class="media-heading"><?php the_time(get_option('date_format')); ?></div>
        </div>
    </div>
    <?php }?>
    <?php if(ot_get_option('single_categories')!='off'){ ?>
    <div class="media">
        <div class="pull-left"><i class="fa fa-bookmark"></i></div>
        <div class="media-body">
            <?php _e('Categories','sportcenter') ?>
            <div class="media-heading"><?php the_category(' <span class="dot">.</span> '); ?></div>
        </div>
    </div>
    <?php }?>
    <?php if(ot_get_option('single_tags')!='off' && has_tag()){ ?>
    <div class="media">
        <div class="pull-left"><i class="fa fa-tags"></i></div>
        <div class="media-body">
            <?php _e('Tags','sportcenter') ?>
            <div class="media-heading"><?php the_tags('', ', ', ''); ?></div>
        </div>
    </div>
    <?php }?>
    <?php if(ot_get_option('single_cm_count')!='off'){ ?>
    <?php if(comments_open()){ ?>
    <div class="media">
        <div class="pull-left"><i class="fa fa-comment"></i></div>
        <div class="media-body">
            <?php _e('Comment','sportcenter') ?>
            <div class="media-heading"><a href="#comment"><?php comments_number(__('0 Comments','sportcenter'),__('1 Comment','sportcenter')); ?></a></div>
        </div>
    </div>
	<?php } //check comment open?>
    <?php }?>
    </div><!--/inner-->
    <div class="inner-gradient"></div>
</div>

<ul class="list-inline social-light single-post-share">
	<?php leafcolor_social_share(); ?>
</ul>