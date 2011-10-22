<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   

<div id="container" class="bios_cast">
    <div id="wrapper">
<?php  
if (preg_match("/\/meet-the-cast-gleeproj\/[a-z]/i", $_SERVER['REQUEST_URI']) == 1 ): ?>

<div id="newBio">
<!-- adding link for listerine sponsorship -->
<a href="http://www.listerine.com?ref=oxygen&cid=oxygen" style="position:absolute;width:629px;height:60px;left:13px;top:6px;display:block;" target="_blank"> </a>

<?php print $node->body; ?>

<div class="newBio_ListerinePromo">
Get to know all about the 12 contenders competing for a spot on Glee.
</div>
</div>
<!-- this script added for tracking on newBio for Facebook and Twitter clicks -->
<script type="text/javascript">
function trackShare(partner,network) {
    s.linkTrackVars='prop52';
    s.prop52 = partner + ' : Share with' + network;
	s.tl(this,'o', partner +' : Share with' + network);
}
</script>
<?php else: ?>

		<div id="wideLeft" >
			<div id="wideLeftContent">
				<div class="copy">
				
					<!-- START CONTENT -->
					<div class="bio_pic"><img src="<?php print $pot;?>/images/bios/photo_<?php print $node->field_cast_name[0]['value'];?>.jpg" /></div>				
					<div class="bio_header"><img src="<?php print $pot;?>/images/bios/meet_<?php print $node->field_cast_name[0]['value'];?>.png" class="png" /></div>
					<?php print $node->body; ?>
					<!-- END CONTENT -->
				</div>
				<div style="clear:both;"></div>
			</div>
		</div>

<?php endif;   
?>  	
	
	    <div id="right"><?php print $right; ?>
	    </div>
    </div>
    <div style="clear:both;"></div>
</div>
<div class="png">
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
