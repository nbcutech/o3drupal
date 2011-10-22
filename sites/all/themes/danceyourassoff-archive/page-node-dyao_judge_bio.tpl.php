<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>

    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   

<style type="text/css">
.judges #wideLeft { background: url(<?php print $pot;?>/images/judges/judge_two_col_BG.jpg) 0 0 no-repeat;}
.judges #sub_left_col { width:260px; margin:60px 11px 0 0; float:left; display:inline; }
.judges #sub_right_col { margin:90px 11px 0 0; width:360px; float:left; display:inline;}
.judges .pageHeaderTXT { padding:15px 0 0 15px;}
.judges .qaPic {  margin:30px 0 0 60px; padding:10px 0 0 14px; width:191px; height:255px; background:url(<?php print $pot;?>/images/vertical_qa_frame.png) 0 0 no-repeat;}
.judges .bio_link {	padding: 0 0 0 65px; margin:0;}
.judges .bio_link a { font-size:14px; font-weight:bold;color:#850077;}
.judges .qaHeader {	font-size: 22px;	color:#b52567;	margin: 0 0 -10px 0;	text-transform:lowercase;}
.judges .q {font-size: 13px;color:#670b9f;margin: 25px 0 0;	font-weight:bold;display:block;}
</style>
		
<div id="container" class="judges">
    <div id="wrapper">
		<div id="wideLeft" >
			<div id="wideLeftContent">
				<div class="copy">
					
					<div id="sub_left_col">
						<div class="qaPic png"><img src="<?php print $pot;?>/images/judges/bio_indiv/<?php print $node->field_image_judge_name[0]['value'];?>.jpg"></div>
						<div class="bio_link"><a href="/meet-the-cast-dyao/host-and-judges/">back to host<br> and judges page</a></div>
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
