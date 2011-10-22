<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("/var/www/html/sites/all/themes/danceyourassoff/showsite_head.inc"); ?>
    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   

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
<div class="png"><img src="<?php print $pot;?>/images/bottom_spacer.png" style="clear:both;"/>
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
