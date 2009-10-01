<?php get_header(); ?>

	<div id="primary">
	<div class="inside">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	
				<?php wp_link_pages('before=<p><strong>'. __('Pages:','hemingwayex') .'</strong>&after=</p>&next_or_number=number'); ?>
	<?php edit_post_link(__('Edit this entry.','hemingwayex'), '<p>', '</p>'); ?>
	</div>
	</div>
	<hr class="hide" />
<?php global $hemingwayEx_options;
	if ($hemingwayEx_options['page_comments'] == 1) { ?>
	<div id="secondary">
		<div class="inside">
			
			<?php $open_comments = ('open' == $post-> comment_status);
				$num_comments = get_comments_number($post-> id);	
				if ($open_comments || (!$open_comments && $num_comments > 0)) {
				// Comments are open ?>
				<div class="comment-head">
					<div class="num-comments"><?php comments_number('No comments','1 Comment','% Comments'); ?></div>
					<span class="details"><?php if($open_comments) { ?><a href="#comment-form"><?php _e('Jump to comment form','hemingwayex') ?></a><?php } else { ?>Comments are closed<?php }?> | <?php comments_rss_link('comments rss'); ?> <a href="#what-is-comment-rss" class="help">[?]</a> <?php if ('open' == $post->ping_status): ?>| <a href="<?php trackback_url(true); ?>"><?php _e('trackback uri','hemingwayex') ?></a> <a href="#what-is-trackback" class="help">[?]</a><?php endif; ?></span>
				</div>
			
                        <?php if (function_exists('backlinks')) backlinks(); ?>			
					
				<?php comments_template(); ?>
			<?php } }?>
			
			<?php endwhile; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.','hemingwayex') ?></p>
			<?php endif; ?>
		</div>
	</div> 
<?php get_sidebar(); ?>

<?php get_footer(); ?>
