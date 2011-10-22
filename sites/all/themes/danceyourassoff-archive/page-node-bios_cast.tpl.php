<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   

<div id="container" class="bios_cast">
    <div id="wrapper">
	<div id="two_col_wrapper">
		<div id="sub_left_col">
			<div class="pageHeaderTXT"><img class="png" src="<?php print $pot;?>/images/bio_<?php print $node->field_cast_name[0]['value'];?>_TXT_header.png"></div>
			<div class="bioPic png"><img src="<?php print $pot;?>/images/<?php print $node->field_cast_name[0]['value'];?>_bioPic.jpg"></div>
			<?php print $content; ?>
			<?php print $middle; ?>
		</div>
		<div id="sub_right_col">
			<?php print $left; ?>
		</div>
		<div id="two_col_footer"><img src="<?php print $pot;?>/images/twoColFooter.jpg"></div>
		<div style="clear:both;"></div>
	</div>
	<div id="right"><?php print $right; ?></div>

    </div>
    <div style="clear:both;"></div>
</div>
<div class="png"><img src="<?php print $pot;?>/images/bottom_spacer.png" style="clear:both;"/>
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
