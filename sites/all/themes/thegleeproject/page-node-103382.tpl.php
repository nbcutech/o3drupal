<?php
if(stristr($node->path, "facebook"))
  {
	include 'page-node-103382-facebook.tpl.php';
	return;
  }
?>
<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
<?php  if ($show_messages && $messages): print $messages; endif; ?>
<div id="container" style="height:900px; background-image:url('/sites/all/themes/thegleeproject/images/wrapper_bg.jpg'); background-repeat:no-repeat;">
    <div id="wrapper" >
			<div id="wideLeft" >
				<div id="wideLeftContent">
					<div class="copy">
						<?php print $content; ?>
					</div>
					<div style="clear:both;"></div>
				</div>
			</div>
		
	    <div id="right" style="width:300px;margin-top:-15px;"><?php print $right; ?>
	    </div>
    </div>
    <div style="clear:both;"></div>
</div>
<div class="png">
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
