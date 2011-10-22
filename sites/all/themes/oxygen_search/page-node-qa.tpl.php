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
					<div class="pageHeaderTXT"><img class="png" src="<?php print $pot;?>/images/bios/qa_TXT_header/<?php print $node->field_image_qa_name[0]['value'];?>_qa_header.png" width="300" height="50"></div>
					<div id="sub_left_col">
						<div class="qaPic png"><img src="<?php print $pot;?>/images/bios/166x235/<?php print $node->field_image_qa_name[0]['value'];?>_166x235.jpg"></div>
						<div class="biosCastLink"><a href="/meet-the-cast-atb/<?php print $node->field_image_qa_name[0]['value'];?>"> &#9664; back to bio page</a></div>
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
