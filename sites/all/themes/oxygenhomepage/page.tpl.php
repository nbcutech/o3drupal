<?php //require_once $_SERVER["DOCUMENT_ROOT"] . "/sites/all/themes/oxygenhomepage/header.inc"; ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/sites/all/themes/oxygen/global_head.inc"; ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
<style type="text/css">
/*#contentHeader {
width: 672px;
height: 75px;
background: url(/<?php print $directory; ?>/images/obsessed/main2ColBG.png) 0px 0px no-repeat;
display: block;	
}*/
#topCap {
  display: none;	
}
#wideLeftContent {
  position:relative;
 min-height:830px;
 height:auto !important;
   height:830px;
}
</style>
<!-- Begin stylesheets
<link rel="stylesheet" href="http://www.oxygen.com/common/css/common.css" type="text/css" />
<link rel="stylesheet" href="http://www.oxygen.com/common/css/header.css" type="text/css" /> 
<link rel="stylesheet" href="http://www.oxygen.com/homepage.css" type="text/css" />
<link rel="stylesheet" href="http://www.oxygen.com/common/css/footer.css" type="text/css" />
<link rel="stylesheet" href="http://www.oxygen.com/common/css/shell.css" type="text/css" />
End stylesheets -->

<!--[if IE]>
        <link rel="stylesheet" type="text/css" href="/sites/all/themes/oxygenhomepage/css/ie.css" />
<![endif]-->

<!--[if IE 7]>
        <link rel="stylesheet" type="text/css" href="/sites/all/themes/oxygenhomepage/css/ie7.css" />
<![endif]-->

<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="http://www.oxygen.com/homepage_IE6.css" />
<![endif]-->

<!-- Begin javascripts
<script src="http://www.oxygen.com/js/util.js" type="text/javascript"></script>
-->
<script src="http://www.oxygen.com/js/objects/jquery.js" type="text/javascript"></script>
<script src="http://www.oxygen.com/js/objects/jquery.cycle.all.js" type="text/javascript"></script>
<!--
<script type="text/javascript" src="http://www.oxygen.com/js/objects/jScrollPane.js"></script>	
<script src="http://www.oxygen.com/js/objects/oxygen_embed_player.js" type="text/javascript"></script>
<script src="http://www.oxygen.com/temp/oxygenlive/jquery.modal.js" type="text/javascript"></script>
-->


<!-- <link rel="stylesheet" href="http://www.oxygen.com/temp/oxygenlive/modal.css" type="text/css" /> -->
		
		
<!-- added 6/12 prior to The Glee Project premiere -->

<script src="http://core.insightexpressai.com/adServer/adServerESI.aspx?bannerID=179219"></script>
 
<script src="http://core.insightexpressai.com/adServer/adServerESI.aspx?bannerID=179219"></script>
 
<script src="http://core.insightexpressai.com/adServer/adServerESI.aspx?bannerID=179269"></script>


<div id="container">
    <div id="wrapper">
		<div id="wideLeft" >
			<img id="topCap" class="png" src="<?php print $pot;?>/images/content_header.png" border="0" />
			
<?php
$curr_uri = check_plain(request_uri());
if (preg_match("/\/blogs\/outloud/i", $curr_uri) == 1 || preg_match("/\/outloud\/blog\//i", $curr_uri) == 1 ) {
	print '<a id="contentHeader" href="http://features.oxygen.com/blogs/outloud"></a>'; 
  } else {
  	print '<div id="contentHeader" class="png"></div>';
  };
?>
			<div id="wideLeftContent">
						
				<div class="copy">
				
					<?php print $content; ?>
					
					<div style="clear:both;"></div>
					</div>
				<div style="clear:both;"></div>
			</div>
			<img class="png" src="<?php print $pot;?>/images/content_footer.png" border="0"/>
		</div>
			

	    <div id="right"><?php print $right; ?>
	    </div>
    </div>
    <div style="clear:both;"></div>
</div>

<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/sites/all/themes/oxygenhomepage/footer.inc"; ?>



