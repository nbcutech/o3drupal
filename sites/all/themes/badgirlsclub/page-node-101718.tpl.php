<?php
if(stristr($node->path, "facebook"))
  {
	include 'page-node-101718-facebook.tpl.php';
	return;
  }
?>
<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?> 

<div>    
    	<div class="main-content">
    	
	<?php print $content; ?>
	<div style="clear:both;"></div>
	
	</div>

 	<div id="right"><?php print $right; ?>
	</div>

		<div style="clear:both;"></div>

</div>


  <div id="fb-root">
    	
    </div>
	<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
<script type="text/javascript" src="/sites/all/themes/badgirlsclub/badgirlsclub_contest.js"></script>

<div class="png"><img src="<?php print $pot;?>/images/bottom_spacer.png" style="clear:both;"/>

<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
