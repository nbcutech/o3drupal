<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   

<?php
if (preg_match("/meet-the-planners-sbw/i", request_uri()) == 1 ) {
    print '<div id="container" class="planners bio">';
  } elseif (preg_match("/meet-the-couples-sbw/i", request_uri()) == 1 ) {
    print '<div id="container" class="couples bio">';
  } else {
  	print '<div id="container">';
  }
?>
    <div id="wrapper">
		<div id="wideLeft" >
			<div id="wideLeftContent">
				<div class="copy">
					<?php print $content; ?>
				</div>
				<div style="clear:both;"></div>
			</div>
			
<!--			<div id="wideLeftFooter">&nbsp;</div> -->
		</div>
		
	    <div id="right"><?php print $right; ?>
	    </div>
    </div>
    <div style="clear:both;"></div>
</div>
<div class="png"><!-- <img src="<?php print $pot;?>/images/bottom_spacer.png" style="clear:both;"/> -->
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
