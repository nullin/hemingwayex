<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title("&bull;",true,"right"); ?> <?php if ( is_single() ) { ?> Blog Archive &bull; <?php } ?><?php bloginfo('name'); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<?php
	global $hemingwayEx, $hemingwayEx_options;
	if ($hemingwayEx->style != 'none') :
?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/styles/<?php echo $hemingwayEx->style ?>" type="text/css" media="screen" />

<?php endif; ?>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php $hem_js_loc = get_option('siteurl') . '/wp-content/themes/' . get_template() . '/admin/js/';
		$wp_js_loc  = get_option('siteurl') . '/wp-includes/js/scriptaculous/';?>

<script type="text/javascript" src="<?php echo $wp_js_loc; ?>prototype.js"></script>
<script type="text/javascript" src="<?php echo $wp_js_loc; ?>effects.js"></script>
<script type="text/javascript" src="<?php echo $hem_js_loc; ?>slide.js"></script>
<script type="text/javascript" src="<?php echo $hem_js_loc; ?>textsize.js"></script>

<?php wp_head(); ?>
</head>
<body>
	<div id="header">
		<div class="inside">
			<div id="utilities">
				<div id="search">
					<form method="get" id="sform" action="<?php bloginfo('home'); ?>/">
	 					<div class="searchimg"></div>
						<input type="text" id="q" value="<?php echo wp_specialchars($s, 1); ?>" name="s" size="15" />
					</form>
				</div>
				<?php if ($hemingwayEx_options['font_resizer'] == 1) { ?>
					<div id="textsize">
						<?php _e('Font:','hemingwayex') ?> 
							<a href="#" title="<?php _e('Increase size','hemingwayex') ?>" onclick="changeFontSize(1);return false;">A+</a>&nbsp;&nbsp;
							<a href="#" title="<?php _e('Decrease size','hemingwayex') ?>" onclick="changeFontSize(-1);return false;">A-</a>&nbsp;&nbsp;
							<a href="#" title="<?php _e('Revert styles to default','hemingwayex') ?>" onclick="resetFontSize(); return false;">A</a>
					</div>
				<?php } ?>
			</div>
			<h2><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h2>
			<p class="description"><?php bloginfo('description'); ?></p>
		</div>
	</div>
	<!-- [END] #header -->
	
	<div id="navigation">
		<div class="inside">
			<ul class="left" id="suckerfish">
				<li <?php if(is_home()) { echo 'class="current_page_item"';} ?>><a href="<?php bloginfo('siteurl'); ?>"><?php _e('Home','hemingwayex') ?></a></li>
				<?php wp_list_pages('title_li=&depth=3'); ?>
			</ul>
			<?php if ($hemingwayEx_options['slidebar_enabled'] == 1){ ?>
				<div class="right" id="silderButton">
					<a class="silderButtonNav" id="openSlidebar" href="#" onclick="openNav();return false;" title="<?php _e('Open Navigation','hemingwayex') ?>"><?php _e('Open Navigation','hemingwayex') ?></a> 
					<a class="silderButtonNav" id="closeSlidebar" href="#" onclick="closeNav();return false;" title="<?php _e('Close Navigation','hemingwayex') ?>" style="display:none;"><?php _e('Close navigation','hemingwayex') ?></a>
				</div>
			<?php } ?>
		</div>
	</div>
	<!-- [END] #menu -->
	
	<div class="clear" >&nbsp;</div>
	<?php include (TEMPLATEPATH . '/dynamic_slidebar.php'); ?>
