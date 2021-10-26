<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package test
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>




<div id="comments" class="comments-area">
    <?php
    // You can start editing here -- including this comment!
    if (have_comments()) :
        ?>

        <h4>
            <?php comments_number(__('пока нет комментариев'), __('1 комментарий'), __('% комментариев')); ?>
        </h4><!-- .comments-title -->

        <?php the_comments_navigation(); ?>

        <?php
        wp_list_comments(
            array(
                'walker' => new Time_Walker_Comment(),
                'max_depth' => 2,
                'style' => 'div',
                'callback' => null,
                'end-callback' => null,
                'type' => 'all',
                'reply_text' => __('ответить'),
                'page' => '',
                'per_page' => '',
                'avatar_size' => null,
                'reverse_top_level' => null,
                'reverse_children' => '',
                'format' => 'html5', // или xhtml, если HTML5 не поддерживается темой
                'short_ping' => false,    // С версии 3.6,
                'echo' => true,     // true или false
            )
        );
        ?>


        <?php
        the_comments_navigation();

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (!comments_open()) :
            ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'test'); ?></p>
        <?php
        endif;

    endif; // Check for have_comments().
 ?>
</div>
    <div class="comment-form">
        <?php
        $defaults = [
            'fields' => [
                'author' => '
	      <div class="col-sm-6">
           <div class="form-group">
			<input id="author" name="author" 
			 class="form-control"
		     placeholder="' . __('Name') . '"
		     required
			 type="text"
			 value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . $html_req . ' />
	       </div>
          </div>',

                'email' => '
		 <div class="col-sm-6">
           <div class="form-group">
			<input id="email"
			 name="email" ' . ($html5 ? 'type="email"' : 'type="text"') . ' 
			 value="' . esc_attr($commenter['comment_author_email']) . '" 
			  required
			  class="form-control"
			  placeholder="' . __('Email') . '"
			 size="30" 
			 aria-describedby="email-notes"' . $aria_req . $html_req . ' />
	       </div>
         </div>',

                'url' => '
            <div class="col-12">
         <div class="form-group">
			<input id="url" 
			class="form-control"
			placeholder="' . __('Website') . '"
			name="url" ' . ($html5 ? 'type="url"' : 'type="text"') . '
			value="' . esc_attr($commenter['comment_author_url']) . '" 
			size="30" />
		    </div>
          </div>
         </div> 
            ',

                'cookies' => '',
            ],
            'comment_field' => '
     <div class="row">
     <div class="col-12">
      <div class="form-group">
		<textarea id="comment" name="comment" cols="30" rows="9" class="form-control w-100"  aria-required="true" placeholder="' . _x('Comment', 'noun') . '" required="required"></textarea>
	    </div>
	</div>
	',
            'must_log_in' => '<p class="must-log-in">' .
                sprintf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url(apply_filters('the_permalink', get_permalink($post_id)))) . '
	    </p>',
            'logged_in_as' => '<p class="logged-in-as">' .
                sprintf(__('<a href="%1$s" aria-label="Logged in as %2$s. Edit your profile.">Logged in as %2$s</a>. <a href="%3$s">Log out?</a>'), get_edit_user_link(), $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink($post_id)))) . '
	 </p>',
            'comment_notes_before' => '<p class="comment-notes">
		<span id="email-notes">' . __('Your email address will not be published.') . '</span>' .
                ($req ? $required_text : '') . '
	</p>',
            'comment_notes_after' => '',
            'id_form' => 'commentForm',
            'id_submit' => 'submit',
            'class_form' => 'form-contact comment_form',
            'class_submit' => 'button button-contactForm btn_1 boxed-btn',
            'name_submit' => 'submit',
            'title_reply' => __('Leave a Reply'),
            'title_reply_to' => __('Leave a Reply to %s'),
            'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',
            'title_reply_after' => '</h4>',
            'cancel_reply_before' => ' <small>',
            'cancel_reply_after' => '</small>',
            'cancel_reply_link' => __('Cancel reply'),
            'label_submit' => __('Post Comment'),
            'submit_button' => '<button type="submit" id="%2$s" class="%3$s">%4$s</button>',
            'submit_field' => '%1$s %2$s',
            'format' => 'html5',
        ];
        comment_form($defaults);?>
   </div>

