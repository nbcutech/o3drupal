<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
<style type="text/css">
#micrositeHeader img{visibility: hidden;}
</style>

<div id="container" class="mommywood">
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
<script type="text/javascript">
	alert("done");
	$("#micrositeHeader img").attr("src", "/sites/all/themes/torianddean/images/header.jpg");
	$("#micrositeHeader img").css("visibility", "visible");
</script>