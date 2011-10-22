<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   

<div id="container" class="recaps">
    <div id="wrapper">
		<div id="wideLeft" >
			<div id="wideLeftContent">
				<div class="copy" >
					<div class="recapTitle"><?php print $title;?></div>
					<?php print $content; ?>
				</div>
				<div class="recapSubMenu" >
					<?php print nodequeue_node_titles(4, '', FALSE); ?>
					<img src="<?php print $pot;?>/images/recap_subnav_footer.png">
					<div style="clear: both;"></div>
				</div>
			</div>
			<div style="clear:both;"></div>
			<div id="wideLeftFooter"><img src="<?php print $pot;?>/images/twoColFooter.jpg"></div>
		</div>
		
	    <div id="right"><?php print $right; ?>
	    </div>
    </div>
    <div style="clear:both;"></div>
</div>
<div class="png"><img src="<?php print $pot;?>/images/bottom_spacer.png" style="clear:both;"/>
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
