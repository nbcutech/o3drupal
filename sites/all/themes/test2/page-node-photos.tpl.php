<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
<div id="container" class="photos">
    <div id="wrapper">
	    <div id="wideLeft" >
		    <div id="wideLeftContent">
			<?
			if(time() > strtotime("2009-06-29")){
			?>
				<img src="<?php print $pot;?>/images/photos_header.png" class="png" />
			<? }else{ ?>
			<!-- image to switch if today's date is greater than specified date -->
<?
echo"<script type=\"text/javascript\">";
?>
document.write('<sc'+'ript language=\'JavaScript1.1\' src="http://ad.doubleclick.net/adj/nbcu.bravo/photos_photoslogo;site=oxygen;show=toridean;sect=photos;sub=photoslogo;genre=;daypart=primetime;!category=photos;!category=js;!category=bravo;network=tvn;sz=1x1;tagtype=js;uri=;pos=9;tile=9;ord=' + randDARTNumber + '?"></s'+'cript>');
<?
echo"</script>";
?>

				<a style="top:10px; left:490px;position:absolute;" href="http://www.mysisterskeepermovie.com/" target="_blank"><img src="<?php print $pot;?>/images/spacer.gif" width="150" height="20"/></a><img src="<?php print $pot;?>/images/photos_header_sponsored.png" class="png" />
			<? } ?>
			<div id="queuegallery_rating"> <?php print fivestar_widget_form($node) ?></div>
			<span class="gallery_title"><?php print $title ?></span>
			<?php print queuegallery_all($node->field_nodequeue_id[0][value], "Tori and Dean"); ?>
		    </div>
		    <div style="clear:both;"></div>
		    <div id="wideLeftFooter"><img src="<?php print $pot;?>/images/photos_footer.png"></div>
	    </div>
		
	    <div id="right"><?php print $right; ?>
	    </div>
    </div>
    <div style="clear:both;"></div>
</div>
<div class="png"><img src="<?php print $pot;?>/images/bottom_spacer.png" style="clear:both;"/></div>


<link rel="stylesheet" href="/sites/all/themes/oxygen/queuegallery_comments.css" type="text/css"/>
<script type="text/javascript" src="/sites/all/themes/oxygen/js/gallery-v1.js"></script>
<script type="text/javascript" src="/sites/all/themes/oxygen/js/jquery.livequery.js"></script>
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
