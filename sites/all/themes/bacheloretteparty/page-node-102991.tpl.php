<?php
if(stristr($node->path, "facebook"))
  {
	include 'page-node-102991-facebook.tpl.php';
	return;
  }
?>
<?php  require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>

<?php require_once("showsite_head.inc");  ?>

    <?php if ($header): ?>
      <?php print $header; ?>
    <?php endif; ?> 
    <?php  if ($show_messages && $messages): print $messages; endif; ?>
<div>
    <div class="main-content" style="background-image: url('/sites/all/themes/hairbattlespectacular/images/interior_content_BG_.jpg');background-repeat: no-repeat;">
			<?php print $content; ?>
	    <div class="right-panel">
				<div class="bing-decide">
						<div id="ad300x120" style="margin-top:0;">
								<div id="x95AdBlock">
								
									
								</div>
						</div>
						
					
				</div>
			
				<div class="follow-glee"></div>
				<div class="ad-unit-display">
					<div><?php print $right; ?></div>
				</div>
		  </div>
	   </div>
	<div style="clear:both;"></div>
</div>
  <div id="fb-root">
    	
    </div>
<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
<script type="text/javascript" src="/sites/all/themes/hairbattlespectacular/hairbattle_contest.js"></script>

<div class="png"><img src="<?php print $pot;?>/images/bottom_spacer.png" style="clear:both;"/>

<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
