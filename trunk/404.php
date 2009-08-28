<?php get_header(); ?>

<div id="primary" class="single-post">
	<div class="inside">
		<div class="primary">
			<h1><?php _e('Page not found','hemingwayex') ?></h1>
			<p><?php _e("It looks like there's a problem with the page you're trying to get to. If you're looking for something in particular, try using the search form below, or by browsing the archives.",'hemingwayex') ?></p>
			
			<h2><?php _e('Search this site:','hemingwayex') ?></h2>
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			
			<h2><?php _e('Archives by month:','hemingwayex') ?></h2>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
	
			<h2><?php _e('Archives by subject:','hemingwayex') ?></h2>
			<ul>
				 <?php wp_list_categories(); ?>
			</ul>
		</div>
		<div class="secondary">
			<h2><?php _e('Why am I seeing this?','hemingwayex') ?></h2>
			<p><?php _e("You requested a page that doesn't exist on this site any more. This could be caused by a link you followed that was out of date, by a typing in the wrong address in the address bar, or simply because the post has been deleted.",'hemingwayex') ?></p>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
