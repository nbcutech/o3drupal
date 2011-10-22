<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>
    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   

	<style>
	#micrositeMenu #navHome a, #micrositeMenu #navHome a:visited, #micrositeMenu #navHome a:active, #micrositeMenu #navHome a:hover {
		background-position: 0px -87px;
	}
	</style>

<div id="container">
    <div id="wrapper">
    <div id="left"><?php print $left; ?>
    </div>
    <div id="right"><?php print $right; ?>
    </div>
        <div id="middle">
         
            <?php print $content; ?>
            <?php print $middle; ?>
        </div>
    </div>
    <div style="clear:both;"></div>
</div>
<div class="png">
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
