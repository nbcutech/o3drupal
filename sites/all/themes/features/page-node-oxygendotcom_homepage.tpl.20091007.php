
<link rel="stylesheet" href="http://features.oxygen.com/sites/all/themes/features/o2_homepage.css" type="text/css"/>
    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   




		<div id="content"><!--Begin Content-->
			<div id="primary"><!--Begin Primary Content Column-->
						
				<?php print $left; ?>
				<?php print $content; ?>
			
			</div><!--End Primary Content Column-->	
				<!--Begin Secondary Content Column-->
			<div id="secondary">
	    			<?php print $right; ?>
				<div id="sideBarFooter">&nbsp;</div>
			</div><!--End Secondary Content Column-->
		</div><!--End Content-->
