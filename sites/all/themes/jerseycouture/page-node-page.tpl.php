<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
<div id="container" class="fluff-me-add">
    <div id="wrapper">
		<div id="wideLeft" >
			<div id="wideLeftContent">
			<a href="/Fluff-Me-Community/"><img alt="" src="/<?php print $directory; ?>/images/fluff_me_banner.jpg" /></a>
				<div class="copy">
					<?php print $content; ?>
					<?php  if ($show_messages && $messages): print $messages; endif; ?>
				</div>
				<div style="clear:both;"></div>
			</div>
		</div>
		
	    <div id="right"><?php print $right; ?>
	    </div>
    </div>
    <div style="clear:both;"></div>
</div>
<div class="png">
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
