<hr class="hide" />
	<div id="footer">
		<div class="inside">
			<?php
				// You are not required to keep this link back to NULL.in, but if you wouldn't mind, leaving it in would make my day.
			?>
			<p class="copyright"><?php printf(__('Powered by %s flavored %s','hemingwayex'), '<a href="http://nullin.com/hemingwayex">HemingwayEx</a>', '<a href="http://wordpress.org">Wordpress</a>.') ?></p>
			<p class="attributes"><a href="feed:<?php bloginfo('rss2_url'); ?>"><?php _e('Entries','hemingwayex') ?> RSS</a> <a href="feed:<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comments','hemingwayex') ?> RSS</a><?php wp_register('',''); ?> <a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional"><?php _e('Valid','hemingwayex') ?> <abbr title="eXtensible HyperText Markup Language">XHTML</abbr> 1.0</a></p>
		</div>
	</div>
	<!-- [END] #footer -->	
	<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
	<?php wp_footer(); ?>
</body>
</html>
