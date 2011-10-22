<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
<style type="text/css">
#micrositeMenu.dyao_recipes #navFitness a, #micrositeMenu.dyao_recipes #navFitness a:visited, #micrositeMenu.dyao_recipes #navFitness a:active, #micrositeMenu.dyao_recipes #navFitness a:hover {background-position: 0px -81px;}
 .dyao_recipes .copy {
	 margin: 60px 30px 0px 35px;
	 padding: 0 0 100px 0;
}

.recipe_title {
color:#670B9F;
font-size:22px;
margin: 15px 0 0 0;
}

</style>
<div id="container" class="NSDiet">
    <div id="wrapper">
		<div id="wideLeft" >
			<div style="height:30px;position:relative;z-index:1;">
				<img style="position:absolute;" src="/sites/all/themes/danceyourassoff/images/fitness/recipes_landing_two_col_BG.png" class="png">
			</div>
			<div id="wideLeftRepeater" style="background: url(/sites/all/themes/danceyourassoff/images/blogs/BGrepeater.jpg) repeat-y;">
				<div class="copy" style="position:relative;z-index:10;">
					<?php print $content; ?>
                    
                    <div style="margin-top:15px;"><a href="/dyao/fit_club/recipes-landing"><img src="/sites/all/themes/danceyourassoff/images/fitness/back_to_recipe_button.gif" style="clear:both;" border="0"/></a></div>
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
