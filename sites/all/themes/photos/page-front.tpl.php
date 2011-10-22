<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   

<div id="wrapper">
    <div id="upperContent">
	<div id="upperContLeft">
	    <?php print $upperContent; ?>
	</div>
	<div id="upperContRight">
	    <?php print $right; ?>
	</div>
    </div> <!-- end upperContent -->
    <div id="midContent">
	<?php print $content; ?>
    </div>
</div>
    <div style="clear:both;"></div>


<script type="text/javascript" src="/sites/all/themes/oxygen/js/gallery.js"></script>
<script type="text/javascript" src="/sites/all/themes/oxygen/js/jquery.livequery.js"></script>

  

</script>
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
