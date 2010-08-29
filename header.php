<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<title><?php wp_title("&bull;",true,"right"); ?> <?php if ( is_single() ) { ?> Blog Archive &bull; <?php } ?><?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/admin/css/superfish.css" type="text/css" media="screen" />
<?php
	global $hemingwayEx, $hemingwayEx_options;
	if ($hemingwayEx->style != 'none') :
?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/styles/<?php echo $hemingwayEx->style ?>" type="text/css" media="screen" />
<?php endif; ?>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_enqueue_script('prototype'); ?>
<?php wp_enqueue_script('effects', get_option('siteurl') . '/wp-includes/js/scriptaculous/' . 'effects.js'); ?>
<?php wp_enqueue_script('slider', get_bloginfo('template_directory') . '/admin/js/slide.js'); ?>
<?php wp_enqueue_script('textsize', get_bloginfo('template_directory') . '/admin/js/textsize.js'); ?>
<?php wp_enqueue_script('superfish', get_bloginfo('template_directory') . '/admin/js/superfish.js', array('jquery')); ?>

<?php wp_head(); ?>

<script language="javascript" type="text/javascript"> 
   $j = jQuery.noConflict();
   $j(document).ready(function() { 
      $j('ul.sf-menu').superfish(); 
   });
</script>

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
         <?php hemingwayEx_nav() ?>
         <?php if ($hemingwayEx_options['slidebar_enabled'] == 1){ ?>
            <div id="silderButtonNav">
               <a id="openSlidebar" href="#" onclick="openNav();return false;" title="<?php _e('Open Navigation','hemingwayex') ?>"><?php _e('Open Navigation','hemingwayex') ?></a>
               <a id="closeSlidebar" href="#" onclick="closeNav();return false;" title="<?php _e('Close Navigation','hemingwayex') ?>" style="display:none;"><?php _e('Close Navigation','hemingwayex') ?></a>
            </div>
         <?php } ?>
      </div>
   </div>
	<!-- [END] #menu -->

	<?php include (TEMPLATEPATH . '/dynamic_slidebar.php'); ?>
