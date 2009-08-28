<?php 
	global $hemingwayEx, $hemingwayEx_options; 
	if ($hemingwayEx_options['slidebar_enabled'] == 1){
?>
<div id="slidebar" style="display:none;">
	<hr class="hide" />
	<div class="ancillary">
		<div class="inside">
			<ul class="sidebar first">
				<?php include (TEMPLATEPATH . '/sidebars/slidebar_left.php'); ?>
			</ul>
			<ul class="sidebar">
				<?php include (TEMPLATEPATH . '/sidebars/slidebar_center.php'); ?>
			</ul>
			<ul class="sidebar">
				<?php include (TEMPLATEPATH . '/sidebars/slidebar_right.php'); ?>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
</div>
<?php } ?>
<!-- [END] #ancillary -->	