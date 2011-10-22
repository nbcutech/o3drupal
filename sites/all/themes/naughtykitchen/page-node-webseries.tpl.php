<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   

<style type="text/css">
#micrositeMenu #navWebseries a {
  background:transparent url(/sites/all/themes/naughtykitchen/images/menu-shop-webseries.gif) repeat scroll -3px -27px;
  width:138px;
}

#micrositeMenu #navWebseries a:hover {
  background-position: -3px -54px;

}

#micrositeMenu.webseries #navWebseries a, #micrositeMenu.webseries #navWebseries a:visited, #micrositeMenu.webseries #navWebseries a:active, #micrositeMenu.webseries #navWebseries a:hover {
	background-position: -3px -81px;
}



.webseries #wrapper {
 background: url(/sites/all/themes/naughtykitchen/images/webseries/webseries-three_col_BG.jpg) 0 0 no-repeat #FFFFFF;
}
 
.webseries .sectionHeader {
 font-size:22px;
 color:#b52567;
 margin: 0 0 15px 0;
}
 
.webseries .copy {
 margin: 218px 0 15px 72px;
 padding: 0 0 10px 0;
 font-size:13px;
 color:#FFFFFF;
}
 
.webseries #wideLeft {
 width:651px;
 display:inline;
 margin: 0;
 background:none;
}
 
.webseries #wideLeftContent {
  position:relative;
 min-height:800px;
 height:auto !important;
   height:800px;
   width: 600px;
   float:left;
}
 
.webseries div#right {
 margin: 285px 25px 0 0;
 }

.webseries .episode_header {
	margin:19px 0 3px 0;
}
 
.webseries .episode_wrap {
	width: 540px;
}
.webseries .episode {
	width: 118px;
	height: 110px;
	margin: 16px 14px 0 0;
	float:left;
	display:inline;
}
.webseries .episode_video {
	height: 77px;
}
.webseries .episode_video img {
	border: 1px solid #797979;
}

.webseries .episode_title {
	margin-top: 4px;
	vertical-align:top;
	color:#393b3c;
	font-size:12px;
}
</style>
	
	
<div id="container" class="webseries">
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
