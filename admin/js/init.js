   $j = jQuery.noConflict();
   $j(document).ready(function() {
      //init superfish
      $j('ul.sf-menu').superfish();
      //init slidebar
      $j("#closeSlidebar").click(function() {
	    $j("#slidebar").slideToggle("slow");
	    $j("#closeSlidebar").fadeOut("slow");
	    $j("#openSlidebar").fadeIn("slow");
	  });
	  $j("#openSlidebar").click(function() {
	    $j("#slidebar").slideToggle("slow");
	    $j("#closeSlidebar").fadeIn("slow");
	    $j("#openSlidebar").fadeOut("slow");
	  });
	  //init font resizer
	  $j("#upSize").click(function() {
	    changeFontSize(1);
	  });
	  $j("#downSize").click(function() {
	    changeFontSize(-1);
	  });
	  $j("#resetSize").click(function() {
	    resetFontSize();
	  });
	  //
	  setFontResizerUserOpts();
   });
   $j(window).unload(function() {
      saveFontResizerSettings();
   });