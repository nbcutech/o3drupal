<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   

<style type="text/css">
		.extras #wideLeft {
		 background: url(/sites/all/themes/danceyourassoff/images/extras_two_col_BG.png) 0 0 no-repeat;
		}
		 
		.extras .copy {
		 width:565px;
		 margin: 117px 0 0 80px;
		 min-height:600px;
		 height:auto !important;
		 height:600px;
		}

		.extras .promo_header {
			font-weight:bold; 
			color:#C22369;
		}
		
		.promo_copy {
			left: 185px;
		}
	.promo_section {
		height:115px;
		position:relative;
		width:450px;
margin: 0 0 15px 0;
	}
	.promo_header {
		color:#189ecd;
		font-size: 18px;
	}
	a.extrasLandingLink {
background:#5b4591 url(/sites/all/themes/danceyourassoff/images/buttonArrow.png) no-repeat scroll right center;
color:#FFFFFF;
display:block;
margin:8px 0 6px;
padding:4px 4px 4px 14px;
text-align:left;
width:150px;
height:15px;
}
</style>
	
<div id="container" class="extras">
    <div id="wrapper">
		<div id="wideLeft" >
			<div id="wideLeftContent">
				<div class="copy">
					<?php print $content; ?>
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
