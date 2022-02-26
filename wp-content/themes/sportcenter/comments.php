<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to twentytwelve_comment() which is
 * located in the functions.php file.
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
if (!comments_open())
	return;
?>

<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
    <div class="ia-heading">
    	<h2 class="h3 font-2"><?php echo comments_number('');?></h2>
        <div class="clearfix"></div>
    </div>
		<ul class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'leafcolor_comment', 'style' => 'ul' ) ); ?>
		</ul><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav class="comment-nav-below row" role="navigation">
			<div class="nav-previous col-xs-6"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'sportcenter' ) ); ?></div>
			<div class="nav-next col-xs-6 text-right"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'sportcenter' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>
	<?php endif; // have_comments() ?>
    
    
    <div class="comment-form">
    <div class="ia-heading">
    	<h2 class="h3 font-2"><?php esc_html_e('Leave a comment','sportcenter'); ?></h2>
        <div class="clearfix"></div>
    </div>

	<?php comment_form_leaf_custom(array('logged_in_as'=>'','comment_notes_before'=>'',
		'comment_field'=>'<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required placeholder="'.esc_html__('Your comment...','sportcenter').'"></textarea></p>',
		'title_reply'=>'',
		'id_submit'=>'comment-submit'));
	?>
    </div>
    <div class="hidden" style="display:none"><?php comment_form(); ?></div>

</div><!-- #comments .comments-area -->