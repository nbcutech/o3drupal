<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
<div id="wrapper" class="photos_in">
	    <div id="midContent" class="png">
	      <?php print $content; ?>
	    </div>
		
	    <div id="right"><?php print $right; ?>
	    </div>
</div>



  

<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
