<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				
				<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','hemingwayex') ?><p>
				
				<?php
				return;
            }
        }

?>

<!-- You can start editing here. -->
<?php global $hemingwayEx, $hemingwayEx_options; ?>

<?php if ($comments) : ?>
	
	<?php /* Seperate comments and pings */
		$asc_comments = $hemingwayEx_options['asc_comments'];
		
		if ($asc_comments != 1) {
			$comments = array_reverse($comments);
		}
	?>
	
	<ol id="comments">

	<?php $asc_comments != 1 ? $counter = sizeof($comments) : $counter = 1; 
			foreach ($comments as $comment) : ?>
		<li id="comment-<?php comment_ID() ?>">
			<cite <?php if ( 'comment' != get_comment_type() ) echo 'class="pingback"' ?>>
				<span class="author">
					<?php comment_author_link(); 
							if (function_exists("get_avatar") && 'comment' == get_comment_type()) {
								echo " " . get_avatar( $comment, '40');
							} ?>
				</span>
				<span class="date">
					<?php comment_date($hemingwayEx->date_format() . '.y') ?> / <?php comment_date('ga') ?>
				</span>
			</cite>
			<div <?php if ($comment->comment_author_email == get_the_author_email()) { ?> class="mycontent"<?php } else { ?> class="content" <?php } ?>>
				<div class="counter"><?php echo $counter; $asc_comments != 1 ? $counter-- : $counter++; ?></div>
				<div class="commentbody">
					<?php if ($comment->comment_approved == '0') : ?>
						<em><?php _e('Your comment is awaiting moderation.','hemingwayex') ?></em>
					<?php endif; ?>
					<?php comment_text() ?>
				</div>
			</div>
			<div class="clear"></div>
		</li>
	<?php endforeach; /* end for each comment */ ?>
		
	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post->comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->
		
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed.','hemingwayex') ?></p>
		
	<?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

		<div id="comment-form">
				<div class="formhead"><?php _e('Have your say','hemingwayex') ?></div>
				<p><small><strong>XHTML:</strong> <?php _e('You can use these tags: ','hemingwayex'); echo allowed_tags(); ?></small></p>
				<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
				<p><?php printf(__('You must be %s to post a comment.','hemingwayex'),'<a href="'. get_option('siteurl') .'/wp-login.php?redirect_to='. the_permalink() .'">logged in</a>'); ?></p>
				<?php else : ?>
				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
				<?php if ( $user_ID ) : ?>
				<p><?php printf(__('Logged in as %s.','hemingwayex'),'<a href="'. get_option('siteurl') .'/wp-admin/profile.php">'. $user_identity .'</a>. <a href="'. get_option('siteurl') .'/wp-login.php?action=logout" title="'. __('Log out of this account','hemingwayex') .'">Logout &raquo;</a>') ?></p>
				<?php else : ?>
				
				<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" class="textfield" tabindex="1" /><label class="text"><?php _e('Name','hemingwayex'); if ($req) echo " (required)"; ?></label><br />
				<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" class="textfield" tabindex="2" /><label class="text"><?php _e('Email','hemingwayex');  if ($req) echo " (required)"; ?></label><br />
				<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" class="textfield" tabindex="3" /><label class="text"><?php _e('Website','hemingwayex'); ?></label><br />
				
				<?php endif; ?>
				
				<textarea name="comment" id="comment" class="commentbox" tabindex="4" rows="6" cols="50"></textarea>
				<div class="formactions">
					<span style="visibility:hidden"><?php _e('Safari hates me','hemingwayex') ?></span>
					<input type="submit" name="submit" tabindex="5" class="submit" value="Add comment" />
				</div>
				<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
				<?php do_action('comment_form', $post->ID); ?>
				</form>
			</div>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
