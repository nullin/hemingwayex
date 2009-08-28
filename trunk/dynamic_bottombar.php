<?php 
	global $hemingwayEx, $hemingwayEx_options; 
	if ($hemingwayEx_options['bottombar_enabled'] == 1){
?>
<hr class="hide" />
	<div class="ancillary">
		<div class="inside">
			<ul class="sidebar first">
				<?php include (TEMPLATEPATH . '/sidebars/bottombar_left.php'); ?>
			</ul>
			<ul class="sidebar">
				<?php include (TEMPLATEPATH . '/sidebars/bottombar_center.php'); ?>
			</ul>
			<ul class="sidebar">
				<?php include (TEMPLATEPATH . '/sidebars/bottombar_right.php'); ?>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
	<?php } ?>
	<!-- [END] #ancillary -->	