<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>
    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   

	<style>
	#micrositeMenu #navGame a, #micrositeMenu #navGame a:visited, #micrositeMenu #navGame a:active, #micrositeMenu #navGame a:hover {
		background-position: -538px -87px;
	}
	#wrapper{background:#4d98ad none repeat scroll 0 0;}

       #iFrameContentBlock{background-color:none;}
	</style>
<?php print $content; ?>
<div id="container">
    <div id="wrapper">
	<img src="/sites/all/themes/addictedtobeauty/images/fantastic_plastic_header.jpg" border="0">
	<div class="game-frame"><iframe src="http://www11.modiface.com/oxygen/index.php" width="811" height="1180" allowTransparency="true" name="iFrameContentBlock" id="iFrameContentBlock" scrolling="no" frameborder="0"></iframe></div>
    </div>
    <div style="clear:both;"></div>
</div>

<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
