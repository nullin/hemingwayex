<?php get_header(); ?>

	<div id="primary" class="single-post">
	<div class="inside">
		<div class="primary">

	<?php if (have_posts()) : ?>

		<h1><?php _e('Search Results','hemingwayex') ?></h1>
		<?php global $request, $posts_per_page, $wpdb, $paged, $wp_query;
				$num_posts = $wp_query->found_posts; ?>
		<ul class="dates">
		 	<?php while (have_posts()) : the_post(); 
		 	?>
			<li>
				<span class="date"><?php the_time('m.d.y') ?></span>
				<a href="<?php the_permalink() ?>"><?php the_title(); ?></a> 
				 <?php _e('posted in','hemingwayex') ?> 
				<?php the_category(', ') ?>  
			</li>
			<?php $results++; ?>
			<?php endwhile; ?>
		</ul>
		
		<div class="navigation">
			<div class="left"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="right"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>
	
	<?php else : ?>

		<h1><?php _e('No posts found. Try a different search?','hemingwayex') ?></h1>

	<?php endif; ?>
		
	</div>
	
	<div class="secondary">
		<h2><?php _e('Search','hemingwayex') ?></h2>
		<div class="featured">
			<p><?php 
				printf(__('You searched %s for "','hemingwayex'), get_bloginfo());
			   echo '<b>';
            for ($i = 0; $i < count($search_terms); $i++){
                if (0 == $i) echo ' ';
                echo '<a href="index.php?s=', $search_terms[$i], '" title="search this site for: ', $search_terms[$i], '">', $search_terms[$i], '</a> ';
            }
            echo '</b>".';
			   $str = '';
				if (0 == $num_posts) $str = "were no results, better luck next time.";
				elseif (1 == $num_posts) $str = "was one result found. It must be your lucky day.";
				else $str = "were <b>" . $num_posts . "</b> results found.";
			   printf(__(' There %s','hemingwayex'), $str) ?>
			   <?php 
				if (is_search() || is_date() ||is_category()) {
                preg_match('#FROM (.*) GROUP BY#', $request, $matches);
                $fromwhere = $matches[1];
                if (0 < $num_posts) $num_posts = number_format($num_posts);
                if(empty($paged)) {
                    $paged = 1;
                }
                $start_post = ($posts_per_page * $paged) - $posts_per_page + 1;
                if (($start_post + $posts_per_page - 1) >= $num_posts) {
                    $endpost = $num_posts;
                } else {
                    $endpost = $start_post + $posts_per_page -1;
                }
                $search_terms = get_query_var('search_terms');
                if (0 != $num_posts) {
                	if ($posts_per_page!=-1) {
                  	  echo 'Showing results <b> '.$start_post. '</b> - <b>' .$endpost. '</b>.';
 	               } else {
   	                 echo 'Showing <b>'.$num_posts.'</b> results.';
      	         }
            	}
        		} 
				?>
			</p>
		</div>
	</div>
	<div class="clear"></div>
	</div>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
