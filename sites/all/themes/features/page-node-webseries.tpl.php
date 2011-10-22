<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
<style type="text/css">
	#micrositeMenu #navWebSeries a, #micrositeMenu #navWebSeries a:visited, #micrositeMenu #navWebSeries a:active, #micrositeMenu #navWebSeries a:hover {
		background-position: -434px -87px;
	}
.addicted_gary #wrapper {
 background: url(/sites/all/themes/addictedtobeauty/images/webseries/addicted_gary-three_col_BG.png) 0 0 no-repeat #FFFFFF;
}
 
.addicted_gary .sectionHeader {
 font-size:22px;
 color:#b52567;
 margin: 0 0 15px 0;
}
 
.addicted_gary .copy {
 width:300px;
 height:500px;
 margin: 190px 0 15px 119px;
 padding: 0 0 10px 0;
 font-size:13px;
 color:#393b3c;
}
 
.addicted_gary #wideLeft {
 width:651px;
 display:inline;
 margin: 0;
 background:none;
}
 
.addicted_gary #wideLeftContent {
  position:relative;
 min-height:800px;
 height:auto !important;
   height:800px;
   width: 600px;
   float:left;
}
 
.addicted_gary div#right {
 margin: 157px 10px 0 0;
 }

.addicted_gary .episode_header {
	margin:19px 0 3px 0;
}
 
.addicted_gary .episode_wrap {
	width: 525px;
}
.addicted_gary .episode {
	width: 118px;
	height: 110px;
	margin: 16px 14px 0 0;
	float:left;
	display:inline;
}
.addicted_gary .episode_video {
	height: 77px;
}
.addicted_gary .episode_title {
	margin-top: 4px;
	vertical-align:top;
	color:#393b3c;
	font-size:12px;
}

</style>
<div id="container" class="addicted_gary">
    <div id="wrapper">
		<div id="wideLeftContent">
				<div class="copy">
					<?php print $content; ?>
				</div>
			<div style="clear:both;"></div>
		</div>
		
	    <div id="right"><?php print $right; ?></div>
    </div>
    <div style="clear:both;"></div>
</div>
<div class="png"><img src="<?php print $pot;?>/images/bottom_spacer.png" style="clear:both;"/>
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
