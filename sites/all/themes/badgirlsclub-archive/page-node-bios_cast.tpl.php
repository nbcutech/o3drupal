<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   

<div id="container" class="bios_cast">
    <div id="wrapper">
		<div id="wideLeft" >
			<div id="wideLeftContent">
				<div class="copy">
					<!-- START CONTENT -->
					<div class="bio_pic"><img src="<?php print $pot;?>/images/bios/300x267/<?php print $node->field_cast_name[0]['value'];?>
_o.jpg" width="300" height="267" /></div>	
					<div class="bio_header"><img src="<?php print $pot;?>/images/bios/289x68/meet_<?php print $node->field_cast_name[0]['value'];?>
.jpg" width="289" height="68" /></div>				
					<?php print $node->body; ?>
					<!-- END CONTENT -->
				</div>
				<div style="clear:both;"></div>
			</div>
			<div id="wideLeftFooter"><img src="<?php print $pot;?>/images/twoColFooter.gif"></div>
		</div>
		
	    <div id="right"><?php print $right; ?>
	    </div>
    </div>
    <div style="clear:both;"></div>
</div>
<div class="png">
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
