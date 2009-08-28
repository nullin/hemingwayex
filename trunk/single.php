<?php get_header(); ?>

	<div id="primary" class="single-post">
		<div class="inside">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="primary">
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
    <?php the_title(); ?></a></h1>
				<?php the_content('<p class="serif">'. __('Read the rest of this entry &raquo;','hemingwayex') .'</p>'); ?>
				
				<hr class="hide" />
			</div>
			<div class="secondary">
				<div class="abt-this-page"><?php _e('About this entry','hemingwayex') ?></div>
				<div class="featured">
					<p><?php _e('You&rsquo;re currently reading &ldquo;','hemingwayex'); the_title(); _e('&rdquo;, an entry on ','hemingwayex'); bloginfo('name'); ?></p>
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
		<div class="inside">
			
			<?php if ('open' == $post-> comment_status) {
				// Comments are open ?>
				<div class="comment-head">
					<div class="num-comments"><?php comments_number('No comments','1 Comment','% Comments'); ?></div>
					<span class="details"><a href="#comment-form"><?php _e('Jump to comment form','hemingwayex') ?></a> | <?php comments_rss_link('comments rss'); ?> <a href="#what-is-comment-rss" class="help">[?]</a> <?php if ('open' == $post->ping_status): ?>| <a href="<?php trackback_url(true); ?>"><?php _e('trackback uri','hemingwayex') ?></a> <a href="#what-is-trackback" class="help">[?]</a><?php endif; ?></span>
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
