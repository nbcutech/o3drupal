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
      <?php
      if(base_path() == '/Fluff-Me-Community/') :
       ?>
       <div id="container" class="fluff-me">
           <div id="wrapper">
             <div id="innerFluffMe">
       <?php     
      else:
      ?>
<div id="container">
    <div id="wrapper">
	  <?php
	  endif;
	  ?>
    <div id="left"><?php print $left; ?>
    </div>
    <div id="right"><?php print $right; ?>
    </div>
        <div id="middle">
         
            <?php print $content; ?>
            <?php print $middle; ?>
        </div>
              <?php
      if(base_path() == '/Fluff-Me-Community/') :
       ?>
           <div style="clear:both;"></div>
           </div>
       <?php
       endif;
       ?>
           <div style="clear:both;"></div>
    </div>
    <div style="clear:both;"></div>
</div>
<div class="png">
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
