<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   

<div id="container" class="obsessed">
    <div id="wrapper">
	<div class="png" style="width:651px;height:20px;"><img src="<?php print $pot;?>/images/obsessed/2colMainContentHeader.png"></div>
		<div id="wideLeft" >
			
			<div id="wideLeftContent">
						
			<span style="display:none;"><h2>THE THINGS WE LOVE</h2><h1>OBSESSED</h1></span>
				<div class="copy" style="margin:120px 30px 20px 30px;">
					<div style="font-size:17px;font-weight:bold;"><h2>All Obsessed Articles</h2></div>
					
					<?php print $content; ?>
					
				</div>
				<div style="clear:both;"></div>
			</div>
			<div id="wideLeftFooter" style="background: url(<?php print $pot;?>/images/2col_mainContentFooter.png) 0 0 no-repeat;">&nbsp;</div>
		</div>
		
	    <div id="right"><?php print $right; ?>
	    </div>
    </div>
    <div style="clear:both;"></div>
</div>

<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
