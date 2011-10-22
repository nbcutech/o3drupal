<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>

    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
	
<div id="container" class="qa">
    <div id="wrapper">
		<div id="wideLeft" >
			<div id="wideLeftContent">

				<div class="copy">
					<div class="pageHeaderTXT"><img src="<?php print $pot;?>/images/bios/meet_<?php print $node->field_cast_name[0]['value'];?>
.jpg" width="289" height="28" /></div>
					<div id="sub_left_col">
						<div class="qaPic png"><img src="<?php print $pot;?>/images/bios/photo_<?php print $node->field_image_qa_name[0]['value'];?>.jpg"></div>
						<div class="biosCastLink"><a href="/meet-the-cast-jersey-couture/<?php print $node->field_image_qa_name[0]['value'];?>-bio"> &#9664; back to bio page</a></div>
					</div>
					<div id="sub_right_col">
						<?php print $content; ?>
					</div>

				</div>
				<div style="clear:both;"></div>
			</div>
			
			<div id="wideLeftFooter"></div>
		</div>
		
	    <div id="right"><?php print $right; ?>
	    </div>
    </div>
    <div style="clear:both;"></div>
</div>
<div class="png"><img src="<?php print $pot;?>/images/bottom_spacer.png" style="clear:both;"/>
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
