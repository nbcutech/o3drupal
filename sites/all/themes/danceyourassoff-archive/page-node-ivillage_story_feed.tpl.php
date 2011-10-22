<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   

<div id="container" class="NSDiet">
    <div id="wrapper">
		<div id="wideLeft" >
			<div style="height:30px;position:relative;z-index:1;">
				<img style="position:absolute;" src="/sites/all/themes/danceyourassoff/images/fitness/NSD_stories_landing_two_col_BG.png" class="png" usemap="#NSD_Map">
				<map name="NSD_Map">
					<area shape="rect" alt="" coords="420,15,613,69" href="http://www.neversaydiet.com/" target="_blank">
				</map>
			</div>
			<div id="wideLeftRepeater" style="background: url(/sites/all/themes/danceyourassoff/images/blogs/BGrepeater.jpg) repeat-y;">
				<div class="copy" style="position:relative;z-index:10;">
				        <div class="fit_club_title"><?php print $title; ?></div>
				        <div class="fit_club_byline">By <?php print $node->field_author[0]['value'] . " | " . date("n/j/Y",$node->created); ?></div>
				
					<?php print $content;?>
					<div style="margin-top:15px;"><a href="/dyao/fit_club/all-success-stories"><img src="/sites/all/themes/danceyourassoff/images/fitness/back_to_story_button.gif" style="clear:both;" border="0"/></a></div>
				</div>
				<div style="clear:both;"></div>
			</div>
			
			<div id="wideLeftFooter"><img src="<?php print $pot;?>/images/twoColFooter.jpg"></div>
		</div>
		
	    <div id="right"><?php print $right; ?>
	    </div>
    </div>
    <div style="clear:both;"></div>
</div>
<div class="png"><img src="<?php print $pot;?>/images/bottom_spacer.png" style="clear:both;"/>
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
