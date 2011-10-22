<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
<style type="text/css">
#contentHeader {
width: 672px;
height: 75px;
background: url(/<?php print $directory; ?>/images/obsessed/main2ColBG.png) 0px 0px no-repeat;
display: block;	
}
#topCap {
  display: none;	
}
#wideLeftContent {
  position:relative;
 min-height:830px;
 height:auto !important;
   height:830px;
}
#edit-submitted-e-mail-address {
	width: 200px;	
}
</style>
<div id="container">
    <div id="wrapper">
		<div id="wideLeft" >
			<img id="topCap" class="png" src="<?php print $pot;?>/images/content_header.png" border="0" />
			<div id="contentHeader" class="png"></div>
			<div id="wideLeftContent">
						
				<div class="copy">
				<img src="http://features.oxygen.com/sites/all/themes/hairbattlespectacular/images/hbs_logo.jpg" border="0" style="float: left;" />
<div style="float: left; width: 300px; padding-top: 50px; margin-left: 5px;">
					<?php print $content; ?>
					

</div>

					
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

<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>

