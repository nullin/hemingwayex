<?php get_header(); ?>

	<div id="primary" class="single-post">
		<div class="inside">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="primary">
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
    <?php the_title(); ?></a></h1>

				<?php if ($hemingwayEx_options['reddit_button'] == 1): ?>
				    <div style="float:left; margin: 10px;">
					<script type='text/javascript'>reddit_url='<?php the_permalink(); ?>'; reddit_title='<?php wp_title(''); ?>'; reddit_bgcolor = "0c0c0c";</script>
					<script type="text/javascript" src="http://www.reddit.com/button.js?t=3"></script>
				    </div>
				<?php endif; ?>
					
				<?php the_content('<p class="serif">'. __('Read the rest of this entry &raquo;','hemingwayex') .'</p>'); ?>

                                <?php if (function_exists('emo_vote_display')): ?> 
                                   <p><div style="text-align:center"><strong><small>No time for a comment? Simply click on one of the colours below to let me know how you found this post.</small></strong></div></p>
                                   <?php emo_vote_display('', '', ''); ?>
				<?php endif; ?>

				<?php if (function_exists('similar_posts')): ?>
                                   <?php similar_posts('limit=3&prefix=<div class="similar">Other similar posts you might like: &output_template={link}&divider= | &suffix=</div>') ?>
				<?php endif; ?>
				
				<hr class="hide" />
			</div>
			<div class="secondary snap_noshots">
				<div class="abt-this-page"><?php _e('About this entry','hemingwayex') ?></div>
				<div class="featured">
					<?php if ($post->post_excerpt) the_excerpt(); else { ?>
                                           <p><?php _e('You&rsquo;re currently reading an entry written by ','hemingwayex'); the_author(); ?></p>
				        <?php } ?>
					<dl>
						<dt><?php _e('Published','hemingwayex') ?>:</dt>
						<dd><?php the_time( $hemingwayEx->date_format() . '.y' ) ?> / <?php the_time('ga') ?></dd>
					</dl>
					<dl>
						<dt><?php _e('Category','hemingwayex') ?>:</dt>
						<dd><?php the_category(', ') ?></dd>
					</dl>
					<dl>
						<dt><?php _e('Tags','hemingwayex') ?>:</dt>
						<dd><?php the_tags('', ', '); ?></dd>
					</dl>
					<?php if (function_exists('wp_related_posts')) {  ?>
						<dl>
							<?php wp_related_posts(); ?>
						</dl>
					 <?php } ?>
                                        <?php if (function_exists('the_postrank')): ?>
					<dl>
						<dt>Postrank:</dt>
						<dd><a href="http://www.postrank.com/feed/300313ec66539a0b46a85526e8349e43"><span style="color:#<?php the_postrank_color(); ?>;"><?php the_postrank(); ?></span></a></dd>
					</dl>
                                        <?php endif; ?>

                                        <?php if (function_exists('mtw_wordcount')): ?>
					<dl>
						<dt>Word count:</dt>
						<dd><?php echo mtw_wordcount(); ?></dd>
					</dl>
                                        <?php endif; ?>
					<?php if ($hemingwayEx_options['post_navigation'] == 1) { ?>
						<dl>
							<dt><?php _e('Post Navigation','hemingwayex') ?>:<br /></dt>
							<dd><?php previous_post_link(); ?><br /><?php next_post_link(); ?></dd>
						</dl>
					<?php } ?>
					<?php edit_post_link(__('Edit this entry.','hemingwayex'), '<dl><dt>' . __('Edit','hemingwayex') .':</dt><dd> ', '</dd></dl>'); ?>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<!-- [END] #primary -->
	
	<hr class="hide" />
	<div id="secondary">
		<div class="inside snap_noshots">
			
			<?php if ('open' == $post-> comment_status) {
				// Comments are open ?>
				<div class="comment-head">
				   <?php if (function_exists('id_activate_hooks')) { // If Intense Debate Comments are not active remove the comment count?>
					<span class="details"><a href="#respond">Jump to comment form</a><!-- | <?php comments_rss_link('comments rss'); ?> --> <?php if ('open' == $post->ping_status): ?>| <a href="<?php trackback_url(true); ?>">trackback uri</a><?php endif; ?></span>
		                   <?php } else {  // If Intense Debate Comments are not active go to normal ?>	
					<div class="num-comments"><?php comments_number('No comments','1 Comment','% Comments'); ?></div>
					<span class="details"><a href="#comment-form"><?php _e('Jump to comment form','hemingwayex') ?></a> | <?php comments_rss_link('comments rss'); ?> <a href="#what-is-comment-rss" class="help">[?]</a> <?php if ('open' == $post->ping_status): ?>| <a href="<?php trackback_url(true); ?>"><?php _e('trackback uri','hemingwayex') ?></a> <a href="#what-is-trackback" class="help">[?]</a><?php endif; ?></span>
		                   <?php } ?>	
				</div>
			<?php } elseif ('open' != $post-> comment_status) {
				// Neither Comments, nor Pings are open ?>
				<div class="comment-head">
					<h2><?php _e('Comments are closed','hemingwayex') ?></h2>
					<span class="details"><?php _e('Comments are currently closed on this entry.','hemingwayex') ?></span>
				</div>	
			<?php } ?>
			
			<?php comments_template(); ?>
			
			<?php endwhile; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.', 'hemingwayex') ?></p>
			<?php endif; ?>
		</div>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
