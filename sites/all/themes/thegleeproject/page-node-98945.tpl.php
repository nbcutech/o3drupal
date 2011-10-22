<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
<?php  if ($show_messages && $messages): print $messages; endif; ?>
<div id="container">
    <div id="wrapper">
		 <div id="wideLeft" style="width: 975px;">
			<div id="wideLeftContent">
				<div class="copy">
					<?php print $content; ?>
				</div>
				<div style="clear:both;"></div>
			</div>
		</div>
		
    </div>
    <div style="clear:both;"></div>
</div>
<div class="png">
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
