<?php
if(stristr($node->path, "facebook"))
  {
	include 'page-node-98709-glee-project-facebook.tpl.php';
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
			<div class="left-panel">
		
					<div class="sb-header">
		  		</div>
		  			
		  		<div class="outter-image">
		  			
		  			<div class="image-holder">
		  			</div>
		  				
		  		</div>
		  			
			</div>
		
	  	<div class="right-panel">
				<div><?php print $right; ?></div>
			</div>
		</div>
	  <div style="clear:both;"></div>

<div class="png"><img src="<?php print $pot;?>/images/bottom_spacer.png" style="clear:both;"/>

<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
