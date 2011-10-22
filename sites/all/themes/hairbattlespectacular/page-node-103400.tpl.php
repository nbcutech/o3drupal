<?php
$facebook_page = false;
if(stristr($node->path, "facebook")) {
	$facebook_page = true;
 }
?>
<?php if(!$facebook_page): ?>
<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
<?php  if ($show_messages && $messages): print $messages; endif; ?>
<?php else: ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body style="width:640px; overflow:hidden; margin-left:auto;margin-right:auto;">
<?php endif; ?>
<div id="container">
    <div id="wrapper">
		<div id="wideLeft" style="background:none;">
			<div id="wideLeftContent">
				<div class="copy">
					<div class="main-content" style="width:646px;height:556px;background-image:url('/sites/all/themes/hairbattlespectacular/images/contest_images/HairBattle_DO_splash_final.jpg');">
						<a href="/hbs/photos/do-over-winners">
							<div class="" style="float: left;height: 40px;margin-left: 242px;margin-top: 405px;width: 157px;">							</div>
						</a>
					</div>
				</div>
				<div style="clear:both;"></div>
			</div>
		</div>
		<?php if(!$facebook_page): ?>
	    <div id="right"><?php print $right; ?>
	    </div>
	   <?php endif; ?>
    </div>
    <div style="clear:both;"></div>
</div>
<?php if(!$facebook_page): ?>
<div class="png">
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
<?php else: ?>
</body>
</html>
<?php endif; ?>
