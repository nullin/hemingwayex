<?php get_header(); ?>
	<div id="primary" class="twocol-stories">
		<div class="inside">
			<?php
				// Here is the call to only make two posts show up on the homepage REGARDLESS of your options in the control panel
				//query_posts('showposts=2');
				$temp = $wp_query;
				$wp_query= null;
				$wp_query = new WP_Query();
				$wp_query->query('showposts=2'.'&paged='.$paged);
			?>
			<?php if ($wp_query->have_posts()) : ?>
				<?php $first = true; ?>
				<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
					<div class="story<?php if($first == true) echo " first" ?>">
						<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s','hemingwayex'),the_title()); ?>"><?php the_title(); ?></a></h3>
						<?php if ($hemingwayEx_options['excerpt_enabled'] == 1){ ?>
									<?php $hemingwayEx->excerpt() ?><span class="read-on"><a href="<?php the_permalink() ?>"><?php _e('read on','hemingwayex') ?></a></span>
						<?php } else { 
								the_content('<p class="serif">'. __('Read the rest of this entry &raquo;','hemingwayex') .'</p>');  
							} ?>
						<div class="details">
							<?php _e('Posted at','hemingwayex') ?> <?php the_time('ga \o\n ' . $hemingwayEx->date_format(true) . '/y') ?> | <?php comments_popup_link(__('No Comments &#187;', 'hemingwayex'), __('1 Comment &#187;', 'hemingwayex'), __ngettext('% comment', '% comments', get_comments_number (), 'hemingwayex')); ?> | <?php _e('Filed Under: ','hemingwayex'); the_category(', ') ?>
							<?php if ($hemingwayEx_options['excerpt_enabled'] == 0) { ?>
								<br /><?php _e('Tags','hemingwayex') ?>: <?php the_tags('', ', '); ?>
							<?php } ?>	
						</div>
					</div>
					<?php $first = false; ?>
				<?php endwhile; ?>
			<?php if ($hemingwayEx_options['paging_enabled'] == 1) : ?>
					<div class="clear"></div>
					<div id="paging">
					  <?php previous_posts_link(' &nbsp;&laquo; ') ?>
					  <?php echo '&nbsp;' ?>
					  <?php next_posts_link(' &nbsp;Next &raquo;&nbsp; ') ?>
					</div>
	 		<?php	endif; $wp_query = null; $wp_query = $temp; ?>
		</div>
			<?php else : ?>
				<h2 class="center"><?php _e('Not Found','hemingwayex')?></h2>
				<p class="center"><?php _e("Sorry, but you are looking for something that isn't here.",'hemingwayex') ?></p>
				<?php include (TEMPLATEPATH . "/searchform.php"); ?>
			<?php endif; ?>
			<div class="clear"></div>
	</div>
	<!-- [END] #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
